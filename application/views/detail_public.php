<?php echo get_header('public'); ?>
<!-- main -->
<div class="main">
    <section class="cols">
        <div class="col">
            <img alt="" src="<?php echo base_url() ?>assets/css/images/savings.png">
            <div class="col-cnt">
                <h2>Savings</h2>
                <p>Lorem ipsum dolor sit amet, con-<br>sectetur adipiscing dolor emor</p>
                <a class="more" href="#">view more</a>
            </div>
        </div>
        <div class="col">
            <img alt="" src="<?php echo base_url() ?>assets/css/images/credits.png">
            <div class="col-cnt">
                <h2>Credits</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor</p>
                <a class="more" href="#">view more</a>
            </div>
        </div>
        <div class="col">
            <img alt="" src="<?php echo base_url() ?>assets/css/images/deposito.png">
            <div class="col-cnt">
                <h2>Deposito</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor</p>
                <a class="more" href="#">view more</a>
            </div>
        </div>
        <div class="cl">&nbsp;</div>
    </section>

    <section class="post">
        <div>
            <h1 style="color: #00620C; margin-bottom: 10px;"><?php echo $title_news; ?></h1>
            <?php echo get_image_public($image_news, "news", 100, 100); ?>
            <?php echo $content_news; ?>
        </div>
        <div style="margin-bottom: 10px;">
            <a name="fb_share" type="button_count" share_url="<?php echo current_url(); ?>" href="http://www.facebook.com/sharer.php">Share</a>
        </div>
        <div><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo current_url(); ?>" data-lang="id" data-hashtags="bprkabbandung">Tweet</a></div>

        <div class="cl">&nbsp;</div>
    </section>
</div>


<!-- end of main -->

<?php echo get_footer('public'); ?>