<?php

namespace {

   
    use SilverStripe\View\Requirements;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\RequiredFields;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\Form;
    use SilverStripe\Control\Email\Email;
    use SilverStripe\Control\Controller;

    class ContactPageController extends PageController {
        
       private static $allowed_actions = ['Form'];

        public function init() {
            parent::init();
            // Requirements::css("datepicker/dist/datepicker.min.css");
            // Requirements::javascript("datepicker/dist/datepicker.min.js");
            // //Requirements::customScript("$.fn.datepicker.noConflict();");
            // Requirements::javascript("themes/bootstrap/javascript/bookingforms.js");
        }
        
        

        public function Form() {
        $validator = new RequiredFields('Name','Email','Comments');
        
        return Form::create(
            $this,
            "Form",
            FieldList::create(  

    	        TextField::create("Name","Your Name"),  
    	        TextField::create("Organisation","Organisation"), 
    	        TextField::create("Email","Email Address"),               
    	        TextareaField::create("Comments","Comments")


            ),
            FieldList::create(
                FormAction::create("submit","Send")->setUseButtonTag(true)->addExtraClass('btn')
                
            ),
            $validator
        );
            
        }

        public function submit($data, $form) { 
            $email = new Email(); 

            //$email->setTo('info@fallsafe.co.nz'); 
            //$email->setTo('nick@nfx.nz'); 
            $email->setTo($this->EmailTo);
            $email->setFrom('noreply@ehinz.ac.nz'); 
            $email->setSubject("EHINZ website feedback form"); 

            //$email->setHTMLTemplate('LogicContact');
            //$email->setData($data);
            //$email->populateTemplate($data); 

            $CommentsBody = " 
            <p><strong>Name:</strong> {$data['Name']}</p>           
            <p><strong>Email:</strong> {$data['Email']}</p> 
            <p><strong>Organisation:</strong> {$data['Organisation']}</p> 
            <p><strong>Comments:</strong> {$data['Comments']}</p> 
            "; 
            $email->setBody($CommentsBody); 
           

            $email->send(); 
            $link = Controller::curr()->Link();
            Controller::curr()->redirect($link . "?success=1");
            
        }


        
        public function Success() {
            return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
        }




    }
}







