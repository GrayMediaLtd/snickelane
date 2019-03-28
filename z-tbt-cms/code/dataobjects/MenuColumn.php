<?php
/**
 * MenuColumn object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class MenuColumn extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Menu Column';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Menu Columns';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Title'         => 'Varchar(255)',
        'SortOrder'	    => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Page' => 'Page'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Title'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Title'
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
		$labels['Title'] = _t('MenuColumn.Title', 'Title');
		
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
			new TextField('Title', $labels['Title'])
		);
        
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
		
		parent::onBeforeWrite();
	}
	
	/**
	 * Get menu items
	 *
	 * @return DataList SiteTree objects
	 */
	public function getMenuItems(){
		return DataList::create('Page')->filter('MenuColumnNum', $this->ID)->sort('Sort', 'ASC');
	}
}