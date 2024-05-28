-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 07:34:27
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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `id_cliente`, `cantidad_productos`, `status`, `costo`) VALUES
(1, '2023-05-18', 40, 8, 1, 1999),
(2, '2023-05-19', 40, 8, 1, 1999),
(3, '2023-05-19', 40, 8, 1, 1999),
(4, '2023-05-19', 40, 0, 1, 0),
(5, '2023-05-19', 40, 3, 1, 997),
(6, '2023-05-19', 40, 4, 1, 1298),
(7, '2023-05-19', 40, 6, 1, 2145),
(8, '2023-05-19', 40, 7, 1, 2945),
(9, '2023-05-19', 40, 4, 1, 1247),
(10, '2023-05-19', 40, 3, 1, 997),
(11, '2023-05-19', 40, 13, 1, 3643),
(12, '2023-05-19', 40, 3, 1, 997);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
