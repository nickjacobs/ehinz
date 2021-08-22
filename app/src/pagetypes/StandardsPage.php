<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
    use SilverStripe\Forms\NumericField;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    class StandardsPage extends Page
    {

        private static $db = [ 
            'SectionNumber' => 'Int'
        ];

        private static $has_one = [
           
        ];

        

        private static $description ="Analytical stadards page";

        private static $icon_class = 'font-icon-p-list';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            //$fields->addFieldToTab('Root.Main', NumericField::create('SectionNumber','Top level section number'),'MenuTitle');            

            return $fields;
        }



    }

}
