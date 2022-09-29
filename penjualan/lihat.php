<?php
 include '../koneksi/index.php';
 require_once __DIR__ . '/../mpdf/vendor/autoload.php';
 $mpdf = new \Mpdf\Mpdf();
 ob_start();
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
    <title> Transaksi Penjualan - Toko Hamid Furniture Padang</title>
</head>
<body>
   
                    <?php   
                            $kode_transaksi = $_GET["kode_transaksi"];
                            $data  = "SELECT * FROM tb_penjualan WHERE kode_transaksi='$kode_transaksi'";
                            $query = mysqli_query($koneksi,$data);
                            $row = mysqli_fetch_array($query);
                            {
                                $tanggal_transaksi= $row["tanggal_transaksi"];
                                $kode_transaksi = $row["kode_transaksi"];
                                $kode_barang = $row["kode_barang"];
                                $nama_barang = $row["nama_barang"];
                                $jenis_barang = $row["jenis_barang"];
                                $harga_barang_modal = $row["harga_barang_modal"];
                                $harga_barang_jual = $row["harga_barang_jual"];
                                $qty=$row["qty"];
                                $total_harga_barang_modal=$row["total_harga_barang_modal"];
                                $total_harga_barang_jual=$row["total_harga_barang_jual"];
                    ?>
                    <h3 style="text-align:center;">Toko Hamid Furniture Padang</h3>
                    <hr>
                    <br>
                    <p>Tanggal Transaksi <?php echo "$tanggal_transaksi" ?></p>
                    <br>
                    <p>Kode Transaksi : <?php echo "$kode_transaksi" ?> </p>
                    <br>
                    <p>Nama Barang : <?php echo "$nama_barang" ?></p>
                    <br>
                    <p>Jenis Barang : <?php echo "$jenis_barang" ?></p>
                    <br>
                    <p>Harga Barang Modal : <?php echo "Rp. ". number_format($harga_barang_modal, 2, ".", ",");?></p>
                    <br>
                    <p>Harga Barang Jual : <?php echo "Rp. ". number_format($harga_barang_jual, 2, ".", ",");?></p>
                    <br>
                    <p>Jumlah Barang : <?php echo "$qty" ?></p>
                    <br>
                    <hr>
                    <br>
                    <p>Total Harga Barang Modal : <?php echo "Rp. ". number_format($total_harga_barang_modal, 2, ".", ",");?>   </p>
                    <p>Total Harga Barang Jual : <?php echo"Rp. ". number_format($total_harga_barang_jual, 2, ".", ",");?>    </p>
                    <p style="text-align:right">Padang, <?php $tgl=date("d-M-Y"); echo"$tgl"; ?></p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p style="text-align:right">(..............................)</p>

</body>
</html>
<?php
$filename="Transaksi Penjualan - ".$row["tanggal_transaksi"].".pdf";
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML("$html");
$mpdf->Output("$filename",'I');
?>
<?php
}
?>