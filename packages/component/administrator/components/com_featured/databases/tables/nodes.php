<?php

defined('KOOWA') or die('Protected resource');

class ComFeaturedDatabaseTableNodes extends KDatabaseTableDefault
{
	/**
	 * @param KConfig $config
	 */
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'behaviors' => array(
				'com://admin/moyo.database.behavior.creatable',
				'modifiable',
				'identifiable',
			)
		));

		parent::_initialize($config);
	}
}