<?php


namespace {
	
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;    //
    use SilverStripe\Forms\DropdownField;
    use SilverStripe\Assets\File;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\ListboxField;
    

    // analyticals standards download file
    class ASDownloadFile extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",           
            "Sort" => "Int"
        ];

        private static $has_one = [           
            "File" => File::class,
            'Page' => StandardsHolder::class
        ];

        

        private static $owns = [
            "File"
        ];

        private static $summary_fields = [
            'Title'
        ];

        private static $searchable_fields = [
          'Title',
          'Summary', 
       ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");
           
            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));

            
            $up1 = UploadField::create('File',"File");
            $up1->setFolderName('ASDocs');
            $up1->getValidator()->setAllowedExtensions(['pdf']);           
            $fields->addFieldToTab('Root.Main', $up1);          

            return $fields;
        }


        

    }
}
