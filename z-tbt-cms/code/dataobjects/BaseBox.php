<?php
/**
 * Base box object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class BaseBox extends DataObject{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Base box';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Base boxes';
	
    /**
     * DB fields
     */ 
	private static $db = array (
		'Title'         => 'HTMLVarchar',
        'ExternalLink'	=> 'Varchar(255)',
		'HTMLClasses'   => 'Varchar(255)',
		'LinkHash'      => 'Varchar(255)',
		'Content'       => 'HTMLText',
		'LinkBehaviour' => 'Int',
		'BBSort'        => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'InternalPage' => 'Page',
		'Image'        => 'Image'
	);
	
    /**
     * Summary fields
     */ 
	private static $summary_fields = array(
		'ClassName',
		'Title',
		'Link'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'ClassName',
		'Title'
    );
    
    /**
     *
     */
    private static $LinkBehaviours = array(
		0 => 'Default',
		1 => 'New window',
		2 => 'No-follow',
		3 => 'New window + No-follow',
		4 => 'Lightbox'
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
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['ClassName'] 	    = _t('BaseBox.ClassName', 'Object name');
		$labels['Title'] 	        = _t('BaseBox.Title', 'Box Title');
		$labels['Link'] 	        = _t('BaseBox.Link', 'Link');
		$labels['InternalPage'] 	= _t('BaseBox.InternalPage', 'Box Internal link');
		$labels['ExternalLink'] 	= _t('BaseBox.ExternalLink', 'Box External link');
		$labels['HTMLClasses'] 	    = _t('BaseBox.HTMLClasses', 'Box Custom HTML classes');
		$labels['LinkBehaviour'] 	= _t('BaseBox.LinkBehaviour', 'Box Link behaviour');
		$labels['LinkHash'] 	    = _t('BaseBox.LinkHash', 'Box Link hash');
		$labels['Image'] 	        = $labels['ImageThumb'] = _t('BaseBox.Image', 'Box Image');
		$labels['Content'] 	        = _t('BaseBox.Content', 'Box Content');
		
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
			new TextField('Title', $labels['Title']),
			TreeDropdownField::create('InternalPageID', _t('BaseBox.InternalPageID', 'Internal link'), 'SiteTree')->setDescription('Select an internal page to link to...'),
			TextField::create('ExternalLink', _t('BaseBox', 'External link'))->setDescription('or fill an external url.'),
			new DropdownField('LinkBehaviour', $labels['LinkBehaviour'], self::$LinkBehaviours),
			new TextField('HTMLClasses', $labels['HTMLClasses']),
			new TextareaField('Content', $labels['Content'])
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
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		//save sort order position
        if( !$this->BBSort ){
            $this->BBSort = self::get()->max('BBSort') + 1;   
        }
		
		parent::onBeforeWrite();
	}
	
	/**
	 * Get link
	 */
	public function Link(){
		//
		$link = '';
		
		if( $this->ExternalLink ){
			if( (\TBTCMS\Libs\Helper::isValidUrl($this->ExternalLink)) ){
				$link = $this->ExternalLink;
			}
			else{
				$link = Director::absoluteURL($this->ExternalLink);
			}
		}
		else{
			$link = ( ($this->InternalPageID > 0 && $this->InternalPage()->exists()) ? $this->InternalPage()->Link() : '' );
		}
		
		if( $this->LinkHash ) return $link.$this->LinkHash;
		
		return $link;
	}
	
	/**
	 * Link Behaviour
	 */
	public function LinkBehaviourAttr(){
		$out = '';
		
		switch($this->LinkBehaviour){
			case 1: $out = 'target="_blank"'; break;
			case 2: $out = 'rel="nofollow"'; break;
			case 3: $out = 'target="_blank" rel="nofollow"'; break;
			case 4: $out = 'rel="nofollow"'; break;
		}
		
		return $out;
	}
}