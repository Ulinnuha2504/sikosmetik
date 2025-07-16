<?php
//buat variabel untuk koneksi
$server     = "localhost";
$username   = "root";
$password   = "";
$database   = "tbatra";
// $database   = "kosmetik";

//buat query koneksi
$sambung = mysqli_connect("$server", "$username", "$password", "$database");
