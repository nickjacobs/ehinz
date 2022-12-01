<?php

namespace {

    use SilverStripe\ORM\DataObject;        
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    use Sheadawson\Linkable\Forms\LinkField;
    use Sheadawson\Linkable\Models\Link;

       

    class KeyFinding extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(255)",
            "Summary" => "Text",           
            "Sort" => "Int",

        ];

        private static $has_one = [
            "HomePage" => HomePage::class,
            "PageLink" => Link::class,
        ];

        private static $owns = [
            'PageLink'
        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName(["Sort","PageLinkID",'HomePageID']);

            $pages = Page::get();
            $fields->addFieldsToTab("Root.Main", [
                TextField::create("Title","Title"),
                TextareaField::create("Summary","Summary"),
                LinkField::create('PageLinkID','Page link')->setDescription('Optional link to Key Finding info')
            ]);
            return $fields;
        }

    }



}
