<?php
/**
 * SocialNetwork object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class SocialNetwork extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Social Network';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Social Networks';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Title'         => 'Varchar(255)',
        'Code'	        => 'Varchar(255)',
		'URL'           => 'Varchar(255)',
		'SortOrder'     => 'Int'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Title',
		'URL'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Title',
		'URL'
    );
	
	/**
	 * Available services
	 */
	private static $available_services = array();
    
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
		$labels['Title'] 	        = _t('SocialNetwork.Title', 'Title');
		$labels['Code'] 	        = _t('SocialNetwork.Code', 'Code');
		$labels['URL'] 	            = _t('SocialNetwork.URL', 'URL');
		
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
			new TextField('Title', $labels['Title']),
			new TextField('URL', $labels['URL'])
		);
		
		$services = $this->getAvailableServices(true);
		
		if( !empty($services) ){
			$fields->push( new DropdownField('Code', _t('SocialNetwork.Service', 'Service'), $services) );
		}
        
        //
		return $fields;
	}
	
	/**
	 * Can view the record
	 */
	public function canView($member = null) {
        return true;
    }
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		// save sort order position
        if( !$this->SortOrder ){
            $this->SortOrder = self::get()->max('SortOrder') + 1;   
        }
		
		// Validate inputs
		if( trim($this->Title) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('SocialNetwork.ValidationErrorEmptyTitle', 'Title is required')));
		}
		
		if( trim($this->Code) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('SocialNetwork.ValidationErrorEmptyCode', 'Code is required')));
		}
		
		if( trim($this->URL) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('SocialNetwork.ValidationErrorEmptyURL', 'URL is required')));
		}
		else if( !$this->dbObject('URL')->isHyperlink() ){
			throw new ValidationException(ValidationResult::create(false, _t('SocialNetwork.ValidationErrorURLNotValid', 'URL is invalid')));
		}
		
		parent::onBeforeWrite();
	}
	
	/**
	 * Get available services
	 *
	 * @param boolean $i18n Enable i18n or not
	 * @return array [$service_code => $service_name]
	 */
	public function getAvailableServices($i18n = false){
		//
		$services = $this->stat('available_services');
		
		if( !empty($services) && $i18n ){
			foreach($services as $code => $name){
				$services[$code] = _t($this->class.'.'.$code, $name);
			}
		}
		
		$this->extend('updateAvailableServices', $services, $i18n);
		
		return $services;
	}
}