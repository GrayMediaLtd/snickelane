<?php
/**
 * FlexBox StaffMember
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_StaffMember extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Staff Member block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Staff Member blocks';
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'StaffMembers' => 'StaffMember'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'StaffMembers' => array(
            'RelSort' => 'Int'
        )
    );
	
	public function StaffMembers() {
        return $this->owner->getManyManyComponents('StaffMembers')->sort('RelSort');
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
		
		// StaffMembers
		$fields->insertAfter( ($tab = new Tab('TabStaffMembers', _t('FlexBlockStaffMember.TabStaffMembers', 'Staff Members'))), 'Main');
		
		$tab->push(
			new GridField(
				'StaffMembers',
				_t('FlexBlockStaffMember.StaffMembers', 'Staff Members'),
				$this->owner->StaffMembers(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'RelSort')
			)
		);
		
        //
		return $fields;
	}
}