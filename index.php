<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login -SINAR KOSMESTIK THAMRIN</title>
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">SINAR KOSMETIK THAMRIN SEMARANG</h3>
                                    <?php
                                    if (isset($_GET["kodeeror"])) {
                                        if ($_GET["kodeeror"] == 1) {
                                            echo "<div class='alert alert-danger' role='alert'>Username atau Password salah.</div>";
                                        } elseif ($_GET["kodeeror"] == 2) {
                                            echo "<div class='alert alert-warning' role='alert'>Anda tidak punya hak akses, silahkan login.</div>";
                                        } elseif ($_GET["kodeeror"] == 3) {
                                            echo "<div class='alert alert-success' role='alert'>Anda berhasil LOGOUT</div>";
                                        }
                                    }
                                    ?>

                                </div>
                                <div class="card-body">
                                    <form action="logincek.php" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                                            <label for="inputusername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>

                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Masukkan Username dan Password yang Benar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Sinar Kosmestik Thamrin Semarang &copy; Mei 2025</div>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="js/scripts.js"></script>
</body>

</html>