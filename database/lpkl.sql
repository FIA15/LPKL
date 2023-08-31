-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2022 pada 08.20
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nig` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `isi_laporan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `nis`, `nig`, `nip`, `tgl_laporan`, `isi_laporan`) VALUES
(3, '43E57027185010', '123123212', '321321231', '2022-02-04', '1. ketuhanan yang maha esa\r\n2. kemanusiaan yang adil dan beradab\r\n3. persatuan indonesia\r\n4. kerakyatan yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan perwakilan\r\n5. keadilan sosial bagi seluruh rakyat indonesia'),
(4, '43E57027185010', '123123212', '321321231', '2022-01-31', 'dasdas'),
(5, '43E57027185010', '123123212', '321321231', '2022-02-01', '<ol>\r\n	<li>ketujajasda</li>\r\n	<li>dsadasdasd</li>\r\n	<li>dasf afsfasd</li>\r\n	<li>dasdacadaddada&nbsp; dadadada da adsdasda dadadada dasd</li>\r\n	<li>dadada adadaadad&nbsp;</li>\r\n</ol>\r\n'),
(6, '1231231', '112233', '196103161986031008', '2022-02-05', '<ol>\r\n	<li>gatau</li>\r\n	<li>gatau juga</li>\r\n	<li>sama gatau</li>\r\n	<li>yaa gatau</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`nis`, `nama`) VALUES
('1231231', 'ASSSS'),
('43E57027185010', 'FIKRY IKHSAN ANSHORI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa`
--

CREATE TABLE `pa` (
  `nig` varchar(50) NOT NULL,
  `nama_pa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pa`
--

INSERT INTO `pa` (`nig`, `nama_pa`) VALUES
('112233', 'AUAH'),
('123123212', 'BUDI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pt`
--

CREATE TABLE `pt` (
  `nip` varchar(50) NOT NULL,
  `nama_pt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pt`
--

INSERT INTO `pt` (`nip`, `nama_pt`) VALUES
('196103161986031008', 'AKUU'),
('321321231', 'FIKRY YEUHH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nig` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nis`, `nig`, `nip`, `username`, `password`, `level`) VALUES
('08848fa6-6aa8-4d27-8e2c-c0d5d103fad0', '1231231', '112233', '196103161986031008', '1231231', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
('93d227ed-8581-11ec-8834-3bd473c6864c', '43E57027185010', '123123212', '321321231', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nig` (`nig`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `pa`
--
ALTER TABLE `pa`
  ADD PRIMARY KEY (`nig`);

--
-- Indeks untuk tabel `pt`
--
ALTER TABLE `pt`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `user_ibfk_3` (`nis`),
  ADD KEY `user_ibfk_1` (`nig`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`nig`) REFERENCES `pa` (`nig`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pt` (`nip`),
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `murid` (`nis`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nig`) REFERENCES `pa` (`nig`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pt` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `murid` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
