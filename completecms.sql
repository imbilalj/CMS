-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2019 at 10:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `completecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(200) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_date_published`) VALUES
(1, 'Web', '2019-05-10 19:10:07'),
(20, 'Science', '2019-05-11 15:57:34'),
(21, 'IT', '2019-05-11 15:57:37'),
(22, 'Economy', '2019-05-11 15:57:39'),
(23, 'Politics', '2019-05-11 15:57:41'),
(42, 'Quantum Mechanics', '2019-05-11 16:52:49'),
(40, 'Cars', '2019-05-11 16:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(255) NOT NULL AUTO_INCREMENT,
  `post_author` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_body` TEXT NOT NULL,
  `post_status` tinyint(1) NOT NULL,
  `category_id` int(200) NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_author`, `post_title`, `post_body`, `post_status`, `category_id`, `post_comment_count`) VALUES
(14, 'Raza', 'Politics in Pak', 'This is a test post about the current politics in Pakistan.', 1, 1, 10),
(15, 'Hams', 'Budget 2019', 'Budget of 2019 of Pakistan is the text body of this post. This is also a test post. Comments please.', 1, 22, 10);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `password`, `usertype`, `question`, `answer`) VALUES
(1, 'Hams', 'Ansari', 'hams.ansari@yahoo.com', '12345678', 'user', 'My Fav animal', 'parrot'),
(2, 'Raza', 'Shafi', 'raza@gmail.com', '1234567890', 'user', 'my fav food', 'biryani');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `usertype`, `question`, `answer`) VALUES
(1, 'Hazrat', 'Bilal', 'imbilalj@gmail.com', 'webprogramming', 'admin', '', ''),
(4, 'Hams', 'Ansari', 'hams@gmail.com', 'fast123', 'admin', '', ''),
(5, 'Haseeb', 'Ansari', 'haseebansari864@gmail.com', '12345678', 'user', 'my fav person', 'haseeb');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
