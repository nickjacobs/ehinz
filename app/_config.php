<?php
 

use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\Forms\HTMLEditor\HtmlEditorConfig;
use SilverStripe\View\Parsers\ShortcodeParser;


$formats = [    
                  
];


HtmlEditorConfig::get('cms')->enablePlugins('hr');

TinyMCEConfig::get('cms')
    ->addButtonsToLine(1, 'styleselect')
    ->addButtonsToLine(2, 'hr','blockquote')
    ->setOptions([
        //'importcss_append' => false,
        'style_formats' => $formats,
    ]);


SilverStripe\ORM\Search\FulltextSearchable::enable();

SilverStripe\View\Requirements::set_force_js_to_bottom(true);




ShortcodeParser::get('default')->register('dashboard', function($arguments, $address, $parser, $shortcode) {
    
    $random = substr(md5(mt_rand()), 0, 7);

    return sprintf(
        '<div class="atlas-dashboard-wrapper" id="dashboard-%s"><script type="text/javascript" defer="true" src="https://dashboards.instantatlas.com/embed/%s?container=dashboard-%s"></script></div><div class="atlas-iframe__caption"><a href="https://dashboards.instantatlas.com/viewer/report?appid=%s" target="_blank">View larger dashboard in new window</a></div>',
        $random,
        $address,
        $random,
        $address
    );
});




ShortcodeParser::get('default')->register('dashboardiframe', function($arguments, $address, $parser, $shortcode) {
    
    $random = substr(md5(mt_rand()), 0, 7);
    $height = (isset($arguments['height']) && $arguments['height']) ? $arguments['height'] : 600;

    return sprintf(        
        '<div class="atlas-iframe"><iframe height="%d" class="atlas-iframe__iframe" id="dashboard-%s" src="https://dashboards.instantatlas.com/viewer/report?appid=%s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div class="atlas-iframe__caption"><a href="https://dashboards.instantatlas.com/viewer/report?appid=%s" target="_blank">View larger dashboard in new window</a></div></div>',
        $height,
        $random,
        $address,
        $address
    );
});       




