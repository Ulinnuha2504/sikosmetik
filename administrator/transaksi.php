<div class="container-fluid px-4">
    <h1 class="mt-4">Data Transaksi</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-dollar"></i> Daftar Transaksi
                <div class="float-end">
                    <a href="index.php?page=tambahtransaksi" class="btn btn-success btn-sm">
                        <i class="fas fa-plus text-white"></i> Tambah Transaksi
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>No Nota</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>ID Pengguna</th>
                            <th>Total Harga</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center bg-light">
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>No Nota</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>ID Pengguna</th>
                            <th>Total Harga</th>
                            <th>Tools</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        <?php
                        $qdata = mysqli_query($sambung, "SELECT * FROM transaksi ORDER BY tanggaltransaksi DESC");
                        if (!$qdata) {
                            echo "<tr><td colspan='7'>Query error: " . mysqli_error($sambung) . "</td></tr>";
                        } else {
                            while ($data = mysqli_fetch_array($qdata)) {
                        ?>
                        <tr>
                            <td><?php echo $data['idpenjualan']; ?></td>
                            <td><?php echo $data['nonota']; ?></td>
                            <td><?php echo $data['tanggaltransaksi']; ?></td>
                            <td><?php echo substr($data['jam'], 0, 5); ?></td>
                            <td><?php echo $data['idpengguna']; ?></td>
                            <td><?php echo 'Rp. ' . number_format($data['totalharga'], 0, ",", "."); ?></td>
                            <td>
                                <a href="cetaknota.php?id=<?php echo $data['idpenjualan']; ?>" onclick="center(this.href,'myWindow','700','700','yes');return false">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-print"></i></button>
                                </a>
                                <a href="detailtransaksi.php?id=<?php echo $data['idpenjualan']; ?>" onclick="center(this.href,'myWindow','700','700','yes');return false">
                                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                </a>
                            </td>
                        </tr>
                        <?php
                            } // end while
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var popupWindow = null;
    function center(url, winName, w, h, scroll) {
        let LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        let TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        let settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable';
        popupWindow = window.open(url, winName, settings);
    }
</script>
