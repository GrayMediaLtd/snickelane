<?php
/**
 * Add extra columns to Dataobject Shortcode Gridfield
 */
class GridFieldDataobjectShortcodeExtraCols extends RequestHandler implements GridField_ColumnProvider {
	/**
	 * @var string $columnName Column name
	 */
	private static $columnName = 'dataobject-shortcode-extracols';
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Modify the list of columns displayed in the table.
	 *
	 * @see {@link GridFieldDataColumns->getDisplayFields()}
	 * @see {@link GridFieldDataColumns}.
	 *
	 * @param GridField $gridField
	 * @param array - List reference of all column names.
	 */
	public function augmentColumns($grid, &$col) {
		array_splice($col, 0, 0, $this->stat('columnName'));
	}
	
	/**
	 * Names of all columns which are affected by this component.
	 *
	 * @param GridField $gridField
	 * @return array
	 */
	public function getColumnsHandled($grid) {
		return array($this->stat('columnName'));
	}
	
	/**
	 * HTML for the column, content of the <td> element.
	 *
	 * @param  GridField $gridField
	 * @param  DataObject $record - Record displayed in this row
	 * @param  string $columnName
	 * @return string - HTML for the column. Return NULL to skip.
	 */
	public function getColumnContent($gridField, $record, $columnName) {
		return ViewableData::create()->customise(array('Record' => $record))->renderWith('GridFieldDataobjectShortcodeExtraCols');
	}

	/**
	 * Additional metadata about the column which can be used by other components,
	 * e.g. to set a title for a search column header.
	 *
	 * @param GridField $gridField
	 * @param string $column
	 * @return array - Map of arbitrary metadata identifiers to their values.
	 */
	public function getColumnMetadata($gridField, $column) {
		return array('title' => '<input class="gdsec-checkall no-change-track" type="checkbox" />');
	}

	/**
	 * Attributes for the element containing the content returned by {@link getColumnContent()}.
	 *
	 * @param  GridField $gridField
	 * @param  DataObject $record displayed in this row
	 * @param  string $columnName
	 * @return array
	 */
	public function getColumnAttributes($gridField, $record, $columnName) {
		return array('class' => 'col-dataobject-shortcode-col');
	}
}