<?php
//aktifkan session
session_start();

session_unset();
session_destroy();

//pindahkan halaman ke halaman login
//header('location:index.php?kodeeror=3');
echo "<meta http-equiv='refresh' content='0;url=index.php?kodeeror=3'>";
?>
