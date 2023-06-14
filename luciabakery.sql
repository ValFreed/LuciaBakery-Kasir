-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308swalayantest
-- Waktu pembuatan: 18 Jan 2022 pada 14.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luciabakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `kode_faktur` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `id_tipe_pembayaran` varchar(20) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`kode_faktur`, `tanggal`, `id_pelanggan`, `nip`, `total`, `jumlah_bayar`, `id_tipe_pembayaran`, `kembalian`) VALUES
(130000002, '2022-01-15 07:30:55', 'PEL00002', 'PEG00001', 368, 400000, '11', 399632),
(130000003, '2022-01-17 05:02:32', 'PEL00003', 'PEG00002', NULL, NULL, NULL, NULL),
(130000004, '2022-01-17 05:05:14', 'PEL00001', 'PEG00001', 19500, 20000, '11', 500),
(130000005, '2022-01-17 06:37:10', 'PEL00004', 'PEG00002', 945000, 950000, '11', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jajan`
--

CREATE TABLE `jajan` (
  `kode_jajan` varchar(20) NOT NULL,
  `nama_jajan` varchar(20) DEFAULT NULL,
  `harga_jajan` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_tipe_jajan` varchar(20) DEFAULT NULL,
  `gambar` varchar(999) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jajan`
--

INSERT INTO `jajan` (`kode_jajan`, `nama_jajan`, `harga_jajan`, `stok`, `id_tipe_jajan`, `gambar`, `deskripsi`) VALUES
('JM01001', 'Bolu Kukus', 90000, 171, 'JM01', 'c3764ad14e8e35334f875a64f47feff2.png', NULL),
('JM01002', 'Kue Brownis', 80000, 200, 'JM01', NULL, NULL),
('JM01003', 'Cup Cake', 10000, 180, 'JM01', NULL, NULL),
('JM01004', 'Banana Tokyo', 6000, 200, 'JM01', NULL, NULL),
('JM01006', 'Pie Susu', 3000, 200, 'JM01', NULL, NULL),
('JP01001', 'Kue Sus', 2000, 190, 'JP01', NULL, NULL),
('JP01002', 'Lemper', 2500, 190, 'JP01', NULL, NULL),
('JP01003', 'Lumpia', 2500, 190, 'JP01', NULL, NULL),
('JP01004', 'Ketan', 3500, 200, 'JP01', NULL, NULL),
('JP01006', 'Piscok', 2500, 200, 'JP01', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` varchar(20) NOT NULL,
  `nama_jenis_kelamin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `nama_jenis_kelamin`) VALUES
('LK', 'Laki-laki'),
('PR', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(50) NOT NULL DEFAULT '',
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_jenis_kelamin` varchar(20) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_tipe_pegawai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `tanggal_lahir`, `id_jenis_kelamin`, `id_status`, `id_tipe_pegawai`) VALUES
('PEG00001', 'Itsuki', '1980-01-01', 'LK', 1, 'MG'),
('PEG00002', 'Schlain', '1981-04-02', 'LK', 1, 'MG'),
('PEG00003', 'Shiraori', '1981-11-12', 'PR', 1, 'MG'),
('PEG00004', 'Yae', '1980-09-08', 'PR', 2, 'TP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `id_jenis_kelamin` set('LK','PR') DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `id_jenis_kelamin`, `id_status`) VALUES
('PEL00001', 'Nephie', 'LK', 1),
('PEL00002', 'Zagan', 'LK', 1),
('PEL00003', 'Elly', 'LK', 1),
('PEL00004', 'Elaina', 'PR', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Belum Menikah'),
(2, 'Sudah Menikah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_jajan`
--

CREATE TABLE `tipe_jajan` (
  `id_tipe_jajan` varchar(20) NOT NULL,
  `nama_tipe_jajan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_jajan`
--

INSERT INTO `tipe_jajan` (`id_tipe_jajan`, `nama_tipe_jajan`) VALUES
('JM01', 'Jajanan Modern'),
('JP01', 'Jajanan Pasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_pegawai`
--

CREATE TABLE `tipe_pegawai` (
  `id_tipe_pegawai` varchar(20) NOT NULL,
  `nama_tipe_pegawai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_pegawai`
--

INSERT INTO `tipe_pegawai` (`id_tipe_pegawai`, `nama_tipe_pegawai`) VALUES
('MG', 'Pegawai Magang'),
('TP', 'Pegawai Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_pembayaran`
--

CREATE TABLE `tipe_pembayaran` (
  `id_tipe_pembayaran` varchar(20) NOT NULL,
  `nama_tipe_pembayaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_pembayaran`
--

INSERT INTO `tipe_pembayaran` (`id_tipe_pembayaran`, `nama_tipe_pembayaran`) VALUES
('11', 'Cash'),
('22', 'Shopee Pay'),
('33', 'Gopay');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL,
  `kode_jajan` varchar(20) DEFAULT NULL,
  `kode_faktur` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no`, `kode_jajan`, `kode_faktur`, `kuantitas`, `sub_total`) VALUES
(8, 'JM01001', 130000002, 8, 360000),
(10, 'JP01001', 130000002, 4, 8000),
(13, 'JM01001', 130000005, 8, 720000),
(14, 'JP01002', 130000005, 10, 25000),
(15, 'JM01003', 130000005, 20, 200000),
(19, 'JP01001', 130000004, 6, 12000),
(20, 'JP01003', 130000004, 3, 7500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Ival', 1),
(2, 'ival_yudha', '1122', 'iyp', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`kode_faktur`),
  ADD KEY `ID_Pelanggan` (`id_pelanggan`) USING BTREE,
  ADD KEY `ID_Tipe_Pembayaran` (`id_tipe_pembayaran`) USING BTREE,
  ADD KEY `faktur_ibfk_4` (`nip`);

--
-- Indeks untuk tabel `jajan`
--
ALTER TABLE `jajan`
  ADD PRIMARY KEY (`kode_jajan`) USING BTREE,
  ADD KEY `ID_Tipe_Jajan` (`id_tipe_jajan`) USING BTREE;

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`) USING BTREE;

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`) USING BTREE,
  ADD KEY `ID_Jenis_Kelamin` (`id_jenis_kelamin`) USING BTREE,
  ADD KEY `ID_Status` (`id_status`) USING BTREE,
  ADD KEY `ID_Tipe_Pegawai` (`id_tipe_pegawai`) USING BTREE;

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`) USING BTREE,
  ADD KEY `ID_Jenis_Kelamin` (`id_jenis_kelamin`) USING BTREE,
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`) USING BTREE;

--
-- Indeks untuk tabel `tipe_jajan`
--
ALTER TABLE `tipe_jajan`
  ADD PRIMARY KEY (`id_tipe_jajan`) USING BTREE;

--
-- Indeks untuk tabel `tipe_pegawai`
--
ALTER TABLE `tipe_pegawai`
  ADD PRIMARY KEY (`id_tipe_pegawai`) USING BTREE;

--
-- Indeks untuk tabel `tipe_pembayaran`
--
ALTER TABLE `tipe_pembayaran`
  ADD PRIMARY KEY (`id_tipe_pembayaran`) USING BTREE;

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no`),
  ADD KEY `Kode_Jajan` (`kode_jajan`) USING BTREE,
  ADD KEY `kode_faktur` (`kode_faktur`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `kode_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130000007;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `pelanggan` (`ID_Pelanggan`),
  ADD CONSTRAINT `faktur_ibfk_3` FOREIGN KEY (`ID_Tipe_Pembayaran`) REFERENCES `tipe_pembayaran` (`ID_Tipe_Pembayaran`),
  ADD CONSTRAINT `faktur_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`ID_Jenis_Kelamin`) REFERENCES `jenis_kelamin` (`ID_Jenis_Kelamin`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`ID_Status`) REFERENCES `status` (`ID_Status`),
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`ID_Tipe_Pegawai`) REFERENCES `tipe_pegawai` (`ID_Tipe_Pegawai`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_pelanggan_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`ID_Status`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_faktur`) REFERENCES `faktur` (`kode_faktur`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_jajan`) REFERENCES `jajan` (`kode_jajan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
luciabakeryecashier