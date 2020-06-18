-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 06:15 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Anuj Kumar', 'phpgurukulofficial@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-07-16 18:11:42');

-- --------------------------------------------------------





--
-- Table structure for table `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `id` int(11) NOT NULL,
  `ManageId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`id`, `ManageId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'Anuj kumar', 'anuj.lpu1@gmail.com', '9865472555', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-11 15:37:05', '2017-07-15 18:26:21'),
(4, 'SID005', 'sdfsd', 'csfsd@dfsfks.com', '8569710025', '92228410fc8b872914e023160cf4ae8f', 0, '2017-07-11 15:41:27', '2017-07-15 17:43:03'),
(8, 'SID009', 'test', 'test@gmail.com', '2359874527', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(9, 'SID010', 'Amit', 'amit@gmail.com', '8585856224', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 13:40:30', NULL),
(10, 'SID011', 'Sarita Pandey', 'sarita@gmail.com', '4672423754', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 18:00:59', NULL);


--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `ManageId` varchar(100) DEFAULT NULL,
  `Lrno` varchar(120) DEFAULT NULL,
  `Date1` varchar(120) DEFAULT NULL,
  `Mob1` char(11) DEFAULT NULL,
  `pan` VARchar(11) DEFAULT NULL,
  `Cin` varchar(120) DEFAULT NULL,
  `Vehicle` varchar(120) DEFAULT NULL,
  `Consignor` varchar(120) DEFAULT NULL,
  `Mob2` varchar(11) DEFAULT NULL,
  `From1` varchar(120) DEFAULT NULL,
  `To1` varchar(120) DEFAULT NULL,
  `Consignee` varchar(120) DEFAULT NULL,
  `Mob3` varchar(120) DEFAULT NULL,
  `Perkg` varchar(120) DEFAULT NULL,
  `Noarticle` varchar(120) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  `Value` varchar(120) DEFAULT NULL,
   `Actualkg` varchar(120) DEFAULT NULL,
  `Freight` varchar(120) DEFAULT NULL,
  `Inno` varchar(120) DEFAULT NULL,
  `Pmark` varchar(120) DEFAULT NULL,
  `Chargekg` varchar(120) DEFAULT NULL,
   `Total1` varchar(120) DEFAULT NULL,
  `Total2` varchar(120) DEFAULT NULL,
  `Eway` varchar(120) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `ManageId`, `Lrno`, `Date1`, `Mob1`,`pan`,`Cin`,`Vehicle`,`Consignor`,`From1`,`To1`,`Consignee`,`Mob3`,`Perkg`,`Noarticle`,`Description`,`Value`,`Actualkg`,`Freight`,`Inno`,`Pmark`,`Chargekg`,`Total1`,`Total2`,`Eway`,`Remark`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'LRNO002', '1', '21/06/2019', '9555220970', 'KJUIL98790','VGHY6765TG','BRO8906','New Delhi' ,'Delhi','bihar','Muzaffarpur bihar','9878765654','23','1','Box Pokect','45','98','gfgth','SFRE45','any','56','678','98','ASD34','any thing', 1, '2017-07-11 15:37:05', '2017-07-15 18:26:21');




--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL,
  `ManageId` varchar(100) DEFAULT NULL,
  `Lrno` varchar(11) DEFAULT NULL,
  `Date1` varchar(120) DEFAULT NULL,
  `Mob1` varchar(11) DEFAULT NULL,
  `pan` VARchar(11) DEFAULT NULL,
  `Cin` varchar(120) DEFAULT NULL,
  `Vehicle` varchar(120) DEFAULT NULL,
  `Consignor` varchar(120) DEFAULT NULL,
  `Mob2` varchar(11) DEFAULT NULL,
  `From1` varchar(120) DEFAULT NULL,
  `To1` varchar(120) DEFAULT NULL,
  `Consignee` varchar(120) DEFAULT NULL,
  `Mob3` varchar(120) DEFAULT NULL,
  `Perkg` varchar(120) DEFAULT NULL,
  `Noarticle` varchar(120) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  `Value` varchar(120) DEFAULT NULL,
  `Actualkg` varchar(120) DEFAULT NULL,
  `Freight` varchar(120) DEFAULT NULL,
  `Inno` varchar(120) DEFAULT NULL,
  `Pmark` varchar(120) DEFAULT NULL,
  `Chargekg` varchar(120) DEFAULT NULL,
  `Total1` varchar(120) DEFAULT NULL,
  `Total2` varchar(120) DEFAULT NULL,
  `Eway` varchar(120) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `ManageId`, `Lrno`, `Date1`, `Mob1`, `pan`, `Cin`,`Vehicle`,`Consignor`, `Mob2`,`From1`,`To1`,`Consignee`,`Mob3`,`Perkg`,`Noarticle`,`Description`,`Value`,`Actualkg`,`Freight`,`Inno`,`Pmark`,`Chargekg`,`Total1`,`Total2`,`Eway`,`Remark`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'LRNO002', '1', '21/06/2019', '9555220970', 'KJUIL98790','VGHY6765TG','BRO8906','New Delhi','8787656543' ,'Delhi','bihar','Muzaffarpur bihar','9878765654','23','1','Box Pokect','45','98','gfgth','SFRE45','any','56','678','98','ASD34','any thing',1, '2017-07-11 15:37:05', '2017-07-15 18:26:21');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `Manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ManageId` (`ManageId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ManageId` (`ManageId`);
  --
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ManageId` (`ManageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;  
--
-- AUTO_INCREMENT for table `ManageId`
--
ALTER TABLE `manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
