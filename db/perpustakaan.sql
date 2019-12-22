-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 02:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `nip` varchar(50) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`nip`, `nama_adm`, `no_telp`, `email`, `password`) VALUES
('12160535', 'Anggraini', '082321232112', 'sdadsa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(20) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `penerbit`, `pengarang`, `tahun`, `jumlah_buku`, `kelas`, `img`) VALUES
(23, 'Agama Islam', 'Yudhistira', 'Salmon', '2016', 19, 'Kelas X', '5dd8cb933076f.jpg'),
(24, 'Agama Islam', 'Andi Offset', 'Anggraini', '2015', 19, 'Kelas XI', '5dd8cc4a8fbdb.jpg'),
(25, 'Agama Islam', 'Erlangga', 'Ali', '2018', 31, 'Kelas XII', '5dd8cc6fa01ad.jpg'),
(26, 'Bahasa Indonesia', 'Tiga Serangkai', 'Afrizal Malna', '2015', 48, 'Kelas X', '5dd8cda789c38.jpg'),
(27, 'Bahasa Indonesia', 'Erlangga', 'Ahmad Fuadi', '2015', 48, 'Kelas XI', '5dd8cdf79adfd.jpg'),
(28, 'Bahasa Indonesia', 'Yudhistira', 'Abrar Yusra', '2015', 48, 'Kelas XII', '5dd8cea165168.jpg'),
(30, 'Bahasa Inggris', 'Erlangga', 'Abdul Hadi', '2015', 48, 'Kelas X', '5dd8cf38ae4e0.jpg'),
(31, 'Bahasa Inggris', 'Yudhistira', 'Agam Wispi', '2017', 48, 'Kelas XI', '5dd8cfd1046df.jpg'),
(32, 'Bahasa Inggris', 'Yudhistira', 'Nur Syarifah', '2018', 48, 'Kelas XII', '5dd8d02288463.jpg'),
(33, 'Biologi', 'Erlangga', 'Rendi Saputra', '2015', 48, 'Kelas X', '5dd8d0b921c1e.jpg'),
(34, 'Biologi', 'Yudhistira', 'Frida Listiana', '2014', 48, 'Kelas XI', '5dd8d128dcbad.jpg'),
(35, 'Biologi', 'Erlangga', 'Nur Syarifah', '2015', 48, 'Kelas XII', '5dd8d1610138f.jpg'),
(36, 'Fisika', 'Erlangga', 'Lisa Maria', '2016', 48, 'Kelas X', '5dd8d1a100b20.jpg'),
(37, 'Fisika', 'Yudhistira', 'Lisa Maria', '2017', 48, 'Kelas XI', '5dd8d28a21f1f.jpg'),
(38, 'Fisika', 'Yudhistira', 'Lisa Maria', '2017', 48, 'Kelas XII', '5dd8d2c2dc364.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'Kelas X'),
(2, 'Kelas XI'),
(3, 'Kelas XII');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `pengarang_buku` varchar(50) NOT NULL,
  `tahun_buku` varchar(50) NOT NULL,
  `kelas_buku` varchar(50) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `username`, `nama_peminjam`, `id_buku`, `nama_buku`, `pengarang_buku`, `tahun_buku`, `kelas_buku`, `jml_pinjam`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(22, 'user', 'User', 23, 'Agama Islam', 'Salmon', '2016', 'Kelas X', 1, '2019-12-03', '2019-12-06', 'Kembali'),
(23, 'user', 'User', 26, 'Bahasa Indonesia', 'Afrizal Malna', '2015', 'Kelas X', 1, '2019-12-08', '2019-12-12', 'Kembali'),
(26, 'user', 'User', 26, 'Bahasa Indonesia', 'Afrizal Malna', '2015', 'Kelas X', 1, '2019-12-08', '2019-12-10', 'Kembali'),
(29, 'user', 'User', 23, 'Agama Islam', 'Salmon', '2016', 'Kelas X', 1, '2019-12-08', '2019-12-11', 'Kembali'),
(30, 'anggraini', 'anggraini', 28, 'Bahasa Indonesia', 'Abrar Yusra', '2015', 'Kelas XII', 2, '2019-12-06', '2019-12-06', 'Pinjam'),
(31, 'anggraini', 'anggraini', 24, 'Agama Islam', 'Anggraini', '2015', 'Kelas XI', 2, '2019-12-08', '2019-12-09', 'Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pswd`, `nama_user`, `tgl_lahir`, `email`) VALUES
(2, 'Hffffft', '81dc9bdb52d04dc20036dbd8313ed055', 'Udin', '1980-11-12', 'asdas@gmail.com'),
(3, 'anggraini', '81dc9bdb52d04dc20036dbd8313ed055', 'anggraini', '2019-11-12', 'dasdsa@gmail.com'),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', '2019-11-11', 'user@gmail.com'),
(5, 'ucup', '81dc9bdb52d04dc20036dbd8313ed055', 'Yusuf', '2019-12-12', 'ucup@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
