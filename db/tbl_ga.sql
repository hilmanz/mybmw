/*
SQLyog Community v10.4 Beta2
MySQL - 5.0.67 : Database - marlboro_inorout_reports
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`marlboro_inorout_reports` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `marlboro_inorout_reports`;

/*Table structure for table `ga_daily_data` */

DROP TABLE IF EXISTS `ga_daily_data`;

CREATE TABLE `ga_daily_data` (
  `page_views` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `visitDuration` int(11) NOT NULL,
  `time_onPage` int(11) NOT NULL,
  `bounce_rate` int(11) NOT NULL,
  `unique_visitor` int(11) NOT NULL,
  `time_onSite` int(11) NOT NULL,
  `date_d` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ga_daily_data` */

/*Table structure for table `ga_daily_device_all_data` */

DROP TABLE IF EXISTS `ga_daily_device_all_data`;

CREATE TABLE `ga_daily_device_all_data` (
  `visits` int(11) NOT NULL,
  `device` varchar(100) NOT NULL,
  `date_d` date NOT NULL,
  UNIQUE KEY `device` (`device`,`date_d`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ga_daily_device_all_data` */

/*Table structure for table `ga_daily_device_data` */

DROP TABLE IF EXISTS `ga_daily_device_data`;

CREATE TABLE `ga_daily_device_data` (
  `visits` int(11) NOT NULL,
  `device` varchar(100) NOT NULL,
  `date_d` date NOT NULL,
  UNIQUE KEY `device` (`device`,`date_d`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ga_daily_device_data` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
