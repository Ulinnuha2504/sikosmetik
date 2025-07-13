-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2025 at 09:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbatra`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hargabarang` int NOT NULL,
  `idjenisbarang` int NOT NULL,
  `keteranganbarang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `hargabarang`, `idjenisbarang`, `keteranganbarang`) VALUES
(13, 'asas', 23, 1, 'Enak DImakan'),
(14, 'Janja', 500000, 7, 'styjkl;'),
(15, 'asgasg', 456789, 1, 'ashas'),
(16, 'Wardah Lightening Day Cream', 46000, 11, 'Krim siang untuk mencerahkan kulit'),
(17, 'Skintific Moisturizer Gel', 98000, 11, 'Gel pelembap untuk kulit kombinasi'),
(18, 'Hada Labo Hydrating Lotion', 67000, 11, 'Toner ringan untuk kulit kering'),
(19, 'MS Glow Whitening Night Cream', 120000, 11, 'Krim malam untuk kulit cerah'),
(20, 'Somethinc Niacinamide Serum', 115000, 11, 'Serum pencerah dengan niacinamide'),
(21, 'Maybelline Fit Me Matte Foundation', 95000, 12, 'Foundation untuk hasil matte'),
(22, 'Wardah Colorfit Lip Paint', 48000, 12, 'Lip cream tahan lama'),
(23, 'Make Over Powerstay Compact Powder', 79000, 12, 'Bedak padat tahan lama'),
(24, 'Emina Cheeklit Cream Blush', 42000, 12, 'Blush on cair natural'),
(25, 'Pixy Make It Glow BB Cream', 58000, 12, 'BB cream dengan glowing finish'),
(26, 'Scarlett Whitening Body Lotion', 60000, 13, 'Lotion mencerahkan dengan aroma wangi'),
(27, 'Viva Hand & Body Lotion Bengkoang', 18000, 13, 'Lotion lokal harga terjangkau'),
(28, 'Love Beauty & Planet Body Wash', 45000, 13, 'Sabun mandi dengan bahan alami'),
(29, 'Nivea Extra White Serum', 52000, 13, 'Serum badan untuk mencerahkan'),
(30, 'The Body Shop Almond Milk Body Butter', 170000, 13, 'Body butter melembapkan maksimal'),
(31, 'Pantene Hair Fall Control Shampoo', 28000, 14, 'Shampoo untuk rambut rontok'),
(32, 'Tresemme Keratin Smooth Conditioner', 56000, 14, 'Conditioner untuk rambut halus'),
(33, 'Ellips Hair Vitamin Smooth & Silky', 17000, 14, 'Vitamin rambut dalam kapsul'),
(34, 'Natur Hair Tonic Ginseng', 37000, 14, 'Tonik rambut herbal'),
(35, 'L?Oreal Hair Mask Total Repair', 68000, 14, 'Masker rambut rusak dan kering'),
(36, 'Vitalis Eau De Cologne', 33000, 15, 'Cologne wangi segar'),
(37, 'Zara Femme Eau de Toilette', 140000, 15, 'Parfum elegan tahan lama'),
(38, 'Dior Miss Blooming Bouquet (Mini)', 295000, 15, 'Parfum floral feminin'),
(39, 'Oriflame Amber Elixir', 180000, 15, 'Parfum hangat dan sensual'),
(40, 'Body Fantasies Signature Spray', 72000, 15, 'Body spray wangi manis'),
(41, 'Emina Nail Polish Pink', 25000, 16, 'Kuteks pink pastel'),
(42, 'Mineral Botanica Peel Off Nail Polish', 29000, 16, 'Kuteks mudah dilepas'),
(43, 'Mizzu Nail Polish Nude', 28000, 16, 'Kuteks warna nude elegan'),
(44, 'Cuticle Oil Pen', 18000, 16, 'Minyak untuk melembutkan kutikula'),
(45, 'Nail Polish Remover Pads', 15000, 16, 'Tisu penghapus kuteks praktis'),
(46, 'Garnier Serum Mask Sakura Glow', 16000, 17, 'Sheet mask untuk kulit cerah'),
(47, 'Emina Green Tea Clay Mask', 33000, 17, 'Clay mask untuk kulit berminyak'),
(48, 'Wardah Nature Daily Mask Rice', 25000, 17, 'Masker instan mencerahkan'),
(49, 'Vienna Peel Off Gold Mask', 30000, 17, 'Masker peel-off dengan gold particles'),
(50, 'Some By Mi Real Tea Tree Sheet Mask', 21000, 17, 'Masker tea tree untuk jerawat'),
(51, 'Luxcrime Beauty Sponge', 22000, 18, 'Spons makeup lembut dan halus'),
(52, 'Viva Eyelash Curler', 17000, 18, 'Penjepit bulu mata lokal'),
(53, 'Miniso Makeup Brush Set 5pcs', 49000, 18, 'Set kuas makeup dasar'),
(54, 'Fanbo Beauty Blender', 18000, 18, 'Spons lembut berbentuk telur'),
(55, 'Brush Cleaner Pad', 13000, 18, 'Alat pembersih kuas makeup'),
(56, 'Garnier Eye Roll On', 48000, 19, 'Roll-on pengurang mata panda'),
(57, 'Viva Eye Cream', 32000, 19, 'Krim mata murah dan ringan'),
(58, 'Nivea Q10 Eye Cream', 88000, 19, 'Anti-aging eye cream'),
(59, 'Pond?s Age Miracle Eye Cream', 99000, 19, 'Mengurangi garis halus'),
(60, 'Nature Republic Hydrogel Eye Patch', 58000, 19, 'Patch mata segar dan dingin'),
(61, 'MS Glow Paket Acne', 300000, 20, 'Paket lengkap untuk kulit berjerawat'),
(62, 'Scarlett Paket Whitening', 260000, 20, 'Body care bundling set'),
(63, 'Wardah Paket Basic Skincare', 180000, 20, 'Toner + serum + moisturizer'),
(64, 'Emina Bright Stuff Series', 155000, 20, 'Paket remaja mencerahkan'),
(65, 'Safi Paket Anti-Aging', 220000, 20, 'Paket lengkap anti penuaan');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `iddetail` int NOT NULL,
  `idpenjualan` int NOT NULL,
  `idbarang` int NOT NULL,
  `jumlah` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `idjenisbarang` int NOT NULL,
  `namajenisbarang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `keteranganjenisbarang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenisbarang`
--

INSERT INTO `jenisbarang` (`idjenisbarang`, `namajenisbarang`, `keteranganjenisbarang`) VALUES
(11, 'Skincare', 'Produk perawatan kulit seperti toner, serum, pelembap'),
(12, 'Makeup', 'Produk rias wajah seperti foundation, bedak, lipstick'),
(13, 'Body Care', 'Perawatan tubuh seperti body lotion, sabun mandi'),
(14, 'Hair Care', 'Perawatan rambut seperti shampoo, conditioner, hair mask'),
(15, 'Parfum', 'Aneka parfum dan body mist'),
(16, 'Nail Art', 'Produk kuku seperti kuteks, nail remover, nail sticker'),
(17, 'Masker Wajah', 'Berbagai jenis masker wajah: sheet mask, clay, peel off'),
(18, 'Alat Makeup', 'Kuasa makeup, spons, pencabut bulu mata'),
(19, 'Perawatan Mata', 'Eye cream, eye mask, dan serum mata'),
(20, 'Paket Komplit', 'Paket perawatan komplit atau bundling promo');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idkeranjang` int NOT NULL,
  `kodeorder` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `idmenu` int NOT NULL,
  `jmlorder` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `iduser` int NOT NULL,
  `namauser` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hakakses` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(5) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`iduser`, `namauser`, `username`, `password`, `hakakses`, `status`) VALUES
(1, 'Bella', 'bella', 'e7e9ec3723447a642f762b2b6a15cfd7', 'kasir', 'aktif'),
(4, 'Heni', 'heni', 'cd07a63af5f14ac0d51b5bbbf6e93ae9', 'administrator', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idpenjualan` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `nonota` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `jam` time(6) NOT NULL,
  `idpengguna` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `totalharga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`idjenisbarang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idpenjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `iddetail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `idjenisbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `idkeranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
