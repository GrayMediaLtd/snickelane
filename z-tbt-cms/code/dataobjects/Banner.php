<?php
/**
 * Banner object
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Banner extends BaseBox{
    /**
     * Singular name
     */ 
	private static $singular_name = 'Banner';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Banners';
	
	/**
	 * DB fields
	 */
	private static $db = array(
		'Title'            => 'Text',
		'TitleColor'       => 'Varchar(12)',
		'TitleClass'       => 'Varchar(255)',
	    'SubHeading'       => 'Text',
		'SubHeadingColor'  => 'Varchar(12)',
		'SubHeadingClass'  => 'Varchar(255)',
		'ContentColor'     => 'Varchar(12)',
		'ContentClass'     => 'Varchar(255)',
		'Align'            => "Enum('left,right,center', 'left')",
		'DarkImage'        => 'Boolean'
	);
	
	/**
	 * Has many
	 */
	private static $has_many = array(
		'Buttons' => 'TbtButton'
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
		'Title',
		'ImageThumb'
	);
	
    /**
     * Searchable fields
     */
	private static $searchable_fields = array(
		'Title'
    );
    
    /**
	 * Field labels
	 */ 
	public function fieldLabels($includerelations = true){
		// Get labels from parent
		$labels = parent::fieldLabels($includerelations);
		
		// Modify labels
		$labels['Title']        = _t('Banner.Heading', 'Heading');
		$labels['DarkImage']    = _t('Banner.DarkImage', 'Image is not bright.');
		
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
        
		// Add fields
		$fields->insertBefore('Title', new DropdownField('Align', _t('Banner.Align', 'Align'), $this->dbObject('Align')->enumValues() ) );
		
		$fields->replaceField(
			'Title',
			new TextareaField('Title', $labels['Title'])
		);
		
		$fields->insertAfter('Title', new CompositeField(
			new TextareaField('SubHeading', _t('Banner.SubHeading', 'Sub-heading') ),
			new ColorField('SubHeadingColor', _t('Banner.SubHeadingColor', 'Sub-heading color') ),
			TextField::create('SubHeadingClass', _t('Banner.SubHeadingClass', 'HTML class') )
			           ->setDescription( _t('Banner.SubHeadingClassDesc', 'Custom HTML class(es) for the sub-heading') )
		));
		
		$fields->insertAfter('Title', new CompositeField(
			new ColorField('TitleColor', _t('Banner.TitleColor', 'Heading color') ),
			TextField::create('TitleClass', _t('Banner.TitleClass', 'HTML class') )
			           ->setDescription( _t('Banner.TitleClassDesc', 'Custom HTML class(es) for the heading') )
		));
		
		$fields->insertAfter('Content', new CompositeField(
			new ColorField('ContentColor', _t('Banner.ContentColor', 'Content color') ),
			TextField::create('ContentClass', _t('Banner.ContentClass', 'HTML class') )
			           ->setDescription( _t('Banner.ContentClassDesc', 'Custom HTML class(es) for the content') )
		));
		
		$fields->push( \TBTCMS\Libs\Helper::ImageUploadField('Image', $labels['Image'], 'Uploads/Banners/') );
		$fields->push( new CheckboxField('DarkImage', $labels['DarkImage']) );
		
		if($this->ID > 0){
			$cfg = GridFieldConfig_RecordEditor::create(30);
		    $cfg->addComponent( new GridFieldOrderableRows('BBSort') );
			
			$fields->push(
				new GridField(
					'Buttons',
					_t('Banner.Buttons', 'Buttons'),
					$this->Buttons(),
					(clone $cfg)
				)
			);
		}
		else{
			$fields->push( new LiteralField('BannerButtonNotice', '<p class="message notice">'._t('Banner.SaveToAddButton', 'Save record to add button.').'</p>') );
		}
		
		// Remove fields
		$fields->removeByName('HTMLClasses');
		$fields->removeByName('InternalPageID');
		$fields->removeByName('ExternalLink');
		$fields->removeByName('LinkBehaviour');
        
        //
		return $fields;
	}
}