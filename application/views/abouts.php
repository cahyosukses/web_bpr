<?php echo get_header('public'); ?>

<!-- main -->
<div class="main">
    <?php $this->load->view('tagline_product'); ?>
    <section class="post">
        <div>
            <h2><?php echo get_title('TITLE_HISTORY'); ?></h2>
            <?php echo get_title('HISTORIES'); ?>
        </div>
        <div style="margin-top: 25px;">
            <h2><?php echo get_title('TITLE_VISION'); ?></h2>
            <?php echo get_title('VISION_MISION'); ?>
        </div>
        <div class="cl">&nbsp;</div>
    </section>
</div>
<!-- end of main -->   

<?php echo get_footer('public'); ?>