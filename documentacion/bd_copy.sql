-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-09-2020 a las 21:32:59
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contactos`
--
CREATE DATABASE IF NOT EXISTS `contactos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `contactos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Contacto`
--

CREATE TABLE `Contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `anno_nacimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Contacto`
--

INSERT INTO `Contacto` (`id`, `nombre`, `apellidos`, `anno_nacimiento`) VALUES
(1, 'Alfredo', 'Faura Molina', '1994-06-04 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Telefonos`
--

CREATE TABLE `Telefonos` (
  `id` int(11) NOT NULL,
  `prefijo` int(5) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `contacto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Telefonos`
--

INSERT INTO `Telefonos` (`id`, `prefijo`, `numero`, `contacto_id`) VALUES
(1, 34, '652013323', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `token` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nombre`, `token`) VALUES
(1, 'alfredo@pruebas.com', '$2y$13$ieD5M42O8rBmGZ32JOGYxu27sdLrMbIttCiWd2MCrJ6Jf.ez4HE86', 'Alfredo', '589592as5dasd2'),
(2, 'asd@asd.com', '$2y$13$6QcBI6zEBCI1t9YqTwirheHefnpF2gq47HZz6Pb/Gg5TMyJY62WO2', 'asd', 'rl6avf-LvT5LAEUDBSAXRbI1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Contacto`
--
ALTER TABLE `Contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Telefonos`
--
ALTER TABLE `Telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Telefonos_Contacto_idx` (`contacto_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Contacto`
--
ALTER TABLE `Contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Telefonos`
--
ALTER TABLE `Telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Telefonos`
--
ALTER TABLE `Telefonos`
  ADD CONSTRAINT `fk_Telefonos_Contacto` FOREIGN KEY (`contacto_id`) REFERENCES `Contacto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;