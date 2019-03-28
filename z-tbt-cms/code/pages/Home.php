<?php
/**
 * Home page
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Home extends Page {
    /**
	 * Page name
	 */
	private static $singular_name = 'Home';
	
	/**
	 * Page description
	 */
	private static $description = 'Basic Home Page';
	
	/**
	 * DB Fields
	 */
	private static $db = array();
	
	/**
	 * Enable Banners tab
	 *
	 * @see TBT_Page_Extension
	 */
	private static $enable_banners = false;
	
	/**
	 * Enable Flexible Block
	 *
	 * @see TBT_Page_Extension
	 */
	private static $enable_flex_blocks = true;
}

/**
 * The controller class
 */
class Home_Controller extends Page_Controller { 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
}