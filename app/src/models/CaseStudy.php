<?php


use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\LiteralField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;


class CaseStudy extends DataObject
{
    /**
     * @var array
     */
    private static $db = [
        'Sort' => 'Int',
        'Title' => 'Varchar',
        'CaseNumber' => 'Varchar',        
        'Content' => 'HTMLText',
               
    ];

    /**
     * @var array
     */
    private static $has_one = [
          'CaseFile' => File::class     
    ];


    private static $has_many = [
              
    ];

    private static $belongs_many_many = [
        'Page' => Page::class
    ];

    /**
     * @var array
     */
    private static $owns = array(
        'CaseFile'
    );

    
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
    private static $table_name = 'CaseStudy';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    
    public function getCMSFields()
    {
     
        $fields = parent::getCMSFields();
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName(['Sort','CaseFile']);

            $fields->addFieldToTab('Root.Main',
            UploadField::create('CaseFile', 'Case study file')
                ->setAllowedExtensions(['pdf','doc','docx'])
                ->setFolderName('CaseStudyFiles')
            );

           
            
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
