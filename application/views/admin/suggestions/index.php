<?php get_header('admin'); ?>
<?php

function HeaderLink($value, $key, $col, $dir) {
    $out = "<a href=\"" . site_url('admin/suggestions') . "?c=";
    //set column query string value
    switch ($key) {
        case "title":
            $out .= "1";
            break;
        case "content":
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

<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Suggestions</h3>
        
    </div>
    <div class="widget-content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="200"><?php echo HeaderLink("Name", "name", $col, $dir); ?></th>
                    <th>No Rekening</th>
                    <th><?php echo HeaderLink("Phone", "phone", $col, $dir); ?></th>
                    <th><?php echo HeaderLink("Email", "email", $col, $dir); ?></th>                    
                    <th><?php echo HeaderLink("Subject", "subject", $col, $dir); ?></th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contacts as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->no_rek; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->email; ?></td>
                        
                        <td><?php echo $row->subject; ?></td>
                        <td><?php echo $row->comment; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php //echo site_url('admin/suggestions/edit/' . $row->id); ?>"><i class="icon-ok"></i> Replay</a></li>
                                    <li><a href="<?php //echo site_url('admin/suggestions/delete/' . $row->id); ?>"><i class="icon-trash"></i> Destroy</a></li>
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