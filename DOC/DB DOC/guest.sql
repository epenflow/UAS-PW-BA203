-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 03:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id_guest` varchar(15) NOT NULL,
  `nama_guest` varchar(100) NOT NULL,
  `email_guest` varchar(100) NOT NULL,
  `telp_guest` varchar(20) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `jml_guest` smallint(2) NOT NULL,
  `jam_guest` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id_guest`, `nama_guest`, `email_guest`, `telp_guest`, `tgl_reservasi`, `jml_guest`, `jam_guest`) VALUES
('GST001', 'Yulia Restu Usada', 'aHastuti@Pradana.sch.id', '0832 9657 899', '2022-09-05', 3, '11:00 am -'),
('GST002', 'Uchita Zulfa Andriani M.TI.', 'Ihsan.Nashiruddin@Namaga.go.id', '0713 3737 3599', '2022-09-05', 5, '11:00 am -'),
('GST003', 'Irfan Karya Mansur', 'tGunarto@Napitupulu.go.id', '(+62) 336 6670 5012', '2022-09-06', 3, '08:00 am -'),
('GST004', 'Silvia Yulianti', 'Wulandari.Qori@yahoo.com', '(+62) 725 8619 7865', '2022-09-20', 5, '08:00 am -'),
('GST005', 'mos', 'mos@rmpakbagong.gmail.com', '(+62) 336 6670 5012', '2022-09-01', 5, '08:00 am -'),
('GST006', 'Mitra Rangga Megantara', 'Rika47@yahoo.com', '(+62) 20 8551 637', '2022-09-01', 5, '11:00 am -'),
('GST007', 'Mitra Rangga Megantara', 'aHastuti@Pradana.sch.id', '123', '2022-09-22', 2, '11:00 am -'),
('GST008', 'epen', 'epenflow@gmail.com', '089', '2022-09-22', 5, '08:00 am -'),
('GST009', 'agus', 'wirahadi962@gmail.com', '1231213', '2022-09-29', 5, '11:00 am -'),
('GST010', 'takasi', 'epenflow@gmail.com', '(+62) 336 6670 5012', '2022-09-29', 4, '11:00 am -'),
('GST011', 'Mitra Rangga Megantara', 'epenflow@gmail.com', '999', '2022-09-28', 5, '11:00 am -'),
('GST012', 'Mitra Rangga Megantara', 'epenflow@gmail.com', '090', '2022-09-22', 5, '08:00 am -'),
('GST013', 'takasi', 'epenflow@gmail.com', '123', '2022-09-29', 4, '08:00 am -');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id_guest`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
