<?php

defined('KOOWA') or die('Protected resource');

class ComFeaturedDatabaseTableNodes extends KDatabaseTableDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        // Set the table for multilingual purposes.
        $lang_tag = JFactory::getLanguage()->getTag();
        $parts = explode('-', $lang_tag);
        $lang = $parts[0];
        $base = 'featured_nodes';
        $table = ($lang != 'en' ? $lang . '_' : '') . $base;

        try {
            $this->getDatabase()->getTableSchema($table);
        }
        catch(Exception $e) {
            // The table doesn't exist, so reset it.
            $table = $base;
        }

        $this->_base = $table;
        $this->_name = $table;
    }

	/**
	 * @param KConfig $config
	 */
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'behaviors' => array(
				'com://admin/moyo.database.behavior.creatable',
				'modifiable',
				'identifiable'
			)
		));

		parent::_initialize($config);
	}
}