-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2025 a las 15:34:05
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
-- Base de datos: `don_camaron`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `Usuarioid_usuario` int(5) NOT NULL,
  `Menuid_menu` int(5) NOT NULL,
  `cantidad` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` int(20) DEFAULT NULL,
  `Tipo_Menuid_tipo_menu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre`, `descripcion`, `imagen`, `precio`, `Tipo_Menuid_tipo_menu`) VALUES
(5, 'Ceviche mixto', 'Camarones y pescado en salsa de la casa y leche de tigre con cebolla, camote, maíz y aguacate.', '1761910766_ceviche_mixto.avif', 24900, 1),
(6, 'Ceviche de la casa', 'Plato de pescado o marisco crudo marinado en jugo de limón o lima, y acompañado de otros ingredientes. Su sabor picante lo hace irresistible.', '1761910789_Ceviche.jpg', 25900, 1),
(7, 'Ceviche de camarón', 'Nuestro ceviche de siempre. Camarones en salsa de la casa, con cebolla y encurtidos.', '1761910831_ceviche_camarones.jpg', 24900, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(5) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `Usuarioid_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(5) NOT NULL,
  `codigo_reserva` varchar(10) DEFAULT NULL,
  `mesas` int(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Hora` time NOT NULL,
  `Usuarioid_usuario` int(5) NOT NULL,
  `Sucursalid_sucursal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(5) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `total_mesas` int(5) DEFAULT NULL,
  `mesas_disponibles` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`, `imagen`, `total_mesas`, `mesas_disponibles`) VALUES
(6, 'Bogota', 'calle 3', '1761921150_bogota.jpg', 20, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_menu`
--

CREATE TABLE `tipo_menu` (
  `id_tipo_menu` int(5) NOT NULL,
  `tipo_menu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_menu`
--

INSERT INTO `tipo_menu` (`id_tipo_menu`, `tipo_menu`) VALUES
(1, 'Entradas'),
(2, 'Platos Fuertes'),
(3, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(5) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `documento` int(10) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `Correo` varchar(40) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rol`, `nombres`, `documento`, `telefono`, `Correo`, `contrasena`) VALUES
(3, 'Administrador', 'Administrador', 1234554343, 100000000, 'admin@admin.com', '1234'),
(13, 'Cliente', 'Camilo Vargas', 23435643, 2147483647, 'camilo@gmail.com', '1234'),
(14, 'Cliente', 'Barry Allen', 232, 3244354, 'allen@gmail.com', '1234'),
(16, 'Cliente', 'Sofia Martinez', 2343534, 24343434, 'sofia@example.com', '1234'),
(24, 'Cliente', 'Carlitos', 32324, 243435, 'carlitos@gmail.com', '1234'),
(28, 'Cliente', 'cosito uwu', 666, 2147483647, 'coso@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`Usuarioid_usuario`,`Menuid_menu`),
  ADD KEY `FKCarrito798292` (`Menuid_menu`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `FKMenu842525` (`Tipo_Menuid_tipo_menu`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `FKPedido329779` (`Usuarioid_usuario`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FKReserva291145` (`Usuarioid_usuario`),
  ADD KEY `FKReserva622087` (`Sucursalid_sucursal`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `tipo_menu`
--
ALTER TABLE `tipo_menu`
  ADD PRIMARY KEY (`id_tipo_menu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_menu`
--
ALTER TABLE `tipo_menu`
  MODIFY `id_tipo_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `FKCarrito6554` FOREIGN KEY (`Usuarioid_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKCarrito798292` FOREIGN KEY (`Menuid_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FKMenu842525` FOREIGN KEY (`Tipo_Menuid_tipo_menu`) REFERENCES `tipo_menu` (`id_tipo_menu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FKPedido329779` FOREIGN KEY (`Usuarioid_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FKReserva291145` FOREIGN KEY (`Usuarioid_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKReserva622087` FOREIGN KEY (`Sucursalid_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
