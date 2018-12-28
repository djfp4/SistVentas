-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-12-2018 a las 02:45:52
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemaventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ci_nit` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecRegistro` date DEFAULT NULL,
  `estado` varchar(13) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idUsua` varchar(35) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idCli`),
  KEY `idUsua` (`idUsua`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCli`, `nombre`, `apellido`, `ci_nit`, `fecRegistro`, `estado`, `idUsua`) VALUES
(1, 'Ximena', 'Marquez', '9165485', '2018-10-25', 'habilitado', 'admin'),
(2, 'Carlos', 'Cortez', '9165958', '2018-10-25', 'habilitado', 'admin'),
(3, 'Dylan', 'Fuentes', '777', '2018-10-26', 'habilitado', 'admin'),
(4, 'Ana', 'Lopez', '999', '2018-10-27', 'habilitado', 'admin'),
(5, 'Maria', 'Quiroz', '123', '2018-10-29', 'habilitado', '666'),
(6, 'Jaime', 'Osorio', '91652', '2018-11-17', 'habilitado', 'jperez'),
(7, 'John', 'Zenteno', '666', '2018-12-03', 'habilitado', 'admin'),
(8, 'Pedro', 'Sarabia', '7845465', '2018-12-13', 'habilitado', 'asoliz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_prod`
--

CREATE TABLE IF NOT EXISTS `det_prod` (
  `id_det` int(11) NOT NULL AUTO_INCREMENT,
  `idProd` int(11) DEFAULT NULL,
  `nomProductor` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `det_cant` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  PRIMARY KEY (`id_det`),
  KEY `idProd` (`idProd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `det_prod`
--

INSERT INTO `det_prod` (`id_det`, `idProd`, `nomProductor`, `det_cant`, `fec_reg`) VALUES
(1, 1, 'Monica Gutierrez', 10, '2018-12-02'),
(2, 1, 'Laura Espinoza', 15, '2018-12-02'),
(3, 1, 'Ximena Sanchez', 10, '2018-12-03'),
(4, 1, 'Andrea Sanchez', 15, '2018-12-03'),
(5, 2, 'Laura Espinoza', 10, '2018-12-03'),
(6, 3, 'Tania Arancibia', 15, '2018-12-03'),
(7, 4, 'Maria Quiroz', 15, '2018-12-03'),
(8, 1, 'Juan Perez', 10, '2018-12-13'),
(9, 5, 'Monica Gutierrez', 10, '2018-12-13'),
(10, 5, 'Juan Perez', 5, '2018-12-13'),
(11, 6, 'Laura Espinoza', 10, '2018-12-13'),
(12, 6, 'Juan Perez', 10, '2018-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `nomProd` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precioProd` float DEFAULT NULL,
  `precioVent` float NOT NULL,
  `cant` int(11) DEFAULT NULL,
  `estado` varchar(13) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProd`, `nomProd`, `precioProd`, `precioVent`, `cant`, `estado`) VALUES
(1, 'Chips pequeÃ±os de piÃ±a', 2.5, 5.5, 55, 'habilitado'),
(2, 'Mermelada de mora', 25, 35, 6, 'habilitado'),
(3, 'Mermelada de frutilla y mora', 25, 35.5, 14, 'habilitado'),
(4, 'Chips grandes de manzana', 6, 12, 15, 'habilitado'),
(5, 'Queque de platano', 20, 30, 13, 'habilitado'),
(6, 'TÃ© de manzana', 5, 8, 20, 'inhabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE IF NOT EXISTS `transaccion` (
  `idTrans` int(11) NOT NULL AUTO_INCREMENT,
  `idUsua` varchar(13) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idCli` int(11) DEFAULT NULL,
  `idProd` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `fecTrans` date DEFAULT NULL,
  `estado` varchar(13) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idTrans`),
  KEY `idUsua` (`idUsua`),
  KEY `idCli` (`idCli`),
  KEY `idProd` (`idProd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`idTrans`, `idUsua`, `idCli`, `idProd`, `cant`, `fecTrans`, `estado`) VALUES
(1, 'admin', 2, 1, 2, '2018-12-02', 'inhabilitado'),
(2, 'admin', 1, 2, 2, '2018-12-03', 'habilitado'),
(3, 'admin', 7, 3, 1, '2018-12-03', 'habilitado'),
(4, 'jperez', 4, 1, 2, '2018-12-04', 'habilitado'),
(5, 'jperez', 4, 4, 1, '2018-12-04', 'inhabilitado'),
(6, 'admin', 1, 1, 1, '2018-12-10', 'habilitado'),
(7, 'admin', 1, 1, 1, '2018-12-10', 'inhabilitado'),
(8, 'admin', 6, 2, 1, '2018-12-10', 'habilitado'),
(9, '666', 6, 3, 1, '2018-12-12', 'inhabilitado'),
(10, 'vsoliz', 4, 5, 2, '2018-12-13', 'inhabilitado'),
(11, 'vsoliz', 4, 2, 1, '2018-12-13', 'inhabilitado'),
(13, 'vsoliz', 1, 5, 2, '2018-12-13', 'inhabilitado'),
(14, 'asoliz', 8, 5, 2, '2018-12-13', 'habilitado'),
(15, 'asoliz', 8, 2, 1, '2018-12-13', 'habilitado'),
(16, 'admin', 6, 1, 2, '2018-12-21', 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsua` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `ci` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecReg` date NOT NULL,
  `estado` varchar(13) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idUsua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsua`, `clave`, `nombre`, `apellido`, `fechanac`, `ci`, `cargo`, `direccion`, `fecReg`, `estado`) VALUES
('123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Juan', 'Perez', '2018-11-17', '123', 'Vendedor', 'Obrajes', '2018-11-01', 'habilitado'),
('666', 'cd3f0c85b158c08a2b113464991810cf2cdfc387', 'Reynaldo', 'Zeballos', '2018-10-26', '666', 'Vendedor', 'Obrajes', '2018-11-01', 'habilitado'),
('777', 'f4bd9ee7085ac3c486538276e2349b65b71284d8', 'Jose', 'Mamani', '2018-11-17', '777', 'Vendedor', 'Miraflores', '2018-11-01', 'inhabilitado'),
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Dylan', 'Fuentes', '1999-01-04', '9165959', 'Administrador', 'San Pedro', '2018-11-01', 'habilitado'),
('asoliz', 'da10570d5145d66790f36f03be0a3b15f24473ba', 'Armando', 'Soliz', '1980-11-10', '84561545', 'Vendedor', 'San Pedro', '2018-12-13', 'habilitado'),
('bohan', 'e1676a69f8a03cdedb568593f70cdf8522f04046', 'James', 'Bohan', '1992-10-04', '8456152', 'Vendedor', 'Miraflores', '2018-11-01', 'inhabilitado'),
('fesca', 'f75791e12ee8ddadc34ba6cbc5c4d0ca6d267aac', 'Franco', 'Escamilla', '1980-10-01', '4567852', 'Vendedor', 'Obrajes', '2018-12-21', 'habilitado'),
('jperez', '6b7dda7d75a67c9f83c985275fbe3468949514d7', 'Juan', 'Perez', '1995-02-23', '8596245', 'Vendedor', 'Miraflores', '2018-11-01', 'inhabilitado'),
('jrod', 'd758071ffb7f78220da62a338420e104b7cd4419', 'Jimena', 'Rodriguez', '1978-10-15', '7859845', 'Vendedor', 'Llojeta', '2018-12-03', 'inhabilitado'),
('plobo', '1a57bf2a1009927df9158274aa0c792121b9b034', 'Paola', 'Bedoya', '1975-10-02', '12345678', 'Vendedor', 'Sopocahi', '2018-11-01', 'habilitado'),
('samm', '240ef38779e53b8693b1fbf6d64b8947cc8c0175', 'Samanta', 'Marquez', '1983-02-17', '7156545', 'Vendedor', 'San Pedro', '2018-12-09', 'inhabilitado'),
('vsoliz', 'f049f05066636a1ad5b25ac48cbf5de348b9150c', 'Valeria', 'Soliz', '1980-10-11', '7845152', 'Vendedor', 'San Pedro', '2018-12-13', 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaxprod`
--

CREATE TABLE IF NOT EXISTS `ventaxprod` (
  `idVent` int(11) NOT NULL AUTO_INCREMENT,
  `idUsua` varchar(13) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idCli` int(11) DEFAULT NULL,
  `idProd` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `fecTrans` date DEFAULT NULL,
  `estado` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idVent`),
  KEY `idUsua` (`idUsua`),
  KEY `idCli` (`idCli`),
  KEY `idProd` (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idUsua`) REFERENCES `usuario` (`idUsua`);

--
-- Filtros para la tabla `det_prod`
--
ALTER TABLE `det_prod`
  ADD CONSTRAINT `det_prod_ibfk_1` FOREIGN KEY (`idProd`) REFERENCES `producto` (`idProd`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`idUsua`) REFERENCES `usuario` (`idUsua`),
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`idCli`) REFERENCES `cliente` (`idCli`),
  ADD CONSTRAINT `transaccion_ibfk_3` FOREIGN KEY (`idProd`) REFERENCES `producto` (`idProd`);

--
-- Filtros para la tabla `ventaxprod`
--
ALTER TABLE `ventaxprod`
  ADD CONSTRAINT `ventaxprod_ibfk_1` FOREIGN KEY (`idUsua`) REFERENCES `usuario` (`idUsua`),
  ADD CONSTRAINT `ventaxprod_ibfk_2` FOREIGN KEY (`idCli`) REFERENCES `cliente` (`idCli`),
  ADD CONSTRAINT `ventaxprod_ibfk_3` FOREIGN KEY (`idProd`) REFERENCES `producto` (`idProd`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
