<?php get_header('admin') ?>

<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">               
        <form class="input-append" style="margin-top: 5px; margin-left: 5px;" method="get">
            <input type="text" id="datepicker1" class="input-small" placeholder="Date 1" name="date_1">&nbsp;
            <input type="text" id="datepicker2" class="input-small" placeholder="Date 2" name="date_2">
            <button type="submit" class="btn" name="search">Search</button>
        </form>
        <span class="pull-right" style="margin-right: 5px;">
            <span id="loading" style="display: none;">
                <?php echo img('./assets/images/loader.gif'); ?>
            </span> Queue messages in outbox : <span id="antrian">0</span>
        </span>
    </div>
    <div class="widget-content">
        <table class="table table-hover">
            <thead>
                <tr>                    
                    <th width="90">Phone Number</th>
                    <th width="500">Message</th>
                    <th width="150">Sending Date Time</th>
                    <th width="90">Status</th>
                    <th width="90">Sender ID</th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $inbox = new Gaminbox();
                foreach ($get_sentitems as $row) {
                    ?>
                    <tr>                        
                        <td><?php echo $row->DestinationNumber; ?></td>
                        <td><?php echo $row->TextDecoded; ?></td>
                        <td><?php echo $row->SendingDateTime; ?></td>
                        <td><?php echo $row->Status; ?></td>
                        <td><?php echo $row->SenderID; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a data-toggle="modal" class="button_replay" data-href="<?php echo site_url('admin/smscenters/replay/' . $row->ID); ?>">Replay</a></li>
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
    <div class="modal-body">
        <div id="loading_modal" style="padding: 5px; text-align: center;">
            <?php echo img('./assets/images/loader.gif'); ?>&nbsp;&nbsp;Loading...
        </div>
        <div id="modal_form_replay"></div>
    </div>
</div>
</div>
<?php get_footer('admin') ?>