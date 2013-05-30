<form>
    <label class="control-label" for="inputEmail">Sender Number</label>
    <?php echo form_input($sender_number); ?>
    <label class="control-label" for="inputPassword">Message</label>
    <?php echo form_textarea($sender_msg); ?>
    <label class="control-label" for="inputPassword">Re. Message</label>    
    <?php echo form_textarea($re_msg); ?>
    <div>
        <button type="submit" class="btn btn-success">Send</button>
    </div>
</form>
