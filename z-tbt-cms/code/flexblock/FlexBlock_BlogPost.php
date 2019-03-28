<?php
/**
 * FlexBox Blog Post
 *
 * Anh Le <anhle@thatbythem.com>
 */
class FlexBlock_BlogPost extends FlexBlock {
    /**
     * Singular name
     */ 
	private static $singular_name = 'Blog post';
    
    /**
     * Plural name
     */ 
    private static $plural_name   = 'Blog post';
	
	/**
	 * DB fields
	 */
	private static $db = array(
		'PostCount' => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'Blog' => 'Block'
	);
	
	/**
	 * Populate defaults
	 */ 
	public function populateDefaults() {
		parent::populateDefaults();
		
		//
		$this->PostCount = 6;
	}
	
	/*
	 * Method to show CMS fields for creating or updating
	 */
	/**
	 * Update CMS fields
	 */
	public function getCMSFields() {
        //
		$labels = $this->fieldLabels();
 		$fields = parent::getCMSFields();
        
		// Fields
		$fields->addFieldToTab('Root.Main', \TBTCMS\Libs\Helper::HTMLEditorField('Content', $labels['Content'], 15) );
		
		// create new tab
		$fields->insertAfter( ($tab = new Tab('TabBlogPosts', _t('FlexBlockBlogPost.TabBlogPosts', 'Blog posts'))), 'Main');
		
		// add fields
		$tab->push(
			NumericField::create(
				'PostCount',
				_t('FlexBlockBlogPost.Count', 'Count')
			)->setDescription( _t('FlexBlockBlogPost.CountDesc', 'Numbers of posts to display. Zero means displaying nothing.') )
		);
		
		$tab->push(
			$tree = new TreeDropdownField(
				'BlogID',
				_t('FlexBlockBlogPost.BlogPage', 'Blog page'),
				'SiteTree'
			)
		);
		
		/*
		$tree->setFilterFunction( function($item){
			return $item->ClassName == 'Blog';
		});
		*/

        //
		return $fields;	
	}
	
	/**
     * Return blog posts.
     *
     * @return DataList of BlogPost objects
     */
    public function BlogPosts(){
		//
		if($this->BlogID && $this->PostCount > 0){
			$posts = BlogPost::get()->filter('ParentID', $this->BlogID)->limit($this->PostCount);
			$this->extend('updateBlogPosts', $posts);
			
			return $posts;
		}
		
        return false;
    }
}