<?php
/**
 * Displays a list of pages
 *
 * Anh Le <anhle@thatbythem.com>
 */
class PageLinkWidget extends Widget{
	/**
	 * DB Fields
	 */
    private static $db = array();
	
	/**
	 * Defaults
	 */
    private static $defaults = array();
 
    private static $title 		= 'Links';
    private static $cmsTitle 	= 'Page Link';
    private static $description = 'Displays a list of pages';
	
	/**
	 * Setting up CMSFields
	 */
	public function getCMSFields(){
	    // Add fields
		$fields = parent::getCMSFields();
		$fields->merge( new SortableTreeMultiselectField('WidgetContent', _t('PageLinkWidget.Pages', 'Pages'), 'SiteTree') );
		
		return $fields;
	}
	
	/**
	 * Get page links
	 */
	public function getPages()
	{
		// Get page ids
		$content = Convert::xml2raw($this->WidgetContent);
		$ids     = array();
		
		if($content)
		{
			foreach( explode(',', $content) as $id )
			{
				$id = (int)$id;
				
				if($id > 0){
					$ids[] = $id;
				}
			}
			
			if( !empty($ids) )
			{
				$pages = Page::get()->byIDs($ids);
				
				return $pages;
			}
		}
		
		return false;
	}
}