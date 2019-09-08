<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\LiteralField;
use Sheadawson\Linkable\Models\Link;
use Sheadawson\Linkable\Forms\LinkField;

class LinkBox extends DataObject
{
    /**
     * @var array
     */
    private static $db = [        
        'Title' => 'Varchar',               
        'Content' => 'HTMLText', 
        'ColorCode' => 'Varchar',
        'VimeoCode' => 'Varchar', 
        'Sort' => 'Int',
    ];       

    /**
     * @var array
     */
    private static $has_one = [        
        'LinkBoxLink' => Link::class,
        'Image' => Image::class

    ];


    private static $has_many = [
          
    ];

    /**
     * @var array
     */
    private static $owns = array(
        'Image'
    );

    /**
     * @var array Show the panel $Title by default
     */
    private static $defaults = [
        
    ];

    private static $summary_fields = array(        
        'Title' => 'Title',
    );

    /**
     * @var string
     */
    private static $default_sort = 'Sort';

    /**
     * @var string Database table name, default's to the fully qualified name
     */
    private static $table_name = 'LinkBox';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    
    public function getCMSFields()
    {
     
        $fields = parent::getCMSFields();
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName(['Sort','LinkBoxLinkID','Image']); 

            $link = LinkField::create('LinkBoxLinkID','Page to link to');
            $fields->insertAfter($link,'Title');

            //$uploader = UploadField::create('Image','Linkbox image');
            //$uploader->setFolderName('LinkImages');
            //$uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);
            //$fields->insertAfter($uploader,'Content');

            $vimeo = TextField::create('VimeoCode')->setDescription('This is the vimeo ID, ie if the URL is https://vimeo.com/253989945 - use 253989945');
            $fields->insertAfter($vimeo,'Content');

            //$fields->addFieldToTab('Root.Main', $uploader);


        });

       

        return parent::getCMSFields();
    }




   
    public function canView($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null, $context = [])
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }




}
