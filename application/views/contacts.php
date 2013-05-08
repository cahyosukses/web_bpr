<?php echo get_header('public'); ?>
<style>
    .msg_alert{
        color: #e30c0c;
        font-weight: bold;
    }
    .msg_alert_success{
        color: #0044cc;
        font-weight: bold;
    }
</style>
<!-- main -->
<div class="main">
    <?php $this->load->view('tagline_product'); ?>
    <section class="post">
        <div class="video-holder">
            <img alt="" src="<?php echo base_url(); ?>assets/css/images/contacts.png">
        </div>
        <div class="col-cnt">
            <h3>Hubungi Kami</h3>
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" method="post" action="<?php echo site_url('contacts/save'); ?>">
                <table>
                    <tr>
                        <td width="200">Nama Lengkap</td>
                        <td><input type="text" name="name" id="name" style="width: 200px;"> </td>
                    </tr>
                    <tr>
                        <td>No Rekening</td>
                        <td><input type="text" name="no_rek" style="width: 200px;"></td>
                    </tr>
                    <tr>
                        <td>Tlp</td>
                        <td><input type="text" name="phone" id="phone" style="width: 200px;"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" style="width: 200px;"></td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat</td>
                        <td><textarea name="address" rows="5" cols="50"></textarea> </td>
                    </tr>
                    <tr>
                        <td>Kategori Subyek</td>
                        <td>
                            <select name="subject">
                                <option value="saran">Saran</option>
                                <option value="info">Informasi</option>
                                <option value="komplain">Komplain</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Komentar</td>
                        <td><textarea name="comment" rows="5" cols="50"></textarea> </td>
                    </tr>
                    <tr>
                        <td valign="top">Validation</td>
                        <td>
                            <?php echo $cap_img; ?><br>
                            <input type="text" name="captcha" value="">
                        </td>
                    </tr>
                    <tr>
                        <td valign="top"></td>
                        <td>
                            <input type="submit" name="submit" value="Kirim" style="font-size: 13px; padding: 5px;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="cl">&nbsp;</div>
    </section>
</div>
<!-- end of main -->

<?php echo get_footer('public'); ?>