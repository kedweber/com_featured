<section class="block__list">
    <div id="container">
        <?= @template('default_items'); ?>
    </div>
	<? if ($total > $nodes->count()) : ?>
		<?
			$states = $state->getData();
			unset($states['limit']);
			unset($states['offset']);
			$params = http_build_query($states);
		?>
		<footer>
			<?= @helper('com://site/moyo.template.helper.paginator.pagination', array('total' => $total, 'limit' => $state->limit, 'ajax' => true, 'url' => @route('option=com_featured&view=nodes&' . $params . '&layout=default_items&format=raw'), 'height' => 200)); ?>
		</footer>
	<? endif; ?>
</section>