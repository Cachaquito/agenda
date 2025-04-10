-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2025 a las 22:58:50
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
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apaterno` varchar(50) DEFAULT NULL,
  `amaterno` varchar(50) DEFAULT NULL,
  `genero` enum('M','F') NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombres`, `apaterno`, `amaterno`, `genero`, `fecha_nacimiento`, `telefono`, `email`, `linkedin`) VALUES
(1, 'Lucía', 'Gómez', 'Ramos', 'F', '1998-05-12', '987654321', 'lucia.gomez@example.com', 'https://linkedin.com/in/luciagomez'),
(2, 'Carlos', 'Cárdenas', 'Loaiza', 'M', '1998-10-31', '984563537', 'carlos.cardenas@example.com', 'https://linkedin.com/in/carloscardenas'),
(3, 'María', 'Torres', 'Lopez', 'F', '2000-01-08', '956123789', 'maria.torres@example.com', 'https://linkedin.com/in/mariatorres'),
(4, 'Javier', 'Quispe', 'Huaman', 'M', '1993-03-17', '945789632', 'javier.quispe@example.com', 'https://linkedin.com/in/javierquispe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
