-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2023 at 11:27 AM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixecbiw_saberea`
--

-- --------------------------------------------------------

--
-- Table structure for table `Certification`
--

CREATE TABLE `Certification` (
  `certification_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `certification_name` varchar(255) NOT NULL,
  `certification_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Certification`
--

INSERT INTO `Certification` (`certification_id`, `person_id`, `certification_name`, `certification_date`) VALUES
(1, 1, 'freeCodeCamp', '2022-04-01'),
(2, 1, 'Cisco', '2017-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`id`, `name`, `logo`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Acme Inc.', 'acme_logo.png', '123 Main St.', '2023-05-13 22:59:55', '2023-05-13 22:59:55'),
(2, 'Globex Corp.', 'globex_logo.png', '456 Oak St.', '2023-05-13 22:59:55', '2023-05-13 22:59:55'),
(3, 'Initech LLC', NULL, '789 Elm St.', '2023-05-13 22:59:55', '2023-05-13 22:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `Co_service`
--

CREATE TABLE `Co_service` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Co_service`
--

INSERT INTO `Co_service` (`id`, `company_id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Design', 'Custom website design and development', 'web_design_icon.png', '2023-05-13 22:59:55', '2023-05-13 22:59:55'),
(2, 2, 'SEO', 'Improve website visibility in search engines', 'seo_icon.png', '2023-05-13 22:59:55', '2023-05-13 22:59:55'),
(3, 1, 'Social Media', 'Promote brand on social media platforms', 'social_media_icon.png', '2023-05-13 22:59:55', '2023-05-13 22:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `Education`
--

CREATE TABLE `Education` (
  `education_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Education`
--

INSERT INTO `Education` (`education_id`, `person_id`, `degree`, `institution`, `start_date`, `end_date`, `description`) VALUES
(1, 1, 'Technical Diploma in Multimedia Development', 'ISMONTIC / Tangier', '2019-01-01', '2021-12-31', NULL),
(2, 1, 'Technical Diploma in Computer Maintenance and Support and Networks', 'ISMONTIC / Tangier', '2016-01-01', '2018-12-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Experience`
--

CREATE TABLE `Experience` (
  `experience_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Experience`
--

INSERT INTO `Experience` (`experience_id`, `person_id`, `job_title`, `company`, `start_date`, `end_date`, `description`) VALUES
(22, 1, 'Web Developer', 'Groupe Mentor - Supleor (ALEO)', '2022-11-01', NULL, '[\r\n  \"Designing visually appealing websites that align with client requirements and needs.\",\r\n  \"Collaborating closely with team members to deliver high-quality and marketable websites.\",\r\n  \"Developing modern and responsive websites and web applications using WordPress and CodeIgniter frameworks.\",\r\n  \"Ensuring efficient and timely completion of website projects within tight deadlines.\"\r\n]'),
(23, 1, 'Webmaster', 'Sahih Business', '2022-01-01', '2022-10-31', '[\r\n  \"Creating, designing, enhancing, updating, and maintaining websites to meet client objectives and industry standards.\",\r\n  \"Troubleshooting issues with websites, fixing scripting errors, and addressing usability issues.\",\r\n  \"Redesigning applications by implementing new information architecture schemas, content strategies, and UI/UX designs.\",\r\n  \"Generating sketches, flow diagrams, wireframes, mock-ups, and UI/UX designs for application redesigns.\",\r\n  \"Collaborating with clients to understand their objectives and requirements for the website.\"\r\n]'),
(24, 1, 'IT Support Technician', 'Planet Computer', '2019-10-01', '2020-01-31', '[\r\n  \"Maintained office & clients PCs, networks, and mobile devices.\",\r\n  \"Set up PCs, projectors, and microphones for use in video conferencing rooms.\",\r\n  \"Established, repaired, and optimized networks by installing wiring, cabling, and devices.\",\r\n  \"Performed necessary maintenance to support network availability.\",\r\n  \"Troubleshot and resolved LAN/WAN connectivity issues.\"\r\n]'),
(25, 1, 'IT Hardware Technician', 'Panier Media', '2018-10-01', '2019-03-31', '[\r\n  \"Maintaining technology equipment performance through hardware configuration, repair, and software patching.\",\r\n  \"Ensuring client satisfaction by providing follow-up support and effective problem resolution.\",\r\n  \"Conducting hardware troubleshooting and diagnostics to resolve technical issues.\"\r\n]');

-- --------------------------------------------------------

--
-- Table structure for table `Persons`
--

CREATE TABLE `Persons` (
  `person_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `bio` mediumtext DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Persons`
--

INSERT INTO `Persons` (`person_id`, `full_name`, `email`, `phone_number`, `address`, `profile_picture`, `bio`, `age`, `title`, `twitter`, `facebook`, `linkedin`, `github`, `instagram`, `website_url`, `status`, `timestamp`) VALUES
(1, 'Saber El Adraoui', 'saber.adraoui@gmail.com', '+212762526669', 'Tangier, Morocco', 'profilepic.jpg', 'IT specialist and developer with two years of experience who is capable and adaptable and who is driven to learn more about the IT industry. I recently earned a degree in information technology with a specialization in multimedia development and an additional specialization in IT and network technical support. Throughout my education and employment, I also developed a strong foundation in graphic design, web development, network management, and computer and network support. All my efforts have helped me establish my credibility in this industry, improved my creativity at work, and made me a reliable performer in any capacity. My main goal is to pursue a professional career in the IT field because of my early love and motivation for information technology.', 25, 'I\'m Saber El Adraoui, a visual UX/UI Designer and Web Developer', 'ElSaypher', '-', 'saberdev', 'Saber4Dev', 'saber.adr', 'https://saberea.com', 'Active', '2023-06-27 23:12:05'),
(5, 'Constance Moss', 'suhagupoj@mailinator.com', '+1 (472) 399-4777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Inactive', '2023-09-17 16:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `project_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `skills_used` varchar(255) DEFAULT NULL,
  `category` enum('Brand','Design','Website','Photos') DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `imageModal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`project_id`, `person_id`, `title`, `description`, `skills_used`, `category`, `project_url`, `image`, `imageModal`) VALUES
(9, 1, 'Sahih Business HomePage', 'A home page of the Sahih Business website that describes the company, its services, and its objectives. The website serves as a portfolio for Sahih Business.', 'Branding, Webdesign', 'Website', 'https://sahih-business.com/', 'SB.jpg', 'm-SB.jpg'),
(10, 1, 'Zburger', 'A website of a local restaurant in France that offers fast food. It is very famous in the area. The client/owner wants a website where customers can order online, check the menu of the restaurant, and manage the products and the POS system.', 'Branding, Web Development', 'Website', 'http://www.zburger.fr', 'Zburger.jpg', 'm-Zburger.jpg'),
(11, 1, 'YUMMYY', 'A WordPress website created for demonstration purposes.', 'WordPress Website', 'Website', 'https://dev-yummyy.pantheonsite.io/', 'YUMMYY.jpg', 'm-YUMMYY.jpg'),
(12, 1, 'CodeNivo e-commerce website', 'THE BEST DIGITAL STORE CODENIVO.', 'Website', 'Website', 'https://saber4dev.github.io/CODENIVO-v1', 'h_Codenivo.jpg', 'm-codenivo.png'),
(13, 1, 'Aliphia Flyer', 'A sample flyer created for the Aliphia product to promote the brand using social media.', 'Branding, Webdesign', 'Design', 'https://www.facebook.com/aliphia.invoice', 'Aliphia-flyes.jpg', 'm-Aliphia-flyes.jpg'),
(14, 1, 'ONCF Reservation', 'A website application created for demonstration. The application is purely PHP using the POO method to organize the code. The application features CRUD operations and PDF generation. Customers can book a ticket and receive the ticket in PDF format. They can also register and login to their account to check the status of their reservation.', 'PHP APP, POO', 'Brand', 'https://github.com/Saber4Dev/Reservation-ONCF', 'oncf.jpg', 'm-oncf.jpg'),
(15, 1, 'NeuroTanger', 'A clinic specializing in neurology located in Tangier.', 'Design', 'Brand', NULL, 'NeuroTanger-Logo.jpg', 'm-NeuroTanger-Logo.jpg'),
(24, 1, 'A PEPPONE & GERVISIO', 'A PEPPONE & GERVISIO is a stunning website showcasing the creativity and expertise of Aleo. The website is built using WordPress, featuring a modern design that reflects Aleo\'s brand identity. It offers a seamless user experience and highlights Aleo\'s products and services.', 'Website, Wordpress Website', 'Website', 'https://apepponegervisio.fr', 'A PEPPONE & GERVISIO.jpg', 'm-A PEPPONE & GERVISIO.jpg'),
(27, 1, 'SERGE BARBIER', 'SERGE BARBIER is a renowned chocolatier and patissier. The website represents his artistry in crafting exquisite chocolates and pastries, inviting visitors to indulge in a world of delectable treats.', 'Website', 'Website', 'https://serge-barbier-chocolatier-patissier.fr', 'SERGE_BARBIER.jpg', 'm-SERGE_BARBIER.jpg'),
(29, 1, 'TAXIS RIVES DE SAÔNE', 'TAXIS RIVES DE SAÔNE offers reliable and efficient taxi services along the Saône River. The website provides information about their services, rates, and booking options.', 'Website', '', 'https://taxis-rives-de-saone.fr', NULL, NULL),
(31, 1, 'YAYA COIFFURE HOMME', 'YAYA COIFFURE HOMME is a contemporary men\'s hairstyling salon. The website reflects the salon\'s modern approach to men\'s grooming, featuring stylish haircuts and grooming services.', 'Website', '', 'https://yayacoiffurehomme.fr', NULL, NULL),
(33, 1, 'OH ! P\'TIT CANADA', 'OH ! P\'TIT CANADA is a platform that brings a piece of Canada to France. The website offers Canadian products and experiences, allowing visitors to discover the essence of Canada.', 'Website', 'Website', 'https://ohptitcanada.fr', 'ptit_canada.png', 'm-ptit_canada.png'),
(37, 1, 'R DÉCO AGENCEMENT', 'R DÉCO AGENCEMENT specializes in interior design and space planning. The website highlights their expertise in creating functional and aesthetically pleasing interior spaces.', 'Website', '', 'https://rdecoagencement.com', NULL, NULL),
(40, 1, 'RAULT MULTI SERVICES', 'RMS - RAULT MULTI SERVICES offers a range of services for homes and businesses. The website provides information about their versatile service offerings and commitment to customer satisfaction.', 'Website', 'Website', 'https://rms-raultmultiservices.fr', NULL, NULL),
(42, 1, 'ROZ JULIEN', 'ROZ JULIEN is a creative individual offering artistic services. The website showcases the artist\'s portfolio and services, providing insights into their unique artistic perspective.', 'Website', '', 'https://roz-julien.fr', NULL, NULL),
(43, 1, 'MAËLLE JEAN-MOLINIER', 'MAËLLE JEAN-MOLINIER is a real estate agent specializing in properties along the French Riviera. The website highlights a range of available properties and real estate services.', 'Website', '', 'https://azurimmobilier.fr', NULL, NULL),
(44, 1, 'MC AUTOS', 'MC AUTOS offers automotive services and sales. The website showcases a selection of vehicles and provides information about their automotive services and offerings.', 'Website', '', 'https://mcautos-bva.fr', NULL, NULL),
(47, 1, 'MERET AUTOS', 'MERET AUTOS offers a variety of automotive services, including repairs and maintenance. The website provides insights into their expertise in maintaining and servicing vehicles.', 'Website', 'Website', 'https://meretautos.fr', 'Meret_autos.png', 'm-_meretautos.png'),
(48, 1, 'JASON PLOMBERIE', 'JASON PLOMBERIE offers plumbing services. The website showcases their expertise in plumbing installations and repairs for residential and commercial clients.', 'Website', '', 'https://jason-plomberie.fr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `service_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`service_id`, `person_id`, `service_name`, `description`, `service_icon`) VALUES
(1, 1, 'Design Trends', 'Stay updated with the latest design trends and create modern and aesthetically pleasing user experiences.', ' ion-logo-css3'),
(2, 1, 'PSD Design', 'Create high-quality and visually appealing designs using Photoshop (PSD).', 'ion-md-images'),
(3, 1, 'Customer Support', 'Provide excellent customer support and assistance to ensure client satisfaction.', 'ion-logo-ionic'),
(4, 1, 'Web Development', 'Develop and build dynamic and interactive websites using modern web technologies.', 'ion-logo-wordpress'),
(5, 1, 'Fully Responsive', 'Create websites and applications that are fully responsive and compatible with all devices.', 'ion-md-move'),
(6, 1, 'Branding', 'Develop a strong brand identity that represents the essence and values of the client\'s business.', 'ion-ios-rocket');

-- --------------------------------------------------------

--
-- Table structure for table `ServicesPlan`
--

CREATE TABLE `ServicesPlan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `features` text DEFAULT NULL,
  `person_id` int(11) NOT NULL,
  `badge_color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `ServicesPlan`
--

INSERT INTO `ServicesPlan` (`plan_id`, `plan_name`, `price`, `description`, `features`, `person_id`, `badge_color`) VALUES
(1, 'Standard', 19.00, 'A basic plan with essential features', '[\"Mobile App Design\", \"Responsive Design\", \"Database Development\", \"Web Design\", \"24/7 Support\"]', 1, 'primary'),
(2, 'Professional', 29.00, 'An upgraded plan for professionals', '[\"Mobile App Design\", \"Responsive Design\", \"Database Development\", \"Web Design\", \"24/7 Support\", \"Additional Feature 1\", \"Additional Feature 2\"]', 1, 'success'),
(3, 'Business', 39.00, 'A comprehensive plan for businesses', '[\"Mobile App Design\", \"Responsive Design\", \"Database Development\", \"Web Design\", \"24/7 Support\", \"Additional Feature 1\", \"Additional Feature 2\", \"Additional Feature 3\"]', 1, 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `Skills`
--

CREATE TABLE `Skills` (
  `skill_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `proficiency_level` int(11) NOT NULL,
  `skill_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Skills`
--

INSERT INTO `Skills` (`skill_id`, `person_id`, `skill_name`, `proficiency_level`, `skill_description`) VALUES
(1, 1, 'Graphic Design', 95, NULL),
(2, 1, 'UI / UX Design', 90, NULL),
(3, 1, 'Wordpress', 85, NULL),
(4, 1, 'CSS / SCSS', 90, NULL),
(5, 1, 'HTML5', 95, NULL),
(6, 1, 'PHP', 85, NULL),
(7, 1, 'jQuery', 90, NULL),
(8, 1, 'IT Hardware', 90, ''),
(9, 1, 'IT Networking', 85, NULL),
(10, 1, 'Microsoft Office', 95, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SoftSkills`
--

CREATE TABLE `SoftSkills` (
  `skill_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `skill_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `SoftSkills`
--

INSERT INTO `SoftSkills` (`skill_id`, `person_id`, `skill_name`) VALUES
(1, 1, 'Front-End Development'),
(2, 1, 'Problem-Solving'),
(3, 1, 'Design Thinking'),
(4, 1, 'Strong Communication'),
(5, 1, 'Adaptability'),
(6, 1, 'Flexibility'),
(7, 1, 'Creativity'),
(8, 1, 'Self-taught');

-- --------------------------------------------------------

--
-- Table structure for table `Testimonials`
--

CREATE TABLE `Testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `testimonial_text` mediumtext DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_company` varchar(255) DEFAULT NULL,
  `client_avatar` varchar(255) DEFAULT NULL,
  `client_role` varchar(255) DEFAULT NULL,
  `client_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `Testimonials`
--

INSERT INTO `Testimonials` (`testimonial_id`, `person_id`, `testimonial_text`, `client_name`, `client_company`, `client_avatar`, `client_role`, `client_rate`) VALUES
(1, 1, 'Saber did an excellent creative job, addressing our request quickly, and also providing his own graphic insight, being open to feedback and changes or edits when they arose. He worked with us the entire way. Highly recommended.', 'Hamza Jaaloudi', 'Sahih business', NULL, 'Chef Project - Engineer Full Stack', 4),
(2, 1, 'Saber is a highly talented designer and developer. He delivered top-notch work for our project and was always open to suggestions and improvements. I would love to work with him again.', 'Youness Gouma', 'Sahih business', 'client-2.jpg', 'Services Support Manager', 5),
(3, 1, 'Working with Saber was a great experience. He has a keen eye for design and delivered exactly what we were looking for. His communication and responsiveness were excellent throughout the project.', 'Khadija Rehmouni', 'Co student', 'client-3.jpg', 'Digital Marketing Pro', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone_number` varchar(20) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `username`, `password`, `email`, `avatar`, `is_admin`, `created_at`, `updated_at`, `phone_number`, `active`) VALUES
(1, 'John Doe', 'john_doe', 'password123', 'john.doe@example.com', 'user1-avatar.jpg', 0, '2023-05-13 22:59:55', '2023-09-07 18:34:23', NULL, 1),
(2, 'Jane Smith', 'jane_smith', 'letmein', 'jane.smith@example.com', 'user3-avatar.jpg', 1, '2023-05-13 22:59:55', '2023-09-07 18:33:45', NULL, 0),
(64, 'Saber Freeman', 'saberfree', '$2y$10$sSJ4.YZGCOA.tS/f39ZC4euE4fvefCwODWD8soL5GNaKg7fqQm3tK', 'saber@gmail.com', 'user2-avatar.jpg', 1, '2023-09-02 13:50:03', '2023-09-05 17:05:06', '123456', 1),
(65106, 'Willow Greene', 'jimojeneh', '$2y$10$dPQXjMXwPPMiX3vJhr.7a.CSkRwIOecwXELmV1JrhfnXa2/Y7vqlG', 'lyjikufa@mailinator.com', 'user4-avatar.jpg', 0, '2023-09-24 16:57:53', '2023-09-24 16:57:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `User_activity`
--

CREATE TABLE `User_activity` (
  `id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_time` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `incognito` tinyint(1) DEFAULT NULL,
  `screen_size` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `touch_screen` tinyint(1) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `host_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Certification`
--
ALTER TABLE `Certification`
  ADD PRIMARY KEY (`certification_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Co_service`
--
ALTER TABLE `Co_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `Education`
--
ALTER TABLE `Education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `Experience`
--
ALTER TABLE `Experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `Persons`
--
ALTER TABLE `Persons`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `ServicesPlan`
--
ALTER TABLE `ServicesPlan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `fk_person_id` (`person_id`);

--
-- Indexes for table `Skills`
--
ALTER TABLE `Skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `SoftSkills`
--
ALTER TABLE `SoftSkills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `Testimonials`
--
ALTER TABLE `Testimonials`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `User_activity`
--
ALTER TABLE `User_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Certification`
--
ALTER TABLE `Certification`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Co_service`
--
ALTER TABLE `Co_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Education`
--
ALTER TABLE `Education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Experience`
--
ALTER TABLE `Experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Persons`
--
ALTER TABLE `Persons`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ServicesPlan`
--
ALTER TABLE `ServicesPlan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Skills`
--
ALTER TABLE `Skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `SoftSkills`
--
ALTER TABLE `SoftSkills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Testimonials`
--
ALTER TABLE `Testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65107;

--
-- AUTO_INCREMENT for table `User_activity`
--
ALTER TABLE `User_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Certification`
--
ALTER TABLE `Certification`
  ADD CONSTRAINT `Certification_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `Co_service`
--
ALTER TABLE `Co_service`
  ADD CONSTRAINT `Co_service_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `Company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Education`
--
ALTER TABLE `Education`
  ADD CONSTRAINT `Education_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `Experience`
--
ALTER TABLE `Experience`
  ADD CONSTRAINT `Experience_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `Projects_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `Services`
--
ALTER TABLE `Services`
  ADD CONSTRAINT `Services_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `ServicesPlan`
--
ALTER TABLE `ServicesPlan`
  ADD CONSTRAINT `fk_person_id` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`) ON DELETE CASCADE;

--
-- Constraints for table `Skills`
--
ALTER TABLE `Skills`
  ADD CONSTRAINT `Skills_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `SoftSkills`
--
ALTER TABLE `SoftSkills`
  ADD CONSTRAINT `SoftSkills_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);

--
-- Constraints for table `Testimonials`
--
ALTER TABLE `Testimonials`
  ADD CONSTRAINT `Testimonials_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `Persons` (`person_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
