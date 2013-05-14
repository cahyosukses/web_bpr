<?php get_header('admin'); ?>

<div class="widget">
    <div class="row">
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
        </div>
        <div class="span6 pull-right">
            <div class="widget-header">
                <h3>Quick Shortcuts</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">
                <ul class="news-items">
                    <h2>Welcome, <?php echo $this->session->userdata('username'); ?></h2>
                </ul>
            </div> <!-- /widget-content -->
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>


