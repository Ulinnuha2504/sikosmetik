<?php 
//panggil koneksi
include "../connectdb.php";
//ambil data id (dari link)
$awal=mysqli_real_escape_string($sambung,$_GET["awal"]);
$akhir=mysqli_real_escape_string($sambung,$_GET["akhir"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
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
    <body>
    <div align="center">
        <!-- tombol -->
        <br><br>
        <span class="noprint">
        <a href="javascript:window.print();"><button class="btn btn-primary"><i class="fa fa-print"></i></button></a>
        <a href="javascript:window.close();"><button class="btn btn-danger"><i class="fa fa-circle-xmark"></i></button></a>
        </span>
        <br><br>
        <!-- Kop -->
       
        <div class="row" style="max-width: 800px;">
            <div class="col-lg-3">
                <img src="../gambarmenu/menulogo.jpg" style="max-width :100px;"> <br>
            </div>
            <div class="col-lg-9 text-start">
                <span style="font-size: 13pt; font-weight:normal;">CETAK LAPORAN</span><br>
                <span style="font-size: 28pt; font-weight:bold; line-height:0.7;">SINAR KOSMETIK THAMRIN SEMARANG</span> <br>
                <span style="font-size: 13pt; font-weight:bold; line-height:0.7;">Periode : <?php echo $awal. ' s.d. ' .$akhir?></span><br>
            </div>
        </div>
        
        <hr width="800px">

        <table style="width: 800px;">
        <thead>
            <tr style="text-align:center;">
                <th>No Nota</th>
                <th>Tanggal Pembelian</th>
                <th>Jam</th>
                <th>Kasir</th>
                <th>Total Order</th>
           </tr>
        </thead>
        <tbody>
            <?php
            //Membuat variabel nomor
            $nomor = 0;
            $total = 0;
            //Query untuk memanggil data kategori dengan variabel qdata
            $qdata = mysqli_query($sambung, "SELECT * FROM transaksi WHERE tanggaltransaksi between '$awal' AND '$akhir'");
            //perulangan WHILE dan penampungan data dalam array data
            while ($data = mysqli_fetch_array($qdata))
            //Awal perulangan
                    {
            //Membuat nomor urut
            $nomor++;
                    ?>
            <tr>
                <td class="text-center"><?php echo $nomor; ?></td>
                <td class="text-center"><?php echo ($data['nonota']); ?></td>
                <td class="text-center"><?php echo $data['tanggalpembelian']; ?></td>
                <td class="text-center"><?php echo $data['jam']; ?></td>
                <td class="text-center"><?php echo $data['kasir']; ?></td>
                <td class="text-center">
                <?php echo $data['totalpembelian']; ?></td>
                <td>
                    <?php 
                     // rumus untuk total
                    $total = $total + $data['totalpembelian'];
                    ?>
                </td>
            </tr>
                <?php 
                    }
                ?>
        </tbody>
        <tfoot>
                <td colspan="5" class="text-center">Total</td>
                <td class="text-end">
                <?php 
                echo number_format($total,0,",",",");
                 ?>
                </td>
        </tfoot>
    </table>
    <br>
    <?php 
    // ambil data pengguna
    $qpengguna=mysqli_query($sambung,"SELECT * FROM pengguna WHERE hakakses='pimpinan'");
    $datapengguna=mysqli_fetch_array($qpengguna);
    ?>
    <table style="width: 800px;">
        <tr>
            <td class="text-center">
                <br>
                Mengetahui <br> 
                Pimpinan
                <br><br><br><br>
                (Dwi)

                (<?php echo $datapengguna['namauser']; ?>)
            </td>
            <td>

            </td>
            <td class="text-center">
                Semarang, 30 Juni 2025<?php echo date('d M Y');?>
                <br>
                SINAR KOSMETIK THMARIN SEMARANG <br>
                Kasir
                <br><br><br><br>
                (Bella)
            </td>
        </tr>
    </table>
    </div>
    </body>
</html>