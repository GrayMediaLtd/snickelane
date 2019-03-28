<?php
/**
 * Work box object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class WorkBox extends BaseBox{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Work box';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Work boxes';
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Title',
		'Description',
		'ImageThumb'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Title'
    );
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['HTMLClasses'] 	    = _t('WorkBox.HTMLClasses', 'Icon class');
		
		// Return labels
		return $labels;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
		$fields = parent::getCMSFields();
        
		// Add fields
		$fields->push( \TBTCMS\Libs\Helper::ImageUploadField('Image', $labels['Image'], 'Uploads/WorkBoxes/') );
		
		// Remove fields
		$fields->removeByName('HTMLClasses');
        
        //
		return $fields;
	}
}