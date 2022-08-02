-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2022 a las 01:12:59
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
-- Estructura de tabla para la tabla `almacena`
--

CREATE TABLE `almacena` (
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `SiembraInicio` date NOT NULL COMMENT 'La fecha en que inicia la siembra ',
  `SiembraFin` date NOT NULL COMMENT 'La fecha en la que finaliza la siembra ',
  `ProfundidadSiembra` int(2) NOT NULL COMMENT 'Profundidad a la que se debe sembrar cada planta',
  `TTrasplantar` int(2) NOT NULL COMMENT 'Es el tiempo en que se deben trasplantar las plantas',
  `IniGerminación` date NOT NULL COMMENT 'Fecha en la que inicia la germinación',
  `FinGerminación` date NOT NULL COMMENT 'Fecha en la que finaliza la germinación',
  `IniCosecha` date NOT NULL COMMENT 'Fecha en la que inicia la cosecha',
  `FinCosecha` date NOT NULL COMMENT 'Fecha en la que finaliza la cosecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `NroPuerta` int(4) NOT NULL COMMENT 'Número de puerta donde vive el cliente'
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
  `FechaFin` datetime(1) NOT NULL COMMENT 'Fecha en la que termina una orden',
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
-- Estructura de tabla para la tabla `genera`
--

CREATE TABLE `genera` (
  `NroOrden` int(1) NOT NULL COMMENT 'Número único que identifica cada Orden',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha única en la que se genera una orden',
  `IdVariedad` int(1) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NroCliente` int(1) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente'
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
  `Esquina` varchar(70) NOT NULL COMMENT 'Esquina de la calle donde se ubica la huerta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miden`
--

CREATE TABLE `miden` (
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `IdUnidad` int(3) NOT NULL COMMENT 'Identificador único de las unidades en la cual se miden los vegetales',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `NroOrden` int(3) NOT NULL COMMENT 'Número único de cada orden',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hacen las ordenes',
  `Cant` int(2) NOT NULL COMMENT 'Cantidad de productos que se piden en las ordenes',
  `PrecioUnitario` int(3) NOT NULL COMMENT 'Precio por cada producto',
  `PrecioTotal` int(5) NOT NULL COMMENT 'Precio total de todos los productos de la orden',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pide`
--

CREATE TABLE `pide` (
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hace el pedido',
  `Autorizacion` int(1) NOT NULL COMMENT 'Esto es para ver si se autoriza la compra del cliente',
  `CantProducto` int(1) NOT NULL COMMENT 'Cantidad de producto que pide el cliente',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produce`
--

CREATE TABLE `produce` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada huerta',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal'
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
-- Indices de la tabla `almacena`
--
ALTER TABLE `almacena`
  ADD PRIMARY KEY (`IdVariedad`,`IdVegetal`),
  ADD KEY `fk_Avv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foránea de almacena que llama a IdVegetal y a IdVariedad';

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
  ADD PRIMARY KEY (`NroCliente`);

--
-- Indices de la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD PRIMARY KEY (`NroCliente`);

--
-- Indices de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD PRIMARY KEY (`IdVariedad`,`IdVegetal`,`IdHuerta`),
  ADD KEY `fk_Ch` (`IdHuerta`) USING BTREE COMMENT 'Clave Foránea de cosecha que llama a IdHuerta',
  ADD KEY `fk_Cvv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foránea de cosecha que llama a IdVegetal y a IdVariedad';

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
-- Indices de la tabla `genera`
--
ALTER TABLE `genera`
  ADD PRIMARY KEY (`NroOrden`,`Fecha`),
  ADD KEY `fk_gVar` (`IdVariedad`) USING BTREE COMMENT 'Clave Foránea de genera que llama a IdVariedad',
  ADD KEY `fk_gNoClie` (`NroCliente`) USING BTREE COMMENT 'Clave Foránea de genera que llama a NroCliente';

--
-- Indices de la tabla `huerta`
--
ALTER TABLE `huerta`
  ADD PRIMARY KEY (`IdHuerta`);

--
-- Indices de la tabla `miden`
--
ALTER TABLE `miden`
  ADD PRIMARY KEY (`IdUnidad`),
  ADD KEY `fk_Mvv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foránea de miden que llama a IdVegetal y a IdVariedad';

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`NroOrden`,`IdVariedad`,`IdVegetal`),
  ADD KEY `ff-vv` (`IdVegetal`);

--
-- Indices de la tabla `pide`
--
ALTER TABLE `pide`
  ADD PRIMARY KEY (`IdVariedad`,`IdVegetal`),
  ADD KEY `fk_Pvv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foránea de pide que llama a IdVegetal y a IdVariedad',
  ADD KEY `fk_PNroC` (`NroCliente`) USING BTREE COMMENT 'Clave Foránea de pide que llama a NroCliente';

--
-- Indices de la tabla `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`),
  ADD KEY `fk_Pv` (`IdVegetal`) USING BTREE COMMENT 'Clave Foránea de produce que llama a IdVegetal';

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
  ADD KEY `fk_Svv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foránea de stock que llama a IdVegetal y a IdVariedad';

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`IdUnidad`);

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacena`
--
ALTER TABLE `almacena`
  ADD CONSTRAINT `fk_Avv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

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
  ADD CONSTRAINT `fk_CEmNro` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Filtros para la tabla `clientetel`
--
ALTER TABLE `clientetel`
  ADD CONSTRAINT `fk_C.nro` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Filtros para la tabla `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD CONSTRAINT `fk_Cwebtel` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Filtros para la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD CONSTRAINT `fk_Ch` FOREIGN KEY (`IdHuerta`) REFERENCES `huerta` (`IdHuerta`),
  ADD CONSTRAINT `fk_Cvv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Filtros para la tabla `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `fk_ENroO` FOREIGN KEY (`NroOrden`) REFERENCES `orden` (`NroOrden`),
  ADD CONSTRAINT `fk_Ee` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`);

--
-- Filtros para la tabla `miden`
--
ALTER TABLE `miden`
  ADD CONSTRAINT `fk_Mu` FOREIGN KEY (`IdUnidad`) REFERENCES `unidad` (`IdUnidad`),
  ADD CONSTRAINT `fk_Mvv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `ff-vv` FOREIGN KEY (`IdVegetal`) REFERENCES `variedad` (`IdVegetal`);

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
