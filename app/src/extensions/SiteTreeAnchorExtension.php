<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataExtension;

class SiteTreeAnchorExtension extends DataExtension
{
    public function updateAnchorsOnPage(array &$anchors): void
    {
        $owner = $this->owner;

        if (!($owner instanceof SiteTree)) {
            return;
        }

        if (!$owner->hasField('References') || !$owner->hasValue('References')) {
            return;
        }

        // Render the field safely
        $html = $owner->obj('References')->forTemplate();

        $parseSuccess = preg_match_all(
            '/\s+(name|id)\s*=\s*(["\'])([^\2\s>]*?)\2|\s+(name|id)\s*=\s*([^"\'>\s]+)[\s>]/im',
            $html,
            $matches
        );

        if ($parseSuccess >= 1) {
            $refsAnchors = array_merge($matches[3], $matches[5]);
            $anchors = array_merge($anchors, array_filter($refsAnchors));
            $anchors = array_values(array_unique($anchors));
        }
    }
}
