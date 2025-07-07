<div class="container-fluid px-4">
    <h1 class="mt-4">Data Pengguna</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Tambah Pengguna
            </div>
            <div class="card-body">
            <form action="prosestambahpengguna.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="namauser" name="namauser" type="text" placeholder="Nama Pengguna" required />
                        <label for="Inputnamastaff">Nama Pengguna</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                        <label for="inputteleponstaff">Username</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input class="form-control" id="password" name="password" type="text" placeholder="Password" required />
                        <label for="inputalamatstaff">Password</label>
                    </div>

                    <div class="form-floating mb-2">
                        <select class="form-select" id="hakakses" name="hakakses" aria-label="Default select example" required>
                            <option selected>-- Silahkan pilih Hakakses --</option>
                            <option value="pimpinan">Pimpinan</option>
                            <option value="kasir">Kasir</option>
                            <option value="administrator">Administrator</option>
                            
                        </select>
                    </div>

                    <div class="form-floating mb-4">
                        <input class="form-control" id="status" name="status" type="text" placeholder="Status" required />
                        <label for="inputalamatstaff">Status</label>
                    </div>

                    
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>