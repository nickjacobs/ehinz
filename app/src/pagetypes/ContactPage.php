<?php

namespace {

    
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\HeaderField;

    class ContactPage extends Page {
        private static $db = array(
            'EmailTo' => 'Text' ,
            'FormIntro' => 'HTMLText'               
            );
            
        

        
        //CMS fields
        function getCMSFields() 
        {
            $fields = parent::getCMSFields();            


            $fields->addFieldsToTab("Root.Main",[
                HeaderField::create('Feedback Form'), 
                Textfield::create('EmailTo','Email address to mail form to')->addExtraClass('stacked'),               
                HTMLEditorField::create('FormIntro','Feedback form intro')->setRows(6)->addExtraClass('stacked')              

            ],'Metadata');
            
            
            return $fields; 
        }
    }

}