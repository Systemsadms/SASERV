-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2016 a las 12:16:26
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `systems_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
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
  `estatus` text NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `email`, `pass`, `nombres`, `apellidos`, `ci`, `fechaNacimiento`, `telefono`, `celular`, `pais`, `estado`, `ciudad`, `dir`, `especialidad1`, `especialidad2`, `descripcion`, `estatus`) VALUES
(1, 'r@r.com', '123', 'Ray', 'Saracual', '18754401', '01-01-01', '0414', '0414', 'Venezuela', 'vargas', 'la guaira', 'caraballeda', 'Soporte', 'Redes', 'desarrolla tambien', 'Activo'),
(2, 'a@a.com', '123', 'Alexer', 'Alfonso', '18754401', '01-01-01', '0414', '0414', 'Venezuela', 'vargas', 'la guaira', 'caraballeda', 'Soporte', 'Diseno Grafico', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `emision` varchar(100) NOT NULL,
  `vence` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `control` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`idFactura`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `tipo`, `idTipo`, `cliente`, `emision`, `vence`, `monto`, `control`, `estatus`) VALUES
(1, 'Proyecto', 1, '1', '6-5-16', '01-01-01', '500 BsF', '00001', 'Pagada'),
(2, 'Servicio', 2, '3', '9-5-16', '01-01-01', '500 BsF', '00001', 'Pagada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `medio` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `deposito` varchar(100) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `factura` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `cliente`, `idCliente`, `medio`, `fecha`, `deposito`, `banco`, `monto`, `factura`, `estatus`, `comentario`) VALUES
(1, 'Pedro Mendoza', 1, 'Deposito', '01-01-01', '01212021', 'Banesco', '500 BsF', '1', 'Confirmado', 'comentario'),
(2, 'Enrique Mendoza', 3, 'Deposito', '01-01-01', '01212021', 'PayPal', '500 BsF', '2', 'Confirmado', 'come');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosadmins`
--

CREATE TABLE IF NOT EXISTS `pagosadmins` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `medio` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `estatus` text NOT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `pagosadmins`
--

INSERT INTO `pagosadmins` (`idPago`, `admin`, `ticket`, `fecha`, `banco`, `medio`, `monto`, `comentario`, `estatus`) VALUES
(1, 'Ray Saracual', '1', 'fecha', 'Banesco', 'Deposito', '800BsF', 'descripcion', 'Pagado'),
(2, 'Ray Saracual', '1', '01-01-01', 'Banesco', 'Deposito', '900BsF', 'sin fecha', 'Pagado'),
(3, 'Ray Saracual', '2', '9-5-16', 'Banesco', 'Deposito', '450BsF', 'des', 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `titulo` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `pagos` varchar(100) NOT NULL,
  `vence` varchar(100) NOT NULL,
  `resumen` text NOT NULL,
  `inicio` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `area`, `cliente`, `titulo`, `monto`, `pagos`, `vence`, `resumen`, `inicio`, `estatus`) VALUES
(1, 'Dominios', '1', 'www.pedro.com', '500 BsF', 'Pago Unico', '01-01-01', 'desc', '6-5-16', 'Pagado'),
(2, 'Dominios', '1', 'www.systemsadms.com', '1200 BsF', 'Pago Unico', '01-01-01', 'descip', '9-5-16', 'Activo'),
(3, 'Dominios', '3', 'www.pedro.com', '500 BsF', 'Pago Unico', '01-01-01', 'desc', '9-5-16', 'Por facturar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE IF NOT EXISTS `seguimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `seguimiento` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`id`, `ticket`, `cliente`, `contenido`, `seguimiento`, `admin`, `fecha`, `hora`) VALUES
(1, '2', '3', '<b>ADMIN:</b> Seguimiendo admin', '1', 'Ray Saracual', '9-5-16', '21:21:23'),
(2, '2', '3', '<b>ADMIN:</b> Segumiento 2 admin\r\n', '2', 'Ray Saracual', '9-5-16', '21:21:10'),
(3, '2', '3', '<b>CLIENTE:</b> Seguimiento clien', '3', 'Cliente', '9-5-16', '21:21:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones`
--

CREATE TABLE IF NOT EXISTS `sessiones` (
  `idSession` varchar(10) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `sessiones`
--

INSERT INTO `sessiones` (`idSession`, `usuario`) VALUES
('1', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket` int(11) NOT NULL AUTO_INCREMENT,
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
  `admin` varchar(100) NOT NULL,
  PRIMARY KEY (`ticket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`ticket`, `cliente`, `hora`, `fecha`, `area`, `asunto`, `mensaje`, `estatus`, `ra`, `rc`, `rs`, `seguimientos`, `admin`) VALUES
(1, '1', '22:22:51', '7-5-16', 'Notificacion', 'Test Pgo', 'Contenido', 'Abierto', '1', '0', 0, '0', 'Ray Saracual'),
(2, '3', '21:21:39', '9-5-16', 'Camaras (CCTV)', 'Titulo Caramas', 'Descripcion dle serivicio', 'Abierto', '0', '0', 0, '3', 'Ray Saracual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `estatus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombres`, `apellidos`, `rif`, `email`, `pass`, `telefono`, `celular`, `pais`, `estado`, `ciudad`, `dir`, `zipcode`, `encargado`, `cargo`, `como`, `fecha`, `estatus`) VALUES
(1, '1', 'Pedro', 'Mendoza', 'No aplica', 'p@p.com', '123', '04265364995', '04265364995', 'Venezuela', 'vargas', 'la guaira', 'caraballeda', '1165', 'No aplica', 'No aplica', 'Amigos', '2016-05-03', 'confirmado'),
(2, '2', 'Platzi', '(empresa)', 'j251-512', 'pl@pl.com', '123', '0212352', '021254689', 'Venezuela', 'vargas', 'la guaira', 'caraballeda', '4577', 'Freddy', 'Vega', 'Internet', '2016-05-03', 'confirmado'),
(3, '1', 'Enrique', 'Mendoza', 'No aplica', 'e@e.com', '123', '024', '041', 'Venezuela', 'vargaas', 'la guaira', 'caraballeda', '1165', 'No aplica', 'No aplica', 'Amigos', '2016-05-10', 'confirmado');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
