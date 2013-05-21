<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Outbox / SentItems</h3>
    </div>
    <div class="widget-content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Phone Number</th>
                    <th>Sending DateTime</th>
                    <th>Delivery DateTime</th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($sentitems_row)) {
                    foreach ($get_sentitems->result() as $row) {
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
                                        <li><a href="<?php echo site_url('admin/smscenters/replay/' . $row->id); ?>">Replay</a></li>
                                        <li><a onclick="return confirm('Are you sure?');" href="<?php echo site_url('admin/smscenters/albums/delete/' . $row->id); ?>"><i class="icon-trash"></i> Destroy</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-info">
                                <strong>Ups!</strong> Message Empty.
                            </div>
                        </td>
                    </tr>
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