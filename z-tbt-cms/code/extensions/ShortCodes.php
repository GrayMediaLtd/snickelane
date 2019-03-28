<?php
/**
 * ShortCodes class
 *
 * @author Anh Le <leanh@anhld.com>
 */
class TBT_ShortCodes {
	/**
	 * Embed button
	 */
	public static function Button($arguments = array(), $content = null, $parser = null, $tagName)
	{
		$arguments = ArrayLib::array_merge_recursive(array(
			'classes' 			=> 'btn-block btn-blue',
			'link' 				=> '',
			'newWindow'     	=> false,
			'noFollow'			=> false,
 			'attributes' 		=> array(),
			'wrapperClass' 		=> '',
			'iconClass'			=> ''
		), $arguments);
		
		$arguments['content'] = $content;
		
		$template = new SSViewer('Shortcode_button');
		
		return $template->process(new ArrayData($arguments));
	}
	
	/**
	 * Embed video
	 */
	public static function Video($arguments = array(), $content = null, $parser = null, $tagName)
	{
		$arguments = ArrayLib::array_merge_recursive(array(
			'id' 		=> '',
			'service' 	=> '',
			'width' 	=> '',
			'height' 	=> '',
            'caption'   => '',
            'imageid'   => 0,
            'thumbnail' => '',
		), $arguments);
        
        // video url
        $arguments['videourl'] = false;
        
        if($arguments['id']){
            switch($arguments['service']){
                case 'youtube':
                    $arguments['videourl'] = '//www.youtube.com/embed/'.$arguments['id'].'?&amp;rel=0&amp;enablejsapi=1&amp;color1=0xb1b1b1&amp;color2=0xcfcfcf&amp;fs=1&amp;hd=1&amp;showsearch=0&amp;showinfo=0';
                    break;
                case 'vimeo':
                    $arguments['videourl'] = '//player.vimeo.com/video/'.$arguments['id'];
                    break;
                case 'dailymotion';
                    $arguments['videourl'] = '//www.dailymotion.com/embed/video/'.$arguments['id'];
                    break;
            }
        }
		
        // get internal image
        $arguments['imageid'] = (int)$arguments['imageid'];
        
        if( $arguments['imageid'] && $image = Image::get()->byID($arguments['imageid']) ){
            $arguments['thumbnail'] = $image->ScaleWidth(1200)->getAbsoluteURL();
        }
        
        // render the view
		$template = new SSViewer('Shortcode_video');
		
		return $template->process(new ArrayData($arguments));
	}
    
    /**
	 * Image
	 */
	public static function Image($arguments = array(), $altText = null, $parser = null, $tagName)
	{
		$arguments = ArrayLib::array_merge_recursive(array(
			'id' 		    => 0,
			'name' 	        => '',
			'title' 	    => '',
			'url' 	        => '',
			'width' 	    => '',
			'height' 	    => '',
            'caption'       => '',
            'align'         => '',
            'alt'           => $altText,
            'resizemode'    => 'custom',
            'fullwidth'     => false,
            'lightbox'      => false
		), $arguments);
		
        //
        $arguments['original_url'] = $arguments['url'];
        
        // image align
        switch($arguments['align']){
            case 'left':
            case 'right':
                $arguments['fullwidth'] = false;
                break;
            
            case 'center':
                $arguments['fullwidth'] = true;
                break;
        }
        
        //
        $arguments['id'] = (int)$arguments['id'];
        
        if( $arguments['id'] > 0 && $image = Image::get()->byID($arguments['id']) ){
            //
            $resizeMode = $arguments['resizemode'];
            
            $arguments['original_url'] = $image->getAbsoluteURL();
            
            if($resizeMode == 'custom'){
                //
                $arguments['url'] = $image->fill($arguments['width'], $arguments['height'])->getAbsoluteURL();
            }
            else if($resizeMode == 'auto'){
                //
                $arguments['url'] = $image->ScaleWidth(1200)->getAbsoluteURL();
            }
            else if($resizeMode == 'none'){
                //
                $arguments['url'] = $image->getAbsoluteURL();
            }
        }
        
        // render
		$template = new SSViewer('Shortcode_image');
		
		return $template->process(new ArrayData($arguments));
	}
    
    /**
	 * Quote
	 */
	public static function Quote($arguments = array(), $content = null, $parser = null, $tagName)
	{
		$arguments = ArrayLib::array_merge_recursive(array(
			'author' 		=> '',
            'message'       => $content
		), $arguments);
        
        // render
		$template = new SSViewer('Shortcode_quote');
		
		return $template->process(new ArrayData($arguments));
	}
	
	/**
	 * Dataobject
	 */
	public static function Dataobject($arguments = array(), $content = null, $parser = null, $tagName)
	{
		$arguments = ArrayLib::array_merge_recursive(array(
			'ids' 		 => '',
            'name'       => '',
			'template'   => ''
		), $arguments);
		
		if( $arguments['ids']
		   && $arguments['name']
		   && ClassInfo::dataClassesFor($arguments['name'])
		){
			$ids = explode(',', $arguments['ids']);
			
			if( !empty($ids) ){
				// get table
				$tables = array_keys( ClassInfo::dataClassesFor($arguments['name']) );
				
				// get records
				$items = DataList::create($arguments['name'])->byIDs($ids)->sort(' FIELD(`'.end($tables).'`.`ID`, '.$arguments['ids'].')  ');
				
				if($items){
					//
					$arguments['Items'] = $items;
					
					// do render
					$template = new SSViewer('Shortcode_Dataobject_'.$arguments['name'].($arguments['template'] ? '_'.$arguments['template'] : ''));
					
					return $template->process(new ArrayData($arguments));
				}
			}
		}
		
        return false;
	}
}
