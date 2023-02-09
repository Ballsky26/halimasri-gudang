-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2022 at 04:04 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halimasr_db_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(110) NOT NULL,
  `pic` varchar(110) NOT NULL,
  `telp` varchar(110) NOT NULL,
  `alamat` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `nama`, `jenis`, `pic`, `telp`, `alamat`) VALUES
(1, 'andi', 'Perseroan', 'restiel', '081255555674', 'wiradesa'),
(2, 'danis', 'Perseroan', 'dns', '08567855564', 'wiradesa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `nama_jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `nama_jenis_barang`) VALUES
(2, 'Tekstil'),
(5, 'Meter'),
(6, 'Kodi');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`) VALUES
(8, 'kain'),
(9, 'Sandang');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(110) NOT NULL,
  `pic` varchar(110) NOT NULL,
  `telp` varchar(110) NOT NULL,
  `alamat` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `jenis`, `pic`, `telp`, `alamat`) VALUES
(1, 'achmad', 'Perseroan', 'shin', '0822915555', 'tirto'),
(2, 'iqbal', 'Perorangan', 'ballsky', '081236999978', 'gajamada barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `volume` varchar(110) NOT NULL,
  `kd_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama`, `jenis`, `volume`, `kd_barang`) VALUES
(5, 'daster', 'Sandang', 'Lembar', 'BAR-619888'),
(18, 'viskos', 'kain', 'Meter', 'BAR-158465'),
(20, 'sarung pantai', 'Tekstil', 'kain', 'BAR-390346');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(110) NOT NULL,
  `username` varchar(111) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `grup` varchar(111) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `nama`, `grup`, `password`) VALUES
(1, 'admin@test.com', 'Administrator', 'Admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'pemilik@gmail.com', 'hajrah', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'viewer@viewer.com', 'viewer', 'Viewer', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `id_mitra` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `value` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL DEFAULT 'dist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_barang`, `id_mitra`, `id_admin`, `tanggal`, `value`, `tipe`) VALUES
(1, '2', '1', '1', '2022-06-18 12:55:47', 6, 'sup'),
(2, '3', '2', '1', '2022-06-18 12:56:32', 100, 'sup'),
(3, '2', '1', '1', '2022-06-18 12:57:00', 10, 'sup'),
(4, '3', '2', '1', '2022-06-18 12:57:23', -50, 'dist'),
(5, '5', '1', '1', '2022-06-18 13:08:03', 100, 'sup'),
(6, '5', '2', '1', '2022-06-18 13:09:18', -50, 'dist'),
(7, '2', '2', '1', '2022-06-18 13:09:18', -3, 'dist'),
(8, '7', '1', '1', '2022-06-19 03:26:53', 2500, 'sup'),
(9, '7', '1', '1', '2022-06-19 03:27:19', -1000, 'dist'),
(10, '7', '1', '1', '2022-06-19 14:02:12', -250, 'dist'),
(11, '7', '2', '1', '2022-06-23 11:39:26', -500, 'dist'),
(12, '7', '1', '1', '2022-06-23 11:41:10', 1000, 'sup'),
(13, '5', '1', '1', '2022-06-23 11:41:10', 200, 'sup'),
(14, '2', '1', '1', '2022-06-23 11:41:10', 50, 'sup'),
(15, '3', '1', '1', '2022-06-23 11:41:10', 20, 'sup'),
(16, '3', '2', '1', '2022-06-24 06:01:09', -2, 'dist'),
(17, '3', '2', '1', '2022-06-24 06:02:20', 10, 'sup'),
(18, '3', '2', '1', '2022-06-24 06:03:27', 0, 'dist'),
(19, '3', '2', '1', '2022-06-24 06:08:23', 10, 'sup'),
(20, '3', '2', '1', '2022-06-24 08:54:40', -100, 'dist'),
(21, '3', '1', '1', '2022-06-28 10:58:14', -1, 'dist'),
(22, '3', '2', '1', '2022-06-28 11:09:00', 20, 'sup'),
(23, '2', '2', '1', '2022-06-28 11:10:42', -69, 'dist'),
(24, '2', '2', '1', '2022-06-28 11:10:42', -69, 'dist'),
(25, '3', '2', '1', '2022-07-03 02:19:21', -8, 'dist'),
(26, '5', '2', '1', '2022-07-03 05:36:07', 100, 'sup'),
(27, '13', '2', '1', '2022-07-03 09:23:25', 20, 'sup'),
(28, '5', '2', '1', '2022-07-03 09:35:10', 3, 'sup'),
(29, '14', '1', '1', '2022-07-03 09:38:03', 30, 'sup'),
(30, '13', '2', '1', '2022-07-05 03:23:28', 0, 'sup'),
(31, '16', '2', '1', '2022-07-10 10:46:32', 16, 'sup'),
(32, '5', '2', '1', '2022-07-10 10:48:00', -100, 'dist'),
(33, '16', '2', '1', '2022-07-14 04:08:55', 10, 'sup'),
(34, '16', '2', '1', '2022-07-14 04:09:46', -12, 'dist'),
(35, '16', '2', '1', '2022-07-14 04:14:24', -14, 'dist'),
(36, '5', '1', '1', '2022-07-14 05:37:07', 0, 'sup'),
(37, '18', '2', '1', '2022-07-14 05:40:31', 100, 'sup'),
(38, '19', '1', '1', '2022-07-14 05:41:39', 0, 'sup'),
(39, '5', '2', '1', '2022-07-14 05:42:24', 0, 'dist'),
(40, '18', '2', '1', '2022-07-14 05:43:43', -10, 'dist'),
(41, '5', '2', '1', '2022-07-14 05:44:10', -15, 'dist'),
(42, '20', '2', '1', '2022-07-14 05:45:23', 10, 'sup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
