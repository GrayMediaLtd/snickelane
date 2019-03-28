<?php
/**
 * Timeline
 *
 * Anh Le <anhle@thatbythem.com>
 */
class Timeline extends Blog{
	/**
     * Icon
     */
    private static $icon = array("z-tbt-cms/assets/images/icons/line-connector-16.png");
	
	/**
	 * Page name
	 */
	private static $singular_name = 'Timeline Page';
	
	/**
	 * Page description
	 */
	private static $description = 'Displays the timeline.';
	
	/**
     * @var array
     */
    private static $allowed_children = array(
        'TimelineEvent',
    );
	
	/**
	 * Update CMS fields
	 */
	public function getCMSFields() {
		// Get CMS fields
 		$fields = parent::getCMSFields();
		
		//
        return $fields;	
	}
	
	/**
     * This sets the title for our gridfield.
     *
     * @return string
     */
    public function getLumberjackTitle(){
        return _t('Timeline.LumberjackTitle', 'Events');
    }
}

/**
 * The controller class
 */
class Timeline_Controller extends Blog_Controller{ 
	/**
	 * Initialize
	 */
	public function init() {
		parent::init();
	}
	
	/**
	 * Get events group by month
	 */
	public function getEventList(){
		//
		$posts  = $this->PaginatedList();
        
		if( $posts->getTotalItems() > 0 )
		{
			$events = array();
			
			foreach($posts as $item)
			{
				$dateObj = $item->dbObject('PublishDate');
				$date    = $dateObj->Format('Y-m');
				
				if( isset($events[$date]['Date']) ){
					$events[$date]['Events'][] = $item;
				}
				else{
					$events[$date]['Date']     = $date;
					$events[$date]['DateNice'] = $dateObj->FormatI18N("%B %Y");
					$events[$date]['Events']   = new ArrayList();
					$events[$date]['Events'][] = $item;
				}
			}
			
			$events = new ArrayList($events);
			
			return $events;
		}
		
        return false;
	}
}