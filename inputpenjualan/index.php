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
    <title>Form Penjualan - Toko Hamid Furniture Padang</title>
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
                <a href="../inputpenjualan/">Form Penjualan Barang</a>
            </div>
            <div class="container">
                <h2 style="margin:20px 0px;">Form Penjualan Barang</h2>
                <form action="../proses/input.php" method="post">
                    <div class="form-row">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" placeholder="Tanggal Transaksi">
                    </div>
                    <div class="form-row">
                        <label for="kode_transaksi">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi" placeholder="Kode Transaksi" id="">
                    </div>
                    <div class="form-row">
                        <label for="kode_barang">Kode Barang</label>
                        <select name="kode_barang" id="kode_barang" onchange='changeValue(this.value)' require>
                            <option value="--">Pilih Kode Barang</option>
                            <?php
                            $data = "SELECT * FROM tb_barang";
                            $query = mysqli_query($koneksi,$data);
                            $jsArray = "var prdName = new Array();\n";
                            while ($row = mysqli_fetch_array($query)) {  
                                echo '<option  value="' . $row['kode_barang'] . '">' . $row['kode_barang'] . '</option>';  
                                $jsArray .= "prdName['" . $row['kode_barang'] . "'] = 
                                {nama_barang:'" . addslashes($row['nama_barang']) . "',
                                 jenis_barang:'" . addslashes($row['jenis_barang']) . "',
                                 harga_barang_modal:'" . addslashes($row['harga_barang_modal']) . "',
                                 harga_barang_jual:'" . addslashes($row['harga_barang_jual']) . "'
                                };\n";
                             }
                             ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" placeholder="Nama Barang" id="nama_barang" readonly>
                    </div>
                    <div class="form-row">
                        <label for="jenis_barang">Jenis Barang</label>
                        <input type="text" name="jenis_barang" placeholder="Jenis Barang" id="jenis_barang" readonly>
                    </div>
                    <div class="form-row">
                        <label for="harga">Harga Barang Modal</label>
                        <input type="number" name="harga_barang_modal" placeholder="Harga Barang Modal" onkeyup="sum();" id="harga_barang_modal" readonly>
                    </div>
                    <div class="form-row">
                        <label for="harga">Harga Barang Jual</label>
                        <input type="number" name="harga_barang_jual" placeholder="Harga Barang Jual" onkeyup="sum();" id="harga_barang_jual" readonly>
                    </div>
                    <div class="form-row">
                        <label for="harga">Qty</label><br>
                        <input type="number" name="qty" id="qty" onkeyup="sum();" placeholder="Qty">
                    </div>     
                    <div class="form-row">
                        <label for="harga">Total Harga Barang Modal</label>
                        <input type="number" name="total_harga_barang_modal" id="total_harga_modal"  placeholder="Total Harga Barang Modal"readonly>
                    </div>                                 
                    <div class="form-row">
                        <label for="harga">Total Harga Barang Jual</label>
                        <input type="number" name="total_harga_barang_jual" id="total_harga_jual" placeholder="Total Harga Barang Jual"readonly>
                    </div>
                    <div style="margin-bottom:50px"  class="form-submit">
                        <input type="submit" name="inputpenjualan" value="Masukan">
                    </div>
                </form>
            </div>
    </section>
    <script type="text/javascript"> 
    // Combo Box
    <?php echo $jsArray; ?>
    function changeValue(id){
        document.getElementById('nama_barang').value = prdName[id].nama_barang;
        document.getElementById('jenis_barang').value = prdName[id].jenis_barang;
        document.getElementById('harga_barang_modal').value = prdName[id].harga_barang_modal;
        document.getElementById('harga_barang_jual').value = prdName[id].harga_barang_jual;
    };
        // Tambah
        function sum() {
            var harga_barang_modal = document.getElementById('harga_barang_modal').value;
            var harga_barang_jual = document.getElementById('harga_barang_jual').value;
            var qty = document.getElementById('qty').value;
            var total_harga_modal = parseInt(harga_barang_modal) * parseInt(qty);
            var total_harga_jual =  parseInt(harga_barang_jual) * parseInt(qty);
            if (!isNaN(total_harga_modal)) {
                document.getElementById('total_harga_modal').value = total_harga_modal;
            }
            if (!isNaN(total_harga_jual)) {
                document.getElementById('total_harga_jual').value = total_harga_jual;
            }
        }
    </script>
</body>
</html>