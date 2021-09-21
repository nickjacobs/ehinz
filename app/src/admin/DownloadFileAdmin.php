<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\ORM\DataObject;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class DownloadFileAdmin extends ModelAdmin 
{

    private static $managed_models = [
        'DownloadFile','Topic'      
    ];

    private static $url_segment = 'download-files';

    private static $menu_title = 'Download Files';



    


}
