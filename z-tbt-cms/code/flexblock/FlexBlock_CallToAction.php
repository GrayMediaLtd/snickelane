<?php
/**
 * FlexBox Call To Action
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_CallToAction extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'CallToAction block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'CallToAction blocks';
	
	/**
	 * Has many
	 */
	private static $has_many = array(
		'Buttons' => 'TbtButton'
	);
	
	/**
	 * Possible custom HTML classes
	 */
	private static $possible_html_classes = array(
		
		'bg-brand-first',
		'bg-brand-second',
		'bg-brand-third',
		'bg-brand-fourth',
		'bg-brand-fifth',
		'color-bright',
		'p-t-0',
		'p-b-0',
		'p-t-1',
		'p-b-1',
		'p-t-2',
		'p-b-2',
		'p-t-3',
		'p-b-3',
		'p-t-4',
		'p-b-4',
		'p-t-5',
		'p-b-5',
		'p-l-0',
		'p-r-0',
		'p-l-1',
		'p-r-1',
		'p-l-2',
		'p-r-2',
		'p-l-3',
		'p-r-3',
		'p-l-4',
		'p-r-4',
		'p-l-5',
		'p-r-5'
	);
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
		$fields = parent::getCMSFields();
        
		// Fields
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::ImageUploadField('Image', _t('FlexBlock.CallToActionBackground', 'Background image'), 'Uploads/FlexBlocks') ); //
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 30) );
		
		if($this->ID > 0){
			$cfg = GridFieldConfig_RecordEditor::create(30);
		    $cfg->addComponent( new GridFieldOrderableRows('BBSort') );
			
			$fields->addFieldToTab('Root.Buttons',
				new GridField(
					'Buttons',
					_t('FlexBlock_CallToAction.Buttons', 'Buttons'),
					$this->Buttons(),
					(clone $cfg)
				)
			);
		}
		else{
			$fields->addFieldToTab('Root.Buttons', new LiteralField('FlexBlockCallToActionButtonNotice', '<p class="message notice">'._t('FlexBlock_CallToAction.SaveToAddButton', 'Save record to add button.').'</p>') );
		}
		
        //
		return $fields;
	}
}