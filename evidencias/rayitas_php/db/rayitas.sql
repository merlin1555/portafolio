-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2023 a las 06:15:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rayitas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(6) NOT NULL,
  `lvl` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero` int(12) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `direccion` text NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `lvl`, `nombre`, `email`, `numero`, `pais`, `direccion`, `usuario`, `contrasenia`) VALUES
(1, 99, 'Nicolas Orellana', 'orellanallanquileo@gmail.com', 2147483647, '1', 'Mi direccion particular', 'nicolas', 'nicolas123'),
(2, 0, 'Cliente', 'cliente@gmail.com', 931305120, '1', 'Direccion de cliente', 'Cliente', 'cliente123'),
(3, 99, 'Admin', 'admin@gmail.com', 99999999, '3', 'Dirección administrativa.', 'admin', 'admin123'),
(4, 0, 'Cliente Nuevo', 'cliente@gmail.com', 66666666, '1', 'Nueva Dirección particular.', 'cliente2', 'cliente123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(6) NOT NULL,
  `cliente` int(6) NOT NULL,
  `codigo` varchar(12) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `precio` float NOT NULL DEFAULT 0,
  `cantidad` int(3) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `cliente`, `codigo`, `nombre`, `precio`, `cantidad`, `fecha`) VALUES
(1, 4, 'RP001', 'Raya Punteada Nueva', 6999, 999, '2023-05-01 04:05:23'),
(3, 2, 'RP002', 'Raya Punteada', 1800, 12, '2023-05-01 04:05:52'),
(4, 2, 'RC002', 'Raya Cortada', 1300, 12, '2023-05-01 04:06:11'),
(5, 2, 'RS003', 'Raya Simple', 1000, 12, '2023-05-01 04:06:23'),
(6, 1, 'RP001', 'Raya Punteada Nueva', 6999, 1, '2023-05-01 04:07:32'),
(8, 1, 'RS001', 'Raya Simple', 1000, 1, '2023-05-01 04:07:59'),
(9, 1, 'RP001', 'Raya Punteada', 1800, 1, '2023-05-01 04:08:06'),
(10, 1, 'RD001', 'Raya Doble', 2000, 1, '2023-05-01 04:08:12'),
(11, 1, 'RC001', 'Raya Cortada', 1300, 1, '2023-05-01 04:08:20'),
(12, 1, 'RB001', 'Raya con Bordes', 2100, 1, '2023-05-01 04:08:30'),
(13, 1, 'RB001', 'Raya con Bordes', 2100, 1, '2023-05-01 04:08:52'),
(14, 1, 'RS003', 'Raya Simple', 1000, 99, '2023-05-01 04:09:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `codigo` char(10) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `frase_promocional` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `colores` text NOT NULL,
  `precio` float NOT NULL,
  `stok` enum('1','0') NOT NULL,
  `promocion` enum('1','0') NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `categoria`, `frase_promocional`, `descripcion`, `colores`, `precio`, `stok`, `promocion`, `fecha`) VALUES
(1, 'Raya Punteada', 'RP001', 'Diagonales', 'La mejor raya del país.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1800, '1', '0', '2023-04-04'),
(2, 'Raya Punteada', 'RP002', 'Horizontales', 'La mejor raya del país.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1800, '1', '0', '2023-04-10'),
(3, 'Raya Punteada', 'RP003', 'Verticales', 'La mejor raya del país.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1800, '1', '0', '2023-04-10'),
(4, 'Raya Cortada', 'RC001', 'Diagonales', 'La mejor raya de tu cuadra', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1300, '1', '0', '2023-04-10'),
(5, 'Raya Cortada', 'RC002', 'Horizontales', 'La mejor raya de tu cuadra', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1300, '1', '0', '2023-04-10'),
(6, 'Raya Cortada', 'RC003', 'Verticales', 'La mejor raya de tu cuadra', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1300, '1', '0', '2023-04-10'),
(7, 'Raya con Bordes', 'RB001', 'Diagonales', 'La Raya que no es Raya!', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 2100, '1', '0', '2023-04-10'),
(8, 'Raya con Bordes', 'RB002', 'Horizontales', 'La Raya que no es Raya!', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 2100, '1', '0', '2023-04-10'),
(9, 'Raya con Bordes', 'RB003', 'Verticales', 'La Raya que no es Raya!', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 2100, '1', '0', '2023-04-10'),
(10, 'Raya Simple', 'RS001', 'Diagonales', 'Rayitas S.A.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1000, '1', '1', '2023-04-10'),
(11, 'Raya Simple', 'RS002', 'Horizontales', 'Rayitas S.A.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1000, '1', '1', '2023-04-10'),
(12, 'Raya Simple', 'RS003', 'Verticales', 'Rayitas S.A.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 1000, '1', '1', '2023-04-10'),
(13, 'Raya Doble', 'RD001', 'Diagonales', 'Rayitas unidas', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 2000, '1', '0', '2023-04-10'),
(14, 'Raya Doble', 'RD002', 'Horizontales', 'Rayitas unidas', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 2000, '1', '0', '2023-04-10'),
(15, 'Raya Doble', 'RD003', 'Verticales', 'Rayitas unidas', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.', 'Negro', 2000, '1', '0', '2023-04-10'),
(16, 'Raya Punteada Nueva', 'RP001', 'Diagonales', 'Raya Agragada Desde Rayitas S.A.', 'Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.', 'Morado', 6999, '1', '1', '2023-04-27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
