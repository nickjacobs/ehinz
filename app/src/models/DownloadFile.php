<?php


namespace {

    use SilverStripe\Assets\Folder;
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
            "Topics.Topic"
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
                "Background" => "Background",
                "Report" => "Report"
            ];
            $fields->addFieldToTab("Root.Main", DropdownField::create("DocType", "Document Type", $types));

            // Upload Folder Dropdown
            $rootFolder = Folder::find_or_make("Surveillance-reports");
            $folders = Folder::get()->filter("ParentID", $rootFolder->ID)->map("ID", "Name")->toArray();

            // File Upload
            $uploadField = UploadField::create("File", "File");
            $uploadField->setFolderName("Surveillance-reports");
            $uploadField->getValidator()->setAllowedExtensions(["pdf"]);
            $fields->addFieldToTab("Root.Main", $uploadField);



            $fields->addFieldToTab("Root.Main", DropdownField::create(
                "UploadFolder",
                "Upload Folder",
                $folders
            )->setEmptyString("-- Select a Folder --"));

            // Online Link
            $fields->addFieldToTab("Root.Main", TextField::create("OnlineLink", "Factsheet Online Link"));

            // Topics
            $fields->addFieldToTab("Root.Main", ListboxField::create(
                "Topics",
                "Topics",
                Topic::get()->map("ID", "Title")
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

        public function onBeforeWrite()
        {
            parent::onBeforeWrite();

            // Handle file association and folder
            if ($file = $this->File()) {
                if ($this->UploadFolder && Folder::get()->byID($this->UploadFolder)) {
                    $file->ParentID = $this->UploadFolder;
                    $file->write();
                }

                // Update the filename in the database
                $this->Filename = $file->Filename;
            }
        }
    }
}
