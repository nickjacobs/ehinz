<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    //use SilverStripe\Assets\Image;
    //use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\DropdownField;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;

    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class IndicatorPage extends Page
    {

        private static $db = [ 

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
           "Files" => DownloadFile::class,
           "Links" => Link::class,
           "ExtraContent" => ExtraContent::class
        ];

        private static $owns = [
            "Files",
            "Links"
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("ExtraContent", "Extra Content", $this->ExtraContent(), $config);
            $fields->addFieldToTab("Root.ExtraContent", $gridField);

            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("Files", "Files", $this->Files(), $config);
            $fields->addFieldToTab("Root.Files", $gridField);

            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("Links", "Links", $this->Links(), $config);
            $fields->addFieldToTab("Root.Links", $gridField);

            return $fields;
        }

    }

    class DownloadFile extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "DocType" => "Varchar(128)", //"Enum('Factsheet,Metadata,Background')",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "IndicatorPage" => "IndicatorPage",
            "File" => File::class
        ];

        private static $owns = [
            "File"
        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));

            $types = [
                "Factsheet"=>"Factsheet",
                "Metadata"=>"Metadata",
                "Background"=>"Background"
            ];
            $fields->addFieldToTab("Root.Main", new DropdownField("DocType","Document Type",$types,$this->DocType));

            $up1 = UploadField::create('File',"File");
            $up1->setFolderName('IndicatorFiles');
            $up1->getValidator()->setAllowedExtensions(['pdf']);           
            $fields->addFieldToTab('Root.Main', $up1);

            return $fields;
        }

    }

    class Link extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "URL" => "Varchar(512)", //"Enum('Factsheet,Metadata,Background')",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "IndicatorPage" => "IndicatorPage",
        ];

        private static $owns = [
        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));
            $fields->addFieldToTab("Root.Main", new TextField("URL","URL"));

            return $fields;
        }

    }

    class ExtraContent extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "Content" => "HTMLText", //"Enum('Factsheet,Metadata,Background')",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "IndicatorPage" => "IndicatorPage",
        ];

        private static $owns = [
        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));
            $fields->addFieldToTab("Root.Main", new HTMLEditorField("Content","Content"));

            return $fields;
        }

    }



}
