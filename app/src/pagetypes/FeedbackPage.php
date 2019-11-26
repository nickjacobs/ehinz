<?php

namespace {

    
    use SilverStripe\Forms\TextField;
   


    class ContactPage extends Page {
        private static $db = array(
            'EmailTo' => 'Text'                
            );
            
        

        
        //CMS fields
        function getCMSFields() 
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.ContactForm',Textfield::create('EmailTo','Email address to mail form to'));
            
            
            return $fields; 
        }
    }

}