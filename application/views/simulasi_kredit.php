<?php echo get_header('public'); ?>

<!-- main -->
<div class="main">
    <section class="cols">
        <div class="col">
            <img alt="" src="<?php echo base_url() ?>assets/css/images/savings.png">
            <div class="col-cnt">
                <h2>Savings</h2>
                <p>Lorem ipsum dolor sit amet, con-<br>sectetur adipiscing dolor emor</p>
                <a class="more" href="#">view more</a>
            </div>
        </div>
        <div class="col">
            <img alt="" src="<?php echo base_url() ?>assets/css/images/credits.png">
            <div class="col-cnt">
                <h2>Credits</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor</p>
                <a class="more" href="#">view more</a>
            </div>
        </div>
        <div class="col">
            <img alt="" src="<?php echo base_url() ?>assets/css/images/deposito.png">
            <div class="col-cnt">
                <h2>Deposito</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing dolor</p>
                <a class="more" href="#">view more</a>
            </div>
        </div>
        <div class="cl">&nbsp;</div>
    </section>
    <section class="post">
        <div>
            <h2><?php echo get_title('TITLE_SIMULASI_KREDIT'); ?></h2>
            <form acaction="<?php echo site_url('simulasi_kredit'); ?>" method="post">
                <table>
                    <tr>
                        <td>Jumlah Pinjaman</td>
                        <td><input type="text" name="pinjaman" value="<?php echo $this->input->post('pinjaman'); ?>"></td>
                    </tr>
                    <tr>
                        <td>Bungan Pertahun</td>
                        <td><input type="text" name="suku_bunga" value="<?php echo $this->input->post('suku_bunga'); ?>"> %</td>
                    </tr>
                    <tr>
                        <td>Jangka Waktu</td>
                        <td><input type="text" name="jangka_waktu" value="<?php echo $this->input->post('jangka_waktu'); ?>"> Bulan</td>
                    </tr>
                    <tr>
                        <td>Perhitungan Bunga</td>
                        <td>
                            <select name="jenis_bunga">
                                <option value="flat" <?php echo $jenis_bunga == 'flat' ? 'selected' : '' ?> >Flat</option>
                                <option value="efektif" <?php echo $jenis_bunga == 'efektif' ? 'selected' : '' ?>>Efektif</option>
                                <option value="anuitas" <?php echo $jenis_bunga == 'anuitas' ? 'selected' : '' ?>>Anuitas</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Proses">  </td>
                    </tr>
                </table>
            </form>
            <?php
            switch ($jenis_bunga) {
                case 'flat':
                    $this->load->view('simulasi_kredit_flat');
                    break;
                case 'efektif':
                    $this->load->view('simulasi_kredit_efektif');
                    break;
                case 'anuitas':
                    $this->load->view('simulasi_kredit_anuitas');
                    break;
            }
            ?>
        </div>
        <div class="cl">&nbsp;</div>
    </section>
</div>
<!-- end of main -->

<?php get_footer('public'); ?>