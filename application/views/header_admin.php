<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo get_title('TITLE'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/base-admin-2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet" type="text/css">
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
                        <a class="brand" href="#">EDP apps <sup>1.0.0</sup></a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <!--li  class="active"-->
                                <li><a href="<?php echo site_url('admin/welcome'); ?>">Home</a></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        Settings
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('admin/settings'); ?>">Parameters</a></li>
                                        <li><a href="<?php echo site_url('admin/branches'); ?>">Branch Offices</a></li>
                                        <li><a href="<?php echo site_url('admin/banners'); ?>">Banners</a></li>
                                    </ul>
                                </li>    
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        Contents
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('admin/products'); ?>">Products</a></li>
                                        <li><a href="<?php echo site_url('admin/news'); ?>">News</a></li>
                                        <li><a href="<?php echo site_url('admin/suggestions'); ?>">Suggestions</a></li>
                                        <li class="dropdown-submenu">
                                            <a href="#" tabindex="-1">Galleries</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo site_url('admin/galleries/albums/'); ?>" tabindex="-1">Create Album</a></li>
                                                <li><a href="<?php echo site_url('admin/galleries'); ?>" tabindex="-1">Add Photos</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                            <ul class="nav pull-right">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <?php echo $this->session->userdata('username'); ?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:;">My Profile</a></li>
                                    <li><a href="javascript:;">My Groups</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('admin/users/sign_out'); ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="container" style="margin-top: 40px;">