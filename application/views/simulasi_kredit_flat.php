<table border="1" width="100%" style="color: black; font-size: 13px; margin-top: 15px;" cellpadding="0" cellspacing="0">
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
    $bunga_flat = hitung_jasa('flat', $pinjaman, $suku_bunga);
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
