-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2022 a las 23:31:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geatech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asocia`
--

CREATE TABLE `asocia` (
  `IdVegetal.Principal` int(3) NOT NULL COMMENT 'Identifica el vegetal que se cosecha',
  `IdVegetalAsociado` int(3) NOT NULL COMMENT 'Identifica el vegetal asociado a cosechar '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asocia`
--

INSERT INTO `asocia` (`IdVegetal.Principal`, `IdVegetalAsociado`) VALUES
(1, 12),
(1, 23),
(3, 12),
(3, 31),
(4, 18),
(4, 29),
(5, 3),
(5, 18),
(5, 20),
(6, 16),
(8, 12),
(8, 18),
(8, 22),
(8, 31),
(11, 18),
(11, 20),
(11, 22),
(12, 1),
(12, 8),
(12, 18),
(12, 20),
(12, 29),
(12, 31),
(13, 1),
(13, 16),
(13, 33),
(15, 20),
(17, 13),
(17, 19),
(17, 33),
(18, 4),
(18, 12),
(18, 20),
(19, 20),
(19, 21),
(20, 12),
(20, 18),
(20, 19),
(20, 23),
(20, 30),
(21, 19),
(22, 4),
(22, 8),
(22, 12),
(22, 20),
(23, 18),
(23, 20),
(23, 31),
(24, 18),
(24, 22),
(24, 31),
(25, 1),
(25, 13),
(26, 1),
(26, 13),
(27, 1),
(27, 13),
(28, 20),
(29, 4),
(29, 12),
(29, 20),
(30, 5),
(30, 12),
(30, 20),
(30, 24),
(31, 3),
(31, 12),
(31, 18),
(31, 22),
(33, 1),
(33, 13),
(33, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Metodo` varchar(25) NOT NULL COMMENT 'Es el método en el cual se cosechan las plantas',
  `SiembraInicio` date NOT NULL COMMENT 'La fecha en que inicia la siembra ',
  `SiembraFin` date NOT NULL COMMENT 'La fecha en la que finaliza la siembra ',
  `ProfundidadSiembra` int(2) NOT NULL COMMENT 'Profundidad a la que se debe sembrar cada planta',
  `TTrasplantar` int(2) NOT NULL COMMENT 'Es el tiempo en que se deben trasplantar las plantas',
  `Germinación` int(3) NOT NULL COMMENT 'Fecha en la que inicia la germinación',
  `IniCosecha` date NOT NULL COMMENT 'Fecha en la que inicia la cosecha',
  `FinCosecha` date NOT NULL COMMENT 'Fecha en la que finaliza la cosecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`IdVegetal`, `Metodo`, `SiembraInicio`, `SiembraFin`, `ProfundidadSiembra`, `TTrasplantar`, `Germinación`, `IniCosecha`, `FinCosecha`) VALUES
(1, 'Direc/Alm', '2022-01-01', '2023-12-31', 2, 30, 8, '2022-08-01', '2022-10-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL COMMENT 'Número único para identificar cada cargo',
  `descripcion` varchar(250) NOT NULL COMMENT 'Nombre del cargo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Informáticos'),
(2, 'Directores'),
(3, 'Administradores'),
(4, 'Repartidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente',
  `Correo` varchar(200) NOT NULL COMMENT 'Correo del cliente',
  `Calle` varchar(70) NOT NULL COMMENT 'Calle en la que vive el cliente',
  `Esquina` varchar(70) NOT NULL COMMENT 'Esquina de la calle en la cual vive el cliente',
  `NroApt` int(3) DEFAULT NULL COMMENT 'Numero del apartamento donde vive el cliente',
  `NroPuerta` int(4) NOT NULL COMMENT 'Número de puerta donde vive el cliente',
  `barrio` varchar(200) NOT NULL COMMENT 'Barrio en el cual vive el cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteempresa`
--

CREATE TABLE `clienteempresa` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifican los clientes',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre de la empresa',
  `RUT` int(12) NOT NULL COMMENT 'Número de 12 dígitos con el cuá se identifica a cada empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientetel`
--

CREATE TABLE `clientetel` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifican los clientes',
  `Tel` int(12) NOT NULL COMMENT 'Teléfono de los clientes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteweb`
--

CREATE TABLE `clienteweb` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifican los clientes',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del cliente',
  `Apellido` varchar(70) NOT NULL COMMENT 'Apellido del cliente',
  `CI` int(8) NOT NULL COMMENT 'Cédula de Identidad del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosecha`
--

CREATE TABLE `cosecha` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Numero único con el cual se identifica cada huerta',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `Cantidad` int(4) NOT NULL COMMENT 'Cantidad de plantas que se coseche',
  `Unidad` varchar(70) NOT NULL COMMENT 'Unidad en la cual se miden las cosechas',
  `Fecha` datetime NOT NULL COMMENT 'Fecha de la cosecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esta`
--

CREATE TABLE `esta` (
  `NroOrden` int(3) NOT NULL COMMENT 'Número único que identifica cada Orden',
  `FechaIni` datetime(1) NOT NULL COMMENT 'Fecha en la que se inicia una orden',
  `FechaFin` datetime(1) DEFAULT NULL COMMENT 'Fecha en la que termina una orden',
  `IdEstado` int(3) NOT NULL COMMENT 'Identificador único para ver en que estado están las ordenes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IdEstado` int(3) NOT NULL COMMENT 'Identificador único para ver en que estado están las ordenes',
  `Estado` varchar(70) NOT NULL COMMENT 'Estado en el que se encuentran las ordenes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huerta`
--

CREATE TABLE `huerta` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Numero único con el cual se identifica cada huerta',
  `NombreHuerta` varchar(70) NOT NULL COMMENT 'Nombre de la huerta',
  `Calle` varchar(70) NOT NULL COMMENT 'Calle donde se ubica la huerta',
  `NroPuerta` int(5) NOT NULL COMMENT 'Número de puerta donde se ubica la huerta',
  `Esquina` varchar(70) NOT NULL COMMENT 'Esquina de la calle donde se ubica la huerta',
  `Tel` int(8) NOT NULL COMMENT 'Teléfono de la huerta',
  `Correo` varchar(200) NOT NULL COMMENT 'Correo de la huerta',
  `barrio` varchar(20) NOT NULL COMMENT 'Barrio donde se encuentra ubicada la huerta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hacen las ordenes',
  `Autorizacion` int(1) NOT NULL COMMENT 'Autorización del pedido realizado',
  `NroOrden` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada Orden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pide`
--

CREATE TABLE `pide` (
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hace el pedido',
  `PrecioTotal` int(4) NOT NULL COMMENT 'Precio total del pedido realizado',
  `Cant` int(3) NOT NULL COMMENT 'Cantidad de productos pedidos',
  `PrecioUnitario` int(3) NOT NULL COMMENT 'Precio por cada producto',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el que se identifica cada vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produce`
--

CREATE TABLE `produce` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada huerta',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Fecha` datetime NOT NULL COMMENT 'Fecha única en la que se producen los vegetales'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `CI` int(8) NOT NULL COMMENT 'Cédula de identidad del repartidor',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del repartidor',
  `Correo` varchar(250) NOT NULL COMMENT 'Correo del repartidor',
  `Apellido` varchar(20) NOT NULL COMMENT 'Apellido del repartidor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `CantActual` int(3) NOT NULL COMMENT 'Cantidad actual de los productos que tenemos en la coperativa ',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `Tipo` varchar(50) NOT NULL COMMENT 'Tipo de unidad en que se miden los vegetales',
  `IdUnidad` int(3) NOT NULL COMMENT 'Identificador único de cada unidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`Tipo`, `IdUnidad`) VALUES
('Kg', 1),
('Atado', 2),
('Unidad', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'Id único de cada usuario',
  `nombre` varchar(250) NOT NULL COMMENT 'Nombre del usuario',
  `apellido` varchar(250) NOT NULL COMMENT 'Apellido del usuario',
  `Correo` varchar(200) NOT NULL COMMENT 'Correo de los usuarios',
  `contraseña` varchar(250) NOT NULL COMMENT 'Contraseña de los usuarios',
  `id_cargo` int(11) NOT NULL COMMENT 'Cargo de los usuarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `Correo`, `contraseña`, `id_cargo`) VALUES
(1, 'Leonardo ', 'Sánchez', 'leoraidel11@gmail.com', 'Leo9903!', 1),
(2, 'Andres ', 'Ramos', 'andreseramos11@gmail.com', '12345678', 1),
(3, 'Axel', 'Dominguez', 'axeldq2001@gmail.com', '12345678', 1),
(4, 'Mauricio', 'Teijeiro', 'mauriteijeiro@gmail.com', '12345678', 1),
(5, 'Agustin', 'Gómez', '2agustingomez3@gmail.com', '12345678', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedad`
--

CREATE TABLE `variedad` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NombreVariedad` varchar(70) NOT NULL COMMENT 'Nombre de la variedad de los vegetales',
  `IdUnidad` int(3) NOT NULL COMMENT '	Identificador único de cada unidad',
  `Precio` int(3) NOT NULL COMMENT 'Precio de las variedades'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `variedad`
--

INSERT INTO `variedad` (`IdVegetal`, `IdVariedad`, `NombreVariedad`, `IdUnidad`, `Precio`) VALUES
(1, 1, 'Niágara', 3, 100),
(1, 2, 'Nepaán', 3, 150),
(5, 2, 'Boleroa Ontherware', 2, 90),
(8, 4, 'Verdeo', 1, 70),
(8, 5, 'Bulbo', 1, 80),
(12, 6, 'Gallega', 3, 110),
(12, 7, 'Morada', 3, 50),
(12, 8, 'Criolla', 3, 80),
(12, 9, 'Crimor', 3, 75),
(12, 10, 'Grand Rapid', 3, 70),
(13, 11, 'Dulce', 3, 130),
(20, 15, 'Criolla', 1, 80),
(20, 16, 'Maravilla Platense', 1, 99),
(20, 17, 'Colmar', 1, 66),
(20, 18, 'Chantenay', 1, 94),
(23, 6, 'Ancha', 3, 50),
(31, 12, 'Chata de Egipto', 1, 90),
(31, 13, 'Bunching', 1, 150),
(31, 14, 'Del País', 1, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vegetal`
--

CREATE TABLE `vegetal` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vegetal`
--

INSERT INTO `vegetal` (`IdVegetal`, `Nombre`) VALUES
(1, 'Acelga'),
(2, 'Ají'),
(3, 'Ajo'),
(4, 'Apio'),
(5, 'Arvejas'),
(6, 'Berenjena'),
(7, 'Betarraga'),
(8, 'Cebolla'),
(9, 'Cebollín'),
(10, 'Frutilla'),
(11, 'Habas'),
(12, 'Lechuga'),
(13, 'Choclo'),
(14, 'Papa'),
(15, 'Pimentón'),
(16, 'Porotos'),
(17, 'Porotos Verdes'),
(18, 'Repollo'),
(19, 'Tomate'),
(20, 'Zanahoria'),
(21, 'Albahaca'),
(22, 'Coliflor'),
(23, 'Escarola'),
(24, 'Espinaca'),
(25, 'Melón'),
(26, 'Sandia'),
(27, 'Pepino'),
(28, 'Perejil'),
(29, 'Puerro '),
(30, 'Rabanito'),
(31, 'Remolacha'),
(33, 'Zapallo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD PRIMARY KEY (`IdVegetal.Principal`,`IdVegetalAsociado`) USING BTREE COMMENT 'Número único con el que se identifican los vegetales principales y los asociados',
  ADD KEY `fk_AvAsoc` (`IdVegetalAsociado`) USING BTREE COMMENT 'IdVegetal.Asociado pertenece a vegetal (IdVegetal)';

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada vegetal';

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`) USING BTREE COMMENT 'Numero único para identificar cada cargo';

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NroCliente`) USING BTREE COMMENT 'Número único con el cual se identifica cada cliente',
  ADD UNIQUE KEY `Correo` (`Correo`) USING BTREE COMMENT 'Correo único  para cada cliente';

--
-- Indices de la tabla `clienteempresa`
--
ALTER TABLE `clienteempresa`
  ADD PRIMARY KEY (`NroCliente`) USING BTREE COMMENT 'Número único con el cual se identifica cada cliente';

--
-- Indices de la tabla `clientetel`
--
ALTER TABLE `clientetel`
  ADD PRIMARY KEY (`NroCliente`,`Tel`) USING BTREE COMMENT 'Número único y teléfono único para cada cliente';

--
-- Indices de la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD PRIMARY KEY (`NroCliente`) USING BTREE COMMENT 'Número único con el cual se identifica cada cliente';

--
-- Indices de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`,`IdVariedad`,`Fecha`) USING BTREE COMMENT 'Número único con el cual se identifica cada Vegetal, Variedad y Huerta',
  ADD KEY `f_` (`IdVegetal`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal) que que hace referencia a vegetal (IdVegetal)';

--
-- Indices de la tabla `esta`
--
ALTER TABLE `esta`
  ADD PRIMARY KEY (`NroOrden`,`FechaIni`,`IdEstado`) USING BTREE COMMENT 'Número único con el cual se identifica cada Orden y Fecha única de cada Orden',
  ADD KEY `fk_Ee` (`IdEstado`) USING BTREE COMMENT 'Clave Foranea de (IdEstado) que que hace referencia a estado (IdEstado)';

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IdEstado`) USING BTREE COMMENT 'Número único con el cual se identifica cada Estado en el que está la orden';

--
-- Indices de la tabla `huerta`
--
ALTER TABLE `huerta`
  ADD PRIMARY KEY (`IdHuerta`) USING BTREE COMMENT 'Número único con el cual se identifica cada Huerta';

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`NroOrden`) USING BTREE COMMENT 'Número único con el cual se identifica cada orden';

--
-- Indices de la tabla `pide`
--
ALTER TABLE `pide`
  ADD PRIMARY KEY (`IdVariedad`,`NroCliente`,`Fecha`,`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada variedad, cliente, vegetal y fecha única del pedido',
  ADD KEY `fkvv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal, IdVariedad) que que hace referencia a variedad (IdVegetal, IdVariedad)',
  ADD KEY `f_m` (`NroCliente`) USING BTREE COMMENT 'Clave Foranea de (NroCliente) que que hace referencia a cliente (NroCliente)';

--
-- Indices de la tabla `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`,`Fecha`) USING BTREE COMMENT 'Número único con el cual se identifica cada huerta, vegetal y fecha única en la que se hace cada producción',
  ADD KEY `fkVe` (`IdVegetal`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal) que que hace referencia a vegetal (IdVegetal)';

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`CI`) USING BTREE COMMENT 'CI único del repartidor';

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`IdVariedad`,`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada vegetal y cada variedad',
  ADD KEY `fkv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal, IdVariedad) que que hace referencia a variedad (IdVegetal, IdVariedad)';

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`IdUnidad`) USING BTREE COMMENT 'Id única para cada unidad';

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE COMMENT 'Id único de cada usuario',
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `variedad`
--
ALTER TABLE `variedad`
  ADD PRIMARY KEY (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Número único con el cual se identifica cada variedad y vegetal',
  ADD KEY `ff-vu` (`IdUnidad`) USING BTREE COMMENT 'Clave Foranea de (IdUnidad) que que hace referencia a unidad (IdUnidad)';

--
-- Indices de la tabla `vegetal`
--
ALTER TABLE `vegetal`
  ADD PRIMARY KEY (`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada vegetal';

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número único para identificar cada cargo', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `IdEstado` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único para ver en que estado están las ordenes';

--
-- AUTO_INCREMENT de la tabla `huerta`
--
ALTER TABLE `huerta`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Numero único con el cual se identifica cada huerta';

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `NroOrden` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada Orden';

--
-- AUTO_INCREMENT de la tabla `produce`
--
ALTER TABLE `produce`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada huerta';

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id único de cada usuario', AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD CONSTRAINT `fk_AvAsoc` FOREIGN KEY (`IdVegetalAsociado`) REFERENCES `vegetal` (`IdVegetal`),
  ADD CONSTRAINT `fk_AvPrin` FOREIGN KEY (`IdVegetal.Principal`) REFERENCES `vegetal` (`IdVegetal`);

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `fk` FOREIGN KEY (`IdVegetal`) REFERENCES `vegetal` (`IdVegetal`);

--
-- Filtros para la tabla `clienteempresa`
--
ALTER TABLE `clienteempresa`
  ADD CONSTRAINT `fkCliEm` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Filtros para la tabla `clientetel`
--
ALTER TABLE `clientetel`
  ADD CONSTRAINT `fkCli` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Filtros para la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD CONSTRAINT `fkCLIW` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Filtros para la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD CONSTRAINT `f_` FOREIGN KEY (`IdVegetal`) REFERENCES `vegetal` (`IdVegetal`),
  ADD CONSTRAINT `fkh` FOREIGN KEY (`IdHuerta`) REFERENCES `huerta` (`IdHuerta`);

--
-- Filtros para la tabla `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `f_n` FOREIGN KEY (`NroOrden`) REFERENCES `orden` (`NroOrden`),
  ADD CONSTRAINT `f_vi` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`);

--
-- Filtros para la tabla `pide`
--
ALTER TABLE `pide`
  ADD CONSTRAINT `f_m` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`),
  ADD CONSTRAINT `fkvv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Filtros para la tabla `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `f_hu` FOREIGN KEY (`IdHuerta`) REFERENCES `huerta` (`IdHuerta`),
  ADD CONSTRAINT `fkVe` FOREIGN KEY (`IdVegetal`) REFERENCES `vegetal` (`IdVegetal`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fkv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `variedad`
--
ALTER TABLE `variedad`
  ADD CONSTRAINT `ff-vu` FOREIGN KEY (`IdUnidad`) REFERENCES `unidad` (`IdUnidad`),
  ADD CONSTRAINT `fk_vv` FOREIGN KEY (`IdVegetal`) REFERENCES `vegetal` (`IdVegetal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
