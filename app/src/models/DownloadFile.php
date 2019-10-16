<?php


namespace {
	
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
            "DocType" => "Varchar(128)", //"Enum('Factsheet,Metadata,Background,Report')",
            "Sort" => "Int"
        ];

        private static $has_one = [
           // "IndicatorPage" => "IndicatorPage",
            "File" => File::class
        ];

        private static $many_many = [
            'Topics' => Topic::class
        ];

        private static $owns = [
            "File","Topics"
        ];

        private static $summary_fields = [
            'DocType','Title'
        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");
            $fields->removeByName("Topics");

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));

            $types = [
                "Factsheet"=>"Factsheet",
                "Metadata"=>"Metadata",
                "Background"=>"Background",
                "Report"=>"Report"
            ];
            $fields->addFieldToTab("Root.Main", new DropdownField("DocType","Document Type",$types,$this->DocType));

            $up1 = UploadField::create('File',"File");
            $up1->setFolderName('Factsheets');
            $up1->getValidator()->setAllowedExtensions(['pdf']);           
            $fields->addFieldToTab('Root.Main', $up1);


            $fields->addFieldToTab('Root.Main', ListboxField::create(
            'Topics',
            'Topics',
            Topic::get()->map('ID', 'Topic')
        ), 'Metadata');

            return $fields;
        }

    }
}


 ?>