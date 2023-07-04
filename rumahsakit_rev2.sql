-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nip` varchar(15) DEFAULT NULL,
  `nama_dokter` varchar(15) DEFAULT NULL,
  `spesialis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nip`, `nama_dokter`, `spesialis`) VALUES
(1, 'd001', 'dokter 1', 'makan'),
(2, 'd002', 'dokter 2', 'minum');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_pasien` varchar(15) DEFAULT NULL,
  `nama_dokter` varchar(15) DEFAULT NULL,
  `keluhan` varchar(255) DEFAULT NULL,
  `ruang` varchar(15) DEFAULT NULL,
  `tanggal_masuk` varchar(15) DEFAULT NULL,
  `tanggal_keluar` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_pasien`, `nama_dokter`, `keluhan`, `ruang`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(1, 'pasien 1', 'dokter 1', 'makan', 'R1', '01/08/2023', '7/08/2023'),
(2, 'pasien 2', 'dokter 2', 'minum', 'R2', '9/09/2023', '23/09/2023');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `keluhan` varchar(255) DEFAULT NULL,
  `ruang` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`, `alamat`, `keluhan`, `ruang`) VALUES
(1, 'pasien 1', 'laki - laki', 22, 'boyolali', 'makan', 'R1'),
(2, 'pasien 2', 'perempuan', 23, 'klaten', 'minum', 'R2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `status` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `nama`, `status`) VALUES
('admin@gmail.com', 'admin1', 'Achmad Jamaah Firdaus', 'Administrator'),
('member@gmail.com', 'member1', 'member1', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `nama_dokter` (`nama_dokter`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `keluhan` (`keluhan`),
  ADD KEY `nama_pasien` (`nama_pasien`),
  ADD KEY `nama_dokter` (`nama_dokter`),
  ADD KEY `ruang` (`ruang`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `nama_pasien` (`nama_pasien`),
  ADD KEY `ruang` (`ruang`),
  ADD KEY `keluhan` (`keluhan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`nama_dokter`) REFERENCES `dokter` (`nama_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_ibfk_2` FOREIGN KEY (`nama_pasien`) REFERENCES `pasien` (`nama_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_ibfk_3` FOREIGN KEY (`ruang`) REFERENCES `pasien` (`ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `layanan_ibfk_4` FOREIGN KEY (`keluhan`) REFERENCES `pasien` (`keluhan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
