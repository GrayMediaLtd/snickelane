<?php
/**
 * Faq object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Faq extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Faq';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Faqs';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Answer'          => 'Text',
		'Question'           => 'Text'
 
	);
	
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'Question',
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Question'
    );
    
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
	}
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels

		$labels['Question'] = _t('Faq.Question', 'Question');
		$labels['Answer'] = _t('Faq.Answer', 'Answer');
		
		// Return labels
		return $labels;
	}
	
	/*
	 * Method to CMS fields for creating or updating
	 */
	public function getCMSFields(){
        //
        $labels = $this->fieldLabels();
        
		// Fields
		$fields = new FieldList(
			new TextField('Question', $labels['Question']),
			new TextareaField('Answer', $labels['Answer'])
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