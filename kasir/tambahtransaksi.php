<?php
// kode menu otomatis

// 1 ambil kode menu yang terbesar
$qkodeorder=mysqli_query($sambung, "SELECT max(kodeorder) as kodeterbesar FROM transaksiorder");
$dataorder=mysqli_fetch_array($qkodeorder);

$kodeorderterbesar=$dataorder["kodeterbesar"];

echo $kodeorderterbesar;
// ambil data angka dari kode menu (MENU-00001 TRAN0000001)
$urutan=(int) substr($kodeorderterbesar,4,7);

// urutan  +1
$urutan ++;

//echo $urutan;
// buat kode menu
$huruf="TRAN";
$kodeorder=$huruf.sprintf("%07s",$urutan);
// echo  "<br>". $kodeorder;

//proses simpan pilihan menu ke tabel keranjang

if (isset($_POST["tambahorder"])) {
    // ambil data dari form
    $idmenu = mysqli_real_escape_string($sambung, $_POST["idmenu"]);
    $jmlorder = mysqli_real_escape_string($sambung, $_POST["jumlahorder"]);
         
    //simpan data ke dalam tabel keranjang
    $simpan = mysqli_query($sambung, "INSERT INTO keranjang (kodeorder,
                                                            idpenjualan,
                                                             jumlahbeli) 
                                                     VALUES ('$kodeorder',
                                                             '$idbarang',
                                                             '$jumlahbeli')");
//beri pesan data berhasil ditambahkan
 echo "<script>alert('Data berhasil disimpan!')</script>";
 //7 pindahkan ke halaman tambahtransaksi.php
 echo "<meta http-equiv='refresh' content='0;url=index.php?page=tambahtransaksi'>";
}

//simpan transaksi
if (isset($_POST["simpantransaksi"])) {
   // echo "Simpan Transaksi";

   //ambil data dari form transaksi
$tanggalorder = mysqli_real_escape_string($sambung, $_POST["tanggalorder"]);
$nickname = mysqli_real_escape_string($sambung, $_POST["nickname"]);
$iduser = mysqli_real_escape_string($sambung, $_POST["iduser"]);
$totalorder = mysqli_real_escape_string($sambung, $_POST["totalorder"]);
   //simpan data dari transaksi order
   $simpan = mysqli_query($sambung, "INSERT INTO transaksi (nonota,
                                                                tanggaltransaksi,
                                                                jam,
                                                                kasir,
                                                                total) 
                                                        VALUES ('$nonota',
                                                                '$tanggaltransaksi',
                                                                '$jam',
                                                                '$kasir',
                                                                '$total')");

//pindahkan data dari keranjang ke detailtransaksiorder
$qkeranjang = mysqli_query($sambung,"SELECT * FROM keranjang WHERE kodeorder='$nonota'");
while ($datakeranjang= mysqli_fetch_array($qkeranjang)) {
    //ambil harga transaksi
    $qmenu = mysqli_query($sambung,"SELECT * FROM menu WHERE idmenu='".$datakeranjang["idpenjualan"]."'");
    $datamenu = mysqli_fetch_array($qtransaksi);

    $idmenu = $datakeranjang["idtransaksi"];
    $hargajual = $datamenu["hargabarang"];
    $jmlorder = $datakeranjang["jumlahbeli"];

    $simpandetail = mysqli_query($sambung,"INSERT INTO detailtransaksiorder (kodeorder,
                                                                             idpenjualan,
                                                                             hargabarang,
                                                                             jumlahbeli)
                                                                    VALUES ('$nonota',
                                                                            '$idpenjualan',
                                                                            '$hargabarang',
                                                                            '$jumlahbeli')");
    }
    // hapus data dari keranjang
    $hapus = mysqli_query($sambung, "DELETE FROM keranjang");

     //pesan berhasil disimpan
     echo "<script>alert('Data berhasil disimpan!')</script>";
     //7 pindahkan ke halaman transaksi.php
     echo "<meta http-equiv='refresh' content='0;url=index.php?page=transaksi'>";
}

if (isset($_GET["aksi"])=="hapustransaksi") {
    //ambil id 
$id = mysqli_real_escape_string($sambung,$_GET["id"]);
    //proses hapus
$hapus = mysqli_query($sambung,"DELETE FROM keranjang WHERE idkeranjang='$id'");
    //pesan berhasil dihapus
    echo "<script>alert('Data berhasil dihapus!')</script>";
    //7 pindahkan ke halaman tambahtransaksi.php
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
                            $qmenu=mysqli_query($sambung, "SELECT * FROM barang");
                            WHILE($databarang=mysqli_fetch_array($qbarang)){
                                    echo "<option value='$datamenu[idbarang]'>$databarang[namabarang]</option>"; 
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
                                <input class="form-control" id="jam" name="jam" type="text" placeholder="Jam"  required />
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
                                <th></th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah Beli</th>
                                <th>Total</th>
                                <th>Total Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //Membuat variabel nomor
                            $nomor = 0;
                            $total = 0;
                            //Query untuk memanggil data kategori dengan variabel qdata
                            $qdata = mysqli_query($sambung, "SELECT * FROM keranjang inner join menu on keranjang.idpenjualan=penjualan.idpenjualan");
                            //perulangan WHILE dan penampungan data dalam array data
                            while ($data = mysqli_fetch_array($qdata))
                            //Awal perulangan
                    {
                            //Membuat nomor urut
                            $nomor++;
                    ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="index.php?page=tambahtransaksi&id=<?php echo $data['idkeranjang']; ?>&aksi=hapusorder" onclick="return confirm('Apakah data akan dihapus?')"><button type="button" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-fw fa-trash"></i></button></a></td>
                                    <td class="text-center"><?php echo $nomor; ?></td>
                                    <td><?php echo $data['namabarang']; ?></td>
                                    <td class="text-end px-1"><?php echo number_format($data['hargabarang'],0,",",","); ?></td>
                                    <td class="text-center"><?php echo $data['jmlorder']; ?></td>
                                    <td class="text-end px-1">
                                        <?php 
                                        // rumus total 
                                        $total= $data['jumlahbeli'] * $data['hargabarang'];
                                        echo number_format($subtotal,0,",",",");

                                        // rumus untuk total pembelian
                                        $totalpembelian = $total + $subtotal;
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                    }
                                ?>
                                <tr>
                                    <td colspan="5" class="text-end">Total</td>
                                    <td class="text-end">
                                        <?php 
                                         echo number_format($total,0,",",",");
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="totalpembelian" id="totalpembelian" value="<?php echo $total;?>">
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