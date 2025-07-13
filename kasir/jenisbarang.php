<div class="container-fluid px-4">
    <h1 class="mt-4">Data jenis barang</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="float-start"><i class="fas fa-table me-1"></i>
                    Data jenis barang
                </div>
                <!-- Link /button untuk menambah data jenis barang -->
                <div class="float-end">
                    <a href="index.php?page=tambahjenisbarang" class="btn btn-dark float-right">
                        <span class=" icon text-white-10">
                            <i class="fas fa-plus text-white"></i>
                        </span>
                        <span class="text">Tambah jenis barang</span>
                    </a>
                </div>
            </div>

            <div class="card-body">
            <!-- Data jenis barang -->
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>idjenisbarang</th>
                            <th>Nama jenis barang</th>
                            <th>Keterangan</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>idjenisbarang</th>
                            <th>Nama jenis barang</th>
                            <th>Keterangan</th>
                            <th>Tools</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        //Membuat variabel nomor
                        $nomor = 0;
                        //Query untuk memanggil data jenis barang dengan variabel qdata
                        $qdata = mysqli_query($sambung, "SELECT * FROM jenisbarang");
                        //perulangan WHILE dan penampungan data dalam array data
                        while ($data = mysqli_fetch_array($qdata))
                        //Awal perulangan
                        {
                            //Membuat nomor urut
                            $nomor++;
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td><?php echo $data['namajenisbarang']; ?></td>
                                <td><?php echo $data['keteranganjenisbarang']; ?></td>
                                <td class="text-center">
                                    <!-- Link untuk mengedit data -->
                                    <a href="index.php?page=editjenisbarang&id=<?php echo $data['idjenisbarang']; ?>" onclick="return confirm('Apakah data akan diedit?')"><button type="button" class="btn btn-dark btn-circle btn-sm"><i class="fas fa-fw fa-pen"></i></button></a>
                                </td>
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
