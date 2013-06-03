<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="span5">
    <div class="widget stacked">
        <div class="widget-header">
            <h3>Config File Gammu</h3>        
        </div>
        <div class="widget-content">
            <form action="<?php echo site_url('admin/smscenters/save_gammu_config/'); ?>" method="post">
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
</div>

<div class="span6">
    <div class="widget stacked">
        <div class="widget-header">
            <h3>Status Services Gammu</h3>        
        </div>
        <div class="widget-content">            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Service Gammu</th>
                        <th>Status</th>
                        <th width="103"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Gammu</td>
                        <td id="msg_services_install"></td>
                        <td>
                            <input type="button" value="Install" class="btn btn-mini btn-success" onclick="javascript: install_service();">
                            <input type="button" value="Uninstall" class="btn btn-mini btn-danger" onclick="javascript: uninstall_service();">
                        </td>
                    </tr>
                    <tr>
                        <td>Checking Modem</td>
                        <td><?php echo $gammu_identify; ?></td>
                        <td>
                            <input type="button" value="Start" class="btn btn-mini btn-success"  onclick="javascript: cek_status_modem();">
                        </td>
                    </tr>
                    <tr>
                        <td>Service Gammu</td>
                        <td id="msg_services"><?php echo $services_gammu; ?></td>
                        <td>
                            <input type="button" value="Start" class="btn btn-mini btn-success" onclick="javascript: start_service();">
                            <input type="button" value="Stop" class="btn btn-mini btn-danger" onclick="javascript: stop_service();">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
                                function stop_service() {
                                    $.get("http://webbpr.me/admin/smscenters/service_gammu/stop", function(message) {
                                        var xMessage = message;
                                        var x = document.getElementById('msg_services');
                                        x.innerHTML = xMessage;
                                    });

                                }
                                function start_service() {
                                    $.get("http://webbpr.me/admin/smscenters/service_gammu/start", function(message) {
                                        var xMessage = message;
                                        var x = document.getElementById('msg_services');
                                        x.innerHTML = xMessage;
                                    });

                                }
                                function install_service() {
                                    $.get("http://webbpr.me/admin/smscenters/service_gammu/install", function(message) {
                                        var xMessage = message;
                                        var x = document.getElementById('msg_services_install');
                                        x.innerHTML = xMessage;
                                    });
                                }
                                function uninstall_service() {
                                    $.get("http://webbpr.me/admin/smscenters/service_gammu/uninstall", function(message) {
                                        var xMessage = message;
                                        var x = document.getElementById('msg_services_install');
                                        x.innerHTML = xMessage;
                                    });
                                }
                                function cek_status_modem() {
                                    $.get("http://webbpr.me/admin/smscenters/service_gammu/identify", function(message) {
                                        var xMessage = message;
                                        var x = document.getElementById('msg_services_install');
                                        x.innerHTML = xMessage;
                                    });
                                }
</script>
<?php get_footer('admin') ?>