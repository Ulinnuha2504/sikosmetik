<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Data jenisbarang</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Form Tambah Data jenisbarang
            </div>
            <div class="card-body">
                <form action="prosestambahjenis barang.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="namajenis barang" name="namajenis barang" type="text" placeholder="Nama jenisbarang" required />
                        <label for="Inputnamakategori">Nama jenisbarang</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="keteranganjenis barang" name="keteranganjenisbarang" type="text" placeholder="Keterangan jenisbarang" required />
                        <label for="keterangankategori">Keterangan jenisbarang</label>
                    </div>



                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="login">Simpan</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>