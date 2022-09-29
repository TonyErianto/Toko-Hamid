<?php
    include '../koneksi/index.php';

    //Login

    //Barang
        if(isset($_POST['ubahbarang'])){
            $kode_barang = $_POST["kode_barang"];
            $nama_barang = $_POST["nama_barang"];
            $jenis_barang = $_POST["jenis_barang"];
            $stok = $_POST["stok"];
            $harga_barang_modal = $_POST["harga_barang_modal"];
            $harga_barang_jual = $_POST["harga_barang_jual"];
            $data = "UPDATE tb_barang SET nama_barang='$nama_barang',jenis_barang='$jenis_barang',stok='$stok',harga_barang_modal='$harga_barang_modal',harga_barang_jual='$harga_barang_jual' WHERE kode_barang='$kode_barang' ";
            $query = mysqli_query($koneksi,$data);
            if(!$query){
                echo "<script>alert('Ubah Input Barang Gagal Masuk Ke Database')
                     document.location.href='../ubahbarang/';</script>";
            }
            else{
                echo "<script>alert('Ubah Input Barang Berhasil Masuk Ke Database')
                      document.location.href='../penginputan/';</script>";
            }
        }

    // Beban
        if(isset($_POST['ubahbeban'])){
            $kode_beban = $_POST["kode_beban"];
            $nama_beban = $_POST["nama_beban"];
            $data = "UPDATE tb_beban SET nama_beban='$nama_beban' WHERE kode_beban='$kode_beban'";
            $query = mysqli_query($koneksi,$data);
            if(!$query){
                echo "<script>alert('Ubah Input Barang Gagal Masuk Ke Database')
                      document.location.href='../ubahbeban/';</script>";
            }
            else{
                echo "<script>alert('Ubah Input Barang Berhasil Masuk Ke Database')
                      document.location.href='../penginputanbeban/';</script>";
            }
        }

        //Penjualan
        if(isset($_POST['ubahpenjualan'])){
            $tanggal_transaksi=$_POST["tanggal_transaksi"];
            $kode_transaksi = $_POST["kode_transaksi"];
            $kode_barang = $_POST["kode_barang"];
            $nama_barang = $_POST["nama_barang"];
            $jenis_barang = $_POST["jenis_barang"];
            $harga_barang_modal = $_POST["harga_barang_modal"];
            $harga_barang_jual = $_POST["harga_barang_jual"];
            $qty=$_POST["qty"];
            $total_harga_barang_modal=$_POST["total_harga_barang_modal"];
            $total_harga_barang_jual=$_POST["total_harga_barang_jual"];
            $data = "UPDATE tb_penjualan SET tanggal_transaksi='$tanggal_transaksi',kode_barang='$kode_barang',nama_barang='$nama_barang',nama_barang='$jenis_barang',
            harga_barang_modal='$harga_barang_modal',harga_barang_jual='$harga_barang_jual',qty='$qty',total_harga_barang_modal='$total_harga_barang_modal',total_harga_barang_jual='$total_harga_barang_jual' WHERE kode_transaksi='$kode_transaksi'";
            $query = mysqli_query($koneksi,$data);
            if(!$query){
                echo "<script>alert('Ubah Input Barang Gagal Masuk Ke Database')
                      document.location.href='../ubahpenjualan/';</script>";
            }
            else{
                echo "<script>alert('Input Barang Berhasil Masuk Ke Database')
                     document.location.href='../penjualan/';</script>";
            }
        }

    // Data Beban
        if(isset($_POST['ubahdatabeban'])){
            $tanggal_transaksi=$_POST["tanggal_transaksi"];
            $kode_transaksi = $_POST["kode_transaksi"];
            $kode_beban = $_POST["kode_beban"];
            $nama_beban = $_POST["nama_beban"];
            $harga_beban= $_POST["harga_beban"];
            $data = "UPDATE tb_data_beban SET tanggal_transaksi='$tanggal_transaksi',kode_beban='$kode_beban',
            nama_beban='$nama_beban',harga_beban='$harga_beban' WHERE kode_transaksi='$kode_transaksi'";
            $query = mysqli_query($koneksi,$data);
            if(!$query){
                echo "<script>alert('Ubah Input Barang Gagal Masuk Ke Database')
                      document.location.href='../ubahdatabeban/';</script>";
            }
            else{
                echo "<script>alert('Ubah Input Barang Berhasil Masuk Ke Database')
                     document.location.href='../databeban/';</script>";
            }
        }
?>