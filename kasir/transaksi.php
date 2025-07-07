<div class="container-fluid px-4">
    <h1 class="mt-4">Data Transaksi</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-dollar"></i>
                Daftar Transaksi
                <!-- Link /button untuk menambah data Menu -->
                <div class="float-end">
                    <a href="index.php?page=tambahtransaksi" class="btn btn-success float-right">
                        <span class=" icon text-white-10">
                            <i class="fas fa-plus text-white"></i>
                        </span>
                        <span class="text">Tambah Transaksi</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Kode Order</th>
                        <th>Tanggal Order</th>
                        <th>Pembeli</th>
                        <th>Total Pembelian</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Order</th>
                        <th>Tanggal Order</th>
                        <th>Pembeli</th>
                        <th>Total Pembelian</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    //Query untuk memanggil data kategori dengan variabel qdata
                    $qdata = mysqli_query($sambung, "SELECT * FROM transaksi Order BY tanggaltransaksi DESC");
                    //perulangan WHILE dan penampungan data dalam array data
                    while ($data = mysqli_fetch_array($qdata))
                    //Awal perulangan
                    {
                    ?>
                        <tr>
                            <td><?php echo $data['idpenjualan']; ?></td>
                            <td><?php echo $data['nonota']; ?></td>
                            <td><?php echo $data['tanggaltransaksi']; ?></td>
                            <td><?php echo $data['jam']; ?></td>
                            <td><?php echo $data['idpengguna']; ?></td>
                            <td><?php echo $data['totalharga']; ?></td>
                               
                            <td class="text-center">
                                <!-- Link untuk mengedit data -->
                                <a href="cetakkuitansi.php?id=<?php echo $data['idpenjualan'];?>" onclick="center(this.href,'myWindow','700','700','yes');return false"><button type="button" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-print"></i></button></a>

                                <!-- Link untuk mengedit data -->
                                <a href="detailtransaksi.php?id=<?php echo $data['idpenjualan'];?>" onclick="center(this.href,'myWindow','700','700','yes');return false"><button type="button" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-eye"></i></button></a>
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
</div>

<script>
    var popupWindow=null;

    function center(url,winName,w,h,scroll){
        LeftPosition=(screen.width)?(screen.width - w)/2:0;
        TopPosition=(screen.height)?(screen.height - h)/2:0;

        settings= 'height=' + h + ',width='+ w +',top='+TopPosition + 'left='+LeftPosition +',scrollbars='+scroll+',resizable'
        popupWindow=window.open(url, winName, settings)
    }
</script>