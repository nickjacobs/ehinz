<?php


namespace {

	use SilverStripe\ORM\DataObject;
    use SilverStripe\CMS\Model\SiteTree;
    use Sheadawson\Linkable\Forms\LinkField;
    use Sheadawson\Linkable\Models\Link;
    use SilverStripe\Forms\ListboxField;


	class IndicatorListItem extends DataObject
    {

        private static $db = [
            "Title" => "Varchar(128)",
            "Sort" => "Int"
        ];

        private static $has_one = [
            "PageLink" => Link::class,
        ];

        private static $many_many = [
            'Topics' => Topic::class
        ];

        private static $owns = [
            'Topics','PageLink'
        ];

        private static $summary_fields = [
            'Title','TopicsString' => 'Domains','PageLink.LinkURL' => 'Pagelink'
        ];

        private static $searchable_fields = [
          'Title',
          'Topics.Topic'
       ];

       public function TopicsString()
        {
            return implode(', ', $this->Topics()->column('Topic'));
        }

        private static $default_sort = 'Sort';

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->removeByName(["Sort","Topics"]);


            $fields->addFieldsToTab('Root.Main', [
                ListboxField::create(
                'Topics',
                'Domains',
                Topic::get()->map('ID', 'Topic')
                ),
                LinkField::create('PageLinkID','Override page link')->setDescription('This is optional - otherwise we\'ll use the default domain link')

            ], 'Metadata');


            return $fields;
        }

    }
}


 ?>
