<?php
 

use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\Forms\HTMLEditor\HtmlEditorConfig;

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