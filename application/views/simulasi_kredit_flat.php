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

            <a href="<?php echo site_url('simulator'); ?>">Hitung Ulang</a>
            <table border="1" width="100%" style="color: black; font-size: 13px;" cellpadding="0" cellspacing="0">
                <tr style="font-weight: bold; background: #ccc; text-align: center;">
                    <td width="50">Bulan</td>
                    <td>Pokok</td>
                    <td>Bunga</td>
                    <td>Angsuran</td>
                    <td>Saldo</td>
                </tr>
                <?php
                $pokok = 0;
                $bunga_flat = 0;
                $total_bunga = 0;
                $total_pokok = 0;
                $total_angsuran = 0;
                $sisa_saldo = $pinjaman;
                $bunga_flat = hitung_bunga('flat', $pinjaman, $suku_bunga);
                $pokok = ($pinjaman / $jangka_waktu);
                $angsuran = ($pokok + $bunga_flat);

                for ($x = 1; $x <= $jangka_waktu; $x++) {
                    $sisa_saldo -= $pokok;
                    $total_pokok += $pokok;
                    $total_bunga += $bunga_flat;
                    $total_angsuran += $angsuran;
                ?>
                    <tr>
                        <td align="center"><?php echo $x; ?></td>
                        <td align="right"><?php echo rupiah($pokok); ?>&nbsp;</td>
                        <td align="right"><?php echo rupiah($bunga_flat); ?>&nbsp;</td>
                        <td align="right"><?php echo rupiah($angsuran); ?>&nbsp;</td>
                        <td align="right"><?php echo rupiah($sisa_saldo); ?>&nbsp;</td>
                    </tr>
                <?php } ?>
                <tr style="background: #ccc; font-weight: bold;">
                    <td align="center">Total</td>
                    <td align="right"><?php echo rupiah($total_pokok); ?>&nbsp;</td>
                    <td align="right"><?php echo rupiah($total_bunga); ?>&nbsp;</td>
                    <td align="right"><?php echo rupiah($total_angsuran); ?>&nbsp;</td>
                    <td align="right">0&nbsp;</td>
                </tr>
            </table>
        </div>
        <div class="cl">&nbsp;</div>
    </section>
</div>
<!-- end of main -->

<?php get_footer('public'); ?>