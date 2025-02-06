-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2025 a las 18:18:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(10) UNSIGNED NOT NULL,
  `nombre_cuenta` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(10) UNSIGNED NOT NULL,
  `nombre_cuenta` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre_cuenta`, `correo`, `nombre`, `apellido_paterno`, `apellido_materno`, `contrasena`) VALUES
(1, 'docente', 'frberqu@hotmail.com', 'Francisco Javier', 'Bernal', 'Quiñónez', '123'),
(2, 'PereaNaiara29', 'naperbr@hotmail.com', 'Naiara', 'Perea', 'Briones', 'NaPe590'),
(3, 'NavarroJan98', 'janavsa@hotmail.com', 'Jan', 'Navarro', 'Sarabia', 'JaNa545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(10) UNSIGNED NOT NULL,
  `nombre_equipo` varchar(45) DEFAULT NULL,
  `publicada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre_equipo`, `publicada`) VALUES
(1, 'Creativo Champions', 1),
(2, 'Creativo Tech', 0),
(3, 'Dinámico Pioneers', 1),
(4, 'Veloz Tech', 0),
(5, 'Creativo Pioneers', 1),
(6, 'Veloz Innovators', 1),
(7, 'Creativo Champions', 1),
(8, 'Creativo Innovators', 0),
(9, 'Ágil Titans', 0),
(10, 'Dinámico Innovators', 0),
(11, 'JOACO', 0),
(12, 'JOACO', 1),
(13, 'Equipo 12', 1),
(14, 'gruupo nuevo', 1),
(15, 'JOACO', 0),
(16, 'erika', 0),
(17, 'erika', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `nombre_cuenta` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombre_cuenta`, `correo`, `nombre`, `apellido_paterno`, `apellido_materno`, `contrasena`, `disponible`) VALUES
(1, 'CarbonellRayan29', 'carbonellrayan@hotmail.com', 'Rayan', 'Carbonell', 'Medrano', '123', 0),
(2, 'OliverGerard12', 'olivergerard@gmail.com', 'Gerard', 'Oliver', 'Gurule', NULL, 0),
(3, 'MorenoGerard95', 'morenogerard@gmail.com', 'Gerard', 'Moreno', 'Olivo', NULL, 0),
(4, 'DelaCruzAleix34', 'delacruzaleix@gmail.com', 'Aleix', 'DelaCruz', 'Robles', NULL, 0),
(5, 'RodriquezMateo91', 'rodriquezmateo@gmail.com', 'Mateo', 'Rodriquez', 'Arribas', NULL, 0),
(6, 'HuertaManuel73', 'huertamanuel@yahoo.com', 'Manuel', 'Huerta', 'Banda', NULL, 0),
(7, 'LeonNahia85', 'leonnahia@hotmail.com', 'Nahia', 'Leon', 'Delgadillo', NULL, 0),
(8, 'QuirozJosefa52', 'quirozjosefa@gmail.com', 'Josefa', 'Quiroz', 'Alejandro', NULL, 1),
(9, 'LoeraLola77', 'loeralola@hotmail.com', 'Lola', 'Loera', 'Lerma', NULL, 1),
(10, 'PuenteAna6', 'puenteana@gmail.com', 'Ana', 'Puente', 'Quiroz', NULL, 1),
(11, 'LovatoYago27', 'lovatoyago@yahoo.com', 'Yago', 'Lovato', 'Arroyo', NULL, 1),
(12, 'PlazaAmparo14', 'plazaamparo@gmail.com', 'Amparo', 'Plaza', 'DeAnda', NULL, 1),
(13, 'PazMarco18', 'pazmarco@gmail.com', 'Marco', 'Paz', 'Baca', NULL, 1),
(14, 'CasadoSalma84', 'casadosalma@gmail.com', 'Salma', 'Casado', 'Aparicio', NULL, 1),
(15, 'AbeytaLola61', 'abeytalola@hotmail.com', 'Lola', 'Abeyta', 'Barela', NULL, 1),
(16, 'FuentesRayan61', 'fuentesrayan@gmail.com', 'Rayan', 'Fuentes', 'Pabon', NULL, 1),
(17, 'DelagarzaNayara58', 'delagarzanayara@gmail.com', 'Nayara', 'Delagarza', 'Cruz', NULL, 1),
(18, 'DomenechFranciscoJavier15', 'domenechfranciscojavier@gmail.com', 'Francisco Javier', 'Domenech', 'Sevilla', NULL, 1),
(19, 'CoronaMiguelAngel10', 'coronamiguelangel@gmail.com', 'Miguel Ángel', 'Corona', 'Pabon', NULL, 1),
(20, 'MunguiaHugo0', 'munguiahugo@hotmail.com', 'Hugo', 'Munguia', 'Burgos', NULL, 1),
(21, 'HernandezAitor75', 'hernandezaitor@hotmail.com', 'Aitor', 'Hernandez', 'Duarte', NULL, NULL),
(22, 'AcostaDaniel35', 'acostadaniel@hotmail.com', 'Daniel', 'Acosta', 'Muniz', NULL, NULL),
(23, 'RodrigoVera85', 'rodrigovera@yahoo.com', 'Vera', 'Rodrigo', 'Posada', NULL, NULL),
(24, 'YanezJordi22', 'yanezjordi@yahoo.com', 'Jordi', 'Yanez', 'Almonte', NULL, NULL),
(25, 'MonroyNerea30', 'monroynerea@gmail.com', 'Nerea', 'Monroy', 'Olivas', NULL, NULL),
(26, 'SandovalBiel11', 'sandovalbiel@yahoo.com', 'Biel', 'Sandoval', 'Gimenez', NULL, NULL),
(27, 'PeresJulia50', 'peresjulia@yahoo.com', 'Julia', 'Peres', 'Menendez', NULL, NULL),
(28, 'RequenaNil78', 'requenanil@hotmail.com', 'Nil', 'Requena', 'Saucedo', NULL, NULL),
(29, 'CuevasNadia35', 'cuevasnadia@yahoo.com', 'Nadia', 'Cuevas', 'Mota', NULL, NULL),
(30, 'TejadaIker49', 'tejadaiker@gmail.com', 'Iker', 'Tejada', 'Ayala', NULL, NULL),
(31, 'x123', 'x@gmail.com', 'Nioxi', 'x', 'sx', '123', NULL),
(32, 'x1234', 'x1@gmail.com', 'Nioxi', 'x', 'sx', '1234', NULL),
(33, 'arnol', 'eth4n.gerl@gmail.com', 'arnol', 'capa', 'tola', '123', NULL),
(34, 'richard', 'eethan@gmail.com', 'richard', 'capa', 'cas', '123', NULL),
(35, 'rodrigo', 'user/201900804@est.umss.edu', 'rodrigo', 'paap', 'adf', '1234', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_equipo`
--

CREATE TABLE `estudiante_equipo` (
  `id_equipo` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante_equipo`
--

INSERT INTO `estudiante_equipo` (`id_equipo`, `id_estudiante`) VALUES
(12, 1),
(13, 1),
(12, 2),
(13, 2),
(13, 3),
(14, 7),
(14, 32),
(15, 33),
(17, 34),
(16, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_grupo`
--

CREATE TABLE `estudiante_grupo` (
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante_grupo`
--

INSERT INTO `estudiante_grupo` (`id_grupo`, `id_estudiante`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `numero_grupo` varchar(45) DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_fin` varchar(45) DEFAULT NULL,
  `fecha_grupo_inicio` varchar(45) DEFAULT NULL,
  `fecha_grupo_fin` varchar(45) DEFAULT NULL,
  `fecha_proyecto_inicio` varchar(45) DEFAULT NULL,
  `fecha_proyecto_fin` varchar(45) DEFAULT NULL,
  `id_docente` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `numero_grupo`, `fecha_inicio`, `fecha_fin`, `fecha_grupo_inicio`, `fecha_grupo_fin`, `fecha_proyecto_inicio`, `fecha_proyecto_fin`, `id_docente`, `codigo`) VALUES
(1, 'Grupo 1', '2025-02-05', '2025-03-09', '2025-02-06', '2025-02-20', '2025-02-21', '2025-03-08', 1, 'hamilton'),
(2, 'Grupo 2', '2025-02-05', '2025-03-09', '2025-02-06', '2025-02-20', '2025-02-21', '2025-03-08', 2, 'hamilton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(10) UNSIGNED NOT NULL,
  `titulo_proyecto` varchar(45) DEFAULT NULL,
  `aceptado` tinyint(1) DEFAULT NULL,
  `archivo_proyecto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `titulo_proyecto`, `aceptado`, `archivo_proyecto`) VALUES
(1, 'Plataforma Deportivo', 1, NULL),
(2, 'Software Social', 0, NULL),
(3, 'Aplicación Médico', 2, NULL),
(4, NULL, NULL, NULL),
(5, NULL, NULL, NULL),
(6, 'real', NULL, 'public/proyectos/PRUEBAD/real_20250205084216.pdf'),
(7, 'ASD', NULL, 'public/proyectos/Creativo Innovators/ASD_20250205091925.pdf'),
(8, 'asd', NULL, 'proyectos/gruupo nuevo/asd_20250206132502.pdf'),
(9, 'tarea', NULL, 'proyectos/JOACO/tarea_20250206144436.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_equipo`
--

CREATE TABLE `proyecto_equipo` (
  `id_proyecto` int(10) UNSIGNED NOT NULL,
  `id_equipo` int(10) UNSIGNED NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `nota` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto_equipo`
--

INSERT INTO `proyecto_equipo` (`id_proyecto`, `id_equipo`, `fecha_entrega`, `nota`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(8, 14, NULL, 60),
(9, 12, NULL, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `estudiante_equipo`
--
ALTER TABLE `estudiante_equipo`
  ADD PRIMARY KEY (`id_estudiante`,`id_equipo`),
  ADD KEY `fk_estudiante_equipos` (`id_equipo`);

--
-- Indices de la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  ADD PRIMARY KEY (`id_grupo`,`id_estudiante`),
  ADD KEY `estudiante_grupo_id_estudiante_foreign` (`id_estudiante`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `grupo_id_docente_foreign` (`id_docente`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `proyecto_equipo`
--
ALTER TABLE `proyecto_equipo`
  ADD PRIMARY KEY (`id_proyecto`,`id_equipo`),
  ADD KEY `proyecto_equipo_id_equipo_foreign` (`id_equipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante_equipo`
--
ALTER TABLE `estudiante_equipo`
  ADD CONSTRAINT `estudiante_equipo_id_estudiante_foreign` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `fk_estudiante_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);

--
-- Filtros para la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  ADD CONSTRAINT `estudiante_grupo_id_estudiante_foreign` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `estudiante_grupo_id_grupo_foreign` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_id_docente_foreign` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`);

--
-- Filtros para la tabla `proyecto_equipo`
--
ALTER TABLE `proyecto_equipo`
  ADD CONSTRAINT `proyecto_equipo_id_equipo_foreign` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`),
  ADD CONSTRAINT `proyecto_equipo_id_proyecto_foreign` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
