-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 05:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geatech`
--

-- --------------------------------------------------------

--
-- Table structure for table `asocia`
--

CREATE TABLE `asocia` (
  `IdVegetalPrincipal` int(3) NOT NULL COMMENT 'Identifica el vegetal que se cosecha',
  `IdVegetalAsociado` int(3) NOT NULL COMMENT 'Identifica el vegetal asociado a cosechar '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asocia`
--

INSERT INTO `asocia` (`IdVegetalPrincipal`, `IdVegetalAsociado`) VALUES
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
(13, 32),
(15, 20),
(17, 13),
(17, 19),
(17, 32),
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
(32, 1),
(32, 13),
(32, 16);

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE `calendario` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Metodo` varchar(25) NOT NULL COMMENT 'Es el método en el cual se cosechan las plantas',
  `SiembraInicio_Mes` int(11) NOT NULL COMMENT 'La fecha en que inicia la siembra ',
  `SiembraFin_Mes` int(11) NOT NULL COMMENT 'La fecha en la que finaliza la siembra ',
  `ProfundidadSiembra_cm` decimal(2,1) NOT NULL COMMENT 'Profundidad a la que se debe sembrar cada planta',
  `TTrasplantar_días` int(2) NOT NULL COMMENT 'Es el tiempo en que se deben trasplantar las plantas',
  `Germinación_días` int(3) NOT NULL COMMENT 'Fecha en la que inicia la germinación',
  `TiempoCosechar_días` int(11) NOT NULL COMMENT 'Fecha en la que inicia la cosecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendario`
--

INSERT INTO `calendario` (`IdVegetal`, `Metodo`, `SiembraInicio_Mes`, `SiembraFin_Mes`, `ProfundidadSiembra_cm`, `TTrasplantar_días`, `Germinación_días`, `TiempoCosechar_días`) VALUES
(1, 'Direc/Alm', 1, 12, '2.0', 30, 8, 90),
(2, 'Almácigo', 7, 8, '0.0', 0, 0, 80),
(3, 'Directo', 4, 8, '3.0', 0, 0, 180),
(4, 'Almácigo', 1, 12, '0.2', 70, 18, 70),
(5, 'Directo', 5, 8, '2.0', 0, 8, 90),
(6, 'Almácigo', 9, 12, '0.8', 55, 8, 90),
(7, 'Almácigo', 8, 9, '2.0', 0, 0, 90),
(8, 'Almácigo', 10, 2, '1.0', 20, 9, 100),
(9, 'Almácigo', 10, 2, '1.0', 20, 9, 100),
(10, 'Estolón', 4, 5, '8.0', 0, 0, 120),
(11, 'Directo', 4, 6, '3.5', 0, 0, 90),
(12, 'Direc/Alm', 1, 12, '0.5', 0, 8, 90),
(13, 'Dirécto', 9, 12, '2.5', 0, 0, 120),
(14, 'Directo', 8, 9, '7.5', 0, 30, 90),
(15, 'Almacigo', 7, 8, '1.0', 90, 4, 90),
(16, 'Directa', 10, 1, '4.0', 0, 0, 0),
(17, 'Directa', 9, 1, '3.5', 0, 8, 80),
(18, 'Almácigo', 1, 12, '1.0', 35, 6, 100),
(19, 'Almácigo', 8, 9, '1.0', 60, 7, 90),
(20, 'Directo', 1, 12, '2.0', 0, 13, 120),
(21, 'Almacigo', 9, 3, '1.0', 40, 13, 130),
(22, 'Almacigo', 2, 5, '1.0', 100, 8, 170),
(23, 'Directo', 4, 9, '0.7', 40, 8, 90),
(24, 'Directo', 4, 8, '3.0', 0, 15, 70),
(25, 'Directo', 3, 5, '2.5', 30, 8, 80),
(26, 'Directo', 10, 12, '2.7', 35, 10, 95),
(27, 'Semilla', 3, 4, '2.5', 20, 5, 60),
(28, 'Esqueje', 2, 9, '1.5', 30, 25, 90),
(29, 'Semilla', 2, 5, '1.5', 45, 15, 180),
(30, 'Semilla', 1, 12, '9.0', 10, 10, 30),
(31, 'Directo', 4, 6, '3.0', 35, 10, 100),
(32, 'Directo', 9, 12, '2.0', 0, 8, 200);

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL COMMENT 'Número único para identificar cada cargo',
  `descripcion` varchar(250) NOT NULL COMMENT 'Nombre del cargo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Informáticos'),
(2, 'Directores'),
(3, 'Administradores'),
(4, 'Repartidor'),
(5, 'Huerta'),
(6, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
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

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`NroCliente`, `Correo`, `Calle`, `Esquina`, `NroApt`, `NroPuerta`, `barrio`) VALUES
(1, 'cliente1@gmail.com', 'Defensa', 'Goes', 0, 1292, 'Tres Cruces'),
(2, 'cliente2@gmail.com', 'Juan María Préz', 'Roque Graseras', 5, 3278, 'Trouville'),
(3, 'empresa1@gmail.com', 'José Ellauri', 'Guayaquí', 0, 1232, 'Pocitos'),
(4, 'empresa2@gmail.com', 'Solano García', 'Víctor Soliño', 12, 7345, 'Punta Carretas');

-- --------------------------------------------------------

--
-- Table structure for table `clienteempresa`
--

CREATE TABLE `clienteempresa` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifican los clientes',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre de la empresa',
  `RUT` int(12) NOT NULL COMMENT 'Número de 12 dígitos con el cuá se identifica a cada empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienteempresa`
--

INSERT INTO `clienteempresa` (`NroCliente`, `Nombre`, `RUT`) VALUES
(3, 'Polticor', 2147483647),
(4, 'Eskil S.A.', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `clientetel`
--

CREATE TABLE `clientetel` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifican los clientes',
  `Tel` int(12) NOT NULL COMMENT 'Teléfono de los clientes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientetel`
--

INSERT INTO `clientetel` (`NroCliente`, `Tel`) VALUES
(1, 92921882),
(2, 93251113),
(3, 91723882),
(4, 91832456);

-- --------------------------------------------------------

--
-- Table structure for table `clienteweb`
--

CREATE TABLE `clienteweb` (
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del cliente',
  `Apellido` varchar(70) NOT NULL COMMENT 'Apellido del cliente',
  `CI` varchar(8) NOT NULL COMMENT 'Cédula de Identidad del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienteweb`
--

INSERT INTO `clienteweb` (`NroCliente`, `Nombre`, `Apellido`, `CI`) VALUES
(1, 'Irene', 'Gonzalez', '43522319'),
(2, 'Gerardo', 'Maza', '52134212');

-- --------------------------------------------------------

--
-- Table structure for table `cosecha`
--

CREATE TABLE `cosecha` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Numero único con el cual se identifica cada huerta',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `Cantidad` int(4) NOT NULL COMMENT 'Cantidad de productos cosechados',
  `Unidad` int(70) NOT NULL COMMENT 'Unidad en la cual se miden las cosechas',
  `Fecha` datetime NOT NULL COMMENT 'Fecha de la cosecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cosecha`
--

INSERT INTO `cosecha` (`IdHuerta`, `IdVegetal`, `IdVariedad`, `Cantidad`, `Unidad`, `Fecha`) VALUES
(1, 1, 1, 52, 2, '2022-11-06 12:45:09'),
(1, 12, 6, 23, 3, '2022-11-06 11:57:23'),
(1, 12, 6, 100, 3, '2022-11-06 11:58:38'),
(1, 30, 38, 20, 1, '2022-11-02 01:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `esta`
--

CREATE TABLE `esta` (
  `NroOrden` int(3) NOT NULL COMMENT 'Número único que identifica cada Orden',
  `FechaIni` datetime(1) NOT NULL DEFAULT '0000-00-00 00:00:00.0' ON UPDATE current_timestamp(1) COMMENT 'Fecha en la que se inicia una orden',
  `FechaFin` datetime(1) DEFAULT NULL COMMENT 'Fecha en la que termina una orden',
  `IdEstado` int(3) NOT NULL COMMENT 'Identificador único para ver en que estado están las ordenes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `esta`
--

INSERT INTO `esta` (`NroOrden`, `FechaIni`, `FechaFin`, `IdEstado`) VALUES
(1, '2022-11-06 11:06:09.0', NULL, 4),
(1, '2022-11-06 11:06:09.6', '2022-11-06 11:06:09.0', 3),
(1, '2022-11-14 15:16:46.2', '2022-11-13 15:16:37.0', 6),
(2, '2022-11-06 11:06:08.1', '2022-11-06 11:06:08.0', 2),
(2, '2022-11-06 11:06:10.9', '2022-11-06 11:06:10.0', 3),
(2, '2022-11-06 11:25:05.3', '2022-11-06 11:25:05.0', 2),
(2, '2022-11-06 11:31:34.5', '2022-11-06 11:31:34.0', 3),
(2, '2022-11-10 03:12:15.0', NULL, 2),
(2, '2022-11-10 15:12:15.0', '2022-11-10 03:12:15.0', 6),
(2, '2022-11-14 15:29:20.1', '2022-11-06 11:23:13.0', 5),
(3, '2022-11-06 11:24:39.6', '2022-11-06 11:24:39.0', 2),
(3, '2022-11-06 11:24:41.1', '2022-11-06 11:24:41.0', 3),
(3, '2022-11-06 11:24:54.5', '2022-11-06 11:24:54.0', 6),
(3, '2022-11-10 03:13:16.0', NULL, 3),
(3, '2022-11-10 15:13:16.1', '2022-11-10 03:13:16.0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `IdEstado` int(3) NOT NULL COMMENT 'Identificador único para ver en que estado están las ordenes',
  `Estado` varchar(70) NOT NULL COMMENT 'Estado en el que se encuentran las ordenes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`IdEstado`, `Estado`) VALUES
(1, 'Pendiente'),
(2, 'Armado'),
(3, 'Ruta'),
(4, 'Entregado'),
(5, 'Cancelado'),
(6, 'No Entregado');

-- --------------------------------------------------------

--
-- Table structure for table `huerta`
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

--
-- Dumping data for table `huerta`
--

INSERT INTO `huerta` (`IdHuerta`, `NombreHuerta`, `Calle`, `NroPuerta`, `Esquina`, `Tel`, `Correo`, `barrio`) VALUES
(1, 'Reino vegetal', 'Pedernal', 2401, 'Juan Paullier', 92941188, 'huerta1@gmail.com', 'Jacinto Vera'),
(2, 'Dulce creación', 'Carlos Tellier', 4912, 'Las Tunas', 92821323, 'huerta2@gmail.com', 'La Teja'),
(4, 'Mango', 'Camino Carrasco', 4210, 'Juliano', 97213047, 'huerta4@gmail.com', 'Carrasco');

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `NroOrden` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada Orden',
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cuál se identifica cada cliente',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hacen las ordenes',
  `Autorizacion` int(1) NOT NULL COMMENT 'Autorización del pedido realizado',
  `Met_Pago` varchar(30) NOT NULL COMMENT 'Método de pago elegido por el cliente',
  `Hora_Ent` varchar(30) NOT NULL COMMENT 'Hora de entrega que elija el cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orden`
--

INSERT INTO `orden` (`NroOrden`, `NroCliente`, `Fecha`, `Autorizacion`, `Met_Pago`, `Hora_Ent`) VALUES
(1, 1, '2022-11-06 10:47:45.0', 1, 'Contado', '08:00 - 12:00'),
(2, 2, '2022-11-06 11:04:56.0', 1, 'Tarjeta de débito', '16:00 - 20:00'),
(3, 3, '2022-11-06 11:18:00.0', 1, 'Tarjeta de crédito', '16:00 - 20:00'),
(4, 1, '2022-11-15 11:50:41.0', 0, 'Contado', '08:00 - 12:00');

-- --------------------------------------------------------

--
-- Table structure for table `pide`
--

CREATE TABLE `pide` (
  `NroOrden` int(3) DEFAULT NULL COMMENT 'Número unico con el cuál se identifica cada orden',
  `NroCliente` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada cliente',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el que se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `Fecha` datetime(1) NOT NULL COMMENT 'Fecha en la que se hace el pedido',
  `Cant` int(3) NOT NULL COMMENT 'Cantidad de productos pedidos',
  `PrecioUnitario` int(3) NOT NULL COMMENT 'Precio por cada producto',
  `PrecioTotal` int(4) NOT NULL COMMENT 'Precio total del pedido realizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pide`
--

INSERT INTO `pide` (`NroOrden`, `NroCliente`, `IdVegetal`, `IdVariedad`, `Fecha`, `Cant`, `PrecioUnitario`, `PrecioTotal`) VALUES
(4, 1, 1, 1, '2022-11-15 11:50:41.0', 1, 50, 50),
(1, 1, 3, 17, '2022-11-06 10:47:45.0', 1, 25, 25),
(2, 2, 3, 17, '2022-11-06 11:04:56.0', 52, 25, 1300),
(3, 3, 3, 17, '2022-11-06 11:18:00.0', 1, 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `IdHuerta` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada huerta',
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `Fecha` datetime NOT NULL COMMENT 'Fecha única en la que se producen los vegetales',
  `Cantidad` int(10) NOT NULL COMMENT 'Cantidad de productos plantados',
  `Estado` varchar(25) NOT NULL COMMENT 'Estado en el que se encunetra el cultivo',
  `Estado_Post` char(1) NOT NULL COMMENT 'Estado posterior al que va a pasar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`IdHuerta`, `IdVegetal`, `IdVariedad`, `Fecha`, `Cantidad`, `Estado`, `Estado_Post`) VALUES
(1, 1, 1, '2022-11-06 12:43:01', 1, 'Sembrar', '0'),
(1, 1, 1, '2022-11-06 12:44:38', 1, 'Germinar', '0'),
(1, 1, 1, '2022-11-06 12:44:41', 1, 'Trasplantar', '0'),
(1, 1, 1, '2022-11-06 12:44:43', 1, 'Cosechar', '0'),
(1, 1, 1, '2022-11-10 03:11:22', 1, 'Sembrar', '1'),
(1, 1, 1, '2022-11-14 01:46:07', 1, 'Sembrar', '1'),
(1, 12, 6, '2022-11-02 01:30:31', 30, 'Sembrar', '0'),
(1, 12, 6, '2022-11-06 11:53:46', 30, 'Germinar', '0'),
(1, 12, 6, '2022-11-06 11:56:17', 30, 'Trasplantar', '0'),
(1, 12, 6, '2022-11-06 11:56:40', 30, 'Cosechar', '0'),
(1, 12, 6, '2022-11-06 11:58:26', 100, 'Sembrar', '0'),
(1, 12, 6, '2022-11-06 11:58:31', 100, 'Germinar', '0'),
(1, 12, 6, '2022-11-06 11:58:32', 100, 'Trasplantar', '0'),
(1, 12, 6, '2022-11-06 11:58:34', 100, 'Cosechar', '0'),
(1, 12, 6, '2022-11-14 01:46:07', 1, 'Sembrar', '1'),
(1, 30, 38, '2022-11-02 01:30:31', 20, 'Sembrar', '0'),
(1, 30, 38, '2022-11-02 01:31:18', 20, 'Germinar', '0'),
(1, 30, 38, '2022-11-02 01:31:31', 20, 'Trasplantar', '0'),
(1, 30, 38, '2022-11-02 01:31:37', 20, 'Cosechar', '0');

-- --------------------------------------------------------

--
-- Table structure for table `repartidor`
--

CREATE TABLE `repartidor` (
  `CI` int(8) NOT NULL COMMENT 'Cédula de identidad del repartidor',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del repartidor',
  `Correo` varchar(250) NOT NULL COMMENT 'Correo del repartidor',
  `Apellido` varchar(20) NOT NULL COMMENT 'Apellido del repartidor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repartidor`
--

INSERT INTO `repartidor` (`CI`, `Nombre`, `Correo`, `Apellido`) VALUES
(42123893, 'Tatiana', 'cadete2@gmail.com', 'Requena'),
(53537211, 'Matías', 'cadete1@gmail.com', 'Gonzalez');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `CantActual` int(3) NOT NULL COMMENT 'Cantidad actual de los productos que tenemos en la coperativa '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`IdVegetal`, `IdVariedad`, `CantActual`) VALUES
(9, 0, 0),
(1, 1, 52),
(1, 2, 0),
(5, 3, 0),
(8, 4, 0),
(8, 5, 0),
(12, 6, 123),
(12, 7, 0),
(12, 8, 0),
(12, 9, 0),
(12, 10, 0),
(13, 11, 0),
(31, 12, 0),
(31, 13, 0),
(31, 14, 0),
(20, 15, 0),
(2, 16, 0),
(3, 17, 26),
(20, 18, 0),
(4, 19, 0),
(10, 20, 0),
(11, 21, 0),
(14, 22, 0),
(15, 23, 0),
(16, 24, 0),
(17, 25, 0),
(18, 26, 0),
(19, 27, 0),
(21, 28, 0),
(22, 29, 0),
(23, 30, 0),
(24, 31, 0),
(25, 32, 0),
(26, 33, 0),
(27, 34, 0),
(28, 35, 0),
(29, 36, 0),
(20, 37, 0),
(30, 38, 0),
(6, 39, 0),
(20, 40, 0),
(23, 41, 0),
(7, 42, 0);

-- --------------------------------------------------------

--
-- Table structure for table `unidad`
--

CREATE TABLE `unidad` (
  `Tipo` varchar(50) NOT NULL COMMENT 'Tipo de unidad en que se miden los vegetales',
  `IdUnidad` int(3) NOT NULL COMMENT 'Identificador único de cada unidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unidad`
--

INSERT INTO `unidad` (`Tipo`, `IdUnidad`) VALUES
('Kg', 1),
('Atado', 2),
('Unidad', 3),
('Rama', 4),
('Paquete - 25gr', 5);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'Id único de cada usuario',
  `nombre` varchar(250) NOT NULL COMMENT 'Nombre del usuario',
  `apellido` varchar(250) NOT NULL COMMENT 'Apellido del usuario',
  `Correo` varchar(200) NOT NULL COMMENT 'Correo de los usuarios',
  `contraseña` varchar(50) NOT NULL COMMENT 'Contraseña de los usuarios',
  `id_cargo` int(11) NOT NULL COMMENT 'Cargo de los usuarios',
  `Estado` int(1) NOT NULL COMMENT 'Estado del usuario al registrarce'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `Correo`, `contraseña`, `id_cargo`, `Estado`) VALUES
(1, 'Agustín', 'Gómez', '2agustingomez3@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 2),
(2, 'Axel', 'Dominguez', 'axeldq2001@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 2),
(3, 'Mauricio', 'Teijeiro', 'mauriteijeiro@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 2),
(4, 'Leonardo', 'Sanchez', 'leoraidel11@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 2),
(5, 'Andres', 'Ramos', 'andreseramos11@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 2),
(6, 'Fernando', 'Jimenez', 'administrador1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 3, 2),
(7, 'Lucia', 'Arenas', 'administrador2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 3, 2),
(8, 'Maria', 'Silva', 'director1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 2),
(9, 'Gustavo', 'Oviedo', 'director2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 2),
(10, '', '', 'huerta1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 5, 2),
(11, '', '', 'huerta2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 5, 2),
(12, 'Irene', 'Gonzalez', 'cliente1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 6, 2),
(13, 'Gerardo', 'Maza', 'cliente2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 6, 2),
(14, 'Polticor', '', 'empresa1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 6, 0),
(15, 'Eskil S.A.', '', 'empresa2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 6, 2),
(16, 'Matías', 'Gonzalez', 'cadete1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 4, 2),
(17, 'Tatiana', 'Requena', 'cadete2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 4, 2),
(19, 'Mango', '', 'huerta4@gmail.com', '25f9e794323b453885f5181f1b624d0b', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variedad`
--

CREATE TABLE `variedad` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `IdVariedad` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada variedad',
  `NombreVariedad` varchar(70) NOT NULL COMMENT 'Nombre de la variedad de los vegetales',
  `IdUnidad` int(3) NOT NULL COMMENT '	Identificador único de cada unidad',
  `Precio` int(3) NOT NULL COMMENT 'Precio de las variedades'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variedad`
--

INSERT INTO `variedad` (`IdVegetal`, `IdVariedad`, `NombreVariedad`, `IdUnidad`, `Precio`) VALUES
(1, 1, 'Niágara', 2, 50),
(1, 2, 'Nepaán', 2, 50),
(2, 16, 'Ají', 1, 198),
(3, 17, 'Ajo', 3, 25),
(4, 19, 'Apio', 4, 29),
(5, 3, 'Boleroa Ontherware', 1, 238),
(6, 39, 'Berenjena', 3, 45),
(7, 42, 'Betarraga', 2, 49),
(8, 4, 'Verdeo', 2, 89),
(8, 5, 'Bulbo', 1, 99),
(9, 0, 'Cebollín', 2, 40),
(10, 20, 'Frutilla', 1, 189),
(11, 21, 'Habas', 1, 150),
(12, 6, 'Gallega', 3, 10),
(12, 7, 'Morada', 3, 50),
(12, 8, 'Criolla', 3, 39),
(12, 9, 'Crimor', 3, 75),
(12, 10, 'Grand Rapid', 3, 70),
(13, 11, 'Dulce', 3, 50),
(14, 22, 'Papa', 1, 69),
(15, 23, 'Pimentón', 1, 198),
(16, 24, 'Porotos', 1, 258),
(17, 25, 'Judías Verdes', 1, 80),
(18, 26, 'Repollo', 3, 99),
(19, 27, 'Tomate', 1, 150),
(20, 15, 'Criolla', 1, 79),
(20, 18, 'Maravilla Platente', 1, 82),
(20, 37, 'Colmar', 1, 80),
(20, 40, 'Chantenay', 1, 55),
(21, 28, 'Albahaca', 5, 80),
(22, 29, 'Coliflor', 3, 39),
(23, 30, 'Escarola', 3, 42),
(23, 41, 'Ancha', 3, 50),
(24, 31, 'Espinaca', 2, 39),
(25, 32, 'Melón', 1, 134),
(26, 33, 'Sandía', 1, 89),
(27, 34, 'Pepino', 1, 119),
(28, 35, 'Perejil', 2, 49),
(29, 36, 'Puerro', 2, 39),
(30, 38, 'Rabanito', 2, 99),
(31, 12, 'Chata de Egipto', 2, 60),
(31, 13, 'Bunching', 2, 55),
(31, 14, 'Del País', 2, 49),
(32, 43, 'Común', 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `vegetal`
--

CREATE TABLE `vegetal` (
  `IdVegetal` int(3) NOT NULL COMMENT 'Número único con el cual se identifica cada vegetal',
  `Nombre` varchar(70) NOT NULL COMMENT 'Nombre del vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vegetal`
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
(17, 'Judías Verdes'),
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
(32, 'Zapallo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asocia`
--
ALTER TABLE `asocia`
  ADD PRIMARY KEY (`IdVegetalPrincipal`,`IdVegetalAsociado`) USING BTREE COMMENT 'Número único con el que se identifican los vegetales principales y los asociados',
  ADD KEY `fk_AvAsoc` (`IdVegetalAsociado`) USING BTREE COMMENT 'IdVegetal.Asociado pertenece a vegetal (IdVegetal)';

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada vegetal';

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`) USING BTREE COMMENT 'Numero único para identificar cada cargo';

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NroCliente`,`Correo`) USING BTREE COMMENT 'Número único con el cual se identifica cada cliente y correo único para cada cliente',
  ADD UNIQUE KEY `Correo` (`Correo`) USING BTREE COMMENT 'Correo único  para cada cliente';

--
-- Indexes for table `clienteempresa`
--
ALTER TABLE `clienteempresa`
  ADD PRIMARY KEY (`NroCliente`) USING BTREE COMMENT 'Número único con el cual se identifican los clientes';

--
-- Indexes for table `clientetel`
--
ALTER TABLE `clientetel`
  ADD PRIMARY KEY (`NroCliente`,`Tel`) USING BTREE COMMENT 'Número único y teléfono único para cada cliente';

--
-- Indexes for table `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD PRIMARY KEY (`NroCliente`) USING BTREE COMMENT 'Número único con el cual se identifican los clientes';

--
-- Indexes for table `cosecha`
--
ALTER TABLE `cosecha`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`,`IdVariedad`,`Fecha`) USING BTREE COMMENT 'Valores único con el cual se identifican las huertas, los vegetales, las variedades y las fecha',
  ADD KEY `ff` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'IdVegetal y IdVariedad que hacen referencia a los mismos en variedad',
  ADD KEY `f` (`Unidad`) USING BTREE COMMENT 'Unidad que hace referencia a el mismo en variedad';

--
-- Indexes for table `esta`
--
ALTER TABLE `esta`
  ADD PRIMARY KEY (`NroOrden`,`FechaIni`,`IdEstado`) USING BTREE COMMENT 'Número único con el cual se identifica cada Orden y Fecha única de cada Orden',
  ADD KEY `fk_Ee` (`IdEstado`) USING BTREE COMMENT 'Clave Foranea de (IdEstado) que que hace referencia a estado (IdEstado)';

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IdEstado`) USING BTREE COMMENT 'Número único con el cual se identifica cada Estado en el que está la orden';

--
-- Indexes for table `huerta`
--
ALTER TABLE `huerta`
  ADD PRIMARY KEY (`IdHuerta`) USING BTREE COMMENT 'Número único con el cual se identifica cada Huerta';

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`NroOrden`) USING BTREE COMMENT 'Número único con el cual se identifica cada orden',
  ADD KEY `fk_cl` (`NroCliente`) USING BTREE COMMENT 'NroCliente que hace referencia a el mismo en cliente';

--
-- Indexes for table `pide`
--
ALTER TABLE `pide`
  ADD PRIMARY KEY (`IdVariedad`,`NroCliente`,`Fecha`,`IdVegetal`) USING BTREE COMMENT 'Valores único con el cual se identifican las variedades, los clientes, los vegetales y las fecha',
  ADD KEY `fkvv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal, IdVariedad) que que hace referencia a variedad (IdVegetal, IdVariedad)',
  ADD KEY `f_m` (`NroCliente`) USING BTREE COMMENT 'Clave Foranea de (NroCliente) que que hace referencia a cliente (NroCliente)',
  ADD KEY `fk_orde` (`NroOrden`) USING BTREE COMMENT 'NroOrden que hace referencia a el mismo en orden';

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`IdHuerta`,`IdVegetal`,`IdVariedad`,`Fecha`) USING BTREE COMMENT 'Valores único con el cual se identifican las huertas, los vegetales, las variedades y las fecha',
  ADD KEY `fkVe` (`IdVegetal`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal) que que hace referencia a vegetal (IdVegetal)',
  ADD KEY `fk_va` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'IdVegetal y IdVariedad que hacen referencia a los mismos en variedad';

--
-- Indexes for table `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`CI`) USING BTREE COMMENT 'CI único del repartidor';

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`IdVariedad`,`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada vegetal y cada variedad',
  ADD KEY `fkv` (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Clave Foranea de (IdVegetal, IdVariedad) que que hace referencia a variedad (IdVegetal, IdVariedad)';

--
-- Indexes for table `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`IdUnidad`) USING BTREE COMMENT 'Id única para cada unidad';

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE COMMENT 'Id único de cada usuario',
  ADD KEY `id_cargo` (`id_cargo`) USING BTREE COMMENT 'Cargo único de cada usuario';

--
-- Indexes for table `variedad`
--
ALTER TABLE `variedad`
  ADD PRIMARY KEY (`IdVegetal`,`IdVariedad`) USING BTREE COMMENT 'Número único con el cual se identifica cada variedad y vegetal',
  ADD KEY `ff-vu` (`IdUnidad`) USING BTREE COMMENT 'Clave Foranea de (IdUnidad) que que hace referencia a unidad (IdUnidad)';

--
-- Indexes for table `vegetal`
--
ALTER TABLE `vegetal`
  ADD PRIMARY KEY (`IdVegetal`) USING BTREE COMMENT 'Número único con el cual se identifica cada vegetal';

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número único para identificar cada cargo', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `NroCliente` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada cliente', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `IdEstado` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único para ver en que estado están las ordenes', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `huerta`
--
ALTER TABLE `huerta`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Numero único con el cual se identifica cada huerta', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `NroOrden` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada Orden', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `IdHuerta` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Número único con el cual se identifica cada huerta', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id único de cada usuario', AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asocia`
--
ALTER TABLE `asocia`
  ADD CONSTRAINT `fk_AvAsoc` FOREIGN KEY (`IdVegetalAsociado`) REFERENCES `vegetal` (`IdVegetal`),
  ADD CONSTRAINT `fk_AvPrin` FOREIGN KEY (`IdVegetalPrincipal`) REFERENCES `vegetal` (`IdVegetal`);

--
-- Constraints for table `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `fk` FOREIGN KEY (`IdVegetal`) REFERENCES `vegetal` (`IdVegetal`);

--
-- Constraints for table `clienteempresa`
--
ALTER TABLE `clienteempresa`
  ADD CONSTRAINT `fk-` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Constraints for table `clientetel`
--
ALTER TABLE `clientetel`
  ADD CONSTRAINT `fk-n` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Constraints for table `clienteweb`
--
ALTER TABLE `clienteweb`
  ADD CONSTRAINT `fk-cli` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Constraints for table `cosecha`
--
ALTER TABLE `cosecha`
  ADD CONSTRAINT `f` FOREIGN KEY (`Unidad`) REFERENCES `unidad` (`IdUnidad`),
  ADD CONSTRAINT `ff` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`),
  ADD CONSTRAINT `fkh` FOREIGN KEY (`IdHuerta`) REFERENCES `huerta` (`IdHuerta`);

--
-- Constraints for table `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `f_vi` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`),
  ADD CONSTRAINT `fk_ordn` FOREIGN KEY (`NroOrden`) REFERENCES `orden` (`NroOrden`);

--
-- Constraints for table `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_cl` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`);

--
-- Constraints for table `pide`
--
ALTER TABLE `pide`
  ADD CONSTRAINT `f_c` FOREIGN KEY (`NroCliente`) REFERENCES `cliente` (`NroCliente`),
  ADD CONSTRAINT `fk_orde` FOREIGN KEY (`NroOrden`) REFERENCES `orden` (`NroOrden`),
  ADD CONSTRAINT `fkvv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Constraints for table `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `f_hu` FOREIGN KEY (`IdHuerta`) REFERENCES `huerta` (`IdHuerta`),
  ADD CONSTRAINT `fk_va` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fkv` FOREIGN KEY (`IdVegetal`,`IdVariedad`) REFERENCES `variedad` (`IdVegetal`, `IdVariedad`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variedad`
--
ALTER TABLE `variedad`
  ADD CONSTRAINT `ff-vu` FOREIGN KEY (`IdUnidad`) REFERENCES `unidad` (`IdUnidad`),
  ADD CONSTRAINT `fk_vv` FOREIGN KEY (`IdVegetal`) REFERENCES `vegetal` (`IdVegetal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
