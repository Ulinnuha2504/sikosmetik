<?php 
// 1 panggil koneksi
include "../connectdb.php";
// 2 ambil data dari form
$kodebarang=mysqli_real_escape_string($sambung,$_POST["nonota"]);
$idjenisbarang=mysqli_real_escape_string($sambung,$_POST["idjenisbarang"]);
$namabarang=mysqli_real_escape_string($sambung,$_POST["namabarang"]);
$hargabarang=mysqli_real_escape_string($sambung,$_POST["hargabarang"]);
$gambarbarang=$_FILES["gambarmenu"]["name"];
$keteranganbarang=mysqli_real_escape_string($sambung,$_POST["keteranganbarang"]);
// 3 proses berdasarkan isian gambarbarang
if (!empty($gambarbarang)) {
    // membuat nama baru untuk gambar
    $namabaru=$kodebarang.$gambarbarang;
    //unggah gambar
    move_uploaded_file($_FILES["gambarbarang"]["tmp_name"],"../gambarbarang/".$namabaru);

    //simpan data ke tabel barang
    $simpan = mysqli_query($sambung, "INSERT INTO barang( nonota,
                                                        idbarang,
                                                        namabarang,
                                                        hargabarang,
                                                        gambarbarang,
                                                        keteranganbarang) 
                                                        VALUES('$kodebarang',
                                                        '$idbarang',
                                                        '$namabarang',
                                                        '$hargabarang',
                                                        '$namabaru',
                                                        '$keteranganbarang')");

} else {
    //simpan data ke tabel barang
    $simpan = mysqli_query($sambung, "INSERT INTO barang( nonotaadministrator/prosestambahbarang.php,
                                                        idbarang,
                                                        namabarang,
                                                        hargabarang,
                                                        keteranganbarang) 
                                                        VALUES('$kodebarang',
                                                        '$idbarang',
                                                        '$namabarang',
                                                        '$hargabarang',
                                                        '$keteranganbarang')");

}
// 4 tampilkan pesan dan pindah halaman
echo "<script>alert('Data berhasil disimpan')</script>";
//Alihkan halaman ke barang.php
echo "<meta http-equiv='refresh' content='0; url=index.php?page=barang'>";
?>