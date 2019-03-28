<?php
namespace TBTCMS\Libs;

class Helper
{
	/**
	 * Method to make string be safe
	 */
	public static function stringURLSafe($string)
	{
	   //remove any '-' from the string since they will be used as concatenaters
	   $str = str_replace('-', ' ', $string);
	   
	   // Convert certain symbols to letter representation
	   $str = str_replace(array('&', '"', '<', '>'), array('a', 'q', 'l', 'g'), $str);
	   
	   // Lowercase and trim
	   $str = trim(strtolower($str));
	   
	   // Remove any duplicate whitespace, and ensure all characters are alphanumeric
	   $str = preg_replace(array('/\s+/','/[^A-Za-z0-9\-]/'), array('-',''), $str);
	   
	   return $str;
	}
	
	/**
	 *
	 * Cleans text of all formatting and scripting code
	 *
	 * @access public
	 * @return string
	 */
	public static function cleanText(&$text){
	   //
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
	 * Image Upload Field
	 */
	public static function ImageUploadField($name, $label, $folder, $items=null){
	   //
	   $f = new \UploadField($name, $label, $items);
	   $f->setAllowedFileCategories('image');
	   $f->setFolderName($folder);
	   
	   return $f;
	}
	 
	/**
	 * HTML Editor Field
	 */
	public static function HTMLEditorField($name, $label, $rows=null, $cols=null){
	   //
	   $f = new \HTMLEditorField($name, $label);
	   
	   //set number of rows
	   if($rows){
		  $f->setRows($rows);
	   }
	   
	   //set number of columns
	   if($cols){
		  $f->setColumns($cols);
	   }
		
	   return $f;
	}
	
	/**
	 * Shortcut to GridFieldConfig_RelationEditor
	 *
	 * @see GridFieldOrderableRows
	 * @see GridFieldAddExistingSearchButton
	 */
	public static function GridFieldConfig_RelationEditor($count = 30, $sortField = null, $buttonLabel = 'Add new'){
	   // Grid configuration
	   $cfg = \GridFieldConfig_RelationEditor::create($count);
	   $cfg->addComponent( new \GridFieldAddExistingSearchButton() );
	   $cfg->getComponentByType('GridFieldAddNewButton')->setButtonName($buttonLabel);
	   $cfg->removeComponentsByType('GridFieldAddExistingAutocompleter');
	   
	   if($sortField && is_string($sortField) ){
		  $cfg->addComponent( new \GridFieldOrderableRows($sortField) );
	   }
	   
	   return $cfg;
	}
	
	/**
	 * Configuration for inline editing grid field
	 * requires Grid Field Extensions - https://github.com/silverstripe-australia/silverstripe-gridfieldextensions/
	 *
	 * @param int $itemsPerPage Number of items per page
	 * @param string $sortField Database sort field
	 */
	public static function GridFieldConfig_InlineEditor($itemsPerPage = 30, $sortField = null){
		// Grid field configuration
		$cfg = \GridFieldConfig::create()
			->addComponent(new \GridFieldButtonRow('before'))
			->addComponent(new \GridFieldToolbarHeader())
			->addComponent(new \GridFieldTitleHeader())
			->addComponent(new \GridFieldEditableColumns())
			->addComponent(new \GridFieldDeleteAction())
			->addComponent(new \GridFieldAddNewInlineButton())
			->addComponent($pagination = new \GridFieldPaginator($itemsPerPage));
		
		$pagination->setThrowExceptionOnBadDataType(false);
		
		if($sortField && is_string($sortField) ){
			$cfg->addComponent( new \GridFieldOrderableRows($sortField) );
		}
		
		return $cfg;
	}
	
	/**
	 * Method to cut-off a string
	 */
	public static function substr($str, $len, $more = '...', $encode = 'utf-8'){
	   //
	   if ($str == "" || $str == NULL || is_array($str) || strlen($str) <= $len){
		  return $str;
	   }
	   
	   //
	   $str = mb_substr($str, 0, $len, $encode);
	   
	   if ($str != "")
	   {
		  if (!substr_count($str, " ")){
			 $str .= $more;
			 return $str;
		  }
		  
		  while(strlen($str) && ($str[strlen($str)-1] != " ")){
			 $str = mb_substr($str, 0, -1, $encode);
		  }
		  
		  $str  = mb_substr($str, 0, -1, $encode);
		  $str .= $more;
	   }
	   
	   $str = preg_replace("/[[:blank:]]+/", " ", $str);
	   
	   return $str;
	}
	
	/**
	 * Method to create an excerpt from contents
	 */
	public static function createExcerpt($string, $maxOut)
	{
	   //Clean input text
	   $string = self::cleanText($string);
	   
	   $string2Array = explode(' ', $string, ($maxOut + 1));
	   
	   if( count($string2Array) > $maxOut ){
		  array_pop($string2Array);
		  
		  return implode(' ', $string2Array)."...";
	   }
	   
	   return $string;
	}
	
	/**
	 * Validate given url
	 *
	 * source: http://php.net/manual/en/function.preg-match.php#93824
	 */
	public static function isValidUrl($url){
	   //
	   $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
	   $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
	   $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})|localhost"; // Host or IP 
	   $regex .= "(\:[0-9]{2,5})?"; // Port 
	   $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
	   $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
	   $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor
		
	   return preg_match("/^$regex$/", $url);
	}
	
	/**
	 * Parse Youtube ID from given URL
	 *
	 * @param string $url Youtube URL
	 * @return string Youtube ID if matches, false if else. 
	 */
	public static function parseYoutubeIDFromURL($url){
		//
		preg_match('/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/', $url, $matches);
		
		return (isset($matches[1]) ? $matches[1] : false);
	}
	
	/**
	 * Parse Vimeo ID from given URL
	 *
	 * @param string $url Vimeo URL
	 * @return string Vimeo ID if matches, false if else. 
	 */
	public static function parseVimeoIDFromURL($url){
		//
		if( preg_match('/https?:\/\/(?:www\.|player\.)?vimeo.com/', $url, $matches) )
		{
			$curl = new Curl();
			$curl->setOpt(CURLOPT_AUTOREFERER, true);
			$curl->setOpt(CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
            
			$curl->get('https://vimeo.com/api/oembed.json?url='.$url);
			
			if( !$curl->error && preg_match('/video_id/', $curl->raw_response) ){
				$data = \Convert::json2array($curl->raw_response);
				
				return $data['video_id'];
			}
		}
		
		return false;
	}
}