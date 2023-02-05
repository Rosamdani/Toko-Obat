-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 02:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoobat`
--

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `id_apotek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_apotek` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apotek`
--

INSERT INTO `apotek` (`id_apotek`, `id_user`, `nama_apotek`, `alamat`, `no_telp`) VALUES
(1, 1, 'Rosyamdani', 'Kerumut', '087885384243');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Demam'),
(2, 'Flu & Batuk'),
(3, 'Vitamin & Suplemen');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_apotek` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `komposisi` text NOT NULL,
  `dosis` text NOT NULL,
  `aturan_pakai` text NOT NULL,
  `gol_produk` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_apotek`, `nama_produk`, `deskripsi`, `komposisi`, `dosis`, `aturan_pakai`, `gol_produk`, `gambar`, `harga`, `satuan`) VALUES
(0, 3, 1, 'Imboost Force Ultimate', 'IMBOOST FORCE ULTIMATE adalah suplemen dengan kandungan Echinecea purpurea herb dry extract, Blackelderberry fruit extract, Zn picolinate dilengkapi dengan Pureway-C (Vitamin C generasi terbaru) dan Vitamin D3 dalam bentuk kaplet salut selaput', 'Echinacea purpurea dry herb extract 500 mg, black elderberry dry fruit extract 400 mg, Zn picolinate 10 mg, citrus bioflavonoids extract 25% 100 mg, vitamin C lipid metabolite (pureway C) 300 mg, vitamin D3 400 IU', 'Dewasa: 1 kali sehari, 1 kaplet', 'Dikonsumsi sesudah makan', 'Vitamin & Suplemen', 'assets/product/Imboost Force Ultimate 10 Kaplet.png', '12.000', 'Tablet'),
(1, 3, 1, 'Imboost Force Ultimate', 'IMBOOST FORCE ULTIMATE adalah suplemen dengan kandungan Echinecea purpurea herb dry extract, Blackelderberry fruit extract, Zn picolinate dilengkapi dengan Pureway-C (Vitamin C generasi terbaru) dan Vitamin D3 dalam bentuk kaplet salut selaput', 'Echinacea purpurea dry herb extract 500 mg, black elderberry dry fruit extract 400 mg, Zn picolinate 10 mg, citrus bioflavonoids extract 25% 100 mg, vitamin C lipid metabolite (pureway C) 300 mg, vitamin D3 400 IU', 'Dewasa: 1 kali sehari, 1 kaplet', 'Dikonsumsi sesudah makan', 'Vitamin & Suplemen', 'assets/product/Imboost Force Ultimate 10 Kaplet.png', '15.000', 'Tablet'),
(2, 2, 1, 'Sterimar Nose', 'Merupakan alat kesehatan yang direkomendasikan untuk anak anak dan orang dewasa untuk membantu membersihkan dan mengurangi kotoran, melembabkan dan mempertahankan kelembaban alami mukosa, membantu meningkatkan fungsi pernafasan dan pola tidur sehat', 'Sea water 31.82 mL, purified water qsp 100 mL', '2-6 kali semprotan per hari tiap lubang hidung (atau lebih jika diperlukan). Disarankan untuk penggunaan sebelum tidur atau membersihkan hidung sehari-hari.', 'Semprotkan pada tiap lubang hidung. Lama penyemprotan 1-2 detik. Bersihkan nosel dengan air hangat setelah digunakan dan keringkan.', 'Alat Kesehatan & Medis Habis Pakai', 'assets/product/Sterimar Nose Hygiene and Comfort 50 ml.png', '140.000', 'Per Botol');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `username`, `email`, `password`, `tgl_buat`) VALUES
(1, 'Rosyamdani', 'Kerumut', 'rosyamdani', 'rosamdai91@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-01-08 18:28:12'),
(2, 'Dani', 'Kerumut', 'dani', 'rosyamdani2000018114@webmail.uad.ac.id', '21232f297a57a5a743894a0e4a801fc3', '2023-01-10 07:17:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id_apotek`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apotek`
--
ALTER TABLE `apotek`
  MODIFY `id_apotek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apotek`
--
ALTER TABLE `apotek`
  ADD CONSTRAINT `apotek_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
