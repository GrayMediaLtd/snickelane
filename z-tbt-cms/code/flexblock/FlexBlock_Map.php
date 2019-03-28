<?php
/**
 * FlexBox Map
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Map extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Map block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Map blocks';
	
	/**
	 * Database fields
	 */
	private static $db = array(
		'MapCode' => 'Text'
	);
	
	 /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['MapCode'] = _t('FlexBlockMap.MapCode', 'Google Map Embed Code');
		
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
        
		// Fields
		$fields->addFieldToTab('Root.Main', new TextareaField('MapCode', $labels['MapCode']) );
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 30) );
		
        //
		return $fields;
	}
	
	/**
	 * Get map url by parsing MapCode
	 */
	public function getMapUrl(){
		//
		if( $this->hasField('MapCode') ){
			//
			$code = $this->getField('MapCode');
			
			preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $code, $matches);
			
			if( isset($matches[1]) && $matches[1] && \TBTCMS\Libs\Helper::isValidUrl($matches[1]) )
				return $matches[1];
		}
		
		return false;
	}
}