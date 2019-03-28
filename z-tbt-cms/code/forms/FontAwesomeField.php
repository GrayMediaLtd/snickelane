<?php
/**
 * Provides a tagging interface, storing comma-delimited tags in a DataObject string field.
 *
 * This is intended bridge the gap between 1.x and 2.x, and when possible TagField should be used
 * instead.
 *
 * @package forms
 * @subpackage fields
 */
class FontAwesomeField extends StringTagField
{
    /**
     * @var array
     */
    public static $allowed_actions = array(
        'suggest',
    );
	
    /**
     * {@inheritdoc}
     */
    public function Field($properties = array())
    {
		Requirements::css(TBTCMS . '/assets/css/font-awesome.min.css');
        Requirements::css(TAG_FIELD_DIR . '/css/select2.min.css');
        Requirements::css(TAG_FIELD_DIR . '/css/TagField.css');
		
        Requirements::javascript(TAG_FIELD_DIR . '/js/select2.js');
        Requirements::javascript(TBTCMS . '/assets/javascripts/FontAwesomeField.js');

        $this->addExtraClass('ss-fa-field');

        if ($this->getIsMultiple()) {
            $this->setAttribute('multiple', 'multiple');
        }

        if ($this->getShouldLazyLoad()) {
            $this->setAttribute('data-ss-fa-field-suggest-url', $this->getSuggestURL());
        } else {
            $properties = array_merge($properties, array(
                'Options' => $this->getOptions()
            ));
        }

        $this->setAttribute('data-can-create', (int) $this->getCanCreate());
		
		$template = $this->getTemplate();
		$template = $template ?: 'FontAwesomeField';
		
        return $this
            ->customise($properties)
            ->renderWith(array($template));
    }
}
