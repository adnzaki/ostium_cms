-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jan 2017 pada 04.12
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
(2, 'Artikel');

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
  `kategori_post` int(11) DEFAULT NULL,
  `penulis_post` int(11) DEFAULT NULL,
  `status_post` varchar(50) DEFAULT NULL,
  `isi_post` longtext,
  `tanggal_post` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_post`
--

INSERT INTO `os_post` (`id_post`, `judul_post`, `kategori_post`, `penulis_post`, `status_post`, `isi_post`, `tanggal_post`) VALUES
(10, 'hehehe', 1, 1, 'publik', '', '2017-01-07 13:12:48'),
(11, 'dfdfdfdfd', 1, 1, 'publik', '', '2017-01-07 13:27:11'),
(13, 'adas', 1, 1, 'publik', '', '2017-01-07 19:32:07'),
(14, 'asda', 1, 1, 'publik', '', '2017-01-07 19:33:39'),
(15, 'asdfgh jklopiuytrfg ', 2, 1, 'publik', '<p>sdsds</p>', '2017-01-08 12:24:33'),
(16, 'selamat siang teman-temanku yang budiman hahaha hehehe', 1, 1, 'publik', '', '2017-01-08 12:41:32'),
(19, 'sdsafsd', 2, 1, 'publik', '<p>dsgdfgdf</p>', '2017-01-08 19:15:44'),
(20, 'dfsfdg', 1, 1, NULL, '<p>dfgdgd</p>', '2017-01-08 19:29:30'),
(21, 'Tanpa Judul', 1, 1, 'draft', '', '2017-01-08 19:58:08'),
(22, 'Tanpa Judul', 1, 1, 'draft', '', '2017-01-08 19:58:48'),
(23, 'simpan draft ajax', 2, 1, 'draft', '<p>bismillah....</p>', '2017-01-08 20:28:43'),
(24, 'coba ajax lagi ah', 2, 1, 'draft', '<p>alhamdulillah</p>', '2017-01-08 20:30:27'),
(25, 'alhamdulillah', 1, 1, 'draft', '<p>akhirnya bisa juga..//</p>', '2017-01-08 20:31:33'),
(26, 'heheheh senengnya kita orang ini.. hihi', 2, 1, 'draft', '<p>yeeaaay!!!</p>', '2017-01-08 20:34:32'),
(27, 'dddddrrrrrrr', 2, 1, 'draft', '<p>dddd</p>', '2017-01-08 20:49:43'),
(28, 'assalamu', 2, 1, 'publik', '<p>adsda eeeeeeeeeeeeekkkk</p>', '2017-01-08 21:04:43'),
(31, 'testt', 1, 1, 'publik', '', '2017-01-08 21:53:34'),
(32, 'badai pasti berlaluaaaaaaaaaaaaaa', 1, 1, 'draft', '', '2017-01-10 13:21:51'),
(33, 'Bismillah', 2, 1, 'publik', '<p>Ya Allah tolonglah hamba-Mu ini ya Allah...</p>\r\n<p>Aku sedang kesusahan ya Allah.....</p>\r\n<p><img src="assets/plugins/tinymce/plugins/filemanager/source/gahar1.png" alt="" width="700" height="735" /></p>', '2017-01-15 23:36:11'),
(34, 'test image lagi', 2, 1, 'publik', '<p><img src="http://localhost:8080/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/My%20Start%20Wallpapers%209090333782.jpg" alt="" width="800" height="450" /></p>\r\n<p>halo ada aku disini...</p>', '2017-01-22 19:45:42'),
(35, 'masukin gambar', 1, 1, 'publik', '<p><img src="http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/gahar1.png" alt="" width="500" height="525" /></p>\r\n<p>SETAAAAAAAAAAAAAAAAAN</p>', '2017-01-28 09:33:22'),
(36, 'coba tanya saya', 2, 1, 'publik', '<p>adsdsa</p>', '2017-01-28 09:35:30'),
(37, 'anak ayaaam', 1, 1, 'draft', '', '2017-01-28 09:36:09'),
(38, '', 1, 1, 'draft', '', '2017-01-28 09:37:40'),
(39, 'busukkk', 1, 1, 'draft', '', '2017-01-28 09:51:00'),
(40, 'kereeeen', 1, 1, 'publik', '<p>bodoamat ah kosongajaaa</p>', '2017-01-28 09:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `os_user`
--

CREATE TABLE `os_user` (
  `id_user` int(11) NOT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_status` varchar(50) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_registrasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_user`
--

INSERT INTO `os_user` (`id_user`, `user_login`, `user_name`, `user_status`, `user_email`, `user_registrasi`) VALUES
(1, 'admin', 'Administrator', 'admin', 'admin@gmail.com', '2017-01-03 03:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `os_kategori`
--
ALTER TABLE `os_kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `os_komentar`
--
ALTER TABLE `os_komentar`
  MODIFY `id_komentar` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `os_post`
--
ALTER TABLE `os_post`
  MODIFY `id_post` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `os_user`
--
ALTER TABLE `os_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
