-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 07:34:22
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
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `rol` int(1) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Emiliano', 'Garcia', 'zgrupo115@gmail.com', '59b50c0e570cbfb82c74d305615965f8', 1, '1678719811_RDT_20230306_1148176158608533251385111.gif', '6fc8c3031ca2aa0d1d5971f4f953d801.gif', 1, 0),
(2, 'Fatima', 'Naranjo', 'fatima.naranjo@alumnos.udg.mx', '387f59384538', 1, 'yuppi.jpg', '317036375051fedbb45cd08f45d6ecd1.jpg', 1, 0),
(3, 'Oscar', 'Martinez', 'oscar.martinez@alumnos.udg.mx', '45w970fy79oqop', 0, '', '', 1, 0),
(4, 'jorge', 'anaya', 'jorge.anaya@alumnos.udg.mx', '21360281477785e8daf0647367bda95f', 1, '', '', 1, 0),
(6, 'Joseph', 'Pascal', 'awdawdawdaw@udg.mx', 'f5a497cc5f7d1e6f2acca8263cc7a8a3', 1, '', '', 1, 0),
(7, 'Maria', 'Alejandra', 'Maria.Alejandra@alumnos.mx', '6a7c802cbfd76c85fec3e180d3afefb8', 0, '', '', 1, 0),
(8, 'Jair', 'Antonio', 'jair.antonio@alumnos.udg.mx', '8c19a174bb587252ccb5fc9473b5eac4', 0, '', '', 1, 0),
(9, 'Pedro', 'Pascal', 'awdawdawd@udg.mx', '21360281477785e8daf0647367bda95f', 1, '', '', 1, 0),
(10, 'Pedro', 'Anaya', 'awdawdaw@udg.mx', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(11, 'awdawd', 'anaya', 'camello@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, '', '', 1, 0),
(12, 'awdawd', 'awdawd', 'gael.anaya@udg.mx', '21360281477785e8daf0647367bda95f', 1, '', '', 1, 0),
(13, 'Emiliano', 'adwa', 'awdawd', '189342e2ed9d23bb9a02ecbf8ed06762', 1, '', '', 1, 1),
(14, 'Pepe', 'Aguiñiga', 'PepeXX@gamil.com', '72789aff5bd5358314d83f31b4b4bfb0', 0, '', '', 1, 1),
(15, 'Pedro', 'Orozco', 'Pedro_orozco@gmail.com', '216186f98d11205778f20781430672b6', 0, '', '', 1, 1),
(16, 'Mario', 'Bros', 'mario_luigi@gmail.com', 'c47d3c53d8c8db1a845c70822ce19311', 1, '', '', 1, 0),
(17, 'luigi', 'bros', 'luigi_purple@gmail.com', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 1),
(19, 'esparza', 'garza', 'dnawidnawd@gmail.com', 'f5a497cc5f7d1e6f2acca8263cc7a8a3', 0, '', '', 1, 1),
(20, 'jorge', 'gonzalez', '9834whfusnfwq@gmail.com', 'f5a497cc5f7d1e6f2acca8263cc7a8a3', 0, '', '', 1, 1),
(21, 'Pedro', 'awdawd', 'awdawdawa@udg.mx', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 1),
(22, 'awdawd', 'Pascal', 'awdawdawdq@udg.mx', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(23, 'awdawdaw', 'anaya', 'awdawdadw', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 1),
(24, 'awdawd', 'Pascal', 'gael.anayaa@udg.mx', 'f5a497cc5f7d1e6f2acca8263cc7a8a3', 0, '', '', 1, 1),
(25, 'awdawdawd', 'anaya', 'awdawd12', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 1),
(26, 'awdawd', 'Pascal', 'awdawdawdaw@udg.mxx', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(27, 'awdawdawd', 'anaya', 'awdawdawdaw@udg.mxq', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 1),
(28, 'awdawd', 'Pascal', 'awdawdawdaw@udg.mxwr', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(29, 'Veronica', 'Salas', 'Veronica.Salas@gmail.com', '28a1ff2f685c01ffc6374e65cee7bb20', 1, '', '', 1, 0),
(30, 'Joaquin', '', 'joaquin.aguilar@alumnos.udg.mx', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(31, 'Luis', '', 'Luis.Sandoval@alumnos.udg.mx', '923420e182a23b20b994626cfeff7cc9', 1, '', '', 1, 0),
(33, 'Pedro', '', 'Pedro.Aguilar@gmail.com', '21360281477785e8daf0647367bda95f', 1, '', '', 1, 1),
(34, 'Pedro', '', 'jorge.anaya@alumnos.udg.mxAWD', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(35, 'Emiliano', '', 'awdawdawdaw@udg.mxAWD', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 0),
(36, 'Pedro', 'Sandoval', 'gael.anaya@udg.mxawd', '21360281477785e8daf0647367bda95f', 0, '', '', 1, 1),
(37, 'Homero', 'Simpson', 'Homero.Simpson@gmail.com', '541840e0be0522fa65bd00980d00e6a2', 0, '5a0c40a65a997e1c2cea116c.png', '78e8dbc94ea76494aad693369c6a5711.png', 1, 1),
(38, 'Gustavo', 'Spaghetti', 'Gustavo.Spaghetti@gmail.com', 'ab6e07c7169f73ffd02aa48c88687f92', 0, 'Spr_lonegustavo_idle_0.webp', '78d6fb429a8230bd9535c162cd2a3d0e.webp', 1, 0),
(39, 'Lisa', 'Simpson', 'Bart.Simpson@alumnos.udg.mx', '377bcaf2d303429ca55f16d96a02dacc', 0, 'Lisa.png', '8f6421fdd747035439a6844ecc9f3777.png', 1, 0),
(40, 'Francisco Alberto', 'Ochoa Mendoza', 'Francisco.Ochoa@alumnos.udg.mx', '38e21eb7f05bb87b35c34f0a417b3b3a', 0, 'peppino_spaghetti_by_artsmen_dflmdmr-pre.png', 'c47a5929f75aee99fccc21171d40e529.png', 1, 0),
(41, 'puto', 'sad', 'kk.com', '20d59b95948b67ce4cadaac4f7934b1a', 1, 'peppino_spaghetti_by_artsmen_dflmdmr-pre.png', 'c47a5929f75aee99fccc21171d40e529.png', 1, 1),
(42, 'Mariano', 'Alvarez', 'Mariano.Alvarez@alumnos.udg.mx', '0a02d95a559d317da7bd115ff403be8a', 0, 'Imagen de WhatsApp 2023-04-22 a las 23.52.02.jpg', 'a9a3ec2552f039df9a83039f31bfc5b7.jpg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
