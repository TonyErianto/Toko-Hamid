<?php
session_start();
if($_SESSION['status']!="login"){
    echo "<script>alert('Silahkan Masuk Terlebih Dahulu !')
    document.location.href='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Laporan Laba Rugi - Toko Hamid Furniture Padang</title>
</head>
<body>
    <section>
        <div class="top-nav">
            <div class="brand-company">
                Toko Hamid Furniture Padang
            </div>
            <div class="name-account">
                <?php echo $_SESSION["nama_lengkap"] ?>
            </div>
        </div>
        <div class="side-nav">
            <div class="side-nav-menu">
                <ul>
                    <li><a href="../dashboard/"><i class="fa fa-home fa-lg"></i>Dashboard</a></li>
                    <li><a href="../penginputan/"><i class="fa fa-edit fa-lg"></i>Penginputan Barang</a></li>
                    <li><a href="../penginputanbeban/"><i class="fa fa-edit fa-lg"></i>Penginputan Beban</a></li>
                    <li><a href="../penjualan/"><i class="fa fa-folder fa-lg"></i>Penjualan</a></li>
                    <li><a href="../databeban/"><i class="fa fa-folder fa-lg"></i>Data Beban</a></li>
                    <li><a href="../laporanbeban/"><i class="fa fa-file-text fa-lg"></i>Laporan Beban</a></li>
                    <li><a href="../laporanpendapatan/"><i class="fa fa-file-text fa-lg"></i>Laporan Pendapatan</a></li>
                    <li><a class="active" href="../laporanlabarugi/"><i class="fa fa-file-text fa-lg"></i>Laporan Laba Rugi</a></li>
                    <li><a href="../proses/keluar.php"><i class="fa fa-sign-out fa-lg"></i>Keluar</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="content-layout">
            <div class="breadcrumb">
                <a href="../laporanlabarugi/">Laporan Laba Rugi</a><span>/</span>
            </div>
            <div class="button-layout">
                <a href="../laporanlabarugi/laporanlabarugibulanan.php">Laporan Laba Rugi Bulanan<i style="float:right" class="fa fa-file-text fa-lg"></i></a>
                <a href="../laporanlabarugi/laporanlabarugiperiode.php">Laporan Laba Rugi Periode<i style="float:right" class="fa fa-file-text fa-lg"></i></a>
                <a href="../laporanlabarugi/laporanlabarugitahunan.php">Laporan Laba Rugi Tahunan<i style="float:right" class="fa fa-file-text fa-lg"></i></a>
            </div>
        </div>
    </section>
</body>
</html>