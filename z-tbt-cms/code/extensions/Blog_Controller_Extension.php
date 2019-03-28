<?php
/**
 * Blog extension
 */
class TBT_Blog_Extension extends DataExtension{
	/**
	 * DB Fields
	 */
	private static $db = array(
	    'EnableInfiniteList' => 'Int'
	);
	
	/**
	 * Update CMS fields
	 */
	public function updateSettingsFields(FieldList $fields) {
		//
		$fields->addFieldToTab('Root.Settings', $field = new CheckboxField('EnableInfiniteList', _t('Blog.EnableInfiniteList', 'Enable Infinite List')));
		$field->setDescription(_t('Blog.EnableInfiniteListDesc', 'Enable Infinite List if the selected blog layout supports.'));
	}
}

/**
 * Blog controller extension
 */
class TBT_Blog_Controller_Extension extends DataExtension{
	/**
	 * Next Link for Infinite List
	 */
	protected $InfiniteList_NextLink =  null;
	
	/**
	 * On after init
	 */
	public function beforeCallActionHandler($request, $action){
		//
		if( $this->owner->EnableInfiniteList )
		{
			// get and set blog posts
			if( in_array($action, array('archive', 'category', 'profile', 'tag')) ){
				$this->owner->$action();
			}
			else{
				$this->owner->blogPosts = $this->owner->dataRecord->getBlogPosts();
			}
			
			// get the Next Link
			if( $this->owner->blogPosts && $this->owner->PaginatedList()->Exists() ){
				//
				$list = $this->owner->PaginatedList();
				
				if( $list->MoreThanOnePage() && $list->NotLastPage() )
				{
					$this->owner->InfiniteList_NextLink = $this->owner->setGetVarArray(
															array(
																'mode' => 'InfiniteList',
																$list->getPaginationGetVar() => ($list->getPageStart() + $list->getPageLength())
															)
														);
				}
			}
			
			// render the view
			if( $request->requestVar('mode') == 'InfiniteList' && $request->isAjax() ){
				return $this->owner->renderWith('Blog_InfiniteList');
			}
		}
	}
}