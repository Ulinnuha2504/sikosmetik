<div class="container-fluid px-4">
    <h1 class="mt-4">Data Pengguna</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Data Pengguna Sistem
           <!-- Link /button untuk menambah data jenis barang -->
           <div class="float-end">
                    <a href="index.php?page=tambahpengguna" class="btn btn-dark float-right">
                        <span class=" icon text-white-10">
                            <i class="fas fa-plus text-white"></i>
                        </span>
                        <span class="text">Tambah pengguna</span>
                    </a>
                </div>      
                
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>idpengguna</th>
                            <th>namauser</th>
                            <th>username</th>
                            <th>Password</th>
                            <th>Hak Akses</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>idpengguna</th>
                            <th>namauser</th>
                            <th>username</th>
                            <th>Password</th>
                            <th>Hak Akses</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        //variabel no urut
                        $no = 0;
                        //panggil semua data dari tabel pengguna
                        $qdata = mysqli_query($sambung, "SELECT * FROM pengguna");
                        //buat array gabung perulangan
                        while ($data = mysqli_fetch_array($qdata)) {
                            //buat no urut
                            $no++;

                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data["namauser"]; ?></td>
                                <td><?php echo $data["username"]; ?></td>
                                <td>******</td>
                                <td><?php echo $data["hakakses"]; ?></td>
                                <td><?php echo $data["status"]; ?></td>
                                <td>
                                    <center><a href="index.php?page=editpengguna&id=<?php echo $data['iduser']; ?>"><button class="btn btn-success btn-sm"><i class="fa fa-pen-to-square"></i></button></a>
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