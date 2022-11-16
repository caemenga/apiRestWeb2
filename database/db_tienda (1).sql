-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 04:20:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_user` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_user`, `email`, `password`) VALUES
(1, 'cayetano@hotmail.com', '$2a$10$OCEqSmy3stJs.RSPi5J4zuQhDw2u1zcvVSWyozpg5Sz6Wh8SLQru.'),
(3, 'caetano@hotmail.com', '$2a$12$cp5H5qsIOl670vzy6z9sFu0ypcHZmFyAHtwddDXfOby8S/rJJKdSe\r\n'),
(4, 'caetano@gmail.com', '$2a$12$2OaP/p9SAzC56Na5FGhlJuytLKzjuVQ2XF9gzvkNoFjc6IqjzzfAO\r\n'),
(5, 'caetano@hotmail.com', '$2a$12$cp5H5qsIOl670vzy6z9sFu0ypcHZmFyAHtwddDXfOby8S/rJJKdSe\r\n'),
(6, 'caetano@gmail.com', '$2a$12$2OaP/p9SAzC56Na5FGhlJuytLKzjuVQ2XF9gzvkNoFjc6IqjzzfAO\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `id_especificacion` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`id_especificacion`, `tipo`, `descripcion`, `precio`) VALUES
(1, 'blanco', 'vino tinto', 400),
(3, 'malbec', 'vino tinto', 200),
(4, 'espumante', 'rica cerveza roja', 400),
(5, 'rubia', 'cerveza bien fria', 400),
(6, 'roja', 'rica cerveza del sur', 678),
(8, 'negra', 'cerveza negra', 250),
(9, 'artesanal', 'tequila artesanal', 1600),
(12, 'ipa', 'cerveza lupulada', 600),
(14, 'apa', 'cerveza lupulada', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto` varchar(55) NOT NULL,
  `marca` varchar(55) NOT NULL,
  `id_especificacion_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`, `marca`, `id_especificacion_fk`) VALUES
(19, 'cerveza', 'patagonia', 6),
(21, 'cerveza', 'patagonia', 6),
(23, 'vino', 'septima', 3),
(24, 'cerveza', 'patagonia', 6),
(25, 'vino', 'septima', 3),
(26, 'vino', 'chacabuco', 1),
(27, 'tequila', 'herrero', 9),
(28, 'vino', 'septima', 1),
(29, 'vino', 'bianchi', 4),
(30, 'vino', 'futer', 3),
(31, 'cerveza', 'patagonia', 6),
(32, 'cerveza', 'pampa', 8),
(33, 'cerveza', 'quilmes', 5),
(36, 'cerveza', 'patagonia', 12),
(37, 'cerveza', 'quilmes', 8),
(39, 'cerveza', 'pampa', 12),
(41, 'cerveza', 'pampa', 12),
(43, 'vino', 'bianchi', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`id_especificacion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_especificacion` (`id_especificacion_fk`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_especificacion_fk`) REFERENCES `especificaciones` (`id_especificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
