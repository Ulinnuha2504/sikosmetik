<?php 
// total penjualan
$qtotalpenjualan=mysqli_query($sambung,"SELECT SUM(totalharga) as totalpenjualan FROM transaksi");
$datatotalpenjualan=mysqli_fetch_array($qtotalpenjualan);
// penjualan bulan ini
//ambil data tahun sekarang
$tahun=date('Y');
// ambil data bulan sekarang
$bulan=date('m');
$qpenjualanbulanini=mysqli_query($sambung,"SELECT SUM(totalharga) as penjualanbulanini FROM transaksi WHERE YEAR(tanggaltransaksi)='$tahun' AND MONTH(tanggaltransaksi)='$bulan'");
$datapenjualanbulanini=mysqli_fetch_array($qpenjualanbulanini);
// penjualan hari ini
// ambil hari ini
$hariini=date('Y-m-d');
$qpenjualanhariini=mysqli_query($sambung,"SELECT SUM(totalharga) as penjualanhariini FROM transaksi WHERE tanggaltransaksi='$hariini'");
$datapenjualanhariini=mysqli_fetch_array($qpenjualanhariini);
// transaksi hari ini 
$qjmltransaksi=mysqli_query($sambung,"SELECT * FROM transaksi WHERE tanggaltransaksi='$hariini'");
$jmltransaksi=mysqli_num_rows($qjmltransaksi);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white streched-link">
                <div class="card-body">Total Penjualan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold text-white stretched-link" ><?php echo 'Rp. ' .number_format($datatotalpenjualan['totalpenjualan'],0,",",","); ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Penjualan Bulan Ini</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold text-white stretched-link" ><?php echo 'Rp. ' .number_format($datapenjualanbulanini['penjualanbulanini'],0,",",","); ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Penjualan Hari Ini</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold text-white stretched-link"><?php echo 'Rp. ' .number_format($datapenjualanhariini['penjualanhariini'],0,",",","); ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Transaksi Hari Ini</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold text-white stretched-link"><?php echo $jmltransaksi; ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <!-- kolom 1 -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Penjualan  Bulan <?php echo $bulan ?> Tahun <?php echo $tahun ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-info text-white">
                        <thead>
                            <tr class="text-center bg-primary">
                              <th>
                                Tanggal
                              </th>
                              <th>
                                Penjualan
                              </th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-black">
                            <?php 
                            //perintah sql panggil data
                            $sql=mysqli_query($sambung,"SELECT tanggaltransaksi,SUM(totalharga) AS 
                                                                    totalharga from transaksi
                                                                    WHERE MONTH(tanggaltransaksi)='$bulan'
                                                                    AND YEAR(tanggaltransaksi)='$tahun'
                                                                    GROUP BY tanggaltransaksi");
                            while ($dataharian = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $dataharian["tanggaltransaksi"]; ?>
                                </td>
                                <td>
                                    <?php echo $dataharian["totalharga"]; ?>
                                </td>
                            </tr>
                        <?php 
                          }
                         ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- kolom 1 akhir -->
        <!-- kolom 2 -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Penjualan Tahun <?php echo $tahun ?>
                </div>
                <div class="card-body">
                <table class="table table-bordered bg-info text-white">
                        <thead>
                            <tr class="text-center bg-primary">
                              <th>
                                Bulan Ke
                              </th>
                              <th>
                                Penjualan
                              </th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-black">
                            <?php 
                            //perintah sql panggil data
                            $sqlbar=mysqli_query($sambung,"SELECT tanggaltransaksi, 
                                                           SUM(totalharga) AS total,
                                                           MONTH(tanggaltransaksi) AS bln from transaksi
                                                           WHERE YEAR(tanggaltransaksi)='$tahun'
                                                           GROUP BY MONTH(tanggaltransaksi)");
                            while ($databulanan = mysqli_fetch_array($sqlbar)) {
                                
                           
                            ?>
                            <tr>
                                <td>
                                    <?php echo $databulanan["bulan"]; ?>
                                </td>
                                <td>
                                    <?php echo $databulanan["total"]; ?>
                                </td>
                            </tr>
                            <?php 
                             }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- kolom 2 akhir -->
    </div>
</div>