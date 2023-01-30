-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2023 a las 07:24:46
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mejoras_cata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_a`
--

CREATE TABLE `categorias_a` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias_a`
--

INSERT INTO `categorias_a` (`id`, `categoria`) VALUES
(1, 'Hoteles'),
(2, 'Restaurantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_proyectos`
--

CREATE TABLE `categorias_proyectos` (
  `id` int(11) NOT NULL,
  `categoria_n` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `logo` text NOT NULL,
  `categoria_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_a`
--
ALTER TABLE `categorias_a`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_proyectos`
--
ALTER TABLE `categorias_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_a`
--
ALTER TABLE `categorias_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias_proyectos`
--
ALTER TABLE `categorias_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
