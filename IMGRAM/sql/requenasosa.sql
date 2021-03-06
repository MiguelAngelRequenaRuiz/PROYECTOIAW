-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2020 a las 12:19:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `requenasosa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(4) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `imagen` text NOT NULL,
  `ubicacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre_usuario`, `fecha`, `imagen`, `ubicacion`) VALUES
(42, 'miguel', '05-03-2020', 'meme1', 'imagenes/miguel/meme1_05-03-2020_11_04_02.jpg'),
(43, 'miguel', '05-03-2020', 'meme2', 'imagenes/miguel/meme2_05-03-2020_11_04_36.jpg'),
(44, 'miguel', '05-03-2020', 'meme3', 'imagenes/miguel/meme3_05-03-2020_11_05_30.jpg'),
(45, 'christian', '05-03-2020', 'meme3', 'imagenes/christian/meme3_05-03-2020_12_09_13.jpg'),
(46, 'christian', '05-03-2020', 'meme2', 'imagenes/christian/meme2_05-03-2020_12_09_16.jpg'),
(47, 'christian', '05-03-2020', 'meme1', 'imagenes/christian/meme1_05-03-2020_12_09_19.jpg'),
(48, 'pepe', '05-03-2020', 'meme2', 'imagenes/pepe/meme2_05-03-2020_12_10_38.jpg'),
(49, 'pepe', '05-03-2020', 'meme1', 'imagenes/pepe/meme1_05-03-2020_12_10_40.jpg'),
(50, 'pepe', '05-03-2020', 'meme3', 'imagenes/pepe/meme3_05-03-2020_12_10_43.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombre_completo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `nombre_completo`, `contrasena`) VALUES
(1, 'administrador', 'admin@gmail.com', 'administrador IMGRAM', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(2, 'miguel', 'miguel@gmail.com', 'Miguel Ángel', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(3, 'christian', 'christian@gmail.com', 'Christian Sosa', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(4, 'pepe', 'pepe@gmail.com', 'pepe perez', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(5, 'antonio', 'antonio@gmail.com', 'Antonio Cruz', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `nombre_usuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
