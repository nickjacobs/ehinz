<?php
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
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
        'Address' => 'Text',
        'DownloadsOpen' => 'Boolean',
        'LinksOpen' => 'Boolean',
        'ContactsOpen' => 'Boolean',
        'HealthspaceHeader' => 'Text',

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
        ]
        );

        $fields->addFieldsToTab('Root.Main',[            
            HeaderField::create('hf3','Healthspace'),
            Textfield::create('HealthspaceHeader','Healthspace default header')
           
        ]
        );

     
        
    }
}
