<?php
    include '../koneksi/index.php';        
        $kode_barang = $_GET["kode_barang"];
        $data = "DELETE FROM  tb_barang WHERE kode_barang='$kode_barang'";
        $query = mysqli_query($koneksi,$data);
        if(!$query){
            echo "<script>alert('Data Penjualan Gagal Di Hapus')
                  document.location.href='../penginputan/';</script>";
        }
        else{
            echo "<script>alert('Data Penjualan Berhasil Di Hapus')
                 document.location.href='../penginputan/';</script>";
    }
?>