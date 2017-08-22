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


-- Dumping structure for view mybmw.view_tracking
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_tracking` (
	`idtype` INT(11) NULL,
	`nametype` CHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`totalnya` BIGINT(21) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view mybmw.view_tracking
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_tracking`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_tracking` AS SELECT st.`type` as idtype,tt.`type` as nametype,count(*) as totalnya FROM sys_tracking as st left join tbl_tracking as tt on tt.id=st.`type` group by st.`type` ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
