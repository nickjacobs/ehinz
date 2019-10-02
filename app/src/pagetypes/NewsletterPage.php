<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
    use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;

    class NewsletterPage extends Page
    {

        private static $db = [ 

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
           "Newsletters" => Newsletter::class           
        ];        

        
        private static $owns = [
            "Newsletters"            
        ];

        private static $description ="Newsletter listing page";

        private static $icon_class = 'font-icon-news';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            

            // $config = GridFieldConfig_RecordEditor::create();
            // $config->addComponent(new GridFieldOrderableRows());
            // $gridField = new GridField("ExtraContent", "Extra Content", $this->ExtraContent(), $config);
            // $fields->addFieldToTab("Root.ExtraContent", $gridField);

            $config = GridFieldConfig_RecordEditor::create(100);
            $config->addComponent(new GridFieldOrderableRows());
            //$config->removeComponentsByType('GridFieldAddExistingAutocompleter');

            $gridField = new GridField("Newsletters", "Newsletters", $this->Newsletters(), $config);
            $fields->addFieldToTab("Root.Newsletters", $gridField);

            

            return $fields;
        }

    }

}
