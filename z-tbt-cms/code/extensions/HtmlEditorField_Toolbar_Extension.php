<?php
/**
 * HtmlEditorField extension
 */
class TBT_HtmlEditorField_Toolbar_Extension extends Extension{
    /**
     * Allowed actions
     */
    private static $allowed_actions = array(
        'VideoForm',
		'DataobjectShortcodeForm'
	);
    
    /**
     * Update media form
     */
    public function updateMediaForm(&$form){
        //
        Requirements::javascript(TBTCMS . '/assets/javascripts/extensions/HtmlEditorField_Toolbar.js');
        
        //
        # $form->unsetAllActions();
        
        $form->Actions()->push(
            new LiteralField('insertAsSortCode',
				'<button class="action ui-button field insert-media-as-shortcode ss-ui-action-constructive" data-icon="accept">Insert as shortcode</button>')
        );
    }
    
    /**
     *
     */
    public function updateFieldsForImage(&$fields, $url, $file){
        //
        $options = array(
            'auto'      => 'Auto',
            'none'      => 'None'
        );
        
        // add crop tags
        $cropTags = Config::inst()->get('Image', 'cropper_tags');
        
        if( is_array($cropTags) && !empty($cropTags) ){
            foreach($cropTags as $key => $tag){
                $options['crop_'.$key] = 'Crop '.$tag['width'].'x'.$tag['height'].' ('.$tag['title'].')';
            }
        }
        
        $options['custom'] = 'Use bellow dimensions';
        
        // insert the field
        $fields->insertAfter('CSSClass', new DropdownField('ResizeCrop', 'Resize / Crop', $options));
    }
    
    /**
     *
     */
    public function updateFieldsForFile(&$fields, $url, $file){
        //
        $fields->fieldByName('CSSClass')->setValue('center');
    }
    
    /**
     * Form to insert video shortcode
     */
    public function VideoForm(){
        // Fields
		$imgField = \TBTCMS\Libs\Helper::ImageUploadField('VideoThumbnailImage', _t('HtmlEditorField.VideoThumbnailImage', 'Internal thumbnail image'), 'Uploads/VideoThumbnails/');
        $imgField->setAllowedMaxFileNumber(1);
        $imgField->setDescription("Optional, if you would like to use an internal image as video thumbnail then choose it from here.");
		
        $fields = new FieldList(
            CompositeField::create(
                new LiteralField(
                    'Heading',
                    sprintf(
                        '<h3 class="htmleditorfield-imagegalleryform-heading">%s</h3>',
                        _t('HtmlEditorField.InsertVideo', 'Insert Video')
                    )
            ))
            ->addExtraClass('CompositeField composite cms-content-header nolabel'),
            
            CompositeField::create(
                TextField::create('VideoURL', _t('HtmlEditorField.VideoURL', 'Video URL'))->setDescription('Supported services: Youtube, Vimeo and Dailymotion.'),
                TextField::create('VideoCaption', _t('HtmlEditorField.VideoCaption', 'Caption'))
                // TextField::create('VideoThumbnailURL', _t('HtmlEditorField.VideoThumbnailURL', 'External thumbnail url')),
				// $imgField
            )
            ->addExtraClass('ss-insert-media content')
        );
        
        // Actions
        $actions = new FieldList(
            FormAction::create('insert', _t('HtmlEditorField.ButtonInsertVideo', 'Insert video'))
                        ->addExtraClass('ss-ui-action-constructive')
                        ->setAttribute('data-icon', 'accept')
                        ->setUseButtonTag(true)
        );
        
        // Form
        $form = new Form(
			$this->owner->controller,
			"{$this->owner->name}/VideoForm",
            $fields,
            $actions
        );
        
        $form->unsetValidator();
		$form->loadDataFrom($this->owner);
		$form->addExtraClass('htmleditorfield-form htmleditorfield-videoform cms-dialog-content');
        
        //
        $this->owner->extend('updateVideoForm', $form);
        
        //
        return $form;
    }
	
	/**
     * Form to insert dataobject shortcode
     */
	public function DataobjectShortcodeForm(){
		// Fields
        $fields = new FieldList(
            CompositeField::create(
                new LiteralField(
                    'Heading',
                    sprintf(
                        '<h3 class="htmleditorfield-imagegalleryform-heading">%s</h3>',
                        _t('HtmlEditorField.InsertDataobjectShortcode', 'Insert Data Object')
                    )
            ))
            ->addExtraClass('CompositeField composite cms-content-header nolabel'),
			
			new LiteralField(
				'DataobjectShortcodeIframe',
				'<iframe class="dataobject-shortcode-iframe" style="width: 100%; height: 600px; border: 0;" src="'.Director::absoluteURL('admin/dataobjectshortcodeadmin').'"></iframe>'
			),
			
			new LiteralField(
				'SubmitButton',
				'<input type="Submit" value="Submit" class="SubmitButton" style="display: none" />'
			)
        );
		
		// Form
		$form = new Form(
			$this->owner->controller,
			"{$this->owner->name}/DataobjectShortcodeForm",
			$fields,
			new FieldList()
		);
        
        $form->unsetValidator();
		$form->loadDataFrom($this->owner);
		$form->addExtraClass('htmleditorfield-form htmleditorfield-dataobjectshortcode-form cms-dialog-content');
        
        //
        $this->owner->extend('updateDataobjectShortcodeForm', $form);
        
        //
        return $form;
	}
	
	/*
    public function DataobjectShortcodeForm_Backup(){
		// Fields
        $fields = new FieldList(
            CompositeField::create(
                new LiteralField(
                    'Heading',
                    sprintf(
                        '<h3 class="htmleditorfield-imagegalleryform-heading">%s</h3>',
                        _t('HtmlEditorField.InsertDataobjectShortcode', 'Insert Data Object')
                    )
            ))
            ->addExtraClass('CompositeField composite cms-content-header nolabel')
        );
		
		// Validate existence of class names
		$classNames      = Config::inst()->get('DataobjectShortcode', 'ClassNames');
		$callableClasses = array();
		
		if( is_array($classNames) && !empty($classNames) ){
			foreach($classNames as $className){
				if( is_string($className) && ClassInfo::dataClassesFor($className) ){
					$callableClasses[] = $className;
				}
			}
		}
		
		if( empty($callableClasses) ){
			// set warning message
			$warningMsg = new LiteralField('WarningMsg', '<p class="message warning" style="margin: 15px;">'._t('DataobjectShortcode.WarningNoCallableClasses', 'No callable object found. Please setup at least one.').'</p>');
			
			$fields->push($warningMsg);
			
			$actions = new FieldList();
		}
		else{
			// Listing limit
			$limit     = (int)Config::inst()->get('DataobjectShortcode', 'ListingLimit');
			$limit     = $limit > 0 ? $limit : 60;
			
			// Current class name
			$currentClass = $this->owner->controller->getRequest()->requestVar('ClassName');
			$currentClass = ( $currentClass && in_array($currentClass, $callableClasses) ) ? $currentClass : $callableClasses[0];
			$singleton    = singleton($currentClass);
			
			// Grid field
			$gridCfg = GridFieldConfig::create()->addComponents(
				new GridFieldFilterHeader(),
				new GridFieldSortableHeader(),
				new GridFieldDataColumns(),
				new GridFieldCheckboxSelectComponent(),
				new GridFieldDataobjectShortcodeExtraFields($currentClass),
				new GridFieldPaginator($limit)
			);
			
			$gridField = new GridField('ShortcodeDataobjects', false, null, $gridCfg);
			$gridField->addExtraClass('selectable-objects');
			
			$list = DataList::create($currentClass);
			
			//--- do callback on before set the list into the gridfield
			$events = Config::inst()->get('DataobjectShortcode', 'OnBeforeSetGridFieldList');
			
			if( isset($events[$currentClass])
			   && is_string($events[$currentClass])
			   && $events[$currentClass]
			){
				$eventData      = explode('::', $events[$currentClass]);
				$eventDataCount = count($eventData);
				$eventObject    = $eventMethod = null;
				
				if($eventDataCount == 1 && function_exists($eventData[0]) ){
					$list = call_user_func($eventData[0], $list);
				}
				elseif($eventDataCount == 2 && method_exists($eventData[0], $eventData[1]) ){
					$list = call_user_func(array($eventData[0], $eventData[1]), $list);
				}
			}
			
			$gridField->setList($list);
			
			//-- Grid field columns
			$displayFields = Config::inst()->get('DataobjectShortcode', 'DisplayFields');
		    $displayCols   = array();
			
			if( isset($displayFields[$currentClass])
			   && is_array($displayFields[$currentClass])
			   && !empty($displayFields[$currentClass])
			){
				foreach( $displayFields[$currentClass] as $displayField => $labelData ){
					$label = $singleton->fieldLabel($displayField);
					
					if( isset($labelData['label_translation_str']) && $labelData['label_translation_str'] ){
						$label = _t($labelData['label_translation_str'], $label);
					}
					elseif( isset($labelData['label']) && $labelData['label'] ){
						$label = $labelData['label'];
					}
					
					$displayCols[$displayField] = $label;
				}
			}
			
			if( empty($displayCols) ){
				$displayCols = $singleton->summaryFields();
			}
			
			$columns = $gridField->getConfig()->getComponentByType('GridFieldDataColumns');
			$columns->setDisplayFields($displayCols);
			
			if( isset($displayCols['Created']) ){
				$columns->setFieldCasting(array(
					'Created' => 'SS_Datetime->Nice'
				));
			}
			
			// Dropdown field to select a specify class
			$singularNames = array();
			
			foreach($callableClasses as $callableClass){
				$singularNames[$callableClass] = singleton($callableClass)->singular_name();
			}
			
			$classesDropdown = new DropdownField('ClassName', _t('DataobjectShortcode.Type', 'Type'), $singularNames);
			$classesDropdown->addExtraClass('content-select');
			$classesDropdown->setValue($currentClass);
			
			$fields->push(
				CompositeField::create(
					$classesDropdown,
					$gridField,
					new LiteralField('TipMsg', '<p class="message warning">Tip: before do insert, drag &amp; drop rows to sort the checked values.</p>')
				)
				->addExtraClass('ss-insert-media content')
			);
			
			// Actions
			$actions = new FieldList(
				FormAction::create('insert', _t('HtmlEditorField.ButtonInsertDataobjectShortcode', 'Insert'))
							->addExtraClass('ss-ui-action-constructive')
							->setAttribute('data-icon', 'accept')
							->setUseButtonTag(true)
			);
		}
		
		// Form
		$form = new Form(
			$this->owner->controller,
			"{$this->owner->name}/DataobjectShortcodeForm",
			$fields,
			$actions
		);
        
        $form->unsetValidator();
		$form->loadDataFrom($this->owner);
		$form->addExtraClass('htmleditorfield-form htmleditorfield-dataobjectshortcode-form cms-dialog-content');
        
        //
        $this->owner->extend('updateDataobjectShortcodeForm', $form);
        
        //
        return $form;
    }
    */
	
	/**
	 * Get the ClassName to filter records
	 *
	 * @return string
	 */
	protected function getDataobjectShortcodeClassName() {
		$className = $this->owner->controller->getRequest()->requestVar('ClassName');
		$this->owner->extend('updateDataobjectShortcodeClassName', $className);
		return $className;
	}
}