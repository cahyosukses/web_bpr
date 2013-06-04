<?php get_header('admin'); ?>

<div class="widget">
    <div class="row">
        <div class="span6">
            <div class="widget-header">                
                <h3>Quick Stats</h3>
            </div>
            <div class="widget-content">

                <div class="stats">

                    <div class="stat">
                        <span class="stat-value">0</span>
                        Site Visits
                    </div> <!-- /stat -->

                    <div class="stat">
                        <span class="stat-value">0</span>
                        Unique Visits
                    </div> <!-- /stat -->

                    <div class="stat">
                        <span class="stat-value">0%</span>
                        New Visits
                    </div> <!-- /stat -->

                </div> <!-- /stats -->


                <div class="stats" id="chart-stats">

                    <div class="stat stat-chart">
                        <!--div class="chart-holder" id="donut-chart" style="padding: 0px; position: relative;"><canvas class="base" width="269" height="100"></canvas><canvas class="overlay" width="269" height="100" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="legend"><div style="position: absolute; width: 56px; height: 72px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(255,153,0);overflow:hidden"></div></div></td><td class="legendLabel">Series 1</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(34,34,34);overflow:hidden"></div></div></td><td class="legendLabel">Series 2</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(119,119,119);overflow:hidden"></div></div></td><td class="legendLabel">Series 3</td></tr></tbody></table></div></div> <!-- #donut -->
                    </div> <!-- /substat -->

                    <div class="stat stat-time">
                        <span class="stat-value" id="stat-value"></span>
                        Average Time on Site
                    </div> <!-- /substat -->

                </div> <!-- /substats -->

            </div>

            <div style="margin-top: 20px;">
                <div class="widget-header">
                    <h3>Inbox (SMS Banking)</h3> 
                    <span id="loading" style="display: none;">
                        <?php echo img('./assets/images/loader.gif'); ?>
                    </span>
                </div> <!-- /widget-header -->

                <div class="widget-content" id="inbox_gammu">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th width="100">Phone Number</th>
                                <th width="150">Received Time</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_inbox as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->TextDecoded; ?></td>
                                    <td><?php echo $row->SenderNumber; ?></td>
                                    <td><?php echo $row->ReceivingDateTime; ?></td>
                                </tr>  
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /widget-content -->
            </div>
        </div>

        <div class="span6">
            <div class="widget-header">
                <i class="icon-list-alt"></i>
                <h3>Recent News</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">
                <ul class="news-items">
                    <?php
                    foreach ($news as $row) {
                        ?>
                        <li>
                            <div class="news-item-detail">
                                <a class="news-item-title" href="<?php echo site_url('admin/news/view/' . $row->id); ?>"><?php echo $row->title; ?></a>
                                <p class="news-item-preview"><?php echo word_limiter($row->content, 15); ?></p>
                            </div>
                            <div class="news-item-date">
                                <span class="news-item-day"><?php echo date("d", strtotime($row->created_at)); ?></span>
                                <span class="news-item-month"><?php echo date("M", strtotime($row->created_at)); ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div> <!-- /widget-content -->

            <div style="margin-top: 20px;">
                <div class="widget-header">
                    <h3>Chart</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <ul class="news-items">
                        <!--<div style="height: 120px;"></div>-->
                        
                        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                        
                        <!--h2>Welcome, <?php //echo $this->session->userdata('username');        ?></h2-->
                    </ul>
                </div> <!-- /widget-content -->
            </div>

        </div>
    </div>
</div>
<?php get_footer('admin'); ?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>



<script>


    $(function() {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Requests'
            },
            subtitle: {
                text: 'SMS BANKING - PD BPR KAB BANDUNG'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Messages'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Inbox',
                    data: [60, 190, 10, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                }, {
                    name: 'Outbox',
                    data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                }]
        });
    });




    setInterval(
            function() {
                $.get("http://webbpr.me/replay_message_with_processed_false/", function(rs) {
                    return rs;
                });
            }, 5000);
//    setInterval(
//            function() {
//                $.get("http://webbpr.me/get_time_server/", function(Jam) {
//                    $('#stat-value').html(Jam);
//                });
//            }, 1000);
    setInterval(
            function() {
                $('#loading').show();
                $.get("http://webbpr.me/get_queue_inbox/", function(html) {
                    $('#inbox_gammu').html(html);
                    $('#loading').hide();
                });
            }, 6000);
</script>
