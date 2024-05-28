-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 07:31:40
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
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0,
  `archivo_n` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `archivo`, `status`, `eliminado`, `archivo_n`) VALUES
(1, 'Anuncio #1', '', 1, 1, ''),
(2, 'Anuncio #2', '', 1, 1, ''),
(3, 'Anuncio #3', '5a9a5a39dd8e112fec7ee0887965e2cc.webp', 1, 1, 'ribbon-banner-png.webp'),
(4, 'Gato', 'a9a3ec2552f039df9a83039f31bfc5b7.jpg', 1, 1, 'Imagen de WhatsApp 2023-04-22 a las 23.52.02.jpg'),
(5, 'Bodega Aurrera', '7449a06ac8fabbb6b806d8148d39c3af.png', 1, 1, 'descargar.png'),
(6, 'Walmart', '73821ef072d46f0855b42083803217af.jpg', 1, 1, 'Walmart-banner_#2.jpg'),
(7, 'Banner_Ofertas', '44d1adb61c010cfda2e329e6cddcf4af.png', 1, 0, 'Banner_1.png'),
(8, 'Banner_Bienvenido', 'fda06447b7ed064742dd164223f02b89.png', 1, 0, 'bienvenidos.png'),
(9, 'Banner_Envios', '340d0e9de573e0621fe28788bfc46f22.png', 1, 0, 'envios_nacionales.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
