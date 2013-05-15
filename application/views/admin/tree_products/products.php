<?php get_header('admin'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "code table"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Navigation Tree Products</h3>
    </div> <!-- /widget-header -->
    <div class="widget-content">
        <form class="form-horizontal" action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Name *</label>
                <div class="controls">
                    <?php echo form_input($name) . form_hidden('id', $id); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Image</label>
                <div class="controls">
                    <input type="file" name="image">                    
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Content *</label>
                <div class="controls">
                    <?php echo form_textarea($content); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Save</button>
                    <a href="<?php echo $btn_back;?>" class="btn">Back</a>
                </div>
            </div>
        </form>
    </div> <!-- /widget-content -->
</div>
<?php get_footer('admin'); ?>