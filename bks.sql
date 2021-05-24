-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 04.02
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bks`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_jenis`
--

CREATE TABLE `reg_jenis` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_jenis`
--

INSERT INTO `reg_jenis` (`id`, `nama_jenis`) VALUES
(1, 'Restoran'),
(2, 'Parkir'),
(3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_kecamatan`
--

CREATE TABLE `reg_kecamatan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_kecamatan`
--

INSERT INTO `reg_kecamatan` (`id`, `kecamatan`) VALUES
(1, 'Gading Cempaka'),
(2, 'Kampung Melayu'),
(3, 'Muara Bangkahulu'),
(4, 'Ratu Agung'),
(5, 'Ratu Samban'),
(6, 'Selebar'),
(7, 'Sungai Serut'),
(8, 'Teluk Segara'),
(9, 'Singaran Pati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_kelurahan`
--

CREATE TABLE `reg_kelurahan` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `kelurahan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_kelurahan`
--

INSERT INTO `reg_kelurahan` (`id`, `id_kecamatan`, `kelurahan`) VALUES
(1, 1, 'Lingkar Barat'),
(2, 1, 'Cempaka Permai'),
(3, 1, 'Padang Harapan'),
(4, 1, 'Jalan Gedang'),
(5, 1, 'Sido Mulyo'),
(6, 2, 'Muara Dua'),
(7, 2, 'Kandang'),
(8, 2, 'Kandang Mas'),
(9, 2, 'Sumber Jaya'),
(10, 2, 'Padang Serai'),
(11, 2, 'Teluk Sepang'),
(12, 3, 'Bentiring'),
(13, 3, 'Bentiring Permai'),
(14, 3, 'Beringin Raya'),
(15, 3, 'Kandang Limun'),
(16, 3, 'Pematang Gubernur'),
(17, 3, 'Rawa Makmur'),
(18, 3, 'Rawa Makmur Permai'),
(19, 4, 'Lempuing'),
(20, 4, 'Kebun Tebeng'),
(21, 4, 'Tanah Patah'),
(22, 4, 'Nusa Indah'),
(23, 4, 'Kebun Kenanga'),
(24, 4, 'Kebun Beler'),
(25, 4, 'Sawah Lebar'),
(26, 4, 'Sawah Lebar Baru'),
(27, 5, 'Anggut Atas'),
(28, 5, 'Anggut Bawah'),
(29, 5, 'Anggut Dalam'),
(30, 5, 'Belakang Pondok'),
(31, 5, 'Kebun Dahri'),
(32, 5, 'Kebun Geran'),
(33, 5, 'Padang Jati'),
(34, 5, 'Penggantungan'),
(35, 5, 'Penurunan'),
(36, 6, 'Betungan'),
(37, 6, 'Bumi Ayu'),
(38, 6, 'Pagar Dewa'),
(39, 6, 'Pekan Sabtu'),
(40, 6, 'Sukarami'),
(41, 6, 'Sumur Dewa'),
(42, 7, 'Kampung Kelawi'),
(43, 7, 'Pasar Bengkulu'),
(44, 7, 'Semarang'),
(45, 7, 'Surabaya'),
(46, 7, 'Tanjung Agung'),
(47, 7, 'Tanjung Jaya'),
(48, 7, 'Suka Merindu'),
(49, 8, 'Bajak'),
(50, 8, 'Pasar Berkas'),
(51, 8, 'Pasar Jitra'),
(52, 8, 'Kampung Bali'),
(53, 8, 'Kebun Keling'),
(54, 8, 'Kebun Ros'),
(55, 8, 'Malabero'),
(56, 8, 'Pasar Baru'),
(57, 8, 'Pasar Melintang'),
(58, 8, 'Pintu Batu'),
(59, 8, 'Pondok Besi'),
(60, 8, 'Sumur Meleleh'),
(61, 8, 'Tengah Padang'),
(62, 9, 'Dusun Besar'),
(63, 9, 'Jembatan Kecil'),
(64, 9, 'Lingkar Timur'),
(65, 9, 'Padang Nangka'),
(66, 9, 'Panorama'),
(67, 9, 'Timur Indah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_registrasi`
--

CREATE TABLE `reg_registrasi` (
  `id` int(11) NOT NULL,
  `nama_op` varchar(150) NOT NULL,
  `npwpd` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jenis` varchar(250) NOT NULL,
  `tgl_registrasi` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_registrasi`
--

INSERT INTO `reg_registrasi` (`id`, `nama_op`, `npwpd`, `nik`, `alamat`, `kecamatan`, `kelurahan`, `status`, `jenis`, `tgl_registrasi`, `image`) VALUES
(1, 'blaa', '12313439', '242489123', 'Jl. Sadang IVBlok C No 001', '1', '2', '1', '1', 1621607911, ''),
(2, 'blaa', '12313439', '242489123', 'Jl. Sadang IVBlok C No 001', '1', '2', '1', '1', 1621608112, ''),
(3, 'meaghito', '177210123', '123123123', 'oke', '1', '1', '1', '1', 1621608948, ''),
(4, 'tes', '654573', '5677557', 'rtrtrte', '5', '33', '2', '2', 1621608986, ''),
(5, 'meaghito', '12313439', '5677557', 'Jl. Sadang IVBlok C No 001', '', '', '1', '1', 1621612325, ''),
(6, 'Tiyo', '8301983', '1771020609950008', 'Jl. Sadang IVBlok C No 002', '3', '13', 'Sudah', '1', 1621675632, ''),
(7, 'meaghito', '756756', '1771020609950008', 'Jl. Sadang IVBlok C No 010', '8', '57', 'Belum', 'Parkir', 1621675772, ''),
(8, 'basing', '12394', '177219083123', 'jl kota', 'Kampung Melayu', '8', 'Belum', 'Restoran', 1621685517, ''),
(9, 'Meaghito', '1772819211', '3810239', 'Jl. Jalan', 'Sungai Serut', 'Tanjung Jaya', 'Sudah', 'Parkir', 1621685736, ''),
(10, 'RSHD', '98371', '98931021', 'Jl. Semangka 2 NO. 30 c', 'Singaran Pati', 'Panorama', 'Sudah', 'Restoran', 1621685881, ''),
(11, 'mearico', '1771829231113', '84392391', 'Jl. kota', 'Gading Cempaka', 'Lingkar Barat', 'Belum', 'Restoran', 1621751286, ''),
(12, 'blaa', '65457399', 'tes', 'Jl. Sadang IVBlok C No 002', '', '', 'Pilih Status', 'Pilih Jenis', 1621751881, ''),
(13, 'tester', '902021', '3492320', 'testerr alamata', 'Gading Cempaka', 'Lingkar Barat', 'Belum', 'Restoran', 1621752141, ''),
(14, 'Mgiti', '9843921', '1772819298523', 'Jl. Pembangunan Blok C, No. 001 RT/RW 001/003', 'Gading Cempaka', 'Lingkar Barat', 'Sudah', 'Restoran', 1621780132, ''),
(15, 'meaghito', 'asdasdasd', 'e5345352', 'hfhshsfh', 'Muara Bangkahulu', 'Pematang Gubernur', 'Belum', 'Parkir', 1621780420, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_status`
--

CREATE TABLE `reg_status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reg_status`
--

INSERT INTO `reg_status` (`id`, `nama_status`) VALUES
(1, 'Sudah'),
(2, 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `reg_jenis`
--
ALTER TABLE `reg_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_kecamatan`
--
ALTER TABLE `reg_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_kelurahan`
--
ALTER TABLE `reg_kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_registrasi`
--
ALTER TABLE `reg_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_status`
--
ALTER TABLE `reg_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `reg_jenis`
--
ALTER TABLE `reg_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reg_kecamatan`
--
ALTER TABLE `reg_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reg_kelurahan`
--
ALTER TABLE `reg_kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `reg_registrasi`
--
ALTER TABLE `reg_registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `reg_status`
--
ALTER TABLE `reg_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
