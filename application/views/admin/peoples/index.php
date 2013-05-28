<?php get_header('admin'); ?>
<?php

function HeaderLink($value, $key, $col, $dir) {
    $out = "<a href=\"" . site_url('admin/peoples') . "?c=";
    //set column query string value
    switch ($key) {
        case "name":
            $out .= "1";
            break;
        case "id":
            $out .= "2";
            break;
        default:
            $out .= "0";
    }

    $out .= "&d=";

    //reverse sort if the current column is clicked
    if ($key == $col) {
        switch ($dir) {
            case "ASC":
                $out .= "1";
                break;
            default:
                $out .= "0";
        }
    } else {
        //pass on current sort direction
        switch ($dir) {
            case "ASC":
                $out .= "0";
                break;
            default:
                $out .= "1";
        }
    }

    //complete link
    $out .= "\">$value</a>";

    return $out;
}
?>

<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Employees</h3>
        <a href="<?php echo site_url('admin/peoples/add'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Add</a>
    </div>
    <div class="widget-content">
        <div class="input-append pull-right">
            <form action="" method="get">
                <input class="span2" type="text" name="q" placeholder="Search..." value="<?php echo $q; ?>">
                <button class="btn" type="submit" name="search">Search</button>
            </form>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th><?php echo HeaderLink("Name", "name", $col, $dir); ?></th>
                    <th>Image BG</th>
                    <th>About me</th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($peoples as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo get_image($row->photo_bg, "peoples", 100, 100); ?></td>
                        <td><?php echo word_limiter($row->about_me, 20); ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo site_url('admin/peoples/edit/' . $row->id); ?>"><i class="icon-ok"></i> Edit</a></li>
                                    <li><a href="<?php echo site_url('admin/peoples/delete/' . $row->id); ?>"><i class="icon-trash"></i> Destroy</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('~/' . $row->slug); ?>" target="_blank"><i class="icon-ok"></i> View</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination pagination-right">
            <ul>
                <?php echo $pagination; ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer('admin'); ?>