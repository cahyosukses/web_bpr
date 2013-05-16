<?php echo get_header('public'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel=example_group]").fancybox({            
            'overlayColor'		: '#000',
            'overlayOpacity'	: 0.9
        });
    });
</script>
<!-- main -->
<div class="main">    
    <section class="post">
        <div style="margin-left: 50px;">
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr1_large.png'); ?>" title="Lorem ipsum dolor sit amet">
                    <img src="<?php echo base_url('assets/images/lr1.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr2_large.png'); ?>" title="ui-lightbox">
                    <img src="<?php echo base_url('assets/images/lr2.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr1_large.png'); ?>" title="Lorem ipsum dolor sit amet">
                    <img src="<?php echo base_url('assets/images/lr1.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr2_large.png'); ?>" title="ui-lightbox">
                    <img src="<?php echo base_url('assets/images/lr2.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr1_large.png'); ?>" title="Lorem ipsum dolor sit amet">
                    <img src="<?php echo base_url('assets/images/lr1.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr2_large.png'); ?>" title="ui-lightbox">
                    <img src="<?php echo base_url('assets/images/lr2.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr1_large.png'); ?>" title="Lorem ipsum dolor sit amet">
                    <img src="<?php echo base_url('assets/images/lr1.png'); ?>" alt="" />
                </a>
            </div>
            <div style="float: left; margin-right: 5px;">
                <a rel="example_group" href="<?php echo base_url('assets/images/lr2_large.png'); ?>" title="ui-lightbox">
                    <img src="<?php echo base_url('assets/images/lr2.png'); ?>" alt="" />
                </a>
            </div>
        </div>

        <div style="clear: both;"></div>

    </section>
</div>
<!-- end of main -->

<?php echo get_footer('public'); ?>