<?php
/*
 * Widget Extension
 *
 * @author Anh Le (leanh@thatbythem.com)
 */
class TBT_Widget_Extension extends DataExtension{
	/**
	 * Method to construct
	 */
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * DB fields
	 */ 
	private static $db = array(
		'WidgetTitle'		=> 'Varchar(255)',
		'WidgetClassSuffix' => 'Varchar(60)',
		'WidgetContent'     => 'HTMLText'
	);
	
	/**
	 * Update CMS fields
	 */ 
	public function updateCMSFields(FieldList $fields){
		// Remove the Title field
		$fields->removeByName('Title');
		
		// Add extra fields
		$fieldList = new FieldList(
			new TextField('WidgetClassSuffix', _t('Widget.SUFFIXCLASS', 'Suffix class')),
			new TextField('WidgetTitle', _t('Widget.TITLE', 'Title'))
		);
		
		// The HTML Content field
		$allowedWidgets = Config::inst()->get('Widget', 'AllowContentOn');
		
		if( $allowedWidgets && is_array($allowedWidgets) && in_array(get_class($this->owner), array_keys($allowedWidgets)) ){
			//
			if( $allowedWidgets[get_class($this->owner)] == true ){
				$fieldList->push( new HTMLEditorField('WidgetContent', _t('Widget.HTMLCONTENT', 'HTML content')) );
			}
			else{
				$fieldList->push( TextareaField::create('WidgetContent', _t('Widget.HTMLCONTENT', 'HTML content'))->setRows(18) );
			}
		}
		else{
			$fields->removeByName('WidgetContent');
		}
		
		// Update CMS Fields
		$fields->merge($fieldList);
	}
	
	/**
	 * Widget title
	 */ 
	public function WidgetTitle(){
		return $this->owner->WidgetTitle ? $this->owner->WidgetTitle : $this->owner->Title();
	}
}