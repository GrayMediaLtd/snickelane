<?php
/**
 * Add extra fields to Dataobject Shortcode Gridfield
 */
class GridFieldDataobjectShortcodeExtraFields extends RequestHandler implements GridField_HTMLProvider {
	/**
	 * @var string $currentClass Current class name
	 */
	protected $currentClass;
	
	/**
	 * @var string placement indicator for this control
	 */
	protected $targetFragment;

	/**
	 * @param string $targetFrament
	 */
	public function __construct($currentClass, $targetFragment = 'after') {
		parent::__construct();
		
		$this->currentClass   = $currentClass;
		$this->targetFragment = $targetFragment;
		
		$this->extend('onAfterInit', $currentClass, $targetFragment);
	}

	/**
	 * @param GridField $gridField
	 * @return array
	 */
	public function getHTMLFragments($gridField) {
		// get current className
		$currentClass = $this->currentClass;
		
		/**
		 * Dropdown field to select template
		 */ 
		$templates = Config::inst()->get('DataobjectShortcode', 'Templates');
		$list      = array();
		
		if( isset($templates[$currentClass])
		   && is_array($templates[$currentClass])
		   && !empty($templates[$currentClass])
		){
			foreach( $templates[$currentClass] as $template => $labelData ){
				$label = $template;
				
				if( isset($labelData['label_translation_str']) && $labelData['label_translation_str'] ){
					$label = _t($labelData['label_translation_str'], $label);
				}
				elseif( isset($labelData['label']) && $labelData['label'] ){
					$label = $labelData['label'];
				}
				
				$list[$template] = $label;
			}
		}
		
		//
		$field = new DropdownField('Template', _t('DataobjectShortcode.Template', 'Template'), $list);
		$field->setValue( Controller::curr()->getRequest()->requestVar('ClassName') );
		$field->setEmptyString( _t('DataobjectShortcode.TemplateEmptyString', '- Default -') );
		
		//
		$fields = new CompositeField($field);
		
		//
		$this->extend('updateHTMLFragments', $fields, $gridField, $currentClass);
		
		//
		return array(
			$this->targetFragment => $fields->FieldHolder()->forTemplate() 
		);
	}
}