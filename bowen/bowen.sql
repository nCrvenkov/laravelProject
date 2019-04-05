-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 04:48 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowen`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  `active` int(5) NOT NULL,
  `roles_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `active`, `roles_id`) VALUES
(1, 'Nikola', 'Crvenkov', 'nikolac@gmail.com', '6ca45a03c1802f6ac968ca8438857fe0', '0000-00-00 00:00:00', 1, 1),
(3, 'Trange', 'Frange', 'trange@gmail.com', '28e838211c4aafdb1722063a51488ea7', '2019-03-11 01:23:33', 1, 2),
(4, 'Marijana', 'Radulović', 'marijana@gmail.com', '6c2b892cc2d156c0937af713615bd032', '2019-03-18 11:12:24', 1, 2),
(5, 'Miljan', 'Pavkov', 'miljan@gmail.com', 'e420c8c2207fe8a5cf464fe46d97a1f3', '2019-03-18 11:14:53', 1, 2),
(6, 'Kristina', 'Jovanov', 'kristina@gmail.com', '15ab465b07f1e770d2ca747ca567384a', '2019-03-18 11:24:45', 1, 2),
(7, 'Radojka', 'Savić', 'radojka_car@gmail.com', '2d4643d9d68221ad517ef107aa8272b0', '2019-03-18 11:40:55', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bowen_booked`
--

CREATE TABLE `bowen_booked` (
  `id` int(5) NOT NULL,
  `date` date NOT NULL,
  `termin_id` int(5) NOT NULL,
  `account_id` int(5) NOT NULL,
  `delete_timestamp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bowen_booked`
--

INSERT INTO `bowen_booked` (`id`, `date`, `termin_id`, `account_id`, `delete_timestamp`) VALUES
(7, '2019-04-18', 2, 4, 1555590600);

-- --------------------------------------------------------

--
-- Table structure for table `bowen_termini`
--

CREATE TABLE `bowen_termini` (
  `id` int(5) NOT NULL,
  `termin` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bowen_termini`
--

INSERT INTO `bowen_termini` (`id`, `termin`) VALUES
(1, '11:00 - 12:30'),
(2, '12:30 - 14:00'),
(3, '14:00 - 15:30'),
(4, '15:30 - 17:00'),
(6, '17:00 - 18:30');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `comment` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `account_id`, `date`) VALUES
(3, 'Meni je zaista pomoglo, hvala Vam puno.', 5, '2019-03-18 11:22:32'),
(4, 'Moja dugogodišnja migrena je nestala zahvaljujući ovim divnim ljudima i bowen terapijama. Dugujem Vam večnu zahvalnost !', 6, '2019-03-18 11:26:15'),
(5, 'Svaka preporuka za ove divne ljude!', 3, '2019-03-18 11:40:15'),
(6, 'Izlecili su mi unuku od steriliteta ! ! !  Vecno hvala i Bog vas blagoslovio. Neznam sta bi smo bez vas', 7, '2019-03-18 11:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(5) NOT NULL,
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `path`, `position`) VALUES
(1, '1.jpg', 'vertically'),
(2, '2.jpg', 'vertically'),
(3, '3.jpg', 'vertically'),
(4, '4.jpg', 'vertically'),
(5, '5.jpg', 'horizontally'),
(6, '6.jpg', 'horizontally'),
(7, '7.jpg', 'horizontally'),
(8, '8.jpg', 'horizontally');

-- --------------------------------------------------------

--
-- Table structure for table `ip_addresses`
--

CREATE TABLE `ip_addresses` (
  `id` int(5) NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ip_addresses`
--

INSERT INTO `ip_addresses` (`id`, `ip`) VALUES
(1, '::1'),
(2, '::1'),
(3, '::1'),
(4, '::1'),
(5, '::1'),
(6, '::1'),
(7, '::1'),
(8, '::1'),
(9, '::1'),
(10, '::1'),
(11, '::1'),
(12, '::1'),
(13, '::1'),
(14, '::1'),
(15, '::1'),
(16, '::1'),
(17, '::1'),
(18, '::1'),
(19, '::1'),
(20, '::1'),
(21, '::1'),
(22, '::1'),
(23, '::1'),
(24, '::1'),
(25, '::1'),
(26, '::1'),
(27, '::1'),
(28, '::1'),
(29, '::1'),
(30, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(5) NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `unauthorizedmessages`
--

CREATE TABLE `unauthorizedmessages` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unauthorizedmessages`
--

INSERT INTO `unauthorizedmessages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Nikola', 'nekimail@gmail.com', 'Neka poruka za admina'),
(2, 'Trange', 'trange@gmail.com', 'Neka poruka za admina opeeet');

-- --------------------------------------------------------

--
-- Table structure for table `usermessages`
--

CREATE TABLE `usermessages` (
  `id` int(5) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_account_id` int(5) NOT NULL,
  `to_account_id` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usermessages`
--

INSERT INTO `usermessages` (`id`, `message`, `from_account_id`, `to_account_id`, `date`) VALUES
(4, 'Poruka za admina', 3, 1, '2019-03-18 11:01:25'),
(6, 'Odgovor korisniku trange frangeu', 1, 3, '2019-03-18 11:04:37'),
(7, 'Poruka za admina', 4, 1, '2019-04-03 12:12:37'),
(9, 'Odgovor za marijanu', 1, 4, '2019-04-03 12:21:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Indexes for table `bowen_booked`
--
ALTER TABLE `bowen_booked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termin_id` (`termin_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `bowen_termini`
--
ALTER TABLE `bowen_termini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_addresses`
--
ALTER TABLE `ip_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unauthorizedmessages`
--
ALTER TABLE `unauthorizedmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermessages`
--
ALTER TABLE `usermessages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`from_account_id`),
  ADD KEY `to_account_id` (`to_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bowen_booked`
--
ALTER TABLE `bowen_booked`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bowen_termini`
--
ALTER TABLE `bowen_termini`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ip_addresses`
--
ALTER TABLE `ip_addresses`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `unauthorizedmessages`
--
ALTER TABLE `unauthorizedmessages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usermessages`
--
ALTER TABLE `usermessages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `bowen_booked`
--
ALTER TABLE `bowen_booked`
  ADD CONSTRAINT `bowen_booked_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `bowen_booked_ibfk_2` FOREIGN KEY (`termin_id`) REFERENCES `bowen_termini` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `usermessages`
--
ALTER TABLE `usermessages`
  ADD CONSTRAINT `usermessages_ibfk_1` FOREIGN KEY (`to_account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `usermessages_ibfk_2` FOREIGN KEY (`from_account_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
