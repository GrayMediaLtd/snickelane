<?php
/**
 * Icon Box object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class IconBox extends BaseBox{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Icon box';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Icon boxes';
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Title',
		'Link'
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
		$labels['HTMLClasses'] = _t('IconBox.HTMLClasses', 'Icon class');
		
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
		$fields->removeByName('Image');
        
		
		// Icons
		$icons = singleton('TbtButton')->Config()->get('Icons');
		
		if( is_array($icons) && !empty($icons) )
		{
			$iconField = FontAwesomeField::create(
				'HTMLClasses',
				$labels['HTMLClasses'],
				$icons,
				explode(',', $this->getField('HTMLClasses'))
			);
			
			$fields->replaceField(
				'HTMLClasses',
				$iconField
			);
		}
		
        //
		return $fields;
	}
	
	/**
	 * Get display title for GridFieldAddExistingSearchHandler.ss
	 */
	public function getExistingSearchItemTitle(){
		return sprintf('%s (%s)', $this->getTitle(), $this->HTMLClasses);
	}
	
	/**
	 * Parsed Icon Class
	 */
	public function IconClass(){
		return str_replace(',', ' ', $this->getField('HTMLClasses'));
	}
}