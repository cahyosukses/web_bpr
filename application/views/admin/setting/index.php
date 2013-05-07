<?php get_header('admin') ?>

<?php

function HeaderLink($value, $key, $col, $dir) {
    $out = "<a href=\"" . site_url('admin/settings') . "?c=";
    //set column query string value
    switch ($key) {
        case "name":
            $out .= "1";
            break;
        case "value":
            $out .= "2";
            break;
        case "id":
            $out .= "3";
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
<div class="widget stacked">
    <div class="widget-header">
        <h3>Settings</h3>
        <a href="<?php echo site_url('admin/settings/add'); ?>" class="btn btn-primary pull-right" style="margin: 5px;">Add</a>
    </div>
    <div class="widget-content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="150"><?php echo HeaderLink("Name", "name", $col, $dir); ?></th>
                    <th><?php echo HeaderLink("Value", "value", $col, $dir); ?></th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($settings as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo word_limiter($row->value, 20); ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo site_url('admin/settings/edit/' . $row->id); ?>"><i class="icon-ok"></i> Edit</a></li>
                                    <li><a href="<?php echo site_url('admin/settings/delete/' . $row->id); ?>"><i class="icon-trash"></i> Destroy</a></li>
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

<?php get_footer('admin') ?>