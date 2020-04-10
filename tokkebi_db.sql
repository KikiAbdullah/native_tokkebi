-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 09:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokkebi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mitra`
--

CREATE TABLE `admin_mitra` (
  `ID_ADMIN_MITRA` int(11) NOT NULL,
  `ID_MITRA` int(11) DEFAULT NULL,
  `NAMA_ADMIN_MITRA` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TELP` varchar(20) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_mitra`
--

INSERT INTO `admin_mitra` (`ID_ADMIN_MITRA`, `ID_MITRA`, `NAMA_ADMIN_MITRA`, `EMAIL`, `TELP`, `USERNAME`, `PASSWORD`) VALUES
(1, 1, 'Bagus Kurrrrr', '', '', 'bagus', '123'),
(2, 2, 'Budi', '', '', 'budi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pusat`
--

CREATE TABLE `admin_pusat` (
  `ID_ADMIN_PUSAT` int(11) NOT NULL,
  `NAMA_ADMIN_PUSAT` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TELP` varchar(20) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_pusat`
--

INSERT INTO `admin_pusat` (`ID_ADMIN_PUSAT`, `NAMA_ADMIN_PUSAT`, `EMAIL`, `TELP`, `USERNAME`, `PASSWORD`) VALUES
(1, 'kiki', '', '', 'kiki', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `ID_BAHAN_BAKU` int(11) NOT NULL,
  `ID_GUDANG` int(11) DEFAULT NULL,
  `NAMA_BAHAN` varchar(100) DEFAULT NULL,
  `SATUAN` varchar(100) DEFAULT NULL,
  `HARGA` float DEFAULT NULL,
  `BIAYA_TAMBAHAN` float DEFAULT NULL,
  `MARGIN` float DEFAULT NULL,
  `HARGA_JUAL` float DEFAULT NULL,
  `STOK_AWAL` decimal(10,0) DEFAULT NULL,
  `BARANG_MASUK` decimal(10,0) DEFAULT NULL,
  `BARANG_RUSAK` decimal(10,0) DEFAULT NULL,
  `BARANG_KELUAR` decimal(10,0) DEFAULT NULL,
  `SISA_STOK` decimal(10,0) DEFAULT NULL,
  `NILAI` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`ID_BAHAN_BAKU`, `ID_GUDANG`, `NAMA_BAHAN`, `SATUAN`, `HARGA`, `BIAYA_TAMBAHAN`, `MARGIN`, `HARGA_JUAL`, `STOK_AWAL`, `BARANG_MASUK`, `BARANG_RUSAK`, `BARANG_KELUAR`, `SISA_STOK`, `NILAI`) VALUES
(1, 1, 'Sosis Besar', 'kg', 59000, 1000, 2000, 59000, '18', '0', '0', '12', '1', 7139000),
(2, 1, 'Sosis Kecil', 'kg', 29500, 1000, 1500, 29500, '65', '73', '0', '135', '-62', 1917500),
(3, 1, 'Mozza Balokan', 'Kg', 1025000, 0, 0, 1120000, '0', '0', '0', '0', '0', 0),
(4, 1, 'Mozza Large', 'Kg', 102500, 1200, 8300, 112000, '39', '46', '0', '91', '-45', 4725250),
(5, 1, 'Mozza Medium ', 'Kg', 102500, 1200, 8300, 112000, '22', '22', '0', '6', '16', 1895220),
(6, 1, 'Kentang Potongan', 'Kg', 21100, 1000, 1900, 24000, '0', '0', '0', '0', '0', 0),
(7, 1, 'Kentang Tidak Potongan', 'Kg', 21100, 1000, 400, 22500, '158', '223', '0', '0', '223', 4705300),
(8, 1, 'Tepung Jadi', 'Kg', 18000, 750, 8050, 26800, '125', '0', '0', '70', '46', 1044000),
(9, 1, 'Bibit Tepung', 'pcs', 0, 0, 0, 0, '62', '62', '0', '0', '62', 0),
(10, 1, 'Saus Sambel kg', 'Kg', 17561, 0, 439, 18000, '13', '63', '0', '0', '63', 1106340),
(11, 1, 'Saus Sambel kg (krt) ', 'karton', 175610, 0, 0, 180000, '0', '5', '0', '13', '8', 1404880),
(12, 1, 'Saus tomat kg', 'Kg', 12870, 0, 130, 13000, '11', '171', '0', '0', '171', 2200770),
(13, 1, 'Saus Tomat kg (krt)', 'karton', 128700, 0, 0, 130000, '16', '166', '0', '0', '16', 2059200),
(14, 1, 'Saus Sambal Sachet', 'pack', 5500, 0, 400, 5900, '0', '200', '0', '0', '200', 1100000),
(15, 1, 'Saus Sambal sachet (krt)', 'karton', 110000, 0, 0, 118000, '0', '10', '0', '0', '10', 1100000),
(16, 1, 'Saus Tomat sachet ', 'pack', 46620, 0, 380, 5000, '0', '200', '0', '0', '200', 924000),
(17, 1, 'Saus Tomat sachet (krt)', 'karton', 92400, 0, 0, 100000, '0', '10', '0', '0', '10', 924000),
(18, 1, 'Mayonise', 'Kg', 24585, 0, 1015, 25600, '4', '29', '0', '0', '29', 712965),
(19, 1, 'Mayonise (krt) ', 'karton', 245850, 0, 0, 256000, '2', '2', '0', '0', '2', 491700);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_masuk`
--

CREATE TABLE `bahan_masuk` (
  `ID_BAHAN_MASUK` int(11) NOT NULL,
  `ID_BAHAN_BAKU` int(11) DEFAULT NULL,
  `ID_GUDANG` int(11) DEFAULT NULL,
  `TANGGAL` date NOT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bahan_rusak`
--

CREATE TABLE `bahan_rusak` (
  `ID_BAHAN_RUSAK` int(11) NOT NULL,
  `ID_BAHAN_BAKU` int(11) DEFAULT NULL,
  `ID_GUDANG` int(11) DEFAULT NULL,
  `TANGGAL` date NOT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `ID_FAKTUR` int(11) NOT NULL,
  `ID_ADMIN_PUSAT` int(11) DEFAULT NULL,
  `ID_MITRA` int(11) DEFAULT NULL,
  `ID_BAHAN_BAKU` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `TOTAL_HARGA` float(8,2) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `BUKTI_PEMBAYARAN` varchar(100) DEFAULT NULL,
  `JAM_PESAN` time DEFAULT NULL,
  `JAM_UPLOAD` time DEFAULT NULL,
  `JAM_KONFIRMASI` time DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT 'Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`ID_FAKTUR`, `ID_ADMIN_PUSAT`, `ID_MITRA`, `ID_BAHAN_BAKU`, `QTY`, `TOTAL_HARGA`, `TANGGAL`, `BUKTI_PEMBAYARAN`, `JAM_PESAN`, `JAM_UPLOAD`, `JAM_KONFIRMASI`, `STATUS`) VALUES
(22, 1, 1, 8, 12, 321600.00, '2020-04-09', 'Capture.JPG', '00:05:28', '00:05:40', '00:05:49', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `ID_GUDANG` int(11) NOT NULL,
  `ID_ADMIN_PUSAT` int(11) DEFAULT NULL,
  `NAMA_GUDANG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`ID_GUDANG`, `ID_ADMIN_PUSAT`, `NAMA_GUDANG`) VALUES
(1, 1, 'Malang'),
(2, 1, 'Surabaya'),
(3, 1, 'Jakarta'),
(4, 1, 'Balikpapan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_KERANJANG` int(11) NOT NULL,
  `ID_MITRA` int(11) DEFAULT NULL,
  `ID_BAHAN_BAKU` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `ID_MITRA` int(11) NOT NULL,
  `ID_GUDANG` int(11) DEFAULT NULL,
  `NAMA_MITRA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`ID_MITRA`, `ID_GUDANG`, `NAMA_MITRA`) VALUES
(1, 1, 'Singosari'),
(2, 2, 'Darmo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mitra`
--
ALTER TABLE `admin_mitra`
  ADD PRIMARY KEY (`ID_ADMIN_MITRA`);

--
-- Indexes for table `admin_pusat`
--
ALTER TABLE `admin_pusat`
  ADD PRIMARY KEY (`ID_ADMIN_PUSAT`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`ID_BAHAN_BAKU`);

--
-- Indexes for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD PRIMARY KEY (`ID_BAHAN_MASUK`);

--
-- Indexes for table `bahan_rusak`
--
ALTER TABLE `bahan_rusak`
  ADD PRIMARY KEY (`ID_BAHAN_RUSAK`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`ID_FAKTUR`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`ID_GUDANG`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`ID_KERANJANG`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`ID_MITRA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_mitra`
--
ALTER TABLE `admin_mitra`
  MODIFY `ID_ADMIN_MITRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_pusat`
--
ALTER TABLE `admin_pusat`
  MODIFY `ID_ADMIN_PUSAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `ID_BAHAN_BAKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  MODIFY `ID_BAHAN_MASUK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bahan_rusak`
--
ALTER TABLE `bahan_rusak`
  MODIFY `ID_BAHAN_RUSAK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `ID_FAKTUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `ID_GUDANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `ID_KERANJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `ID_MITRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_mitra`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
