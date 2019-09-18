<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    class IndicatorPage extends Page
    {

        private static $db = [ 

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
           "Files" => DownloadFile::class,
           "Links" => Link::class,
           "ExtraContent" => ExtraContent::class
        ];

        private static $owns = [
            "Files",
            "Links"
        ];

        private static $description ="Individual indicator page, ie Wood and Coal Fires";

        private static $icon_class = 'font-icon-p-data';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("ExtraContent", "Extra Content", $this->ExtraContent(), $config);
            $fields->addFieldToTab("Root.ExtraContent", $gridField);

            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("Files", "Files", $this->Files(), $config);
            $fields->addFieldToTab("Root.Files", $gridField);

            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("Links", "Links", $this->Links(), $config);
            $fields->addFieldToTab("Root.Links", $gridField);

            return $fields;
        }

    }

}
