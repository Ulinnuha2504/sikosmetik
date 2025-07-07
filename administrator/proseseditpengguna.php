<?php
//panggil koneksi
include "../connectdb.php";

//ambil data dari form editpengguna
$namauser   = mysqli_real_escape_string($sambung, $_POST["namauser"]);
$id         = mysqli_real_escape_string($sambung, $_POST["id"]);
$password   = mysqli_real_escape_string($sambung, $_POST["password"]);
$hakakses   = mysqli_real_escape_string($sambung, $_POST["hakakses"]);
$status     = mysqli_real_escape_string($sambung, $_POST["status"]);

//simpan perubahan (untuk data password tidak kosong)
if ($password) {
    //konversi password ke md5
    $password = md5($password);

    //simpan perubahan
    $ubahdata = mysqli_query($sambung, "UPDATE pengguna SET namauser='$namauser',
                                                         password='$password',
                                                         hakakses='$hakakses',
                                                         status='$status'
                                                         WHERE iduser='$id'");
}

//simpan perubahan untuk data password kosong
if (empty($password)) {
    //simpan perubahan
    $ubahdata = mysqli_query($sambung, "UPDATE pengguna SET namauser='$namauser',
                                                         hakakses='$hakakses',
                                                         status='$status'
                                                         WHERE iduser='$id'");
}

//tampilkan pesan Data Berhasil Diubah
echo "<script>alert('Data berhasil diubah!')</script>";
//pindahkan ke halaman pengguna
echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
