-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 01:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(20) NOT NULL,
  `nama_guru` varchar(32) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `gol` varchar(7) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `pendidikan_terakhir` varchar(10) NOT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nip`, `pangkat`, `gol`, `status`, `pendidikan_terakhir`, `no_telp`, `email`) VALUES
('gru00001', 'H. KAMUS.S.Pd.MM', '197104032000031004', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00002', 'Dra.Hj. Tatik rufiah', '196209211989032008', 'Pembina Tk. 1', 'IV/b', 'PNS', 's1', '', ''),
('gru00003', 'Dra.  Hj. INDRI  SRIWULAN, MM', '19630107 199003 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00004', 'Dra. Hj.  WAHYUNING  KISMONO', '19650112 198903 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's1', '', ''),
('gru00005', 'Drs.  PUTUT  HARIYANTO', '19630710 198903 1 02', 'Pembina Tk. 1', 'IV/b', 'PNS', 's1', '', ''),
('gru00006', 'MUSTIPAH, SPd, MM', '19650220 198903 2 01', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00007', 'WORONINGSIH, SE, MM ', '19640602 198903 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00008', 'Hj. PUJI  KANTI  ASTUTI, SE, MM', '19651001 198903 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00009', 'GEMINIWATI, SE, MM', '19650713 198903 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00010', 'Dra. Hj. SRI INDAH ASNI WINARSIH', '19651116 199303 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's1', '', ''),
('gru00011', 'ELISABETH ANDRIANINGTYAS, SE, MM', '19641209 199103 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00012', 'RISA RAHAYU, MPd', '19700318 199903 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00013', 'Drs. RACHMAD W, M.Pd', '19690109 199512 1 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00014', 'H. AKHIR  PURNOMO, SPd, MPd', '19730715 199601 1 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00015', 'ARIN YUNI PUSPORINI, SPd, MAK', '19710616 199512 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00016', 'SUGIYONO, SPd, MPd', '19720413 199601 1 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's2', '', ''),
('gru00017', 'WIWIK  FATMAWATI, SPd', '19740705 199601 2 00', 'Pembina Tk. 1', 'IV/b', 'PNS', 's1', '', ''),
('gru00018', 'BUDI  PRAPTONO, SPd', '19640627 198703 1 01', 'Pembina', 'IV/a', 'PNS', 's1', '', ''),
('gru00019', 'Drs.  PONANG  BIHANANTO', '19641127 199412 1 00', 'Pembina', 'IV/a', 'PNS', 's1', '', ''),
('gru00020', 'SILVIATI, SPd', '19681210 199301 2 00', 'Pembina', 'IV/a', 'PNS', 's1', '', ''),
('gru00021', 'HARI  EFFENDI, SPd, MPd', '19700514 199703 1 00', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00022', 'Hj. DWI  PURWATI, SPd', '19641008 200012 2 00', 'Pembina', 'IV/a', 'PNS', 's1', '', ''),
('gru00023', 'NURKHOLIS, SPd, MHI, MThI', '19730610 199802 1 00', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00024', 'Drs. AGUS MARDIARTO, MM', '19670812 200701 1 02', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00025', 'Drs. SUBIJANTO, MPd', '19640721 200701 1 01', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00026', 'Drs.  BAMBANG HERI SASONGKO, MM', '19630905 200701 1 01', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00027', 'Dra.  LILIK ANDIANI', '19630712 200701 2 00', 'Pembina', 'IV/a', 'PNS', 's1', '', ''),
('gru00028', 'RETNO INDRAWATI, SPd', '19750314 200012 2 00', 'Pembina', 'IV/a', 'PNS', 's1', '', ''),
('gru00029', 'Hj. SRI INAH, SPd, MM', '19680919 200701 2 02', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00030', 'PUJI HASTUTI, SPd, MAK', '19670819 200801 2 00', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00031', 'Dra. KUSRIATIN, MM', '19680102 200801 2 00', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00032', 'Hj. TJATUR LIESTIJAWATI, SPd, MP', '19700826 200701 2 01', 'Pembina', 'IV/a', 'PNS', 's2', '', ''),
('gru00033', 'Dra. TATIK MARGIATI', '19630903 200701 2 00', 'Pembina', 'IV/a', 'PNS', 's1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
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
-- Table structure for table `jadwal`
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
-- Table structure for table `jadwal_khusus`
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
-- Dumping data for table `jadwal_khusus`
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
-- Table structure for table `jampel`
--

CREATE TABLE `jampel` (
  `id_jampel` int(11) NOT NULL,
  `jamke` varchar(50) NOT NULL,
  `waktu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jampel`
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
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('jrs00001', 'MULTIMEDIA'),
('jrs00002', 'REKAYASA PERANGKAT LUNAK'),
('jrs00003', 'DESAIN KOMUNIKASI VISUAL'),
('jrs00004', 'FARMASI KLINIS dan KOMUNITAS'),
('jrs00005', 'Bisnis Retail'),
('jrs00006', 'Manajemen Perkantoran'),
('jrs00007', 'Akutansi'),
('jrs00008', 'Layanan Perbankan'),
('jrs00009', 'Usaha Layanan Wisata'),
('jrs00010', 'Bisnis Daring dan Pemasaran'),
('jrs00011', 'Otomatisasi dan Tata Kelola Perk'),
('jrs00012', 'Akutansi dan Keuangan Lembaga'),
('jrs00013', 'Perbankan dan Keuangan Mikro'),
('jrs00014', 'Usaha Perjalanan Wisata');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(16) NOT NULL,
  `kelas` varchar(150) NOT NULL,
  `id_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_jurusan`) VALUES
('kls00001', 'XI MM 1', 'jrs00001'),
('kls00002', 'XI MM 2', 'jrs00001'),
('kls00003', 'XI MM 3', 'jrs00001'),
('kls00004', 'XI MM 4', 'jrs00001'),
('kls00005', 'X RPL 1', 'jrs00002'),
('kls00006', 'X RPL 2', 'jrs00002'),
('kls00007', 'X DKV 1', 'jrs00003'),
('kls00008', 'X DKV 2', 'jrs00003'),
('kls00009', 'X FKK 1', 'jrs00004'),
('kls00010', 'X FKK 2', 'jrs00004'),
('kls00011', 'X BR 1', 'jrs00005'),
('kls00012', 'X BR 2', 'jrs00005'),
('kls00013', 'X BR 3', 'jrs00005'),
('kls00014', 'X BR 4', 'jrs00005'),
('kls00015', 'X MPK 1', 'jrs00006'),
('kls00016', 'X MPK 2', 'jrs00006'),
('kls00017', 'X MPK 3', 'jrs00006'),
('kls00018', 'X MPK 4', 'jrs00006'),
('kls00019', 'X AK 1', 'jrs00007'),
('kls00020', 'X AK 2', 'jrs00007'),
('kls00021', 'X AK 3', 'jrs00007'),
('kls00022', 'X AK 4', 'jrs00006'),
('kls00023', 'X LPB 1', 'jrs00008'),
('kls00024', 'X LPB 2', 'jrs00008'),
('kls00025', 'X LPB 3', 'jrs00008'),
('kls00026', 'X LPB 4', 'jrs00008'),
('kls00027', 'X ULW 1', 'jrs00009'),
('kls00028', 'X ULW 2', 'jrs00009'),
('kls00029', 'X AK 4', 'jrs00007'),
('kls00030', 'XI FKK 1', 'jrs00004'),
('kls00031', 'XI FKK 2', 'jrs00004'),
('kls00032', 'XI BDP 1', 'jrs00010'),
('kls00033', 'XI BDP 2', 'jrs00010'),
('kls00034', 'XI BDP 3', 'jrs00010'),
('kls00035', 'XI BDP 4', 'jrs00010'),
('kls00036', 'XI OTKP 1', 'jrs00011'),
('kls00037', 'XI OTKP 2', 'jrs00011'),
('kls00038', 'XI OTKP 3', 'jrs00011'),
('kls00039', 'XI OTKP 4', 'jrs00011'),
('kls00040', 'XI AKL 1', 'jrs00012'),
('kls00041', 'XI AKL 2', 'jrs00012'),
('kls00042', 'XI AKL 3', 'jrs00012'),
('kls00043', 'XI AKL 4', 'jrs00012'),
('kls00044', 'XI PKM 1', 'jrs00013'),
('kls00045', 'XI PKM 2', 'jrs00013'),
('kls00046', 'XI PKM 3', 'jrs00013'),
('kls00047', 'XI PKM 4', 'jrs00013'),
('kls00048', 'XI UPW 1', 'jrs00014'),
('kls00049', 'XI UPW 2', 'jrs00014'),
('kls00050', 'XII MM 1', 'jrs00001'),
('kls00051', 'XII MM 2', 'jrs00001'),
('kls00052', 'XII MM 3', 'jrs00001'),
('kls00053', 'XII MM 4', 'jrs00001'),
('kls00054', 'XII FKK 1', 'jrs00004'),
('kls00055', 'XII FKK 2', 'jrs00004'),
('kls00056', 'XII BDP 1', 'jrs00010'),
('kls00057', 'XII BDP 2', 'jrs00010'),
('kls00058', 'XII BDP 3', 'jrs00010'),
('kls00059', 'XII BDP 4', 'jrs00010'),
('kls00060', 'XII OTKP 1', 'jrs00011'),
('kls00061', 'XII OTKP 2', 'jrs00011'),
('kls00062', 'XII OTKP 3', 'jrs00011'),
('kls00063', 'XII OTKP 4', 'jrs00011'),
('kls00064', 'XII AKL 1', 'jrs00012'),
('kls00065', 'XII AKL 2', 'jrs00012'),
('kls00066', 'XII AKL 3', 'jrs00012'),
('kls00067', 'XII AKL 4', 'jrs00012'),
('kls00068', 'XII PKM 1', 'jrs00013'),
('kls00069', 'XII PKM 2', 'jrs00013'),
('kls00070', 'XII PKM 3', 'jrs00013'),
('kls00071', 'XII PKM 4', 'jrs00013'),
('kls00072', 'XII UPW 1', 'jrs00014'),
('kls00073', 'XII UPW 2', 'jrs00014');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `id_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `id_guru`) VALUES
('mpl00001', 'bahasa indonesia', 'gru00012'),
('mpl00002', 'matematika', 'gru00019'),
('mpl00003', 'matematika', 'gru00020');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
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
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `id_kelas`, `id_ruang`, `id_mapel`, `id_hari`, `id_jampel`) VALUES
('jdwl00001', 'kls00001', 'rag00001', 'mpl00001', 1, 1),
('jdwl00002', 'kls00001', 'rag00001', 'mpl00001', 1, 2),
('jdwl00003', 'kls00001', 'rag00001', 'mpl00001', 1, 3),
('jdwl00004', 'kls00001', 'rag00001', 'mpl00001', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `request_jadwal`
--

CREATE TABLE `request_jadwal` (
  `id_request` int(10) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_jadwal`
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
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_ruang` varchar(150) NOT NULL,
  `kapasitas` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kapasitas`) VALUES
('rag00001', 'R. ANGGREK 1', '40'),
('rag00002', 'R. ANGGREK 2', '40'),
('rag00003', 'R. TANJUNG 1', '40'),
('rag00004', 'R. TANJUNG 2', '40'),
('rag00005', 'R. CERME 1', '40'),
('rag00006', 'R. CERME 2', '40'),
('rag00007', 'R. PALEM 1', '40'),
('rag00008', 'R. PALEM 2', '40'),
('rag00009', 'R. PALEM 3', '40'),
('rag00010', 'R. PALEM 4', '40'),
('rag00011', 'R. SONO 1', '40'),
('rag00012', 'R. SONO 2', '40'),
('rag00013', 'R. PISANG KIPAS', '40'),
('rag00014', 'R. NANGKA 1', '40'),
('rag00015', 'R. NANGKA 2', '40'),
('rag00016', 'R. NANGKA 3', '40'),
('rag00017', 'R. NANGKA 4', '40'),
('rag00018', 'R. JAMBU 1', '40'),
('rag00019', 'R. JAMBU 2', '40'),
('rag00020', 'R. JAMBU 3', '40'),
('rag00021', 'R. SENSIVERA 1', '40'),
('rag00022', 'R. SENSIVERA 2', '40'),
('rag00023', 'R. SENSIVERA 3', '40'),
('rag00024', 'R. SENSIVERA 4', '40'),
('rag00025', 'R. PRAKTIK OTKP', '40'),
('rag00026', 'R. PURING 1', '40'),
('rag00027', 'R. PURING 2', '40'),
('rag00028', 'R. PURING 3', '40'),
('rag00029', 'R. PURING 4', '40'),
('rag00030', 'R. PURING 5', '40'),
('rag00031', 'R. BLIMBING 1', '40'),
('rag00032', 'R. BLIMBING 2', '40'),
('rag00033', 'R. BLIMBING 3', '40'),
('rag00034', 'R. KEROHANIAN', '40'),
('rag00035', 'R. MANGGA 1', '40'),
('rag00036', 'R. MANGGA 2', '40'),
('rag00037', 'R. MANGGA 3', '40'),
('rag00038', 'LAB. KOMP. MMA', '40'),
('rag00039', 'LAB. KOMP. MMB', '40'),
('rag00040', 'LAB. KOMP. BDP', '40'),
('rag00041', 'LAB. KOMP. OTKP', '40'),
('rag00042', 'LAB. KOMP. ATW', '40'),
('rag00043', 'LAB. KOMP. AKL', '40'),
('rag00044', 'LAB. STW', '40'),
('rag00045', 'LAB. KOMP. PKM', '40'),
('rag00046', 'LAB. PRAKTIK BANK', '40'),
('rag00047', 'LAB. PRAKTIK APK', '40'),
('rag00048', 'R. TERAS MASJID 1', '40'),
('rag00049', 'R. TERAS MASJID 2', '40'),
('rag00050', 'R. TERAS MASJID 3', '40'),
('rag00051', 'R. TERAS MASJID 4', '40'),
('rag00052', 'R. GAZEBO PERPUS', '40'),
('rag00053', 'R. PERPUS', '40'),
('rag00054', 'R. APUNG 1', '40'),
('rag00055', 'R. APUNG 2', '40'),
('rag00056', 'R. LAB. TENIS', '40'),
('rag00057', 'R. AULA 1', '40'),
('rag00058', 'R. AULA 2', '40'),
('rag00059', 'R. AULA 4', '40'),
('rag00060', 'R. APUNG 3', '40'),
('rag00061', 'RPS MM', '40'),
('rag00062', 'RPS BDP', '40'),
('rag00063', 'R. PALEM 6.b', '40'),
('rag00064', 'STUDIO', '40'),
('rag00065', 'PERAKITAN MM', '40'),
('rag00066', 'RUANG PBK', '40');

-- --------------------------------------------------------

--
-- Table structure for table `rumusan`
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
-- Dumping data for table `rumusan`
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
-- Table structure for table `tugas_guru`
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
-- Dumping data for table `tugas_guru`
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_khusus`
--
ALTER TABLE `jadwal_khusus`
  ADD PRIMARY KEY (`id_jadwal_khusus`);

--
-- Indexes for table `jampel`
--
ALTER TABLE `jampel`
  ADD PRIMARY KEY (`id_jampel`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`,`id_ruang`,`id_mapel`,`id_hari`,`id_jampel`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_jampel` (`id_jampel`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `request_jadwal`
--
ALTER TABLE `request_jadwal`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `rumusan`
--
ALTER TABLE `rumusan`
  ADD PRIMARY KEY (`id_rumusan`);

--
-- Indexes for table `tugas_guru`
--
ALTER TABLE `tugas_guru`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`kode_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_khusus`
--
ALTER TABLE `jadwal_khusus`
  MODIFY `id_jadwal_khusus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `request_jadwal`
--
ALTER TABLE `request_jadwal`
  MODIFY `id_request` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rumusan`
--
ALTER TABLE `rumusan`
  MODIFY `id_rumusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `penjadwalan`
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
