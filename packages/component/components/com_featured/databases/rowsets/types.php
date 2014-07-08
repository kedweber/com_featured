<?php

/**
 * Com
 *
 * @author 		Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category	
 * @package 	
 * @subpackage	
 */
 
defined('KOOWA') or die('Restricted Access');

class ComFeaturedDatabaseRowsetTypes extends KDatabaseRowsetDefault
{
    public function titles()
    {
        $titles = array();

        foreach($this as $type) {
            $titles[] = $type->title;
        }

        return $titles;
    }
}