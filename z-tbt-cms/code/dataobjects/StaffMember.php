<?php
/**
 * StaffMember object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class StaffMember extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Staff Member';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Staff Members';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Name'          => 'Varchar(255)',
        'JobTitle'	    => 'Varchar(255)',
		'Biography'     => 'HTMLText',
		'SortOrder'     => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Photo' => 'Image'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Name',
		'JobTitle',
		'PhotoThumb'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Name',
		'JobTitle'
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
	protected function getPhotoThumb(){
		return $this->PhotoID ? $this->Photo()->setWidth(60) : '';
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Name'] 	        = _t('StaffMember.Name', 'Name');
		$labels['JobTitle'] 	    = _t('StaffMember.JobTitle', 'Job title');
		$labels['Company'] 	        = _t('StaffMember.Company', 'Company name');
		$labels['Photo'] 	        = $labels['PhotoThumb'] = _t('StaffMember.Photo', 'Photo');
		$labels['Biography'] 	    = _t('StaffMember.Biography', 'Biography');
		
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
		$fields = new FieldList(
			new TextField('Name', $labels['Name']),
			new TextField('JobTitle', $labels['JobTitle']),
			\TBTCMS\Libs\Helper::HTMLEditorField('Biography', $labels['Biography'], 15)
		);
		
		if($this->ID > 0){
			$fields->push(
				\TBTCMS\Libs\Helper::ImageUploadField(
				    'Photo',
					$labels['Photo'],
					'Uploads/StaffMembers/'
				)
			);
			
			$fields->push(
				new GridField(
					'Networks',
					_t('StaffMember.Networks', 'Social Networks'),
					$this->Networks(),
					GridFieldConfig_RecordEditor::create(60)->addComponent( new GridFieldOrderableRows('SortOrder') )
				)
			);
		}
        
        //
		return $fields;
	}
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		//save sort order position
        if( !$this->SortOrder ){
            $this->SortOrder = self::get()->max('SortOrder') + 1;   
        }
		
		// Validate inputs
		if( trim($this->Name) == '' ){
			throw new ValidationException(ValidationResult::create(false, _t('StaffMember.ValidationErrorEmptyName', 'Name is required')));
		}
		
		parent::onBeforeWrite();
	}
	
	/**
	 * Can view the record
	 */
	public function canView($member = null) {
        return true;
    }
}