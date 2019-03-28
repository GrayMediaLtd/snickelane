<?php
/**
 * Data type of SortableTreeMultiselectField
 *
 * Anh Le <anhle@thatbythem.com>
 */
class SortableTreeMultiselectDB extends Text{
	/**
	 * Template
	 */
	private $template = null;
    
	/**
	 * Options to filter, sort and limit items
	 */
	private static $ItemOptions = array();
    
    /**
	 * Count
	 */
	public function count(){
        //
        if( $this->value ){
            return DataList::create('Page')->byIDs( explode(',', $this->value) )->count();
        }
        
        return false;
    }
	
	/**
	 * Set items options
	 */
	public static function setItemOptions($fieldName, $options = array()){
		self::$ItemOptions[$fieldName] = $options;
	}
	
	/**
	 * Get items
	 */
	public function getItems(){
        //
        if( $this->value ){
            //
            $items = DataList::create('Page')->byIDs( explode(',', $this->value) )->sort(' FIELD(`SiteTree`.`ID`, '.$this->value.')  ');
            
            if( isset(self::$ItemOptions[$this->name]) && !empty(self::$ItemOptions[$this->name]) )
			{
				foreach(self::$ItemOptions[$this->name] as $key => $option){
					switch($key){
						case 'filter': $items = $items->filter($option); break;
						case 'sort': $items = $items->sort($option); break;
						case 'limit': $items = $items->limit($option); break;
					}
				}
			}
			
			return $items;
        }
		
		return false;
	}
	
	/**
	 * Set template name (without *.ss extension).
	 * 
	 * @param string $template
	 */
	public function setTemplate($template) {
		$this->template = $template;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTemplate() {
		return $this->template;
	}
	
	/**
	 * For template
	 */ 
	public function forTemplate() {
		// Get items
		if( $this->count() > 0 && $items = $this->getItems() )
		{
			$template = $this->template ? $this->template : 'SortableTreeMultiselectDB';
			$template = new SSViewer($template);
			
			return $template->process($this->customise(new ArrayData(array(
				'Items'	   => $items
			))));
		}
		
		return false;
	}
}
