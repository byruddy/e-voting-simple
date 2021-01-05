-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 10:59 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id` int(1) NOT NULL,
  `nm_cagub` varchar(100) NOT NULL,
  `nm_cawagub` varchar(100) NOT NULL,
  `warna` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id`, `nm_cagub`, `nm_cawagub`, `warna`) VALUES
(1, 'Basuki', 'Djarot', 'white'),
(2, 'Agus', 'Sylviana', 'white'),
(3, 'Anies', 'Sandiaga', 'white');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(7) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` enum('1','2','3','4','5','6','7') NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `nama`, `semester`, `jurusan`) VALUES
(1, 'byruddy', 'Rudi Hikmatullah', '1', 'Teknik Informatika'),
(1121601, '123', 'Oki', '1', 'Teknik Informatika'),
(1121602, '123', 'Gina', '1', 'Teknik Informatika'),
(1121603, '123', 'Vina', '1', 'Teknik Informatika'),
(1121604, '123', 'Roy', '1', 'Komunikasi'),
(1121605, '123', 'Vicky', '1', 'Komunikasi'),
(1121606, '123', 'Nila', '1', 'Komunikasi'),
(1121607, '123', 'Putri', '2', 'Komunikasi'),
(1121608, '123', 'Nesta', '1', 'Teknik Informatika'),
(1121609, '123', 'Sinta', '2', 'Komunikasi'),
(1121610, '123', 'Dedi', '1', 'Teknik Informatika'),
(1121611, '123', 'Dendi', '2', 'Komunikasi'),
(1121612, '123', 'Zait', '1', 'Teknik Informatika'),
(1121613, '123', 'Sudirman', '3', 'Teknik Informatika'),
(1121614, '123', 'Sidik', '1', 'Teknik Informatika'),
(1121615, '123', 'Hudan', '1', 'Komunikasi'),
(1121616, '123', 'Reka', '2', 'Teknik Informatika'),
(1121617, '123', 'Syifa', '1', 'Komunikasi'),
(1121618, '123', 'Yuyun', '2', 'Komunikasi'),
(11216045, '230281', 'Neng', '2', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `suara`
--

CREATE TABLE `suara` (
  `id` int(5) NOT NULL,
  `pemilih` int(7) NOT NULL,
  `mencoblos` int(1) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suara`
--

INSERT INTO `suara` (`id`, `pemilih`, `mencoblos`, `tgl`) VALUES
(5, 1, 1, '2016-11-21 20:03:58'),
(6, 1121601, 2, '2016-11-22 09:54:52'),
(7, 1121602, 3, '2016-11-22 09:55:07'),
(8, 1121604, 2, '2016-11-23 14:50:10'),
(9, 1121607, 3, '2016-11-23 14:51:26'),
(10, 1121615, 3, '2016-11-28 14:58:26'),
(11, 1121611, 1, '2016-11-29 10:33:44'),
(12, 1121608, 1, '2016-12-05 12:40:23'),
(13, 11216045, 2, '2017-02-20 15:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemilih` (`pemilih`),
  ADD KEY `mencoblos` (`mencoblos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suara`
--
ALTER TABLE `suara`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suara`
--
ALTER TABLE `suara`
  ADD CONSTRAINT `suara_ibfk_1` FOREIGN KEY (`pemilih`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_ibfk_2` FOREIGN KEY (`mencoblos`) REFERENCES `calon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
