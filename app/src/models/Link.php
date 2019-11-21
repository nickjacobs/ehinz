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

       

    class Link extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "URL" => "Varchar(512)", //"Enum('Factsheet,Metadata,Background')",
            "Sort" => "Int"
        ];

        private static $has_one = [
            //"IndicatorPage" => "IndicatorPage",
        ];

        private static $owns = [
        ];

        private static $summary_fields = [
            'Title','URL'
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


        public function validate() 
        {
            $result = parent::validate();          

            $doc = Link::get()->filter(['Title' => $this->Title,'URL' => $this->URL,'ID:not' => $this->ID])->first();
            
            if($doc) {
                 $result->addError('This link already exists - please use the add existing link to add this document');
            }

            return $result;
        }

    }

    


}
