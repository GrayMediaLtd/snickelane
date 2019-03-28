<?php
/**
 * FlexBox Retailer
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Retailer extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Retailer block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Retailer blocks';
	
	/**
	 * DB fields
	 */
	private static $db = array(
		'Count' => 'Int'
	);
	
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
		
		$this->Count = 6;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields() {
        //
		$labels = $this->fieldLabels();
 		$fields = parent::getCMSFields();
        
		// Fields
		$fields->addFieldToTab(
			'Root.Main',
			NumericField::create('Count', 'Count')
			->setDescription('Number of retailers to display.')
		);
		
        //
		return $fields;	
	}
	
	/**
     * Get Retailers
     *
     * @return DataList of Retailer objects
     */
    public function Retailers(){
		//
		if($this->Count > 0){
			$records = Retailer::get()->limit($this->Count);
			
			$this->extend('updateRetailers', $records);
			
			return $records;
		}
		
        return false;
    }
}