-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2017 a las 20:26:12
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.34

DROP DATABASE IF EXISTS tfc_javi;

CREATE DATABASE tfc_javi;

USE tfc_javi;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfc_javi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
  `idcita` int(8) NOT NULL,
  `horacita` time DEFAULT NULL,
  `diacita` date DEFAULT NULL,
  `asuntocita` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idcita`, `horacita`, `diacita`, `asuntocita`) VALUES
(1, '08:00:00', '2017-10-02', 'csff'),
(2, '12:00:00', '2017-10-02', 'aaa'),
(5, '07:00:00', '2017-10-06', 'gg'),
(6, '08:00:00', '2017-10-22', 'fdsgb'),
(8, '04:00:00', '2017-10-28', 'sad'),
(9, '00:40:00', '2017-10-28', 'asdfb'),
(10, '00:00:00', '2017-11-13', 'vfcd'),
(14, '00:30:00', '2017-11-13', '423ss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mw_subject`
--

CREATE TABLE IF NOT EXISTS `mw_subject` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mw_subject`
--

INSERT INTO `mw_subject` (`id`, `id_user`, `sname`, `mark`) VALUES
(1, 1, 'Matematicas', 7),
(2, 1, 'Gallego', 4),
(3, 1, 'Lengua', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mw_user`
--

CREATE TABLE IF NOT EXISTS `mw_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mw_user`
--

INSERT INTO `mw_user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Chicote', 'a@a.es', '123'),
(2, 'Alfredo', 'b@b.es', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idcita`) USING BTREE;

--
-- Indices de la tabla `mw_subject`
--
ALTER TABLE `mw_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `mw_user`
--
ALTER TABLE `mw_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idcita` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `mw_subject`
--
ALTER TABLE `mw_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `mw_user`
--
ALTER TABLE `mw_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mw_subject`
--
ALTER TABLE `mw_subject`
  ADD CONSTRAINT `mw_subject_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `mw_user` (`id`);

-- !40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT 
-- !40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS 
-- !40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION 
