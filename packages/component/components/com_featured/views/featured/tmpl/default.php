<section class="block__list">
    <header id="articles-header">
        <h1><?= KRequest::get('get.title', 'string'); ?></h1>
    </header>
    <div id="container">
        <?= @template('default_items'); ?>
    </div>
    <? if($total > $limit) : ?>
        <footer class="light hidden-print">
            <?= @helper('com://site/moyo.template.helper.paginator.pagination', array('total' => $total, 'limit' => $limit, 'ajax' => true, 'url' => $link, 'height' => 200, 'pageUrl' => 'articles-header')); ?>
        </footer>
    <? endif; ?>
</section>