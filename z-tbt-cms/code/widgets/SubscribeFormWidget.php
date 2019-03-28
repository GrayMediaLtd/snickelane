<?php
if (!class_exists("Widget")) {
    return;
}

/**
 * Subscribe Form Wiget
 *
 * Anh Le <anhle@thatbythem.com>
 */
class SubscribeFormWidget extends Widget
{
    /**
     * @var string
     */
    private static $title = 'Subscribe Form';

    /**
     * @var string
     */
    private static $cmsTitle = 'Subscribe Form Widget';

    /**
     * @var string
     */
    private static $description = 'Displays Subscribe Form.';
	
	/**
	 * Subcribe Form
	 */ 
	public function SubscribeForm() {
		//
		$controller = Controller::curr();
		$controller = ($controller instanceof Page_Controller) ? $controller : new Page_Controller( Page::get()->filter('URLSegment', 'home')->First() );
		
	    return $controller->SubscribeForm();
	}
}

/**
 * Controller
*/
class SubscribeFormWidget_Controller extends WidgetController{
}
