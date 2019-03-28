<?php
/**
 * Page Extension
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TBT_Page_Extension extends Extension{
	/**
	 * DB fields
	 */
	private static $db = array(
		'PageLayout'        => 'Varchar(255)',
		'PageHeading'       => 'Varchar(255)',
        'PageIntroduction'  => 'HTMLText',
		'EnableHeader'      => 'Boolean',
		'BrightHeader'      => 'Boolean',
		'MenuColumnNum'     => 'Int'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'PageImage' => 'Image'
	);
    
	/**
	 * Has many
	 */
	private static $has_many = array(
		'HeadingBlocks' => 'HeadingBlock',
		'MenuColumns'   => 'MenuColumn'
	);
	
    /**
     * Many many
     */
    private static $many_many = array(
		'Banners'      => 'Banner',
		'Images'       => 'Image',
		'FlexBlocks'   => 'FlexBlock',
    );
    
    /**
	 * Many_many extra fields
	 */ 
	private static $many_many_extraFields = array(
		'Banners' => array(
            'SortOrder' => 'Int'
        ),
        'Images' => array(
            'SortOrder' => 'Int'
        ),
        'FlexBlocks' => array(
            'SortOrder'   => 'Int',
			'HTMLClasses' => 'Varchar(255)'
        )
    );
	
	public function Banners() {
        return $this->owner->getManyManyComponents('Banners')->sort('SortOrder');
    }
    
    public function Images() {
        return $this->owner->getManyManyComponents('Images')->sort('SortOrder');
    }
	
	public function FlexBlocks() {
        return $this->owner->getManyManyComponents('FlexBlocks')->sort('SortOrder');
    }
	
	/**
	 * Update CMS fields
	 */
	public function updateCMSFields(FieldList $fields) {
		// Hide the Widgets tab by default
		$fields->removeByName('Widgets');
		
		if( $this->owner->stat('enable_widget') ){
			$this->owner->loadSidebarEdtior($fields);
		}
		
		// Page layout
		if( $layouts = $this->getThemeLayouts() ){
			$fields->addFieldToTab('Root.Main', $field = new DropdownField('PageLayout', _t('SiteTree.PageLayout', 'Layout'), $layouts), 'Content');
			
			$field->setDescription(_t('SiteTree.PageLayoutDesc', 'Always flush the cache after change the layout.') );
			$field->setEmptyString('Default');
		}
        
        // Header
		$fields->insertAfter( ($tab = new Tab('TabHeader', _t('SiteTree.TabLabelHeader', 'Header'))), 'Main');
		
		$tab->push(
			new CheckboxField(
				'EnableHeader',
				_t('SiteTree.EnableHeader', 'Enable header block')
			)
		);
		
		$tab->push(
			new CheckboxField(
				'BrightHeader',
				_t('SiteTree.BrightHeader', 'Prefer bright color for texts')
			)
		);
		
		$tab->push(
			TextField::create(
				'PageHeading',
				_t('SiteTree.PageHeading', 'Heading')
			)->setDescription( _t('SiteTree.PageHeadingDesc', 'Optional. Leave it blanks to use Page Name instead.') )
		);
		
		$tab->push(
			TextareaField::create(
				'PageIntroduction',
				_t('SiteTree.PageIntroduction', 'Introduction')
			)
			->setDescription( _t('SiteTree.IntroductionDesc', 'Optional.') )
		);
		
		$tab->push(
			\TBTCMS\Libs\Helper::ImageUploadField(
				'PageImage',
				_t('SiteTree.PageImage', 'Header image'),
				'Uploads/Pages/'.(int)$this->owner->ID
			)
			->setDescription( _t('SiteTree.PageDesc', 'Optional.') )
		);
		
        // Images
		$fields->insertAfter( ($tab = new Tab('TabImages', _t('SiteTree.TabLabelImages', 'Images'))), 'TabHeader');
		
		$tab->push(
			$imgField = new SortableUploadField(
                'Images',
                _t('SiteTree.Images', 'Additional images')
            )
		);
		
		$imgField->setAllowedFileCategories('image');
		$imgField->setFolderName('Uploads/Pages/'.(int)$this->owner->ID);
        $imgField->setDescription( _t('SiteTree.ImageSortableDesc', 'Click on an image thumbnail and drag it to re-sort.'));
		
		// Banners
		if( $this->owner->stat('enable_banners') ){
			// create a new tab
			$fields->insertAfter( ($tab = new Tab('TabBanners', _t('SiteTree.TabLabelBanners', 'Banners'))), 'TabImages');
			
			$tab->push(
			    new GridField(
					'Banners',
					_t('SiteTree.Banner', 'Banners'),
					$this->owner->Banners(),
					\TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(30, 'SortOrder')
				)
			);
		}
		
		// Flexible blocks
		if( $this->owner->stat('enable_flex_blocks') )
		{
			$gridCfg = \TBTCMS\Libs\Helper::GridFieldConfig_RelationEditor(30, 'SortOrder');
			$gridCfg->getComponentByType('GridFieldAddNewButton')->setButtonName( _t('FlexBlock.AddNewBlock', 'Add new block') );
			
			$fields->insertAfter(
				new CompositeField(
					new HeaderField('ContentBuilderHeading', _t('FlexBlock.ContentBuilder', 'Content Builder'), 3),
					new GridField(
						'FlexBlock',
						_t('FlexBlock.Blocks', 'Blocks'),
						$this->owner->FlexBlocks(),
						$gridCfg
					)
				),
				'Content'
			);
		}
		
		// Remove fields
		$rmFields = $this->owner->stat('disabled_cms_fields');
		
		foreach($rmFields as $rmClassName => $rmCMSFields){
			if($this->owner->ClassName == $rmClassName){
				foreach($rmCMSFields as $rmCMSField){
					$fields->removeByName($rmCMSField);
				}
			}
		}
    }
	
	/**
	 * Update CMS fields
	 */
	public function updateSettingsFields(FieldList $fields) {
		//
		if($this->owner->ParentID == 0){
			//
			$gridCfg = new GridFieldConfig_RecordEditor(30);
			$gridCfg->addComponent( new GridFieldOrderableRows('SortOrder') );
			
			$fields->addFieldToTab('Root.Settings',
				new GridField(
					'MenuColumns',
					_t('SiteTree.MenuColumns', 'Menu Columns'),
					$this->owner->MenuColumns(),
					$gridCfg
				)
			);
		}
		else if( $this->owner->getPageLevel() == 2 && $this->owner->parent()->MenuColumns()->count() ){
			//
			$fields->addFieldToTab('Root.Settings',
				DropdownField::create(
					'MenuColumnNum',
					_t('SiteTree.MenuColumnNum', 'Menu Column'),
					$this->owner->parent()->MenuColumns()->map('ID', 'Title')
				)->setEmptyString( _t('SiteTree.MenuColumnNone', '--- None ---') )
			);
		}
	}
	
	/**
	 * Sidebar Editor for managing Widgets
	 */
	public function loadSidebarEdtior($fields){
		//
		$label = _t('Widget.SIDEBARTAB', 'Sidebar');
		
		$fields->addFieldToTab(
			"Root.{$label}", 
			new CheckboxField('InheritSideBar', _t('Widget.INHERITFROMPARENT', 'Inherit sidebar from parent'))
		);
		
		$fields->addFieldToTab(
			"Root.{$label}", 
			new AdvancedWidgetAreaEditor('SideBar')
		);
	}
	
	/**
	 * Get available layoyts for this page type
	 */
	private function getThemeLayouts()
	{
		$ds			= DIRECTORY_SEPARATOR;
		$className  = get_class($this->owner);
		$layoutPath = BASE_PATH."{$ds}themes{$ds}".TBT_PageController_Extension::getThemeName()."{$ds}templates{$ds}Layout".$ds.$className;
		
		if( file_exists($layoutPath) && is_dir($layoutPath) )
		{
			$finder = new SS_FileFinder();
			$finder->setOptions(array(
				'name_regex'     => '/^(.*.ss)/i',
				'max_depth'      => 1
			));
			
			$layouts = $finder->find($layoutPath); 
			
			if( $layouts && count($layouts) > 0 )
			{
				$_layouts = array();
				
				foreach($layouts as $layout){
					$name 	  = pathinfo($layout, PATHINFO_FILENAME);
					$niceName = URLSegmentFilter::create()->filter($name);
					$niceName = ucfirst(str_replace('-', ' ', $niceName));
					
					$_layouts[$name] = $niceName;
				}
				
				return $_layouts;
			}
		}
		
		return false;
	}
	
	/**
	 * Link to the Previous or Next pages
	 */
	public function getPreviousNextPage($sameType = true)
	{
		$filter = array('ParentID' => $this->owner->ParentID);
		$next   = $previous = false;
		
		if($sameType){
			$filter['ClassName'] = get_class($this->owner);
		}
		
		// next
		$filter['Sort:GreaterThan'] = $this->owner->Sort;
		
		$next = SiteTree::get()->filter($filter)->sort('Sort', 'ASC')->limit(1)->first();
		
		// previous
		unset($filter['Sort:GreaterThan']);
		
		$filter['Sort:LessThan'] = $this->owner->Sort;
		
		$previous = SiteTree::get()->filter($filter)->sort('Sort', 'DESC')->limit(1)->first();
		
		if($next || $previous){
			return (new ArrayData(array(
				'Previous' 	=> $previous,
				'Next' 		=> $next
			)));
		}
		
		return false;
	}
    
    /**
     * Get top level page
     */
    public function getTopLevelPage($ClassName = false, $ParentID = 0, $page = false){
        //
        if( !$page ) $page = $this->owner;
        
        if($page->ClassName == $ClassName){
            return $page;
        }
        
        if($page->ParentID == $ParentID){
            return $page;
        }
        
        if( $page->ParentID > 0 && $page->Parent()->exists() ){
            return $this->owner->getTopLevelPage($ClassName, $ParentID, $page->Parent());
        }
        
        return false;
    }
    
    /**
     * Get the page heading
     */
    public function FinalPageHeading(){
        return ( $this->owner->getField('PageHeading') ? $this->owner->getField('PageHeading') : $this->owner->getTitle() );
    }
	
	/**
	 * Get Heading Block by given Slug
	 *
	 * @param string $slug Slug
	 */
	public function HeadingBlockBySlug($slug){
		// load all heading blocks at once
		$items = $this->owner->HeadingBlocks()->limit(60);
		
		if( $items && $slug ){
			foreach($items as $item){
				if($item->Slug == $slug) return $item;
			}
		}
		
		return false;
	}
}

/**
 * Page Controller Extension
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TBT_PageController_Extension extends Extension{
    /**
	 * Custom assets
	 */
	protected static $_CustomAssets = array();
	
	/**
	 * Custom HTML Classes
	 */
	protected static $_CustomHTMLClasses = array();
	
	/**
	 * Permission check
	 */
	public function hasPermission($code){
		return Permission::check($code);
	}
	
	/**
	 * Method to update viewer
	 */
	public function updateViewer($viewer, $action){
		# setup layout to render
		$layout = $this->owner->PageLayout;
		
		if( $this->owner->request->requestVar('page-layout') ){
			$layout = $this->owner->request->requestVar('page-layout');
		}
		
		if( $layout )
		{
			$ds			= DIRECTORY_SEPARATOR;
			$layoutPath = BASE_PATH."{$ds}themes{$ds}".TBT_PageController_Extension::getThemeName()."{$ds}templates{$ds}Layout{$ds}".$this->owner->ClassName.$ds.$layout.'.ss';
			
			if( file_exists($layoutPath) && is_file($layoutPath) )
				$viewer->setTemplateFile('Layout', $layoutPath);
		}
		
		return $viewer;
	}
	
	/**
	 * Load theme assets
	 */
	public function loadThemeAssets(){
		# get current theme
		$currentTheme = TBT_PageController_Extension::getThemeName();
		$themeDir     = $this->owner->ThemeDir();
		$assets    	  = Config::inst()->get('ThemeStripe', 'Assets');
		$combinedDir  = Config::inst()->get('ThemeStripe', 'CombinedDir');
		
		# put the combined folder inside our theme so that relative css image paths work
		Requirements::set_combined_files_folder($themeDir . $combinedDir);
		
		# combine CSS
		if( isset($assets[$currentTheme]['css']) ){
			$files = $assets[$currentTheme]['css'];
			
			if( isset( self::$_CustomAssets['css'] ) && is_array(self::$_CustomAssets['css']) ){
				$files = array_merge($files, self::$_CustomAssets['css']);
			}
			
			if( !empty($files) ){
				$fileList = array();
				
				foreach($files as $file){
					if( preg_match("~^(?:f|ht)tps?://~i", $file) ){
						Requirements::css($file);
					}
					else if( file_exists(BASE_PATH.'/'.$themeDir.'/'.$file) ){
						$fileList[md5($file)] = $themeDir.'/'.$file;
					}
				}
				
				if( !empty($fileList) ){
					Requirements::combine_files('stylesheet.css', $fileList);
				}
			}
		}
		
		# combine JS
		if( isset($assets[$currentTheme]['js']) ){
			$files = $assets[$currentTheme]['js'];
			
			if( isset( self::$_CustomAssets['js'] ) && is_array(self::$_CustomAssets['js']) ){
				$files = array_merge($files, self::$_CustomAssets['js']);
			}
			
			if( !empty($files) ){
				$fileList = array();
				
				foreach($files as $file){
					if( preg_match("~^(?:f|ht)tps?://~i", $file) ){
						Requirements::javascript($file);
					}
					else if( file_exists(BASE_PATH.'/'.$themeDir.'/'.$file) ){
						$fileList[md5($file)] = $themeDir.'/'.$file;
					}
				}
				
				if( !empty($fileList) ){
					Requirements::combine_files('javascript.js', $fileList);
				}
			}
		}
	}
	
	/**
	 * Set custom assets
	 *
	 * @param string $file
	 * @param string $type possible values: css|js
	 * @param boolean $reload true|false : reload assets.
	 */
	public function setCustomAssets($file, $type = 'css', $reload = true){
		if( in_array($type, array('js', 'css') ) ){
			self::$_CustomAssets[$type][] = $file;
			
			// reload theme assets
			if($reload){
				$this->loadThemeAssets();
			}
		}
	}
	
	/**
	 * Set Custom HTML Classes
	 */
	public static function setCustomHTMLClasses( $classes = array() ){
		settype($classes, 'array');
		
		if( !empty($classes) ){
			foreach( $classes as $class ){
				if( !isset(self::$_CustomHTMLClasses[$class]) ){
					self::$_CustomHTMLClasses[] = $class;
				}
			}
		}
	}
	
	/**
	 * Get Custom HTML Classes
	 */
	public static function getCustomHTMLClasses( $return_array = false ){
		$classes = self::$_CustomHTMLClasses;
		
		if( !empty($classes) ){
			return ( $return_array ? $classes : implode(' ', $classes) );
		}
		
		return null;
	}
	
	/**
	 * Get name of current theme
	 */
	protected static $currentThemeName = null;
	
	public static function getThemeName(){
		//
		if( self::$currentThemeName === null ){
			if(class_exists('SiteConfig') && ($config = SiteConfig::current_site_config()) && $config->Theme) {
				self::$currentThemeName = $config->Theme;
			}
			elseif(Config::inst()->get('SSViewer', 'theme_enabled') && Config::inst()->get('SSViewer', 'theme')) {
				self::$currentThemeName = Config::inst()->get('SSViewer', 'theme');
			}
		}
		
		return self::$currentThemeName;
	}
    
    /**
     * Add RequireJS path
     */
    protected static $requirejsPaths = array();
    
    public function addRequireJSPath($path){
        self::$requirejsPaths[] = $path;
    }
    
    /**
     * Get RequireJS paths
     */
    public function getRequireJSPaths($json = true){
        //
        if( is_array(self::$requirejsPaths) && !empty(self::$requirejsPaths) ){
            return ($json ? Convert::array2json(array_unique(self::$requirejsPaths)) : new ArrayList( array_unique(self::$requirejsPaths) ));
        }
        
        return false;
    }
    
    /**
     * Get absolute link
     */
    public function getAbsoluteLink() {
        return Director::absoluteURL($this->owner->Link());
    }
    
    /**
     * Remove a parameter from current query string
     */
    public function removeGetvar($name = '', $absoluteURL = false){
        //
        $url      = parse_url($_SERVER['REQUEST_URI']);
        $queryStr = isset($url['query']) ? $url['query'] : false;
        
        if($queryStr){
            parse_str($queryStr, $params);
            
            if( isset($params[$name]) ) unset($params[$name]);
            
            $queryStr = http_build_query($params);
        }
        
        $url = $url['path'].( $queryStr  ? '?'.$queryStr  : '' );
        
        //
        return $absoluteURL ? Director::absoluteURL($url) : $url;
    }
	
	/**
	 * Get HTML classes for body tag
	 */
	public function bodyClasses(){
		//
		$record  = $this->owner->dataRecord;
		
		$classes = array(
			'page-'.$record->ID,
			'page-'.$record->URLSegment,
			'page-type-'.$record->ClassName
		);
		
		if( $customClasses = static::getCustomHTMLClasses() ){
			$classes[] = $customClasses;
		}
		
		if( $record->Banners()->count() ){
			$classes[] = 'has-banner';
		}
		else{
			$classes[] = 'no-banner';
		}
		
		if($record->EnableHeader){
			$classes[] = 'has-header';
		}
		
		if($record->BrightHeader && $record->PageImageID){
			$classes[] = 'has-bright-header';
		}
		
		if($record->PageImageID){
			$classes[] = 'has-page-image';
		}
		
		// page layout
		$layout_class = 'layout-'.$record->ClassName.'-default';
		
		if( $reqPageLayout = $this->owner->request->requestVar('page-layout') ){
			$layout_class = 'layout-'.$reqPageLayout;
		}
		else if( $record->PageLayout ){
			$layout_class = 'layout-'.$record->PageLayout;
		}
		
		$classes[] = $layout_class;
		
		// header class
		$cfg = SiteConfig::current_site_config();
		
		$header_class = 'header-default';
		
		if( $reqHeaderLayout = $this->owner->request->requestVar('header-layout') ){
			$header_class = 'header-'.$reqHeaderLayout;
		}
		else if( isset($cfg->HeaderLayout) && $cfg->HeaderLayout ){
			$header_class = 'header-'.$cfg->HeaderLayout;
		}
		
		$classes[] = $header_class;
		
		// footer class
		$footer_class = 'footer-default';
		
		if( $reqHeaderLayout = $this->owner->request->requestVar('footer-layout') ){
			$footer_class = 'footer-'.$reqHeaderLayout;
		}
		else if( isset($cfg->HeaderLayout) && $cfg->HeaderLayout ){
			$footer_class = 'footer-'.$cfg->HeaderLayout;
		}
		
		$classes[] = $footer_class;
		
		// allow to update body classes
		$this->owner->extend('updateBodyClasses', $classes);
		
		return implode(' ',$classes);
	}
	
	/**
	 * Render header layout
	 */
	public function HeaderLayout(){
		//
		$ds     = DIRECTORY_SEPARATOR;
		$cfg    = SiteConfig::current_site_config();
		$suffix = ( isset($cfg->HeaderLayout) && $cfg->HeaderLayout ) ? $cfg->HeaderLayout : null;
		$layout = 'Header.ss';
		
		if( $this->owner->request->requestVar('header-layout') ){
			$suffix = $this->owner->request->requestVar('header-layout');
		}
		
		if($suffix){
			$layout = 'Header_'.$suffix.'.ss';
		}
		
		// render
		$file = BASE_PATH."{$ds}themes{$ds}".TBT_PageController_Extension::getThemeName()."{$ds}templates{$ds}Includes{$ds}".$layout;
		
		if( file_exists($file) && is_readable($file) && is_file($file) ){
			$template = new SSViewer($file);
		    
			return $template->process($this->owner);
		}
		
		return false;
	}
	
	/**
	 * Render footer layout
	 */
	public function FooterLayout(){
		//
		$ds     = DIRECTORY_SEPARATOR;
		$cfg    = SiteConfig::current_site_config();
		$suffix = ( isset($cfg->FooterLayout) && $cfg->FooterLayout ) ? $cfg->FooterLayout : null;
		$layout = 'Footer.ss';
		
		if( $this->owner->request->requestVar('footer-layout') ){
			$suffix = $this->owner->request->requestVar('footer-layout');
		}
		
		if($suffix){
			$layout = 'Footer_'.$suffix.'.ss';
		}
		
		// render
		$file = BASE_PATH."{$ds}themes{$ds}".TBT_PageController_Extension::getThemeName()."{$ds}templates{$ds}Includes{$ds}".$layout;
		
		if( file_exists($file) && is_readable($file) && is_file($file) ){
			$template = new SSViewer($file);
		    
			return $template->process($this->owner);
		}
		
		return false;
	}
}