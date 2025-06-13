-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2025 a las 10:24:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_lab4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id` int(11) NOT NULL,
  `remitente` varchar(100) NOT NULL,
  `destinatario` varchar(100) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `cuerpo` text DEFAULT NULL,
  `estado` enum('borrador','enviado') DEFAULT 'borrador',
  `leido` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id`, `remitente`, `destinatario`, `asunto`, `cuerpo`, `estado`, `leido`, `fecha`) VALUES
(1, 'user@gmail.com', 'admin@gmail.com', 'AEA', 'AEAAAAAA', 'enviado', 1, '2025-05-23 13:15:56'),
(2, 'user@gmail.com', 'admin@gmail.com', 'Prueba 1', 'QUe tal papu estamos haciendp la prueba', 'enviado', 1, '2025-05-23 19:00:16'),
(4, 'user@gmail.com', 'eqwe', 'wqeqw', 'wqeqwe', 'enviado', 0, '2025-05-23 19:38:09'),
(5, 'user@gmail.com', 'admin@gmail.com', 'AEA', 'wqeqweqweqw', 'borrador', 0, '2025-05-23 20:05:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` enum('admin','usuario') NOT NULL,
  `estado` enum('activo','suspendido') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `rol`, `estado`) VALUES
(1, 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'admin', 'activo'),
(2, 'user@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'usuario', 'activo'),
(3, 'user2@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'admin', 'suspendido');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
