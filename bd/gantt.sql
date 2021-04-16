-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 01:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gantt`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `idact` int(11) NOT NULL,
  `tarea` tinytext NOT NULL,
  `responsable` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `avance` tinyint(4) NOT NULL,
  `mano_obra` double NOT NULL,
  `materia_prima` double NOT NULL,
  `depreciacion` double NOT NULL,
  `gastos_admi` double NOT NULL,
  `entregables` tinytext NOT NULL,
  `observaciones` text NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '1.0.0',
  `creado_el` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`idact`, `tarea`, `responsable`, `inicio`, `fin`, `avance`, `mano_obra`, `materia_prima`, `depreciacion`, `gastos_admi`, `entregables`, `observaciones`, `version`, `creado_el`) VALUES
(1, 'Mantenimiento de herramienta', 1, '2021-03-22 09:00:00', '2021-03-24 09:00:00', 0, 3453453, 1, 3453453, 5675675, 'Reporte de actividades', 'Todo bien', '1.0.0', '2021-03-20 15:22:57'),
(2, 'Compra de material', 2, '2021-03-24 09:00:00', '2021-03-26 16:00:00', 10, 3453453, 6547567, 3453453, 5675675, 'Facturas', 'Entrega tardia', '2.1.0', '2021-03-20 15:22:57'),
(4, 'Procesamiento de materia', 2, '2021-03-25 21:15:00', '2021-04-02 21:15:00', 10, 4345, 3453453, 4534534, 5345345, 'Facturas', 'Ninguna', '1.0.0', '2021-03-20 21:15:33'),
(5, 'Procesamiento de materia', 2, '2021-03-20 21:22:00', '2021-04-02 21:22:00', 23, 3453, 45345, 234525, 345, 'Facturas', 'Ninguna', '1.0.0', '2021-03-20 21:22:28'),
(7, 'Consolidacion', 3, '2021-04-16 19:15:00', '2021-04-17 20:15:00', 20, 50000, 100000, 2000, 15000, 'Facturas', 'Ninguna', '3.0', '2021-04-16 18:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idus` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apepat` varchar(20) NOT NULL,
  `apemat` varchar(20) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `correo` tinytext NOT NULL,
  `direccion` text NOT NULL,
  `cont` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idus`, `nombre`, `apepat`, `apemat`, `puesto`, `correo`, `direccion`, `cont`) VALUES
(1, 'Miguel', 'Cruz ', 'Ramos', 'Admin', 'i16221966.19@puebla.tecnm.mx', '3262  Hidden Meadow Drive', '$2y$10$Yf1.VCUQwsRgzn0SZAVzBeKOkz4JGP2vbOYspgXogKowHvIUWh/Ye'),
(2, 'Mary ', 'Martinez', 'Salas', 'Admin', 'mary@email.com', '1583  Dark Hollow Road', '$2y$10$mIc1bmK/84si74TdJxBbQe/OvJ267apcvAh6RmbZui4oqlew0O2Aa'),
(3, 'Paul', 'Boucher', 'Rodriguez', 'Empleado', 'auwznmqwq6b@temporary-mail.net', '2745  Capitol Avenue', '$2y$10$Yf1.VCUQwsRgzn0SZAVzBeKOkz4JGP2vbOYspgXogKowHvIUWh/Ye'),
(4, 'Deborah', 'Bass', 'Yu', 'Empleada', '5rf3k5h21yu@temporary-mail.net', '2439  Southside Lane', '$2y$10$Yf1.VCUQwsRgzn0SZAVzBeKOkz4JGP2vbOYspgXogKowHvIUWh/Ye');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idact`),
  ADD KEY `activ_usuarios_fk` (`responsable`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `activ_usuarios_fk` FOREIGN KEY (`responsable`) REFERENCES `usuarios` (`idus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
