-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snapyours`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`foto_id`, `foto`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `lokasi_file`, `album_id`, `user_id`, `kategori`) VALUES
(53, '1708947927_4f5a659d1458903cc012.jpg', 'nails star', 'cute nails star', '2024-02-26', '', 0, 24, 6),
(54, '1708947976_5e34bbad057341779a3e.jpg', 'art sketch', 'woman sketch art', '2024-02-26', '', 0, 24, 5),
(55, '1708948191_8d15c12dec075e4cb3f6.jpg', 'star food', 'food ideas', '2024-02-26', '', 0, 24, 3),
(56, '1708948306_b6662bcc8a50fec7f8ac.jpg', '', 'cute pinguin', '2024-02-26', '', 0, 24, 2),
(57, '1708948451_3bdf639fdc3c4c223068.jpg', 'hijab outfit ideas', 'outfit ideas', '2024-02-26', '', 0, 24, 4),
(58, '1708948518_70f489b1d0650b9a2b8d.jpg', 'sunset', 'sunset yang cantik', '2024-02-26', '', 0, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `foto_id`, `user_id`, `isi_komentar`, `tanggal_komentar`) VALUES
(8, 36, 12, 'haii', '2024-02-11'),
(9, 36, 13, 'lucukk\r\n', '2024-02-11'),
(10, 37, 12, 'soo cutee', '2024-02-12'),
(11, 37, 12, 'wowwww', '2024-02-12'),
(12, 37, 13, 'lucunyaa', '2024-02-12'),
(13, 38, 12, 'lucunyaa\r\n', '2024-02-12'),
(14, 39, 12, ' so cute', '2024-02-12'),
(15, 38, 12, 'look so yummy???? ', '2024-02-13'),
(16, 40, 12, 'sooo cutee', '2024-02-13'),
(17, 43, 26, 'keren', '2024-02-24'),
(18, 43, 13, 'keren', '2024-02-24'),
(19, 45, 26, 'soo cutee\r\n', '2024-02-26'),
(20, 46, 24, 'yummy', '2024-02-26'),
(21, 47, 24, 'keren', '2024-02-26'),
(22, 49, 24, 'soo cute', '2024-02-26'),
(23, 58, 24, 'cantiknyaa', '2024-02-26'),
(24, 56, 24, 'bxjwxbwx', '2024-02-26'),
(25, 55, 24, 'jchejcheche\r\n', '2024-02-26'),
(26, 56, 24, 'lucu', '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_like` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `foto_id`, `user_id`, `tanggal_like`, `created_at`, `updated_at`) VALUES
(2, 53, 24, '0000-00-00', '2024-02-27 03:13:31', '2024-02-27 03:13:31'),
(3, 57, 24, '0000-00-00', '2024-02-27 03:13:39', '2024-02-27 03:13:39'),
(4, 54, 24, '0000-00-00', '2024-02-27 03:14:58', '2024-02-27 03:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `active` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `foto`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `created_at`, `updated_at`, `active`) VALUES
(11, '', 'amel', '1bbd886460827015e5d605ed44252251', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(13, 'defaultprofile.jpg', 'amell', '1bbd886460827015e5d605ed44252251', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(24, '1708933585_2b8db159a291496ad163.jpg', 'dewi', '1bbd886460827015e5d605ed44252251', 'mahadewisabrinaputri@gmail.com', 'mahadewi', 'yogyakarta', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0eeb72d01e07ac930beb'),
(26, '1708912040_fecd49adac3fb287ee19.jpg', 'mahadewi', '25d55ad283aa400af464c76d713c07ad', 'mahadewisabrinaputri@gmail.com', 'dewi', 'yogyakarta', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12a24cd9146049e228bb'),
(27, 'defaultprofile.jpg', 'dewi', '', 'erniawatierniawati78@gmail.com', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`foto_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
