<?php 
include "../connectdb.php";

// Ambil waktu saat ini
$tahun = date('Y');
$bulan = date('m');
$hariini = date('Y-m-d');

// Total penjualan
$qtotal = mysqli_query($sambung, "SELECT SUM(totalharga) as totalpenjualan FROM transaksi");
$total = mysqli_fetch_assoc($qtotal);
$totalPenjualan = $total['totalpenjualan'] ?? 0;

// Penjualan bulan ini
$qbulan = mysqli_query($sambung, "SELECT SUM(totalharga) as penjualanbulanini FROM transaksi WHERE YEAR(tanggaltransaksi)='$tahun' AND MONTH(tanggaltransaksi)='$bulan'");
$dataBulan = mysqli_fetch_assoc($qbulan);
$penjualanBulanIni = $dataBulan['penjualanbulanini'] ?? 0;

// Penjualan hari ini
$qhari = mysqli_query($sambung, "SELECT SUM(totalharga) as penjualanhariini FROM transaksi WHERE tanggaltransaksi='$hariini'");
$dataHari = mysqli_fetch_assoc($qhari);
$penjualanHariIni = $dataHari['penjualanhariini'] ?? 0;

// Jumlah transaksi hari ini
$qtransaksi = mysqli_query($sambung, "SELECT * FROM transaksi WHERE tanggaltransaksi='$hariini'");
$jumlahTransaksi = mysqli_num_rows($qtransaksi);

// Fungsi untuk menampilkan nama bulan
function namaBulan($angkaBulan) {
    $bulan = [
        1 => "Januari", 2 => "Februari", 3 => "Maret",
        4 => "April", 5 => "Mei", 6 => "Juni",
        7 => "Juli", 8 => "Agustus", 9 => "September",
        10 => "Oktober", 11 => "November", 12 => "Desember"
    ];
    return $bulan[(int)$angkaBulan] ?? '-';
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <!-- Total Penjualan -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Penjualan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold"><?php echo 'Rp. ' . number_format($totalPenjualan, 0, ",", "."); ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Penjualan Bulan Ini -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Penjualan Bulan Ini</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold"><?php echo 'Rp. ' . number_format($penjualanBulanIni, 0, ",", "."); ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Penjualan Hari Ini -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Penjualan Hari Ini</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold"><?php echo 'Rp. ' . number_format($penjualanHariIni, 0, ",", "."); ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Jumlah Transaksi Hari Ini -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Transaksi Hari Ini</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="fs-5 fw-bold"><?php echo $jumlahTransaksi; ?></div>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Penjualan Harian -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i> Penjualan Harian - <?php echo namaBulan($bulan) . " $tahun"; ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Tanggal</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php 
                        $sql = mysqli_query($sambung, "
                            SELECT tanggaltransaksi, SUM(totalharga) AS totalharga 
                            FROM transaksi 
                            WHERE MONTH(tanggaltransaksi)='$bulan' AND YEAR(tanggaltransaksi)='$tahun' 
                            GROUP BY tanggaltransaksi
                        ");
                        while ($dataharian = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo $dataharian["tanggaltransaksi"]; ?></td>
                                <td><?php echo 'Rp. ' . number_format($dataharian["totalharga"], 0, ",", "."); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tabel Penjualan Bulanan -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i> Penjualan Tahunan - <?php echo $tahun; ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Bulan</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php 
                        $sqlbar = mysqli_query($sambung, "
                            SELECT MONTH(tanggaltransaksi) AS bulan, SUM(totalharga) AS total 
                            FROM transaksi 
                            WHERE YEAR(tanggaltransaksi)='$tahun' 
                            GROUP BY MONTH(tanggaltransaksi)
                        ");
                        while ($databulanan = mysqli_fetch_array($sqlbar)) {
                        ?>
                            <tr>
                                <td><?php echo namaBulan($databulanan["bulan"]); ?></td>
                                <td><?php echo 'Rp. ' . number_format($databulanan["total"], 0, ",", "."); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
