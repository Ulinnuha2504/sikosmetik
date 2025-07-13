<?php
    #1 Pemanggilan Database
    include "../connectdb.php";
    #2 Tangkap Data id dan Pilih Data
    $id     = $_GET['id'];
    $qdata  = mysqli_query($sambung,"SELECT * FROM barang inner join jenisbarang on barang.idjenisbarang=jenisbarang.idjenisbarang WHERE idbarang='$id'");
    $dataa  = mysqli_fetch_array($qdata);
    #
    ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data barang</h1>
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Form Edit Data barang
            </div>
            <div class="card-body">
                <form action="proseseditbarang.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="namabarang" name="namabarang" type="text" placeholder="Namabarang" value="<?php echo $dataa['namabarang'];?>"required />
                        <label for="Inputnamajenisbarang">Nama barang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="hargabarang" name="hargabarang" type="number" placeholder="hargabarang"value="<?php echo $dataa['hargabarang'];?>" required/>
                        <label for="Inputnamabarang">Harga barang</label>
                    </div>
                    <div class="form-floating mb-3">
                    <select class="form-select" id="jenisbarang" name="jenisbarang" aria-label="Default select example" required>
                            <option value="<?php echo $dataa['idjenisbarang'];?>"><?php echo $dataa['namajenisbarang'];?></option>
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
                        <input class="form-control" id="keteranganbarang" name="keteranganbarang" type="text" placeholder="Keteranganbarang" value="<?php echo $dataa['keteranganbarang'];?>"required /> 
                        <input type="hidden" name="idbarang" value="<?php echo $dataa['idbarang'];?>">
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