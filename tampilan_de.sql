-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 08:21 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tampilan_de`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_record`
--

CREATE TABLE IF NOT EXISTS `admin_record` (
  `id_admin_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_phone` varchar(30) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_position` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_permission` varchar(150) NOT NULL,
  `admin_createdate` datetime NOT NULL,
  `admin_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish',
  PRIMARY KEY (`id_admin_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin_record`
--

INSERT INTO `admin_record` (`id_admin_record`, `admin_fullname`, `admin_phone`, `admin_address`, `admin_position`, `admin_email`, `admin_password`, `admin_permission`, `admin_createdate`, `admin_status`) VALUES
(1, 'Admin Diptalogistics', '0821111111111', 'Lorem ipsum dolor sit amet', 'Staff', 'admin@diptalogistics.com', '8b263822d98fc16b00bf2e5ce15d13a27fb7334f', 'Super Administrator', '2016-10-30 07:45:17', 'Publish'),
(9, 'Administrator', '', '', '', 'admin@test.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Super Administrator', '0000-00-00 00:00:00', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `broker_record`
--

CREATE TABLE IF NOT EXISTS `broker_record` (
  `id_broker_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `broker_title` varchar(150) NOT NULL,
  `broker_code` varchar(2) NOT NULL,
  `broker_fee1` decimal(10,5) NOT NULL COMMENT 'Fee Net Buy',
  `broker_fee2` decimal(10,5) NOT NULL COMMENT 'Fee Net Sell',
  `broker_header` varchar(150) NOT NULL,
  `broker_createdate` datetime NOT NULL,
  `broker_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish',
  PRIMARY KEY (`id_broker_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `broker_record`
--

INSERT INTO `broker_record` (`id_broker_record`, `broker_title`, `broker_code`, `broker_fee1`, `broker_fee2`, `broker_header`, `broker_createdate`, `broker_status`) VALUES
(1, 'Broker 1', 'BR', '0.15000', '0.25000', '', '2017-05-30 07:44:57', 'Publish'),
(2, 'Broker 2', 'BE', '0.15000', '0.25000', '1293025-Banner.jpg', '2017-05-30 08:46:05', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `category_record`
--

CREATE TABLE IF NOT EXISTS `category_record` (
  `id_category_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_title` varchar(150) NOT NULL,
  `category_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish',
  PRIMARY KEY (`id_category_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category_record`
--

INSERT INTO `category_record` (`id_category_record`, `category_title`, `category_status`) VALUES
(1, 'InHouse', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `client_record`
--

CREATE TABLE IF NOT EXISTS `client_record` (
  `id_client_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `broker_id` int(11) unsigned NOT NULL,
  `client_title` varchar(150) NOT NULL,
  `client_address` text NOT NULL,
  `client_phone` varchar(50) NOT NULL,
  `client_email` varchar(150) NOT NULL,
  `client_rekrdi` varchar(150) NOT NULL COMMENT 'Rekening Net Buy',
  `client_rekspv` varchar(150) NOT NULL COMMENT 'Rekening Net Sell',
  `client_feebuy` decimal(10,5) NOT NULL,
  `client_feesell` decimal(10,5) NOT NULL,
  `client_emailoperation` varchar(150) NOT NULL,
  `client_salesperson` varchar(150) NOT NULL,
  `client_note` text NOT NULL,
  `client_createdate` datetime NOT NULL,
  `client_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish',
  PRIMARY KEY (`id_client_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `client_record`
--

INSERT INTO `client_record` (`id_client_record`, `category_id`, `broker_id`, `client_title`, `client_address`, `client_phone`, `client_email`, `client_rekrdi`, `client_rekspv`, `client_feebuy`, `client_feesell`, `client_emailoperation`, `client_salesperson`, `client_note`, `client_createdate`, `client_status`) VALUES
(1, 1, 1, 'Nama Client', 'Lorem ipsum', '08', 'admin@testingemail.com', '789789789789', '2345678989123', '0.12500', '0.22500', '', '', '', '2017-05-30 07:45:46', 'Publish'),
(2, 1, 2, 'Wiguna Pratama', 'Graha Arradea Blok C5 No. 16 Jl. Setu Kaum Ciherang Dramaga Bogor 16680', '08568096097', 'wigunapratama87@gmail.com', '23232323', '56565656', '0.00000', '0.00000', '', '', '', '2017-05-30 08:47:20', 'Publish'),
(3, 1, 2, 'tt', 'kok', '8568096097', 'vtx@gmail.com', '0987', '0986', '0.00000', '0.00000', '', '', '', '2017-07-06 03:21:20', 'Publish'),
(4, 1, 1, 'lippo', '1', '1', '1@tt.com', '1', '1', '0.12500', '0.22500', '', '', '', '2017-07-06 09:18:57', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `contactLastName` varchar(50) NOT NULL,
  `contactFirstName` varchar(50) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postalCode` varchar(15) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `salesRepEmployeeNumber` int(11) DEFAULT NULL,
  `creditLimit` double DEFAULT NULL,
  PRIMARY KEY (`customerNumber`),
  KEY `salesRepEmployeeNumber` (`salesRepEmployeeNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerNumber`, `customerName`, `contactLastName`, `contactFirstName`, `addressLine1`, `addressLine2`, `city`, `state`, `postalCode`, `country`, `salesRepEmployeeNumber`, `creditLimit`) VALUES
(103, 'Atelier graphique', 'Schmitt', 'Carine ', '54, rue Royale', NULL, 'Nantes', NULL, '44000', 'France', 1370, 21000),
(112, 'Signal Gift Stores', 'King', 'Jean', '8489 Strong St.', NULL, 'Las Vegas', 'NV', '83030', 'USA', 1166, 71800),
(114, 'Australian Collectors, Co.', 'Ferguson', 'Peter', '636 St Kilda Road', 'Level 3', 'Melbourne', 'Victoria', '3004', 'Australia', 1611, 117300),
(119, 'La Rochelle Gifts', 'Labrune', 'Janine ', '67, rue des Cinquante Otages', NULL, 'Nantes', NULL, '44000', 'France', 1370, 118200),
(121, 'Baane Mini Imports', 'Bergulfsen', 'Jonas ', 'Erling Skakkes gate 78', NULL, 'Stavern', NULL, '4110', 'Norway', 1504, 81700),
(124, 'Mini Gifts Distributors Ltd.', 'Nelson', 'Susan', '5677 Strong St.', NULL, 'San Rafael', 'CA', '97562', 'USA', 1165, 210500),
(125, 'Havel & Zbyszek Co', 'Piestrzeniewicz', 'Zbyszek ', 'ul. Filtrowa 68', NULL, 'Warszawa', NULL, '01-012', 'Poland', NULL, 0),
(128, 'Blauer See Auto, Co.', 'Keitel', 'Roland', 'Lyonerstr. 34', NULL, 'Frankfurt', NULL, '60528', 'Germany', 1504, 59700),
(129, 'Mini Wheels Co.', 'Murphy', 'Julie', '5557 North Pendale Street', NULL, 'San Francisco', 'CA', '94217', 'USA', 1165, 64600),
(131, 'Land of Toys Inc.', 'Lee', 'Kwai', '897 Long Airport Avenue', NULL, 'NYC', 'NY', '10022', 'USA', 1323, 114900),
(141, 'Euro+ Shopping Channel', 'Freyre', 'Diego ', 'C/ Moralzarzal, 86', NULL, 'Madrid', NULL, '28034', 'Spain', 1370, 227600),
(146, 'Saveley & Henriot, Co.', 'Saveley', 'Mary ', '2, rue du Commerce', NULL, 'Lyon', NULL, '69004', 'France', 1337, 123900),
(148, 'Dragon Souveniers, Ltd.', 'Natividad', 'Eric', 'Bronz Sok.', 'Bronz Apt. 3/6 Tesvikiye', 'Singapore', NULL, '079903', 'Singapore', 1621, 103800),
(151, 'Muscle Machine Inc', 'Young', 'Jeff', '4092 Furth Circle', 'Suite 400', 'NYC', 'NY', '10022', 'USA', 1286, 138500),
(157, 'Diecast Classics Inc.', 'Leong', 'Kelvin', '7586 Pompton St.', NULL, 'Allentown', 'PA', '70267', 'USA', 1216, 100600),
(161, 'Technics Stores Inc.', 'Hashimoto', 'Juri', '9408 Furth Circle', NULL, 'Burlingame', 'CA', '94217', 'USA', 1165, 84600),
(166, 'Handji Gifts& Co', 'Victorino', 'Wendy', '106 Linden Road Sandown', '2nd Floor', 'Singapore', NULL, '069045', 'Singapore', 1612, 97900),
(167, 'Herkku Gifts', 'Oeztan', 'Veysel', 'Brehmen St. 121', 'PR 334 Sentrum', 'Bergen', NULL, 'N 5804', 'Norway  ', 1504, 96800),
(168, 'American Souvenirs Inc', 'Franco', 'Keith', '149 Spinnaker Dr.', 'Suite 101', 'New Haven', 'CT', '97823', 'USA', 1286, 0),
(173, 'Cambridge Collectables Co.', 'Tseng', 'Jerry', '4658 Baden Av.', NULL, 'Cambridge', 'MA', '51247', 'USA', 1188, 43400),
(175, 'Gift Depot Inc.', 'King', 'Julie', '25593 South Bay Ln.', NULL, 'Bridgewater', 'CT', '97562', 'USA', 1323, 84300),
(177, 'Osaka Souveniers Co.', 'Kentary', 'Mory', '1-6-20 Dojima', NULL, 'Kita-ku', 'Osaka', ' 530-0003', 'Japan', 1621, 81200),
(181, 'Vitachrome Inc.', 'Frick', 'Michael', '2678 Kingston Rd.', 'Suite 101', 'NYC', 'NY', '10022', 'USA', 1286, 76400),
(186, 'Toys of Finland, Co.', 'Karttunen', 'Matti', 'Keskuskatu 45', NULL, 'Helsinki', NULL, '21240', 'Finland', 1501, 96500),
(187, 'AV Stores, Co.', 'Ashworth', 'Rachel', 'Fauntleroy Circus', NULL, 'Manchester', NULL, 'EC2 5NT', 'UK', 1501, 136800),
(189, 'Clover Collections, Co.', 'Cassidy', 'Dean', '25 Maiden Lane', 'Floor No. 4', 'Dublin', NULL, '2', 'Ireland', 1504, 69400),
(198, 'Auto-Moto Classics Inc.', 'Taylor', 'Leslie', '16780 Pompton St.', NULL, 'Brickhaven', 'MA', '58339', 'USA', 1216, 23000),
(201, 'UK Collectables, Ltd.', 'Devon', 'Elizabeth', '12, Berkeley Gardens Blvd', NULL, 'Liverpool', NULL, 'WX1 6LT', 'UK', 1501, 92700),
(202, 'Canadian Gift Exchange Network', 'Tamuri', 'Yoshi ', '1900 Oak St.', NULL, 'Vancouver', 'BC', 'V3F 2K1', 'Canada', 1323, 90300),
(204, 'Online Mini Collectables', 'Barajas', 'Miguel', '7635 Spinnaker Dr.', NULL, 'Brickhaven', 'MA', '58339', 'USA', 1188, 68700),
(205, 'Toys4GrownUps.com', 'Young', 'Julie', '78934 Hillside Dr.', NULL, 'Pasadena', 'CA', '90003', 'USA', 1166, 90700),
(206, 'Asian Shopping Network, Co', 'Walker', 'Brydey', 'Suntec Tower Three', '8 Temasek', 'Singapore', NULL, '038988', 'Singapore', NULL, 0),
(211, 'King Kong Collectables, Co.', 'Gao', 'Mike', 'Bank of China Tower', '1 Garden Road', 'Central Hong Kong', NULL, NULL, 'Hong Kong', 1621, 58600),
(219, 'Boards & Toys Co.', 'Young', 'Mary', '4097 Douglas Av.', NULL, 'Glendale', 'CA', '92561', 'USA', 1166, 11000),
(239, 'Collectable Mini Designs Co.', 'Thompson', 'Valarie', '361 Furth Circle', NULL, 'San Diego', 'CA', '91217', 'USA', 1166, 105000),
(240, 'giftsbymail.co.uk', 'Bennett', 'Helen ', 'Garden House', 'Crowther Way 23', 'Cowes', 'Isle of Wight', 'PO31 7PJ', 'UK', 1501, 93900),
(242, 'Alpha Cognac', 'Roulet', 'Annette ', '1 rue Alsace-Lorraine', NULL, 'Toulouse', NULL, '31000', 'France', 1370, 61100),
(247, 'Messner Shopping Network', 'Messner', 'Renate ', 'Magazinweg 7', NULL, 'Frankfurt', NULL, '60528', 'Germany', NULL, 0),
(249, 'Amica Models & Co.', 'Accorti', 'Paolo ', 'Via Monte Bianco 34', NULL, 'Torino', NULL, '10100', 'Italy', 1401, 113000),
(250, 'Lyon Souveniers', 'Da Silva', 'Daniel', '27 rue du Colonel Pierre Avia', NULL, 'Paris', NULL, '75508', 'France', 1337, 68100);

-- --------------------------------------------------------

--
-- Table structure for table `orderdet_record`
--

CREATE TABLE IF NOT EXISTS `orderdet_record` (
  `id_orderdet_record` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `saham_id` int(11) unsigned NOT NULL,
  `orderdet_price` decimal(20,0) NOT NULL,
  `orderdet_lot` int(5) NOT NULL,
  `orderdet_countlot` int(5) NOT NULL,
  `orderdet_count` decimal(20,0) NOT NULL,
  `orderdet_type` enum('Buy','Sell') NOT NULL DEFAULT 'Buy',
  `orderdet_feebrokerbuy` decimal(10,5) NOT NULL,
  `orderdet_feebrokersell` decimal(10,5) NOT NULL,
  `orderdet_feeclientbuy` decimal(10,5) NOT NULL,
  `orderdet_feeclientsell` decimal(10,5) NOT NULL,
  `orderdet_createdate` datetime NOT NULL,
  `orderdet_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish',
  PRIMARY KEY (`id_orderdet_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orderdet_record`
--

INSERT INTO `orderdet_record` (`id_orderdet_record`, `order_id`, `saham_id`, `orderdet_price`, `orderdet_lot`, `orderdet_countlot`, `orderdet_count`, `orderdet_type`, `orderdet_feebrokerbuy`, `orderdet_feebrokersell`, `orderdet_feeclientbuy`, `orderdet_feeclientsell`, `orderdet_createdate`, `orderdet_status`) VALUES
(1, 1, 1, '1177225', 10, 1000, '1177225000', 'Buy', '0.00000', '0.00000', '0.00000', '0.00000', '2017-07-06 09:52:42', 'Publish'),
(2, 1, 1, '1188075', 10, 1000, '1188075000', 'Sell', '0.00000', '0.00000', '0.00000', '0.00000', '2017-07-06 09:52:42', 'Publish'),
(3, 2, 8, '18350', 10, 1000, '18350000', 'Buy', '0.00000', '0.00000', '0.00000', '0.00000', '2017-07-07 09:47:18', 'Publish'),
(4, 2, 4, '4900', 100, 10000, '49000000', 'Buy', '0.00000', '0.00000', '0.00000', '0.00000', '2017-07-07 09:47:18', 'Publish'),
(5, 2, 6, '398', 1000, 100000, '39800000', 'Sell', '0.00000', '0.00000', '0.00000', '0.00000', '2017-07-07 09:47:18', 'Publish'),
(6, 2, 7, '4660', 50, 5000, '23300000', 'Sell', '0.00000', '0.00000', '0.00000', '0.00000', '2017-07-07 09:47:18', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `order_record`
--

CREATE TABLE IF NOT EXISTS `order_record` (
  `id_order_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) unsigned NOT NULL,
  `order_feebrokerbuy` decimal(10,5) NOT NULL,
  `order_feebrokersell` decimal(10,5) NOT NULL,
  `order_feeclientbuy` decimal(10,5) NOT NULL,
  `order_feeclientsell` decimal(10,5) NOT NULL,
  `order_createdate` datetime NOT NULL,
  `order_processdate` datetime NOT NULL,
  `order_donedate` datetime NOT NULL,
  `order_createby` int(11) unsigned NOT NULL,
  `order_updateby` int(11) unsigned NOT NULL,
  `order_updatedate` datetime NOT NULL,
  `order_status` enum('New Order','Correctiion','Done') NOT NULL DEFAULT 'New Order',
  PRIMARY KEY (`id_order_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_record`
--

INSERT INTO `order_record` (`id_order_record`, `client_id`, `order_feebrokerbuy`, `order_feebrokersell`, `order_feeclientbuy`, `order_feeclientsell`, `order_createdate`, `order_processdate`, `order_donedate`, `order_createby`, `order_updateby`, `order_updatedate`, `order_status`) VALUES
(1, 4, '0.15000', '0.25000', '0.12500', '0.22500', '2017-07-06 09:50:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, '0000-00-00 00:00:00', 'New Order'),
(2, 4, '0.15000', '0.25000', '0.12500', '0.22500', '2017-07-07 09:43:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, '0000-00-00 00:00:00', 'New Order');

-- --------------------------------------------------------

--
-- Table structure for table `saham_record`
--

CREATE TABLE IF NOT EXISTS `saham_record` (
  `id_saham_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `saham_title` varchar(150) NOT NULL,
  `saham_code` varchar(4) NOT NULL,
  `saham_createdate` datetime NOT NULL,
  `saham_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Unpublish',
  PRIMARY KEY (`id_saham_record`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `saham_record`
--

INSERT INTO `saham_record` (`id_saham_record`, `saham_title`, `saham_code`, `saham_createdate`, `saham_status`) VALUES
(1, 'PT. Bumi Serpong Damai Tbk', 'BSDE', '2017-06-09 04:55:36', 'Publish'),
(2, 'Astra Agro Lestari Tbk', 'AALI', '2017-06-09 05:06:37', 'Publish'),
(3, 'Mahaka Media Tbk', 'ABBA', '2017-06-09 05:06:51', 'Publish'),
(4, 'Bank Danamon Indonesia Tbk', 'BDMN', '2017-06-09 05:07:14', 'Publish'),
(5, 'Bumi Resources Tbk', 'BUMI', '2017-06-09 05:07:29', 'Publish'),
(6, 'Sidomulyo Selaras Tbk', 'SDMU', '2017-06-09 05:07:47', 'Publish'),
(7, 'Telekomunikasi Indonesia (Persero) Tbk', 'TLKM', '2017-06-09 05:09:44', 'Publish'),
(8, 'Bank Central Asia Tbk', 'BBCA', '2017-06-09 05:09:56', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `setting_record`
--

CREATE TABLE IF NOT EXISTS `setting_record` (
  `id_setting_record` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `setting_title` varchar(150) NOT NULL,
  `setting_sendemail` varchar(150) NOT NULL,
  `setting_lot` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_setting_record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
