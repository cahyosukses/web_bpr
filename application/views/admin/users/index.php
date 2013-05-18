<?php get_header('admin'); ?>
<?php

function HeaderLink($value, $key, $col, $dir) {
    $out = "<a href=\"" . site_url('admin/users') . "?c=";
    //set column query string value
    switch ($key) {
        case "full_name":
            $out .= "1";
            break;
        case "username":
            $out .= "2";
            break;
        case "email":
            $out .= "3";
            break;
        case "created_at":
            $out .= "4";
            break;
        case "id":
            $out .= "5";
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
        <h3>Users</h3>
        <a href="<?php echo site_url('admin/users/add'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Add</a>
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
                    <th><?php echo HeaderLink("Full Name", "full_name", $col, $dir); ?></th>
                    <th><?php echo HeaderLink("Username", "username", $col, $dir); ?></th>
                    <th><?php echo HeaderLink("Email", "email", $col, $dir); ?></th>
                    <th><?php echo HeaderLink("Created", "created_at", $col, $dir); ?></th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->full_name; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->created_at; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo site_url('admin/users/add_role/' . $row->id); ?>">Add Role</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('admin/users/edit/' . $row->id); ?>">Edit</a></li>
                                    <li><a href="<?php echo site_url('admin/users/delete/' . $row->id); ?>">Destroy</a></li>
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