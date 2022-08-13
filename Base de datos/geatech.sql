-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2022 a las 18:38:50
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Metodo` varchar(25) NOT NULL COMMENT 'Es el método en el cual se cosechan las plantas',
  `SiembraInicio` datetime NOT NULL COMMENT 'La fecha en que inicia la siembra ',
  `SiembraFin` datetime NOT NULL COMMENT 'La fecha en la que finaliza la siembra ',
  `ProfundidadSiembra` int(2) NOT NULL COMMENT 'Profundidad a la que se debe sembrar cada planta',
  `TTrasplantar` int(2) NOT NULL COMMENT 'Es el tiempo en que se deben trasplantar las plantas',
  `Germinación` int(3) NOT NULL COMMENT 'Fecha en la que inicia la germinación',
  `IniCosecha` date NOT NULL COMMENT 'Fecha en la que inicia la cosecha',
  `FinCosecha` date NOT NULL COMMENT 'Fecha en la que finaliza la cosecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
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
  `barrio` varchar(200) NOT NULL
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
  `Tel` int(8) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `barrio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hacen las ordenes',
  `Autoriszacion` int(1) NOT NULL,
  `NroOrden` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pide`
--

CREATE TABLE `pide` (
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hace el pedido',
  `PrecioTotal` int(4) NOT NULL,
  `Cant` int(3) NOT NULL,
  `PrecioUnitario` int(3) NOT NULL,
  `IdVegetal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produce`
--

CREATE TABLE `produce` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada huerta',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `CI` int(8) NOT NULL COMMENT 'Cédula de identidad del repartidor',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del repartidor'
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
('Atado', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `Correo`, `contraseña`, `id_cargo`) VALUES
(1, 'Leonardo ', 'leoraidel11@gmail.com', 'Leo9903!', 1),
(2, 'Andres ', 'andreseramos11@gmail.com', '12345678', 1),
(3, 'Axel', 'axeldq2001@gmail.com', '12345678', 1),
(4, 'Mauricio', 'mauriteijeiro@gmail.com', '12345678', 1),
(5, 'Agustin', '2agustingomez3@gmail.com', '12345678', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedad`
--

CREATE TABLE `variedad` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NombreVariedad` varchar(70) NOT NULL COMMENT 'Nombre de la variedad de los vegetales',
  `IdUnidad` int(3) NOT NULL COMMENT '	Identificador único de cada unidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vegetal`
--

CREATE TABLE `vegetal` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Estado` varchar(50) NOT NULL COMMENT 'Estado en el que se encuentra el vegetal',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD PRIMARY KEY (`IdVegetal.Principal`,`IdVegetalAsociado`),
  ADD KEY `fk_AvAsoc` (`IdVegetalAsociado`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`IdVegetal`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NroCliente`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `clienteempresa`
--
ALTER TABLE `clienteempresa`
  ADD PRIMARY KEY (`NroCliente`);

--
-- Indices de la tabla `clientetel`
--
ALTER TABLE `clientetel`
  ADD PRIMARY KEY (`NroCliente`,`Tel`);

--
-- Indices de la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD PRIMARY KEY (`NroCliente`);

--
-- Indices de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`,`IdVariedad`,`Fecha`),
  ADD KEY `f_` (`IdVegetal`);

--
-- Indices de la tabla `esta`
--
ALTER TABLE `esta`
  ADD PRIMARY KEY (`NroOrden`,`FechaIni`,`IdEstado`),
  ADD KEY `fk_Ee` (`IdEstado`) USING BTREE COMMENT 'Clave Foránea de esta que llama a IdEstado';

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `huerta`
--
ALTER TABLE `huerta`
  ADD PRIMARY KEY (`IdHuerta`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`NroOrden`);

--
-- Indices de la tabla `pide`
--
ALTER TABLE `pide`
  ADD PRIMARY KEY (`IdVariedad`,`NroCliente`,`Fecha`,`IdVegetal`),
  ADD KEY `fkvv` (`IdVegetal`,`IdVariedad`);

--
-- Indices de la tabla `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`,`Fecha`),
  ADD KEY `fkVe` (`IdVegetal`);

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`CI`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`IdVariedad`,`IdVegetal`),
  ADD KEY `fkv` (`IdVegetal`,`IdVariedad`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`IdUnidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `variedad`
--
ALTER TABLE `variedad`
  ADD PRIMARY KEY (`IdVegetal`,`IdVariedad`),
  ADD KEY `ff-vu` (`IdUnidad`);

--
-- Indices de la tabla `vegetal`
--
ALTER TABLE `vegetal`
  ADD PRIMARY KEY (`IdVegetal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `NroCliente` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada cliente';

--
-- AUTO_INCREMENT de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Numero único con el cual se identifica cada huerta';

--
-- AUTO_INCREMENT de la tabla `huerta`
--
ALTER TABLE `huerta`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Numero único con el cual se identifica cada huerta';

--
-- AUTO_INCREMENT de la tabla `produce`
--
ALTER TABLE `produce`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada huerta';

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `fk_Ee` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`);

--
-- Filtros para la tabla `pide`
--
ALTER TABLE `pide`
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
