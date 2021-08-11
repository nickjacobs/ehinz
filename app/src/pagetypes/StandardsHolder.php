<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\TextField;


    

    class StandardsHolder extends Page
    {

        private static $db = [ 
            //'TeReoTitle' => 'Varchar'

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
           
        ];

        private static $owns = [
            
        ];

        private static $description ="Analytical standards index page";
        private static $icon_class = 'font-icon-p-list';
        

        private static $allowed_children = [
            StandardsPage::class            
        ];

        private static $can_be_root = true;

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            //$fields->addFieldToTab('Root.Main', TextField::create("TeReoTitle"),'Content');

            
            

            return $fields;
        }


        public function ASPages()
        {
            return StandardsPage::get()->filter('ParentID',$this->ID);
        }

    }
}
