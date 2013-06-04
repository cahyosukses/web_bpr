<div id="result"></div>
<form action="<?php echo site_url('admin/smscenters/send_messages'); ?>" id="form_submit_replay">
    <label class="control-label">Sender Number</label>
    <?php echo form_input($sender_number); ?>
    <label class="control-label">Message</label>
    <?php echo form_textarea($sender_msg); ?>
    <label class="control-label">Re. Message</label>    
    <?php echo form_textarea($re_msg); ?>
    <div id="maxkarakter" class="pull-right"> 160 karakter </div>
    <div>
        <button type="button" class="btn btn-success" id="btn_submit">Send</button>
    </div>
</form>

<script>
    $('#btn_submit').click(function() {
        var frm_submit = $('#form_submit_replay');
        var re_msg = $('#re_msg').val();

        if (re_msg != '') {
            $('#loading_modal').show();
            $.ajax({
                url: frm_submit.attr('action'),
                type: "GET",
                data: frm_submit.serialize(),
                success: function() {
                    alert('Message send.');
                    $('#modal_form_replay').html(' ');
                    $('#myModalReplay').modal('hide');
                },
                error: function() {
                    alert("failure");
                }
            });
        } else {
            alert('Re Message not blank.');
        }
    });

    function Hitung() {
        var curText = document.fmessage.textmessage.value.length;
        var maxText = 160;
        var sisa = maxText - curText;
        var isi = document.getElementById('maxkarakter');
        isi.innerHTML = sisa + ' karakter';
    }

</script>