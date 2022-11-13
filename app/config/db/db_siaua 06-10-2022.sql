-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2022 a las 08:24:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_siaua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id_estado_civil` int(11) NOT NULL,
  `estado_civil` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id_estado_civil`, `estado_civil`) VALUES
(1, 'Saltero(a)'),
(2, 'Casado(a)'),
(3, 'Viudo(a)'),
(4, 'Divorciado(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id_gasto` int(11) NOT NULL,
  `gasto_monto` decimal(10,0) NOT NULL,
  `gasto_fecha` date NOT NULL,
  `gasto_info` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `gasto_nota_img` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_persona_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id_gasto`, `gasto_monto`, `gasto_fecha`, `gasto_info`, `gasto_nota_img`, `id_persona_acceso`) VALUES
(1, '520', '2022-08-13', 'Energia Electrica', 'nota1.jpg', 1),
(2, '220', '2022-08-13', 'Mantenimiento', 'nota2.jpg', 1),
(3, '820', '2022-08-13', 'Secretaria', 'nota3.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto_detalle`
--

CREATE TABLE `gasto_detalle` (
  `id_gasto_detalle` int(11) NOT NULL,
  `gasto_detalle_producto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `gasto_detalle_precio_uni` double NOT NULL,
  `gasto_detalle_cantidad` int(11) NOT NULL,
  `gasto_detalle_descuento` double NOT NULL,
  `gasto_detalle_status` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_gasto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `gasto_detalle`
--

INSERT INTO `gasto_detalle` (`id_gasto_detalle`, `gasto_detalle_producto`, `gasto_detalle_precio_uni`, `gasto_detalle_cantidad`, `gasto_detalle_descuento`, `gasto_detalle_status`, `id_gasto`) VALUES
(1, 'Pago mensual de energia electrica', 520, 1, 0, 'PAGADO', 1),
(2, 'Pago por mantenimiento de pozo de agua', 220, 1, 0, 'PAGADO', 2),
(3, 'Pago servicios de secreatria', 820, 1, 0, 'PAGADO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manzana`
--

CREATE TABLE `manzana` (
  `id_manzana` int(11) NOT NULL,
  `manzana_nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `manzana_desc` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `manzana`
--

INSERT INTO `manzana` (`id_manzana`, `manzana_nombre`, `manzana_desc`) VALUES
(1, 'Los Fresnos', '1'),
(2, 'La Playa', '2'),
(3, 'La Palma', '3'),
(4, 'La Frontera', '4'),
(5, 'Centro', '5'),
(6, 'Barrio Alto', '6'),
(7, 'Fraccionamiento', '7'),
(8, '3 de Mayo', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id_mes` int(11) NOT NULL,
  `mes_nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`id_mes`, `mes_nombre`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes_pago`
--

CREATE TABLE `mes_pago` (
  `id_mes_pago` int(11) NOT NULL,
  `id_mes` int(11) NOT NULL,
  `id_pago_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_servicio`
--

CREATE TABLE `pago_servicio` (
  `id_pago_servicio` int(11) NOT NULL,
  `pago_servicio_fecha` date NOT NULL,
  `pago_servicio_codigo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL,
  `periodo_info` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `periodo_inicia` date NOT NULL,
  `periodo_termina` date NOT NULL,
  `periodo_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `periodo_info`, `periodo_inicia`, `periodo_termina`, `periodo_status`) VALUES
(1, 'Periodo 2019', '2019-08-26', '2020-08-26', 0),
(2, 'Periodo 2020', '2020-01-01', '2021-01-01', 0),
(3, 'Periodo 2021', '2021-01-01', '2022-02-12', 0),
(4, 'Periodo 2022', '2022-08-10', '2023-08-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `persona_nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `persona_ape_pat` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `persona_ape_mat` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `persona_status` tinyint(4) NOT NULL,
  `id_estado_civil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `persona_nombre`, `persona_ape_pat`, `persona_ape_mat`, `persona_status`, `id_estado_civil`) VALUES
(1, 'Usuario', 'Test', 'ENT!', 1, 2),
(2, 'Gladis', 'Falcón', 'Amado', 1, 1),
(3, 'Eva', 'Jimenez', 'Acevedo', 1, 3),
(4, 'Saul', 'Alvarez', 'Aguilar', 1, 4),
(5, 'Maria de Jesus', 'Gonzalez', 'HHsa', 1, 1),
(6, 'Alberta', 'Estrada', 'Castillo', 1, 3),
(7, 'Emilio', 'Hernández', 'Gonzaléz', 1, 4),
(8, 'Santiago', 'Flores', 'Falcón', 1, 2),
(9, 'Jose', 'Garcia', 'Luna', 1, 1),
(10, 'Doroteo', 'Angeles', 'Perez', 1, 2),
(11, 'Ejemplo', 'Uso', 'Trigger', 1, 1),
(12, 'Otro', 'Ejemplo', 'Triggers', 1, 3),
(13, 'Wendy', 'Flores', 'Falcón', 1, 3),
(14, 'Karen', 'Falcon', 'Amador', 1, 3),
(15, 'Sara', 'Falcon', 'Amado', 1, 1),
(16, 'Luis Daniel', 'Falcón', 'Amador', 1, 3),
(17, 'Axel', 'Falcon', 'Amador', 1, 1),
(18, 'omar', 'Joose', 'Reyes', 1, 4),
(19, 'Santiago', 'Flores', 'Falcon', 1, 4),
(20, 'Maria', 'Silva', 'De alegria', 1, 1),
(21, 'Alma', 'Melo', 'Rico', 1, 2),
(22, 'Mateo', 'Flores', 'Amador', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_acceso`
--

CREATE TABLE `persona_acceso` (
  `id_persona_acceso` int(11) NOT NULL,
  `acceso_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `acceso_pass` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `acceso_status` tinyint(4) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_tipo_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona_acceso`
--

INSERT INTO `persona_acceso` (`id_persona_acceso`, `acceso_usuario`, `acceso_pass`, `acceso_status`, `id_persona`, `id_tipo_acceso`) VALUES
(1, 'hhector', 'hhector', 1, 1, 3),
(2, 'fgladis', 'fgladis', 1, 2, 1),
(3, 'ealberta', 'ealberta', 1, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `servicio_folio` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `servicio_info` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `servicio_fecha_alta` date NOT NULL,
  `servicio_fecha_baja` date DEFAULT NULL,
  `servicio_status` tinyint(4) NOT NULL,
  `servicio_direc_actual` tinyint(4) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `servicio_folio`, `servicio_info`, `servicio_fecha_alta`, `servicio_fecha_baja`, `servicio_status`, `servicio_direc_actual`, `id_persona`) VALUES
(1, '1234', 'LOCAL', '2022-09-24', NULL, 1, 1, 1),
(2, '1235', 'CASA', '2022-09-24', NULL, 1, 1, 2),
(3, '1236', 'DEPTO1', '2022-09-24', NULL, 1, 1, 3),
(4, '1237', 'LOCAL', '2022-09-24', NULL, 1, 1, 4),
(5, '1238', 'CASA1', '2022-09-24', NULL, 1, 1, 5),
(6, '1239', 'ESC PRIMARIA', '2022-09-24', NULL, 1, 1, 6),
(7, '1240', 'ESC SECUNDARIA', '2022-09-24', NULL, 1, 1, 7),
(8, '1241', 'BIBLIOTECA', '2022-09-24', NULL, 1, 1, 8),
(9, '1242', 'AUTO LAVADO', '2022-09-24', NULL, 1, 1, 9),
(10, '1243', 'LOACAL2', '2022-09-24', NULL, 1, 1, 10),
(11, '1244', 'CASA3', '2022-10-04', NULL, 1, 0, 1),
(12, '1245', 'IGLESISA', '2022-10-06', NULL, 1, 0, 11),
(13, '1246', 'PLAZA', '2022-10-06', NULL, 1, 0, 12),
(14, '1247', 'CASA3', '2022-10-22', NULL, 1, 0, 13),
(15, '1248', 'CASA', '2022-10-22', NULL, 1, 0, 14),
(16, '1249', 'LOCAL', '2022-10-23', NULL, 1, 1, 14),
(17, '1250', 'PIBLICA', '2022-10-23', NULL, 1, 1, 15),
(18, '1251', 'ESTABLO', '2022-10-23', NULL, 1, 1, 16),
(19, '1252', 'PANTEON', '2022-10-23', NULL, 1, 1, 17),
(21, '1253', 'AUTO LAVADO', '2022-10-23', NULL, 1, 1, 18),
(22, '1254', 'BAÑOS', '2022-10-23', NULL, 1, 1, 19),
(23, '1255', 'LOTE1', '2022-10-23', NULL, 1, 1, 20),
(24, '1256', 'ANIMALES', '2022-10-24', NULL, 1, 1, 21),
(25, '1257', 'DEPTO2', '2022-10-29', NULL, 1, 1, 22),
(27, '1258', 'LOCAL2', '0000-00-00', NULL, 1, 0, 1),
(28, '1259', 'CASA2', '0000-00-00', NULL, 1, 0, 2),
(29, '1260', 'LOCAL', '2022-11-01', NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_direccion`
--

CREATE TABLE `servicio_direccion` (
  `id_servicio_direccion` int(11) NOT NULL,
  `direccion_tipo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion_calle` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion_numero` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_manzana` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicio_direccion`
--

INSERT INTO `servicio_direccion` (`id_servicio_direccion`, `direccion_tipo`, `direccion_calle`, `direccion_numero`, `id_manzana`, `id_servicio`) VALUES
(1, 'Avenida', 'Reforma', 'S/N', 1, 1),
(2, 'Avenida', 'Tula', 'S/N', 2, 2),
(3, 'Calle', 'Melchor Ocampo', 'S/N', 3, 3),
(4, 'Calle', 'Moderna', 'S/N', 4, 4),
(5, 'Avenida', 'Insurgentes', 'S/N', 5, 5),
(6, 'Avenida', 'Del trabajo', '10', 6, 6),
(7, 'Avenida', 'Reforma', 'S/N', 7, 7),
(8, 'Avenida', 'Reforma', 'S/N', 8, 8),
(9, 'Avenida', 'Reforma', 'S/N', 1, 9),
(10, 'Avenida', 'Reforma', 'S/N', 2, 10),
(11, 'Calle', 'Benito Juarez', 'S/ N', 5, 11),
(12, 'Avenida', 'San Gabriel', '25', 1, 23),
(13, 'Calle', 'Benito Juarez', '15', 1, 24),
(14, 'Cerrada', 'Allende', 'S/N', 2, 25),
(15, 'Avenida', 'Hidalgo', 'S/N', 7, 27),
(16, 'Avenida', 'Insurgentes', '5', 5, 28),
(18, 'Calle', 'Francisco I. Madero', 'S/N', 7, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acceso`
--

CREATE TABLE `tipo_acceso` (
  `id_tipo_acceso` int(11) NOT NULL,
  `tipo_acceso_nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_acceso`
--

INSERT INTO `tipo_acceso` (`id_tipo_acceso`, `tipo_acceso_nombre`) VALUES
(1, 'Comite'),
(2, 'Secretario'),
(3, 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `persona_acceso_gasto_fk` (`id_persona_acceso`);

--
-- Indices de la tabla `gasto_detalle`
--
ALTER TABLE `gasto_detalle`
  ADD PRIMARY KEY (`id_gasto_detalle`),
  ADD KEY `gasto_gasto_detalle_fk` (`id_gasto`);

--
-- Indices de la tabla `manzana`
--
ALTER TABLE `manzana`
  ADD PRIMARY KEY (`id_manzana`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `mes_pago`
--
ALTER TABLE `mes_pago`
  ADD PRIMARY KEY (`id_mes_pago`),
  ADD KEY `mes_mes_pago_fk` (`id_mes`),
  ADD KEY `pago_servicio_mes_pago_fk` (`id_pago_servicio`);

--
-- Indices de la tabla `pago_servicio`
--
ALTER TABLE `pago_servicio`
  ADD PRIMARY KEY (`id_pago_servicio`),
  ADD KEY `periodo_pago_servicio_fk` (`id_periodo`),
  ADD KEY `servicio_pago_servicio_fk` (`id_servicio`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `estado_civil_persona_fk` (`id_estado_civil`);

--
-- Indices de la tabla `persona_acceso`
--
ALTER TABLE `persona_acceso`
  ADD PRIMARY KEY (`id_persona_acceso`),
  ADD KEY `tipo_acceso_persona_acceso_fk` (`id_tipo_acceso`),
  ADD KEY `persona_persona_acceso_fk` (`id_persona`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `persona_servicio_fk` (`id_persona`);

--
-- Indices de la tabla `servicio_direccion`
--
ALTER TABLE `servicio_direccion`
  ADD PRIMARY KEY (`id_servicio_direccion`),
  ADD KEY `servicio_servicio_direccion_fk` (`id_servicio`),
  ADD KEY `manzana_servicio_direccion_fk` (`id_manzana`);

--
-- Indices de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  ADD PRIMARY KEY (`id_tipo_acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gasto_detalle`
--
ALTER TABLE `gasto_detalle`
  MODIFY `id_gasto_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `manzana`
--
ALTER TABLE `manzana`
  MODIFY `id_manzana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `mes_pago`
--
ALTER TABLE `mes_pago`
  MODIFY `id_mes_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago_servicio`
--
ALTER TABLE `pago_servicio`
  MODIFY `id_pago_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `persona_acceso`
--
ALTER TABLE `persona_acceso`
  MODIFY `id_persona_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `servicio_direccion`
--
ALTER TABLE `servicio_direccion`
  MODIFY `id_servicio_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  MODIFY `id_tipo_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD CONSTRAINT `persona_acceso_gasto_fk` FOREIGN KEY (`id_persona_acceso`) REFERENCES `persona_acceso` (`id_persona_acceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gasto_detalle`
--
ALTER TABLE `gasto_detalle`
  ADD CONSTRAINT `gasto_gasto_detalle_fk` FOREIGN KEY (`id_gasto`) REFERENCES `gasto` (`id_gasto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mes_pago`
--
ALTER TABLE `mes_pago`
  ADD CONSTRAINT `mes_mes_pago_fk` FOREIGN KEY (`id_mes`) REFERENCES `mes` (`id_mes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pago_servicio_mes_pago_fk` FOREIGN KEY (`id_pago_servicio`) REFERENCES `pago_servicio` (`id_pago_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago_servicio`
--
ALTER TABLE `pago_servicio`
  ADD CONSTRAINT `periodo_pago_servicio_fk` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `servicio_pago_servicio_fk` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `estado_civil_persona_fk` FOREIGN KEY (`id_estado_civil`) REFERENCES `estado_civil` (`id_estado_civil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_acceso`
--
ALTER TABLE `persona_acceso`
  ADD CONSTRAINT `persona_persona_acceso_fk` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_acceso_persona_acceso_fk` FOREIGN KEY (`id_tipo_acceso`) REFERENCES `tipo_acceso` (`id_tipo_acceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `persona_servicio_fk` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio_direccion`
--
ALTER TABLE `servicio_direccion`
  ADD CONSTRAINT `manzana_servicio_direccion_fk` FOREIGN KEY (`id_manzana`) REFERENCES `manzana` (`id_manzana`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `servicio_servicio_direccion_fk` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
