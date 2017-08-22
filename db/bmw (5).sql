-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2015 at 03:42 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bmw`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_newsletter`
--

CREATE TABLE IF NOT EXISTS `custom_newsletter` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custom_registration`
--

CREATE TABLE IF NOT EXISTS `custom_registration` (
`id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `newsletter` int(1) NOT NULL,
  `data_privacy` int(1) NOT NULL,
  `salutation` varchar(4) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `bg_pic` varchar(255) NOT NULL,
  `pg1_content` text NOT NULL,
  `pg1_bg_pic` varchar(255) NOT NULL,
  `pg1_option` int(1) NOT NULL,
  `pg2_content` text NOT NULL,
  `pg2_bg_pic` varchar(255) NOT NULL,
  `pg2_option` int(1) NOT NULL,
  `pg3_content` text NOT NULL,
  `pg3_bg_pic` varchar(255) NOT NULL,
  `pg3_option` int(1) NOT NULL,
  `gallery` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `title`, `desc`, `bg_pic`, `pg1_content`, `pg1_bg_pic`, `pg1_option`, `pg2_content`, `pg2_bg_pic`, `pg2_option`, `pg3_content`, `pg3_bg_pic`, `pg3_option`, `gallery`) VALUES
(1, 'An Unexpectedly<br />Joyful Journey.', '<p>Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the wheel of BMW X5.</p>', '', '<p>Away from the asphalt roads, on gravel tracks through sand dunes and dried river deltas, Yennas Chandra has discovered a whole new dimension of driving pleasure behind the wheel of BMW X5.</p>', '', 1, '<p>The journey began in the Namibian capital of Windhoek, at the beautiful lodges surrounded by bush and open spaces. Before setting off across the X-routes, all participants were introduced to the BMW team. So, they''ll be ready for the first exhilarating drive to the Otjihavera Mountains as the first route. </p>\r\n\r\n<p>Yennas has never driven a left-hand-drive car before, but he could easily adapts to the BMW X5 Active Steering which gave him greater stability and comfort to stay in full control of any situation. The first route was quite challenging. He traversed into the canyons and driving through grass and shrub savannah. Even grass and shrub might have a high probability of damaging the exterior, but he found that the high quality of BMW X5 paints had miraculously kept the scratch away. </p>', '', 2, ' <p>The other route was even more exciting. He had to travel through dried river beds into the Erongo Mountains over the sand, rubble and rocks for an exotic surprise dinner at the top of the rocky hill. It was definitely one of the most unexpected and very memorable moments from this journey.</p>\r\n<p>After the joyful under the starry-skied dinner, Yennas couldn''t hide his amazement when he visited the Sandwich Harbor on the next day. It''s a towering giant sand dunes that run straight into the ocean, yes, the famous Namibian Sand Sea.</p>\r\n<p>He activated the Hill Descent Control (HDC) right before he slid down the famous sand dunes with BMW X5. The HDC is a smart system that holds the vehicle at a pre-determined speed and helps its brake control so the driver can fully concentrate on the steering wheel. </p>', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `destination_gallery`
--

CREATE TABLE IF NOT EXISTS `destination_gallery` (
`id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `sys_files_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_content`
--

CREATE TABLE IF NOT EXISTS `sys_content` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `teaser` text NOT NULL,
  `publish` int(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_content_files`
--

CREATE TABLE IF NOT EXISTS `sys_content_files` (
`id` int(11) NOT NULL,
  `sys_content_id` int(11) NOT NULL,
  `sys_files_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_content_type`
--

CREATE TABLE IF NOT EXISTS `sys_content_type` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_content_type`
--

INSERT INTO `sys_content_type` (`id`, `name`, `machine_name`, `status`) VALUES
(2, 'Genius', 'genius', 1),
(3, 'Experience', 'experience', 1),
(4, 'Vehicle', 'vehicle', 1),
(5, 'Destination', 'destination', 1),
(6, 'Newsletter', 'newsletter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_files`
--

CREATE TABLE IF NOT EXISTS `sys_files` (
`id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `local_path` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_privileges`
--

CREATE TABLE IF NOT EXISTS `sys_privileges` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `content_type_id` int(1) NOT NULL,
  `create` int(1) NOT NULL DEFAULT '0',
  `update` int(1) NOT NULL DEFAULT '0',
  `delete` int(1) NOT NULL DEFAULT '0',
  `view` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_role`
--

CREATE TABLE IF NOT EXISTS `sys_role` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_role`
--

INSERT INTO `sys_role` (`id`, `name`, `machine_name`) VALUES
(1, 'Administrator', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE IF NOT EXISTS `sys_users` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `status`, `created_date`, `role_id`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin@anywhere.com', 'qOyRN+0yz2PHJWCQ0VPIg09ejbY0YUK6kY757z1QB0U=', 1, '2015-02-12 14:56:19', 1),
(2, 'pertama', 'terakhir', 'pengguna', 'surat', 'TcFC4ZtC9F7t2QBavXKxkq0oFy9cOua1brDp5xIiFVk=', 1, '2015-02-12 17:31:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_newsletter`
--
ALTER TABLE `custom_newsletter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_registration`
--
ALTER TABLE `custom_registration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_gallery`
--
ALTER TABLE `destination_gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_content`
--
ALTER TABLE `sys_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_content_files`
--
ALTER TABLE `sys_content_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_content_type`
--
ALTER TABLE `sys_content_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_files`
--
ALTER TABLE `sys_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_privileges`
--
ALTER TABLE `sys_privileges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_role`
--
ALTER TABLE `sys_role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_newsletter`
--
ALTER TABLE `custom_newsletter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_registration`
--
ALTER TABLE `custom_registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `destination_gallery`
--
ALTER TABLE `destination_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sys_content`
--
ALTER TABLE `sys_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sys_content_files`
--
ALTER TABLE `sys_content_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sys_content_type`
--
ALTER TABLE `sys_content_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sys_files`
--
ALTER TABLE `sys_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sys_privileges`
--
ALTER TABLE `sys_privileges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sys_role`
--
ALTER TABLE `sys_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
