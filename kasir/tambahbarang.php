<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Data barang</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Form Tambah Data barang
            </div>
            <div class="card-body">
                <form action="prosestambahbarang.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="namabarang" name="namabarang" type="text" placeholder="Namabarang" required />
                        <label for="Inputnamajenisbarang">Nama barang</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="hargabarang" name="hargabarang" type="number" placeholder="hargabarang" required />
                        <label for="Inputnamabarang">Harga barang</label>
                    </div>

                    <div class="form-floating mb-3">
                    <select class="form-select" id="jenisbarang" name="jenisbarang" aria-label="Default select example" required>
                            <option selected>-- Silahkan pilih Jenis barang --</option>
                            <?php
                       
                        //Query untuk memanggil data jenis barang dengan variabel qdata
                        $qdata = mysqli_query($sambung, "SELECT * FROM jenisbarang");
                        //perulangan WHILE dan penampungan data dalam array data
                        while ($data = mysqli_fetch_array($qdata))
                        //Awal perulangan
                        {
                           
                        ?>
                        <option value="<?php echo $data['idjenisbarang'];?>"><?php echo $data['namajenisbarang'];?></option>
                        <?php } ?>
                            
                        </select>
                        <label for="Inputnamabarang">Jenis barang</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="keteranganbarang" name="keteranganbarang" type="text" placeholder="Keteranganbarang" required />
                        <label for="keteranganjenisbarang">Keterangan barang</label>
                    </div>



                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="login">Simpan</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>