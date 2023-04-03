<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridFieldPaginator;

class IndicatorListAdmin extends ModelAdmin
{

    private static $managed_models = [
        'IndicatorListItem'
    ];

    private static $url_segment = 'indicator-list';

    private static $menu_title = 'Indicator List';


    
}
