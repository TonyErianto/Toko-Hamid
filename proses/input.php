<?php
    include '../koneksi/index.php';

    //Login

    //Barang
        if(isset($_POST['inputbarang'])){
            $kode_barang = $_POST["kode_barang"];
            $nama_barang = $_POST["nama_barang"];
            $jenis_barang = $_POST["jenis_barang"];
            $stok = $_POST["stok"];
            $harga_barang_modal = $_POST["harga_barang_modal"];
            $harga_barang_jual = $_POST["harga_barang_jual"];
            $data = "INSERT INTO tb_barang VALUES('$kode_barang','$nama_barang','$jenis_barang','$stok','$harga_barang_modal',' $harga_barang_jual')";
            $query = mysqli_query($koneksi,$data);

            if(!$query){
                echo "<script>alert('Input Barang Gagal Masuk Ke Database')
                     document.location.href='../inputbarang/';</script>";
            }
            else{
                echo "<script>alert('Input Barang Berhasil Masuk Ke Database')
                      document.location.href='../penginputan/';</script>";
            }
        }
    
        // Beban
        if(isset($_POST['inputbeban'])){
            $kode_beban = $_POST["kode_beban"];
            $nama_beban = $_POST["nama_beban"];
            $data = "INSERT INTO tb_beban VALUES('$kode_beban','$nama_beban')";
            $query = mysqli_query($koneksi,$data);
            if(!$query){
                echo "<script>alert('Input Barang Gagal Masuk Ke Database')
                      document.location.href='../inputbeban/';</script>";
            }
            else{
                echo "<script>alert('Input Barang Berhasil Masuk Ke Database')
                      document.location.href='../penginputanbeban/';</script>";
            }
        }

    //Penjualan
        if(isset($_POST['inputpenjualan'])){
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
            //-------------- ambil data dari barang---
            $databarang="SELECT * FROM tb_barang WHERE kode_barang='$kode_barang'";
            $querybarang=mysqli_query($koneksi,$databarang);
            $row=mysqli_fetch_array($querybarang);
            $stok=$row["stok"];
            $jumlahstock=$stok-$qty;

            if($stok < $qty){
                echo "<script>alert('Jumlah Penjualan Barang Melebihi Stok Barang, Stok Barang Tidak Mencukupi')
                      document.location.href='../inputpenjualan/';</script>";
            }
            else{
                $data = "INSERT INTO tb_penjualan VALUES('$tanggal_transaksi','$kode_transaksi','$kode_barang','$nama_barang','$jenis_barang','$harga_barang_modal',' $harga_barang_jual','$qty','$total_harga_barang_modal','$total_harga_barang_jual')";
                $query = mysqli_query($koneksi,$data);
                if($query){
                    $datasisabarang="UPDATE tb_barang SET stok='$jumlahstock' WHERE kode_barang='$kode_barang'";
                    $querysisabarang = mysqli_query($koneksi,$datasisabarang);
                    echo "<script>alert('Input Barang Berhasil Masuk Ke Database')
                     document.location.href='../penjualan/';</script>";
                }
                else{
                    echo "<script>alert('Input Barang Gagal Masuk Ke Database')
                    document.location.href='../inputpenjualan/';</script>";
                }
            }
        }

    // Data Beban
        if(isset($_POST['inputdatabeban'])){
            $tanggal_transaksi=$_POST["tanggal_transaksi"];
            $kode_transaksi = $_POST["kode_transaksi"];
            $kode_beban = $_POST["kode_beban"];
            $nama_beban = $_POST["nama_beban"];
            $harga_beban= $_POST["harga_beban"];
            $data = "INSERT INTO tb_data_beban VALUES('$tanggal_transaksi','$kode_transaksi','$kode_beban','$nama_beban','$harga_beban')";
            $query = mysqli_query($koneksi,$data);
            if(!$query){
                echo "<script>alert('Input Barang Gagal Masuk Ke Database')
                      document.location.href='../inputdatabeban/';</script>";
            }
            else{
                echo "<script>alert('Input Barang Berhasil Masuk Ke Database')
                     document.location.href='../databeban/';</script>";
            }
        }

?>