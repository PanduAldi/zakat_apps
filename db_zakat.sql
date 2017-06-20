-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2016 at 09:02 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `mustahiq`
--

CREATE TABLE IF NOT EXISTS `mustahiq` (
`id_mustahiq` int(11) NOT NULL,
  `mustahiq` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mustahiq`
--

INSERT INTO `mustahiq` (`id_mustahiq`, `mustahiq`, `keterangan`) VALUES
(4, 'Pandu Aldi', 'Kaum Dhuafa'),
(5, 'abcd', 'fakir');

-- --------------------------------------------------------

--
-- Table structure for table `muzaki`
--

CREATE TABLE IF NOT EXISTS `muzaki` (
  `id_muzaki` int(11) NOT NULL,
  `nama_muzaki` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muzaki`
--

INSERT INTO `muzaki` (`id_muzaki`, `nama_muzaki`) VALUES
(1, 'Pandu Aldi Pratama'),
(2, 'Okta febrian'),
(3, 'Pandu'),
(4, 'bambang kurniawan'),
(7, 'askkajsk'),
(8, 'kakjskaj'),
(9, 'kajsklasioj2maso'),
(10, 'lakskokk'),
(11, 'kajskdpqoiwl'),
(12, 'alaskjl'),
(13, 'asqieooi'),
(14, 'kasjkpw'),
(15, 'laskijaskaskj'),
(24, 'P'),
(25, 'waktunya'),
(26, 'c'),
(27, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
`id_periode` int(11) NOT NULL,
  `periode` varchar(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`) VALUES
(1, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE IF NOT EXISTS `server` (
`id_server` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `mulai` datetime NOT NULL,
  `akhir` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id_server`, `status`, `mulai`, `akhir`) VALUES
(1, '1', '2016-06-28 17:39:10', '2016-06-30 19:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_muzaki` int(11) NOT NULL,
  `id_zakat` int(11) NOT NULL,
  `nominal` float NOT NULL,
  `id_periode` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_muzaki`, `id_zakat`, `nominal`, `id_periode`, `waktu`) VALUES
(34, 1, 1, 2.5, 1, '0000-00-00 00:00:00'),
(35, 2, 2, 10000, 1, '0000-00-00 00:00:00'),
(36, 3, 1, 2.5, 1, '0000-00-00 00:00:00'),
(37, 4, 2, 10000, 1, '0000-00-00 00:00:00'),
(40, 7, 1, 2.5, 1, '0000-00-00 00:00:00'),
(41, 8, 1, 2.5, 1, '0000-00-00 00:00:00'),
(42, 9, 1, 2.5, 1, '0000-00-00 00:00:00'),
(43, 10, 1, 2.5, 1, '0000-00-00 00:00:00'),
(44, 11, 1, 2.5, 1, '0000-00-00 00:00:00'),
(45, 12, 1, 2.5, 1, '0000-00-00 00:00:00'),
(46, 13, 1, 2.5, 1, '0000-00-00 00:00:00'),
(47, 14, 1, 2.5, 1, '0000-00-00 00:00:00'),
(48, 15, 1, 2.5, 1, '0000-00-00 00:00:00'),
(57, 24, 1, 2.5, 1, '0000-00-00 00:00:00'),
(58, 25, 1, 2.5, 1, '2016-07-01 22:07:58'),
(59, 26, 1, 2.5, 1, '2016-07-01 22:25:50'),
(60, 27, 1, 2.5, 1, '2016-07-01 22:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE IF NOT EXISTS `zakat` (
`id_zakat` int(11) NOT NULL,
  `jenis_zakat` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id_zakat`, `jenis_zakat`) VALUES
(1, 'zakat fitrah'),
(2, 'infaq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mustahiq`
--
ALTER TABLE `mustahiq`
 ADD PRIMARY KEY (`id_mustahiq`);

--
-- Indexes for table `muzaki`
--
ALTER TABLE `muzaki`
 ADD PRIMARY KEY (`id_muzaki`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
 ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
 ADD PRIMARY KEY (`id_server`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `zakat`
--
ALTER TABLE `zakat`
 ADD PRIMARY KEY (`id_zakat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mustahiq`
--
ALTER TABLE `mustahiq`
MODIFY `id_mustahiq` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
MODIFY `id_server` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
MODIFY `id_zakat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
