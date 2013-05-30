<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Inbox</h3>        
        <span class="pull-right" style="margin-right: 5px;">
            Queue messages in outbox : <span id="antrian">0</span>
        </span>
    </div>
    <div class="widget-content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Message</th>
                    <th width="100">Phone Number</th>
                    <th width="150">Received Time</th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //if (!empty($inbox_row)) {
                foreach ($get_inbox->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->TextDecoded; ?></td>
                        <td><?php echo $row->SenderNumber; ?></td>
                        <td><?php echo $row->ReceivingDateTime; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a data-toggle="modal" href="<?php echo site_url('admin/smscenters/replay/' . $row->ID); ?>" data-target="#myModalReplay">click me</a></li>
                                    <li><a href="<?php echo site_url('admin/smscenters/replay/' . $row->ID); ?>">Replay</a></li>
                                    <li><a onclick="return confirm('Are you sure?');" href="<?php echo site_url('admin/smscenters/delete/' . $row->ID); ?>">Destroy</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <?php
                    //}
                    //} else {
                    ?>
                    <!--tr>
                        <td colspan="4">
                            <div class="alert alert-info">
                                <strong>Ups!</strong> No Message Received.
                            </div>
                        </td>
                    </tr-->
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination pagination-right">
            <ul>
                <?php echo $pagination; ?>
            </ul>
        </div>

    </div>
</div>


<!--Modal Form Replay-->
<div id="myModalReplay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Replay Message</h3>
    </div>
    <div class="modal-body">Loading...</div>
    </div>
</div>




<script>
                                        setInterval(
                                                function() {
                                                    $.get("http://webbpr.me/get_queue_messages/", function(message) {//alert(bmsJsonComment);
                                                        //            alert(Jam);
                                                        var xMessage = message;

                                                        var x = document.getElementById('antrian');
                                                        x.innerHTML = xMessage;
                                                    });
                                                }, 5000);
</script>
<?php get_footer('admin') ?>