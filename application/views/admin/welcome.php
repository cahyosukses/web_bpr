<?php get_header('admin'); ?>
<h1>Welcome, <?php echo $this->session->userdata('username'); ?></h1>
<?php get_footer('admin'); ?>