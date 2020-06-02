<?php

namespace {


    use SilverStripe\CMS\Model\SiteTree;    
 

    class DashboardHolder extends Page
    {

        private static $db = [                  
           
        ];

        private static $has_one = [
                  
        ];

        private static $owns = [
                  
        ];

        private static $allowed_children = ['DashboardPage'];

       
        private static $description ="Dashboard landing page";

        private static $icon_class = 'font-icon-chart-pie';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

           
            return $fields;
        }

        

    }

}
