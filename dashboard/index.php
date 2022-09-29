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
    <title>Dashboard - Toko Hamid Furniture Padang</title>
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
                    <li><a class="active" href="../dashboard/"><i class="fa fa-home fa-lg"></i>Dashboard</a></li>
                    <li><a href="../penginputan/"><i class="fa fa-edit fa-lg"></i>Penginputan Barang</a></li>
                    <li><a href="../penginputanbeban/"><i class="fa fa-edit fa-lg"></i>Penginputan Beban</a></li>
                    <li><a href="../penjualan/"><i class="fa fa-folder fa-lg"></i>Penjualan</a></li>
                    <li><a href="../databeban/"><i class="fa fa-folder fa-lg"></i>Data Beban</a></li>
                    <li><a href="../laporanbeban/"><i class="fa fa-file-text fa-lg"></i>Laporan Beban</a></li>
                    <li><a href="../laporanpendapatan/"><i class="fa fa-file-text fa-lg"></i>Laporan Pendapatan</a></li>
                    <li><a href="../laporanlabarugi/"><i class="fa fa-file-text fa-lg"></i>Laporan Laba Rugi</a></li>
                    <li><a href="../proses/keluar.php"><i class="fa fa-sign-out fa-lg"></i>Keluar</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="content-layout">
            <div class="breadcrumb">
                <a href="../dashboard/">Dashboard</a><span>/</span>
            </div>
            <div class="content-data">
                <div class="report">
                    <div class="report-title">
                        Pengertian Sistem Informasi Akuntansi
                    </div>
                    <div class="report-data">
                        <p>SIA menurut Mulyadi adalah organisasi formulir, catatan, dan laporan yang dikoordinasi sedemikian rupa untuk menyediakan informasi keuangan yang dibutuhkan oleh manajemen guna memudahkan pengelolaan perusahaan (2001). Sedangkan menurut Nugroho Widjajanto (2001), SIA adalah susunan formulir, catatan, peralatan termasuk komputer dan perlengkapannya serta alat komunikasi, tenaga pelaksanaannya dan laporan yang terkoordinasi secara erat yang didesain untuk mentransformasikan data keuangan menjadi informasi yang dibutuhkan manajemen.</p>
                    </div>
                </div>
                <div class="report">
                    <div class="report-title">
                        Pengertian Laba Rugi
                    </div>
                    <div class="report-data">
                        <p>Laporan laba rugi (Inggris: Income Statement atau Profit and Loss Statement) adalah bagian dari laporan keuangan suatu perusahaan yang dihasilkan pada suatu periode akuntansi yang menjabarkan unsur-unsur pendapatan dan beban perusahaan sehingga menghasilkan suatu laba (atau rugi) bersih. Laporan laba rugi dapat dibuat pada periode satu bulan, satu tahun, berdasarkan konsep perbandingan (matching concept) yang disebut juga konsep pengaitan atau pemadanan, antara pendapatan dan beban yang terkait</p>
                    </div>
                </div>
                <div class="report">
                    <div class="report-title">
                        Profil Toko Hamid Furniture Padang
                    </div>
                    <div class="report-data">
                        <p>Didirikan oleh Bapak Erison di Kecamatan Pauh , Kota Padang Sumatera Barat. Pada tahun 2009 berawal dari seorang yang pekerjaannya menjadi perantara jual beli atau membuat persetujuan jual beli atas nama penjual juga pembeli yang diwakilinya dalam sebuah perusahaan furniture, Bapak Erison merubah pikirannya dengan belajar dari pengalaman, finishing impra, bahan kayu jati dan berbagai desain furniture. Hamid Furniture merupakan perusahaan yang bergerak dibidang meblair, yang memanfaatkan kayu jati sebagai ragam bahan baku. Bahan baku kayu ini kemudian diolah menjadi berbagai macam furniture. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>