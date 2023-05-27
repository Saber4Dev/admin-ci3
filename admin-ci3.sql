-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2023 at 04:02 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `country` varchar(255) DEFAULT NULL,
  `notes` text,
  `gender` enum('Male','Female') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `photo`, `is_active`, `country`, `notes`, `gender`, `created_at`, `updated_at`) VALUES
(1, 1, 'Acme Inc.', 'info@acme.com', '555-1234', '123 Main St.', 'avatar.jpg', 1, 'USA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim ', 'Male', '2023-05-13 18:59:55', '2023-05-27 14:30:29'),
(2, 1, 'Globex Corp.', 'contact@globex.com', NULL, '456 Oak St.', 'avatar2.jpg', 1, NULL, NULL, NULL, '2023-05-13 18:59:55', '2023-05-13 19:47:32'),
(3, 2, 'Initech LLC', 'support@initech.com', '555-5678', '789 Elm St.', 'avatar3.jpg', 1, NULL, NULL, NULL, '2023-05-13 18:59:55', '2023-05-13 19:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Acme Inc.', 'acme_logo.png', '123 Main St.', '2023-05-13 18:59:55', '2023-05-13 18:59:55'),
(2, 'Globex Corp.', 'globex_logo.png', '456 Oak St.', '2023-05-13 18:59:55', '2023-05-13 18:59:55'),
(3, 'Initech LLC', NULL, '789 Elm St.', '2023-05-13 18:59:55', '2023-05-13 18:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'Custom website design and development', 'web_design_icon.png', '2023-05-13 18:59:55', '2023-05-13 18:59:55'),
(2, 'Search Engine Optimization', 'Improve your website\'s visibility in search engines', 'seo_icon.png', '2023-05-13 18:59:55', '2023-05-13 18:59:55'),
(3, 'Social Media Marketing', 'Promote your brand on social media platforms', 'social_media_icon.png', '2023-05-13 18:59:55', '2023-05-13 18:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `avatar`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john_doe', 'password123', 'john.doe@example.com', 'user1-avatar.jpg', 1, '2023-05-13 18:59:55', '2023-05-13 19:08:58'),
(2, 'Jane Smith', 'jane_smith', 'letmein', 'jane.smith@example.com', 'user3-avatar.jpg', 0, '2023-05-13 18:59:55', '2023-05-13 19:09:23'),
(3, 'Bob Johson', 'bob_johnson', 'bobpassword', 'bob.johnson@example.com', 'user2-avatar.jpg', 0, '2023-05-13 18:59:55', '2023-05-13 19:09:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
