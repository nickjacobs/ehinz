<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\CheckboxField;
    //use SilverStripe\Assets\Image;
    //use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
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

    

    class IndicatorsHolder extends Page
    {

        private static $db = [             
            'HideFromHomeTiles' => 'Boolean'

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
           "IndicatorGroups" => "IndicatorGroup"
        ];

        private static $owns = [
            "IndicatorGroups"
        ];

        private static $description ="Indicators holder page, ie Air Quality";
        private static $icon_class = 'font-icon-p-list';
        

        private static $allowed_children = [
            Page::class,
            IndicatorPage::class
        ];

        private static $can_be_root = false;

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldsToTab('Root.Main', [                
                CheckboxField::create('HideFromHomeTiles','Hide from homepage tiles')
            ],'Content');

                

            
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("IndicatorGroups", "Indicator Groups", $this->IndicatorGroups(), $config);
            $fields->addFieldToTab("Root.IndicatorGroups", $gridField);

            return $fields;
        }


        public function IndicatorPages()
        {
            return IndicatorPage::get()->filter('ParentID',$this->ID);
        }

    }
}
