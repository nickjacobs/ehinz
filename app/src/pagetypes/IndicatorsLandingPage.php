<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
   
    //use SilverStripe\Assets\Image;
    //use SilverStripe\AssetAdmin\Forms\UploadField;
    //use SilvearStripe\Forms\TextField;
    //use SilverStripe\Forms\TextareaField;
    //use SilverStripe\Forms\TreeDropdownField;
    //use SilverStripe\Forms\GridField\GridField;
    //use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    //use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    //use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    // use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    // use SilverStripe\Forms\GridField\GridField;
    // use SilverStripe\Forms\GridField\GridFieldAddNewButton;
    // use SilverStripe\Forms\GridField\GridFieldSortableHeader;
    // use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    

    class IndicatorsLandingPage extends Page
    {

        private static $db = [
        ];

        private static $has_one = [           
        ];

        private static $has_many = [           
        ];

        private static $owns = [           
        ];

        private static $description ="Top level indicators landing page";
        private static $icon_class = 'font-icon-p-list';
        

        private static $allowed_children = [
            Page::class,
            IndicatorsHolderPage::class
        ];

        //private static $can_be_root = false;

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            
           
            

            return $fields;
        }

    }
}
