-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2019 a las 11:20:33
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(4, 'Postres');

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
(15);

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
(1, 1, 'Ocupada'),
(2, 2, 'Ocupada'),
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
(30, 30, 'Disponible');

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
(30, 'Papas Fritas', 100, 'Comidas', 0),
(31, 'Papas Fritas', 100, 'Comidas', 0),
(32, 'Papas Fritas', 100, 'Comidas', 0),
(33, 'Papas Fritas', 100, 'Comidas', 0),
(34, 'Papas Fritas', 100, 'Comidas', 0),
(35, 'Papas Fritas', 100, 'Comidas', 0),
(36, 'Papas Fritas', 100, 'Comidas', 0),
(37, 'Papas Fritas', 100, 'Comidas', 0),
(38, 'Papas Fritas', 100, 'Comidas', 0),
(39, 'Papas Fritas', 100, 'Comidas', 0),
(40, 'Papas Fritas', 100, 'Comidas', 0),
(41, 'Papas Fritas', 100, 'Comidas', 0),
(42, 'Papas Fritas', 100, 'Comidas', 0),
(43, 'Papas Fritas', 100, 'Comidas', 0),
(44, 'Papas Fritas', 100, 'Comidas', 0),
(45, 'Papas Fritas', 100, 'Comidas', 0),
(46, 'Papas Fritas', 100, 'Comidas', 0),
(47, 'Papas Fritas', 100, 'Comidas', 0),
(48, 'Papas Fritas', 100, 'Comidas', 0),
(49, 'Papas Fritas', 100, 'Comidas', 0),
(50, 'Papas Fritas', 100, 'Comidas', 0),
(51, 'Papas Fritas', 100, 'Comidas', 0),
(52, 'Papas Fritas', 100, 'Comidas', 0),
(53, 'Papas Fritas', 100, 'Comidas', 0),
(54, 'Papas Fritas', 100, 'Comidas', 0),
(55, 'Papas Fritas', 100, 'Comidas', 0),
(56, 'Papas Fritas', 100, 'Comidas', 0),
(57, 'Papas Fritas', 100, 'Comidas', 0),
(58, 'Papas Fritas', 100, 'Comidas', 0),
(59, 'Papas Fritas', 100, 'Comidas', 0),
(60, 'Papas Fritas', 100, 'Comidas', 0),
(61, 'Papas Fritas', 100, 'Comidas', 0),
(62, 'Papas Fritas', 100, 'Comidas', 0),
(63, 'Papas Fritas', 100, 'Comidas', 0),
(64, 'Papas Fritas', 100, 'Comidas', 0),
(65, 'Papas Fritas', 100, 'Comidas', 0),
(66, 'Papas Fritas', 100, 'Comidas', 0),
(67, 'Papas Fritas', 100, 'Comidas', 0),
(68, 'Papas Fritas', 100, 'Comidas', 0),
(69, 'Papas Fritas', 100, 'Comidas', 0),
(70, 'Papas Fritas', 100, 'Comidas', 0),
(71, 'Papas Fritas', 100, 'Comidas', 0),
(72, 'Papas Fritas', 100, 'Comidas', 0),
(73, 'Papas Fritas', 100, 'Comidas', 0),
(74, 'Papas Fritas', 100, 'Comidas', 0),
(75, 'Papas Fritas', 100, 'Comidas', 0),
(76, 'Papas Fritas', 100, 'Comidas', 0),
(77, 'Papas Fritas', 100, 'Comidas', 0),
(78, 'Papas Fritas', 100, 'Comidas', 0),
(79, 'Papas Fritas', 100, 'Comidas', 0),
(80, 'Papas Fritas', 100, 'Comidas', 0),
(81, 'Papas Fritas', 100, 'Comidas', 0),
(82, 'Papas Fritas', 100, 'Comidas', 0),
(83, 'Papas Fritas', 100, 'Comidas', 0),
(84, 'Papas Fritas', 100, 'Comidas', 0),
(85, 'Papas Fritas', 100, 'Comidas', 0),
(86, 'Papas Fritas', 100, 'Comidas', 0),
(87, 'Papas Fritas', 100, 'Comidas', 0),
(88, 'Papas Fritas', 100, 'Comidas', 0),
(89, 'Papas Fritas', 100, 'Comidas', 0),
(90, 'Papas Fritas', 100, 'Comidas', 0),
(91, 'Papas Fritas', 100, 'Comidas', 0),
(92, 'Papas Fritas', 100, 'Comidas', 0),
(93, 'Papas Fritas', 100, 'Comidas', 0),
(94, 'Papas Fritas', 100, 'Comidas', 0),
(95, 'Papas Fritas', 100, 'Comidas', 0),
(96, 'Papas Fritas', 100, 'Comidas', 0),
(97, 'Papas Fritas', 100, 'Comidas', 0),
(98, 'Papas Fritas', 100, 'Comidas', 0),
(99, 'Papas Fritas', 100, 'Comidas', 0),
(100, 'Papas Fritas', 100, 'Comidas', 0),
(101, 'Papas Fritas', 100, 'Comidas', 0),
(102, 'Papas Fritas', 100, 'Comidas', 0),
(103, 'Papas Fritas', 100, 'Comidas', 0),
(104, 'Papas Fritas', 100, 'Comidas', 0),
(105, 'Papas Fritas', 100, 'Comidas', 0),
(106, 'Papas Fritas', 100, 'Comidas', 0),
(107, 'Papas Fritas', 100, 'Comidas', 0),
(108, 'Papas Fritas', 100, 'Comidas', 0),
(109, 'Papas Fritas', 100, 'Comidas', 0),
(110, 'Papas Fritas', 100, 'Comidas', 0),
(111, 'Papas Fritas', 100, 'Comidas', 0),
(112, 'Papas Fritas', 100, 'Comidas', 0),
(113, 'Papas Fritas', 100, 'Comidas', 0),
(114, 'Papas Fritas', 100, 'Comidas', 0),
(115, 'Papas Fritas', 100, 'Comidas', 0),
(116, 'Papas Fritas', 100, 'Comidas', 0),
(117, 'Papas Fritas', 100, 'Comidas', 0),
(118, 'Papas Fritas', 100, 'Comidas', 0),
(119, 'Papas Fritas', 100, 'Comidas', 0),
(120, 'Papas Fritas', 100, 'Comidas', 0),
(121, 'Papas Fritas', 100, 'Comidas', 0),
(122, 'Papas Fritas', 100, 'Comidas', 0),
(123, 'Papas Fritas', 100, 'Comidas', 0),
(124, 'Papas Fritas', 100, 'Comidas', 0),
(125, 'Papas Fritas', 100, 'Comidas', 0),
(126, 'Papas Fritas', 100, 'Comidas', 0),
(127, 'Papas Fritas', 100, 'Comidas', 0),
(128, 'Papas Fritas', 100, 'Comidas', 0),
(129, 'Papas Fritas', 100, 'Comidas', 0),
(130, 'Papas Fritas', 100, 'Comidas', 0),
(131, 'Papas Fritas', 100, 'Comidas', 0),
(132, 'Papas Fritas', 100, 'Comidas', 0),
(133, 'Papas Fritas', 100, 'Comidas', 0),
(134, 'Papas Fritas', 100, 'Comidas', 0),
(135, 'Papas Fritas', 100, 'Comidas', 0),
(136, 'Papas Fritas', 100, 'Comidas', 0),
(137, 'Papas Fritas', 100, 'Comidas', 0),
(138, 'Papas Fritas', 100, 'Comidas', 0),
(139, 'Papas Fritas', 100, 'Comidas', 0),
(140, 'Papas Fritas', 100, 'Comidas', 0),
(141, 'Papas Fritas', 100, 'Comidas', 0),
(142, 'Papas Fritas', 100, 'Comidas', 0),
(143, 'Papas Fritas', 100, 'Comidas', 0),
(144, 'Papas Fritas', 100, 'Comidas', 0),
(145, 'Papas Fritas', 100, 'Comidas', 0),
(146, 'Papas Fritas', 100, 'Comidas', 0),
(147, 'Papas Fritas', 100, 'Comidas', 0),
(148, 'Papas Fritas', 100, 'Comidas', 0),
(149, 'Papas Fritas', 100, 'Comidas', 0),
(150, 'Papas Fritas', 100, 'Comidas', 0),
(151, 'Papas Fritas', 100, 'Comidas', 0),
(152, 'Papas Fritas', 100, 'Comidas', 0),
(153, 'Papas Fritas', 100, 'Comidas', 0),
(154, 'Papas Fritas', 100, 'Comidas', 0),
(155, 'Papas Fritas', 100, 'Comidas', 0),
(156, 'Papas Fritas', 100, 'Comidas', 0),
(157, 'Papas Fritas', 100, 'Comidas', 0),
(158, 'Papas Fritas', 100, 'Comidas', 0),
(159, 'Papas Fritas', 100, 'Comidas', 0),
(160, 'Papas Fritas', 100, 'Comidas', 0),
(161, 'Papas Fritas', 100, 'Comidas', 0),
(162, 'Papas Fritas', 100, 'Comidas', 0),
(163, 'Papas Fritas', 100, 'Comidas', 0),
(164, 'Papas Fritas', 100, 'Comidas', 0),
(165, 'Papas Fritas', 100, 'Comidas', 0),
(166, 'Papas Fritas', 100, 'Comidas', 0),
(167, 'Papas Fritas', 100, 'Comidas', 0),
(168, 'Papas Fritas', 100, 'Comidas', 0),
(169, 'Papas Fritas', 100, 'Comidas', 0),
(170, 'Papas Fritas', 100, 'Comidas', 0),
(171, 'Papas Fritas', 100, 'Comidas', 0),
(172, 'Papas Fritas', 100, 'Comidas', 0),
(173, 'Papas Fritas', 100, 'Comidas', 0),
(174, 'Papas Fritas', 100, 'Comidas', 0),
(175, 'Papas Fritas', 100, 'Comidas', 0),
(176, 'Papas Fritas', 100, 'Comidas', 0),
(177, 'Papas Fritas', 100, 'Comidas', 0),
(178, 'Papas Fritas', 100, 'Comidas', 0),
(179, 'Papas Fritas', 100, 'Comidas', 0),
(180, 'Papas Fritas', 100, 'Comidas', 0),
(181, 'Papas Fritas', 100, 'Comidas', 0),
(182, 'Papas Fritas', 100, 'Comidas', 0),
(183, 'Papas Fritas', 100, 'Comidas', 0),
(184, 'Papas Fritas', 100, 'Comidas', 0),
(185, 'Papas Fritas', 100, 'Comidas', 0),
(186, 'Papas Fritas', 100, 'Comidas', 0),
(187, 'Papas Fritas', 100, 'Comidas', 0),
(188, 'Papas Fritas', 100, 'Comidas', 0),
(189, 'Papas Fritas', 100, 'Comidas', 0),
(190, 'Papas Fritas', 100, 'Comidas', 0),
(191, 'Papas Fritas', 100, 'Comidas', 0),
(192, 'Papas Fritas', 100, 'Comidas', 0),
(193, 'Papas Fritas', 100, 'Comidas', 0),
(194, 'Papas Fritas', 100, 'Comidas', 0),
(195, 'Papas Fritas', 100, 'Comidas', 0),
(196, 'Papas Fritas', 100, 'Comidas', 0),
(197, 'Papas Fritas', 100, 'Comidas', 0),
(198, 'Papas Fritas', 100, 'Comidas', 0),
(199, 'Papas Fritas', 100, 'Comidas', 0),
(200, 'Papas Fritas', 100, 'Comidas', 0),
(201, 'Papas Fritas', 100, 'Comidas', 0),
(202, 'Papas Fritas', 100, 'Comidas', 0),
(203, 'Papas Fritas', 100, 'Comidas', 0),
(204, 'Papas Fritas', 100, 'Comidas', 0),
(205, 'Papas Fritas', 100, 'Comidas', 0),
(206, 'Papas Fritas', 100, 'Comidas', 0),
(207, 'Papas Fritas', 100, 'Comidas', 0),
(208, 'Papas Fritas', 100, 'Comidas', 0),
(209, 'Papas Fritas', 100, 'Comidas', 0),
(210, 'Papas Fritas', 100, 'Comidas', 0),
(211, 'Papas Fritas', 100, 'Comidas', 0),
(212, 'Papas Fritas', 100, 'Comidas', 0),
(213, 'Papas Fritas', 100, 'Comidas', 0),
(214, 'Papas Fritas', 100, 'Comidas', 0),
(215, 'Papas Fritas', 100, 'Comidas', 0),
(216, 'Papas Fritas', 100, 'Comidas', 0),
(217, 'Papas Fritas', 100, 'Comidas', 0),
(218, 'Papas Fritas', 100, 'Comidas', 0),
(219, 'Papas Fritas', 100, 'Comidas', 0),
(220, 'Papas Fritas', 100, 'Comidas', 0),
(221, 'Papas Fritas', 100, 'Comidas', 0),
(222, 'Papas Fritas', 100, 'Comidas', 0),
(223, 'Papas Fritas', 100, 'Comidas', 0),
(224, 'Papas Fritas', 100, 'Comidas', 0),
(225, 'Papas Fritas', 100, 'Comidas', 0),
(226, 'Papas Fritas', 100, 'Comidas', 0),
(227, 'Papas Fritas', 100, 'Comidas', 0),
(228, 'Papas Fritas', 100, 'Comidas', 0),
(229, 'Papas Fritas', 100, 'Comidas', 0),
(230, 'Papas Fritas', 100, 'Comidas', 0),
(231, 'Papas Fritas', 100, 'Comidas', 0),
(232, 'Papas Fritas', 100, 'Comidas', 0),
(233, 'Papas Fritas', 100, 'Comidas', 0),
(234, 'Papas Fritas', 100, 'Comidas', 0),
(235, 'Papas Fritas', 100, 'Comidas', 0),
(236, 'Papas Fritas', 100, 'Comidas', 0),
(237, 'Papas Fritas', 100, 'Comidas', 0),
(238, 'Papas Fritas', 100, 'Comidas', 0),
(239, 'Papas Fritas', 100, 'Comidas', 0),
(240, 'Papas Fritas', 100, 'Comidas', 0),
(241, 'Papas Fritas', 100, 'Comidas', 0),
(242, 'Papas Fritas', 100, 'Comidas', 0),
(243, 'Papas Fritas', 100, 'Comidas', 0),
(244, 'Papas Fritas', 100, 'Comidas', 0),
(245, 'Papas Fritas', 100, 'Comidas', 0),
(246, 'Papas Fritas', 100, 'Comidas', 0),
(247, 'Papas Fritas', 100, 'Comidas', 0),
(248, 'Papas Fritas', 100, 'Comidas', 0),
(249, 'Papas Fritas', 100, 'Comidas', 0),
(250, 'Papas Fritas', 100, 'Comidas', 0),
(251, 'Papas Fritas', 100, 'Comidas', 0),
(252, 'Papas Fritas', 100, 'Comidas', 0),
(253, 'Papas Fritas', 100, 'Comidas', 0),
(254, 'Papas Fritas', 100, 'Comidas', 0),
(255, 'Papas Fritas', 100, 'Comidas', 0),
(256, 'Papas Fritas', 100, 'Comidas', 0),
(257, 'Papas Fritas', 100, 'Comidas', 0),
(258, 'Papas Fritas', 100, 'Comidas', 0),
(259, 'Papas Fritas', 100, 'Comidas', 0),
(260, 'Papas Fritas', 100, 'Comidas', 0),
(261, 'Papas Fritas', 100, 'Comidas', 0),
(262, 'Papas Fritas', 100, 'Comidas', 0),
(263, 'Papas Fritas', 100, 'Comidas', 0),
(264, 'Papas Fritas', 100, 'Comidas', 0),
(265, 'Papas Fritas', 100, 'Comidas', 0),
(266, 'Papas Fritas', 100, 'Comidas', 0),
(267, 'Papas Fritas', 100, 'Comidas', 0),
(268, 'Papas Fritas', 100, 'Comidas', 0),
(269, 'Papas Fritas', 100, 'Comidas', 0),
(270, 'Papas Fritas', 100, 'Comidas', 0),
(271, 'Papas Fritas', 100, 'Comidas', 0),
(272, 'Papas Fritas', 100, 'Comidas', 0),
(273, 'Papas Fritas', 100, 'Comidas', 0),
(274, 'Papas Fritas', 100, 'Comidas', 0),
(275, 'Papas Fritas', 100, 'Comidas', 0),
(276, 'Papas Fritas', 100, 'Comidas', 0),
(277, 'Papas Fritas', 100, 'Comidas', 0),
(278, 'Papas Fritas', 100, 'Comidas', 0),
(279, 'Papas Fritas', 100, 'Comidas', 0),
(280, 'Papas Fritas', 100, 'Comidas', 0),
(281, 'Papas Fritas', 100, 'Comidas', 0),
(282, 'Papas Fritas', 100, 'Comidas', 0),
(283, 'Papas Fritas', 100, 'Comidas', 0),
(284, 'Papas Fritas', 100, 'Comidas', 0),
(285, 'Papas Fritas', 100, 'Comidas', 0),
(286, 'Papas Fritas', 100, 'Comidas', 0),
(287, 'Papas Fritas', 100, 'Comidas', 0),
(288, 'Papas Fritas', 100, 'Comidas', 0),
(289, 'Papas Fritas', 100, 'Comidas', 0),
(290, 'Papas Fritas', 100, 'Comidas', 0),
(291, 'Papas Fritas', 100, 'Comidas', 0),
(292, 'Papas Fritas', 100, 'Comidas', 0),
(293, 'Papas Fritas', 100, 'Comidas', 0),
(294, 'Papas Fritas', 100, 'Comidas', 0),
(295, 'Papas Fritas', 100, 'Comidas', 0),
(296, 'Papas Fritas', 100, 'Comidas', 0),
(297, 'Papas Fritas', 100, 'Comidas', 0),
(298, 'Papas Fritas', 100, 'Comidas', 0),
(299, 'Papas Fritas', 100, 'Comidas', 0),
(300, 'Papas Fritas', 100, 'Comidas', 0),
(301, 'Papas Fritas', 100, 'Comidas', 0),
(302, 'Papas Fritas', 100, 'Comidas', 0),
(303, 'Papas Fritas', 100, 'Comidas', 0),
(304, 'Papas Fritas', 100, 'Comidas', 0),
(305, 'Papas Fritas', 100, 'Comidas', 0),
(306, 'Papas Fritas', 100, 'Comidas', 0),
(307, 'Papas Fritas', 100, 'Comidas', 0),
(308, 'Papas Fritas', 100, 'Comidas', 0),
(309, 'Papas Fritas', 100, 'Comidas', 0),
(310, 'Papas Fritas', 100, 'Comidas', 0),
(311, 'Papas Fritas', 100, 'Comidas', 0),
(312, 'Papas Fritas', 100, 'Comidas', 0),
(313, 'Papas Fritas', 100, 'Comidas', 0),
(314, 'Papas Fritas', 100, 'Comidas', 0),
(315, 'Papas Fritas', 100, 'Comidas', 0),
(316, 'Papas Fritas', 100, 'Comidas', 0),
(317, 'Papas Fritas', 100, 'Comidas', 0),
(318, 'Papas Fritas', 100, 'Comidas', 0),
(319, 'Papas Fritas', 100, 'Comidas', 0),
(320, 'Papas Fritas', 100, 'Comidas', 0),
(321, 'Papas Fritas', 100, 'Comidas', 0),
(322, 'Papas Fritas', 100, 'Comidas', 0),
(323, 'Papas Fritas', 100, 'Comidas', 0),
(324, 'Papas Fritas', 100, 'Comidas', 0),
(325, 'Papas Fritas', 100, 'Comidas', 0),
(326, 'Papas Fritas', 100, 'Comidas', 0),
(327, 'Papas Fritas', 100, 'Comidas', 0),
(328, 'Papas Fritas', 100, 'Comidas', 0),
(329, 'Papas Fritas', 100, 'Comidas', 0),
(330, 'Papas Fritas', 100, 'Comidas', 0),
(331, 'Papas Fritas', 100, 'Comidas', 0),
(332, 'Papas Fritas', 100, 'Comidas', 0),
(333, 'Papas Fritas', 100, 'Comidas', 0),
(334, 'Papas Fritas', 100, 'Comidas', 0),
(335, 'Papas Fritas', 100, 'Comidas', 0),
(336, 'Papas Fritas', 100, 'Comidas', 0),
(337, 'Papas Fritas', 100, 'Comidas', 0),
(338, 'Papas Fritas', 100, 'Comidas', 0),
(339, 'Papas Fritas', 100, 'Comidas', 0),
(340, 'Papas Fritas', 100, 'Comidas', 0),
(341, 'Papas Fritas', 100, 'Comidas', 0),
(342, 'Papas Fritas', 100, 'Comidas', 0),
(343, 'Papas Fritas', 100, 'Comidas', 0),
(344, 'Papas Fritas', 100, 'Comidas', 0),
(345, 'Papas Fritas', 100, 'Comidas', 0),
(346, 'Papas Fritas', 100, 'Comidas', 0),
(347, 'Papas Fritas', 100, 'Comidas', 0),
(348, 'Papas Fritas', 100, 'Comidas', 0),
(349, 'Papas Fritas', 100, 'Comidas', 0),
(350, 'Papas Fritas', 100, 'Comidas', 0),
(351, 'Papas Fritas', 100, 'Comidas', 0),
(352, 'Papas Fritas', 100, 'Comidas', 0),
(353, 'Papas Fritas', 100, 'Comidas', 0),
(354, 'Papas Fritas', 100, 'Comidas', 0),
(355, 'Papas Fritas', 100, 'Comidas', 0),
(356, 'Papas Fritas', 100, 'Comidas', 0),
(357, 'Papas Fritas', 100, 'Comidas', 0),
(358, 'Papas Fritas', 100, 'Comidas', 0),
(359, 'Papas Fritas', 100, 'Comidas', 0),
(360, 'Papas Fritas', 100, 'Comidas', 0),
(361, 'Papas Fritas', 100, 'Comidas', 0),
(362, 'Papas Fritas', 100, 'Comidas', 0),
(363, 'Papas Fritas', 100, 'Comidas', 0),
(364, 'Papas Fritas', 100, 'Comidas', 0),
(365, 'Papas Fritas', 100, 'Comidas', 0),
(366, 'Papas Fritas', 100, 'Comidas', 0),
(367, 'Papas Fritas', 100, 'Comidas', 0),
(368, 'Papas Fritas', 100, 'Comidas', 0),
(369, 'Papas Fritas', 100, 'Comidas', 0),
(370, 'Papas Fritas', 100, 'Comidas', 0),
(371, 'Papas Fritas', 100, 'Comidas', 0),
(372, 'Papas Fritas', 100, 'Comidas', 0),
(373, 'Papas Fritas', 100, 'Comidas', 0),
(374, 'Papas Fritas', 100, 'Comidas', 0),
(375, 'Papas Fritas', 100, 'Comidas', 0),
(376, 'Papas Fritas', 100, 'Comidas', 0),
(377, 'Papas Fritas', 100, 'Comidas', 0),
(378, 'Papas Fritas', 100, 'Comidas', 0),
(379, 'Papas Fritas', 100, 'Comidas', 0),
(380, 'Papas Fritas', 100, 'Comidas', 0),
(381, 'Papas Fritas', 100, 'Comidas', 0),
(382, 'Papas Fritas', 100, 'Comidas', 0),
(383, 'Papas Fritas', 100, 'Comidas', 0),
(384, 'Papas Fritas', 100, 'Comidas', 0),
(385, 'Papas Fritas', 100, 'Comidas', 0),
(386, 'Papas Fritas', 100, 'Comidas', 0),
(387, 'Papas Fritas', 100, 'Comidas', 0),
(388, 'Papas Fritas', 100, 'Comidas', 0),
(389, 'Papas Fritas', 100, 'Comidas', 0),
(390, 'Papas Fritas', 100, 'Comidas', 0),
(391, 'Papas Fritas', 100, 'Comidas', 0),
(392, 'Papas Fritas', 100, 'Comidas', 0),
(393, 'Papas Fritas', 100, 'Comidas', 0),
(394, 'Papas Fritas', 100, 'Comidas', 0),
(395, 'Papas Fritas', 100, 'Comidas', 0),
(396, 'Papas Fritas', 100, 'Comidas', 0),
(397, 'Papas Fritas', 100, 'Comidas', 0),
(398, 'Papas Fritas', 100, 'Comidas', 0),
(399, 'Papas Fritas', 100, 'Comidas', 0),
(400, 'Papas Fritas', 100, 'Comidas', 0),
(401, 'Papas Fritas', 100, 'Comidas', 0),
(402, 'Papas Fritas', 100, 'Comidas', 0),
(403, 'Papas Fritas', 100, 'Comidas', 0),
(404, 'Papas Fritas', 100, 'Comidas', 0),
(405, 'Papas Fritas', 100, 'Comidas', 0),
(406, 'Papas Fritas', 100, 'Comidas', 0),
(407, 'Papas Fritas', 100, 'Comidas', 0),
(408, 'Papas Fritas', 100, 'Comidas', 0),
(409, 'Papas Fritas', 100, 'Comidas', 0),
(410, 'Papas Fritas', 100, 'Comidas', 0),
(411, 'Papas Fritas', 100, 'Comidas', 0),
(412, 'Papas Fritas', 100, 'Comidas', 0),
(413, 'Papas Fritas', 100, 'Comidas', 0),
(414, 'Papas Fritas', 100, 'Comidas', 0),
(415, 'Papas Fritas', 100, 'Comidas', 0),
(416, 'Papas Fritas', 100, 'Comidas', 0),
(417, 'Papas Fritas', 100, 'Comidas', 0),
(418, 'Papas Fritas', 100, 'Comidas', 0),
(419, 'Papas Fritas', 100, 'Comidas', 0),
(420, 'Papas Fritas', 100, 'Comidas', 0),
(421, 'Papas Fritas', 100, 'Comidas', 0),
(422, 'Papas Fritas', 100, 'Comidas', 0),
(423, 'Papas Fritas', 100, 'Comidas', 0),
(424, 'Papas Fritas', 100, 'Comidas', 0),
(425, 'Papas Fritas', 100, 'Comidas', 0),
(426, 'Papas Fritas', 100, 'Comidas', 0),
(427, 'Papas Fritas', 100, 'Comidas', 0),
(428, 'Papas Fritas', 100, 'Comidas', 0),
(429, 'Papas Fritas', 100, 'Comidas', 0),
(430, 'Papas Fritas', 100, 'Comidas', 0),
(431, 'Papas Fritas', 100, 'Comidas', 0),
(432, 'Papas Fritas', 100, 'Comidas', 0),
(433, 'Papas Fritas', 100, 'Comidas', 0),
(434, 'Papas Fritas', 100, 'Comidas', 0),
(435, 'Papas Fritas', 100, 'Comidas', 0),
(436, 'Papas Fritas', 100, 'Comidas', 0),
(437, 'Papas Fritas', 100, 'Comidas', 0),
(438, 'Papas Fritas', 100, 'Comidas', 0),
(439, 'Papas Fritas', 100, 'Comidas', 0),
(440, 'Papas Fritas', 100, 'Comidas', 0),
(441, 'Papas Fritas', 100, 'Comidas', 0),
(442, 'Papas Fritas', 100, 'Comidas', 0),
(443, 'Papas Fritas', 100, 'Comidas', 0),
(444, 'Papas Fritas', 100, 'Comidas', 0),
(445, 'Papas Fritas', 100, 'Comidas', 0),
(446, 'Papas Fritas', 100, 'Comidas', 0),
(447, 'Papas Fritas', 100, 'Comidas', 0),
(448, 'Papas Fritas', 100, 'Comidas', 0),
(449, 'Papas Fritas', 100, 'Comidas', 0),
(450, 'Papas Fritas', 100, 'Comidas', 0),
(451, 'Papas Fritas', 100, 'Comidas', 0),
(452, 'Papas Fritas', 100, 'Comidas', 0),
(453, 'Papas Fritas', 100, 'Comidas', 0),
(454, 'Papas Fritas', 100, 'Comidas', 0),
(455, 'Papas Fritas', 100, 'Comidas', 0),
(456, 'Papas Fritas', 100, 'Comidas', 0),
(457, 'Papas Fritas', 100, 'Comidas', 0),
(458, 'Papas Fritas', 100, 'Comidas', 0),
(459, 'Papas Fritas', 100, 'Comidas', 0),
(460, 'Papas Fritas', 100, 'Comidas', 0),
(461, 'Papas Fritas', 100, 'Comidas', 0),
(462, 'Papas Fritas', 100, 'Comidas', 0),
(463, 'Papas Fritas', 100, 'Comidas', 0),
(464, 'Papas Fritas', 100, 'Comidas', 0),
(465, 'Papas Fritas', 100, 'Comidas', 0),
(466, 'Papas Fritas', 100, 'Comidas', 0),
(467, 'Papas Fritas', 100, 'Comidas', 0),
(468, 'Papas Fritas', 100, 'Comidas', 0),
(469, 'Papas Fritas', 100, 'Comidas', 0),
(470, 'Papas Fritas', 100, 'Comidas', 0),
(471, 'Papas Fritas', 100, 'Comidas', 0),
(472, 'Papas Fritas', 100, 'Comidas', 0),
(473, 'Papas Fritas', 100, 'Comidas', 0),
(474, 'Papas Fritas', 100, 'Comidas', 0),
(475, 'Papas Fritas', 100, 'Comidas', 0),
(476, 'Papas Fritas', 100, 'Comidas', 0),
(477, 'Papas Fritas', 100, 'Comidas', 0),
(478, 'Papas Fritas', 100, 'Comidas', 0),
(479, 'Papas Fritas', 100, 'Comidas', 0),
(480, 'Papas Fritas', 100, 'Comidas', 0),
(481, 'Papas Fritas', 100, 'Comidas', 0),
(482, 'Papas Fritas', 100, 'Comidas', 0),
(483, 'Papas Fritas', 100, 'Comidas', 0),
(484, 'Papas Fritas', 100, 'Comidas', 0),
(485, 'Papas Fritas', 100, 'Comidas', 0),
(486, 'Papas Fritas', 100, 'Comidas', 0),
(487, 'Papas Fritas', 100, 'Comidas', 0),
(488, 'Papas Fritas', 100, 'Comidas', 0),
(489, 'Papas Fritas', 100, 'Comidas', 0),
(490, 'Papas Fritas', 100, 'Comidas', 0),
(491, 'Papas Fritas', 100, 'Comidas', 0),
(492, 'Papas Fritas', 100, 'Comidas', 0),
(493, 'Papas Fritas', 100, 'Comidas', 0),
(494, 'Papas Fritas', 100, 'Comidas', 0),
(495, 'Papas Fritas', 100, 'Comidas', 0),
(496, 'Papas Fritas', 100, 'Comidas', 0),
(497, 'Papas Fritas', 100, 'Comidas', 0),
(498, 'Papas Fritas', 100, 'Comidas', 0),
(499, 'Papas Fritas', 100, 'Comidas', 0),
(500, 'Papas Fritas', 100, 'Comidas', 0),
(501, 'Papas Fritas', 100, 'Comidas', 0),
(502, 'Papas Fritas', 100, 'Comidas', 0),
(503, 'Papas Fritas', 100, 'Comidas', 0),
(504, 'Papas Fritas', 100, 'Comidas', 0),
(505, 'Papas Fritas', 100, 'Comidas', 0),
(506, 'Papas Fritas', 100, 'Comidas', 0),
(507, 'Papas Fritas', 100, 'Comidas', 0),
(508, 'Papas Fritas', 100, 'Comidas', 0),
(509, 'Papas Fritas', 100, 'Comidas', 0),
(510, 'Papas Fritas', 100, 'Comidas', 0),
(511, 'Papas Fritas', 100, 'Comidas', 0),
(512, 'Papas Fritas', 100, 'Comidas', 0),
(513, 'Papas Fritas', 100, 'Comidas', 0),
(514, 'Papas Fritas', 100, 'Comidas', 0),
(515, 'Papas Fritas', 100, 'Comidas', 0),
(516, 'Papas Fritas', 100, 'Comidas', 0),
(517, 'Papas Fritas', 100, 'Comidas', 0),
(518, 'Papas Fritas', 100, 'Comidas', 0),
(519, 'Papas Fritas', 100, 'Comidas', 0),
(520, 'Papas Fritas', 100, 'Comidas', 0),
(521, 'Papas Fritas', 100, 'Comidas', 0),
(522, 'Papas Fritas', 100, 'Comidas', 0),
(523, 'Papas Fritas', 100, 'Comidas', 0),
(524, 'Papas Fritas', 100, 'Comidas', 0),
(525, 'Papas Fritas', 100, 'Comidas', 0),
(526, 'Papas Fritas', 100, 'Comidas', 0),
(527, 'Papas Fritas', 100, 'Comidas', 0),
(528, 'Papas Fritas', 100, 'Comidas', 0),
(529, 'Papas Fritas', 100, 'Comidas', 0),
(530, 'Papas Fritas', 100, 'Comidas', 0),
(531, 'Papas Fritas', 100, 'Comidas', 0),
(532, 'Papas Fritas', 100, 'Comidas', 0),
(533, 'Papas Fritas', 100, 'Comidas', 0),
(534, 'Papas Fritas', 100, 'Comidas', 0),
(535, 'Papas Fritas', 100, 'Comidas', 0),
(536, 'Papas Fritas', 100, 'Comidas', 0),
(537, 'Papas Fritas', 100, 'Comidas', 0),
(538, 'Papas Fritas', 100, 'Comidas', 0),
(539, 'Papas Fritas', 100, 'Comidas', 0),
(540, 'Papas Fritas', 100, 'Comidas', 0),
(541, 'Papas Fritas', 100, 'Comidas', 0),
(542, 'Papas Fritas', 100, 'Comidas', 0),
(543, 'Papas Fritas', 100, 'Comidas', 0),
(544, 'Papas Fritas', 100, 'Comidas', 0),
(545, 'Papas Fritas', 100, 'Comidas', 0),
(546, 'Papas Fritas', 100, 'Comidas', 0),
(547, 'Papas Fritas', 100, 'Comidas', 0),
(548, 'Papas Fritas', 100, 'Comidas', 0),
(549, 'Papas Fritas', 100, 'Comidas', 0),
(550, 'Papas Fritas', 100, 'Comidas', 0),
(551, 'Papas Fritas', 100, 'Comidas', 0),
(552, 'Papas Fritas', 100, 'Comidas', 0),
(553, 'Papas Fritas', 100, 'Comidas', 0),
(554, 'Papas Fritas', 100, 'Comidas', 0),
(555, 'Papas Fritas', 100, 'Comidas', 0),
(556, 'Papas Fritas', 100, 'Comidas', 0),
(557, 'Papas Fritas', 100, 'Comidas', 0),
(558, 'Papas Fritas', 100, 'Comidas', 0),
(559, 'Papas Fritas', 100, 'Comidas', 0),
(560, 'Papas Fritas', 100, 'Comidas', 0),
(561, 'Papas Fritas', 100, 'Comidas', 0),
(562, 'Papas Fritas', 100, 'Comidas', 0),
(563, 'Papas Fritas', 100, 'Comidas', 0),
(564, 'Papas Fritas', 100, 'Comidas', 0),
(565, 'Papas Fritas', 100, 'Comidas', 0),
(566, 'Papas Fritas', 100, 'Comidas', 0),
(567, 'Papas Fritas', 100, 'Comidas', 0),
(568, 'Papas Fritas', 100, 'Comidas', 0),
(569, 'Papas Fritas', 100, 'Comidas', 0),
(570, 'Papas Fritas', 100, 'Comidas', 0),
(571, 'Papas Fritas', 100, 'Comidas', 0),
(572, 'Papas Fritas', 100, 'Comidas', 0),
(573, 'Papas Fritas', 100, 'Comidas', 0),
(574, 'Papas Fritas', 100, 'Comidas', 0),
(575, 'Papas Fritas', 100, 'Comidas', 0),
(576, 'Papas Fritas', 100, 'Comidas', 0),
(577, 'Papas Fritas', 100, 'Comidas', 0),
(578, 'Papas Fritas', 100, 'Comidas', 0),
(579, 'Papas Fritas', 100, 'Comidas', 0),
(580, 'Papas Fritas', 100, 'Comidas', 0),
(581, 'Papas Fritas', 100, 'Comidas', 0),
(582, 'Papas Fritas', 100, 'Comidas', 0),
(583, 'Papas Fritas', 100, 'Comidas', 0),
(584, 'Papas Fritas', 100, 'Comidas', 0),
(585, 'Papas Fritas', 100, 'Comidas', 0),
(586, 'Papas Fritas', 100, 'Comidas', 0),
(587, 'Papas Fritas', 100, 'Comidas', 0),
(588, 'Papas Fritas', 100, 'Comidas', 0),
(589, 'Papas Fritas', 100, 'Comidas', 0),
(590, 'Papas Fritas', 100, 'Comidas', 0),
(591, 'Papas Fritas', 100, 'Comidas', 0),
(592, 'Papas Fritas', 100, 'Comidas', 0),
(593, 'Papas Fritas', 100, 'Comidas', 0),
(594, 'Papas Fritas', 100, 'Comidas', 0),
(595, 'Papas Fritas', 100, 'Comidas', 0),
(596, 'Papas Fritas', 100, 'Comidas', 0),
(597, 'Papas Fritas', 100, 'Comidas', 0),
(598, 'Papas Fritas', 100, 'Comidas', 0),
(599, 'Papas Fritas', 100, 'Comidas', 0),
(600, 'Papas Fritas', 100, 'Comidas', 0),
(601, 'Papas Fritas', 100, 'Comidas', 0),
(602, 'Papas Fritas', 100, 'Comidas', 0),
(603, 'Papas Fritas', 100, 'Comidas', 0),
(604, 'Papas Fritas', 100, 'Comidas', 0),
(605, 'Papas Fritas', 100, 'Comidas', 0),
(606, 'Papas Fritas', 100, 'Comidas', 0),
(607, 'Papas Fritas', 100, 'Comidas', 0),
(608, 'Papas Fritas', 100, 'Comidas', 0),
(609, 'Papas Fritas', 100, 'Comidas', 0),
(610, 'Papas Fritas', 100, 'Comidas', 0),
(611, 'Papas Fritas', 100, 'Comidas', 0),
(612, 'Papas Fritas', 100, 'Comidas', 0),
(613, 'Papas Fritas', 100, 'Comidas', 0),
(614, 'Papas Fritas', 100, 'Comidas', 0),
(615, 'Papas Fritas', 100, 'Comidas', 0),
(616, 'Papas Fritas', 100, 'Comidas', 0),
(617, 'Papas Fritas', 100, 'Comidas', 0),
(618, 'Papas Fritas', 100, 'Comidas', 0),
(619, 'Papas Fritas', 100, 'Comidas', 0),
(620, 'Papas Fritas', 100, 'Comidas', 0),
(621, 'Papas Fritas', 100, 'Comidas', 0),
(622, 'Papas Fritas', 100, 'Comidas', 0),
(623, 'Papas Fritas', 100, 'Comidas', 0),
(624, 'Papas Fritas', 100, 'Comidas', 0),
(625, 'Papas Fritas', 100, 'Comidas', 0),
(626, 'Papas Fritas', 100, 'Comidas', 0),
(627, 'Papas Fritas', 100, 'Comidas', 0),
(628, 'Papas Fritas', 100, 'Comidas', 0),
(629, 'Papas Fritas', 100, 'Comidas', 0),
(630, 'Papas Fritas', 100, 'Comidas', 0),
(631, 'Papas Fritas', 100, 'Comidas', 0),
(632, 'Papas Fritas', 100, 'Comidas', 0),
(633, 'Papas Fritas', 100, 'Comidas', 0),
(634, 'Papas Fritas', 100, 'Comidas', 0),
(635, 'Papas Fritas', 100, 'Comidas', 0),
(636, 'Papas Fritas', 100, 'Comidas', 0),
(637, 'Papas Fritas', 100, 'Comidas', 0),
(638, 'Papas Fritas', 100, 'Comidas', 0),
(639, 'Papas Fritas', 100, 'Comidas', 0),
(640, 'Papas Fritas', 100, 'Comidas', 0),
(641, 'Papas Fritas', 100, 'Comidas', 0),
(642, 'Papas Fritas', 100, 'Comidas', 0),
(643, 'Papas Fritas', 100, 'Comidas', 0),
(644, 'Papas Fritas', 100, 'Comidas', 0),
(645, 'Papas Fritas', 100, 'Comidas', 0),
(646, 'Papas Fritas', 100, 'Comidas', 0),
(647, 'Papas Fritas', 100, 'Comidas', 0),
(648, 'Papas Fritas', 100, 'Comidas', 0),
(649, 'Papas Fritas', 100, 'Comidas', 0),
(650, 'Papas Fritas', 100, 'Comidas', 0),
(651, 'Papas Fritas', 100, 'Comidas', 0),
(652, 'Papas Fritas', 100, 'Comidas', 0),
(653, 'Papas Fritas', 100, 'Comidas', 0),
(654, 'Papas Fritas', 100, 'Comidas', 0),
(655, 'Papas Fritas', 100, 'Comidas', 0),
(656, 'Papas Fritas', 100, 'Comidas', 0),
(657, 'Papas Fritas', 100, 'Comidas', 0),
(658, 'Papas Fritas', 100, 'Comidas', 0),
(659, 'Papas Fritas', 100, 'Comidas', 0),
(660, 'Papas Fritas', 100, 'Comidas', 0),
(661, 'Papas Fritas', 100, 'Comidas', 0),
(662, 'Papas Fritas', 100, 'Comidas', 0),
(663, 'Papas Fritas', 100, 'Comidas', 0),
(664, 'Papas Fritas', 100, 'Comidas', 0),
(665, 'Papas Fritas', 100, 'Comidas', 0),
(666, 'Papas Fritas', 100, 'Comidas', 0),
(667, 'Papas Fritas', 100, 'Comidas', 0),
(668, 'Papas Fritas', 100, 'Comidas', 0),
(669, 'Papas Fritas', 100, 'Comidas', 0),
(670, 'Papas Fritas', 100, 'Comidas', 0),
(671, 'Papas Fritas', 100, 'Comidas', 0),
(672, 'Papas Fritas', 100, 'Comidas', 0),
(673, 'Papas Fritas', 100, 'Comidas', 0),
(674, 'Papas Fritas', 100, 'Comidas', 0),
(675, 'Papas Fritas', 100, 'Comidas', 0),
(676, 'Papas Fritas', 100, 'Comidas', 0),
(677, 'Papas Fritas', 100, 'Comidas', 0),
(678, 'Papas Fritas', 100, 'Comidas', 0),
(679, 'Papas Fritas', 100, 'Comidas', 0),
(680, 'Papas Fritas', 100, 'Comidas', 0),
(681, 'Papas Fritas', 100, 'Comidas', 0),
(682, 'Papas Fritas', 100, 'Comidas', 0),
(683, 'Papas Fritas', 100, 'Comidas', 0),
(684, 'Papas Fritas', 100, 'Comidas', 0),
(685, 'Papas Fritas', 100, 'Comidas', 0),
(686, 'Papas Fritas', 100, 'Comidas', 0),
(687, 'Papas Fritas', 100, 'Comidas', 0),
(688, 'Papas Fritas', 100, 'Comidas', 0),
(689, 'Papas Fritas', 100, 'Comidas', 0),
(690, 'Papas Fritas', 100, 'Comidas', 0),
(691, 'Papas Fritas', 100, 'Comidas', 0),
(692, 'Papas Fritas', 100, 'Comidas', 0),
(693, 'Papas Fritas', 100, 'Comidas', 0),
(694, 'Papas Fritas', 100, 'Comidas', 0),
(695, 'Papas Fritas', 100, 'Comidas', 0),
(696, 'Papas Fritas', 100, 'Comidas', 0),
(697, 'Papas Fritas', 100, 'Comidas', 0),
(698, 'Papas Fritas', 100, 'Comidas', 0),
(699, 'Papas Fritas', 100, 'Comidas', 0),
(700, 'Papas Fritas', 100, 'Comidas', 0),
(701, 'Papas Fritas', 100, 'Comidas', 0),
(702, 'Papas Fritas', 100, 'Comidas', 0),
(703, 'Papas Fritas', 100, 'Comidas', 0),
(704, 'Papas Fritas', 100, 'Comidas', 0),
(705, 'Papas Fritas', 100, 'Comidas', 0),
(706, 'Papas Fritas', 100, 'Comidas', 0),
(707, 'Papas Fritas', 100, 'Comidas', 0),
(708, 'Papas Fritas', 100, 'Comidas', 0),
(709, 'Papas Fritas', 100, 'Comidas', 0),
(710, 'Papas Fritas', 100, 'Comidas', 0),
(711, 'Papas Fritas', 100, 'Comidas', 0),
(712, 'Papas Fritas', 100, 'Comidas', 0),
(713, 'Papas Fritas', 100, 'Comidas', 0),
(714, 'Papas Fritas', 100, 'Comidas', 0),
(715, 'Papas Fritas', 100, 'Comidas', 0),
(716, 'Papas Fritas', 100, 'Comidas', 0),
(717, 'Papas Fritas', 100, 'Comidas', 0),
(718, 'Papas Fritas', 100, 'Comidas', 0),
(719, 'Papas Fritas', 100, 'Comidas', 0),
(720, 'Papas Fritas', 100, 'Comidas', 0),
(721, 'Papas Fritas', 100, 'Comidas', 0),
(722, 'Papas Fritas', 100, 'Comidas', 0),
(723, 'Papas Fritas', 100, 'Comidas', 0),
(724, 'Papas Fritas', 100, 'Comidas', 0),
(725, 'Papas Fritas', 100, 'Comidas', 0),
(726, 'Papas Fritas', 100, 'Comidas', 0),
(727, 'Papas Fritas', 100, 'Comidas', 0),
(728, 'Papas Fritas', 100, 'Comidas', 0),
(729, 'Papas Fritas', 100, 'Comidas', 0),
(730, 'Papas Fritas', 100, 'Comidas', 0),
(731, 'Papas Fritas', 100, 'Comidas', 0),
(732, 'Papas Fritas', 100, 'Comidas', 0),
(733, 'Papas Fritas', 100, 'Comidas', 0),
(734, 'Papas Fritas', 100, 'Comidas', 0),
(735, 'Papas Fritas', 100, 'Comidas', 0),
(736, 'Papas Fritas', 100, 'Comidas', 0),
(737, 'Papas Fritas', 100, 'Comidas', 0),
(738, 'Papas Fritas', 100, 'Comidas', 0),
(739, 'Papas Fritas', 100, 'Comidas', 0),
(740, 'Papas Fritas', 100, 'Comidas', 0),
(741, 'Papas Fritas', 100, 'Comidas', 0),
(742, 'Papas Fritas', 100, 'Comidas', 0),
(743, 'Papas Fritas', 100, 'Comidas', 0),
(744, 'Papas Fritas', 100, 'Comidas', 0),
(745, 'Papas Fritas', 100, 'Comidas', 0),
(746, 'Papas Fritas', 100, 'Comidas', 0),
(747, 'Papas Fritas', 100, 'Comidas', 0),
(748, 'Papas Fritas', 100, 'Comidas', 0),
(749, 'Papas Fritas', 100, 'Comidas', 0),
(750, 'Papas Fritas', 100, 'Comidas', 0),
(751, 'Papas Fritas', 100, 'Comidas', 0),
(752, 'Papas Fritas', 100, 'Comidas', 0),
(753, 'Papas Fritas', 100, 'Comidas', 0),
(754, 'Papas Fritas', 100, 'Comidas', 0),
(755, 'Papas Fritas', 100, 'Comidas', 0),
(756, 'Papas Fritas', 100, 'Comidas', 0),
(757, 'Papas Fritas', 100, 'Comidas', 0),
(758, 'Papas Fritas', 100, 'Comidas', 0),
(759, 'Papas Fritas', 100, 'Comidas', 0),
(760, 'Papas Fritas', 100, 'Comidas', 0),
(761, 'Papas Fritas', 100, 'Comidas', 0),
(762, 'Papas Fritas', 100, 'Comidas', 0),
(763, 'Papas Fritas', 100, 'Comidas', 0),
(764, 'Papas Fritas', 100, 'Comidas', 0),
(765, 'Papas Fritas', 100, 'Comidas', 0),
(766, 'Papas Fritas', 100, 'Comidas', 0),
(767, 'Papas Fritas', 100, 'Comidas', 0),
(768, 'Papas Fritas', 100, 'Comidas', 0),
(769, 'Papas Fritas', 100, 'Comidas', 0),
(770, 'Papas Fritas', 100, 'Comidas', 0),
(771, 'Papas Fritas', 100, 'Comidas', 0),
(772, 'Papas Fritas', 100, 'Comidas', 0),
(773, 'Papas Fritas', 100, 'Comidas', 0),
(774, 'Papas Fritas', 100, 'Comidas', 0),
(775, 'Papas Fritas', 100, 'Comidas', 0),
(776, 'Papas Fritas', 100, 'Comidas', 0),
(777, 'Papas Fritas', 100, 'Comidas', 0),
(778, 'Papas Fritas', 100, 'Comidas', 0),
(779, 'Papas Fritas', 100, 'Comidas', 0),
(780, 'Papas Fritas', 100, 'Comidas', 0),
(781, 'Papas Fritas', 100, 'Comidas', 0),
(782, 'Papas Fritas', 100, 'Comidas', 0),
(783, 'Papas Fritas', 100, 'Comidas', 0),
(784, 'Papas Fritas', 100, 'Comidas', 0),
(785, 'Papas Fritas', 100, 'Comidas', 0),
(786, 'Papas Fritas', 100, 'Comidas', 0),
(787, 'Papas Fritas', 100, 'Comidas', 0),
(788, 'Papas Fritas', 100, 'Comidas', 0),
(789, 'Papas Fritas', 100, 'Comidas', 0),
(790, 'Papas Fritas', 100, 'Comidas', 0),
(791, 'Papas Fritas', 100, 'Comidas', 0),
(792, 'Papas Fritas', 100, 'Comidas', 0),
(793, 'Papas Fritas', 100, 'Comidas', 0),
(794, 'Papas Fritas', 100, 'Comidas', 0),
(795, 'Papas Fritas', 100, 'Comidas', 0),
(796, 'Papas Fritas', 100, 'Comidas', 0),
(797, 'Papas Fritas', 100, 'Comidas', 0),
(798, 'Papas Fritas', 100, 'Comidas', 0),
(799, 'Papas Fritas', 100, 'Comidas', 0),
(800, 'Papas Fritas', 100, 'Comidas', 0),
(801, 'Papas Fritas', 100, 'Comidas', 0),
(802, 'Papas Fritas', 100, 'Comidas', 0),
(803, 'Papas Fritas', 100, 'Comidas', 0),
(804, 'Papas Fritas', 100, 'Comidas', 0),
(805, 'Papas Fritas', 100, 'Comidas', 0),
(806, 'Papas Fritas', 100, 'Comidas', 0),
(807, 'Papas Fritas', 100, 'Comidas', 0),
(808, 'Papas Fritas', 100, 'Comidas', 0),
(809, 'Papas Fritas', 100, 'Comidas', 0),
(810, 'Papas Fritas', 100, 'Comidas', 0),
(811, 'Papas Fritas', 100, 'Comidas', 0),
(812, 'Papas Fritas', 100, 'Comidas', 0),
(813, 'Papas Fritas', 100, 'Comidas', 0),
(814, 'Papas Fritas', 100, 'Comidas', 0),
(815, 'Papas Fritas', 100, 'Comidas', 0),
(816, 'Papas Fritas', 100, 'Comidas', 0),
(817, 'Papas Fritas', 100, 'Comidas', 0),
(818, 'Papas Fritas', 100, 'Comidas', 0),
(819, 'Papas Fritas', 100, 'Comidas', 0),
(820, 'Papas Fritas', 100, 'Comidas', 0),
(821, 'Papas Fritas', 100, 'Comidas', 0),
(822, 'Papas Fritas', 100, 'Comidas', 0),
(823, 'Papas Fritas', 100, 'Comidas', 0),
(824, 'Papas Fritas', 100, 'Comidas', 0),
(825, 'Papas Fritas', 100, 'Comidas', 0),
(826, 'Papas Fritas', 100, 'Comidas', 0),
(827, 'Papas Fritas', 100, 'Comidas', 0),
(828, 'Papas Fritas', 100, 'Comidas', 0),
(829, 'Papas Fritas', 100, 'Comidas', 0),
(830, 'Papas Fritas', 100, 'Comidas', 0),
(831, 'Papas Fritas', 100, 'Comidas', 0),
(832, 'Papas Fritas', 100, 'Comidas', 0),
(833, 'Papas Fritas', 100, 'Comidas', 0),
(834, 'Papas Fritas', 100, 'Comidas', 0),
(835, 'Papas Fritas', 100, 'Comidas', 0),
(836, 'Papas Fritas', 100, 'Comidas', 0),
(837, 'Papas Fritas', 100, 'Comidas', 0),
(838, 'Papas Fritas', 100, 'Comidas', 0),
(839, 'Papas Fritas', 100, 'Comidas', 0),
(840, 'Papas Fritas', 100, 'Comidas', 0),
(841, 'Papas Fritas', 100, 'Comidas', 0),
(842, 'Papas Fritas', 100, 'Comidas', 0),
(843, 'Papas Fritas', 100, 'Comidas', 0),
(844, 'Papas Fritas', 100, 'Comidas', 0),
(845, 'Papas Fritas', 100, 'Comidas', 0),
(846, 'Papas Fritas', 100, 'Comidas', 0),
(847, 'Papas Fritas', 100, 'Comidas', 0),
(848, 'Papas Fritas', 100, 'Comidas', 0),
(849, 'Papas Fritas', 100, 'Comidas', 0),
(850, 'Papas Fritas', 100, 'Comidas', 0),
(851, 'Papas Fritas', 100, 'Comidas', 0),
(852, 'Prueba del celu', 1500, 'Comidas', 12),
(853, 'Arroz integral', 99, 'Comidas', 100),
(854, 'Pasta Frola', 119, 'Postres', 12);

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
  `ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentarios` varchar(300) NOT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temporal`
--

INSERT INTO `temporal` (`id`, `nro_mesa`, `producto`, `id_producto`, `cantidad`, `precio`, `total`, `estado`, `ingreso`, `comentarios`, `descuento`) VALUES
(1, 1, 'Coca cola 500cc', 4, 1, 50, 50, 'Pendiente', '2018-12-10 18:36:03', '', NULL),
(2, 2, 'Pizza Napolitana con Ajo y perejil', 11, 1, 280, 280, 'Pendiente', '2018-12-18 19:20:34', '', NULL),
(3, 2, 'Coca cola 500cc', 4, 2, 50, 100, 'Pendiente', '2018-12-18 19:20:54', '', NULL),
(4, 1, 'Fanta 500cc', 10, 2, 50, 100, 'Pendiente', '2019-01-05 18:47:20', 'Con bastante hielo', NULL),
(5, 1, 'Pizza Napolitana con Ajo y perejil', 11, 2, 280, 560, 'Pendiente', '2019-01-05 19:46:08', '', NULL);

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
(3, 'Luis', 5, 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=855;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
