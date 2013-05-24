<html>
    <head>
        <title><?php echo $name; ?></title>
        <!--<link rel="stylesheet" href="<?php //echo base_url();        ?>assets/css/aboutme.css" type="text/css" media="all" />-->


        <style>
            @font-face
            {
                font-family: 'backlash';
                src: url(./assets/fonts/backlash.ttf);
            }
            #bg {
                position:fixed; 
                top: -150px; 
                left:-50%; 
                width:200%; 
                height:200%;
                /*margin: 1px;*/
                background-size: 100%;
            }
            #bg img {
                position:absolute; 
                top:0; 
                left:0; 
                right:0; 
                bottom:0; 
                margin:auto; 
                min-width:50%;
                min-height:50%;
            }

            #page-wrap { 
                position: relative; 
                z-index: 2; 
                width: 500px; 
                margin: 20px; 
                padding: 20px; 
                background: black; 
                -moz-box-shadow: 0 0 20px black; 
                -webkit-box-shadow: 0 0 20px black; 
                box-shadow: 0 0 20px black; 
            }
            p { 
                font: 15px/2 Georgia, Serif; 
                margin: 0 0 30px 0; 
                text-indent: 40px; 
                color: white;
            }
            .transparent{ 
                opacity:.85;
                -moz-opacity:.85; 
                filter:alpha(opacity=85); 
            }
            .profile{
                -moz-border-radius: 5px;
                border-radius: 5px;
                background-color: #333333;                
            }
        </style> n
    </head>        
    <body>

        <div id="page-wrap" class="transparent profile">
            <h1 style="color: white; font-family: backlash; font-size: 50px;"><?php echo $name; ?></h1>
            <p><?php echo $about_me; ?></p>             
        </div>
        <!-- At bottom, 'cause it's not really content -->
        <div id="bg">
            <?php echo $background; ?>
        </div>
    </body>
</html>