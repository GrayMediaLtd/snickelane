<?php
/**
 * FlexBox Testimonial
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Testimonial extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Testimonial block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Testimonial blocks';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Testimonials' => 'Testimonial'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'Testimonials' => array(
            'SortOrder' => 'Int'
        )
    );
	
	public function Testimonials() {
        return $this->owner->getManyManyComponents('Testimonials')->sort('SortOrder');
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
		
		// Testimonials
		$fields->insertAfter( ($tab = new Tab('TabTestimonials', _t('FlexBlockTestimonial.TabTestimonials', 'Testimonials'))), 'Main');
		
		$tab->push(
			new GridField(
				'Testimonials',
				_t('FlexBlockTestimonial.Testimonials', 'Testimonials'),
				$this->owner->Testimonials(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'SortOrder')
			)
		);
		
        //
		return $fields;
	}
}