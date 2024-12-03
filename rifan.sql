-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 12:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rifan`
--

-- --------------------------------------------------------

--
-- Table structure for table `database_nmr`
--

CREATE TABLE `database_nmr` (
  `id` int(3) NOT NULL,
  `kode` int(11) NOT NULL,
  `nomor` char(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `katagori` enum('belum diangkat','proses broadcast','diblokir','appointment') NOT NULL,
  `ket` varchar(100) NOT NULL,
  `id_prov` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `database_nmr`
--

INSERT INTO `database_nmr` (`id`, `kode`, `nomor`, `nama`, `katagori`, `ket`, `id_prov`) VALUES
(3, 126, '08121084872', 'Teguh Supriyadi', 'proses broadcast', 'Bekerja di KAI', 31),
(10, 122, '08121055463', 'Agus Sulistyono', 'belum diangkat', '-', 96),
(12, 122, '08121069165', 'Rama Saputra', 'proses broadcast', 'Dosen Universitas Mataram', 52),
(13, 130, '08139456067', 'Satria Andhika Casurin', 'proses broadcast', 'Hanya merespon tidak minat', 32),
(14, 123, '08121070277', 'Angga', 'belum diangkat', '-', 96),
(15, 125, '08121089817', 'Iman Siregar', 'belum diangkat', '-', 96),
(16, 126, '08121053769', 'Danang Cahyono', 'belum diangkat', '-', 96),
(17, 130, '08121099883', 'Maik Van Den Berg', 'belum diangkat', 'Belanda, bekerja di Foodventures', 95),
(18, 127, '08121069949', 'Yudi Wahyudi', 'proses broadcast', 'Belum ada respon, hanya diread', 96),
(19, 129, '08121082928', 'Hendry Novis', 'diblokir', 'Belum respon saat di broadcast', 35),
(20, 129, '08121088871', 'Anjar Priyatna', 'diblokir', 'NPO RAN Spesialist', 31),
(21, 129, '08121051602', 'Helmy Kristanto', 'appointment', 'Senior Vice President  PT BRI Danareksa Sekuritas, trading di perusahaan tempat kerjanya', 31),
(22, 127, '08121051087', 'Supriatna', 'appointment', 'Dosen Department of Geography, belum pernah melakukan trading', 32),
(23, 127, '08121089143', 'Sendy Nurulita', 'appointment', 'Corporate Communication PT Pertamina (Persero), belum pernah melakukan trading', 31),
(24, 124, '08121089143', 'Rismanta', 'diblokir', 'belum ada respon saat di broadcast', 96);

-- --------------------------------------------------------

--
-- Table structure for table `prov`
--

CREATE TABLE `prov` (
  `id_prov` int(2) NOT NULL,
  `nama_prov` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prov`
--

INSERT INTO `prov` (`id_prov`, `nama_prov`) VALUES
(11, 'Aceh\r'),
(12, 'Sumatera Utara\r'),
(13, 'Sumatera Barat\r'),
(14, 'Riau\r'),
(15, 'Jambi\r'),
(16, 'Sumatera Selatan\r'),
(17, 'Bengkulu\r'),
(18, 'Lampung\r'),
(19, 'Kepulauan Bangka Belitung\r'),
(21, 'Kepulauan Riau\r'),
(31, 'DKI Jakarta'),
(32, 'Jawa Barat\r'),
(33, 'Jawa Tengah\r'),
(34, 'DI Yogyakarta'),
(35, 'Jawa Timur\r'),
(36, 'Banten\r'),
(51, 'Bali\r'),
(52, 'Nusa Tenggara Barat\r'),
(53, 'Nusa Tenggara Timur\r'),
(61, 'Kalimantan Barat\r'),
(62, 'Kalimantan Tengah\r'),
(63, 'Kalimantan Selatan\r'),
(64, 'Kalimantan Timur\r'),
(71, 'Sulawesi Utara\r'),
(72, 'Sulawesi Tengah\r'),
(73, 'Sulawesi Selatan\r'),
(74, 'Sulawesi Tenggara\r'),
(75, 'Gorontalo\r'),
(76, 'Sulawesi Barat\r'),
(81, 'Maluku\r'),
(82, 'Maluku Utara\r'),
(91, 'Papua Barat\r'),
(94, 'Papua\r'),
(95, 'Luar Negeri'),
(96, 'Belum Mengetahui');

-- --------------------------------------------------------

--
-- Table structure for table `tagroup`
--

CREATE TABLE `tagroup` (
  `id` int(3) NOT NULL,
  `namagroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagroup`
--

INSERT INTO `tagroup` (`id`, `namagroup`) VALUES
(122, 'Wieda'),
(123, 'Ariyani'),
(124, 'Aska'),
(125, 'Didik'),
(126, 'Tiara'),
(127, 'Helen'),
(129, 'Soraya'),
(130, 'Frans');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` enum('admin','bc') DEFAULT 'bc',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(101, 'magdalena', 'lena123', 'admin', '2024-10-30 08:32:40'),
(201, 'wieda', 'wieda123', 'bc', '2024-10-30 09:02:45'),
(203, 'ariyani', 'ariyani123', 'bc', '2024-10-30 16:19:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `database_nmr`
--
ALTER TABLE `database_nmr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kode_tagroup` (`kode`),
  ADD KEY `fk_prov_database_nmr` (`id_prov`);

--
-- Indexes for table `prov`
--
ALTER TABLE `prov`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `tagroup`
--
ALTER TABLE `tagroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `database_nmr`
--
ALTER TABLE `database_nmr`
  ADD CONSTRAINT `fk_kode_tagroup` FOREIGN KEY (`kode`) REFERENCES `tagroup` (`id`),
  ADD CONSTRAINT `fk_prov_database_nmr` FOREIGN KEY (`id_prov`) REFERENCES `prov` (`id_prov`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
