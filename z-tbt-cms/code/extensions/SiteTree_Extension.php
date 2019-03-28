<?php
/**
 * SiteTree Extension
 *
 * Anh Le <anhle@thatbythem.com>
 */
class TBT_SiteTree_Extension extends Extension{
    /**
     * Update status flags
     */
    public function updateStatusFlags(&$flags){
        // Display flag for menu columns.
        if($this->owner->getPageLevel() == 2){
            //
			$flags['menucol'] = array(
				'text'  => '(none)',
				'title' => 'This page is not on any menu columns. It may not visible on frontend.'
			);
			
			if( $this->owner->MenuColumnNum > 0 && $col = DataObject::get_by_id('MenuColumn', $this->owner->MenuColumnNum) ){
				$flags['menucol'] = array(
					'text'  => $col->getTitle(),
					'title' => sprintf('This page is on %s menu column.', $col->getTitle())
				);
			}
        }
    }
}