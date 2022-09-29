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
    <title>Beban - Toko Hamid Furniture Padang</title>
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
                    <li><a class="active" href="../databeban/"><i class="fa fa-folder fa-lg"></i>Data Beban</a></li>
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
                <a href="../databeban/">Data Beban</a><span>/</span>
            </div>
            <div class="button-input-layout">
                <?php
                $cari="";
                if (isset($_GET['caridatabeban'])){
                  $cari=$_GET['caridatabeban'];
                }
                ?>
                <div class="search-layout">
                    <div class="search-logo">
                        <i class="fa fa-search fa-lg">
                        </i>
                    </div>
                    <div class="search-input-layout">
                    <form action="" method="get">
                        <input type="text" name="caridatabeban" value="<?php echo $cari ?>" placeholder="Cari Data Beban ! " name="" id="">
                        <input type="submit" value="Cari">
                    </form>
                    </div>
                </div>
                <a href="../inputdatabeban/">Input Data Beban</a>
            </div>
            <div class="table-layout">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Transaksi</th>
                        <th>Kode Beban</th>
                        <th>Nama Beban</th>
                        <th>Harga Beban</th>
                        <th>Pengaturan</th>
                    </tr>
                    <?php
                        if(isset($_GET['caridatabeban'])){
                        $cari=$_GET['caridatabeban'];
                            $data  = "SELECT * FROM tb_data_beban WHERE tanggal_transaksi LIKE'%$cari%' OR kode_transaksi LIKE'%$cari%' 
                            OR kode_beban LIKE'%$cari%' OR nama_beban LIKE'%$cari%' OR harga_beban LIKE'%$cari%'";
                        }
                        else{
                            $data  = "SELECT * FROM tb_data_beban";        
                        }
                        $no=1;
                        $query = mysqli_query($koneksi,$data);
                        while($row = mysqli_fetch_array($query))
                        {
                            $tanggal_transaksi= $row["tanggal_transaksi"];
                            $kode_transaksi = $row["kode_transaksi"];
                            $kode_beban = $row["kode_beban"];
                            $nama_beban = $row["nama_beban"];
                            $harga_beban= $row["harga_beban"];
                    ?>
                    <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$tanggal_transaksi" ?></td>
                        <td><?php echo "$kode_transaksi" ?></td>
                        <td><?php echo "$kode_beban" ?></td>
                        <td><?php echo "$nama_beban" ?></td>
                        <td><?php echo "Rp. ". number_format($harga_beban, 2, ".", ",");?></td>
                        <td>
                            <a href="../ubahdatabeban/?kode_transaksi=<?php echo $kode_transaksi ?>"><i class="fa fa-edit"></i></a>
                            <a href="../databeban/hapus.php?kode_transaksi=<?php echo $kode_transaksi ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>