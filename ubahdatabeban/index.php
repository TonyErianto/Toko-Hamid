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
    <title>Ubah Input Data Beban - Toko Hamid Furniture Padang</title>
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
                    <li><a class="active" href="../penjualan/"><i class="fa fa-folder fa-lg"></i>Penjualan</a></li>
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
                <a href="../penjualan/">Penjualan</a><span>/</span>
                <a href="../inputpenjualan/">Ubah Input Data Beban</a>
            </div>
            <div class="container">
                <h2 style="margin:20px 0px;">Ubah Input Data Beban</h2>
                <?php
                        $kode_transaksi = $_GET["kode_transaksi"];
                        $data  = "SELECT * FROM tb_data_beban WHERE kode_transaksi='$kode_transaksi'";
                        $query = mysqli_query($koneksi,$data);
                        $row = mysqli_fetch_array($query);
                        {
                            $tanggal_transaksi= $row["tanggal_transaksi"];
                            $kode_transaksi = $row["kode_transaksi"];
                            $kode_beban = $row["kode_beban"];
                            $nama_beban = $row["nama_beban"];
                            $harga_beban= $row["harga_beban"];
                ?>
                <form action="../proses/ubah.php" method="post">
                    <div class="form-row">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" value="<?php echo "$tanggal_transaksi"?>">
                    </div>
                    <div class="form-row">
                        <label for="kode_transaksi">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi" value="<?php echo"$kode_transaksi" ?>" readonly>
                    </div>
                    <div class="form-row">
                        <label for="kode_beban">Kode Beban</label>
                        <select name="kode_beban" id="kode_beban" onchange='changeValue(this.value)' require>
                            <option value="<?php echo "$kode_beban" ?>"><?php echo"$kode_beban"?></option>
                            <option value="---------------------------------------">------------------------------------------------------------------------------</option>
                            <?php
                            include '../koneksi/index.php';
                            $data = "SELECT * FROM tb_beban";
                            $query = mysqli_query($koneksi,$data);
                            $jsArray = "var prdName = new Array();\n";
                            while ($row = mysqli_fetch_array($query)) {  
                                echo '<option  value="' . $row['kode_beban'] . '">' . $row['kode_beban'] . '</option>';  
                                $jsArray .= "prdName['" . $row['kode_beban'] . "'] = {nama_beban:'" . addslashes($row['nama_beban']) . "'};\n";
                             }
                             ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="nama_beban">Nama Beban</label>
                        <input type="text" name="nama_beban" value="<?php echo"$nama_beban" ?>" id="nama_beban" readonly>
                    </div>
                    <div class="form-row">
                        <label for="harga_beban">Harga Beban</label>
                        <input type="number" name="harga_beban" value="<?php echo"$harga_beban" ?>">
                    </div>
                    <div style="margin-bottom:50px"  class="form-submit">
                        <input type="submit" name="ubahdatabeban" value="Ubah">
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
    </section>
    <script type="text/javascript"> 
    <?php echo $jsArray; ?>
    function changeValue(id){
        document.getElementById('nama_beban').value = prdName[id].nama_beban;
    };
</script>
</body>
</html>