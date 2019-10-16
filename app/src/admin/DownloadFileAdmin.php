<?php

use SilverStripe\Admin\ModelAdmin;

class DownloadFileAdmin extends ModelAdmin 
{

    private static $managed_models = [
        'DownloadFile','Topic'      
    ];

    private static $url_segment = 'download-files';

    private static $menu_title = 'Download Files';
}
