<?php 
// panggil koneksi
include "../connectdb.php";
// ambil data dari form
$kodebarang=mysqli_real_escape_string($sambung,$_POST["kodebarang"]);
$idkategori=mysqli_real_escape_string($sambung,$_POST["idjenisbarang"]);
$namabarang=mysqli_real_escape_string($sambung,$_POST["namabarang"]);
$hargabarang=mysqli_real_escape_string($sambung,$_POST["hargabarang"]);
$gambarbarang=$_FILES["gambarbarang"]["name"];
$keteranganbarang=mysqli_real_escape_string($sambung,$_POST["keteranganbarang"]);
$id=mysqli_real_escape_string($sambung,$_POST["id"]);
$namagambarlama=mysqli_real_escape_string($sambung,$_POST["namagambarlama"]);
// proses jika gambar ada
if (!empty($gambarbarang)) {
    // membuat nama baru untuk gambar
    $namabaru=$kodebarang.$gambarbarang;
    //hapus file gambar lama, jika gambarbarang tidak kosong
    if ($namagambarlama) {
        unlink('../gambarbarang/'.$namagambarlama);
    }
    //unggah gambar
    move_uploaded_file($_FILES["gambarbarang"]["tmp_name"],"../gambarbarang/".$namabaru);
    //proses update
    $edit=mysqli_query($sambung,"UPDATE barang SET idkategori='$idkategori',
                                                 namabarang='$namabarang',
                                                 hargabarang='$hargabarang',
                                                 gambarbarang='$namabarang',
                                                 keteranganbarang='$keteranganbarang'
                                                 WHERE idbarang='$id'");
}
// proses jika tidak ada gambar
else {
    $edit=mysqli_query($sambung,"UPDATE barang SET idkategori='$idkategori',
                                                 namabarang='$namabarang',
                                                 hargabarang='$hargabarang',
                                                 keteranganbarang='$keteranganbarang'
                                                 WHERE idbarang='$id'");
}

// pesan berhasil dirubah
echo "<script>alert('Data berhasil diubah!')</script>";
// pindah halaman
echo "<meta http-equiv='refresh' content='0;url=index.php?page=barang'>";
?>