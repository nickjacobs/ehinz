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

    

	class Newsletter extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "Date" => "Varchar(128)",
            "CMLink" => "Text",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "NewsletterPage" => NewsletterPage::class,
            "PDFFile" => File::class
        ];

        private static $owns = [
            "PDFFile"
        ];

        private static $summary_fields = [
            'Title','Date'
        ];

        private static $default_sort = 'Sort DESC';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");
            $fields->removeByName('NewsletterPage');

            
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextField("Date","Date (month/year)"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));
            $fields->addFieldToTab("Root.Main", new TextField("CMLink","Newsletter link URL"));


            $up1 = UploadField::create('PDFFile',"PDF version");
            $up1->setFolderName('Newsletters');
            $up1->getValidator()->setAllowedExtensions(['pdf']);           
            $fields->addFieldToTab('Root.Main', $up1);

            return $fields;
        }

    }
}
