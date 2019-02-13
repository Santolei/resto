-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2019 a las 00:51:44
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `resto_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dia` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `anio` year(4) NOT NULL,
  `monto` float NOT NULL,
  `metodo_pago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `fecha`, `dia`, `mes`, `anio`, `monto`, `metodo_pago`) VALUES
(1, '2018-01-12 12:28:19', '0000-00-00', 'Enero', 2018, 50, 'Tarj Débito'),
(2, '2019-01-12 12:29:20', '0000-00-00', 'Enero', 2019, 134.1, 'Efectivo'),
(3, '2019-01-11 12:30:13', '0000-00-00', 'Enero', 2019, 340, 'Tarj Crédito'),
(4, '2019-01-10 12:33:29', '0000-00-00', 'Enero', 2019, 95, 'Efectivo'),
(5, '2018-06-09 12:42:01', '0000-00-00', 'Septiembre', 2019, 616.55, 'Efectivo'),
(6, '2019-02-12 18:23:25', '0000-00-00', 'Febrero', 2019, 153, 'Efectivo'),
(7, '2019-02-12 18:44:36', '0000-00-00', 'Febrero', 2019, 50, 'Efectivo'),
(8, '2019-02-12 18:46:36', '0000-00-00', 'Febrero', 2019, 195, 'Tarj Crédito'),
(9, '2019-02-12 19:25:27', '0000-00-00', 'Febrero', 2019, 500, 'Efectivo'),
(10, '2019-02-12 19:41:30', '2019-02-12', 'Febrero', 2019, 1195, 'Efectivo'),
(11, '2019-02-12 20:44:12', '2019-02-13', 'Febrero', 2019, 630, 'Tarj Débito'),
(12, '2019-02-13 16:55:44', '2019-02-13', 'Febrero', 2019, 150, 'Tarj Débito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Comidas'),
(3, 'Bebidas'),
(4, 'Postres'),
(5, 'Entradas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `cantidad_mesas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`cantidad_mesas`) VALUES
(12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesas` int(10) NOT NULL,
  `nro_mesa` int(10) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesas`, `nro_mesa`, `estado`) VALUES
(1, 1, 'Disponible'),
(2, 2, 'Disponible'),
(3, 3, 'Disponible'),
(4, 4, 'Disponible'),
(5, 5, 'Disponible'),
(6, 6, 'Disponible'),
(7, 7, 'Disponible'),
(8, 8, 'Disponible'),
(9, 9, 'Disponible'),
(10, 10, 'Disponible'),
(11, 11, 'Disponible'),
(12, 12, 'Disponible'),
(13, 13, 'Disponible'),
(14, 14, 'Disponible'),
(15, 15, 'Disponible'),
(16, 16, 'Disponible'),
(17, 17, 'Disponible'),
(18, 18, 'Disponible'),
(19, 19, 'Disponible'),
(20, 20, 'Disponible'),
(21, 21, 'Disponible'),
(22, 22, 'Disponible'),
(23, 23, 'Disponible'),
(24, 24, 'Disponible'),
(25, 25, 'Disponible'),
(26, 26, 'Disponible'),
(27, 27, 'Disponible'),
(28, 28, 'Disponible'),
(29, 29, 'Disponible'),
(30, 30, 'Disponible'),
(31, 31, 'Disponible'),
(32, 32, 'Disponible'),
(33, 33, 'Disponible'),
(34, 34, 'Disponible'),
(35, 35, 'Disponible'),
(36, 36, 'Disponible'),
(37, 37, 'Disponible'),
(38, 38, 'Disponible'),
(39, 39, 'Disponible'),
(40, 40, 'Disponible'),
(41, 41, 'Disponible'),
(42, 42, 'Disponible'),
(43, 43, 'Disponible'),
(44, 44, 'Disponible'),
(45, 45, 'Disponible'),
(46, 46, 'Disponible'),
(47, 47, 'Disponible'),
(48, 48, 'Disponible'),
(49, 49, 'Disponible'),
(50, 50, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `nombre_negocio` varchar(80) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `logo` text,
  `cuit` varchar(30) DEFAULT NULL,
  `web` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`nombre_negocio`, `direccion`, `telefono`, `logo`, `cuit`, `web`) VALUES
('Restaurant Neomicron', 'Pringles 554, Merlo, San Luis', '02656-473347', '/resto/public/img/uploads/logo.png', '30-3212332323-7', 'www.neomicron.com.ar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `precio` float NOT NULL DEFAULT '0',
  `categoria` varchar(50) NOT NULL DEFAULT '0',
  `stock` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `categoria`, `stock`) VALUES
(1, 'Pizza Muzarella', 200, 'Comidas', 0),
(2, 'Pizza Napolitana', 250, 'comidas', 0),
(3, 'Empanada', 30, 'comidas', 0),
(4, 'Coca cola 500cc', 50, 'bebidas', 50),
(5, 'Vino Toro', 100, 'bebidas', 14),
(6, 'Flan casero', 75, 'postres', 14),
(7, 'Helado', 70, 'postres', 0),
(8, 'Hamburguesa', 120, 'comidas', 0),
(9, 'Tallarines', 140, 'comidas', 0),
(10, 'Fanta 500cc', 50, 'bebidas', 44),
(11, 'Pizza Napolitana con Ajo y perejil', 280, 'comidas', 0),
(12, 'Fernet', 150, 'bebidas', 12),
(13, 'Hamburguesa completa', 185, 'Comidas', 100),
(15, 'Ravioles', 160, 'Comidas', 0),
(23, 'Agnolottis ', 189, 'Comidas', 0),
(25, 'Sprite 500cc', 50, 'Bebidas', 43),
(26, 'Agua mineral 500cc', 50, 'Bebidas', 54),
(27, 'Canelones', 220, 'Comidas', 0),
(28, 'Papas Fritas', 100, 'Comidas', 0),
(853, 'Arroz integral', 99, 'Comidas', 100),
(854, 'Pasta Frola', 119, 'Postres', 12),
(855, 'Provoleta', 95, 'Entradas', 12),
(856, 'Lechuga', 25, 'Comidas', 1),
(857, 'Sanguche de milanesa', 280, 'Comidas', 11),
(858, 'Prueba 2', 50, 'Prueba', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Cajero'),
(3, 'Mozo/Camarero'),
(4, 'Adicionista'),
(5, 'Cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `id` int(11) NOT NULL,
  `nro_mesa` int(11) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Pendiente',
  `ingreso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentarios` varchar(300) NOT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `rol` int(11) NOT NULL DEFAULT '0',
  `password` varchar(300) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `rol`, `password`) VALUES
(1, 'Santiago', 1, '765129f617218be6005e99eff125588787cd6443f07231af11a8b88d691179ea3ea0a4abd295dc030545633add41c5b560f1fc4529b3e3a1b84477d1c0d8292f'),
(2, 'Ruben', 3, 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(3, 'Luis', 5, 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(4, 'Admin', 1, 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesas`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
