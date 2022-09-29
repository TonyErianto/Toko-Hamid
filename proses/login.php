<?php
include '../koneksi/index.php';
if(isset($_POST['masuk'])){
    $username = $_POST['nama_pengguna'];
    $password = $_POST['kata_sandi'];
    $sql = "SELECT * FROM tb_pengguna WHERE nama_pengguna='$username' and kata_sandi='$password'";
    $query=mysqli_query($koneksi , $sql);
    $cek = mysqli_num_rows($query);
    if($cek > 0){
        session_start();
        $row =mysqli_fetch_array($query);
        if($row["tingkat_pengguna"]=="admin"){
            $_SESSION['id_pengguna']=$row['id_pengguna'];
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            $_SESSION['nama_pengguna'] = $username;
            $_SESSION['status'] = "login";
            echo "<script>alert('Nama Pengguna Dan Kata Sandi Sebagai Admin !')
            document.location.href='../dashboard/';</script>";
        }
        elseif($row["tingkat_pengguna"]=="pimpinan"){
                $_SESSION['id_pengguna']=$row['id_pengguna'];
                $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
                $_SESSION['nama_pengguna'] = $username;
                $_SESSION['status'] = "login";
                echo "<script>alert('Nama Pengguna Dan Kata Sandi Sebagai Pimpinan !')
                document.location.href='../pimpinan/dashboard/';</script>";
        }
        }
        else{
            echo "<script>alert('Nama Pengguna Dan Kata Sandi Tidak Sesuai !')
            document.location.href='../index.php';</script>";
        }
    }
?>