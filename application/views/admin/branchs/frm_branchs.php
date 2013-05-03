<?php get_header('admin'); ?>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Branchs Offices</h3>
        <a href="<?php echo site_url('admin/branches/'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Back</a>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <?php echo form_input($name) . form_hidden('id', $id); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Phone</label>
                <div class="controls">
                    <?php echo form_input($phone); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                    <?php echo form_textarea($address); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Save" name="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>