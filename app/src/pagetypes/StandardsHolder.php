<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Assets\File;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    

    class StandardsHolder extends Page
    {

        private static $db = [ 
            //'TeReoTitle' => 'Varchar'

        ];

        private static $has_one = [
           
        ];

        private static $has_many = [
            'RelatedDocs' => ASDownloadFile::class           
        ];

        

        private static $owns = [
            'RelatedDocs'            
        ];

        private static $description ="Analytical standards index page";
        private static $icon_class = 'font-icon-p-list';
        

        private static $allowed_children = [
            StandardsPage::class            
        ];

        private static $can_be_root = true;

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName('Files');


            $config = GridFieldConfig_RelationEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("RelatedDocs", "Related documents", $this->RelatedDocs(), $config);
            $fields->addFieldToTab("Root.ASFiles", $gridField);
                  
            

            return $fields;
        }


        public function ASPages()
        {
            return StandardsPage::get()->filter('ParentID',$this->ID);
        }

        public function SortedASFiles()
        {
            return $this->RelatedDocs()->Sort('Sort');
        }

    }
}
