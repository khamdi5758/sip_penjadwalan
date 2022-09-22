-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2022 pada 00.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(20) NOT NULL,
  `nama_guru` varchar(32) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pendidikan_terakhir` varchar(10) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `code_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `status`, `pendidikan_terakhir`, `no_telp`, `email`, `code_color`) VALUES
('1', 'Juki Irfansyah, S.Kom., M.Pd', 'tetap', 's2', '087', 'www@mail.com', '#f7d794'),
('2', 'S. A. Adi Lukito, S.T', 'tetap', 's1', '085', 'www@mail.com', '#778beb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jum\'at'),
(6, 'sabtu'),
(7, 'minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(20) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `jumlah_sesi` int(11) NOT NULL,
  `lama_sesi` int(11) NOT NULL,
  `jam_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_khusus`
--

CREATE TABLE `jadwal_khusus` (
  `id_jadwal_khusus` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `keterangan` varchar(32) NOT NULL,
  `sesi` varchar(2) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_khusus`
--

INSERT INTO `jadwal_khusus` (`id_jadwal_khusus`, `kelas`, `keterangan`, `sesi`, `hari`, `durasi`) VALUES
(1, 'X', 'upacara', '0', 'Senin', 60),
(2, 'XI', 'upacara', '0', 'Senin', 60),
(3, 'XII', 'upacara', '0', 'Senin', 60),
(4, 'X', 'istirahat 1', '5', 'Senin', 30),
(5, 'XI', 'istirahat 1', '5', 'Senin', 30),
(6, 'XII', 'istirahat 1', '5', 'Senin', 30),
(7, 'X', 'istirahat 1', '5', 'Selasa', 30),
(8, 'XI', 'istirahat 1', '5', 'Selasa', 30),
(9, 'XII', 'istirahat 1', '5', 'Selasa', 30),
(10, 'X', 'istirahat 1', '5', 'Rabu', 30),
(11, 'XI', 'istirahat 1', '5', 'Rabu', 30),
(12, 'XII', 'istirahat 1', '5', 'Rabu', 30),
(13, 'X', 'istirahat 1', '5', 'Kamis', 30),
(14, 'XI', 'istirahat 1', '5', 'Kamis', 30),
(15, 'XII', 'istirahat 1', '5', 'Kamis', 30),
(16, 'X', 'istirahat 1', '5', 'Sabtu', 30),
(17, 'XI', 'istirahat 1', '5', 'Sabtu', 30),
(18, 'XII', 'istirahat 1', '5', 'Sabtu', 30),
(19, 'X', 'istirahat 1', '5', 'Jum`at', 20),
(20, 'XI', 'istirahat 1', '5', 'Jum`at', 20),
(21, 'XII', 'istirahat 1', '5', 'Jum`at', 20),
(22, 'X', 'istirahat 2', '9', 'Senin', 15),
(23, 'XI', 'istirahat 2', '9', 'Senin', 15),
(24, 'XII', 'istirahat 2', '9', 'Senin', 15),
(25, 'X', 'istirahat 2', '9', 'Selasa', 15),
(26, 'XI', 'istirahat 2', '9', 'Selasa', 15),
(27, 'XII', 'istirahat 2', '9', 'Selasa', 15),
(28, 'X', 'istirahat 2', '9', 'Rabu', 15),
(29, 'XI', 'istirahat 2', '9', 'Rabu', 15),
(30, 'XII', 'istirahat 2', '9', 'Rabu', 15),
(31, 'X', 'istirahat 2', '9', 'Kamis', 15),
(32, 'XI', 'istirahat 2', '9', 'Kamis', 15),
(33, 'XII', 'istirahat 2', '9', 'Kamis', 15),
(34, 'X', 'istirahat 2', '9', 'Sabtu', 15),
(35, 'XI', 'istirahat 2', '9', 'Sabtu', 15),
(36, 'XII', 'istirahat 2', '9', 'Sabtu', 15),
(37, 'X', 'extrakulikuler', '8', 'Jum`at', 120),
(38, 'XI', 'extrakulikuler', '8', 'Jum`at', 120),
(39, 'XII', 'extrakulikuler', '8', 'Jum`at', 120),
(40, 'X', 'extrakulikuler', '10', 'Sabtu', 35),
(41, 'X', 'extrakulikuler', '11', 'Sabtu', 35),
(42, 'XII', '-', '10', 'Sabtu', 25),
(43, 'XII', '-', '11', 'Sabtu', 25),
(44, 'X', 'Sholat Dhuha', '0', 'Selasa', 30),
(45, 'XI', 'Sholat Dhuha', '0', 'Selasa', 30),
(46, 'XII', 'Sholat Dhuha', '0', 'Selasa', 30),
(47, 'X', 'Sholat Dhuha', '0', 'Rabu', 30),
(48, 'XI', 'Sholat Dhuha', '0', 'Rabu', 30),
(49, 'XII', 'Sholat Dhuha', '0', 'Rabu', 30),
(50, 'X', 'Sholat Dhuha', '0', 'Kamis', 30),
(51, 'XI', 'Sholat Dhuha', '0', 'Kamis', 30),
(52, 'XII', 'Sholat Dhuha', '0', 'Kamis', 30),
(53, 'X', 'Sholat Dhuha', '0', 'Jum`at', 30),
(54, 'XI', 'Sholat Dhuha', '0', 'Jum`at', 30),
(55, 'XII', 'Sholat Dhuha', '0', 'Jum`at', 30),
(56, 'X', 'Sholat Dhuha', '0', 'Sabtu', 30),
(57, 'XI', 'Sholat Dhuha', '0', 'Sabtu', 30),
(58, 'XII', 'Sholat Dhuha', '0', 'Sabtu', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jampel`
--

CREATE TABLE `jampel` (
  `id_jampel` int(11) NOT NULL,
  `jamke` varchar(50) NOT NULL,
  `waktu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jampel`
--

INSERT INTO `jampel` (`id_jampel`, `jamke`, `waktu`) VALUES
(1, '1', '07:00-07:40'),
(2, '2', '07:40-08:20'),
(3, '3', '08:20-09:00'),
(4, '4', '09:00-09:40'),
(5, 'istirahat', '09:40-10:10'),
(6, '5', '10:10-10:50'),
(7, '6', '10:50--11:30'),
(8, '7', '11:30-12:10'),
(9, 'istirahat', '12:10-12:50'),
(10, '8', '12:50-13:30'),
(11, '9', '13:30-14:10'),
(12, '10', '14:10-14:50'),
(13, '11', '14:50-15:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('jrs00001', 'MULTIMEDIA'),
('jrs00002', 'REKAYASA PERANGKAT LUNAK'),
('jrs00003', 'DESAIN KOMUNIKASI VISUAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(16) NOT NULL,
  `kelas` varchar(150) NOT NULL,
  `id_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_jurusan`) VALUES
('kls00001', 'XI MM 1', 'jrs00001'),
('kls00002', 'XI MM 2', 'jrs00001'),
('kls00003', 'XI MM 3', 'jrs00001'),
('kls00004', 'XI MM 4', 'jrs00001'),
('kls00005', 'X RPL 1', 'jrs00002'),
('kls00006', 'X RPL 2', 'jrs00002'),
('kls00007', 'X DKV 1', 'jrs00003'),
('kls00008', 'X DKV 2', 'jrs00003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `id_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `id_guru`) VALUES
('3492', 'informatika', '2'),
('86', 'Bahasa Inggris', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_kelas` varchar(16) CHARACTER SET latin1 NOT NULL,
  `id_ruang` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_mapel` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_jampel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `id_kelas`, `id_ruang`, `id_mapel`, `id_hari`, `id_jampel`) VALUES
('jdwl00004', 'kls00001', 'rag00001', '3492', 1, 4),
('jdwl00001', 'kls00001', 'rag00001', '86', 1, 1),
('jdwl00002', 'kls00001', 'rag00001', '86', 1, 2),
('jdwl00003', 'kls00001', 'rag00001', '86', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_jadwal`
--

CREATE TABLE `request_jadwal` (
  `id_request` int(10) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request_jadwal`
--

INSERT INTO `request_jadwal` (`id_request`, `id_guru`, `hari`) VALUES
(10, '5', 'Senin,Selasa,Rabu'),
(11, '4', 'Senin,Selasa,Kamis,Sabtu'),
(12, '8', 'Senin,Kamis,Jum`at'),
(13, '9', 'Rabu,Kamis'),
(14, '19', 'Senin,Selasa,Rabu,Kamis,Jum`at'),
(15, '22', 'Jum`at,Sabtu'),
(16, '10', 'Sabtu'),
(17, '11', 'Senin,Kamis,Sabtu'),
(18, '14', 'Senin,Rabu,Kamis'),
(19, '20', 'Jum`at,Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_ruang` varchar(150) NOT NULL,
  `kapasitas` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kapasitas`) VALUES
('rag00001', 'banana 1', '29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumusan`
--

CREATE TABLE `rumusan` (
  `id_rumusan` int(11) NOT NULL,
  `id_guru` int(5) NOT NULL,
  `hari_request` varchar(255) NOT NULL,
  `kelas` mediumtext NOT NULL,
  `total` int(11) NOT NULL,
  `beban_kerja` int(11) NOT NULL,
  `hasil_rumusan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rumusan`
--

INSERT INTO `rumusan` (`id_rumusan`, `id_guru`, `hari_request`, `kelas`, `total`, `beban_kerja`, `hasil_rumusan`) VALUES
(159, 1, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', '', 0, 0, 0),
(160, 2, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIIaknA,XIIaknB,XIIkntrA', 147, 9, 0.06),
(161, 3, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', '', 0, 0, 0),
(162, 4, 'Senin,Selasa,Kamis,Sabtu', 'XIIaknA,XIIaknB', 68, 31, 1.46),
(163, 5, 'Senin,Selasa,Rabu', 'XaknA,XIaknA,XIIaknA,XIIaknB,XIIkntrA,XIkntrA,XkntrA', 189, 20, 1.11),
(164, 6, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XaknA,XIaknA,XIIaknA,XIIaknB,XIIkntrA,XIkntrA,XkntrA', 347, 24, 0.07),
(165, 7, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XaknA,XIkntrA,XkntrA', 149, 19, 0.13),
(166, 8, 'Senin,Kamis,Jum`at', 'XaknA,XIaknA,XIkntrA,XkntrA', 96, 20, 1.21),
(167, 9, 'Rabu,Kamis', 'XaknA,XIaknA,XIkntrA,XkntrA', 72, 8, 1.11),
(168, 10, 'Sabtu', 'XIIaknA', 7, 3, 1.43),
(169, 11, 'Senin,Kamis,Sabtu', 'XaknA,XIkntrA,XkntrA', 77, 18, 1.23),
(170, 12, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIaknA,XIkntrA', 102, 6, 0.06),
(171, 13, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XaknA,XkntrA', 98, 4, 0.04),
(172, 14, 'Senin,Rabu,Kamis', 'XaknA,XIaknA,XIIaknB,XIIkntrA,XkntrA', 135, 25, 1.19),
(173, 15, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIaknA,XIkntrA', 102, 14, 0.14),
(174, 16, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIIaknA,XIIaknB,XIIkntrA', 147, 12, 0.08),
(175, 17, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIaknA,XIIaknA,XIIaknB', 149, 29, 0.19),
(176, 18, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XaknA,XkntrA', 98, 6, 0.06),
(177, 19, 'Senin,Selasa,Rabu,Kamis,Jum`at', 'XaknA,XIaknA,XIIaknA,XIIaknB,XIIkntrA,XIkntrA,XkntrA', 294, 7, 1.02),
(178, 20, 'Jum`at,Sabtu', 'XaknA,XkntrA', 26, 6, 1.23),
(179, 21, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIaknA,XIIaknA,XIIaknB,XIIkntrA,XIkntrA', 249, 10, 0.04),
(180, 22, 'Jum`at,Sabtu', 'XIIkntrA', 13, 8, 1.62),
(181, 23, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XaknA,XIaknA,XIIaknA,XIIaknB', 198, 29, 0.15),
(182, 24, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XIIkntrA,XIkntrA', 100, 31, 0.31),
(183, 25, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', 'XaknA,XIaknA,XIkntrA,XkntrA', 200, 8, 0.04);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_guru`
--

CREATE TABLE `tugas_guru` (
  `id_tugas` varchar(16) NOT NULL,
  `id_guru` varchar(16) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `kode_mapel` varchar(8) NOT NULL,
  `id_kelas` varchar(16) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `sisa_jam` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `beban_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas_guru`
--

INSERT INTO `tugas_guru` (`id_tugas`, `id_guru`, `id_mapel`, `kode_mapel`, `id_kelas`, `tahun_ajaran`, `sisa_jam`, `status`, `beban_jam`) VALUES
('10-74-XIIaknA', '10', '74', 'U', 'XIIaknA', '', 0, '1', 3),
('11-22-XIkntrA', '11', '22', 'AM', 'XIkntrA', '', 0, '1', 6),
('11-41-XaknA', '11', '41', 'H', 'XaknA', '', 0, '1', 3),
('11-43-XaknA', '11', '43', 'G', 'XaknA', '', 0, '1', 3),
('11-5-XkntrA', '11', '5', 'H', 'XkntrA', '', 0, '1', 3),
('11-7-XkntrA', '11', '7', 'G', 'XkntrA', '', 0, '1', 3),
('12-16-XIkntrA', '12', '16', 'A', 'XIkntrA', '', 0, '1', 3),
('12-53-XIaknA', '12', '53', 'A', 'XIaknA', '', 3, '0', 3),
('13-2-XkntrA', '13', '2', 'B', 'XkntrA', '', 0, '1', 2),
('13-38-XaknA', '13', '38', 'B', 'XaknA', '', 0, '1', 2),
('14-11-XkntrA', '14', '11', 'AF', 'XkntrA', '', 0, '1', 2),
('14-13-XkntrA', '14', '13', 'AI', 'XkntrA', '', 4, '0', 4),
('14-35-XIIkntrA', '14', '35', 'AP', 'XIIkntrA', '', 0, '1', 6),
('14-47-XaknA', '14', '47', 'AF', 'XaknA', '', 0, '1', 2),
('14-49-XaknA', '14', '49', 'AE', 'XaknA', '', 0, '1', 2),
('14-52-XaknA', '14', '52', 'AA', 'XaknA', '', 0, '1', 3),
('14-63-XIaknA', '14', '63', 'U', 'XIaknA', '', 0, '1', 3),
('14-74-XIIaknB', '14', '74', 'U', 'XIIaknB', '', 0, '1', 3),
('15-26-XIkntrA', '15', '26', 'Y', 'XIkntrA', '', 0, '1', 7),
('15-64-XIaknA', '15', '64', 'Y', 'XIaknA', '', 0, '1', 7),
('16-30-XIIkntrA', '16', '30', 'D', 'XIIkntrA', '', 0, '1', 4),
('16-68-XIIaknA', '16', '68', 'D', 'XIIaknA', '', 0, '1', 4),
('16-68-XIIaknB', '16', '68', 'D', 'XIIaknB', '', 0, '1', 4),
('17-59-XIaknA', '17', '59', 'AK', 'XIaknA', '', 0, '1', 6),
('17-60-XIaknA', '17', '60', 'AL', 'XIaknA', '', 0, '1', 4),
('17-61-XIaknA', '17', '61', 'W', 'XIaknA', '', 0, '1', 6),
('17-71-XIIaknA', '17', '71', 'AL', 'XIIaknA', '', 4, '0', 4),
('17-71-XIIaknB', '17', '71', 'AL', 'XIIaknB', '', 0, '1', 4),
('17-73-XIIaknB', '17', '73', 'AC', 'XIIaknB', '', 0, '1', 5),
('18-1-XkntrA', '18', '1', 'A', 'XkntrA', '', 3, '0', 3),
('18-37-XaknA', '18', '37', 'A', 'XaknA', '', 3, '0', 3),
('19-76-XkntrA', '19', '76', 'Z', 'XkntrA', '', 0, '1', 1),
('19-77-XIkntrA', '19', '77', 'Z', 'XIkntrA', '', 0, '1', 1),
('19-78-XIIkntrA', '19', '78', 'Z', 'XIIkntrA', '', 0, '1', 1),
('19-79-XaknA', '19', '79', 'Z', 'XaknA', '', 0, '1', 1),
('19-80-XIaknA', '19', '80', 'Z', 'XIaknA', '', 0, '1', 1),
('19-81-XIIaknA', '19', '81', 'Z', 'XIIaknA', '', 0, '1', 1),
('19-81-XIIaknB', '19', '81', 'Z', 'XIIaknB', '', 0, '1', 1),
('2-27-XIIkntrA', '2', '27', 'A', 'XIIkntrA', '', 0, '1', 3),
('2-65-XIIaknA', '2', '65', 'A', 'XIIaknA', '', 0, '1', 3),
('2-65-XIIaknB', '2', '65', 'A', 'XIIaknB', '', 0, '1', 3),
('20-45-XaknA', '20', '45', 'S', 'XaknA', '', 0, '1', 3),
('20-9-XkntrA', '20', '9', 'S', 'XkntrA', '', 0, '1', 3),
('21-17-XIkntrA', '21', '17', 'B', 'XIkntrA', '', 0, '1', 2),
('21-28-XIIkntrA', '21', '28', 'B', 'XIIkntrA', '', 0, '1', 2),
('21-54-XIaknA', '21', '54', 'B', 'XIaknA', '', 0, '1', 2),
('21-66-XIIaknA', '21', '66', 'B', 'XIIaknA', '', 0, '1', 2),
('21-66-XIIaknB', '21', '66', 'B', 'XIIaknB', '', 0, '1', 2),
('22-36-XIIkntrA', '22', '36', 'Y', 'XIIkntrA', '', 0, '1', 8),
('23-50-XaknA', '23', '50', 'AD', 'XaknA', '', 0, '1', 3),
('23-51-XaknA', '23', '51', 'N', 'XaknA', '', 0, '1', 5),
('23-62-XIaknA', '23', '62', 'AC', 'XIaknA', '', 0, '1', 5),
('23-75-XIIaknA', '23', '75', 'Y', 'XIIaknA', '', 0, '1', 8),
('23-75-XIIaknB', '23', '75', 'Y', 'XIIaknB', '', 2, '0', 8),
('24-23-XIkntrA', '24', '23', 'AN', 'XIkntrA', '', 0, '1', 6),
('24-24-XIkntrA', '24', '24', 'AO', 'XIkntrA', '', 0, '1', 6),
('24-32-XIIkntrA', '24', '32', 'AM', 'XIIkntrA', '', 0, '1', 7),
('24-33-XIIkntrA', '24', '33', 'AN', 'XIIkntrA', '', 3, '0', 6),
('24-34-XIIkntrA', '24', '34', 'AO', 'XIIkntrA', '', 2, '0', 6),
('25-82-XkntrA', '25', '82', 'AJ', 'XkntrA', '', 0, '1', 2),
('25-83-XIkntrA', '25', '83', 'AJ', 'XIkntrA', '', 2, '0', 2),
('25-84-XaknA', '25', '84', 'AJ', 'XaknA', '', 0, '1', 2),
('25-85-XIaknA', '25', '85', 'AJ', 'XIaknA', '', 0, '1', 2),
('4-70-XIIaknA', '4', '70', 'AK', 'XIIaknA', '', 0, '1', 7),
('4-70-XIIaknB', '4', '70', 'AK', 'XIIaknB', '', 0, '1', 7),
('4-72-XIIaknA', '4', '72', 'W', 'XIIaknA', '', 0, '1', 6),
('4-72-XIIaknB', '4', '72', 'W', 'XIIaknB', '', 3, '0', 6),
('4-73-XIIaknA', '4', '73', 'AC', 'XIIaknA', '', 0, '1', 5),
('5-18-XIkntrA', '5', '18', 'C', 'XIkntrA', '', 1, '0', 3),
('5-29-XIIkntrA', '5', '29', 'C', 'XIIkntrA', '', 0, '1', 2),
('5-3-XkntrA', '5', '3', 'C', 'XkntrA', '', 0, '1', 4),
('5-39-XaknA', '5', '39', 'C', 'XaknA', '', 0, '1', 4),
('5-55-XIaknA', '5', '55', 'C', 'XIaknA', '', 0, '1', 3),
('5-67-XIIaknA', '5', '67', 'C', 'XIIaknA', '', 0, '1', 2),
('5-67-XIIaknB', '5', '67', 'C', 'XIIaknB', '', 0, '1', 2),
('6-20-XIkntrA', '6', '20', 'F', 'XIkntrA', '', 0, '1', 3),
('6-31-XIIkntrA', '6', '31', 'F', 'XIIkntrA', '', 0, '1', 4),
('6-42-XaknA', '6', '42', 'F', 'XaknA', '', 0, '1', 3),
('6-57-XIaknA', '6', '57', 'F', 'XIaknA', '', 0, '1', 3),
('6-6-XkntrA', '6', '6', 'F', 'XkntrA', '', 0, '1', 3),
('6-69-XIIaknA', '6', '69', 'F', 'XIIaknA', '', 0, '1', 4),
('6-69-XIIaknB', '6', '69', 'F', 'XIIaknB', '', 0, '1', 4),
('7-10-XkntrA', '7', '10', 'J', 'XkntrA', '', 0, '1', 2),
('7-14-XkntrA', '7', '14', 'AG', 'XkntrA', '', 0, '1', 5),
('7-15-XkntrA', '7', '15', 'AH', 'XkntrA', '', 0, '1', 4),
('7-25-XIkntrA', '7', '25', 'AP', 'XIkntrA', '', 2, '0', 6),
('7-46-XaknA', '7', '46', 'J', 'XaknA', '', 0, '1', 2),
('8-12-XkntrA', '8', '12', 'T', 'XkntrA', '', 0, '1', 2),
('8-19-XIkntrA', '8', '19', 'D', 'XIkntrA', '', 1, '0', 4),
('8-4-XkntrA', '8', '4', 'D', 'XkntrA', '', 0, '1', 4),
('8-40-XaknA', '8', '40', 'D', 'XaknA', '', 0, '1', 4),
('8-48-XaknA', '8', '48', 'T', 'XaknA', '', 0, '1', 2),
('8-56-XIaknA', '8', '56', 'D', 'XIaknA', '', 0, '1', 4),
('9-21-XIkntrA', '9', '21', 'I', 'XIkntrA', '', 0, '1', 2),
('9-44-XaknA', '9', '44', 'I', 'XaknA', '', 0, '1', 2),
('9-58-XIaknA', '9', '58', 'I', 'XIaknA', '', 0, '1', 2),
('9-8-XkntrA', '9', '8', 'I', 'XkntrA', '', 0, '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_khusus`
--
ALTER TABLE `jadwal_khusus`
  ADD PRIMARY KEY (`id_jadwal_khusus`);

--
-- Indeks untuk tabel `jampel`
--
ALTER TABLE `jampel`
  ADD PRIMARY KEY (`id_jampel`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`,`id_ruang`,`id_mapel`,`id_hari`,`id_jampel`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_jampel` (`id_jampel`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indeks untuk tabel `request_jadwal`
--
ALTER TABLE `request_jadwal`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `rumusan`
--
ALTER TABLE `rumusan`
  ADD PRIMARY KEY (`id_rumusan`);

--
-- Indeks untuk tabel `tugas_guru`
--
ALTER TABLE `tugas_guru`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`kode_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_khusus`
--
ALTER TABLE `jadwal_khusus`
  MODIFY `id_jadwal_khusus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `request_jadwal`
--
ALTER TABLE `request_jadwal`
  MODIFY `id_request` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rumusan`
--
ALTER TABLE `rumusan`
  MODIFY `id_rumusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `penjadwalan_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `penjadwalan_ibfk_4` FOREIGN KEY (`id_jampel`) REFERENCES `jampel` (`id_jampel`),
  ADD CONSTRAINT `penjadwalan_ibfk_5` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `penjadwalan_ibfk_6` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
