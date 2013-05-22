<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Config File Gammu</h3>        
    </div>
    <div class="widget-content">
        <form action="<?php echo site_url('admin/smscenters/save_gammu_config/');?>" method="post">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>GammuURC</th>
                        <th>GammuSMSDRC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo form_textarea($gammuurc) ?>
                        </td>
                        <td>
                            <?php echo form_textarea($gammusmsdrc) ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="btn_update" class="btn btn-danger btn-large btn-block" value="Update File Gammu">
        </form>
    </div>
</div>
<?php get_footer('admin') ?>