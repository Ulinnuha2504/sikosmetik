<?php
//Pemanggilan Koneksi
include('../connectdb.php');

//Pengambilan data dari form tambahjenisbarang
$namajenisbarang       = mysqli_real_escape_string($sambung, $_POST['namajenisbarang']);
$keteranganjenisbarang= mysqli_real_escape_string($sambung, $_POST['keteranganjenisbarang']);

//Proses Simpan ke tabeljenis barang
$simpan = mysqli_query($sambung, "INSERT INTO jenisbarang( namajenisbarang,
                                                        keteranganjenisbarang) 
                                                        VALUES('$namajenisbarang',
                                                        '$keteranganjenisbarang')");

//Tampilan pesan data berhasil disimpan
echo "<script>alert('Data berhasil disimpan')</script>";
//Alihkan halaman ke pengguna.php
echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenisbarang'>";
