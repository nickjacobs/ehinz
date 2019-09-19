<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree; 
	use SilverStripe\Forms\CheckboxField;
	//use SilverStripe\Forms\LiteralField;
	use SilverStripe\Forms\HeaderField;
    //use SilverStripe\Forms\DropdownField;
    use SilverStripe\Forms\TextareaField;   
	use SilverStripe\Forms\TextField;	
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
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
            "BannerTitle" => "Varchar(256)",
            "Summary" => "Varchar(256)",
        	"ShowInFooterMenu" => "Boolean",
            "ShowInFooterMenuAbout" => "Boolean",
            "PageIntro" => "HTMLText",
            "ShowOnThisPage" => "Boolean"
        ];

        private static $has_one = [
            'BannerImage' => Image::class,
            'SummaryThumb' => Image::class,
            'SummaryIcon' => Image::class
        ];

        private static $many_many = [];

        private static $many_many_extraFields = [];

	    private static $owns = [
            'BannerImage','SummaryThumb','SummaryIcon'
        ];

        private static $description = "";

        private static $create_table_options = [
            MySQLSchemaManager::ID => 'ENGINE=MyISAM'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            if($this->ClassName == 'Page' || $this->ClassName == 'IndicatorPage'){
                $fields->addFieldToTab('Root.Main', HTMLEditorField::create('PageIntro')->setRows(8)->addExtraClass('stacked'),'Content');
                $fields->addFieldToTab('Root.Main', CheckboxField::create('ShowOnThisPage','Show "On this page list"?'),'Content');
            }

           
            $fields->addFieldToTab('Root.Banner', TextField::create("BannerTitle","Title"));
            $up1 = UploadField::create('BannerImage',"Image");
            $up1->setFolderName('BannerImages');
            $up1->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']);           
            $fields->addFieldToTab('Root.Banner', $up1);
            
            $fields->addFieldToTab('Root.Summary', HeaderField::create("hf1","Summary information for page listings"));

            $fields->addFieldToTab('Root.Summary', TextField::create("Summary","Summary"));

            $up3 = UploadField::create('SummaryIcon',"Summary icon");
            $up3->setFolderName('SummaryIcons');
            $up3->getValidator()->setAllowedExtensions(['png', 'svg']); 
            $up3->setDescription('Set an icon for the summary listing');        
            
            $fields->addFieldToTab('Root.Summary', $up3);
            $up2 = UploadField::create('SummaryThumb',"Summary thumbnail");
            $up2->setFolderName('Indicators');
            $up2->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']); 
            $up2->setDescription('Set an image for the summary listing - otherwise we\'ll use the indicator banner');        
            $fields->addFieldToTab('Root.Summary', $up2);
 
            return $fields;
        }

        public function getSettingsFields() {
            $fields = parent::getSettingsFields();

            $fields->insertAfter( new CheckboxField("ShowInFooterMenuAbout","Show In Footer About Menu"), "ShowInMenus" );
            $fields->insertAfter( new CheckboxField("ShowInFooterMenu","Show In Footer Menu"), "ShowInMenus");
            
            return $fields;
        }

        public function ShowSummaryThumb() {
            if ($thumb = $this->SummaryThumb()){
                return $thumb;
            }elseif($thumb = $this->BannerImage()){
                return $thumb;
            }
            return false;
        }

        
       

	}
}
