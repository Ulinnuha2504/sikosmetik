<div class="container-fluid px-4">
    <h1 class="mt-4">Data Staff</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Daftar Staff
                <a href="index.php?page=tambahstaff" class="btn btn-dark float-end">
                    <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Tools</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        //variabel no urut
                        $no = 0;
                        //panggil semua data dari tabel pengguna
                        $qdata = mysqli_query($sambung, "SELECT * FROM staff");
                        //buat array gabung perulangan
                        while ($data = mysqli_fetch_array($qdata)) {
                            //buat no urut
                            $no++;

                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data["namastaff"]; ?></td>
                                <td><?php echo $data["teleponstaff"]; ?></td>
                                <td><?php echo $data["alamatstaff"]; ?></td>
                                <td><?php echo $data["jabatanstaff"]; ?></td>
                                <td>
                                    <center><a href="index.php?page=editstaff&id=<?php echo $data['idstaff']; ?>"><button class="btn btn-dark btn-sm"><i class="fa fa-pen-to-square"></i></button></a>
                                    </center>
                                </td>
                            </tr>
                        <?php
                        } //penutup perulangan
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>