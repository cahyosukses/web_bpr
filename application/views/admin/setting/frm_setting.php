<?php echo get_header('admin'); ?>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Settings</h3>
    </div> <!-- /widget-header -->
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" enctype="">
            <?php echo form_input($name) . form_hidden('id', $id); ?>
            <select name="status" id="status_setting">
                <option value="text">Text</option>
                <option value="images">Images</option>
            </select>
            <?php echo form_textarea($content); ?>
            <div class="form-actions">
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div> <!-- /widget-content -->
</div>

<?php echo get_footer('admin'); ?>
<script>
    $(function() {
        $("#content_text").hide();
        $("#content_image").hide();
        $("#status_setting").change(function () {
            var str = "";
            $("select option:selected").each(function () {
                str += $(this).text() + " ";
                var x = str.indexOf("Text");
                if(x > -1) {
                    $("#content_text").show();
                }else{
                    $("#content_image").show();
                }
            });
        });
    });
</script>
