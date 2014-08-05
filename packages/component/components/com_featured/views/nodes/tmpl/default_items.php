<?php defined('KOOWA') or die('Restricted Access'); ?>

<? foreach($nodes as $node) : ?>
	<? $row = $this->getService($node->identifier)->id($node->row)->getItem(); ?>
	<?= @template('com://site/featured.view.types.'.$row->type, array($row->type => $row)); ?>
<? endforeach; ?>

