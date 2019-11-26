<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;    
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class PublicationSearch extends Page
    {

        private static $db = [
                   
           
        ];

        private static $has_one = [
                  
        ];

        private static $owns = [
                  
        ];

       
        private static $description ="Publication search page";

        private static $icon_class = 'font-icon-search';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName(['Summary','Files','Links','StaffContacts','Healthspace','Banner']);
           
            

           

            //$fields->addFieldToTab('Root.Main', HTMLEditorField::create('TechContent','Technical Advisors content'),'Metadata');
                       

            return $fields;
        }

        

    }

}
