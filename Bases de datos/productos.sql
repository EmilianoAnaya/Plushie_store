-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 07:34:35
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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `costo`, `stock`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Pikachu', '21335438', 'Pikachu es una especie de Pokemon, criaturas ficcionadas que aparecen en una variedad de videojuegos, programas de televisión y películas animadas, juegos de cartas intercambiables y cómics con licencia de The Pokemon Company, una empresa japonesa.', 499, 50, 'peluche12.jpg', '3c978b4c9164edc53675b04f413e8f93.jpg', 1, 0),
(2, 'Cinnamoroll', '564671', 'Material: Felpa corta. Relleno: Algodón PP. Dimensiones: 25 cm. Características: Relleno y felpa. Tipo: Muñeca de peluche. Tipo de artículo: Animales. Género: Unisex. Características: Películas y TV.', 199, 25, 'peluche5.jpg', '207bfb6f15b33e8ac6e2408a75839883.jpg', 1, 0),
(3, 'Meta Knight', '12345374', 'Meta Knight es un personaje importante de la serie Kirby que aparece en la mayoría de los juegos, manga, así como el anime. La intriga y popularidad que rodea a Meta Knight dentro del fandom Kirby radica en gran medida en sus motivos envueltos y en su sorprendente semejanza con el propio Kirby. Meta Knight es el líder de un ejército de soldados conocido como los Meta-Knights, y capitanes de un gran dirigible llamado Acorazado Halberd que puede acompañarlo en el calor de la batalla. ', 299, 60, 'peluche11.jpg', 'dcefa9aae6520939ff4f1b39265d29c9.jpg', 1, 0),
(4, 'Kitty Shark', '79846654', 'Material: nuestros juguetes de peluche están hechos de materiales seguros para los niños, relleno de algodón PP de alta calidad, desde tela exterior hasta relleno interior, 100% hecho a mano, finamente cosido para suavidad y comodidad, con meticulosa tecnología de cableado interno, relleno uniforme, no se deforma, sin miedo a la extrusión.', 250, 10, 'peluche3.jpg', '8fb6964d43aca1e436deaa694ac1eb3f.jpg', 1, 0),
(5, 'Kirby', '132486715', '¡Lleva toda la ternura de la albóndiga rosada favorita de Nintendo para acompañarte los días en tu habitación!  Muy lindo y coleccionable  Tamaño aproximado: 5 pulgadas de largo x 3 pulgadas de ancho x 6.5 pulgadas de  Peluche oficial Kirby con corazón de amigo', 499, 60, 'peluche9.jpg', '628ebd1af2594f9246c8708e847683db.jpg', 1, 0),
(6, 'Bandana Dee', '1987456', 'Juego de vídeo de Kirby de Nintendo Super Star. Tomar una siesta con este Snuggly Plush más comunes de habitantes de Dream Land. Este Super Star Kirby waddle Dee peluche mide aproximadamente 5,0 Tall.', 399, 60, 'peluche10.jpg', '1091be077691ccb8827e5f270a650ec8.jpg', 1, 0),
(7, 'Papa Kawaii', '1254385', 'SIZE: 5.90*7.87\'/15*20cm. Please NOTE: It is manual measurement, please allow the size deviation of 1~2cm (about 0.5\'). This Kawaii Potato Plush Toy is inspired by real Potato: Has a kawaii face, very adorable and cartoonish.', 150, 65, 'peluche13.jpg', '49f16a0e8c4f0d778d51e2223449b624.jpg', 1, 0),
(8, 'Axolotl', '5467131', '¡Este adorable ajolote está aquí para traer un poco de diversión a tu colección de peluches! ¡Están listos para acompañarte a la noche de cine, las siestas de la tarde y más!', 199, 50, 'peluche6.jpg', '531d151adce8e80c5b14325ea59b4bea.jpg', 1, 0),
(9, 'Kurumi Empijamada', '41532351', 'Cute and soft plush doll with realistic expression, clear outline and lifelike.It is not just a gift or decoration. It is more like a friend or someone else can make you feel safe and comfortable while holding it,este juguete para mascotas garantiza una gran durabilidad, adecuado para abrazos.', 200, 60, 'peluche2.jpg', 'a5456839ac63d6bbbc23962428983369.jpg', 1, 0),
(10, 'My Melody', '9164245', 'Mi peluche Melody: My Melody es un dulce y honesto conejo blanco y el mejor amigo de Hello Kitty. Este peluche de 9.5 pulgadas cuenta con la clásica capucha rosa de My Melody con flor blanca y gran sonrisa bordada. Abrazos de alta calidad: este peluche suave y tierno cuenta con una construcción lavable en la superficie para una fácil limpieza. La felpa viene empaquetada dentro de una bolsa de poliéster. Adecuado para niños de 1 año en adelante.', 200, 50, 'peluche4.jpg', '82c41504ff1f2ada7298b9f54efc0ea2.jpg', 1, 0),
(11, 'Conejo Blanco', '12654478', 'Su diseño sentado combinado con una expresión de alerta y detalles precisos hacen que Miffy sea irresistiblemente atractivo y emocionalmente atractivo. El tamaño de 10 pulgadas de Miffy hace que este pequeño conejo sea ideal para divertirse cómodamente en la hora de cuentos.', 150, 30, 'peluche7.jpg', '1a8d9842f5a075442d2f6665c89faf5e.jpg', 1, 0),
(12, 'Gato Sushi', '7896465', 'Alta calidad: nuestros productos de la serie de juguetes de peluche eligen felpa corta de alta calidad, suave al tacto que pertenece al material agradable al tacto, para que puedas sostenerlo para dormir tranquilamente. Diseño único: bonito gato con un salmón de gran tamaño, diseño súper adorable y divertido, te gustará cuando lo veas por primera vez, este producto de peluche se ha convertido en la primera opción para muchos niños.', 200, 50, 'pelcuhe1.jpg', '4757a0ff02f98fef7d89ad9a1eb513fb.jpg', 1, 0),
(13, 'Pochita', '45643217', 'Compañero cómodo: presenta animales de peluche super suaves, lindos y adorables que se desarrollan en almohadas difusas para dormir. Los adolescentes, y los adultos les encanta estas criaturas cómicas clásicas y coleccionables. El mejor regalo: todos les encantará este peluche para jugar y como una gran almohada para leer, viendo la televisión, estudiando y sueño siesta.', 399, 20, 'peluche8.jpg', 'ffd8f23ed2ff000bae7f5ecb81f3c2e5.jpg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
