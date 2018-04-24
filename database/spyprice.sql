-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 11:17 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spyprice`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `status`, `created`, `modified`) VALUES
(1, 'Canon', 'Canon', 1, '2018-04-13 17:26:13', '2018-04-15 22:31:45'),
(2, 'apple', 'sssfaa', 1, '2018-04-13 22:38:03', '2018-04-13 22:45:46'),
(3, 'Besp Oak', 'Besp Oak', 1, '2018-04-13 23:12:04', '2018-04-15 22:32:26'),
(4, 'Annaghmore', 'Annaghmore', 1, '2018-04-15 22:32:41', '2018-04-15 22:32:41'),
(5, 'Blomberg', 'Blomberg', 1, '2018-04-15 22:33:07', '2018-04-15 22:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_type` int(11) DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_type`, `name`, `slug`, `description`, `status`, `position`, `visibility`, `created`, `modified`) VALUES
(1, 1, 'Digital Cameras', 'digital-cameras', 'phplearn', 1, 1, 1, '2018-03-03 09:04:17', '2018-04-14 20:03:22'),
(2, NULL, 'Televisions', 'televisions', 'ghgfh', 1, 1, NULL, '2018-03-04 15:08:34', '2018-04-15 22:27:53'),
(3, NULL, 'Set Top Boxes', 'set-top-boxes', 'Set Top Boxes', 1, 2, NULL, '2018-03-10 17:20:45', '2018-04-15 22:28:35'),
(4, NULL, ' SoundBars', 'soundbars', ' SoundBars', 1, 10, NULL, '2018-03-10 17:26:09', '2018-04-15 22:29:08'),
(5, NULL, ' Fridges', 'fridges', ' Fridges', 1, NULL, NULL, '2018-04-13 16:31:04', '2018-04-15 22:29:42'),
(6, NULL, 'Sports & Leisure', 'sports-leisure', 'Sports & Leisure', 1, NULL, NULL, '2018-04-13 17:10:45', '2018-04-15 22:30:41'),
(7, NULL, 'Historical Eventsaa', 'historical-eventsaa', ' Garden', 1, 44, NULL, '2018-04-13 23:10:47', '2018-04-15 22:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `status`, `created`, `modified`) VALUES
(1, '3d', 1, '2018-04-13 17:26:49', '2018-04-15 22:33:37'),
(2, 'Patrika', 2, '2018-04-13 22:55:30', '2018-04-14 21:42:00'),
(3, 'dslr', 1, '2018-04-13 23:13:38', '2018-04-15 22:33:53'),
(4, 'waterproof', 1, '2018-04-15 22:34:12', '2018-04-15 22:34:12'),
(5, 'gps', 1, '2018-04-15 22:34:29', '2018-04-15 22:34:29'),
(6, 'wifi', 1, '2018-04-15 22:34:55', '2018-04-15 22:34:55'),
(7, 'touch', 1, '2018-04-15 22:35:42', '2018-04-15 22:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` varchar(11) NOT NULL,
  `feature_id` varchar(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `images` text,
  `price` int(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `feature_id`, `name`, `images`, `price`, `status`, `created`, `modified`) VALUES
(1, 1, '1', '1', 'Canon EOS 700D', '1523853833Panasonic-DMC-FT30-175x175.jpg', 500, 1, '2018-04-16 10:13:53', '2018-04-16 10:13:53'),
(2, 1, '1', '3', 'Panasonic DMC FT30', '1523853876Canon-SX60-175x175.jpg', 600, 1, '2018-04-16 10:14:36', '2018-04-16 10:14:36'),
(3, 1, '2', '6', 'Panasonic TZ80', '1523853970Canon-EOS-700D-175x175.jpg', 1000, 1, '2018-04-16 10:16:10', '2018-04-16 10:16:10'),
(4, 1, '4', '5', 'Panasonic HCW580', '1523854091Canon-EF-24-70mm-f4L-IS-USM-Lens-175x175.jpg', 5000, 1, '2018-04-16 10:18:11', '2018-04-16 10:18:11'),
(5, 2, '2', '1', 'LG 32LH604V', '1523855476Panasonic-40DX700B-175x175.jpg', 9998, 1, '2018-04-16 10:41:16', '2018-04-16 10:41:16'),
(6, 2, '3', '7', 'LG 49LH604V', '1523855515LG-58UH635V-175x175.jpg', 24997, 1, '2018-04-16 10:41:55', '2018-04-16 10:41:55'),
(7, 2, '5', '4', 'LG 58UH635V', '1523855559LG-49LH604V-175x175.jpg', 15000, 1, '2018-04-16 10:42:39', '2018-04-16 10:42:39'),
(8, 2, '4', '3', 'Samsung UE55K5500', '1523855616LG-32LH604V-175x175.jpg', 4997, 1, '2018-04-16 10:43:36', '2018-04-16 10:43:36'),
(9, 2, '1', '7', 'Panasonic 58DX700B', '1523856029LG-55UH770V-175x175.jpg', 5999, 1, '2018-04-16 10:49:47', '2018-04-16 10:50:29'),
(10, 3, '1', '5', 'Humax HDR1800T', '1523856164Humax-HDR-2000T-Freeview-HD-Recorder-1-TB-175x175.jpg', 1200, 1, '2018-04-16 10:52:44', '2018-04-16 10:52:44'),
(11, 3, '2', '1', 'Samsung BDH8500M', '1523856196Humax-HDR-1800T-Freeview-HD-Recorder-320-GB-175x175.jpg', 1500, 1, '2018-04-16 10:53:17', '2018-04-16 10:53:17'),
(12, 3, '4', '6', 'Samsung BD J7500', '1523856268Humax-HDR-1100S-Smart-1TB-Freesat-with-Freetime-HD-Digital-TV-Recorder-175x175.jpg', 2000, 1, '2018-04-16 10:54:28', '2018-04-16 10:54:28'),
(13, 3, '2', '7', 'Sony BDP S6700', '1523856309Humax-HDR-1100S-Freesat-Freetime-HD-Recorder-500-GB-175x175.jpg', 5000, 1, '2018-04-16 10:55:09', '2018-04-16 10:55:09'),
(14, 3, '1', '5', 'Sony UHPH1', '1523856366Humax-DTR-T2000-YouView-HD-Recorder-500-GB-175x175.jpg', 6000, 1, '2018-04-16 10:56:06', '2018-04-16 10:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `guestid` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_verified` tinyint(4) DEFAULT NULL,
  `name` text,
  `contact_person` text,
  `photo` text,
  `gender` int(11) DEFAULT NULL,
  `mobile_no` varchar(25) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `verified` tinyint(4) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `guestid`, `user_type`, `username`, `email`, `password`, `email_verified`, `name`, `contact_person`, `photo`, `gender`, `mobile_no`, `location`, `active`, `verified`, `dob`, `created`, `modified`) VALUES
(1, '1', 1, 'bhup', 'bhupkinha@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 1, 'bhup kinha', 'bhup', '', 1, '9991554889', 'gurgaon', 1, 1, '2013-03-08', '2018-03-03 08:58:34', '2018-03-03 08:58:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
