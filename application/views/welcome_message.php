<?php echo get_header("public"); ?>

<!-- slider -->
<div class="m-slider">
    <div class="slider-holder">
        <span class="slider-shadow"></span>
        <span class="slider-b"></span>
        <div class="slider flexslider">
            <ul class="slides">
                <?php foreach ($banners as $rows) { ?>

                    <li>
                        <div class="img-holder">
                        <?php echo get_image($rows->images, 'banners', '', ''); ?>
                    </div>
                    <div class="slide-cnt">
                        <h2><?php echo $rows->title; ?></h2>
                        <div class="box-cnt">
                            <?php echo word_limiter($rows->content, 5); ?>
                        </div>
                        <a href="<?php echo site_url('promos/' . $rows->slug); ?>" class="grey-btn">More...</a>
                    </div>
                </li>

                <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of slider -->
        <!-- main -->
        <div class="main">
            <section class="post">
                <div class="video-holder">
                    <!--iframe width="435" height="250" src="http://www.youtube.com/embed/rZ6rbbCOgNQ" frameborder="0" allowfullscreen></iframe-->
                    <?php echo get_title('CONTENT_SUKU_BUNGA'); ?>
                </div>

                <div class="post-cnt">
                    <h2><?php echo get_title('TITLE_NEWS'); ?></h2>

                    <ul>
                <?php foreach ($news as $row) {
 ?>
                            <li>
                                <a href="<?php echo site_url('news/' . $row->slug) ?>"><?php echo $row->title; ?></a>
<?php echo word_limiter($row->content, 25); ?>
                        </li>
<?php } ?>
                    </ul>
                </div>
                <div class="cl">&nbsp;</div>
            </section>
        </div>
        <!-- end of main -->

<?php echo get_footer("public"); ?>