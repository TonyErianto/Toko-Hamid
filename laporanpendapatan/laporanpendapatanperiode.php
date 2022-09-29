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
    <title>Laporan Pendapatan Periode - Toko Hamid Furniture Padang</title>
</head>
<style>
    hr{
        border:1px solid black;
    }
    table{
        width:95%;
        text-align:center;
        border-collapse: collapse;
        margin:auto;
    }
    table th{
        padding:20px;
        border:1px solid black;
        font-size:15px;
        background-color:#0084ff;
        color:#ffffff;
    }
    table td{
        padding:15px;
        font-size:13px;
        border:1px solid black;
    }
    table tr:nth-child(odd){
    background-color: #ffffff;
}
    table tr:nth-child(even){
    background-color: #eff3f2;
}
    .header-layout{
        width:98%;
        height:70px;
        display:flex;
        justify-content:space-between;
        margin:auto;
    }
    .header-layout > .filter-layout{
        width:60%;
        height:100%;
        display:flex;
        align-items:center;
    }
    .header-layout > .filter-layout input{
        padding:8px;
        outline:none;
    }
    .header-layout > .filter-layout input[type=submit]{
        padding:10px 20px;
        outline:none;
        border:none;
        background-color:#0084ff;
        color:#FFFFFF;
    }
    .header-layout > .filter-layout input[type=submit]:hover{
        background-color: #046ed1;
    }
    .button-exit-layout{
        width:20%;
        height:100%;
        display:flex;
        align-items:center;
        justify-content:flex-end;
    }
    .button-exit-layout a{
        display:block;
        padding: 10px 20px;
        background-color:#0084ff;
        text-decoration:none;
        color:#FFFFFF;
        margin:0px 10px;
    }
    .button-exit-layout a:hover{
    background-color: #046ed1;
    }
    .footer-layout{
        width:95%;
        margin:auto;
    }
    .footer-layout p{
        font-size:15px;
        text-align:right;
    }
</style>
<body>
                    <?php
                    $bulanawal="";
                    $bulanakhir="";
                    if(isset($_GET['periodebulan'])){
                        $bulanawal=$_GET['bulanawal'];
                        $bulanakhir=$_GET['bulanakhir'];
                    }
                    ?>
                    <div class="header-layout">
                        <div class="filter-layout">
                            <form action="" method="GET">
                                <input type="date" value="<?php echo $bulanawal ?>" name="bulanawal">
                                <input type="date" value="<?php echo $bulanakhir ?>" name="bulanakhir">
                                <input type="submit" name="periodebulan" value="Filter">
                            </form>
                        </div>
                        <div class="button-exit-layout">
                            <a href="../laporanpendapatan/cetaklaporanpendapatanperiode.php?bulanawal=<?php echo "$bulanawal" ?>&bulanakhir=<?php echo "$bulanakhir"?>">Cetak</a>
                            <a href="../laporanpendapatan/">Kembali</a>
                        </div>
                    </div>
                    <br>
                    <center>
                    <hr>
                    <br>
                    <h3>Toko Hamid Furniture Padang</h3>
                    <p>Laporan Pendapatan Periode</p>
                    <p> Periode Bulan : <?php echo "$bulanawal"?> s/d Bulan : <?php echo "$bulanakhir"?></p>
                    <br>
                    <hr>
                    <br>
                     </center>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Harga Modal</th>
                            <th>Harga Jual</th>
                            <th>Qty</th>
                            <th>Total Harga Modal</th>
                            <th>Total Harga Jual</th>
                        </tr>
                    <?php
                    if(isset($_GET["periodebulan"])){
                        $bulanawal=$_GET["bulanawal"];
                        $bulanakhir=$_GET["bulanakhir"];
                        $data="SELECT * FROM tb_penjualan WHERE tanggal_transaksi BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tanggal_transaksi ASC  ";
                        $total="SELECT SUM(total_harga_barang_modal) AS totalmodal, SUM(total_harga_barang_jual) AS totaljual FROM tb_penjualan  WHERE tanggal_transaksi BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tanggal_transaksi ASC";                     }
                    else{
                        $data="SELECT * FROM tb_penjualan ORDER BY tanggal_transaksi ASC";
                        $total="SELECT SUM(total_harga_barang_modal) AS totalmodal, SUM(total_harga_barang_jual) AS totaljual FROM tb_penjualan ORDER BY tanggal_transaksi ASC"; 
                    }
                    ?>
                    <?php
                    $no=1;
                    $query=mysqli_query($koneksi,$data);
                    while($row=mysqli_fetch_array($query)){
                        //Query tb_penjualan
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
                    <tr>
                        <td><?php echo "$no" ?></td>
                        <td><?php echo "$tanggal_transaksi" ?></td>
                        <td><?php echo "$kode_transaksi" ?></td>
                        <td><?php echo "$nama_barang" ?></td>
                        <td><?php echo "$jenis_barang" ?></td>
                        <td><?php echo "Rp. ". number_format($harga_barang_modal, 2, ".", ",");?></td> 
                        <td><?php echo "Rp. ". number_format($harga_barang_jual, 2, ".", ",");?></td> 
                        <td><?php echo "$qty" ?></td>
                        <td><?php echo "Rp. ". number_format($total_harga_barang_modal, 2, ".", ",");?></td> 
                        <td><?php echo "Rp. ". number_format($total_harga_barang_jual, 2, ".", ",");?></td> 
                    </tr>
                    <?php 
                    $no++;
                    }
                    ?>
                    </table>
                    <div class="footer-layout">
                        <br>
                        <?php
                        $querytotal=mysqli_query($koneksi,$total);
                        while($rowtotal=mysqli_fetch_array($querytotal))
                        {
                            $totalmodal=$rowtotal["totalmodal"];
                            $totaljual=$rowtotal["totaljual"];
                        ?>
                            <p >Total Harga Barang Modal : <?php echo "Rp. ". number_format($totalmodal, 2, ".", ",");?></p> 
                            <p >Total Harga Barang Jual  : <?php echo "Rp. ". number_format($totaljual, 2, ".", ",");?></p> 
                        <?php
                        }
                        ?>
                        <br>
                        <br>
                        <p >Padang, <?php $tgl=date("Y/m/d"); echo"$tgl" ?></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>(..............................)</p>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>

</body>
</html>