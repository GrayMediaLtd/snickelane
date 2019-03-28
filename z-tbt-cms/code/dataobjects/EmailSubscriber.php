<?php
/**
 * Email Subscriber object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class EmailSubscriber extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Email Subscriber';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Email Subscribers';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Name'         => 'Varchar(255)',
        'Email' 	   => 'Varchar(255)'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Name',
		'Email',
		'Created'
	);
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Name'] 	        = _t('EmailSubscriber.Name', 'Name');
		$labels['Email'] 	        = _t('EmailSubscriber.Email', 'Email');
		
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
			new EmailField('Email', $labels['Email'])
		);
        
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
		// Validate inputs
		if( trim($this->Email) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('EmailSubscriber.ValidationErrorEmptyEmail', 'Email is required.')));
		}
		
		if( !Email::is_valid_address($this->Email) ){
			throw new ValidationException(ValidationResult::create(false, _t('EmailSubscriber.ValidationErrorInvalidEmail', 'Email is invalid.')));
		}
		
		$filter = array("\"Email\"" => $this->Email);
		
		if($this->ID) {
			$filter[] = array('"EmailSubscriber"."ID" <> ?' => $this->ID);
		}
		
		$existingRecord = DataObject::get_one('EmailSubscriber', $filter);
		
		if($existingRecord){
			throw new ValidationException(ValidationResult::create(false, _t('EmailSubscriber.ValidationErrorAlreadySubscribed', 'Email is already subscribed.')));
		}
		
		parent::onBeforeWrite();
	}
}