<?php
/**
 * FlexBox Text box
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_TextBox extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Text box';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Text boxes';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Boxes' => 'TextBox'
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
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 15) );
		
		// Boxes
		$fields->insertAfter( ($tab = new Tab('TabBoxes', _t('FlexBlockTextBox.TabTextBoxes', 'Text Boxes'))), 'Main');
		
		$tab->push(
			new GridField(
				'Boxes',
				_t('FlexBlockTextBox.TextBoxes', 'Boxes'),
				$this->owner->Boxes(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'SortOrder')
			)
		);
		
        //
		return $fields;
	}
}