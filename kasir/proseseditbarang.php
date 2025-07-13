<?php 
// 1. Panggil koneksi
include "../connectdb.php";
// 2. Ambil data dari form
$idbarang           = mysqli_real_escape_string($sambung, $_POST["idbarang"]);
$namabarang         = mysqli_real_escape_string($sambung, $_POST["namabarang"]);
$jenisbarang        = mysqli_real_escape_string($sambung, $_POST["jenisbarang"]);
$hargabarang        = mysqli_real_escape_string($sambung, $_POST["hargabarang"]);
$keteranganbarang   = mysqli_real_escape_string($sambung, $_POST["keteranganbarang"]);

// 3. Proses Update
$query = mysqli_query($sambung, "UPDATE barang SET 
    namabarang = '$namabarang',
    idjenisbarang = '$jenisbarang',
    hargabarang = '$hargabarang',
    keteranganbarang = '$keteranganbarang'
    WHERE idbarang = '$idbarang'
");

if ($query) {
    echo "<script>alert('Data berhasil diperbarui')</script>";
} else {
    echo "<script>alert('Gagal memperbarui data: " . mysqli_error($sambung) . "')</script>";
}

// 4. Alihkan kembali ke halaman barang
echo "<meta http-equiv='refresh' content='0; url=index.php?page=barang'>";
?>
