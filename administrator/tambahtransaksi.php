<?php
include('../connectdb.php');


// Buat kode transaksi otomatis
$qkodetransaksi = mysqli_query($sambung, "SELECT MAX(idpenjualan) AS kodeterbesar FROM transaksi");
$datatransaksi = mysqli_fetch_array($qkodetransaksi);

$kodeteraksiterbesar = $datatransaksi['kodeterbesar'];
$urutan = ($kodeteraksiterbesar) ? (int)substr($kodeteraksiterbesar, 4, 7) + 1 : 1;
$nonota = "TRAN" . sprintf("%07s", $urutan);

// Tambah item ke keranjang
if (isset($_POST['tambahtransaksi'])) {
    echo "tambah keranjang";
    $idbarang = mysqli_real_escape_string($sambung, $_POST['idbarang']);
    $jumlahbeli = mysqli_real_escape_string($sambung, $_POST['jumlahbeli']);

    mysqli_query($sambung, "INSERT INTO keranjang (idmenu, jmlorder) VALUES ('$idbarang', '$jumlahbeli')");
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=tambahtransaksi'>";
}

// // Simpan transaksi akhir
if (isset($_POST['simpantransaksi'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $notajual = mysqli_real_escape_string($sambung,$_POST['nonota']);
    $tanggaltransaksi = mysqli_real_escape_string($sambung,$_POST['tanggaltransaksi']);
    $jam = mysqli_real_escape_string($sambung,$_POST['jam']);
    $iduseraktif = mysqli_real_escape_string($sambung,$_POST['iduser']);
    $totalbeli = mysqli_real_escape_string($sambung,$_POST['totalpembelian']);

    #CEK KERANJANG -> detailtransaksi a/ nonota
    $qcekkeranjang = mysqli_query($sambung,"SELECT * FROM keranjang WHERE kodeorder is NULL");
    while($keranjang = mysqli_fetch_array($qcekkeranjang)){
        #pindah ke detail
            $pindahmenu = $keranjang['idmenu'];
            $pindahjml  = $keranjang['jmlorder'];
            $pindah     = mysqli_query($sambung,"INSERT INTO detailtransaksi (idbarang,jumlah) VALUES ('$pindahmenu',$pindahjml)");
    }
    #SIMPAN DATA TRANSAKSI
    $microtime = microtime(true);
    $nota = str_replace('.', '', sprintf('%.6f', $microtime));

    $qsimpantransaksi = mysqli_query($sambung,"INSERT INTO transaksi (idpenjualan,nonota,tanggaltransaksi,jam,idpengguna,totalharga) VALUES ('$notajual','$nota','$tanggaltransaksi','$jam','$iduseraktif','$totalbeli')");
    $updateakhir = mysqli_query($sambung,"UPDATE detailtransaksi SET idpenjualan='$notajual' WHERE idpenjualan is null");
    $delete = mysqli_query($sambung,"DELETE from keranjang");
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=transaksi'>";

}

// // Hapus dari keranjang
if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    mysqli_query($sambung, "DELETE FROM keranjang WHERE idkeranjang='$hapus'");
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=tambahtransaksi'>";
}
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Transaksi</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-book"></i>
                Data Transaksi Penjualan
            </div>
            <div class="card-body">
                <div class="row">
                <!-- kolom 1 awal -->
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <i class="fas fa-list"></i>
                                Pilih Barang
                        </div>
                        <div class="card-body">
                            <!-- form pilih barang -->
                            <form action="" method="post">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="idbarang" name="idbarang" aria-label="Default select example" required>
                                    <option value="" selected>-- Silahkan pilih Barang --</option>
                            <!-- Ambil data barang -->
                            <?php 
                            $qbarang=mysqli_query($sambung, "SELECT * FROM barang");
                            WHILE($databarang=mysqli_fetch_array($qbarang)){
                                    echo "<option value='$databarang[idbarang]'>$databarang[namabarang]</option>"; 
                            }
                            ?>
                                </select>
                                <label for="Pilih Barang">Pilih Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="hargabarang" name="hargabarang" type="text" placeholder="Harga Barang"  required />
                                    <label for="hargabarang">Harga Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="jumlahbeli" name="jumlahbeli" type="text" placeholder="Jumlah Beli"  required />
                                    <label for="jumlahbeli">Jumlah Beli</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="tambahtransaksi" id="tambahtransaksi">Simpan</button>

                    </div>

                            </form>
                            <!-- form pilih barang -->
                        </div>
                    </div>
                </div>
                <!-- kolom 1 akhir -->
                <!-- kolom 2 awal -->
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">
                            <i class="fas fa-dollar"></i>
                                Transaksi
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nonota" name="nonota" type="text" placeholder="No Nota" value="<?php echo $nonota;?>" required />
                                    <label for="namabarang">Nama Barang</label>
                            </div>

                            <?php 
                            // tanggal sekarang
                            $tanggalsekarang = date ('Y-m-d');
                            ?>
                            <div class="form-floating mb-3">
                            <input class="form-control" id="tanggalorder" name="tanggaltransaksi" type="date" placeholder="Tanggal Transaksi" value="<?php echo $tanggalsekarang;?>" required />
                                    <label for="tanggaltransaksi">Tanggal Transaksi</label>
                            </div>
                              
                            <div class="form-floating mb-3">
                                <input class="form-control" id="jam" name="jam" type="time" placeholder="Jam"  required />
                                    <label for="jam">Jam</label>
                            </div>

                            <!-- isi data kasir, iduser(dari data pengguna) -->
                            <?php 
                            // ambil iduser
                            $qpengguna = mysqli_query($sambung, "SELECT * FROM pengguna WHERE username ='".$_SESSION['username']."'");
                            $datapengguna = mysqli_fetch_array($qpengguna);
                            ?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="iduser" name="iduser" type="text" placeholder="Id User" value="<?php echo $datapengguna["iduser"];?>" required />
                                    <label for="iduser">Id User</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-warning" type="submit" name="simpantransaksi" id="simpantransaksi"><i class="fas fa-fw fa-floppy-disk"></i>Simpan Transaksi</button></a>
                            </td>
                            </div>

                            
                        <!-- Form transaksi -->
                        <table class="display table-striped table-bordered" style="width:100%;">
                            <thead>
                                <tr style="text-align:center;">
                                <th>Opsi</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah Beli</th>
                                <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //Membuat variabel nomor
                            $nomor = 0;
                            $total = 0;
                            $totalpembelian = 0;
                            //Query untuk memanggil data jenisbarang dengan variabel qdata
                            $qdata = mysqli_query($sambung, "SELECT * FROM keranjang inner join barang on keranjang.idmenu=barang.idbarang");
                            //perulangan WHILE dan penampungan data dalam array data
                            while ($data = mysqli_fetch_array($qdata))
                            //Awal perulangan
                    {
                            //Membuat nomor urut
                            $nomor++;
                    ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="index.php?page=tambahtransaksi&hapus=<?php echo $data['idkeranjang']; ?>" onclick="return confirm('Apakah data akan dihapus?')"><button type="button" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-fw fa-trash"></i></button></a></td>
                                    <!-- <td class="text-center"><?php echo $nomor; ?></td> -->
                                    <td><?php echo $data['namabarang']; ?></td>
                                    <td class="text-end px-1"><?php echo number_format($data['hargabarang'],0,",",","); ?></td>
                                    <td class="text-center"><?php echo $data['jmlorder']; ?></td>
                                    <td class="text-end px-1">
                                        <?php 
                                        // rumus total 
                                        $total= $total + ($data['jmlorder'] * $data['hargabarang']);
                                        $subtotal = $total;
                                        echo number_format($subtotal,0,",",",");
                                        $totalpembelian = $subtotal + $totalpembelian;
                                        // rumus untuk total pembelian
                                        // $totalpembelian = $total + $subtotal;
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                    }
                                ?>
                                <tr>
                                    <td colspan="4" class="text-end">Total</td>
                                    <td class="text-end">
                                        <?php 
                                         echo number_format($totalpembelian,0,",",",");
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="totalpembelian" id="totalpembelian" value="<?php echo $totalpembelian;?>">
                        </form>
                        <!-- tampilkan data keranjang -->
                        </div>
                    </div>
                </div>
                <!-- kolom 2 akhir -->
                </div>
            </div>
        </div>
    </div>
</div>