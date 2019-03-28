<?php
/**
 * Blog Post Extension
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TBT_BlogPost_Extension extends DataExtension{
	/**
	 * DB Fields
	 */
	private static $db = array(
	    'VideoURL'     => 'Varchar(255)',
		'VideoID'      => 'Varchar',
		'VideoService' => "Enum('Youtube, Vimeo', 'Youtube')"
	);
	
	/**
	 * Many many
	 */
	private static $many_many = array(
	    'RelatedPosts' => 'BlogPost'
	);
	
	/**
	 * Update CMS fields
	 */
	public function updateCMSFields(FieldList $fields) {
		// Move Featured Image field to the Image Tab
        $fields->removeByName('FeaturedImage');
        
        $uploadField = \TBTCMS\Libs\Helper::ImageUploadField('FeaturedImage', _t('BlogPost.FeaturedImage', 'Featured Image'), 'Uploads/Pages/'.(int)$this->owner->ID);
        
        $fields->addFieldToTab('Root.TabImages', $uploadField);
		
		// Video URl
		$fields->insertAfter(
			TextField::create('VideoURL', _t('BlogPost.VideoURL', 'Video URL'))->setDescription( _t('BlogPost.VideoURLDesc', 'Supported services: Youtube, Vimeo.') ),
			'Title'
		);
		
		// Related entries
		$relatedField = TagField::create(
			'RelatedPosts',
			_t('BlogPost.RelatedPosts', 'Related entries'),
			( BlogPost::get()->filter('ParentID', $this->owner->ParentID)->exclude('ID', $this->owner->ID) ),
			$this->owner->RelatedPosts()
		)
		->setCanCreate(false)
		->setShouldLazyLoad(true);
		
		$fields->insertAfter( ($tab = new Tab('TabRelatedPosts', _t('BlogPost.RelatedPosts', 'Related entries'))), 'Main');
		
		$tab->push($relatedField);
    }
	
	/**
	 * On before write
	 */
	public function onBeforeWrite(){
		// Validate inputs
		if( trim($this->owner->VideoURL) ){
			// try to parse Youtube ID
			$id = \TBTCMS\Libs\Helper::parseYoutubeIDFromURL($this->owner->VideoURL);
			
			// try to parse Vimeo ID
			if( !$id ){
				$id = \TBTCMS\Libs\Helper::parseVimeoIDFromURL($this->owner->VideoURL);
				
				if($id) $this->owner->VideoService = 'Vimeo';
			}
			
			// set video ID
			if( $id ){
				$this->owner->VideoID = $id;
			}
			else{
				throw new ValidationException(ValidationResult::create(false, _t('BlogPost.ValidationErrorInvalidVideoURL', 'Video URL is invalid.')));
			}
		}
		else{
			$this->owner->VideoID = $this->owner->VideoService = null;
		}
	}
}

/**
 * Blog Post Controller Extension
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TBT_BlogPost_Controller_Extension extends Extension{
	/**
	 * On after init
	 */
	public function onBeforeInit(){
		// inherit header image from parent
		$owner = $this->owner;
		
		if( !$owner->PageImageID || !$owner->PageImage()->exists() ){
			if($owner->parent()->PageImageID && $image = $owner->parent()->PageImage() ){
				$owner->setField('BrightHeader', $owner->parent()->getField('BrightHeader') );
				$owner->setField('PageImageID', $image->ID );
			}
		}
	}
	
	/**
	 * Update body classes
	 */
	public function updateBodyClasses(&$classes){
		// remove `has-bright-header` from classes
		if(($key = array_search('has-bright-header', $classes)) !== false) {
			unset($classes[$key]);
		}
		
		// add `has-bright-header` to classes
		if( $this->owner->BrightHeader && $this->owner->PageImageID ){
			$classes[] = 'has-bright-header';
		}
	}
	
	/**
	 * Header image
	 */
	protected static $HeaderImage = array();
	
	public function HeaderImage(){
		//
		$id = $this->owner->ID;
		
		if( isset(self::$HeaderImage[$id]) ){
			return self::$HeaderImage[$id];
		}
		
		//
		self::$HeaderImage[$id] = false;
		
		$imageId = (int)$this->owner->getField('PageImageID');
		
		if( $imageId && $image = DataObject::get_one('Image', '"Image"."ID" = '.$imageId ) ){
			self::$HeaderImage[$id] = $image;
		}
		
		return self::$HeaderImage[$id];
	}
}