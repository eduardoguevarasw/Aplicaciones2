-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 15-07-2022 a las 05:59:01
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `cedula` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`cedula`, `nombre`, `apellido`, `password`) VALUES
('1234567890', 'Admin', 'Admin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `seats` int(11) DEFAULT '0',
  `pago` varchar(115) DEFAULT NULL,
  `bank` varchar(115) DEFAULT NULL,
  `comprobante` int(20) DEFAULT NULL,
  `foto` longblob,
  `valor` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`id`, `id_reserva`, `cedula`, `seats`, `pago`, `bank`, `comprobante`, `foto`, `valor`) VALUES
(149, 168, '0605511138', 2, 'Pendiente', 'Pichincha', 9343254, '', 7),
(150, 170, '2200395214', 4, 'Aprobado', 'Pacifico', 12, '', 33.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `placa` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bus`
--

INSERT INTO `bus` (`id`, `placa`, `numero`, `ruta`, `precio`, `hora`) VALUES
(1, 'ABC-005', '100', 'PUYO-MACAS', 2.5, '07:00:00'),
(3, 'AMB-234', '205', 'TENA-COCA', 3.5, '15:50:00'),
(4, 'AMB-200', '300', 'COCA-TENA', 8.3, '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombres`, `apellidos`, `telefono`, `password`) VALUES
('0605511138', 'Eduardo', 'Guevara', '0999999999', '12345'),
('2200395214', 'Pepe', 'Pablo', '0932874392', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `A1` int(11) DEFAULT '0',
  `A2` int(11) DEFAULT '0',
  `A3` int(11) DEFAULT '0',
  `A4` int(11) DEFAULT '0',
  `B1` int(11) DEFAULT '0',
  `B2` int(11) DEFAULT '0',
  `B3` int(11) DEFAULT '0',
  `B4` int(11) DEFAULT '0',
  `C1` int(11) DEFAULT '0',
  `C2` int(11) DEFAULT '0',
  `C3` int(11) DEFAULT '0',
  `C4` int(11) DEFAULT '0',
  `D1` int(11) DEFAULT '0',
  `D2` int(11) DEFAULT '0',
  `D3` int(11) DEFAULT '0',
  `D4` int(11) DEFAULT '0',
  `E1` int(11) DEFAULT '0',
  `E2` int(11) DEFAULT '0',
  `E3` int(11) DEFAULT '0',
  `E4` int(11) DEFAULT '0',
  `F1` int(11) DEFAULT '0',
  `F2` int(11) DEFAULT '0',
  `F3` int(11) DEFAULT '0',
  `F4` int(11) DEFAULT '0',
  `G1` int(11) DEFAULT '0',
  `G2` int(11) DEFAULT '0',
  `G3` int(11) DEFAULT '0',
  `G4` int(11) DEFAULT '0',
  `H1` int(11) DEFAULT '0',
  `H2` int(11) DEFAULT '0',
  `H3` int(11) DEFAULT '0',
  `H4` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `id_bus`, `fecha`, `A1`, `A2`, `A3`, `A4`, `B1`, `B2`, `B3`, `B4`, `C1`, `C2`, `C3`, `C4`, `D1`, `D2`, `D3`, `D4`, `E1`, `E2`, `E3`, `E4`, `F1`, `F2`, `F3`, `F4`, `G1`, `G2`, `G3`, `G4`, `H1`, `H2`, `H3`, `H4`) VALUES
(167, 1, '2022-07-14', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(168, 3, '2022-07-14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0),
(169, 3, '2022-07-14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0),
(170, 4, '2022-07-15', 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`) USING BTREE,
  ADD KEY `id_cliente` (`cedula`) USING BTREE;

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bus` (`id_bus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleto_ibfk_2` FOREIGN KEY (`cedula`) REFERENCES `cliente` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
