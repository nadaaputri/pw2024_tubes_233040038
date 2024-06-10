-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2024 at 07:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040038`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `detail`) VALUES
(1, 'Makanan', 'Tersedia berbagai macam makanan yang dibuat menggunakan bahan-bahan premium dengan harga yang terjangkau.'),
(2, 'Minuman', 'Tersedia minuman segar dengan harga yang terjangkau.');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `foto`, `nama`, `harga`, `detail`) VALUES
(1, 1, 'roti-mini.jpg', 'Roti mini', 'Rp. 16.000', 'Harga untuk 1 box isi 12 pcs roti mini bebas pilih varian rasa (abon, ceres, coklat isi, coklat kacang, greentea, kacang, keju, keju isi, koko krunch, marshmallow, milo, oreo, pisang, piscok, pizza, sosis keju)'),
(2, 1, 'roti-isi.jpg', 'Roti isi', 'Rp. 5.000', 'Tersedia berbagai varian rasa (coklat, keju, pisang, piscok, sosis keju) '),
(3, 1, 'roti-jabrig.jpg', 'Roti Jabrig', 'Rp. 5.000', 'Roti yang diberi toping yang berlimpah (abon, ceres, coklat kacang, kacang, keju, milo, oreo)'),
(4, 1, 'roti-sobek.jpg', 'Roti Sobek', 'Rp. 15.000', 'Roti sobek merupakan beberapa roti isi yang digabungkan sehingga pada setiap potongannya terdapat isi yang bisa berbeda-beda.'),
(5, 1, 'roti-pizza.jpg', 'Roti Pizza', 'Rp. 5.000', 'Roti pizza merupakan roti yang dipanggang dan dihias dengan berbagai macam toping seperti saus tomat, mayonaise, sosis, keju, dan rempah-rempah lainnya.'),
(6, 1, 'roti-kopi.jpg', 'Roti Kopi', 'Rp. 5.000', 'Roti kopi merupakan roti yang dipanggang dengan krim kopi diatasnya sehingga bertekstur renyah diluar, lembut di dalam yang berisi lapisan margarin sehingga terasa gurih.'),
(7, 1, 'kuker-coklat-200gr.jpg', 'Kue Kering Coklat Stik (200gr)', 'Rp. 30.000', 'Kue kering coklat stik adalah jenis kue kering yang berbentuk seperti stik dan memiliki rasa coklat yang khas.'),
(8, 1, 'kuker-coklat-350gr.jpg', 'Kue Kering Coklat Stik (350gr)', 'Rp. 50.000', 'Kue kering coklat stik adalah jenis kue kering yang berbentuk seperti stik dan memiliki rasa coklat yang khas.'),
(9, 1, 'kuker-coklat-500gr.jpg', 'Kue Kering Coklat Stik (500gr)', 'Rp. 75.000', 'Kue kering coklat stik adalah jenis kue kering yang berbentuk seperti stik dan memiliki rasa coklat yang khas.'),
(23, 2, '6650922b2acdc.jpg', 'Es Teler', 'Rp. 10.000', 'Minuman penutup yang terdiri dari campuran buah dan agar-agar, disajikan dengan sirup, susu kental manis, dan es serut yang menyegarkan.'),
(28, 1, '665e8b7e67ca7.jpg', 'Brownies panggang', 'Rp. 50.000', 'Brownies panggang coklat dengan berbagai toping di setiap potongannya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'nada', '$2y$10$O1FD0yP/Dhq.wZWBOPRt/u0DO.KDm7tqPIs5QX7gQh3m.m8opxXCi'),
(2, 'admin', '$2y$10$3F76Hqr0ETj5fAUpLmuoO.wWJyFheIZhNIS0XdETPKfYEqIIuVhLK'),
(3, 'admin3', '$2y$10$wp63PcabqsLQ3Y5XJNeeGuF2aweJuMGOXN4Tz7AQrR1rE5I4gbDTW'),
(4, 'putri', '$2y$10$aqEzQC9WwT4nZZmHaulFde9B8eCPTAvhvvPuBCfFz.NHf95I1lMQC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
