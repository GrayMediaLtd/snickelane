<?php
/**
 * Help Page
 *
 * Anh Le <anhle@thatbythem.com>
 */
class HelpPage extends Blog{
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/faq-16.png");
	
	/**
	 * Page name
	 */
	private static $singular_name = 'Help Page';
	
	/**
	 * Page description
	 */
	private static $description = 'Displays help articles.';
	
	/**
     * @var array
     */
    private static $allowed_children = array(
        'HelpArticle',
    );
	
	/**
	 * Update CMS fields
	 */
	public function getCMSFields() {
		// Get CMS fields
 		$fields = parent::getCMSFields();
		
		//
        return $fields;	
	}
	
	/**
     * This sets the title for our gridfield.
     *
     * @return string
     */
    public function getLumberjackTitle(){
        return _t('HelpPage.LumberjackTitle', 'Articles');
    }
}

/**
 * The controller class
 */
class HelpPage_Controller extends Blog_Controller{ 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
}