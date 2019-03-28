<?php
/**
 * Help Article
 *
 * Anh Le <anhle@thatbythem.com>
 */
class HelpArticle extends BlogPost{
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/question-16.png");
	
	/**
	 * Page name
	 */
	private static $singular_name = 'Help Article';
	
	/**
	 * Page description
	 */
	private static $description = 'Displays single help article.';
	
	/**
	 * Default parent
	 */
	private static $default_parent = 'HelpPage';
	
	/**
     * @var array
     */
    private static $allowed_children = array();
	
	/**
     * @var bool
     */
    private static $can_be_root = false;

    /**
     * This will display or hide the current class from the SiteTree. This variable can be
     * configured using YAML.
     *
     * @var bool
     */
    private static $show_in_sitetree = false;
	
	/**
	 * Defaults
	 */
	private static $defaults = array(
	    'ShowInMenus' => 0
	);
	
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
		
		$this->ShowInMenus = 0;
	}
	
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
class HelpArticle_Controller extends BlogPost_Controller{ 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
}