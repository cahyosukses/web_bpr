<?php echo get_header('public'); ?>
<!-- main -->
<div class="main">
    <?php $this->load->view('tagline_product'); ?>
    <section class="post">
        <div style="color: #000000;">
            <h2 style="color: #00620C; margin-bottom: 10px;"><?php echo $title_news; ?></h2>
            <?php echo get_image_public($image_news, $dir, $width, $height); ?>
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