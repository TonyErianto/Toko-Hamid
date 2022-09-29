-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 01:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_hamid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_barang_modal` int(11) NOT NULL,
  `harga_barang_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `jenis_barang`, `stok`, `harga_barang_modal`, `harga_barang_jual`) VALUES
('001', 'Kasur', 'Tempat Tidur', 17, 900000, 1200000),
('002', 'Ranjang Tidur', 'Tempat Tidur', 12, 5000000, 6000000),
('003', 'Ranjang Tidur Tingkat', 'Tempat Tidur', 8, 900000, 1100000),
('004', 'Ranjang Tidur Bayi', 'Tempat Tidur', 10, 700000, 850000),
('005', 'Lemari Pakaian', 'Lemari', 10, 1000000, 1200000),
('006', 'Lemari Buku (RAK)', 'Lemari', 12, 500000, 700000),
('007', 'Lemari Dokumen (RAK)', 'Lemari', 15, 600000, 750000),
('008', 'Lemari Piring (RAK)', 'Lemari', 10, 700000, 850000),
('009', 'Meja Belajar', 'Meja', 10, 600000, 750000),
('010', 'Meja Kantor', 'Meja', 20, 500000, 700000),
('011', 'Meja Makan', 'Meja', 10, 800000, 900000),
('012', 'Kursi Makan', 'Kursi', 10, 150000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_beban`
--

CREATE TABLE `tb_beban` (
  `kode_beban` varchar(100) NOT NULL,
  `nama_beban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_beban`
--

INSERT INTO `tb_beban` (`kode_beban`, `nama_beban`) VALUES
('1', 'Gaji Karyawan'),
('2', 'Listrik Ruko'),
('3', 'Internet Ruko'),
('4', 'Air PDAM'),
('5', 'Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_beban`
--

CREATE TABLE `tb_data_beban` (
  `tanggal_transaksi` date NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `kode_beban` varchar(100) NOT NULL,
  `nama_beban` varchar(100) NOT NULL,
  `harga_beban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_beban`
--

INSERT INTO `tb_data_beban` (`tanggal_transaksi`, `kode_transaksi`, `kode_beban`, `nama_beban`, `harga_beban`) VALUES
('2020-12-02', '001', '1', 'Gaji Karyawan', 1200000),
('2020-12-02', '002', '2', 'Listrik Ruko', 500000),
('2020-12-02', '003', '3', 'Internet Ruko', 300000),
('2020-12-02', '004', '4', 'Air PDAM', 150000),
('2020-12-02', '005', '5', 'Perlengkapan', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `kata_sandi` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `tingkat_pengguna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `kata_sandi`, `nama_lengkap`, `tingkat_pengguna`) VALUES
(1, 'tony', '12345', 'Tony Erianto', 'admin'),
(2, 'pimpinan', 'pimpinan', 'Toko Hamid Furniture Pada', 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `tanggal_transaksi` date NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `harga_barang_modal` int(11) NOT NULL,
  `harga_barang_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga_barang_modal` int(11) NOT NULL,
  `total_harga_barang_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`tanggal_transaksi`, `kode_transaksi`, `kode_barang`, `nama_barang`, `jenis_barang`, `harga_barang_modal`, `harga_barang_jual`, `qty`, `total_harga_barang_modal`, `total_harga_barang_jual`) VALUES
('2020-12-01', '001', '001', 'Kasur', 'Tempat Tidur', 900000, 1200000, 3, 2700000, 3600000),
('2020-12-01', '002', '002', 'Ranjang Tidur', 'Tempat Tidur', 5000000, 6000000, 3, 15000000, 18000000),
('2020-12-01', '003', '003', 'Ranjang Tidur Tingkat', 'Tempat Tidur', 900000, 1100000, 2, 1800000, 2200000),
('2020-12-01', '004', '004', 'Ranjang Tidur Bayi', 'Tempat Tidur', 700000, 850000, 2, 1400000, 1700000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_beban`
--
ALTER TABLE `tb_beban`
  ADD PRIMARY KEY (`kode_beban`);

--
-- Indexes for table `tb_data_beban`
--
ALTER TABLE `tb_data_beban`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
