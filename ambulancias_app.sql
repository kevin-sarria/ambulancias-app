-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2022 a las 16:39:31
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
  `imgaen` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ambulancia`
--

INSERT INTO `ambulancia` (`id`, `placa`, `id_tipo_ambulancia`, `imgaen`) VALUES
(1, 'A32-03M', 1, '/ambulancias-app/img/am1.jpg'),
(3, 'B56-03F', 2, '/ambulancias-app/img/am2.jpg');

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
  `registro_invima` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id` int(3) NOT NULL,
  `id_tipo_insumo` int(3) DEFAULT NULL,
  `id_medicamento` int(3) DEFAULT NULL,
  `id_dispo_medicos` int(3) DEFAULT NULL,
  `id_herramientas` int(3) DEFAULT NULL,
  `id_ambulancia` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `lote` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `registro_invima` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre`, `tipo`, `lote`, `fecha_vencimiento`, `cantidad`, `registro_invima`) VALUES
(4, 'aceptaminofen', 'medicamento analgesico', '2020-04-01', '2022-04-01', 30, 'INVIMA 2022M-0020337'),
(5, 'paracetamol', 'medicamento analgesico', '2020-12-10', '2022-12-10', 30, 'INVIMA 2022M-0020337'),
(6, 'paracetamol2', 'medicamento analgesico', '2020-12-10', '2022-12-10', 30, 'INVIMA 2022M-0020337'),
(7, 'paracetamol3', 'medicamento analgesico', '2020-12-10', '2022-12-10', 30, 'INVIMA 2022M-0020337'),
(8, 'paracetamol4', 'medicamento analgesico', '2020-12-10', '2022-12-10', 30, 'INVIMA 2022M-0020337'),
(9, 'paracetamol5', 'medicamento analgesico', '2020-12-10', '2022-12-10', 30, 'INVIMA 2022M-0020337'),
(10, 'paracetamol6', 'medicamento analgesico', '2020-12-10', '2022-12-10', 30, 'INVIMA 2022M-0020337');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_insumo`
--

CREATE TABLE `tipos_insumo` (
  `id` int(3) NOT NULL,
  `nombre_tipo_insumo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` int(1) NOT NULL,
  `user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `correo`, `password`, `admin`, `user`) VALUES
(2, 'correo@correo.com', '$2y$10$DBYdd7Nc6imuPMUwXZ63Q.gTdABhp8dlWnbExva.PHw8SsLEv7rli', 1, 0);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_insumo`
--
ALTER TABLE `tipos_insumo`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dispositivos_medicos`
--
ALTER TABLE `dispositivos_medicos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipos_insumo`
--
ALTER TABLE `tipos_insumo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_ambulancia`
--
ALTER TABLE `tipo_ambulancia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambulancia`
--
ALTER TABLE `ambulancia`
  ADD CONSTRAINT `ambulancia_ibfk_1` FOREIGN KEY (`id_tipo_ambulancia`) REFERENCES `tipo_ambulancia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
