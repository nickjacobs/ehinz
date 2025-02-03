<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Control\Controller;
use SilverStripe\Control\Director;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Security\Permission;
use SilverStripe\View\Requirements;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FormAction;
use SilverStripe\ORM\ArrayLib;


class PublicationSearchController extends PageController
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


    public function PublicationSearchForm()
    {
        $topics=Topic::get()->Sort('Topic')->map('ID', 'Topic');

        $types = [
            "Surveillance Report" => "Surveillance Report",
            "Metadata" => "Metadata",
            "Report" => "Report"
        ];

        $form = Form::create(
            $this,
            'PublicationSearchForm',
            FieldList::create(
                TextField::create('Keywords')
                    ->setAttribute('placeholder', 'Search for keywords in title and summary...')
                    ->addExtraClass('form-group'),

                DropdownField::create('Topic','Topic')
                    ->setSource($topics)
                    ->setEmptyString('-- any --')
                    ->addExtraClass('form-group'),

                DropdownField::create('DocType','Type')
                    ->setSource($types)
                    ->setEmptyString('-- any --')
                    ->addExtraClass('form-group'),
            ),
            FieldList::create(
                FormAction::create('doPublicationSearch','Search')
                    //->addExtraClass('btn-lg btn-fullcolor')
            )
        );
        $form->setFormMethod('GET')
            ->addExtraClass('filter-form')
            ->setFormAction($this->Link())
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        return $form;
    }


    public function FilterFormUrl()
    {
        $request = $this->getRequest();
        return $request->getURL(false);
    }



    public function index(HTTPRequest $request)
    {

        $isQuery = false;
        $docs=DownloadFile::get()->filter('ID', 0);

        if($request->getVar('Topic') || $request->getVar('Keywords') || $request->getVar('DocType')){
            $docs = DownloadFile::get();
            $isQuery = true;
        }

        if ($topic = $request->getVar('Topic')) {
            $t = Topic::get()->byId($topic);
            $docs = $t->DownloadFiles();
        }
        if ($search = $request->getVar('Keywords')) {
            $docs = $docs->filterAny([
                'Title:PartialMatch' => $search,
                'Summary:PartialMatch' => $search,
                'Keywords:PartialMatch' => $search,
                'Filename:PartialMatch' => $search,

            ]);
        }
        if ($doctype = $request->getVar('DocType')) {
            $docs = $docs->filter([
                'DocType' => $doctype
            ]);
        }

        return [
            'Results' => $docs,
            'isQuery' => $isQuery
        ];
    }


    public function getTopicVar()
    {
         return $this->getRequest()->getVar('Topic');
    }
    public function getTypeVar()
    {
         return $this->getRequest()->getVar('DocType');
    }
    public function getQueryVar()
    {
         return $this->getRequest()->getVar('Keywords');
    }







}
