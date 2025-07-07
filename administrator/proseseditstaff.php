<?php 
include "../connectdb.php";

$namastaff   = mysqli_real_escape_string($sambung, $_POST["namastaff"]);
$teleponstaff   = mysqli_real_escape_string($sambung, $_POST["teleponstaff"]);
$alamatstaff   = mysqli_real_escape_string($sambung, $_POST["alamatstaff"]);
$jabatanstaff   = mysqli_real_escape_string($sambung, $_POST["jabatanstaff"]);
$id            =mysqli_real_escape_string($sambung, $_POST["id"]);

$ubahdata = mysqli_query($sambung, "UPDATE staff SET namastaff='$namastaff',
                                                     teleponstaff='$teleponstaff',
                                                     alamatstaff='$alamatstaff',
                                                     jabatanstaff='$jabatanstaff'
                                               WHERE idstaff='$id'");

echo "<script>alert('Data berhasil diubah!')</script>";
//pindahkan ke halaman pengguna
echo "<meta http-equiv='refresh' content='0;url=index.php?page=staff'>";
?>