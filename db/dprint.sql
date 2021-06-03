-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 03 Jun 2021 pada 15.47
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dprint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `foto` text NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `keterangan`, `harga`, `stok`, `kategori`, `foto`, `owner`) VALUES
(27, 'Baju kaos', 'Baju lengan pendek polos', 55000, 500, 'Baju', 'OIP.jpg', 19),
(28, 'Celana ', 'Celana pendek polos', 30000, 2000, 'Celana', 'OIPLC4BMRRP.jpg', 19),
(29, 'Portofolio Sidu', 'Kertas fortofolio 1 rim', 65000, 200, 'Kertas', 'kertas.jpg', 27),
(30, 'Pin', 'Pin bundar, sesuai gambar', 3000, 5000, 'Pin', 'pin.jpg', 27),
(31, 'Stiker ', 'Gambar stiker dapat di rikwes ukuran 15x15cm ', 2000, 500, 'Sticker', 'stiker.jpg', 27),
(32, 'Topi', 'Topi berwarna hitam polos', 15000, 200, 'Topi', 'topihitam.jpg', 19),
(33, 'Topi Putih', 'Topi berwarna putih polos polos', 18000, 350, 'Topi', 'topi_putih.jpg', 20),
(34, 'Pin', 'Pin perangkat desa', 55000, 100, 'Pin', 'download11.jpg', 20),
(35, 'Stiker Desain', 'Stiker berbahan tebal dan lem tidak mudah hilang', 17000, 370, 'Sticker', 'download_(1)1.jpg', 20),
(36, 'Kertas binder', 'Kertas berukuran A5, di jual dalam 1 pak isi 200 lembar', 35000, 400, 'Kertas', 'download_(2)1.jpg', 21),
(37, 'Celana training wanita', 'Celana panjang dewasa wanita', 65000, 600, 'Celana', 'images.jpg', 21),
(38, 'Baju berkera', 'Baju ukuran dewasa', 80000, 5000, 'Baju', 'download_(3).jpg', 21),
(39, 'Spanduk', 'Spanduk ini terbuat dari kertas yang tahan air, ukuran 3x6m', 50000, 200, 'Kertas', '5777883_370c3753-8f0d-405b-a420-89ecdc8b6f19_2048_0.jpg', 25),
(40, 'Baju olahraga muslim', 'Baju ini memiliki panjang hingga di atas lutut, kami menjualnya 1 pasang dengan celanan', 155000, 500, 'Baju', 'download_(4).jpg', 25),
(41, 'Pin berbentuk', 'Pin anggota DPRD', 30000, 5000, 'Pin', 'images_(1).jpg', 25),
(42, 'Kaos Kaki', 'Ukuran dewasa batas mata kaki', 3000, 7000, 'Baju', 'WhatsApp_Image_2020-05-03_at_22_13_14.jpeg', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `bintang` int(11) DEFAULT '5',
  `keterangan` varchar(250) NOT NULL,
  `foto_hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_pesanan`, `nama_pemesan`, `bintang`, `keterangan`, `foto_hasil`) VALUES
(1, NULL, 'Vera', 5, 'WOW hasilnya bagus banget deh', NULL),
(2, NULL, 'Fau', 4, 'Bagus !', NULL),
(4, 1, 'ikko', 5, 'asdasdasdasd', 'Screen_Shot_2021-05-24_at_11_20_29_PM.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `gambar_kategori` varchar(250) NOT NULL,
  `list_paket` varchar(250) NOT NULL,
  `mulai_harga` varchar(250) DEFAULT '0',
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`, `list_paket`, `mulai_harga`, `deskripsi`) VALUES
(1, 'TShirt', 'tshirt.jpeg', 'tshirt.png', '125.000 - 175.000', 'Caramels tootsie roll carrot cake sugar plum. Sweet roll jelly bear claw liquorice.\r\n                                Gingerbread lollipop dragée cake. Pie topping jelly-o. Fruitcake dragée candy canes\r\n                                tootsie roll. Pastry jelly-o cupcake. Bonbon brownie soufflé muffin.'),
(2, 'Almamater', 'almet.jpeg', 'almamater.png', '125.000 - 175.000', 'Caramels tootsie roll carrot cake sugar plum. Sweet roll jelly bear claw liquorice. Gingerbread lollipop dragée cake. Pie topping jelly-o. Fruitcake dragée candy canes tootsie roll. Pastry jelly-o cupcake. Bonbon brownie soufflé muffin. Caramels tootsie roll carrot cake sugar plum. Sweet roll jelly bear claw liquorice. Gingerbread lollipop dragée cake. Pie topping jelly-o. Fruitcake dragée candy canes tootsie roll. Pastry jelly-o cupcake. Bonbon brownie soufflé muffin.'),
(3, 'Jaket', 'jaket.jpeg', 'jaket.png', '170.000 - 300.000', NULL),
(4, 'Polo', 'polo.jpeg', 'polo.png', '90.000 - 115.000', NULL),
(5, 'Hoodie', 'hoodie.jpeg', 'hoodie.png', '150.000 - 230.000', NULL),
(6, 'Kaos Lapangan', 'kaoslapangan.jpeg', 'rompi.png', '128.000 - 160.000', NULL),
(7, 'Jersey', 'jersey.jpeg', 'jersey.png', '150.000 - 230.000', NULL),
(8, 'Jas', 'jaz.jpeg', 'jas.png', '125.000 - 175.000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakaiian`
--

CREATE TABLE `pakaiian` (
  `id_pakaiian` int(11) NOT NULL,
  `id_kategori` int(250) NOT NULL,
  `paket` varchar(250) NOT NULL,
  `kelas` varchar(250) NOT NULL,
  `jenis_bahan` varchar(250) NOT NULL,
  `jenis_bordir` varchar(250) NOT NULL,
  `kategori_jersey` varchar(250) NOT NULL,
  `jenis_sablon` varchar(250) NOT NULL,
  `ketebalan` varchar(250) NOT NULL,
  `harga` int(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pakaiian`
--

INSERT INTO `pakaiian` (`id_pakaiian`, `id_kategori`, `paket`, `kelas`, `jenis_bahan`, `jenis_bordir`, `kategori_jersey`, `jenis_sablon`, `ketebalan`, `harga`, `keterangan`) VALUES
(1, 2, 'Paket 1 ', 'Sultan', 'Toyobo + Cotton', 'Bordir Computer', '', '', '', 175000, 'Free Design'),
(2, 1, 'Paket 2 ', 'Medium', 'Cotton Toto', '', '', 'Rubber', '20s', 68000, 'Free Design KK'),
(3, 1, 'Paket 3 ', 'Medium', 'Cotton', 'Bordir HP', '', 'rubber', '20s', 60000, 'free design'),
(4, 2, 'Paket 2', 'Reguler', 'Cotton', 'Bordir', '', 'rubber', '20s', 52000, 'free design'),
(5, 1, 'Paket Sultan 1', 'Sultan', 'Cotton Atom', '', '', 'Discharge', '24s', 80000, ''),
(6, 1, 'Paket Sultan 2', 'Sultan', 'Cotton Hoka', '', '', 'Plastisol', '20s', 80000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_bayar` varchar(250) NOT NULL,
  `total_bayar` int(250) NOT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `alamat_rumah` varchar(250) NOT NULL,
  `jenis_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(250) NOT NULL,
  `bukti_dp` varchar(250) DEFAULT NULL,
  `notes` varchar(250) NOT NULL,
  `penilaiian` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_user`, `tanggal_bayar`, `total_bayar`, `nama_pemesan`, `email`, `phone`, `alamat_rumah`, `jenis_bayar`, `bukti_bayar`, `bukti_dp`, `notes`, `penilaiian`) VALUES
(6, 13, '1622375551', 136000, 'Gekss', 'm.abizard1123@gmail.com', '082137244899', 'Jalan Komplek Permata Buah Batu D 22', 0, '60b37c7ff2b7a.png', NULL, 'asdasdasdasdasd', 0),
(10, 15, '1622641450', 136000, 'ZZZZ', 'jmhdoaoe@gmail.com', '11111', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 0, '60b79ce6052dc.png', '60b78b2a42c33.png', 'aaaaa', 0),
(11, 15, '1622647306', 175000, 'xxaxaxa', 'jmhdoaoe@gmail.com', '0019292', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a20a9c937.png', NULL, '', 0),
(12, 15, '1622648605', 175000, 'asdasd', 'jmhdoaoe@gmail.com', '00029', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a71dbac87.png', NULL, 'zzzz', 0),
(13, 15, '1622648740', 68000, 'asdas', 'jmhdoaoe@gmail.com', '666', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a7a46b339.png', NULL, '', 0),
(14, 15, '1622648972', 68000, '1', 'jmhdoaoe@gmail.com', '2', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a88ccc4ad.png', NULL, '', 0),
(15, 15, '1622649014', 68000, '1', 'jmhdoaoe@gmail.com', '2', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a8b6eb30a.png', NULL, '', 0),
(16, 15, '1622649086', 68000, '1', 'jmhdoaoe@gmail.com', '2', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a8fe9724d.png', NULL, '', 0),
(17, 15, '1622649308', 68000, '1', 'jmhdoaoe@gmail.com', '2', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7a9dcbf6dd.png', NULL, '', 0),
(18, 15, '1622649628', 68000, '1', 'jmhdoaoe@gmail.com', '2', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 1, '60b7ab1ce01e5.png', NULL, '', 0),
(19, 15, '1622650788', 243000, '111', 'jmhdoaoe@gmail.com', '222', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 0, '60b8f29cd66f2.png', '60b7afa47a21c.png', '123123', 0),
(20, 15, '1622734288', 68000, 'Oliver Jumahid', 'jmhdoaoe@gmail.com', '0898989898', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', 0, '60b8f62aa548e.png', '60b8f5d044cac.png', 'mama', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ukuran_s` int(11) NOT NULL,
  `ukuran_m` int(11) NOT NULL,
  `ukuran_l` int(11) NOT NULL,
  `ukuran_xl` int(11) NOT NULL,
  `ukuran_xxl` int(11) NOT NULL,
  `ukuran_3xl` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `total_harga` int(250) NOT NULL,
  `status_pesanan` varchar(250) NOT NULL,
  `tanggal_checkout` date DEFAULT NULL,
  `desain_produk` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `id_barang`, `id_kategori`, `ukuran_s`, `ukuran_m`, `ukuran_l`, `ukuran_xl`, `ukuran_xxl`, `ukuran_3xl`, `jumlah_barang`, `harga_paket`, `total_harga`, `status_pesanan`, `tanggal_checkout`, `desain_produk`, `id_user`, `id_bayar`) VALUES
(1, 0, 1, 1, 1, 0, 0, 0, 0, 2, 68000, 136000, 'sedang diproses', '2021-05-28', 'tidak upload desain', 13, 6),
(4, 0, 1, 2, 0, 0, 0, 0, 0, 2, 68000, 136000, 'pesanan selesai', '2021-06-02', 'tidak upload desain', 15, 10),
(5, 0, 2, 1, 0, 0, 0, 0, 0, 1, 175000, 175000, 'sedang diproses', '2021-06-02', 'tidak upload desain', 15, 12),
(7, 0, 1, 1, 0, 0, 0, 0, 0, 1, 68000, 68000, 'sedang diproses', '2021-06-02', 'tidak upload desain', 15, 18),
(8, 0, 1, 1, 0, 0, 0, 0, 0, 1, 68000, 68000, 'pesanan selesai', '2021-06-02', 'tidak upload desain', 15, 19),
(9, 0, 2, 1, 0, 0, 0, 0, 0, 1, 175000, 175000, 'pesanan dikirim', '2021-06-02', 'tidak upload desain', 15, 19),
(10, 0, 1, 1, 0, 0, 0, 0, 0, 1, 68000, 68000, 'pesanan selesai', '2021-06-03', 'tidak upload desain', 15, 20),
(12, 0, 2, 0, 1, 0, 0, 0, 0, 1, 52000, 52000, 'di dalam keranjang', NULL, 'tidak upload desain', 15, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `id_posting` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `gambar2` varchar(250) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis` varchar(250) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id_posting`, `gambar`, `gambar2`, `id_kategori`, `jenis`, `caption`, `tanggal_upload`) VALUES
(1, '60153a45c4584.jpg', 'ts1.png', 1, 'T-Shrit Impos', 'Ketika kamu jadi impostor tapi kamu bukan jadi suspect be like? mungkin among us sedang booming boomingnya bulan bulan kemarin, tapi ternyata hingga saat ini masih banyak juga loh yang main among us...', '2020-11-05'),
(2, '60154b623f832.jpg', '60154b95300d9.jpg', 2, 'Almamater keren cuy', 'Ketika kamu jadi impostor tapi kamu bukan jadi suspect be like? mungkin among us sedang booming boomingnya bulan bulan kemarin, tapi ternyata hingga saat ini masih banyak juga loh yang main among us...', '2020-11-05'),
(5, '601cf59eefcdb.jpg', '', 1, 'T Shirt wow keren banget', 'OK', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `jenis_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `jenis_pengguna`) VALUES
(1, 'Siswa'),
(2, 'Mahasiswa'),
(3, 'Pekerja'),
(4, 'Masyarakat Biasa'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(25) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `role_id`, `fullname`, `phonenumber`, `username`, `email`, `password`, `alamat`, `created_at`, `status`) VALUES
(2, 1, NULL, NULL, 'Farhan', 'farhando1123@gmail.com', '$2y$10$J3l2QCYtuxKJPJ3QzMW70ebsZV1UT1Q93WNP.J6z8cTurkpL8pJUy', '', '15-11-2020, 06:44:04', 1),
(3, 5, NULL, NULL, 'desy', 'desyRahmat@gmail.com', '$2y$10$J3l2QCYtuxKJPJ3QzMW70ebsZV1UT1Q93WNP.J6z8cTurkpL8pJUy', 'Bandung Barat', '15-11-2020, 09:01:55', 1),
(4, 2, NULL, NULL, 'vera', 'veraardianipertiwi@gmail.com', '$2y$10$Nl/u4RBc.Hfsi7KalkCs2u/Ocd9.f6plwM3QkPqCQhkvcdYH95R16', 'Bandung', '08-12-2020, 12:28:46', 1),
(13, 2, NULL, NULL, 'ikko', 'm.abizard1123@gmail.com', '$2y$10$uv08QQNurfwpmKUm6E1jTeQ6DNJEFlrVYtIabTiLM3caA51u1QRuy', '', '11-02-2021, 06:19:18', 1),
(15, 2, 'Oliver Jumahid', '0898989898', 'jumahid', 'jmhdoaoe@gmail.com', '$2y$10$E94.j2qsTsi9oZyNWqN34Omz1IPKy0.aWJjnzoy6tldV7.ma5SNue', 'Jl Pd Kelapa, Duren Sawit, Jakarta Timur', '01-06-2021, 11:12:30', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'm.abizard1123@gmail.com', 'OtxQM5uyFDW2Yx8WIofzq37CilvYkRkOuX+N1B0bCVM=', 1619500159);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `fk_feedback_pemesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pakaiian`
--
ALTER TABLE `pakaiian`
  ADD PRIMARY KEY (`id_pakaiian`),
  ADD KEY `fk_pakaiian_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `fk_pembayaran_user` (`id_user`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pemesanan_pembayaran` (`id_bayar`),
  ADD KEY `fk_pemesanan_kategori` (`id_kategori`),
  ADD KEY `fk_pemesanan_user` (`id_user`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_posting`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pakaiian`
--
ALTER TABLE `pakaiian`
  MODIFY `id_pakaiian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_pemesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pemesanan` (`id_pesanan`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pakaiian`
--
ALTER TABLE `pakaiian`
  ADD CONSTRAINT `fk_pakaiian_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `fk_pemesanan_pembayaran` FOREIGN KEY (`id_bayar`) REFERENCES `pembayaran` (`id_bayar`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_pemesanan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE SET NULL;
