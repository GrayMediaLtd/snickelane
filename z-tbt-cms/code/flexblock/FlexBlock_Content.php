<?php
/**
 * FlexBox Content
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Content extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Content block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Content blocks';
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
		$fields = parent::getCMSFields();
        
		// Fields
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::ImageUploadField('Image', $labels['Image'], 'Uploads/FlexBlocks') ); //
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 30) );
		
        //
		return $fields;
	}
}