<?php

class ComFeaturedDatabaseTableTypes extends KDatabaseTableDefault
{
    /**
     * @param KConfig $config
     */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'lockable',
                'creatable',
                'modifiable',
                'identifiable'
            )
        ));

        parent::_initialize($config);
    }
}