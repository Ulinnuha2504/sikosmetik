<?php
//panggil koneksi
include "../connectdb.php";
//aktifkan sesi
session_start();

if (!$_SESSION["username"]) {
    header('location:../index.php?kodeeror=2');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Welcome to Halaman <?php echo $_SESSION["hakakses"]; ?></h2>
    <hr>
    Nama Pengguna : <?php echo $_SESSION["namauser"] . "<br>"; ?>
    Username : <?php echo $_SESSION["username"] . "<br>"; ?>
    Hakakses : <?php echo $_SESSION["hakakses"]; ?>
    <hr>
    <a href="../logout.php">Logout</a>
</body>

</html>