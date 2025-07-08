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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">SINAR KOSMETIK THAMRIN</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Nama User : <?php echo $_SESSION["namauser"]; ?></a></li>
                    <li><a class="dropdown-item" href="#!">Username : <?php echo $_SESSION["username"]; ?></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Data Master</div>
                        <a class="nav-link" href="index.php?page=pengguna">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            Pengguna
                        </a>
                        <a class="nav-link" href="index.php?page=jenisbarang">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            Jenis Barang
                        </a>
                        <a class="nav-link" href="index.php?page=barang">
                            <div class="sb-nav-link-icon"><i class="fa fa-utensils"></i></div>
                            Barang
                        </a>


                        <div class="sb-sidenav-menu-heading">Transaksi dan Laporan</div>
                        <a class="nav-link" href="index.php?page=transaksi">
                            <div class="sb-nav-link-icon"><i class="fa fa-dollar"></i></div>
                            Transaksi
                        </a>
                        <a class="nav-link" href="index.php?page=laporan">
                            <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                            Laporan
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION["hakakses"]; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                if (!isset($_GET['page'])) {
                    include "dashboard.php";
                } elseif ($_GET['page'] == 'pengguna') {
                    include "pengguna.php";
                } elseif ($_GET['page'] == 'tambahpengguna') {
                    include "tambahpengguna.php";
                } elseif ($_GET['page'] == 'editpengguna') {
                    include "editpengguna.php";
                } elseif ($_GET['page'] == 'jenisbarang') {
                    include "jenisbarang.php";
                } elseif ($_GET['page'] == 'tambahjenisbarang') {
                    include "tambahjenisbarang.php";
                } elseif ($_GET['page'] == 'editjenisbarang') {
                    include "editjenisbarang.php";
                } elseif ($_GET['page'] == 'barang') {
                    include "barang.php";
                }  elseif ($_GET['page'] == 'tambahbarang') {
                    include "tambahbarang.php";
                }elseif ($_GET['page'] == 'editbarang') {
                    include "editbarang.php";
                } elseif ($_GET['page'] == 'staff') {
                    include "staff.php";
                }  elseif ($_GET['page'] == 'tambahstaff') {
                    include "tambahstaff.php";
                } elseif ($_GET['page'] == 'editstaff') {
                    include "editstaff.php";
                } elseif ($_GET['page'] == 'transaksi') {
                    include "transaksi.php";
                } elseif ($_GET['page'] == 'tambahtransaksi') {
                    include "tambahtransaksi.php";
                } elseif ($_GET['page'] == 'laporan') {
                    include "laporan.php";
                }

                ?>
              
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SINAR KOSMETIK THAMRIN SEMARANG 2025</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>
<!-- pilih barang -->
<script>
    $(document).ready(function() {
        $("#idmenu").change(function() {
            var idmenu=$("#idbarang").val();
            $.ajax({
                type:"get",
                url:"caridata.php",
                data:"idbarang=" + idbarang,
                dataType:'json',
                success:function(data) {
                    
                    var harga=data[4];
                    $("#hargabarang").val(harga);
                    $("#jumlahbeli").focus();
                }
            });
        });
    });

</script>