-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 17. Juli 2020 jam 11:33
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pengadilannegri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_kegitan`
--

CREATE TABLE IF NOT EXISTS `galeri_kegitan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `galeri_kegitan`
--

INSERT INTO `galeri_kegitan` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'PERINGATAN HARI SUMPAH PE', 'Dalam rangka memperingati hari sumpah pemuda Keluarga besar Pengadilan Negeri Pagar Alam yang dipimpin oleh Wakil Ketua Pengadilan Negeri Pagar Alam Bpk M. Martin Helmy , SH.,MH melaksanakan Upacara Peringatan Hari Sumpah Pemuda Ke-89 di ikuti Para Hakim, Pejabat Fungsional, Pejabat Struktural seluruh pegawai dan Honorer Pengadilan Negeri Pagar Alam.', 'BELUM ADA GAMBAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `judul`, `keterangan`, `gambar`) VALUES
(1, 'DARI TEMPAT SIDANG (ZITTING PLAATS) KE GEDUNG BARU DI KOMPLEKS PERKANTORAN GUNUNG GARE', 'Tempat Sidang (zitting plaats) Pengadilan Negeri Lahat ditempati sebagai kantor Pengadilan Negeri Pagar Alam sejak Senin, 2 Januari 2012 hingga Rabu, 8 Mei 2013. Selama 1 tahun 4 bulan dan 6 hari berkantor di ex- Tempat Sidang (zitting plaats) Pengadilan Negeri Lahat ini. Kemudian sejak Rabu, 8 Mei 2013 Pengadilan Negeri Pagar Alam berkantor di gedung baru di Kompleks Perkantoran Gunung Gare di Kaki Gunung Dempo Kota Pagar Alam.\r\nFoto Ex- Tempat Sidang (zitting plaats) Pengadilan Negeri Lahat. Bangunan ini berlokasi di Jl. Letda M.Nur Majais Kecamatan Pagar Alam Selatan Kota Pagar Alam. Dipergunakan sebagai Kantor Pengadilan Negeri Pagar Alam selama setahun lebih.\r\nFoto Gedung Baru Pengadilan Negeri Pagar Alam. Gedung ini berlokasi di Kompleks Perkantoran Gunung Gare di Kaki Gunung Dempo Pagar Alam. Tanah lokasi gedung berasal dari hibah Pemerintah Kota Pagar Alam.', 'BELUM ADA GAMBAR'),
(2, 'SEJARAH PENGADILAN NEGERI PAGARALAM', 'Bermula sebagai Tempat Sidang ( Zitting Plaats ) Pengadilan Negeri Lahat, akhirnya berdiri sendiri sebagai Pengadilan Negeri Pagar Alam sejak Januari 2012. Tempat Sidang ini terletak di Jl. Letda M.Nur Majais/ Jl. Terminal Kota Pagar Alam Provinsi Sumatera Selatan. Bangunan ini bersebelahan dengan Kantor Camat Pagar Alam Selatan.\r\n        Pengadilan Negeri Pagar Alam dibentuk berdasarkan Keputusan Presiden RI Nomor 3 Tahun 2008 tanggal 26 Januari 2008. Diresmikan pada tanggal 16 November 2011 oleh Ketua Mahkamah Agung RI, Harifin Tumpa,SH di Labuan Bajo, Nusa Tenggara Timur. Peresmiannya bersamaan dengan peresmian 15 Pengadilan Agama  dan 5 Pengadilan Negeri lainnya.\r\n        Pengadilan Negeri Pagar Alam telah menjalankan tugas dan fungsinya sejak 2 Januari 2012. Pada awal berdirinya hanya menggunakan inventaris Tempat Sidang ( Zitting Plaats) Pengadilan Negeri Lahat ditambah dengan inventaris dari Pemerintah Kota Pagar Alam. Peralatan komputer masih sangat kurang dan beberapa unit di antaranya berupa milik pribadi para pegawai. Walaupun dalam kondisi yang demikian tidak mengurangi pelayanan kepada masyarakat pencari keadilan (justitiabelen). Tugas dan Fungsi Pokok Pengadilan tetap dapat dijalankan. Tidak ada hambatan yang signifikan. Memeriksa, memutuskan dan menyelesaikan perkara pidana dan perkara perdata tetap dapat dijalankan sebagaimana yang diamatkan oleh Pasal 50 UU No.2 Tahun 1986. Sistem Informasi Penelusuran Perkara (SIPP) / Case Tracking System versi 2 (CTS.2) telah berjalan secara normal.\r\n      Untuk pertama kalinya jabatan Ketua Pengadilan Negeri Pagar Alam dijabat oleh Fahren,SH. M.Hum. Pelantikan Ketua Pengadilan dilaksanakan pada hari Rabu, 28 Desember 2011 di Ruang Utama Pengadilan Tinggi Palembang oleh Ketua Pengadilan Tinggi Palembang, Sugeng Achmad Yudhi,SH. Wakil Ketua Pengadilan dijabat oleh Harun Yulianto,SH. Dilantik oleh Ketua Pengadilan Negeri Pagar Alam, Fahren,SH.M.Hum di Pengadilan Negeri Pagar Alam pada hari Selasa , 13 Maret 2012. Panitera /Sekretaris Pengadilan Negeri Pagar Alam dijabat oleh Astan,SH dilantik oleh Ketua Pengadilan, Fahren,SH.M.Hum , di Ruang Utama Pengadilan Tinggi Palembang pada hari yang bersamaan, Rabu, 28 Desember 2011.\r\nBersamaan dengan itu, Rabu, 28 Desember 2011, di tempat yang sama, di Pengadilan Tinggi Palembang, Ketua Pengadilan Negeri Pagar Alam , Fahren,SH.M.Hum melantik juga Wapan, para Panmud dan para Kaur sebagai berikut :\r\n1. Agusman,SH sebagai Wakil Panitera;\r\n2. Soleh,SH sebagai Panitera Muda Perdata;\r\n3. Warno,SH sebagai Panitera Muda Pidana;\r\n4. Sudarwan,SH sebagai Panitera Muda Hukum;\r\n5. Rionaldo Sahat Sigalingging,S.Kom sebagai Kepala Urusan Umum;\r\n6. Diah Alam Sari S.Psi sebagai Kepala Urusan Personalia.', 'BELUM ADA GAMBAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_jabatan`
--

CREATE TABLE IF NOT EXISTS `struktur_jabatan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `struktur_jabatan`
--

INSERT INTO `struktur_jabatan` (`id`, `nama`, `nip`, `jabatan`) VALUES
(1, 'Diah Alam Sari,S.Psi', '197701232009042005', 'Sekretaris'),
(2, 'Alimron Dwi Putra,S', '197805272011011003', 'Kasubbag Umum dan Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tufoksi`
--

CREATE TABLE IF NOT EXISTS `tufoksi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `jabatan` text NOT NULL,
  `tugas_pokok` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tufoksi`
--

INSERT INTO `tufoksi` (`id`, `jabatan`, `tugas_pokok`) VALUES
(1, 'Sekretaris', '1. Membantu Sekretaris dalam melaksanakan tugas di bidang Administrasi Umum/Kesekretariatan.\r\n2. Mengkoordinir tugas-tugas Kepala Sub Bagian Umum, Kepegawaian dan Keuangan.\r\n3. Sekretaris sebagai pejabat pembuat komitmen/penanggung jawab kegiatan bertugas:\r\n4. Membuat dan menandatangani kontrak/SPK dan surat-surat lain yang berhubungan dengan pengadaan barang/jasa atau membuat perikatan dengan pihak penyedia barang/jasa yang mengakibatkan pengeluaran anggaran belanja.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
