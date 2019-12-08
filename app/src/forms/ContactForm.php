<?php

use SilverStripe\Control\Email\Email;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;

class ContactForm extends Form
{

    protected $template = 'Includes/ContactForm';

    public function __construct($controller, $name)
    {

        $fields = FieldList::create(

            TextField::create('Name', 'Name'),           
            TextField::create('Organisation', 'Organisation'),
            EmailField::create('Email', 'Email'),
            TextField::create('Phone', 'Phone'),            
            TextareaField::create('Message', 'Feedback')                

        );

        $actions = FieldList::create(
            FormAction::create('doSubmit')->setTitle('Submit')->addExtraClass('btn')
        );

        $validator = new RequiredFields('Name', 'Email', 'Message');

        parent::__construct($controller, $name, $fields, $actions, $validator);

        $session = $controller->getRequest()->getSession();

        if ($values = $session->get('FormInfo.ContactForm_ContactForm.data')) {
            $this->loadDataFrom($values);
            $session->clear('FormInfo.ContactForm_ContactForm.data');
        }

        $this->addExtraClass('contact-form__form');

        Requirements::javascript('https://www.google.com/recaptcha/api.js');

        Requirements::customScript("
            function happyCaptcha(t) {
              $('#ContactForm_ContactForm_action_doSubmit').prop('disabled', false);
            }

            function unhappyCaptcha(t) {
              $('#ContactForm_ContactForm_action_doSubmit').prop('disabled', true);
            }

            unhappyCaptcha();");
    }

    public function RecaptchaKey()
    {
        return Config::inst()->get('GoogleRecaptcha', 'recaptcha_key');
    }

    public function Page()
    {
        return $this->controller;
    }

    public function doSubmit(array $data, Form $form, HTTPRequest $request)
    {
        unset($data['SecurityID']);

        $secret     = Config::inst()->get('GoogleRecaptcha', 'recaptcha_secret');
        $googleLink = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $data['g-recaptcha-response'];

        $verify = json_decode(file_get_contents($googleLink));

        $session = $this->controller->getRequest()->getSession();

        if ($verify->success) {
            unset($data['g-recaptcha-response']);
            unset($data['action_doSubmit']);

            $spam = json_decode(file_get_contents('http://www.stopforumspam.com/api?f=json&email=' . $data['Email']), true);

            if ($spam['email']['frequency'] > 3) {
                //what were we meant to do here???
                return $this->controller->redirect($this->controller->Link() . 'success');
            }

            $body = '';
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $body .= '<p><strong>' . $this->splitCase($key) . ':</strong></p>';
                    foreach ($value as $key2 => $value2) {
                        $body .= "<p> - $value2</p>";
                    }
                } else {
                    $body .= '<p><strong>' . $this->splitCase($key) . ':</strong> ' . nl2br($value) . '</p>';
                }
            }

            $to      = $this->Page()->NotifyEmail;
            $from    = 'noreply@ehinz.ac.nz';
            $subject = 'New feedback  from EHINZ website';
            $email   = new Email($from, $to, $subject, $body);

            if (!empty($to)) {
                $email->send();
            }

            //$session->set('page_alert', ['Message' => 'Your message has been submitted, thank you.', 'Type' => 'success']);
            //return $this->controller->redirect($this->controller->Link());
            return [
                'SuccessMessage' => 'Your message has been submitted, thank you.',
                'ContactForm' => ''
            ];
        } else {
            $session->set('FormInfo.ContactForm_ContactForm.data', $data);
            $session->set('page_alert', ['Message' => 'There was an issue sending your message. Please try again later or contact us directly.', 'Type' => 'error']);
            return $this->controller->redirectBack();
        }

    }

    public function splitCase($str)
    {
        return preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $str);
    }

}
