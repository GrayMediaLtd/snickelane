<?php
/**
 * Testimonial object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Testimonial extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Testimonial';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Testimonials';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Name'          => 'Varchar(255)',
        'JobTitle'	    => 'Varchar(255)',
		'Company'       => 'Varchar(255)',
		'Message'       => 'Text'
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
		'PhotoThumb',
		'Message'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Name',
		'Message'
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
		return $this->PhotoID ? $this->Photo()->setWidth(120) : '';
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Name'] 	        = _t('Testimonial.Name', 'Name');
		$labels['JobTitle'] 	    = _t('Testimonial.JobTitle', 'Job title');
		$labels['Company'] 	        = _t('Testimonial.Company', 'Company name');
		$labels['Photo'] 	        = $labels['PhotoThumb'] = _t('Testimonial.Photo', 'Photo');
		$labels['Message'] 	        = _t('Testimonial.Message', 'Message');
		
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
			new TextField('Company', $labels['Company']),
			new TextareaField('Message', $labels['Message']),
			\TBTCMS\Libs\Helper::ImageUploadField('Photo', $labels['Photo'], 'Uploads/Testimonials/')
		);
        
        //
		return $fields;
	}
	
	/**
	 * Can view the record
	 */
	public function canView($member = null) {
        return true;
    }
}