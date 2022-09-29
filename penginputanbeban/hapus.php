<?php
    include '../koneksi/index.php';
        $kode_beban = $_GET["kode_beban"];
        $data = "DELETE FROM  tb_beban WHERE kode_beban='$kode_beban'";
        $query = mysqli_query($koneksi,$data);
        if(!$query){
            echo "<script>alert('Data Penjualan Gagal Di Hapus')
                  document.location.href='../penginputanbeban/';</script>";
        }
        else{
            echo "<script>alert('Data Penjualan Berhasil Di Hapus')
                 document.location.href='../penginputanbeban/';</script>";
    }
?>