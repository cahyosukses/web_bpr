<html>
    <head>
        <title><?php echo $name; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/about_me.css');?>" type="text/css" media="all" />
    </head>        
    <body>
        <?php echo $background; ?>
        <div id="page-wrap" class="transparent profile">
            <h1 style="color: white; font-family: backlash; font-size: 50px;"><?php echo $name; ?></h1>
            <?php echo $about_me; ?>
        </div>
    </body>
</html>