<!-- -	Pemanggilan koneksi (sudah dilakukan pada file index.php)-->

<?php
// -	Pengambilan data dari link edit pada file kategori.php dengan metode get
$id = mysqli_real_escape_string($sambung, $_GET['id']);

// -	Pemanggilan data dari tabel kategori berdasarkan idkategori 
$qdata = mysqli_query($sambung, "SELECT * FROM barang inner join kategori on barang.idkategori=kategori.idkategori WHERE idbarang='$id'");
$data = mysqli_fetch_array($qdata);
?>

<!-- Template halaman -->
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data barang</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-utensils"></i>
                Edit Data barang
            </div>
            <div class="card-body"> 
                <div class="row"> <!-- baris awal -->
                    <!-- kolom 1 -->
                    <div class="col md-5">
                        <form action="proseseditbarang.php" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nonota" name="nonota" type="text" placeholder="No Nota" value="<?php echo $data['nonota']; ?>" required />
                                <label for="Inputkodemenu">no nota</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="idkategori" name="idkategori" aria-label="Default select example" required>
                                    <option value="<?php echo $data['idbarang']; ?>"> <?php echo $data['namabarang']; ?></option>
                                    <option value="">-- Silahkan pilih Barang</option>
                                <!-- Ambil data barang -->
                                <?php 
                                $qkategori=mysqli_query($sambung, "SELECT * FROM barang  WHERE idbarang='$id'");
                                WHILE($databarang=mysqli_fetch_array($qbarang)){
                                        echo "<option value='$data[idmenu]'>$databarang[namabarang]</option>"; 
                                }
                                ?>
                                </select>
                                <label for="Pilih Barang">Pilih Barang</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="namabarang" name="namabarang" type="text" placeholder="Nama barang" value="<?php echo $data['namabarang']; ?>" required />
                                <label for="namabarang">Nama barang</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="hargabarang" name="hargabarang" type="text" placeholder="Harga barang" value="<?php echo $data['hargabarang']; ?>" required />
                                <label for="hargabarang">Harga barang</label>
                            </div>

                            <div class="mb-3">
                                <label for="gambarbarang">Gambar barang</label>
                                <input type="file" name="gambarbarang" id="gambarbarang" class="form-control" placeholder="gambarbarang">
                            </div>

                            <!-- mengirim nama gambarbarang -->
                            <input type="hidden" name="namagambarlama" id="namagambarlama" value="<?php echo $data['gambarbarang']; ?>">

                            <div class="form-floating mb-3">
                                <textarea name="keteranganbarang" id="keteranganbarang" class="form-control" placeholder="keteranganbarang"><?php echo $data['keteranganbarang']; ?></textarea required >
                                <label for="keteranganbarang">Keterangan barang</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit" name="login">Simpan</button>
                            </div>
                            <input type="hidden" name="id" id="id" value="<?php echo $data['idbarang']; ?>">
                        </form>
                    </div>  
                    <!-- kolom 2 -->
                    <div class="col md-7">
                    <?php 
                        // jika ada gambar
                        if (!empty($data['gambarbarang'])) {
                            echo "<img src='../gambarbarang/$data[gambarbarang]' maxwidth='300' class='img-thumbnail'>";
                        }
                        //jika tidak memiliki gambar
                        else {
                            echo "<img src='../gambarbarang/baranglogo.jpeg' maxwidth='300' class='img-thumbnail'>";
                        }
                    ?>
                    </div> <!-- penutup kolom 2 -->
                </div> <!-- penutup baris -->
            </div>
        </div>
    </div>
</div>