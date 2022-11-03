<?php

use SilverStripe\CMS\Controllers\ContentController;
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

    public function IndicatorsHolders() {
        return IndicatorsHolder::get()->filter('ParentID',6);
    }


    public function PageSummaryLinks() {
        return Page::get()->filter(['ClassName'=>['Page','DashboardPage','DashboardHolder'],'ParentID'=>$this->ID]);
    }

    public function StandardsListing()
    {
        $holder = StandardsHolder::get()->first();
        return StandardsPage::get()->filter(['ParentID' => $holder->ID]);
    }
}
