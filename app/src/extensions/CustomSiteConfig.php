<?php
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class CustomSiteConfig extends DataExtension
{

    private static $db = [
    	'FBLink' => 'Varchar',
    	'TWLink' => 'Varchar',
    	'LinkedInLink' => 'Varchar',
    	'EmailLink' => 'Varchar',
        'Address' => 'Text',
        'DownloadsOpen' => 'Boolean',
        'LinksOpen' => 'Boolean',
        'ContactsOpen' => 'Boolean',
        'FooterMenu' => 'HTMLText',
        'FooterMenuAbout' => 'HTMLText',

    ];

    private static $has_one = [
    ];

    private static $owns = [
    ];

    public function updateCMSFields(FieldList $fields)
    {

    	$fields->addFieldsToTab('Root.Main',[
    		HeaderField::create('hf1','Social Links'),
    		TextField::create('FBLink'),
    		TextField::create('TWLink'),
    		TextField::create('LinkedInLink'),
    		TextField::create('EmailLink'),
            TextareaField::create('Address'),
    	]);

        $fields->addFieldsToTab('Root.Main',[
            HeaderField::create('hf2','Downloads and Links section'),
            CheckboxField::create('DownloadsOpen','Default downloads section to open'),
            CheckboxField::create('LinksOpen','Default links section to open'),
            CheckboxField::create('ContactsOpen','Default staff contacts section to open')
        ]);



        $fields->addFieldsToTab('Root.Main',[
            HeaderField::create('hf3','Footer'),
            HTMLEditorField::create('FooterMenu','Footer menu')->setRows(6),
            HTMLEditorField::create('FooterMenuAbout','Footer menu about')->setRows(6)
        ]);



    }
}
