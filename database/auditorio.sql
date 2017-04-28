-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2017 a las 21:03:53
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `auditorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE IF NOT EXISTS `ambiente` (
  `IDAMBIENTE` int(11) NOT NULL,
  `IDFACULTAD` int(11) DEFAULT NULL,
  `TIPOAMBIENTE` varchar(100) NOT NULL,
  `NOMBREAMBIENTE` varchar(100) NOT NULL,
  `DIRECCIONAMBIENTE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`IDAMBIENTE`, `IDFACULTAD`, `TIPOAMBIENTE`, `NOMBREAMBIENTE`, `DIRECCIONAMBIENTE`) VALUES
(100, 1000, 'auditorio', 'Auditorio Magno ', 'lado Biblioteca del FCYT'),
(101, 1000, 'audiorio de  defensas de proyectos de grado', ' sala de defensas ', 'segundo piso edificio MEMI'),
(102, 1000, 'sala de examenes', 'auditorio del edificio nuevo', 'edificio nuevo fcyt tercer piso ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `IDCALENDARIO` int(11) NOT NULL,
  `IDFACULTAD` int(11) DEFAULT NULL,
  `FECHACALENDARIO` date NOT NULL,
  `DIACALENDARIO` varchar(30) NOT NULL,
  `SEMANACALENDARIO` int(11) NOT NULL,
  `ACTIVIDAD` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`IDCALENDARIO`, `IDFACULTAD`, `FECHACALENDARIO`, `DIACALENDARIO`, `SEMANACALENDARIO`, `ACTIVIDAD`) VALUES
(1000, 1000, '2017-02-17', 'viernes', 0, 'Venta de matr?culas 1-2017'),
(1001, 1000, '2017-02-18', 'sabado', 0, ''),
(1002, 1000, '2017-02-19', 'domingo', 0, ''),
(1003, 1000, '2017-02-20', 'lunes', 0, 'Venta de matr?culas 1-2017'),
(1004, 1000, '2017-02-21', 'martes', 0, 'Venta de matr?culas 1-2017 Examen Ingreso 2daOp'),
(1005, 1000, '2017-02-22', 'miercoles', 0, 'Venta de matr?culas 1-2017'),
(1006, 1000, '2017-02-23', 'jueves', 0, 'Examen Ingreso 3ra Op Venta de matr?culas'),
(1007, 1000, '2017-02-24', 'viernes', 0, 'Examen Ingreso 3ra Op Venta de matr?culas'),
(1008, 1000, '2017-02-25', 'sabado', 0, ''),
(1009, 1000, '2017-02-26', 'domingo', 0, ''),
(1010, 1000, '2017-02-27', 'lunes', 0, ''),
(1011, 1000, '2017-02-28', 'martes', 0, ''),
(1012, 1000, '2017-03-01', 'miercoles', 1, 'Inicio de Semestre 1-2017  - Matr?culas e Inscripciones Websis 1-2017'),
(1013, 1000, '2017-03-02', 'jueves', 0, 'Matr?culas e Inscripciones Websis 1-2017'),
(1014, 1000, '2017-03-03', 'viernes', 0, 'Matr?culas e Inscripciones Websis 1-2017 -  Examen de Ingreso 3ra Op'),
(1015, 1000, '2017-03-04', 'sabado', 0, ''),
(1016, 1000, '2017-03-05', 'domingo', 0, ''),
(1017, 1000, '2017-03-06', 'lunes', 0, 'Matr?culas e Inscripciones Websis 1-2017  - Inicio de Clases presenciales 1-2017'),
(1018, 1000, '2017-03-07', 'martes', 0, 'Matr?culas e Inscr. Manuales con Formulario de Registro - Migraci?n inscripciones semestre 1-2017'),
(1019, 1000, '2017-03-08', 'miercoles', 2, 'Inicio Defensas Proyectos de Grado 1-2017'),
(1020, 1000, '2017-03-09', 'jueves', 0, 'Matr?culas e Inscripciones Websis 1-2017'),
(1021, 1000, '2017-03-10', 'viernes', 0, 'Matr?culas e Inscripciones Websis 1-2017'),
(1022, 1000, '2017-03-11', 'sabado', 0, ''),
(1023, 1000, '2017-03-12', 'domingo', 0, ''),
(1024, 1000, '2017-03-13', 'lunes', 0, 'Migraci?n de datos Inscripciones 1-2017'),
(1025, 1000, '2017-03-14', 'martes', 0, ''),
(1026, 1000, '2017-03-15', 'miercoles', 3, 'Inicio Mesas de Examen 1? opci?n -  Entrega de Planillas de ME'),
(1027, 1000, '2017-03-16', 'jueves', 0, ''),
(1028, 1000, '2017-03-17', 'viernes', 0, 'Fin Mesas de Examen 1? opci?n '),
(1029, 1000, '2017-03-18', 'sabado', 0, ''),
(1030, 1000, '2017-03-19', 'domingo', 0, 'Ultimo d?a Entrega de Notas 1? Opci?n de Mesa'),
(1031, 1000, '2017-03-20', 'lunes', 0, ''),
(1032, 1000, '2017-03-21', 'martes', 0, 'Generaci?n de ofertas'),
(1033, 1000, '2017-03-22', 'miercoles', 4, 'Matr?culas e Inscripciones. - Adiciones para los que aprobaron 1ra. Opci?n Mesa de Examen'),
(1034, 1000, '2017-03-23', 'jueves', 0, 'Matr?culas e Inscripciones. - Adiciones para los que aprobaron 1ra. Opci?n Mesa de Examen - Matr?culas e Inscr. Manuales con Formulario de RegistroUltimo d?a modif. Notas 2-2016.'),
(1035, 1000, '2017-03-24', 'viernes', 0, ''),
(1036, 1000, '2017-03-25', 'sabado', 0, ''),
(1037, 1000, '2017-03-26', 'domingo', 0, ''),
(1038, 1000, '2017-03-27', 'lunes', 0, 'Migraci?n de inscripci?n'),
(1039, 1000, '2017-03-28', 'martes', 0, ''),
(1040, 1000, '2017-03-29', 'miercoles', 5, 'Entrega Informe Titulados por Excelencia 2-2016'),
(1041, 1000, '2017-03-30', 'jueves', 0, ''),
(1042, 1000, '2017-03-31', 'viernes', 0, ''),
(1043, 1000, '2017-04-01', 'sabado', 0, ''),
(1044, 1000, '2017-04-02', 'domingo', 0, ''),
(1045, 1000, '2017-04-03', 'lunes', 0, 'Inicio entrega de planillas electr?nicas'),
(1046, 1000, '2017-04-04', 'martes', 0, ''),
(1047, 1000, '2017-04-05', 'miercoles', 6, ''),
(1048, 1000, '2017-04-06', 'jueves', 0, ''),
(1049, 1000, '2017-04-07', 'viernes', 0, ''),
(1050, 1000, '2017-04-08', 'sabado', 0, ''),
(1051, 1000, '2017-04-09', 'domingo', 0, ''),
(1052, 1000, '2017-04-10', 'lunes', 0, ''),
(1053, 1000, '2017-04-11', 'martes', 0, ''),
(1054, 1000, '2017-04-12', 'miercoles', 7, ''),
(1055, 1000, '2017-04-13', 'jueves', 0, ''),
(1056, 1000, '2017-04-14', 'viernes', 0, 'Viernes Santo'),
(1057, 1000, '2017-04-15', 'sabado', 0, ''),
(1058, 1000, '2017-04-16', 'domingo', 0, ''),
(1059, 1000, '2017-04-17', 'lunes', 0, 'Inicio Primeros Parciales'),
(1060, 1000, '2017-04-18', 'martes', 0, ''),
(1061, 1000, '2017-04-19', 'miercoles', 8, ''),
(1062, 1000, '2017-04-20', 'jueves', 0, ''),
(1063, 1000, '2017-04-21', 'viernes', 0, ''),
(1064, 1000, '2017-04-22', 'sabado', 0, ''),
(1065, 1000, '2017-04-23', 'domingo', 0, ''),
(1066, 1000, '2017-04-24', 'lunes', 0, ''),
(1067, 1000, '2017-04-25', 'martes', 0, ''),
(1068, 1000, '2017-04-26', 'miercoles', 9, ''),
(1069, 1000, '2017-04-27', 'jueves', 0, ''),
(1070, 1000, '2017-04-28', 'viernes', 0, ''),
(1071, 1000, '2017-04-29', 'sabado', 0, 'Fin primeros parciales'),
(1072, 1000, '2017-04-30', 'domingo', 0, ''),
(1073, 1000, '2017-05-01', 'lunes', 0, ''),
(1074, 1000, '2017-05-02', 'martes', 0, ''),
(1075, 1000, '2017-05-03', 'miercoles', 10, ''),
(1076, 1000, '2017-05-04', 'jueves', 0, ''),
(1077, 1000, '2017-05-05', 'viernes', 0, ''),
(1078, 1000, '2017-05-06', 'sabado', 0, ''),
(1079, 1000, '2017-05-07', 'domingo', 0, ''),
(1080, 1000, '2017-05-08', 'lunes', 0, ''),
(1081, 1000, '2017-05-09', 'martes', 0, ''),
(1082, 1000, '2017-05-10', 'miercoles', 11, ''),
(1083, 1000, '2017-05-11', 'jueves', 0, ''),
(1084, 1000, '2017-05-12', 'viernes', 0, ''),
(1085, 1000, '2017-05-13', 'sabado', 0, ''),
(1086, 1000, '2017-05-14', 'domingo', 0, ''),
(1087, 1000, '2017-05-15', 'lunes', 0, ''),
(1088, 1000, '2017-05-16', 'martes', 0, ''),
(1089, 1000, '2017-05-17', 'miercoles', 12, ''),
(1090, 1000, '2017-05-18', 'jueves', 0, ''),
(1091, 1000, '2017-05-19', 'viernes', 0, ''),
(1092, 1000, '2017-05-20', 'sabado', 0, ''),
(1093, 1000, '2017-05-21', 'domingo', 0, ''),
(1094, 1000, '2017-05-22', 'lunes', 0, ''),
(1095, 1000, '2017-05-23', 'martes', 0, ''),
(1096, 1000, '2017-05-24', 'miercoles', 13, ''),
(1097, 1000, '2017-05-25', 'jueves', 0, ''),
(1098, 1000, '2017-05-26', 'viernes', 0, ''),
(1099, 1000, '2017-05-27', 'sabado', 0, ''),
(1100, 1000, '2017-05-28', 'domingo', 0, ''),
(1101, 1000, '2017-05-29', 'lunes', 0, ''),
(1102, 1000, '2017-05-30', 'martes', 0, ''),
(1103, 1000, '2017-05-31', 'miercoles', 14, ''),
(1104, 1000, '2017-06-01', 'jueves', 0, ''),
(1105, 1000, '2017-06-02', 'viernes', 0, ''),
(1106, 1000, '2017-06-03', 'sabado', 0, ''),
(1107, 1000, '2017-06-04', 'domingo', 0, ''),
(1108, 1000, '2017-06-05', 'lunes', 0, ''),
(1109, 1000, '2017-06-06', 'martes', 0, ''),
(1110, 1000, '2017-06-07', 'miercoles', 15, ''),
(1111, 1000, '2017-06-08', 'jueves', 0, 'Inicio segundos parciales'),
(1112, 1000, '2017-06-09', 'viernes', 0, ''),
(1113, 1000, '2017-06-10', 'sabado', 0, ''),
(1114, 1000, '2017-06-11', 'domingo', 0, ''),
(1115, 1000, '2017-06-12', 'lunes', 0, ''),
(1116, 1000, '2017-06-13', 'martes', 0, ''),
(1117, 1000, '2017-06-14', 'miercoles', 16, ''),
(1118, 1000, '2017-06-15', 'jueves', 0, ''),
(1119, 1000, '2017-06-16', 'viernes', 0, ''),
(1120, 1000, '2017-06-17', 'sabado', 0, ''),
(1121, 1000, '2017-06-18', 'domingo', 0, ''),
(1122, 1000, '2017-06-19', 'lunes', 0, ''),
(1123, 1000, '2017-06-20', 'martes', 0, 'Fin segundos parciales'),
(1124, 1000, '2017-06-21', 'miercoles', 17, 'Inicio ex?menes finales y ME 2da. Opci?n'),
(1125, 1000, '2017-06-22', 'jueves', 0, ''),
(1126, 1000, '2017-06-23', 'viernes', 0, ''),
(1127, 1000, '2017-06-24', 'sabado', 0, ''),
(1128, 1000, '2017-06-25', 'domingo', 0, ''),
(1129, 1000, '2017-06-26', 'lunes', 0, ''),
(1130, 1000, '2017-06-27', 'martes', 0, ''),
(1131, 1000, '2017-06-28', 'miercoles', 18, 'Inicio 2das Instancias'),
(1132, 1000, '2017-06-29', 'jueves', 0, ''),
(1133, 1000, '2017-06-30', 'viernes', 0, ''),
(1134, 1000, '2017-07-01', 'sabado', 0, ''),
(1135, 1000, '2017-07-02', 'domingo', 0, ''),
(1136, 1000, '2017-07-03', 'lunes', 0, ''),
(1137, 1000, '2017-07-04', 'martes', 0, 'Fin ex?menes finales y ME 2da. Opci?n'),
(1138, 1000, '2017-07-05', 'miercoles', 19, ''),
(1139, 1000, '2017-07-06', 'jueves', 0, ''),
(1140, 1000, '2017-07-07', 'viernes', 0, ''),
(1141, 1000, '2017-07-08', 'sabado', 0, ''),
(1142, 1000, '2017-07-09', 'domingo', 0, ''),
(1143, 1000, '2017-07-10', 'lunes', 0, ''),
(1144, 1000, '2017-07-11', 'martes', 0, 'Fin 2das Instancias - Ultimo plazo Entrega de notas 1-2017'),
(1145, 1000, '2017-07-12', 'miercoles', 20, 'Reimpresi?n de matr?culas - Generaci?n de ofertas para Curso Invierno 2017'),
(1146, 1000, '2017-07-13', 'jueves', 0, 'Reimpresi?n matr?culas e Inscripciones Verano 2017'),
(1147, 1000, '2017-07-14', 'viernes', 0, 'Reimpresi?n matr?culas e Inscripciones Verano 2017'),
(1148, 1000, '2017-07-15', 'sabado', 0, ''),
(1149, 1000, '2017-07-16', 'domingo', 0, ''),
(1150, 1000, '2017-07-17', 'lunes', 0, 'Inicio Curso de Invierno 2017 - Reimpresi?n matr?culas e Inscripciones Invierno 2017'),
(1151, 1000, '2017-07-18', 'martes', 0, ''),
(1152, 1000, '2017-07-19', 'miercoles', 21, ''),
(1153, 1000, '2017-07-20', 'jueves', 0, ''),
(1154, 1000, '2017-07-21', 'viernes', 0, ''),
(1155, 1000, '2017-07-22', 'sabado', 0, ''),
(1156, 1000, '2017-07-23', 'domingo', 0, ''),
(1157, 1000, '2017-07-24', 'lunes', 0, ''),
(1158, 1000, '2017-07-25', 'martes', 0, ''),
(1159, 1000, '2017-07-26', 'miercoles', 22, ''),
(1160, 1000, '2017-07-27', 'jueves', 0, ''),
(1161, 1000, '2017-07-28', 'viernes', 0, ''),
(1162, 1000, '2017-07-29', 'sabado', 0, ''),
(1163, 1000, '2017-07-30', 'domingo', 0, ''),
(1164, 1000, '2017-07-31', 'lunes', 0, ''),
(1165, 1000, '2017-08-01', 'martes', 0, ''),
(1166, 1000, '2017-08-02', 'miercoles', 23, ''),
(1167, 1000, '2017-08-03', 'jueves', 0, ''),
(1168, 1000, '2017-08-04', 'viernes', 0, ''),
(1169, 1000, '2017-08-05', 'sabado', 0, ''),
(1170, 1000, '2017-08-06', 'domingo', 0, ''),
(1171, 1000, '2017-08-07', 'lunes', 0, 'Fin de defensas de Tesis I 2017'),
(1172, 1000, '2017-08-08', 'martes', 0, 'Fin Curso de Invierno 2017'),
(1173, 1000, '2017-08-09', 'miercoles', 24, ''),
(1174, 1000, '2017-08-10', 'jueves', 0, ''),
(1175, 1000, '2017-08-11', 'viernes', 0, ''),
(1176, 1000, '2017-08-12', 'sabado', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
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

CREATE TABLE IF NOT EXISTS `reserva` (
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

CREATE TABLE IF NOT EXISTS `rol` (
  `IDROL` int(11) NOT NULL,
  `TIPOROL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IDROL`, `TIPOROL`) VALUES
(1, 'administrador'),
(2, 'secretaria'),
(3, 'docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `IDROL` int(11) DEFAULT NULL,
  `CIUSUARIO` int(11) NOT NULL,
  `NOMBREUSUARIO` varchar(100) NOT NULL,
  `PRIMERAPELLIDO` varchar(100) NOT NULL,
  `SEGUNDOAPELLIDO` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`IDAMBIENTE`), ADD KEY `FK_R_1` (`IDFACULTAD`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`IDCALENDARIO`), ADD KEY `FK_R_5` (`IDFACULTAD`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`IDFACULTAD`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IDRESERVA`), ADD KEY `FK_R_2` (`IDUSUARIO`), ADD KEY `FK_R_3` (`IDAMBIENTE`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IDROL`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSUARIO`), ADD KEY `FK_RELATIONSHIP_4` (`IDROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IDRESERVA` int(11) NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `FK_R_1` FOREIGN KEY (`IDFACULTAD`) REFERENCES `facultad` (`IDFACULTAD`);

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
ADD CONSTRAINT `FK_R_5` FOREIGN KEY (`IDFACULTAD`) REFERENCES `facultad` (`IDFACULTAD`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`IDROL`) REFERENCES `rol` (`IDROL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
