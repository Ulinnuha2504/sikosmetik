<!-- -	Pemanggilan koneksi (sudah dilakukan pada file index.php)-->

<?php
// -	Pengambilan data dari link edit pada file jenisbarang.php dengan metode get
$id = mysqli_real_escape_string($sambung, $_GET['id']);

// -	Pemanggilan data dari tabel kategori berdasarkan idjenisbarang
$qdata = mysqli_query($sambung, "SELECT * FROM jenisbarang WHERE idjenisbarang='$id'");
$data = mysqli_fetch_array($qdata);
?>

<!-- Template halaman -->
<div class="container-fluid px-4 py-4">
    <div class="card mb-4">
        <div class="card-header">
            <div class="float-start"><i class="fas fa-table me-1"></i>
                Edit Data jenis barang</div>
        </div>

        <div class="card-body">
            <!-- Form Edit jenis barang -->

            <!-- Mengirim data ke file proseseditjenisbarang.php -->
            <form action="proseseditjenisbarang.php" method="post">

                <!-- Menampilkan data yang dipanggil pada form -->
                <div class="form-floating mb-3">
                    <input class="form-control" id="namajenisbarang" type="text" name="namajenisbarang" value="<?php echo $data['namajenisbarang']; ?>" placeholder="Nama jenis barang" required />
                    <label for="namakategori">Nama jenis barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="keteranganjenisbarang" type="text" name="keteranganjenisbarang" value="<?php echo $data['keteranganjenisbarang']; ?>" placeholder="Keterangan jenis barang" required />
                    <label for="keteranganjenisbarang">Keterangan jenis barang</label>
                </div>

                <!-- -	Menambahkan komponen type hidden untuk mengirim iduser pada proses selanjutnya -->
                <input type="hidden" name="id" name="id" value="<?php echo $data['idjenisbarang']; ?>">

                <div class="mt-4 mb-0">
                    <button type="submit" name="editdata" class="col-sm-2 btn btn-outline-success">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>