<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('Content'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('Title'); ?></label>
                    <div class="controls">
                        <input class="span12 required" type="text" name="title" value="<?= $type->title; ?>" placeholder="<?= @text('Title'); ?>" />
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('Details'); ?></legend>
            </fieldset>
        </div>
    </div>
</form>