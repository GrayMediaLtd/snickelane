<?php
if (!class_exists("Widget")) {
    return;
}

/**
 * Social Network Widget
 *
 * Anh Le <anhle@thatbythem.com>
 */
class SocialNetworkWidget extends Widget
{
    /**
     * @var string
     */
    private static $title = 'Stay connected';

    /**
     * @var string
     */
    private static $cmsTitle = 'Social Network Widget';

    /**
     * @var string
     */
    private static $description = 'Displays Social Network buttons from Settings > Social networks.';
}

/**
 * Controller
*/
class SocialNetworkWidget_Controller extends WidgetController{}
