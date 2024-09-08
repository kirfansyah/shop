-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2024 pada 16.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_carts`
--

CREATE TABLE `tb_carts` (
  `id` int(11) NOT NULL,
  `id_prod` varchar(10) NOT NULL,
  `cart_item` varchar(200) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_carts`
--

INSERT INTO `tb_carts` (`id`, `id_prod`, `cart_item`, `qty`) VALUES
(18, '1', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orders`
--

CREATE TABLE `tb_orders` (
  `id` int(11) NOT NULL,
  `id_prod` varchar(10) NOT NULL,
  `id_cart` varchar(10) NOT NULL,
  `order_date` date NOT NULL,
  `total_price` varchar(100) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `lat_shipping` varchar(100) DEFAULT NULL,
  `long_shipping` varchar(100) DEFAULT NULL,
  `status_shipping` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_orders`
--

INSERT INTO `tb_orders` (`id`, `id_prod`, `id_cart`, `order_date`, `total_price`, `shipping_address`, `lat_shipping`, `long_shipping`, `status_shipping`) VALUES
(1, '1', '7', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(2, '2', '8', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(3, '2', '9', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(4, '1', '12', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(5, '2', '14', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(6, '1', '15', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(7, '2', '16', '0000-00-00', NULL, NULL, NULL, NULL, 'delivered'),
(8, '1', '17', '0000-00-00', NULL, NULL, NULL, NULL, NULL);

--
-- Trigger `tb_orders`
--
DELIMITER $$
CREATE TRIGGER `delete_cart_item_after_order` AFTER INSERT ON `tb_orders` FOR EACH ROW BEGIN
    -- Hapus item dari tb_carts yang sesuai dengan id_cart di tb_orders
    DELETE FROM tb_carts
    WHERE id = NEW.id_cart;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `reduce_stock_after_order` AFTER INSERT ON `tb_orders` FOR EACH ROW BEGIN
    DECLARE v_qty INT;

    -- Ambil kuantitas dari tb_carts berdasarkan id_cart dari tb_orders
    SELECT qty INTO v_qty
    FROM tb_carts
    WHERE id = NEW.id_cart;

    -- Kurangi stok di tb_product berdasarkan id_prod
    UPDATE tb_product
    SET stock = stock - v_qty
    WHERE id_prod = NEW.id_prod;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_prod` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `stock` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `lat` varchar(200) NOT NULL,
  `long` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_prod`, `product_name`, `image`, `price`, `slug`, `description`, `stock`, `address`, `lat`, `long`) VALUES
(1, 'Amazon - Fire TV Stick', 'http://localhost/shop/app-assets/images/pages/eCommerce/1.png', '39.99', 'Enjoy smart access to videos, games and ap', 'Enjoy smart access to videos, games and apps with this Amazon Fire TV stick. Its Alexa voice remote lets you\n                                            deliver hands-free commands when you want to watch television or engage with other applications. With a\n                                            quad-core processor, 1GB internal memory and 8GB of storage, this portable Amazon Fire TV stick works fast\n                                            for buffer-free streaming.', '93', '', '', ''),
(2, 'Google - Chromecast - Black', 'http://localhost/shop/app-assets/images/pages/eCommerce/2.png', '35.00', 'Google Chromecast: Enjoy a world of entertain', 'Google Chromecast: Enjoy a world of entertain', '83', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_carts`
--
ALTER TABLE `tb_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
