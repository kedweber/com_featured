<?php

/**
 * Com
 *
 * @author 		Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category	
 * @package 	
 * @subpackage	
 */
 
defined('KOOWA') or die('Restricted Access');?>

<?= @helper('behavior.mootools'); ?>
<!--
<script src="media://lib_koowa/js/koowa.js" />
-->

<div class="row-fluid">
    <form action="" method="get" class="-koowa-grid" data-toolbar=".toolbar-list">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;" width="1">
                    <?= @helper('grid.checkall')?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'title', 'title' => @text('TITLE'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'enabled', 'title' => @text('PUBLISHED'))); ?>
                </th>
            </tr>
            </thead>

            <tfoot>
            <? if($total > count($types)) : ?>
            <tr>
                <td colspan="6">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
            <? endif; ?>
            </tfoot>

            <tbody>
            <? foreach ($types as $type) : ?>
                <tr>
                    <td style="text-align: center;">
                        <?= @helper('grid.checkbox', array('row' => $type))?>
                    </td>
                    <td>
                        <a href="<?= @route('view=type&id='.$type->id); ?>">
                            <?= $type->title; ?>
                        </a>
                    </td>
                    <td>
                        <?= @helper('grid.enable', array('row' => $type)); ?>
                    </td>
                </tr>
            <? endforeach; ?>

            <? if (!count($types)) : ?>
                <tr>
                    <td colspan="6" align="center" style="text-align: center;">
                        <?= @text('NO_ITEMS') ?>
                    </td>
                </tr>
            <? endif; ?>
            </tbody>
        </table>
    </form>
</div>