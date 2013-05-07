<table border="1" width="100%" style="font-size: 13px; color: black; margin-top: 15px;" cellpadding="0" cellspacing="0">
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
    $sisa_saldo = 0;
    $total_bunga = 0;
    $total_pokok = 0;
    $total_angsuran = 0;

    $pokok = $pinjaman / $jangka_waktu;
    for ($x = 1; $x <= $jangka_waktu; $x++) {
        $sisa_saldo = ($pinjaman - $pokok);
        $bunga_efektif = hitung_jasa('efektif', $pinjaman, $suku_bunga);
        $pinjaman -= $pokok;
        $angsuran = $pokok + $bunga_efektif;
        $total_bunga += $bunga_efektif;
        $total_pokok += $pokok;
        $total_angsuran += $angsuran;
    ?>
        <tr>
            <td align="center"><?php echo $x; ?></td>
            <td align="right"><?php echo rupiah($pokok); ?>&nbsp;</td>
            <td align="right"><?php echo rupiah($bunga_efektif); ?>&nbsp;</td>
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
