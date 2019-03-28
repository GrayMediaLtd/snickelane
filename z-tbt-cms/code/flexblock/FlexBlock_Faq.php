<?php
/**
 * FlexBox Faq
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Faq extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Faq block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Faqs blocks';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Faqs' => 'Faq'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'Faqs' => array(
            'SortOrder' => 'Int'
        )
    );
	
	public function Faqs() {
        return $this->owner->getManyManyComponents('Faqs')->sort('SortOrder');
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
		
		// Faqs
		$fields->insertAfter( ($tab = new Tab('TabFaqs', _t('FlexBlockFaq.TabFaqs', 'Faqs'))), 'Main');
		
		$tab->push(
			new GridField(
				'Faqs',
				_t('FlexBlockFaq.Faqs', 'Faqs'),
				$this->owner->Faqs(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'SortOrder')
			)
		);
		
        //
		return $fields;
	}
}