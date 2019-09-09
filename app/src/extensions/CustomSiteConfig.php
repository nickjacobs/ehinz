<?php
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;


class CustomSiteConfig extends DataExtension
{

    private static $db = [
    	'FBLink' => 'Varchar',
    	'TWLink' => 'Varchar',
    	'LinkedInLink' => 'Varchar',
    	'EmailLink' => 'Varchar',
        'Address' => 'Text'
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

     
        
    }
}
