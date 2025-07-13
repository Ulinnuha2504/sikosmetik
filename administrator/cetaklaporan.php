<?php 
include "../connectdb.php";

$awal = mysqli_real_escape_string($sambung, $_GET["awal"]);
$akhir = mysqli_real_escape_string($sambung, $_GET["akhir"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan</title>
    <style>
        @media screen {.noprint {display: block;} .noshow {display: none;}}
        @media print {.noprint {display: none;} .noshow {display: block;}}
        body, th, td { font-size: 12pt; }
        h3, h4 { line-height: 0.5; letter-spacing: 0.5; }
        thead th, tfoot td { border-top: 2px solid darkgray; border-bottom: 2px solid darkgray; }
    </style>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<div align="center">
    <!-- Tombol -->
    <div class="noprint">
        <br>
        <a href="javascript:window.print();"><button class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button></a>
        <a href="javascript:window.close();"><button class="btn btn-danger"><i class="fa fa-circle-xmark"></i> Tutup</button></a>
        <br><br>
    </div>

    <!-- Kop -->
    <div style="max-width: 800px;">
        <div style="display: flex;">
            <div style="flex:1;">
            <img src="https://img.icons8.com/color/96/shop.png" style="max-width: 100px;">
            </div>
            <div style="flex: 3; text-align: left;">
                <span style="font-size: 13pt;">CETAK LAPORAN</span><br>
                <span style="font-size: 22pt; font-weight: bold;">SINAR KOSMETIK THAMRIN SEMARANG</span><br>
                <span style="font-size: 13pt; font-weight: bold;">Periode: <?php echo $awal . " s.d. " . $akhir; ?></span>
            </div>
        </div>
        <hr>
    </div>

    <!-- Tabel -->
    <table style="width:800px;" cellspacing="0" cellpadding="5">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>No Nota</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Kasir</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $total = 0;
            $qdata = mysqli_query($sambung, "SELECT * FROM transaksi WHERE tanggaltransaksi BETWEEN '$awal' AND '$akhir' ORDER BY tanggaltransaksi ASC");
            while ($data = mysqli_fetch_array($qdata)) {
                $total += $data['totalharga'];
            ?>
            <tr align="center">
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nonota']; ?></td>
                <td><?php echo $data['tanggaltransaksi']; ?></td>
                <td><?php echo substr($data['jam'], 0, 5); ?></td>
                <td><?php echo $data['idpengguna']; ?></td>
                <td align="right"><?php echo number_format($data['totalharga'], 0, ",", "."); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" align="center"><strong>Total</strong></td>
                <td align="right"><strong><?php echo number_format($total, 0, ",", "."); ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <br><br>

    <!-- TTD -->
    <?php 
    $qpengguna = mysqli_query($sambung, "SELECT * FROM pengguna WHERE hakakses='pimpinan' LIMIT 1");
    $datapimpinan = mysqli_fetch_array($qpengguna);
    ?>

    <table style="width:800px;">
        <tr>
            <td align="center">
                Mengetahui,<br>
                Pimpinan<br><br><br><br>
                <strong>(_____________________)</strong>
            </td>
            <td></td>
            <td align="center">
                Semarang, <?php echo date("d M Y"); ?><br>
                Kasir<br><br><br><br>
                <strong>(_________________)</strong>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
