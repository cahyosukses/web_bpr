
<!DOCTYPE html>
<head>
    <title></title>
    <link rel='stylesheet' type='text/css' media='all' href='style.css' />
</head>
<body>
    <div id="content">
        <?php
        if (isset($_POST['submit'])) {
            if (empty($_POST['sp']) || empty($_POST['lama_angsuran']) || empty($_POST['flat']) || empty($_POST['sliding'])) {
                header("Location: ".site_url('simulasi_kredit/')." ");
            } else {
                $SP_FLAT = $_POST['sp'];
                $SP_SLIDING = $_POST['sp'];
                $LA = $_POST['lama_angsuran'];
                $I_FLAT = $_POST['flat'];
                $I_SLIDING = $_POST['sliding'];

                $bunga_flat = 0;
                $total_bunga_flat = 0;
                $cicilan_flat = 0;
                $total_cicilan_flat = 0;

                $bunga_sliding = 0;
                $total_bunga_sliding = 0;
                $cicilan_sliding = 0;
                $total_cicilan_sliding = 0;

                $c_pokok = $_POST['sp'] / $LA;

                echo "<h1>RESULT</h1>";
                echo "<table cellpadding='0' cellspacing='1' border='0' style='width:100%' class='tableborder'>";
                echo "<tr>";
                echo "<th rowspan=2>Bulan</th>";
                echo "<th rowspan=2>Sisa Pinjaman</th>";
                echo "<th rowspan=2>Cicilan Pokok</th>";
                echo "<th colspan=2>Flat Rate</th>";
                echo "<th colspan=2>Sliding Rate</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Bunga " . $I_FLAT . " %</th>";
                echo "<th>Total Cicilan</th>";
                echo "<th>Bunga " . $I_SLIDING . " %</th>";
                echo "<th>Total Cicilan</th>";
                echo "</tr>";

                for ($x = 0; $x <= $LA; $x++) {
                    echo "<tr>";
                    echo "<td>" . $x . "</td>";

                    // Sisa Pinjaman
                    echo "<td>";
                    if ($x == 0) {
                        echo rupiah($SP_FLAT);
                    } else {
                        echo rupiah($SP_FLAT -= $c_pokok);
                    }
                    echo "</td>";

                    // Cicilan Pokok
                    echo "<td>";
                    if ($x == 0) {
                        echo 0;
                    } else {
                        echo rupiah($c_pokok);
                    }
                    echo "</td>";

                    // Bunga Flat Rate
                    echo "<td>";
                    if ($x == 0) {
                        echo 0;
                    } else {
                        $bunga_flat = $_POST['sp'] * $I_FLAT / 100 * 30 / 360;
                        echo rupiah($bunga_flat);
                    }
                    echo "</td>";

                    //// Total Cicilan Flat Rate
                    echo "<td>";
                    if ($x == 0) {
                        echo 0;
                    } else {
                        $total_cicilan_flat = $bunga_flat + $c_pokok;
                        echo rupiah($total_cicilan_flat);
                    }
                    echo "</td>";

                    // Bunga Sliding Rate
                    echo "<td>";
                    if ($x == 0) {
                        echo 0;
                    } else {
                        $bunga_sliding = $SP_SLIDING * $I_SLIDING / 100 * 30 / 360;
                        echo rupiah($bunga_sliding);
                        $SP_SLIDING -= $c_pokok;
                    }
                    echo "</td>";

                    //// Total Cicilan Sliding Rate
                    echo "<td>";
                    if ($x == 0) {
                        echo 0;
                    } else {
                        $cicilan_sliding = $c_pokok + $bunga_sliding;
                        echo rupiah($cicilan_sliding);
                    }
                    echo "</td>";

                    echo "</tr>";

                    $total_bunga_flat += $bunga_flat;
                    $total_cicilan_flat += $cicilan_flat;
                    $total_bunga_sliding += $bunga_sliding;
                    $total_cicilan_sliding += $cicilan_sliding;
                }
                echo "<tr>";
                echo "<th class='th' colspan=2>Total</th>";
                echo "<th class='th'>" . rupiah($_POST['sp']) . "</th>";

                echo "<th class='th'>" . rupiah($total_bunga_flat) . "</th>";
                echo "<th>" . rupiah($_POST['sp'] + $total_bunga_flat) . "</th>";

                echo "<th class='th'>" . rupiah($total_bunga_sliding) . "</th>";
                echo "<th class='th'>" . rupiah($total_cicilan_sliding) . "</th>";

                echo "</tr>";
                echo "</table>";
            }
        } else {
        ?>
            <form method="post" action="<?php echo site_url('simulasi_kredit') ?>">
                <table align="center" cellpadding='0' cellspacing='1' border='0' style='width:50%;' class='tableborder'>
                    <tr>
                        <td width="45%"><strong>Saldo Pokok Pinjaman</strong></td>
                        <td width="1%">:</td>
                        <td style="text-align: left;"><input size="30" type="text" name="sp" placeholder="ex:24000000"/></td>
                    </tr>
                    <tr>
                        <td><strong>Suku Bunga (Flat Rate)</strong></td>
                        <td>:</td>
                        <td style="text-align: left;"><input size="10" type="text" name="flat" placeholder="ex:10"/> %</td>
                    </tr>
                    <tr>
                        <td><strong>Suku Bunga (Sliding Rate)</strong></td>
                        <td>:</td>
                        <td style="text-align: left;"><input size="10" type="text" name="sliding" placeholder="ex:10"/> %</td>
                    </tr>
                    <tr>
                        <td><strong>Lama Angsuran</strong></td>
                        <td>:</td>
                        <td style="text-align: left;"><input size="10" type="text" name="lama_angsuran" placeholder="ex:12"/> Bulan</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td style="text-align: left;"><input class="submit" type="submit" name="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
        <?php
        }
        ?>
    </div>
</body>
</html>