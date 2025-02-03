-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 03:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_bandung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`id`, `nama`, `kategori`, `deskripsi`, `alamat`, `latitude`, `longitude`) VALUES
(1, 'Braga Street', 'Sejarah dan Kuliner', 'Kawasan jalan bersejarah dengan kafe dan galeri seni.', 'Jl. Braga, Bandung', '-6.91746400', '107.61912300'),
(2, 'Gedung Sate', 'Ikon Kota', 'Ikon Kota Bandung dengan arsitektur yang unik.', 'Jl. Diponegoro No.22, Bandung', '-6.90248400', '107.61834800'),
(3, 'Trans Studio Bandung', 'Taman Hiburan', 'Taman hiburan indoor terbesar di Bandung.', 'Jl. Gatot Subroto No.289, Bandung', '-6.92665100', '107.63594000'),
(4, 'Kawah Putih', 'Wisata Alam', 'Danau kawah vulkanik dengan warna air yang memukau.', 'Ciwidey, Bandung', '-7.16655400', '107.40298900'),
(5, 'Situ Patenggang', 'Wisata Alam', 'Danau alami yang indah dengan pemandangan pegunungan.', 'Rancabali, Bandung', '-7.16673000', '107.35602300'),
(6, 'Taman Hutan Raya Ir. H. Djuanda', 'Wisata Alam', 'Kawasan hutan dengan pemandangan dan gua bersejarah.', 'Dago Pakar, Bandung', '-6.86084100', '107.63034700'),
(7, 'Floating Market Lembang', 'Kuliner', 'Pasar terapung dengan berbagai kuliner khas.', 'Lembang, Bandung', '-6.81668500', '107.61768000'),
(8, 'Farmhouse Lembang', 'Wisata Rekreasi', 'Destinasi wisata dengan nuansa peternakan Eropa.', 'Lembang, Bandung', '-6.83209100', '107.60521700'),
(9, 'The Lodge Maribaya', 'Wisata Outdoor', 'Aktivitas luar ruangan seperti trekking dan zipline.', 'Maribaya, Bandung', '-6.82722600', '107.65997200'),
(10, 'Dusun Bambu', 'Wisata Rekreasi', 'Wisata keluarga dengan suasana alam yang asri.', 'Cisarua, Bandung', '-6.79794100', '107.59291200'),
(11, 'Saung Angklung Udjo', 'Budaya', 'Pusat pertunjukan seni angklung tradisional.', 'Padasuka, Bandung', '-6.89715000', '107.65329200'),
(12, 'Tebing Keraton', 'Wisata Alam', 'Tebing dengan pemandangan hutan dan pegunungan.', 'Ciburial, Bandung', '-6.83274800', '107.63611600'),
(13, 'Puncak Bintang', 'Wisata Alam', 'Destinasi dengan pemandangan malam yang memukau.', 'Bukit Moko, Bandung', '-6.84841800', '107.66285700'),
(14, 'Lembang Park & Zoo', 'Kebun Binatang', 'Kebun binatang modern dengan taman hiburan.', 'Lembang, Bandung', '-6.83026200', '107.60598800'),
(15, 'Braga City Walk', 'Belanja dan Kuliner', 'Pusat perbelanjaan dan kuliner di kawasan Braga.', 'Jl. Braga No.99-101, Bandung', '-6.91785700', '107.60967500'),
(16, 'Paris Van Java', 'Belanja', 'Pusat perbelanjaan modern dengan suasana terbuka.', 'Jl. Sukajadi No.137-139, Bandung', '-6.88580900', '107.59561000'),
(17, 'Cihampelas Walk', 'Belanja', 'Mall dengan konsep semi-outdoor dan kuliner.', 'Jl. Cihampelas No.160, Bandung', '-6.89532900', '107.60543900'),
(18, 'Curug Dago', 'Wisata Alam', 'Air terjun yang tersembunyi di kawasan Dago.', 'Dago Pojok, Bandung', '-6.86910500', '107.62069700'),
(19, 'Curug Maribaya', 'Wisata Alam', 'Air terjun dengan kolam pemandian air panas.', 'Maribaya, Bandung', '-6.82130900', '107.66473300'),
(20, 'Dago Dreampark', 'Wisata Rekreasi', 'Taman hiburan keluarga dengan aktivitas outdoor.', 'Dago Giri, Bandung', '-6.85877200', '107.62389800'),
(21, 'Trans Studio Bandung', 'Taman Hiburan', 'Taman hiburan indoor terbesar di Bandung.', 'Jl. Gatot Subroto No.289, Bandung', '-6.92680100', '107.63497200'),
(22, 'Kampung Gajah Wonderland', 'Taman Hiburan', 'Taman hiburan dengan berbagai atraksi.', 'Jl. Sersan Bajuri KM 3.8, Bandung', '-6.82586000', '107.58092000'),
(23, 'Orchid Forest Cikole', 'Wisata Alam', 'Hutan anggrek dengan fasilitas rekreasi modern.', 'Cikole, Lembang', '-6.78575700', '107.61865400'),
(24, 'Observatorium Bosscha', 'Edukasi', 'Observatorium astronomi tertua di Indonesia.', 'Lembang, Bandung', '-6.82225200', '107.61780000'),
(25, 'Rumah Mode', 'Belanja', 'Factory outlet terkenal di Bandung.', 'Jl. Dr. Setiabudi No.41, Bandung', '-6.87970400', '107.59256600'),
(26, 'Stone Garden Citatah', 'Wisata Alam', 'Kawasan batuan alam yang indah.', 'Padalarang, Bandung', '-6.81962200', '107.46755500'),
(27, 'Jalan Asia Afrika', 'Sejarah', 'Kawasan bersejarah dengan gedung-gedung ikonik.', 'Jl. Asia Afrika, Bandung', '-6.92199500', '107.60780000'),
(28, 'Gedung Merdeka', 'Sejarah', 'Gedung bersejarah tempat Konferensi Asia-Afrika.', 'Jl. Asia Afrika No.65, Bandung', '-6.92170300', '107.60738000'),
(29, 'Museum Geologi Bandung', 'Edukasi', 'Museum dengan koleksi geologi dan sejarah alam.', 'Jl. Diponegoro No.57, Bandung', '-6.90248600', '107.61860900'),
(30, 'Kebun Binatang Bandung', 'Kebun Binatang', 'Kebun binatang dengan berbagai koleksi satwa.', 'Jl. Tamansari No.17, Bandung', '-6.88983600', '107.60969400'),
(31, 'Selasar Sunaryo Art Space', 'Seni dan Budaya', 'Galeri seni modern di kawasan Dago.', 'Jl. Bukit Pakar Timur No.100, Bandung', '-6.86180100', '107.63082900'),
(32, 'Taman Film', 'Rekreasi', 'Taman dengan layar lebar untuk menonton film.', 'Pasupati, Bandung', '-6.90101500', '107.61502400'),
(33, 'Taman Lalu Lintas', 'Rekreasi', 'Taman edukasi lalu lintas untuk anak-anak.', 'Jl. Belitung No.1, Bandung', '-6.91067200', '107.61549300'),
(34, 'Amazing Art World', 'Edukasi dan Rekreasi', 'Museum seni tiga dimensi interaktif.', 'Jl. Setiabudi No.293, Bandung', '-6.85424600', '107.59150800'),
(35, 'Jendela Alam', 'Wisata Edukasi', 'Wisata edukasi dengan konsep peternakan.', 'Jl. Sersan Bajuri KM 4.5, Bandung', '-6.82456300', '107.58203600'),
(36, 'Peta Park', 'Rekreasi', 'Taman hijau dengan fasilitas keluarga.', 'Jl. Peta No.229, Bandung', '-6.94557000', '107.58865200'),
(37, 'Teras Cikapundung', 'Rekreasi', 'Taman pinggir sungai dengan aktivitas keluarga.', 'Cikapundung, Bandung', '-6.87153100', '107.61660800'),
(38, 'De Ranch Lembang', 'Wisata Rekreasi', 'Tempat wisata dengan tema peternakan koboi.', 'Jl. Maribaya No.17, Lembang', '-6.81256900', '107.61902800'),
(39, 'Rainbow Garden', 'Wisata Rekreasi', 'Taman bunga warna-warni di Lembang.', 'Jl. Grand Hotel No.33, Lembang', '-6.81387600', '107.61676900'),
(40, 'Grafika Cikole', 'Wisata Alam', 'Area wisata dengan penginapan di tengah hutan.', 'Cikole, Bandung', '-6.79840700', '107.61488500'),
(41, 'Kampung Daun', 'Kuliner', 'Restoran dengan suasana alam yang asri.', 'Jl. Sersan Bajuri KM 4.7, Bandung', '-6.81769000', '107.59282800'),
(42, 'Upside Down World', 'Wisata Edukasi', 'Destinasi fotografi dengan konsep terbalik.', 'Jl. H. Wasid No.31, Bandung', '-6.89370900', '107.61887800');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
