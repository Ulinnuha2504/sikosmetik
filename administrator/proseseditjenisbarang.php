<?php
//Panggil Koneksi
include "../connectdb.php";

//Ambil semua data yang dikirim dari form edit jenis barang
$namajenisbarang       = mysqli_real_escape_string($sambung, $_POST['namajenisbarang']);
$keteranganjenisbarang = mysqli_real_escape_string($sambung, $_POST['keteranganjenisbarang']);
$id                 = mysqli_real_escape_string($sambung, $_POST['id']);

/* Proses penyimpanan data */

    $ubahdata = mysqli_query($sambung, "UPDATE jenisbarang SET namajenisbarang='$namajenisbarang',
                                                            keteranganjenisbarang='$keteranganjenisbarang'
                                                      WHERE idjenisbarang='$id'");


// Tampilkan pesan “Data berhasil diubah”
echo "<script>alert('Data berhasil diubah')</script>";

// Pindahkan halaman ke halaman jenisbarang.
echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenisbarang'>";
?>
