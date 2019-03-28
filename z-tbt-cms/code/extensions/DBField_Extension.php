<?php
class TBT_DBField_Extension extends DataExtension{
	/**
	 * No HTML
	 */
	public function noHTML(){
		$text = $this->owner->value;
		$text = preg_replace("'<script[^>]*>.*?</script>'si", '', $text);
        $text = preg_replace('/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is', '\2 (\1)', $text);
        $text = preg_replace('/<!--.+?-->/', '', $text);
        $text = preg_replace('/{.+?}/', '', $text);
        $text = preg_replace('/&nbsp;/', ' ', $text);
        $text = preg_replace('/&amp;/', ' ', $text);
        $text = preg_replace('/&quot;/', ' ', $text);
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
		
		return trim($text);
	}
	
	/**
	 * No Space
	 */
	public function noSpace(){
		$val = $this->owner->value;
		
		return str_replace(' ', '', $val);
	}
	
	/**
	 * Base64 encoding / decoding
	 */
	public function base64($decode = false){
		$val = $this->owner->value;
		
		return ( $decode ? base64_decode($val) : base64_encode($val) );
	}
	
	/**
	 * Safe string to use on the URL
	 */
	public function safeURLString($encode = false){
		$val = $this->owner->value;
		
		return ( $encode ? urlencode($val) : URLSegmentFilter::create()->filter($val) );
	}
	
	/**
	 * Check if the field contains a string
	 */
	public function containString($string){
		//
		if( is_subclass_of($this->owner, 'StringField') ){
			// get the value
			$val = $this->owner->value;
			
			return (stripos($val, $string) !== false ? true : false);
		}
		
		return false;
	}
	
	/**
	 * String to array data
	 */
	public function str2List($glue = ","){
		//
		if( is_subclass_of($this->owner, 'StringField') ){
			// get the value
			$val = $this->owner->value;
			
			switch($glue){
				case 'br': $glue = "\n";
			}
			
			$list = new ArrayList();
			
			foreach( explode($glue, $val) as $text ){
				$list->push( new ArrayData( array('Text' => $text) ) );
			}
			
			return $list;
		}
		
		return false;
	}
	
	/**
	 * Check if the field is hyperlink
	 */
	public function isHyperlink(){
		//
		if( is_subclass_of($this->owner, 'StringField') ){
			// get the value
			$val = $this->owner->value;
			
			$regex  = "((https?|ftp)\:\/\/)?"; // SCHEME 
			$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
			$regex .= "([a-z0-9-.]*)\.([a-z]{2,3})|localhost"; // Host or IP 
			$regex .= "(\:[0-9]{2,5})?"; // Port 
			$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
			$regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
			$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor
			 
			return preg_match("/^$regex$/", $val);
		}
		
		return false;
	}
}
