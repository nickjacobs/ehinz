<?php

namespace {

    use SilverStripe\ORM\DBEnum;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\DropdownField;

    class StaffPage extends Page
    {

        private static $db = [
            'Position' => 'Varchar',
            'Email' => 'Varchar',
            'Phone' => 'Varchar',
            'PhoneExt' => 'Varchar',
            "Team" => "Enum('EHI Project Team, EHI Technical Advisors')"
        ];

        private static $has_one = [
            'Image' => Image::class           
        ];

        private static $owns = [
            'Image'          
        ];

        private static $defaults = [
            'ShowInMenus' => false 
        ];

       
        private static $description ="Individual staff member page";

        private static $icon_class = 'font-icon-torso';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName('Summary');
            $fields->removeByName('Files');
            $fields->removeByName('Links');
            $fields->removeByName('Banner');

            $up1 = UploadField::create('Image',"Staff photo");
            $up1->setFolderName('StaffImages');
            $up1->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']); 

            $fields->addFieldToTab('Root.Main', Textfield::create('Position'),'Content');
            $fields->addFieldToTab('Root.Main', Textfield::create('Email'),'Content');
            $fields->addFieldToTab('Root.Main', Textfield::create('Phone'),'Content');
            $fields->addFieldToTab('Root.Main', Textfield::create('PhoneExt'),'Content'); 
            $fields->addFieldToTab("Root.Main", DropdownField::create( 'Team', 'Team', $this->dbObject('Team')->enumValues()),'Content');

            
        
            $fields->addFieldToTab('Root.Main', $up1,'Content');



            

            return $fields;
        }

    }

}
