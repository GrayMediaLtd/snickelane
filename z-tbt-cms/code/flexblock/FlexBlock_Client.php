<?php
/**
 * FlexBox Client
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Client extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Client block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Client blocks';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Clients' => 'Client'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'Clients' => array(
            'SortOrder' => 'Int'
        )
    );
	
	public function Clients() {
        return $this->owner->getManyManyComponents('Clients')->sort('SortOrder');
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
		
		// Clients
		$fields->insertAfter( ($tab = new Tab('TabClients', _t('FlexBlockClient.TabClients', 'Clients'))), 'Main');
		
		$tab->push(
			new GridField(
				'Clients',
				_t('FlexBlockClient.Clients', 'Clients'),
				$this->owner->Clients(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'SortOrder')
			)
		);
		
        //
		return $fields;
	}
}