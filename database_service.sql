
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2013 at 05:29 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a6487468_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ttr` varchar(30) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `nama_konsumen` varchar(60) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `merek` text,
  `model` varchar(30) DEFAULT NULL,
  `serial_number` varchar(40) DEFAULT NULL,
  `status_barang` varchar(20) DEFAULT NULL,
  `status_perbaikan` varchar(30) DEFAULT NULL,
  `kelengkapan` text,
  PRIMARY KEY (`ttr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` VALUES('KJKT150513001', 1, 'Rendy Utama', '2013-05-16', 'CANON', 'Camera', '4343GH44343', 'NON GARANSI', 'BARU DITERIMA', 'Kabel Data');
INSERT INTO `service` VALUES('KBDG130513005', 1, 'Ariel Noah', '2013-05-13', 'SONY', 'Pocket', 'PO788826', 'GAR0190', 'BARU DITERIMA', 'Batere, Memori');
INSERT INTO `service` VALUES('KBGR220513010', 1, 'Dabelyu Kamera', '2013-05-22', 'NIKON', 'Flash', 'NIK0987', 'NON GARANSI', 'DALAM PENGECEKAN', 'Flash, Batere');
INSERT INTO `service` VALUES('TCZM080513012', 1, 'Toko Camzone', '2013-05-08', 'CANON', '60D', 'CAN2320', 'DS78662', 'BARU DITERIMA', 'Kamera, Strap, Batere, Memori, Lensa kit 18-55mm');
INSERT INTO `service` VALUES('0', 0, '0', '0000-00-00', '0', '0', '0', '0', '0', '0');
INSERT INTO `service` VALUES('KBKS170513001', 1, 'Adhit Fotografi', '2013-05-17', 'NIKON', 'D3200', 'NIK9027', 'AN8899', 'BARU DITERIMA', 'Body, Batere, Memori, Strap');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama_user` varchar(60) DEFAULT NULL,
  `alamat_user` text,
  `telepon_user` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'admin', 'admin', 'Andika', 'Jl.Depok Raya No.5', '08988450694');
