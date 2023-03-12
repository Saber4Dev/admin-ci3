CREATE DATABASE IF NOT EXISTS `admin-ci3` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `admin-ci3`;

-- Create the `users` table
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create the `client` table
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create the `company` table
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create the `service` table
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- Insert into the `users` table
INSERT INTO `users` (`username`, `password`, `email`, `is_admin`) VALUES
('john_doe', 'password123', 'john.doe@example.com', 1),
('jane_smith', 'letmein', 'jane.smith@example.com', 0),
('bob_johnson', 'bobpassword', 'bob.johnson@example.com', 0);

-- Insert into the `client` table
INSERT INTO `client` (`name`, `email`, `phone`, `address`) VALUES
('Acme Inc.', 'info@acme.com', '555-1234', '123 Main St.'),
('Globex Corp.', 'contact@globex.com', NULL, '456 Oak St.'),
('Initech LLC', 'support@initech.com', '555-5678', '789 Elm St.');

-- Insert into the `company` table
INSERT INTO `company` (`name`, `logo`, `address`) VALUES
('Acme Inc.', 'acme_logo.png', '123 Main St.'),
('Globex Corp.', 'globex_logo.png', '456 Oak St.'),
('Initech LLC', NULL, '789 Elm St.');

-- Insert into the `service` table
INSERT INTO `service` (`name`, `description`, `icon`) VALUES
('Web Design', 'Custom website design and development', 'web_design_icon.png'),
('Search Engine Optimization', 'Improve your website\'s visibility in search engines', 'seo_icon.png'),
('Social Media Marketing', 'Promote your brand on social media platforms', 'social_media_icon.png');
