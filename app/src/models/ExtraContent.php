<?php

namespace {

    use SilverStripe\ORM\DataObject;        
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

       

    class ExtraContent extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Summary" => "Varchar(512)",
            "Content" => "HTMLText", //"Enum('Factsheet,Metadata,Background')",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "IndicatorPage" => "IndicatorPage",
        ];

        private static $owns = [
        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new TextField("Title","Title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("Summary","Summary"));
            $fields->addFieldToTab("Root.Main", new HTMLEditorField("Content","Content"));

            return $fields;
        }

    }



}
