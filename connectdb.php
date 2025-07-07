<?php
//buat variabel untuk koneksi
$server     = "localhost";
$username   = "root";
$password   = "";
$database   = "tbatra";

//buat query koneksi
$sambung = mysqli_connect("$server", "$username", "$password", "$database");
