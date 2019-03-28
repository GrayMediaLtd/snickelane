<?php
/**
 * Contact Page
 *
 * Anh Le <anhle@thatbythem.com>
 */
class ContactPage extends UserDefinedForm{
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/mail-16.png");
	
	/**
	 * Page name
	 */
	private static $singular_name = 'Contact page';
	
	/**
	 * Page description
	 */
	private static $description = 'Displays contact form and contact information.';
	
	/**
	 * Has_one
	 */
	private static $has_one = array();
	
	/**
	 * Defaults
	 */
	private static $defaults = array();
	
	/**
	 * Enable Flexible Block
	 *
	 * @see TBT_Page_Extension
	 */
	private static $enable_flex_blocks = true;
	
	/**
	 * Update CMS fields
	 */
	public function getCMSFields() {
		// Get CMS fields
 		$fields = parent::getCMSFields();
		
		//
        return $fields;	
	}
}

/**
 * The controller class
 */
class ContactPage_Controller extends UserDefinedForm_Controller{ 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
		
		// Block internal javascripts
		Requirements::block(THIRDPARTY_DIR . '/jquery/jquery.js');
		
		// Block default styles
		Requirements::block(USERFORMS_DIR . '/css/UserForm.css');
	}
}