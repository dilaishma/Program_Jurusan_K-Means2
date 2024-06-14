-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 06.19
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurusan_kmeans_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cluster`
--

CREATE TABLE `data_cluster` (
  `id_cluster` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `nama_cluster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_cluster`
--

INSERT INTO `data_cluster` (`id_cluster`, `id_nilai`, `nama_cluster`) VALUES
(1, 1, 'TKJ'),
(2, 4, 'Otomotif'),
(3, 7, 'Tataboga'),
(4, 8, 'Wirausaha / Pemasaran'),
(5, 1, 'Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hasil`
--

CREATE TABLE `data_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `Cluster` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_hasil`
--

INSERT INTO `data_hasil` (`id_hasil`, `id_nilai`, `Cluster`) VALUES
(1, 1, 'Cluster-1'),
(2, 2, 'Cluster-2'),
(3, 3, 'Cluster-2'),
(4, 4, 'Cluster-2'),
(5, 5, 'Cluster-1'),
(6, 6, 'Cluster-1'),
(7, 7, 'Cluster-3'),
(8, 8, 'Cluster-3'),
(9, 9, 'Cluster-4'),
(10, 10, 'Cluster-4'),
(11, 11, 'Cluster-4'),
(12, 12, 'Cluster-2'),
(13, 13, 'Cluster-1'),
(14, 14, 'Cluster-1'),
(15, 15, 'Cluster-1'),
(16, 16, 'Cluster-1'),
(17, 17, 'Cluster-4'),
(18, 18, 'Cluster-4'),
(19, 19, 'Cluster-3'),
(20, 20, 'Cluster-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id_nilai`, `nis`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1, '11', 90, 78, 90, 78, 80),
(2, '22', 67, 77, 89, 88, 80),
(3, '33', 55, 89, 77, 90, 80),
(4, '44', 76, 90, 89, 98, 87),
(5, '55', 90, 90, 89, 78, 77),
(6, '66', 90, 90, 90, 78, 77),
(7, '77', 98, 88, 98, 78, 87),
(8, '88', 90, 89, 88, 89, 80),
(9, '99', 87, 78, 76, 90, 90),
(10, '111', 88, 87, 56, 90, 90),
(11, '222', 77, 89, 67, 98, 87),
(12, '333', 67, 77, 78, 87, 67),
(13, '444', 87, 67, 87, 76, 68),
(14, '555', 90, 86, 78, 78, 76),
(15, '666', 98, 78, 77, 67, 69),
(16, '777', 87, 89, 89, 78, 77),
(17, '888', 89, 77, 78, 89, 87),
(18, '999', 78, 76, 78, 80, 88),
(19, '1111', 87, 90, 89, 80, 90),
(20, '2222', 67, 90, 78, 80, 96);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nis`, `nama_siswa`, `alamat_siswa`, `password`) VALUES
(1, '11', 'AHMAD YUSUF', 'Jambi', '11'),
(2, '22', 'DENY GUNNTUR PUTRO SATRIO', 'Jambi', '22'),
(3, '33', 'LINDA WATI', 'Jambi', '33'),
(4, '44', 'MOHAMMAD ERNANDA ROBBY AL', 'Jambi', '44'),
(5, '55', 'YULI AULIYA BERLIANAN', 'Jambi', '55'),
(6, '66', 'ANDINI WARDANI', 'Jambi', '66'),
(7, '77', 'ANDRE DWI SAPUTRA', 'Jambi', '77'),
(8, '88', 'BERLIAN ANINDYA PUTRI', 'Jambi', '88'),
(9, '99', 'BERLIANI INDAH YUNIARTI', 'Jambi', '99'),
(10, '111', 'MAULINDA INDAH FAJARWATI', 'Jambi', '111'),
(11, '222', 'FIRDAUS FIRMANSYAH', 'Jambi', '222'),
(12, '333', 'NANDA IMROATUS SHOLIKHAH', 'Jambi', '333'),
(13, '444', 'RISKY NUR FITRIYAH', 'Jambi', '444'),
(14, '555', 'SITI ZULIANASARI', 'Jambi', '555'),
(15, '666', 'A\'IM MATUZZAKIYYAH', 'Jambi', '666'),
(16, '777', 'AFNI NUR KHOFIFAH', 'Jambi', '777'),
(17, '888', 'AGMA BUDI PRASETYA', 'Jambi', '888'),
(18, '999', 'CHUSNI ABDUL AZIZ', 'Jambi', '999'),
(19, '1111', 'DWI NUR AULIYAUL HIDAYATI', 'Jambi', '1111'),
(20, '2222', 'MUHAMMAD ZUKHRUF QOLBI', 'Jambi', '2222');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_cluster`
--
ALTER TABLE `data_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indeks untuk tabel `data_hasil`
--
ALTER TABLE `data_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_cluster`
--
ALTER TABLE `data_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_hasil`
--
ALTER TABLE `data_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
