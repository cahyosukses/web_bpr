<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Replay Message</h3>        
    </div>
    <div class="widget-content">
        <form class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Sender Number</label>
                <div class="controls">
                    <input type="text" id="inputEmail">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Message</label>
                <div class="controls">
                    <textarea name=""></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Re. Message</label>
                <div class="controls">
                    <textarea name=""></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php get_footer('admin') ?>