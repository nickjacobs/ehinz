<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    //use SilverStripe\Assets\Image;
    //use SilverStripe\AssetAdmin\Forms\UploadField;
    //use SilvearStripe\Forms\TextField;
    //use SilverStripe\Forms\TextareaField;
    //use SilverStripe\Forms\TreeDropdownField;
    //use SilverStripe\Forms\GridField\GridField;
    //use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    //use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    //use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldAddNewButton;
    use SilverStripe\Forms\GridField\GridFieldSortableHeader;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    use SilverStripe\Forms\ToggleCompositeField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TreeDropdownField;
    use SilverStripe\Forms\TreeMultiselectField;

    use SilverStripe\Forms\CheckboxSetField;

    class IndicatorsPage extends Page
    {

        private static $db = [ 

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
           "IndicatorGroups" => "IndicatorGroup"
        ];

        private static $owns = [
            "IndicatorGroups"
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $config = GridFieldConfig_RecordEditor::create();
            $gridField = new GridField("IndicatorGroups", "Indicator Groups", $this->IndicatorGroups(), $config);
            $fields->addFieldToTab("Root.IndicatorGroups", $gridField);

            return $fields;
        }

    }

    class IndicatorGroup extends DataObject
    {

        private static $db = [ 
            "Title" => "Varchar(128)"
        ];

        private static $has_one = [
            "IndicatorsPage" => "IndicatorsPage"
        ];

        private static $many_many = [
            "Pages" => "Page"
        ];

        private static $owns = [

        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $pages = Page::get();
            $fields->addFieldToTab("Root.Main", new CheckboxSetField("Pages","Pages",$pages->map("ID","Title")));
            $fields->addFieldToTab("Root.Main", new TreeMultiselectField("Pages","Pages in this group",SiteTree::class, 'ID', 'MenuTitle'));

            return $fields;
        }

    }


}
