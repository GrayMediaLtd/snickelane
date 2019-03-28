<?php
/**
 * Controller extension
 */
class TBT_Controller_Extension extends Extension{
	/**
     * Allowed actions
     */
    private static $allowed_actions = array(
	    'SubscribeForm',
		'doSubscribe'
	);
	
	/**
	 * Set get vars
	 *
	 * based on framework/control/HTTP.php | setGetVar
	 *
	 * @param array $varArray Array contains ['varname' => 'varvalue']
	 * @param String $currentURL Relative or absolute URL (Optional).
	 * @param String $separator Separator for http_build_query(). (Optional).
	 * @return String Absolute URL
	 */
	public function setGetVarArray($varArray, $currentURL = null, $separator = '&amp;') {
		$uri = $currentURL ? $currentURL : Director::absoluteURL($_SERVER['REQUEST_URI']);
		
		if( !is_array($varArray) || empty($varArray) )
		   return $uri;

		$isRelative = false;
		// We need absolute URLs for parse_url()
		if(Director::is_relative_url($uri)) {
			$uri = Director::absoluteBaseURL() . $uri;
			$isRelative = true;
		}

		// try to parse uri
		$parts = parse_url($uri);
		if(!$parts) {
			throw new InvalidArgumentException("Can't parse URL: " . $uri);
		}

		// Parse params and add new variable
		$params = array();
		if(isset($parts['query'])) parse_str($parts['query'], $params);
		
		foreach($varArray as $varname => $varvalue){
			$params[$varname] = $varvalue;
		}

		// Generate URI segments and formatting
		$scheme = (isset($parts['scheme'])) ? $parts['scheme'] : 'http';
		$user = (isset($parts['user']) && $parts['user'] != '')  ? $parts['user'] : '';

		if($user != '') {
			// format in either user:pass@host.com or user@host.com
			$user .= (isset($parts['pass']) && $parts['pass'] != '') ? ':' . $parts['pass'] . '@' : '@';
		}

		$host = (isset($parts['host'])) ? $parts['host'] : '';
		$port = (isset($parts['port']) && $parts['port'] != '') ? ':'.$parts['port'] : '';
		$path = (isset($parts['path']) && $parts['path'] != '') ? $parts['path'] : '';

		// handle URL params which are existing / new
		$params = ($params) ?  '?' . http_build_query($params, null, $separator) : '';

		// keep fragments (anchors) intact.
		$fragment = (isset($parts['fragment']) && $parts['fragment'] != '') ?  '#'.$parts['fragment'] : '';

		// Recompile URI segments
		$newUri =  $scheme . '://' . $user . $host . $port . $path . $params . $fragment;

		if($isRelative) return Director::makeRelative($newUri);

		return $newUri;
	}
	
	/**
	 * Subcribe Form
	 */ 
	public function SubscribeForm() {
        //
		$fields = new FieldList(
            $emailField = new EmailField('SubscribeEmail', _t('SubscribeForm.Email', 'Email'))
        );
		
		$emailField->setAttribute('placeholder', 'email-address@email.com');
		
        $actions = new FieldList(
            $submit = new FormAction('doSubscribe', _t('SubscribeForm.Submit', 'Send me updates'))
        );
		
		$submit->useButtonTag = true;
		
        $required = new RequiredFields('SubscribeEmail');
		
		$form = new Form($this->owner, 'SubscribeForm', $fields, $actions, $required);
	   
	    return $form;
    }
    
	/**
	 * Do subscribe
	 */ 
    public function doSubscribe($data, $form) {
		//
		$subscriber = new EmailSubscriber();
		$subscriber->Email = isset($data['SubscribeEmail']) ? $data['SubscribeEmail'] : null;
		
		try{
			$subscriber->write();
			$form->sessionMessage( _t('SubscribeForm.SuccessMessage', 'You have subscribed successfully.'), 'good');
		}
		catch(ValidationException $e){
			$form->sessionMessage($e->getMessage(), 'bad');
		}
		
        // redirect back
        return $this->owner->redirect( $this->owner->Link() . '#Form_SubscribeForm' );
    }
}