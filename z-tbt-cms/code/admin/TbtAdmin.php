<?php
/**
 * TBT Admin
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TbtAdmin extends ModelAdmin
{
	/**
	 *
	 */
    private static $managed_models = array('BaseBox', 'FlexBlock', 'StaffMember', 'EmailSubscriber');
	
	/**
	 *
	 */
    private static $url_segment = 'tbtadmin';
    
	/**
	 *
	 */
	private static $menu_title  = 'Advanced';
	
	
	/**
	 *
	 */
	private static $model_importers = array();
	
	/**
	 * Sortable classes, requires GridFieldOrderableRows.
	 *
	 * @example array('ClassName1' => 'SortField', 'ClassName2' => 'SortField');
	 */
	private static $sortable_classes = array();
    
    /**
     * Method to init
     */
    public function init(){
        parent::init();
    }
	
	/**
	 * Get Form to Edit
	 */ 
	public function getEditForm($id = null, $fields = null) {
		//
        $form      = parent::getEditForm($id, $fields);
		$gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass));
		
		//
		if( $gridField instanceof GridField )
		{
			// remove print and export buttons
			$gridField->getConfig()->removeComponentsByType($gridField->getConfig()->getComponentByType('GridFieldExportButton'));
			$gridField->getConfig()->removeComponentsByType($gridField->getConfig()->getComponentByType('GridFieldPrintButton'));
			
			// remove `add new` button
			if( $this->modelClass == 'BaseBox' ){
				$gridField->getConfig()->removeComponentsByType($gridField->getConfig()->getComponentByType('GridFieldAddNewButton'));
			}
		}
		
		/**
		 * Sortable classes
		 */
		$SortableClasses = $this->stat('sortable_classes');
		
        if( !empty($SortableClasses)
		   && isset( $SortableClasses[$this->modeClass] )
		   && is_string( $SortableClasses[$this->modeClass] )
		   && $SortableClasses[$this->modeClass] != ''
		   && $gridField instanceof GridField
		)
		{
			$gridField->getConfig()->addComponent(new GridFieldOrderableRows( $SortableClasses[$this->modeClass] ));
        }
		
		
		
        return $form;
    }
}
