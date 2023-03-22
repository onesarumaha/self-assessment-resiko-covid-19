-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2023 pada 14.02
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_form`
--

CREATE TABLE `data_form` (
  `id_form` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pertanyaan`
--

CREATE TABLE `data_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `nama_pertanyaan` text NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pertanyaan`
--

CREATE TABLE `form_pertanyaan` (
  `id_form` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `isi_status` enum('Diizinkan Masuk','Tidak Diizinkan Masuk','Diizinkan Masuk Dengan Pemantauan Ketat','Telah Diapprove Oleh Satgas','Diproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk` set('Pria','Wanita','-') NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('Karyawan','Pimpinan','Admin','Satgas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `jk`, `jabatan`, `username`, `password`, `email`, `hak_akses`) VALUES
(1, 'Indah Permata Sari', 'Wanita', 'Pimpinan', 'pimpinan', '$2y$10$h1HLFurxAm9kKd9xvLHd8.FS2jEyKa8XrSbCThTil14HrBhj/7AIa', '', 'Pimpinan'),
(2, 'Friska Yuli Suchendar', 'Wanita', 'Admin', 'friska', '$2y$10$S3iq/ZU4V2FWUwZVBPAaqOcNn8R9yPOfDh1yMEFMBqqyGmpNGCpCu', '', 'Admin'),
(6, 'Irwan Syahputra, S.H', 'Pria', 'Ketua Umum', 'satgas', '$2y$10$jiuHTij8jUexY.OhsU0b0Ojef7TlZwTEYoi.Uqylep1wltmVQXOh6', '', 'Satgas'),
(7, 'Dina', 'Wanita', 'OB', 'dina', '$2y$10$NV83v.U/4PmaG87KHCFXA..M4qSlENNpKXWwhs.fpb2MKXpHzMYzm', '', 'Karyawan'),
(8, 'Dodi Sarumaha', 'Pria', 'Programmer', 'dodi', '$2y$10$8a4Nq2.mGFqorg0mNsYVDecKG4WsSscaBSxJe6x7xbcPGmmhuMdtC', '', 'Karyawan'),
(10, 'Dian', 'Pria', 'OB', 'dian', '$2y$10$yU1XKNUj8Mcj.Zzd/uukjOiCZiam.QM5TisuoGYzZarlTFHX7HiKG', '', 'Karyawan'),
(11, 'Irma Putri', 'Wanita', 'Design Grafis', 'irma', '$2y$10$9Giby/I24PdXvQ.OaSEgM.UUkwvwtFUwPt7yr2rUY6xp7ceB3uEQi', '', 'Karyawan'),
(12, 'Dian Simanjuntak', 'Pria', 'IT', 'simanjuntak', '$2y$10$/AGBsDG8wc2fMclBAe6hveWyF8ndYn2DmE6oTpLnL0N1QDv7gZVV.', '', 'Karyawan'),
(13, 'Terang Bersama Senja', 'Pria', 'IT', 'terang', '$2y$10$Iy6fIE2j73gDZCxG8mzGiOTa62hlYAhR6yPXcc626qyvfcoV.40I6', 'onesarumaha10@gmail.com', 'Karyawan'),
(17, 'Kartu', '-', '-', 'kartu', '$2y$10$YkayO/WfbyTxLfEjHatkleqYpp.VzsXF2W1Y4fGyvJk.fWq.BE9se', 'kartu@gmail.com', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_form`
--
ALTER TABLE `data_form`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `form_pertanyaan`
--
ALTER TABLE `form_pertanyaan`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_form`
--
ALTER TABLE `data_form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_pertanyaan`
--
ALTER TABLE `form_pertanyaan`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_form`
--
ALTER TABLE `data_form`
  ADD CONSTRAINT `data_form_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `data_pertanyaan` (`id_pertanyaan`),
  ADD CONSTRAINT `data_form_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `form_pertanyaan`
--
ALTER TABLE `form_pertanyaan`
  ADD CONSTRAINT `form_pertanyaan_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `form_pertanyaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
