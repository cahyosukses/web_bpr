<form action="" method="post">
    <label class="control-label">Sender Number</label>
    <?php echo form_input($sender_number); ?>
    <label class="control-label">Message</label>
    <?php echo form_textarea($sender_msg); ?>
    <label class="control-label">Re. Message</label>    
    <?php echo form_textarea($re_msg); ?>
    <div>
        <button type="submit" class="btn btn-success">Send</button>
    </div>
</form>
