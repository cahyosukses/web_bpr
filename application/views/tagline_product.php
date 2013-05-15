<section class="cols">
    <?php
    $query = $this->db->query("SELECT * FROM categories WHERE parent=0 ORDER BY id ASC");
    foreach ($query->result() as $row) {
    ?>
        <div class="col">
        <?php echo get_image_tagline($row->images, 'products', 20, 40) ?>
        <div class="col-cnt">
            <!--h2><?php //echo $row->nama;  ?></h2-->
            <?php echo word_limiter($row->content, 10); ?>
            <br>
            <a href="<?php echo site_url('products/' . $row->slug); ?>">Detail</a>
        </div>
    </div>
    <?php } ?>

    <div class="cl">&nbsp;</div>
</section>
