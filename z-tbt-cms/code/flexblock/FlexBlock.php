<?php
/**
 * FlexBox object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock extends DataObject implements PermissionProvider{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Flexible block';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Flexible blocks';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Title'         => 'Varchar(255)',
		'Heading'       => 'Varchar(255)',
		'Content'       => 'HTMLText',
		'Template'      => 'Varchar(255)',
		'FBSort'        => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Image' => 'Image'
	);
	
	/**
	 * Belongs many many
	 */
	private static $belongs_many_many = array(
		'Pages' => 'Page'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'BlockID',
		'Title',
		'ClassNiceName',
		'Template'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'ClassName',
		'Title'
    );
	
	/**
	 * Casting
	 */
	private static $casting = array(
		'ClassNameCasting'   => 'Varchar(255)',
		'CastingHTMLClasses' => 'Text',
		'BlockID'            => 'Varchar'
	);
    
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
	}
	
	/**
     * Image thumbnail for gridfield
     */ 
	protected function getImageThumb(){
		return $this->Image()->setWidth(120);
	}
	
	/**
	 * Get block id
	 */
	protected function BlockID(){
		return DBField::create_field('Varchar', '#block-'.$this->ID);
	}
	
	/**
	 * Get nice name for class
	 */ 
	public function getClassNiceName(){
		return DBField::create_field('HTMLText', singleton($this->class)->i18n_singular_name());
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['ClassName'] 	    = $labels['ClassNiceName'] = _t('FlexBlock.ClassName', 'Type');
		$labels['Title'] 	        = _t('FlexBlock.Title', 'Block Name');
		$labels['Heading'] 	        = _t('FlexBlock.Heading', 'Block Heading');
		$labels['Content'] 	        = _t('FlexBlock.Content', 'Block Intro');
		$labels['BlockID'] 	        = _t('FlexBlock.BlockID', 'Block ID');
		$labels['Image'] 	        = $labels['ImageThumb'] = _t('FlexBlock.Image', 'Image');
		
		// Return labels
		return $labels;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
        
		// Fields
		$root = TabSet::create('Root', ($tabMain = new Tab('Main', _t('SiteTree.TABMAIN', 'Main'))) )->setTemplate('CMSTabSet');
		
		$tabMain->push( new TextField('Title', $labels['Title']) );
		
		if($this->ID <= 0){
			$tabMain->insertBefore( DropdownField::create('ClassNameCasting', $labels['ClassName'], $this->getClassNames() )->addExtraClass('no-change-track'), 'Title' );
			$tabMain->push( new LiteralField('TipMsg', '<p class="message warning">'._t('FlexBlock.SaveToAddMoreDetails', 'You can add more details after saving record.').'</p>') );
		}
		else{
			// heading
			$tabMain->insertBefore( new ReadonlyField('BlockIDText', $labels['BlockID'], $this->BlockID()), 'Title');
			$tabMain->push( $heading = new TextField('Heading', $labels['Heading']) );
			$heading->setDescription( _t('FlexBlock.Optional', 'Optional') );
			
		
			
			// custom HTML classes
			$htmlClasses = $this->possibleHTMLClasses();
			
			if( is_array($htmlClasses) && !empty($htmlClasses) ){
				$tabMain->push(
					$HTMLClass = StringTagField::create(
						'CastingHTMLClasses',
						_t('FlexBlock.CustomHTMLClasses', 'HTML classes'),
						$htmlClasses,
						explode(' ', $this->getField('HTMLClasses'))
					)
				);
			}
			else{
				$tabMain->push( $HTMLClass = new TextField('ManyMany[HTMLClasses]', _t('FlexBlock.CustomHTMLClasses', 'HTML classes')) );
				$HTMLClass->setDescription( _t('FlexBlock.CustomHTMLClassesDesc', 'Optional, custom HTML classes, separate by spaces.') );
			}
			
			// Add dropdown field for selecting template
			$templates = $this->stat('templates');
			$list      = array();
			
			if( isset($templates[$this->ClassName])
			   && is_array($templates[$this->ClassName])
			   && !empty($templates[$this->ClassName])
			){
				foreach( $templates[$this->ClassName] as $template => $labelData ){
					$label = $template;
					
					if( isset($labelData['label']) && $labelData['label'] ){
						$label = $labelData['label'];
					}
					
					if( isset($labelData['label_translation_str']) && $labelData['label_translation_str'] ){
						$label = _t($labelData['label_translation_str'], $label);
					}
					
					$list[$template] = $label;
				}
				
				asort($list);
			}
			
			$field = new DropdownField('Template', _t('FlexBox.Template', 'Block Style'), $list);
		    $field->setEmptyString( _t('FlexBox.TemplateEmptyString', '- Default -') );
			
			$tabMain->push($field);
		}
		
		// Extend fields
		$fields = new FieldList($root);
		
		$this->extend('updateCMSFields', $fields);
        
        //
		return $fields;
	}
	
	/**
	 * Return a list of class name
	 *
	 * @return array
	 */
	protected function getClassNames(){
		//
		$classes      = ClassInfo::getValidSubClasses('FlexBlock');
		$list         = array();
		
		foreach($classes as $class) {
			$instance = singleton($class);
			
			if ($this->ClassName != $instance->ClassName) {
				if($instance instanceof HiddenClass) continue;
			}
			
			if($perms = $instance->stat('need_permission')) {
				if(!$this->can($perms)) continue;
			}
			
			$singularName = $instance->i18n_singular_name();
			$list[$class] = $singularName;
			
			if(i18n::get_lang_from_locale(i18n::get_locale()) != 'en') {
				$list[$class] = $list[$class] . " ({$class})";
			}
		}
		
		// sort alphabetically
		asort($list);
		
		// remove base class from the list
		if( count($list) > 1 ){
			if( isset($list['FlexBlock']) ) unset($list['FlexBlock']);
		}
		
		return $list;
	}
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		//
		parent::onBeforeWrite();
		
		// Validate inputs
		if( trim($this->Title) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('FlexBlock.ValidationErrorEmptyTitle', 'Title is required')));
		}
		
		$this->ClassName = $this->ClassNameCasting;
		
		if( trim($this->ClassName) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('FlexBlock.ValidationErrorEmptyClassName', 'Type is required')));
		}
		
		// save sort order position
        if( !$this->FBSort ){
            $this->FBSort = self::get()->max('FBSort') + 1;   
        }
		
		// save custom HTML classes
		$htmlClasses = $this->possibleHTMLClasses();
		
		if( is_array($htmlClasses) && !empty($htmlClasses) ){
			$htmlClasses = $this->CastingHTMLClasses;
			$htmlClasses = $htmlClasses ? implode(' ', explode(',', $htmlClasses)) : '';
			
			$this->setField('ManyMany[HTMLClasses]', $htmlClasses);
		}
	}
	
	/**
	 * Permissions
	 */
	static $api_access = true;
	
	public function providePermissions() {
		return array(
		    'FLEXBLOCK_VIEW'   => ['name' => _t('FlexBlock.PermissionView', 'View a block'), 'category' => _t('FlexBlock.PermissionCategory', 'Flexible block')],
		    'FLEXBLOCK_CREATE' => ['name' => _t('FlexBlock.PermissionCreate', 'Create a block'), 'category' => _t('FlexBlock.PermissionCategory', 'Flexible block')],
		    'FLEXBLOCK_UPDATE' => ['name' => _t('FlexBlock.PermissionUpdate', 'Update a block'), 'category' => _t('FlexBlock.PermissionCategory', 'Flexible block')],
		    'FLEXBLOCK_DELETE' => ['name' => _t('FlexBlock.PermissionDelete', 'Delete a block'), 'category' => _t('FlexBlock.PermissionCategory', 'Flexible block')],
		);
	}
	
	/**
	 * Can view a record
	 */
	public function canView($member = NULL) {
        return Permission::check('FLEXBLOCK_VIEW');
    }
	
	/**
	 * Can create new record
	 */
	public function canCreate($member = NULL) {
        return Permission::check('FLEXBLOCK_CREATE');
    }
	
	/**
	 * Can edit a record
	 */
	public function canEdit($member = NULL) {
        return Permission::check('FLEXBLOCK_EDIT');
    }
	
	/**
	 * Can deleta record
	 */
	public function canDelete($member = NULL) {
        return Permission::check('FLEXBLOCK_DELETE');
    }
	
	/**
	 * Output content for template
	 */
	public function forTemplate(){
		//
		$template = $this->Template ? $this->ClassName.'_'.$this->Template : $this->ClassName;
		$view     = new SSViewer($template);
		
		return $view->process($this->customise($this));
	}
	
	/**
	 * Get display title for GridFieldAddExistingSearchHandler.ss
	 */
	public function getExistingSearchItemTitle(){
		return sprintf('<strong>%s</strong> (Type: %s. Template: %s)', $this->getTitle(), $this->ClassName, ($this->Template ? $this->Template : 'Default'));
	}
	
	/**
	 * Get possible HTML classes
	 */
	public function possibleHTMLClasses(){
		$classes = $this->stat('possible_html_classes');
		
		$this->extend('updatePossibleHTMLClasses', $classes);
		
		return $classes;
	}
}