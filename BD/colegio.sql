/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : colegio

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-07-08 22:40:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumnos
-- ----------------------------
DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visita_detalle_id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `convenio` int(11) NOT NULL DEFAULT '0' COMMENT '0: No | 1: Si',
  `año` year(4) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `a_visita_detalle_id` (`visita_detalle_id`),
  CONSTRAINT `a_visita_detalle_id` FOREIGN KEY (`visita_detalle_id`) REFERENCES `visitas_detalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alumnos
-- ----------------------------
INSERT INTO `alumnos` VALUES ('1', '10', '2', '0', '2016', '0', '2016-06-27 08:59:05', '2016-06-29 08:33:52', '1', '1');
INSERT INTO `alumnos` VALUES ('2', '10', '6', '1', '2016', '1', '2016-06-28 17:17:50', '2016-06-29 08:54:49', '1', '1');
INSERT INTO `alumnos` VALUES ('3', '10', '7', '0', '2016', '1', '2016-06-28 17:40:48', '2016-06-28 17:40:48', '1', null);
INSERT INTO `alumnos` VALUES ('4', '9', '2', '0', '2016', '1', '2016-06-29 08:22:30', '2016-06-29 08:22:30', '1', null);
INSERT INTO `alumnos` VALUES ('5', '9', '7', '0', '2016', '0', '2016-06-29 08:27:12', '2016-06-29 08:33:22', '1', '1');
INSERT INTO `alumnos` VALUES ('6', '9', '6', '0', '2016', '1', '2016-06-29 08:33:05', '2016-06-29 08:33:05', '1', null);
INSERT INTO `alumnos` VALUES ('7', '10', '2', '0', '2016', '0', '2016-06-29 08:35:39', '2016-06-29 08:51:31', '1', '1');
INSERT INTO `alumnos` VALUES ('8', '10', '8', '0', '2016', '1', '2016-06-29 08:36:55', '2016-06-29 08:36:55', '1', null);
INSERT INTO `alumnos` VALUES ('9', '10', '2', '1', '2016', '1', '2016-06-29 08:54:33', '2016-06-29 08:54:45', '1', '1');
INSERT INTO `alumnos` VALUES ('10', '10', '9', '0', '2016', '1', '2016-06-29 17:33:47', '2016-06-29 17:33:47', '1', null);

-- ----------------------------
-- Table structure for alumnos_detalle
-- ----------------------------
DROP TABLE IF EXISTS `alumnos_detalle`;
CREATE TABLE `alumnos_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `ode_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `monto` decimal(11,2) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_alumno_id` (`alumno_id`),
  KEY `ad_ode_id` (`ode_id`),
  KEY `ad_carrera_id` (`carrera_id`),
  CONSTRAINT `ad_alumno_id` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ad_carrera_id` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ad_ode_id` FOREIGN KEY (`ode_id`) REFERENCES `odes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alumnos_detalle
-- ----------------------------
INSERT INTO `alumnos_detalle` VALUES ('1', '9', '3', '3', '250.50', '1', '1', null, '2016-06-29 10:37:12', '2016-06-29 10:37:12');
INSERT INTO `alumnos_detalle` VALUES ('2', '9', '1', '1', '350.50', '0', '1', '1', '2016-06-29 10:38:59', '2016-06-29 10:45:47');
INSERT INTO `alumnos_detalle` VALUES ('3', '9', '1', '3', '250.00', '1', '1', null, '2016-06-29 10:45:22', '2016-06-29 10:45:22');
INSERT INTO `alumnos_detalle` VALUES ('4', '9', '1', '1', '123.00', '1', '1', null, '2016-06-29 17:32:32', '2016-06-29 17:32:32');

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES ('1', 'Administrador', '1', null, '2016-05-26 14:18:41', '1', '1');
INSERT INTO `cargos` VALUES ('2', 'Usuario', '1', '2016-05-26 14:18:22', '2016-05-26 14:18:22', '1', null);
INSERT INTO `cargos` VALUES ('3', 'Alumnos', '1', '2016-06-14 16:34:11', '2016-06-14 16:34:11', '1', null);
INSERT INTO `cargos` VALUES ('4', 'Trabajador', '1', '2016-06-14 16:34:37', '2016-06-14 16:34:37', '1', null);
INSERT INTO `cargos` VALUES ('5', 'Contactos', '1', null, null, null, null);

-- ----------------------------
-- Table structure for cargo_opcion
-- ----------------------------
DROP TABLE IF EXISTS `cargo_opcion`;
CREATE TABLE `cargo_opcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) NOT NULL,
  `opcion_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `co_cargo_id_idx` (`cargo_id`) USING BTREE,
  KEY `co_opcion_id_idx` (`opcion_id`) USING BTREE,
  CONSTRAINT `cargo_opcion_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cargo_opcion_ibfk_2` FOREIGN KEY (`opcion_id`) REFERENCES `opciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargo_opcion
-- ----------------------------
INSERT INTO `cargo_opcion` VALUES ('1', '1', '1', '1', '2016-05-26 12:44:12', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('2', '1', '2', '1', '2016-05-26 12:44:12', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('3', '1', '3', '1', '2016-05-26 12:44:12', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('4', '1', '4', '1', '2016-05-26 12:44:12', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('5', '2', '1', '1', null, null, null, null);
INSERT INTO `cargo_opcion` VALUES ('6', '2', '4', '1', null, null, null, null);
INSERT INTO `cargo_opcion` VALUES ('7', '2', '2', '1', null, null, null, null);
INSERT INTO `cargo_opcion` VALUES ('8', '2', '3', '1', null, null, null, null);
INSERT INTO `cargo_opcion` VALUES ('9', '1', '5', '1', null, null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('10', '1', '6', '1', null, null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('11', '1', '7', '1', null, null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('12', '1', '8', '1', null, null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('13', '1', '9', '1', null, null, '1', null);
INSERT INTO `cargo_opcion` VALUES ('16', '1', '11', '1', null, null, null, null);

-- ----------------------------
-- Table structure for cargo_persona
-- ----------------------------
DROP TABLE IF EXISTS `cargo_persona`;
CREATE TABLE `cargo_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_cargo_persona_ibfk_1` (`cargo_id`) USING BTREE,
  KEY `persona_cargo_persona_ibfk_2` (`persona_id`) USING BTREE,
  CONSTRAINT `cargo_persona_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cargo_persona_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargo_persona
-- ----------------------------
INSERT INTO `cargo_persona` VALUES ('1', '1', '2016-05-26', null, '1', '1', '2016-05-26 12:44:12', '2016-05-26 17:24:40', '1', '1');
INSERT INTO `cargo_persona` VALUES ('2', '2', null, null, '1', '0', '2016-05-26 17:20:58', '2016-05-26 17:21:14', '1', '1');
INSERT INTO `cargo_persona` VALUES ('3', '3', null, null, '2', '1', '2016-05-26 17:26:18', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('4', '4', null, null, '3', '1', '2016-06-16 22:43:23', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('5', '5', null, null, '4', '1', '2016-06-16 22:45:20', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('6', '5', null, null, '5', '1', '2016-06-16 22:45:20', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('7', '3', null, null, '6', '1', '2016-06-28 17:17:50', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('8', '3', null, null, '7', '1', '2016-06-28 17:40:47', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('9', '3', null, null, '8', '1', '2016-06-29 08:36:55', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('10', '3', null, null, '9', '1', '2016-06-29 17:33:47', null, '1', null);
INSERT INTO `cargo_persona` VALUES ('11', '4', null, null, '12', '1', '2016-07-05 11:33:49', null, '1', null);

-- ----------------------------
-- Table structure for carreras
-- ----------------------------
DROP TABLE IF EXISTS `carreras`;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera_tipo_id` int(11) NOT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ca_carrera_tipo_id` (`carrera_tipo_id`),
  CONSTRAINT `ca_carrera_tipo_id` FOREIGN KEY (`carrera_tipo_id`) REFERENCES `carreras_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of carreras
-- ----------------------------
INSERT INTO `carreras` VALUES ('1', '3', 'Ingenieria de Sistemas', '1', '2016-06-04 00:13:00', '2016-06-04 00:13:32', null, null);
INSERT INTO `carreras` VALUES ('2', '3', 'Contabilidad y Finanzas', '1', '2016-06-04 00:14:03', '2016-06-04 00:14:03', null, null);
INSERT INTO `carreras` VALUES ('3', '2', 'Contabilidad y Finanzas', '1', '2016-06-04 00:14:19', '2016-06-04 00:14:19', null, null);

-- ----------------------------
-- Table structure for carreras_tipo
-- ----------------------------
DROP TABLE IF EXISTS `carreras_tipo`;
CREATE TABLE `carreras_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of carreras_tipo
-- ----------------------------
INSERT INTO `carreras_tipo` VALUES ('1', '1 Año', '1', '2016-05-30 00:37:51', null, '1', null);
INSERT INTO `carreras_tipo` VALUES ('2', '3 Años', '1', '2016-05-30 00:37:51', null, '1', null);
INSERT INTO `carreras_tipo` VALUES ('3', '5 Años', '1', '2016-05-30 00:37:51', null, '1', null);

-- ----------------------------
-- Table structure for colegios
-- ----------------------------
DROP TABLE IF EXISTS `colegios`;
CREATE TABLE `colegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distrito_id` int(11) NOT NULL,
  `ode_id` int(11) NOT NULL,
  `colegio_tipo_id` int(11) NOT NULL,
  `colegio_nivel_id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `referencia` varchar(250) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL COMMENT 'Persona a Cargo',
  `ugel` int(10) unsigned DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL COMMENT 'M: Masculino | F: Femenino | X: Mixto',
  `turno` varchar(2) DEFAULT NULL COMMENT 'M: Mañana | T: Tarde | MT: Mañana y Tarde',
  `email` varchar(30) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `co_distrito_id` (`distrito_id`),
  KEY `co_ode_id` (`ode_id`),
  KEY `co_colegio_tipo_id` (`colegio_tipo_id`),
  KEY `co_colegio_nivel_id` (`colegio_nivel_id`),
  KEY `co_persona_id` (`persona_id`),
  CONSTRAINT `co_colegio_nivel_id` FOREIGN KEY (`colegio_nivel_id`) REFERENCES `colegios_niveles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `co_colegio_tipo_id` FOREIGN KEY (`colegio_tipo_id`) REFERENCES `colegios_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `co_distrito_id` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `co_ode_id` FOREIGN KEY (`ode_id`) REFERENCES `odes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `co_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colegios
-- ----------------------------
INSERT INTO `colegios` VALUES ('3', '1243', '1', '1', '5', 'Abrahan Zea Carreón', 'jr perez de tudela 151', 'Morales duares a 2 cuadras de dueñas', '555555', '99999999', null, '0', null, 'T', null, '1', '2016-05-27 16:05:18', '2016-06-13 20:56:25', '1', null);
INSERT INTO `colegios` VALUES ('4', '1257', '2', '1', '5', 'Porras', 'miraflores', 'parque ovalo de miraflores', '4532', '9876', '1', '1', 'X', 'MT', null, '1', '2016-06-04 01:56:00', '2016-06-13 20:55:44', null, null);

-- ----------------------------
-- Table structure for colegios_detalle
-- ----------------------------
DROP TABLE IF EXISTS `colegios_detalle`;
CREATE TABLE `colegios_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colegio_id` int(11) NOT NULL,
  `grado` int(11) DEFAULT NULL,
  `seccion` varchar(5) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL COMMENT '1: Inicial | 2: Primaria | 3:Secundaria',
  `turno` char(1) DEFAULT NULL COMMENT 'M: Mañana | T: Tarde | N: Noche',
  `total_alumnos` int(10) unsigned DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cd_colegio_id` (`colegio_id`),
  CONSTRAINT `cd_colegio_id` FOREIGN KEY (`colegio_id`) REFERENCES `colegios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colegios_detalle
-- ----------------------------
INSERT INTO `colegios_detalle` VALUES ('1', '3', '3', 'Unico', '3', 'T', '26', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:38', '1', null);
INSERT INTO `colegios_detalle` VALUES ('2', '3', '4', 'Unico', '3', 'T', '53', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:38', '1', null);
INSERT INTO `colegios_detalle` VALUES ('3', '3', '5', 'Unico', '3', 'T', '38', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:38', '1', null);
INSERT INTO `colegios_detalle` VALUES ('4', '4', '4', 'A', '3', 'T', '50', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:18', '1', null);
INSERT INTO `colegios_detalle` VALUES ('5', '4', '4', 'B', '3', 'T', '50', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:18', '1', null);
INSERT INTO `colegios_detalle` VALUES ('6', '4', '4', 'C', '3', 'T', '40', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:18', '1', null);
INSERT INTO `colegios_detalle` VALUES ('7', '4', '5', 'A', '3', 'M', '45', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:18', '1', null);
INSERT INTO `colegios_detalle` VALUES ('8', '4', '5', 'B', '3', 'T', '50', '1', '2016-06-05 20:59:32', '2016-06-14 16:21:18', '1', null);
INSERT INTO `colegios_detalle` VALUES ('9', '4', '5', 'D', '3', 'M', '39', '1', '2016-06-09 23:07:56', '2016-06-14 16:21:18', null, null);

-- ----------------------------
-- Table structure for colegios_niveles
-- ----------------------------
DROP TABLE IF EXISTS `colegios_niveles`;
CREATE TABLE `colegios_niveles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colegios_niveles
-- ----------------------------
INSERT INTO `colegios_niveles` VALUES ('1', 'Inicial', '0', '2016-05-27 16:04:26', null, '1', null);
INSERT INTO `colegios_niveles` VALUES ('2', 'Primaria', '1', '2016-05-27 16:04:26', null, '1', null);
INSERT INTO `colegios_niveles` VALUES ('3', 'Secundaria', '1', '2016-05-27 16:04:26', null, '1', null);
INSERT INTO `colegios_niveles` VALUES ('4', 'Ini-Pri', '0', '2016-05-27 16:04:26', null, '1', null);
INSERT INTO `colegios_niveles` VALUES ('5', 'Pri-Sec', '1', '2016-05-27 16:04:26', null, '1', null);
INSERT INTO `colegios_niveles` VALUES ('6', 'Ini-Pri-Sec', '1', '2016-05-27 16:04:26', null, '1', null);

-- ----------------------------
-- Table structure for colegios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `colegios_tipos`;
CREATE TABLE `colegios_tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colegios_tipos
-- ----------------------------
INSERT INTO `colegios_tipos` VALUES ('1', 'Nacional', '1', '2016-05-27 15:59:30', null, '1', null);
INSERT INTO `colegios_tipos` VALUES ('2', 'Particular', '1', '2016-05-27 15:59:33', null, '1', null);

-- ----------------------------
-- Table structure for departamentos
-- ----------------------------
DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departamentos
-- ----------------------------
INSERT INTO `departamentos` VALUES ('1', 'AMAZONAS');
INSERT INTO `departamentos` VALUES ('2', 'ANCASH');
INSERT INTO `departamentos` VALUES ('3', 'APURIMAC');
INSERT INTO `departamentos` VALUES ('4', 'AREQUIPA');
INSERT INTO `departamentos` VALUES ('5', 'AYACUCHO');
INSERT INTO `departamentos` VALUES ('6', 'CAJAMARCA');
INSERT INTO `departamentos` VALUES ('7', 'CUSCO');
INSERT INTO `departamentos` VALUES ('8', 'HUANCAVELICA');
INSERT INTO `departamentos` VALUES ('9', 'HUANUCO');
INSERT INTO `departamentos` VALUES ('10', 'ICA');
INSERT INTO `departamentos` VALUES ('11', 'JUNIN');
INSERT INTO `departamentos` VALUES ('12', 'LA LIBERTAD');
INSERT INTO `departamentos` VALUES ('13', 'LAMBAYEQUE');
INSERT INTO `departamentos` VALUES ('14', 'LIMA');
INSERT INTO `departamentos` VALUES ('15', 'LORETO');
INSERT INTO `departamentos` VALUES ('16', 'MADRE DE DIOS');
INSERT INTO `departamentos` VALUES ('17', 'MOQUEGUA');
INSERT INTO `departamentos` VALUES ('18', 'PASCO');
INSERT INTO `departamentos` VALUES ('19', 'PIURA');
INSERT INTO `departamentos` VALUES ('20', 'PUNO');
INSERT INTO `departamentos` VALUES ('21', 'SAN MARTIN');
INSERT INTO `departamentos` VALUES ('22', 'TACNA');
INSERT INTO `departamentos` VALUES ('23', 'TUMBES');
INSERT INTO `departamentos` VALUES ('24', 'CALLAO');
INSERT INTO `departamentos` VALUES ('25', 'UCAYALI');

-- ----------------------------
-- Table structure for distritos
-- ----------------------------
DROP TABLE IF EXISTS `distritos`;
CREATE TABLE `distritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` int(11) DEFAULT NULL,
  `ubigeo` varchar(6) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idprovincia` (`provincia_id`) USING BTREE,
  CONSTRAINT `d_provincia_id` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1835 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of distritos
-- ----------------------------
INSERT INTO `distritos` VALUES ('1', '1', '010101', 'CHACHAPOYAS', '1');
INSERT INTO `distritos` VALUES ('2', '1', '010102', 'ASUNCION', '1');
INSERT INTO `distritos` VALUES ('3', '1', '010103', 'BALSAS', '1');
INSERT INTO `distritos` VALUES ('4', '1', '010104', 'CHETO', '1');
INSERT INTO `distritos` VALUES ('5', '1', '010105', 'CHILIQUIN', '1');
INSERT INTO `distritos` VALUES ('6', '1', '010106', 'CHUQUIBAMBA', '1');
INSERT INTO `distritos` VALUES ('7', '1', '010107', 'GRANADA', '1');
INSERT INTO `distritos` VALUES ('8', '1', '010108', 'HUANCAS', '1');
INSERT INTO `distritos` VALUES ('9', '1', '010109', 'LA JALCA', '1');
INSERT INTO `distritos` VALUES ('10', '1', '010110', 'LEIMEBAMBA', '1');
INSERT INTO `distritos` VALUES ('11', '1', '010111', 'LEVANTO', '1');
INSERT INTO `distritos` VALUES ('12', '1', '010112', 'MAGDALENA', '1');
INSERT INTO `distritos` VALUES ('13', '1', '010113', 'MARISCAL CASTILLA', '1');
INSERT INTO `distritos` VALUES ('14', '1', '010114', 'MOLINOPAMPA', '1');
INSERT INTO `distritos` VALUES ('15', '1', '010115', 'MONTEVIDEO', '1');
INSERT INTO `distritos` VALUES ('16', '1', '010116', 'OLLEROS', '1');
INSERT INTO `distritos` VALUES ('17', '1', '010117', 'QUINJALCA', '1');
INSERT INTO `distritos` VALUES ('18', '1', '010118', 'SAN FCO DE DAGUAS', '1');
INSERT INTO `distritos` VALUES ('19', '1', '010119', 'SAN ISIDRO DE MAINO', '1');
INSERT INTO `distritos` VALUES ('20', '1', '010120', 'SOLOCO', '1');
INSERT INTO `distritos` VALUES ('21', '1', '010121', 'SONCHE', '1');
INSERT INTO `distritos` VALUES ('22', '2', '010201', 'LA PECA', '1');
INSERT INTO `distritos` VALUES ('23', '2', '010202', 'ARAMANGO', '1');
INSERT INTO `distritos` VALUES ('24', '2', '010203', 'COPALLIN', '1');
INSERT INTO `distritos` VALUES ('25', '2', '010204', 'EL PARCO', '1');
INSERT INTO `distritos` VALUES ('26', '2', '010205', 'BAGUA', '1');
INSERT INTO `distritos` VALUES ('27', '2', '010206', 'IMAZA', '1');
INSERT INTO `distritos` VALUES ('28', '3', '010301', 'JUMBILLA', '1');
INSERT INTO `distritos` VALUES ('29', '3', '010302', 'COROSHA', '1');
INSERT INTO `distritos` VALUES ('30', '3', '010303', 'CUISPES', '1');
INSERT INTO `distritos` VALUES ('31', '3', '010304', 'CHISQUILLA', '1');
INSERT INTO `distritos` VALUES ('32', '3', '010305', 'CHURUJA', '1');
INSERT INTO `distritos` VALUES ('33', '3', '010306', 'FLORIDA', '1');
INSERT INTO `distritos` VALUES ('34', '3', '010307', 'RECTA', '1');
INSERT INTO `distritos` VALUES ('35', '3', '010308', 'SAN CARLOS', '1');
INSERT INTO `distritos` VALUES ('36', '3', '010309', 'SHIPASBAMBA', '1');
INSERT INTO `distritos` VALUES ('37', '3', '010310', 'VALERA', '1');
INSERT INTO `distritos` VALUES ('38', '3', '010311', 'YAMBRASBAMBA', '1');
INSERT INTO `distritos` VALUES ('39', '3', '010312', 'JAZAN', '1');
INSERT INTO `distritos` VALUES ('40', '4', '010401', 'LAMUD', '1');
INSERT INTO `distritos` VALUES ('41', '4', '010402', 'CAMPORREDONDO', '1');
INSERT INTO `distritos` VALUES ('42', '4', '010403', 'COCABAMBA', '1');
INSERT INTO `distritos` VALUES ('43', '4', '010404', 'COLCAMAR', '1');
INSERT INTO `distritos` VALUES ('44', '4', '010405', 'CONILA', '1');
INSERT INTO `distritos` VALUES ('45', '4', '010406', 'INGUILPATA', '1');
INSERT INTO `distritos` VALUES ('46', '4', '010407', 'LONGUITA', '1');
INSERT INTO `distritos` VALUES ('47', '4', '010408', 'LONYA CHICO', '1');
INSERT INTO `distritos` VALUES ('48', '4', '010409', 'LUYA', '1');
INSERT INTO `distritos` VALUES ('49', '4', '010410', 'LUYA VIEJO', '1');
INSERT INTO `distritos` VALUES ('50', '4', '010411', 'MARIA', '1');
INSERT INTO `distritos` VALUES ('51', '4', '010412', 'OCALLI', '1');
INSERT INTO `distritos` VALUES ('52', '4', '010413', 'OCUMAL', '1');
INSERT INTO `distritos` VALUES ('53', '4', '010414', 'PISUQUIA', '1');
INSERT INTO `distritos` VALUES ('54', '4', '010415', 'SAN CRISTOBAL', '1');
INSERT INTO `distritos` VALUES ('55', '4', '010416', 'SAN FRANCISCO DE YESO', '1');
INSERT INTO `distritos` VALUES ('56', '4', '010417', 'SAN JERONIMO', '1');
INSERT INTO `distritos` VALUES ('57', '4', '010418', 'SAN JUAN DE LOPECANCHA', '1');
INSERT INTO `distritos` VALUES ('58', '4', '010419', 'SANTA CATALINA', '1');
INSERT INTO `distritos` VALUES ('59', '4', '010420', 'SANTO TOMAS', '1');
INSERT INTO `distritos` VALUES ('60', '4', '010421', 'TINGO', '1');
INSERT INTO `distritos` VALUES ('61', '4', '010422', 'TRITA', '1');
INSERT INTO `distritos` VALUES ('62', '4', '010423', 'PROVIDENCIA', '1');
INSERT INTO `distritos` VALUES ('63', '5', '010501', 'SAN NICOLAS', '1');
INSERT INTO `distritos` VALUES ('64', '5', '010502', 'COCHAMAL', '1');
INSERT INTO `distritos` VALUES ('65', '5', '010503', 'CHIRIMOTO', '1');
INSERT INTO `distritos` VALUES ('66', '5', '010504', 'HUAMBO', '1');
INSERT INTO `distritos` VALUES ('67', '5', '010505', 'LIMABAMBA', '1');
INSERT INTO `distritos` VALUES ('68', '5', '010506', 'LONGAR', '1');
INSERT INTO `distritos` VALUES ('69', '5', '010507', 'MILPUC', '1');
INSERT INTO `distritos` VALUES ('70', '5', '010508', 'MCAL BENAVIDES', '1');
INSERT INTO `distritos` VALUES ('71', '5', '010509', 'OMIA', '1');
INSERT INTO `distritos` VALUES ('72', '5', '010510', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('73', '5', '010511', 'TOTORA', '1');
INSERT INTO `distritos` VALUES ('74', '5', '010512', 'VISTA ALEGRE', '1');
INSERT INTO `distritos` VALUES ('75', '6', '010601', 'NIEVA', '1');
INSERT INTO `distritos` VALUES ('76', '6', '010602', 'RIO SANTIAGO', '1');
INSERT INTO `distritos` VALUES ('77', '6', '010603', 'EL CENEPA', '1');
INSERT INTO `distritos` VALUES ('78', '7', '010701', 'BAGUA GRANDE', '1');
INSERT INTO `distritos` VALUES ('79', '7', '010702', 'CAJARURO', '1');
INSERT INTO `distritos` VALUES ('80', '7', '010703', 'CUMBA', '1');
INSERT INTO `distritos` VALUES ('81', '7', '010704', 'EL MILAGRO', '1');
INSERT INTO `distritos` VALUES ('82', '7', '010705', 'JAMALCA', '1');
INSERT INTO `distritos` VALUES ('83', '7', '010706', 'LONYA GRANDE', '1');
INSERT INTO `distritos` VALUES ('84', '7', '010707', 'YAMON', '1');
INSERT INTO `distritos` VALUES ('85', '8', '020101', 'HUARAZ', '1');
INSERT INTO `distritos` VALUES ('86', '8', '020102', 'INDEPENDENCIA', '1');
INSERT INTO `distritos` VALUES ('87', '8', '020103', 'COCHABAMBA', '1');
INSERT INTO `distritos` VALUES ('88', '8', '020104', 'COLCABAMBA', '1');
INSERT INTO `distritos` VALUES ('89', '8', '020105', 'HUANCHAY', '1');
INSERT INTO `distritos` VALUES ('90', '8', '020106', 'JANGAS', '1');
INSERT INTO `distritos` VALUES ('91', '8', '020107', 'LA LIBERTAD', '1');
INSERT INTO `distritos` VALUES ('92', '8', '020108', 'OLLEROS', '1');
INSERT INTO `distritos` VALUES ('93', '8', '020109', 'PAMPAS', '1');
INSERT INTO `distritos` VALUES ('94', '8', '020110', 'PARIACOTO', '1');
INSERT INTO `distritos` VALUES ('95', '8', '020111', 'PIRA', '1');
INSERT INTO `distritos` VALUES ('96', '8', '020112', 'TARICA', '1');
INSERT INTO `distritos` VALUES ('97', '9', '020201', 'AIJA', '1');
INSERT INTO `distritos` VALUES ('98', '9', '020203', 'CORIS', '1');
INSERT INTO `distritos` VALUES ('99', '9', '020205', 'HUACLLAN', '1');
INSERT INTO `distritos` VALUES ('100', '9', '020206', 'LA MERCED', '1');
INSERT INTO `distritos` VALUES ('101', '9', '020208', 'SUCCHA', '1');
INSERT INTO `distritos` VALUES ('102', '10', '020301', 'CHIQUIAN', '1');
INSERT INTO `distritos` VALUES ('103', '10', '020302', 'A PARDO LEZAMETA', '1');
INSERT INTO `distritos` VALUES ('104', '10', '020304', 'AQUIA', '1');
INSERT INTO `distritos` VALUES ('105', '10', '020305', 'CAJACAY', '1');
INSERT INTO `distritos` VALUES ('106', '10', '020310', 'HUAYLLACAYAN', '1');
INSERT INTO `distritos` VALUES ('107', '10', '020311', 'HUASTA', '1');
INSERT INTO `distritos` VALUES ('108', '10', '020313', 'MANGAS', '1');
INSERT INTO `distritos` VALUES ('109', '10', '020315', 'PACLLON', '1');
INSERT INTO `distritos` VALUES ('110', '10', '020317', 'SAN MIGUEL DE CORPANQUI', '1');
INSERT INTO `distritos` VALUES ('111', '10', '020320', 'TICLLOS', '1');
INSERT INTO `distritos` VALUES ('112', '10', '020321', 'ANTONIO RAIMONDI', '1');
INSERT INTO `distritos` VALUES ('113', '10', '020322', 'CANIS', '1');
INSERT INTO `distritos` VALUES ('114', '10', '020323', 'COLQUIOC', '1');
INSERT INTO `distritos` VALUES ('115', '10', '020324', 'LA PRIMAVERA', '1');
INSERT INTO `distritos` VALUES ('116', '10', '020325', 'HUALLANCA', '1');
INSERT INTO `distritos` VALUES ('117', '11', '020401', 'CARHUAZ', '1');
INSERT INTO `distritos` VALUES ('118', '11', '020402', 'ACOPAMPA', '1');
INSERT INTO `distritos` VALUES ('119', '11', '020403', 'AMASHCA', '1');
INSERT INTO `distritos` VALUES ('120', '11', '020404', 'ANTA', '1');
INSERT INTO `distritos` VALUES ('121', '11', '020405', 'ATAQUERO', '1');
INSERT INTO `distritos` VALUES ('122', '11', '020406', 'MARCARA', '1');
INSERT INTO `distritos` VALUES ('123', '11', '020407', 'PARIAHUANCA', '1');
INSERT INTO `distritos` VALUES ('124', '11', '020408', 'SAN MIGUEL DE ACO', '1');
INSERT INTO `distritos` VALUES ('125', '11', '020409', 'SHILLA', '1');
INSERT INTO `distritos` VALUES ('126', '11', '020410', 'TINCO', '1');
INSERT INTO `distritos` VALUES ('127', '11', '020411', 'YUNGAR', '1');
INSERT INTO `distritos` VALUES ('128', '12', '020501', 'CASMA', '1');
INSERT INTO `distritos` VALUES ('129', '12', '020502', 'BUENA VISTA ALTA', '1');
INSERT INTO `distritos` VALUES ('130', '12', '020503', 'COMANDANTE NOEL', '1');
INSERT INTO `distritos` VALUES ('131', '12', '020505', 'YAUTAN', '1');
INSERT INTO `distritos` VALUES ('132', '13', '020601', 'CORONGO', '1');
INSERT INTO `distritos` VALUES ('133', '13', '020602', 'ACO', '1');
INSERT INTO `distritos` VALUES ('134', '13', '020603', 'BAMBAS', '1');
INSERT INTO `distritos` VALUES ('135', '13', '020604', 'CUSCA', '1');
INSERT INTO `distritos` VALUES ('136', '13', '020605', 'LA PAMPA', '1');
INSERT INTO `distritos` VALUES ('137', '13', '020606', 'YANAC', '1');
INSERT INTO `distritos` VALUES ('138', '13', '020607', 'YUPAN', '1');
INSERT INTO `distritos` VALUES ('139', '14', '020701', 'CARAZ', '1');
INSERT INTO `distritos` VALUES ('140', '14', '020702', 'HUALLANCA', '1');
INSERT INTO `distritos` VALUES ('141', '14', '020703', 'HUATA', '1');
INSERT INTO `distritos` VALUES ('142', '14', '020704', 'HUAYLAS', '1');
INSERT INTO `distritos` VALUES ('143', '14', '020705', 'MATO', '1');
INSERT INTO `distritos` VALUES ('144', '14', '020706', 'PAMPAROMAS', '1');
INSERT INTO `distritos` VALUES ('145', '14', '020707', 'PUEBLO LIBRE', '1');
INSERT INTO `distritos` VALUES ('146', '14', '020708', 'SANTA CRUZ', '1');
INSERT INTO `distritos` VALUES ('147', '14', '020709', 'YURACMARCA', '1');
INSERT INTO `distritos` VALUES ('148', '14', '020710', 'SANTO TORIBIO', '1');
INSERT INTO `distritos` VALUES ('149', '15', '020801', 'HUARI', '1');
INSERT INTO `distritos` VALUES ('150', '15', '020802', 'CAJAY', '1');
INSERT INTO `distritos` VALUES ('151', '15', '020803', 'CHAVIN DE HUANTAR', '1');
INSERT INTO `distritos` VALUES ('152', '15', '020804', 'HUACACHI', '1');
INSERT INTO `distritos` VALUES ('153', '15', '020805', 'HUACHIS', '1');
INSERT INTO `distritos` VALUES ('154', '15', '020806', 'HUACCHIS', '1');
INSERT INTO `distritos` VALUES ('155', '15', '020807', 'HUANTAR', '1');
INSERT INTO `distritos` VALUES ('156', '15', '020808', 'MASIN', '1');
INSERT INTO `distritos` VALUES ('157', '15', '020809', 'PAUCAS', '1');
INSERT INTO `distritos` VALUES ('158', '15', '020810', 'PONTO', '1');
INSERT INTO `distritos` VALUES ('159', '15', '020811', 'RAHUAPAMPA', '1');
INSERT INTO `distritos` VALUES ('160', '15', '020812', 'RAPAYAN', '1');
INSERT INTO `distritos` VALUES ('161', '15', '020813', 'SAN MARCOS', '1');
INSERT INTO `distritos` VALUES ('162', '15', '020814', 'SAN PEDRO DE CHANA', '1');
INSERT INTO `distritos` VALUES ('163', '15', '020815', 'UCO', '1');
INSERT INTO `distritos` VALUES ('164', '15', '020816', 'ANRA', '1');
INSERT INTO `distritos` VALUES ('165', '16', '020901', 'PISCOBAMBA', '1');
INSERT INTO `distritos` VALUES ('166', '16', '020902', 'CASCA', '1');
INSERT INTO `distritos` VALUES ('167', '16', '020903', 'LUCMA', '1');
INSERT INTO `distritos` VALUES ('168', '16', '020904', 'FIDEL OLIVAS ESCUDERO', '1');
INSERT INTO `distritos` VALUES ('169', '16', '020905', 'LLAMA', '1');
INSERT INTO `distritos` VALUES ('170', '16', '020906', 'LLUMPA', '1');
INSERT INTO `distritos` VALUES ('171', '16', '020907', 'MUSGA', '1');
INSERT INTO `distritos` VALUES ('172', '16', '020908', 'ELEAZAR GUZMAN BARRON', '1');
INSERT INTO `distritos` VALUES ('173', '17', '021001', 'CABANA', '1');
INSERT INTO `distritos` VALUES ('174', '17', '021002', 'BOLOGNESI', '1');
INSERT INTO `distritos` VALUES ('175', '17', '021003', 'CONCHUCOS', '1');
INSERT INTO `distritos` VALUES ('176', '17', '021004', 'HUACASCHUQUE', '1');
INSERT INTO `distritos` VALUES ('177', '17', '021005', 'HUANDOVAL', '1');
INSERT INTO `distritos` VALUES ('178', '17', '021006', 'LACABAMBA', '1');
INSERT INTO `distritos` VALUES ('179', '17', '021007', 'LLAPO', '1');
INSERT INTO `distritos` VALUES ('180', '17', '021008', 'PALLASCA', '1');
INSERT INTO `distritos` VALUES ('181', '17', '021009', 'PAMPAS', '1');
INSERT INTO `distritos` VALUES ('182', '17', '021010', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('183', '17', '021011', 'TAUCA', '1');
INSERT INTO `distritos` VALUES ('184', '18', '021101', 'POMABAMBA', '1');
INSERT INTO `distritos` VALUES ('185', '18', '021102', 'HUAYLLAN', '1');
INSERT INTO `distritos` VALUES ('186', '18', '021103', 'PAROBAMBA', '1');
INSERT INTO `distritos` VALUES ('187', '18', '021104', 'QUINUABAMBA', '1');
INSERT INTO `distritos` VALUES ('188', '19', '021201', 'RECUAY', '1');
INSERT INTO `distritos` VALUES ('189', '19', '021202', 'COTAPARACO', '1');
INSERT INTO `distritos` VALUES ('190', '19', '021203', 'HUAYLLAPAMPA', '1');
INSERT INTO `distritos` VALUES ('191', '19', '021204', 'MARCA', '1');
INSERT INTO `distritos` VALUES ('192', '19', '021205', 'PAMPAS CHICO', '1');
INSERT INTO `distritos` VALUES ('193', '19', '021206', 'PARARIN', '1');
INSERT INTO `distritos` VALUES ('194', '19', '021207', 'TAPACOCHA', '1');
INSERT INTO `distritos` VALUES ('195', '19', '021208', 'TICAPAMPA', '1');
INSERT INTO `distritos` VALUES ('196', '19', '021209', 'LLACLLIN', '1');
INSERT INTO `distritos` VALUES ('197', '19', '021210', 'CATAC', '1');
INSERT INTO `distritos` VALUES ('198', '20', '021301', 'CHIMBOTE', '1');
INSERT INTO `distritos` VALUES ('199', '20', '021302', 'CACERES DEL PERU', '1');
INSERT INTO `distritos` VALUES ('200', '20', '021303', 'MACATE', '1');
INSERT INTO `distritos` VALUES ('201', '20', '021304', 'MORO', '1');
INSERT INTO `distritos` VALUES ('202', '20', '021305', 'NEPENA', '1');
INSERT INTO `distritos` VALUES ('203', '20', '021306', 'SAMANCO', '1');
INSERT INTO `distritos` VALUES ('204', '20', '021307', 'SANTA', '1');
INSERT INTO `distritos` VALUES ('205', '20', '021308', 'COISHCO', '1');
INSERT INTO `distritos` VALUES ('206', '20', '021309', 'NUEVO CHIMBOTE', '1');
INSERT INTO `distritos` VALUES ('207', '21', '021401', 'SIHUAS', '1');
INSERT INTO `distritos` VALUES ('208', '21', '021402', 'ALFONSO UGARTE', '1');
INSERT INTO `distritos` VALUES ('209', '21', '021403', 'CHINGALPO', '1');
INSERT INTO `distritos` VALUES ('210', '21', '021404', 'HUAYLLABAMBA', '1');
INSERT INTO `distritos` VALUES ('211', '21', '021405', 'QUICHES', '1');
INSERT INTO `distritos` VALUES ('212', '21', '021406', 'SICSIBAMBA', '1');
INSERT INTO `distritos` VALUES ('213', '21', '021407', 'ACOBAMBA', '1');
INSERT INTO `distritos` VALUES ('214', '21', '021408', 'CASHAPAMPA', '1');
INSERT INTO `distritos` VALUES ('215', '21', '021409', 'RAGASH', '1');
INSERT INTO `distritos` VALUES ('216', '21', '021410', 'SAN JUAN', '1');
INSERT INTO `distritos` VALUES ('217', '22', '021501', 'YUNGAY', '1');
INSERT INTO `distritos` VALUES ('218', '22', '021502', 'CASCAPARA', '1');
INSERT INTO `distritos` VALUES ('219', '22', '021503', 'MANCOS', '1');
INSERT INTO `distritos` VALUES ('220', '22', '021504', 'MATACOTO', '1');
INSERT INTO `distritos` VALUES ('221', '22', '021505', 'QUILLO', '1');
INSERT INTO `distritos` VALUES ('222', '22', '021506', 'RANRAHIRCA', '1');
INSERT INTO `distritos` VALUES ('223', '22', '021507', 'SHUPLUY', '1');
INSERT INTO `distritos` VALUES ('224', '22', '021508', 'YANAMA', '1');
INSERT INTO `distritos` VALUES ('225', '23', '021601', 'LLAMELLIN', '1');
INSERT INTO `distritos` VALUES ('226', '23', '021602', 'ACZO', '1');
INSERT INTO `distritos` VALUES ('227', '23', '021603', 'CHACCHO', '1');
INSERT INTO `distritos` VALUES ('228', '23', '021604', 'CHINGAS', '1');
INSERT INTO `distritos` VALUES ('229', '23', '021605', 'MIRGAS', '1');
INSERT INTO `distritos` VALUES ('230', '23', '021606', 'SAN JUAN DE RONTOY', '1');
INSERT INTO `distritos` VALUES ('231', '24', '021701', 'SAN LUIS', '1');
INSERT INTO `distritos` VALUES ('232', '24', '021702', 'YAUYA', '1');
INSERT INTO `distritos` VALUES ('233', '24', '021703', 'SAN NICOLAS', '1');
INSERT INTO `distritos` VALUES ('234', '25', '021801', 'CHACAS', '1');
INSERT INTO `distritos` VALUES ('235', '25', '021802', 'ACOCHACA', '1');
INSERT INTO `distritos` VALUES ('236', '26', '021901', 'HUARMEY', '1');
INSERT INTO `distritos` VALUES ('237', '26', '021902', 'COCHAPETI', '1');
INSERT INTO `distritos` VALUES ('238', '26', '021903', 'HUAYAN', '1');
INSERT INTO `distritos` VALUES ('239', '26', '021904', 'MALVAS', '1');
INSERT INTO `distritos` VALUES ('240', '26', '021905', 'CULEBRAS', '1');
INSERT INTO `distritos` VALUES ('241', '27', '022001', 'ACAS', '1');
INSERT INTO `distritos` VALUES ('242', '27', '022002', 'CAJAMARQUILLA', '1');
INSERT INTO `distritos` VALUES ('243', '27', '022003', 'CARHUAPAMPA', '1');
INSERT INTO `distritos` VALUES ('244', '27', '022004', 'COCHAS', '1');
INSERT INTO `distritos` VALUES ('245', '27', '022005', 'CONGAS', '1');
INSERT INTO `distritos` VALUES ('246', '27', '022006', 'LLIPA', '1');
INSERT INTO `distritos` VALUES ('247', '27', '022007', 'OCROS', '1');
INSERT INTO `distritos` VALUES ('248', '27', '022008', 'SAN CRISTOBAL DE RAJAN', '1');
INSERT INTO `distritos` VALUES ('249', '27', '022009', 'SAN PEDRO', '1');
INSERT INTO `distritos` VALUES ('250', '27', '022010', 'SANTIAGO DE CHILCAS', '1');
INSERT INTO `distritos` VALUES ('251', '28', '030101', 'ABANCAY', '1');
INSERT INTO `distritos` VALUES ('252', '28', '030102', 'CIRCA', '1');
INSERT INTO `distritos` VALUES ('253', '28', '030103', 'CURAHUASI', '1');
INSERT INTO `distritos` VALUES ('254', '28', '030104', 'CHACOCHE', '1');
INSERT INTO `distritos` VALUES ('255', '28', '030105', 'HUANIPACA', '1');
INSERT INTO `distritos` VALUES ('256', '28', '030106', 'LAMBRAMA', '1');
INSERT INTO `distritos` VALUES ('257', '28', '030107', 'PICHIRHUA', '1');
INSERT INTO `distritos` VALUES ('258', '28', '030108', 'SAN PEDRO DE CACHORA', '1');
INSERT INTO `distritos` VALUES ('259', '28', '030109', 'TAMBURCO', '1');
INSERT INTO `distritos` VALUES ('260', '29', '030201', 'CHALHUANCA', '1');
INSERT INTO `distritos` VALUES ('261', '29', '030202', 'CAPAYA', '1');
INSERT INTO `distritos` VALUES ('262', '29', '030203', 'CARAYBAMBA', '1');
INSERT INTO `distritos` VALUES ('263', '29', '030204', 'COLCABAMBA', '1');
INSERT INTO `distritos` VALUES ('264', '29', '030205', 'COTARUSE', '1');
INSERT INTO `distritos` VALUES ('265', '29', '030206', 'CHAPIMARCA', '1');
INSERT INTO `distritos` VALUES ('266', '29', '030207', 'IHUAYLLO', '1');
INSERT INTO `distritos` VALUES ('267', '29', '030208', 'LUCRE', '1');
INSERT INTO `distritos` VALUES ('268', '29', '030209', 'POCOHUANCA', '1');
INSERT INTO `distritos` VALUES ('269', '29', '030210', 'SANAICA', '1');
INSERT INTO `distritos` VALUES ('270', '29', '030211', 'SORAYA', '1');
INSERT INTO `distritos` VALUES ('271', '29', '030212', 'TAPAIRIHUA', '1');
INSERT INTO `distritos` VALUES ('272', '29', '030213', 'TINTAY', '1');
INSERT INTO `distritos` VALUES ('273', '29', '030214', 'TORAYA', '1');
INSERT INTO `distritos` VALUES ('274', '29', '030215', 'YANACA', '1');
INSERT INTO `distritos` VALUES ('275', '29', '030216', 'SAN JUAN DE CHACNA', '1');
INSERT INTO `distritos` VALUES ('276', '29', '030217', 'JUSTO APU SAHUARAURA', '1');
INSERT INTO `distritos` VALUES ('277', '30', '030301', 'ANDAHUAYLAS', '1');
INSERT INTO `distritos` VALUES ('278', '30', '030302', 'ANDARAPA', '1');
INSERT INTO `distritos` VALUES ('279', '30', '030303', 'CHIARA', '1');
INSERT INTO `distritos` VALUES ('280', '30', '030304', 'HUANCARAMA', '1');
INSERT INTO `distritos` VALUES ('281', '30', '030305', 'HUANCARAY', '1');
INSERT INTO `distritos` VALUES ('282', '30', '030306', 'KISHUARA', '1');
INSERT INTO `distritos` VALUES ('283', '30', '030307', 'PACOBAMBA', '1');
INSERT INTO `distritos` VALUES ('284', '30', '030308', 'PAMPACHIRI', '1');
INSERT INTO `distritos` VALUES ('285', '30', '030309', 'SAN ANTONIO DE CACHI', '1');
INSERT INTO `distritos` VALUES ('286', '30', '030310', 'SAN JERONIMO', '1');
INSERT INTO `distritos` VALUES ('287', '30', '030311', 'TALAVERA', '1');
INSERT INTO `distritos` VALUES ('288', '30', '030312', 'TURPO', '1');
INSERT INTO `distritos` VALUES ('289', '30', '030313', 'PACUCHA', '1');
INSERT INTO `distritos` VALUES ('290', '30', '030314', 'POMACOCHA', '1');
INSERT INTO `distritos` VALUES ('291', '30', '030315', 'STA MARIA DE CHICMO', '1');
INSERT INTO `distritos` VALUES ('292', '30', '030316', 'TUMAY HUARACA', '1');
INSERT INTO `distritos` VALUES ('293', '30', '030317', 'HUAYANA', '1');
INSERT INTO `distritos` VALUES ('294', '30', '030318', 'SAN MIGUEL DE CHACCRAMPA', '1');
INSERT INTO `distritos` VALUES ('295', '30', '030319', 'KAQUIABAMBA', '1');
INSERT INTO `distritos` VALUES ('296', '31', '030401', 'ANTABAMBA', '1');
INSERT INTO `distritos` VALUES ('297', '31', '030402', 'EL ORO', '1');
INSERT INTO `distritos` VALUES ('298', '31', '030403', 'HUAQUIRCA', '1');
INSERT INTO `distritos` VALUES ('299', '31', '030404', 'JUAN ESPINOZA MEDRANO', '1');
INSERT INTO `distritos` VALUES ('300', '31', '030405', 'OROPESA', '1');
INSERT INTO `distritos` VALUES ('301', '31', '030406', 'PACHACONAS', '1');
INSERT INTO `distritos` VALUES ('302', '31', '030407', 'SABAINO', '1');
INSERT INTO `distritos` VALUES ('303', '32', '030501', 'TAMBOBAMBA', '1');
INSERT INTO `distritos` VALUES ('304', '32', '030502', 'COYLLURQUI', '1');
INSERT INTO `distritos` VALUES ('305', '32', '030503', 'COTABAMBAS', '1');
INSERT INTO `distritos` VALUES ('306', '32', '030504', 'HAQUIRA', '1');
INSERT INTO `distritos` VALUES ('307', '32', '030505', 'MARA', '1');
INSERT INTO `distritos` VALUES ('308', '32', '030506', 'CHALLHUAHUACHO', '1');
INSERT INTO `distritos` VALUES ('309', '33', '030601', 'CHUQUIBAMBILLA', '1');
INSERT INTO `distritos` VALUES ('310', '33', '030602', 'CURPAHUASI', '1');
INSERT INTO `distritos` VALUES ('311', '33', '030603', 'HUAILLATI', '1');
INSERT INTO `distritos` VALUES ('312', '33', '030604', 'MAMARA', '1');
INSERT INTO `distritos` VALUES ('313', '33', '030605', 'MARISCAL GAMARRA', '1');
INSERT INTO `distritos` VALUES ('314', '33', '030606', 'MICAELA BASTIDAS', '1');
INSERT INTO `distritos` VALUES ('315', '33', '030607', 'PROGRESO', '1');
INSERT INTO `distritos` VALUES ('316', '33', '030608', 'PATAYPAMPA', '1');
INSERT INTO `distritos` VALUES ('317', '33', '030609', 'SAN ANTONIO', '1');
INSERT INTO `distritos` VALUES ('318', '33', '030610', 'TURPAY', '1');
INSERT INTO `distritos` VALUES ('319', '33', '030611', 'VILCABAMBA', '1');
INSERT INTO `distritos` VALUES ('320', '33', '030612', 'VIRUNDO', '1');
INSERT INTO `distritos` VALUES ('321', '33', '030613', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('322', '33', '030614', 'CURASCO', '1');
INSERT INTO `distritos` VALUES ('323', '34', '030701', 'CHINCHEROS', '1');
INSERT INTO `distritos` VALUES ('324', '34', '030702', 'ONGOY', '1');
INSERT INTO `distritos` VALUES ('325', '34', '030703', 'OCOBAMBA', '1');
INSERT INTO `distritos` VALUES ('326', '34', '030704', 'COCHARCAS', '1');
INSERT INTO `distritos` VALUES ('327', '34', '030705', 'ANCO HUALLO', '1');
INSERT INTO `distritos` VALUES ('328', '34', '030706', 'HUACCANA', '1');
INSERT INTO `distritos` VALUES ('329', '34', '030707', 'URANMARCA', '1');
INSERT INTO `distritos` VALUES ('330', '34', '030708', 'RANRACANCHA', '1');
INSERT INTO `distritos` VALUES ('331', '35', '040101', 'AREQUIPA', '1');
INSERT INTO `distritos` VALUES ('332', '35', '040102', 'CAYMA', '1');
INSERT INTO `distritos` VALUES ('333', '35', '040103', 'CERRO COLORADO', '1');
INSERT INTO `distritos` VALUES ('334', '35', '040104', 'CHARACATO', '1');
INSERT INTO `distritos` VALUES ('335', '35', '040105', 'CHIGUATA', '1');
INSERT INTO `distritos` VALUES ('336', '35', '040106', 'LA JOYA', '1');
INSERT INTO `distritos` VALUES ('337', '35', '040107', 'MIRAFLORES', '1');
INSERT INTO `distritos` VALUES ('338', '35', '040108', 'MOLLEBAYA', '1');
INSERT INTO `distritos` VALUES ('339', '35', '040109', 'PAUCARPATA', '1');
INSERT INTO `distritos` VALUES ('340', '35', '040110', 'POCSI', '1');
INSERT INTO `distritos` VALUES ('341', '35', '040111', 'POLOBAYA', '1');
INSERT INTO `distritos` VALUES ('342', '35', '040112', 'QUEQUENA', '1');
INSERT INTO `distritos` VALUES ('343', '35', '040113', 'SABANDIA', '1');
INSERT INTO `distritos` VALUES ('344', '35', '040114', 'SACHACA', '1');
INSERT INTO `distritos` VALUES ('345', '35', '040115', 'SAN JUAN DE SIGUAS', '1');
INSERT INTO `distritos` VALUES ('346', '35', '040116', 'SAN JUAN DE TARUCANI', '1');
INSERT INTO `distritos` VALUES ('347', '35', '040117', 'SANTA ISABEL DE SIGUAS', '1');
INSERT INTO `distritos` VALUES ('348', '35', '040118', 'STA RITA DE SIGUAS', '1');
INSERT INTO `distritos` VALUES ('349', '35', '040119', 'SOCABAYA', '1');
INSERT INTO `distritos` VALUES ('350', '35', '040120', 'TIABAYA', '1');
INSERT INTO `distritos` VALUES ('351', '35', '040121', 'UCHUMAYO', '1');
INSERT INTO `distritos` VALUES ('352', '35', '040122', 'VITOR', '1');
INSERT INTO `distritos` VALUES ('353', '35', '040123', 'YANAHUARA', '1');
INSERT INTO `distritos` VALUES ('354', '35', '040124', 'YARABAMBA', '1');
INSERT INTO `distritos` VALUES ('355', '35', '040125', 'YURA', '1');
INSERT INTO `distritos` VALUES ('356', '35', '040126', 'MARIANO MELGAR', '1');
INSERT INTO `distritos` VALUES ('357', '35', '040127', 'JACOBO HUNTER', '1');
INSERT INTO `distritos` VALUES ('358', '35', '040128', 'ALTO SELVA ALEGRE', '1');
INSERT INTO `distritos` VALUES ('359', '35', '040129', 'JOSE LUIS BUSTAMANTE Y RIVERO', '1');
INSERT INTO `distritos` VALUES ('360', '36', '040201', 'CHIVAY', '1');
INSERT INTO `distritos` VALUES ('361', '36', '040202', 'ACHOMA', '1');
INSERT INTO `distritos` VALUES ('362', '36', '040203', 'CABANACONDE', '1');
INSERT INTO `distritos` VALUES ('363', '36', '040204', 'CAYLLOMA', '1');
INSERT INTO `distritos` VALUES ('364', '36', '040205', 'CALLALLI', '1');
INSERT INTO `distritos` VALUES ('365', '36', '040206', 'COPORAQUE', '1');
INSERT INTO `distritos` VALUES ('366', '36', '040207', 'HUAMBO', '1');
INSERT INTO `distritos` VALUES ('367', '36', '040208', 'HUANCA', '1');
INSERT INTO `distritos` VALUES ('368', '36', '040209', 'ICHUPAMPA', '1');
INSERT INTO `distritos` VALUES ('369', '36', '040210', 'LARI', '1');
INSERT INTO `distritos` VALUES ('370', '36', '040211', 'LLUTA', '1');
INSERT INTO `distritos` VALUES ('371', '36', '040212', 'MACA', '1');
INSERT INTO `distritos` VALUES ('372', '36', '040213', 'MADRIGAL', '1');
INSERT INTO `distritos` VALUES ('373', '36', '040214', 'SAN ANTONIO DE CHUCA', '1');
INSERT INTO `distritos` VALUES ('374', '36', '040215', 'SIBAYO', '1');
INSERT INTO `distritos` VALUES ('375', '36', '040216', 'TAPAY', '1');
INSERT INTO `distritos` VALUES ('376', '36', '040217', 'TISCO', '1');
INSERT INTO `distritos` VALUES ('377', '36', '040218', 'TUTI', '1');
INSERT INTO `distritos` VALUES ('378', '36', '040219', 'YANQUE', '1');
INSERT INTO `distritos` VALUES ('379', '36', '040220', 'MAJES', '1');
INSERT INTO `distritos` VALUES ('380', '37', '040301', 'CAMANA', '1');
INSERT INTO `distritos` VALUES ('381', '37', '040302', 'JOSE MARIA QUIMPER', '1');
INSERT INTO `distritos` VALUES ('382', '37', '040303', 'MARIANO N VALCARCEL', '1');
INSERT INTO `distritos` VALUES ('383', '37', '040304', 'MARISCAL CACERES', '1');
INSERT INTO `distritos` VALUES ('384', '37', '040305', 'NICOLAS DE PIEROLA', '1');
INSERT INTO `distritos` VALUES ('385', '37', '040306', 'OCONA', '1');
INSERT INTO `distritos` VALUES ('386', '37', '040307', 'QUILCA', '1');
INSERT INTO `distritos` VALUES ('387', '37', '040308', 'SAMUEL PASTOR', '1');
INSERT INTO `distritos` VALUES ('388', '38', '040401', 'CARAVELI', '1');
INSERT INTO `distritos` VALUES ('389', '38', '040402', 'ACARI', '1');
INSERT INTO `distritos` VALUES ('390', '38', '040403', 'ATICO', '1');
INSERT INTO `distritos` VALUES ('391', '38', '040404', 'ATIQUIPA', '1');
INSERT INTO `distritos` VALUES ('392', '38', '040405', 'BELLA UNION', '1');
INSERT INTO `distritos` VALUES ('393', '38', '040406', 'CAHUACHO', '1');
INSERT INTO `distritos` VALUES ('394', '38', '040407', 'CHALA', '1');
INSERT INTO `distritos` VALUES ('395', '38', '040408', 'CHAPARRA', '1');
INSERT INTO `distritos` VALUES ('396', '38', '040409', 'HUANUHUANU', '1');
INSERT INTO `distritos` VALUES ('397', '38', '040410', 'JAQUI', '1');
INSERT INTO `distritos` VALUES ('398', '38', '040411', 'LOMAS', '1');
INSERT INTO `distritos` VALUES ('399', '38', '040412', 'QUICACHA', '1');
INSERT INTO `distritos` VALUES ('400', '38', '040413', 'YAUCA', '1');
INSERT INTO `distritos` VALUES ('401', '39', '040501', 'APLAO', '1');
INSERT INTO `distritos` VALUES ('402', '39', '040502', 'ANDAGUA', '1');
INSERT INTO `distritos` VALUES ('403', '39', '040503', 'AYO', '1');
INSERT INTO `distritos` VALUES ('404', '39', '040504', 'CHACHAS', '1');
INSERT INTO `distritos` VALUES ('405', '39', '040505', 'CHILCAYMARCA', '1');
INSERT INTO `distritos` VALUES ('406', '39', '040506', 'CHOCO', '1');
INSERT INTO `distritos` VALUES ('407', '39', '040507', 'HUANCARQUI', '1');
INSERT INTO `distritos` VALUES ('408', '39', '040508', 'MACHAGUAY', '1');
INSERT INTO `distritos` VALUES ('409', '39', '040509', 'ORCOPAMPA', '1');
INSERT INTO `distritos` VALUES ('410', '39', '040510', 'PAMPACOLCA', '1');
INSERT INTO `distritos` VALUES ('411', '39', '040511', 'TIPAN', '1');
INSERT INTO `distritos` VALUES ('412', '39', '040512', 'URACA', '1');
INSERT INTO `distritos` VALUES ('413', '39', '040513', 'UNON', '1');
INSERT INTO `distritos` VALUES ('414', '39', '040514', 'VIRACO', '1');
INSERT INTO `distritos` VALUES ('415', '40', '040601', 'CHUQUIBAMBA', '1');
INSERT INTO `distritos` VALUES ('416', '40', '040602', 'ANDARAY', '1');
INSERT INTO `distritos` VALUES ('417', '40', '040603', 'CAYARANI', '1');
INSERT INTO `distritos` VALUES ('418', '40', '040604', 'CHICHAS', '1');
INSERT INTO `distritos` VALUES ('419', '40', '040605', 'IRAY', '1');
INSERT INTO `distritos` VALUES ('420', '40', '040606', 'SALAMANCA', '1');
INSERT INTO `distritos` VALUES ('421', '40', '040607', 'YANAQUIHUA', '1');
INSERT INTO `distritos` VALUES ('422', '40', '040608', 'RIO GRANDE', '1');
INSERT INTO `distritos` VALUES ('423', '41', '040701', 'MOLLENDO', '1');
INSERT INTO `distritos` VALUES ('424', '41', '040702', 'COCACHACRA', '1');
INSERT INTO `distritos` VALUES ('425', '41', '040703', 'DEAN VALDIVIA', '1');
INSERT INTO `distritos` VALUES ('426', '41', '040704', 'ISLAY', '1');
INSERT INTO `distritos` VALUES ('427', '41', '040705', 'MEJIA', '1');
INSERT INTO `distritos` VALUES ('428', '41', '040706', 'PUNTA DE BOMBON', '1');
INSERT INTO `distritos` VALUES ('429', '42', '040801', 'COTAHUASI', '1');
INSERT INTO `distritos` VALUES ('430', '42', '040802', 'ALCA', '1');
INSERT INTO `distritos` VALUES ('431', '42', '040803', 'CHARCANA', '1');
INSERT INTO `distritos` VALUES ('432', '42', '040804', 'HUAYNACOTAS', '1');
INSERT INTO `distritos` VALUES ('433', '42', '040805', 'PAMPAMARCA', '1');
INSERT INTO `distritos` VALUES ('434', '42', '040806', 'PUYCA', '1');
INSERT INTO `distritos` VALUES ('435', '42', '040807', 'QUECHUALLA', '1');
INSERT INTO `distritos` VALUES ('436', '42', '040808', 'SAYLA', '1');
INSERT INTO `distritos` VALUES ('437', '42', '040809', 'TAURIA', '1');
INSERT INTO `distritos` VALUES ('438', '42', '040810', 'TOMEPAMPA', '1');
INSERT INTO `distritos` VALUES ('439', '42', '040811', 'TORO', '1');
INSERT INTO `distritos` VALUES ('440', '43', '050101', 'AYACUCHO', '1');
INSERT INTO `distritos` VALUES ('441', '43', '050102', 'ACOS VINCHOS', '1');
INSERT INTO `distritos` VALUES ('442', '43', '050103', 'CARMEN ALTO', '1');
INSERT INTO `distritos` VALUES ('443', '43', '050104', 'CHIARA', '1');
INSERT INTO `distritos` VALUES ('444', '43', '050105', 'QUINUA', '1');
INSERT INTO `distritos` VALUES ('445', '43', '050106', 'SAN JOSE DE TICLLAS', '1');
INSERT INTO `distritos` VALUES ('446', '43', '050107', 'SAN JUAN BAUTISTA', '1');
INSERT INTO `distritos` VALUES ('447', '43', '050108', 'SANTIAGO DE PISCHA', '1');
INSERT INTO `distritos` VALUES ('448', '43', '050109', 'VINCHOS', '1');
INSERT INTO `distritos` VALUES ('449', '43', '050110', 'TAMBILLO', '1');
INSERT INTO `distritos` VALUES ('450', '43', '050111', 'ACOCRO', '1');
INSERT INTO `distritos` VALUES ('451', '43', '050112', 'SOCOS', '1');
INSERT INTO `distritos` VALUES ('452', '43', '050113', 'OCROS', '1');
INSERT INTO `distritos` VALUES ('453', '43', '050114', 'PACAYCASA', '1');
INSERT INTO `distritos` VALUES ('454', '43', '050115', 'JESUS NAZARENO', '1');
INSERT INTO `distritos` VALUES ('455', '44', '050201', 'CANGALLO', '1');
INSERT INTO `distritos` VALUES ('456', '44', '050204', 'CHUSCHI', '1');
INSERT INTO `distritos` VALUES ('457', '44', '050206', 'LOS MOROCHUCOS', '1');
INSERT INTO `distritos` VALUES ('458', '44', '050207', 'PARAS', '1');
INSERT INTO `distritos` VALUES ('459', '44', '050208', 'TOTOS', '1');
INSERT INTO `distritos` VALUES ('460', '44', '050211', 'MARIA PARADO DE BELLIDO', '1');
INSERT INTO `distritos` VALUES ('461', '45', '050301', 'HUANTA', '1');
INSERT INTO `distritos` VALUES ('462', '45', '050302', 'AYAHUANCO', '1');
INSERT INTO `distritos` VALUES ('463', '45', '050303', 'HUAMANGUILLA', '1');
INSERT INTO `distritos` VALUES ('464', '45', '050304', 'IGUAIN', '1');
INSERT INTO `distritos` VALUES ('465', '45', '050305', 'LURICOCHA', '1');
INSERT INTO `distritos` VALUES ('466', '45', '050307', 'SANTILLANA', '1');
INSERT INTO `distritos` VALUES ('467', '45', '050308', 'SIVIA', '1');
INSERT INTO `distritos` VALUES ('468', '45', '050309', 'LLOCHEGUA', '1');
INSERT INTO `distritos` VALUES ('469', '46', '050401', 'SAN MIGUEL', '1');
INSERT INTO `distritos` VALUES ('470', '46', '050402', 'ANCO', '1');
INSERT INTO `distritos` VALUES ('471', '46', '050403', 'AYNA', '1');
INSERT INTO `distritos` VALUES ('472', '46', '050404', 'CHILCAS', '1');
INSERT INTO `distritos` VALUES ('473', '46', '050405', 'CHUNGUI', '1');
INSERT INTO `distritos` VALUES ('474', '46', '050406', 'TAMBO', '1');
INSERT INTO `distritos` VALUES ('475', '46', '050407', 'LUIS CARRANZA', '1');
INSERT INTO `distritos` VALUES ('476', '46', '050408', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('477', '47', '050501', 'PUQUIO', '1');
INSERT INTO `distritos` VALUES ('478', '47', '050502', 'AUCARA', '1');
INSERT INTO `distritos` VALUES ('479', '47', '050503', 'CABANA', '1');
INSERT INTO `distritos` VALUES ('480', '47', '050504', 'CARMEN SALCEDO', '1');
INSERT INTO `distritos` VALUES ('481', '47', '050506', 'CHAVINA', '1');
INSERT INTO `distritos` VALUES ('482', '47', '050508', 'CHIPAO', '1');
INSERT INTO `distritos` VALUES ('483', '47', '050510', 'HUAC-HUAS', '1');
INSERT INTO `distritos` VALUES ('484', '47', '050511', 'LARAMATE', '1');
INSERT INTO `distritos` VALUES ('485', '47', '050512', 'LEONCIO PRADO', '1');
INSERT INTO `distritos` VALUES ('486', '47', '050513', 'LUCANAS', '1');
INSERT INTO `distritos` VALUES ('487', '47', '050514', 'LLAUTA', '1');
INSERT INTO `distritos` VALUES ('488', '47', '050516', 'OCANA', '1');
INSERT INTO `distritos` VALUES ('489', '47', '050517', 'OTOCA', '1');
INSERT INTO `distritos` VALUES ('490', '47', '050520', 'SANCOS', '1');
INSERT INTO `distritos` VALUES ('491', '47', '050521', 'SAN JUAN', '1');
INSERT INTO `distritos` VALUES ('492', '47', '050522', 'SAN PEDRO', '1');
INSERT INTO `distritos` VALUES ('493', '47', '050524', 'STA ANA DE HUAYCAHUACHO', '1');
INSERT INTO `distritos` VALUES ('494', '47', '050525', 'SANTA LUCIA', '1');
INSERT INTO `distritos` VALUES ('495', '47', '050529', 'SAISA', '1');
INSERT INTO `distritos` VALUES ('496', '47', '050531', 'SAN PEDRO DE PALCO', '1');
INSERT INTO `distritos` VALUES ('497', '47', '050532', 'SAN CRISTOBAL', '1');
INSERT INTO `distritos` VALUES ('498', '48', '050601', 'CORACORA', '1');
INSERT INTO `distritos` VALUES ('499', '48', '050604', 'CORONEL CASTANEDA', '1');
INSERT INTO `distritos` VALUES ('500', '48', '050605', 'CHUMPI', '1');
INSERT INTO `distritos` VALUES ('501', '48', '050608', 'PACAPAUSA', '1');
INSERT INTO `distritos` VALUES ('502', '48', '050611', 'PULLO', '1');
INSERT INTO `distritos` VALUES ('503', '48', '050612', 'PUYUSCA', '1');
INSERT INTO `distritos` VALUES ('504', '48', '050615', 'SAN FCO DE RAVACAYCO', '1');
INSERT INTO `distritos` VALUES ('505', '48', '050616', 'UPAHUACHO', '1');
INSERT INTO `distritos` VALUES ('506', '49', '050701', 'HUANCAPI', '1');
INSERT INTO `distritos` VALUES ('507', '49', '050702', 'ALCAMENCA', '1');
INSERT INTO `distritos` VALUES ('508', '49', '050703', 'APONGO', '1');
INSERT INTO `distritos` VALUES ('509', '49', '050704', 'CANARIA', '1');
INSERT INTO `distritos` VALUES ('510', '49', '050706', 'CAYARA', '1');
INSERT INTO `distritos` VALUES ('511', '49', '050707', 'COLCA', '1');
INSERT INTO `distritos` VALUES ('512', '49', '050708', 'HUAYA', '1');
INSERT INTO `distritos` VALUES ('513', '49', '050709', 'HUAMANQUIQUIA', '1');
INSERT INTO `distritos` VALUES ('514', '49', '050710', 'HUANCARAYLLA', '1');
INSERT INTO `distritos` VALUES ('515', '49', '050713', 'SARHUA', '1');
INSERT INTO `distritos` VALUES ('516', '49', '050714', 'VILCANCHOS', '1');
INSERT INTO `distritos` VALUES ('517', '49', '050715', 'ASQUIPATA', '1');
INSERT INTO `distritos` VALUES ('518', '50', '050801', 'SANCOS', '1');
INSERT INTO `distritos` VALUES ('519', '50', '050802', 'SACSAMARCA', '1');
INSERT INTO `distritos` VALUES ('520', '50', '050803', 'SANTIAGO DE LUCANAMARCA', '1');
INSERT INTO `distritos` VALUES ('521', '50', '050804', 'CARAPO', '1');
INSERT INTO `distritos` VALUES ('522', '51', '050901', 'VILCAS HUAMAN', '1');
INSERT INTO `distritos` VALUES ('523', '51', '050902', 'VISCHONGO', '1');
INSERT INTO `distritos` VALUES ('524', '51', '050903', 'ACCOMARCA', '1');
INSERT INTO `distritos` VALUES ('525', '51', '050904', 'CARHUANCA', '1');
INSERT INTO `distritos` VALUES ('526', '51', '050905', 'CONCEPCION', '1');
INSERT INTO `distritos` VALUES ('527', '51', '050906', 'HUAMBALPA', '1');
INSERT INTO `distritos` VALUES ('528', '51', '050907', 'SAURAMA', '1');
INSERT INTO `distritos` VALUES ('529', '51', '050908', 'INDEPENDENCIA', '1');
INSERT INTO `distritos` VALUES ('530', '52', '051001', 'PAUSA', '1');
INSERT INTO `distritos` VALUES ('531', '52', '051002', 'COLTA', '1');
INSERT INTO `distritos` VALUES ('532', '52', '051003', 'CORCULLA', '1');
INSERT INTO `distritos` VALUES ('533', '52', '051004', 'LAMPA', '1');
INSERT INTO `distritos` VALUES ('534', '52', '051005', 'MARCABAMBA', '1');
INSERT INTO `distritos` VALUES ('535', '52', '051006', 'OYOLO', '1');
INSERT INTO `distritos` VALUES ('536', '52', '051007', 'PARARCA', '1');
INSERT INTO `distritos` VALUES ('537', '52', '051008', 'SAN JAVIER DE ALPABAMBA', '1');
INSERT INTO `distritos` VALUES ('538', '52', '051009', 'SAN JOSE DE USHUA', '1');
INSERT INTO `distritos` VALUES ('539', '52', '051010', 'SARA SARA', '1');
INSERT INTO `distritos` VALUES ('540', '53', '051101', 'QUEROBAMBA', '1');
INSERT INTO `distritos` VALUES ('541', '53', '051102', 'BELEN', '1');
INSERT INTO `distritos` VALUES ('542', '53', '051103', 'CHALCOS', '1');
INSERT INTO `distritos` VALUES ('543', '53', '051104', 'SAN SALVADOR DE QUIJE', '1');
INSERT INTO `distritos` VALUES ('544', '53', '051105', 'PAICO', '1');
INSERT INTO `distritos` VALUES ('545', '53', '051106', 'SANTIAGO DE PAUCARAY', '1');
INSERT INTO `distritos` VALUES ('546', '53', '051107', 'SAN PEDRO DE LARCAY', '1');
INSERT INTO `distritos` VALUES ('547', '53', '051108', 'SORAS', '1');
INSERT INTO `distritos` VALUES ('548', '53', '051109', 'HUACANA', '1');
INSERT INTO `distritos` VALUES ('549', '53', '051110', 'CHILCAYOC', '1');
INSERT INTO `distritos` VALUES ('550', '53', '051111', 'MORCOLLA', '1');
INSERT INTO `distritos` VALUES ('551', '54', '060101', 'CAJAMARCA', '1');
INSERT INTO `distritos` VALUES ('552', '54', '060102', 'ASUNCION', '1');
INSERT INTO `distritos` VALUES ('553', '54', '060103', 'COSPAN', '1');
INSERT INTO `distritos` VALUES ('554', '54', '060104', 'CHETILLA', '1');
INSERT INTO `distritos` VALUES ('555', '54', '060105', 'ENCANADA', '1');
INSERT INTO `distritos` VALUES ('556', '54', '060106', 'JESUS', '1');
INSERT INTO `distritos` VALUES ('557', '54', '060107', 'LOS BANOS DEL INCA', '1');
INSERT INTO `distritos` VALUES ('558', '54', '060108', 'LLACANORA', '1');
INSERT INTO `distritos` VALUES ('559', '54', '060109', 'MAGDALENA', '1');
INSERT INTO `distritos` VALUES ('560', '54', '060110', 'MATARA', '1');
INSERT INTO `distritos` VALUES ('561', '54', '060111', 'NAMORA', '1');
INSERT INTO `distritos` VALUES ('562', '54', '060112', 'SAN JUAN', '1');
INSERT INTO `distritos` VALUES ('563', '55', '060201', 'CAJABAMBA', '1');
INSERT INTO `distritos` VALUES ('564', '55', '060202', 'CACHACHI', '1');
INSERT INTO `distritos` VALUES ('565', '55', '060203', 'CONDEBAMBA', '1');
INSERT INTO `distritos` VALUES ('566', '55', '060205', 'SITACOCHA', '1');
INSERT INTO `distritos` VALUES ('567', '56', '060301', 'CELENDIN', '1');
INSERT INTO `distritos` VALUES ('568', '56', '060302', 'CORTEGANA', '1');
INSERT INTO `distritos` VALUES ('569', '56', '060303', 'CHUMUCH', '1');
INSERT INTO `distritos` VALUES ('570', '56', '060304', 'HUASMIN', '1');
INSERT INTO `distritos` VALUES ('571', '56', '060305', 'JORGE CHAVEZ', '1');
INSERT INTO `distritos` VALUES ('572', '56', '060306', 'JOSE GALVEZ', '1');
INSERT INTO `distritos` VALUES ('573', '56', '060307', 'MIGUEL IGLESIAS', '1');
INSERT INTO `distritos` VALUES ('574', '56', '060308', 'OXAMARCA', '1');
INSERT INTO `distritos` VALUES ('575', '56', '060309', 'SOROCHUCO', '1');
INSERT INTO `distritos` VALUES ('576', '56', '060310', 'SUCRE', '1');
INSERT INTO `distritos` VALUES ('577', '56', '060311', 'UTCO', '1');
INSERT INTO `distritos` VALUES ('578', '56', '060312', 'LA LIBERTAD DE PALLAN', '1');
INSERT INTO `distritos` VALUES ('579', '57', '060401', 'CONTUMAZA', '1');
INSERT INTO `distritos` VALUES ('580', '57', '060403', 'CHILETE', '1');
INSERT INTO `distritos` VALUES ('581', '57', '060404', 'GUZMANGO', '1');
INSERT INTO `distritos` VALUES ('582', '57', '060405', 'SAN BENITO', '1');
INSERT INTO `distritos` VALUES ('583', '57', '060406', 'CUPISNIQUE', '1');
INSERT INTO `distritos` VALUES ('584', '57', '060407', 'TANTARICA', '1');
INSERT INTO `distritos` VALUES ('585', '57', '060408', 'YONAN', '1');
INSERT INTO `distritos` VALUES ('586', '57', '060409', 'STA CRUZ DE TOLEDO', '1');
INSERT INTO `distritos` VALUES ('587', '58', '060501', 'CUTERVO', '1');
INSERT INTO `distritos` VALUES ('588', '58', '060502', 'CALLAYUC', '1');
INSERT INTO `distritos` VALUES ('589', '58', '060503', 'CUJILLO', '1');
INSERT INTO `distritos` VALUES ('590', '58', '060504', 'CHOROS', '1');
INSERT INTO `distritos` VALUES ('591', '58', '060505', 'LA RAMADA', '1');
INSERT INTO `distritos` VALUES ('592', '58', '060506', 'PIMPINGOS', '1');
INSERT INTO `distritos` VALUES ('593', '58', '060507', 'QUEROCOTILLO', '1');
INSERT INTO `distritos` VALUES ('594', '58', '060508', 'SAN ANDRES DE CUTERVO', '1');
INSERT INTO `distritos` VALUES ('595', '58', '060509', 'SAN JUAN DE CUTERVO', '1');
INSERT INTO `distritos` VALUES ('596', '58', '060510', 'SAN LUIS DE LUCMA', '1');
INSERT INTO `distritos` VALUES ('597', '58', '060511', 'SANTA CRUZ', '1');
INSERT INTO `distritos` VALUES ('598', '58', '060512', 'SANTO DOMINGO DE LA CAPILLA', '1');
INSERT INTO `distritos` VALUES ('599', '58', '060513', 'SANTO TOMAS', '1');
INSERT INTO `distritos` VALUES ('600', '58', '060514', 'SOCOTA', '1');
INSERT INTO `distritos` VALUES ('601', '58', '060515', 'TORIBIO CASANOVA', '1');
INSERT INTO `distritos` VALUES ('602', '59', '060601', 'CHOTA', '1');
INSERT INTO `distritos` VALUES ('603', '59', '060602', 'ANGUIA', '1');
INSERT INTO `distritos` VALUES ('604', '59', '060603', 'COCHABAMBA', '1');
INSERT INTO `distritos` VALUES ('605', '59', '060604', 'CONCHAN', '1');
INSERT INTO `distritos` VALUES ('606', '59', '060605', 'CHADIN', '1');
INSERT INTO `distritos` VALUES ('607', '59', '060606', 'CHIGUIRIP', '1');
INSERT INTO `distritos` VALUES ('608', '59', '060607', 'CHIMBAN', '1');
INSERT INTO `distritos` VALUES ('609', '59', '060608', 'HUAMBOS', '1');
INSERT INTO `distritos` VALUES ('610', '59', '060609', 'LAJAS', '1');
INSERT INTO `distritos` VALUES ('611', '59', '060610', 'LLAMA', '1');
INSERT INTO `distritos` VALUES ('612', '59', '060611', 'MIRACOSTA', '1');
INSERT INTO `distritos` VALUES ('613', '59', '060612', 'PACCHA', '1');
INSERT INTO `distritos` VALUES ('614', '59', '060613', 'PION', '1');
INSERT INTO `distritos` VALUES ('615', '59', '060614', 'QUEROCOTO', '1');
INSERT INTO `distritos` VALUES ('616', '59', '060615', 'TACABAMBA', '1');
INSERT INTO `distritos` VALUES ('617', '59', '060616', 'TOCMOCHE', '1');
INSERT INTO `distritos` VALUES ('618', '59', '060617', 'SAN JUAN DE LICUPIS', '1');
INSERT INTO `distritos` VALUES ('619', '59', '060618', 'CHOROPAMPA', '1');
INSERT INTO `distritos` VALUES ('620', '59', '060619', 'CHALAMARCA', '1');
INSERT INTO `distritos` VALUES ('621', '60', '060701', 'BAMBAMARCA', '1');
INSERT INTO `distritos` VALUES ('622', '60', '060702', 'CHUGUR', '1');
INSERT INTO `distritos` VALUES ('623', '60', '060703', 'HUALGAYOC', '1');
INSERT INTO `distritos` VALUES ('624', '61', '060801', 'JAEN', '1');
INSERT INTO `distritos` VALUES ('625', '61', '060802', 'BELLAVISTA', '1');
INSERT INTO `distritos` VALUES ('626', '61', '060803', 'COLASAY', '1');
INSERT INTO `distritos` VALUES ('627', '61', '060804', 'CHONTALI', '1');
INSERT INTO `distritos` VALUES ('628', '61', '060805', 'POMAHUACA', '1');
INSERT INTO `distritos` VALUES ('629', '61', '060806', 'PUCARA', '1');
INSERT INTO `distritos` VALUES ('630', '61', '060807', 'SALLIQUE', '1');
INSERT INTO `distritos` VALUES ('631', '61', '060808', 'SAN FELIPE', '1');
INSERT INTO `distritos` VALUES ('632', '61', '060809', 'SAN JOSE DEL ALTO', '1');
INSERT INTO `distritos` VALUES ('633', '61', '060810', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('634', '61', '060811', 'LAS PIRIAS', '1');
INSERT INTO `distritos` VALUES ('635', '61', '060812', 'HUABAL', '1');
INSERT INTO `distritos` VALUES ('636', '62', '060901', 'SANTA CRUZ', '1');
INSERT INTO `distritos` VALUES ('637', '62', '060902', 'CATACHE', '1');
INSERT INTO `distritos` VALUES ('638', '62', '060903', 'CHANCAIBANOS', '1');
INSERT INTO `distritos` VALUES ('639', '62', '060904', 'LA ESPERANZA', '1');
INSERT INTO `distritos` VALUES ('640', '62', '060905', 'NINABAMBA', '1');
INSERT INTO `distritos` VALUES ('641', '62', '060906', 'PULAN', '1');
INSERT INTO `distritos` VALUES ('642', '62', '060907', 'SEXI', '1');
INSERT INTO `distritos` VALUES ('643', '62', '060908', 'UTICYACU', '1');
INSERT INTO `distritos` VALUES ('644', '62', '060909', 'YAUYUCAN', '1');
INSERT INTO `distritos` VALUES ('645', '62', '060910', 'ANDABAMBA', '1');
INSERT INTO `distritos` VALUES ('646', '62', '060911', 'SAUCEPAMPA', '1');
INSERT INTO `distritos` VALUES ('647', '63', '061001', 'SAN MIGUEL', '1');
INSERT INTO `distritos` VALUES ('648', '63', '061002', 'CALQUIS', '1');
INSERT INTO `distritos` VALUES ('649', '63', '061003', 'LA FLORIDA', '1');
INSERT INTO `distritos` VALUES ('650', '63', '061004', 'LLAPA', '1');
INSERT INTO `distritos` VALUES ('651', '63', '061005', 'NANCHOC', '1');
INSERT INTO `distritos` VALUES ('652', '63', '061006', 'NIEPOS', '1');
INSERT INTO `distritos` VALUES ('653', '63', '061007', 'SAN GREGORIO', '1');
INSERT INTO `distritos` VALUES ('654', '63', '061008', 'SAN SILVESTRE DE COCHAN', '1');
INSERT INTO `distritos` VALUES ('655', '63', '061009', 'EL PRADO', '1');
INSERT INTO `distritos` VALUES ('656', '63', '061010', 'UNION AGUA BLANCA', '1');
INSERT INTO `distritos` VALUES ('657', '63', '061011', 'TONGOD', '1');
INSERT INTO `distritos` VALUES ('658', '63', '061012', 'CATILLUC', '1');
INSERT INTO `distritos` VALUES ('659', '63', '061013', 'BOLIVAR', '1');
INSERT INTO `distritos` VALUES ('660', '64', '061101', 'SAN IGNACIO', '1');
INSERT INTO `distritos` VALUES ('661', '64', '061102', 'CHIRINOS', '1');
INSERT INTO `distritos` VALUES ('662', '64', '061103', 'HUARANGO', '1');
INSERT INTO `distritos` VALUES ('663', '64', '061104', 'NAMBALLE', '1');
INSERT INTO `distritos` VALUES ('664', '64', '061105', 'LA COIPA', '1');
INSERT INTO `distritos` VALUES ('665', '64', '061106', 'SAN JOSE DE LOURDES', '1');
INSERT INTO `distritos` VALUES ('666', '64', '061107', 'TABACONAS', '1');
INSERT INTO `distritos` VALUES ('667', '65', '061201', 'PEDRO GALVEZ', '1');
INSERT INTO `distritos` VALUES ('668', '65', '061202', 'ICHOCAN', '1');
INSERT INTO `distritos` VALUES ('669', '65', '061203', 'GREGORIO PITA', '1');
INSERT INTO `distritos` VALUES ('670', '65', '061204', 'JOSE MANUEL QUIROZ', '1');
INSERT INTO `distritos` VALUES ('671', '65', '061205', 'EDUARDO VILLANUEVA', '1');
INSERT INTO `distritos` VALUES ('672', '65', '061206', 'JOSE SABOGAL', '1');
INSERT INTO `distritos` VALUES ('673', '65', '061207', 'CHANCAY', '1');
INSERT INTO `distritos` VALUES ('674', '66', '061301', 'SAN PABLO', '1');
INSERT INTO `distritos` VALUES ('675', '66', '061302', 'SAN BERNARDINO', '1');
INSERT INTO `distritos` VALUES ('676', '66', '061303', 'SAN LUIS', '1');
INSERT INTO `distritos` VALUES ('677', '66', '061304', 'TUMBADEN', '1');
INSERT INTO `distritos` VALUES ('678', '67', '070101', 'CUSCO', '1');
INSERT INTO `distritos` VALUES ('679', '67', '070102', 'CCORCA', '1');
INSERT INTO `distritos` VALUES ('680', '67', '070103', 'POROY', '1');
INSERT INTO `distritos` VALUES ('681', '67', '070104', 'SAN JERONIMO', '1');
INSERT INTO `distritos` VALUES ('682', '67', '070105', 'SAN SEBASTIAN', '1');
INSERT INTO `distritos` VALUES ('683', '67', '070106', 'SANTIAGO', '1');
INSERT INTO `distritos` VALUES ('684', '67', '070107', 'SAYLLA', '1');
INSERT INTO `distritos` VALUES ('685', '67', '070108', 'WANCHAQ', '1');
INSERT INTO `distritos` VALUES ('686', '68', '070201', 'ACOMAYO', '1');
INSERT INTO `distritos` VALUES ('687', '68', '070202', 'ACOPIA', '1');
INSERT INTO `distritos` VALUES ('688', '68', '070203', 'ACOS', '1');
INSERT INTO `distritos` VALUES ('689', '68', '070204', 'POMACANCHI', '1');
INSERT INTO `distritos` VALUES ('690', '68', '070205', 'RONDOCAN', '1');
INSERT INTO `distritos` VALUES ('691', '68', '070206', 'SANGARARA', '1');
INSERT INTO `distritos` VALUES ('692', '68', '070207', 'MOSOC LLACTA', '1');
INSERT INTO `distritos` VALUES ('693', '69', '070301', 'ANTA', '1');
INSERT INTO `distritos` VALUES ('694', '69', '070302', 'CHINCHAYPUJIO', '1');
INSERT INTO `distritos` VALUES ('695', '69', '070303', 'HUAROCONDO', '1');
INSERT INTO `distritos` VALUES ('696', '69', '070304', 'LIMATAMBO', '1');
INSERT INTO `distritos` VALUES ('697', '69', '070305', 'MOLLEPATA', '1');
INSERT INTO `distritos` VALUES ('698', '69', '070306', 'PUCYURA', '1');
INSERT INTO `distritos` VALUES ('699', '69', '070307', 'ZURITE', '1');
INSERT INTO `distritos` VALUES ('700', '69', '070308', 'CACHIMAYO', '1');
INSERT INTO `distritos` VALUES ('701', '69', '070309', 'ANCAHUASI', '1');
INSERT INTO `distritos` VALUES ('702', '70', '070401', 'CALCA', '1');
INSERT INTO `distritos` VALUES ('703', '70', '070402', 'COYA', '1');
INSERT INTO `distritos` VALUES ('704', '70', '070403', 'LAMAY', '1');
INSERT INTO `distritos` VALUES ('705', '70', '070404', 'LARES', '1');
INSERT INTO `distritos` VALUES ('706', '70', '070405', 'PISAC', '1');
INSERT INTO `distritos` VALUES ('707', '70', '070406', 'SAN SALVADOR', '1');
INSERT INTO `distritos` VALUES ('708', '70', '070407', 'TARAY', '1');
INSERT INTO `distritos` VALUES ('709', '70', '070408', 'YANATILE', '1');
INSERT INTO `distritos` VALUES ('710', '71', '070501', 'YANAOCA', '1');
INSERT INTO `distritos` VALUES ('711', '71', '070502', 'CHECCA', '1');
INSERT INTO `distritos` VALUES ('712', '71', '070503', 'KUNTURKANKI', '1');
INSERT INTO `distritos` VALUES ('713', '71', '070504', 'LANGUI', '1');
INSERT INTO `distritos` VALUES ('714', '71', '070505', 'LAYO', '1');
INSERT INTO `distritos` VALUES ('715', '71', '070506', 'PAMPAMARCA', '1');
INSERT INTO `distritos` VALUES ('716', '71', '070507', 'QUEHUE', '1');
INSERT INTO `distritos` VALUES ('717', '71', '070508', 'TUPAC AMARU', '1');
INSERT INTO `distritos` VALUES ('718', '72', '070601', 'SICUANI', '1');
INSERT INTO `distritos` VALUES ('719', '72', '070602', 'COMBAPATA', '1');
INSERT INTO `distritos` VALUES ('720', '72', '070603', 'CHECACUPE', '1');
INSERT INTO `distritos` VALUES ('721', '72', '070604', 'MARANGANI', '1');
INSERT INTO `distritos` VALUES ('722', '72', '070605', 'PITUMARCA', '1');
INSERT INTO `distritos` VALUES ('723', '72', '070606', 'SAN PABLO', '1');
INSERT INTO `distritos` VALUES ('724', '72', '070607', 'SAN PEDRO', '1');
INSERT INTO `distritos` VALUES ('725', '72', '070608', 'TINTA', '1');
INSERT INTO `distritos` VALUES ('726', '73', '070701', 'SANTO TOMAS', '1');
INSERT INTO `distritos` VALUES ('727', '73', '070702', 'CAPACMARCA', '1');
INSERT INTO `distritos` VALUES ('728', '73', '070703', 'COLQUEMARCA', '1');
INSERT INTO `distritos` VALUES ('729', '73', '070704', 'CHAMACA', '1');
INSERT INTO `distritos` VALUES ('730', '73', '070705', 'LIVITACA', '1');
INSERT INTO `distritos` VALUES ('731', '73', '070706', 'LLUSCO', '1');
INSERT INTO `distritos` VALUES ('732', '73', '070707', 'QUINOTA', '1');
INSERT INTO `distritos` VALUES ('733', '73', '070708', 'VELILLE', '1');
INSERT INTO `distritos` VALUES ('734', '74', '070801', 'ESPINAR', '1');
INSERT INTO `distritos` VALUES ('735', '74', '070802', 'CONDOROMA', '1');
INSERT INTO `distritos` VALUES ('736', '74', '070803', 'COPORAQUE', '1');
INSERT INTO `distritos` VALUES ('737', '74', '070804', 'OCORURO', '1');
INSERT INTO `distritos` VALUES ('738', '74', '070805', 'PALLPATA', '1');
INSERT INTO `distritos` VALUES ('739', '74', '070806', 'PICHIGUA', '1');
INSERT INTO `distritos` VALUES ('740', '74', '070807', 'SUYKUTAMBO', '1');
INSERT INTO `distritos` VALUES ('741', '74', '070808', 'ALTO PICHIGUA', '1');
INSERT INTO `distritos` VALUES ('742', '75', '070901', 'SANTA ANA', '1');
INSERT INTO `distritos` VALUES ('743', '75', '070902', 'ECHARATE', '1');
INSERT INTO `distritos` VALUES ('744', '75', '070903', 'HUAYOPATA', '1');
INSERT INTO `distritos` VALUES ('745', '75', '070904', 'MARANURA', '1');
INSERT INTO `distritos` VALUES ('746', '75', '070905', 'OCOBAMBA', '1');
INSERT INTO `distritos` VALUES ('747', '75', '070906', 'SANTA TERESA', '1');
INSERT INTO `distritos` VALUES ('748', '75', '070907', 'VILCABAMBA', '1');
INSERT INTO `distritos` VALUES ('749', '75', '070908', 'QUELLOUNO', '1');
INSERT INTO `distritos` VALUES ('750', '75', '070909', 'KIMBIRI', '1');
INSERT INTO `distritos` VALUES ('751', '75', '070910', 'PICHARI', '1');
INSERT INTO `distritos` VALUES ('752', '76', '071001', 'PARURO', '1');
INSERT INTO `distritos` VALUES ('753', '76', '071002', 'ACCHA', '1');
INSERT INTO `distritos` VALUES ('754', '76', '071003', 'CCAPI', '1');
INSERT INTO `distritos` VALUES ('755', '76', '071004', 'COLCHA', '1');
INSERT INTO `distritos` VALUES ('756', '76', '071005', 'HUANOQUITE', '1');
INSERT INTO `distritos` VALUES ('757', '76', '071006', 'OMACHA', '1');
INSERT INTO `distritos` VALUES ('758', '76', '071007', 'YAURISQUE', '1');
INSERT INTO `distritos` VALUES ('759', '76', '071008', 'PACCARITAMBO', '1');
INSERT INTO `distritos` VALUES ('760', '76', '071009', 'PILLPINTO', '1');
INSERT INTO `distritos` VALUES ('761', '77', '071101', 'PAUCARTAMBO', '1');
INSERT INTO `distritos` VALUES ('762', '77', '071102', 'CAICAY', '1');
INSERT INTO `distritos` VALUES ('763', '77', '071103', 'COLQUEPATA', '1');
INSERT INTO `distritos` VALUES ('764', '77', '071104', 'CHALLABAMBA', '1');
INSERT INTO `distritos` VALUES ('765', '77', '071105', 'COSNIPATA', '1');
INSERT INTO `distritos` VALUES ('766', '77', '071106', 'HUANCARANI', '1');
INSERT INTO `distritos` VALUES ('767', '78', '071201', 'URCOS', '1');
INSERT INTO `distritos` VALUES ('768', '78', '071202', 'ANDAHUAYLILLAS', '1');
INSERT INTO `distritos` VALUES ('769', '78', '071203', 'CAMANTI', '1');
INSERT INTO `distritos` VALUES ('770', '78', '071204', 'CCARHUAYO', '1');
INSERT INTO `distritos` VALUES ('771', '78', '071205', 'CCATCA', '1');
INSERT INTO `distritos` VALUES ('772', '78', '071206', 'CUSIPATA', '1');
INSERT INTO `distritos` VALUES ('773', '78', '071207', 'HUARO', '1');
INSERT INTO `distritos` VALUES ('774', '78', '071208', 'LUCRE', '1');
INSERT INTO `distritos` VALUES ('775', '78', '071209', 'MARCAPATA', '1');
INSERT INTO `distritos` VALUES ('776', '78', '071210', 'OCONGATE', '1');
INSERT INTO `distritos` VALUES ('777', '78', '071211', 'OROPESA', '1');
INSERT INTO `distritos` VALUES ('778', '78', '071212', 'QUIQUIJANA', '1');
INSERT INTO `distritos` VALUES ('779', '79', '071301', 'URUBAMBA', '1');
INSERT INTO `distritos` VALUES ('780', '79', '071302', 'CHINCHERO', '1');
INSERT INTO `distritos` VALUES ('781', '79', '071303', 'HUAYLLABAMBA', '1');
INSERT INTO `distritos` VALUES ('782', '79', '071304', 'MACHUPICCHU', '1');
INSERT INTO `distritos` VALUES ('783', '79', '071305', 'MARAS', '1');
INSERT INTO `distritos` VALUES ('784', '79', '071306', 'OLLANTAYTAMBO', '1');
INSERT INTO `distritos` VALUES ('785', '79', '071307', 'YUCAY', '1');
INSERT INTO `distritos` VALUES ('786', '80', '080101', 'HUANCAVELICA', '1');
INSERT INTO `distritos` VALUES ('787', '80', '080102', 'ACOBAMBILLA', '1');
INSERT INTO `distritos` VALUES ('788', '80', '080103', 'ACORIA', '1');
INSERT INTO `distritos` VALUES ('789', '80', '080104', 'CONAYCA', '1');
INSERT INTO `distritos` VALUES ('790', '80', '080105', 'CUENCA', '1');
INSERT INTO `distritos` VALUES ('791', '80', '080106', 'HUACHOCOLPA', '1');
INSERT INTO `distritos` VALUES ('792', '80', '080108', 'HUAYLLAHUARA', '1');
INSERT INTO `distritos` VALUES ('793', '80', '080109', 'IZCUCHACA', '1');
INSERT INTO `distritos` VALUES ('794', '80', '080110', 'LARIA', '1');
INSERT INTO `distritos` VALUES ('795', '80', '080111', 'MANTA', '1');
INSERT INTO `distritos` VALUES ('796', '80', '080112', 'MARISCAL CACERES', '1');
INSERT INTO `distritos` VALUES ('797', '80', '080113', 'MOYA', '1');
INSERT INTO `distritos` VALUES ('798', '80', '080114', 'NUEVO OCCORO', '1');
INSERT INTO `distritos` VALUES ('799', '80', '080115', 'PALCA', '1');
INSERT INTO `distritos` VALUES ('800', '80', '080116', 'PILCHACA', '1');
INSERT INTO `distritos` VALUES ('801', '80', '080117', 'VILCA', '1');
INSERT INTO `distritos` VALUES ('802', '80', '080118', 'YAULI', '1');
INSERT INTO `distritos` VALUES ('803', '80', '080119', 'ASCENCION', '1');
INSERT INTO `distritos` VALUES ('804', '80', '080120', 'HUANDO', '1');
INSERT INTO `distritos` VALUES ('805', '81', '080201', 'ACOBAMBA', '1');
INSERT INTO `distritos` VALUES ('806', '81', '080202', 'ANTA', '1');
INSERT INTO `distritos` VALUES ('807', '81', '080203', 'ANDABAMBA', '1');
INSERT INTO `distritos` VALUES ('808', '81', '080204', 'CAJA', '1');
INSERT INTO `distritos` VALUES ('809', '81', '080205', 'MARCAS', '1');
INSERT INTO `distritos` VALUES ('810', '81', '080206', 'PAUCARA', '1');
INSERT INTO `distritos` VALUES ('811', '81', '080207', 'POMACOCHA', '1');
INSERT INTO `distritos` VALUES ('812', '81', '080208', 'ROSARIO', '1');
INSERT INTO `distritos` VALUES ('813', '82', '080301', 'LIRCAY', '1');
INSERT INTO `distritos` VALUES ('814', '82', '080302', 'ANCHONGA', '1');
INSERT INTO `distritos` VALUES ('815', '82', '080303', 'CALLANMARCA', '1');
INSERT INTO `distritos` VALUES ('816', '82', '080304', 'CONGALLA', '1');
INSERT INTO `distritos` VALUES ('817', '82', '080305', 'CHINCHO', '1');
INSERT INTO `distritos` VALUES ('818', '82', '080306', 'HUAYLLAY GRANDE', '1');
INSERT INTO `distritos` VALUES ('819', '82', '080307', 'HUANCA HUANCA', '1');
INSERT INTO `distritos` VALUES ('820', '82', '080308', 'JULCAMARCA', '1');
INSERT INTO `distritos` VALUES ('821', '82', '080309', 'SAN ANTONIO DE ANTAPARCO', '1');
INSERT INTO `distritos` VALUES ('822', '82', '080310', 'STO TOMAS DE PATA', '1');
INSERT INTO `distritos` VALUES ('823', '82', '080311', 'SECCLLA', '1');
INSERT INTO `distritos` VALUES ('824', '82', '080312', 'CCOCHACCASA', '1');
INSERT INTO `distritos` VALUES ('825', '83', '080401', 'CASTROVIRREYNA', '1');
INSERT INTO `distritos` VALUES ('826', '83', '080402', 'ARMA', '1');
INSERT INTO `distritos` VALUES ('827', '83', '080403', 'AURAHUA', '1');
INSERT INTO `distritos` VALUES ('828', '83', '080405', 'CAPILLAS', '1');
INSERT INTO `distritos` VALUES ('829', '83', '080406', 'COCAS', '1');
INSERT INTO `distritos` VALUES ('830', '83', '080408', 'CHUPAMARCA', '1');
INSERT INTO `distritos` VALUES ('831', '83', '080409', 'HUACHOS', '1');
INSERT INTO `distritos` VALUES ('832', '83', '080410', 'HUAMATAMBO', '1');
INSERT INTO `distritos` VALUES ('833', '83', '080414', 'MOLLEPAMPA', '1');
INSERT INTO `distritos` VALUES ('834', '83', '080422', 'SAN JUAN', '1');
INSERT INTO `distritos` VALUES ('835', '83', '080427', 'TANTARA', '1');
INSERT INTO `distritos` VALUES ('836', '83', '080428', 'TICRAPO', '1');
INSERT INTO `distritos` VALUES ('837', '83', '080429', 'SANTA ANA', '1');
INSERT INTO `distritos` VALUES ('838', '84', '080501', 'PAMPAS', '1');
INSERT INTO `distritos` VALUES ('839', '84', '080502', 'ACOSTAMBO', '1');
INSERT INTO `distritos` VALUES ('840', '84', '080503', 'ACRAQUIA', '1');
INSERT INTO `distritos` VALUES ('841', '84', '080504', 'AHUAYCHA', '1');
INSERT INTO `distritos` VALUES ('842', '84', '080506', 'COLCABAMBA', '1');
INSERT INTO `distritos` VALUES ('843', '84', '080509', 'DANIEL HERNANDEZ', '1');
INSERT INTO `distritos` VALUES ('844', '84', '080511', 'HUACHOCOLPA', '1');
INSERT INTO `distritos` VALUES ('845', '84', '080512', 'HUARIBAMBA', '1');
INSERT INTO `distritos` VALUES ('846', '84', '080515', 'NAHUIMPUQUIO', '1');
INSERT INTO `distritos` VALUES ('847', '84', '080517', 'PAZOS', '1');
INSERT INTO `distritos` VALUES ('848', '84', '080518', 'QUISHUAR', '1');
INSERT INTO `distritos` VALUES ('849', '84', '080519', 'SALCABAMBA', '1');
INSERT INTO `distritos` VALUES ('850', '84', '080520', 'SAN MARCOS DE ROCCHAC', '1');
INSERT INTO `distritos` VALUES ('851', '84', '080523', 'SURCUBAMBA', '1');
INSERT INTO `distritos` VALUES ('852', '84', '080525', 'TINTAY PUNCU', '1');
INSERT INTO `distritos` VALUES ('853', '84', '080526', 'SALCAHUASI', '1');
INSERT INTO `distritos` VALUES ('854', '85', '080601', 'AYAVI', '1');
INSERT INTO `distritos` VALUES ('855', '85', '080602', 'CORDOVA', '1');
INSERT INTO `distritos` VALUES ('856', '85', '080603', 'HUAYACUNDO ARMA', '1');
INSERT INTO `distritos` VALUES ('857', '85', '080604', 'HUAYTARA', '1');
INSERT INTO `distritos` VALUES ('858', '85', '080605', 'LARAMARCA', '1');
INSERT INTO `distritos` VALUES ('859', '85', '080606', 'OCOYO', '1');
INSERT INTO `distritos` VALUES ('860', '85', '080607', 'PILPICHACA', '1');
INSERT INTO `distritos` VALUES ('861', '85', '080608', 'QUERCO', '1');
INSERT INTO `distritos` VALUES ('862', '85', '080609', 'QUITO ARMA', '1');
INSERT INTO `distritos` VALUES ('863', '85', '080610', 'SAN ANTONIO DE CUSICANCHA', '1');
INSERT INTO `distritos` VALUES ('864', '85', '080611', 'SAN FRANCISCO DE SANGAYAICO', '1');
INSERT INTO `distritos` VALUES ('865', '85', '080612', 'SAN ISIDRO', '1');
INSERT INTO `distritos` VALUES ('866', '85', '080613', 'SANTIAGO DE CHOCORVOS', '1');
INSERT INTO `distritos` VALUES ('867', '85', '080614', 'SANTIAGO DE QUIRAHUARA', '1');
INSERT INTO `distritos` VALUES ('868', '85', '080615', 'SANTO DOMINGO DE CAPILLA', '1');
INSERT INTO `distritos` VALUES ('869', '85', '080616', 'TAMBO', '1');
INSERT INTO `distritos` VALUES ('870', '86', '080701', 'CHURCAMPA', '1');
INSERT INTO `distritos` VALUES ('871', '86', '080702', 'ANCO', '1');
INSERT INTO `distritos` VALUES ('872', '86', '080703', 'CHINCHIHUASI', '1');
INSERT INTO `distritos` VALUES ('873', '86', '080704', 'EL CARMEN', '1');
INSERT INTO `distritos` VALUES ('874', '86', '080705', 'LA MERCED', '1');
INSERT INTO `distritos` VALUES ('875', '86', '080706', 'LOCROJA', '1');
INSERT INTO `distritos` VALUES ('876', '86', '080707', 'PAUCARBAMBA', '1');
INSERT INTO `distritos` VALUES ('877', '86', '080708', 'SAN MIGUEL DE MAYOC', '1');
INSERT INTO `distritos` VALUES ('878', '86', '080709', 'SAN PEDRO DE CORIS', '1');
INSERT INTO `distritos` VALUES ('879', '86', '080710', 'PACHAMARCA', '1');
INSERT INTO `distritos` VALUES ('880', '87', '090101', 'HUANUCO', '1');
INSERT INTO `distritos` VALUES ('881', '87', '090102', 'CHINCHAO', '1');
INSERT INTO `distritos` VALUES ('882', '87', '090103', 'CHURUBAMBA', '1');
INSERT INTO `distritos` VALUES ('883', '87', '090104', 'MARGOS', '1');
INSERT INTO `distritos` VALUES ('884', '87', '090105', 'QUISQUI', '1');
INSERT INTO `distritos` VALUES ('885', '87', '090106', 'SAN FCO DE CAYRAN', '1');
INSERT INTO `distritos` VALUES ('886', '87', '090107', 'SAN PEDRO DE CHAULAN', '1');
INSERT INTO `distritos` VALUES ('887', '87', '090108', 'STA MARIA DEL VALLE', '1');
INSERT INTO `distritos` VALUES ('888', '87', '090109', 'YARUMAYO', '1');
INSERT INTO `distritos` VALUES ('889', '87', '090110', 'AMARILIS', '1');
INSERT INTO `distritos` VALUES ('890', '87', '090111', 'PILLCO MARCA', '1');
INSERT INTO `distritos` VALUES ('891', '88', '090201', 'AMBO', '1');
INSERT INTO `distritos` VALUES ('892', '88', '090202', 'CAYNA', '1');
INSERT INTO `distritos` VALUES ('893', '88', '090203', 'COLPAS', '1');
INSERT INTO `distritos` VALUES ('894', '88', '090204', 'CONCHAMARCA', '1');
INSERT INTO `distritos` VALUES ('895', '88', '090205', 'HUACAR', '1');
INSERT INTO `distritos` VALUES ('896', '88', '090206', 'SAN FRANCISCO', '1');
INSERT INTO `distritos` VALUES ('897', '88', '090207', 'SAN RAFAEL', '1');
INSERT INTO `distritos` VALUES ('898', '88', '090208', 'TOMAY KICHWA', '1');
INSERT INTO `distritos` VALUES ('899', '89', '090301', 'LA UNION', '1');
INSERT INTO `distritos` VALUES ('900', '89', '090307', 'CHUQUIS', '1');
INSERT INTO `distritos` VALUES ('901', '89', '090312', 'MARIAS', '1');
INSERT INTO `distritos` VALUES ('902', '89', '090314', 'PACHAS', '1');
INSERT INTO `distritos` VALUES ('903', '89', '090316', 'QUIVILLA', '1');
INSERT INTO `distritos` VALUES ('904', '89', '090317', 'RIPAN', '1');
INSERT INTO `distritos` VALUES ('905', '89', '090321', 'SHUNQUI', '1');
INSERT INTO `distritos` VALUES ('906', '89', '090322', 'SILLAPATA', '1');
INSERT INTO `distritos` VALUES ('907', '89', '090323', 'YANAS', '1');
INSERT INTO `distritos` VALUES ('908', '90', '090401', 'LLATA', '1');
INSERT INTO `distritos` VALUES ('909', '90', '090402', 'ARANCAY', '1');
INSERT INTO `distritos` VALUES ('910', '90', '090403', 'CHAVIN DE PARIARCA', '1');
INSERT INTO `distritos` VALUES ('911', '90', '090404', 'JACAS GRANDE', '1');
INSERT INTO `distritos` VALUES ('912', '90', '090405', 'JIRCAN', '1');
INSERT INTO `distritos` VALUES ('913', '90', '090406', 'MIRAFLORES', '1');
INSERT INTO `distritos` VALUES ('914', '90', '090407', 'MONZON', '1');
INSERT INTO `distritos` VALUES ('915', '90', '090408', 'PUNCHAO', '1');
INSERT INTO `distritos` VALUES ('916', '90', '090409', 'PUNOS', '1');
INSERT INTO `distritos` VALUES ('917', '90', '090410', 'SINGA', '1');
INSERT INTO `distritos` VALUES ('918', '90', '090411', 'TANTAMAYO', '1');
INSERT INTO `distritos` VALUES ('919', '91', '090501', 'HUACRACHUCO', '1');
INSERT INTO `distritos` VALUES ('920', '91', '090502', 'CHOLON', '1');
INSERT INTO `distritos` VALUES ('921', '91', '090505', 'SAN BUENAVENTURA', '1');
INSERT INTO `distritos` VALUES ('922', '92', '090601', 'RUPA RUPA', '1');
INSERT INTO `distritos` VALUES ('923', '92', '090602', 'DANIEL ALOMIA ROBLES', '1');
INSERT INTO `distritos` VALUES ('924', '92', '090603', 'HERMILIO VALDIZAN', '1');
INSERT INTO `distritos` VALUES ('925', '92', '090604', 'LUYANDO', '1');
INSERT INTO `distritos` VALUES ('926', '92', '090605', 'MARIANO DAMASO BERAUN', '1');
INSERT INTO `distritos` VALUES ('927', '92', '090606', 'JOSE CRESPO Y CASTILLO', '1');
INSERT INTO `distritos` VALUES ('928', '93', '090701', 'PANAO', '1');
INSERT INTO `distritos` VALUES ('929', '93', '090702', 'CHAGLLA', '1');
INSERT INTO `distritos` VALUES ('930', '93', '090704', 'MOLINO', '1');
INSERT INTO `distritos` VALUES ('931', '93', '090706', 'UMARI', '1');
INSERT INTO `distritos` VALUES ('932', '94', '090801', 'HONORIA', '1');
INSERT INTO `distritos` VALUES ('933', '94', '090802', 'PUERTO INCA', '1');
INSERT INTO `distritos` VALUES ('934', '94', '090803', 'CODO DEL POZUZO', '1');
INSERT INTO `distritos` VALUES ('935', '94', '090804', 'TOURNAVISTA', '1');
INSERT INTO `distritos` VALUES ('936', '94', '090805', 'YUYAPICHIS', '1');
INSERT INTO `distritos` VALUES ('937', '95', '090901', 'HUACAYBAMBA', '1');
INSERT INTO `distritos` VALUES ('938', '95', '090902', 'PINRA', '1');
INSERT INTO `distritos` VALUES ('939', '95', '090903', 'CANCHABAMBA', '1');
INSERT INTO `distritos` VALUES ('940', '95', '090904', 'COCHABAMBA', '1');
INSERT INTO `distritos` VALUES ('941', '96', '091001', 'JESUS', '1');
INSERT INTO `distritos` VALUES ('942', '96', '091002', 'BANOS', '1');
INSERT INTO `distritos` VALUES ('943', '96', '091003', 'SAN FRANCISCO DE ASIS', '1');
INSERT INTO `distritos` VALUES ('944', '96', '091004', 'QUEROPALCA', '1');
INSERT INTO `distritos` VALUES ('945', '96', '091005', 'SAN MIGUEL DE CAURI', '1');
INSERT INTO `distritos` VALUES ('946', '96', '091006', 'RONDOS', '1');
INSERT INTO `distritos` VALUES ('947', '96', '091007', 'JIVIA', '1');
INSERT INTO `distritos` VALUES ('948', '97', '091101', 'CHAVINILLO', '1');
INSERT INTO `distritos` VALUES ('949', '97', '091102', 'APARICIO POMARES (CHUPAN)', '1');
INSERT INTO `distritos` VALUES ('950', '97', '091103', 'CAHUAC', '1');
INSERT INTO `distritos` VALUES ('951', '97', '091104', 'CHACABAMBA', '1');
INSERT INTO `distritos` VALUES ('952', '97', '091105', 'JACAS CHICO', '1');
INSERT INTO `distritos` VALUES ('953', '97', '091106', 'OBAS', '1');
INSERT INTO `distritos` VALUES ('954', '97', '091107', 'PAMPAMARCA', '1');
INSERT INTO `distritos` VALUES ('955', '97', '091108', 'CHORAS                   ', '1');
INSERT INTO `distritos` VALUES ('956', '98', '100101', 'ICA', '1');
INSERT INTO `distritos` VALUES ('957', '98', '100102', 'LA TINGUINA', '1');
INSERT INTO `distritos` VALUES ('958', '98', '100103', 'LOS AQUIJES', '1');
INSERT INTO `distritos` VALUES ('959', '98', '100104', 'PARCONA', '1');
INSERT INTO `distritos` VALUES ('960', '98', '100105', 'PUEBLO NUEVO', '1');
INSERT INTO `distritos` VALUES ('961', '98', '100106', 'SALAS', '1');
INSERT INTO `distritos` VALUES ('962', '98', '100107', 'SAN JOSE DE LOS MOLINOS', '1');
INSERT INTO `distritos` VALUES ('963', '98', '100108', 'SAN JUAN BAUTISTA', '1');
INSERT INTO `distritos` VALUES ('964', '98', '100109', 'SANTIAGO', '1');
INSERT INTO `distritos` VALUES ('965', '98', '100110', 'SUBTANJALLA', '1');
INSERT INTO `distritos` VALUES ('966', '98', '100111', 'YAUCA DEL ROSARIO', '1');
INSERT INTO `distritos` VALUES ('967', '98', '100112', 'TATE', '1');
INSERT INTO `distritos` VALUES ('968', '98', '100113', 'PACHACUTEC', '1');
INSERT INTO `distritos` VALUES ('969', '98', '100114', 'OCUCAJE', '1');
INSERT INTO `distritos` VALUES ('970', '99', '100201', 'CHINCHA ALTA', '1');
INSERT INTO `distritos` VALUES ('971', '99', '100202', 'CHAVIN', '1');
INSERT INTO `distritos` VALUES ('972', '99', '100203', 'CHINCHA BAJA', '1');
INSERT INTO `distritos` VALUES ('973', '99', '100204', 'EL CARMEN', '1');
INSERT INTO `distritos` VALUES ('974', '99', '100205', 'GROCIO PRADO', '1');
INSERT INTO `distritos` VALUES ('975', '99', '100206', 'SAN PEDRO DE HUACARPANA', '1');
INSERT INTO `distritos` VALUES ('976', '99', '100207', 'SUNAMPE', '1');
INSERT INTO `distritos` VALUES ('977', '99', '100208', 'TAMBO DE MORA', '1');
INSERT INTO `distritos` VALUES ('978', '99', '100209', 'ALTO LARAN', '1');
INSERT INTO `distritos` VALUES ('979', '99', '100210', 'PUEBLO NUEVO', '1');
INSERT INTO `distritos` VALUES ('980', '99', '100211', 'SAN JUAN DE YANAC', '1');
INSERT INTO `distritos` VALUES ('981', '100', '100301', 'NAZCA', '1');
INSERT INTO `distritos` VALUES ('982', '100', '100302', 'CHANGUILLO', '1');
INSERT INTO `distritos` VALUES ('983', '100', '100303', 'EL INGENIO', '1');
INSERT INTO `distritos` VALUES ('984', '100', '100304', 'MARCONA', '1');
INSERT INTO `distritos` VALUES ('985', '100', '100305', 'VISTA ALEGRE', '1');
INSERT INTO `distritos` VALUES ('986', '101', '100401', 'PISCO', '1');
INSERT INTO `distritos` VALUES ('987', '101', '100402', 'HUANCANO', '1');
INSERT INTO `distritos` VALUES ('988', '101', '100403', 'HUMAY', '1');
INSERT INTO `distritos` VALUES ('989', '101', '100404', 'INDEPENDENCIA', '1');
INSERT INTO `distritos` VALUES ('990', '101', '100405', 'PARACAS', '1');
INSERT INTO `distritos` VALUES ('991', '101', '100406', 'SAN ANDRES', '1');
INSERT INTO `distritos` VALUES ('992', '101', '100407', 'SAN CLEMENTE', '1');
INSERT INTO `distritos` VALUES ('993', '101', '100408', 'TUPAC AMARU INCA', '1');
INSERT INTO `distritos` VALUES ('994', '102', '100501', 'PALPA', '1');
INSERT INTO `distritos` VALUES ('995', '102', '100502', 'LLIPATA', '1');
INSERT INTO `distritos` VALUES ('996', '102', '100503', 'RIO GRANDE', '1');
INSERT INTO `distritos` VALUES ('997', '102', '100504', 'SANTA CRUZ', '1');
INSERT INTO `distritos` VALUES ('998', '102', '100505', 'TIBILLO', '1');
INSERT INTO `distritos` VALUES ('999', '103', '110101', 'HUANCAYO', '1');
INSERT INTO `distritos` VALUES ('1000', '103', '110103', 'CARHUACALLANGA', '1');
INSERT INTO `distritos` VALUES ('1001', '103', '110104', 'COLCA', '1');
INSERT INTO `distritos` VALUES ('1002', '103', '110105', 'CULLHUAS', '1');
INSERT INTO `distritos` VALUES ('1003', '103', '110106', 'CHACAPAMPA', '1');
INSERT INTO `distritos` VALUES ('1004', '103', '110107', 'CHICCHE', '1');
INSERT INTO `distritos` VALUES ('1005', '103', '110108', 'CHILCA', '1');
INSERT INTO `distritos` VALUES ('1006', '103', '110109', 'CHONGOS ALTO', '1');
INSERT INTO `distritos` VALUES ('1007', '103', '110112', 'CHUPURO', '1');
INSERT INTO `distritos` VALUES ('1008', '103', '110113', 'EL TAMBO', '1');
INSERT INTO `distritos` VALUES ('1009', '103', '110114', 'HUACRAPUQUIO', '1');
INSERT INTO `distritos` VALUES ('1010', '103', '110116', 'HUALHUAS', '1');
INSERT INTO `distritos` VALUES ('1011', '103', '110118', 'HUANCAN', '1');
INSERT INTO `distritos` VALUES ('1012', '103', '110119', 'HUASICANCHA', '1');
INSERT INTO `distritos` VALUES ('1013', '103', '110120', 'HUAYUCACHI', '1');
INSERT INTO `distritos` VALUES ('1014', '103', '110121', 'INGENIO', '1');
INSERT INTO `distritos` VALUES ('1015', '103', '110122', 'PARIAHUANCA', '1');
INSERT INTO `distritos` VALUES ('1016', '103', '110123', 'PILCOMAYO', '1');
INSERT INTO `distritos` VALUES ('1017', '103', '110124', 'PUCARA', '1');
INSERT INTO `distritos` VALUES ('1018', '103', '110125', 'QUICHUAY', '1');
INSERT INTO `distritos` VALUES ('1019', '103', '110126', 'QUILCAS', '1');
INSERT INTO `distritos` VALUES ('1020', '103', '110127', 'SAN AGUSTIN', '1');
INSERT INTO `distritos` VALUES ('1021', '103', '110128', 'SAN JERONIMO DE TUNAN', '1');
INSERT INTO `distritos` VALUES ('1022', '103', '110131', 'STO DOMINGO DE ACOBAMBA', '1');
INSERT INTO `distritos` VALUES ('1023', '103', '110132', 'SANO', '1');
INSERT INTO `distritos` VALUES ('1024', '103', '110133', 'SAPALLANGA', '1');
INSERT INTO `distritos` VALUES ('1025', '103', '110134', 'SICAYA', '1');
INSERT INTO `distritos` VALUES ('1026', '103', '110136', 'VIQUES', '1');
INSERT INTO `distritos` VALUES ('1027', '104', '110201', 'CONCEPCION', '1');
INSERT INTO `distritos` VALUES ('1028', '104', '110202', 'ACO', '1');
INSERT INTO `distritos` VALUES ('1029', '104', '110203', 'ANDAMARCA', '1');
INSERT INTO `distritos` VALUES ('1030', '104', '110204', 'COMAS', '1');
INSERT INTO `distritos` VALUES ('1031', '104', '110205', 'COCHAS', '1');
INSERT INTO `distritos` VALUES ('1032', '104', '110206', 'CHAMBARA', '1');
INSERT INTO `distritos` VALUES ('1033', '104', '110207', 'HEROINAS TOLEDO', '1');
INSERT INTO `distritos` VALUES ('1034', '104', '110208', 'MANZANARES', '1');
INSERT INTO `distritos` VALUES ('1035', '104', '110209', 'MCAL CASTILLA', '1');
INSERT INTO `distritos` VALUES ('1036', '104', '110210', 'MATAHUASI', '1');
INSERT INTO `distritos` VALUES ('1037', '104', '110211', 'MITO', '1');
INSERT INTO `distritos` VALUES ('1038', '104', '110212', 'NUEVE DE JULIO', '1');
INSERT INTO `distritos` VALUES ('1039', '104', '110213', 'ORCOTUNA', '1');
INSERT INTO `distritos` VALUES ('1040', '104', '110214', 'STA ROSA DE OCOPA', '1');
INSERT INTO `distritos` VALUES ('1041', '104', '110215', 'SAN JOSE DE QUERO', '1');
INSERT INTO `distritos` VALUES ('1042', '105', '110301', 'JAUJA', '1');
INSERT INTO `distritos` VALUES ('1043', '105', '110302', 'ACOLLA', '1');
INSERT INTO `distritos` VALUES ('1044', '105', '110303', 'APATA', '1');
INSERT INTO `distritos` VALUES ('1045', '105', '110304', 'ATAURA', '1');
INSERT INTO `distritos` VALUES ('1046', '105', '110305', 'CANCHAILLO', '1');
INSERT INTO `distritos` VALUES ('1047', '105', '110306', 'EL MANTARO', '1');
INSERT INTO `distritos` VALUES ('1048', '105', '110307', 'HUAMALI', '1');
INSERT INTO `distritos` VALUES ('1049', '105', '110308', 'HUARIPAMPA', '1');
INSERT INTO `distritos` VALUES ('1050', '105', '110309', 'HUERTAS', '1');
INSERT INTO `distritos` VALUES ('1051', '105', '110310', 'JANJAILLO', '1');
INSERT INTO `distritos` VALUES ('1052', '105', '110311', 'JULCAN', '1');
INSERT INTO `distritos` VALUES ('1053', '105', '110312', 'LEONOR ORDONEZ', '1');
INSERT INTO `distritos` VALUES ('1054', '105', '110313', 'LLOCLLAPAMPA', '1');
INSERT INTO `distritos` VALUES ('1055', '105', '110314', 'MARCO', '1');
INSERT INTO `distritos` VALUES ('1056', '105', '110315', 'MASMA', '1');
INSERT INTO `distritos` VALUES ('1057', '105', '110316', 'MOLINOS', '1');
INSERT INTO `distritos` VALUES ('1058', '105', '110317', 'MONOBAMBA', '1');
INSERT INTO `distritos` VALUES ('1059', '105', '110318', 'MUQUI', '1');
INSERT INTO `distritos` VALUES ('1060', '105', '110319', 'MUQUIYAUYO', '1');
INSERT INTO `distritos` VALUES ('1061', '105', '110320', 'PACA', '1');
INSERT INTO `distritos` VALUES ('1062', '105', '110321', 'PACCHA', '1');
INSERT INTO `distritos` VALUES ('1063', '105', '110322', 'PANCAN', '1');
INSERT INTO `distritos` VALUES ('1064', '105', '110323', 'PARCO', '1');
INSERT INTO `distritos` VALUES ('1065', '105', '110324', 'POMACANCHA', '1');
INSERT INTO `distritos` VALUES ('1066', '105', '110325', 'RICRAN', '1');
INSERT INTO `distritos` VALUES ('1067', '105', '110326', 'SAN LORENZO', '1');
INSERT INTO `distritos` VALUES ('1068', '105', '110327', 'SAN PEDRO DE CHUNAN', '1');
INSERT INTO `distritos` VALUES ('1069', '105', '110328', 'SINCOS', '1');
INSERT INTO `distritos` VALUES ('1070', '105', '110329', 'TUNAN MARCA', '1');
INSERT INTO `distritos` VALUES ('1071', '105', '110330', 'YAULI', '1');
INSERT INTO `distritos` VALUES ('1072', '105', '110331', 'CURICACA', '1');
INSERT INTO `distritos` VALUES ('1073', '105', '110332', 'MASMA CHICCHE', '1');
INSERT INTO `distritos` VALUES ('1074', '105', '110333', 'SAUSA', '1');
INSERT INTO `distritos` VALUES ('1075', '105', '110334', 'YAUYOS', '1');
INSERT INTO `distritos` VALUES ('1076', '106', '110401', 'JUNIN', '1');
INSERT INTO `distritos` VALUES ('1077', '106', '110402', 'CARHUAMAYO', '1');
INSERT INTO `distritos` VALUES ('1078', '106', '110403', 'ONDORES', '1');
INSERT INTO `distritos` VALUES ('1079', '106', '110404', 'ULCUMAYO', '1');
INSERT INTO `distritos` VALUES ('1080', '107', '110501', 'TARMA', '1');
INSERT INTO `distritos` VALUES ('1081', '107', '110502', 'ACOBAMBA', '1');
INSERT INTO `distritos` VALUES ('1082', '107', '110503', 'HUARICOLCA', '1');
INSERT INTO `distritos` VALUES ('1083', '107', '110504', 'HUASAHUASI', '1');
INSERT INTO `distritos` VALUES ('1084', '107', '110505', 'LA UNION', '1');
INSERT INTO `distritos` VALUES ('1085', '107', '110506', 'PALCA', '1');
INSERT INTO `distritos` VALUES ('1086', '107', '110507', 'PALCAMAYO', '1');
INSERT INTO `distritos` VALUES ('1087', '107', '110508', 'SAN PEDRO DE CAJAS', '1');
INSERT INTO `distritos` VALUES ('1088', '107', '110509', 'TAPO', '1');
INSERT INTO `distritos` VALUES ('1089', '108', '110601', 'LA OROYA', '1');
INSERT INTO `distritos` VALUES ('1090', '108', '110602', 'CHACAPALPA', '1');
INSERT INTO `distritos` VALUES ('1091', '108', '110603', 'HUAY HUAY', '1');
INSERT INTO `distritos` VALUES ('1092', '108', '110604', 'MARCAPOMACOCHA', '1');
INSERT INTO `distritos` VALUES ('1093', '108', '110605', 'MOROCOCHA', '1');
INSERT INTO `distritos` VALUES ('1094', '108', '110606', 'PACCHA', '1');
INSERT INTO `distritos` VALUES ('1095', '108', '110607', 'STA BARBARA DE CARHUACAYAN', '1');
INSERT INTO `distritos` VALUES ('1096', '108', '110608', 'SUITUCANCHA', '1');
INSERT INTO `distritos` VALUES ('1097', '108', '110609', 'YAULI', '1');
INSERT INTO `distritos` VALUES ('1098', '108', '110610', 'STA ROSA DE SACCO', '1');
INSERT INTO `distritos` VALUES ('1099', '109', '110701', 'SATIPO', '1');
INSERT INTO `distritos` VALUES ('1100', '109', '110702', 'COVIRIALI', '1');
INSERT INTO `distritos` VALUES ('1101', '109', '110703', 'LLAYLLA', '1');
INSERT INTO `distritos` VALUES ('1102', '109', '110704', 'MAZAMARI', '1');
INSERT INTO `distritos` VALUES ('1103', '109', '110705', 'PAMPA HERMOSA', '1');
INSERT INTO `distritos` VALUES ('1104', '109', '110706', 'PANGOA', '1');
INSERT INTO `distritos` VALUES ('1105', '109', '110707', 'RIO NEGRO', '1');
INSERT INTO `distritos` VALUES ('1106', '109', '110708', 'RIO TAMBO', '1');
INSERT INTO `distritos` VALUES ('1107', '110', '110801', 'CHANCHAMAYO', '1');
INSERT INTO `distritos` VALUES ('1108', '110', '110802', 'SAN RAMON', '1');
INSERT INTO `distritos` VALUES ('1109', '110', '110803', 'VITOC', '1');
INSERT INTO `distritos` VALUES ('1110', '110', '110804', 'SAN LUIS DE SHUARO', '1');
INSERT INTO `distritos` VALUES ('1111', '110', '110805', 'PICHANAQUI', '1');
INSERT INTO `distritos` VALUES ('1112', '110', '110806', 'PERENE', '1');
INSERT INTO `distritos` VALUES ('1113', '111', '110901', 'CHUPACA', '1');
INSERT INTO `distritos` VALUES ('1114', '111', '110902', 'AHUAC', '1');
INSERT INTO `distritos` VALUES ('1115', '111', '110903', 'CHONGOS BAJO', '1');
INSERT INTO `distritos` VALUES ('1116', '111', '110904', 'HUACHAC', '1');
INSERT INTO `distritos` VALUES ('1117', '111', '110905', 'HUAMANCACA CHICO', '1');
INSERT INTO `distritos` VALUES ('1118', '111', '110906', 'SAN JUAN DE ISCOS', '1');
INSERT INTO `distritos` VALUES ('1119', '111', '110907', 'SAN JUAN DE JARPA', '1');
INSERT INTO `distritos` VALUES ('1120', '111', '110908', 'TRES DE DICIEMBRE', '1');
INSERT INTO `distritos` VALUES ('1121', '111', '110909', 'YANACANCHA', '1');
INSERT INTO `distritos` VALUES ('1122', '112', '120101', 'TRUJILLO', '1');
INSERT INTO `distritos` VALUES ('1123', '112', '120102', 'HUANCHACO', '1');
INSERT INTO `distritos` VALUES ('1124', '112', '120103', 'LAREDO', '1');
INSERT INTO `distritos` VALUES ('1125', '112', '120104', 'MOCHE', '1');
INSERT INTO `distritos` VALUES ('1126', '112', '120105', 'SALAVERRY', '1');
INSERT INTO `distritos` VALUES ('1127', '112', '120106', 'SIMBAL', '1');
INSERT INTO `distritos` VALUES ('1128', '112', '120107', 'VICTOR LARCO HERRERA', '1');
INSERT INTO `distritos` VALUES ('1129', '112', '120109', 'POROTO', '1');
INSERT INTO `distritos` VALUES ('1130', '112', '120110', 'EL PORVENIR', '1');
INSERT INTO `distritos` VALUES ('1131', '112', '120111', 'LA ESPERANZA', '1');
INSERT INTO `distritos` VALUES ('1132', '112', '120112', 'FLORENCIA DE MORA', '1');
INSERT INTO `distritos` VALUES ('1133', '113', '120201', 'BOLIVAR', '1');
INSERT INTO `distritos` VALUES ('1134', '113', '120202', 'BAMBAMARCA', '1');
INSERT INTO `distritos` VALUES ('1135', '113', '120203', 'CONDORMARCA', '1');
INSERT INTO `distritos` VALUES ('1136', '113', '120204', 'LONGOTEA', '1');
INSERT INTO `distritos` VALUES ('1137', '113', '120205', 'UCUNCHA', '1');
INSERT INTO `distritos` VALUES ('1138', '113', '120206', 'UCHUMARCA', '1');
INSERT INTO `distritos` VALUES ('1139', '114', '120301', 'HUAMACHUCO', '1');
INSERT INTO `distritos` VALUES ('1140', '114', '120302', 'COCHORCO', '1');
INSERT INTO `distritos` VALUES ('1141', '114', '120303', 'CURGOS', '1');
INSERT INTO `distritos` VALUES ('1142', '114', '120304', 'CHUGAY', '1');
INSERT INTO `distritos` VALUES ('1143', '114', '120305', 'MARCABAL', '1');
INSERT INTO `distritos` VALUES ('1144', '114', '120306', 'SANAGORAN', '1');
INSERT INTO `distritos` VALUES ('1145', '114', '120307', 'SARIN', '1');
INSERT INTO `distritos` VALUES ('1146', '114', '120308', 'SARTIMBAMBA', '1');
INSERT INTO `distritos` VALUES ('1147', '115', '120401', 'OTUZCO', '1');
INSERT INTO `distritos` VALUES ('1148', '115', '120402', 'AGALLPAMPA', '1');
INSERT INTO `distritos` VALUES ('1149', '115', '120403', 'CHARAT', '1');
INSERT INTO `distritos` VALUES ('1150', '115', '120404', 'HUARANCHAL', '1');
INSERT INTO `distritos` VALUES ('1151', '115', '120405', 'LA CUESTA', '1');
INSERT INTO `distritos` VALUES ('1152', '115', '120408', 'PARANDAY', '1');
INSERT INTO `distritos` VALUES ('1153', '115', '120409', 'SALPO', '1');
INSERT INTO `distritos` VALUES ('1154', '115', '120410', 'SINSICAP', '1');
INSERT INTO `distritos` VALUES ('1155', '115', '120411', 'USQUIL', '1');
INSERT INTO `distritos` VALUES ('1156', '115', '120413', 'MACHE', '1');
INSERT INTO `distritos` VALUES ('1157', '116', '120501', 'SAN PEDRO DE LLOC', '1');
INSERT INTO `distritos` VALUES ('1158', '116', '120503', 'GUADALUPE', '1');
INSERT INTO `distritos` VALUES ('1159', '116', '120504', 'JEQUETEPEQUE', '1');
INSERT INTO `distritos` VALUES ('1160', '116', '120506', 'PACASMAYO', '1');
INSERT INTO `distritos` VALUES ('1161', '116', '120508', 'SAN JOSE', '1');
INSERT INTO `distritos` VALUES ('1162', '117', '120601', 'TAYABAMBA', '1');
INSERT INTO `distritos` VALUES ('1163', '117', '120602', 'BULDIBUYO', '1');
INSERT INTO `distritos` VALUES ('1164', '117', '120603', 'CHILLIA', '1');
INSERT INTO `distritos` VALUES ('1165', '117', '120604', 'HUAYLILLAS', '1');
INSERT INTO `distritos` VALUES ('1166', '117', '120605', 'HUANCASPATA', '1');
INSERT INTO `distritos` VALUES ('1167', '117', '120606', 'HUAYO', '1');
INSERT INTO `distritos` VALUES ('1168', '117', '120607', 'ONGON', '1');
INSERT INTO `distritos` VALUES ('1169', '117', '120608', 'PARCOY', '1');
INSERT INTO `distritos` VALUES ('1170', '117', '120609', 'PATAZ', '1');
INSERT INTO `distritos` VALUES ('1171', '117', '120610', 'PIAS', '1');
INSERT INTO `distritos` VALUES ('1172', '117', '120611', 'TAURIJA', '1');
INSERT INTO `distritos` VALUES ('1173', '117', '120612', 'URPAY', '1');
INSERT INTO `distritos` VALUES ('1174', '117', '120613', 'SANTIAGO DE CHALLAS', '1');
INSERT INTO `distritos` VALUES ('1175', '118', '120701', 'SANTIAGO DE CHUCO', '1');
INSERT INTO `distritos` VALUES ('1176', '118', '120702', 'CACHICADAN', '1');
INSERT INTO `distritos` VALUES ('1177', '118', '120703', 'MOLLEBAMBA', '1');
INSERT INTO `distritos` VALUES ('1178', '118', '120704', 'MOLLEPATA', '1');
INSERT INTO `distritos` VALUES ('1179', '118', '120705', 'QUIRUVILCA', '1');
INSERT INTO `distritos` VALUES ('1180', '118', '120706', 'SANTA CRUZ DE CHUCA', '1');
INSERT INTO `distritos` VALUES ('1181', '118', '120707', 'SITABAMBA', '1');
INSERT INTO `distritos` VALUES ('1182', '118', '120708', 'ANGASMARCA', '1');
INSERT INTO `distritos` VALUES ('1183', '119', '120801', 'ASCOPE', '1');
INSERT INTO `distritos` VALUES ('1184', '119', '120802', 'CHICAMA', '1');
INSERT INTO `distritos` VALUES ('1185', '119', '120803', 'CHOCOPE', '1');
INSERT INTO `distritos` VALUES ('1186', '119', '120804', 'SANTIAGO DE CAO', '1');
INSERT INTO `distritos` VALUES ('1187', '119', '120805', 'MAGDALENA DE CAO', '1');
INSERT INTO `distritos` VALUES ('1188', '119', '120806', 'PAIJAN', '1');
INSERT INTO `distritos` VALUES ('1189', '119', '120807', 'RAZURI', '1');
INSERT INTO `distritos` VALUES ('1190', '119', '120808', 'CASA GRANDE', '1');
INSERT INTO `distritos` VALUES ('1191', '120', '120901', 'CHEPEN', '1');
INSERT INTO `distritos` VALUES ('1192', '120', '120902', 'PACANGA', '1');
INSERT INTO `distritos` VALUES ('1193', '120', '120903', 'PUEBLO NUEVO', '1');
INSERT INTO `distritos` VALUES ('1194', '121', '121001', 'JULCAN', '1');
INSERT INTO `distritos` VALUES ('1195', '121', '121002', 'CARABAMBA', '1');
INSERT INTO `distritos` VALUES ('1196', '121', '121003', 'CALAMARCA', '1');
INSERT INTO `distritos` VALUES ('1197', '121', '121004', 'HUASO', '1');
INSERT INTO `distritos` VALUES ('1198', '122', '121101', 'CASCAS', '1');
INSERT INTO `distritos` VALUES ('1199', '122', '121102', 'LUCMA', '1');
INSERT INTO `distritos` VALUES ('1200', '122', '121103', 'MARMOT', '1');
INSERT INTO `distritos` VALUES ('1201', '122', '121104', 'SAYAPULLO', '1');
INSERT INTO `distritos` VALUES ('1202', '123', '121201', 'VIRU', '1');
INSERT INTO `distritos` VALUES ('1203', '123', '121202', 'CHAO', '1');
INSERT INTO `distritos` VALUES ('1204', '123', '121203', 'GUADALUPITO', '1');
INSERT INTO `distritos` VALUES ('1205', '124', '130101', 'CHICLAYO', '1');
INSERT INTO `distritos` VALUES ('1206', '124', '130102', 'CHONGOYAPE', '1');
INSERT INTO `distritos` VALUES ('1207', '124', '130103', 'ETEN', '1');
INSERT INTO `distritos` VALUES ('1208', '124', '130104', 'ETEN PUERTO', '1');
INSERT INTO `distritos` VALUES ('1209', '124', '130105', 'LAGUNAS', '1');
INSERT INTO `distritos` VALUES ('1210', '124', '130106', 'MONSEFU', '1');
INSERT INTO `distritos` VALUES ('1211', '124', '130107', 'NUEVA ARICA', '1');
INSERT INTO `distritos` VALUES ('1212', '124', '130108', 'OYOTUN', '1');
INSERT INTO `distritos` VALUES ('1213', '124', '130109', 'PICSI', '1');
INSERT INTO `distritos` VALUES ('1214', '124', '130110', 'PIMENTEL', '1');
INSERT INTO `distritos` VALUES ('1215', '124', '130111', 'REQUE', '1');
INSERT INTO `distritos` VALUES ('1216', '124', '130112', 'JOSE LEONARDO ORTIZ', '1');
INSERT INTO `distritos` VALUES ('1217', '124', '130113', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('1218', '124', '130114', 'SANA', '1');
INSERT INTO `distritos` VALUES ('1219', '124', '130115', 'LA VICTORIA', '1');
INSERT INTO `distritos` VALUES ('1220', '124', '130116', 'CAYALTI', '1');
INSERT INTO `distritos` VALUES ('1221', '124', '130117', 'PATAPO', '1');
INSERT INTO `distritos` VALUES ('1222', '124', '130118', 'POMALCA', '1');
INSERT INTO `distritos` VALUES ('1223', '124', '130119', 'PUCALA', '1');
INSERT INTO `distritos` VALUES ('1224', '124', '130120', 'TUMAN', '1');
INSERT INTO `distritos` VALUES ('1225', '125', '130201', 'FERRENAFE', '1');
INSERT INTO `distritos` VALUES ('1226', '125', '130202', 'INCAHUASI', '1');
INSERT INTO `distritos` VALUES ('1227', '125', '130203', 'CANARIS', '1');
INSERT INTO `distritos` VALUES ('1228', '125', '130204', 'PITIPO', '1');
INSERT INTO `distritos` VALUES ('1229', '125', '130205', 'PUEBLO NUEVO', '1');
INSERT INTO `distritos` VALUES ('1230', '125', '130206', 'MANUEL ANTONIO MESONES MURO', '1');
INSERT INTO `distritos` VALUES ('1231', '126', '130301', 'LAMBAYEQUE', '1');
INSERT INTO `distritos` VALUES ('1232', '126', '130302', 'CHOCHOPE', '1');
INSERT INTO `distritos` VALUES ('1233', '126', '130303', 'ILLIMO', '1');
INSERT INTO `distritos` VALUES ('1234', '126', '130304', 'JAYANCA', '1');
INSERT INTO `distritos` VALUES ('1235', '126', '130305', 'MOCHUMI', '1');
INSERT INTO `distritos` VALUES ('1236', '126', '130306', 'MORROPE', '1');
INSERT INTO `distritos` VALUES ('1237', '126', '130307', 'MOTUPE', '1');
INSERT INTO `distritos` VALUES ('1238', '126', '130308', 'OLMOS', '1');
INSERT INTO `distritos` VALUES ('1239', '126', '130309', 'PACORA', '1');
INSERT INTO `distritos` VALUES ('1240', '126', '130310', 'SALAS', '1');
INSERT INTO `distritos` VALUES ('1241', '126', '130311', 'SAN JOSE', '1');
INSERT INTO `distritos` VALUES ('1242', '126', '130312', 'TUCUME', '1');
INSERT INTO `distritos` VALUES ('1243', '127', '140101', 'LIMA', '1');
INSERT INTO `distritos` VALUES ('1244', '127', '140102', 'ANCON', '1');
INSERT INTO `distritos` VALUES ('1245', '127', '140103', 'ATE', '1');
INSERT INTO `distritos` VALUES ('1246', '127', '140104', 'BRENA', '1');
INSERT INTO `distritos` VALUES ('1247', '127', '140105', 'CARABAYLLO', '1');
INSERT INTO `distritos` VALUES ('1248', '127', '140106', 'COMAS', '1');
INSERT INTO `distritos` VALUES ('1249', '127', '140107', 'CHACLACAYO', '1');
INSERT INTO `distritos` VALUES ('1250', '127', '140108', 'CHORRILLOS', '1');
INSERT INTO `distritos` VALUES ('1251', '127', '140109', 'LA VICTORIA', '1');
INSERT INTO `distritos` VALUES ('1252', '127', '140110', 'LA MOLINA', '1');
INSERT INTO `distritos` VALUES ('1253', '127', '140111', 'LINCE', '1');
INSERT INTO `distritos` VALUES ('1254', '127', '140112', 'LURIGANCHO', '1');
INSERT INTO `distritos` VALUES ('1255', '127', '140113', 'LURIN', '1');
INSERT INTO `distritos` VALUES ('1256', '127', '140114', 'MAGDALENA DEL MAR', '1');
INSERT INTO `distritos` VALUES ('1257', '127', '140115', 'MIRAFLORES', '1');
INSERT INTO `distritos` VALUES ('1258', '127', '140116', 'PACHACAMAC', '1');
INSERT INTO `distritos` VALUES ('1259', '127', '140117', 'PUEBLO LIBRE', '1');
INSERT INTO `distritos` VALUES ('1260', '127', '140118', 'PUCUSANA', '1');
INSERT INTO `distritos` VALUES ('1261', '127', '140119', 'PUENTE PIEDRA', '1');
INSERT INTO `distritos` VALUES ('1262', '127', '140120', 'PUNTA HERMOSA', '1');
INSERT INTO `distritos` VALUES ('1263', '127', '140121', 'PUNTA NEGRA', '1');
INSERT INTO `distritos` VALUES ('1264', '127', '140122', 'RIMAC', '1');
INSERT INTO `distritos` VALUES ('1265', '127', '140123', 'SAN BARTOLO', '1');
INSERT INTO `distritos` VALUES ('1266', '127', '140124', 'SAN ISIDRO', '1');
INSERT INTO `distritos` VALUES ('1267', '127', '140125', 'BARRANCO', '1');
INSERT INTO `distritos` VALUES ('1268', '127', '140126', 'SAN MARTIN DE PORRES', '1');
INSERT INTO `distritos` VALUES ('1269', '127', '140127', 'SAN MIGUEL', '1');
INSERT INTO `distritos` VALUES ('1270', '127', '140128', 'STA MARIA DEL MAR', '1');
INSERT INTO `distritos` VALUES ('1271', '127', '140129', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('1272', '127', '140130', 'SANTIAGO DE SURCO', '1');
INSERT INTO `distritos` VALUES ('1273', '127', '140131', 'SURQUILLO', '1');
INSERT INTO `distritos` VALUES ('1274', '127', '140132', 'VILLA MARIA DEL TRIUNFO', '1');
INSERT INTO `distritos` VALUES ('1275', '127', '140133', 'JESUS MARIA', '1');
INSERT INTO `distritos` VALUES ('1276', '127', '140134', 'INDEPENDENCIA', '1');
INSERT INTO `distritos` VALUES ('1277', '127', '140135', 'EL AGUSTINO', '1');
INSERT INTO `distritos` VALUES ('1278', '127', '140136', 'SAN JUAN DE MIRAFLORES', '1');
INSERT INTO `distritos` VALUES ('1279', '127', '140137', 'SAN JUAN DE LURIGANCHO', '1');
INSERT INTO `distritos` VALUES ('1280', '127', '140138', 'SAN LUIS', '1');
INSERT INTO `distritos` VALUES ('1281', '127', '140139', 'CIENEGUILLA', '1');
INSERT INTO `distritos` VALUES ('1282', '127', '140140', 'SAN BORJA', '1');
INSERT INTO `distritos` VALUES ('1283', '127', '140141', 'VILLA EL SALVADOR', '1');
INSERT INTO `distritos` VALUES ('1284', '127', '140142', 'LOS OLIVOS', '1');
INSERT INTO `distritos` VALUES ('1285', '127', '140143', 'SANTA ANITA', '1');
INSERT INTO `distritos` VALUES ('1286', '128', '140201', 'CAJATAMBO', '1');
INSERT INTO `distritos` VALUES ('1287', '128', '140205', 'COPA', '1');
INSERT INTO `distritos` VALUES ('1288', '128', '140206', 'GORGOR', '1');
INSERT INTO `distritos` VALUES ('1289', '128', '140207', 'HUANCAPON', '1');
INSERT INTO `distritos` VALUES ('1290', '128', '140208', 'MANAS', '1');
INSERT INTO `distritos` VALUES ('1291', '129', '140301', 'CANTA', '1');
INSERT INTO `distritos` VALUES ('1292', '129', '140302', 'ARAHUAY', '1');
INSERT INTO `distritos` VALUES ('1293', '129', '140303', 'HUAMANTANGA', '1');
INSERT INTO `distritos` VALUES ('1294', '129', '140304', 'HUAROS', '1');
INSERT INTO `distritos` VALUES ('1295', '129', '140305', 'LACHAQUI', '1');
INSERT INTO `distritos` VALUES ('1296', '129', '140306', 'SAN BUENAVENTURA', '1');
INSERT INTO `distritos` VALUES ('1297', '129', '140307', 'SANTA ROSA DE QUIVES', '1');
INSERT INTO `distritos` VALUES ('1298', '130', '140401', 'SAN VICENTE DE CANETE', '1');
INSERT INTO `distritos` VALUES ('1299', '130', '140402', 'CALANGO', '1');
INSERT INTO `distritos` VALUES ('1300', '130', '140403', 'CERRO AZUL', '1');
INSERT INTO `distritos` VALUES ('1301', '130', '140404', 'COAYLLO', '1');
INSERT INTO `distritos` VALUES ('1302', '130', '140405', 'CHILCA', '1');
INSERT INTO `distritos` VALUES ('1303', '130', '140406', 'IMPERIAL', '1');
INSERT INTO `distritos` VALUES ('1304', '130', '140407', 'LUNAHUANA', '1');
INSERT INTO `distritos` VALUES ('1305', '130', '140408', 'MALA', '1');
INSERT INTO `distritos` VALUES ('1306', '130', '140409', 'NUEVO IMPERIAL', '1');
INSERT INTO `distritos` VALUES ('1307', '130', '140410', 'PACARAN', '1');
INSERT INTO `distritos` VALUES ('1308', '130', '140411', 'QUILMANA', '1');
INSERT INTO `distritos` VALUES ('1309', '130', '140412', 'SAN ANTONIO', '1');
INSERT INTO `distritos` VALUES ('1310', '130', '140413', 'SAN LUIS', '1');
INSERT INTO `distritos` VALUES ('1311', '130', '140414', 'SANTA CRUZ DE FLORES', '1');
INSERT INTO `distritos` VALUES ('1312', '130', '140415', 'ZUNIGA', '1');
INSERT INTO `distritos` VALUES ('1313', '130', '140416', 'ASIA', '1');
INSERT INTO `distritos` VALUES ('1314', '131', '140501', 'HUACHO', '1');
INSERT INTO `distritos` VALUES ('1315', '131', '140502', 'AMBAR', '1');
INSERT INTO `distritos` VALUES ('1316', '131', '140504', 'CALETA DE CARQUIN', '1');
INSERT INTO `distritos` VALUES ('1317', '131', '140505', 'CHECRAS', '1');
INSERT INTO `distritos` VALUES ('1318', '131', '140506', 'HUALMAY', '1');
INSERT INTO `distritos` VALUES ('1319', '131', '140507', 'HUAURA', '1');
INSERT INTO `distritos` VALUES ('1320', '131', '140508', 'LEONCIO PRADO', '1');
INSERT INTO `distritos` VALUES ('1321', '131', '140509', 'PACCHO', '1');
INSERT INTO `distritos` VALUES ('1322', '131', '140511', 'SANTA LEONOR', '1');
INSERT INTO `distritos` VALUES ('1323', '131', '140512', 'SANTA MARIA', '1');
INSERT INTO `distritos` VALUES ('1324', '131', '140513', 'SAYAN', '1');
INSERT INTO `distritos` VALUES ('1325', '131', '140516', 'VEGUETA', '1');
INSERT INTO `distritos` VALUES ('1326', '132', '140601', 'MATUCANA', '1');
INSERT INTO `distritos` VALUES ('1327', '132', '140602', 'ANTIOQUIA', '1');
INSERT INTO `distritos` VALUES ('1328', '132', '140603', 'CALLAHUANCA', '1');
INSERT INTO `distritos` VALUES ('1329', '132', '140604', 'CARAMPOMA', '1');
INSERT INTO `distritos` VALUES ('1330', '132', '140605', 'CASTA', '1');
INSERT INTO `distritos` VALUES ('1331', '132', '140606', 'CUENCA', '1');
INSERT INTO `distritos` VALUES ('1332', '132', '140607', 'CHICLA', '1');
INSERT INTO `distritos` VALUES ('1333', '132', '140608', 'HUANZA', '1');
INSERT INTO `distritos` VALUES ('1334', '132', '140609', 'HUAROCHIRI', '1');
INSERT INTO `distritos` VALUES ('1335', '132', '140610', 'LAHUAYTAMBO', '1');
INSERT INTO `distritos` VALUES ('1336', '132', '140611', 'LANGA', '1');
INSERT INTO `distritos` VALUES ('1337', '132', '140612', 'MARIATANA', '1');
INSERT INTO `distritos` VALUES ('1338', '132', '140613', 'RICARDO PALMA', '1');
INSERT INTO `distritos` VALUES ('1339', '132', '140614', 'SAN ANDRES DE TUPICOCHA', '1');
INSERT INTO `distritos` VALUES ('1340', '132', '140615', 'SAN ANTONIO', '1');
INSERT INTO `distritos` VALUES ('1341', '132', '140616', 'SAN BARTOLOME', '1');
INSERT INTO `distritos` VALUES ('1342', '132', '140617', 'SAN DAMIAN', '1');
INSERT INTO `distritos` VALUES ('1343', '132', '140618', 'SANGALLAYA', '1');
INSERT INTO `distritos` VALUES ('1344', '132', '140619', 'SAN JUAN DE TANTARANCHE', '1');
INSERT INTO `distritos` VALUES ('1345', '132', '140620', 'SAN LORENZO DE QUINTI', '1');
INSERT INTO `distritos` VALUES ('1346', '132', '140621', 'SAN MATEO', '1');
INSERT INTO `distritos` VALUES ('1347', '132', '140622', 'SAN MATEO DE OTAO', '1');
INSERT INTO `distritos` VALUES ('1348', '132', '140623', 'SAN PEDRO DE HUANCAYRE', '1');
INSERT INTO `distritos` VALUES ('1349', '132', '140624', 'SANTA CRUZ DE COCACHACRA', '1');
INSERT INTO `distritos` VALUES ('1350', '132', '140625', 'SANTA EULALIA', '1');
INSERT INTO `distritos` VALUES ('1351', '132', '140626', 'SANTIAGO DE ANCHUCAYA', '1');
INSERT INTO `distritos` VALUES ('1352', '132', '140627', 'SANTIAGO DE TUNA', '1');
INSERT INTO `distritos` VALUES ('1353', '132', '140628', 'SANTO DOMINGO DE LOS OLLEROS', '1');
INSERT INTO `distritos` VALUES ('1354', '132', '140629', 'SURCO', '1');
INSERT INTO `distritos` VALUES ('1355', '132', '140630', 'HUACHUPAMPA', '1');
INSERT INTO `distritos` VALUES ('1356', '132', '140631', 'LARAOS', '1');
INSERT INTO `distritos` VALUES ('1357', '132', '140632', 'SAN JUAN DE IRIS', '1');
INSERT INTO `distritos` VALUES ('1358', '133', '140701', 'YAUYOS', '1');
INSERT INTO `distritos` VALUES ('1359', '133', '140702', 'ALIS', '1');
INSERT INTO `distritos` VALUES ('1360', '133', '140703', 'AYAUCA', '1');
INSERT INTO `distritos` VALUES ('1361', '133', '140704', 'AYAVIRI', '1');
INSERT INTO `distritos` VALUES ('1362', '133', '140705', 'AZANGARO', '1');
INSERT INTO `distritos` VALUES ('1363', '133', '140706', 'CACRA', '1');
INSERT INTO `distritos` VALUES ('1364', '133', '140707', 'CARANIA', '1');
INSERT INTO `distritos` VALUES ('1365', '133', '140708', 'COCHAS', '1');
INSERT INTO `distritos` VALUES ('1366', '133', '140709', 'COLONIA', '1');
INSERT INTO `distritos` VALUES ('1367', '133', '140710', 'CHOCOS', '1');
INSERT INTO `distritos` VALUES ('1368', '133', '140711', 'HUAMPARA', '1');
INSERT INTO `distritos` VALUES ('1369', '133', '140712', 'HUANCAYA', '1');
INSERT INTO `distritos` VALUES ('1370', '133', '140713', 'HUANGASCAR', '1');
INSERT INTO `distritos` VALUES ('1371', '133', '140714', 'HUANTAN', '1');
INSERT INTO `distritos` VALUES ('1372', '133', '140715', 'HUANEC', '1');
INSERT INTO `distritos` VALUES ('1373', '133', '140716', 'LARAOS', '1');
INSERT INTO `distritos` VALUES ('1374', '133', '140717', 'LINCHA', '1');
INSERT INTO `distritos` VALUES ('1375', '133', '140718', 'MIRAFLORES', '1');
INSERT INTO `distritos` VALUES ('1376', '133', '140719', 'OMAS', '1');
INSERT INTO `distritos` VALUES ('1377', '133', '140720', 'QUINCHES', '1');
INSERT INTO `distritos` VALUES ('1378', '133', '140721', 'QUINOCAY', '1');
INSERT INTO `distritos` VALUES ('1379', '133', '140722', 'SAN JOAQUIN', '1');
INSERT INTO `distritos` VALUES ('1380', '133', '140723', 'SAN PEDRO DE PILAS', '1');
INSERT INTO `distritos` VALUES ('1381', '133', '140724', 'TANTA', '1');
INSERT INTO `distritos` VALUES ('1382', '133', '140725', 'TAURIPAMPA', '1');
INSERT INTO `distritos` VALUES ('1383', '133', '140726', 'TUPE', '1');
INSERT INTO `distritos` VALUES ('1384', '133', '140727', 'TOMAS', '1');
INSERT INTO `distritos` VALUES ('1385', '133', '140728', 'VINAC', '1');
INSERT INTO `distritos` VALUES ('1386', '133', '140729', 'VITIS', '1');
INSERT INTO `distritos` VALUES ('1387', '133', '140730', 'HONGOS', '1');
INSERT INTO `distritos` VALUES ('1388', '133', '140731', 'MADEAN', '1');
INSERT INTO `distritos` VALUES ('1389', '133', '140732', 'PUTINZA', '1');
INSERT INTO `distritos` VALUES ('1390', '133', '140733', 'CATAHUASI', '1');
INSERT INTO `distritos` VALUES ('1391', '134', '140801', 'HUARAL', '1');
INSERT INTO `distritos` VALUES ('1392', '134', '140802', 'ATAVILLOS ALTO', '1');
INSERT INTO `distritos` VALUES ('1393', '134', '140803', 'ATAVILLOS BAJO', '1');
INSERT INTO `distritos` VALUES ('1394', '134', '140804', 'AUCALLAMA', '1');
INSERT INTO `distritos` VALUES ('1395', '134', '140805', 'CHANCAY', '1');
INSERT INTO `distritos` VALUES ('1396', '134', '140806', 'IHUARI', '1');
INSERT INTO `distritos` VALUES ('1397', '134', '140807', 'LAMPIAN', '1');
INSERT INTO `distritos` VALUES ('1398', '134', '140808', 'PACARAOS', '1');
INSERT INTO `distritos` VALUES ('1399', '134', '140809', 'SAN MIGUEL DE ACOS', '1');
INSERT INTO `distritos` VALUES ('1400', '134', '140810', 'VEINTISIETE DE NOVIEMBRE', '1');
INSERT INTO `distritos` VALUES ('1401', '134', '140811', 'STA CRUZ DE ANDAMARCA', '1');
INSERT INTO `distritos` VALUES ('1402', '134', '140812', 'SUMBILCA', '1');
INSERT INTO `distritos` VALUES ('1403', '135', '140901', 'BARRANCA', '1');
INSERT INTO `distritos` VALUES ('1404', '135', '140902', 'PARAMONGA', '1');
INSERT INTO `distritos` VALUES ('1405', '135', '140903', 'PATIVILCA', '1');
INSERT INTO `distritos` VALUES ('1406', '135', '140904', 'SUPE', '1');
INSERT INTO `distritos` VALUES ('1407', '135', '140905', 'SUPE PUERTO', '1');
INSERT INTO `distritos` VALUES ('1408', '136', '141001', 'OYON', '1');
INSERT INTO `distritos` VALUES ('1409', '136', '141002', 'NAVAN', '1');
INSERT INTO `distritos` VALUES ('1410', '136', '141003', 'CAUJUL', '1');
INSERT INTO `distritos` VALUES ('1411', '136', '141004', 'ANDAJES', '1');
INSERT INTO `distritos` VALUES ('1412', '136', '141005', 'PACHANGARA', '1');
INSERT INTO `distritos` VALUES ('1413', '136', '141006', 'COCHAMARCA', '1');
INSERT INTO `distritos` VALUES ('1414', '137', '150101', 'IQUITOS', '1');
INSERT INTO `distritos` VALUES ('1415', '137', '150102', 'ALTO NANAY', '1');
INSERT INTO `distritos` VALUES ('1416', '137', '150103', 'FERNANDO LORES', '1');
INSERT INTO `distritos` VALUES ('1417', '137', '150104', 'LAS AMAZONAS', '1');
INSERT INTO `distritos` VALUES ('1418', '137', '150105', 'MAZAN', '1');
INSERT INTO `distritos` VALUES ('1419', '137', '150106', 'NAPO', '1');
INSERT INTO `distritos` VALUES ('1420', '137', '150107', 'PUTUMAYO', '1');
INSERT INTO `distritos` VALUES ('1421', '137', '150108', 'TORRES CAUSANA', '1');
INSERT INTO `distritos` VALUES ('1422', '137', '150110', 'INDIANA', '1');
INSERT INTO `distritos` VALUES ('1423', '137', '150111', 'PUNCHANA', '1');
INSERT INTO `distritos` VALUES ('1424', '137', '150112', 'BELEN', '1');
INSERT INTO `distritos` VALUES ('1425', '137', '150113', 'SAN JUAN BAUTISTA', '1');
INSERT INTO `distritos` VALUES ('1426', '137', '150114', 'TNTE MANUEL CLAVERO', '1');
INSERT INTO `distritos` VALUES ('1427', '138', '150201', 'YURIMAGUAS', '1');
INSERT INTO `distritos` VALUES ('1428', '138', '150202', 'BALSAPUERTO', '1');
INSERT INTO `distritos` VALUES ('1429', '138', '150205', 'JEBEROS', '1');
INSERT INTO `distritos` VALUES ('1430', '138', '150206', 'LAGUNAS', '1');
INSERT INTO `distritos` VALUES ('1431', '138', '150210', 'SANTA CRUZ', '1');
INSERT INTO `distritos` VALUES ('1432', '138', '150211', 'TNTE CESAR LOPEZ ROJAS', '1');
INSERT INTO `distritos` VALUES ('1433', '139', '150301', 'NAUTA', '1');
INSERT INTO `distritos` VALUES ('1434', '139', '150302', 'PARINARI', '1');
INSERT INTO `distritos` VALUES ('1435', '139', '150303', 'TIGRE', '1');
INSERT INTO `distritos` VALUES ('1436', '139', '150304', 'URARINAS', '1');
INSERT INTO `distritos` VALUES ('1437', '139', '150305', 'TROMPETEROS', '1');
INSERT INTO `distritos` VALUES ('1438', '140', '150401', 'REQUENA', '1');
INSERT INTO `distritos` VALUES ('1439', '140', '150402', 'ALTO TAPICHE', '1');
INSERT INTO `distritos` VALUES ('1440', '140', '150403', 'CAPELO', '1');
INSERT INTO `distritos` VALUES ('1441', '140', '150404', 'EMILIO SAN MARTIN', '1');
INSERT INTO `distritos` VALUES ('1442', '140', '150405', 'MAQUIA', '1');
INSERT INTO `distritos` VALUES ('1443', '140', '150406', 'PUINAHUA', '1');
INSERT INTO `distritos` VALUES ('1444', '140', '150407', 'SAQUENA', '1');
INSERT INTO `distritos` VALUES ('1445', '140', '150408', 'SOPLIN', '1');
INSERT INTO `distritos` VALUES ('1446', '140', '150409', 'TAPICHE', '1');
INSERT INTO `distritos` VALUES ('1447', '140', '150410', 'JENARO HERRERA', '1');
INSERT INTO `distritos` VALUES ('1448', '140', '150411', 'YAQUERANA', '1');
INSERT INTO `distritos` VALUES ('1449', '141', '150501', 'CONTAMANA', '1');
INSERT INTO `distritos` VALUES ('1450', '141', '150502', 'VARGAS GUERRA', '1');
INSERT INTO `distritos` VALUES ('1451', '141', '150503', 'PADRE MARQUEZ', '1');
INSERT INTO `distritos` VALUES ('1452', '141', '150504', 'PAMPA HERMOZA', '1');
INSERT INTO `distritos` VALUES ('1453', '141', '150505', 'SARAYACU', '1');
INSERT INTO `distritos` VALUES ('1454', '141', '150506', 'INAHUAYA', '1');
INSERT INTO `distritos` VALUES ('1455', '142', '150601', 'MARISCAL RAMON CASTILLA', '1');
INSERT INTO `distritos` VALUES ('1456', '142', '150602', 'PEBAS', '1');
INSERT INTO `distritos` VALUES ('1457', '142', '150603', 'YAVARI', '1');
INSERT INTO `distritos` VALUES ('1458', '142', '150604', 'SAN PABLO', '1');
INSERT INTO `distritos` VALUES ('1459', '143', '150701', 'BARRANCA', '1');
INSERT INTO `distritos` VALUES ('1460', '143', '150702', 'ANDOAS', '1');
INSERT INTO `distritos` VALUES ('1461', '143', '150703', 'CAHUAPANAS', '1');
INSERT INTO `distritos` VALUES ('1462', '143', '150704', 'MANSERICHE', '1');
INSERT INTO `distritos` VALUES ('1463', '143', '150705', 'MORONA', '1');
INSERT INTO `distritos` VALUES ('1464', '143', '150706', 'PASTAZA', '1');
INSERT INTO `distritos` VALUES ('1465', '144', '160101', 'TAMBOPATA', '1');
INSERT INTO `distritos` VALUES ('1466', '144', '160102', 'INAMBARI', '1');
INSERT INTO `distritos` VALUES ('1467', '144', '160103', 'LAS PIEDRAS', '1');
INSERT INTO `distritos` VALUES ('1468', '144', '160104', 'LABERINTO', '1');
INSERT INTO `distritos` VALUES ('1469', '145', '160201', 'MANU', '1');
INSERT INTO `distritos` VALUES ('1470', '145', '160202', 'FITZCARRALD', '1');
INSERT INTO `distritos` VALUES ('1471', '145', '160203', 'MADRE DE DIOS', '1');
INSERT INTO `distritos` VALUES ('1472', '145', '160204', 'HUEPETUHE', '1');
INSERT INTO `distritos` VALUES ('1473', '146', '160301', 'INAPARI', '1');
INSERT INTO `distritos` VALUES ('1474', '146', '160302', 'IBERIA', '1');
INSERT INTO `distritos` VALUES ('1475', '146', '160303', 'TAHUAMANU', '1');
INSERT INTO `distritos` VALUES ('1476', '147', '170101', 'MOQUEGUA', '1');
INSERT INTO `distritos` VALUES ('1477', '147', '170102', 'CARUMAS', '1');
INSERT INTO `distritos` VALUES ('1478', '147', '170103', 'CUCHUMBAYA', '1');
INSERT INTO `distritos` VALUES ('1479', '147', '170104', 'SAN CRISTOBAL', '1');
INSERT INTO `distritos` VALUES ('1480', '147', '170105', 'TORATA', '1');
INSERT INTO `distritos` VALUES ('1481', '147', '170106', 'SAMEGUA', '1');
INSERT INTO `distritos` VALUES ('1482', '148', '170201', 'OMATE', '1');
INSERT INTO `distritos` VALUES ('1483', '148', '170202', 'COALAQUE', '1');
INSERT INTO `distritos` VALUES ('1484', '148', '170203', 'CHOJATA', '1');
INSERT INTO `distritos` VALUES ('1485', '148', '170204', 'ICHUNA', '1');
INSERT INTO `distritos` VALUES ('1486', '148', '170205', 'LA CAPILLA', '1');
INSERT INTO `distritos` VALUES ('1487', '148', '170206', 'LLOQUE', '1');
INSERT INTO `distritos` VALUES ('1488', '148', '170207', 'MATALAQUE', '1');
INSERT INTO `distritos` VALUES ('1489', '148', '170208', 'PUQUINA', '1');
INSERT INTO `distritos` VALUES ('1490', '148', '170209', 'QUINISTAQUILLAS', '1');
INSERT INTO `distritos` VALUES ('1491', '148', '170210', 'UBINAS', '1');
INSERT INTO `distritos` VALUES ('1492', '148', '170211', 'YUNGA', '1');
INSERT INTO `distritos` VALUES ('1493', '149', '170301', 'ILO', '1');
INSERT INTO `distritos` VALUES ('1494', '149', '170302', 'EL ALGARROBAL', '1');
INSERT INTO `distritos` VALUES ('1495', '149', '170303', 'PACOCHA', '1');
INSERT INTO `distritos` VALUES ('1496', '150', '180101', 'CHAUPIMARCA', '1');
INSERT INTO `distritos` VALUES ('1497', '150', '180103', 'HUACHON', '1');
INSERT INTO `distritos` VALUES ('1498', '150', '180104', 'HUARIACA', '1');
INSERT INTO `distritos` VALUES ('1499', '150', '180105', 'HUAYLLAY', '1');
INSERT INTO `distritos` VALUES ('1500', '150', '180106', 'NINACACA', '1');
INSERT INTO `distritos` VALUES ('1501', '150', '180107', 'PALLANCHACRA', '1');
INSERT INTO `distritos` VALUES ('1502', '150', '180108', 'PAUCARTAMBO', '1');
INSERT INTO `distritos` VALUES ('1503', '150', '180109', 'SAN FCO DE ASIS DE YARUSYACAN', '1');
INSERT INTO `distritos` VALUES ('1504', '150', '180110', 'SIMON BOLIVAR', '1');
INSERT INTO `distritos` VALUES ('1505', '150', '180111', 'TICLACAYAN', '1');
INSERT INTO `distritos` VALUES ('1506', '150', '180112', 'TINYAHUARCO', '1');
INSERT INTO `distritos` VALUES ('1507', '150', '180113', 'VICCO', '1');
INSERT INTO `distritos` VALUES ('1508', '150', '180114', 'YANACANCHA', '1');
INSERT INTO `distritos` VALUES ('1509', '151', '180201', 'YANAHUANCA', '1');
INSERT INTO `distritos` VALUES ('1510', '151', '180202', 'CHACAYAN', '1');
INSERT INTO `distritos` VALUES ('1511', '151', '180203', 'GOYLLARISQUIZGA', '1');
INSERT INTO `distritos` VALUES ('1512', '151', '180204', 'PAUCAR', '1');
INSERT INTO `distritos` VALUES ('1513', '151', '180205', 'SAN PEDRO DE PILLAO', '1');
INSERT INTO `distritos` VALUES ('1514', '151', '180206', 'SANTA ANA DE TUSI', '1');
INSERT INTO `distritos` VALUES ('1515', '151', '180207', 'TAPUC', '1');
INSERT INTO `distritos` VALUES ('1516', '151', '180208', 'VILCABAMBA', '1');
INSERT INTO `distritos` VALUES ('1517', '152', '180301', 'OXAPAMPA', '1');
INSERT INTO `distritos` VALUES ('1518', '152', '180302', 'CHONTABAMBA', '1');
INSERT INTO `distritos` VALUES ('1519', '152', '180303', 'HUANCABAMBA', '1');
INSERT INTO `distritos` VALUES ('1520', '152', '180304', 'PUERTO BERMUDEZ', '1');
INSERT INTO `distritos` VALUES ('1521', '152', '180305', 'VILLA RICA', '1');
INSERT INTO `distritos` VALUES ('1522', '152', '180306', 'POZUZO', '1');
INSERT INTO `distritos` VALUES ('1523', '152', '180307', 'PALCAZU', '1');
INSERT INTO `distritos` VALUES ('1524', '153', '190101', 'PIURA', '1');
INSERT INTO `distritos` VALUES ('1525', '153', '190103', 'CASTILLA', '1');
INSERT INTO `distritos` VALUES ('1526', '153', '190104', 'CATACAOS', '1');
INSERT INTO `distritos` VALUES ('1527', '153', '190105', 'LA ARENA', '1');
INSERT INTO `distritos` VALUES ('1528', '153', '190106', 'LA UNION', '1');
INSERT INTO `distritos` VALUES ('1529', '153', '190107', 'LAS LOMAS', '1');
INSERT INTO `distritos` VALUES ('1530', '153', '190109', 'TAMBO GRANDE', '1');
INSERT INTO `distritos` VALUES ('1531', '153', '190113', 'CURA MORI', '1');
INSERT INTO `distritos` VALUES ('1532', '153', '190114', 'EL TALLAN', '1');
INSERT INTO `distritos` VALUES ('1533', '154', '190201', 'AYABACA', '1');
INSERT INTO `distritos` VALUES ('1534', '154', '190202', 'FRIAS', '1');
INSERT INTO `distritos` VALUES ('1535', '154', '190203', 'LAGUNAS', '1');
INSERT INTO `distritos` VALUES ('1536', '154', '190204', 'MONTERO', '1');
INSERT INTO `distritos` VALUES ('1537', '154', '190205', 'PACAIPAMPA', '1');
INSERT INTO `distritos` VALUES ('1538', '154', '190206', 'SAPILLICA', '1');
INSERT INTO `distritos` VALUES ('1539', '154', '190207', 'SICCHEZ', '1');
INSERT INTO `distritos` VALUES ('1540', '154', '190208', 'SUYO', '1');
INSERT INTO `distritos` VALUES ('1541', '154', '190209', 'JILILI', '1');
INSERT INTO `distritos` VALUES ('1542', '154', '190210', 'PAIMAS', '1');
INSERT INTO `distritos` VALUES ('1543', '155', '190301', 'HUANCABAMBA', '1');
INSERT INTO `distritos` VALUES ('1544', '155', '190302', 'CANCHAQUE', '1');
INSERT INTO `distritos` VALUES ('1545', '155', '190303', 'HUARMACA', '1');
INSERT INTO `distritos` VALUES ('1546', '155', '190304', 'SONDOR', '1');
INSERT INTO `distritos` VALUES ('1547', '155', '190305', 'SONDORILLO', '1');
INSERT INTO `distritos` VALUES ('1548', '155', '190306', 'EL CARMEN DE LA FRONTERA', '1');
INSERT INTO `distritos` VALUES ('1549', '155', '190307', 'SAN MIGUEL DE EL FAIQUE', '1');
INSERT INTO `distritos` VALUES ('1550', '155', '190308', 'LALAQUIZ', '1');
INSERT INTO `distritos` VALUES ('1551', '156', '190401', 'CHULUCANAS', '1');
INSERT INTO `distritos` VALUES ('1552', '156', '190402', 'BUENOS AIRES', '1');
INSERT INTO `distritos` VALUES ('1553', '156', '190403', 'CHALACO', '1');
INSERT INTO `distritos` VALUES ('1554', '156', '190404', 'MORROPON', '1');
INSERT INTO `distritos` VALUES ('1555', '156', '190405', 'SALITRAL', '1');
INSERT INTO `distritos` VALUES ('1556', '156', '190406', 'SANTA CATALINA DE MOSSA', '1');
INSERT INTO `distritos` VALUES ('1557', '156', '190407', 'SANTO DOMINGO', '1');
INSERT INTO `distritos` VALUES ('1558', '156', '190408', 'LA MATANZA', '1');
INSERT INTO `distritos` VALUES ('1559', '156', '190409', 'YAMANGO', '1');
INSERT INTO `distritos` VALUES ('1560', '156', '190410', 'SAN JUAN DE BIGOTE', '1');
INSERT INTO `distritos` VALUES ('1561', '157', '190501', 'PAITA', '1');
INSERT INTO `distritos` VALUES ('1562', '157', '190502', 'AMOTAPE', '1');
INSERT INTO `distritos` VALUES ('1563', '157', '190503', 'ARENAL', '1');
INSERT INTO `distritos` VALUES ('1564', '157', '190504', 'LA HUACA', '1');
INSERT INTO `distritos` VALUES ('1565', '157', '190505', 'PUEBLO NUEVO DE COLAN', '1');
INSERT INTO `distritos` VALUES ('1566', '157', '190506', 'TAMARINDO', '1');
INSERT INTO `distritos` VALUES ('1567', '157', '190507', 'VICHAYAL', '1');
INSERT INTO `distritos` VALUES ('1568', '158', '190601', 'SULLANA', '1');
INSERT INTO `distritos` VALUES ('1569', '158', '190602', 'BELLAVISTA', '1');
INSERT INTO `distritos` VALUES ('1570', '158', '190603', 'LANCONES', '1');
INSERT INTO `distritos` VALUES ('1571', '158', '190604', 'MARCAVELICA', '1');
INSERT INTO `distritos` VALUES ('1572', '158', '190605', 'MIGUEL CHECA', '1');
INSERT INTO `distritos` VALUES ('1573', '158', '190606', 'QUERECOTILLO', '1');
INSERT INTO `distritos` VALUES ('1574', '158', '190607', 'SALITRAL', '1');
INSERT INTO `distritos` VALUES ('1575', '158', '190608', 'IGNACIO ESCUDERO', '1');
INSERT INTO `distritos` VALUES ('1576', '159', '190701', 'PARINAS', '1');
INSERT INTO `distritos` VALUES ('1577', '159', '190702', 'EL ALTO', '1');
INSERT INTO `distritos` VALUES ('1578', '159', '190703', 'LA BREA', '1');
INSERT INTO `distritos` VALUES ('1579', '159', '190704', 'LOBITOS', '1');
INSERT INTO `distritos` VALUES ('1580', '159', '190705', 'MANCORA', '1');
INSERT INTO `distritos` VALUES ('1581', '159', '190706', 'LOS ORGANOS', '1');
INSERT INTO `distritos` VALUES ('1582', '160', '190801', 'SECHURA', '1');
INSERT INTO `distritos` VALUES ('1583', '160', '190802', 'VICE', '1');
INSERT INTO `distritos` VALUES ('1584', '160', '190803', 'BERNAL', '1');
INSERT INTO `distritos` VALUES ('1585', '160', '190804', 'BELLAVISTA DE LA UNION', '1');
INSERT INTO `distritos` VALUES ('1586', '160', '190805', 'CRISTO NOS VALGA', '1');
INSERT INTO `distritos` VALUES ('1587', '160', '190806', 'RINCONADA LLICUAR', '1');
INSERT INTO `distritos` VALUES ('1588', '161', '200101', 'PUNO', '1');
INSERT INTO `distritos` VALUES ('1589', '161', '200102', 'ACORA', '1');
INSERT INTO `distritos` VALUES ('1590', '161', '200103', 'ATUNCOLLA', '1');
INSERT INTO `distritos` VALUES ('1591', '161', '200104', 'CAPACHICA', '1');
INSERT INTO `distritos` VALUES ('1592', '161', '200105', 'COATA', '1');
INSERT INTO `distritos` VALUES ('1593', '161', '200106', 'CHUCUITO', '1');
INSERT INTO `distritos` VALUES ('1594', '161', '200107', 'HUATA', '1');
INSERT INTO `distritos` VALUES ('1595', '161', '200108', 'MANAZO', '1');
INSERT INTO `distritos` VALUES ('1596', '161', '200109', 'PAUCARCOLLA', '1');
INSERT INTO `distritos` VALUES ('1597', '161', '200110', 'PICHACANI', '1');
INSERT INTO `distritos` VALUES ('1598', '161', '200111', 'SAN ANTONIO', '1');
INSERT INTO `distritos` VALUES ('1599', '161', '200112', 'TIQUILLACA', '1');
INSERT INTO `distritos` VALUES ('1600', '161', '200113', 'VILQUE', '1');
INSERT INTO `distritos` VALUES ('1601', '161', '200114', 'PLATERIA', '1');
INSERT INTO `distritos` VALUES ('1602', '161', '200115', 'AMANTANI', '1');
INSERT INTO `distritos` VALUES ('1603', '162', '200201', 'AZANGARO', '1');
INSERT INTO `distritos` VALUES ('1604', '162', '200202', 'ACHAYA', '1');
INSERT INTO `distritos` VALUES ('1605', '162', '200203', 'ARAPA', '1');
INSERT INTO `distritos` VALUES ('1606', '162', '200204', 'ASILLO', '1');
INSERT INTO `distritos` VALUES ('1607', '162', '200205', 'CAMINACA', '1');
INSERT INTO `distritos` VALUES ('1608', '162', '200206', 'CHUPA', '1');
INSERT INTO `distritos` VALUES ('1609', '162', '200207', 'JOSE DOMINGO CHOQUEHUANCA', '1');
INSERT INTO `distritos` VALUES ('1610', '162', '200208', 'MUNANI', '1');
INSERT INTO `distritos` VALUES ('1611', '162', '200210', 'POTONI', '1');
INSERT INTO `distritos` VALUES ('1612', '162', '200212', 'SAMAN', '1');
INSERT INTO `distritos` VALUES ('1613', '162', '200213', 'SAN ANTON', '1');
INSERT INTO `distritos` VALUES ('1614', '162', '200214', 'SAN JOSE', '1');
INSERT INTO `distritos` VALUES ('1615', '162', '200215', 'SAN JUAN DE SALINAS', '1');
INSERT INTO `distritos` VALUES ('1616', '162', '200216', 'STGO DE PUPUJA', '1');
INSERT INTO `distritos` VALUES ('1617', '162', '200217', 'TIRAPATA', '1');
INSERT INTO `distritos` VALUES ('1618', '163', '200301', 'MACUSANI', '1');
INSERT INTO `distritos` VALUES ('1619', '163', '200302', 'AJOYANI', '1');
INSERT INTO `distritos` VALUES ('1620', '163', '200303', 'AYAPATA', '1');
INSERT INTO `distritos` VALUES ('1621', '163', '200304', 'COASA', '1');
INSERT INTO `distritos` VALUES ('1622', '163', '200305', 'CORANI', '1');
INSERT INTO `distritos` VALUES ('1623', '163', '200306', 'CRUCERO', '1');
INSERT INTO `distritos` VALUES ('1624', '163', '200307', 'ITUATA', '1');
INSERT INTO `distritos` VALUES ('1625', '163', '200308', 'OLLACHEA', '1');
INSERT INTO `distritos` VALUES ('1626', '163', '200309', 'SAN GABAN', '1');
INSERT INTO `distritos` VALUES ('1627', '163', '200310', 'USICAYOS', '1');
INSERT INTO `distritos` VALUES ('1628', '164', '200401', 'JULI', '1');
INSERT INTO `distritos` VALUES ('1629', '164', '200402', 'DESAGUADERO', '1');
INSERT INTO `distritos` VALUES ('1630', '164', '200403', 'HUACULLANI', '1');
INSERT INTO `distritos` VALUES ('1631', '164', '200406', 'PISACOMA', '1');
INSERT INTO `distritos` VALUES ('1632', '164', '200407', 'POMATA', '1');
INSERT INTO `distritos` VALUES ('1633', '164', '200410', 'ZEPITA', '1');
INSERT INTO `distritos` VALUES ('1634', '164', '200412', 'KELLUYO', '1');
INSERT INTO `distritos` VALUES ('1635', '165', '200501', 'HUANCANE', '1');
INSERT INTO `distritos` VALUES ('1636', '165', '200502', 'COJATA', '1');
INSERT INTO `distritos` VALUES ('1637', '165', '200504', 'INCHUPALLA', '1');
INSERT INTO `distritos` VALUES ('1638', '165', '200506', 'PUSI', '1');
INSERT INTO `distritos` VALUES ('1639', '165', '200507', 'ROSASPATA', '1');
INSERT INTO `distritos` VALUES ('1640', '165', '200508', 'TARACO', '1');
INSERT INTO `distritos` VALUES ('1641', '165', '200509', 'VILQUE CHICO', '1');
INSERT INTO `distritos` VALUES ('1642', '165', '200511', 'HUATASANI', '1');
INSERT INTO `distritos` VALUES ('1643', '166', '200601', 'LAMPA', '1');
INSERT INTO `distritos` VALUES ('1644', '166', '200602', 'CABANILLA', '1');
INSERT INTO `distritos` VALUES ('1645', '166', '200603', 'CALAPUJA', '1');
INSERT INTO `distritos` VALUES ('1646', '166', '200604', 'NICASIO', '1');
INSERT INTO `distritos` VALUES ('1647', '166', '200605', 'OCUVIRI', '1');
INSERT INTO `distritos` VALUES ('1648', '166', '200606', 'PALCA', '1');
INSERT INTO `distritos` VALUES ('1649', '166', '200607', 'PARATIA', '1');
INSERT INTO `distritos` VALUES ('1650', '166', '200608', 'PUCARA', '1');
INSERT INTO `distritos` VALUES ('1651', '166', '200609', 'SANTA LUCIA', '1');
INSERT INTO `distritos` VALUES ('1652', '166', '200610', 'VILAVILA', '1');
INSERT INTO `distritos` VALUES ('1653', '167', '200701', 'AYAVIRI', '1');
INSERT INTO `distritos` VALUES ('1654', '167', '200702', 'ANTAUTA', '1');
INSERT INTO `distritos` VALUES ('1655', '167', '200703', 'CUPI', '1');
INSERT INTO `distritos` VALUES ('1656', '167', '200704', 'LLALLI', '1');
INSERT INTO `distritos` VALUES ('1657', '167', '200705', 'MACARI', '1');
INSERT INTO `distritos` VALUES ('1658', '167', '200706', 'NUNOA', '1');
INSERT INTO `distritos` VALUES ('1659', '167', '200707', 'ORURILLO', '1');
INSERT INTO `distritos` VALUES ('1660', '167', '200708', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('1661', '167', '200709', 'UMACHIRI', '1');
INSERT INTO `distritos` VALUES ('1662', '168', '200801', 'SANDIA', '1');
INSERT INTO `distritos` VALUES ('1663', '168', '200803', 'CUYOCUYO', '1');
INSERT INTO `distritos` VALUES ('1664', '168', '200804', 'LIMBANI', '1');
INSERT INTO `distritos` VALUES ('1665', '168', '200805', 'PHARA', '1');
INSERT INTO `distritos` VALUES ('1666', '168', '200806', 'PATAMBUCO', '1');
INSERT INTO `distritos` VALUES ('1667', '168', '200807', 'QUIACA', '1');
INSERT INTO `distritos` VALUES ('1668', '168', '200808', 'SAN JUAN DEL ORO', '1');
INSERT INTO `distritos` VALUES ('1669', '168', '200810', 'YANAHUAYA', '1');
INSERT INTO `distritos` VALUES ('1670', '168', '200811', 'ALTO INAMBARI', '1');
INSERT INTO `distritos` VALUES ('1671', '168', '200812', 'SAN PEDRO DE PUTINA PUNCO', '1');
INSERT INTO `distritos` VALUES ('1672', '169', '200901', 'JULIACA', '1');
INSERT INTO `distritos` VALUES ('1673', '169', '200902', 'CABANA', '1');
INSERT INTO `distritos` VALUES ('1674', '169', '200903', 'CABANILLAS', '1');
INSERT INTO `distritos` VALUES ('1675', '169', '200904', 'CARACOTO', '1');
INSERT INTO `distritos` VALUES ('1676', '170', '201001', 'YUNGUYO', '1');
INSERT INTO `distritos` VALUES ('1677', '170', '201002', 'UNICACHI', '1');
INSERT INTO `distritos` VALUES ('1678', '170', '201003', 'ANAPIA', '1');
INSERT INTO `distritos` VALUES ('1679', '170', '201004', 'COPANI', '1');
INSERT INTO `distritos` VALUES ('1680', '170', '201005', 'CUTURAPI', '1');
INSERT INTO `distritos` VALUES ('1681', '170', '201006', 'OLLARAYA', '1');
INSERT INTO `distritos` VALUES ('1682', '170', '201007', 'TINICACHI', '1');
INSERT INTO `distritos` VALUES ('1683', '171', '201101', 'PUTINA', '1');
INSERT INTO `distritos` VALUES ('1684', '171', '201102', 'PEDRO VILCA APAZA', '1');
INSERT INTO `distritos` VALUES ('1685', '171', '201103', 'QUILCA PUNCU', '1');
INSERT INTO `distritos` VALUES ('1686', '171', '201104', 'ANANEA', '1');
INSERT INTO `distritos` VALUES ('1687', '171', '201105', 'SINA', '1');
INSERT INTO `distritos` VALUES ('1688', '172', '201201', 'ILAVE', '1');
INSERT INTO `distritos` VALUES ('1689', '172', '201202', 'PILCUYO', '1');
INSERT INTO `distritos` VALUES ('1690', '172', '201203', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('1691', '172', '201204', 'CAPASO', '1');
INSERT INTO `distritos` VALUES ('1692', '172', '201205', 'CONDURIRI', '1');
INSERT INTO `distritos` VALUES ('1693', '173', '201301', 'MOHO', '1');
INSERT INTO `distritos` VALUES ('1694', '173', '201302', 'CONIMA', '1');
INSERT INTO `distritos` VALUES ('1695', '173', '201303', 'TILALI', '1');
INSERT INTO `distritos` VALUES ('1696', '173', '201304', 'HUAYRAPATA', '1');
INSERT INTO `distritos` VALUES ('1697', '174', '210101', 'MOYOBAMBA', '1');
INSERT INTO `distritos` VALUES ('1698', '174', '210102', 'CALZADA', '1');
INSERT INTO `distritos` VALUES ('1699', '174', '210103', 'HABANA', '1');
INSERT INTO `distritos` VALUES ('1700', '174', '210104', 'JEPELACIO', '1');
INSERT INTO `distritos` VALUES ('1701', '174', '210105', 'SORITOR', '1');
INSERT INTO `distritos` VALUES ('1702', '174', '210106', 'YANTALO', '1');
INSERT INTO `distritos` VALUES ('1703', '175', '210201', 'SAPOSOA', '1');
INSERT INTO `distritos` VALUES ('1704', '175', '210202', 'PISCOYACU', '1');
INSERT INTO `distritos` VALUES ('1705', '175', '210203', 'SACANCHE', '1');
INSERT INTO `distritos` VALUES ('1706', '175', '210204', 'TINGO DE SAPOSOA', '1');
INSERT INTO `distritos` VALUES ('1707', '175', '210205', 'ALTO SAPOSOA', '1');
INSERT INTO `distritos` VALUES ('1708', '175', '210206', 'EL ESLABON', '1');
INSERT INTO `distritos` VALUES ('1709', '176', '210301', 'LAMAS', '1');
INSERT INTO `distritos` VALUES ('1710', '176', '210303', 'BARRANQUITA', '1');
INSERT INTO `distritos` VALUES ('1711', '176', '210304', 'CAYNARACHI', '1');
INSERT INTO `distritos` VALUES ('1712', '176', '210305', 'CUNUMBUQUI', '1');
INSERT INTO `distritos` VALUES ('1713', '176', '210306', 'PINTO RECODO', '1');
INSERT INTO `distritos` VALUES ('1714', '176', '210307', 'RUMISAPA', '1');
INSERT INTO `distritos` VALUES ('1715', '176', '210311', 'SHANAO', '1');
INSERT INTO `distritos` VALUES ('1716', '176', '210313', 'TABALOSOS', '1');
INSERT INTO `distritos` VALUES ('1717', '176', '210314', 'ZAPATERO', '1');
INSERT INTO `distritos` VALUES ('1718', '176', '210315', 'ALONSO DE ALVARADO', '1');
INSERT INTO `distritos` VALUES ('1719', '176', '210316', 'SAN ROQUE DE CUMBAZA', '1');
INSERT INTO `distritos` VALUES ('1720', '177', '210401', 'JUANJUI', '1');
INSERT INTO `distritos` VALUES ('1721', '177', '210402', 'CAMPANILLA', '1');
INSERT INTO `distritos` VALUES ('1722', '177', '210403', 'HUICUNGO', '1');
INSERT INTO `distritos` VALUES ('1723', '177', '210404', 'PACHIZA', '1');
INSERT INTO `distritos` VALUES ('1724', '177', '210405', 'PAJARILLO', '1');
INSERT INTO `distritos` VALUES ('1725', '178', '210501', 'RIOJA', '1');
INSERT INTO `distritos` VALUES ('1726', '178', '210502', 'POSIC', '1');
INSERT INTO `distritos` VALUES ('1727', '178', '210503', 'YORONGOS', '1');
INSERT INTO `distritos` VALUES ('1728', '178', '210504', 'YURACYACU', '1');
INSERT INTO `distritos` VALUES ('1729', '178', '210505', 'NUEVA CAJAMARCA', '1');
INSERT INTO `distritos` VALUES ('1730', '178', '210506', 'ELIAS SOPLIN', '1');
INSERT INTO `distritos` VALUES ('1731', '178', '210507', 'SAN FERNANDO', '1');
INSERT INTO `distritos` VALUES ('1732', '178', '210508', 'PARDO MIGUEL', '1');
INSERT INTO `distritos` VALUES ('1733', '178', '210509', 'AWAJUN', '1');
INSERT INTO `distritos` VALUES ('1734', '179', '210601', 'TARAPOTO', '1');
INSERT INTO `distritos` VALUES ('1735', '179', '210602', 'ALBERTO LEVEAU', '1');
INSERT INTO `distritos` VALUES ('1736', '179', '210604', 'CACATACHI', '1');
INSERT INTO `distritos` VALUES ('1737', '179', '210606', 'CHAZUTA', '1');
INSERT INTO `distritos` VALUES ('1738', '179', '210607', 'CHIPURANA', '1');
INSERT INTO `distritos` VALUES ('1739', '179', '210608', 'EL PORVENIR', '1');
INSERT INTO `distritos` VALUES ('1740', '179', '210609', 'HUIMBAYOC', '1');
INSERT INTO `distritos` VALUES ('1741', '179', '210610', 'JUAN GUERRA', '1');
INSERT INTO `distritos` VALUES ('1742', '179', '210611', 'MORALES', '1');
INSERT INTO `distritos` VALUES ('1743', '179', '210612', 'PAPAPLAYA', '1');
INSERT INTO `distritos` VALUES ('1744', '179', '210616', 'SAN ANTONIO', '1');
INSERT INTO `distritos` VALUES ('1745', '179', '210619', 'SAUCE', '1');
INSERT INTO `distritos` VALUES ('1746', '179', '210620', 'SHAPAJA', '1');
INSERT INTO `distritos` VALUES ('1747', '179', '210621', 'LA BANDA DE SHILCAYO', '1');
INSERT INTO `distritos` VALUES ('1748', '180', '210701', 'BELLAVISTA', '1');
INSERT INTO `distritos` VALUES ('1749', '180', '210702', 'SAN RAFAEL', '1');
INSERT INTO `distritos` VALUES ('1750', '180', '210703', 'SAN PABLO', '1');
INSERT INTO `distritos` VALUES ('1751', '180', '210704', 'ALTO BIAVO', '1');
INSERT INTO `distritos` VALUES ('1752', '180', '210705', 'HUALLAGA', '1');
INSERT INTO `distritos` VALUES ('1753', '180', '210706', 'BAJO BIAVO', '1');
INSERT INTO `distritos` VALUES ('1754', '181', '210801', 'TOCACHE', '1');
INSERT INTO `distritos` VALUES ('1755', '181', '210802', 'NUEVO PROGRESO', '1');
INSERT INTO `distritos` VALUES ('1756', '181', '210803', 'POLVORA', '1');
INSERT INTO `distritos` VALUES ('1757', '181', '210804', 'SHUNTE', '1');
INSERT INTO `distritos` VALUES ('1758', '181', '210805', 'UCHIZA', '1');
INSERT INTO `distritos` VALUES ('1759', '182', '210901', 'PICOTA', '1');
INSERT INTO `distritos` VALUES ('1760', '182', '210902', 'BUENOS AIRES', '1');
INSERT INTO `distritos` VALUES ('1761', '182', '210903', 'CASPIZAPA', '1');
INSERT INTO `distritos` VALUES ('1762', '182', '210904', 'PILLUANA', '1');
INSERT INTO `distritos` VALUES ('1763', '182', '210905', 'PUCACACA', '1');
INSERT INTO `distritos` VALUES ('1764', '182', '210906', 'SAN CRISTOBAL', '1');
INSERT INTO `distritos` VALUES ('1765', '182', '210907', 'SAN HILARION', '1');
INSERT INTO `distritos` VALUES ('1766', '182', '210908', 'TINGO DE PONASA', '1');
INSERT INTO `distritos` VALUES ('1767', '182', '210909', 'TRES UNIDOS', '1');
INSERT INTO `distritos` VALUES ('1768', '182', '210910', 'SHAMBOYACU', '1');
INSERT INTO `distritos` VALUES ('1769', '183', '211001', 'SAN JOSE DE SISA', '1');
INSERT INTO `distritos` VALUES ('1770', '183', '211002', 'AGUA BLANCA', '1');
INSERT INTO `distritos` VALUES ('1771', '183', '211003', 'SHATOJA', '1');
INSERT INTO `distritos` VALUES ('1772', '183', '211004', 'SAN MARTIN', '1');
INSERT INTO `distritos` VALUES ('1773', '183', '211005', 'SANTA ROSA', '1');
INSERT INTO `distritos` VALUES ('1774', '184', '220101', 'TACNA', '1');
INSERT INTO `distritos` VALUES ('1775', '184', '220102', 'CALANA', '1');
INSERT INTO `distritos` VALUES ('1776', '184', '220104', 'INCLAN', '1');
INSERT INTO `distritos` VALUES ('1777', '184', '220107', 'PACHIA', '1');
INSERT INTO `distritos` VALUES ('1778', '184', '220108', 'PALCA', '1');
INSERT INTO `distritos` VALUES ('1779', '184', '220109', 'POCOLLAY', '1');
INSERT INTO `distritos` VALUES ('1780', '184', '220110', 'SAMA', '1');
INSERT INTO `distritos` VALUES ('1781', '184', '220111', 'ALTO DE LA ALIANZA', '1');
INSERT INTO `distritos` VALUES ('1782', '184', '220112', 'CIUDAD NUEVA', '1');
INSERT INTO `distritos` VALUES ('1783', '184', '220113', 'CORONEL GREGORIO ALBARRACIN L.ALFONSO UGARTE', '1');
INSERT INTO `distritos` VALUES ('1784', '185', '220201', 'TARATA', '1');
INSERT INTO `distritos` VALUES ('1785', '185', '220205', 'CHUCATAMANI', '1');
INSERT INTO `distritos` VALUES ('1786', '185', '220206', 'ESTIQUE', '1');
INSERT INTO `distritos` VALUES ('1787', '185', '220207', 'ESTIQUE PAMPA', '1');
INSERT INTO `distritos` VALUES ('1788', '185', '220210', 'SITAJARA', '1');
INSERT INTO `distritos` VALUES ('1789', '185', '220211', 'SUSAPAYA', '1');
INSERT INTO `distritos` VALUES ('1790', '185', '220212', 'TARUCACHI', '1');
INSERT INTO `distritos` VALUES ('1791', '185', '220213', 'TICACO', '1');
INSERT INTO `distritos` VALUES ('1792', '186', '220301', 'LOCUMBA', '1');
INSERT INTO `distritos` VALUES ('1793', '186', '220302', 'ITE', '1');
INSERT INTO `distritos` VALUES ('1794', '186', '220303', 'ILABAYA', '1');
INSERT INTO `distritos` VALUES ('1795', '187', '220401', 'CANDARAVE', '1');
INSERT INTO `distritos` VALUES ('1796', '187', '220402', 'CAIRANI', '1');
INSERT INTO `distritos` VALUES ('1797', '187', '220403', 'CURIBAYA', '1');
INSERT INTO `distritos` VALUES ('1798', '187', '220404', 'HUANUARA', '1');
INSERT INTO `distritos` VALUES ('1799', '187', '220405', 'QUILAHUANI', '1');
INSERT INTO `distritos` VALUES ('1800', '187', '220406', 'CAMILACA', '1');
INSERT INTO `distritos` VALUES ('1801', '188', '230101', 'TUMBES', '1');
INSERT INTO `distritos` VALUES ('1802', '188', '230102', 'CORRALES', '1');
INSERT INTO `distritos` VALUES ('1803', '188', '230103', 'LA CRUZ', '1');
INSERT INTO `distritos` VALUES ('1804', '188', '230104', 'PAMPAS DE HOSPITAL', '1');
INSERT INTO `distritos` VALUES ('1805', '188', '230105', 'SAN JACINTO', '1');
INSERT INTO `distritos` VALUES ('1806', '188', '230106', 'SAN JUAN DE LA VIRGEN', '1');
INSERT INTO `distritos` VALUES ('1807', '189', '230201', 'ZORRITOS', '1');
INSERT INTO `distritos` VALUES ('1808', '189', '230202', 'CASITAS', '1');
INSERT INTO `distritos` VALUES ('1809', '189', '230203', 'CANOAS DE PUNTA SAL', '1');
INSERT INTO `distritos` VALUES ('1810', '190', '230301', 'ZARUMILLA', '1');
INSERT INTO `distritos` VALUES ('1811', '190', '230302', 'MATAPALO', '1');
INSERT INTO `distritos` VALUES ('1812', '190', '230303', 'PAPAYAL', '1');
INSERT INTO `distritos` VALUES ('1813', '190', '230304', 'AGUAS VERDES', '1');
INSERT INTO `distritos` VALUES ('1814', '191', '240101', 'CALLAO', '1');
INSERT INTO `distritos` VALUES ('1815', '191', '240102', 'BELLAVISTA', '1');
INSERT INTO `distritos` VALUES ('1816', '191', '240103', 'LA PUNTA', '1');
INSERT INTO `distritos` VALUES ('1817', '191', '240104', 'CARMEN DE LA LEGUA-REYNOSO', '1');
INSERT INTO `distritos` VALUES ('1818', '191', '240105', 'LA PERLA', '1');
INSERT INTO `distritos` VALUES ('1819', '191', '240106', 'VENTANILLA', '1');
INSERT INTO `distritos` VALUES ('1820', '192', '250101', 'CALLERIA', '1');
INSERT INTO `distritos` VALUES ('1821', '192', '250102', 'YARINACOCHA', '1');
INSERT INTO `distritos` VALUES ('1822', '192', '250103', 'MASISEA', '1');
INSERT INTO `distritos` VALUES ('1823', '192', '250104', 'CAMPOVERDE', '1');
INSERT INTO `distritos` VALUES ('1824', '192', '250105', 'IPARIA', '1');
INSERT INTO `distritos` VALUES ('1825', '192', '250106', 'NUEVA REQUENA', '1');
INSERT INTO `distritos` VALUES ('1826', '192', '250107', 'MANANTAY', '1');
INSERT INTO `distritos` VALUES ('1827', '193', '250201', 'PADRE ABAD', '1');
INSERT INTO `distritos` VALUES ('1828', '193', '250202', 'YRAZOLA', '1');
INSERT INTO `distritos` VALUES ('1829', '193', '250203', 'CURIMANA', '1');
INSERT INTO `distritos` VALUES ('1830', '194', '250301', 'RAIMONDI', '1');
INSERT INTO `distritos` VALUES ('1831', '194', '250302', 'TAHUANIA', '1');
INSERT INTO `distritos` VALUES ('1832', '194', '250303', 'YURUA', '1');
INSERT INTO `distritos` VALUES ('1833', '194', '250304', 'SEPAHUA', '1');
INSERT INTO `distritos` VALUES ('1834', '195', '250401', 'PURUS', '1');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `class_icono` varchar(50) NOT NULL COMMENT 'Clase del icono a mostrar',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'Procesos', 'ruta', 'fa-gears', '1', null, '2015-06-07 21:34:16', null, '1');
INSERT INTO `menus` VALUES ('2', 'Mantenimiento', 'mantenimiento', 'fa-table', '1', '2015-03-20 02:14:00', '2015-05-25 03:42:47', null, null);
INSERT INTO `menus` VALUES ('3', 'Reportes', 'reporte', 'fa-list-alt', '1', null, null, null, null);
INSERT INTO `menus` VALUES ('4', 'Sistema', 'mantenimiento', 'fa-gears', '1', '2015-06-07 21:49:47', '2015-06-07 21:49:47', '1', null);

-- ----------------------------
-- Table structure for odes
-- ----------------------------
DROP TABLE IF EXISTS `odes`;
CREATE TABLE `odes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `distrito_id` int(11) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `o_departamento_id` (`departamento_id`),
  KEY `o_provincia_id` (`provincia_id`),
  KEY `o_distrito_id` (`distrito_id`),
  CONSTRAINT `o_departamento_id` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `o_distrito_id` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `o_provincia_id` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of odes
-- ----------------------------
INSERT INTO `odes` VALUES ('1', 'Lima', '14', '127', '1243', 'Jr Mateo Silva', '555555', null, '1', null, null, null, null);
INSERT INTO `odes` VALUES ('2', 'Callao', '24', '191', '1814', 'Saens Peña', '666666', null, '1', null, null, null, null);
INSERT INTO `odes` VALUES ('3', 'Callao dos', '24', '191', '1818', 'Av Galvez 1251', '112212', 'abc@abc.cm', '1', null, '2016-07-06 00:36:11', '1', null);

-- ----------------------------
-- Table structure for odes_distritos
-- ----------------------------
DROP TABLE IF EXISTS `odes_distritos`;
CREATE TABLE `odes_distritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ode_id` int(11) NOT NULL,
  `distrito_id` int(11) NOT NULL,
  `año` year(4) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of odes_distritos
-- ----------------------------
INSERT INTO `odes_distritos` VALUES ('1', '1', '1243', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('2', '1', '1244', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('3', '1', '1245', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('4', '2', '1814', '2016', '0', '2016-06-04 00:10:08', null, '1', '1');
INSERT INTO `odes_distritos` VALUES ('5', '2', '1816', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('6', '2', '1818', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('7', '2', '1819', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('8', '3', '1815', '2016', '1', '2016-06-04 00:10:08', '2016-07-06 00:36:11', '1', '1');
INSERT INTO `odes_distritos` VALUES ('9', '3', '1817', '2016', '1', '2016-06-04 00:10:08', '2016-07-06 00:36:11', '1', '1');
INSERT INTO `odes_distritos` VALUES ('10', '1', '1257', '2016', '1', '2016-06-04 00:10:08', null, '1', null);
INSERT INTO `odes_distritos` VALUES ('11', '3', '1814', '2016', '1', '2016-06-26 22:33:28', '2016-07-06 00:36:11', '1', '1');

-- ----------------------------
-- Table structure for opciones
-- ----------------------------
DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `o_menu_id_idx` (`menu_id`) USING BTREE,
  CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of opciones
-- ----------------------------
INSERT INTO `opciones` VALUES ('1', '2', 'Cargos', 'cargo', '1', null, null, null, null);
INSERT INTO `opciones` VALUES ('2', '4', 'Opciones', 'opcion', '1', null, '2016-05-26 14:10:58', null, null);
INSERT INTO `opciones` VALUES ('3', '4', 'Menus', 'menu', '1', null, null, null, null);
INSERT INTO `opciones` VALUES ('4', '2', 'Personas', 'persona', '1', null, '2016-05-26 14:10:42', null, null);
INSERT INTO `opciones` VALUES ('5', '1', 'Programación de Visitas', 'colegio.visita', '1', '2016-05-27 14:40:01', '2016-06-04 00:02:08', null, null);
INSERT INTO `opciones` VALUES ('6', '2', 'Carreras', 'carrera', '1', '2016-05-30 00:49:42', '2016-05-30 00:49:42', null, null);
INSERT INTO `opciones` VALUES ('7', '2', 'Colegios', 'colegio', '1', '2016-06-04 01:44:00', '2016-06-04 01:44:00', null, null);
INSERT INTO `opciones` VALUES ('8', '2', 'Odes', 'ode', '1', '2016-06-16 21:50:31', '2016-06-16 21:50:31', null, null);
INSERT INTO `opciones` VALUES ('9', '1', 'Visitas Programadas', 'colegio.visitapro', '1', '2016-06-18 03:55:25', '2016-06-18 03:55:25', null, null);
INSERT INTO `opciones` VALUES ('11', '3', 'Reporte Prueba', 'colegio.reporteprueba', '1', null, null, null, null);

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distrito_id` int(11) DEFAULT NULL,
  `paterno` varchar(70) DEFAULT NULL,
  `materno` varchar(70) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL COMMENT 'F: Femenino | M: Masculino',
  `direccion` varchar(250) DEFAULT NULL,
  `referencia` varchar(250) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_distrito_id` (`distrito_id`),
  CONSTRAINT `p_distrito_id` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('1', null, 'Salcedo', 'Franco', 'Jorge Luis', '12312312', '$2y$10$2fiqeo5KcQRTNDlkA.1kXeJprknqyC7JNH/8eXJbPEmhfz9GiRQL6', '1988-10-14', 'M', null, null, '954573333', 'jorgeshevchenk@gmail.com', 'qbQUSdZPn8gpKniWrBBBfe1qffXlFVQvGqyhl5RbqmEyi0R7gPcIq8PVP2fW', '1', '2016-05-26 11:46:25', '2016-07-02 21:06:48', '1', '1');
INSERT INTO `personas` VALUES ('2', null, 'bet', 'bet', 'Betsayda', '12345678', '$2y$10$gMUga6h71HhkU58oY3vj2OyxIi270BDS2A4D67BI9lpd5GISHe6rS', '2016-05-18', 'F', null, null, null, 'betsa@gmail.com', null, '1', '2016-05-26 17:26:18', '2016-05-26 17:26:32', '1', '1');
INSERT INTO `personas` VALUES ('3', null, 'prueba u', 'prueb u', 'prueba u', '12332112', '$2y$10$UTlnFQuPDnBH9avWd4ZWiOi0B9ZAnak6nQpIg1lMTZAGmfvy0lOce', '2016-06-16', 'M', null, null, null, 'email@email.com', null, '1', '2016-06-16 22:43:23', '2016-06-16 22:43:23', '1', null);
INSERT INTO `personas` VALUES ('4', null, 'alumno', 'alumno', 'alumno', '12332132', '$2y$10$PwAinTUpMjzGM.UFswfLxuVcOy4tjyY6HAwe6UgNgp1dgjXolsnP.', '2016-06-16', 'M', null, null, null, 'alum@alum.com', null, '1', '2016-06-16 22:44:17', '2016-06-16 22:45:20', '1', '1');
INSERT INTO `personas` VALUES ('5', null, 'alumno 2 ', 'alumno 2', 'alumno 2', '12312311', '$2y$10$PwAinTUpMjzGM.UFswfLxuVcOy4tjyY6HAwe6UgNgp1dgjXolsnP.', '2016-06-16', 'M', null, null, null, 'alum2@alum.com', null, '1', null, null, null, null);
INSERT INTO `personas` VALUES ('6', null, 'nue pat', 'nuvo', 'nue nom', '01010101', '$2y$10$.Qdc2dYaD.9tnmwuR.kyeeE/d8A0oywk/jx9yL2xGLq1DOlqr/5YW', null, 'M', null, null, null, 'nuev@nuev.com', null, '1', '2016-06-28 17:17:50', '2016-06-28 17:17:50', '1', null);
INSERT INTO `personas` VALUES ('7', null, 'aaa', 'www', 'asvc', '12211221', '$2y$10$XUgbVPAD5gZ4FML1kO.7o.x31W1YwRSm9AgbkZbq3DVcEGqBS105i', null, 'M', 'av univesitaria', 'altura de marañon y cruce con univesi', null, 'ala@sla.com', null, '0', '2016-06-28 17:40:47', '2016-07-06 00:38:57', '1', '1');
INSERT INTO `personas` VALUES ('8', null, 'salc', 'fra', 'rox', '23232323', '$2y$10$PsERiX5HpOfT5sneGVuhneIMlQ8bY77gpxvlS6P4wbpV.vBvEHCGi', '2016-06-15', 'F', 'av fauccet', 'aereopuerto', null, 'probando@ds.com', null, '1', '2016-06-29 08:36:55', '2016-06-29 08:36:55', '1', null);
INSERT INTO `personas` VALUES ('9', null, 'mi paterno', 'mi materno', 'Mi nombrw', '11112222', '$2y$10$o0OqYt.7mJCh5DpZm8BQ5em/6Xs0JGfLSR0hazdoRm27u95m.t73G', null, 'M', null, null, null, 'mailq@qmema.com', null, '1', '2016-06-29 17:33:47', '2016-06-29 17:33:47', '1', null);
INSERT INTO `personas` VALUES ('12', null, 'salced', null, 'nombre', '09090909', '$2y$10$XZ7smRkiSgkwJ1Gl6nGVeuEtBo1Gw.y3Dj9Y8w6kB1TMjZtVc2rKa', null, 'M', null, null, null, null, null, '1', '2016-07-05 11:31:06', '2016-07-05 11:33:49', '1', '1');
INSERT INTO `personas` VALUES ('13', null, 'salced', null, 'nombre', '08080808', '$2y$10$eSFM/BYWBmCOcVBszhxk2OmG.lIy6sBbvHhIgpsD3g0xrgKOQfJfy', null, 'M', null, null, null, null, null, '1', '2016-07-05 11:32:21', '2016-07-05 11:32:21', '1', null);

-- ----------------------------
-- Table structure for provincias
-- ----------------------------
DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iddepartamento` (`departamento_id`) USING BTREE,
  CONSTRAINT `p_departamento_id` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of provincias
-- ----------------------------
INSERT INTO `provincias` VALUES ('1', '1', 'CHACHAPOYAS');
INSERT INTO `provincias` VALUES ('2', '1', 'BAGUA');
INSERT INTO `provincias` VALUES ('3', '1', 'BONGARA');
INSERT INTO `provincias` VALUES ('4', '1', 'LUYA');
INSERT INTO `provincias` VALUES ('5', '1', 'RODRIGUEZ DE MENDOZA');
INSERT INTO `provincias` VALUES ('6', '1', 'CONDORCANQUI');
INSERT INTO `provincias` VALUES ('7', '1', 'UTCUBAMBA');
INSERT INTO `provincias` VALUES ('8', '2', 'HUARAZ');
INSERT INTO `provincias` VALUES ('9', '2', 'AIJA');
INSERT INTO `provincias` VALUES ('10', '2', 'BOLOGNESI');
INSERT INTO `provincias` VALUES ('11', '2', 'CARHUAZ');
INSERT INTO `provincias` VALUES ('12', '2', 'CASMA');
INSERT INTO `provincias` VALUES ('13', '2', 'CORONGO');
INSERT INTO `provincias` VALUES ('14', '2', 'HUAYLAS');
INSERT INTO `provincias` VALUES ('15', '2', 'HUARI');
INSERT INTO `provincias` VALUES ('16', '2', 'MARISCAL LUZURIAGA');
INSERT INTO `provincias` VALUES ('17', '2', 'PALLASCA');
INSERT INTO `provincias` VALUES ('18', '2', 'POMABAMBA');
INSERT INTO `provincias` VALUES ('19', '2', 'RECUAY');
INSERT INTO `provincias` VALUES ('20', '2', 'SANTA');
INSERT INTO `provincias` VALUES ('21', '2', 'SIHUAS');
INSERT INTO `provincias` VALUES ('22', '2', 'YUNGAY');
INSERT INTO `provincias` VALUES ('23', '2', 'ANTONIO RAIMONDI');
INSERT INTO `provincias` VALUES ('24', '2', 'CARLOS FERMIN FITZCARRALD');
INSERT INTO `provincias` VALUES ('25', '2', 'ASUNCION');
INSERT INTO `provincias` VALUES ('26', '2', 'HUARMEY');
INSERT INTO `provincias` VALUES ('27', '2', 'OCROS');
INSERT INTO `provincias` VALUES ('28', '3', 'ABANCAY');
INSERT INTO `provincias` VALUES ('29', '3', 'AYMARAES');
INSERT INTO `provincias` VALUES ('30', '3', 'ANDAHUAYLAS');
INSERT INTO `provincias` VALUES ('31', '3', 'ANTABAMBA');
INSERT INTO `provincias` VALUES ('32', '3', 'COTABAMBAS');
INSERT INTO `provincias` VALUES ('33', '3', 'GRAU');
INSERT INTO `provincias` VALUES ('34', '3', 'CHINCHEROS');
INSERT INTO `provincias` VALUES ('35', '4', 'AREQUIPA');
INSERT INTO `provincias` VALUES ('36', '4', 'CAYLLOMA');
INSERT INTO `provincias` VALUES ('37', '4', 'CAMANA');
INSERT INTO `provincias` VALUES ('38', '4', 'CARAVELI');
INSERT INTO `provincias` VALUES ('39', '4', 'CASTILLA');
INSERT INTO `provincias` VALUES ('40', '4', 'CONDESUYOS');
INSERT INTO `provincias` VALUES ('41', '4', 'ISLAY');
INSERT INTO `provincias` VALUES ('42', '4', 'LA UNION');
INSERT INTO `provincias` VALUES ('43', '5', 'HUAMANGA');
INSERT INTO `provincias` VALUES ('44', '5', 'CANGALLO');
INSERT INTO `provincias` VALUES ('45', '5', 'HUANTA');
INSERT INTO `provincias` VALUES ('46', '5', 'LA MAR');
INSERT INTO `provincias` VALUES ('47', '5', 'LUCANAS');
INSERT INTO `provincias` VALUES ('48', '5', 'PARINACOCHAS');
INSERT INTO `provincias` VALUES ('49', '5', 'VICTOR FAJARDO');
INSERT INTO `provincias` VALUES ('50', '5', 'HUANCA SANCOS');
INSERT INTO `provincias` VALUES ('51', '5', 'VILCAS HUAMAN');
INSERT INTO `provincias` VALUES ('52', '5', 'PAUCAR DEL SARA SARA');
INSERT INTO `provincias` VALUES ('53', '5', 'SUCRE');
INSERT INTO `provincias` VALUES ('54', '6', 'CAJAMARCA');
INSERT INTO `provincias` VALUES ('55', '6', 'CAJABAMBA');
INSERT INTO `provincias` VALUES ('56', '6', 'CELENDIN');
INSERT INTO `provincias` VALUES ('57', '6', 'CONTUMAZA');
INSERT INTO `provincias` VALUES ('58', '6', 'CUTERVO');
INSERT INTO `provincias` VALUES ('59', '6', 'CHOTA');
INSERT INTO `provincias` VALUES ('60', '6', 'HUALGAYOC');
INSERT INTO `provincias` VALUES ('61', '6', 'JAEN');
INSERT INTO `provincias` VALUES ('62', '6', 'SANTA CRUZ');
INSERT INTO `provincias` VALUES ('63', '6', 'SAN MIGUEL');
INSERT INTO `provincias` VALUES ('64', '6', 'SAN IGNACIO');
INSERT INTO `provincias` VALUES ('65', '6', 'SAN MARCOS');
INSERT INTO `provincias` VALUES ('66', '6', 'SAN PABLO');
INSERT INTO `provincias` VALUES ('67', '7', 'CUSCO');
INSERT INTO `provincias` VALUES ('68', '7', 'ACOMAYO');
INSERT INTO `provincias` VALUES ('69', '7', 'ANTA');
INSERT INTO `provincias` VALUES ('70', '7', 'CALCA');
INSERT INTO `provincias` VALUES ('71', '7', 'CANAS');
INSERT INTO `provincias` VALUES ('72', '7', 'CANCHIS');
INSERT INTO `provincias` VALUES ('73', '7', 'CHUMBIVILCAS');
INSERT INTO `provincias` VALUES ('74', '7', 'ESPINAR');
INSERT INTO `provincias` VALUES ('75', '7', 'LA CONVENCION');
INSERT INTO `provincias` VALUES ('76', '7', 'PARURO');
INSERT INTO `provincias` VALUES ('77', '7', 'PAUCARTAMBO');
INSERT INTO `provincias` VALUES ('78', '7', 'QUISPICANCHIS');
INSERT INTO `provincias` VALUES ('79', '7', 'URUBAMBA');
INSERT INTO `provincias` VALUES ('80', '8', 'HUANCAVELICA');
INSERT INTO `provincias` VALUES ('81', '8', 'ACOBAMBA');
INSERT INTO `provincias` VALUES ('82', '8', 'ANGARAES');
INSERT INTO `provincias` VALUES ('83', '8', 'CASTROVIRREYNA');
INSERT INTO `provincias` VALUES ('84', '8', 'TAYACAJA');
INSERT INTO `provincias` VALUES ('85', '8', 'HUAYTARA');
INSERT INTO `provincias` VALUES ('86', '8', 'CHURCAMPA');
INSERT INTO `provincias` VALUES ('87', '9', 'HUANUCO');
INSERT INTO `provincias` VALUES ('88', '9', 'AMBO');
INSERT INTO `provincias` VALUES ('89', '9', 'DOS DE MAYO');
INSERT INTO `provincias` VALUES ('90', '9', 'HUAMALIES');
INSERT INTO `provincias` VALUES ('91', '9', 'MARANON');
INSERT INTO `provincias` VALUES ('92', '9', 'LEONCIO PRADO');
INSERT INTO `provincias` VALUES ('93', '9', 'PACHITEA');
INSERT INTO `provincias` VALUES ('94', '9', 'PUERTO INCA');
INSERT INTO `provincias` VALUES ('95', '9', 'HUACAYBAMBA');
INSERT INTO `provincias` VALUES ('96', '9', 'LAURICOCHA');
INSERT INTO `provincias` VALUES ('97', '9', 'YAROWILCA');
INSERT INTO `provincias` VALUES ('98', '10', 'ICA');
INSERT INTO `provincias` VALUES ('99', '10', 'CHINCHA');
INSERT INTO `provincias` VALUES ('100', '10', 'NAZCA');
INSERT INTO `provincias` VALUES ('101', '10', 'PISCO');
INSERT INTO `provincias` VALUES ('102', '10', 'PALPA');
INSERT INTO `provincias` VALUES ('103', '11', 'HUANCAYO');
INSERT INTO `provincias` VALUES ('104', '11', 'CONCEPCION');
INSERT INTO `provincias` VALUES ('105', '11', 'JAUJA');
INSERT INTO `provincias` VALUES ('106', '11', 'JUNIN');
INSERT INTO `provincias` VALUES ('107', '11', 'TARMA');
INSERT INTO `provincias` VALUES ('108', '11', 'YAULI');
INSERT INTO `provincias` VALUES ('109', '11', 'SATIPO');
INSERT INTO `provincias` VALUES ('110', '11', 'CHANCHAMAYO');
INSERT INTO `provincias` VALUES ('111', '11', 'CHUPACA');
INSERT INTO `provincias` VALUES ('112', '12', 'TRUJILLO');
INSERT INTO `provincias` VALUES ('113', '12', 'BOLIVAR');
INSERT INTO `provincias` VALUES ('114', '12', 'SANCHEZ CARRION');
INSERT INTO `provincias` VALUES ('115', '12', 'OTUZCO');
INSERT INTO `provincias` VALUES ('116', '12', 'PACASMAYO');
INSERT INTO `provincias` VALUES ('117', '12', 'PATAZ');
INSERT INTO `provincias` VALUES ('118', '12', 'SANTIAGO DE CHUCO');
INSERT INTO `provincias` VALUES ('119', '12', 'ASCOPE');
INSERT INTO `provincias` VALUES ('120', '12', 'CHEPEN');
INSERT INTO `provincias` VALUES ('121', '12', 'JULCAN');
INSERT INTO `provincias` VALUES ('122', '12', 'GRAN CHIMU');
INSERT INTO `provincias` VALUES ('123', '12', 'VIRU');
INSERT INTO `provincias` VALUES ('124', '13', 'CHICLAYO');
INSERT INTO `provincias` VALUES ('125', '13', 'FERRENAFE');
INSERT INTO `provincias` VALUES ('126', '13', 'LAMBAYEQUE');
INSERT INTO `provincias` VALUES ('127', '14', 'LIMA');
INSERT INTO `provincias` VALUES ('128', '14', 'CAJATAMBO');
INSERT INTO `provincias` VALUES ('129', '14', 'CANTA');
INSERT INTO `provincias` VALUES ('130', '14', 'CANETE');
INSERT INTO `provincias` VALUES ('131', '14', 'HUAURA');
INSERT INTO `provincias` VALUES ('132', '14', 'HUAROCHIRI');
INSERT INTO `provincias` VALUES ('133', '14', 'YAUYOS');
INSERT INTO `provincias` VALUES ('134', '14', 'HUARAL');
INSERT INTO `provincias` VALUES ('135', '14', 'BARRANCA');
INSERT INTO `provincias` VALUES ('136', '14', 'OYON');
INSERT INTO `provincias` VALUES ('137', '15', 'MAYNAS');
INSERT INTO `provincias` VALUES ('138', '15', 'ALTO AMAZONAS');
INSERT INTO `provincias` VALUES ('139', '15', 'LORETO');
INSERT INTO `provincias` VALUES ('140', '15', 'REQUENA');
INSERT INTO `provincias` VALUES ('141', '15', 'UCAYALI');
INSERT INTO `provincias` VALUES ('142', '15', 'MARISCAL RAMON CASTILLA');
INSERT INTO `provincias` VALUES ('143', '15', 'DATEM DEL MARA�ON');
INSERT INTO `provincias` VALUES ('144', '16', 'TAMBOPATA');
INSERT INTO `provincias` VALUES ('145', '16', 'MANU');
INSERT INTO `provincias` VALUES ('146', '16', 'TAHUAMANU');
INSERT INTO `provincias` VALUES ('147', '17', 'MARISCAL NIETO');
INSERT INTO `provincias` VALUES ('148', '17', 'GENERAL SANCHEZ CERRO');
INSERT INTO `provincias` VALUES ('149', '17', 'ILO');
INSERT INTO `provincias` VALUES ('150', '18', 'PASCO');
INSERT INTO `provincias` VALUES ('151', '18', 'DANIEL ALCIDES CARRION');
INSERT INTO `provincias` VALUES ('152', '18', 'OXAPAMPA');
INSERT INTO `provincias` VALUES ('153', '19', 'PIURA');
INSERT INTO `provincias` VALUES ('154', '19', 'AYABACA');
INSERT INTO `provincias` VALUES ('155', '19', 'HUANCABAMBA');
INSERT INTO `provincias` VALUES ('156', '19', 'MORROPON');
INSERT INTO `provincias` VALUES ('157', '19', 'PAITA');
INSERT INTO `provincias` VALUES ('158', '19', 'SULLANA');
INSERT INTO `provincias` VALUES ('159', '19', 'TALARA');
INSERT INTO `provincias` VALUES ('160', '19', 'SECHURA');
INSERT INTO `provincias` VALUES ('161', '20', 'PUNO');
INSERT INTO `provincias` VALUES ('162', '20', 'AZANGARO');
INSERT INTO `provincias` VALUES ('163', '20', 'CARABAYA');
INSERT INTO `provincias` VALUES ('164', '20', 'CHUCUITO');
INSERT INTO `provincias` VALUES ('165', '20', 'HUANCANE');
INSERT INTO `provincias` VALUES ('166', '20', 'LAMPA');
INSERT INTO `provincias` VALUES ('167', '20', 'MELGAR');
INSERT INTO `provincias` VALUES ('168', '20', 'SANDIA');
INSERT INTO `provincias` VALUES ('169', '20', 'SAN ROMAN');
INSERT INTO `provincias` VALUES ('170', '20', 'YUNGUYO');
INSERT INTO `provincias` VALUES ('171', '20', 'SAN ANTONIO DE PUTINA');
INSERT INTO `provincias` VALUES ('172', '20', 'EL COLLAO');
INSERT INTO `provincias` VALUES ('173', '20', 'MOHO');
INSERT INTO `provincias` VALUES ('174', '21', 'MOYOBAMBA');
INSERT INTO `provincias` VALUES ('175', '21', 'HUALLAGA');
INSERT INTO `provincias` VALUES ('176', '21', 'LAMAS');
INSERT INTO `provincias` VALUES ('177', '21', 'MARISCAL CACERES');
INSERT INTO `provincias` VALUES ('178', '21', 'RIOJA');
INSERT INTO `provincias` VALUES ('179', '21', 'SAN MARTIN');
INSERT INTO `provincias` VALUES ('180', '21', 'BELLAVISTA');
INSERT INTO `provincias` VALUES ('181', '21', 'TOCACHE');
INSERT INTO `provincias` VALUES ('182', '21', 'PICOTA');
INSERT INTO `provincias` VALUES ('183', '21', 'EL DORADO');
INSERT INTO `provincias` VALUES ('184', '22', 'TACNA');
INSERT INTO `provincias` VALUES ('185', '22', 'TARATA');
INSERT INTO `provincias` VALUES ('186', '22', 'JORGE BASADRE');
INSERT INTO `provincias` VALUES ('187', '22', 'CANDARAVE');
INSERT INTO `provincias` VALUES ('188', '23', 'TUMBES');
INSERT INTO `provincias` VALUES ('189', '23', 'CONTRALMIRANTE VILLAR');
INSERT INTO `provincias` VALUES ('190', '23', 'ZARUMILLA');
INSERT INTO `provincias` VALUES ('191', '24', 'CALLAO');
INSERT INTO `provincias` VALUES ('192', '25', 'CORONEL PORTILLO');
INSERT INTO `provincias` VALUES ('193', '25', 'PADRE ABAD');
INSERT INTO `provincias` VALUES ('194', '25', 'ATALAYA');
INSERT INTO `provincias` VALUES ('195', '25', 'PURUS');

-- ----------------------------
-- Table structure for visitas
-- ----------------------------
DROP TABLE IF EXISTS `visitas`;
CREATE TABLE `visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colegio_id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL COMMENT 'Persona que dará la visita',
  `personac_id` int(11) DEFAULT NULL,
  `visita_estado_id` int(11) NOT NULL DEFAULT '1',
  `fecha_visita` date NOT NULL,
  `nro_tel` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `v_colegio_id` (`colegio_id`),
  KEY `v_persona_id` (`persona_id`),
  KEY `v_visita_estado_id` (`visita_estado_id`),
  CONSTRAINT `v_colegio_id` FOREIGN KEY (`colegio_id`) REFERENCES `colegios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `v_persona_id` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `v_visita_estado_id` FOREIGN KEY (`visita_estado_id`) REFERENCES `visitas_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of visitas
-- ----------------------------
INSERT INTO `visitas` VALUES ('4', '3', null, null, '1', '2016-06-06', null, '1', '2016-06-06 01:43:03', '2016-06-06 01:43:03', null, null);
INSERT INTO `visitas` VALUES ('5', '3', null, null, '1', '2016-06-06', null, '1', '2016-06-06 02:02:54', '2016-06-06 02:02:54', null, null);
INSERT INTO `visitas` VALUES ('8', '3', '3', '4', '1', '2016-06-18', null, '1', '2016-06-18 03:50:57', '2016-06-18 03:50:57', null, null);
INSERT INTO `visitas` VALUES ('9', '3', '3', '4', '1', '2016-06-20', '796786453', '1', '2016-06-18 09:53:39', '2016-06-18 09:53:39', '1', null);
INSERT INTO `visitas` VALUES ('10', '3', '3', '4', '1', '2016-06-29', '12332112', '1', '2016-06-29 16:04:00', '2016-06-29 16:04:00', '1', null);

-- ----------------------------
-- Table structure for visitas_detalle
-- ----------------------------
DROP TABLE IF EXISTS `visitas_detalle`;
CREATE TABLE `visitas_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visita_id` int(11) DEFAULT NULL,
  `colegio_detalle_id` int(11) NOT NULL,
  `alumnos_total` int(11) NOT NULL DEFAULT '0',
  `alumnos_registrados` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vd_colegio_detalle_id` (`colegio_detalle_id`),
  KEY `vd_visita_id` (`visita_id`),
  CONSTRAINT `vd_colegio_detalle_id` FOREIGN KEY (`colegio_detalle_id`) REFERENCES `colegios_detalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vd_visita_id` FOREIGN KEY (`visita_id`) REFERENCES `visitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of visitas_detalle
-- ----------------------------
INSERT INTO `visitas_detalle` VALUES ('3', '4', '1', '0', '0', '1', '2016-06-06 01:43:03', '2016-06-06 01:43:03', null, null);
INSERT INTO `visitas_detalle` VALUES ('4', '4', '2', '0', '0', '1', '2016-06-06 01:43:03', '2016-06-06 01:43:03', null, null);
INSERT INTO `visitas_detalle` VALUES ('5', '5', '2', '0', '0', '1', '2016-06-06 02:02:54', '2016-06-06 02:02:54', null, null);
INSERT INTO `visitas_detalle` VALUES ('6', '5', '3', '0', '0', '1', '2016-06-06 02:02:54', '2016-06-06 02:02:54', null, null);
INSERT INTO `visitas_detalle` VALUES ('7', '8', '1', '30', '0', '1', '2016-06-18 03:50:57', '2016-06-18 03:50:57', null, null);
INSERT INTO `visitas_detalle` VALUES ('8', '8', '3', '40', '0', '1', '2016-06-18 03:50:57', '2016-06-18 03:50:57', null, null);
INSERT INTO `visitas_detalle` VALUES ('9', '9', '1', '35', '0', '1', '2016-06-18 09:53:39', '2016-06-18 09:53:39', '1', null);
INSERT INTO `visitas_detalle` VALUES ('10', '9', '3', '56', '0', '1', '2016-06-18 09:53:39', '2016-06-18 09:53:39', '1', null);
INSERT INTO `visitas_detalle` VALUES ('11', '10', '1', '25', '0', '1', '2016-06-29 16:04:00', '2016-06-29 16:04:00', '1', null);
INSERT INTO `visitas_detalle` VALUES ('12', '10', '2', '50', '0', '1', '2016-06-29 16:04:00', '2016-06-29 16:04:00', '1', null);
INSERT INTO `visitas_detalle` VALUES ('13', '10', '3', '35', '0', '1', '2016-06-29 16:04:00', '2016-06-29 16:04:00', '1', null);

-- ----------------------------
-- Table structure for visitas_estado
-- ----------------------------
DROP TABLE IF EXISTS `visitas_estado`;
CREATE TABLE `visitas_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of visitas_estado
-- ----------------------------
INSERT INTO `visitas_estado` VALUES ('1', 'Programado', '1', '2016-06-06 00:45:42', null, '1', null);
INSERT INTO `visitas_estado` VALUES ('2', 'Atendido', '1', '2016-06-06 00:45:42', null, '1', null);
INSERT INTO `visitas_estado` VALUES ('3', 'Suspendido', '1', '2016-06-06 00:45:42', null, '1', null);
INSERT INTO `visitas_estado` VALUES ('4', 'Anulado', '1', '2016-06-06 00:45:42', null, '1', null);
