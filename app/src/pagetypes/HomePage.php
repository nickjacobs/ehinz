<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    //use SilverStripe\Forms\TreeDropdownField;
    //use SilverStripe\Forms\GridField\GridField;
    //use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    //use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class HomePage extends Page
    {

        private static $db = [ 
            "QuickLinks" => "HTMLText",
            "QuickLinksHeading" => "Varchar(128)",
            "HealthspaceHeading" => "Varchar(128)",
            "HealthspaceDescription" => "HTMLText"
        ];

        private static $has_one = [
            'HealthspaceImage' =>  Image::class
        ];

        private static $owns = [
            'HealthspaceImage'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.QuickLinks', TextField::create("QuickLinksHeading","Quick Links Heading"));
            $fields->addFieldToTab('Root.QuickLinks', HTMLEditorField::create("QuickLinks","Quick Links Content"));

            $fields->addFieldToTab('Root.Healthspace', TextField::create("HealthspaceHeading","Healthspace Heading"));
            $fields->addFieldToTab('Root.Healthspace', HTMLEditorField::create("HealthspaceDescription","Healthspace Description"));
            $up1 = UploadField::create('HealthspaceImage',"Image");
            $up1->setFolderName('HealthspaceImages');
            $up1->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']);           
            $fields->addFieldToTab('Root.Healthspace', $up1);

            return $fields;
        }

    }

}
