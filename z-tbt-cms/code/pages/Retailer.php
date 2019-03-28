<?php
/**
 * Retailer
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Retailer extends Page {
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/shop-16.png");
	
    /**
	 * Page name
	 */
	private static $singular_name = 'Retailer';
	
	/**
	 * Page description
	 */
	private static $description = 'Display retailer details';
	
	/**
	 * DB Fields
	 */
	private static $db = array(
		'Cuisine'   => 'Varchar(255)',
		'Type'      => 'Varchar(255)',
		'Phone'     => 'Varchar(30)',
		'Website'   => 'Varchar(255)',
		'Facebook'  => 'Varchar(255)',
		'Instagram' => 'Varchar(255)',
		'Twitter'   => 'Varchar(255)'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Logo'         => 'Image',
		'RetailerMenu' => 'File'
	);
	
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
		
		$this->ShowInMenus     = 0;
		$this->EnableHeader    = 1;
		$this->ProvideComments = 0;
	}
	
	/**
	 * Update CMS fields
	 */
	public function getCMSFields() {
		// Get CMS fields
 		$fields = parent::getCMSFields();
		
		// remove some fields
		$fields->removeByName('EnableHeader');
		$fields->removeByName('BrightHeader');
		$fields->removeByName('PageImage');
		
		// replace field
		$fields->replaceField(
			'PageHeading',
			new TextareaField('PageHeading', 'Heading')
		);
		
		// add fields
		$fields->addFieldsToTab('Root.TabHeader', array(
			new TextField('Cuisine', _t('Retailer.Cuisine', 'Cuisine') ),
			new TextField('Type', _t('Retailer.Type', 'Type') ),
			new TextField('Phone', _t('Retailer.Phone', 'Phone') ),
			new TextField('Website', _t('Retailer.Website', 'Website') ),
			new TextField('Facebook', _t('Retailer.Facebook', 'Facebook URL') ),
			new TextField('Instagram', _t('Retailer.Instagram', 'Instagram URL') ),
			new TextField('Twitter', _t('Retailer.Twitter', 'Twitter URL') )
		));
		
		$fields->addFieldsToTab('Root.TabImages', array(
			\TBTCMS\Libs\Helper::ImageUploadField(
				'Logo',
				_t('Retailer.Logo', 'Logo'),
				'Uploads/Pages/'.(int)$this->owner->ID
			),
			\TBTCMS\Libs\Helper::ImageUploadField(
				'PageImage',
				_t('Retailer.FeaturedImage', 'Featured image'),
				'Uploads/Pages/'.(int)$this->owner->ID
			)
		), 'Images');
		
		// file
		$fields->addFieldToTab('Root.Main',
			$file = new UploadField('RetailerMenu', _t('Retailer.Menu', 'Menu')),
			'Content'
		);
		
		$file->setAllowedFileCategories('doc');
	    $file->setFolderName('Uploads/Pages/'.(int)$this->owner->ID);
		
		//
        return $fields;	
	}
}

/**
 * The controller class
 */
class Retailer_Controller extends Page_Controller { 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
}