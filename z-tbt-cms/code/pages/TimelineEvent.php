<?php
/**
 * Timeline Event
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TimelineEvent extends BlogPost{
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/calendar-16.png");
	
	/**
	 * Page name
	 */
	private static $singular_name = 'Timeline Event';
	
	/**
	 * Page description
	 */
	private static $description = 'Displays single event.';
	
	/**
	 * Default parent
	 */
	private static $default_parent = 'Timeline';
	
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
class TimelineEvent_Controller extends BlogPost_Controller{ 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
}