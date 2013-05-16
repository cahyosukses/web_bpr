<?php get_header('admin'); ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3><?php echo $title_news; ?></h3>
        <a href="<?php echo site_url('admin/'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Back</a>
    </div>
    <div class="widget-content">
        <div class="pull-left" style="padding: 10px;">
            <?php echo get_image($images_news, 'news', 300, 200); ?>
        </div>
        <?php echo $content_news; ?>
        </div>
    </div>
<?php get_footer('admin'); ?>