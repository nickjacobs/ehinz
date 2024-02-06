<?php

namespace {

    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    class IndicatorPage extends Page
    {

        private static $db = [
            'References' => 'HTMLText'

        ];

        private static $has_one = [
        ];

        private static $description ="Individual indicator page, ie Wood and Coal Fires";

        private static $icon_class = 'font-icon-p-data';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab("Root.Main", HTMLEditorField::create('References')->addExtraClass('stacked'),'Metadata');



            return $fields;
        }


    }

}
