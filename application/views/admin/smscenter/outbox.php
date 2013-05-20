<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Outbox</h3>        
    </div>
    <div class="widget-content">
        <div style="height: 410px;"></div>
    </div>
</div>
<?php get_footer('admin') ?>