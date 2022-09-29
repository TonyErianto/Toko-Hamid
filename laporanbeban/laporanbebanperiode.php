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
    <title>Laporan Beban Periode - Toko Hamid Furniture Padang</title>
</head>
<style>
    hr{
        border:1px solid black;
    }
    table{
        width:95%;
        border-collapse: collapse;
        margin:auto;
    }
    table th{
        padding:15px;
        border:1px solid black;
        font-size:15px;
        background-color:#0084ff;
        color:#ffffff;
        text-align:center;
    }
    table td{
        text-align:left;
        padding:10px;
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
                     $tanggalawal="";
                     $tanggalakhir="";
                    if (isset($_GET["bebanperiode"])){
                        $tanggalawal=$_GET["tanggalawal"];
                        $tanggalakhir=$_GET["tanggalakhir"];
                    }
                    ?>
                    <div class="header-layout">
                        <div class="filter-layout">
                            <form action="" method="GET">
                            <input type="date" value="<?php echo $tanggalawal ?>" name="tanggalawal">
                            <input type="date" value="<?php echo $tanggalakhir ?>" name="tanggalakhir">
                            <input type="submit" name="bebanperiode" value="Filter">
                            </form>
                        </div>
                        <div class="button-exit-layout">
                            <a href="../laporanbeban/cetaklaporanbebanperiode.php?tanggalawal=<?php echo "$tanggalawal"?>&tanggalakhir=<?php echo "$tanggalakhir"?>">Cetak</a>
                            <a href="../laporanbeban/">Kembali</a>
                        </div>
                    </div>
                    <center>
                    <hr>
                    <br>
                    <h3>Toko Hamid Furniture Padang</h3>
                    <p>Laporan Beban Periode</p>
                    <p style="text-align:center">Tanggal : <?php echo date('d-F-Y', strtotime($tanggalawal))?> s/d Tanggal : <?php echo date('d-F-Y', strtotime($tanggalakhir)) ?></p>
                    <br>
                    <hr>
                    <br>
                     </center>
                    <?php
                     if(isset($_GET["bebanperiode"])){
                        $tanggalawal=$_GET["tanggalawal"];
                        $tanggalakhir=$_GET["tanggalakhir"];
                        $databeban  = "SELECT * FROM tb_data_beban WHERE tanggal_transaksi BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tanggal_transaksi ASC" ;
                        $totalbeban= "SELECT SUM(harga_beban) AS hargabeban FROM tb_data_beban WHERE tanggal_transaksi BETWEEN '$tanggalawal' AND '$tanggalakhir'";
                    }
                    else{
                        $databeban  = "SELECT * FROM tb_data_beban";
                        $totalbeban= "SELECT SUM(harga_beban) AS hargabeban FROM tb_data_beban";
                    }
                    ?>
                    <table>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:20%;">Tanggal Transaksi</th>
                            <th>Nama Beban</th>
                            <th>Harga</th>
                        </tr>
                        <?php
                        $no=1;
                        $querybeban=mysqli_query($koneksi,$databeban);
                        while($row=mysqli_fetch_array($querybeban)){
                            $tanggal_transaksi=$row["tanggal_transaksi"];
                            $nama_beban=$row["nama_beban"];
                            $harga_beban=$row["harga_beban"];
                        ?>
                        <tr>
                            <td><?php echo "$no"; ?></td>
                            <td><?php echo  date('d-F-Y', strtotime($tanggal_transaksi))?></td>
                            <td><?php echo "$nama_beban"; ?></td>
                            <td><?php echo "Rp. ". number_format($harga_beban, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        $no++;    
                        }
                        ?>
                        <?php
                        $querytotalbeban=mysqli_query($koneksi,$totalbeban);
                        while($row=mysqli_fetch_array($querytotalbeban))
                        {
                            $hargabeban=$row["hargabeban"]
                        ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="width:30%;text-align:right;font-weight:normal;padding:10px;font-size:13px">Total Beban Operasional Perbulan : <?php echo "Rp. ". number_format($hargabeban, 2, ".", ",");?></th>
                        </tr>
                     <?php
                        }
                        ?>
                    </table>
                    <div class="footer-layout">
                        <br>
                        <br>
                        <br>
                        <p >Padang, <?php $tgl=date("d/F/Y"); echo"$tgl" ?></p>
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