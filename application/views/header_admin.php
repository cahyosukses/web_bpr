<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo replace($title); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/base-admin-2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet" type="text/css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php if ($this->session->userdata('logged_in') == true) {
        ?>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="brand" href="#">EDP apps <sup>1.0</sup></a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <!--li  class="active"-->
                                <li><a href="<?php echo site_url('admin/welcome'); ?>">Home</a></li>
                                <li><a href="<?php echo site_url('admin/products'); ?>">Products</a></li>
                                <li><a href="<?php echo site_url('admin/settings'); ?>">Settings</a></li>
                                <li><a href="<?php echo site_url('admin/news'); ?>">News</a></li>
                                <li><a href="<?php echo site_url('admin/branches'); ?>">Branch Offices</a></li>
                                <li><a href="<?php echo site_url('admin/suggestions'); ?>">Suggestions</a></li>
                                <li><a href="<?php echo site_url('admin/banners'); ?>">Banners</a></li>
                            </ul>
                            <p class="navbar-text pull-right">
                                <a href="<?php echo site_url('admin/users/sign_out'); ?>">Logout</a>
                            </p>    
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="container" style="margin-top: 40px;">