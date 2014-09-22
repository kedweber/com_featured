<?php

defined('KOOWA') or die('Protected resource');

class ComFeaturedDatabaseTableNodes extends KDatabaseTableDefault
{

    /**
     * @param KConfig $config
     */
    protected function  _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'com://admin/translations.database.behavior.translatable'
            )
        ));

        parent::_initialize($config);
    }
}