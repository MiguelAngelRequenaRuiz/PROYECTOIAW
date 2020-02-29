-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2020 a las 04:22:08
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
  `ubicacion` text NOT NULL,
  `ancho` text NOT NULL,
  `alto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre_usuario`, `fecha`, `imagen`, `ubicacion`, `ancho`, `alto`) VALUES
(5, 'administrador', '2020-02-27', 'dadsasdads', '', '0', '0'),
(6, 'administrador', '2020-02-27', 'adasadasdasd', '', '0', '0'),
(8, 'pepe', '2020-02-27', 'sdadasdsadasdadssad', '', '0', '0'),
(14, '1234', '29-02-2020', 'imagen', 'imagenes/1234/imagen_29-02-2020_04_08_37.jpg', '0', '0'),
(15, '1234', '29-02-2020', 'imagen', 'imagenes/1234/imagen_29-02-2020_04_09_38.jpg', '', ''),
(16, '1234', '29-02-2020', 'imagen', 'imagenes/1234/imagen_29-02-2020_04_20_18.jpg', '', '');

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
(39, 'prueba', 'admin@gmail.com', 'prueba prueba', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(40, 'pepe', 'prueba@gmail.com', 'prueba prueba', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(41, 'pepepep', 'prueba@gmail.com', 'prueba prueba', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(42, 'administrador', 'admin@gmail.com', 'administrador', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(43, 'ANTONIO', 'prueba@gmail.com', 'prueba prueba', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(45, 'laura', 'uncorreobasura777@gmail.com', 'sagyasd', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(47, 'carpetaprueba', 'prueba@gmail.com', 'ddsddaad', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(48, 'a', 'prueba@gmail.com', 'prueba prueba', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(49, '1234', 'prueba@gmail.com', 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
