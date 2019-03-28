<?php
/**
 * DataobjectShortCodeAdmin
 *
 * Anh Le <anhle@thatbythem.com>
 */
class DataobjectShortCodeAdmin extends ModelAdmin
{	
	/**
	 *
	 */
    private static $url_segment = 'dataobjectshortcodeadmin';
    
	/**
	 *
	 */
	private static $menu_title  = 'DOB Shortcode';
	
	/**
	 * Disable import form
	 */
	public $showImportForm = false;
	
	/**
	 *
	 */
	private static $model_importers = array();
    
    /**
     * Method to init
     */
    public function init(){
		// validate
		$classNames      = $this->stat('managed_models');
		$callableClasses = array();
		
		if( is_array($classNames) && !empty($classNames) ){
			foreach($classNames as $className){
				if( is_string($className) && ClassInfo::dataClassesFor($className) ){
					$callableClasses[] = $className;
				}
			}
		}
		
		if( empty($callableClasses) ){
			echo '<p class="message warning" style="margin: 15px;">'._t('DataobjectShortCodeAdmin.WarningNoCallableClasses', 'No callable dataobject found. Please setup at least one.').'</p>'; exit;
		}
		
		//
        parent::init();
		
		// Add assets
		Requirements::css(TBTCMS.'/assets/css/DataobjectShortCodeAdmin.css');
		Requirements::javascript(TBTCMS.'/assets/javascripts/jquery.serializejson.min.js');
		Requirements::javascript(TBTCMS.'/assets/javascripts/DataobjectShortCodeAdmin.js');
    }
	
	/**
	 * Hide main menu
	 */
	public function Menu() {
		return false;
	}
	
	/**
	 * Get Form to Edit
	 */ 
	public function getEditForm($id = null, $fields = null) {
		//
        $form      = parent::getEditForm($id, $fields);
		$singleton = singleton($this->modelClass);
		$gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass));
		
		//
		if( $gridField instanceof GridField )
		{
			//
			$gridField->addExtraClass('dataobjectshortcode-gridfield');
			
			// get gridfield configuration
			$gridCfg = $gridField->getConfig();
			
			// remove print and export buttons
			$gridCfg->removeComponentsByType($gridCfg->getComponentByType('GridFieldExportButton'));
			$gridCfg->removeComponentsByType($gridCfg->getComponentByType('GridFieldPrintButton'));
			
			// add components
			$gridCfg->addComponent( new GridFieldDataobjectShortcodeExtraCols() );
			
			// set display fields
			$displayFields = $this->stat('display_fields');
		    $displayCols   = array();
			
			if( isset($displayFields[$this->modelClass])
			   && is_array($displayFields[$this->modelClass])
			   && !empty($displayFields[$this->modelClass])
			){
				foreach( $displayFields[$this->modelClass] as $displayField => $labelData ){
					$label = $singleton->fieldLabel($displayField);
					
					if( isset($labelData['label_translation_str']) && $labelData['label_translation_str'] ){
						$label = _t($labelData['label_translation_str'], $label);
					}
					elseif( isset($labelData['label']) && $labelData['label'] ){
						$label = $labelData['label'];
					}
					
					$displayCols[$displayField] = $label;
				}
			}
			
			if( !empty($displayCols) ){
				$gridCfg->getComponentByType('GridFieldDataColumns')->setDisplayFields($displayCols);
			}
			
			// Add dropdown field for selecting template
			$templates = $this->stat('templates');
			$list      = array();
			
			if( isset($templates[$this->modelClass])
			   && is_array($templates[$this->modelClass])
			   && !empty($templates[$this->modelClass])
			){
				foreach( $templates[$this->modelClass] as $template => $labelData ){
					$label = $template;
					
					if( isset($labelData['label']) && $labelData['label'] ){
						$label = $labelData['label'];
					}
					
					if( isset($labelData['label_translation_str']) && $labelData['label_translation_str'] ){
						$label = _t($labelData['label_translation_str'], $label);
					}
					
					$list[$template] = $label;
				}
			}
			
			$field = new DropdownField('Template', _t('DataobjectShortcode.Template', 'Template'), $list);
		    $field->setEmptyString( _t('DataobjectShortcode.TemplateEmptyString', '- Default -') );
			$field->addExtraClass('no-change-track');
			
			$form->Fields()->insertBefore($field, $this->sanitiseClassName($this->modelClass));
			
			$form->Fields()->push(
				new LiteralField('TipMsg', '<p class="message warning">Tip: before do insert, drag <span class="gdsec-move-icon"></span> icons to sort the checked values.</p>')
			);
			
			$form->Fields()->push(
				HiddenField::create('ClassName')->setValue($this->modelClass)
			);
			
			// Add form actions
			$form->Actions()->push(
				FormAction::create('insert', _t('HtmlEditorField.ButtonInsertDataobjectShortcode', 'Insert as Shortcode'))
				->addExtraClass('ss-ui-action-constructive')
				->setAttribute('data-icon', 'accept')
				->setUseButtonTag(true)
			);
			
			// Set form template
			$form->setTemplate( array('GridFieldDataobjectShortcodeExtraFields_EditForm') );
			
			// Add extra class to the form
			$form->addExtraClass('dataobject-shortcode-list-form');
		}
		
		//
		$this->extend('updateEditForm', $form);
		
		//
        return $form;
    }
}
