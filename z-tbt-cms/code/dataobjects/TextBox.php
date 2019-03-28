<?php
/**
 * Text Box object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TextBox extends BaseBox{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Text box';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Text boxes';
	
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
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
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
        
		// Remove fields
		$fields->removeByName('HTMLClasses');
		$fields->removeByName('Content');
		
		//
		$fields->push( \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 18) );
		$fields->push( \TBTCMS\Libs\Helper::ImageUploadField('Image', $labels['Image'], 'Uploads/Boxes') );
        
        //
		return $fields;
	}
}