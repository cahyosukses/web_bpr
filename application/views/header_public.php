<!DOCTYPE html>
<html lang="en" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
        <title><?php echo get_title('TITLE'); ?></title>
        <!--link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" /-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css" media="all" />


        <!--link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' /-->

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.0.min.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
                <script src="js/modernizr.custom.js"></script>
	<![endif]-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/functions.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


    </head>
    <body>
        <!-- wraper -->
        <div id="wrapper">
            <!-- shell -->
            <div class="shell">
                <!-- container -->
                <div class="container">
                    <!-- header -->
                    <header id="header">
                        <h1 id="logo" style="height:60px; width: 300px; margin-top: -10px;"><a href="#">-</a></h1>
                        <div style="text-align: center; float: left; margin-top: -17px; margin-left: 120px; background: #ccc;">
                            Content Masih Dalam Pengembangan <br>Untuk Saran dan Kritik Silahkan Tinggalkan Pesan<br>
                            di Menu "HUBUNGI BPR"
                        </div>
                        <!-- search -->
                        <div class="search">
                            <form method="post">
                                <span class="field"><input type="text" class="field" value="keywords here ..." title="keywords here ..." /></span>
                                <input type="submit" class="search-btn" value="" />
                            </form>
                        </div>
                        <!-- end of search -->
                    </header>
                    <!-- end of header -->
                    <!-- navigation -->
                    <nav id="navigation">
                        <ul>
                            <li class="<?php echo $class == "Home" ? "active" : "" ?>"><a href="<?php echo site_url(); ?>">Beranda</a></li>
                            <li class="<?php echo $class == "Products" ? "active" : "" ?>"><a href="<?php echo site_url('products/kredit'); ?>">Produk</a></li>
                            <li class="<?php echo $class == "Abouts" ? "active" : "" ?>"><a href="<?php echo site_url('abouts'); ?>">Tentang Kami</a></li>
                            <li class="<?php echo $class == "Contacts" ? "active" : "" ?>"><a href="<?php echo site_url('contacts'); ?>">Hubungi BPR</a></li>
                            <li class="<?php echo $class == "Simulator" ? "active" : "" ?>"><a href="<?php echo site_url('simulator'); ?>">Simulasi Kredit</a></li>
                            <li class="<?php echo $class == "Activities" ? "active" : "" ?>"><a href="<?php echo site_url('activities'); ?>">Albums Kegiatan</a></li>
                        </ul>
                    </nav>
                    <!-- end of navigation -->