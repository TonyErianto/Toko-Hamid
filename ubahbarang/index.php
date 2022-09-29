<?php
 include '../koneksi/index.php';
?>
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
    <title>Ubah Input Barang - Toko Hamid Furniture Padang</title>
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
                    <li><a class="active" href="../penginputan/"><i class="fa fa-edit fa-lg"></i>Penginputan Barang</a></li>
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
                <a href="../penginputan/">Penginputan Barang</a><span>/</span>
                <a href="../ubahbarang/">Ubah Input Barang</a>
            </div>
            <div class="container">
                <h2 style="margin:20px 0px;">Form Ubah Input Barang</h2>
                <?php
                        $kode_barang = $_GET["kode_barang"];
                        $data  = "SELECT * FROM tb_barang WHERE kode_barang='$kode_barang'";
                        $query = mysqli_query($koneksi,$data);
                        $row = mysqli_fetch_array($query);
                        {
                            $kode_barang = $row["kode_barang"];
                            $nama_barang = $row["nama_barang"];
                            $jenis_barang = $row["jenis_barang"];
                            $stok=$row["stok"];
                            $harga_barang_modal = $row["harga_barang_modal"];
                            $harga_barang_jual = $row["harga_barang_jual"];
                    ?>
                <form action="../proses/ubah.php" method="post">
                    <div class="form-row">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" name="kode_barang" value="<?php echo"$kode_barang"?>" readonly>
                    </div>
                    <div class="form-row">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" value="<?php echo"$nama_barang"?>" >
                    </div>
                    <div class="form-row">
                        <label for="jenis_barang">Jenis Barang</label>
                        <input type="text" name="jenis_barang"  value="<?php echo"$jenis_barang"?>">
                    </div>
                    <div class="form-row">
                        <label for="harga">Stok Barang</label>
                        <input type="number" name="stok" value="<?php echo"$stok"?>">
                    </div>
                    <div class="form-row">
                        <label for="harga">Harga Barang Modal</label>
                        <input type="number" name="harga_barang_modal" value="<?php echo"$harga_barang_modal"?>">
                    </div>
                    <div class="form-row">
                        <label for="harga">Harga Barang</label>
                        <input type="number" name="harga_barang_jual" value="<?php echo"$harga_barang_jual"?>">
                    </div>
                    <div class="form-submit">
                        <input type="submit" name="ubahbarang" value="Ubah">
                    </div>
                </form>
                <?php
                    }
                 ?>
            </div>
    </section>
</body>
</html>