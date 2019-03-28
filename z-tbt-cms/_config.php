<?php
// Set tbtCMS folder name
define('TBTCMS', basename(__DIR__));

// Set the resizing image quality
GD::set_default_quality(100);

// Enable full-text search
FulltextSearchable::enable();

// TBT Admin icon
Config::inst()->update('TbtAdmin', 'menu_icon', TBTCMS.'/assets/images/icons/box-16.png');

// Shortcodes
$scp = ShortcodeParser::get('default');
$scp->register('button', array('TBT_ShortCodes', 'Button'));
$scp->register('video', array('TBT_ShortCodes', 'Video'));
$scp->register('image', array('TBT_ShortCodes', 'Image'));
$scp->register('quote', array('TBT_ShortCodes', 'Quote'));
$scp->register('dataobject', array('TBT_ShortCodes', 'Dataobject'));

// HTML Editor
$HTMLEditor = HtmlEditorConfig::get('cms');
$HTMLEditor->addButtonsToLine(3, array('separator','fontsizeselect','forecolor','backcolor','shortcodes','video','dataobjectshortcode'));
$HTMLEditor->setOption('theme_advanced_blockformats', 'div,p,h1,h2,h3,h4,h5,h6,blockquote,pre,code');
$HTMLEditor->enablePlugins(
    array(
        'shortcodes' => '../../../'.TBTCMS.'/assets/javascripts/tinymce_plugins/shortcodes/editor_plugin.js',
        'video' => '../../../'.TBTCMS.'/assets/javascripts/tinymce_plugins/video/editor_plugin.js',
        'dataobjectshortcode' => '../../../'.TBTCMS.'/assets/javascripts/tinymce_plugins/dataobjectshortcode/editor_plugin.js'
    )
);

// Remove link to Dataobject Shortcode Admin in CMS Menu
CMSMenu::remove_menu_item('DataobjectShortCodeAdmin');

// Disable hash link rewrite
Config::inst()->update('SSViewer', 'rewrite_hash_links', false);
