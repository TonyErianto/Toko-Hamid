<?php
 include '../../koneksi/index.php';
 require_once __DIR__ . '/../../mpdf/vendor/autoload.php';
 $mpdf = new \Mpdf\Mpdf();
 ob_start();
?>
<?php
session_start();
if($_SESSION['status']!="login"){
    echo "<script>alert('Silahkan Masuk Terlebih Dahulu !')
    document.location.href='../../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Laporan Beban Tahun <?php echo  date('M-Y', strtotime($_GET["tahunini"])) ?> - Toko Hamid Furniture Padang</title>
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
                    <h3 style="text-align:center">Toko Hamid Furniture Padang</h3>
                    <p style="text-align:center">Laporan Beban Tahunan</p>
                    <p style="text-align:center">Tahun : <?php echo  date('M-Y', strtotime($_GET["tahunini"])) ?></p>
                    <hr>
                     <?php
                        $tahunini=$_GET['tahunini'];
                        $totalgaji  = "SELECT SUM(harga_beban) AS hargagaji FROM tb_data_beban WHERE nama_beban='Gaji Karyawan' AND tanggal_transaksi LIKE '%$tahunini%'";
                        $totallistrik = "SELECT SUM(harga_beban) AS hargalistrik FROM tb_data_beban WHERE nama_beban='Listrik Ruko' AND tanggal_transaksi LIKE '%$tahunini%'";
                        $totalinternet = "SELECT SUM(harga_beban) AS hargainternet FROM tb_data_beban WHERE nama_beban='Internet Ruko' AND tanggal_transaksi LIKE '%$tahunini%'";
                        $totalair = "SELECT SUM(harga_beban) AS hargaair FROM tb_data_beban WHERE nama_beban='Air PDAM' AND tanggal_transaksi LIKE '%$tahunini%'";
                        $totalperlengkapan = "SELECT SUM(harga_beban) AS hargaperlengkapan FROM tb_data_beban WHERE nama_beban='Perlengkapan' AND tanggal_transaksi LIKE '%$tahunini%'";
                        $totalperbaikan = "SELECT SUM(harga_beban) AS hargaperbaikan FROM tb_data_beban WHERE nama_beban='Perbaikan' AND tanggal_transaksi LIKE '%$tahunini%'";
                        $totalbeban= "SELECT SUM(harga_beban) AS hargabeban FROM tb_data_beban WHERE tanggal_transaksi LIKE'%$tahunini%'";
                    ?>
                    <table>
                        <tr>
                            <th>Beban Operasional</th>
                        </tr>
                        <?php
                        $querygaji=mysqli_query($koneksi,$totalgaji);
                        while($row=mysqli_fetch_array($querygaji))
                        {
                            $hargagaji=$row["hargagaji"]
                        ?>
                        <tr>
                            <td>Gaji Karyawan : <?php echo "Rp. ". number_format($hargagaji, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $querylistrik=mysqli_query($koneksi,$totallistrik);
                        while($row=mysqli_fetch_array($querylistrik))
                        {
                            $hargalistrik=$row["hargalistrik"]
                        ?>
                        <tr>
                            <td>Listrik Ruko : <?php echo "Rp. ". number_format($hargalistrik, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $queryinternet=mysqli_query($koneksi,$totalinternet);
                        while($row=mysqli_fetch_array($queryinternet))
                        {
                            $hargainternet=$row["hargainternet"]
                        ?>
                        <tr>
                            <td>Internet Ruko : <?php echo "Rp. ". number_format($hargainternet, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $queryair=mysqli_query($koneksi,$totalair);
                        while($row=mysqli_fetch_array($queryair))
                        {
                            $hargaair=$row["hargaair"]
                        ?>
                        <tr>
                            <td>Air PDAM : <?php echo "Rp. ". number_format($hargaair, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $queryperlengkapan=mysqli_query($koneksi,$totalperlengkapan);
                        while($row=mysqli_fetch_array($queryperlengkapan))
                        {
                            $hargaperlengkapan=$row["hargaperlengkapan"]
                        ?>
                        <tr>
                            <td>Perlengkapan : <?php echo "Rp. ". number_format($hargaperlengkapan, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        }
                        ?>
                         <?php
                        $queryperbaikan=mysqli_query($koneksi,$totalperbaikan);
                        while($row=mysqli_fetch_array($queryperbaikan))
                        {
                            $hargaperbaikan=$row["hargaperbaikan"]
                        ?>
                        <tr>
                            <td>Perbaikan : <?php echo "Rp. ". number_format($hargaperbaikan, 2, ".", ",");?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $querytotalbeban=mysqli_query($koneksi,$totalbeban);
                        while($row=mysqli_fetch_array($querytotalbeban))
                        {
                            $hargabeban=$row["hargabeban"]
                        ?>
                        <tr>
                            <th style="text-align:right;font-weight:normal;padding:10px;font-size:13px">Total Beban Operasional Perbulan : <?php echo "Rp. ". number_format($hargabeban, 2, ".", ",");?></th>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="footer-layout">
                        <p >Padang, <?php $tgl=date("Y/m/d"); echo"$tgl" ?></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>(..............................)</p>
                    </div>
</body>
</html>
<?php
$filename="Laporan Beban - Tahun ".$_GET["tahunini"].".pdf";
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML("$html");
$mpdf->Output("$filename",'I');
?>