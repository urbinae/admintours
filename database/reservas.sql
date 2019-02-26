-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2019 a las 02:39:43
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nclocmgk_wingding2018`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(10) NOT NULL,
  `tour_id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tour` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaexcursion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `hotel` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `turno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `recogida` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `adultos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ninos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `infantes` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `total` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `tour_id`, `fecha`, `tour`, `nombre`, `apellido`, `email`, `telefono`, `fechaexcursion`, `hotel`, `turno`, `recogida`, `adultos`, `ninos`, `infantes`, `total`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'GWE8ICGN3AKA', '10/09/2018', 'BUGGY FAMILIAR (4PAX)', 'Tony', 'Test', 'tonybautista@santostechnologies.com', '5613859102', '10/13/2018', 'Hard Rock Hotel & Casino Punta Cana', '12:00PM', '10:40AM TO 12:00PM', '1', '0', '0', '0', 'Aprobado', '2019-02-11 00:47:17', '2019-02-11 03:47:17'),
(2, '669YGQ1PIK79', '10/09/2018', 'BUGGY FAMILIAR (4PAX)', 'Tony', 'Test', 'tonybautista@santostechnologies.com', '5613859102', '10/13/2018', 'Alsol Tiara Cap Cana', '12:00PM', '10:40AM TO 12:00PM', '1', '0', '0', '0', 'Pendiente', '2019-02-11 00:46:51', '2019-02-11 03:46:51'),
(3, '7G3U6Y9JPY6H', '10/07/2018', 'Samana Cayo Levantado', 'Tony', 'Bautista', 'dasantos@santostechnologies.com', '5613859102', '10/13/2018', 'Royalton Punta Cana Resort & Casino', '7:00AM', '6:00AM to 7:00AM', '3', '0', '0', '$435 USD', 'Pendiente', '2019-02-11 00:45:40', '2019-02-11 03:45:40'),
(4, 'PVUI97B1VATF', '09/15/2018', 'Samana Cayo Levantado', 'Tony', 'Santos', 'dasantos@santostechnologies.com', '561-385-9102', '09/22/2018', 'The MT Hotel', '7:00AM', '6:00AM to 7:00AM', '1', '0', '0', '$145 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(5, 'IF2N8GPLBRN1', '07/06/2018', 'Saona Island', 'Berenice', 'Monegro', 'bmonegro@wingdingtravel.com', '8298603847', '07/07/2018', 'Barceló Punta Cana', '8:00AM', '6:40AM to 8:00AM', '2', '0', '0', '$140 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(6, 'WPZ9DDHM2JF6', '05/21/2018', 'Media Luna', 'aldo', 'test', 'domtecno.com@gmail.com', '8099144873', '05/31/2018', 'Barceló Bávaro Palace', '8:00AM', '7:00AM to 8:15AM', '1', '0', '0', '$1 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(7, '8PGD7IRA7VD4', '05/21/2018', 'Media Luna', 'Miguel', 'Test', 'miguelaml299@gmail.com', '8094073713', '05/24/2018', 'Cappuccino Mare', '8:00AM', '7:00AM to 8:15AM', '4', '1', '1', '$446 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(8, '8TAQKKBP4KE3', '05/21/2018', 'BUGGY FAMILIAR (4PAX)', 'Miguel', 'Medina', 'miguelaml299@gmail.com', '8094073713', '05/31/2018', 'Excellence Punta Cana - Adults Only', '12:00PM', '10:40AM TO 12:00PM', '4', '0', '0', '$276 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(9, 'RNIGTE8QAKAG', '05/16/2018', 'Media Luna', 'Berenice', 'Monegro', 'bmonegro@wingdingtravel.com', '8298603847', '05/24/2018', 'Barceló Bávaro Palace', '8:00AM', '7:00AM to 8:15AM', '2', '0', '0', '$198 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(10, 'RFF3Z7FJET96', '10/10/2018', 'Booze Cruise', 'Tony', 'Bautista', 'dasantos63@comcast.net', '5613859102', '10/13/2018', 'Barceló Dominican Beach', '8:00AM', '6:40AM TO 8:00AM', '2', '0', '0', '$118 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00'),
(11, 'N2HE3C7LNJ23', '10/29/2018', 'Saona Island', 'Berenice', 'Monegro', 'bmonegro@wingdingtravel.com', '8298603847', '10/31/2018', 'Hotel Riu Republica', '8:00AM', '6:40AM to 8:00AM', '2', '0', '0', '$140 USD', 'Processing', '2019-02-11 00:37:01', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
