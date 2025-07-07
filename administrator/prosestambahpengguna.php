<?php
//1 panggil koneksi
include "../connectdb.php";

//2 ambil data dari form tambah pengguna
$namauser   = mysqli_real_escape_string($sambung, $_POST["namauser"]);
$username   = mysqli_real_escape_string($sambung, $_POST["username"]);
$password   = mysqli_real_escape_string($sambung, $_POST["password"]);
$hakakses   = mysqli_real_escape_string($sambung, $_POST["hakakses"]);
$status     = mysqli_real_escape_string($sambung, $_POST["status"]);

//3 konversi password ke md5
$password = md5($password);

//4 pengecekan username, jika sudah ada harus isi ulang
$qcek = mysqli_query($sambung, "SELECT * FROM pengguna WHERE username='$username'");
$hasilcek = mysqli_num_rows($qcek);

if ($hasilcek > 0) {
    echo "<script>alert('Data Username sudah ada, silahkan ganti username baru!')</script>";

    echo "<meta http-equiv='refresh' content='0;url=index.php?page=tambahpengguna'>";
} else {
    //5 proses penyimpanan ke tabel pengguna
    $simpan = mysqli_query($sambung, "INSERT INTO pengguna (namauser,
                                                            username,
                                                            password,
                                                            hakakses,
                                                            status) 
                                                    VALUES ('$namauser',
                                                            '$username',
                                                            '$password',
                                                            '$hakakses',
                                                            '$status')");
}
//6 beri pesan data berhasil ditambahkan
echo "<script>alert('Data berhasil disimpan!')</script>";
//7 pindahkan ke halaman pengguna.php
echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
?>