<html>
    <head>
        <title><?php echo $name; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/about_me.css'); ?>" type="text/css" media="all" />
    </head>        
    <body>
        <?php echo $background; ?>
        <div id="page-wrap" class="transparent profile">
            <h1 class="header_name"><?php echo $name; ?></h1>
            <?php echo $about_me; ?>
            <br>
            <div style="color: white; margin-left: 30px;">
                <?php echo $city; ?><br>
                <?php echo $address; ?>
                <br><br>
                <?php echo $phone; ?><br>
                <?php echo $email; ?>
            </div>
        </div>
    </body>
</html>