<?php

namespace {

    use SilverStripe\Forms\LiteralField;



    class IndicatorsListPage extends Page
    {

        private static $db = [

        ];

        private static $has_one = [

        ];



        private static $description ="Indicators list page";

        private static $icon_class = 'font-icon-p-list';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab('Root.Main', LiteralField::create('lf1','<p class="alert alert-info">The indicator list is managed here: <a href="/admin/indicator-list/">Indicator List</a>'),'Content');

            return $fields;
        }


        public function IndicatorsList()
        {
            return Topic::get()->sort('Topic');

        }



    }

}
