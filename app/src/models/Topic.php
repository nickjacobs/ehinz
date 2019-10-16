<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;   
    use SilverStripe\Forms\TextField;
   

       

    class Topic extends DataObject
    {

        private static $db = [ 
            "Topic" => "Varchar(128)"            
        ];        

        private static $summary_fields = [
            'Topic'
        ];

        private static $belongs_many_many = array(
            'DownloadFiles' => DownloadFile::class,
        );

        private static $default_sort = 'Topic';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName('DownloadFiles');

            $fields->addFieldToTab("Root.Main", new TextField("Topic","Topic"));

            return $fields;
        }

    }

    


}
