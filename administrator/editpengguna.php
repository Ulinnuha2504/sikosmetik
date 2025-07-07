<?php
//ambil data id dari link edit
$id = mysqli_real_escape_string($sambung, $_GET["id"]);

//pemanggilan data dari tabel pengguna
$qdata = mysqli_query($sambung, "SELECT * FROM pengguna WHERE iduser='$id'");
$data = mysqli_fetch_array($qdata);
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Pengguna</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Edit Data Pengguna Sistem
            </div>
            <div class="card-body">
                <form action="proseseditpengguna.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="namauser" name="namauser" type="text" placeholder="Nama User" value="<?php echo $data["namauser"]; ?>" required />
                        <label for="Inputnamauser">Nama User</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username" value="<?php echo $data["username"]; ?>" disabled />
                        <label for="inputusername">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="hakakses" name="hakakses" aria-label="Default select example" required>

                            <option selected value="<?php echo $data["hakakses"]; ?>"><?php echo $data["hakakses"]; ?></option>

                            <option>-- Silahkan pilih hak akses</option>
                            <option value="administrator">administrator</option>
                            <option value="manajer">manajer</option>
                            <option value="kasir">kasir</option>
                        </select>
                        <label for="Hak Akses">Hak Akses</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="status" name="status" aria-label="Default select example" required>
                            <option selected value="<?php echo $data["status"]; ?>"><?php echo $data["status"]; ?></option>
                            <option>-- Silahkan pilih status</option>
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                        <label for="Status">Status</label>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $data["iduser"]; ?>">

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="login">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>