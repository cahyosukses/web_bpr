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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').attr('width', '150');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Branchs Offices</h3>
        <a href="<?php echo site_url('admin/branches/'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Back</a>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
            <div class="control-group">
                <label class="control-label">Name *</label>
                <div class="controls">
                    <?php echo form_input($name) . form_hidden('id', $id); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Phone *</label>
                <div class="controls">
                    <?php echo form_input($phone); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Address *</label>
                <div class="controls">
                    <?php echo form_textarea($address); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Crew *</label>
                <div class="controls">
                    <?php echo form_textarea($crew); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Save" name="submit" class="btn btn-primary">
                    <a href="<?php echo $btn_back; ?>" class="btn">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>