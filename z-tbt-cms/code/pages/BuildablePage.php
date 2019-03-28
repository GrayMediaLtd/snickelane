<?php
/**
 * Buildable Page
 *
 * Anh Le <anhle@thatbythem.com>
 */
class BuildablePage extends Page {
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/tools-16.png");
	
    /**
	 * Page name
	 */
	private static $singular_name = 'Buildable Page';
	
	/**
	 * Page description
	 */
	private static $description = 'Uses flexible blocks to build a page.';
	
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
	
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
		
		$this->ProvideComments = 0;
	}
}

/**
 * The controller class
 */
class BuildablePage_Controller extends Page_Controller { 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
}