<?php
/**
 * FlexBox Work box
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_WorkBox extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Work box';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Work boxes';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Boxes' => 'WorkBox'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'Boxes' => array(
            'SortOrder' => 'Int'
        )
    );
	
	public function Boxes() {
        return $this->owner->getManyManyComponents('Boxes')->sort('SortOrder');
    }
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
		$fields = parent::getCMSFields();
        
		// Fields
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::ImageUploadField('Image', $labels['Image'], 'Uploads/FlexBlocks') );
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 15) );
		
		// Boxes
		$fields->insertAfter( ($tab = new Tab('TabBoxes', _t('FlexBlockWorkBox.TabWorkBoxes', 'Work boxes'))), 'Main');
		
		$tab->push(
			new GridField(
				'Boxes',
				_t('FlexBlockWorkBox.WorkBoxes', 'Boxes'),
				$this->owner->Boxes(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(30, 'SortOrder')
			)
		);
		
        //
		return $fields;
	}
}

