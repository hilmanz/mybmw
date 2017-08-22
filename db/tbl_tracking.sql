-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mybmw
CREATE DATABASE IF NOT EXISTS `mybmw` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mybmw`;


-- Dumping structure for table mybmw.sys_tracking
CREATE TABLE IF NOT EXISTS `sys_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mybmw.sys_tracking: ~0 rows (approximately)
/*!40000 ALTER TABLE `sys_tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_tracking` ENABLE KEYS */;


-- Dumping structure for table mybmw.tbl_tracking
CREATE TABLE IF NOT EXISTS `tbl_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(50) DEFAULT NULL,
  `count` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mybmw.tbl_tracking: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_tracking` DISABLE KEYS */;
INSERT INTO `tbl_tracking` (`id`, `type`, `count`) VALUES
	(1, 'Test Drive', NULL);
/*!40000 ALTER TABLE `tbl_tracking` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
