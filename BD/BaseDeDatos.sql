-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2020 a las 23:07:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planeacion_proyectos`
--
CREATE DATABASE IF NOT EXISTS `planeacion_proyectos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `planeacion_proyectos`;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalles_proyecto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `detalles_proyecto` (
`Proyecto` varchar(10)
,`Titulo_Proyecto` varchar(50)
,`Descripcion_Proyecto` varchar(200)
,`Fecha_inicio` date
,`Fecha_final` date
,`Tarea` varchar(10)
,`Titulo_Tarea` varchar(50)
,`Descripcion_Tarea` varchar(200)
,`Dependencia` varchar(10)
,`Duracion_Estimada` decimal(4,1)
,`Fecha_Inicio_tarea` date
,`Fecha_Inicio_fin` date
,`Subtarea` varchar(10)
,`Titulo_Subtarea` varchar(50)
,`Descripcion_Subtarea` varchar(200)
,`Duracion` decimal(4,1)
,`Fecha_inicio_Subtarea` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `ID_Disponibilidad` int(11) NOT NULL COMMENT 'Identificador para el calculo total del recurso asociado a una tarea',
  `Recurso` int(11) DEFAULT NULL COMMENT 'Referencia hacia la tabla "GestorRecursos" que sirve para identificar la tarea asociada',
  `Fecha_inicio` date DEFAULT NULL COMMENT 'Fecha en que inicia la tarea',
  `Fecha_fin` date DEFAULT NULL COMMENT 'Fecha en la que termina la tarea,se calcuka con la duracion total de la tarea y el porcentaje de utilizacion.',
  `HorasXdia` decimal(4,1) DEFAULT NULL COMMENT 'Nos indica las horas por jornada laboral,se calcula con la utilizacion',
  `Dias_trabajados` decimal(4,1) DEFAULT NULL COMMENT 'Indica cuantos dias laborales abarca la tarea,se calcula con las HorasXdia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que registra los datos necesario para calcular la disponibilidad de recursos de un proyecto\nSe registra los datos de cada tarea.';

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`ID_Disponibilidad`, `Recurso`, `Fecha_inicio`, `Fecha_fin`, `HorasXdia`, `Dias_trabajados`) VALUES
(3004, 401, '2019-05-01', '2019-05-17', '8.0', '15.0'),
(3005, 402, '2019-05-18', '2019-05-21', '8.0', '3.0'),
(3006, 403, '2019-05-22', '2019-06-07', '8.0', '15.0'),
(3007, 404, '2019-06-08', '2019-06-12', '8.0', '4.0'),
(3008, 405, '2019-06-13', '2019-06-19', '4.0', '6.0'),
(3009, 406, '2019-06-20', '2019-06-21', '8.0', '1.0'),
(3010, 407, '2019-07-01', '2019-07-03', '8.0', '3.0'),
(3011, 408, '2019-07-04', '2019-07-31', '8.0', '28.0'),
(3012, 409, '2019-08-01', '2019-09-07', '8.0', '38.0'),
(3013, 410, '2019-09-08', '2019-09-23', '4.0', '16.0'),
(3014, 411, '2019-09-24', '2019-10-06', '8.0', '13.0'),
(3021, 418, '2019-11-01', '2019-11-10', '8.0', '10.0'),
(3022, 419, '2019-11-11', '2019-11-18', '4.0', '8.0'),
(3023, 420, '2019-11-19', '2019-11-27', '8.0', '9.0'),
(3024, 421, '2019-11-28', '2019-12-06', '8.0', '9.0'),
(3025, 422, '2019-12-07', '2019-12-15', '8.0', '9.0'),
(3026, 423, '2019-01-01', '2019-01-10', '8.0', '10.0'),
(3027, 424, '2019-01-11', '2019-01-28', '4.0', '18.0'),
(3028, 425, '2019-01-29', '2019-02-06', '8.0', '9.0'),
(3029, 426, '2019-02-07', '2019-02-12', '8.0', '6.0'),
(3030, 427, '2019-02-13', '2019-02-18', '8.0', '6.0'),
(3031, 428, '2019-04-01', '2019-04-06', '8.0', '6.0'),
(3032, 429, '2019-04-07', '2019-04-12', '4.0', '6.0'),
(3033, 430, '2019-04-13', '2019-04-16', '8.0', '4.0'),
(3034, 431, '2019-04-17', '2019-04-20', '8.0', '4.0'),
(3035, 432, '2019-04-21', '2019-04-26', '8.0', '6.0'),
(3039, 436, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_Empleado` int(11) NOT NULL COMMENT 'Identificador unico de un empleado',
  `ID_Persona` int(11) DEFAULT NULL COMMENT 'Referencia hacia la tabla "Persona" que contiene los datos personales de un empleado',
  `Puesto` varchar(30) DEFAULT NULL COMMENT 'Indica el puesto actual de un empleado',
  `Departamento` varchar(30) DEFAULT NULL COMMENT 'Indica el departamento al que pertenece un empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que indica los empleados de los cuales dispone la empresa.';

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_Empleado`, `ID_Persona`, `Puesto`, `Departamento`) VALUES
(2000, 1000, 'Operador', 'Sistemas'),
(2001, 1001, 'Analista', 'Riesgos'),
(2002, 1002, 'Diseñador', 'Publicidad'),
(2003, 1003, 'Diseñador', 'Publicidad'),
(2004, 1004, 'Desarrollador', 'Sistemas'),
(2005, 1005, 'Desarrollador', 'Sistemas'),
(2006, 1006, 'Coordinador', 'Infraestructura'),
(2007, 1007, 'Analista', 'Sistemas'),
(2008, 1008, 'Coordinador de desarrollo', 'Sistemas'),
(2009, 1009, 'Analista', 'Sistemas'),
(2010, 1010, 'Ing.Software', 'Sistemas'),
(2011, 1011, 'Supervisor', 'Publicidad'),
(2012, 1012, 'Operador', 'Sistemas'),
(2013, 1013, 'Analista', 'Riesgos'),
(2014, 1014, 'Magnament Project', 'Estrategia Comercial'),
(2015, 1015, 'Operacional', 'Operaciones'),
(2016, 1016, 'Supervisor', 'Ventas'),
(2017, 1017, 'Supervisor', 'Estrategia Comercial'),
(2018, 1018, 'Sinior BD', 'Sistemas'),
(2019, 1019, 'Gerente', 'Ventas'),
(2020, 1020, 'Gerente', 'Operaciones'),
(2021, 1021, 'Ejecutivo', 'Estrategia Comercial'),
(2022, 1022, 'Diseñador', 'Publicidad'),
(2023, 1023, 'Operador', 'Finanzas'),
(2024, 1024, 'Gerente', 'Seguridad'),
(2025, 1025, 'Ing.Sistemas', 'Seguridad Informatica'),
(2026, 1026, 'Ing.Sistemas', 'Telecomunicaciones'),
(2027, 1027, 'Coordinador', 'Finanzas'),
(2028, 1028, 'Administrador', 'Procesos'),
(2029, 1029, 'Administrador', 'Recursos Humanos'),
(2030, NULL, 'Analista', 'Operaciones'),
(2031, 1030, NULL, NULL),
(2032, NULL, 'sdafsadf', 'asdfasdf'),
(2041, NULL, 'Prueba', 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestortareas`
--

CREATE TABLE `gestortareas` (
  `Clave` int(11) NOT NULL COMMENT 'Identificador unico para manejar los datos de una tarea',
  `Tarea` varchar(10) DEFAULT NULL COMMENT 'Referencia hacia la tabla "Tareas", que se utiliza para identificar la tarea',
  `Utilizacion` decimal(4,1) DEFAULT NULL COMMENT 'Indica el tiempo de utilizacion de un recurso representada en porcentaje,ya sea parcial que es igual al 50%\no jornada completa  que se representa con el 100%.',
  `R_Humano` int(11) DEFAULT NULL,
  `R_Tecnologico` int(11) DEFAULT NULL,
  `Encargado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que se utiliza como la principal para el calculo y la planificacion';

--
-- Volcado de datos para la tabla `gestortareas`
--

INSERT INTO `gestortareas` (`Clave`, `Tarea`, `Utilizacion`, `R_Humano`, `R_Tecnologico`, `Encargado`) VALUES
(401, 'TSISCOM001', '100.0', 201, 303, 2029),
(402, 'TSISCOM002', '100.0', 202, 300, 2004),
(403, 'TSISCOM003', '100.0', 221, 300, 2026),
(404, 'TSISCOM004', '100.0', 216, 304, 2001),
(405, 'TSISCOM005', '50.0', 220, 307, 2003),
(406, 'TSISCOM006', '100.0', 213, 306, 2006),
(407, 'TSISINV001', '100.0', 208, 307, 2001),
(408, 'TSISINV002', '100.0', 219, 303, 2021),
(409, 'TSISINV003', '100.0', 207, 306, 2023),
(410, 'TSISINV004', '50.0', 211, 301, 2024),
(411, 'TSISINV005', '100.0', 211, 305, 2026),
(418, 'TSISVEN001', '100.0', 215, 302, 2018),
(419, 'TSISVEN002', '50.0', 213, 307, 2014),
(420, 'TSISVEN003', '100.0', 220, 306, 2026),
(421, 'TSISVEN004', '100.0', 213, 303, 2025),
(422, 'TSISVEN005', '100.0', 215, 305, 2020),
(423, 'TSISCAJ001', '100.0', 211, 304, 2001),
(424, 'TSISCAJ002', '50.0', 207, 304, 2011),
(425, 'TSISCAJ003', '100.0', 214, 303, 2024),
(426, 'TSISCAJ004', '100.0', 201, 302, 2022),
(427, 'TSISCAJ005', '100.0', 203, 306, 2024),
(428, 'TSISBAR001', '100.0', 214, 304, 2008),
(429, 'TSISBAR002', '50.0', 214, 303, 2009),
(430, 'TSISBAR003', '100.0', 214, 306, 2016),
(431, 'TSISBAR004', '100.0', 222, 303, 2015),
(432, 'TSISBAR005', '100.0', 207, 306, 2020),
(436, 'TSISPRU001', '100.0', 201, 301, 2002);

--
-- Disparadores `gestortareas`
--
DELIMITER $$
CREATE TRIGGER `ingresa_tarea_disponibilidad` AFTER INSERT ON `gestortareas` FOR EACH ROW begin
	insert into disponibilidad (Recurso) values (new.Clave);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor_proyecto`
--

CREATE TABLE `gestor_proyecto` (
  `Proyecto` varchar(10) NOT NULL COMMENT 'Referencia hacia la tabla "Proyecto" para identificar el proyecto',
  `Encargado` int(11) DEFAULT NULL COMMENT 'Referencia hacia la tabla "Empleado" para designar el encargado del proyecto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que se utiliza para registrar el encargado de un proyecto';

--
-- Volcado de datos para la tabla `gestor_proyecto`
--

INSERT INTO `gestor_proyecto` (`Proyecto`, `Encargado`) VALUES
('PROSISCOMP', 2010),
('PROAPPBARB', 2014),
('PROSISCAJA', 2018),
('PROSISINVE', 2020),
('PROSISVENT', 2025),
('PROAPPPRUE', 2041);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID_Persona` int(11) NOT NULL COMMENT 'Identificador unico para una persona',
  `Nombre` varchar(30) NOT NULL COMMENT 'Nombre de una persona',
  `AppelidoPat` varchar(30) NOT NULL COMMENT 'Apellido paterno de una persona',
  `AppelidoMat` varchar(30) DEFAULT NULL COMMENT 'Apellido materno de una persona',
  `Fecha_Nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de una persona',
  `Fotografia` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que se utiliza para registrar los datos personales de un empleado de la empresa';

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_Persona`, `Nombre`, `AppelidoPat`, `AppelidoMat`, `Fecha_Nacimiento`, `Fotografia`) VALUES
(1000, 'Jorge', 'Moreno', 'Sola', '1990-12-30', '1584578183hombrelt.jfif'),
(1001, 'Samuel', 'Aguilar', 'Perez', '1990-10-02', '1584578209hombre.jfif'),
(1002, 'Alicia', 'Villareal', 'Sanchez', '1990-01-29', '1584578238mujer.jfif'),
(1003, 'Samantha', 'Altiva', 'Nativa', '1990-02-20', '1584578333mujer.jfif'),
(1004, 'Antonie', 'Moreno', 'Soto', '1990-08-05', '1584578349hombret.jfif'),
(1005, 'Juan', 'Toledo', 'Manchaca', '1989-04-08', '1584578365hombrebr.jfif'),
(1006, 'Margarita', 'Nuñez', 'Rivera', '1992-06-04', '1584578387mujerN.jfif'),
(1007, 'Alma', 'Godinez', 'Rivera', '1991-07-08', '1584578410mujer.jfif'),
(1008, 'Rosa', 'Mena', 'Guevara', '1978-11-05', '1584578425mujerlt.jfif'),
(1009, 'Ramon', 'Ramirez', 'Rosas', '1985-10-29', '1584578443hombres.jfif'),
(1010, 'Miguel', 'Herrera', 'Postigo', '1985-04-19', '1584578458hombret.jfif'),
(1011, 'Jacob', 'Hernandez', 'Rodriguez', '1989-05-07', '1584578474hombrebr.jfif'),
(1012, 'Damian', 'Hernandez', 'Hernandez', '1989-09-09', '1584578539hombrelt.jfif'),
(1013, 'Hector', 'Mendoza', 'Contreras', '1986-10-10', '1584578558hombrenr.jfif'),
(1014, 'Giovanni', 'Hernandez', 'Rodriguez', '1990-03-20', '1584578581hombre.jfif'),
(1015, 'Maira', 'Posos', 'Lisboa', '1990-04-20', '1584578599mujerlt.jfif'),
(1016, 'Felipe', 'Calderon', 'Muciño', '1988-03-18', '1584578732hombres.jfif'),
(1017, 'Rosa', 'Moreno', 'Ortiz', '1990-05-20', '1584578748hombrelt.jfif'),
(1018, 'Gustavo', 'Santiago', 'Mendez', '1990-07-20', '1584578777hombret.jfif'),
(1019, 'Ramiro', 'Castro', 'Fernandez', '1990-08-20', '1584578790hombrebr.jfif'),
(1020, 'Alondra', 'Castillo', 'Muñoz', '1990-09-20', '1584578809hombrenr.jfif'),
(1021, 'Sergio', 'Salasar', 'Montes', '1990-10-20', '1584578834hombres.jfif'),
(1022, 'Abigail', 'Vilchis', 'Pacheco', '1990-11-20', '1584578848mujerN.jfif'),
(1023, 'Jazmin', 'Figueroa', 'Lopez', '1992-02-05', '1584578864mujerlt.jfif'),
(1024, 'Mariana', 'Sanchez', 'Mendes', '1992-04-08', '1584578878mujer.jfif'),
(1025, 'Habram', 'Ramires', 'Flores', '1992-05-08', ''),
(1026, 'Carlos', 'Bedolla', 'Hernandez', '1992-06-09', ''),
(1027, 'Miguel', 'Mejia', 'Baron', '1991-04-01', ''),
(1028, 'Issac', 'Rojas', 'Garcia', '1991-01-07', ''),
(1029, 'Alfredo', 'Gasca', 'Hernandes', '1991-05-05', ''),
(1030, 'Mariano', 'Talavera', 'Castillo', '2020-03-01', NULL),
(1031, 'safsdf', 'asdfasdf', 'sdafsdaf', '2020-03-04', NULL),
(1032, 'Luis Rodrigo', 'Laguna', 'Garcia', '2019-11-06', '1584921284hombrenr.jfif'),
(1036, 'asdfsdfs', 'dafsadfsad', 'sdafasdf', '2020-03-12', '1584923212hombrenr.jfif'),
(1037, 'Prueba', 'Prueba', 'Prueba', '2020-03-04', 'hombrebr.jfif');

--
-- Disparadores `persona`
--
DELIMITER $$
CREATE TRIGGER `Ingresa_Empleado` AFTER INSERT ON `persona` FOR EACH ROW BEGIN
    DECLARE ultimo_empleado integer;

    SET @ultimo_empleado = (SELECT max(ID_Empleado) FROM empleado);

	INSERT INTO relacion_empleados (Empleado_ID,Persona_ID) VALUES (@ultimo_empleado,new.ID_Persona);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `elimina_empleado` BEFORE DELETE ON `persona` FOR EACH ROW BEGIN
    DECLARE ultimo_empleado integer;

    SET @ultimo_empleado = (SELECT max(ID_Empleado) FROM empleado);

	DELETE FROM empleado WHERE ID_Empleado =@ultimo_empleado;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `planeacion_proyecto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `planeacion_proyecto` (
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `Clave` varchar(10) NOT NULL COMMENT 'Identificador del proyecto',
  `Titulo` varchar(50) DEFAULT NULL COMMENT 'Titulo de proyecto',
  `Descripcion` varchar(200) DEFAULT NULL COMMENT 'Breve descripcion de proyecto',
  `Fecha_inicio` date DEFAULT NULL COMMENT 'Fecha en que inicia el proyecto',
  `Fecha_final` date DEFAULT NULL COMMENT 'Fecha en la cual termina el proyecto,se puede recalcular haciendo uso de stored procedure',
  `Progreso` int(11) DEFAULT NULL,
  `Estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que alberga los datos principales de un proyecto';

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`Clave`, `Titulo`, `Descripcion`, `Fecha_inicio`, `Fecha_final`, `Progreso`, `Estatus`) VALUES
('PROAPPBARB', 'Aplicacion Barberia', 'Desarrollar una aplicacion movil para la reservacion en barberias', '2019-04-26', '2019-04-26', 85, 'En espera'),
('PROAPPPRUE', 'Prueba', 'Prueba', '2020-03-20', '2020-03-18', 60, 'En espera'),
('PROSISCAJA', 'Cajero Automatico', 'Realizar el diseño del sistema de un cajero automatico', '2019-02-18', '2019-02-18', 90, 'Exito'),
('PROSISCOMP', 'Sistema de compras', 'Diseñar e implementar un sistema en el cual el cliente dentra la facilidad de realizar una compra', '2019-06-21', '2019-06-21', 50, 'Exito'),
('PROSISINVE', 'Sistema de inventario', 'Diseñar e implementar un sistema que ayude a la gestion de recurso de una tienda comercial de ropa', '2019-10-06', '2019-10-06', 65, 'Exito'),
('PROSISVENT', 'Sistema de ventas', 'Diseñar un sistema de ventas para una tienda de conveniencia', '2019-12-15', '2019-12-15', 90, 'Exito');

--
-- Disparadores `proyecto`
--
DELIMITER $$
CREATE TRIGGER `ingresa_proyecto` AFTER INSERT ON `proyecto` FOR EACH ROW begin
insert into gestor_proyecto (Proyecto) values (new.Clave);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `proyecto_caracteristicas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `proyecto_caracteristicas` (
`Clave` varchar(10)
,`Titulo` varchar(50)
,`Descripcion` varchar(200)
,`Fecha_inicio` date
,`Fecha_final` date
,`Encargado` varchar(92)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_empleados`
--

CREATE TABLE `relacion_empleados` (
  `Empleado_ID` int(11) NOT NULL,
  `Persona_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `relacion_empleados`
--

INSERT INTO `relacion_empleados` (`Empleado_ID`, `Persona_ID`) VALUES
(2000, 1000),
(2001, 1001),
(2002, 1002),
(2003, 1003),
(2004, 1004),
(2005, 1005),
(2006, 1006),
(2007, 1007),
(2008, 1008),
(2009, 1009),
(2010, 1010),
(2011, 1011),
(2012, 1012),
(2013, 1013),
(2014, 1014),
(2015, 1015),
(2016, 1016),
(2017, 1017),
(2018, 1018),
(2019, 1019),
(2020, 1020),
(2021, 1021),
(2022, 1022),
(2023, 1023),
(2024, 1024),
(2025, 1001),
(2041, 1037);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humano`
--

CREATE TABLE `r_humano` (
  `ID_R_Humano` int(11) NOT NULL COMMENT 'Identificador del recurso humano',
  `Empleado` int(11) DEFAULT NULL COMMENT 'Identificador del empleado que funge como recurso humano',
  `Nombre_Recurso` varchar(30) DEFAULT NULL COMMENT 'Nombre que se le da a el recurso humano'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que asocia un empleado y lo asigna como recurso humano';

--
-- Volcado de datos para la tabla `r_humano`
--

INSERT INTO `r_humano` (`ID_R_Humano`, `Empleado`, `Nombre_Recurso`) VALUES
(200, 2018, 'Requerimientos'),
(201, 2028, 'Analisis'),
(202, 2023, 'Analisis Comercial'),
(203, 2009, 'Calculo'),
(204, 2017, 'Costo'),
(205, 2015, 'Presupuesto'),
(206, 2020, 'Requerimientos'),
(207, 2004, 'Patron diseño'),
(208, 2005, 'Modelo Diseño'),
(209, 2000, 'Implantacion'),
(210, 2001, 'Implantacion_Apoyo'),
(211, 2010, 'Mantenimiento'),
(212, 2000, 'Requerimientos'),
(213, 2001, 'Patron diseño'),
(214, 2002, 'Modelo Diseño'),
(215, 2003, 'Implantacion'),
(216, 2004, 'Ingenieria'),
(217, 2005, 'Ingenieria'),
(218, 2000, 'Requerimientos'),
(219, 2001, 'Patron diseño'),
(220, 2002, 'Modelo Diseño'),
(221, 2003, 'Implantacion'),
(222, 2004, 'Ingenieria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_tecnologico`
--

CREATE TABLE `r_tecnologico` (
  `ID_R_Tecnologico` int(11) NOT NULL COMMENT 'Identificador del recurso tecnologico',
  `Nombre_Recurso` varchar(30) DEFAULT NULL COMMENT 'Nombre que se le da al recurso tecnologico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene los diferentes recursos tecnologicos de los que puede disponer el proyecto';

--
-- Volcado de datos para la tabla `r_tecnologico`
--

INSERT INTO `r_tecnologico` (`ID_R_Tecnologico`, `Nombre_Recurso`) VALUES
(300, 'Software'),
(301, 'Computadora'),
(302, 'Software'),
(303, 'Computadora'),
(304, 'Software'),
(305, 'Software'),
(306, 'Computadoras'),
(307, 'Software'),
(308, 'Laptops');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtareas`
--

CREATE TABLE `subtareas` (
  `Clave` varchar(10) NOT NULL COMMENT 'Identificador de la subtarea',
  `Tarea` varchar(10) DEFAULT NULL COMMENT 'Identificador de la tarea a la que pertenece',
  `Titulo` varchar(50) DEFAULT NULL COMMENT 'Titulo que identifica una subtarea',
  `Descripcion` varchar(200) DEFAULT NULL COMMENT 'Descripcion breve de la subtarea',
  `Duracion` decimal(4,1) DEFAULT NULL COMMENT 'Duracion en horas de la subtarea',
  `Fecha_inicio` date DEFAULT NULL COMMENT 'Fecha estimada de inicio de la subtarea.Se recalcula el inicio de cada subtarea para eviat sobreasignacion de recurso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene las subtareas de una tarea,la duracion de las subtareas que desprenden de una tarea se suma a la duracion de la tarea';

--
-- Volcado de datos para la tabla `subtareas`
--

INSERT INTO `subtareas` (`Clave`, `Tarea`, `Titulo`, `Descripcion`, `Duracion`, `Fecha_inicio`) VALUES
('SSISBAR001', 'TSISBAR001', 'Especificación de requisitos', 'Analizar el problema y clasificar y priorizar requisitos', '24.0', '2019-04-01'),
('SSISBAR002', 'TSISBAR002', 'Modelo de casos de uso', 'Especificar casos de uso', '24.0', '2019-04-04'),
('SSISBAR003', 'TSISBAR003', 'Modelo de diseño y arquitectura', 'Realizar diagramas de procesos y secuencias', '32.0', '2019-04-10'),
('SSISBAR004', 'TSISBAR004', 'Modelo de datos', 'Realizar modelo de datos', '32.0', '2019-04-14'),
('SSISBAR005', 'TSISBAR005', 'Modelo de implementación', 'Estructurar modelo de implementación', '48.0', '2019-04-18'),
('SSISCAJ001', 'TSISCAJ001', 'Especificación de requisitos', 'Analizar el problema y clasificar y priorizar requisitos', '48.0', '2019-01-01'),
('SSISCAJ002', 'TSISCAJ002', 'Modelo de casos de uso', 'Especificar casos de uso', '72.0', '2019-01-07'),
('SSISCAJ003', 'TSISCAJ003', 'Modelo de diseño y arquitectura', 'Realizar diagramas de procesos y secuencias', '72.0', '2019-01-25'),
('SSISCAJ004', 'TSISCAJ004', 'Modelo de datos', 'Realizar modelo de datos', '48.0', '2019-02-03'),
('SSISCAJ005', 'TSISCAJ005', 'Modelo de implementación', 'Estructurar modelo de implementación', '48.0', '2019-02-09'),
('SSISCOM001', 'TSISCOM001', 'Levantamiento de informacion', 'realizar una serie de entrevistas utilizando técnicas de levantamiento de información', '72.0', '2019-05-01'),
('SSISCOM002', 'TSISCOM001', 'Determinado de los requerimientos', ' Hemos determinado que los requerimientos', '48.0', '2019-05-11'),
('SSISCOM003', 'TSISCOM002', 'Medición el Análisis de puntos', 'Calculo de los puntos de funcion, con lo cual obtendremos una medida del tamaño del proyecto.', '24.0', '2019-05-18'),
('SSISCOM004', 'TSISCOM003', 'Determinar las transacciones de negocio', 'Desglosar a partir de los requerimientos de software el tipo de transacciones', '48.0', '2019-05-22'),
('SSISCOM005', 'TSISCOM003', 'Componentes de datos', 'Determinacion preliminar de cuál será el modelo de datos, o bien las entidades de nuestro modelo entidad relación.', '72.0', '2019-05-29'),
('SSISCOM006', 'TSISCOM004', 'Metodo de puntos', 'Establece una cierta cantidad de puntos a asignar según el nivel de complejidad de los componentes funcionales', '32.0', '2019-06-08'),
('SSISCOM007', 'TSISCOM005', 'Definidir el número de jornadas y costo', 'Determinar los costos, para lo cual lo primero que necesitamos conocer es el costo por jornada del personal', '24.0', '2019-06-13'),
('SSISCOM008', 'TSISCOM006', 'Estimar costo de proyecto', 'Presentar un presupuesto desglosado:', '8.0', '2019-06-20'),
('SSISINV001', 'TSISINV001', 'Especificación de requisitos', 'Analizar el problema y clasificar y priorizar requisitos', '24.0', '2019-07-01'),
('SSISINV002', 'TSISINV002', 'Modelo de casos de uso', 'Especificar casos de uso', '32.0', '2019-07-04'),
('SSISINV003', 'TSISINV002', 'Modelo de diseño y arquitectura', 'Realizar diagramas de procesos y secuencias', '72.0', '2019-07-08'),
('SSISINV004', 'TSISINV002', 'Modelo de datos', 'Realizar modelo de datos', '120.0', '2019-07-17'),
('SSISINV005', 'TSISINV003', 'Modelo de implementación', 'Estructurar modelo de implementación', '136.0', '2019-08-01'),
('SSISINV006', 'TSISINV003', 'Integración', 'Planificar la integración', '72.0', '2019-08-18'),
('SSISINV007', 'TSISINV003', 'Integracion', 'Implementar componentes', '96.0', '2019-08-27'),
('SSISINV008', 'TSISINV004', 'Documentación y manual de usuario', 'Desarrollar material de apoyo y manual de usuario', '64.0', '2019-09-08'),
('SSISINV009', 'TSISINV005', 'Plan de pruebas', 'Validar estabilidad de componentes', '72.0', '2019-09-24'),
('SSISINV010', 'TSISINV005', 'Instalación del sistema', 'Planificar implantación', '32.0', '2019-10-03'),
('SSISVEN001', 'TSISVEN001', 'Especificación de requisitos', 'Analizar el problema y clasificar y priorizar requisitos', '32.0', '2019-11-01'),
('SSISVEN002', 'TSISVEN002', 'Modelo de casos de uso', 'Especificar casos de uso', '32.0', '2019-11-05'),
('SSISVEN003', 'TSISVEN003', 'Modelo de diseño y arquitectura', 'Realizar diagramas de procesos y secuencias', '72.0', '2019-11-13'),
('SSISVEN004', 'TSISVEN004', 'Modelo de datos', 'Realizar modelo de datos', '72.0', '2019-11-22'),
('SSISVEN005', 'TSISVEN005', 'Modelo de implementación', 'Estructurar modelo de implementación', '72.0', '2019-12-01');

--
-- Disparadores `subtareas`
--
DELIMITER $$
CREATE TRIGGER `suma_tiempo_subtareas` AFTER INSERT ON `subtareas` FOR EACH ROW begin
update tareas as t set t.Duracion_Estimada = t.Duracion_Estimada + (new.Duracion) where t.Clave= new.Tarea;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtareas_dependientes`
--

CREATE TABLE `subtareas_dependientes` (
  `ID_Dependencia` int(11) NOT NULL COMMENT 'Identificador de la dependencia',
  `Subtarea` varchar(10) DEFAULT NULL COMMENT 'Referencia de una subtarea',
  `Dependencia` varchar(10) DEFAULT NULL COMMENT 'Referencia hacia la subtarea de la cual depende para comenzar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene la subtarea y sus dependencias para poder continuar con el flujo del proyecto';

--
-- Volcado de datos para la tabla `subtareas_dependientes`
--

INSERT INTO `subtareas_dependientes` (`ID_Dependencia`, `Subtarea`, `Dependencia`) VALUES
(700, 'SSISCOM003', 'SSISCOM002'),
(701, 'SSISCOM002', 'SSISCOM001'),
(702, 'SSISCOM004', 'SSISCOM003'),
(703, 'SSISCOM005', 'SSISCOM004'),
(704, 'SSISCOM006', 'SSISCOM005'),
(705, 'SSISINV002', 'SSISINV001'),
(706, 'SSISINV003', 'SSISINV002'),
(707, 'SSISINV004', 'SSISINV003'),
(708, 'SSISINV005', 'SSISINV004'),
(709, 'SSISINV006', 'SSISINV005'),
(710, 'SSISINV007', 'SSISINV006'),
(711, 'SSISINV008', 'SSISINV007'),
(712, 'SSISINV009', 'SSISINV008'),
(713, 'SSISINV010', 'SSISINV009'),
(714, 'SSISBAR002', 'SSISBAR001'),
(715, 'SSISBAR003', 'SSISBAR002'),
(716, 'SSISBAR004', 'SSISBAR003'),
(717, 'SSISBAR005', 'SSISBAR004'),
(718, 'SSISCAJ002', 'SSISCAJ001'),
(719, 'SSISCAJ003', 'SSISCAJ002'),
(720, 'SSISCAJ004', 'SSISCAJ003'),
(721, 'SSISCAJ005', 'SSISCAJ004'),
(722, 'SSISVEN002', 'SSISVEN001'),
(723, 'SSISVEN003', 'SSISVEN002'),
(724, 'SSISVEN004', 'SSISVEN003'),
(725, 'SSISVEN005', 'SSISVEN004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `Clave` varchar(10) NOT NULL COMMENT 'Identificador de una tarea',
  `Proyecto` varchar(10) DEFAULT NULL COMMENT 'Referencia hacia el proyecto del cual contiene la tarea',
  `Titulo` varchar(50) DEFAULT NULL COMMENT 'Titulo descriptivo de la tarea',
  `Descripcion` varchar(200) DEFAULT NULL COMMENT 'Breve descripcion de la tarea',
  `Duracion_Estimada` decimal(4,1) DEFAULT NULL COMMENT 'Duracion estimada de la tarea',
  `Fecha_inicio` date DEFAULT NULL COMMENT 'Fecha en la que inicia la ejecucion de la tarea,se pueede recalcular bajo formula',
  `Progreso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene los datos principales de una tarea del proyecto';

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`Clave`, `Proyecto`, `Titulo`, `Descripcion`, `Duracion_Estimada`, `Fecha_inicio`, `Progreso`) VALUES
('TSISBAR001', 'PROAPPBARB', 'Analisis de requerimientos', 'Desarrollo de la ingeniería de requisitos', '48.0', '2019-04-01', 65),
('TSISBAR002', 'PROAPPBARB', 'Elaboracion', 'Elección de un patrón de desarrollo y construcción de un prototipo de arquitectura', '24.0', '2019-04-07', 90),
('TSISBAR003', 'PROAPPBARB', 'Construcción', 'Refinamiento el Modelo de Análisis y Diseño', '32.0', '2019-04-13', 85),
('TSISBAR004', 'PROAPPBARB', 'Transición', 'Iimplantación adecuada, incluyendo el entrenamiento de los usuarios', '32.0', '2019-04-17', 94),
('TSISBAR005', 'PROAPPBARB', 'Mantenimiento', 'Corrección de errores detectables en programación y lógica de captura.', '48.0', '2019-04-21', 60),
('TSISCAJ001', 'PROSISCAJA', 'Analisis de requerimientos', 'Desarrollo de la ingeniería de requisitos', '80.0', '2019-01-01', 45),
('TSISCAJ002', 'PROSISCAJA', 'Elaboracion', 'Elección de un patrón de desarrollo y construcción de un prototipo de arquitectura', '72.0', '2019-01-11', 75),
('TSISCAJ003', 'PROSISCAJA', 'Construcción', 'Refinamiento el Modelo de Análisis y Diseño', '72.0', '2019-01-29', 66),
('TSISCAJ004', 'PROSISCAJA', 'Transición', 'Iimplantación adecuada, incluyendo el entrenamiento de los usuarios', '48.0', '2019-02-07', 100),
('TSISCAJ005', 'PROSISCAJA', 'Mantenimiento', 'Corrección de errores detectables en programación y lógica de captura.', '48.0', '2019-02-13', 80),
('TSISCOM001', 'PROSISCOMP', 'Análisis de los requerimientos', 'Obtener un entendimiento de que es lo que necesita el cliente', '120.0', '2019-05-01', 30),
('TSISCOM002', 'PROSISCOMP', 'Medicion del software', 'Estimacion de esfuerzo y costo en software a nuestra disposiciÃ³n', '24.0', '2019-05-18', 95),
('TSISCOM003', 'PROSISCOMP', 'Componentes funcionales', 'Determinar tanto las transacciones de negocio como los componentes de datos', '120.0', '2019-05-22', 20),
('TSISCOM004', 'PROSISCOMP', 'Calculo de los puntos de funcion', 'Establece una cierta cantidad de puntos a asignar segun el nivel de complejidad de los componentes funcionales', '32.0', '2019-06-08', 90),
('TSISCOM005', 'PROSISCOMP', 'Costos del personal del proyecto', 'Determinar los costos', '24.0', '2019-06-13', 85),
('TSISCOM006', 'PROSISCOMP', 'Presupuesto del proyecto', 'Presentar un presupuesto desglosado', '8.0', '2019-06-20', 90),
('TSISINV001', 'PROSISINVE', 'Analisis de requerimientos', 'Desarrollo de la ingeniería de requisitos', '24.0', '2019-07-01', 50),
('TSISINV002', 'PROSISINVE', 'Elaboracion', 'Elección de un patrón de desarrollo y construcción de un prototipo de arquitectura', '224.0', '2019-07-04', 30),
('TSISINV003', 'PROSISINVE', 'Construcción', 'Refinamiento el Modelo de Análisis y Diseño', '304.0', '2019-08-01', 70),
('TSISINV004', 'PROSISINVE', 'Transición', 'Iimplantación adecuada, incluyendo el entrenamiento de los usuarios', '64.0', '2019-09-08', 90),
('TSISINV005', 'PROSISINVE', 'Mantenimiento', 'Corrección de errores detectables en programación y lógica de captura.', '104.0', '2019-09-24', 75),
('TSISPRU001', 'PROAPPPRUE', 'Prueba', 'Prueba', '150.0', '2020-03-13', NULL),
('TSISVEN001', 'PROSISVENT', 'Analisis de requerimientos', 'Desarrollo de la ingeniería de requisitos', '80.0', '2019-11-01', 80),
('TSISVEN002', 'PROSISVENT', 'Elaboracion', 'Elección de un patrón de desarrollo y construcción de un prototipo de arquitectura', '32.0', '2019-11-11', 20),
('TSISVEN003', 'PROSISVENT', 'Construcción', 'Refinamiento el Modelo de Análisis y Diseño', '72.0', '2019-11-19', 68),
('TSISVEN004', 'PROSISVENT', 'Transición', 'Iimplantación adecuada, incluyendo el entrenamiento de los usuarios', '72.0', '2019-11-28', 90),
('TSISVEN005', 'PROSISVENT', 'Mantenimiento', 'Corrección de errores detectables en programación y lógica de captura.', '72.0', '2019-12-07', 0);

--
-- Disparadores `tareas`
--
DELIMITER $$
CREATE TRIGGER `Inserta_tareas` AFTER INSERT ON `tareas` FOR EACH ROW BEGIN
	INSERT INTO gestortareas (Tarea) VALUES (new.Clave);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_dependientes`
--

CREATE TABLE `tareas_dependientes` (
  `ID_Dependencia` int(11) NOT NULL COMMENT 'Identificador de una dependecia',
  `Tarea` varchar(10) DEFAULT NULL COMMENT 'Referencia hacia una tarea',
  `Dependencia` varchar(10) DEFAULT NULL COMMENT 'Referencia hacia la tarea de la cual depende'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contien las dependencias de una tarea';

--
-- Volcado de datos para la tabla `tareas_dependientes`
--

INSERT INTO `tareas_dependientes` (`ID_Dependencia`, `Tarea`, `Dependencia`) VALUES
(608, 'TSISCOM002', 'TSISCOM001'),
(609, 'TSISCOM003', 'TSISCOM002'),
(610, 'TSISCOM004', 'TSISCOM003'),
(611, 'TSISCOM005', 'TSISCOM004'),
(612, 'TSISCOM006', 'TSISCOM005'),
(613, 'TSISINV002', 'TSISINV001'),
(614, 'TSISINV003', 'TSISINV002'),
(615, 'TSISINV004', 'TSISINV003'),
(616, 'TSISINV005', 'TSISINV004'),
(617, 'TSISBAR002', 'TSISBAR001'),
(618, 'TSISBAR003', 'TSISBAR002'),
(619, 'TSISBAR004', 'TSISBAR003'),
(620, 'TSISBAR005', 'TSISBAR004'),
(621, 'TSISCAJ002', 'TSISCAJ001'),
(622, 'TSISCAJ003', 'TSISCAJ002'),
(623, 'TSISCAJ004', 'TSISCAJ003'),
(624, 'TSISCAJ005', 'TSISCAJ004'),
(625, 'TSISCOM002', 'TSISCOM001'),
(626, 'TSISCOM003', 'TSISCOM002'),
(627, 'TSISCOM004', 'TSISCOM003'),
(628, 'TSISCOM005', 'TSISCOM004');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tareas_descripcion`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `tareas_descripcion` (
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luis', 'luis@correo.com', NULL, '$2y$10$U6zhbY0VF37CalWRnVFZVe.CV9WlGhiNGRP3GIplC9rBIlVMpfAT2', NULL, '2020-03-19 06:14:37', '2020-03-19 06:14:37');

-- --------------------------------------------------------

--
-- Estructura para la vista `detalles_proyecto`
--
DROP TABLE IF EXISTS `detalles_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalles_proyecto`  AS  select `pro`.`Clave` AS `Proyecto`,`pro`.`Titulo` AS `Titulo_Proyecto`,`pro`.`Descripcion` AS `Descripcion_Proyecto`,`pro`.`Fecha_inicio` AS `Fecha_inicio`,`pro`.`Fecha_final` AS `Fecha_final`,`t`.`Clave` AS `Tarea`,`t`.`Titulo` AS `Titulo_Tarea`,`t`.`Descripcion` AS `Descripcion_Tarea`,`td`.`Dependencia` AS `Dependencia`,`t`.`Duracion_Estimada` AS `Duracion_Estimada`,`dis`.`Fecha_inicio` AS `Fecha_Inicio_tarea`,`dis`.`Fecha_fin` AS `Fecha_Inicio_fin`,`st`.`Clave` AS `Subtarea`,`st`.`Titulo` AS `Titulo_Subtarea`,`st`.`Descripcion` AS `Descripcion_Subtarea`,`st`.`Duracion` AS `Duracion`,`st`.`Fecha_inicio` AS `Fecha_inicio_Subtarea` from (((((`proyecto` `pro` join `tareas` `t` on(`pro`.`Clave` = `t`.`Proyecto`)) join `subtareas` `st` on(`st`.`Tarea` = `t`.`Clave`)) join `gestortareas` `gs` on(`gs`.`Tarea` = `t`.`Clave`)) join `disponibilidad` `dis` on(`dis`.`Recurso` = `gs`.`Clave`)) join `tareas_dependientes` `td` on(`td`.`Tarea` = `t`.`Clave`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `planeacion_proyecto`
--
DROP TABLE IF EXISTS `planeacion_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `planeacion_proyecto`  AS  select `t`.`Proyecto` AS `Proyecto`,concat(`per2`.`Nombre`,' ',`per2`.`AppelidoPat`) AS `Encargado_Proyecto`,`pro`.`Titulo` AS `Titulo_Proyecto`,`pro`.`Descripcion` AS `Descripcion_Proyecto`,`pro`.`Fecha_inicio` AS `Inicio_Proyecto`,`pro`.`Fecha_final` AS `Fin_Proyecto`,`t`.`Clave` AS `Tarea`,concat(`per`.`Nombre`,' ',`per`.`AppelidoPat`) AS `Encargado_Tarea`,`t`.`Titulo` AS `Titulo`,`t`.`Descripcion` AS `Descripcion`,`t`.`Duracion_Estimada` AS `Duracion`,`dis`.`Fecha_inicio` AS `Fecha_inicio`,`dis`.`Fecha_fin` AS `Fecha_fin` from (((((((((`disponibilidad` `dis` join `gestortareas` `gest` on(`dis`.`Recurso` = `gest`.`Clave`)) join `asignacion_tarea` `asigt` on(`gest`.`Clave` = `asigt`.`Tarea`)) join `empleado` `emp` on(`asigt`.`Encargado` = `emp`.`ID_Empleado`)) join `persona` `per` on(`emp`.`ID_Persona` = `per`.`ID_Persona`)) join `tareas` `t` on(`gest`.`Tarea` = `t`.`Clave`)) join `proyecto` `pro` on(`t`.`Proyecto` = `pro`.`Clave`)) join `gestor_proyecto` `gsp` on(`pro`.`Clave` = `gsp`.`Proyecto`)) join `empleado` `emp2` on(`gsp`.`Encargado` = `emp2`.`ID_Empleado`)) join `persona` `per2` on(`emp2`.`ID_Persona` = `per2`.`ID_Persona`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `proyecto_caracteristicas`
--
DROP TABLE IF EXISTS `proyecto_caracteristicas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyecto_caracteristicas`  AS  select `pro`.`Clave` AS `Clave`,`pro`.`Titulo` AS `Titulo`,`pro`.`Descripcion` AS `Descripcion`,`pro`.`Fecha_inicio` AS `Fecha_inicio`,`pro`.`Fecha_final` AS `Fecha_final`,concat(`per`.`Nombre`,' ',`per`.`AppelidoPat`,' ',`per`.`AppelidoMat`) AS `Encargado` from (((`proyecto` `pro` join `gestor_proyecto` `gs` on(`pro`.`Clave` = `gs`.`Proyecto`)) join `empleado` `emp` on(`gs`.`Encargado` = `emp`.`ID_Empleado`)) join `persona` `per` on(`emp`.`ID_Persona` = `per`.`ID_Persona`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `tareas_descripcion`
--
DROP TABLE IF EXISTS `tareas_descripcion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tareas_descripcion`  AS  select `pro`.`Titulo` AS `Titulo_Proyecto`,`t`.`Titulo` AS `Titulo`,`dis`.`Fecha_inicio` AS `Fecha_inicio`,`dis`.`Fecha_fin` AS `Fecha_fin` from (((((((((`disponibilidad` `dis` join `gestortareas` `gest` on(`dis`.`Recurso` = `gest`.`Clave`)) join `asignacion_tarea` `asigt` on(`gest`.`Clave` = `asigt`.`Tarea`)) join `empleado` `emp` on(`asigt`.`Encargado` = `emp`.`ID_Empleado`)) join `persona` `per` on(`emp`.`ID_Persona` = `per`.`ID_Persona`)) join `tareas` `t` on(`gest`.`Tarea` = `t`.`Clave`)) join `proyecto` `pro` on(`t`.`Proyecto` = `pro`.`Clave`)) join `gestor_proyecto` `gsp` on(`pro`.`Clave` = `gsp`.`Proyecto`)) join `empleado` `emp2` on(`gsp`.`Encargado` = `emp2`.`ID_Empleado`)) join `persona` `per2` on(`emp2`.`ID_Persona` = `per2`.`ID_Persona`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`ID_Disponibilidad`),
  ADD KEY `disponibilidad_ibfk_1` (`Recurso`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_Empleado`),
  ADD UNIQUE KEY `ID_Persona` (`ID_Persona`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gestortareas`
--
ALTER TABLE `gestortareas`
  ADD PRIMARY KEY (`Clave`),
  ADD KEY `gestortareas_ibfk_3` (`Tarea`),
  ADD KEY `gestortareas_ibfk_4` (`R_Humano`),
  ADD KEY `gestortareas_ibfk_5` (`R_Tecnologico`),
  ADD KEY `gestortareas_ibfk_6` (`Encargado`);

--
-- Indices de la tabla `gestor_proyecto`
--
ALTER TABLE `gestor_proyecto`
  ADD UNIQUE KEY `Proyecto` (`Proyecto`),
  ADD KEY `gestor_proyecto_ibfk_2` (`Encargado`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID_Persona`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Clave`);

--
-- Indices de la tabla `relacion_empleados`
--
ALTER TABLE `relacion_empleados`
  ADD KEY `relacion_empleados_ibfk_1` (`Persona_ID`),
  ADD KEY `relacion_empleados_ibfk_2` (`Empleado_ID`);

--
-- Indices de la tabla `r_humano`
--
ALTER TABLE `r_humano`
  ADD PRIMARY KEY (`ID_R_Humano`),
  ADD KEY `r_humano_ibfk_1` (`Empleado`);

--
-- Indices de la tabla `r_tecnologico`
--
ALTER TABLE `r_tecnologico`
  ADD PRIMARY KEY (`ID_R_Tecnologico`);

--
-- Indices de la tabla `subtareas`
--
ALTER TABLE `subtareas`
  ADD PRIMARY KEY (`Clave`),
  ADD KEY `subtareas_ibfk_1` (`Tarea`);

--
-- Indices de la tabla `subtareas_dependientes`
--
ALTER TABLE `subtareas_dependientes`
  ADD PRIMARY KEY (`ID_Dependencia`),
  ADD KEY `subtareas_dependientes_ibfk_1` (`Subtarea`),
  ADD KEY `subtareas_dependientes_ibfk_2` (`Dependencia`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`Clave`),
  ADD KEY `tareas_ibfk_1` (`Proyecto`);

--
-- Indices de la tabla `tareas_dependientes`
--
ALTER TABLE `tareas_dependientes`
  ADD PRIMARY KEY (`ID_Dependencia`),
  ADD KEY `tareas_dependientes_ibfk_1` (`Tarea`),
  ADD KEY `tareas_dependientes_ibfk_2` (`Dependencia`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `ID_Disponibilidad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador para el calculo total del recurso asociado a una tarea', AUTO_INCREMENT=3040;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico de un empleado', AUTO_INCREMENT=2042;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestortareas`
--
ALTER TABLE `gestortareas`
  MODIFY `Clave` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico para manejar los datos de una tarea', AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `ID_Persona` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico para una persona', AUTO_INCREMENT=1038;

--
-- AUTO_INCREMENT de la tabla `r_humano`
--
ALTER TABLE `r_humano`
  MODIFY `ID_R_Humano` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del recurso humano', AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `r_tecnologico`
--
ALTER TABLE `r_tecnologico`
  MODIFY `ID_R_Tecnologico` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del recurso tecnologico', AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT de la tabla `subtareas_dependientes`
--
ALTER TABLE `subtareas_dependientes`
  MODIFY `ID_Dependencia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la dependencia', AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT de la tabla `tareas_dependientes`
--
ALTER TABLE `tareas_dependientes`
  MODIFY `ID_Dependencia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de una dependecia', AUTO_INCREMENT=629;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `disponibilidad_ibfk_1` FOREIGN KEY (`Recurso`) REFERENCES `gestortareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`ID_Persona`) REFERENCES `persona` (`ID_Persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestortareas`
--
ALTER TABLE `gestortareas`
  ADD CONSTRAINT `gestortareas_ibfk_3` FOREIGN KEY (`Tarea`) REFERENCES `tareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestortareas_ibfk_4` FOREIGN KEY (`R_Humano`) REFERENCES `r_humano` (`ID_R_Humano`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestortareas_ibfk_5` FOREIGN KEY (`R_Tecnologico`) REFERENCES `r_tecnologico` (`ID_R_Tecnologico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestortareas_ibfk_6` FOREIGN KEY (`Encargado`) REFERENCES `empleado` (`ID_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestor_proyecto`
--
ALTER TABLE `gestor_proyecto`
  ADD CONSTRAINT `gestor_proyecto_ibfk_1` FOREIGN KEY (`Proyecto`) REFERENCES `proyecto` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestor_proyecto_ibfk_2` FOREIGN KEY (`Encargado`) REFERENCES `empleado` (`ID_Empleado`);

--
-- Filtros para la tabla `relacion_empleados`
--
ALTER TABLE `relacion_empleados`
  ADD CONSTRAINT `relacion_empleados_ibfk_1` FOREIGN KEY (`Persona_ID`) REFERENCES `persona` (`ID_Persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relacion_empleados_ibfk_2` FOREIGN KEY (`Empleado_ID`) REFERENCES `empleado` (`ID_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humano`
--
ALTER TABLE `r_humano`
  ADD CONSTRAINT `r_humano_ibfk_1` FOREIGN KEY (`Empleado`) REFERENCES `empleado` (`ID_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtareas`
--
ALTER TABLE `subtareas`
  ADD CONSTRAINT `subtareas_ibfk_1` FOREIGN KEY (`Tarea`) REFERENCES `tareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtareas_dependientes`
--
ALTER TABLE `subtareas_dependientes`
  ADD CONSTRAINT `subtareas_dependientes_ibfk_1` FOREIGN KEY (`Subtarea`) REFERENCES `subtareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subtareas_dependientes_ibfk_2` FOREIGN KEY (`Dependencia`) REFERENCES `subtareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`Proyecto`) REFERENCES `proyecto` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas_dependientes`
--
ALTER TABLE `tareas_dependientes`
  ADD CONSTRAINT `tareas_dependientes_ibfk_1` FOREIGN KEY (`Tarea`) REFERENCES `tareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tareas_dependientes_ibfk_2` FOREIGN KEY (`Dependencia`) REFERENCES `tareas` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
