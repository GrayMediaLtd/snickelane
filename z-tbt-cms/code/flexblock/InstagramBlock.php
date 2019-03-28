<?php

class FlexBlock_Instagram extends FlexBlock {
    /**
     * Singular name
     */
	private static $singular_name = 'Instagram block';

    /**
     * Plural name
     */
    private static $plural_name   = 'Instagram blocks';

	/**
	 * DB fields
	 */
	private static $db = array(
		'InstagramUsername' => 'Varchar(200)'
	);

	/**
	 * Populate defaults
	 */
	public function populateDefaults() {
		parent::populateDefaults();

		$this->InstagramUsername = 'snickellane';
	}

	/*
	 * Method to show CMS fields for creating or updating
	 */
	public function getCMSFields() {
        //
		$labels = $this->fieldLabels();
 		$fields = parent::getCMSFields();

		// Fields
		$fields->addFieldToTab(
			'Root.Main',
			TextField::create('InstagramUsername', 'Username')
		);

        //
		return $fields;
	}
}
