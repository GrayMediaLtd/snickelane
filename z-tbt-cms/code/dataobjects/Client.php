<?php
/**
 * Client object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Client extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Client';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Clients';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Name'          => 'Varchar(255)',
		'URL'           => 'Varchar(255)'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Logo' => 'Image'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Name',
		'LogoThumb'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Name',
		'URL'
    );
    
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
	}
	
	/**
     * Image thumbnail for gridfield
     */ 
	protected function getLogoThumb(){
		return $this->LogoID ? $this->Logo()->setWidth(60) : '';
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Name'] 	        = _t('Client.Name', 'Name');
		$labels['URL'] 	            = _t('Client.URL', 'URL');
		$labels['Logo'] 	        = $labels['LogoThumb'] = _t('Client.Logo', 'Logo');
		
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
			new TextField('URL', $labels['URL']),
			\TBTCMS\Libs\Helper::ImageUploadField('Logo', $labels['Logo'], 'Uploads/Clients/')
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
}