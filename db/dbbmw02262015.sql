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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `custom_newsletter` */

insert  into `custom_newsletter`(`id`,`email`,`status`) values (1,'werew@yahoo.co.id',1),(2,'werew@yahoo.co.id',1),(3,'dfgdf@yahoo.co.id',1),(4,'dfgdfgdf@yahoo.co.id',1),(5,'fdfds@yahoo.co.id',1),(6,'fhfghghg@ytf.com',1),(7,'tyutuytuyiuy@rew.com',1),(8,'sdfsdfs@yh.com',1),(9,'dfsfs@yh.com',1),(10,'dfgdgdfg1@yh.com',1),(11,'iiiiiii@yah.com',1),(12,'isngadi@gmail',1),(13,'isngadi@gmail',1),(14,'isngadi@gmail',1),(15,'isngadi@gmail',1),(16,'isngadi@gmail.com',1),(17,'wahyu@kana',1);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) DEFAULT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `bg_pic` varchar(255) DEFAULT NULL,
  `gallery` int(1) NOT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `destination` */

insert  into `destination`(`id`,`module`,`menu`,`title`,`desc`,`bg_pic`,`gallery`,`date`,`n_status`) values (1,NULL,NULL,'An Unexpectedly<br />Joyful Journey.','<p>Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the wheel of BMW X5.</p>','',0,NULL,NULL),(18,'dfdgfdg','dfgfdgdf','','',NULL,1,'2015-02-26 01:56:27',2),(19,'destination','Nimibia','','',NULL,0,'2015-02-26 18:22:35',1),(20,'destination','nim','','',NULL,0,'2015-02-26 18:31:17',1),(21,'fdsfds','fdsfsd','','',NULL,0,'2015-02-26 18:32:57',1),(22,'dsfdsf','dsfds','','',NULL,0,'2015-02-26 18:47:21',1);

/*Table structure for table `destination_gallery` */

DROP TABLE IF EXISTS `destination_gallery`;

CREATE TABLE `destination_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` int(11) NOT NULL,
  `sys_files_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `destination_gallery` */

insert  into `destination_gallery`(`id`,`destination_id`,`sys_files_id`) values (30,18,50),(31,18,51);

/*Table structure for table `destination_page` */

DROP TABLE IF EXISTS `destination_page`;

CREATE TABLE `destination_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `destionation_id` int(10) DEFAULT NULL,
  `content` varchar(256) DEFAULT NULL,
  `baground` varchar(256) DEFAULT NULL,
  `potition` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `n_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `destination_page` */

insert  into `destination_page`(`id`,`destionation_id`,`content`,`baground`,`potition`,`date`,`n_status`) values (35,18,'dfgfdgdfg','c26f137e1a1719550c6581ef3760b78a.jpg','center','2015-02-26 01:56:27',2),(36,18,'34343gfdg','b03e4228d2fef309a202101fb9d663bd.jpg','right','2015-02-26 01:56:28',2),(37,19,'&nbsp;&lt;h2&gt;An Unexpectedly &lt;br /&gt;Joyful Journey &lt;br /&gt;AT NAMIBIA&lt;/h2&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p&gt;Away from th','6890f2672bb6ed0f0b8af120b1fc2352.jpg','left','2015-02-26 18:22:35',1),(38,19,'&nbsp; &lt;h3&gt;Enjoy a unique adventure in the exotic of Africa with BMW Tour Experience. &lt;/h3&gt;<br>','082bbc5f106e58bff7f173be5714ec1a.jpg','center','2015-02-26 18:22:35',1),(39,19,'&lt;h3&gt;Enjoy a unique adventure in the exotic of Africa with BMW Tour Experience. &lt;/h3&gt;<br>','02c0d840de6d9227e388fa62bdc24edf.jpg','','2015-02-26 18:22:35',1),(40,20,' Impressed with the HDC capability, he could also feel the xDrive system adapts perfectly on the way back route that leads him through high extensions of desert dunes and the dry river delta of the Kuiseb River. The xDrive is an intelligent system that dri','3df7d53c6926f8ce54a0827b66602a40.jpg','left','2015-02-26 18:31:17',1),(41,21,'<h2>An Unexpectedly <br>Joyful Journey <br>AT NAMIBIA</h2>\r\n                        Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the ','feb41b3285a9c8ba9230ac307071ddcf.jpg','center','2015-02-26 18:32:57',1),(42,21,'<h2>An Unexpectedly <br>Joyful Journey <br>AT NAMIBIA</h2>\r\n                        Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the ','fffd5600ebeeb2c4de81fcf83ba4ddbc.jpg','center','2015-02-26 18:32:57',1),(43,22,'<h2><span class=\"  wysiwyg-color-maroon\"><span class=\" wysiwyg-color-blue\">An</span><span class=\"wysiwyg-color-blue\"> Unexpectedly </span></span><br><span class=\"   wysiwyg-color-blue\">Joyful Journey </span><br><span class=\"   wysiwyg-color-blue\">AT NAMIBI','fa18f5e9edb0fc197821d40762cbae8a.jpg','right','2015-02-26 18:47:21',1);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `local_path` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `sys_files` */

insert  into `sys_files`(`id`,`file_name`,`local_path`,`status`,`creator`,`created_date`) values (50,'702b70adda2b76b33f93cfe63f667eeb.jpg','D:/xampp/htdocs/bmw/trunk/public_html/public_assets/bmwpic/gallery/',1,1,NULL),(51,'8cf2041359bc51ec3d220569e08deea4.jpg','D:/xampp/htdocs/bmw/trunk/public_html/public_assets/bmwpic/gallery/',1,1,NULL);

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
