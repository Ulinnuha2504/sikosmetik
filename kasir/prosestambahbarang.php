<?php 
// 1 panggil koneksi
include "../connectdb.php";

// 2 ambil data dari form
$namabarang         =mysqli_real_escape_string($sambung,$_POST["namabarang"]);
$jenisbarang        =mysqli_real_escape_string($sambung,$_POST["jenisbarang"]);
$hargabarang        =mysqli_real_escape_string($sambung,$_POST["hargabarang"]);
$keteranganbarang   =mysqli_real_escape_string($sambung,$_POST["keteranganbarang"]);
// 3 Proses Penyimpanan
$query              =mysqli_query($sambung,"INSERT INTO barang (namabarang,idjenisbarang,hargabarang,keteranganbarang) VALUES('$namabarang','$jenisbarang','$hargabarang','$keteranganbarang')");


echo "<script>alert('Data berhasil disimpan')</script>";
//Alihkan halaman ke barang.php
echo "<meta http-equiv='refresh' content='0; url=index.php?page=barang'>";
?>