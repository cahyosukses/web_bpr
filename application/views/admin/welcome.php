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
                        <span class="stat-value">00:00:00</span>
							Average Time on Site
                    </div> <!-- /substat -->

                </div> <!-- /substats -->

            </div>

            <div style="margin-top: 20px;">
                <div class="widget-header">
                    <h3>Quick Shortcuts</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <ul class="news-items">
                        <div style="height: 265px;"></div>
                        <!--h2>Welcome, <?php //echo $this->session->userdata('username');  ?></h2-->
                    </ul>
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
                                <a class="news-item-title" href="<?php echo site_url('admin/news/edit/' . $row->id); ?>"><?php echo $row->title; ?></a>
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
                        <div style="height: 120px;"></div>
                        <!--h2>Welcome, <?php //echo $this->session->userdata('username');  ?></h2-->
                    </ul>
                </div> <!-- /widget-content -->
            </div>

        </div>
    </div>
</div>
<?php get_footer('admin'); ?>


