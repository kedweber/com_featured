<?php

/**
 * Com
 *
 * @author 		Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category	
 * @package 	
 * @subpackage	
 */
 
defined('KOOWA') or die('Restricted Access'); ?>

<? foreach($taxonomies as $taxonomy) : ?>
    <?= @template((string)'com://site/'.str_replace('com_', '', $taxonomy->option).'.view.'.$taxonomy->type.'.list_item', array($taxonomy->type => $taxonomy)); ?>
<? endforeach; ?>