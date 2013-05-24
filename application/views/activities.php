<?php echo get_header('public'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel=activities]").fancybox({
            'overlayColor'		: '#000',
            'overlayOpacity'	: 0.9
        });
    });
</script>
<!-- main -->
<div class="main">    
    <section class="post">
        <div style="margin-left: 50px;">
            <?php
            $query = $this->db->query("SELECT * FROM galleries WHERE parent != 0 ORDER BY id ASC");
            foreach ($query->result() as $row) {
            ?>    
                <div style="float: left; margin-right: 5px;">
                    <a rel="activities" href="<?php echo base_url('assets/upload/galleries/' . $row->images); ?>" title="<?php echo $row->title; ?>">
                    <?php echo get_image_public($row->images, 'galleries', 150, 120); ?>
                </a>
            </div>
            <?php } ?>
            </div>
            <div style="clear: both;"></div>
        </section>
    </div>
    <!-- end of main -->

<?php echo get_footer('public'); ?>