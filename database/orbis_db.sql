-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 01:55:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orbis_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bit_mstr`
--

CREATE TABLE `bit_mstr` (
  `bit_id` int(11) NOT NULL,
  `bit_emp` int(11) NOT NULL,
  `bit_date` date NOT NULL,
  `bit_hour` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bit_mstr`
--

INSERT INTO `bit_mstr` (`bit_id`, `bit_emp`, `bit_date`, `bit_hour`) VALUES
(1, 2, '2021-11-19', '09:02:14'),
(2, 2, '2021-11-18', '09:14:42'),
(3, 1, '2021-11-18', '09:01:54'),
(4, 0, '2021-11-19', '14:10:46'),
(5, 1, '2021-11-16', '11:35:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_mstr`
--

CREATE TABLE `emp_mstr` (
  `emp_id` int(11) NOT NULL,
  `emp_date` date NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `emp_gend` tinyint(1) NOT NULL,
  `emp_paternal` varchar(40) NOT NULL,
  `emp_maternal` varchar(40) NOT NULL,
  `emp_col` varchar(40) NOT NULL,
  `emp_street` varchar(40) NOT NULL,
  `emp_num` int(11) NOT NULL,
  `emp_email` varchar(25) NOT NULL,
  `emp_tel` int(11) NOT NULL,
  `emp_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emp_mstr`
--

INSERT INTO `emp_mstr` (`emp_id`, `emp_date`, `emp_name`, `emp_gend`, `emp_paternal`, `emp_maternal`, `emp_col`, `emp_street`, `emp_num`, `emp_email`, `emp_tel`, `emp_status`) VALUES
(0, '2021-11-20', 'Juan Carlos Moncada', 1, 'Wualuiji Sega Marciano', 'Wario Fleijord Sylas', 'Santa  Fe', 'Cierra de Cordoba', 145, 'moncada@gmail.com', 2187253, 'TR'),
(1, '1997-11-20', 'Alan Rubi Garza', 1, 'Eduardo Rubi Soto', 'Araceli Garza Jacuinde', 'La Andrade', 'tepejac ', 87, 'alan@hotmail.com', 8461898, 'AC'),
(2, '1999-03-28', 'Andrea Ramirez Cervantes', 0, 'Jose de Jesus Ramirez', 'Miley Cervantes Cirus', 'Perla', 'Quinta avenida', 312, 'michirex@yahoo.com', 6549872, 'TR'),
(3, '2021-12-01', 'Alexis Sanchez', 1, 'Gerardo Lennon', 'Arely Cortes', 'Ciegoz', 'rogeroger', 404, 'paco@test.org', 6548721, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_mstr`
--

CREATE TABLE `user_mstr` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(24) NOT NULL,
  `user_pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_mstr`
--

INSERT INTO `user_mstr` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'moncada', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bit_mstr`
--
ALTER TABLE `bit_mstr`
  ADD PRIMARY KEY (`bit_id`);

--
-- Indices de la tabla `emp_mstr`
--
ALTER TABLE `emp_mstr`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `user_mstr`
--
ALTER TABLE `user_mstr`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bit_mstr`
--
ALTER TABLE `bit_mstr`
  MODIFY `bit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_mstr`
--
ALTER TABLE `user_mstr`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
