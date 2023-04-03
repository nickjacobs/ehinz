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


    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);
        $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass));
        if ($gridField) {
            $config = $gridField->getConfig();
            $paginator = $config->getComponentByType('GridFieldPaginator');
            if ($paginator) {
                $paginator->setItemsPerPage(1000);
            } else {
                $config->addComponent(new GridFieldPaginator(1000));
            }
        }
        return $form;
    }
}
