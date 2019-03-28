<?php
/**
 * FlexBox Client
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_Banner extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Banner block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Banner blocks';
	
	/**
	 * DB fields
	 */
	private static $db = array(
		'Heights' => 'SimpleListFieldDB'
	);
	
	/**
	 * Many many
	 */
	private static $many_many = array(
		'Banners' => 'Banner'
	);
	
	/**
	 * Many many extra fields
	 */
	private static $many_many_extraFields = array(
        'Banners' => array(
            'SortOrder' => 'Int'
        )
    );
	
	public function Banners() {
        return $this->owner->getManyManyComponents('Banners')->sort('SortOrder');
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
		
		// Banners
		$fields->insertAfter( ($tab = new Tab('TabBanners', _t('FlexBlockClient.TabBanners', 'Banners'))), 'Main');
		
		$tab->push(
			new GridField(
				'Banners',
				_t('FlexBlockBanner.Banners', 'Banners'),
				$this->Banners(),
				\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(60, 'SortOrder')
			)
		);
		
		$tab->push(
			SimpleListField::create(
				'Heights',
				_t('FlexBlockBanner.Height', 'Heights')
			)
			->useScenario('banner_height')
		);
		
        //
		return $fields;
	}
	
	/**
	 * Get list of height values in JSON format
	 */
	public function JsonHeights(){
		// get items
		$items = $this->dbObject('Heights')->getItems();
		$out   = array();
		
		if($items){
			foreach($items as $item){
				$out[$item->screen] = $item->height;
			}
		}
		
		return Convert::array2json($out);
	}
}