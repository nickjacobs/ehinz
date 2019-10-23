<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree; 
	use SilverStripe\Forms\CheckboxField;
	use SilverStripe\Forms\LiteralField;
	use SilverStripe\Forms\HeaderField;
    //use SilverStripe\Forms\DropdownField;
    use SilverStripe\Forms\TextareaField;   
	use SilverStripe\Forms\TextField;	
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Assets\File;
    use SilverStripe\Assets\Image;
	use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\ORM\ArrayList;
    use SilverStripe\ORM\FieldType\DBField;
    use SilverStripe\Core\Convert;


    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;


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
            "BannerSubTitle" => "Varchar(256)",
            "Summary" => "Text",
        	"ShowInFooterMenu" => "Boolean",
            "ShowInFooterMenuAbout" => "Boolean",
            "PageIntro" => "HTMLText",
            //"ShowOnThisPage" => "Boolean"
        ];

        private static $has_one = [
            'BannerImage' => Image::class,
            'SummaryThumb' => Image::class,
            'SummaryIcon' => Image::class
        ];

        private static $many_many = [
           "Files" => DownloadFile::class,
           "Links" => Link::class,
           "StaffContacts" => StaffPage::class,
           //"ExtraContent" => ExtraContent::class
        ];        

        private static $many_many_extraFields = [
            'Files' => [
                'FileSort' => 'Int',
            ],
            'Links' => [
                'LinkSort' => 'Int',
            ],
            'StaffContacts' => [
                'ContactSort' => 'Int',
            ],
        ];

       
	    private static $owns = [
            'BannerImage','SummaryThumb','SummaryIcon','Files','Links','StaffContacts'
        ];


        // private static $casting = [
        //     'FormattedTitle' => 'Raw' 
        // ];      



        private static $description = "";

        private static $create_table_options = [
            MySQLSchemaManager::ID => 'ENGINE=MyISAM'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            if($this->ClassName == 'Page' || $this->ClassName == 'IndicatorPage'){
                $fields->addFieldToTab('Root.Main', HTMLEditorField::create('PageIntro')->setRows(8)->addExtraClass('stacked'),'Content');
                //$fields->addFieldToTab('Root.Main', CheckboxField::create('ShowOnThisPage','Show "On this page list"?'),'Content');
            }

           
            $fields->addFieldToTab('Root.Banner', TextField::create("BannerTitle","Title"));
            $fields->addFieldToTab('Root.Banner', TextField::create("BannerSubTitle","SubTitle"));
            $up1 = UploadField::create('BannerImage',"Image");
            $up1->setFolderName('BannerImages');
            $up1->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']);           
            $fields->addFieldToTab('Root.Banner', $up1);
            
            $fields->addFieldToTab('Root.Summary', HeaderField::create("hf1","Summary information for page listings"));

            $fields->addFieldToTab('Root.Summary', TextareaField::create("Summary","Summary"));

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




            $config = GridFieldConfig_RelationEditor::create();
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("Files", "Files", $this->Files(), $config);
            $fields->addFieldToTab("Root.Files", $gridField);

            $config2 = GridFieldConfig_RelationEditor::create();
            $config2->addComponent(new GridFieldOrderableRows());
            $gridField2 = new GridField("Links", "Links", $this->Links(), $config2);
            $fields->addFieldToTab("Root.Links", $gridField2);

            $fields->addFieldToTab("Root.StaffContacts", LiteralField::create('lf1','<p>The first contact will display as the primary domain contact - all others will be listed as domain seconds</p>'));

            $config3 = GridFieldConfig_RelationEditor::create();
            $config3->addComponent(new GridFieldOrderableRows());
            $config3->removeComponentsByType(SilverStripe\Forms\GridField\GridFieldAddNewButton::class);
            $gridField3 = new GridField("StaffContacts", "StaffContacts", $this->StaffContacts(), $config3);
            $fields->addFieldToTab("Root.StaffContacts", $gridField3);
            


 
            return $fields;
        }

        public function getSettingsFields() {
            $fields = parent::getSettingsFields();

            $fields->insertAfter( new CheckboxField("ShowInFooterMenuAbout","Show In footer More Info menu"), "ShowInMenus" );
            $fields->insertAfter( new CheckboxField("ShowInFooterMenu","Show In footer menu"), "ShowInMenus");
            
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


        public function Subheadings()
        {
            preg_match_all('/<h2 class="anchor">(.*?)<\/h2>/is', $this->Content, $matches);
            $out = [];
            foreach ($matches[1] as $subheading) {
                $out[] = [
                    'Title'      => $subheading,
                    'urlsegment' => Convert::raw2url($subheading),
                ];
            }
            return ArrayList::create($out);
        }

        public function GetFormattedContent()
        {
            $content = $this->dbObject('Content')->RAW();
            foreach ($this->Subheadings() as $subheading) {
                $content = str_replace('<h2 class="anchor">' . $subheading->Title . '</h2>', '<h2 class="anchor" id="' . $subheading->urlsegment . '">' . $subheading->Title . '</h2>', $content);
            }
            return DBField::create_field('HTMLText', $content);
        }
      
       

	}
}
