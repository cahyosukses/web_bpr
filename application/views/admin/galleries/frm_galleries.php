<?php get_header('admin'); ?>
<!--script type="text/javascript" src="<?php //echo base_url(); ?>assets/tinymce/tinymce.min.js"></script-->
<script type="text/javascript">
//    tinymce.init({
//        selector: "textarea",
//        plugins: [
//            "table"
//        ],
//        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
//    });

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
        <h3>Form Galleries</h3>        
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
            <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                    <?php echo form_input($title_gallery) . form_hidden('id', $id) . form_hidden('image_edit', $image_edit).form_hidden('parent', $parent); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <?php echo get_image($image, 'galleries', 100, 100); ?>
                    <br/>
                    <input type="file" name="image" onchange="readURL(this)"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Descriptions</label>
                <div class="controls">
                    <?php echo form_textarea($content); ?>
                </div>
            </div>
            <div class="control-group">                
                <div class="controls">
                    <input type="submit" value="Save" name="submit" class="btn btn-primary">
                    <a href="<?php echo $btn_back; ?>" class="btn btn-primary">Back to albums</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>