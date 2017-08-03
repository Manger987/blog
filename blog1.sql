-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2017 a las 06:48:39
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `perfil` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `perfil`, `created`, `modified`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Lector', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `resumen` text,
  `texto_completo` text,
  `autor` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `user_id`, `titulo`, `resumen`, `texto_completo`, `autor`, `created`, `modified`) VALUES
(1, 1, 'Autos en santiago', 'Los autos en santiago y su Conglomeración\r\n.', 'Los autos en santiago cada vez son mas. esto se viene en alza desde la inmensa migración de personas a esta ciudad.', 'Germán Poblete', '2017-08-01 01:24:39', '2017-08-01 02:20:55'),
(3, 1, 'El mercado central', 'Mercado central principal recepcion de alimentos de santiago', 'El mercado central presenta uno de los principales fuentes de ingreso de frutas y verduras de la ciudad de santiago. ', 'Germán Poblete', '2017-08-01 05:27:05', '2017-08-01 05:27:05'),
(4, 1, 'Migracion', 'Migración sudamericana ha crecido', 'La migración desde otros países hacia el territorio chileno ha crecido considerablemente.', 'Germán Poblete', '2017-08-01 05:47:19', '2017-08-01 05:47:19'),
(5, 1, 'Nirvana', 'Nirvana grupo Grunge', 'Nirvana creador de grandes canciones como \"Smell like teen spirit\" y una de las bandas fundadoras del genero Grunge tuvo su mayor apogeo en la década de los 90', 'Germán Poblete', '2017-08-03 01:03:28', '2017-08-03 01:04:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(1, 'admin@admin.cl', '$2y$10$I2KHDfVjMz5ovh2qAfo7.uOggDpqoWFSgNK68OX18luHEHeQ9iUJK', '2017-07-31 16:23:00', '2017-07-31 22:56:34'),
(2, 'lector@lector.cl', '$2y$10$xByhc7K6bOWmrLBVJqpDMuyVkOME98pOhlmxZloKfksl5uEBhteUm', '2017-07-31 22:55:52', '2017-08-01 14:25:55'),
(3, 'lector2@segundo.cl', '$2y$10$xnF7Km.k6vqVYWKzoC3c1.Dkg5ZTvgG1MfjJmF6PiF8ls6wCyJOoW', '2017-08-03 02:12:12', '2017-08-03 02:12:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_perfiles`
--

CREATE TABLE `users_perfiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_perfiles`
--

INSERT INTO `users_perfiles` (`id`, `user_id`, `perfil_id`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_key` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_perfiles`
--
ALTER TABLE `users_perfiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users_perfiles`
--
ALTER TABLE `users_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
