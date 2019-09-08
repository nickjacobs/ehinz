<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree; 
	//use SilverStripe\Forms\CheckboxField;
	//use SilverStripe\Forms\LiteralField;
	//use SilverStripe\Forms\HeaderField;
    //use SilverStripe\Forms\DropdownField;
	use SilverStripe\Forms\TextField;	
	//use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Assets\File;
    use SilverStripe\Assets\Image;
	use SilverStripe\AssetAdmin\Forms\UploadField;	
	//use Sheadawson\Linkable\Models\Link;
    //use Sheadawson\Linkable\Forms\LinkField;
    //use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
  	//use SilverStripe\Forms\GridField\GridField;
  	//use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
    //use SilverStripe\Forms\GridField\GridFieldAddNewButton;

    use SilverStripe\ORM\DataObject;
    use SilverStripe\ORM\Connect\MySQLSchemaManager;
	//use SilverStripe\Security\Permission;


    class Page extends SiteTree
    {
        private static $db = [
        	
        ];

        private static $has_one = [
            'BannerImage' => Image::class
        ];

        private static $many_many = array(
            // 'CaseStudies' => CaseStudy::class,
            // 'LinkBoxes' => LinkBox::class
        );

        private static $many_many_extraFields = [
            // 'CaseStudies' => [
            //     'SortOrder' => 'Int',
            // ],
            // 'LinkBoxes' => [
            //     'SortOrder' => 'Int',
            // ],
        ];

	    private static $owns = [
            'BannerImage'
        ];

        private static $description = "";

        private static $create_table_options = [
            MySQLSchemaManager::ID => 'ENGINE=MyISAM'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab('Root.Banner', TextField::create("BannerTitle","Title"));
            $up1 = UploadField::create('BannerImage',"Image");
            $up1->setFolderName('BannerImages');
            $up1->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']);           
            $fields->addFieldToTab('Root.Banner', $up1);
 
            return $fields;
        }

        public function getSettingsFields() {
            $fields = parent::getSettingsFields();
            return $fields;
        }


       

	}
}
