<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;    
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class StaffHolder extends Page
    {

        private static $db = [
            'TechContent' => 'HTMLText'         
           
        ];

        private static $has_one = [
                  
        ];

        private static $owns = [
                  
        ];

       
        private static $description ="Staff member landing page";

        private static $icon_class = 'font-icon-torsos-all';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName('Summary');
            $fields->removeByName('Files');
            $fields->removeByName('Links');
            

           

            $fields->addFieldToTab('Root.Main', HTMLEditorField::create('TechContent','Technical Advisors content'),'Metadata');
                       

            return $fields;
        }

        

    }

}
