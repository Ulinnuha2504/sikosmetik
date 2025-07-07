<?php 
//panggil koneksi
include "../connectdb.php";
//ambil data id (dari link)
$kodeorder=mysqli_real_escape_string($sambung,$_GET["id"]);

//panggil data dari transaksi berdasarkan kode transaksi
$qdata=mysqli_query($sambung, "SELECT * FROM transaksiorder inner join pengguna on transaksi.idpengguna=pengguna.idpengguna WHERE kodetransaksi='$kodetransaksi'");
$data=mysqli_fetch_array($qdata);

//echo $data["nickname"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi</title>
    <style>
        @media screen {
            .noprint{
                display: block;
            }
            .noshow{
                display: none;
            }
        }
        @media print{
            .noprint{
                display: none;
            }
            .noshow{
                display: block;
            }
        }
        thead th {
            border-top: 2px solid;
            border-color: darkgray;
            border-bottom: 2px solid;
        }
        body,th,td {
            font-size: 12pt;
        }
        h3,h4 {
            line-height: 0.5;
            letter-spacing: 0.5;
        }
        tfoot td {
            border-top: 2px solid;
            border-color: darkgray;
            border-bottom: 2px solid;
        }
    </style>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <div align="center">
        <!-- tombol -->
        <br><br>
        <span class="noprint">
        <a href="javascript:window.close();"><button class="btn btn-danger"><i class="fa fa-circle-xmark"></i></button></a>
        </span>
        <br><br>
    <!-- Kop -->
    <span style="font-size: 14pt; font-weight:normal;">NOTA</span><br>
    <span style="font-size: 20pt; font-weight:bold; line-height:0.5;">SINAR KOSMESTIK THAMRIN SEMARANG</span>
    <hr width="400">

    <!-- Bagian Atas -->
    <table width="400" class="display table-striped">
    <thead>
        <tr>
            <th colspan="3">Transaksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>No Nota</td>
            <td>:</td>
            <td> <?php echo $data["nonota"]; ?> </td>
        </tr>
        <tr>
            <td>Tanggal Pembelian</td>
            <td>:</td>
            <td><?php echo $data['tanggalpembelian']; ?></td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>:</td>
            <td><?php echo $data['jam']; ?></td>
        </tr>
        <tr>
            <td>Kasir</td>
            <td>:</td>
            <td><?php echo '['.$data['idpengguna'].']'.$data['kasir']; ?></td>
        </tr>
    </tbody>
    </table>

    <hr width="400">

    <table style="width: 400;">
        <thead>
            <tr style="text-align:center;">
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Beli</th>
                <th>Total</th>
           </tr>
        </thead>
        <tbody>
            <?php
            //Membuat variabel nomor
            $nomor = 0;
            $total = 0;
            //Query untuk memanggil data kategori dengan variabel qdata
            $qdata = mysqli_query($sambung, "SELECT * FROM detailtransaksi inner join menu on detailtransaksi.idbarang=barang.idbarang WHERE kodebarang='$kodebarang'");
            //perulangan WHILE dan penampungan data dalam array data
            while ($data = mysqli_fetch_array($qdata))
            //Awal perulangan
                    {
            //Membuat nomor urut
            $nomor++;
                    ?>
            <tr>
                <td class="text-center"><?php echo $nomor; ?></td>
                <td><?php echo $data['namabarang']; ?></td>
                <td class="text-end px-1"><?php echo number_format($data['hargabarang'],0,",",","); ?></td>
                <td class="text-center"><?php echo $data['jumlahbeli']; ?></td>
                <td class="text-end px-1">
                <?php 
                // rumus sub total 
                $subtotal= $data['jmlbarang'] * $data['hargabarang'];
                echo number_format($subtotal,0,",",",");
                // rumus untuk total
                $total = $total + $subtotal;
                ?>
                </td>
            </tr>
                <?php 
                    }
                ?>
        </tbody>
        <tfoot>
                <td colspan="4" class="text-end">Total</td>
                <td class="text-end">
                <?php 
                echo number_format($total,0,",",",");
                 ?>
                </td>
        </tfoot>
    </table>
    <br>
    <table>
        <td>--Terimakasih, barang yang telah dibeli tidak dapat dikembalikan--</td>
    </table>
    </div>
</body>
</html>