-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2019 a las 22:02:58
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quality_framework`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checks`
--

CREATE TABLE `checks` (
  `Id_Check` int(11) NOT NULL,
  `Check_Name` varchar(40) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `checks`
--

INSERT INTO `checks` (`Id_Check`, `Check_Name`, `Available`) VALUES
(1, 'Input Quality Check', 1),
(2, 'Pre Quality Check', 1),
(3, 'Post Quality Check', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `check_audit`
--

CREATE TABLE `check_audit` (
  `Id_Audit` int(11) NOT NULL,
  `Document_Number` varchar(30) NOT NULL,
  `Register_Number` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `Available` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Team_Leader` int(11) NOT NULL,
  `Id_Specialist` varchar(20) NOT NULL,
  `Id_Relation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `check_audit`
--

INSERT INTO `check_audit` (`Id_Audit`, `Document_Number`, `Register_Number`, `Date`, `Status`, `Comment`, `Available`, `Id_User`, `Id_Team_Leader`, `Id_Specialist`, `Id_Relation`) VALUES
(4, '1', '1', '2019-01-01', 1, '', 1, 1, 1, 'MXCR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `component`
--

CREATE TABLE `component` (
  `Id_Component` int(11) NOT NULL,
  `Component_Name` varchar(50) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `component`
--

INSERT INTO `component` (`Id_Component`, `Component_Name`, `Available`) VALUES
(1, 'Abacus code', 1),
(2, 'Account number', 1),
(3, 'Account associate', 1),
(4, 'Account bank', 1),
(5, 'Account group', 1),
(6, 'Accounting account', 1),
(7, 'Accounting account of retentions', 1),
(8, 'Accounting date', 1),
(9, 'Accounting Document number', 1),
(10, 'Achilles o CQD', 1),
(11, 'Acreedor ', 1),
(12, 'Address and complement', 1),
(13, 'Advance', 1),
(14, 'Advances no applied', 1),
(15, 'AFIP PDF', 1),
(16, 'Agente de retención/ Regimen de exclusión', 1),
(17, 'Amount', 1),
(18, 'Approval', 1),
(19, 'Excel File', 1),
(20, 'Bank report', 1),
(21, 'Beneficiary name', 1),
(22, 'BU issuing and receiving', 1),
(23, 'Business Name', 1),
(24, 'Buyer contact', 1),
(25, 'CAE', 1),
(26, 'Material', 1),
(27, 'CBU account number', 1),
(28, 'Channel', 1),
(29, 'Clearing Number', 1),
(30, 'CM05 ó inscripto local', 1),
(31, 'CNPJ', 1),
(32, 'Company code', 1),
(33, 'compensacion', 1),
(34, 'Complement', 1),
(35, 'Constancy of extract bank', 1),
(36, 'Constancy of retentions', 1),
(37, 'Contact Supplier', 1),
(38, 'Corporate name', 1),
(39, 'E-mail bank', 1),
(40, 'Cost center', 1),
(41, 'Costumer number', 1),
(42, 'Country', 1),
(43, 'Credit line', 1),
(44, 'Credit memo', 1),
(45, 'Credit note or Debit note', 1),
(46, 'CUIT Number', 1),
(47, 'Currency', 1),
(48, 'DANFE', 1),
(49, 'DARF', 1),
(50, 'Date of boletos', 1),
(51, 'Delivery terms', 1),
(52, 'DI', 1),
(53, 'Fiscal Address', 1),
(54, 'Distribution channel', 1),
(55, 'Division', 1),
(56, 'Document date', 1),
(57, 'Document of Application', 1),
(58, 'Document payed', 1),
(59, 'Document registrer fiscal note transportada', 1),
(60, 'Due date', 1),
(61, 'Due date boleto', 1),
(62, 'E-mail contact/ Billing', 1),
(63, 'E-mail customer', 1),
(64, 'Entrega tarde material', 1),
(65, 'Entry Sheet', 1),
(66, 'Invoice', 1),
(67, 'Equivalent Tax ID', 1),
(68, 'Status', 1),
(69, 'Exchange rate', 1),
(70, 'Free of charge', 1),
(71, 'ICV', 1),
(72, 'Delivery date', 1),
(73, 'Value date', 1),
(74, 'Fianza bancaria o garantía', 1),
(75, 'Fiscal note', 1),
(76, 'Format NF', 1),
(77, 'Garantia o Approval', 1),
(78, 'GIS data', 1),
(79, 'GL account', 1),
(80, '90 Group', 1),
(81, 'GUID code', 1),
(82, 'Identity Fiscal', 1),
(83, 'IG account', 1),
(84, 'IG code', 1),
(85, 'Incoterms', 1),
(86, 'Inssuing BU code', 1),
(87, 'Integración de cliente', 1),
(88, 'Invoice number', 1),
(89, 'Issue date', 1),
(90, 'Issuing PG', 1),
(91, 'IVA', 1),
(92, 'IVA %', 1),
(93, 'IVA/ISR', 1),
(94, 'Reference', 1),
(95, 'Material Entrance', 1),
(96, 'Material or service', 1),
(97, 'Payment method', 1),
(98, 'Modalidad', 1),
(99, 'Motivo de rejected', 1),
(100, 'Motivo de request', 1),
(101, 'Netting', 1),
(102, 'NF category', 1),
(103, 'NIF type', 1),
(104, 'Number fiscal note transportada', 1),
(105, 'PO number', 1),
(106, 'Operation Code', 1),
(107, 'OV', 1),
(108, 'Partner bank', 1),
(109, 'Partner PG/BU', 1),
(110, 'Partner profit center', 1),
(111, 'Pay order', 1),
(112, 'Payer reference', 1),
(113, 'Payment Boleto', 1),
(114, 'Payment Conditions', 1),
(115, 'Payment Due invoice date', 1),
(116, 'Payment proposal', 1),
(117, 'Payment terms', 1),
(118, 'Customer contact', 1),
(119, 'Plant', 1),
(120, 'Prevision de embarque', 1),
(121, 'Procedencia', 1),
(122, 'Public consultation of registration', 1),
(123, 'Quantity Received & Qty Requested', 1),
(124, 'receiving BU code', 1),
(125, 'Receiving PG', 1),
(126, 'Reception IG report', 1),
(127, 'Reevaluations', 1),
(128, 'Remesa', 1),
(129, 'reporte aging', 1),
(130, 'Advances report', 1),
(131, 'Pay report', 1),
(132, 'Request Advance', 1),
(133, 'Request Ocurrencia', 1),
(134, 'Retention', 1),
(135, 'Reversa Accounting document', 1),
(136, 'Reverse status', 1),
(137, 'RFC', 1),
(138, 'RUT', 1),
(139, 'Sales Organization', 1),
(140, 'Segment', 1),
(141, 'Seller number', 1),
(142, 'Seller reference', 1),
(143, 'Service Code', 1),
(144, 'Sintegra', 1),
(145, 'State or city', 1),
(146, 'Status complement', 1),
(147, 'Supplier number', 1),
(148, 'Tax Amount', 1),
(149, 'Tax Applicated', 1),
(150, 'Tax registration', 1),
(151, 'Termino de advance', 1),
(152, 'Timbrado', 1),
(153, 'Trading partner', 1),
(154, 'Transportation', 1),
(155, 'Type of invoice', 1),
(156, 'Type service', 1),
(157, 'Type tax', 1),
(158, 'Value tax', 1),
(159, 'Values', 1),
(160, 'Vendor Information', 1),
(161, 'Realized Payment', 1),
(162, 'Blocked Payment', 1),
(163, 'Registry', 1),
(164, 'Verify Account IGB222', 1),
(165, 'Verify cancellations', 1),
(166, 'Verify dispute status', 1),
(167, 'Web Page', 1),
(168, 'XML file', 1),
(169, 'Bank Country', 1),
(170, 'Bank Name', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `component_audit`
--

CREATE TABLE `component_audit` (
  `Id_CAudit` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  `Id_Audit` int(11) NOT NULL,
  `Id_TRCC` int(11) NOT NULL,
  `Id_Rejection_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `component_audit`
--

INSERT INTO `component_audit` (`Id_CAudit`, `Status`, `Available`, `Id_Audit`, `Id_TRCC`, `Id_Rejection_Type`) VALUES
(1, 1, 1, 4, 298, 11),
(2, 1, 1, 4, 299, 11),
(3, 1, 1, 4, 300, 11),
(4, 1, 1, 4, 301, 11),
(5, 1, 1, 4, 302, 11),
(6, 1, 1, 4, 303, 11),
(7, 1, 1, 4, 304, 11),
(8, 1, 1, 4, 305, 11),
(9, 1, 1, 4, 306, 11),
(10, 1, 1, 4, 307, 11),
(11, 1, 1, 4, 308, 11),
(12, 1, 1, 4, 309, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `Id_Country` int(11) NOT NULL,
  `Country_Name` char(30) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`Id_Country`, `Country_Name`, `Available`) VALUES
(1, 'Mexico', 1),
(2, 'Brazil', 1),
(3, 'Argentina', 1),
(4, 'Panama', 1),
(5, 'Peru', 1),
(6, 'Colombia', 1),
(7, 'Ecuador', 1),
(8, 'Chile', 1),
(9, 'Prueba1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_type`
--

CREATE TABLE `document_type` (
  `Id_Document_Type` int(11) NOT NULL,
  `Document_Type_Name` varchar(30) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `document_type`
--

INSERT INTO `document_type` (`Id_Document_Type`, `Document_Type_Name`, `Available`) VALUES
(1, 'Invoice', 1),
(2, 'Registry Payment', 1),
(3, 'Request', 1),
(4, 'Report File', 1),
(5, 'Journal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilege`
--

CREATE TABLE `privilege` (
  `Id_Privilege` int(11) NOT NULL,
  `Privilege_Name` varchar(20) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilege`
--

INSERT INTO `privilege` (`Id_Privilege`, `Privilege_Name`, `Available`) VALUES
(1, 'Quality Admin', 1),
(2, 'Auditor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `process`
--

CREATE TABLE `process` (
  `Id_Process` int(11) NOT NULL,
  `Process_Name` varchar(50) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `process`
--

INSERT INTO `process` (`Id_Process`, `Process_Name`, `Available`) VALUES
(1, 'Verification / approval & invoice processing ', 1),
(2, 'Payment', 1),
(3, 'Supplier Master Management', 1),
(4, 'Cash In time ( CIT)', 1),
(5, 'Inter Group Transactions ( IG)', 1),
(6, 'Customer Master Data', 1),
(7, 'Cash Application', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rejection_type`
--

CREATE TABLE `rejection_type` (
  `Id_Rejection_Type` int(11) NOT NULL,
  `Rejection_Type_Name` varchar(80) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rejection_type`
--

INSERT INTO `rejection_type` (`Id_Rejection_Type`, `Rejection_Type_Name`, `Available`) VALUES
(1, 'Data not added in document reference', 1),
(2, 'Data missmatch system vs document reference', 1),
(3, 'Document not attached', 1),
(4, 'Data missing', 1),
(5, 'Expired document', 1),
(6, 'Data incorrect', 1),
(7, 'Concept not specified', 1),
(8, 'System errors', 1),
(9, 'Document without autorization', 1),
(10, 'Account not registered in system', 1),
(11, 'none', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_line`
--

CREATE TABLE `service_line` (
  `Id_SL` int(11) NOT NULL COMMENT 'Identificaador unico de Service Line',
  `Service_Line_Name` varchar(30) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `service_line`
--

INSERT INTO `service_line` (`Id_SL`, `Service_Line_Name`, `Available`) VALUES
(1, 'AR', 1),
(2, 'AP', 1),
(3, 'GA', 1),
(5, 'prekjhfc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialist`
--

CREATE TABLE `specialist` (
  `Id_Specialist` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `specialist`
--

INSERT INTO `specialist` (`Id_Specialist`, `Name`, `Lastname`, `Available`) VALUES
('MXCR', 'Cristina', 'Rivera', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_transaction`
--

CREATE TABLE `sub_transaction` (
  `Id_Sub_Transaction` int(11) NOT NULL,
  `Sub_Transaction_Name` varchar(40) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_transaction`
--

INSERT INTO `sub_transaction` (`Id_Sub_Transaction`, `Sub_Transaction_Name`, `Available`) VALUES
(1, 'Material', 1),
(2, 'Service', 1),
(3, 'Flete', 1),
(4, 'Advance', 1),
(5, 'Credit Letter', 1),
(6, 'Taxes', 1),
(7, 'IG', 1),
(8, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_leader`
--

CREATE TABLE `team_leader` (
  `Id_Team_Leader` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `team_leader`
--

INSERT INTO `team_leader` (`Id_Team_Leader`, `Name`, `Lastname`, `Email`, `Available`) VALUES
(1, 'Irving', 'Moreno', 'irving.moreno@mx.abb.com', 1),
(2, 'Claudia', 'Choreño', 'claudia.choreno@mx.abb.com', 1),
(3, 'Claudia', 'Lopez', 'claudia.lopez@mx.abb.com', 1),
(4, 'Alfredo', 'Garduño', 'alfredo.garduno@mx.abb.com', 1),
(5, 'Marco', 'Solano', 'marco.solano@mx.abb.com', 1),
(6, 'Patricia', 'Hernandez', 'patricia.hernandez-gomez@mx.abb.com', 1),
(7, 'Angelica', 'Castillo', 'angelica.castillo@mx.abb.com', 1),
(8, 'Daniel', 'Salas', 'daniel.salas@mx.abb.com', 1),
(9, 'Victor', 'Cordoba', 'victor.cordoba@mx.abb.com', 1),
(10, 'Araceli', 'Bernal', 'araceli.bernal@mx.abb.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tr`
--

CREATE TABLE `tr` (
  `Id_Relation` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  `Id_SL` int(11) NOT NULL COMMENT 'Identificaador unico de Service Line',
  `Id_Country` int(11) NOT NULL,
  `Id_Process` int(11) NOT NULL,
  `Id_Transaction` int(11) NOT NULL,
  `Id_Sub_Transaction` int(11) NOT NULL,
  `Id_Document_Type` int(11) NOT NULL,
  `Id_Check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tr`
--

INSERT INTO `tr` (`Id_Relation`, `Available`, `Id_SL`, `Id_Country`, `Id_Process`, `Id_Transaction`, `Id_Sub_Transaction`, `Id_Document_Type`, `Id_Check`) VALUES
(1, 1, 1, 1, 4, 3, 8, 1, 1),
(2, 1, 1, 1, 5, 3, 7, 4, 1),
(3, 1, 1, 1, 6, 4, 8, 3, 1),
(4, 1, 1, 1, 7, 4, 8, 1, 1),
(5, 1, 1, 1, 4, 3, 8, 1, 2),
(6, 1, 1, 1, 5, 3, 7, 4, 2),
(7, 1, 1, 1, 6, 4, 8, 3, 2),
(8, 1, 1, 1, 7, 4, 8, 1, 2),
(9, 1, 1, 1, 5, 3, 7, 4, 3),
(10, 1, 1, 1, 7, 4, 8, 1, 3),
(11, 1, 1, 2, 4, 3, 8, 1, 1),
(12, 1, 1, 2, 5, 3, 7, 4, 1),
(13, 1, 1, 2, 6, 4, 8, 3, 1),
(14, 1, 1, 2, 7, 4, 8, 1, 1),
(15, 1, 1, 2, 4, 3, 8, 1, 2),
(16, 1, 1, 2, 5, 3, 7, 4, 2),
(17, 1, 1, 2, 6, 4, 8, 3, 2),
(18, 1, 1, 2, 7, 4, 8, 1, 2),
(19, 1, 1, 2, 4, 3, 8, 1, 3),
(20, 1, 1, 2, 5, 3, 7, 4, 3),
(21, 1, 1, 2, 7, 4, 8, 1, 3),
(22, 1, 1, 3, 4, 3, 8, 1, 1),
(23, 1, 1, 3, 5, 3, 7, 4, 1),
(24, 1, 1, 3, 6, 4, 8, 3, 1),
(25, 1, 1, 3, 7, 4, 8, 1, 1),
(26, 1, 1, 3, 4, 3, 8, 1, 2),
(27, 1, 1, 3, 5, 3, 7, 4, 2),
(28, 1, 1, 3, 6, 4, 8, 3, 2),
(29, 1, 1, 3, 7, 4, 8, 1, 2),
(30, 1, 1, 3, 4, 3, 8, 1, 3),
(31, 1, 1, 3, 5, 3, 7, 4, 3),
(32, 1, 2, 1, 1, 1, 8, 1, 1),
(33, 1, 2, 1, 1, 2, 8, 1, 1),
(34, 1, 2, 1, 1, 3, 8, 1, 1),
(35, 1, 2, 1, 2, 4, 8, 2, 1),
(36, 1, 2, 1, 3, 4, 8, 3, 1),
(37, 1, 2, 1, 1, 1, 8, 1, 2),
(38, 1, 2, 1, 1, 2, 8, 1, 2),
(39, 1, 2, 1, 1, 3, 8, 1, 2),
(40, 1, 2, 1, 2, 4, 8, 2, 2),
(41, 1, 2, 1, 3, 4, 8, 3, 2),
(42, 1, 2, 1, 1, 1, 8, 1, 3),
(43, 1, 2, 1, 1, 2, 8, 1, 3),
(44, 1, 2, 1, 1, 3, 8, 1, 3),
(45, 1, 2, 1, 2, 4, 8, 2, 3),
(46, 1, 2, 2, 1, 1, 1, 1, 1),
(47, 1, 2, 2, 1, 1, 2, 1, 1),
(48, 1, 2, 2, 1, 1, 3, 1, 1),
(49, 1, 2, 2, 1, 2, 2, 1, 1),
(50, 1, 2, 2, 2, 1, 8, 2, 1),
(51, 1, 2, 2, 2, 2, 4, 2, 1),
(52, 1, 2, 2, 2, 2, 5, 2, 1),
(53, 1, 2, 2, 2, 2, 6, 2, 1),
(54, 1, 2, 2, 3, 4, 8, 3, 1),
(55, 1, 2, 2, 1, 1, 2, 1, 2),
(56, 1, 2, 2, 1, 1, 1, 1, 2),
(57, 1, 2, 2, 1, 1, 3, 1, 2),
(58, 1, 2, 2, 1, 2, 2, 1, 2),
(59, 1, 2, 2, 2, 1, 8, 2, 2),
(60, 1, 2, 2, 2, 2, 6, 2, 2),
(61, 1, 2, 2, 2, 2, 5, 2, 2),
(62, 1, 2, 2, 2, 2, 1, 2, 2),
(63, 1, 2, 2, 2, 2, 2, 2, 2),
(64, 1, 2, 2, 2, 3, 2, 2, 2),
(65, 1, 2, 2, 3, 4, 8, 3, 2),
(66, 1, 2, 2, 1, 1, 1, 1, 3),
(67, 1, 2, 2, 1, 1, 3, 1, 3),
(68, 1, 2, 2, 1, 2, 2, 1, 3),
(69, 1, 2, 2, 2, 1, 8, 2, 3),
(70, 1, 2, 2, 2, 2, 1, 2, 3),
(71, 1, 2, 2, 2, 2, 2, 2, 3),
(72, 1, 2, 3, 1, 1, 8, 1, 1),
(73, 1, 2, 3, 1, 2, 8, 1, 1),
(74, 1, 2, 3, 2, 4, 8, 2, 1),
(75, 1, 2, 3, 3, 4, 8, 3, 1),
(76, 1, 2, 3, 1, 1, 8, 1, 2),
(77, 1, 2, 3, 1, 2, 8, 1, 2),
(78, 1, 2, 3, 2, 4, 8, 2, 2),
(79, 1, 2, 3, 3, 4, 8, 3, 2),
(80, 1, 2, 3, 1, 1, 8, 1, 3),
(81, 1, 2, 3, 1, 2, 8, 1, 3),
(82, 1, 2, 3, 2, 4, 8, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `Id_Transaction` int(11) NOT NULL,
  `Transaction_Name` varchar(40) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaction`
--

INSERT INTO `transaction` (`Id_Transaction`, `Transaction_Name`, `Available`) VALUES
(1, 'National Third Party', 1),
(2, 'Foreign Third Party', 1),
(3, 'Group ABB', 1),
(4, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trcc`
--

CREATE TABLE `trcc` (
  `Id_TRCC` int(11) NOT NULL,
  `Characteristic` varchar(200) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Available` int(11) NOT NULL,
  `Id_Relation` int(11) NOT NULL,
  `Id_Component` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trcc`
--

INSERT INTO `trcc` (`Id_TRCC`, `Characteristic`, `Description`, `Available`, `Id_Relation`, `Id_Component`) VALUES
(1, 'TBD', 'TBD', 1, 46, 88),
(2, 'TBD', 'TBD', 1, 46, 17),
(3, 'TBD', 'Iniciar con X, I, Y, C o R. Para entrega futura es K', 1, 46, 157),
(4, 'TBD', 'Match invoice with System', 1, 46, 148),
(5, 'invoice access key', 'coincida 9 ultimos digitos', 1, 46, 48),
(6, 'TBD', 'Material subcontratación Xb, Xa, Xs', 1, 46, 106),
(7, 'TBD', 'TBD', 1, 47, 88),
(8, 'TBD', 'TBD', 1, 47, 17),
(9, 'TBD', 'Iniciar con ia, ib, am, al', 1, 47, 157),
(10, 'TBD', 'Match invoice with System', 1, 47, 148),
(11, 'TBD', 'que impuestos, valor, match con SAP', 1, 47, 134),
(12, 'TBD', 'match PO and invoice', 1, 47, 143),
(13, 'Fecha de emisión', 'No se aceptan despues del 21, excepto lista reinf', 1, 47, 60),
(14, 'TBD', 'TBD', 1, 47, 61),
(15, 'TBD', 'TBD', 1, 47, 105),
(16, 'TBD', 'TBD', 1, 47, 18),
(17, 'TBD', 'TBD', 1, 48, 88),
(18, 'TBD', 'TBD', 1, 48, 17),
(19, 'TBD', 'Iniciar con F', 1, 48, 157),
(20, 'TBD', 'match PO and invoice', 1, 48, 143),
(21, 'TBD', 'B2B o servicio', 1, 49, 155),
(22, 'TBD', 'TBD', 1, 49, 47),
(23, 'TBD', 'Tipo de servicio', 1, 49, 98),
(24, 'TBD', 'TBD', 1, 49, 88),
(25, 'TBD', 'TBD', 1, 49, 17),
(26, 'TBD', 'en caso de MIRO', 1, 72, 105),
(27, 'TBD', 'Digital "Hoja de entrada"', 1, 72, 65),
(28, 'TBD', '"Entrada de material"', 1, 72, 95),
(29, 'TBD', 'Match con factura', 1, 72, 17),
(30, '"Fecha de emisión"', 'Match orden de compra con entrada', 1, 72, 60),
(31, 'TBD', '"Tipo de cambio"', 1, 72, 69),
(32, 'TBD', 'en caso de tener, una emitida por factura', 1, 72, 45),
(33, 'TBD', 'Actualizado al mes correspondiente', 1, 72, 157),
(34, 'TBD', 'En caso de FB60', 1, 72, 40),
(35, '"cuenta mayor"', 'en cado de fb60', 1, 72, 2),
(36, 'TBD', 'TBD', 1, 72, 25),
(37, 'TBD', 'en caso de MIRO', 1, 73, 105),
(38, 'TBD', 'Revisar que es', 1, 73, 96),
(39, 'TBD', '"Entrada de material"', 1, 73, 95),
(40, 'TBD', 'Match con factura', 1, 73, 17),
(41, '"Fecha de emisión"', 'Match orden de compra con entrada', 1, 73, 60),
(42, 'TBD', 'En caso de servicio', 1, 73, 156),
(43, 'TBD', 'en caso de tener, una emitida por factura', 1, 73, 45),
(44, 'TBD', 'En caso de servicio pedir a division', 1, 73, 121),
(45, 'TBD', 'En caso de FB60', 1, 73, 40),
(46, '"cuenta mayor"', 'en cado de fb60', 1, 73, 2),
(47, 'TBD', 'Match with PO', 1, 32, 17),
(48, 'TBD', 'TBD', 1, 32, 88),
(49, 'TBD', 'TBD', 1, 32, 60),
(50, 'TBD', 'TBD', 1, 32, 92),
(51, 'TBD', 'TBD', 1, 32, 147),
(52, 'TBD', 'TBD', 1, 32, 47),
(53, 'TBD', 'TBD', 1, 32, 105),
(54, 'TBD', 'TBD', 1, 32, 95),
(55, 'TBD', 'Match with PO', 1, 33, 17),
(56, 'TBD', 'TBD', 1, 33, 88),
(57, 'TBD', 'TBD', 1, 33, 60),
(58, 'TBD', 'TBD', 1, 33, 147),
(59, 'TBD', 'TBD', 1, 33, 47),
(60, 'TBD', 'TBD', 1, 33, 105),
(61, 'TBD', 'Entrada de material', 1, 33, 95),
(62, 'TBD', 'TBD', 1, 34, 17),
(63, 'TBD', 'TBD', 1, 34, 88),
(64, 'TBD', 'TBD', 1, 34, 60),
(65, 'TBD', 'Need to match with Sales order', 1, 34, 147),
(66, 'TBD', 'TBD', 1, 34, 37),
(67, 'TBD', 'TBD', 1, 34, 47),
(68, 'TBD', 'TBD', 1, 34, 105),
(69, 'TBD', 'en caso de MIRO', 1, 76, 105),
(70, 'TBD', 'Digital "Hoja de entrada"', 1, 76, 65),
(71, 'TBD', '"Entrada de material"', 1, 76, 95),
(72, 'TBD', 'Match con factura', 1, 76, 17),
(73, '"Fecha de emisión"', 'Match orden de compra con entrada', 1, 76, 60),
(74, 'TBD', '"Tipo de cambio"', 1, 76, 69),
(75, 'TBD', 'en caso de tener, una emitida por factura', 1, 76, 45),
(76, 'TBD', 'Actualizado al mes correspondiente', 1, 76, 157),
(77, 'TBD', 'En caso de FB60', 1, 76, 40),
(78, '"cuenta mayor"', 'en cado de fb60', 1, 76, 2),
(79, 'TBD', 'TBD', 1, 76, 47),
(80, 'TBD', 'En caso de diferencias', 1, 77, 18),
(81, 'TBD', 'TBD', 1, 77, 105),
(82, 'TBD', 'Verify type', 1, 77, 96),
(83, 'TBD', '"Entrada de material"', 1, 77, 95),
(84, 'TBD', 'Match con factura', 1, 77, 17),
(85, '"Fecha de emisión"', 'Match orden de compra con entrada', 1, 77, 60),
(86, 'TBD', 'En caso de servicio', 1, 77, 156),
(87, 'En caso de tener', 'TBD', 1, 77, 45),
(88, 'TBD', 'En caso de servicio', 1, 77, 121),
(89, 'TBD', 'TBD', 1, 77, 40),
(90, '"cuenta mayor"', 'en caso de FB60', 1, 77, 2),
(91, 'TBD', 'TBD', 1, 55, 150),
(92, 'TBD', 'TBD', 1, 55, 88),
(93, 'TBD', 'Match with invoice', 1, 55, 17),
(94, 'TBD', 'Match with invoice', 1, 55, 157),
(95, 'TBD', 'Match with invoice', 1, 55, 158),
(96, 'TBD', 'TBD', 1, 55, 134),
(97, 'TBD', 'TBD', 1, 55, 143),
(98, '"Fecha de emisión"', 'TBD', 1, 55, 60),
(99, 'TBD', 'TBD', 1, 55, 61),
(100, 'TBD', 'Purchase of materials from tax-substituted suppliers with CFOP 5405 we must make the following substitution: From 1.101 to 1.401, From 1.102 to 1.403, From 1.556 to 1.407, From 1.551 to 1.406.', 1, 56, 105),
(101, 'TBD', 'TBD', 1, 56, 88),
(102, 'TBD', 'Match with invoice', 1, 56, 17),
(103, 'TBD', 'Match with invoice', 1, 56, 157),
(104, 'TBD', 'TBD', 1, 56, 158),
(105, 'TBD', 'TBD', 1, 56, 48),
(106, 'TBD', 'TBD', 1, 56, 134),
(107, 'TBD', 'TBD', 1, 56, 106),
(108, 'TBD', 'Diferencia máxima de 2 reales', 1, 56, 159),
(109, 'TBD', 'Descarga de plataforma', 1, 57, 168),
(110, 'TBD', 'TBD', 1, 57, 104),
(111, 'TBD', 'TBD', 1, 57, 59),
(112, 'TBD', 'B2B o servicio', 1, 58, 155),
(113, 'TBD', 'TBD', 1, 58, 47),
(114, 'TBD', 'Tipo de servicio', 1, 58, 98),
(115, 'TBD', 'TBD', 1, 58, 88),
(116, 'TBD', 'Match with invoice', 1, 58, 17),
(117, 'TBD', 'Revision de OC en donde se defina el ISR o IVA a aplicar ', 1, 37, 93),
(118, 'TBD', 'Tienen que hacer match la OC, Factura, GR en montos y cantidades.', 1, 37, 123),
(119, 'TBD', 'Verificar Orden de compra, Entrada de material, y factura', 1, 37, 17),
(120, 'TBD', 'En el caso de que se haya registrado facturas sin comprobantes de entrada de material, es necesario verificar el numero de cuenta la cual fue utilizada para hacer el registro y no se vea afectado el balance. Siempre se va a determinar el saldo de la Cta ', 1, 37, 2),
(121, 'Puede aplicar o no aplicar dependiendo el caso', 'Pre-requisitos: Es necesario que el proveedor envíe al portal CEPDI dos facturas en una de ellas facturara el avance\nde la obra y en la segunda la retención del 10% sobre el avance de la obra. Consejos útiles: Revisar descripción de la factura para verifi', 1, 37, 134),
(122, 'TBD', 'Verificar Nota de credito referenciada a la factura que aplica para cancelacion o duplicidad., verificar monto que aplique a el total de la OC o factura, o parcialidad (lienas), el iva que se le aplico debe de estar definida en la Nota de credito.', 1, 37, 45),
(123, 'Numero unico de referencia para factura', 'Verificar que el numero de OC sea el correcto y este referenciado a la factura o NC correspondiente', 1, 37, 105),
(124, 'TBD', 'TBD', 1, 37, 147),
(125, 'TBD', 'Tienen que hacer match la OC, Factura, GR en montos y cantidades.', 1, 38, 123),
(126, 'TBD', 'Deben coincidir con el monto registrado.', 1, 38, 17),
(127, 'TBD', 'En el caso de que se haya registrado facturas sin comprobantes de entrada de material, es necesario verificar el numero de cuenta la cual fue utilizada para hacer el registro y no se vea afectado el balance, ¿Siempre se va a determinar el saldo de la Cta?', 1, 38, 2),
(128, 'TBD', 'Verificar Nota de credito referenciada a la factura que aplica para cancelacion o duplicidad., verificar monto que aplique a el total de la OC o factura, o parcialidad (lienas), el iva que se le aplico debe de estar definida en la Nota de credito.', 1, 38, 105),
(129, 'TBD', 'TBD', 1, 38, 147),
(130, 'TBD', 'Tienen que hacer match la OC, Factura, GR en montos y cantidades.', 1, 39, 123),
(131, 'TBD', 'Deben coincidir con el monto registrado.', 1, 39, 17),
(132, 'TBD', 'En el caso de que se haya registrado facturas sin comprobantes de entrada de material, es necesario verificar el numero de cuenta la cual fue utilizada para hacer el registro y no se vea afectado el balance, ¿Siempre se va a determinar el saldo de la Cta ?', 1, 39, 2),
(133, 'TBD', 'Verificar cantidad y amount en OC y entrada de material sea el correcto inputado.', 1, 39, 45),
(134, 'TBD', 'Verificar Nota de credito referenciada a la factura que aplica para cancelacion o duplicidad., verificar monto que aplique a el total de la OC o factura, o parcialidad (lienas), el iva que se le aplico debe de estar definida en la Nota de credito.', 1, 39, 105),
(135, 'TBD', 'Need to match with Sales order', 1, 39, 147),
(136, '"documento contable"', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 80, 135),
(137, '"Orden de pago"', 'número de documento generado por SAP sin PO para aprobación', 1, 80, 111),
(138, 'TBD', 'Match with PO or invoice', 1, 80, 17),
(139, 'With PO', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 81, 135),
(140, '"Orden de pago"', 'número de documento generado por SAP sin PO para aprobación', 1, 81, 111),
(141, 'TBD', 'Match with PO or invoice', 1, 80, 17),
(142, '"documento contable"', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 66, 135),
(143, 'TBD', 'Match with PO or invoice', 1, 66, 17),
(144, '"documento contable"', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 67, 135),
(145, 'TBD', 'Match with PO or invoice', 1, 67, 17),
(146, 'TBD', 'TBD', 1, 68, 128),
(147, 'TBD', 'Match with PO or invoice', 1, 68, 17),
(148, '"documento contable"', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 42, 135),
(149, 'TBD', 'Match with PO or invoice', 1, 42, 17),
(150, '"documento contable"', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 43, 135),
(151, 'TBD', 'Match with PO or invoice', 1, 43, 17),
(152, '"documento contable"', 'Verificar que el numero de documento contable no haya tenido modificaciones, si las tuvo preguntar el porque', 1, 44, 135),
(153, 'TBD', 'TBD', 1, 35, 147),
(154, 'Total amount per IG code', 'TBD', 1, 35, 17),
(155, 'TBD', 'TBD', 1, 35, 60),
(156, 'TBD', 'TBD', 1, 35, 97),
(157, 'TBD', 'Bloqueada, incorrecta, más de una cuenta', 1, 35, 2),
(158, 'Entrada de material', 'revisar en SAP, transaccion Me23, sino hay entrada de material no se procesa', 1, 74, 95),
(159, 'Date showing invoice due according current date', 'Verify if invoice is due for payment', 1, 74, 115),
(160, 'TBD', 'verificación de monto', 1, 74, 134),
(161, 'Solicitud de anticipo', 'sólo en caso de terceros extranjeros, archivo de excel realizada por el comprador, con numero de de orden de compra, monto, firma de jefe de proyecto', 1, 74, 132),
(162, 'PDF file', 'para caso de retenciones sino presentar certificado de residencia fiscal', 1, 74, 45),
(163, 'TBD', 'FB60 o MIRO, SAP', 1, 74, 9),
(164, 'TBD', 'TBD', 1, 74, 105),
(165, 'TBD', 'TBD', 1, 74, 21),
(166, 'TBD', 'TBD', 1, 74, 17),
(167, 'TBD', 'TBD', 1, 74, 4),
(168, 'Por programa de ocurrencias', 'Verificar E-mail en historico', 1, 50, 133),
(169, 'Anexo en solicitud', 'En caso de Advance, match monto con ocurrencia', 1, 50, 74),
(170, 'TBD', 'Fuera de las fechas de pago, aprobación de CFO', 1, 50, 60),
(171, 'TBD', 'TBD', 1, 50, 31),
(172, 'TBD', 'Correcto motivo de solicitud', 1, 50, 100),
(173, 'TBD', 'Match SAP, Ocurrencia y Carta bancaria (en caso de aplicar)', 1, 50, 17),
(174, 'TBD', 'Verificar que sea proveedor de la lista, y revisar que no sea pago duplicado', 1, 50, 113),
(175, 'TBD', 'TBD', 1, 50, 18),
(176, 'TBD', 'Verificar fecha de vencimiento', 1, 50, 50),
(177, 'Aprobación boleto', 'Sólo en caso de auto ', 1, 50, 18),
(178, 'TBD', 'TBD', 1, 51, 133),
(179, 'TBD', 'Valor mayor a 5,000 reales', 1, 51, 77),
(180, 'TBD', 'TBD', 1, 51, 147),
(181, 'TBD', 'TBD', 1, 51, 17),
(182, 'TBD', 'revisar en invoice, fecha futura', 1, 51, 72),
(183, 'TBD', 'Fecha futura', 1, 51, 105),
(184, 'TBD', 'especificado en invoice', 1, 51, 151),
(185, 'TBD', 'TBD', 1, 51, 120),
(186, 'Aprobado por CFO', 'En caso de ser excepción de pago', 1, 51, 18),
(187, 'notificacion por correo de tesoreria', 'Revisar campo de material', 1, 52, 26),
(188, 'Modalidad', 'Tiene que ser CC en SAP', 1, 52, 98),
(189, 'TBD', 'Si hay diferencia, revisar que venga especificado la tolerancia', 1, 52, 17),
(190, 'Archivo consolidado', 'TBD', 1, 53, 19),
(191, 'TBD', 'Match en archivo de impuestos vs DARF', 1, 53, 17),
(192, 'TBD', 'PDF de impuesto', 1, 53, 49),
(193, 'TBD', 'Verificar que la propuesta se proceso', 1, 59, 20),
(194, 'TBD', 'En impuestos no aplica, match requerimiento vs registro en sistema', 1, 59, 102),
(195, 'Linea de referencia', 'Aplica para impuestos y servicios, revisar match banco con SAP en campo de guia', 1, 59, 94),
(196, 'Verificar pagos bloqueados', 'En caso de que haya pagos bloqueados, revisar en Master Data Gefor el motivo del rechazo, escribir nombre de comprador responsable', 1, 59, 162),
(197, 'E-mail', 'Que la propuesta este aprobada por Gerente AP y Contabilidad', 1, 59, 18),
(198, 'TBD', 'Match Sistema vs DARF y Archivo consolidado de excel', 1, 60, 17),
(199, 'TBD', 'a casa de cambio, match con archivo consolidado', 1, 61, 39),
(200, 'Reporte de pagos', 'SAP PWCE', 1, 62, 131),
(201, 'Reporte de anticipos', 'FBLN1', 1, 62, 130),
(202, 'Codigo de importacion', 'Verify number correct', 1, 62, 52),
(203, 'TBD', 'Verify que no este en anticipos', 1, 62, 13),
(204, 'TBD', 'En caso de Thomas & Betts, verificar aprobaciones', 1, 62, 18),
(205, 'TBD', 'Verificar que sea el mismo numero que archivo consolidado', 1, 63, 66),
(206, 'TBD', 'Verificar que sea el mismo numero que archivo consolidado', 1, 63, 105),
(207, 'TBD', 'Verificar match registro en SAP con comprobante de pago', 1, 63, 17),
(208, 'Type currency', 'Verificar que sea el mismo que archivo consolidado', 1, 63, 47),
(209, 'TBD', 'especificado en achivo consolidado', 1, 63, 80),
(210, 'verificar registro', 'match sap y cit', 1, 64, 163),
(211, 'TBD', 'TBD', 1, 64, 47),
(212, 'TBD', 'TBD', 1, 64, 17),
(213, 'numero secuencial DI', 'TBD', 1, 64, 52),
(214, 'referencia interna', 'Envio a casa de cambio, RSS Para material', 1, 64, 98),
(215, 'TBD', 'TBD', 1, 40, 17),
(216, 'Currency of invoice', 'Verificar que la moneda coincida con la factura, y tipo de cuenta que se afectara según si se pagara en otro tipo de cambio o en este mismo. Debe de coincidir con Master data.', 1, 40, 47),
(217, 'TBD', 'Verificar que el proveedor no haya tenido algun bloqueo financiero, tiene que estar libre para procesar el pago.', 1, 40, 2),
(218, 'TBD', 'Verificar Aprobado por Controller', 1, 40, 18),
(219, 'TBD', 'TBD', 1, 78, 11),
(220, 'TBD', 'La determinación de los documentos a pagar esta relacionado con un presupuesto semanal enviado por el líder de cuentas por pagar', 1, 78, 60),
(221, 'TBD', 'cuenta de banco ABB, de que banco va a salir el pago', 1, 78, 4),
(222, 'TBD', 'TBD', 1, 78, 17),
(223, 'TBD', 'reporte con los documentos contables pendientes de pago, es necesario especificar el número de acreedor, grupo de cuentas (1000 a 3000) y sociedad AR10', 1, 78, 129),
(224, 'Vias de pago', 'este proceso dependerá del tipo de pago que se esta realizando', 1, 78, 97),
(225, 'fecha de contabilidad', 'Esta fecha será la fecha mayor del periodo seleccionado en el reporte de aging', 1, 78, 8),
(226, '"Propuesta de pago"', 'Documento generado por SAP, guardando respaldo', 1, 82, 116),
(227, '"Orden de pago"', 'Generado en SAP, impresión de cheques o sin cheque', 1, 82, 111),
(228, 'TBD', 'Match with Proposal', 1, 82, 17),
(229, 'TBD', 'TBD', 1, 69, 116),
(230, 'TBD', 'Match with Proposal', 1, 69, 17),
(231, 'Verificar pago realizado', 'Verificar si el pago fue realizado en el banco o si se rechazo', 1, 69, 161),
(232, 'TBD', 'Verificar documento de compensación', 1, 69, 33),
(233, 'TBD', 'Verificar match registro en SAP con contrato', 1, 70, 17),
(234, 'TBD', 'Verificar match registro en SAP con contrato', 1, 71, 17),
(235, 'TBD', 'Verificar match registro en SAP con contrato', 1, 71, 98),
(236, 'TBD', 'Verificar porque motivo el pago no se realizo, en caso de aplicar', 1, 71, 99),
(237, '"documento contable"', 'TBD', 1, 71, 9),
(238, 'compensacion en sap', 'TBD', 1, 70, 33),
(239, 'TBD', 'Verificar que el numero de Clearing Document sea el enviado al proveedor, según la factura', 1, 45, 29),
(240, 'TBD', 'Match with Proposal', 1, 45, 17),
(241, 'TBD', 'Match with Proposal', 1, 45, 47),
(242, 'TBD', 'Match with Proposal', 1, 45, 97),
(243, 'Name person or company Address', 'Not attachement in AFIP', 1, 75, 23),
(244, 'Fiscal Registration', 'Not attachement in AFIP', 1, 75, 46),
(245, 'Account number id 22 digits', 'Numero de cuenta bancaria', 1, 75, 27),
(246, 'Not stablished as required to process', 'Need to be defined as required', 1, 75, 114),
(247, 'AFIP PDF', 'AFIP PDF', 1, 75, 15),
(248, 'TBD', 'convenio multilateral de ingresos brutos) disponible en especial para la fecha de validación del documento que es divulgada por AFIP e informada por la área de impuestos de ABB. El CM05 del año anterior tiene vigencia hasta el 30 de junio, a partir del 1', 1, 75, 30),
(249, 'Name person or company Address', 'Not attached in Receita fiscal', 1, 54, 23),
(250, 'CNPJ/CPF Fiscal registration', 'attached in Receita fiscal or sintegra for verification', 1, 54, 31),
(251, 'TBD', 'TBD', 1, 54, 12),
(252, 'TBD', 'EOM term mandatory new supplier only', 1, 54, 117),
(253, 'TBD', 'Must to match with RFC PDF data', 1, 36, 137),
(254, 'Estado de cuenta', 'No mayor a 3 meses', 1, 36, 68),
(255, 'TBD', 'Validación de ABB, en caso de directos', 1, 36, 10),
(256, 'TBD', 'Must to match with RFC PDF data Name of the company, Address contact reference', 1, 36, 160),
(257, 'SAP vs feit', 'RFC PDF File', 1, 41, 137),
(258, 'SAP vs feit', 'Tipo de cuenta, trabajador, ABB or terceros', 1, 41, 5),
(259, 'SAP vs feit', 'TBD', 1, 41, 32),
(260, 'SAP vs feit', 'TBD', 1, 41, 147),
(261, 'SAP vs feit', 'TBD', 1, 41, 12),
(262, 'SAP vs feit', 'City, Zip code', 1, 41, 12),
(263, 'SAP vs feit', 'TBD', 1, 41, 47),
(264, 'SAP vs feit', 'Mostrar verificación de cuenta por parte de Master Data', 1, 41, 2),
(265, 'SAP vs feit', 'TBD', 1, 41, 169),
(266, 'SAP vs feit', 'TBD', 1, 41, 108),
(267, 'SAP vs feit', 'TBD', 1, 41, 97),
(268, 'SAP vs feit', 'TBD', 1, 41, 170),
(269, 'SAP vs feit', 'TBD', 1, 41, 85),
(270, 'SAP vs feit', 'Modo de transporte', 1, 41, 154),
(271, 'SAP vs feit', 'TBD', 1, 41, 117),
(272, 'SAP vs lotus', 'Not attached in Receita fiscal', 1, 65, 23),
(273, 'CNPJ/CPF Fiscal registration', 'attached in Receita fiscal or sintegra for verification', 1, 65, 31),
(274, 'SAP vs lotus', 'TBD', 1, 65, 12),
(275, 'SAP vs lotus', 'EOM term mandatory new supplier only', 1, 65, 117),
(276, 'SAP vs lotus', 'TBD', 1, 79, 147),
(277, 'TBD', 'dirección fiscal  lotus vs afip', 1, 79, 53),
(278, 'Cuando apliquen', 'Si en el documento de AFIP consta IVA lo cargamos en SAP y si figura IVA EXENTO no lo cargamos.', 1, 79, 91),
(279, 'Constatar que tengan su verificacion en access', 'certificada (o firmada por Apoderado) o copia de extracto bancario. (AR, UY, BO)', 1, 79, 27),
(280, 'TBD', 'nos indica que el proveedor no existe y seguimos con el proceso de creación, En casos de empresas del exterior y grupo ABB donde no hay CUIT buscamos por el nombre de proveedor, comparar el CUIT de la constancia de AFIP con el CUIT de formulario de alta, ', 1, 79, 46),
(281, 'TBD', 'Verificar que no sea el motivo de la disputa', 1, 22, 64),
(282, 'Facturación ICV', 'Verificar que no sea el motivo de la disputa ICV: numero global para clientes', 1, 22, 71),
(283, 'TBD', 'Verificar que no sea el motivo de la disputa', 1, 22, 105),
(284, 'Facturación Free of charge', 'Verificar que no estén cargadas en SAP', 1, 22, 70),
(285, 'Approval AP', 'Verificar que no sea el motivo de la disputa', 1, 22, 18),
(286, 'TBD', 'TBD', 1, 11, 112),
(287, 'TBD', 'TBD', 1, 11, 47),
(288, 'TBD', 'In the invoice final amount', 1, 11, 17),
(289, 'TBD', 'TBD', 1, 11, 142),
(290, 'Issuing PG', 'The order of the invoice and spreadsheet are inverse', 1, 11, 22),
(291, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 11, 124),
(292, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 11, 90),
(293, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 11, 125),
(294, 'TBD', 'or it''s B2B', 1, 11, 88),
(295, 'TBD', 'TBD', 1, 11, 75),
(296, 'TBD', 'identify costumer', 1, 11, 105),
(297, 'TBD', 'TBD', 1, 11, 60),
(298, 'TBD', 'Revisar CIT vs SAP', 1, 1, 112),
(299, 'TBD', 'Revisar CIT vs SAP', 1, 1, 47),
(300, 'TBD', 'Revisar CIT vs SAP', 1, 1, 17),
(301, 'TBD', 'Revisar CIT vs SAP', 1, 1, 112),
(302, 'Issuing BU code', 'Revisar CIT vs SAP', 1, 1, 22),
(303, 'TBD', 'Revisar CIT vs SAP', 1, 1, 124),
(304, 'TBD', 'Revisar CIT vs SAP', 1, 1, 90),
(305, 'TBD', 'Revisar CIT vs SAP', 1, 1, 125),
(306, 'TBD', 'Revisar CIT vs SAP', 1, 1, 89),
(307, 'TBD', 'most have the same due date as invoice refered', 1, 1, 44),
(308, 'TBD', 'Verificar que la factura este timbrada', 1, 1, 152),
(309, 'TBD', 'Revisar CIT vs SAP', 1, 1, 60),
(310, 'Receiving BU code', 'Match SAP vs CIT', 1, 26, 22),
(311, 'TBD', 'Match SAP vs CIT', 1, 26, 86),
(312, 'Invoices Exported', 'Match SAP vs CIT', 1, 26, 66),
(313, 'TBD', 'Match SAP vs CIT', 1, 26, 60),
(314, 'TBD', 'Match SAP vs CIT', 1, 26, 165),
(315, 'TBD', 'Match SAP vs CIT', 1, 26, 88),
(316, 'TBD', 'Match SAP vs CIT', 1, 26, 42),
(317, 'TBD', 'Match SAP vs CIT', 1, 26, 112),
(318, 'TBD', 'Match SAP vs CIT', 1, 26, 17),
(319, 'TBD', 'Match SAP vs CIT', 1, 26, 105),
(320, 'TBD', 'Match SAP vs CIT', 1, 26, 47),
(321, 'Orden de venta', 'Match SAP vs CIT', 1, 26, 107),
(322, 'TBD', 'TBD', 1, 15, 112),
(323, 'Secuencia de numeros', 'TBD', 1, 15, 76),
(324, 'TBD', 'Revisar que solicitación vs carga en CIT', 1, 15, 101),
(325, 'TBD', 'code ABACUS', 1, 15, 42),
(326, 'TBD', 'TBD', 1, 15, 47),
(327, 'TBD', 'In the invoice final amount', 1, 15, 17),
(328, 'TBD', 'Is filled with the customer''s PO', 1, 15, 142),
(329, 'Issuing BU code', 'The order of the invoice and spreadsheet are inverse', 1, 15, 22),
(330, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 15, 124),
(331, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 15, 90),
(332, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 15, 125),
(333, 'TBD', 'or it''s B2B', 1, 15, 88),
(334, 'TBD', 'Verificar en CIT, comentarios', 1, 5, 166),
(335, 'Envío de factura', 'Verificar en e-mail envío de factura o que este pagada', 1, 30, 66),
(336, 'TBD', 'TBD', 1, 19, 112),
(337, 'TBD', 'TBD', 1, 19, 47),
(338, 'TBD', 'In the invoice final amount', 1, 19, 17),
(339, 'TBD', 'TBD', 1, 19, 142),
(340, 'Issuing BU code', 'The order of the invoice and spreadsheet are inverse', 1, 19, 22),
(341, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 19, 124),
(342, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 19, 90),
(343, 'TBD', 'The order of the invoice and spreadsheet are inverse', 1, 19, 125),
(344, 'TBD', 'or it''s B2B', 1, 19, 88),
(345, 'TBD', 'TBD', 1, 19, 75),
(346, 'TBD', 'identify costumer', 1, 19, 105),
(347, 'TBD', 'TBD', 1, 19, 60),
(348, 'TBD', 'Verificar que no sea el motivo de la disputa, verificar soporte (SAP,e-mail,etc)', 1, 23, 64),
(349, 'Facturacion', 'Verificar que no sea el motivo de la disputa, verificar soporte (SAP,e-mail,etc)', 1, 23, 71),
(350, 'TBD', 'Verificar que no sea el motivo de la disputa, verificar soporte (SAP,e-mail,etc)', 1, 23, 105),
(351, 'Facturacion', 'Verificar que no sea el motivo de la disputa, verificar soporte (SAP,e-mail,etc)', 1, 23, 70),
(352, 'Approval AP', 'Verificar que no sea el motivo de la disputa, verificar soporte (SAP,e-mail,etc)', 1, 23, 18),
(353, 'Invoice number/ document reference', 'Numero secuencial de embarque (invoice)', 1, 12, 88),
(354, 'Invoice date/document date', 'TBD', 1, 12, 56),
(355, 'Invoice', 'TBD', 1, 12, 60),
(356, 'IG statment', 'Revisar contra conograma de Brazil, que cumpla el plazo', 1, 12, 126),
(357, 'TBD', 'PO reference number/ contract reference', 1, 12, 105),
(358, 'TBD', 'se revisará vs archivo missmatch', 1, 2, 1),
(359, 'Amount in document and local currency', 'TBD', 1, 2, 17),
(360, 'TBD', 'TBD', 1, 2, 110),
(361, 'TBD', 'TBD', 1, 2, 89),
(362, 'TBD', 'TBD', 1, 2, 83),
(363, 'TBD', 'TBD', 1, 2, 22),
(364, 'Receiving BU code', 'Match SAP vs CIT', 1, 27, 22),
(365, 'TBD', 'Match SAP vs CIT', 1, 27, 86),
(366, 'Invoices Exported', 'Match SAP vs CIT', 1, 27, 66),
(367, 'TBD', 'Match SAP vs CIT', 1, 27, 60),
(368, 'TBD', 'Match SAP vs CIT', 1, 27, 165),
(369, 'TBD', 'Match SAP vs CIT', 1, 27, 88),
(370, 'TBD', 'Match SAP vs CIT', 1, 27, 42),
(371, 'TBD', 'Match SAP vs CIT', 1, 27, 112),
(372, 'TBD', 'Match SAP vs CIT', 1, 27, 17),
(373, 'TBD', 'Match SAP vs CIT', 1, 27, 105),
(374, 'TBD', 'Match SAP vs CIT', 1, 27, 47),
(375, 'Orden de venta', 'Match SAP vs CIT', 1, 27, 107),
(376, 'TBD', 'verificar anticipos sin aplicar', 1, 16, 14),
(377, 'TBD', 'Verificar que no haya documentos ya pagados', 1, 16, 58),
(378, 'TBD', 'Cuentas sin PO, verify with controller', 1, 16, 164),
(379, 'TBD', 'TBD', 1, 16, 109),
(380, 'TBD', 'TBD', 1, 16, 84),
(381, 'Issuing BU code', 'TBD', 1, 16, 22),
(382, 'Issuing BU code', 'TBD', 1, 16, 124),
(383, 'TBD', 'Reevaluaciones del mes corriente y que corresponda a la factura', 1, 6, 127),
(384, 'TBD', 'Que se encuentre en el reporte final', 1, 6, 153),
(385, 'TBD', 'verificar que en cuentas internas se tenga MXSIS', 1, 6, 110),
(386, 'TBD', 'Que se encuentre en el reporte final', 1, 6, 84),
(387, 'Issuing BU code', 'Que se encuentre en el reporte final', 1, 6, 22),
(388, 'Issuing BU code', 'Que se encuentre en el reporte final', 1, 6, 124),
(389, 'Amount in document and local currency', 'Que se encuentre en el reporte final', 1, 6, 17),
(390, 'Amount per account and currency', 'Verificar match reporte final contra reporte abacus', 1, 31, 17),
(391, 'Amount per account and currency', 'Verificar match reporte final contra reporte r-box', 1, 31, 17),
(392, 'Total amount per IG code', 'Match final report (Pre) vs R-BOX (Repository)', 1, 20, 17),
(393, 'Total amount per IG code', 'Match final Abacus vs R-BOX (Repository)', 1, 20, 17),
(394, 'Amount per account', 'Vs R-box report', 1, 9, 17),
(395, 'Amount per account', 'Match with Abacus report and r-box report', 1, 9, 17),
(396, 'TBD', 'En archivo de AFIP, no aplica en extranjeros', 1, 24, 23),
(397, 'TBD', 'En archivo de AFIP, no aplica en extranjeros', 1, 24, 12),
(398, 'International code ID TAX', 'In case foreign', 1, 24, 67),
(399, 'TBD', 'En archivo de AFIP, no aplica en extranjeros', 1, 24, 23),
(400, 'TBD', 'En archivo de AFIP, no aplica en extranjeros', 1, 24, 12),
(401, 'TBD', 'En archivo de AFIP, no aplica en extranjeros', 1, 24, 46),
(402, 'Impuestos que aplican', 'en exterior no aplica, revisar que venga especificado en la solicitud', 1, 24, 149),
(403, 'TBD', 'Agente de retención y percepción de IVA por boletín oficial (RG18). Regimen de exclusión (RG2226) SOLO EN CASO DE SER DE ARGENTINA, si no aplican impuestos tiene que venir especificado que no le aplicaban', 1, 24, 16),
(404, 'TBD', 'EN CASO DE SER DE URUGUAY, en caso de extranjero no aplica', 1, 24, 138),
(405, 'Approval form BU', 'Formulario de aprobación de BU', 1, 24, 18),
(406, 'TBD', 'En caso de ser cliente extranjero, controller y BU', 1, 24, 18),
(407, 'TBD', 'codigo exclusivo de ABB/ el solicitante', 1, 24, 81),
(408, 'TBD', 'Internal customer and vendors solo en caso de grupo', 1, 24, 71),
(409, 'TBD', 'Nombre de cliente o empresa', 1, 13, 38),
(410, 'TBD', 'Equivalente a Tax ID, sólo aplica para personas juridicas', 1, 13, 67),
(411, 'TBD', 'Calle, numero, colonia, complemento de dirección', 1, 13, 12),
(412, 'TBD', 'Internal customer and vendors solo en caso de grupo', 1, 13, 71),
(413, 'TBD', 'Nombre de cliente o empresa', 1, 13, 38),
(414, 'TBD', 'Calle, numero, colonia, complemento de dirección', 1, 13, 12),
(415, 'Telephone', 'TBD', 1, 13, 118),
(416, 'TBD', 'TBD', 1, 13, 145),
(417, 'TBD', 'TBD', 1, 13, 63),
(418, 'TBD', 'Planta o división', 1, 13, 139),
(419, 'TBD', 'Match with CNPJ only juridicas, si no tiene debe adjuntar evidencia', 1, 13, 144),
(420, 'TBD', 'TBD', 1, 3, 137),
(421, 'Customer name', 'TBD', 1, 3, 41),
(422, 'TBD', 'calle, colonia, cP, numero', 1, 3, 12),
(423, 'TBD', 'TBD', 1, 3, 145),
(424, 'Nombre de contacto de comprador', 'TBD', 1, 3, 24),
(425, 'TBD', 'TBD', 1, 3, 62),
(426, 'TBD', 'TBD', 1, 3, 47),
(427, 'TBD', 'TBD', 1, 3, 55),
(428, 'TBD', 'TBD', 1, 3, 119),
(429, 'Numero de vendedor', 'TBD', 1, 3, 141),
(430, 'TBD', 'TBD', 1, 3, 117),
(431, 'Terminos de entrega', 'TBD', 1, 3, 51),
(432, 'TBD', 'Tipo de distribuidor', 1, 3, 28),
(433, 'TBD', 'Tipo de rubro', 1, 3, 54),
(434, 'Segmento', 'TBD', 1, 3, 140),
(435, 'TBD', 'en caso de ser extranjero', 1, 3, 67),
(436, 'Customer name', 'TBD', 1, 3, 41),
(437, 'TBD', 'calle, colonia, cP, numero', 1, 3, 12),
(438, 'TBD', 'En caso de grupo, verificar correcta creación según estructura de grupo', 1, 3, 71),
(439, 'TBD', 'Grupo de cuentas 1000 - Cuenta 131010 (nacionales), Grupo de cuentas 4000 - Cuenta 131020 (exterior), Grupo de cuentas 6000 - Cuenta 135030 (grupo)', 1, 28, 6),
(440, 'Phone number customer', 'TBD', 1, 28, 118),
(441, 'TBD', 'TBD', 1, 28, 63),
(442, 'Identidad fiscal', 'RUT/CUIT/ID equivalente', 1, 28, 82),
(443, 'Cuenta asociada', 'TBD', 1, 28, 3),
(444, 'Condición de pago', 'TBD', 1, 28, 114),
(445, 'TBD', 'Numero , sólo en caso de nacionales', 1, 28, 78),
(446, 'TBD', 'inscripto, no inscripto o exento, sólo en caso de nacionales', 1, 28, 103),
(447, 'TBD', 'convenio multilateral, inscripto o no, sólo en caso de nacionales', 1, 28, 30),
(448, 'TBD', 'Grupo de cuentas 1000 - Cuenta 131010 (nacionales), Grupo de cuentas 4000 - Cuenta 131020 (exterior), Grupo de cuentas 6000 - Cuenta 135030 (grupo)', 1, 28, 6),
(449, 'Phone number customer', 'TBD', 1, 28, 118),
(450, 'TBD', 'TBD', 1, 28, 63),
(451, 'Identidad fiscal', 'RUT/CUIT/ID equivalente', 1, 28, 82),
(452, 'Cuenta asociada', 'TBD', 1, 28, 3),
(453, 'Condición de pago', 'TBD', 1, 28, 114),
(454, 'TBD', 'Grupo de cuentas 1000 - Cuenta 131010 (nacionales), Grupo de cuentas 4000 - Cuenta 131020 (exterior), Grupo de cuentas 6000 - Cuenta 135030 (grupo)', 1, 28, 6),
(455, 'Phone number customer', 'TBD', 1, 28, 118),
(456, 'TBD', 'TBD', 1, 28, 63),
(457, 'Identidad fiscal', 'RUT/CUIT/ID equivalente', 1, 28, 82),
(458, 'Cuenta asociada', 'TBD', 1, 28, 3),
(459, 'Condición de pago', 'TBD', 1, 28, 114),
(460, 'Match SAP vs Request', 'Nombre de cliente o empresa', 1, 17, 38),
(461, 'Match SAP vs Request', 'Calle, numero, colonia, complemento de dirección', 1, 17, 12),
(462, 'Match SAP vs Request', 'Telephone', 1, 17, 118),
(463, 'Match SAP vs Request', 'TBD', 1, 17, 145),
(464, 'Match SAP vs Request', 'TBD', 1, 17, 63),
(465, 'Match SAP vs Request', 'Planta o división', 1, 17, 139),
(466, 'Match SAP vs Request', 'Match with CNPJ only juridicas', 1, 17, 144),
(467, 'Match SAP vs Request', 'TBD', 1, 17, 122),
(468, 'Match SAP vs Request', 'Nombre de cliente o empresa', 1, 17, 38),
(469, 'Match SAP vs Request', 'Calle, numero, colonia, complemento de dirección', 1, 17, 12),
(470, 'Match SAP vs Request', 'Equivalente a Tax ID, sólo aplica para personas juridicas', 1, 17, 67),
(471, 'Match SAP vs Request', 'Internal customer and vendors solo en caso de grupo', 1, 17, 71),
(472, 'TBD', 'TBD', 1, 7, 137),
(473, 'name', 'TBD', 1, 7, 41),
(474, 'TBD', 'calle, colonia, cP, numero', 1, 7, 12),
(475, 'TBD', 'TBD', 1, 7, 145),
(476, 'Nombre de contacto de comprador', 'TBD', 1, 7, 24),
(477, 'TBD', 'TBD', 1, 7, 62),
(478, 'TBD', 'No obligatorio', 1, 7, 167),
(479, 'TBD', 'TBD', 1, 7, 47),
(480, 'TBD', 'TBD', 1, 7, 55),
(481, 'TBD', 'TBD', 1, 7, 119),
(482, 'Numero de vendedor', 'TBD', 1, 7, 141),
(483, 'TBD', 'TBD', 1, 7, 117),
(484, 'Terminos de entrega', 'TBD', 1, 7, 51),
(485, 'TBD', 'TBD', 1, 7, 43),
(486, 'TBD', 'Rubro ', 1, 7, 28),
(487, 'Segmento', 'TBD', 1, 7, 140),
(488, 'name', 'TBD', 1, 7, 41),
(489, 'TBD', 'calle, colonia, cP, numero', 1, 7, 12),
(490, 'TBD', 'TBD', 1, 7, 145),
(491, 'Nombre de contacto de comprador', 'TBD', 1, 7, 24),
(492, 'TBD', 'TBD', 1, 7, 62),
(493, 'TBD', 'TBD', 1, 7, 167),
(494, 'TBD', 'TBD', 1, 7, 47),
(495, 'TBD', 'TBD', 1, 7, 55),
(496, 'TBD', 'TBD', 1, 7, 119),
(497, 'Numero de vendedor', 'TBD', 1, 7, 141),
(498, 'TBD', 'TBD', 1, 7, 117),
(499, 'Terminos de entrega', 'TBD', 1, 7, 51),
(500, 'TBD', 'TBD', 1, 7, 43),
(501, 'TBD', 'Rubro ', 1, 7, 28),
(502, 'Segmento', 'TBD', 1, 7, 140),
(503, 'name', 'TBD', 1, 7, 41),
(504, 'TBD', 'calle, colonia, cP, numero', 1, 7, 12),
(505, 'TBD', 'extranjeros', 1, 7, 67),
(506, 'Constancia de Extracto bancario', 'download of Bank ', 1, 25, 35),
(507, '"orden de pago de cliente" PDF file', 'Revisar OP o correcta aplicación', 1, 25, 111),
(508, 'PDF file', 'TBD', 1, 25, 36),
(509, 'TBD', 'Todas las facturas deben estar timbradas (revisar max 5 facturas)', 1, 4, 152),
(510, 'PDF,E-mail', 'Que facturas estén aplicadas de acuerdo a cliente', 1, 4, 87),
(511, 'pronto pago,devolución, anticipo', 'Referenciada a factura, no aplicada', 1, 4, 45),
(512, 'TBD', 'Coincida deposito vs factura(s)', 1, 4, 17),
(513, 'Total by day', 'download of Bank ', 1, 14, 35),
(514, 'Customer payer', 'download of Bank ', 1, 14, 35),
(515, 'Customer payer', 'download of Bank ', 1, 14, 17),
(516, 'Customer payer', 'download of Bank ', 1, 14, 88),
(517, 'TBD', 'SAP F_28 o 32', 1, 29, 41),
(518, 'TBD', 'TBD', 1, 29, 17),
(519, 'TBD', 'TBD', 1, 29, 88),
(520, 'TBD', 'Match SAP vs extracto bancario, concuerde cliente', 1, 29, 4),
(521, 'TBD', 'Fecha de cheque vs fisico en caso de CITI', 1, 29, 73),
(522, 'Cuenta contable de retenciones', 'TBD', 1, 29, 7),
(523, 'Cuenta de SAP', 'Verificar que  banco concuerde con cuenta', 1, 8, 79),
(524, 'TBD', 'fecha de ingreso del deposito concuerde con document date (SAP)', 1, 8, 56),
(525, 'TBD', 'Revisar que el complemento de pago este aprobado ', 1, 8, 146),
(526, 'TBD', 'Verificar extracto bancario vs ZCFDI_monitor', 1, 8, 97),
(527, 'TBD', 'Verificar que este en la que se hizo el pago', 1, 8, 47),
(528, 'TBD', 'TBD', 1, 18, 88),
(529, 'TBD', 'TBD', 1, 18, 17),
(530, 'TBD', 'TBD', 1, 18, 41),
(531, 'TBD', 'Verificar que el numero concuerde con score cash', 1, 10, 57),
(532, 'TBD', 'Revisar si el documento tuvo reversas y porque', 1, 10, 136),
(533, 'Complemento', 'XML y PDF lo pagado por el cliente/ aprovado verificar que se haya enviado', 1, 10, 34),
(534, 'TBD', 'Match the Customer', 1, 21, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id_User` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Available` int(11) NOT NULL,
  `Id_Privilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id_User`, `Name`, `Lastname`, `Username`, `Password`, `Available`, `Id_Privilege`) VALUES
(1, 'Cristina', 'Rivera', 'Cristina.Rivera', 'CristinaRivera', 1, 2),
(2, 'Alejandra', 'Juache', 'Alejandra.Juache', 'AlejandraJuache', 1, 1),
(3, 'Jonathan', 'Martinez', 'Jonathan.Martinez', 'JonathanMartinez', 1, 2),
(4, 'Nuvia', 'Flores', 'Nuvia.Flores', 'NuviaFlores', 1, 2),
(5, 'Luis', 'Araujo', 'Luis.Araujo', 'LuisAraujo', 1, 2),
(6, 'Ximena', 'Loredo', 'Ximena.Loredo', 'XimenaLoredo', 1, 2),
(7, 'Sofia', 'Loredo', 'Sofia.Loredo', 'SofiaLoredo', 1, 2),
(8, 'Angel', 'Nava', 'Angel.Nava', 'AngelNava', 1, 2),
(9, 'Nancy', 'Guerrero', 'Nancy.Guerrero', 'NancyGuerrero', 1, 2),
(10, 'Virginia', 'Morales', 'Virginia.Morales', 'VirginiaMorales', 1, 2),
(11, 'Juciara', 'Santos', 'Juciara.Santos', 'JuciaraSantos', 1, 2),
(12, 'Angel', 'Garcia', 'Angel.Garcia', 'AngelGarcia', 1, 2),
(13, 'Isidora', 'Monreal', 'Isidora.Monreal', 'IsidoraMonreal', 1, 2),
(14, 'Clara', 'Ruiz', 'Clara.Ruiz', 'ClaraRuiz', 1, 2),
(15, 'Sergio', 'Ramirez', 'Sergio.Ramirez', 'SergioRamirez', 1, 2),
(16, 'Wendy', 'Perez', 'Wendy.Perez', 'WendyPerez', 1, 2),
(17, 'Flor', 'Castillo', 'Flor.Castillo', 'FlorCastillo', 1, 2),
(18, 'Lizbeth', 'Zarazua', 'Lizbeth.Zarazua', 'LizbethZarazua', 1, 2),
(19, 'Citlalic', 'Monreal', 'Citlalic.Monreal', 'CitlalicMonreal', 1, 2),
(20, 'Adriana', 'Flores', 'Adriana.Flores', 'AdrianaFlores', 1, 2),
(21, 'Diego', 'Cartranco', 'Diego.Cartranco', 'DiegoCartranco', 1, 2),
(22, 'Oscar', 'Zavala', 'Oscar.Zavala', 'OscarZavala', 1, 2),
(23, 'Daniel', 'Garcia', 'Daniel.Garcia', 'DanielGarcia', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`Id_Check`);

--
-- Indices de la tabla `check_audit`
--
ALTER TABLE `check_audit`
  ADD PRIMARY KEY (`Id_Audit`),
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `Id_Team_Leader` (`Id_Team_Leader`),
  ADD KEY `Id_Specialist` (`Id_Specialist`),
  ADD KEY `Id_Relation` (`Id_Relation`);

--
-- Indices de la tabla `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`Id_Component`);

--
-- Indices de la tabla `component_audit`
--
ALTER TABLE `component_audit`
  ADD PRIMARY KEY (`Id_CAudit`),
  ADD KEY `Id_Audit` (`Id_Audit`),
  ADD KEY `Id_Rejection_Type` (`Id_Rejection_Type`),
  ADD KEY `Id_TRCC` (`Id_TRCC`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id_Country`);

--
-- Indices de la tabla `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`Id_Document_Type`);

--
-- Indices de la tabla `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`Id_Privilege`);

--
-- Indices de la tabla `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`Id_Process`);

--
-- Indices de la tabla `rejection_type`
--
ALTER TABLE `rejection_type`
  ADD PRIMARY KEY (`Id_Rejection_Type`);

--
-- Indices de la tabla `service_line`
--
ALTER TABLE `service_line`
  ADD PRIMARY KEY (`Id_SL`);

--
-- Indices de la tabla `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`Id_Specialist`);

--
-- Indices de la tabla `sub_transaction`
--
ALTER TABLE `sub_transaction`
  ADD PRIMARY KEY (`Id_Sub_Transaction`);

--
-- Indices de la tabla `team_leader`
--
ALTER TABLE `team_leader`
  ADD PRIMARY KEY (`Id_Team_Leader`);

--
-- Indices de la tabla `tr`
--
ALTER TABLE `tr`
  ADD PRIMARY KEY (`Id_Relation`),
  ADD KEY `Id_SL` (`Id_SL`),
  ADD KEY `Id_Country` (`Id_Country`),
  ADD KEY `Id_Process` (`Id_Process`),
  ADD KEY `Id_Transaction` (`Id_Transaction`),
  ADD KEY `Id_Sub_Transaction` (`Id_Sub_Transaction`),
  ADD KEY `Id_Document_Type` (`Id_Document_Type`),
  ADD KEY `Id_Check` (`Id_Check`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Id_Transaction`);

--
-- Indices de la tabla `trcc`
--
ALTER TABLE `trcc`
  ADD PRIMARY KEY (`Id_TRCC`),
  ADD KEY `Id_Relation` (`Id_Relation`),
  ADD KEY `Id_Component` (`Id_Component`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `Id_Privilege` (`Id_Privilege`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `checks`
--
ALTER TABLE `checks`
  MODIFY `Id_Check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `check_audit`
--
ALTER TABLE `check_audit`
  MODIFY `Id_Audit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `component`
--
ALTER TABLE `component`
  MODIFY `Id_Component` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT de la tabla `component_audit`
--
ALTER TABLE `component_audit`
  MODIFY `Id_CAudit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `Id_Country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `document_type`
--
ALTER TABLE `document_type`
  MODIFY `Id_Document_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `privilege`
--
ALTER TABLE `privilege`
  MODIFY `Id_Privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `process`
--
ALTER TABLE `process`
  MODIFY `Id_Process` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rejection_type`
--
ALTER TABLE `rejection_type`
  MODIFY `Id_Rejection_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `service_line`
--
ALTER TABLE `service_line`
  MODIFY `Id_SL` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificaador unico de Service Line', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sub_transaction`
--
ALTER TABLE `sub_transaction`
  MODIFY `Id_Sub_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `team_leader`
--
ALTER TABLE `team_leader`
  MODIFY `Id_Team_Leader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tr`
--
ALTER TABLE `tr`
  MODIFY `Id_Relation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `trcc`
--
ALTER TABLE `trcc`
  MODIFY `Id_TRCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `check_audit`
--
ALTER TABLE `check_audit`
  ADD CONSTRAINT `check_audit_specialist_id_specialist` FOREIGN KEY (`Id_Specialist`) REFERENCES `specialist` (`Id_Specialist`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `check_audit_team_leader_id_team_leader` FOREIGN KEY (`Id_Team_Leader`) REFERENCES `team_leader` (`Id_Team_Leader`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `check_audit_tr_id_relation` FOREIGN KEY (`Id_Relation`) REFERENCES `tr` (`Id_Relation`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `check_audit_users_id_user` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `component_audit`
--
ALTER TABLE `component_audit`
  ADD CONSTRAINT `component_audit_check_audit_id_audit` FOREIGN KEY (`Id_Audit`) REFERENCES `check_audit` (`Id_Audit`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `component_audit_ibfk_1` FOREIGN KEY (`Id_TRCC`) REFERENCES `trcc` (`Id_TRCC`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `component_audit_ibfk_2` FOREIGN KEY (`Id_TRCC`) REFERENCES `trcc` (`Id_TRCC`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `component_audit_rejection_type_id_rejection_type` FOREIGN KEY (`Id_Rejection_Type`) REFERENCES `rejection_type` (`Id_Rejection_Type`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tr`
--
ALTER TABLE `tr`
  ADD CONSTRAINT `tr_check_id_check` FOREIGN KEY (`Id_Check`) REFERENCES `checks` (`Id_Check`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_country_id_country` FOREIGN KEY (`Id_Country`) REFERENCES `country` (`Id_Country`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_document_type_id_document_type` FOREIGN KEY (`Id_Document_Type`) REFERENCES `document_type` (`Id_Document_Type`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_process_id_process` FOREIGN KEY (`Id_Process`) REFERENCES `process` (`Id_Process`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_service_line_id_sl` FOREIGN KEY (`Id_SL`) REFERENCES `service_line` (`Id_SL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_sub_transaction_id_sub_transaction` FOREIGN KEY (`Id_Sub_Transaction`) REFERENCES `sub_transaction` (`Id_Sub_Transaction`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_transaction_id_transaction` FOREIGN KEY (`Id_Transaction`) REFERENCES `transaction` (`Id_Transaction`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `trcc`
--
ALTER TABLE `trcc`
  ADD CONSTRAINT `trcc_component_id_component` FOREIGN KEY (`Id_Component`) REFERENCES `component` (`Id_Component`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `trcc_tr_id_relation` FOREIGN KEY (`Id_Relation`) REFERENCES `tr` (`Id_Relation`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_privilege_id_privilege` FOREIGN KEY (`Id_Privilege`) REFERENCES `privilege` (`Id_Privilege`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
