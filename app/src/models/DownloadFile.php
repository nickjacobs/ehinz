<?php


namespace {

    use SilverStripe\Assets\Folder;
    use SilverStripe\Forms\TreeDropdownField;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    //use SilverStripe\Assets\Image;
    //use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\DropdownField;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\ListboxField;


    class DownloadFile extends DataObject
    {
        private static $db = [
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "DocType" => "Varchar(128)", // Example: 'Enum("Factsheet,Metadata,Background,Report")'
            "OnlineLink" => "Varchar(255)",
            "Keywords" => "Text",
            "Filename" => "Text",
            "Sort" => "Int",
            "UploadFolder" => "Int"
        ];

        private static $has_one = [
            "File" => File::class
        ];

        private static $many_many = [
            "Topics" => Topic::class
        ];

        private static $owns = [
            "File",
            "Topics"
        ];

        private static $summary_fields = [
            "DocType",
            "LastEdited.Nice" => "Edited",
            "Title"
        ];

        private static $searchable_fields = [
            "Title",
            "Summary",
            "DocType",
            "Topics.Topic",
            "Filename",
            "Keywords"
        ];

        private static $default_sort = "LastEdited DESC";

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            // Remove unused fields
            $fields->removeByName(["Sort", "Topics", "OnlineLink", "Keywords", "Filename"]);

            // Title and Summary
            $fields->addFieldToTab("Root.Main", TextField::create("Title", "Title"));
            $fields->addFieldToTab("Root.Main", TextareaField::create("Summary", "Summary"));

            // Document Type Dropdown
            $types = [
                "Surveillance Report" => "Surveillance Report",
                "Metadata" => "Metadata",
                "Report" => "Report"
            ];
            $fields->addFieldToTab("Root.Main", DropdownField::create("DocType", "Document Type", $types));

            // Upload Folder Dropdown
            $rootFolder = Folder::find_or_make("Surveillance-reports");
            //$folders = Folder::get()->filter("ParentID", $rootFolder->ID)->map("ID", "Name")->toArray();
            //$folders = Folder::get()->filter("ParentID", $rootFolder->ID);

            // File Upload
            $uploadField = UploadField::create("File", "File");
            $uploadField->setFolderName("Surveillance-reports");
            $uploadField->getValidator()->setAllowedExtensions(["pdf"]);
            $fields->addFieldToTab("Root.Main", $uploadField);

            // Build dropdown options dynamically from folder hierarchy
            $folderOptions = $this->getFolderOptions();

            // Add custom DropdownField for folder selection
            $fields->addFieldToTab("Root.Main", DropdownField::create(
                "UploadFolder",
                "Upload Folder",
                $folderOptions
            )->setEmptyString("-- Select a Folder --"));







            // Online Link
            $fields->addFieldToTab("Root.Main", TextField::create("OnlineLink", "Factsheet Online Link"));

            // Topics
            $fields->addFieldToTab("Root.Main", ListboxField::create(
                "Topics",
                "Topics",
                Topic::get()->map("ID", "Topic")
            ));

            // Keywords
            $fields->addFieldToTab("Root.Main", TextField::create("Keywords", "Keywords")
                ->setDescription("Additional keywords for search"));

            return $fields;
        }

        public function validate()
        {
            $result = parent::validate();

            // Check for duplicate documents
            $duplicateDoc = DownloadFile::get()->filter([
                "Title" => $this->Title,
                "DocType" => $this->DocType,
                "ID:not" => $this->ID
            ])->first();

            if ($duplicateDoc) {
                $result->addError(
                    "This download document already exists. Please use the add-existing link to include this document."
                );
            }

            return $result;
        }


        protected function getFolderOptions()
        {
            $rootFolder = Folder::find_or_make("Surveillance-reports");
            $folderOptions = [];

            // Get all nested folders under the root folder
            $folders = Folder::get()->filter("ParentID", $rootFolder->ID);

            foreach ($folders as $folder) {
                $folderOptions[$folder->ID] = $folder->Title;

                // Recursively add subfolders
                $this->addSubfolderOptions($folder, $folderOptions, $prefix = "- ");
            }

            return $folderOptions;
        }

        protected function addSubfolderOptions($folder, &$folderOptions, $prefix)
        {
            $subfolders = Folder::get()->filter("ParentID", $folder->ID);

            foreach ($subfolders as $subfolder) {
                $folderOptions[$subfolder->ID] = $prefix . $subfolder->Title;

                // Recursive call for deeper subfolders
                $this->addSubfolderOptions($subfolder, $folderOptions, $prefix . "- ");
            }
        }



        public function onBeforeWrite()
        {
            parent::onBeforeWrite();

            // Check for existing records with the same Title and DocType
            $existingRecord = DownloadFile::get()->filter([
                "Title" => $this->Title,
                "DocType" => $this->DocType,
                "ID:not" => $this->ID
            ])->first();

            // If a matching record exists, reuse the folder
            if ($existingRecord && $existingRecord->File()->exists()) {
                $this->UploadFolder = $existingRecord->File()->ParentID;
            }

            // Handle file association and folder assignment
            if ($file = $this->File()) {
                if ($this->UploadFolder && $folder = Folder::get()->byID($this->UploadFolder)) {
                    $file->ParentID = $folder->ID;
                    $file->write();
                }

                // Update the filename in the database
                $this->Filename = $file->Filename;
            }
        }
    }
}
