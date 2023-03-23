<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\ORM\DataObject;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class TopicAdmin extends ModelAdmin 
{

    private static $managed_models = [
        'Topic'  
    ];

    private static $url_segment = 'domains';

    private static $menu_title = 'Domains';



    


}
