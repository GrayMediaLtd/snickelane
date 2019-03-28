<?php
/**
 * Advanced Redirector Page
 */
class AdvancedRecirectorPage extends RedirectorPage{
	/**
	 * On before write
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		
		// Remove http:// if the ExternalURL is not valid url
		if( !$this->dbObject('ExternalURL')->isHyperLink() ) {
			$this->ExternalURL = str_replace('http://', '', $this->ExternalURL);
		}
	}
	
	/**
	 * If external url is not a valid url, then convert it to internal url.
	 */
	public function redirectionLink() {
		if($this->RedirectionType == 'External' && $this->ExternalURL && !$this->dbObject('ExternalURL')->isHyperLink()) {
			return Director::absoluteURL($this->ExternalURL);
		}
		
		return parent::redirectionLink();
	}
}