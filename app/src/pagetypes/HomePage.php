<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\TextareaField;

    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class HomePage extends Page
    {

        private static $db = [
            "QuickLinks" => "HTMLText",
            "QuickLinksHeading" => "Varchar(128)",
            "RegionalDashHeading" => "Varchar(128)",
            "RegionalDashDescription" => "HTMLText",
            "RegionalDashLinkText" => "Varchar(255)",
            "RegionalDashLink" => "Varchar(255)"

        ];

        private static $has_one = [

        ];

        private static $has_many = [
            "KeyFindings" => KeyFinding::class
         ];

        private static $owns = [
            'KeyFindings'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.QuickLinks', TextField::create("QuickLinksHeading","Quick Links Heading"));
            $fields->addFieldToTab('Root.QuickLinks', HTMLEditorField::create("QuickLinks","Quick Links Content"));

            $fields->addFieldsToTab('Root.Healthspace', [
                TextField::create("RegionalDashHeading","Regional dashboard heading"),
                HTMLEditorField::create("RegionalDashDescription","Regional dashboard description")->setRows(6),
                TextField::create("RegionalDashLinkText","Regional dashboard link text"),
                TextField::create("RegionalDashLink","Regional dashboard link"),
            ]);



            $config = GridFieldConfig_RecordEditor::create(100);
            $config->addComponent(new GridFieldOrderableRows());
            $gridField = new GridField("KeyFindings", "KeyFindings", $this->KeyFindings(), $config);
            $fields->addFieldToTab("Root.Main", $gridField,'Metadata');


            return $fields;
        }

    }

}
