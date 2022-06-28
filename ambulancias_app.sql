-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2022 a las 16:26:22
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ambulancias_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambulancia`
--

CREATE TABLE `ambulancia` (
  `id` int(3) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `id_tipo_ambulancia` int(3) NOT NULL,
  `imagen` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ambulancia`
--

INSERT INTO `ambulancia` (`id`, `placa`, `id_tipo_ambulancia`, `imagen`) VALUES
(3, 'B45-0KS', 1, '/ambulancias-app/img/e868e7d7c91b5a1f8df48fc9b5234eb4.jpg'),
(4, 'A32-0MK', 2, '/ambulancias-app/img/19eb57b6dd2f68b9f65a67207c9f2085.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos_medicos`
--

CREATE TABLE `dispositivos_medicos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `lote` varchar(30) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `registro_invima` varchar(30) DEFAULT NULL,
  `id_ambulancia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivos_medicos`
--

INSERT INTO `dispositivos_medicos` (`id`, `nombre`, `cantidad`, `lote`, `fecha_vencimiento`, `registro_invima`, `id_ambulancia`) VALUES
(2, 'Cuello Ortopedico', 2, 'CM91384811Z4', '2022-06-23', 'INVIMA 2022M-0020337', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos_medicos_default`
--

CREATE TABLE `dispositivos_medicos_default` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivos_medicos_default`
--

INSERT INTO `dispositivos_medicos_default` (`id`, `nombre`) VALUES
(1, 'Cuello Ortopedico'),
(2, 'Bomba de Aire'),
(3, 'Jeringa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `id_ambulancia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id`, `nombre`, `cantidad`, `color`, `id_ambulancia`) VALUES
(1, 'Destornillador de Estrella', 1, 'rojo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas_default`
--

CREATE TABLE `herramientas_default` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramientas_default`
--

INSERT INTO `herramientas_default` (`id`, `nombre`) VALUES
(1, 'Destornillador de Estrella'),
(2, 'Gato Hidraulico'),
(3, 'Alicate de Punta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `lote` varchar(30) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `registro_invima` varchar(30) DEFAULT NULL,
  `id_ambulancia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre`, `lote`, `fecha_vencimiento`, `cantidad`, `registro_invima`, `id_ambulancia`) VALUES
(3, 'Paracetamol', 'CM91384811Z4', '2022-06-02', 12, 'INVIMA 2022M-0020337', 3),
(4, 'Paracetamol', 'CM91384811Z4', '2022-06-03', 12, 'INVIMA 2022M-0020337', 3),
(13, 'Aceptaminofen', 'CM91384811Z4', '2022-06-02', 12, 'INVIMA 2022M-0020337', 3),
(14, 'Paracetamol', 'CM91384811Z4', '2022-06-04', 12, 'INVIMA 2022M-0020337', 3),
(15, 'Aceptaminofen', 'CM91384811Z4', '2022-06-02', 12, 'INVIMA 2022M-0020337', 3),
(16, 'Aceptaminofen', 'CM91384811Z4', '2022-06-16', 15, 'INVIMA 2022M-0020337', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos_default`
--

CREATE TABLE `medicamentos_default` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos_default`
--

INSERT INTO `medicamentos_default` (`id`, `nombre`) VALUES
(1, 'Paracetamol'),
(2, 'Aceptaminofen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ambulancia`
--

CREATE TABLE `tipo_ambulancia` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_ambulancia`
--

INSERT INTO `tipo_ambulancia` (`id`, `nombre`) VALUES
(1, 'Medicalizada'),
(2, 'Basica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `correo`, `password`, `user`) VALUES
(2, 'correo@correo.com', '$2y$10$bvO.YFvPy1yyARtw2Omn.e.mxHXF6eMMI2tul6CfijqbmbRtHidAu', 1),
(3, 'correo2@correo.com', '$2y$10$l12qt.pddPpnQeZ1rlKGSOkhHnL4kQKWirPtFt7OK6ErLrZ0DnWj2', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambulancia`
--
ALTER TABLE `ambulancia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_ambulancia` (`id_tipo_ambulancia`);

--
-- Indices de la tabla `dispositivos_medicos`
--
ALTER TABLE `dispositivos_medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dispo_medico` (`id_ambulancia`);

--
-- Indices de la tabla `dispositivos_medicos_default`
--
ALTER TABLE `dispositivos_medicos_default`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_herramienta` (`id_ambulancia`);

--
-- Indices de la tabla `herramientas_default`
--
ALTER TABLE `herramientas_default`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medicamento` (`id_ambulancia`);

--
-- Indices de la tabla `medicamentos_default`
--
ALTER TABLE `medicamentos_default`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_ambulancia`
--
ALTER TABLE `tipo_ambulancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambulancia`
--
ALTER TABLE `ambulancia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dispositivos_medicos`
--
ALTER TABLE `dispositivos_medicos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dispositivos_medicos_default`
--
ALTER TABLE `dispositivos_medicos_default`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `herramientas_default`
--
ALTER TABLE `herramientas_default`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `medicamentos_default`
--
ALTER TABLE `medicamentos_default`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_ambulancia`
--
ALTER TABLE `tipo_ambulancia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambulancia`
--
ALTER TABLE `ambulancia`
  ADD CONSTRAINT `ambulancia_ibfk_1` FOREIGN KEY (`id_tipo_ambulancia`) REFERENCES `tipo_ambulancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dispositivos_medicos`
--
ALTER TABLE `dispositivos_medicos`
  ADD CONSTRAINT `fk_dispo_medico` FOREIGN KEY (`id_ambulancia`) REFERENCES `ambulancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD CONSTRAINT `fk_herramienta` FOREIGN KEY (`id_ambulancia`) REFERENCES `ambulancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `fk_medicamento` FOREIGN KEY (`id_ambulancia`) REFERENCES `ambulancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
