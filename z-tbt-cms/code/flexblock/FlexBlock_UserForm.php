<?php
/**
 * FlexBox User Form
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_UserForm extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'User Form';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'User Forms';
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'UserFormPage' => 'Page'
	);
	
	/**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['UserFormPage'] = _t('FlexBlockUserForm.UserFormPage', 'UserForms Page');
		
		// Return labels
		return $labels;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
		$fields = parent::getCMSFields();
        
		// Fields
		$fields->addFieldToTab(
			'Root.Main',
			\TBTCMS\Libs\Helper::ImageUploadField('Image', $labels['Image'], 'Uploads/FlexBlocks')
		);
		
		$fields->addFieldToTab(
			'Root.Main',
			\TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 30)
		);
		
		$fields->insertBefore(
			$tree = new TreeDropdownField('UserFormPageID', $labels['UserFormPage'], 'SiteTree'),
			'Template'
		);
		
        //
		return $fields;
	}
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		parent::onBeforeWrite();
		
		if( $this->UserFormPageID > 0 ){
			$page = DataObject::get_one('SiteTree', '"ID" = '.$this->UserFormPageID);
			
			if(!$page){
				throw new ValidationException(
					ValidationResult::create(
						false,
						_t('FlexBlockUserForm.ValidationErrorPageNotExist', 'UserForms Page does not exist.')
					)
				);
			}
			
			if( !$page instanceof UserDefinedForm ){
				throw new ValidationException(
					ValidationResult::create(
						false,
						_t('FlexBlockUserForm.ValidationErrorPageNotUserForm', 'Selected page is not a UserDefinedForm page.')
					)
				);
			}
		}
	}
	
	/**
	 * Get form
	 */
	public function Form(){
		// from selected user-forms page
		$page = $this->UserFormPage();
		
		if( $page->exists() && $page instanceof UserDefinedForm )
		{
			$className  = $page->ClassName.'_Controller';
			
			$controller = new $className($page);
            $controller->init();
			
			return $controller->Form();
		}
		
		// from current page
		if( Controller::curr()->dataRecord instanceof UserDefinedForm ){
			return Controller::curr()->Form();
		}
		
		return false;
	}
}