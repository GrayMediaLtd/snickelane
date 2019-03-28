<?php
/**
 * FlexBox Pricing Table
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_PricingTable extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Pricing table';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Pricing tables';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Packages' => 'PricingPackage'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'Packages' => array(
            'RelSort' => 'Int'
        )
    );
	
	public function Packages() {
        return $this->owner->getManyManyComponents('Packages')->sort('RelSort');
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
		
		// Packages
		$fields->insertAfter( ($tab = new Tab('TabPackages', _t('FlexBlockPricingTable.TabPackages', 'Packages'))), 'Main');
		
		$tab->push(
			new GridField(
				'Packages',
				_t('FlexBlockPricingTable.Packages', 'Packages'),
				$this->owner->Packages(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'RelSort')
			)
		);
		
        //
		return $fields;
	}
}