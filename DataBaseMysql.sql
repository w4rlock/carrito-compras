-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2011 at 07:04 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CarritoCompras`
--
CREATE DATABASE `CarritoCompras` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CarritoCompras`;

-- --------------------------------------------------------

--
-- Table structure for table `categ-product`
--

CREATE TABLE IF NOT EXISTS `categ-product` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categ-product`
--

INSERT INTO `categ-product` (`id`, `id_producto`, `id_categoria`) VALUES
(1, 8, 2),
(2, 10, 1),
(3, 4, 3),
(4, 5, 3),
(5, 1, 3),
(6, 6, 6),
(7, 9, 4),
(8, 3, 5),
(9, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `item` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `item`) VALUES
(1, 'Camaras'),
(2, 'Impresoras'),
(3, 'Ipods'),
(4, 'Celulares'),
(5, 'Iphones'),
(6, 'Televisores'),
(7, 'Desktop'),
(8, 'Laptops'),
(9, 'NetBooks');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `domicilio` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `user_UNIQUE` (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idcliente`, `idusuario`, `nombre`, `dni`, `domicilio`, `mail`) VALUES
(9, 32, 'cliente2', '35.434.534', 'sdgfds 345345', 'sdgt@sdfgad.com'),
(8, 31, 'cliente1', '11.111.111', 'dom cli 1', 'cli1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `idcompras` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` varchar(45) NOT NULL,
  `domicilioEntrega` varchar(45) DEFAULT NULL,
  `tipoPago` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idcompras`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`idcompras`, `idcliente`, `domicilioEntrega`, `tipoPago`, `fecha`) VALUES
(22, '31', '<sdfad', 3, '2010-11-25'),
(21, '31', 'domicilio 1', 3, '2010-11-25'),
(20, '31', 'wdfsd', 3, '2010-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `detalleCompra`
--

CREATE TABLE IF NOT EXISTS `detalleCompra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `idCompra` int(11) DEFAULT NULL,
  `precioFinal` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `detalleCompra`
--

INSERT INTO `detalleCompra` (`id`, `idCliente`, `idProducto`, `cantidad`, `precio`, `idCompra`, `precioFinal`) VALUES
(20, 31, 41, 1, 11111, 22, 11111),
(19, 31, 37, 1, 12, 21, 12),
(17, 31, 41, 1, 11111, 20, 11111),
(18, 31, 41, 983, 11111, 21, 10922113),
(21, 31, 41, 982, 11111, 23, 10911002);

-- --------------------------------------------------------

--
-- Table structure for table `internet_shop`
--

CREATE TABLE IF NOT EXISTS `internet_shop` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `img` varchar(90) COLLATE utf8_unicode_ci DEFAULT '',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `id_manufactura` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(6) DEFAULT NULL,
  `description_short` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `promocion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quotas` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `internet_shop`
--

INSERT INTO `internet_shop` (`id`, `img`, `name`, `description`, `price`, `id_manufactura`, `modelo`, `stock`, `description_short`, `promocion`, `quotas`, `state`) VALUES
(1, 'Wallpaper (28).jpg', 'iPod', 'The original and popular iPod.jjjjj null', 200, '1', '21FVD', 21, 'En Stock!! Vyv Movil Mas De 14.000 Calificacion', 'asdf', '6 cuotas de $50.00', 1),
(2, 'boot_grub3.png', 'iMacc', 'The iMac computer. nulll llll ll ll llll lll lllll lll', 1700, '1', '65ASHD', 172, 'Mac Os 10.5.8 Webcam Ati Radeon Hd 2400 A12245. awesome', '7 x 9000', '5 cuotas de $70.00', 0),
(3, 'iphone_4.jpg', 'iPhone', 'This is the new iPhone.', 700, '1', '987DSF', 127, '32 Gb Wifi 3g Video Camara 5.0 Flash Bluetoot', '2 x 759', '3 cuotas de $90.00', 1),
(4, 'iPod-Shuffle.png', 'iPod Shuffle', 'The new iPod shuffle.', 49, '1', '321DSF', 75, 'Apple I Pod Original Garantia Escrita Colores', '2 x 200', '6 cuotas de $120.00', 0),
(5, 'iPod-Nano.png', 'iPod Nano', 'The new iPod Nano.', 99, '1', '357SDF', 150, 'Ultima Generacion 6g - Pantalla Tactil - Gara', 'asdfs', '6 cuotas de $150.00', 1),
(6, 'Apple-TV.png', 'Apple TV', 'The new Apple TV. Buy it now!', 300, '1', '952BFG', 192, 'Excelente Entretenimiento En High Definition', '3 x 6700', '7 cuotas de $50.00', 1),
(9, 'pda_black.png', 'Phone', 'asdfasdfasdfasdfasdf', 1200, '2', '65ASW', 18510, '2 Chips Filma Fotos Peliculas Mp3 Mp4 Interne', 'asdf', '6 cuotas de $60.00', 1),
(8, 'printer2.png', 'Cannon', 'The new Cannon Printer', 2900, '2', '134HJF', 30, 'Imprime Sobre Cd Y Dvd. Con 500cc De Tinta Fo', '5 x 2900', '6 cuotas de $75.00', 0),
(10, 'camera_unmount2.png', 'Camera', 'The new camera', 2800, '2', '210DVE', 180, 'Nvo Modelo Garantía Escrita Hdmi Carl Zeiss P', '5 x 500', '6 cuotas de $55.00', 0),
(35, 'gnu (1).png', 'nuevo1', 'sdfasdfsdfds', 11111, '1', 'MODELO1', 11111, 'wfW', '7 x $9000', '6 cuotas de $50.00', 0),
(36, 'boot_grub3.png', 'nuevo1', 'sdfasdfasdfasdfasd', 11111, '2', 'MODELO1', 11111, 'sdfasdf', '7 x $9000', '6 cuotas de $50.00', 0),
(37, 'gnu (1).png', 'nuevo1', 'sdfasdfasdasdfasdf', 12, '1', 'MODELO1', 11108, 's<dfasdf', '7 x $9000', '6 cuotas de $50.00', 0),
(38, '', 'nuevo1', 'sdfasdfasdfasdf', 11111, '1', 'MODELO1', 987, 'sdfasdf', 'kjh', '6 cuotas de $50.00', 0),
(39, '', 'nuevo1', 'sdfasdfasdfasdf', 11111, '1', 'MODELO1', 987, 'sdfasdf', 'kjh', '6 cuotas de $50.00', 0),
(40, '', 'nuevo2', 'sdfsdfsdf', 11111, '1', 'KJH', 11111, 'sdfa', '7 x $9000', '7 cuotas de $50.00', 0),
(41, 'Image.jpg', 'vazo cervezero', 'grande vazo cervezerooooooo!', 11111, '1', 'MODELO2', 1, 'vaso cervezero', '7 x $9000', '6 cuotas de $50.00', 1),
(42, 'gnu (1).png', 'nuevo 7', 'sdfasdfasdfasdfasfasdf', 2323, '3', '210DV', 33, 'sdfsdfsdfd', '7 x $9000', '6 cuotas de $50.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufactura`
--

CREATE TABLE IF NOT EXISTS `manufactura` (
  `idmanufactura` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmanufactura`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `manufactura`
--

INSERT INTO `manufactura` (`idmanufactura`, `name`) VALUES
(1, 'Apple'),
(2, 'Cannon'),
(3, 'Sony'),
(4, 'Dell'),
(5, 'Otra');

-- --------------------------------------------------------

--
-- Table structure for table `ofertas`
--

CREATE TABLE IF NOT EXISTS `ofertas` (
  `idofertas` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`idofertas`),
  UNIQUE KEY `id_producto_UNIQUE` (`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `ofertas`
--

INSERT INTO `ofertas` (`idofertas`, `id_producto`) VALUES
(113, 37),
(100, -1),
(66, 10),
(109, 41),
(110, 1),
(73, 4),
(107, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id_Pictures` int(11) NOT NULL AUTO_INCREMENT,
  `picture` mediumblob,
  `id_Producto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Pictures`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id_Pictures`, `picture`, `id_Producto`) VALUES
(1, 0x6970686f6e655f332e6a7067, 3),
(2, 0x6970686f6e655f322e6a7067, 3),
(3, 0x6970686f6e655f342e6a7067, 3),
(4, 0x6970686f6e655f352e6a7067, 3),
(5, 0x6970686f6e655f362e6a7067, 3),
(10, 0x6d61635f74765f30312e6a7067, 2),
(9, 0x6d61635f74762e6a7067, 2),
(12, 0x6d61635f74765f30322e6a7067, 2),
(30, 0x496d6167652e6a7067, 41),
(17, 0x676e75202831292e706e67, 14),
(16, 0x496d6167652e6a7067, 6),
(19, 0x676e75202831292e706e67, 16),
(24, 0x313232353739303438355f31303234783736385f33642d77616c6c70617065722d646f776e6c6f61642e6a7067, 37),
(23, 0x3130373730332d312e6a7067, 37),
(26, 0x676e75202831292e706e67, 37),
(29, 0x676e75202831292e706e67, 41),
(31, 0x57616c6c706170657220283238292e6a7067, 1),
(32, 0x706574726157616c6c2e6a7067, 1),
(33, 0x676e75202831292e706e67, 42),
(34, 0x626f6f745f67727562332e706e67, 2);

-- --------------------------------------------------------

--
-- Table structure for table `root_menu`
--

CREATE TABLE IF NOT EXISTS `root_menu` (
  `id` int(11) NOT NULL,
  `item` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `root_menu`
--

INSERT INTO `root_menu` (`id`, `item`) VALUES
(1, 'Categorias'),
(2, 'Ofertas'),
(3, 'Productos'),
(4, 'Usuarios');

-- --------------------------------------------------------

--
-- Table structure for table `tipoPago`
--

CREATE TABLE IF NOT EXISTS `tipoPago` (
  `idtipoPago` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipoPago`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipoPago`
--

INSERT INTO `tipoPago` (`idtipoPago`, `descripcion`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de Credito'),
(3, 'Deposito Bancario');

-- --------------------------------------------------------

--
-- Table structure for table `userType`
--

CREATE TABLE IF NOT EXISTS `userType` (
  `iduserType` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iduserType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userType`
--

INSERT INTO `userType` (`iduserType`, `tipo`) VALUES
(0, 'root'),
(1, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(75) NOT NULL,
  `fecha` date NOT NULL,
  `userType` int(11) NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `fecha`, `userType`) VALUES
(30, 'w4rlock', 'fcea920f7412b5da7be0cf42b8c93759', '2010-11-11', 0),
(31, 'cliente1', 'e10adc3949ba59abbe56e057f20f883e', '2010-11-13', 1),
(32, 'cliente2', 'e10adc3949ba59abbe56e057f20f883e', '2010-11-23', 1);
