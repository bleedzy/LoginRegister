-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 08:29 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `filmID` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `rilis` date NOT NULL,
  `deskripsi` text NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`filmID`, `judul`, `rilis`, `deskripsi`, `genre`) VALUES
(1, 'Dandadan', '2024-10-04', 'Ini adalah kisah tentang Momo, seorang gadis SMA yang berasal dari keluarga cenayang, dan teman sekelasnya Okarun, seorang fanatik okultisme. Setelah Momo menyelamatkan Okarun dari perundungan, mereka mulai berbicara. Namun, terjadi pertengkaran di antara mereka karena Momo percaya pada hantu tetapi menyangkal keberadaan alien, dan Okarun percaya pada alien tetapi menyangkal keberadaan hantu.', 'Komedi'),
(2, 'Blue Lock', '2022-10-09', 'Keinginan Jepang untuk meraih kejayaan di Piala Dunia membuat Asosiasi Sepak Bola Jepang meluncurkan program latihan ketat baru untuk menemukan penyerang baru bagi tim nasional. Tiga ratus pemain sekolah menengah atas saling bersaing untuk memperebutkan posisi tersebut, tetapi hanya satu yang akan menang. Siapa di antara mereka yang akan menjadi penyerang yang akan mengawali era baru sepak bola Jepang?', 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(70) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `role`, `userID`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin', 1),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'User', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`filmID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `filmID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
