CREATE DATABASE Instituto_Rigoberto;
use Instituto_Rigoberto;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituto_rigoberto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `idClases` int NOT NULL,
  `clase` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idCursos` int NOT NULL,
  `curso` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_clase`
--

CREATE TABLE `curso_clase` (
  `IdCursoClase` int NOT NULL,
  `id_curso` int NOT NULL,
  `id_clase` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `idDocente` int NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `telefono` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_curso`
--

CREATE TABLE `docente_curso` (
  `id` int NOT NULL,
  `docente_id` int DEFAULT NULL,
  `curso_id` int DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `curso` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_clase`
--

CREATE TABLE `estudiante_clase` (
  `id` int NOT NULL,
  `estudiante_id` int DEFAULT NULL,
  `clase_id` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Nota` int NOT NULL,
  `Corte` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `iduser` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contrasena` varchar(500) DEFAULT NULL,
  `tipouser` varchar(500) DEFAULT NULL,
  `IdTipoUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`idClases`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCursos`);

--
-- Indices de la tabla `curso_clase`
--
ALTER TABLE `curso_clase`
  ADD PRIMARY KEY (`IdCursoClase`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indices de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_docente_id` (`docente_id`),
  ADD KEY `pk_curso_id` (`curso_id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indices de la tabla `estudiante_clase`
--
ALTER TABLE `estudiante_clase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_estudiante_id` (`estudiante_id`),
  ADD KEY `pk_clase_id` (`clase_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `idClases` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCursos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso_clase`
--
ALTER TABLE `curso_clase`
  MODIFY `IdCursoClase` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `idDocente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante_clase`
--
ALTER TABLE `estudiante_clase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT;

INSERT INTO users(nombre, email, contrasena, tipouser) VALUES ("Cristian", "cristian@admin.com", "$2y$10$VJTpEqN6zcBNRgskwBJTv.O8TdlVxsqNVT5U2/VadlRJS3AH9IsI6", "administrador");

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente_curso`
--
ALTER TABLE `docente_curso`
  ADD CONSTRAINT `pk_curso_id` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`idCursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_docente_id` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`idDocente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante_clase`
--
ALTER TABLE `estudiante_clase`
  ADD CONSTRAINT `pk_clase_id` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`idClases`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_estudiante_id` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
