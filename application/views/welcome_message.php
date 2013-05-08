<?php echo get_header("public"); ?>
<style type="text/css">

    table.generic {
        border-collapse: collapse;
        border-spacing: 0;        
        margin: 0 auto;
        width: 220px;
        float: left;
    }
    table.generic caption {
        font-size: 1.4rem;
        margin: 1em auto;
    }
    table.generic th, table.generic td {
        padding: 0.65em;
    }
    table.grid th, table.grid thead {
        background: none repeat scroll 0 0 #000000;
        border: 1px solid #000000;
        color: #FFFFFF;
    }
    table.grid td {
        border: 1px solid #777777;
    }
    table.zebra thead {
        background: none repeat scroll 0 0 #000000;
        border: 1px solid #000000;
        color: #FFFFFF;
    }
    table.zebra th {
        background: none repeat scroll 0 0 #000000;
        color: #FFFFFF;
    }
    table.zebra tr:nth-child(2n+1) {
        background: none repeat scroll 0 0 #CCCCCC;
    }
    table.zebra tr:hover {
        background: none repeat scroll 0 0 #AAAAAA;
    }
    table.zebra td {
        border-right: 1px solid #777777;
    }
    table.zebra {
        border: 1px solid #777777;
    }
    table.rounded th, table.rounded td {
        padding: 0.40em;
    }
    table.rounded:nth-child(2n+1) {
        background: none repeat scroll 0 0 transparent;
    }
    table.rounded th {
        background: linear-gradient(#AAAAAA, #777777) repeat scroll 0 0 transparent;
        color: #FFFFFF;
    }
    table.rounded th:first-child {
        border-radius: 9px 0 0 0;
    }
    table.rounded th:last-child {
        border-radius: 0 9px 0 0;
    }
    table.rounded tr:last-child td {
        background: none repeat scroll 0 0 #CCCCCC;
    }
    table.rounded tr:last-child td:first-child {
        border-radius: 0 0 0 9px;
    }
    table.rounded tr:last-child td:last-child {
        border-radius: 0 0 9px 0;
    }
    table.rounded tbody tr:nth-child(2n+1) {
        background: none repeat scroll 0 0 #CCCCCC;
    }
    table.rounded tbody tr:last-child {
        background: none repeat scroll 0 0 transparent;
    }

</style>

<!-- slider -->
<div class="m-slider">
    <div class="slider-holder">
        <span class="slider-shadow"></span>
        <span class="slider-b"></span>
        <div class="slider flexslider">
            <ul class="slides">
                <?php foreach ($banners as $rows) {
                ?>

                    <li>
                        <div class="img-holder">
                        <?php echo get_image($rows->images, 'banners', '', ''); ?>
                    </div>
                    <div class="slide-cnt">
                        <h2><?php echo $rows->title; ?></h2>
                        <div class="box-cnt">
                            <?php echo word_limiter($rows->content, 5); ?>
                        </div>
                        <a href="<?php echo site_url('promos/' . $rows->slug); ?>" class="grey-btn">More...</a>
                    </div>
                </li>

                <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of slider -->
        <!-- main -->
        <div class="main">
            <section class="cols">
                <section class="testimonial">
            <?php echo get_title('MOTO'); ?>
                </section>           
                </section>
                <section class="post">
                    <div class="video-holder">
                        <!--iframe width="435" height="250" src="http://www.youtube.com/embed/rZ6rbbCOgNQ" frameborder="0" allowfullscreen></iframe-->
            <?php echo get_title('CONTENT_SUKU_BUNGA'); ?>
                    </div>

                    <div class="post-cnt">
                        <h2><?php echo get_title('TITLE_NEWS'); ?></h2>

                        <ul>
                <?php foreach ($news as $row) {
                ?>
                            <li>
                                <a href="<?php echo site_url('news/' . $row->slug) ?>"><?php echo $row->title; ?></a>
                    <?php echo word_limiter($row->content, 25); ?>
                        </li>
                <?php } ?>
                    </ul>
                </div>
                <div class="cl">&nbsp;</div>
            </section>
        </div>
        <!-- end of main -->

<?php echo get_footer("public"); ?>