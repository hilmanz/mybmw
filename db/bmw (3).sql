/*
SQLyog Community v10.4 Beta2
MySQL - 5.5.27 : Database - bmw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bmw` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bmw`;

/*Table structure for table `custom_newsletter` */

DROP TABLE IF EXISTS `custom_newsletter`;

CREATE TABLE `custom_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `custom_newsletter` */

insert  into `custom_newsletter`(`id`,`email`,`status`) values (1,'werew@yahoo.co.id',1),(2,'werew@yahoo.co.id',1),(3,'dfgdf@yahoo.co.id',1),(4,'dfgdfgdf@yahoo.co.id',1),(5,'fdfds@yahoo.co.id',1);

/*Table structure for table `custom_registration` */

DROP TABLE IF EXISTS `custom_registration`;

CREATE TABLE `custom_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `newsletter` int(1) NOT NULL,
  `data_privacy` int(1) NOT NULL,
  `salutation` varchar(4) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `custom_registration` */

/*Table structure for table `destination` */

DROP TABLE IF EXISTS `destination`;

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `bg_pic` varchar(255) NOT NULL,
  `pg1_content` text NOT NULL,
  `pg1_bg_pic` varchar(255) NOT NULL,
  `pg1_option` int(1) NOT NULL COMMENT '1=subcribe,2=share,3=reg',
  `pg2_content` text NOT NULL,
  `pg2_bg_pic` varchar(255) NOT NULL,
  `pg2_option` int(1) NOT NULL,
  `pg3_content` text NOT NULL,
  `pg3_bg_pic` varchar(255) NOT NULL,
  `pg3_option` int(1) NOT NULL,
  `gallery` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `destination` */

insert  into `destination`(`id`,`title`,`desc`,`bg_pic`,`pg1_content`,`pg1_bg_pic`,`pg1_option`,`pg2_content`,`pg2_bg_pic`,`pg2_option`,`pg3_content`,`pg3_bg_pic`,`pg3_option`,`gallery`) values (1,'An Unexpectedly<br />Joyful Journey.','<p>Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the wheel of BMW X5.</p>','','<p>Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the wheel of BMW X5.</p>','',0,'<p>The journey began in the Namibian capital of Windhoek, at the beautiful lodges surrounded by bush and open spaces. Before setting off across the X-routes, all participants were introduced to the BMW team. So, they\'ll be ready for the first exhilarating drive to the Otjihavera Mountains as the first route. </p>\r\n\r\n<p>Yennas has never driven a left-hand-drive car before, but he could easily adapts to the BMW X5 Active Steering which gave him greater stability and comfort to stay in full control of any situation. The first route was quite challenging. He traversed into the canyons and driving through grass and shrub savannah. Even grass and shrub might have a high probability of damaging the exterior, but he found that the high quality of BMW X5 paints had miraculously kept the scratch away. </p>','',0,' <p>The other route was even more exciting. He had to travel through dried river beds into the Erongo Mountains over the sand, rubble and rocks for an exotic surprise dinner at the top of the rocky hill. It was definitely one of the most unexpected and very memorable moments from this journey.</p>\r\n<p>After the joyful under the starry-skied dinner, Yennas couldn\'t hide his amazement when he visited the Sandwich Harbor on the next day. It\'s a towering giant sand dunes that run straight into the ocean, yes, the famous Namibian Sand Sea.</p>\r\n<p>He activated the Hill Descent Control (HDC) right before he slid down the famous sand dunes with BMW X5. The HDC is a smart system that holds the vehicle at a pre-determined speed and helps its brake control so the driver can fully concentrate on the steering wheel. </p>','',0,0);

/*Table structure for table `destination_gallery` */

DROP TABLE IF EXISTS `destination_gallery`;

CREATE TABLE `destination_gallery` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `sys_files_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `destination_gallery` */

/*Table structure for table `sys_content` */

DROP TABLE IF EXISTS `sys_content`;

CREATE TABLE `sys_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `teaser` text NOT NULL,
  `publish` int(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_content` */

/*Table structure for table `sys_content_type` */

DROP TABLE IF EXISTS `sys_content_type`;

CREATE TABLE `sys_content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `sys_content_type` */

insert  into `sys_content_type`(`id`,`name`,`machine_name`,`status`) values (2,'Genius','genius',1),(3,'Experience','experience',1),(4,'Vehicle','vehicle',1),(5,'Destination','destination',1),(6,'Newsletter','newsletter',1);

/*Table structure for table `sys_contents_files` */

DROP TABLE IF EXISTS `sys_contents_files`;

CREATE TABLE `sys_contents_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `files_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_contents_files` */

/*Table structure for table `sys_files` */

DROP TABLE IF EXISTS `sys_files`;

CREATE TABLE `sys_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `local_path` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_files` */

/*Table structure for table `sys_privileges` */

DROP TABLE IF EXISTS `sys_privileges`;

CREATE TABLE `sys_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `content_type_id` int(1) NOT NULL,
  `create` int(1) NOT NULL DEFAULT '0',
  `update` int(1) NOT NULL DEFAULT '0',
  `delete` int(1) NOT NULL DEFAULT '0',
  `view` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_privileges` */

/*Table structure for table `sys_role` */

DROP TABLE IF EXISTS `sys_role`;

CREATE TABLE `sys_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sys_role` */

insert  into `sys_role`(`id`,`name`,`machine_name`) values (1,'Administrator','administrator');

/*Table structure for table `sys_users` */

DROP TABLE IF EXISTS `sys_users`;

CREATE TABLE `sys_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sys_users` */

insert  into `sys_users`(`id`,`first_name`,`last_name`,`username`,`email`,`password`,`status`,`created_date`,`role_id`) values (1,'Admin','Admin','admin','admin@anywhere.com','qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=',1,'2015-02-12 14:56:19',1),(2,'pertama','terakhir','pengguna','surat','TcFC4ZtC9F7t2QBavXKxkq0oFy9cOua1brDp5xIiFVk=',1,'2015-02-12 17:31:04',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
