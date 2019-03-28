<?php
/**
 * TBT Button object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TbtButton extends BaseBox{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Button';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Buttons';
	
	/**
	 * DB fields
	 */
	private static $db = array(
		'IconClass' => 'Varchar(18)'
	);
	
	/**
	 * Has many
	 */
	private static $has_one = array(
		'Banner' => 'Banner'
	);
	
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
	 * Icon list
	 */
	private static $icons = array();
	
	/**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['IconClass']        = _t('TbtButton.IconClass', 'Icon');
		$labels['HTMLClasses']      = _t('TbtButton.HTMLClasses', 'Custom HTML classes');
		$labels['LinkBehaviour'] 	= _t('TbtButton.LinkBehaviour', 'Link behaviour');
		$labels['LinkHash'] 	    = _t('TbtButton.LinkHash', 'Link hash');
		
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
		$icons  = $this->Config()->get('Icons');
		
		// Icon
		if( is_array($icons) && !empty($icons) )
		{
			$iconField = FontAwesomeField::create(
				'IconClass',
				$labels['IconClass'],
				$icons,
				explode(',', $this->getField('IconClass'))
			);
			
			$fields->insertAfter(
				$iconField,
				'HTMLClasses'
			);
		}
		
		// Add fields
		$fields->insertAfter(new TextField('LinkHash', $labels['LinkHash']), 'ExternalLink');
		
		// Remove fields
		$fields->removeByName('Content');
		
        //
		return $fields;
	}
	
	/**
	 * Parsed Icon Class
	 */
	public function ParsedIconClass(){
		return str_replace(',', ' ', $this->getField('IconClass'));
	}
	
	/**
	 * Link Behaviour
	 */
	public function LinkBehaviourAttr(){
		$out = '';
		
		switch($this->LinkBehaviour){
			case 1: $out = 'target="_blank"'; break;
			case 2: $out = 'rel="nofollow"'; break;
			case 3: $out = 'target="_blank" rel="nofollow"'; break;
			case 4: $out = 'rel="nofollow"'; break;
		}
		
		return $out;
	}
}