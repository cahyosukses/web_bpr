<?php get_header('admin') ?>
<?php echo $this->session->flashdata('message'); ?>

<div class="span6">
    <div class="widget stacked">
        <div class="widget-header">
            <h3>Setting Phone/Modem</h3>
        </div>
        <div class="widget-content">
            <table>
                <thead>
                    <tr>
                        <td valign="top" width="100">ID Phone/Modem</td>
                        <td>
                            <input type="text" name="port" placeholder="Sample : Phone 1" class="span4"/>
                            <pre>Isikan sembarang nama untuk identitas modem Anda, <br>Contoh: Modem 1</pre>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Port</td>
                        <td>
                            <input type="text" name="port" placeholder="Sample : com9" class="span4"/>
                            <pre>Masukkan nomor port modem/hp. Contoh penulisan: com4 <br>(dengan huruf kecil dan tanpa spasi apa-apa)</pre>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Connection</td>
                        <td>
                            <select name="connection">
                                <option>at115200</option>
                                <option>at19200</option>
                                <option>at9600</option>
                                <option>at</option>
                            </select>
                            <pre>Pilih jenis connection hp/modem Anda. <br>Modem Wavecom = at115200</pre>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="span5">
    
</div>

<?php get_footer('admin') ?>