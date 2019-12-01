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




ShortcodeParser::get('default')->register('dashboard', function($arguments, $address, $parser, $shortcode) {
    
    $random = substr(md5(mt_rand()), 0, 7);

    return sprintf(
        '<div class="atlas-dashboard-wrapper" id="dashboard-%s"><script type="text/javascript" src="https://dashboards.instantatlas.com/viewer/embed/%s?container=dashboard-%s"></script></div>',
        $random,
        $address,
        $random
    );
});

//<div id="iao-dashboard" style="width: 800px; height: 600px;"><script type="text/javascript" src="https://dashboards.instantatlas.com/embed/a871bc83736540988d57020089f4f2f8?container=iao-dashboard"></script></div>


// $formats = [
//     [ 'title' => 'Headings', 'items' => [
//             ['title' => 'Heading 1', 'block' => 'h1' ],
//             ['title' => 'Heading 2', 'block' => 'h2' ],
//             ['title' => 'Heading 3', 'block' => 'h3' ],
//             ['title' => 'Heading 4', 'block' => 'h4' ],
//             ['title' => 'Heading 5', 'block' => 'h5' ],
//             ['title' => 'Heading 6', 'block' => 'h6' ],
//             [
//                 'title'           => 'Subtitle',
//                 'selector'        => 'p',
//                 'classes'         => 'title-sub',
//             ],
//         ]
//     ],
//     [
//         'title' => 'Misc Styles', 'items' => [
//             [
//                 'title' => 'Style 1',
//                 'selector' => 'ul',
//                 'classes' => 'style1',
//                 'wrapper' => true,
//                 'merge_siblings' => false,
//             ],
//             [
//                 'title' => 'Button red',
//                 'inline' => 'span',
//                 'classes' => 'btn-red',
//                 'merge_siblings' => true,
//             ],
//         ]
//     ],
// ];

// TinyMCEConfig::get('cms')
//     ->addButtonsToLine(1, 'styleselect')
//     ->setOptions([
//         'importcss_append' => true,
//         'style_formats' => $formats,
//     ]);