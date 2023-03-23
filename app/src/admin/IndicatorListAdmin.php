<?php

use SilverStripe\Admin\ModelAdmin;

class IndicatorListAdmin extends ModelAdmin 
{

    private static $managed_models = [
        'IndicatorListItem'        
    ];

    private static $url_segment = 'indicator-list';

    private static $menu_title = 'Indicator List';
}