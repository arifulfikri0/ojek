-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 07:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nm_driver` varchar(45) DEFAULT NULL,
  `email_driver` varchar(45) DEFAULT NULL,
  `password_driver` varchar(45) DEFAULT NULL,
  `nohp_driver` varchar(45) DEFAULT NULL,
  `jenkel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nm_driver`, `email_driver`, `password_driver`, `nohp_driver`, `jenkel`) VALUES
(0, 'Rian', 'rian@gmail.com', '1234', '08', 'Laki - Laki'),
(1, 'Tesss', 'asdas', 'dd', '08956', 'L'),
(2, 'Randy', 'randy@gmail.com', '123', '08238192191', 'Laki - Laki');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `pemesanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama`, `tanggal`, `pemesanan_id`) VALUES
(0, 'Taufik Hidayat', '2018-07-15', 4),
(2, 'Taufik Hidayat', '2018-07-15', 4),
(4, 'Taufik Hidayat', '2018-07-15', 88);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `alamat_jemput` varchar(45) DEFAULT NULL,
  `tujuan` varchar(45) DEFAULT NULL,
  `driver_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `email`, `alamat_jemput`, `tujuan`, `driver_id`, `user_id`) VALUES
(0, 'Taufik Hidayat', 'ariful@yahoo.com', 'Sawah Padang, Payakumbuh City, West Sumatra, ', 'Parik Rantang, Payakumbuh City, West Sumatra,', 0, 0),
(1, 'gsdk', 'rwa', 'fas', NULL, 1, 0),
(4, 'Ariful Fikri', 'ariful@yahoo.com', 'Australia', 'Balai Nan Duo, Payakumbuh City, West Sumatra,', 0, 0),
(5, 'Ariful Fikri', 'ariful@yahoo.com', 'Ibuh, Payakumbuh City, West Sumatra, Indonesi', 'Sawah Padang, Payakumbuh City, West Sumatra, ', 0, 0),
(9, 'Taufik Hidayat', 'ariful@yahoo.com', 'Italy', 'French Polynesia', 0, 0),
(22, 'Ariful Fikri', 'ariful@yahoo.com', 'France', 'FL, USA', 0, 0),
(88, 'Taufik Hidayat', 'taufik@a.a', 'Sawahlunto, West Sumatra, Indonesia', 'West Java, Indonesia', 0, 0),
(123, 'Ariful Fikri', 'ariful@yahoo.com', 'Parik Rantang, Payakumbuh City, West Sumatra,', 'Balai Nan Duo, Payakumbuh City, West Sumatra,', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `nohp_user` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nm_user`, `email_user`, `password_user`, `nohp_user`) VALUES
(1, 'Ariful Fikri', 'ariful@yahoo.com', '12345', '081238012902'),
(2, 'Taufik Hidayat', 'dayat_taufik@gmail.com', '0987', '082219910481'),
(3, 'Bima Syukria', 'bima@gmail.com', '11111', '081234567890'),
(4, 'Ariful', 'ariful@yahoo.com', '55555', '081239123710'),
(5, 'Testing', 'test@a.a', '12345', '08123899123'),
(6, 'Tess', 'test@a.a', '12345', '0812371238'),
(7, 'Tess', 'test@a.a', '', '0812371238'),
(9, 'Coba', 'coba@c.c', '1', '08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_pemesanan1_idx` (`pemesanan_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pemesanan_driver1_idx` (`driver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pemesanan1` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_driver1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id_driver`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
