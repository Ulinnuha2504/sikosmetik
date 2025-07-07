<?php 
// panggil koneksi
include "../connectdb.php";
//panggil data tahun dan bulan
$tahun=date('Y');
$bulan=date('m');
//perintah sql panggil data
$sqlbar=mysqli_query($sambung,"SELECT tanggaltransaksi, SUM(totalharga) AS total,
                                                    MONTH(tanggaltransaksi) AS bln from transaksi
                                                    WHERE YEAR(tanggaltransaksi)='$tahun'
                                                    GROUP BY MONTH(tanggaltransaksi)");
//membuat array
$databar=[];

//perulangan untuk menampilkan data
while ($rowbar=mysqli_fetch_assoc($sqlbar)) {
    array_push($databar,$rowbar);
}
//json
echo json_encode($databar);

?>