-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2017 a las 06:57:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `systems_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idAdmin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `ci` varchar(100) NOT NULL,
  `fechaNacimiento` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `pais` text NOT NULL,
  `estado` text NOT NULL,
  `ciudad` text NOT NULL,
  `dir` varchar(100) NOT NULL,
  `especialidad1` text NOT NULL,
  `especialidad2` text NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `email`, `pass`, `nombres`, `apellidos`, `ci`, `fechaNacimiento`, `telefono`, `celular`, `pais`, `estado`, `ciudad`, `dir`, `especialidad1`, `especialidad2`, `descripcion`, `estatus`) VALUES
(1, 'enriquemendoza_162@hotmail.com', '123', 'Enrique', 'mendoza', '18889833', '25-02-89', '04166066328', '04166066328', 'Venezuela', 'Vargas', 'La Guaira', 'Caraballeda', 'Desarrollo Web', 'Administracion de Redes ', 'Disenador de Productos', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `ticket` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `emision` varchar(100) NOT NULL,
  `vence` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `control` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `pais` text NOT NULL,
  `estado` text NOT NULL,
  `ciudad` text NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `medio` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `deposito` varchar(100) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `factura` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosadmins`
--

CREATE TABLE `pagosadmins` (
  `idPago` int(11) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `medio` varchar(100) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `estatus` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `titulo` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `pagos` varchar(100) NOT NULL,
  `vence` varchar(100) NOT NULL,
  `resumen` text NOT NULL,
  `inicio` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `area`, `cliente`, `titulo`, `monto`, `pagos`, `vence`, `resumen`, `inicio`, `estatus`) VALUES
(1, 'Dominios', '1', 'www.pedro.com', '100 BsF', 'Pago Unico', '01-01-01', 'desc', '6-5-16', 'Pagado'),
(2, 'Dominios', '1', 'www.systemsadms.com', '200 BsF', 'Pago Unico', '01-01-01', 'descip', '9-5-16', 'Activo'),
(3, 'Dominios', '1', 'www.managercode.com', '300 BsF', 'Pago Unico', '01-01-01', 'desc', '9-5-16', 'Por facturar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id` int(11) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `seguimiento` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones`
--

CREATE TABLE `sessiones` (
  `idSession` varchar(10) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sessiones`
--

INSERT INTO `sessiones` (`idSession`, `usuario`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `ticket` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` text NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `ra` varchar(100) NOT NULL,
  `rc` varchar(100) NOT NULL,
  `rs` int(11) NOT NULL,
  `seguimientos` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `rif` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `encargado` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `como` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombres`, `apellidos`, `rif`, `email`, `pass`, `telefono`, `celular`, `pais`, `estado`, `ciudad`, `dir`, `zipcode`, `encargado`, `cargo`, `como`, `fecha`, `estatus`) VALUES
(1, '2', 'Systems Admins C.A', 'No Aplica', 'j-29952662-2', 'systemsadms@hotmail.com', 'O02osxyy', '04166066328', 'Act', 'Venezuela', 'Vargas', 'La Guaira', 'Caraballeda', 'Act', 'Enrique', 'Gerente', 'Recomendation', '2017-08-16', 'confirmado'),
(2, '1', 'Enrique', 'Mendoza', 'No aplica', 'enriquemendoza_162@hotmail.com', 'Y19timow', '04166066328', 'Act', 'Venezuela', 'Vargas', 'La Guaira', 'Caraballeda', 'Act', 'No aplica', 'No aplica', 'Another Enterprise', '2017-08-16', 'noConfirmado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagosadmins`
--
ALTER TABLE `pagosadmins`
  ADD PRIMARY KEY (`idPago`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagosadmins`
--
ALTER TABLE `pagosadmins`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
