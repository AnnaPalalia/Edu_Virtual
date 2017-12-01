-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 05:56:50
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvcam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alm` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alm`, `nombre`, `correo`, `username`, `pass`) VALUES
(1, 'm', 'm', 'm', 'm'),
(2, 'm', '', '', ''),
(3, 'm', '', '', ''),
(4, '78798', '987987', '788787', '787'),
(5, '23321', '321313', '321313', '21131'),
(6, 'm', 'mijaeloso@gmail.com', 'm', 'm'),
(7, 'h', 'h', 'yyy', 'hhh'),
(8, '1', '5', '2', '2'),
(9, '6556', '6565', '6556', '1212212'),
(10, 'mijael', 'mijael@gmail.com', 'mijael', '123'),
(11, 'uriel', 'uriel@gmail.com', 'uri', '456'),
(12, 'yomero', 'yomerp@hotmail.com', 'yomero', 'lamia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_prof` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_trabajador` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_prof`, `nombre`, `id_trabajador`, `correo`, `username`, `pass`) VALUES
(1, '23213', '', '', '', ''),
(2, '465465465', '', '65465465', '6546545', '6546546'),
(3, '12131', '', '3213213', '321321', '231321'),
(4, 'm', 'k', 'k', 'k', 'k'),
(5, '', 'm', '', '', ''),
(6, 'm', '456', '4', '44', '456'),
(7, '4', '6454', 'm@gmail.com', 'miii', '789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alm`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_prof`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
