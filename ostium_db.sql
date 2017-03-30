-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mar 2017 pada 18.44
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
  `tanggal_post` datetime DEFAULT NULL,
  `gambar_fitur` varchar(250) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `os_post`
--

INSERT INTO `os_post` (`id_post`, `judul_post`, `kategori_post`, `penulis_post`, `status_post`, `isi_post`, `tanggal_post`, `gambar_fitur`, `permalink`) VALUES
(21, 'Tanpa Judul', 1, 1, 'draft', '', '2017-01-08 19:58:08', NULL, NULL),
(22, 'Tanpa Judul', 1, 1, 'draft', '', '2017-01-08 19:58:48', NULL, NULL),
(23, 'simpan draft ajax', 2, 1, 'draft', '<p>bismillah....</p>', '2017-01-08 20:28:43', NULL, NULL),
(24, 'coba ajax lagi ah', 2, 1, 'draft', '<p>alhamdulillah</p>', '2017-01-08 20:30:27', NULL, NULL),
(25, 'alhamdulillah', 1, 1, 'draft', '<p>akhirnya bisa juga..//</p>', '2017-01-08 20:31:33', NULL, NULL),
(26, 'heheheh senengnya kita orang ini.. hihi', 2, 1, 'draft', '<p>yeeaaay!!!</p>', '2017-01-08 20:34:32', NULL, NULL),
(37, 'anak ayaaam', 1, 1, 'draft', '', '2017-01-28 09:36:09', NULL, NULL),
(39, 'busukkk jadi publik', 1, 1, 'publik', '', '2017-02-26 13:58:05', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/gahar1.png', NULL),
(47, 'Bismillah', 1, 1, 'publik', '<p>Allahu akbar!</p>', '2017-02-04 23:00:29', NULL, NULL),
(49, 'Coba XSS', 1, 1, 'publik', '<p>nih coba bro...</p>', '2017-02-11 13:22:45', NULL, NULL),
(50, 'Akhirnya bug berhasil diperbaiki', 2, 1, 'publik', '<p><span xss=removed>Bug horor yaitu tidak bisa upload gambar saat mengedit post akhirnya berhasil diperbaiki. Mantaaappp!!!dfdf</span></p>\r\n<p><span xss=removed>dfdfdffddfdfdfdf</span></p>\r\n<p><span xss=removed><img src="http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/WhatsApp Image 2016-11-28 at 13.42.42.jpg" alt="" width="299" height="299"></span></p>', '2017-02-12 13:01:35', NULL, NULL),
(54, 'test fitur baru', 2, 1, 'publik', '<p>sdfsdfsdfsdfsd</p>', '2017-02-15 17:00:54', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/WhatsApp%20Image%202016-11-28%20at%2013.42.42.jpg', NULL),
(57, 'coba brok', 1, 1, 'publik', '', '2017-02-15 17:39:28', 'http://localhost:70/ostium_cms/assets/images/no-image.png', NULL),
(59, 'Cerita kita bro...', 2, 2, 'publik', '<ul style="list-style-type: circle;">\r\n<li>hai saya zaki</li>\r\n<li>kamu siapa?</li>\r\n<li>aku zaki</li>\r\n<li>eh kita sama dong</li>\r\n<li>iya dund</li>\r\n<li>ok</li>\r\n<li>sip</li>\r\n</ul>\r\n<p><img src="http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161226_133145.jpg" width="600" height="338" /></p>\r\n<p>Inilah cerita kita di kiluan....</p>', '2017-02-16 15:27:12', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161226_133145.jpg ?>', NULL),
(61, 'Pagination berhasil', 1, 1, 'publik', '<p>Takbirrr!!!</p>', '2017-02-18 12:35:27', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/bunga%204.jpg', NULL),
(64, 'Tampilan dirapikan lagi...', 2, 1, 'publik', '<p>oke deh..</p>', '2017-02-18 12:36:45', 'http://localhost:70/ostium_cms/assets/images/no-image.png', NULL),
(75, 'setan', 1, 1, 'publik', '', '2017-02-25 23:48:46', 'http://localhost:70/ostium_cms/assets/images/no-image.png', NULL),
(76, 'selamat malam temanku..', 1, 1, 'publik', '<p><img src="http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161225_22425.jpg" width="1000" height="563" /></p>', '2017-03-01 23:47:24', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161225_22312.jpg', NULL),
(77, 'dffd', 1, 1, 'draft', '', '2017-03-13 20:13:56', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/ProShot_20161225_22312.jpg', NULL),
(78, 'Tanpa Judul', 1, 1, 'draft', '', '2017-03-16 00:00:22', 'http://localhost:70/ostium_cms/assets/images/no-image.png', NULL),
(79, 'hai aku zaki', 1, 1, 'publik', '', '2017-03-19 10:50:41', 'http://localhost:70/ostium_cms/assets/images/no-image.png', 'http://localhost:70/ostium_cms/read/hai-aku-zakis'),
(80, 'sekarang kita edit', 1, 1, 'publik', '', '2017-03-30 23:05:36', 'http://localhost:70/ostium_cms/assets/plugins/tinymce/plugins/filemanager/source/gahar1.png ?>', 'http://localhost:70/ostium_cms/read/sekarang-kita-edit'),
(82, 'Draft permalink dipublish!', 1, 1, 'publik', '', '2017-03-30 23:11:33', 'http://localhost:70/ostium_cms/assets/images/no-image.png ?>', 'http://localhost:70/ostium_cms/read/draft-permalink-dipublish');

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
(1, 'admin', 'Administrator', 'admin', 'admin@gmail.com', '2017-01-03 03:11:00'),
(2, 'pengguna', 'Pengguna', 'user', 'pengguna@hotmail.co.id', '2017-02-15 00:00:00');

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
  MODIFY `id_post` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `os_user`
--
ALTER TABLE `os_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
