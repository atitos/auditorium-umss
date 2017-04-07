-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2017 a las 06:44:58
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `auditorium`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE IF NOT EXISTS `ambiente` (
  `ID_AMBIENTE` varchar(100) NOT NULL,
  `ID_RESERVA` varchar(100) DEFAULT NULL,
  `ID_FACULTAD` varchar(100) DEFAULT NULL,
  `TIPO_AMBIENTE` varchar(50) NOT NULL,
  `NOMBRE_AMBIENTE` varchar(50) NOT NULL,
  `DIRECCION_AMBIENTE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`ID_AMBIENTE`, `ID_RESERVA`, `ID_FACULTAD`, `TIPO_AMBIENTE`, `NOMBRE_AMBIENTE`, `DIRECCION_AMBIENTE`) VALUES
('100', NULL, NULL, 'auditorio', 'Auditorio Magno ', 'lado Biblioteca del FCYT'),
('101', NULL, NULL, 'audiorio de  defensas de proyectos de grado', ' sala de defensas ', 'segundo piso edificio MEMI'),
('102', NULL, NULL, 'sala de examenes', 'auditorio del edificio nuevo', 'edificio nuevo fcyt tercer piso ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `ID_CLENDARIO` varchar(50) NOT NULL,
  `FECHA` date NOT NULL,
  `DIA` varchar(20) NOT NULL,
  `SEMANA` int(11) NOT NULL,
  `ACTIVIDAD` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`ID_CLENDARIO`, `FECHA`, `DIA`, `SEMANA`, `ACTIVIDAD`) VALUES
('1000', '2017-02-17', 'viernes', 0, 'Venta de matriculas 1-2017'),
('1001', '2017-02-18', 'sabado', 0, ''),
('1002', '2017-02-19', 'domingo', 0, ''),
('1003', '2017-02-20', 'lunes', 0, 'Venta de matriculas 1-2017'),
('1004', '2017-02-21', 'martes', 0, 'Venta de matriculas 1-2017 Examen Ingreso 2daOp'),
('1005', '2017-02-22', 'miercoles', 0, 'Venta de matriculas 1-2017'),
('1006', '2017-02-23', 'jueves', 0, 'Examen Ingreso 3ra Op Venta de matriculas'),
('1007', '2017-02-24', 'viernes', 0, 'Examen Ingreso 3ra Op Venta de matriculas'),
('1008', '2017-02-25', 'sabado', 0, ''),
('1009', '2017-02-26', 'domingo', 0, ''),
('1010', '2017-02-27', 'lunes', 0, ''),
('1011', '2017-02-28', 'martes', 0, ''),
('1012', '2017-03-01', 'miercoles', 1, 'Inicio de Semestre 1-2017  - Matriculas e Inscripciones Websis 1-2017'),
('1013', '2017-03-02', 'jueves', 0, 'Matriculas e Inscripciones Websis 1-2017'),
('1014', '2017-03-03', 'viernes', 0, 'Matriculas e Inscripciones Websis 1-2017 -  Examen de Ingreso 3ra Op'),
('1015', '2017-03-04', 'sabado', 0, ''),
('1016', '2017-03-05', 'domingo', 0, ''),
('1017', '2017-03-06', 'lunes', 0, 'Matriculas e Inscripciones Websis 1-2017  - Inicio de Clases presenciales 1-2017'),
('1018', '2017-03-07', 'martes', 0, 'Matriculas e Inscr. Manuales con Formulario de Registro - Migraci?n inscripciones semestre 1-2017'),
('1019', '2017-03-08', 'miercoles', 2, 'Inicio Defensas Proyectos de Grado 1-2017'),
('1020', '2017-03-09', 'jueves', 0, 'Matriculas e Inscripciones Websis 1-2017'),
('1021', '2017-03-10', 'viernes', 0, 'Matriculas e Inscripciones Websis 1-2017'),
('1022', '2017-03-11', 'sabado', 0, ''),
('1023', '2017-03-12', 'domingo', 0, ''),
('1024', '2017-03-13', 'lunes', 0, 'Migracion de datos Inscripciones 1-2017'),
('1025', '2017-03-14', 'martes', 0, ''),
('1026', '2017-03-15', 'miercoles', 3, 'Inicio Mesas de Examen 1? opci?n -  Entrega de Planillas de ME'),
('1027', '2017-03-16', 'jueves', 0, ''),
('1028', '2017-03-17', 'viernes', 0, 'Fin Mesas de Examen 1? opci?n '),
('1029', '2017-03-18', 'sabado', 0, ''),
('1030', '2017-03-19', 'domingo', 0, 'Ultimo d?a Entrega de Notas 1? Opci?n de Mesa'),
('1031', '2017-03-20', 'lunes', 0, ''),
('1032', '2017-03-21', 'martes', 0, 'Generaci?n de ofertas'),
('1033', '2017-03-22', 'miercoles', 4, 'Matr?culas e Inscripciones. - Adiciones para los que aprobaron 1ra. Opci?n Mesa de Examen'),
('1034', '2017-03-23', 'jueves', 0, 'Matr?culas e Inscripciones. - Adiciones para los que aprobaron 1ra. Opci?n Mesa de Examen - Matr?culas e Inscr. Manuales con Formulario de RegistroUltimo d?a modif. Notas 2-2016.'),
('1035', '2017-03-24', 'viernes', 0, ''),
('1036', '2017-03-25', 'sabado', 0, ''),
('1037', '2017-03-26', 'domingo', 0, ''),
('1038', '2017-03-27', 'lunes', 0, 'Migraci?n de inscripci?n'),
('1039', '2017-03-28', 'martes', 0, ''),
('1040', '2017-03-29', 'miercoles', 5, 'Entrega Informe Titulados por Excelencia 2-2016'),
('1041', '2017-03-30', 'jueves', 0, ''),
('1042', '2017-03-31', 'viernes', 0, ''),
('1043', '2017-04-01', 'sabado', 0, ''),
('1044', '2017-04-02', 'domingo', 0, ''),
('1045', '2017-04-03', 'lunes', 0, 'Inicio entrega de planillas electr?nicas'),
('1046', '2017-04-04', 'martes', 0, ''),
('1047', '2017-04-05', 'miercoles', 6, ''),
('1048', '2017-04-06', 'jueves', 0, ''),
('1049', '2017-04-07', 'viernes', 0, ''),
('1050', '2017-04-08', 'sabado', 0, ''),
('1051', '2017-04-09', 'domingo', 0, ''),
('1052', '2017-04-10', 'lunes', 0, ''),
('1053', '2017-04-11', 'martes', 0, ''),
('1054', '2017-04-12', 'miercoles', 7, ''),
('1055', '2017-04-13', 'jueves', 0, ''),
('1056', '2017-04-14', 'viernes', 0, 'Viernes Santo'),
('1057', '2017-04-15', 'sabado', 0, ''),
('1058', '2017-04-16', 'domingo', 0, ''),
('1059', '2017-04-17', 'lunes', 0, 'Inicio Primeros Parciales'),
('1060', '2017-04-18', 'martes', 0, ''),
('1061', '2017-04-19', 'miercoles', 8, ''),
('1062', '2017-04-20', 'jueves', 0, ''),
('1063', '2017-04-21', 'viernes', 0, ''),
('1064', '2017-04-22', 'sabado', 0, ''),
('1065', '2017-04-23', 'domingo', 0, ''),
('1066', '2017-04-24', 'lunes', 0, ''),
('1067', '2017-04-25', 'martes', 0, ''),
('1068', '2017-04-26', 'miercoles', 9, ''),
('1069', '2017-04-27', 'jueves', 0, ''),
('1070', '2017-04-28', 'viernes', 0, ''),
('1071', '2017-04-29', 'sabado', 0, 'Fin primeros parciales'),
('1072', '2017-04-30', 'domingo', 0, ''),
('1073', '2017-05-01', 'lunes', 0, ''),
('1074', '2017-05-02', 'martes', 0, ''),
('1075', '2017-05-03', 'miercoles', 10, ''),
('1076', '2017-05-04', 'jueves', 0, ''),
('1077', '2017-05-05', 'viernes', 0, ''),
('1078', '2017-05-06', 'sabado', 0, ''),
('1079', '2017-05-07', 'domingo', 0, ''),
('1080', '2017-05-08', 'lunes', 0, ''),
('1081', '2017-05-09', 'martes', 0, ''),
('1082', '2017-05-10', 'miercoles', 11, ''),
('1083', '2017-05-11', 'jueves', 0, ''),
('1084', '2017-05-12', 'viernes', 0, ''),
('1085', '2017-05-13', 'sabado', 0, ''),
('1086', '2017-05-14', 'domingo', 0, ''),
('1087', '2017-05-15', 'lunes', 0, ''),
('1088', '2017-05-16', 'martes', 0, ''),
('1089', '2017-05-17', 'miercoles', 12, ''),
('1090', '2017-05-18', 'jueves', 0, ''),
('1091', '2017-05-19', 'viernes', 0, ''),
('1092', '2017-05-20', 'sabado', 0, ''),
('1093', '2017-05-21', 'domingo', 0, ''),
('1094', '2017-05-22', 'lunes', 0, ''),
('1095', '2017-05-23', 'martes', 0, ''),
('1096', '2017-05-24', 'miercoles', 13, ''),
('1097', '2017-05-25', 'jueves', 0, ''),
('1098', '2017-05-26', 'viernes', 0, ''),
('1099', '2017-05-27', 'sabado', 0, ''),
('1100', '2017-05-28', 'domingo', 0, ''),
('1101', '2017-05-29', 'lunes', 0, ''),
('1102', '2017-05-30', 'martes', 0, ''),
('1103', '2017-05-31', 'miercoles', 14, ''),
('1104', '2017-06-01', 'jueves', 0, ''),
('1105', '2017-06-02', 'viernes', 0, ''),
('1106', '2017-06-03', 'sabado', 0, ''),
('1107', '2017-06-04', 'domingo', 0, ''),
('1108', '2017-06-05', 'lunes', 0, ''),
('1109', '2017-06-06', 'martes', 0, ''),
('1110', '2017-06-07', 'miercoles', 15, ''),
('1111', '2017-06-08', 'jueves', 0, 'Inicio segundos parciales'),
('1112', '2017-06-09', 'viernes', 0, ''),
('1113', '2017-06-10', 'sabado', 0, ''),
('1114', '2017-06-11', 'domingo', 0, ''),
('1115', '2017-06-12', 'lunes', 0, ''),
('1116', '2017-06-13', 'martes', 0, ''),
('1117', '2017-06-14', 'miercoles', 16, ''),
('1118', '2017-06-15', 'jueves', 0, ''),
('1119', '2017-06-16', 'viernes', 0, ''),
('1120', '2017-06-17', 'sabado', 0, ''),
('1121', '2017-06-18', 'domingo', 0, ''),
('1122', '2017-06-19', 'lunes', 0, ''),
('1123', '2017-06-20', 'martes', 0, 'Fin segundos parciales'),
('1124', '2017-06-21', 'miercoles', 17, 'Inicio ex?menes finales y ME 2da. Opci?n'),
('1125', '2017-06-22', 'jueves', 0, ''),
('1126', '2017-06-23', 'viernes', 0, ''),
('1127', '2017-06-24', 'sabado', 0, ''),
('1128', '2017-06-25', 'domingo', 0, ''),
('1129', '2017-06-26', 'lunes', 0, ''),
('1130', '2017-06-27', 'martes', 0, ''),
('1131', '2017-06-28', 'miercoles', 18, 'Inicio 2das Instancias'),
('1132', '2017-06-29', 'jueves', 0, ''),
('1133', '2017-06-30', 'viernes', 0, ''),
('1134', '2017-07-01', 'sabado', 0, ''),
('1135', '2017-07-02', 'domingo', 0, ''),
('1136', '2017-07-03', 'lunes', 0, ''),
('1137', '2017-07-04', 'martes', 0, 'Fin ex?menes finales y ME 2da. Opci?n'),
('1138', '2017-07-05', 'miercoles', 19, ''),
('1139', '2017-07-06', 'jueves', 0, ''),
('1140', '2017-07-07', 'viernes', 0, ''),
('1141', '2017-07-08', 'sabado', 0, ''),
('1142', '2017-07-09', 'domingo', 0, ''),
('1143', '2017-07-10', 'lunes', 0, ''),
('1144', '2017-07-11', 'martes', 0, 'Fin 2das Instancias - Ultimo plazo Entrega de notas 1-2017'),
('1145', '2017-07-12', 'miercoles', 20, 'Reimpresi?n de matr?culas - Generaci?n de ofertas para Curso Invierno 2017'),
('1146', '2017-07-13', 'jueves', 0, 'Reimpresi?n matr?culas e Inscripciones Verano 2017'),
('1147', '2017-07-14', 'viernes', 0, 'Reimpresi?n matr?culas e Inscripciones Verano 2017'),
('1148', '2017-07-15', 'sabado', 0, ''),
('1149', '2017-07-16', 'domingo', 0, ''),
('1150', '2017-07-17', 'lunes', 0, 'Inicio Curso de Invierno 2017 - Reimpresi?n matr?culas e Inscripciones Invierno 2017'),
('1151', '2017-07-18', 'martes', 0, ''),
('1152', '2017-07-19', 'miercoles', 21, ''),
('1153', '2017-07-20', 'jueves', 0, ''),
('1154', '2017-07-21', 'viernes', 0, ''),
('1155', '2017-07-22', 'sabado', 0, ''),
('1156', '2017-07-23', 'domingo', 0, ''),
('1157', '2017-07-24', 'lunes', 0, ''),
('1158', '2017-07-25', 'martes', 0, ''),
('1159', '2017-07-26', 'miercoles', 22, ''),
('1160', '2017-07-27', 'jueves', 0, ''),
('1161', '2017-07-28', 'viernes', 0, ''),
('1162', '2017-07-29', 'sabado', 0, ''),
('1163', '2017-07-30', 'domingo', 0, ''),
('1164', '2017-07-31', 'lunes', 0, ''),
('1165', '2017-08-01', 'martes', 0, ''),
('1166', '2017-08-02', 'miercoles', 23, ''),
('1167', '2017-08-03', 'jueves', 0, ''),
('1168', '2017-08-04', 'viernes', 0, ''),
('1169', '2017-08-05', 'sabado', 0, ''),
('1170', '2017-08-06', 'domingo', 0, ''),
('1171', '2017-08-07', 'lunes', 0, 'Fin de defensas de Tesis I 2017'),
('1172', '2017-08-08', 'martes', 0, 'Fin Curso de Invierno 2017'),
('1173', '2017-08-09', 'miercoles', 24, ''),
('1174', '2017-08-10', 'jueves', 0, ''),
('1175', '2017-08-11', 'viernes', 0, ''),
('1176', '2017-08-12', 'sabado', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `ID_FACULTAD` varchar(100) NOT NULL,
  `NOBRE_FAC` varchar(50) NOT NULL,
  `DIRECION_FAC` varchar(100) NOT NULL,
  `TELEFONO_FAC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`ID_FACULTAD`, `NOBRE_FAC`, `DIRECION_FAC`, `TELEFONO_FAC`) VALUES
('10000', 'tecnologia', 'Calle Sucre y parque la Torre,Sucre, Jordan, Cochabamba, Bolivia', 44231765);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `ID_RESERVA` varchar(100) NOT NULL,
  `TIPO_RESERVA` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_FIN` time NOT NULL,
  `SOLICITANTE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` char(10) NOT NULL,
  `TIPO_ROL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `TIPO_ROL`) VALUES
('01', 'administrador'),
('02', 'secretaria'),
('03', 'docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` varchar(50) NOT NULL,
  `ID_RESERVA` varchar(100) DEFAULT NULL,
  `ID_ROL` char(10) DEFAULT NULL,
  `NOMBRE_USUARIO` varchar(100) NOT NULL,
  `PRIMER_APELLIDO` varchar(100) NOT NULL,
  `SEGUNDO_APELLIDO` varchar(100) NOT NULL,
  `CI` int(11) NOT NULL,
  `CONTRASENA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`ID_AMBIENTE`), ADD KEY `FK_R_2` (`ID_RESERVA`), ADD KEY `FK_R_3` (`ID_FACULTAD`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`ID_CLENDARIO`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`ID_FACULTAD`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID_RESERVA`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`), ADD KEY `FK_REALIZAR` (`ID_RESERVA`), ADD KEY `FK_R_4` (`ID_ROL`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
ADD CONSTRAINT `FK_R_2` FOREIGN KEY (`ID_RESERVA`) REFERENCES `reserva` (`ID_RESERVA`),
ADD CONSTRAINT `FK_R_3` FOREIGN KEY (`ID_FACULTAD`) REFERENCES `facultad` (`ID_FACULTAD`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `FK_REALIZAR` FOREIGN KEY (`ID_RESERVA`) REFERENCES `reserva` (`ID_RESERVA`),
ADD CONSTRAINT `FK_R_4` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
