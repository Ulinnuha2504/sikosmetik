<div class="container-fluid px-4">
    <h1 class="mt-4">Data Staff</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Daftar Staff
            </div>
            <div class="card-body">
            <form action="prosestambahstaff.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="namastaff" name="namastaff" type="text" placeholder="Nama Staff" required />
                        <label for="Inputnamastaff">Nama Staff</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="teleponstaff" name="teleponstaff" type="text" placeholder="Telepon Staff" required />
                        <label for="inputteleponstaff">Telepon</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input class="form-control" id="alamatstaff" name="alamatstaff" type="text" placeholder="Alamat Staff" required />
                        <label for="inputalamatstaff">Alamat</label>
                    </div>

                    <div class="form-floating mb-2">
                        <select class="form-select" id="jabatanstaff" name="jabatanstaff" aria-label="Default select example" required>
                            <option selected>-- Silahkan pilih Jabatan --</option>
                            <option value="manajer">Manajer</option>
                            <option value="kasir">Kasir</option>
                            <option value="koki">Koki</option>
                            <option value="service">Service</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>