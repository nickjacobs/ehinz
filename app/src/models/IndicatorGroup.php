<?php


namespace {

	use SilverStripe\ORM\DataObject;
	//use SilverStripe\Forms\ToggleCompositeField;
    //use SilverStripe\Forms\FieldList;
    //use SilverStripe\Forms\TextField;
    //use SilverStripe\Forms\TreeDropdownField;
    use SilverStripe\Forms\TreeMultiselectField;
    use SilverStripe\Forms\CheckboxSetField;


	class IndicatorGroup extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "IndicatorsPage" => "IndicatorsPage"
        ];

        private static $many_many = [
            "Pages" => "Page"
        ];

        private static $owns = [

        ];

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName("Sort");

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new CheckboxSetField("Pages","Pages",$pages->map("ID","Title")));
            $fields->addFieldToTab("Root.Main", new TreeMultiselectField("Pages","Pages in this group",SiteTree::class, 'ID', 'MenuTitle'));

            return $fields;
        }

    }
}


 ?>