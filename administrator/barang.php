<div class="container-fluid px-4">
    <h1 class="mt-4">Data Barang</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-utensils"></i>
                Daftar Barang Sinar Kosmetik Thamrin
               <!-- Link /button untuk menambah data barang -->
           <div class="float-end">
                    <a href="index.php?page=tambahbarang" class="btn btn-dark float-right">
                        <span class=" icon text-white-10">
                            <i class="fas fa-plus text-white"></i>
                        </span>
                        <span class="text">Tambah barang</span>
                    </a>
                </div>    
            </div>
            <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>idbarang</th>
                        <th>namabarang</th>
                        <th>hargabarang</th>
                        <th>idjenisbarang</th>
                        <th>keterangan barang</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>idbarang</th>
                        <th>namabarang</th>
                        <th>hargabarang</th>
                        <th>idjenisbarang</th>
                        <th>keterangan barang</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    //Membuat variabel nomor
                    $nomor = 0;
                    //Query untuk memanggil data kategori dengan variabel qdata
                    $qdata = mysqli_query($sambung, "SELECT * FROM barang inner join jenisbarang on barang.idjenisbarang=jenisbarang.idjenisbarang");
                    //perulangan WHILE dan penampungan data dalam array data
                    while ($data = mysqli_fetch_array($qdata))
                    //Awal perulangan
                    {
                        //Membuat nomor urut
                        $nomor++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $nomor; ?></td>
                            <td><?php echo $data['namabarang']; ?></td>
                            <td><?php echo $data['hargabarang']; ?></td>
                            <td><?php echo $data['namajenisbarang']; ?></td>
                            <td><?php echo $data['keteranganbarang']; ?></td>
                        </tr>
                    <?php
                    }
                    //Akhir perulangan
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>