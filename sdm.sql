-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2020 pada 12.37
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `code_departemen` int(11) UNSIGNED NOT NULL,
  `name_departemen` varchar(30) NOT NULL,
  `id_manager` int(11) UNSIGNED DEFAULT NULL,
  `start_date_manager` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`code_departemen`, `name_departemen`, `id_manager`, `start_date_manager`) VALUES
(100, 'Media and Publication', 1, '2020-06-12'),
(110, 'Acara', 3, '2020-06-12'),
(120, 'Pemandu', 2, '2020-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('p','w') DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `salary` int(8) UNSIGNED DEFAULT NULL,
  `code_departemen` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `first_name`, `last_name`, `birth_date`, `gender`, `addresss`, `salary`, `code_departemen`) VALUES
(1, 'Choirun', 'Nisa', '2001-09-04', 'f', 'Braga City Walk', 500000, 140),
(2, 'Rima', 'Shanda', '2020-10-25', 'f', 'Jl Nglanjaran', 40000, 120),
(3, 'Azka', 'Nabila', '2001-11-10', 'f', 'Jl Flamboyan', 10000, 190),
(7, 'Giring', 'Nidji', '1980-02-15', 'm', 'Jl Soekarno-Hatta', 19000, 100),
(10, 'Cinta', 'Laura', '1999-08-19', 'f', 'Jl Amerika', 1000, 130),
(11, 'Keanu', 'Angelo', '1990-02-13', 'm', 'Jl Bekasi', 13680, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`code_departemen`),
  ADD KEY `departemen_pegawai_id_manajer` (`id_manager`),
  ADD KEY `code_departemen` (`code_departemen`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD CONSTRAINT `departemen_pegawai_id_manajer` FOREIGN KEY (`id_manager`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
