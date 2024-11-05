-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-11-2024 a las 12:28:38
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
-- Base de datos: `Eventos`
--
CREATE DATABASE IF NOT EXISTS Eventos;
USE Eventos;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Eventos`
--

CREATE TABLE `Eventos` (
  `Nombre` varchar(20) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `Localizacion` varchar(30) NOT NULL,
  `Evento_id` int(11) NOT NULL,
  `Artistas` varchar(20) NOT NULL,
  `Generos` varchar(30) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Eventos`
--

INSERT INTO `Eventos` (`Nombre`, `Fecha`, `Localizacion`, `Evento_id`, `Artistas`, `Generos`, `Ubicacion`) VALUES
('Mad Cool', '2024-11-22', 'Vigo', 12, 'Nirvana', 'Rock,Punk', 'teatro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Eventos`
--
ALTER TABLE `Eventos`
  ADD PRIMARY KEY (`Evento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Eventos`
--
ALTER TABLE `Eventos`
  MODIFY `Evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
