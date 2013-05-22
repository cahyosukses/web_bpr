<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Inbox</h3>        
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
                                        <li><a href="<?php echo site_url('admin/smscenters/replay/' . $row->SenderNumber); ?>">Replay</a></li>
                                        <li><a onclick="return confirm('Are you sure?');" href="<?php echo site_url('admin/smscenters/albums/delete/' . $row->SenderNumber); ?>">Destroy</a></li>
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
<?php get_footer('admin') ?>