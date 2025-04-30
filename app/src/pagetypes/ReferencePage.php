<?php

namespace {

    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class ReferencePage extends Page
    {

        private static $db = [
            'References' => 'HTMLText'
        ];

        private static $has_one = [
        ];

        private static $description ="Standard page with reference section";



        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab("Root.Main", HTMLEditorField::create('References')->addExtraClass('stacked'),'Metadata');



            return $fields;
        }


    }

}
