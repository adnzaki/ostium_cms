-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Apr 2017 pada 09.27
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ostium_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_kategori`
--

CREATE TABLE `os_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_kategori`
--

INSERT INTO `os_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tidak berkategori'),
(2, 'Artikel'),
(3, 'Berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_kategori_post`
--

CREATE TABLE `os_kategori_post` (
  `id_kategori_post` bigint(20) NOT NULL,
  `id_post` bigint(20) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_kategori_post`
--

INSERT INTO `os_kategori_post` (`id_kategori_post`, `id_post`, `id_kategori`) VALUES
(16, 105, 2),
(17, 105, 3),
(18, 106, 1),
(19, 106, 2),
(20, 106, 3),
(21, 107, 0),
(24, 109, 1),
(25, 109, 2),
(45, 110, 1),
(46, 110, 2),
(47, 110, 3),
(63, 116, 1),
(64, 116, 3),
(67, 117, 2),
(68, 117, 3),
(69, 118, 2),
(70, 114, 1),
(71, 114, 2),
(72, 115, 2),
(97, 120, 0),
(98, 119, 1),
(102, 121, 1),
(103, 121, 2),
(104, 122, 1),
(105, 123, 1),
(106, 124, 1),
(107, 125, 1),
(108, 126, 1),
(112, 130, 1),
(113, 130, 2),
(114, 131, 1),
(115, 132, 1),
(116, 133, 1),
(117, 134, 1),
(119, 136, 1),
(122, 138, 1),
(126, 139, 1),
(133, 137, 1),
(134, 137, 2),
(142, 142, 1),
(143, 142, 3),
(159, 143, 1),
(160, 143, 2),
(161, 144, 1),
(163, 145, 1),
(171, 146, 1),
(172, 146, 2),
(178, 147, 2),
(179, 147, 3),
(185, 149, 2),
(186, 149, 3),
(187, 135, 2),
(188, 150, 2),
(189, 150, 3),
(190, 151, 1),
(191, 152, 1),
(192, 153, 1),
(198, 154, 2),
(199, 155, 1),
(200, 156, 1),
(201, 156, 3),
(202, 157, 1),
(203, 157, 3),
(216, 158, 2),
(217, 158, 3),
(221, 159, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_komentar`
--

CREATE TABLE `os_komentar` (
  `id_komentar` bigint(20) NOT NULL,
  `nama_komentator` varchar(200) DEFAULT NULL,
  `email_komentator` varchar(100) DEFAULT NULL,
  `id_post` bigint(20) DEFAULT NULL,
  `isi_komentar` longtext,
  `tanggal_komentar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_post`
--

CREATE TABLE `os_post` (
  `id_post` bigint(20) NOT NULL,
  `judul_post` varchar(250) DEFAULT NULL,
  `penulis_post` int(11) DEFAULT NULL,
  `status_post` varchar(50) DEFAULT NULL,
  `tag_post` text,
  `tag_slug` text,
  `visibilitas_post` varchar(20) DEFAULT NULL,
  `isi_post` longtext,
  `tanggal_post` datetime DEFAULT NULL,
  `last_edit_post` datetime DEFAULT NULL,
  `gambar_fitur` varchar(250) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_post`
--

INSERT INTO `os_post` (`id_post`, `judul_post`, `penulis_post`, `status_post`, `tag_post`, `tag_slug`, `visibilitas_post`, `isi_post`, `tanggal_post`, `last_edit_post`, `gambar_fitur`, `permalink`) VALUES
(105, 'asd', 1, 'publik', NULL, NULL, 'show', '', '2017-04-07 14:58:12', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/asd'),
(106, 'gedek', 1, 'publik', NULL, NULL, 'show', '', '2017-04-07 14:59:37', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/gedek'),
(107, 'draft kategori', 1, 'draft', NULL, NULL, 'show', '', '2017-04-07 15:04:46', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/draft-kategori'),
(109, 'sssssssssssss', 1, 'publik', NULL, NULL, 'show', '', '2017-04-07 15:09:49', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/sssssssssssss'),
(110, 'apalah ini', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 00:18:43', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?> ?> ?>', 'http://localhost:70/ostium_cms/read/apalah-ini'),
(114, 'babam', 2, 'draft', NULL, NULL, 'show', '', '2017-04-08 00:25:42', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?> ?>', 'http://localhost:70/ostium_cms/read/babam'),
(115, 'percobaan terakhir', 2, 'draft', NULL, NULL, 'show', '', '2017-04-08 02:02:47', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?>', 'http://localhost:70/ostium_cms/read/percobaan-terakhir'),
(116, 'kukek draft', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 02:03:26', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?>', 'http://localhost:70/ostium_cms/read/kukek-draft'),
(117, 'dudu;sdlfkhs', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 02:13:07', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?>', 'http://localhost:70/ostium_cms/read/dudu-sdlfkhs'),
(118, 'badai', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 02:19:12', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/badai'),
(119, 'coba nih sekali lagi', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 09:39:10', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?>', 'http://localhost:70/ostium_cms/read/coba-nih-sekali-lagi'),
(121, 'baukkk', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 11:15:37', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?>', 'http://localhost:70/ostium_cms/read/baukkk'),
(122, 'coba dulu ya', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 11:46:04', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/coba-dulu-ya'),
(123, 'kukuk', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 11:47:35', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/kukuk'),
(124, 'baban nababan', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 11:48:11', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/baban-nababan'),
(125, 'kekekekekek', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 11:49:07', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/kekekekekek'),
(126, 'dambato', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 11:51:40', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/dambato'),
(130, 'hampura ratu....', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 12:42:26', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/hampura-ratu'),
(131, 'tambah post', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 22:29:05', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/tambah-post'),
(132, 'badrun', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 22:29:39', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/badrun'),
(133, 'bismillah....', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 22:42:44', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/bismillah'),
(134, 'had', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 22:43:15', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/had'),
(135, 'bam', 1, 'publik', '', '', 'show', '', '2017-04-08 23:16:51', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?>', 'http://localhost:70/ostium_cms/read/bam'),
(136, 'bidakara', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 23:32:01', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/bidakara'),
(137, 'bikin draft sd dadang', 1, 'draft', NULL, NULL, 'show', '', '2017-04-08 23:53:16', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?> ?>', 'http://localhost:70/ostium_cms/read/bikin-draft-sd-dadang'),
(138, 'kumpay', 1, 'publik', NULL, NULL, 'show', '', '2017-04-08 23:34:16', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/kumpay'),
(139, 'duhduhdah', 1, 'publik', NULL, NULL, 'show', '<p>sdfdfdfdfdfdfdfdfdfdfdd</p>', '2017-04-08 23:48:36', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?>', 'http://localhost:70/ostium_cms/read/duhduhdah'),
(142, 'dMBA Osaka', 1, 'publik', NULL, NULL, 'show', '', '2017-04-09 06:52:28', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/dmba-osaka'),
(143, 'assalamualaikum hehe', 1, 'publik', 'indonesia, damai, wisata', 'indonesia, damai, wisata', 'show', '', '2017-04-09 14:03:01', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?> ?> ?> ?> ?> ?>', 'http://localhost:70/ostium_cms/read/assalamualaikum-hehe'),
(144, 'kamput', 1, 'publik', 'wisata', 'wisata', 'show', '', '2017-04-14 20:39:52', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/kamput'),
(145, 'damput', 1, 'publik', 'wisata', 'wisata', 'show', '', '2017-04-14 20:45:44', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?>', 'http://localhost:70/ostium_cms/read/damput'),
(146, 'kumplit', 1, 'publik', 'damai, badak, wisata, indonesia', 'damai, badak, wisata, indonesia', 'show', '', '2017-04-14 21:52:27', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161225_22425.jpg', 'http://localhost:70/ostium_cms/read/kumplit'),
(147, 'selamat malam bekasi', 1, 'publik', 'wisata, indonesia', 'wisata, indonesia', 'hide', '<p>selamat malam....</p>', '2017-04-14 22:27:00', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/My%20Start%20Wallpapers%209090333782.jpg ?> ?> ?>', 'http://localhost:70/ostium_cms/read/selamat-malam-bekasi'),
(149, 'bug kategori telah berhasil diatasi', 1, 'publik', '', '', 'show', '', '2017-04-14 22:55:24', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?>', 'http://localhost:70/ostium_cms/read/bug-kategori-telah-berhasil-diatasi'),
(150, 'horeee', 1, 'publik', 'indonesia, damai', 'indonesia, damai', 'show', '<p><img src="http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/gahar1.png" alt="" width="316" height="332" /></p>', '2017-04-14 23:11:07', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/WhatsApp%20Image%202016-11-28%20at%2013.42.42.jpg', 'http://localhost:70/ostium_cms/read/horeee'),
(151, 'test common data', 1, 'publik', 'badak', 'badak', 'show', '', '2017-04-15 07:04:24', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/test-common-data'),
(152, 'wisata air pancoran', 1, 'publik', '', '', 'show', '<p>apa kabar saudara??</p>', '2017-04-15 07:05:46', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/My%20Start%20Wallpapers%209090333782.jpg', 'http://localhost:70/ostium_cms/read/wisata-air-pancoran'),
(153, 'sadadas', 1, 'publik', 'wisata', 'wisata', 'show', '<p>dsadasa</p>', '2017-04-15 07:06:29', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161225_22425.jpg', 'http://localhost:70/ostium_cms/read/sadadas'),
(154, 'judulnya sudah diperbaiki, alhamdulillah', 1, 'publik', 'indonesia, wisata', 'indonesia, wisata', 'show', '<p>assalamu''alaikum..</p>', '2017-04-15 07:17:40', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/WP_20160311_15_32_28_Pro.jpg ?> ?> ?> ?>', 'http://localhost:70/ostium_cms/read/judulnya-sudah-diperbaiki-alhamdulillah'),
(155, 'sdsds', 1, 'publik', '', '', 'show', '', '2017-04-15 07:23:32', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/sdsds'),
(157, 'hehe aku seneng banget', 1, 'publik', 'wisata, indonesia', 'wisata, indonesia', 'show', '<p>fgdfgd</p>', '2017-04-15 07:34:16', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161226_133145.jpg', 'http://localhost:70/ostium_cms/read/hehe-aku-seneng-banget'),
(158, 'draft kamu apasih hehe udah dipublish', 1, 'publik', 'jalan jalan, indonesia', 'jalan-jalan, indonesia', 'show', '<p>sdfdsfgdf dfgdfgdgdfg dsfsffdfd</p>', '2017-04-15 07:46:22', NULL, 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/WP_20160311_15_32_28_Pro.jpg ?> ?> ?> ?> ?> ?>', 'http://localhost:70/ostium_cms/read/draft-kamu-apasih-hehe-udah-dipublish'),
(159, 'badai banget lah hhaa', 1, 'draft', 'wisata', 'wisata', 'show', '<p>dfghfh</p>', '2017-04-15 07:46:44', NULL, 'http://localhost:70/ostium_cms/assets/images/no-image.png ?> ?> ?>', 'http://localhost:70/ostium_cms/read/badai-banget-lah-hhaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_tag`
--

CREATE TABLE `os_tag` (
  `id_tag` bigint(20) NOT NULL,
  `nama_tag` varchar(255) DEFAULT NULL,
  `slug_tag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_tag`
--

INSERT INTO `os_tag` (`id_tag`, `nama_tag`, `slug_tag`) VALUES
(1, 'wisata', 'wisata'),
(2, 'jalan jalan', 'jalan-jalan'),
(3, 'indonesia', 'indonesia'),
(4, 'damai', 'damai'),
(5, 'badak', 'badak'),
(7, 'kumpret', 'kumpret'),
(8, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_user`
--

CREATE TABLE `os_user` (
  `id_user` int(11) NOT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_status` varchar(50) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_registrasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_user`
--

INSERT INTO `os_user` (`id_user`, `user_login`, `user_pass`, `user_name`, `user_status`, `user_email`, `user_registrasi`) VALUES
(1, 'admin', 'admin', 'Administrator', 'admin', 'admin@gmail.com', '2017-01-03 03:11:00'),
(2, 'pengguna', '123', 'Pengguna', 'user', 'pengguna@hotmail.co.id', '2017-02-15 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `os_kategori`
--
ALTER TABLE `os_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `os_kategori_post`
--
ALTER TABLE `os_kategori_post`
  ADD PRIMARY KEY (`id_kategori_post`);

--
-- Indexes for table `os_komentar`
--
ALTER TABLE `os_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `os_post`
--
ALTER TABLE `os_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `os_tag`
--
ALTER TABLE `os_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `os_user`
--
ALTER TABLE `os_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `os_kategori`
--
ALTER TABLE `os_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `os_kategori_post`
--
ALTER TABLE `os_kategori_post`
  MODIFY `id_kategori_post` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT for table `os_komentar`
--
ALTER TABLE `os_komentar`
  MODIFY `id_komentar` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `os_post`
--
ALTER TABLE `os_post`
  MODIFY `id_post` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `os_tag`
--
ALTER TABLE `os_tag`
  MODIFY `id_tag` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `os_user`
--
ALTER TABLE `os_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
