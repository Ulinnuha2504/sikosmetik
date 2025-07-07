<?php
//1. Panggil File Koneksi
include "connectdb.php";

//2. Aktifkan Session
session_start();

//3. Ambil data dari form login
$username   = mysqli_real_escape_string($sambung, $_POST["username"]);
$password   = mysqli_real_escape_string($sambung, $_POST["password"]);



//konversi password ke MD5 Hash
$password = md5($password);
echo $username . '-' . $password;

//4. Panggil data dari tabel pengguna yang sesuai dengan username dan password
$qdata = mysqli_query($sambung, "SELECT * FROM pengguna WHERE username='$username' AND password='$password' AND status='aktif'");
$data = mysqli_fetch_array($qdata);

//5 Cek data ada atau tidak
$cekdata = mysqli_num_rows($qdata);

//echo "<br>" . $cekdata;

//Jika data tidak ada, kembali login dengan mengirim kode error 1
if ($cekdata == 0) {
    header('location:index.php?kodeeror=1');
} else {
    //jika data ada, lanjut proses seting session
    $_SESSION["namauser"] = $data["namauser"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["hakakses"] = $data["hakakses"];

    //pindah ke halaman sesuai hak akses
    if ($data["hakakses"] == 'administrator') {
        header('location:administrator/');
    } elseif ($data["hakakses"] == 'kasir') {
        header('location:administrator/');
    } elseif ($data["hakakses"] == 'manajer') {
        header('location:manajer/');
    }
}
