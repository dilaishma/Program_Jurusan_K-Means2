-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2024 pada 18.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
(1, 26, 'Berbahaya'),
(2, 57, 'Waspada'),
(3, 49, 'Aman');

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
(23, 24, 'Cluster-3'),
(24, 25, 'Cluster-3'),
(25, 26, 'Cluster-2'),
(29, 30, 'Cluster-3'),
(31, 32, 'Cluster-2'),
(36, 37, 'Cluster-2'),
(39, 40, 'Cluster-3'),
(40, 41, 'Cluster-3'),
(41, 42, 'Cluster-2'),
(42, 43, 'Cluster-2'),
(43, 44, 'Cluster-2'),
(44, 45, 'Cluster-3'),
(45, 46, 'Cluster-1'),
(46, 47, 'Cluster-2'),
(47, 48, 'Cluster-1'),
(48, 49, 'Cluster-2'),
(49, 50, 'Cluster-1'),
(50, 51, 'Cluster-2'),
(51, 52, 'Cluster-1'),
(52, 53, 'Cluster-1'),
(53, 54, 'Cluster-2'),
(54, 55, 'Cluster-3'),
(55, 56, 'Cluster-3'),
(56, 57, 'Cluster-1'),
(57, 58, 'Cluster-3'),
(58, 59, 'Cluster-2'),
(60, 61, 'Cluster-2'),
(61, 62, 'Cluster-3'),
(62, 63, 'Cluster-3'),
(63, 64, 'Cluster-2'),
(64, 65, 'Cluster-2'),
(65, 66, 'Cluster-1'),
(66, 67, 'Cluster-1'),
(67, 68, 'Cluster-2'),
(68, 69, 'Cluster-1'),
(69, 70, 'Cluster-3'),
(70, 71, 'Cluster-1'),
(71, 72, 'Cluster-1'),
(72, 73, 'Cluster-1'),
(73, 74, 'Cluster-1'),
(74, 75, 'Cluster-1'),
(75, 76, 'Cluster-3'),
(76, 77, 'Cluster-3'),
(77, 78, 'Cluster-1'),
(78, 79, 'Cluster-1'),
(79, 80, 'Cluster-1'),
(80, 81, 'Cluster-1'),
(81, 82, 'Cluster-2'),
(82, 83, 'Cluster-2'),
(83, 84, 'Cluster-1'),
(84, 85, 'Cluster-1'),
(85, 86, 'Cluster-1'),
(86, 87, 'Cluster-1'),
(87, 88, 'Cluster-3'),
(88, 89, 'Cluster-1'),
(89, 90, 'Cluster-1'),
(90, 91, 'Cluster-2'),
(91, 92, 'Cluster-1'),
(92, 93, 'Cluster-1'),
(93, 94, 'Cluster-2'),
(94, 95, 'Cluster-1'),
(95, 96, 'Cluster-1'),
(96, 97, 'Cluster-1'),
(97, 98, 'Cluster-1'),
(98, 99, 'Cluster-1'),
(99, 100, 'Cluster-1'),
(100, 101, 'Cluster-1'),
(101, 102, 'Cluster-1'),
(102, 103, 'Cluster-1'),
(103, 104, 'Cluster-1'),
(104, 105, 'Cluster-1'),
(105, 106, 'Cluster-1'),
(106, 107, 'Cluster-1'),
(107, 108, 'Cluster-1'),
(108, 109, 'Cluster-1'),
(109, 110, 'Cluster-1'),
(110, 111, 'Cluster-1'),
(111, 112, 'Cluster-1'),
(112, 113, 'Cluster-1'),
(113, 114, 'Cluster-1'),
(114, 115, 'Cluster-1'),
(115, 116, 'Cluster-1'),
(116, 117, 'Cluster-1'),
(117, 118, 'Cluster-1'),
(118, 119, 'Cluster-1'),
(119, 120, 'Cluster-1'),
(120, 121, 'Cluster-1'),
(121, 122, 'Cluster-3'),
(122, 123, 'Cluster-1'),
(123, 124, 'Cluster-3'),
(124, 125, 'Cluster-1'),
(125, 126, 'Cluster-1'),
(126, 127, 'Cluster-1'),
(127, 128, 'Cluster-1'),
(128, 129, 'Cluster-1'),
(129, 130, 'Cluster-1'),
(130, 131, 'Cluster-1'),
(131, 132, 'Cluster-1'),
(132, 133, 'Cluster-1'),
(133, 134, 'Cluster-1'),
(134, 135, 'Cluster-1'),
(135, 136, 'Cluster-1'),
(136, 137, 'Cluster-1');

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
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `c7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id_nilai`, `nis`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`) VALUES
(24, '01', 0, 0, 0, 6, 2, 7, 4),
(25, '02', 9, 8, 2, 3, 0, 14, 8),
(26, '03', 0, 0, 7, 42, 12, 52, 10),
(30, '04', 1, 0, 0, 0, 0, 1, 0),
(37, '05', 2, 4, 3, 7, 2, 15, 3),
(40, '06', 6, 4, 2, 1, 1, 8, 6),
(41, '07', 9, 2, 4, 16, 3, 12, 22),
(42, '08', 24, 5, 9, 6, 0, 21, 23),
(43, '09', 20, 10, 11, 9, 0, 30, 20),
(44, '10', 0, 1, 1, 7, 7, 8, 8),
(45, '11', 2, 1, 0, 0, 0, 0, 3),
(46, '12', 27, 12, 15, 8, 1, 33, 30),
(47, '13', 2, 1, 0, 0, 0, 0, 3),
(48, '14', 0, 7, 9, 34, 6, 38, 18),
(49, '15', 1, 0, 0, 0, 0, 0, 1),
(50, '16', 0, 2, 10, 15, 4, 25, 6),
(51, '17', 1, 2, 0, 1, 0, 3, 1),
(52, '18', 0, 1, 0, 0, 1, 2, 0),
(53, '19', 3, 7, 13, 2, 0, 15, 10),
(54, '20', 11, 2, 0, 1, 0, 7, 7),
(55, '21', 3, 4, 2, 5, 0, 9, 5),
(56, '22', 0, 2, 5, 2, 1, 6, 4),
(57, '23', 4, 3, 5, 2, 0, 8, 6),
(58, '24', 0, 0, 8, 29, 5, 32, 10),
(59, '25', 0, 0, 0, 2, 4, 2, 4),
(62, '27', 0, 2, 0, 5, 1, 5, 3),
(63, '28', 0, 0, 3, 12, 5, 11, 9),
(64, '29', 0, 0, 3, 12, 5, 11, 9),
(65, '30', 0, 0, 0, 2, 1, 1, 2),
(66, '31', 1, 0, 0, 0, 0, 0, 1),
(67, '32', 22, 6, 10, 3, 1, 24, 18),
(68, '33', 3, 2, 1, 0, 0, 4, 2),
(69, '34', 0, 0, 2, 4, 2, 5, 3),
(70, '35', 1, 0, 0, 0, 0, 1, 0),
(71, '36', 0, 0, 0, 0, 1, 1, 0),
(72, '37', 0, 0, 2, 1, 0, 3, 0),
(73, '38', 0, 1, 0, 0, 0, 1, 0),
(74, '39', 0, 0, 0, 1, 0, 1, 0),
(76, '40', 0, 0, 0, 6, 2, 6, 2),
(77, '41', 0, 0, 0, 1, 0, 1, 0),
(78, '42', 0, 2, 4, 1, 0, 4, 3),
(79, '43', 0, 2, 4, 1, 0, 4, 3),
(80, '44', 0, 1, 0, 0, 0, 1, 0),
(81, '45', 1, 7, 10, 4, 4, 13, 13),
(82, '46', 4, 14, 9, 4, 1, 19, 13),
(83, '47', 0, 0, 1, 0, 0, 0, 1),
(84, '48', 0, 0, 1, 0, 0, 1, 0),
(85, '49', 0, 0, 0, 2, 0, 2, 0),
(86, '50', 4, 1, 0, 0, 0, 2, 3),
(87, '26', 0, 0, 1, 4, 5, 6, 4),
(88, '51', 3, 2, 1, 0, 0, 1, 5),
(89, '52', 1, 0, 0, 0, 0, 1, 0),
(90, '53', 3, 3, 2, 7, 4, 14, 5),
(91, '54', 1, 0, 0, 2, 1, 0, 4),
(92, '55', 1, 1, 2, 0, 0, 2, 2),
(93, '56', 0, 0, 0, 10, 5, 9, 6),
(94, '57', 0, 1, 1, 0, 0, 2, 0),
(95, '58', 9, 1, 0, 0, 0, 1, 0),
(96, '59', 0, 0, 0, 2, 2, 0, 4),
(97, '60', 0, 0, 0, 1, 1, 2, 0),
(98, '61', 1, 0, 0, 0, 0, 0, 1),
(99, '62', 0, 0, 0, 1, 0, 1, 0),
(100, '63', 0, 0, 0, 1, 0, 1, 0),
(101, '64', 0, 0, 0, 0, 1, 1, 0),
(102, '65', 1, 0, 0, 0, 0, 1, 0),
(103, '66', 0, 0, 1, 0, 0, 0, 1),
(104, '67', 0, 0, 0, 0, 2, 0, 2),
(105, '68', 0, 0, 0, 1, 0, 1, 0),
(106, '69', 0, 0, 0, 1, 0, 1, 0),
(107, '70', 0, 1, 0, 0, 0, 1, 0),
(108, '71', 0, 0, 1, 2, 1, 1, 3),
(109, '73', 0, 0, 0, 1, 0, 1, 0),
(110, '74', 0, 0, 1, 0, 0, 1, 0),
(111, '75', 0, 0, 0, 0, 1, 0, 1),
(112, '76', 0, 0, 0, 1, 0, 1, 0),
(113, '77', 1, 0, 0, 0, 0, 1, 0),
(114, '78', 2, 1, 1, 1, 0, 2, 3),
(115, '79', 0, 0, 1, 0, 0, 1, 0),
(116, '80', 0, 2, 2, 1, 0, 1, 4),
(117, '81', 0, 0, 1, 2, 1, 4, 0),
(118, '82', 0, 0, 0, 0, 2, 0, 2),
(119, '83', 0, 0, 0, 1, 0, 0, 1),
(120, '84', 1, 0, 0, 2, 1, 1, 3),
(121, '85', 0, 1, 0, 7, 0, 5, 3),
(122, '86', 0, 0, 0, 0, 2, 1, 1),
(123, '87', 0, 0, 3, 4, 2, 6, 3),
(124, '88', 0, 0, 1, 0, 0, 1, 0),
(125, '89', 0, 0, 1, 1, 0, 0, 2),
(126, '72', 0, 0, 0, 1, 0, 1, 0),
(127, '90', 0, 1, 0, 2, 0, 2, 1),
(128, '91', 0, 0, 1, 0, 0, 1, 0),
(129, '92', 0, 0, 2, 3, 0, 3, 2),
(130, '93', 0, 1, 0, 0, 0, 0, 1),
(131, '94', 1, 0, 0, 1, 1, 1, 2),
(132, '95', 0, 0, 1, 0, 0, 1, 0),
(133, '96', 0, 0, 0, 1, 0, 0, 1),
(134, '97', 1, 1, 4, 2, 0, 5, 3),
(135, '98', 0, 1, 0, 0, 0, 1, 0),
(136, '99', 0, 0, 1, 0, 0, 1, 0),
(137, '100', 0, 0, 0, 0, 1, 0, 1);

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
(24, '01', 'Rheumatism', 'Ini deskripsi Reumatishm', ''),
(25, '02', 'Dermatitis', 'Ini deskripsi dermatitis', ''),
(26, '03', 'Hypertension', 'ini deskripsi hipertensi', ''),
(30, '04', 'Erythema', 'ini deskripsi Acute Erythema', ''),
(37, '05', 'Gatritis', 'Ini penyakit Gatritis', ''),
(40, '06', 'Diarrhea and Gastroentitis', 'Ini deskripsi Gastroentitis', ''),
(41, '07', 'Injury', 'Ini deskripsi injury', ''),
(42, '08', 'Fever', 'Ini deskripsi Fever', ''),
(43, '09', 'Toothache', 'Ini deskripsi toothache', ''),
(44, '10', 'Sore eyes', 'Ini deskripsi sore eyes', ''),
(45, '11', 'Scabies', 'Ini deskripsi scabies', ''),
(46, '12', 'Respiratory Infection', 'Ini deskripsi Respiratory Infection', ''),
(47, '13', 'Pyoderma', 'Ini deskripsi Pyoderma', ''),
(48, '14', 'Myalgia', 'Ini deskripsi myalgia', ''),
(49, '15', 'Jaundice', 'Ini deskripsi Jaundice', ''),
(50, '16', 'Headache', 'Ini deskripsi Headache', ''),
(51, '17', 'Allergic', 'Ini deskripsi', ''),
(52, '18', 'Cough', 'Ini deskripsi', ''),
(53, '19', 'Acute Pharyngitis', 'Ini deskripsi', ''),
(54, '20', 'Acute Bronchitis', 'Ini deskripsi', ''),
(55, '21', 'TBC', 'Ini deskripsi', ''),
(56, '22', 'Gastritis and duodenitis', 'Ini deskripsi', ''),
(57, '23', 'Earache', 'Ini deskripsi', ''),
(58, '24', 'Diabetes', 'Ini deskripsi', ''),
(59, '25', 'Polyarthritis', 'Ini deskripsi', ''),
(62, '27', 'Heart Failure', 'Ini deskripsi', ''),
(63, '28', 'Stroke', 'Ini deskripsi', ''),
(64, '29', 'Breast Cancer', 'Ini deskripsi', ''),
(65, '30', 'Myocardial Infarction', 'Ini deskripsi', ''),
(66, '31', 'Congnetial Malformations of Heart', 'Ini deskripsi', ''),
(67, '32', 'Acute Nasopharyngitis', 'Ini deskripsi', ''),
(68, '33', 'Mumps', 'Ini deskripsi', ''),
(69, '34', 'Urticaria', 'Ini deskripsi', ''),
(70, '35', 'Flatulence', 'Ini deskripsi', ''),
(71, '36', 'Chest Pain', 'Ini deskripsi', ''),
(72, '37', 'Cholelithiasis', 'Ini deskripsi', ''),
(73, '38', 'Irregular mensturation', 'Ini deskripsi', ''),
(74, '39', 'Tendinitis', 'Ini deskripsi', ''),
(76, '40', 'Arthritis', 'Ini deskripsi', ''),
(77, '41', 'Lacrimal', 'Ini deskripsi', ''),
(78, '42', 'Necrosis of Pulp', 'Ini deskripsi', ''),
(79, '43', 'Kidney failure', 'Ini deskripsi', ''),
(80, '44', 'Tonsilitis', 'Ini deskripsi', ''),
(81, '45', 'Influenza', 'Ini deskripsi', ''),
(82, '46', 'Periodontitis', 'Ini deskripsi', ''),
(83, '47', 'Cirrhosis of liver', 'Ini deskripsi', ''),
(84, '48', 'Candidiasis', 'Ini deskripsi', ''),
(85, '49', 'Neuropathy', 'Ini deskripsi', ''),
(86, '50', 'Fever and Infection', 'Ini deskripsi', ''),
(87, '26', 'Pulmonary', 'Ini deskripsi', ''),
(88, '51', 'Typhoid Fever', 'Ini deskripsi', ''),
(89, '52', 'Thrombocytopenia', 'Ini deskripsi', ''),
(90, '53', 'Dyspepsia', 'Ini deskripsi', ''),
(91, '54', 'Fracture', 'Ini deskripsi', ''),
(92, '55', 'Epilepsy', 'Ini deskripsi', ''),
(93, '56', 'Hypertensive heart disease', 'Ini deskripsi', ''),
(94, '57', 'Dsymenorrhea', 'Ini deskripsi', ''),
(95, '58', 'Toothace accertion', 'Ini deskripsi', ''),
(96, '59', 'Inguinal Hernia', 'Ini deskripsi', ''),
(97, '60', 'Gastroesophageal atau GERD', 'Ini deskripsi', ''),
(98, '61', 'Strabismus', 'Ini deskripsi', ''),
(99, '62', 'Kidney disease', 'Ini deskripsi', ''),
(100, '63', 'Atherosclerotic', 'Ini deskripsi', ''),
(101, '64', 'Cervix', 'Ini deskripsi', ''),
(102, '65', 'Bronchopneumonia', 'Ini deskripsi', ''),
(103, '66', 'Cholecytitis', 'Ini deskripsi', ''),
(104, '67', 'Celluitis', 'Ini deskripsi', ''),
(105, '68', 'Neck Pain', 'Ini deskripsi', ''),
(106, '69', 'Kidney Stones', 'Ini deskripsi', ''),
(107, '70', 'Endometrioma', 'Ini deskripsi', ''),
(108, '71', 'Peptic Ulcer', 'Ini deskripsi', ''),
(109, '73', 'Foot and ancle deformities', 'Ini deskripsi', ''),
(110, '74', 'Tachycardia', 'Ini deskripsi', ''),
(111, '75', 'Polyarthritis and Arthritis', 'Ini deskripsi', ''),
(112, '76', 'Bipolar', 'Ini deskripsi', ''),
(113, '77', 'Anemia', 'Ini deskripsi', ''),
(114, '78', 'Oral disease', 'Ini deskripsi', ''),
(115, '79', 'Haemorrhoids', 'Ini deskripsi', ''),
(116, '80', 'Schizophrenia', 'Ini deskripsi', ''),
(117, '81', 'Paresthesia', 'Ini deskripsi', ''),
(118, '82', 'Nerve inflammation', 'Ini deskripsi', ''),
(119, '83', 'Anal Fistula', 'Ini deskripsi', ''),
(120, '84', 'Asthma', 'Ini deskripsi', ''),
(121, '85', 'Soft tissue disorders', 'Ini deskripsi', ''),
(122, '86', 'Ischaemic', 'Ini deskripsi', ''),
(123, '87', 'Arthrosis', 'Ini deskripsi', ''),
(124, '88', 'Typhoid and paratyphoid fevers', 'Ini deskripsi', ''),
(125, '89', 'Left Ventricular Failure', 'Ini deskripsi', ''),
(126, '72', 'Surfers Eyes', 'Ini deskripsi', ''),
(127, '90', 'Vertigo', 'Ini deskripsi', ''),
(128, '91', 'Pleurisy Tuberculosis', 'Ini deskripsi', ''),
(129, '92', 'Nerve', 'Ini deskripsi', ''),
(130, '93', 'Otalgia', 'Ini deskripsi', ''),
(131, '94', 'Gastric Ulcer', 'Ini deskripsi', ''),
(132, '95', 'Tic Disorder', 'Ini deskripsi', ''),
(133, '96', 'ASCVD', 'Ini deskripsi', ''),
(134, '97', 'Abscess', 'Ini deskripsi', ''),
(135, '98', 'Malignant Tumor', 'Ini deskripsi', ''),
(136, '99', 'Shizoaffective', 'Ini deskripsi', ''),
(137, '100', 'Back Pain', 'Ini deskripsi', '');

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
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_hasil`
--
ALTER TABLE `data_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
