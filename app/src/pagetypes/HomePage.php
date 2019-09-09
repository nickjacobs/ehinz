<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    //use SilverStripe\Assets\Image;
    //use SilverStripe\AssetAdmin\Forms\UploadField;
    //use SilverStripe\Forms\TextField;
    //use SilverStripe\Forms\TextareaField;
    //use SilverStripe\Forms\TreeDropdownField;
    //use SilverStripe\Forms\GridField\GridField;
    //use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    //use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    class HomePage extends Page 
    {

        private static $db = [ 

        ];

        private static $has_one = [

        ];

        private static $owns = [

        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            return $fields;
        }

    }

}
