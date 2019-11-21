<?php

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class BlogPostExtension extends DataExtension
{

    private static $db = [];
    private static $has_one = [];
    private static $belongs_to = [];
    private static $owns = [];
    

    public function NiceDatePublished()
    {
        $time = strtotime($this->owner->PublishDate);
        return date('j F Y', $time);
    }
    

    
}
