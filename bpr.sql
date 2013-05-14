-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2013 at 09:21 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `content`, `images`, `created_at`, `updated_at`) VALUES
(5, 'Dapatkan Hadiah Menarik!!!', 'Dapatkan-Hadiah-Menarik-', '<p>Sample ContentSample ContentSample ContentSample ContentSample ContentSample ContentSample Content<br />Sample ContentSample ContentSample ContentSample ContentSample ContentSample ContentSample Content<br />Sample ContentSample ContentSample ContentSample ContentSample ContentSample ContentSample Content<br />Sample ContentSample ContentSample ContentSample ContentSample ContentSample ContentSample Content</p>', 'img-slide-promo-1.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Nonton Bareng IronMan3!', 'nonton-bareng-ironman3!', '<p>Sample Content Sample Content Sample Content Sample Content Sample Content Sample ContentSample Content<br />Sample Content Sample ContentSample ContentSample Content Sample Content Sample Content Sample Content<br />Sample Content Sample Content Sample Content Sample Content Sample Content Sample ContentSample Content</p><p>Sample Content</p>', 'img-slide-promo-2.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Banner title', 'banner-title', '<p>Sample Content Sample Content Sample Content Sample Content Sample ContentSample Content Sample Content Sample Content Sample ContentSample Content</p>', 'img-slide-promo-3.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `phone`, `address`) VALUES
(1, 'Kantor Cabang Non Operasional', '(022) 589 3334', 'Jl. Raya Soreang No. 26 Soreang LT2'),
(2, 'Kantor Cabang Operasional', '(022)-589-1332', 'Jl. Raya Soreang No. 26 Soreang LT1'),
(3, 'Kantor Cab Banjaran', '(022) 594 0121', 'Jl. Alun-Alun Timur No 19 Banjaran'),
(4, 'Kantor Cab Ciwidey', '(022) 592 8442', 'Jl. Pajagalan Lama No. 02 Ciwidey'),
(5, 'Kantor Cab Cicalengka', '(022) 794 9648', 'Jl. Dipatiukur No. 15 Cicalengka'),
(6, 'Kantor Cab Pameungpeuk', '(022) 594 0278', 'Jl. Raya Banjaran  No. 503 Pameungpeuk'),
(7, 'Kantor Cab Ciparay', '(022) 595 0954', 'Jl. Laswi No. 52 Pakutandang, Ciparay'),
(8, 'Kantor Cab Padalarang', '(022) 680 5118', 'Jl. Raya Ciburuy No 652 Padalarang Bandung'),
(9, 'Kantor Cab Cipeundey', '(022) 697 0773', 'Jl. Raya Cipeundey No. 479'),
(10, 'Kantor Cab Cikalongwetan', '(022) 697 0853', 'Jl. Raya Purwakarta No. 37'),
(11, 'Kantor Cab Batujajar', '(022) 686 4849', 'Jl. Batujajar Barat No. 78'),
(12, 'Kantor Cab Sindangkerta ', '(022) 694 1381', 'Jl. Raya Cililin No. 155 Cililin'),
(13, 'Kantor Cab Cicadas', '(022) 872 41487', 'Jl. Padasuka Atas No. 61 Cimeunyan'),
(14, 'Kantor Cab Paseh', '(022) 595 4204', 'Jl. Cipaku No. 65 Ebah, Majalaya'),
(15, 'Kantor Cab Majalaya', '(022) 595 2472', 'Jl. Rancaekek - Majalaya, Majasetra - Majalaya'),
(16, 'Kantor Cab Pangalengan', '(022) 597 9568', 'Jl. Raya Pangalengan No. 247 Pangalengan');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(3) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(71, 1367307853, '127.0.0.1', 'BPR'),
(70, 1367307799, '127.0.0.1', 'BPR'),
(69, 1367307769, '127.0.0.1', 'BPR'),
(68, 1367307659, '127.0.0.1', 'BPR'),
(67, 1367307555, '127.0.0.1', 'BPR'),
(66, 1367307108, '127.0.0.1', 'BPR'),
(65, 1367306881, '127.0.0.1', 'BPR'),
(64, 1367301166, '127.0.0.1', 'BPR'),
(63, 1367299730, '127.0.0.1', 'BPR'),
(62, 1367245750, '127.0.0.1', 'BPR'),
(61, 1367244595, '127.0.0.1', 'BPR'),
(60, 1367244403, '127.0.0.1', 'BPR'),
(59, 1367244391, '127.0.0.1', 'BPR'),
(58, 1367244386, '127.0.0.1', 'BPR'),
(57, 1367244292, '127.0.0.1', 'BPR'),
(56, 1367244278, '127.0.0.1', 'BPR'),
(55, 1367244276, '127.0.0.1', 'BPR'),
(54, 1367244270, '127.0.0.1', 'BPR'),
(72, 1367307860, '127.0.0.1', 'BPR'),
(73, 1367307877, '127.0.0.1', 'BPR'),
(74, 1367307904, '127.0.0.1', 'BPR'),
(75, 1367307906, '127.0.0.1', 'BPR'),
(76, 1367308006, '127.0.0.1', 'BPR'),
(77, 1367308016, '127.0.0.1', 'BPR'),
(78, 1367308018, '127.0.0.1', 'BPR'),
(79, 1367308171, '127.0.0.1', 'BPR'),
(80, 1367308174, '127.0.0.1', 'BPR'),
(81, 1367308190, '127.0.0.1', 'BPR'),
(82, 1367308191, '127.0.0.1', 'BPR'),
(83, 1367308201, '127.0.0.1', 'BPR'),
(84, 1367308224, '127.0.0.1', 'BPR'),
(85, 1367308840, '193.176.75.39', 'BPR'),
(86, 1367308853, '193.176.75.39', 'BPR'),
(87, 1367308924, '193.176.75.39', 'BPR'),
(88, 1367309057, '193.176.75.39', 'BPR'),
(89, 1367309069, '193.176.75.39', 'BPR'),
(90, 1367309239, '193.176.75.39', 'BPR'),
(91, 1367311940, '193.176.75.39', 'BPR'),
(92, 1367467190, '127.0.0.1', 'BPR'),
(93, 1367639901, '127.0.0.1', 'BPR'),
(94, 1367639907, '127.0.0.1', 'BPR'),
(95, 1367639919, '127.0.0.1', 'BPR'),
(96, 1367842057, '127.0.0.1', 'BPR'),
(97, 1367844269, '127.0.0.1', 'BPR'),
(98, 1367845370, '127.0.0.1', 'BPR'),
(99, 1367892906, '127.0.0.1', 'BPR'),
(100, 1367893027, '127.0.0.1', 'BPR'),
(101, 1367893981, '127.0.0.1', 'BPR'),
(102, 1367898141, '127.0.0.1', 'BPR'),
(103, 1367929693, '127.0.0.1', 'BPR'),
(104, 1367930430, '127.0.0.1', 'BPR'),
(105, 1367930445, '127.0.0.1', 'BPR'),
(106, 1367936067, '127.0.0.1', 'BPR'),
(107, 1367936839, '127.0.0.1', 'BPR'),
(108, 1368020678, '127.0.0.1', 'BPR'),
(109, 1368021508, '127.0.0.1', 'BPR'),
(110, 1368021647, '127.0.0.1', 'BPR'),
(111, 1368026409, '127.0.0.1', 'BPR'),
(112, 1368027443, '127.0.0.1', 'BPR'),
(113, 1368028093, '127.0.0.1', 'BPR'),
(114, 1368029043, '127.0.0.1', 'BPR');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `parent` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`, `slug`, `url`, `content`, `images`, `parent`) VALUES
(4, 'Deposito', 'deposito', 'deposito', '<p><strong>Deposito</strong> atau yang sering juga disebut sebagai deposito berjangka, merupakan produk bank sejenis jasa tabungan yang biasa ditawarkan kepada masyarakat. Dana dalam deposito dijamin oleh pemerintah melalui <a href="http://id.wikipedia.org/wiki/Lembaga_Penjamin_Simpanan" target="_blank">Lembaga Penjamin Simpanan</a> (LPS) dengan persyaratan tertentu.</p>\n<p>Deposito biasanya memiliki jangka waktu tertentu di mana uang di dalamnya tidak boleh ditarik nasabah. Deposito baru bisa dicairkan sesuai dengan tanggal jatuh temponya, biasanya deposito mempunyai <strong>jatuh tempo 1, 3, 6, atau 12 bulan</strong>. Bila deposito dicairkan sebelum tanggal jatuh tempo, maka akan kena penalti.</p>\n<p>Deposito juga dapat diperpanjang secara otomatis menggunakan sistem <strong>ARO (Automatic Roll Over)</strong>. Deposito akan diperpanjang otomatis setelah jatuh tempo, sampai pemiliknya mencairkan depositonya.</p>\n<p>Bunga deposito biasanya lebih tinggi daripada bunga tabungan biasa. Bunga dapat diambil setelah tanggal jatuh tempo atau dimasukkan lagi ke pokok deposito untuk didepositokan lagi pada periode berikutnya.</p>', 'deposito.png', 0),
(3, 'Kredit', 'kredit', 'kredit', '<p><strong>Kredit</strong> merupakan suatu fasilitas keuangan yang memungkinkan seseorang atau badan usaha untuk meminjam uang untuk membeli produk dan membayarnya kembali dalam jangka waktu yang ditentukan. UU No. 10 tahun 1998 menyebutkan bahwa kredit adalah penyediaan uang atau tagihan yang dapat dipersamakan dengan itu, berdasarkan persetujuan atau kesepakatan pinjam meminjam antara bank dengan pihak lain yang mewajibkan pihak peminjam untuk melunasi utangnya setelah jangka watu tertentu dengan pemberian bunga. Jika seseorang menggunakan jasa kredit, maka ia akan dikenakan bunga tagihan.</p>\n<p><strong>SYARAT KREDIT</strong><br />Ketika bank memberikan pinjaman uang kepada nasabah, bank tentu saja mengharapkan uangnya kembali. Karenanya, untuk memperkecil risiko (uangnya tidak kembali, sebagai contoh), dalam memberikan kredit bank harus mempertimbangkan beberapa hal yang terkait dengan itikad baik (willingness to pay) dan kemampuan membayar (ability to pay) nasabah untuk melunasi kembali pinjaman beserta bunganya. Hal-hal tersebut terdiri dari Character (kepribadian), Capacity (kapasitas), Capital (modal), Colateral (jaminan), dan Condition of Economy (keadaan perekonomian), atau sering disebut sebagai 5C (panca C).</p>\n<p><strong>Karakter</strong><br />Watak, sifat, kebiasaan debitur (pihak yang berutang) sangat berpengaruh pada pemberian kredit. Kreditur (pihak pemberi utang) dapat meneliti apakah calon debitur masuk ke dalam Daftar Orang Tercela (DOT) atau tidak. Untuk itu kreditur juga dapat meneliti biodatanya dan informasi dari lingkungan usahanya. Informasi dari lingkungan usahanya dapat diperoleh dari supplier dan customer dari debitur. Selain itu dapat pula diperoleh dari Informasi Bank Sentral, namun tidak dapat diperoleh dengan mudah oleh masyarakat umum, karena informasi tersebut hanya dapat di akses oleh pegawai Bank bidang perkreditan dengan menggunakan password dan komputer yang terhubung secara on-line dengan Bank sentral.</p>\n<p><strong>Kapasitas</strong><br />Kapasitas adalah berhubungan dengan kemampuan seorang debitur untuk mengembalikan pinjaman. Untuk mengukurnya, kreditur dapat meneliti kemampuan debitur dalam bidang <a href="http://id.wikipedia.org/wiki/Manajemen" target="_blank">manajemen</a>, <a href="http://id.wikipedia.org/wiki/Keuangan" target="_blank">keuangan</a>, <a href="http://id.wikipedia.org/wiki/Pemasaran" target="_blank">pemasaran</a>, dan lain-lain.</p>\n<p><strong>Modal</strong><br />Dengan melihat banyaknya modal yang dimiliki debitur atau melihat berapa banyak modal yang ditanamkan debitur dalam usahanya, kreditur dapat menilai modal debitur. Semakin banyak modal yang ditanamkan, debitur akan dipandang semakin serius dalam menjalankan usahanya.</p>\n<p><a href="http://id.wikipedia.org/wiki/Jaminan" target="_blank"><strong>Jaminan</strong></a><br />Jaminan dibutuhkan untuk berjaga-jaga seandainya debitur tidak dapat mengembalikan pinjamannya. Biasanya nilai jaminan lebih tinggi dari jumlah pinjaman.</p>\n<p><strong>Kondisi ekonomi</strong><br />Keadaan perekonomian di sekitar tempat tinggal calon debitur juga harus diperhatikan untuk memperhitungkan kondisi <a href="http://id.wikipedia.org/wiki/Ekonomi" target="_blank">ekonomi</a> yang akan terjadi di masa datang. Kondisi ekonomi yang perlu diperhatikan antara lain masalah daya beli <a href="http://id.wikipedia.org/wiki/Masyarakat" target="_blank">masyarakat</a>, luas <a href="http://id.wikipedia.org/wiki/Pasar" target="_blank">pasar</a>, persaingan, perkembangan <a href="http://id.wikipedia.org/wiki/Teknologi" target="_blank">teknologi</a>, bahan baku, <a href="http://id.wikipedia.org/wiki/Pasar_modal" target="_blank">pasar modal</a>, dan lain sebagainya.</p>\n<p><strong>Hal-hal yang Diperjanjikan Dalam Perjanjian Kredit</strong></p>\n<ul>\n<li>Jangka waktu kredit</li>\n<li>Suku bunga</li>\n<li>Cara pembayaran</li>\n<li>Agunan/ jaminan kredit</li>\n<li>Biaya administrasi</li>\n<li>Asuransi jiwa dan tagihan</li>\n</ul>', 'credits.png', 0),
(5, 'Tabungan', 'tabungan', 'tabungan', '<p>Menurut Undang-undang No 10 Tahun 1998 Tentang Perbankan, Tabungan adalah simpanan yang penarikannya hanya dapat dilakukan menurut syarat tertentu yang disepakati, tetapi tidak dapat ditarik dengan cek, bilyet giro, dan /atau alat lainnya yang dipersamakan dengan itu.</p>\n<p><strong>Tujuan Menabung dibank adalah&nbsp;:</strong></p>\n<ol>\n<li>Penyisihan sebagian hasil pendapatan nasabah untuk dikumpulkan sebagai cadangan hari depan</li>\n<li>Sebagai alat untuk melakukan transaksi bisnis atau usaha individu / kelompok</li>\n</ol>\n<p><strong>Sarana Penarikan Tabungan&nbsp;:</strong></p>\n<ol>\n<li>Buku Tabungan</li>\n<li>Slip penarikan</li>\n<li>ATM (Anjungan Tunai Mandiri)</li>\n<li>Sarana lainnya (Formulir Transfer, Internet Banking, Mobile Banking, dll)</li>\n</ol>\n<p><strong>Perhitungan Bunga Tabungan&nbsp;:</strong></p>\n<ul>\n<li>Metode Saldo Terendah Besarnya bunga tabungan dihitung dari jumlah saldo terendah pada bulan laporan dikalikan dengan suku bunga per tahun kemudian dikalikan dengan jumlah hari pada bulan laporan dan dibagi dengan jumlah hari dalam satu tahun.</li>\n<li>Misalnya untuk menghitung bunga pada bulan Mei, maka besarnya bunga dihitung&nbsp;: Bunga tabungan = ....&nbsp;% * 31/365 * saldo terendah pada bulan Mei</li>\n<li>Metode Perhitungan Bunga Berdasarkan Saldo Rata-rata Pada metode ini, bunga dalam satu bulan dihitung berdasarkan saldo rata-rata dalam bulan berjalan. Saldo rata-rata dihitung berdasarkan jumlah saldo akhir tabungan setiap hari dalam bulan berjalan, dibagi dengan jumlah hari dalam bulan tersebut.</li>\n<li>Metode Perhitungan Bunga Berdasarkan Saldo Harian Pada metode ini bunga dihitung dari saldo harian. Bunga tabungan dalam bulan berjalan dihitung dengan menjumlahkan hasil perhitungan bunga setiap harinya.</li>\n</ul>\n<p><strong>Faktor-faktor tingkat Tabungan</strong></p>\n<ol>\n<li>Tinggi rendahnya pendapatan masyarakat</li>\n<li>Tinggi rendahnya suku bunga bank</li>\n<li>adanya tingkat kepercayaan terhadap bank</li>\n</ol>\n<p><strong>Hal-hal yang perlu diperhatikan&nbsp;:</strong></p>\n<ol>\n<li>Sebelum Anda menabung, tanyakan metode perhitungan bunga yang diberlakukan oleh bank tersebut.</li>\n<li>Suku bunga tabungan dapat berubah sewaktuwaktu,karena itu suku bunga ini disebut suku bunga mengambang atau floating rate.</li>\n<li>Beberapa bank menetapkan suku bunga tabungan tetap untuk jangka waktu tertentu (fixed rate).</li>\n<li>Atas bunga tabungan yang diperoleh akan dikenakan pajak sesuai ketentuan berlaku.</li>\n</ol>', 'savings.png', 0),
(6, 'Kredit SILANTAP', 'kredit-silantap', 'kredit/kredit-micro', '<p><strong>KREDIT SILANTAP</strong><br />Kredit yang di berikan kepada nasabah yang mempunyai penghasilan tetap, kami memberikan suku bunga yang ringan dan dari segi<br />persyaratan sangat mudah, proses cepat antara lain persyaratn yang diperlukan adalah:</p><ol><li>Foto Copy KTP</li><li>Foto 4x6 berwarna</li><li>Foto Copy Kartu Keluarga</li><li>Foto Copy Akte Nikah</li></ol>', '', 3),
(7, 'Kredit MCR', 'kredit-mcr', 'kredit/kredit-silantap', '<p><strong>KREDIT MCR</strong></p>', '', 3),
(8, 'Kredit Umum', 'kredit-umum', 'kredit/kredit-umum', '<p><strong>KREDIT UMUM</strong></p>', '', 3),
(9, 'Tabungan Kotak Mas', 'tabungan-kotak-mas', 'tabungan/tabungan-kotak-mas', '<p><strong>TABUNGAN KOTAK MAS</strong></p>', '', 5),
(10, 'Tabungan Umrah', 'tabungan-umrah', 'tabungan/tabungan-umrah', '<p><strong>TABUNGAN UMRAH</strong></p>', '', 5),
(11, '1 Bulan', '1-bulan', 'deposito/1-bulan', '<p><strong>SIMPANAN BERJANGKA</strong></p>', '', 4),
(12, '2 Bulan', '2-bulan', 'deposito/2-bulan', '<p>SIMPANAN BERJANGKA 2 BULAN</p>', '', 4),
(13, '3 Bulan', '3-bulan', 'deposito/3-bulan', '<p><strong>SIMPANAN BERJANGKA 3 BULAN</strong></p>', '', 4),
(14, '6 Bulan', '6-bulan', 'deposito/6-bulan', '<p><strong>SIMPANAN BERJANGKA 6 BULAN</strong></p>', '', 4),
(15, '12 Bulan', '12-bulan', 'deposito/12-bulan', '<p><strong>SIMPANAN BERJANGKA 12 BULAN</strong></p>', '', 4),
(32, 'Tabungan Serbaguna', 'tabungan-serbaguna', '', '<p><strong>TABUNGAN SERBAGUNA</strong></p>', '', 5),
(33, 'Tabunganku', 'tabunganku', '', '<p><strong>TABUNGANKU</strong></p>', '', 5),
(34, 'Tabungan serga guna sekali', 'tabungan-serga-guna-sekali', '', '<p>tabunga serbaguna sekali</p>', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `no_rek`, `email`, `address`, `phone`, `subject`, `comment`) VALUES
(6, 'DIkdik Tasdik Laksan', '0220202000661', 'dikdik.zahirra@gmail.com', 'Komp Margahayu Kencana Blok I 1 No. 9', '082116914224', 'komplain', 'Aduh gimana ini mana katanya ada hadiah, untuk nasabah yang rutin nabungya,\nko blm ada kabr juga gmn persyaratanya....? tolong dong di tindak lanjuti....');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `content`, `images`, `date`, `parent`, `created_at`, `updated_at`) VALUES
(2, 'Hajatan BPR Banjaran yang ke 2 kalinya', 'hajatan-bpr-banjaran-yang-ke-2-kalinya', '<p>Diselenggarakan di alun-alun banjaran.</p>', '', '0000-00-00', 0, '2013-05-14 20:16:31', '2013-05-14 20:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `images`, `created_at`, `updated_at`) VALUES
(11, 'Perkembangan perbankan di indonesia', 'Perkembangan-perbankan-di-indonesia', '<p>Perkembangan Perbankan di Indonesia<br />Semakin berkembangnya perbankan saat ini hingga kepelosok desa memberikan solusi yang sangat membantu perekonomian yang ada di sebuah negara, termasuk Indonesia. Perkembangan tersebut tidak lepas dari faktor-faktor internal bank itu sendiri ataupun faktor eksternal seperti keadaan perekonomian negara, keadaan politik,hukum dan sosial. Hal inilah yang mendasari bank di indonesia terbagi menjadi beberapa periode.<br />Periode Perkembangan Perbankan Indonesia<br />Secara garis besar periode perkembangan perbankan indonesia terbagai beberapa tahun sebagai berikut</p>\n<p>Dari tahun 1988-1996<br />Dari tahun 1997-1998<br />Dari tahun 1999-2002<br />sampai sekarang.</p>\n<p><strong>Periode 1988 &ndash; 1996</strong><br />Dikeluarkannya paket deregulasi 27 Oktober 1988 (Pakto 88), antara lain berupa relaksasi ketentuan permodalan untuk pendirian bank baru telah menyebabkan munculnya sejumlah bank umum berskala kecil dan menengah. Pada akhirnya, jumlah bank umum di Indonesia membengkak dari 111 bank pada Oktober 1988 menjadi 240 bank pada tahun 1994?1995, sementara jumlah Bank Perkreditan Rakyat (BPR) meningkat drastis dari 8.041 pada tahun 1988 menjadi 9.310 BPR pada tahun 1996 2. Periode 1997 &ndash; 1998 Pertumbuhan pesat yang terjadi pada periode 1988 &ndash; 1996 berbalik arah ketika memasuki periode 1997 &ndash; 1998 karena terbentur pada krisis keuangan dan perbankan. Bank Indonesia, Pemerintah, dan juga lembaga?lembaga internasional berupaya keras menanggulangi krisis tersebut, antara lain dengan melaksanakan rekapitalisasi perbankan yang menelan dana lebih dari Rp 400 triliun terhadap 27 bank dan melakukan pengambilalihan kepemilikan terhadap 7 bank lainnya. Secara spesifik langkah?langkah yang dilakukan untuk menanggulangi krisis keuangan dan perbankan tersebut adalah:<br />Penyediaan likuiditas kepada perbankan yang dikenal dengan<br />Bantuan Likuiditas Bank Indonesia (BLBI) mengidentifikasi dan merekapitalisasi bank?bank yang masih memiliki potensi untuk melanjutkan kegiatan usahanya dan bank?bank yang memiliki dampak yang signifikan terhadap kebijakannya<br />Menutup bank?bank yang bermasalah dan melakukan konsolidasi perbankan dengan melakukan marger<br />Mendirikan lembaga khusus untuk menangani masalah yang ada di industri perbankan seperti Badan Penyehatan Perbankan Nasional (BPPN)<br />Memperkuat kewenangan Bank Indonesia dalam pengawasan perbankan melalui penetapan Undang?Undang No. 23/1999 tentang Bank Indonesia yang menjamin independensi Bank Indonesia dalam penetapan kebijakan.</p>\n<p><strong>Periode 1999 &ndash; 2002</strong><br />Krisis perbankan yang demikian parah pada kurun waktu 1997 &ndash; 1998 memaksa pemerintah dan Bank Indonesia untuk melakukan pembenahan di sektor perbankan dalam rangka melakukan stabilisasi sistem keuangan dan mencegah terulangnya krisis.<br />Langkah penting yang dilakukan sehubungan dengan itu adalah:</p>\n<p>Memperkuat kerangka pengaturan dengan menyusun rencana implementasi yang jelas untuk memenuhi 25 Basel Core Principles for Effective Banking Supervision yang menjadi standard internasional bagi pengawasan bank<br />Meningkatkan infrastruktur sistem pembayaran dengan mengembangkan Real Time Gross Settlements (RTGS)<br />Menerapkan bank guarantee scheme untuk melindungi simpanan masyarakat di bank Merekstrukturisasi kredit macet, baik yang dilakukan oleh BPPN, Prakarsa Jakarta maupun Indonesian Debt Restrukturing Agency (INDRA)<br />Melaksanakan program privatisasi dan divestasi untuk bankbank BUMN dan bank?bank yang direkap<br />Meningkatkan persyaratan modal bagi pendirian bank baru.</p>\n<p><strong>Periode 2002 &ndash; Sekarang</strong><br />Berbagai perkembangan positif pada sektor perbankan sejak dilaksanakannya program stabilisasi antara lain tampak pada pemberian kredit yang mulai meningkat pada inovasi produk yang mulai berjalan, seperti pengembangan produk derivatif (antara laincredit linked notes), serta kerjasama produk dengan lembaga lain (reksadana dan bancassurance)<br />Itulah beberapa periode penting sejarah perkembangan perbankan di Indonesia, dengan berbagai kebijakan pemerintah guna meningkatkan efektifitas dan efisiensi lembaga perbankan sebagai salah satu faktor penyejahteraan masyarakat.<br />Sementara itu setiap perbankan memiliki periode masing-masing untuk terus meningkatkan dan menjadi yang terbaik untuk masyarakat, untuk informasi perkembangan salah satu bank di Indonesia yakni Bank Mandiri bisa anda dapatkan didalam artikel Bank Mandiri Bank Terbaik di Indonesia</p>', 'Bank-pekanbaru.jpg', '2013-05-07 10:50:31', '2013-05-13 19:57:45'),
(12, 'Tak Masuk Rancangan KUHP, 6 Kejahatan Ini Bisa Dipidana dengan UU Lama', 'Tak-Masuk-Rancangan-KUHP-6-Kejahatan-Ini-Bisa-Dipidana-dengan-UU-Lama', '<p>Jakarta - Sedikitnya ada 6 kejahatan yang tidak masuk dalam rancangan KUHP yang tengah digodok DPR. Namun jangan khawatir, UU lama tetap berlaku untuk kejahatan-kejahatan tersebut.<br /><br />"Sejauh tindak pidana dalam UU lain tersebut masuk dalam kategori administrative criminal law atau sanksi pidana, tetap ada di dalam UU yang bersangkutan," kata salah satu perumus Rancangan KUHP Dr Mudzakir kepada detikcom, Minggu (5/4/2013).<br /><br />6 Kejahatan tersebut yaitu illegal logging, illegal mining, illegal fishing, kejahatan perbankan, kejahatan perpajakan dan kejahatan perburuhan. Saat ini, kejahatan tersebut diatur dalam UU terkait. Alasannya, kejahatan tersebut bermula dari ranah hukum administrasi, bukan hukum pidana.<br /><br />"Masuknya ranah hukum administrasi atau ilegal. Jika dimasukkan ke KUHP, maka harus masuk kualifikasi kejahatannya misalnya illegal logging masuknya pencurian kayu hutan," ujar pengajar Universitas Islam Indonesia (UII) Yogyakarta ini.<br /><br />Dalam Rancangan KUHP memuat 766 pasal dengan 38 bab. Dari jumlah tersebut, kualifikasi khusus hanya diberlakukan terhadap beberapa kejahatan tertentu yang mengadopsi dari UU yang telah ada. Seperti Bab IX tentang Tindak Pidana Terhadap HAM, BAB XXXII tentang Tindak Pidana Korupsi dan BAB XXXIII tentang Tindak Pidana Pelayaran.<br /><br />Di luar yang diatur dalam bab khusus, Rancangan KUHP hanya mengatur sifat kejahatan perbuatannya.<br /><br />"Misalnya memasuki pekarangan orang lain atau tindak pidana lingkungan hidup," papar Mudzakir. Tindak pidana lingkungan hidup diatur dalam Bagian Kedelapan BAB VIII Rancangan KUHP.<br />&nbsp;</p>', '215640_bankbjbisi.jpg', '2013-05-07 10:53:33', '2013-05-13 19:57:59'),
(13, 'MA: Sengketa Perbankan Syariah Bisa Diadili di 2 Pengadilan ', 'MA-Sengketa-Perbankan-Syariah-Bisa-Diadili-di-2-Pengadilan-', '<p><strong>Jakarta</strong> - Sengketa perbankan syariah sering menimbulkan kebingungan di kalangan masyarakat. Sebab ada yang gugatannya diadili di peradilan umum dan yang di peradilan agama. Sehingga muncul uji materi terkait hal ini di Mahkamah Konstitusi (MK).<br /><br />"Jadi, pengadilan sengketa perbankan syariah terbagi dua. Ada yang ke pengadilan umum dan pengadilan agama karena memang seperti itu undang-undangnya," kata Ketua Kamar Pengadilan Agama Mahkamah Agung (MA), Andi Syamsul Alam, di gedung MA, Jalan Medan Merdeka Utara, Jakarta Pusat, Jumat (3/5/2013).<br /><br />Andi menjelaskan, perbedaan sengketa tersebut apakah masuk pengadilan umum dan agama tergantung akad dan transaksi di suatu perbankan syariah. Artinya, kapasitas pengadilan ditentukan transaksi yang disengketakan dalam perbankan syariah.<br /><br />"Majelis hakim yang akan menilai, mana yang transaksinya merujuk dan harus diadili di peradilan umum dan mana yang merujuk pada peradilan agama. Jadi yang menentukan sekali adalah perbankan," ujar Andi.<br /><br />Andi menyatakan peradilan umum dan agama memiliki kesempatan yang sama dalam pengadilan perbankan syariah. Ia juga memberikan contoh dalam hukum keluarga yang juga terbagi di peradilan umum dan agama.<br /><br />"Contohnya seperti hukum keluarga yang juga terbagi dua, yakni untuk non muslim ke peradilan umum dan yang muslim ke peradilan agama. Dan selama ini tidak ada masalah," tutup Andi.</p>', '174501_ndisyamsuarisaputra19.jpg', '2013-05-03 10:55:39', '2013-05-13 19:58:15'),
(14, 'Kasus Kredit Fiktif, Kejagung Sita Satu Dus Besar Dokumen dari Kantor BJB ', 'kasus-kredit-fiktif,-kejagung-sita-satu-dus-besar-dokumen-dari-kantor-bjb-', '<p>Jakarta - Tim Penyidik Kejaksaan Agung (Kejagung) menyita sejumlah dokumen di kantor pusat Bank Jabar Banten (BJB). Penyitaan tersebut bagian dari lanjutan penyidikan kasus dugaan penyaluran kredit fiktif dari BJB ke PT Cipta Inti Permindo (CIP) yang disinyalir merugikan negara sebesar Rp 55 miliar.<br /><br />Selama 6,5 jam tim penyidik menggeledah salah satu ruangan di kantor pusat Bank BJB, Jalan Naripan, Kota Bandung, Kamis (2/5/2013). Tujuh petugas berpakaian dinas dari Kejagung datang pukul 14.30 WIB dan keluar sekitar pukul 21.10 WIB.<br /><br />&quot;Ini terkait kasus penyidikan pemberian kredit terhadap PT CIP yang diberikan Bank BJB,&quot; ujar salah satu Tim Penyidik Satuan Khusus Perbankan Pidsus Kejagung, Hendra, usai penggeledahan di kantor tersebut.<br /><br />Hendra menegaskan sepanjang penggeledahan berlangsung, pihak BJB bersikap kooperatif. &quot;Enggak ada alot. Seluruhnya lancar,&quot; ujarnya.<br /><br />Ia menyebut pihaknya memboyong beberapa berkas dokumen guna kepentingan penyidikan. Namun Hendra enggan membeberkan berapa jumlah dokumen dan berasal di ruangan mana.<br /><br />&quot;Hanya Dokumen saja,&quot; terangnya.<br /><br />Hendra tidak banyak berbicara saat dicecar wartawan. Ia pun tergesa masuk mobil Kijang Inova perak bernopol B 8215 XQ. &quot;Untuk selanjutnya bisa ditanyakan ke Penkum Kejagung. Kami hanya ditugasi saja,&quot; pintanya.<br /><br />Dua petugas Kejagung memasukan satu kardus besar dan puluhan tumpukan dokumen ke bagian belakang mobil tersebut. Selanjutnya mereka meninggalkan Bank BJB dengan pengawalan satu unit mobil ranger Sat Sabhara Polrestabes Bandung.<br /><br />Dalam kasus dugaan korupsi penyelewengan kredit yang diduga fiktif ini, Kejagung telah menetapkan 5 tersangka yakni Komisaris PT Radina Niaga Mulia, Elda Devianne Adiningrat (EDA). Perusahaan Elda merupakan salah satu vendor yang menerima fasilitas kredit dari Bank BJB. Empat tersangka lainnya yaitu YS (Direktur PT CIP), DY (mantan Direktur Utama PT E Farm Bisnis Indonesia), DPS (Direktur Komersil PT E Farm Bisnis Indonesia), dan ESD (Manajer komersil Bank BJB cabang Surabaya). Keempatnya ditetapkan sebagai tersangka sejak 22 Januari 2013 lalu.</p>', '215640_bankbjbisi.jpg', '2013-05-07 10:56:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `value` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `value`, `created_at`, `updated_at`) VALUES
(23, 'TITLE_SIMULASI_KREDIT', 'text', '<p>Simulasi Kredit</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'VISION_MISION', 'text', '<p>Menjadi BPR yang Profesional, Tangguh dan Terpercaya dengan selalu mengutamakan kepuasan nasabah.<br />Menjalankan aktivitas BPR yang unggul dengan mengutamakan pelayanan kepada usaha mikro, kecil, menengah untuk menunjang peningkatan ekonomi rakyat kecil.<br />Memberikan pelayanan prima kepada nasabah melalui jaringan kerja yang didukung oleh organisasi, manajemen dan sumber daya yang profesional,tangguh dan terpercaya.<br />Memberikan keuntungan dan manfaat yang optimal kepada pemegang saham, karyawan, nasabah dan pemerintah. <br />Menyediakan dan mengembangkan pelayanan keuangan yang inovatif, berkualitas dan melebihi harapan masyarakat yang dinamik dengan hasil terbaik.<br />Membina jaringan kerjasama saling menguntungkan yang dilandasi rasa saling percaya.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'TITLE_VISION', 'text', '<p>Visi, Misi</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'FACEBOOK', 'text', '<p>http://facebook.com/pd_bpr_kab_bandung</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'TWITTER', 'text', '<p>http://twitter.com/pd_bpr_kab_bandung</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'TITLE_HISTORY', 'text', '<p><strong>Sejarah Singkat</strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'TITLE_ABOUT', 'text', '<p>Know better about us</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'ABOUT_US', 'text', '<p><strong>About</strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'TITLE_NEWS', 'text', '<p>Berita &amp; Acara</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'HISTORIES', 'text', '<p>Perusahaan Daerah Bank Perkreidtan Rakyat (PD.BPR) Kabupaten Bandung didirikan dengan Peraturan Daerah Kabupaten Bandung Nomor : 04 Tahun 2009 tanggal 2 April 2009 tentang Perusahaan Daerah Bank Perkreditan Rakyat, yang merupakan penggabungan dari 15 PD.BPR di Wilayah Kabupaten Bandung.<br /><br /></p>\n<p><strong>PD.Bank Perkreditan Rakyat (BPR)</strong> Kabupaten Bandung telah mendapat izin dari Bank Indonesia melalui Surat Keputusan Gubernur Bank Indonesia Nomor :11/15/KEP.DpG/2009 Tanggal 15 Desember 2009 tentang pemberian izin penggabungan usaha (Konsolidasi) 15 PD.BPR di Kabupaten menjadi Perusahaan Daerah.<br /><br /><strong>DASAR HUKUM</strong></p>\n<div style="margin-left: 30px;"><ol>\n<li>Undang &ndash; undang No. 5 tahun 1962 tentang Perusahaan Daerah.</li>\n<li>\n<p>Undang-undang Republik Indonesia No. 7 tahun 1992 tentang Perbankan sebagaimana telah diubah dengan Undang-undang Republik Indonesia No. 10 tahun 1998.</p>\n</li>\n<li>\n<p>Peraturan Dalam Negeri No. 22 tahun 2006 tentang Pengelolaan Bank Perkreditan Rakyat Milik Pemerintah Daerah.</p>\n</li>\n<li>\n<p>Peraturan Bank Indonesia No. 8/26/PBI2006 tahun 2006 tentang Bank Perkreditan Rakyat.</p>\n</li>\n<li>\n<p>Peraturan Daerah Kabupaten Bandung No. 4 tahun 2009 tentang Pembubaran dan Konsolidasi Perusahaan Daerah Bank Perkreditan Rakyat (PD.BPR) Kabupaten Bandung.</p>\n</li>\n<li>\n<p>Keputusan Deputi Bank Indonesia nomor 11/15/KEP,DpG/2009 Tanggal 15 Desember 2009 tentang Pemberian Izin Peleburan usaha (Konsolidasi) 15 (lima belas) PD.BPR di Kabupaten Bandung menjadi PD.Bank Perkreditan Rakyat Kabupaten Bandung.</p>\n</li>\n<li>\n<p>Peraturan Bank Indonesia Nomor ; 8/20/PBI/2006 tentang Transparansi Kondisi Keuangan Bank Perkreditan Rakyat.</p>\n</li>\n</ol></div>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'TITLE', 'text', '<p>PT BPR KAB BANDUNG KERTA RAHARJA</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'MOTO', 'text', '<h2><strong class="quote">&ldquo;</strong> Cinta tidak pernah meminta, ia sentiasa memberi, cinta membawa penderitaan, tetapi tidak pernah berdendam, tak pernah membalas dendam. Di mana ada cinta di situ ada kehidupan; manakala kebencian membawa kepada kemusnahan. <strong class="quote"> &rdquo;</strong></h2>\n<p class="author">Mahatma Gandhi, <strong>Aktivis<br /></strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'LOGO_HOME', 'images', 'logo_bpr.png', '0000-00-00 00:00:00', '2013-05-13 21:10:53'),
(28, 'DESIGN_BY', 'text', '<p>Wiwin Offset</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'CONTENT_SUKU_BUNGA', 'text', '<table class="generic rounded">\n<thead>\n<tr><th>SUKU BUNGA</th><th>&nbsp;</th></tr>\n</thead>\n<tbody>\n<tr>\n<td><strong>BI Rate</strong></td>\n<td><strong>5.75%</strong></td>\n</tr>\n<tr>\n<td><strong>LPS BPR Rate</strong></td>\n<td><strong>8.00%</strong></td>\n</tr>\n<tr>\n<td><strong>LPS Bank Umum</strong></td>\n<td><strong>6.00%</strong></td>\n</tr>\n<tr>\n<td><strong>Simpanan</strong></td>\n<td><strong>5.00%</strong></td>\n</tr>\n<tr>\n<td><strong>Tabungan Serbaguna</strong></td>\n<td><strong>7.00%</strong></td>\n</tr>\n<tr>\n<td><strong>Tabunganku</strong></td>\n<td><strong>8.00%</strong></td>\n</tr>\n<tr>\n<td><strong>Deposito </strong></td>\n<td><strong>4.00%</strong></td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
