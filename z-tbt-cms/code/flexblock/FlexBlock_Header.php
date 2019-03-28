<?php
/**
 * FlexBox Header
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Header extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Header block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Header blocks';
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
		$fields = parent::getCMSFields();
		
        //
		return $fields;
	}
}