<?php

namespace {


    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Forms\TextField;

class DashboardPage extends Page
    {

        private static $db = [ 
            'DashboardLink' => 'Varchar(255)', 
            'OpenDirectlyInNewWindow' => 'Boolean'                     
        ];

        private static $has_one = [
                  
        ];

        private static $owns = [
                  
        ];

        //private static $allowed_children = ['DashboardPage'];

       
        private static $description ="Dashboard page";

        private static $icon_class = 'font-icon-chart-pie';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab('Root.Main',TextField::create('DashboardLink','Full URL for dashboard'),'Content');
            $fields->addFieldToTab('Root.Main',CheckboxField::create('OpenDirectlyInNewWindow','Open directly in new window')->setDescription('This opens in a new window directly (if it\'s not on a landing page)'),'Content');

            
           
            return $fields;
        }


        function onBeforeWrite() {            
            if( $this->Parent()->ClassName == 'DashboardHolder' )
            {
                $this->ShowInMenus = false;
            } else {
                $this->ShowInMenus = true;
            }
            parent::onBeforeWrite();  
        }  
            

        

    }

}
