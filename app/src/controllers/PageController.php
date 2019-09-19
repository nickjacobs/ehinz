<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Control\Controller;
use SilverStripe\Control\Director;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Security\Permission;
use SilverStripe\View\Requirements;

use SilverStripe\blog\Model\BlogPost;

class PageController extends ContentController
{
    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * [
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * ];
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = [];

    protected function init()
    {
        parent::init();
    }

    public function LatestPosts($num = 3) {
        return BlogPost::get()->sort('PublishDate','desc')->limit($num);
    }

    public function FooterMenuItems($num = 3) {
        return Page::get()->filter(array('ShowInFooterMenu'=>1));
    } 

    public function FooterMenuItemsAbout() {
        return Page::get()->filter(array('ShowInFooterMenuAbout'=>1));
    }

    public function IndicatorsPages() {
        return IndicatorsPage::get();
    }


    
    
}
