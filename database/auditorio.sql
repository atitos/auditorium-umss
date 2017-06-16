-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 20:40:07
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `auditorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `IDAMBIENTE` int(11) NOT NULL,
  `IDFACULTAD` int(11) DEFAULT NULL,
  `IDTIPOAMBIENTE` int(11) NOT NULL,
  `NOMBREAMBIENTE` varchar(100) NOT NULL,
  `DIRECCIONAMBIENTE` varchar(100) DEFAULT NULL,
  `IDUSUARIO` int(11) DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `IDCALENDARIO` int(11) NOT NULL,
  `IDFACULTAD` int(11) DEFAULT NULL,
  `FECHACALENDARIO` date NOT NULL,
  `DIACALENDARIO` varchar(30) NOT NULL,
  `SEMANACALENDARIO` int(11) NOT NULL,
  `ACTIVIDAD` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `IDFACULTAD` int(11) NOT NULL,
  `NOMBREFACULTAD` varchar(100) NOT NULL,
  `DIRECCIONFACULTAD` varchar(100) NOT NULL,
  `TELEFONOFACULTAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`IDFACULTAD`, `NOMBREFACULTAD`, `DIRECCIONFACULTAD`, `TELEFONOFACULTAD`) VALUES
(1000, 'FCYT', 'N', 445465);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `IDRESERVA` int(11) NOT NULL,
  `IDUSUARIO` int(11) DEFAULT NULL,
  `IDAMBIENTE` int(11) DEFAULT NULL,
  `TITULORESERVA` longtext NOT NULL,
  `DESCRIPCIONRESERVA` varchar(500) NOT NULL,
  `FECHAINICIO` date NOT NULL,
  `FECHAFIN` date NOT NULL,
  `HORAINICIO` time NOT NULL,
  `HORAFIN` time NOT NULL,
  `SOLICITANTE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IDROL` int(11) NOT NULL,
  `TIPOROL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IDROL`, `TIPOROL`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoambiente`
--

CREATE TABLE `tipoambiente` (
  `IDTIPOAMBIENTE` int(11) NOT NULL,
  `TIPOAMBIENTE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoambiente`
--

INSERT INTO `tipoambiente` (`IDTIPOAMBIENTE`, `TIPOAMBIENTE`) VALUES
(1, 'aula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `IDROL` int(11) DEFAULT NULL,
  `CIUSUARIO` int(11) NOT NULL,
  `NOMBREUSUARIO` varchar(100) NOT NULL,
  `PRIMERAPELLIDO` varchar(100) NOT NULL,
  `SEGUNDOAPELLIDO` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ESTADO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`IDAMBIENTE`),
  ADD KEY `FK_R_1` (`IDFACULTAD`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`IDCALENDARIO`),
  ADD KEY `FK_R_5` (`IDFACULTAD`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`IDFACULTAD`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IDRESERVA`),
  ADD KEY `FK_R_2` (`IDUSUARIO`),
  ADD KEY `FK_R_3` (`IDAMBIENTE`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IDROL`);

--
-- Indices de la tabla `tipoambiente`
--
ALTER TABLE `tipoambiente`
  ADD PRIMARY KEY (`IDTIPOAMBIENTE`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD KEY `FK_RELATIONSHIP_4` (`IDROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `IDAMBIENTE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `IDCALENDARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `IDFACULTAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IDRESERVA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IDROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipoambiente`
--
ALTER TABLE `tipoambiente`
  MODIFY `IDTIPOAMBIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente_ibfk_1` FOREIGN KEY (`IDFACULTAD`) REFERENCES `facultad` (`IDFACULTAD`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`IDAMBIENTE`) REFERENCES `ambiente` (`IDAMBIENTE`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IDROL`) REFERENCES `rol` (`IDROL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
