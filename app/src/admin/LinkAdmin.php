<?php

use SilverStripe\Admin\ModelAdmin;

class LinkAdmin extends ModelAdmin 
{

    private static $managed_models = [
        'Link'        
    ];

    private static $url_segment = 'useful-links';

    private static $menu_title = 'Useful Links';
}