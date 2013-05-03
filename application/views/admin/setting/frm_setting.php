<?php echo get_header('admin'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Settings</h3>
    </div> <!-- /widget-header -->
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post">
            <?php echo form_input($name) . form_hidden('id', $id); ?>
            <?php echo form_textarea($content); ?>
            <div class="form-actions">
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div> <!-- /widget-content -->
</div>
<?php echo get_footer('admin'); ?>