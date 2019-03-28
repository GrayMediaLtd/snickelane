<?php
/**
 * Pricing Package object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class PricingPackage extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Package';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Packages';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Title'        => 'Varchar(255)',
        'Price'	       => 'Money',
		'Unit'         => 'Varchar',
		'HTMLClasses'  => 'Varchar(255)',
		'SortOrder'    => 'Int'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Title',
		'Price'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Title',
		'Price'
    );
	
	/**
	 * Has many
	 */
	private static $has_many = array(
		'Attributes'  => 'PricingPackageAttribute'
	);
    
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Title'] 	        = _t('PricingPackage.Title', 'Title');
		$labels['Price'] 	        = _t('PricingPackage.Price', 'Price');
		$labels['Unit'] 	        = _t('PricingPackage.Unit', 'Unit');
		$labels['HTMLClasses'] 	    = _t('PricingPackage.HTMLClasses', 'HTML Classes');
		
		// Return labels
		return $labels;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
        
		// Fields
		$root = TabSet::create('Root', ($tabMain = new Tab('Main', _t('SiteTree.TABMAIN', 'Main'))) )->setTemplate('CMSTabSet');
		
		$tabMain->push( new TextField('Title', $labels['Title']) );
		$tabMain->push( new MoneyField('Price', $labels['Price']) );
		$tabMain->push( new TextField('Unit', $labels['Unit']) );
		$tabMain->push( new TextField('HTMLClasses', $labels['HTMLClasses']) );
		
		if($this->ID > 0){
			$cfg = GridFieldConfig_RecordEditor::create(30);
		    $cfg->addComponent( new GridFieldOrderableRows('BBSort') );
			
			$tabMain->push(
				new GridField(
					'Buttons',
					_t('PricingPackage.Buttons', 'Buttons'),
					$this->Buttons(),
					(clone $cfg)
				)
			);
			
			$tabMain->push(
				new GridField(
					'Attributes',
					_t('PricingPackage.Attributes', 'Attributes'),
					$this->Attributes(),
					TBTCMS\Libs\Helper::GridFieldConfig_InlineEditor(60, 'SortOrder')
				)
			);
		}
		else{
			$tabMain->push( new LiteralField('PricingPackageButtonNotice', '<p class="message notice">'._t('PricingPackage.SaveToAddButtonAttribute', 'Save record to add buttons and attributes.').'</p>') );
		}
		
		// Extend fields
		$fields = new FieldList($root);
		
		$this->extend('updateCMSFields', $fields);
        
        //
		return $fields;
	}
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		//save sort order position
        if( !$this->SortOrder ){
            $this->SortOrder = self::get()->max('SortOrder') + 1;   
        }
		
		// Validate inputs
		if( trim($this->Title) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('PricingPackage.ValidationErrorEmptyTitle', 'Title is required')));
		}
		
		parent::onBeforeWrite();
	}
	
	/**
	 * Can view the record
	 */
	public function canView($member = null) {
        return true;
    }
	
	/**
	 * Get display title for GridFieldAddExistingSearchHandler.ss
	 */
	public function getExistingSearchItemTitle(){
		return sprintf('%s (%s)', $this->getTitle(), $this->Price->Nice());
	}
}

/**
 * Pricing Package Attribute object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class PricingPackageAttribute extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Attribute';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Attributes';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Name'         => 'Varchar(255)',
		'Value'        => 'Varchar(1000)',
		'SortOrder'    => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Package' => 'PricingPackage'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Name',
		'Value'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Name',
		'Value'
    );
    
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Name']     = _t('PricingPackageAttribute.Name', 'Name');
		$labels['Value']    = _t('PricingPackageAttribute.Value', 'Value');
		
		// Return labels
		return $labels;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
        
		// Fields
		$fields = new FieldList(
			new TextField('Name', $labels['Name']),
			new TextField('Value', $labels['Value'])
		);
        
        //
		return $fields;
	}
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		// save sort order position
        if( !$this->SortOrder ){
            $this->SortOrder = self::get()->max('SortOrder') + 1;   
        }
		
		parent::onBeforeWrite();
	}
	
	/**
	 * Can view the record
	 */
	public function canView($member = null) {
        return true;
    }
}