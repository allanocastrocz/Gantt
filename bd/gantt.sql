-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 09:26 PM
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
CREATE DATABASE IF NOT EXISTS `gantt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gantt`;

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
  `entregables` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`idact`, `tarea`, `responsable`, `inicio`, `fin`, `avance`, `mano_obra`, `materia_prima`, `depreciacion`, `gastos_admi`, `entregables`) VALUES
(1, 'Mantenimiento de herramienta', 1, '2021-03-22 09:00:00', '2021-03-24 09:00:00', 0, 3453453, 6547567, 3453453, 5675675, 'Reporte de actividades'),
(2, 'Compra de materia prima', 2, '2021-03-24 09:00:00', '2021-03-26 16:00:00', 10, 3453453, 6547567, 3453453, 5675675, 'Facturas');

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
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idus`, `nombre`, `apepat`, `apemat`, `puesto`, `correo`, `direccion`) VALUES
(1, 'Miguel', 'Cruz ', 'Ramos', 'Admin', 'i16221966.19@puebla.tecnm.mx', '3262  Hidden Meadow Drive'),
(2, 'Mary ', 'Martinez', 'Salas', 'Admin', 'tysoq3aap2@temporary-mail.net', '1583  Dark Hollow Road'),
(3, 'Paul', 'Boucher', 'Rodriguez', 'Empleado', 'auwznmqwq6b@temporary-mail.net', '2745  Capitol Avenue'),
(4, 'Deborah', 'Bass', 'Yu', 'Empleada', '5rf3k5h21yu@temporary-mail.net', '2439  Southside Lane');

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
  MODIFY `idact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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