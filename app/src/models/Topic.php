<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;   
    use SilverStripe\Forms\TextField;
    use Sheadawson\Linkable\Forms\LinkField;
    use Sheadawson\Linkable\Models\Link;
   

       

    class Topic extends DataObject
    {

        private static $db = [ 
            "Topic" => "Varchar(128)"            
        ]; 

        private static $has_one = [
            "PageLink" => Link::class,
        ]; 
        
        private static $owns = [
            'PageLink'
        ];

        private static $summary_fields = [
            'Topic','PageLink.LinkURL' => 'Domain link'
        ];

        private static $belongs_many_many = array(
            'DownloadFiles' => DownloadFile::class,
            'IndicatorListItems' => IndicatorListItem::class,
        );
       

        private static $default_sort = 'Topic';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName('DownloadFiles','IndicatorListItems');

            $fields->addFieldsToTab("Root.Main", [
                new TextField("Topic","Topic"),
                LinkField::create('PageLinkID','Domain link')->setDescription('Links to the domain page')
            
            ]);
            

            return $fields;
        }


        //public function 

    }

    


}
