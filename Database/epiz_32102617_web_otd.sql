-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.epizy.com
-- Waktu pembuatan: 06 Jul 2022 pada 20.22
-- Versi server: 10.3.27-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32102617_web_otd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `judul_about` varchar(255) NOT NULL,
  `subjek_about` varchar(255) DEFAULT NULL,
  `deskripsi_about` text DEFAULT NULL,
  `visi_misi1` varchar(255) DEFAULT NULL,
  `deskripsi_visi_misi1` text DEFAULT NULL,
  `visi_misi2` varchar(255) DEFAULT NULL,
  `deskripsi_visi_misi2` text DEFAULT NULL,
  `visi_misi3` varchar(255) DEFAULT NULL,
  `deskripsi_visi_misi3` text DEFAULT NULL,
  `gambar_about` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `judul_about`, `subjek_about`, `deskripsi_about`, `visi_misi1`, `deskripsi_visi_misi1`, `visi_misi2`, `deskripsi_visi_misi2`, `visi_misi3`, `deskripsi_visi_misi3`, `gambar_about`) VALUES
(1, 'We are JangmarArt', 'Pionir digital art (ilustrasi) beserta cetakannya yang siap menjadi partner momenmu semakin berkesan', 'Jangmarart merupakan team seniman desain kreatif khususnya digital art yang berdiri sejak 2019. ini merupakan wujud dari gemar karya sehingga kami bisa membuat kreativitas digital art ini yang dapat membantuk menemani momen momenmu semakin berkesan.', 'Layanan Kami', 'Kami melayani jasa digital art beseta berbagai produk cetakannya, kamu dapat memesan secara custom sesuai dengan kebutuhanmu', 'Misi Kami', 'Kami melayani jasa digital art beseta berbagai produk cetakannya, kamu dapat memesan secara custom sesuai dengan kebutuhanmu', 'Tentang Kami', 'Kami melayani jasa digital art beseta berbagai produk cetakannya, kamu dapat memesan secara custom sesuai dengan kebutuhanmu', 'IMG_20210409_0738312.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `applycoupon`
--

CREATE TABLE `applycoupon` (
  `id_applycoupon` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_coupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `nama_rekening`, `nomor_rekening`) VALUES
(1, 'MANDIRI', 'jangmarart', '1770006605478'),
(3, 'GOPAY', 'jangmarart', '082295153183'),
(4, 'BCA', 'jangmarart', '054828523'),
(5, 'DANA', 'jangmarart', '4728907308927');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_softfile_only` int(11) DEFAULT NULL,
  `id_softfile_print` int(11) DEFAULT NULL,
  `id_package` int(11) DEFAULT NULL,
  `id_print_only` int(11) DEFAULT NULL,
  `nama_kategori_produk` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `harga_diskon` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `harga_tambahan_biaya` int(11) DEFAULT NULL,
  `nama_tambahan_biaya` varchar(255) DEFAULT NULL,
  `nama_variasi_cart` varchar(255) DEFAULT NULL,
  `harga_variasi` int(11) DEFAULT NULL,
  `nama_cart` varchar(255) NOT NULL,
  `gambar_cart` varchar(255) NOT NULL,
  `id_ukuran_jenis_cetakan` int(11) DEFAULT NULL,
  `nama_ukuran_jenis_cetakan` varchar(255) DEFAULT NULL,
  `berat_ukuran_jenis_cetakan` int(11) DEFAULT NULL,
  `harga_ukuran_jenis_cetakan` int(11) DEFAULT NULL,
  `nama_sub_jenis_cetakan` varchar(255) DEFAULT NULL,
  `harga_sub_jenis_cetakan` int(11) DEFAULT NULL,
  `nama_packaging` varchar(255) DEFAULT NULL,
  `harga_packaging` int(11) DEFAULT NULL,
  `berat_packaging` int(11) DEFAULT NULL,
  `nama_jenis_cetakan` varchar(255) DEFAULT NULL,
  `tanggal_cart` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_users`, `id_softfile_only`, `id_softfile_print`, `id_package`, `id_print_only`, `nama_kategori_produk`, `qty`, `discount`, `price`, `harga_diskon`, `harga`, `harga_tambahan_biaya`, `nama_tambahan_biaya`, `nama_variasi_cart`, `harga_variasi`, `nama_cart`, `gambar_cart`, `id_ukuran_jenis_cetakan`, `nama_ukuran_jenis_cetakan`, `berat_ukuran_jenis_cetakan`, `harga_ukuran_jenis_cetakan`, `nama_sub_jenis_cetakan`, `harga_sub_jenis_cetakan`, `nama_packaging`, `harga_packaging`, `berat_packaging`, `nama_jenis_cetakan`, `tanggal_cart`) VALUES
(65, 29, 9, NULL, NULL, NULL, 'Soft File Only', 1, 0, 95000, 0, 0, 0, '', 'Sampai Pundak', 95000, 'Vector Art', 'arif_221.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06 05:49:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `kota_contact` varchar(255) DEFAULT NULL,
  `alamat_contact` text DEFAULT NULL,
  `no_telp_contact` varchar(50) DEFAULT NULL,
  `email_contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `kota_contact`, `alamat_contact`, `no_telp_contact`, `email_contact`) VALUES
(1, '468', 'Jl. Bumi Resik Indah', '081222854933', 'jangmarart@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` int(11) NOT NULL,
  `nama_coupon` varchar(255) NOT NULL,
  `harga_coupon` int(11) NOT NULL,
  `sampai_tanggal_coupon` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `nama_coupon`, `harga_coupon`, `sampai_tanggal_coupon`) VALUES
(1, 'ratu1', 100000, '2022-06-11'),
(4, 'amar', 50000, '2022-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `gambar_gallery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `gambar_gallery`) VALUES
(1, 'gambar-gallery2.jpg'),
(5, 'gambar_gallery2.jpg'),
(9, '15.jpg'),
(10, '10.jpg'),
(11, '48f_(11).jpg'),
(12, '48f_(12).jpg'),
(13, 'arif_22.jpg'),
(14, 'IMG_20210409_0738312.jpg'),
(15, 'IMG_20210409_07383121.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `judul_home1` varchar(255) DEFAULT NULL,
  `deskripsi_home1` text DEFAULT NULL,
  `gambar_home1` varchar(255) DEFAULT NULL,
  `judul_home2` varchar(255) DEFAULT NULL,
  `deskripsi_home2` text DEFAULT NULL,
  `gambar_home2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id_home`, `judul_home1`, `deskripsi_home1`, `gambar_home1`, `judul_home2`, `deskripsi_home2`, `gambar_home2`) VALUES
(1, 'Hi Welcome to <br> JangmarArt', 'Pionir digitial art (ilustrasi) beserta cetakannya <br> yang siap menjadi partner momenmu semakin berkesan', 'slide11.jpg', 'Design Vector <br> Illustration', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> Ipsam ducimus, facilis doloribus harum eius sint magnam, excepturi.', 'slide2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_cetakan`
--

CREATE TABLE `jenis_cetakan` (
  `id_jenis_cetakan` int(11) NOT NULL,
  `nama_jenis_cetakan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_cetakan`
--

INSERT INTO `jenis_cetakan` (`id_jenis_cetakan`, `nama_jenis_cetakan`) VALUES
(1, 'Framed Prints'),
(2, 'Pillow Prints'),
(9, 'T-shirt Prints');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `slug_kategori_produk` varchar(255) NOT NULL,
  `nama_kategori_produk` varchar(255) NOT NULL,
  `gambar_kategori_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `slug_kategori_produk`, `nama_kategori_produk`, `gambar_kategori_produk`) VALUES
(1, 'soft_file_only', 'Soft File Only', '370x240px-01.jpg'),
(2, 'soft_file_print', 'Soft File Print', '370x240px-031.jpg'),
(3, 'package', 'Package', '370x240px-041.jpg'),
(4, 'print_only', 'Print Only', '370x240px-021.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `package`
--

CREATE TABLE `package` (
  `id_package` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `nama_package` varchar(255) NOT NULL,
  `slug_package` varchar(255) NOT NULL,
  `harga_package` int(11) NOT NULL,
  `diskon_package` int(11) DEFAULT NULL,
  `variasi_package` varchar(255) DEFAULT NULL,
  `dimensi_package` varchar(255) DEFAULT NULL,
  `deskripsi_package` text DEFAULT NULL,
  `gambar_package` varchar(255) NOT NULL,
  `gambar1_package` varchar(255) DEFAULT NULL,
  `gambar2_package` varchar(255) DEFAULT NULL,
  `gambar3_package` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `package`
--

INSERT INTO `package` (`id_package`, `id_jenis_cetakan`, `id_kategori_produk`, `nama_package`, `slug_package`, `harga_package`, `diskon_package`, `variasi_package`, `dimensi_package`, `deskripsi_package`, `gambar_package`, `gambar1_package`, `gambar2_package`, `gambar3_package`, `created_at`) VALUES
(5, 1, 3, 'Package Single Vector Framed Prints', 'package_single_vector_framed_prints', 120000, 0, '-', '13  x 18 x 2 - 60 x 90 x 3 cm', '<div><span style=\"text-align: right;\">Vector Art Couple Vector Framed Prints&nbsp;ini untuk kamu yang ingin cetak foto artistikmu pada cetakan foto,, cocok untuk menemani momen-momen spesial personalmu atau hadiah orang tersayang.</span></div><div><span style=\"text-align: right;\">- Pengiriman 3-5 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', 'pp_shopee_vektor_print_8rp_5.jpg', '44.jpg', 'pp_shopee_vektor_print_12rp_2.jpg', '58.jpg', '2022-05-20 12:55:03'),
(6, 1, 3, 'Package Couple Vector Framed Prints', 'package_couple_vector_framed_prints', 240000, 0, '-', '13 x 18 x 2 - 60 x 90 x3 cm', '<div><span style=\"text-align: right;\">Vector Art Couple Vector Framed Prints&nbsp;ini sudah termasuk 2x ilustrasi(setengah badan), cocok untuk kamu yang ingin gambar artistikmu secara berpasangan dengan orang spesialmu, cocok untuk menemani momen-momen spesialmu atau hadiah orang tersayang.</span></div><div><span style=\"text-align: right;\">- Pengiriman 3-5 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', '57.jpg', '301.jpg', '61.jpg', 'TH_AMY_mockup1.jpg', '2022-06-21 14:06:30'),
(7, 2, 3, 'Package Couple Vector Art Pillow Prints', 'package_couple_vector_art_pillow_prints', 240000, 0, '-', '30 x 30 x 7 - 45 x 55 x 7 cm', '<div><div><span style=\"text-align: right;\">Vector Art Couple Vector Pillow Prints&nbsp;ini sudah termasuk 2x ilustrasi(setengah badan), cocok untuk kamu yang ingin gambar artistikmu secara berpasangan dengan orang spesialmu pada media bantal, cocok untuk menemani momen-momen spesialmu atau hadiah orang tersayang.</span></div><div><span style=\"text-align: right;\">- Pengiriman 3-5 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div></div>', '48f_(13)d.jpg', '63.jpg', '48f_(14)1.jpg', '19.jpg', '2022-07-05 15:42:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packaging`
--

CREATE TABLE `packaging` (
  `id_packaging` int(11) NOT NULL,
  `nama_packaging` varchar(255) NOT NULL,
  `deskripsi_packaging` text DEFAULT NULL,
  `harga_packaging` int(11) NOT NULL,
  `berat_packaging` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `packaging`
--

INSERT INTO `packaging` (`id_packaging`, `nama_packaging`, `deskripsi_packaging`, `harga_packaging`, `berat_packaging`) VALUES
(1, 'Packaging Premium Hardbox', 'Kemasan ini terbuat dari bahan utama hardbox yang didalamnya terdapat foam, paperbox dan greetingcard. untuk lapisan luar menggunakan bublewrap', 45000, 600),
(2, 'Packaging Standar', 'Kemasan ini terbuat dari bahan utama paper kemasan yang didalamnya terdapat foam dan greetingcard. untuk lapisan luar menggunakan bublewrap', 5000, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_pesan` varchar(255) NOT NULL,
  `email_pesan` varchar(255) NOT NULL,
  `subject_pesan` text NOT NULL,
  `deskripsi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama_pesan`, `email_pesan`, `subject_pesan`, `deskripsi_pesan`) VALUES
(1, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'Produknya bagus dan berkualitas!!!!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo dicta aut reprehenderit laudantium, nihil dignissimos in. Nesciunt quia doloribus error nulla mollitia illum reiciendis eaque ea architecto esse? Quaerat, saepe.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `print_only`
--

CREATE TABLE `print_only` (
  `id_print_only` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `nama_print_only` varchar(255) NOT NULL,
  `slug_print_only` varchar(255) NOT NULL,
  `harga_print_only` int(11) NOT NULL,
  `diskon_print_only` int(11) DEFAULT NULL,
  `variasi_print_only` varchar(255) DEFAULT NULL,
  `dimensi_print_only` varchar(150) DEFAULT NULL,
  `deskripsi_print_only` text DEFAULT NULL,
  `gambar_print_only` varchar(255) NOT NULL,
  `gambar1_print_only` varchar(255) DEFAULT NULL,
  `gambar2_print_only` varchar(255) DEFAULT NULL,
  `gambar3_print_only` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `print_only`
--

INSERT INTO `print_only` (`id_print_only`, `id_jenis_cetakan`, `id_kategori_produk`, `nama_print_only`, `slug_print_only`, `harga_print_only`, `diskon_print_only`, `variasi_print_only`, `dimensi_print_only`, `deskripsi_print_only`, `gambar_print_only`, `gambar1_print_only`, `gambar2_print_only`, `gambar3_print_only`, `created_at`) VALUES
(1, 1, 4, 'Photo Print Professional Lab', 'photo_print_professional_lab', 65000, 0, '-', '13 x 18 x 2 - 60 x 90 x 3 cm', 'Cetak foto dengan kualitas terbaik printing lab dengan pilihan variasi bingkai minimalis maupun modern sesuai dengan seleramu. dengan seketika akan menghidupkan ruangan favoritmu. Tersedia kemasan harbox untukmu yang ingin kemasa lebih premium&lt;div&gt;&lt;div&gt;&lt;span style=&quot;text-align: right;&quot;&gt;- Pengiriman 2-3 hari&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;text-align: right;&quot;&gt;- Pengeditan ringan atau file siap cetak&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;text-align: right;&quot;&gt;- Garansi cetakan luntur 1 tahun&lt;/span&gt;&lt;/div&gt;', 'cetak_normal_blok2.jpg', '30.jpg', 'IMG_20210411_0900222.jpg', 'TH_AMY_mockup.jpg', '2022-05-10 15:18:31'),
(3, 2, 4, 'Pillow Prints', 'pillow_prints', 100000, 0, '-', '30 x 30 x 7 - 45 x 55 x 7 cm', '<div>Cetak fotomu pada media bantal dengan kualitas terbaik. dengan seketika akan menghidupkan ruangan favoritmu. Tersedia kemasan hardbox untukmu yang ingin kemasa lebih premium atau untuk hadiah<div><div><span style=\"text-align: right;\">- Pengiriman 2-3 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Pengeditan ringan atau file siap cetak</span></div></div><div><span style=\"text-align: right;\">- Garansi cetakan luntur 1 tahun</span></div></div>', '63.jpg', '52.jpg', '52_1.jpg', '23.jpg', '2022-07-05 16:26:14'),
(4, 9, 4, 'T-shirt Prints', 't_shirt_prints', 110000, 0, '-', '-', '&lt;div&gt;Cetak fotomu pada T-shirt dengan seketika kamu dapat tampil beda dengan desain sesuai keinginanmu. Kamu dapat mencetak desain foto ataupun ilustrasi. Tersedia kemasan hardbox untukmu yang ingin kemasan lebih premium atau untuk hadiah&lt;div&gt;&lt;div&gt;&lt;span style=&quot;text-align: right;&quot;&gt;- Pengiriman 2-3 hari&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;text-align: right;&quot;&gt;- Pengeditan ringan atau file siap cetak&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;text-align: right;&quot;&gt;- Garansi cetakan luntur 6 bulan&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;', 'Untitled-1dd2.jpg', '13.jpg', 'White_Shirt_Template.jpg', 'LandFox_Toddler_Kid_Baby_Boys_Clothes_Outfits_Set__Cartoon_Printing_T-Shirt_+_Short_Pants_(3_4T,_White).jpg', '2022-07-05 16:42:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_transaksi`
--

CREATE TABLE `produk_transaksi` (
  `id_produk_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(50) DEFAULT NULL,
  `id_softfile_only` int(11) DEFAULT NULL,
  `id_softfile_print` int(11) DEFAULT NULL,
  `id_package` int(11) DEFAULT NULL,
  `id_print_only` int(11) DEFAULT NULL,
  `nama_tambahan_biaya_produk_transaksi` varchar(255) DEFAULT NULL,
  `nama_packaging_produk_transaksi` varchar(255) DEFAULT NULL,
  `nama_ukuran_jenis_cetakan_produk_transaksi` varchar(255) DEFAULT NULL,
  `nama_sub_jenis_cetakan_produk_transaksi` varchar(255) DEFAULT NULL,
  `nama_jenis_cetakan_produk_transaksi` varchar(255) DEFAULT NULL,
  `nama_variasi_cart` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `harga_total_satuan` int(11) NOT NULL,
  `harga_tambahan_biaya_produk_transaksi` int(11) DEFAULT NULL,
  `harga_packaging_produk_transaksi` int(11) DEFAULT NULL,
  `harga_ukuran_jenis_cetakan_produk_transaksi` int(11) DEFAULT NULL,
  `harga_sub_jenis_cetakan_produk_transaksi` int(11) DEFAULT NULL,
  `dokumen_file` varchar(255) DEFAULT NULL,
  `harga_variasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_transaksi`
--

INSERT INTO `produk_transaksi` (`id_produk_transaksi`, `no_transaksi`, `id_softfile_only`, `id_softfile_print`, `id_package`, `id_print_only`, `nama_tambahan_biaya_produk_transaksi`, `nama_packaging_produk_transaksi`, `nama_ukuran_jenis_cetakan_produk_transaksi`, `nama_sub_jenis_cetakan_produk_transaksi`, `nama_jenis_cetakan_produk_transaksi`, `nama_variasi_cart`, `qty`, `harga_satuan`, `harga_total_satuan`, `harga_tambahan_biaya_produk_transaksi`, `harga_packaging_produk_transaksi`, `harga_ukuran_jenis_cetakan_produk_transaksi`, `harga_sub_jenis_cetakan_produk_transaksi`, `dokumen_file`, `harga_variasi`) VALUES
(3, 'jma-v1xnuqp5-20220622', 8, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Setengah badan', 1, 80000, 80000, 50000, NULL, NULL, NULL, NULL, 30000),
(4, 'jma-v1xnuqp5-20220622', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Seluruh badan', 1, 50000, 50000, 0, NULL, NULL, NULL, NULL, 50000),
(5, 'jma-mft1jprs-20220622', NULL, 8, NULL, NULL, 'Extra Order', 'Packaging Premium', '5R (13cm x 18cm)', 'Frame Block Series', 'Framed Prints', 'Sampai Pundak', 1, 295000, 295000, 50000, 100000, 50000, 75000, NULL, 20000),
(6, 'jma-mft1jprs-20220622', NULL, 9, NULL, NULL, '', 'Packaging Standar', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', 'Setengah badan', 1, 150000, 150000, 0, 20000, 50000, 50000, NULL, 30000),
(7, 'jma-mft1jprs-20220622', 8, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Setengah badan', 1, 80000, 80000, 50000, NULL, NULL, NULL, NULL, 30000),
(8, 'jma-mft1jprs-20220622', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Setengah badan', 1, 30000, 30000, 0, NULL, NULL, NULL, NULL, 30000),
(9, 'jma-qp52469p-20220622', NULL, 9, NULL, NULL, '', 'Packaging Premium', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', 'Seluruh badan', 1, 250000, 250000, 0, 100000, 50000, 50000, NULL, 50000),
(10, 'jma-6nbsmubw-20220622', NULL, NULL, 6, NULL, 'Fast Delivery', 'Packaging Standar', NULL, NULL, NULL, NULL, 1, 590000, 590000, 20000, 20000, NULL, NULL, NULL, NULL),
(11, 'jma-xawudcj5-20220622', NULL, NULL, NULL, 1, NULL, 'Packaging Premium', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', NULL, 1, 250000, 250000, NULL, 100000, 50000, 50000, NULL, NULL),
(16, 'jma-mw1qd7ve-20220622', NULL, NULL, NULL, 1, NULL, 'Packaging Standar', '5R (13cm x 18cm)', 'Frame Block Series', 'Framed Prints', '', 1, 195000, 195000, NULL, 20000, 50000, 75000, NULL, 0),
(17, 'jma-mw1qd7ve-20220622', NULL, NULL, 6, NULL, 'Extra Order', 'Packaging Premium', '5R (13cm x 18cm)', NULL, NULL, '', 1, 700000, 700000, 50000, 100000, 50000, NULL, NULL, 0),
(18, 'jma-mw1qd7ve-20220622', NULL, 9, NULL, NULL, 'Fast Delivery', 'Packaging Premium', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', 'Sampai Pundak', 2, 240000, 480000, 20000, 100000, 50000, 50000, NULL, 20000),
(19, 'jma-mw1qd7ve-20220622', 9, NULL, NULL, NULL, 'Fast Delivery', NULL, NULL, NULL, NULL, 'Setengah badan', 2, 50000, 100000, 20000, NULL, NULL, NULL, NULL, 30000),
(20, 'jma-g6omx93p-20220622', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Setengah badan', 1, 30000, 30000, 0, NULL, NULL, NULL, NULL, 30000),
(21, 'jma-yfin49ht-20220623', NULL, NULL, NULL, 1, NULL, 'Packaging Standar', '5R (13cm x 18cm)', 'Frame Block Series', 'Framed Prints', '', 1, 195000, 195000, NULL, 20000, 50000, 75000, NULL, 0),
(22, 'jma-yfin49ht-20220623', NULL, NULL, 6, NULL, 'Fast Delivery', 'Packaging Premium', '5R (13cm x 18cm)', NULL, NULL, '', 1, 670000, 670000, 20000, 100000, 50000, NULL, NULL, 0),
(23, 'jma-yfin49ht-20220623', NULL, 9, NULL, NULL, 'Extra Order', 'Packaging Premium', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', 'Seluruh badan', 1, 300000, 300000, 50000, 100000, 50000, 50000, NULL, 50000),
(24, 'jma-yfin49ht-20220623', 9, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Setengah badan', 1, 80000, 80000, 50000, NULL, NULL, NULL, NULL, 30000),
(25, 'jma-mfr81fba-20220625', 9, NULL, NULL, NULL, 'Fast Delivery', NULL, NULL, NULL, NULL, 'Sampai Pundak', 1, 40000, 40000, 20000, NULL, NULL, NULL, 'icon-student.png', 20000),
(26, 'jma-cthblfcz-20220628', NULL, 9, NULL, NULL, '', 'Packaging Standar', '40cm x 40cm', NULL, 'Pillow Prints', 'Sampai Pundak', 1, 51000, 51000, 0, 20000, 11000, NULL, NULL, 20000),
(27, 'jma-w513ly6o-20220628', NULL, 8, NULL, NULL, '', 'Packaging Standar', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', 'Sampai Pundak', 1, 90000, 90000, 0, 20000, 50000, 0, NULL, 20000),
(28, 'jma-w513ly6o-20220628', NULL, 9, NULL, NULL, '', 'Packaging Standar', '40cm x 40cm', NULL, 'Pillow Prints', 'Sampai Pundak', 1, 51000, 51000, 0, 20000, 11000, NULL, NULL, 20000),
(29, 'jma-txm2x0n4-20220628', NULL, 9, NULL, NULL, 'Extra Order', 'Packaging Premium', '5R (13cm x 18cm)', 'Frame Black Series', 'Framed Prints', 'Seluruh badan', 1, 250000, 250000, 50000, 100000, 50000, 0, NULL, 50000),
(30, 'jma-txm2x0n4-20220628', NULL, 10, NULL, NULL, '', 'Packaging Standar', 'M', NULL, 'T-shirt Prints', 'Seluruh badan', 1, 160000, 160000, 0, 20000, 90000, NULL, NULL, 50000),
(31, 'jma-ubhzc6va-20220628', NULL, 8, NULL, NULL, 'Fast Delivery', 'Packaging Standar', '40cm x 40cm', NULL, 'Pillow Prints', 'Sampai Pundak', 1, 71000, 71000, 20000, 20000, 11000, NULL, NULL, 20000),
(32, 'jma-ubhzc6va-20220628', 9, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Seluruh badan', 1, 100000, 100000, 50000, NULL, NULL, NULL, NULL, 50000),
(33, 'jma-dgolonbt-20220628', 9, NULL, NULL, NULL, 'Fast Delivery', NULL, NULL, NULL, NULL, 'Setengah badan', 1, 50000, 50000, 20000, NULL, NULL, NULL, NULL, 30000),
(34, 'jma-lmip4t17-20220703', NULL, 9, NULL, NULL, 'Fast Delivery', 'Packaging Premium', '12R (30cm x 40cm) ', 'Frame Block Series', 'Framed Prints', 'Setengah badan', 1, 350000, 350000, 20000, 100000, 125000, 75000, NULL, 30000),
(35, 'jma-864vaftm-20220704', NULL, 10, NULL, NULL, 'Extra Order', 'Packaging Standar', 'M', NULL, 'T-shirt Prints', 'Sampai Pundak', 1, 180000, 180000, 50000, 20000, 90000, NULL, NULL, 20000),
(36, 'jma-864vaftm-20220704', 8, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Setengah badan', 2, 80000, 160000, 50000, NULL, NULL, NULL, NULL, 30000),
(37, 'jma-864vaftm-20220704', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Sampai Pundak', 1, 20000, 20000, 0, NULL, NULL, NULL, NULL, 20000),
(38, 'jma-loequtdz-20220704', NULL, 10, NULL, NULL, '', 'Packaging Premium', 'L', NULL, 'T-shirt Prints', 'Sampai Pundak', 1, 210000, 210000, 0, 100000, 90000, NULL, NULL, 20000),
(39, 'jma-loequtdz-20220704', NULL, 10, NULL, NULL, 'Extra Order', 'Packaging Premium', 'L', NULL, 'T-shirt Prints', 'Seluruh badan', 1, 290000, 290000, 50000, 100000, 90000, NULL, NULL, 50000),
(40, 'jma-loequtdz-20220704', 9, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Seluruh badan', 1, 100000, 100000, 50000, NULL, NULL, NULL, NULL, 50000),
(41, 'jma-lcdvtn3c-20220704', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Seluruh badan', 4, 50000, 200000, 0, NULL, NULL, NULL, NULL, 50000),
(42, 'jma-vpxce5bb-20220704', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Seluruh badan', 4, 50000, 200000, 0, NULL, NULL, NULL, NULL, 50000),
(43, 'jma-94ul3at7-20220704', 9, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Setengah badan', 5, 30000, 150000, 0, NULL, NULL, NULL, NULL, 30000),
(44, 'jma-xjxvirv7-20220705', NULL, 9, NULL, NULL, '', 'Packaging Standar', '20R (50cm x 60cm)', 'Frame White Series', 'Framed Prints', 'Setengah badan', 1, 470000, 470000, 0, 20000, 420000, 0, NULL, 30000),
(45, 'jma-xjxvirv7-20220705', NULL, 9, NULL, NULL, '', 'Packaging Standar', '8R (20cm x 30cm)', 'Frame White Series', 'Framed Prints', 'Seluruh badan', 1, 130000, 130000, 0, 20000, 60000, 0, NULL, 50000),
(46, 'jma-d8b9olfz-20220705', 9, NULL, NULL, NULL, 'Extra Order', NULL, NULL, NULL, NULL, 'Seluruh badan', 1, 100000, 100000, 50000, NULL, NULL, NULL, NULL, 50000),
(47, 'jma-glwb1mxr-20220705', NULL, NULL, NULL, 1, NULL, 'Packaging Standar', '5R (13cm x 18cm)', 'Frame Block Series', 'Framed Prints', '', 1, 120000, 120000, NULL, 20000, 50000, 0, NULL, 0),
(48, 'jma-47silucc-20220705', NULL, NULL, NULL, 1, NULL, 'Packaging Standar', '5R (13cm x 18cm)', 'Frame Block Series', 'Framed Prints', '', 1, 135000, 135000, NULL, 20000, 50000, 0, NULL, 0),
(49, 'jma-47silucc-20220705', NULL, NULL, 5, NULL, '', 'Packaging Standar', '5R (13cm x 18cm)', NULL, NULL, '', 1, 190000, 190000, 0, 20000, 50000, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_softfile_only` int(11) DEFAULT NULL,
  `id_softfile_print` int(11) DEFAULT NULL,
  `id_package` int(11) DEFAULT NULL,
  `id_print_only` int(11) DEFAULT NULL,
  `ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_users`, `id_softfile_only`, `id_softfile_print`, `id_package`, `id_print_only`, `ratings`) VALUES
(3, 0, 7, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_softfile_only` int(11) DEFAULT NULL,
  `id_softfile_print` int(11) DEFAULT NULL,
  `id_package` int(11) DEFAULT NULL,
  `id_print_only` int(11) DEFAULT NULL,
  `nama_reviews` varchar(255) NOT NULL,
  `email_reviews` varchar(255) NOT NULL,
  `deskripsi_reviews` text DEFAULT NULL,
  `gambar_reviews` varchar(255) DEFAULT NULL,
  `tanggal_reviews` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_reviews` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id_reviews`, `id_users`, `id_softfile_only`, `id_softfile_print`, `id_package`, `id_print_only`, `nama_reviews`, `email_reviews`, `deskripsi_reviews`, `gambar_reviews`, `tanggal_reviews`, `edit_reviews`) VALUES
(1, 3, 1, NULL, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum.', 'default.png', '2022-06-13 16:17:47', NULL),
(2, 3, 1, NULL, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'dsada', 'default.png', '2022-06-13 16:31:44', NULL),
(3, 3, NULL, 8, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'Reviews dari Soft File Print!!!', 'default.png', '2022-06-13 17:02:48', NULL),
(6, 3, NULL, NULL, 5, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'WOWWW!!!! Produk nya bagus sekali detail dan elegant pokonya recomended banget deh untuk pembelian disini udahh pasti trustedd guysss!!!!!', 'default.png', '2022-06-13 17:26:01', NULL),
(7, 3, NULL, NULL, NULL, 1, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'WOWWW!!!! Produk nya bagus sekali detail dan elegant pokonya recomended banget deh untuk pembelian disini udahh pasti trustedd guysss!!!!!', 'default.png', '2022-06-13 17:26:41', NULL),
(15, 3, 8, NULL, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'Bagus\r\n', 'default.png', '2022-06-25 15:19:17', 1),
(16, 3, 9, NULL, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'WOWWW!!!! Produk nya bagus sekali detail dan elegant pokonya recomended banget deh untuk pembelian disini udahh pasti trustedd guysss!!!!!', 'default.png', '2022-06-25 15:20:25', 1),
(17, 3, NULL, 9, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'Bagus euy\r\n', 'default.png', '2022-06-25 16:19:49', 1),
(19, 3, NULL, NULL, 6, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'Packagingnya bagus!!', 'default.png', '2022-06-25 20:00:05', 1),
(20, 14, NULL, 8, NULL, NULL, 'Ujang Andi', 'ujangandi@gmail.com', 'baguys', 'default.png', '2022-06-28 09:20:37', NULL),
(23, 3, NULL, 10, NULL, NULL, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'terimakasih atas barangnya sangat bermanfaat', 'default.png', '2022-07-04 07:18:38', NULL),
(24, 28, NULL, 9, NULL, NULL, 'Yasa', 'yasa@gmail.com', 'Terimakasih atas produknya', 'default.png', '2022-07-05 11:26:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Manager'),
(2, 'Administrator'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `softfile_only`
--

CREATE TABLE `softfile_only` (
  `id_softfile_only` int(11) NOT NULL,
  `id_kategori_produk` int(11) DEFAULT NULL,
  `slug_softfile_only` varchar(255) DEFAULT NULL,
  `nama_softfile_only` varchar(255) NOT NULL,
  `variasi_softfile_only` varchar(255) DEFAULT NULL,
  `harga_softfile_only` int(11) NOT NULL,
  `diskon_softfile_only` int(11) DEFAULT NULL,
  `deskripsi_softfile_only` text DEFAULT NULL,
  `gambar_softfile_only` varchar(255) DEFAULT NULL,
  `gambar1_softfile_only` varchar(255) DEFAULT NULL,
  `gambar2_softfile_only` varchar(255) DEFAULT NULL,
  `gambar3_softfile_only` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `softfile_only`
--

INSERT INTO `softfile_only` (`id_softfile_only`, `id_kategori_produk`, `slug_softfile_only`, `nama_softfile_only`, `variasi_softfile_only`, `harga_softfile_only`, `diskon_softfile_only`, `deskripsi_softfile_only`, `gambar_softfile_only`, `gambar1_softfile_only`, `gambar2_softfile_only`, `gambar3_softfile_only`, `created_at`) VALUES
(2, 1, 'karikatur_bighead', 'Karikatur (bighead)', '-', 0, 0, '<div><span style=\"text-align: right;\">Karikatur ini cukup populer karena memiliki cirinya yang&nbsp; unik kepala lebih besar dibandingkan badanya, cocok untuk menemani momen-momen spesialmu seperti farewell dll. kamu dapat meminta tema desai sesuai dengan kebutuhan momenmu</span></div><div><span style=\"text-align: right;\">- Pengerjaan 2-4 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', 'IMG_20210409_07383121.jpg', 'dtdbyu872.jpg', '6c.jpg', '50972235821_44a0f8bd3e_c_(1).jpg', '2022-04-19 14:09:02'),
(7, 1, 'sculpture_art', 'Sculpture art', '-', 0, 0, '<div><span style=\"text-align: right;\">Sculpture art ini buat kamu yang ingin tampil lebih dramatis menyerupai ala ala patung, cocok untuk kamu yang ingin tampil lebih artistik. kamu dapat meminta tema desain sesuai dengan kebutuhan momenmu</span></div><div><span style=\"text-align: right;\">- Pengerjaan 2-4 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', 'Vec_Sculpture_JPG.jpg', 'hercules-portrait-sculpture-modern-geometric-vector-29920744.jpg', 'vector_art_statue_style_by_thereisnoinstantart_dedh2z9-pre.jpg', '1a0b4f53bb02e1718658ef662bf9dc0c.jpg', '2022-05-04 09:02:52'),
(8, 1, 'wpap_art', 'WPAP art', '-', 0, 0, '<div><span style=\"text-align: right;\">WPAP ini merupakan ilustrasi yang populer dengan khas warnanya yang colorful, cocok buat kamu yang suka dengan warna dan cocok juga buat menemani momen-momen spesialmu. kamu dapat meminta tema desai sesuai dengan kebutuhan momenmu</span></div><div><span style=\"text-align: right;\">- Pengerjaan 2-4 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', '8377f788f178546f1752bd25095f9229.jpg', '59.jpg', '60.jpg', 'tth.jpg', '2022-05-20 12:32:09'),
(9, 1, 'vector_art', 'Vector Art', '-', 0, 0, '<div style=\"text-align: left;\"><span style=\"text-align: right;\">Vector art ini merupakan ilustrasi paling populer karena memiliki tingkat kemiripan yang tinggi antara bahan fotomu dan hasilnya, cocok untuk menemani momen-momen spesialmu. kamu dapat meminta tema desai sesuai dengan kebutuhan momenmu</span></div><div style=\"text-align: left;\"><span style=\"text-align: right;\">- Pengerjaan 2-4 hari&nbsp;</span></div><div style=\"text-align: left;\"><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div style=\"text-align: left;\"><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', 'arif_221.jpg', '592.jpg', '1298_21.JPG', 'dtdbyu871.jpg', '2022-06-21 12:07:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `softfile_print`
--

CREATE TABLE `softfile_print` (
  `id_softfile_print` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `id_kategori_produk` int(11) DEFAULT NULL,
  `nama_softfile_print` varchar(255) NOT NULL,
  `slug_softfile_print` varchar(255) NOT NULL,
  `harga_softfile_print` int(11) NOT NULL,
  `diskon_softfile_print` int(11) DEFAULT NULL,
  `variasi_softfile_print` varchar(255) DEFAULT NULL,
  `dimensi_softfile_print` varchar(255) DEFAULT NULL,
  `deskripsi_softfile_print` text DEFAULT NULL,
  `gambar_softfile_print` varchar(255) NOT NULL,
  `gambar1_softfile_print` varchar(255) DEFAULT NULL,
  `gambar2_softfile_print` varchar(255) DEFAULT NULL,
  `gambar3_softfile_print` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `softfile_print`
--

INSERT INTO `softfile_print` (`id_softfile_print`, `id_jenis_cetakan`, `id_kategori_produk`, `nama_softfile_print`, `slug_softfile_print`, `harga_softfile_print`, `diskon_softfile_print`, `variasi_softfile_print`, `dimensi_softfile_print`, `deskripsi_softfile_print`, `gambar_softfile_print`, `gambar1_softfile_print`, `gambar2_softfile_print`, `gambar3_softfile_print`, `created_at`) VALUES
(8, 2, 2, 'Vector Art Pillow Prints', 'vector_art_pillow_prints', 0, 0, '-', '30 x 30 x 6 - 45 x 55 x 7 cm', '<div><span style=\"text-align: right;\">Vector Art T-shirt Print ini untuk kamu yang ingin lebih possesive gambar artistikmu dicetak di bantal biar bisa kamu peluk!, kamu bisa custom desain foto ilustrasimu, cocok untuk menemani momen-momen spesialmu ataupun hadiah orang tersayang.</span></div><div><span style=\"text-align: right;\">- Pengiriman 3-5 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span>', '48f_(13)d.jpg', '48f_(13).jpg', '48f_(14).jpg', '52.jpg', '2022-05-25 15:04:03'),
(9, 1, 2, 'Vector Art Framed Prints', 'vector_art_framed_prints', 0, 0, '-', '13 x 18 x 2 - 60 x 90 x 3 cm', '<div><span style=\"text-align: right;\">Vector Art Framed Print ini untuk kamu yang ingin gambar artistikmu dicetak foto, kamu bisa custom desain foto ilustrasimu sesuai keinginanmu, cocok buat pajangan maupun hadiah orang spesialmu</span></div><div><span style=\"text-align: right;\">- Pengiriman 3-5 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', '612.jpg', '30.jpg', '431.jpg', '611.jpg', '2022-06-21 12:43:53'),
(10, 9, 2, 'Vector Art T-shirt Prints', 'vector_art_t_shirt_prints', 0, 0, '-', '20 x 25 x 3 cm', '<div><span style=\"text-align: right;\">Vector Art T-shirt Print ini untuk kamu yang ingin gambar artistikmu dicetak di t-shirt, kamu bisa custom desain foto ilustrasimu, cocok untuk menemani momen-momen spesialmu secara rame rame.</span></div><div><span style=\"text-align: right;\">- Pengiriman 3-5 hari&nbsp;</span></div><div><span style=\"text-align: right;\">- Revisi maks 3x</span></div><div><span style=\"text-align: right;\">- Softfile dikirim via whatsapp atau email</span></div>', 'Untitled-1d.jpg', 'Baju_90GirlJapan_Putih.jpg', '', '', '2022-06-28 08:21:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_jenis_cetakan`
--

CREATE TABLE `sub_jenis_cetakan` (
  `id_sub_jenis_cetakan` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `nama_sub_jenis_cetakan` varchar(255) NOT NULL,
  `harga_sub_jenis_cetakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_jenis_cetakan`
--

INSERT INTO `sub_jenis_cetakan` (`id_sub_jenis_cetakan`, `id_jenis_cetakan`, `nama_sub_jenis_cetakan`, `harga_sub_jenis_cetakan`) VALUES
(1, 1, 'Frame Block Black Series', 0),
(2, 1, 'Frame Block White Series', 0),
(4, 1, 'Frame Kayu Black Series', 0),
(8, 1, 'Frame Kayu White Series', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambahan_biaya`
--

CREATE TABLE `tambahan_biaya` (
  `id_tambahan_biaya` int(11) NOT NULL,
  `nama_tambahan_biaya` varchar(255) NOT NULL,
  `deskripsi_tambahan_biaya` text DEFAULT NULL,
  `harga_tambahan_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tambahan_biaya`
--

INSERT INTO `tambahan_biaya` (`id_tambahan_biaya`, `nama_tambahan_biaya`, `deskripsi_tambahan_biaya`, `harga_tambahan_biaya`) VALUES
(1, 'Extra Fast Delivery', 'Ini merupakan opsi untuk kamu yang memerlukan pesanan dikerjakan lebih cepat(urgent). Untuk memesan opsi ini kamu perlu izin terlebih dahulu kepada admin untuk kesanggupan kami', 40000),
(3, 'Extra Source File', 'Ini merupakan opsi untuk kamu yang memerlukan pesanan digital art beserta file sumbernya (PSD). Kamu dapat lebih leluasa untuk keperluan cetak lainnya', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_users` varchar(100) NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_transaksi` int(11) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `catatan_transaksi` text DEFAULT NULL,
  `file_retur` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_users`, `no_transaksi`, `nama_bank`, `nama_rekening`, `nomor_rekening`, `provinsi`, `kota`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `sub_total`, `total_bayar`, `status_pembayaran`, `bukti_pembayaran`, `status_transaksi`, `no_resi`, `catatan_transaksi`, `file_retur`, `created_at`) VALUES
(3, '3', 'jma-v1xnuqp5-20220622', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', NULL, NULL, NULL, NULL, '', 0, 0, 130000, 130000, 2, 'Screenshot_2.png', 4, '', 'Pesanan harus sesuai pesanan ya OK!!!!', NULL, '2022-06-22 11:36:04'),
(5, '3', 'jma-qp52469p-20220622', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', 'Jawa Barat', 'Tasikmalaya', 'jne', 'CTC', '2-3 Hari ', 16000, 1700, 250000, 266000, 2, 'Screenshot_21.png', 4, '321dasr213', '', NULL, '2022-06-22 11:45:01'),
(6, '3', 'jma-6nbsmubw-20220622', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', 'Jawa Barat', 'Majalengka', 'tiki', 'ECO', '4 Hari ', 26000, 1400, 590000, 616000, 2, 'Screenshot_44.png', 1, NULL, '', NULL, '2022-06-22 11:58:13'),
(7, '3', 'jma-xawudcj5-20220622', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', 'Jawa Barat', 'Tasikmalaya', 'jne', 'CTC', '2-3 Hari ', 48000, 5900, 1300000, 1348000, 1, 'Screenshot_42.png', 1, NULL, '', NULL, '2022-06-22 11:59:50'),
(9, '3', 'jma-mw1qd7ve-20220622', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', 'Jawa Barat', 'Tasikmalaya', 'jne', 'CTC', '2-3 Hari ', 56000, 6500, 1475000, 1531000, 2, 'Screenshot_11.png', 3, '', '', 'VID-20220626-WA0000.mp4', '2022-06-22 12:07:54'),
(10, '3', 'jma-g6omx93p-20220622', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', NULL, NULL, NULL, NULL, '', 0, 0, 30000, 30000, 1, 'Screenshot_5.png', 1, NULL, '', 'VID-20220626-WA00002.mp4', '2022-06-22 12:08:22'),
(11, '14', 'jma-yfin49ht-20220623', 'MANDIRI', 'Ujang Andi', '17700054678', 'Jawa Barat', 'Tasikmalaya', 'jne', 'CTC', '2-3 Hari ', 40000, 4800, 1245000, 1285000, 2, 'Screenshot_12.png', 2, NULL, 'dsad sadasdsadsaassda', NULL, '2022-06-23 07:47:21'),
(12, '3', 'jma-mfr81fba-20220625', 'MANDIRI', 'Moch Azmi Iskandar', '17232700054', NULL, NULL, NULL, NULL, '', 0, 0, 40000, 40000, 1, 'Screenshot_52.png', 1, NULL, '', NULL, '2022-06-25 16:33:18'),
(15, '14', 'jma-txm2x0n4-20220628', 'MANDIRI2', 'Feri Sandi Prayuda', '234543543', 'Gorontalo', 'Bone Bolango', 'tiki', 'REG', '5 Hari ', 294000, 2400, 410000, 704000, 2, 'Screenshot_53.png', 1, NULL, 'asdfd', NULL, '2022-06-28 08:36:55'),
(16, '14', 'jma-ubhzc6va-20220628', 'BRI', 'Ujang Andi', '3245435345', 'Jawa Tengah', 'Magelang', 'jne', 'REG', '1-2 Hari ', 32000, 1400, 171000, 203000, 2, 'Screenshot_43.png', 4, '3452346235', 'asdfg', 'VID-20220626-WA00003.mp4', '2022-06-28 09:11:39'),
(17, '14', 'jma-dgolonbt-20220628', 'MANDIRI', 'Ujang Andi', '17700054678', NULL, NULL, NULL, NULL, '', 0, 0, 50000, 50000, 1, 'Screenshot_531.png', 1, NULL, '', NULL, '2022-06-28 09:13:31'),
(19, '3', 'jma-864vaftm-20220704', 'MANDIRI', 'Moch Azmi Iskandar', '17700054678', 'Kepulauan Riau', 'Natuna', 'jne', 'OKE', '4-7 Hari ', 37000, 700, 360000, 397000, 1, 'icon-student.png', 1, NULL, '', NULL, '2022-07-04 06:27:26'),
(20, '3', 'jma-loequtdz-20220704', 'BRI', 'jajang', '34564642356', 'DI Yogyakarta', 'Bantul', 'tiki', 'ECO', '4 Hari ', 28000, 2000, 600000, 628000, 2, 'IMG20220607145329.jpg', 4, '', 'siap', 'mylivewallpapers_com-xDragonball-Super-Broly.mp4', '2022-07-04 07:09:57'),
(21, '3', 'jma-lcdvtn3c-20220704', 'BCA', 'Feri Sandi Prayuda', '3129890819', NULL, NULL, NULL, NULL, '', 0, 0, 200000, 200000, 2, 'fposter,small,wall_texture,product,750x100031.jpg', 4, '', 'jangan lama lama', NULL, '2022-07-04 07:30:32'),
(23, '27', 'jma-94ul3at7-20220704', 'BCA', 'Feri Sandi Prayuda', '3129890819', NULL, NULL, NULL, NULL, '', 0, 0, 150000, 150000, 1, 'pngwing_com_(5).png', 1, NULL, 'siuappp', NULL, '2022-07-04 08:07:35'),
(25, '28', 'jma-d8b9olfz-20220705', 'Bukopin', 'Yasa', '09283738', NULL, NULL, NULL, NULL, '', 0, 0, 100000, 100000, 2, 'IMG-20220705-WA00201.jpeg', 1, NULL, 'Sae', NULL, '2022-07-05 13:41:37'),
(26, '28', 'jma-glwb1mxr-20220705', 'BNI', 'Yasama', '927363', 'DKI Jakarta', 'Jakarta Utara', 'tiki', 'REG', '2 Hari ', 20000, 1400, 120000, 140000, 2, 'IMG_20220628_054709.jpg', 4, '', 'Oye', NULL, '2022-07-05 13:46:56'),
(27, '28', 'jma-47silucc-20220705', 'BCA', 'Yasama', '083736939', 'DKI Jakarta', 'Jakarta Selatan', 'jne', 'REG', '1-2 Hari ', 33000, 2800, 325000, 358000, 1, 'IMG_20220630_193441.jpg', 1, NULL, '', NULL, '2022-07-05 16:49:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_jenis_cetakan`
--

CREATE TABLE `ukuran_jenis_cetakan` (
  `id_ukuran_jenis_cetakan` int(11) NOT NULL,
  `id_jenis_cetakan` int(11) NOT NULL,
  `nama_ukuran_jenis_cetakan` varchar(150) NOT NULL,
  `harga_ukuran_jenis_cetakan` int(11) NOT NULL,
  `berat_ukuran_jenis_cetakan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran_jenis_cetakan`
--

INSERT INTO `ukuran_jenis_cetakan` (`id_ukuran_jenis_cetakan`, `id_jenis_cetakan`, `nama_ukuran_jenis_cetakan`, `harga_ukuran_jenis_cetakan`, `berat_ukuran_jenis_cetakan`) VALUES
(1, 1, '16RP (40cm x 60cm)', 340000, 3200),
(2, 1, '16R (40cm x 50cm)', 320000, 3300),
(4, 2, '12RP (30cm x 45cm)', 135000, 2200),
(7, 1, '12R (30cm x 40cm) ', 125000, 2200),
(8, 1, '8RP (20cm x 30cm)', 65000, 1200),
(9, 8, '80cm x 30cm', 25000, 100),
(10, 10, '40 x 40 cm', 1000000, 30000),
(11, 1, '8R (20cm x 30cm)', 60000, 1200),
(12, 1, '5R (13cm x 18cm)', 50000, 1200),
(13, 1, '20R (50cm x 60cm)', 420000, 5200),
(14, 1, '20RP (50cm x 70cm)', 450000, 5200),
(15, 1, '24R (60cm x 80cm)', 530000, 7200),
(16, 1, '24RP (60cm x 90cm)', 560000, 7200),
(17, 2, '30cm x 30cm', 90000, 1200),
(18, 2, '40cm x 40cm', 11000, 1200),
(19, 2, '45cm x 55cm', 150000, 1600),
(20, 9, 'M', 90000, 500),
(21, 9, 'L', 90000, 500),
(22, 9, 'XL', 90000, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama_users` varchar(255) NOT NULL,
  `email_users` varchar(255) NOT NULL,
  `password_users` varchar(255) NOT NULL,
  `alamat_users` varchar(255) DEFAULT NULL,
  `no_telp_users` varchar(100) DEFAULT NULL,
  `gambar_users` varchar(255) DEFAULT NULL,
  `created_at_users` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `role_id`, `nama_users`, `email_users`, `password_users`, `alamat_users`, `no_telp_users`, `gambar_users`, `created_at_users`) VALUES
(2, 2, 'Administrator', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Tasikmalaya,kawalu,perun griya mitra batik E148', '082295153183', 'admin1.png', '2022-04-09 08:19:02'),
(3, 3, 'Moch Azmi Iskandar', 'azmiiskandar0@gmail.com', 'de102dd5e9caf96031cf89bc688d22d9', 'Tasikmalaya,kawalu,perun griya mitra batik E148', '082295153183', '8377f788f178546f1752bd25095f9229.jpg', '2022-04-09 08:19:02'),
(4, 1, 'Manager', 'manager@gmail.com', '1d0258c2440a8d19e716292b231e3190', 'Perumahan Manager', '082943728292', 'manager1.png', '2022-04-09 08:44:03'),
(23, 3, 'Niera Noerahmi Poetri', 'niera@gmail.com', 'de102dd5e9caf96031cf89bc688d22d9', 'Panyingkiran No.25', '0822917475723', 'default.png', '2022-06-12 18:50:36'),
(24, 3, 'Andriansyah Romjali', 'andriansyah@gmail.com', 'de102dd5e9caf96031cf89bc688d22d9', 'Saguling Babakan No.53', '085719750688', 'default.png', '2022-06-13 17:58:23'),
(25, 3, 'Raditya Kustiawan', 'raditya@gmail.com', 'de102dd5e9caf96031cf89bc688d22d9', 'Saguling Babakan Jl. Nagrag No. 23', '087824883062', 'default.png', '2022-06-13 18:10:57'),
(26, 3, 'Sandi', 'sandi@gmail.com', 'ac9b4e0b6a21758534db2a6324d34a54', NULL, '0943579065387', 'default.png', '2022-07-04 08:01:27'),
(27, 3, 'Sandri', 'sandri@gmail.com', 'cb9f90096a5febea5e685a59448ed2f4', 'jl. brawijaya ujungkulon. florest', '0943579065387', 'default.png', '2022-07-04 08:01:47'),
(28, 3, 'Yasa', 'yasa@gmail.com', 'c513972f3c3431dc85d2cf4ba0784bef', 'Tasik', '0234852435', 'default.png', '2022-07-05 09:27:09'),
(29, 3, 'Ayang', 'myf7116@gmail.com', 'baaec6543b233b71d88d201276a5d120', 'Tasikmalaya', '082119374993', 'default.png', '2022-07-06 05:33:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variasi`
--

CREATE TABLE `variasi` (
  `id_variasi` int(11) NOT NULL,
  `nama_variasi_cart` varchar(255) NOT NULL,
  `harga_variasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `variasi`
--

INSERT INTO `variasi` (`id_variasi`, `nama_variasi_cart`, `harga_variasi`) VALUES
(1, 'Sampai Pundak', 95000),
(4, 'Setengah badan', 120000),
(5, 'Seluruh badan', 150000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `applycoupon`
--
ALTER TABLE `applycoupon`
  ADD PRIMARY KEY (`id_applycoupon`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indeks untuk tabel `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  ADD PRIMARY KEY (`id_jenis_cetakan`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indeks untuk tabel `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indeks untuk tabel `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`id_packaging`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `print_only`
--
ALTER TABLE `print_only`
  ADD PRIMARY KEY (`id_print_only`);

--
-- Indeks untuk tabel `produk_transaksi`
--
ALTER TABLE `produk_transaksi`
  ADD PRIMARY KEY (`id_produk_transaksi`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `softfile_only`
--
ALTER TABLE `softfile_only`
  ADD PRIMARY KEY (`id_softfile_only`);

--
-- Indeks untuk tabel `softfile_print`
--
ALTER TABLE `softfile_print`
  ADD PRIMARY KEY (`id_softfile_print`);

--
-- Indeks untuk tabel `sub_jenis_cetakan`
--
ALTER TABLE `sub_jenis_cetakan`
  ADD PRIMARY KEY (`id_sub_jenis_cetakan`);

--
-- Indeks untuk tabel `tambahan_biaya`
--
ALTER TABLE `tambahan_biaya`
  ADD PRIMARY KEY (`id_tambahan_biaya`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `ukuran_jenis_cetakan`
--
ALTER TABLE `ukuran_jenis_cetakan`
  ADD PRIMARY KEY (`id_ukuran_jenis_cetakan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `variasi`
--
ALTER TABLE `variasi`
  ADD PRIMARY KEY (`id_variasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `applycoupon`
--
ALTER TABLE `applycoupon`
  MODIFY `id_applycoupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_cetakan`
--
ALTER TABLE `jenis_cetakan`
  MODIFY `id_jenis_cetakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `package`
--
ALTER TABLE `package`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `packaging`
--
ALTER TABLE `packaging`
  MODIFY `id_packaging` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `print_only`
--
ALTER TABLE `print_only`
  MODIFY `id_print_only` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk_transaksi`
--
ALTER TABLE `produk_transaksi`
  MODIFY `id_produk_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `softfile_only`
--
ALTER TABLE `softfile_only`
  MODIFY `id_softfile_only` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `softfile_print`
--
ALTER TABLE `softfile_print`
  MODIFY `id_softfile_print` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sub_jenis_cetakan`
--
ALTER TABLE `sub_jenis_cetakan`
  MODIFY `id_sub_jenis_cetakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tambahan_biaya`
--
ALTER TABLE `tambahan_biaya`
  MODIFY `id_tambahan_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `ukuran_jenis_cetakan`
--
ALTER TABLE `ukuran_jenis_cetakan`
  MODIFY `id_ukuran_jenis_cetakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `variasi`
--
ALTER TABLE `variasi`
  MODIFY `id_variasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
