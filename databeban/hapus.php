<?php
    include '../koneksi/index.php';
        $kode_transaksi = $_GET["kode_transaksi"];
        $data = "DELETE FROM  tb_data_beban WHERE kode_transaksi='$kode_transaksi'";
        $query = mysqli_query($koneksi,$data);
        if(!$query){
            echo "<script>alert('Data Penjualan Gagal Di Hapus')
                  document.location.href='../databeban/';</script>";
        }
        else{
            echo "<script>alert('Data Penjualan Berhasil Di Hapus')
                 document.location.href='../databeban/';</script>";
    }
?>