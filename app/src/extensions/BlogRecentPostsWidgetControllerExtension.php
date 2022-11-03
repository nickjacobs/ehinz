<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Control\Director;
use SilverStripe\Blog\Model\Blog;

class BlogRecentPostsWidgetControllerExtension extends DataExtension {

    private static $db = [];
    private static $has_one = [];
    private static $belongs_to = [];
    private static $owns = [];
    

    public function isBlog()
    {        
        $page = Director::get_current_page();
        if ($page && ($page instanceof Blog)) {
            return true;            
        }
    }

}