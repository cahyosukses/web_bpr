<?php get_header('admin'); ?>
<script type="text/javascript">
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

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Banners</h3>
        <a href="<?php echo site_url('admin/banners/'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Back</a>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
            <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                    <?php echo form_input($title_banners) . form_hidden('id', $id); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <?php echo get_image($image, 'banners', 50, 50); ?>
                    <br/>
                    <input type="file" name="image" onchange="readURL(this)"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Content</label>
                <div class="controls">
                    <?php echo form_textarea($content); ?>
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