<?php 
include "../connectdb.php";
session_start();

// Ambil kode transaksi dari URL
$kodeorder = mysqli_real_escape_string($sambung, $_GET["id"]);

// Ambil data transaksi dan pengguna
$qdata = mysqli_query($sambung, "SELECT * FROM transaksi 
    INNER JOIN pengguna ON transaksi.idpengguna = pengguna.iduser 
    WHERE idpenjualan = '$kodeorder'");
$data = mysqli_fetch_array($qdata);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        @media screen {
            .noprint { display: block; }
            .noshow { display: none; }
        }
        @media print {
            .noprint { display: none; }
            .noshow { display: block; }
        }
        thead th, tfoot td {
            border-top: 2px solid darkgray;
            border-bottom: 2px solid darkgray;
        }
        body, th, td {
            font-size: 12pt;
        }
        h3, h4 {
            line-height: 0.5;
        }
    </style>
</head>
<body>
    <div class="container text-center mt-4">
        <div class="noprint mb-3">
            <a href="javascript:window.print();" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
            <a href="javascript:window.close();" class="btn btn-danger"><i class="fa fa-circle-xmark"></i> Tutup</a>
        </div>

        <h5 class="mb-3">NOTA</h5>
        <h4 class="fw-bold">SINAR KOSMETIK THAMRIN SEMARANG</h4>
        <hr class="mx-auto" style="width:400px">

        <table class="table table-borderless mx-auto" style="width:400px">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">No Nota</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?php echo $data["nonota"]; ?></td>
                </tr>
                <tr>
                    <td class="text-start">Tanggal Transaksi</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?php echo $data["tanggaltransaksi"]; ?></td>
                </tr>
                <tr>
                    <td class="text-start">Jam</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?php echo $data["jam"]; ?></td>
                </tr>
                <tr>
                    <td class="text-start">Kasir</td>
                    <td class="text-center">:</td>
                    <td class="text-start"><?php echo '['.$data['idpengguna'].'] '.$data['namauser']; ?></td>
                </tr>
            </tbody>
        </table>

        <hr class="mx-auto" style="width:400px">

        <table class="table table-sm table-bordered mx-auto" style="width:400px">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                $total = 0;
                $qdetail = mysqli_query($sambung, "SELECT * FROM detailtransaksi 
                    INNER JOIN barang ON detailtransaksi.idbarang = barang.idbarang 
                    WHERE idpenjualan = '$kodeorder'");
                while ($row = mysqli_fetch_array($qdetail)) {
                    $subtotal = $row['jumlah'] * $row['hargabarang'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td class="text-center"><?php echo $nomor++; ?></td>
                    <td><?php echo $row['namabarang']; ?></td>
                    <td class="text-end"><?php echo number_format($row['hargabarang'], 0, ",", ","); ?></td>
                    <td class="text-center"><?php echo $row['jumlah']; ?></td>
                    <td class="text-end"><?php echo number_format($subtotal, 0, ",", ","); ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                    <td class="text-end"><strong><?php echo number_format($total, 0, ",", ","); ?></strong></td>
                </tr>
            </tfoot>
        </table>

        <p class="mt-3">-- Terima kasih. Barang yang telah dibeli tidak dapat dikembalikan. --</p>
    </div>
</body>
</html>
