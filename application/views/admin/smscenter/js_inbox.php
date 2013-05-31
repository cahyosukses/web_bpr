<table class="table table-hover">
    <thead>
        <tr>
            <th>Message</th>
            <th width="100">Phone Number</th>
            <th width="150">Received Time</th>                               
        </tr>
    </thead>
    <tbody>
        <?php foreach ($get_inbox as $row) {
            ?>
            <tr>
                <td><?php echo $row->TextDecoded; ?></td>
                <td><?php echo $row->SenderNumber; ?></td>
                <td><?php echo $row->ReceivingDateTime; ?></td>
            </tr>  
        <?php } ?>
    </tbody>
</table>