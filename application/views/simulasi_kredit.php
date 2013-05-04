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
                        <td><input type="text" name="pinjaman"></td>
                    </tr>
                    <tr>
                        <td>Bungan Pertahun</td>
                        <td><input type="text" name="suku_bunga"> %</td>
                    </tr>
                    <tr>
                        <td>Jangka Waktu</td>
                        <td><input type="text" name="jangka_waktu"> Bulan</td>
                    </tr>
                    <tr>
                        <td>Perhitungan Bunga</td>
                        <td>
                            <select name="jenis_bunga">
                                <option value="flat">Flat</option>
                                <option value="efektif">Efektif</option>
                                <option value="anuitas">Anuitas</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Proses">  </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="cl">&nbsp;</div>
    </section>
</div>
<!-- end of main -->

<?php get_footer('public'); ?>