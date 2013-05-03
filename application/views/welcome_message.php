<?php echo get_header("public"); ?>

<!-- slider -->
<div class="m-slider">
    <div class="slider-holder">
        <span class="slider-shadow"></span>
        <span class="slider-b"></span>
        <div class="slider flexslider">
            <ul class="slides">
                <li>
                    <div class="img-holder">
                        <img src="<?php echo base_url(); ?>assets/css/images/img-slide-promo-1.png" alt="" />
                    </div>
                    <div class="slide-cnt">
                        <h2>Dapatkan Discount 10%?</h2>
                        <div class="box-cnt">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget augue quis lorem ipsum dolor sit amet, consectetur adipiscing elit. llus eget augue quis lorem ipsum dolor sit amet, free css templates</p>
                        </div>
                        <a href="<?php echo site_url('ads/');?>" class="grey-btn">more details</a>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="<?php echo base_url(); ?>assets/css/images/img-slide-promo-3.png" alt="" />
                    </div>
                    <div class="slide-cnt">
                        <h2>Promo!!!</h2>
                        <div class="box-cnt">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget augue quis lorem ipsum dolor sit amet, consectetur adipiscing elit. llus eget augue quis lorem ipsum dolor sit amet, free css templates</p>
                        </div>
                        <a href="<?php echo site_url('ads/');?>" class="grey-btn">more details</a>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="<?php echo base_url(); ?>assets/css/images/img-slide-promo-2.png" alt="" />
                    </div>
                    <div class="slide-cnt">
                        <h2>Dapatkan ratusan juta rupiah!</h2>
                        <div class="box-cnt">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget augue quis lorem ipsum dolor sit amet, consectetur free css templates</p>
                        </div>
                        <a href="<?php echo site_url('ads/');?>" class="grey-btn">more details</a>
                    </div>
                </li>
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