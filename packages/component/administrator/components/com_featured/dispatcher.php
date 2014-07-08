<?php

defined('KOOWA') or die('Protected resource');

class ComFeaturedDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'types',
        ));

        parent::_initialize($config);
    }
}