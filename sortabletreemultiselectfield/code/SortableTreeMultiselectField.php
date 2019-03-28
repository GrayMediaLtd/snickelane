<?php
/**
 * SortableTreeMultiselectField class.
 * 
 * @extends TreeMultiselectField
 * @author Anh Le <anhle@thatbythem.com>
 */
class SortableTreeMultiselectField extends TreeMultiselectField{
    /**
     * Render the field
     */ 
    public function Field($properties = array()) {
		Requirements::add_i18n_javascript(FRAMEWORK_DIR . '/javascript/lang');

		Requirements::javascript(FRAMEWORK_DIR . '/thirdparty/jquery/jquery.js');
		Requirements::javascript(FRAMEWORK_DIR . '/thirdparty/jquery-entwine/dist/jquery.entwine-dist.js');
		Requirements::javascript(FRAMEWORK_DIR . '/thirdparty/jstree/jquery.jstree.js');
		Requirements::javascript(FRAMEWORK_DIR . '/javascript/TreeDropdownField.js');
		Requirements::javascript(SortableTreeMultiselectFieldDir . '/javascript/SortableTreeMultiselectField.js');
        
		Requirements::css(FRAMEWORK_DIR . '/thirdparty/jquery-ui-themes/smoothness/jquery-ui.css');
		Requirements::css(FRAMEWORK_DIR . '/css/TreeDropdownField.css');
        Requirements::css(SortableTreeMultiselectFieldDir . '/css/SortableTreeMultiselectField.css');

		$value = '';
		$titleArray = array();
		$idArray = array();
		$items = $this->getItems();
        
        if($this->form) {
            //
			$fieldName  = $this->name;
			$record     = $this->form->getRecord();
            
            //
			if(is_object($record) && $record->hasMethod($fieldName) && $this->sortField ){
                //
                $items = $record->$fieldName()->sort($this->sortField, 'ASC');
            }
        }

		if($items && count($items)) {
			foreach($items as $item) {
                //
				$idArray[]      = $item->ID;
                
                //
                /*
                if(
                   isset($item->ParentID)
                   && $item->ParentID > 0
                   && isset($item->ClassName)
                   && $parent = DataObject::get_one($item->ClassName, 'ID = '.(int)$item->ParentID )
                ){
                    //
                    $item->setField($this->labelField, ($parent->getField($this->labelField).' > '.$item->getField($this->labelField)) );
                }
                */
                
				$titleArray[]   = ($item instanceof ViewableData)
                                    ? $item->obj($this->labelField)->forTemplate()
                                    : Convert::raw2xml($item->{$this->labelField});
			}
            
			$title = implode(", ", $titleArray);
			$value = implode(",", $idArray);
		}
        else {
			$title = _t('DropdownField.CHOOSE', '(Choose)', 'start value of a dropdown');
		}

		$dataUrlTree = '';
		if ($this->form){
			$dataUrlTree = $this->Link('tree');
			if (!empty($idArray)){
				$dataUrlTree = Controller::join_links($dataUrlTree, '?forceValue='.implode(',',$idArray));
			}
		}
		$properties = array_merge(
			$properties,
			array(
				'Title' => $title,
				'Link' => $dataUrlTree,
				'Value' => $value,
                'Items' => $items
			)
		);
        
		return $this->customise($properties)->renderWith('SortableTreeMultiselectField');
	}
    
    /**
	 * @return string
	 */
	public function getSortField() {
		return $this->sortField;
	}

	/**
	 * Sets the field used to specify the sort.
	 *
	 * @param string $sortField
	 * @return GridFieldOrderableRows $this
	 */
	public function setSortField($field) {
		$this->sortField = $field;
		return $this;
	}
    
    /**
	 * Save the results into the form
	 * Calls function $record->onChange($items) before saving to the assummed
	 * Component set.
	 */
	public function saveInto(DataObjectInterface $record) {
        // Detect whether this field has actually been updated
		if($this->value !== 'unchanged') {
            //
			$items      = array();
			$fieldName  = $this->name;
            $saveAsStr  = !$record->hasMethod($fieldName);
			$saveDest   = $saveAsStr ? false: $record->$fieldName();
            
            if( !$saveAsStr && !$saveDest ) {
				user_error("TreeMultiselectField::saveInto() Field '$fieldName' not found on"
					. " $record->class.$record->ID", E_USER_ERROR);
			}
            
			if($this->value) {
				$items = preg_split("/ *, */", trim($this->value));
			}
            
			// Allows you to modify the items on your object before save
			$funcName = "onChange$fieldName";
			if($record->hasMethod($funcName)){
				$result = $record->$funcName($items);
				if(!$result){
					return;
				}
			}
            
            if($saveAsStr){
                //
                $record->setField($fieldName, $this->value);
            }
            else{
                //
                $saveDest->setByIDList($items);
                
                // Populate each object being sorted with a sort value
                $this->populateSortValues($saveDest);
            
                // Generate the current sort values
                $current = $saveDest->map('ID', $this->getSortField())->toArray();
            
                // Perform the actual re-ordering
                $this->reorderItems($saveDest, $current, $items);
            }
		}
	}
    
    /**
     * ajshort's code
     */
    /**
	 * Gets the table which contains the sort field.
	 *
	 * @param DataList $list
	 * @return string
	 */
	public function getSortTable(DataList $list) {
		$field = $this->getSortField();
        
		if($list instanceof ManyManyList) {
			$extra = $list->getExtraFields();
			$table = $list->getJoinTable();
            
			if($extra && array_key_exists($field, $extra)) {
				return $table;
			}
		}
        
		$classes = ClassInfo::dataClassesFor($list->dataClass());
        
		foreach($classes as $class) {
			if(singleton($class)->hasOwnTableDatabaseField($field)) {
				return $class;
			}
		}
        
		throw new Exception("Couldn't find the sort field '$field'");
	}
    
    protected function reorderItems($list, array $values, array $order) {
		// Get a list of sort values that can be used.
		$pool = array_values($values);
		sort($pool);

		// Loop through each item, and update the sort values which do not
		// match to order the objects.
		foreach(array_values($order) as $pos => $id) {
			if($values[$id] != $pool[$pos]) {
				DB::query(sprintf(
					'UPDATE "%s" SET "%s" = %d WHERE %s',
					$this->getSortTable($list),
					$this->getSortField(),
					$pool[$pos],
					$this->getSortTableClauseForIds($list, $id)
				));
			}
		}

		$this->extend('onAfterReorderItems', $list);
	}

	protected function populateSortValues(DataList $list) {
		$list   = clone $list;
		$field  = $this->getSortField();
		$table  = $this->getSortTable($list);
		$clause = sprintf('"%s"."%s" = 0', $table, $this->getSortField());

		foreach($list->where($clause)->column('ID') as $id) {
			$max = DB::query(sprintf('SELECT MAX("%s") + 1 FROM "%s"', $field, $table));
			$max = $max->value();

			DB::query(sprintf(
				'UPDATE "%s" SET "%s" = %d WHERE %s',
				$table,
				$field,
				$max,
				$this->getSortTableClauseForIds($list, $id)
			));
		}
	}

	protected function getSortTableClauseForIds(DataList $list, $ids) {
		if(is_array($ids)) {
			$value = 'IN (' . implode(', ', array_map('intval', $ids)) . ')';
		} else {
			$value = '= ' . (int) $ids;
		}

		if($list instanceof ManyManyList) {
			$extra = $list->getExtraFields();
			$key   = $list->getLocalKey();
			$foreignKey = $list->getForeignKey();
			$foreignID  = (int) $list->getForeignID();

			if($extra && array_key_exists($this->getSortField(), $extra)) {
				return sprintf(
					'"%s" %s AND "%s" = %d',
					$key,
					$value,
					$foreignKey,
					$foreignID
				);
			}
		}

		return "\"ID\" $value";
	}
}
