-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 07:34:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` double NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `costo`, `status`, `eliminado`) VALUES
(1, 1, 7, 0, 150, 0, 0),
(2, 1, 5, 0, 499, 0, 0),
(3, 1, 8, 0, 199, 0, 0),
(4, 1, 3, 0, 299, 0, 0),
(5, 1, 13, 7, 399, 0, 0),
(6, 1, 2, 0, 199, 0, 0),
(7, 1, 1, 0, 499, 0, 0),
(8, 1, 12, 0, 200, 0, 0),
(9, 1, 11, 0, 150, 0, 0),
(10, 1, 10, 0, 200, 0, 0),
(11, 1, 9, 0, 200, 0, 0),
(12, 1, 4, 0, 250, 0, 0),
(13, 1, 6, 0, 399, 0, 0),
(14, 2, 1, 0, 499, 0, 0),
(15, 3, 2, 0, 199, 0, 0),
(16, 3, 5, 0, 499, 0, 0),
(17, 3, 9, 0, 200, 0, 0),
(18, 4, 1, 0, 499, 0, 0),
(19, 4, 2, 0, 199, 0, 0),
(20, 4, 3, 0, 299, 0, 0),
(21, 4, 5, 0, 499, 0, 0),
(22, 4, 9, 0, 200, 0, 0),
(23, 4, 8, 0, 199, 0, 0),
(24, 5, 1, 0, 499, 0, 0),
(25, 5, 2, 0, 199, 0, 0),
(26, 5, 3, 0, 299, 0, 0),
(27, 6, 4, 0, 250, 0, 0),
(28, 6, 5, 0, 499, 0, 0),
(29, 6, 6, 0, 399, 0, 0),
(30, 6, 7, 0, 150, 0, 0),
(31, 7, 1, 0, 499, 0, 0),
(32, 7, 2, 0, 199, 0, 0),
(33, 7, 3, 0, 299, 0, 0),
(34, 7, 4, 0, 250, 0, 0),
(35, 7, 5, 0, 499, 0, 0),
(36, 7, 6, 0, 399, 0, 0),
(37, 8, 4, 0, 250, 0, 0),
(38, 8, 5, 0, 499, 0, 0),
(39, 8, 10, 0, 200, 0, 0),
(40, 9, 1, 1, 499, 0, 0),
(41, 9, 2, 1, 199, 0, 0),
(42, 9, 3, 1, 299, 0, 0),
(43, 9, 4, 1, 250, 0, 0),
(44, 10, 1, 1, 499, 0, 0),
(45, 10, 2, 1, 199, 0, 0),
(46, 10, 3, 1, 299, 0, 0),
(47, 11, 1, 1, 499, 0, 0),
(48, 11, 2, 1, 199, 0, 0),
(49, 11, 3, 1, 299, 0, 0),
(50, 11, 4, 1, 250, 0, 0),
(51, 11, 5, 1, 499, 0, 0),
(52, 11, 6, 1, 399, 0, 0),
(53, 11, 7, 1, 150, 0, 0),
(54, 11, 8, 1, 199, 0, 0),
(55, 11, 9, 1, 200, 0, 0),
(56, 11, 10, 1, 200, 0, 0),
(57, 11, 11, 1, 150, 0, 0),
(58, 11, 12, 1, 200, 0, 0),
(59, 11, 13, 1, 399, 0, 0),
(60, 12, 1, 1, 499, 0, 0),
(61, 12, 2, 1, 199, 0, 0),
(62, 12, 3, 1, 299, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
