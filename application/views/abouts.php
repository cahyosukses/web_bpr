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