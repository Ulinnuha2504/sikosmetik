<div class="container-fluid px-4">
    <h1 class="mt-4">Periode Laporan</h1>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-file"></i>
                Data Periode Laporan
            </div>
            <div class="card-body">
                <form action="" method="post" onsubmit="center('myWindow','700','700','yes');return false">
                    <!-- tanggal awal -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="tanggalawal" name="tanggalawal" type="date" placeholder="Tanggal Awal" required />
                        <label for="tanggalawal">Tanggal Awal</label>
                    </div>
                    <!-- tanggal akhir -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="tanggalakhir" name="tanggalakhir" type="date" placeholder="Tanggal Akhir" required />
                        <label for="tanggalakhir">Tanggal Akhir</label>
                    </div>
                    <!-- tombol laporan -->
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-warning" type="submit" name="cetaklaporan" id="cetaklaporan"><i class="fas fa-fw fa-floppy-disk"></i>Cetak Laporan</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var popupWindow=null;

    function center(winName,w,h,scroll){
        LeftPosition=(screen.width)?(screen.width - w)/2:0;
        TopPosition=(screen.height)?(screen.height - h)/2:0;
        var awal=document.getElementById('tanggalawal').value;
        var akhir=document.getElementById('tanggalakhir').value;


        settings= 'height=' + h + ',width='+ w +',top='+TopPosition + 'left='+LeftPosition +',scrollbars='+scroll+',resizable'
        popupWindow=window.open('cetaklaporan.php?awal='+awal+'&akhir='+akhir, winName, settings)
    }
</script>