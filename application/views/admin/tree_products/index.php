<?php get_header('admin'); ?>
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
            $menu.= "<li>" . anchor('admin/products/sub/' . $row['id'], $row['name']) . " - [ " . anchor('admin/products/delete/' . $row['id'], "delete") . " | " . anchor('admin/products/edit/' . $row['id'], "edit") . " ]";
            if (get_sub_menu($row['id']) > 0) // Cek, sub menu
                $menu.= buat_menu($row['id']);
            $menu.= "</li>";
        }
    }
    $menu.= "</ul>";
    return $menu;
}
?>

<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">          
    <div class="widget-header">
        <h3>Navigation Tree Products</h3>
<!--        <a href="#myModal" role="button" class="btn btn-primary pull-right" style="margin: 5px;" data-toggle="modal">Create Root Product</a>-->
        <a href="<?php echo site_url('admin/products/add');?>" role="button" class="btn btn-primary pull-right" style="margin: 5px;" data-toggle="modal">Create Root Product</a>
    </div> <!-- /widget-header -->
    <div class="widget-content">
        <?php echo buat_menu(); ?>
    </div> <!-- /widget-content -->
</div>    



<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Form Root</h3>
    </div>
    <div class="modal-body">

        <form action="<?php echo site_url(); ?>/admin/products/save" method="post">
            <label>Name Root Product</label>
            <input type="text" name="name">
        </form>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<?php get_footer('admin'); ?>