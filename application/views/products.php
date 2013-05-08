<?php echo get_header("public"); ?>
<?php

function get_sub_menu($id) {
    $sql1 = "SELECT * FROM categories WHERE parent = '$id'";
    $hs1 = mysql_query($sql1);
    $jum = mysql_num_rows($hs1); // mendapatkan jumlah sub menu
    return $jum;
}

function buat_menu($parent=0) {
    $menu = "<ul>"; // inisialisasi awal
    $sql = "SELECT * FROM categories WHERE parent='$parent' ORDER BY id ASC";
    $hasil = mysql_query($sql);
    while ($row = mysql_fetch_assoc($hasil)) {
        if ($row['parent'] == $parent) {
            $menu.= "<li>" . anchor('products/' . $row['slug'], $row['nama']) . "";
            if (get_sub_menu($row['id']) > 0) // Cek, sub menu
                $menu.= buat_menu($row['id']);
            $menu.= "</li>";
        }
    }
    $menu.= "</ul>";
    return $menu;
}
?>
<!-- main -->
<div class="main">
    <?php $this->load->view('tagline_product'); ?>
    <section class="post">
        <div class="video-holder" style="width: 300px;">
            <h2>Our Products</h2>
            <?php echo buat_menu(); ?>
        </div>
        <div class="post-cnt" style="width: 600px;">
            <h2>Detail Loan Products</h2>
            <?php if ($content_product) { ?>
            <?php echo $content_product; ?>
            <?php } else { ?>
                Product Product
            <?php } ?>
        </div>
        <div class="cl">&nbsp;</div>
    </section>
</div>

<?php echo get_footer("public"); ?>