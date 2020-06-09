-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2020 a las 11:47:14
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario`, `foto`, `comentario`) VALUES
(34, 'miguel', 'comunion2', 'Que foto mas guapa'),
(35, 'valentin', 'comunion6', 'Que foto mas chula'),
(36, 'juan', 'premama2', 'Nice foto'),
(38, 'luis', 'infantil', 'Que ni&ntilde;a mas guapa'),
(39, 'javier', 'premama5', 'Foto muy bonita, dejo mi like'),
(40, 'Admin', 'moda1', 'Esta foto es muy chula'),
(41, 'miguel', 'infantil2', 'Que ni&ntilde;a mas guapaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `numero` int(255) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`numero`, `nombre`, `imagen`, `tipo`) VALUES
(40, 'premama1', '../imagenes/premama/marina-4.jpg', 'premama'),
(41, 'premama2', '../imagenes/premama/marina-7.jpg', 'premama'),
(42, 'premama3', '../imagenes/premama/marina.jpg', 'premama'),
(43, 'premama4', '../imagenes/premama/marina-8.jpg', 'premama'),
(44, 'premama5', '../imagenes/premama/marina-79.jpg', 'premama'),
(45, 'moda1', '../imagenes/moda/13112017-_MG_3946.jpg', 'moda'),
(46, 'moda2', '../imagenes/moda/miguel2.JPG', 'moda'),
(48, 'moda3', '../imagenes/moda/13112017-_MG_3935-Editar.jpg', 'moda'),
(49, 'moda4', '../imagenes/moda/cristina.JPG', 'moda'),
(50, 'moda5', '../imagenes/moda/ee.JPG', 'moda'),
(51, 'moda6', '../imagenes/moda/miguel1.JPG', 'moda'),
(52, 'moda7', '../imagenes/moda/sss.JPG', 'moda'),
(53, 'moda8', '../imagenes/moda/miguel3.JPG', 'moda'),
(54, 'infantil', '../imagenes/infantil/cris6.jpg', 'infantil'),
(55, 'infantil2', '../imagenes/infantil/cris1.JPG', 'infantil'),
(56, 'infantil1', '../imagenes/infantil/cris2.JPG', 'infantil'),
(57, 'infantil3', '../imagenes/infantil/cris3.JPG', 'infantil'),
(58, 'infantil4', '../imagenes/infantil/cris4.JPG', 'infantil'),
(59, 'infantil5', '../imagenes/infantil/cris5.JPG', 'infantil'),
(61, 'comunion2', '../imagenes/comunion/horizontal2.jpg', 'comunion'),
(63, 'comunion4', '../imagenes/comunion/vertical1.jpg', 'comunion'),
(64, 'comunion5', '../imagenes/comunion/vertical2.jpg', 'comunion'),
(65, 'comunion6', '../imagenes/comunion/horizontal4.jpg', 'comunion'),
(66, 'comunion7', '../imagenes/comunion/vertical3.jpg', 'comunion'),
(67, 'comunion8', '../imagenes/comunion/vertical4.jpg', 'comunion'),
(79, 'comunion1', '../imagenes/comunion/horizontal1.jpg', 'comunion'),
(81, 'comunion3', '../imagenes/comunion/horizontal3.jpg', 'comunion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megusta`
--

CREATE TABLE `megusta` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `megusta`
--

INSERT INTO `megusta` (`id`, `foto`, `usuario`) VALUES
(49, 'premama2', 'Admin'),
(50, 'infantil2', 'Admin'),
(51, 'infantil4', 'Admin'),
(52, 'moda3', 'Admin'),
(53, 'infantil1', 'Admin'),
(54, 'infantil3', 'Admin'),
(58, 'comunion2', 'Admin'),
(59, 'comunion4', 'miguel'),
(60, 'comunion6', 'miguel'),
(61, 'premama2', 'miguel'),
(62, 'premama5', 'javier'),
(63, 'infantil5', 'Admin'),
(64, 'moda1', 'Admin'),
(65, 'comunion4', 'Admin'),
(66, 'infantil2', 'miguel'),
(67, 'comunion8', 'Admin'),
(69, 'comunion2', 'silvia'),
(70, 'comunion7', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `password`, `tipo`) VALUES
(1, 'Admin', 'Admin@admin.com', '1234', 'Admin'),
(35, 'miguel', 'miguel@miguel.com', '1234', 'Usuario'),
(36, 'juan', 'juan@juan.com', '1234', 'Usuario'),
(38, 'luis', 'luis@luis.com', '1234', 'Usuario'),
(39, 'valentin', 'valentin@valentin.com', '1234', 'Usuario'),
(40, 'javier', 'javier@javier.com', '1234', 'Usuario'),
(41, 'prueba', 'prueba@prueba.com', '1234', 'Usuario'),
(42, 'pruebaa', 'pruebaa@prueba.com', '1234', 'Usuario'),
(43, 'silvia', 'silvia@silvia.com', '1234', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `numero` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `megusta`
--
ALTER TABLE `megusta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
