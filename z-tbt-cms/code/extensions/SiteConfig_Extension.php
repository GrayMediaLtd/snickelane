<?php
/**
 * Site Configuration Extension
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TBT_SiteConfig_Extension extends Extension{
	/**
	 * DB fields
	 */
	private static $db = array(
		'FooterContent' => 'HTMLText',
		'ContactEmail'   => 'Varchar(255)',
		'ContactPhone'   => 'Varchar(18)',
		'ContactAddress' => 'Text',
		'HeaderLayout'   => 'Varchar(18)',
		'FooterLayout'   => 'Varchar(18)',
		'FooterLinks'    => 'SortableTreeMultiselectDB'
	);
	
	/**
	 * Has one
	 */
	private static $has_one = array(
		'FooterWidgets' => 'WidgetArea'
	);
	
	/**
	 * Has many
	 */
	private static $has_many = array(
	    'SocialNetworks' => 'SocialNetwork'
	);
	
	/**
	 * Method to update CMS fields
	 */
	public function updateCMSFields(FieldList $fields){
		// Contact information
		$fields->insertAfter( ($tab = new Tab('TabContactInformation', _t('SiteConfig.TabLabelContactInformation', 'Contact Information'))), 'Main');
		
		$tab->push( new TextField('ContactPhone', _t('SiteConfig.ContactPhone', 'Contact phone')) );
		$tab->push( new EmailField('ContactEmail', _t('SiteConfig.ContactEmail', 'Contact email')) );
		$tab->push( new TextareaField('ContactAddress', _t('SiteConfig.ContactAddress', 'Contact address')) );
		
		/*
		// Header layout
		$layouts = $this->owner->HeaderLayouts();
		
		if($layouts){
			$fields->addFieldToTab(
			    'Root.Main',
				DropdownField::create('HeaderLayout', _t('SiteConfig.HeaderLayout', 'Header layout'), $layouts)
				->setEmptyString( _t('SiteConfig.HeaderLayoutDefaultString', '--- default ---') )
			);
		}
		
		$layouts = $this->owner->FooterLayouts();
		
		if($layouts){
			$fields->addFieldToTab(
			    'Root.Main',
				DropdownField::create('FooterLayout', _t('SiteConfig.FooterLayout', 'Footer layout'), $layouts)
				->setEmptyString( _t('SiteConfig.FooterLayoutDefaultString', '--- default ---') )
			);
		}
		*/
		
		// Footer content
		$fields->addFieldToTab('Root.Main',
			HTMLEditorField::create(
				'FooterContent',
				_t('SiteConfig.FooterContent', 'Footer content')
			)->setRows(18)
		);
		
		$fields->addFieldToTab('Root.Main',
			new SortableTreeMultiselectField(
				'FooterLinks',
				_t('SiteConfig.FooterLinks', 'Footer Links'),
				'SiteTree'
			)
		);
		
		// Footer widgets
		$fields->insertAfter( ($tab = new Tab('TabFooterWidgets', _t('SiteConfig.TabLabelFooterWidgets', 'Footer widgets'))), 'Main');
		$tab->push( new AdvancedWidgetAreaEditor('FooterWidgets') );
		
		// Social networks
		$fields->insertAfter( ($tab = new Tab('TabSocialNetworks', _t('SiteConfig.TabLabelSocialNetworks', 'Social networks'))), 'TabFooterWidgets');
		$tab->push(
			new GridField(
				'Networks',
				_t('SiteConfig.Networks', 'Social Networks'),
				$this->owner->SocialNetworks(),
				GridFieldConfig_RecordEditor::create(60)->addComponent( new GridFieldOrderableRows('SortOrder') )
			)
		);
	}
	
	/**
	 * Header layouts
	 */
	public function HeaderLayouts(){
		//
		$layouts = $this->owner->stat('header_layouts');
		
		if( !empty($layouts) ){
			//
			$list = array();
			
			foreach($layouts as $layout){
				foreach($layout as $k => $v){
					$list[$k] = _t('SiteConfig.HeaderLayout'.$k, $v);
				}
			}
			
			asort($list);
			
			return $list;
		}
		
		return false;
	}
	
	/**
	 * Footer layouts
	 */
	public function FooterLayouts(){
		//
		$layouts = $this->owner->stat('footer_layouts');
		
		if( !empty($layouts) ){
			//
			$list = array();
			
			foreach($layouts as $layout){
				foreach($layout as $k => $v){
					$list[$k] = _t('SiteConfig.FooterLayout'.$k, $v);
				}
			}
			
			asort($list);
			
			return $list;
		}
		
		return false;
	}
}