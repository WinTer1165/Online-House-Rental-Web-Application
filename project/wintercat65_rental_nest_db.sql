-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2024 at 03:03 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wintercat65_rental_nest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`admin_id`, `username`, `password`, `full_name`, `email`, `date_joined`) VALUES
(4, 'admin', '$2y$10$afLBgTKba/mQi0t2A8R8iu5kZddxw9uLmKXdTxGoqIu192jT49IpC', 'Md Aminul Islam Labib', 'aminulislam@gmail.com', '2024-12-16 08:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `ContactMessages`
--

CREATE TABLE `ContactMessages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_submitted` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ContactMessages`
--

INSERT INTO `ContactMessages` (`id`, `name`, `email`, `subject`, `message`, `date_submitted`) VALUES
(3, 'Md Amin', 'aminul@gmail.com', 'Demo Subject', 'This is a test message for demo purpose.', '2024-12-16 02:59:00'),
(4, 'North', 'cexog48742@eoilup.com', '123456', 'This is test demo 3.', '2024-12-16 02:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `ListingPhotos`
--

CREATE TABLE `ListingPhotos` (
  `photo_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `photo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ListingPhotos`
--

INSERT INTO `ListingPhotos` (`photo_id`, `listing_id`, `photo_path`) VALUES
(21, 20, '../images/listings/1734335295_demophoto (1).png'),
(22, 21, '../images/listings/1734335297_demophoto (2).png'),
(23, 22, '../images/listings/1734335299_demophoto (3).png'),
(24, 23, '../images/listings/1734335300_demophoto (4).png'),
(25, 24, '../images/listings/1734335302_demophoto (5).png'),
(26, 25, '../images/listings/1734335304_demophoto (6).png'),
(27, 26, '../images/listings/1734335307_demophoto (7).png'),
(28, 27, '../images/listings/1734335702_demophoto (13).png'),
(29, 28, '../images/listings/1734335704_demophoto (12).png'),
(30, 29, '../images/listings/1734335705_demophoto (11).png'),
(31, 30, '../images/listings/1734335707_demophoto (10).png'),
(32, 31, '../images/listings/1734335710_demophoto (9).png'),
(33, 32, '../images/listings/1734335710_demophoto (8).png'),
(34, 33, '../images/listings/1734335836_457239129_908709611094305_1220239289713294457_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Listings`
--

CREATE TABLE `Listings` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Listings`
--

INSERT INTO `Listings` (`listing_id`, `user_id`, `title`, `description`, `price`, `category`, `location`, `bedrooms`, `date_posted`) VALUES
(20, 10, 'House 28, Block A, Bashundhara RA', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 10000.00, 'bachelor', 'Dhaka', 1, '2024-12-16 07:48:15'),
(21, 10, 'House 191, Block D, Bashundhara RA', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 12500.00, 'sublet', 'Dhaka', 1, '2024-12-16 07:48:17'),
(22, 10, 'House 47, Block E, Bashundhara RA', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 15000.00, 'family', 'Dhaka', 2, '2024-12-16 07:48:19'),
(23, 10, 'House 102, Block E, Bashundhara RA', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 20000.00, 'sublet', 'Dhaka', 2, '2024-12-16 07:48:20'),
(24, 10, 'House 65, Sector 7,Uttara', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 10000.00, 'bachelor', 'Dhaka', 1, '2024-12-16 07:48:22'),
(25, 10, 'House 9, Sector 9, Uttara', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 12500.00, 'bachelor', 'Dhaka', 1, '2024-12-16 07:48:24'),
(26, 10, 'House 14, Sector 14, Uttara', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 30000.00, 'family', 'Dhaka', 3, '2024-12-16 07:48:27'),
(27, 9, 'House 84, Sector B, Banasree', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 25000.00, 'family', 'Dhaka', 3, '2024-12-16 07:55:02'),
(28, 9, 'House 12, Sector H, Banasree', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 16000.00, 'sublet', 'Dhaka', 2, '2024-12-16 07:55:04'),
(29, 9, 'House 42, Sector A, Banasree', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 15000.00, 'sublet', 'Dhaka', 1, '2024-12-16 07:55:05'),
(30, 9, 'House 74, Sector 13, Uttara', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 8000.00, 'bachelor', 'Dhaka', 1, '2024-12-16 07:55:07'),
(31, 9, 'House 16, Sector 12, Uttara', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 12000.00, 'bachelor', 'Dhaka', 1, '2024-12-16 07:55:10'),
(32, 9, 'House 17, Block A, Bashundhara RA', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 10000.00, 'bachelor', 'Dhaka', 1, '2024-12-16 07:55:10'),
(33, 9, 'House 32, Gulshan 1', 'Discover your dream home! This charming 3-bedroom, 2-bathroom house offers modern comfort and convenience in a prime location. The spacious living room is bathed in natural light, complementing an open-concept kitchen with stainless steel appliances and a cozy dining area. The master suite features an ensuite bathroom and walk-in closet, while two additional rooms are perfect for family, guests, or a home office. Enjoy a private backyard, ideal for relaxing or hosting gatherings. Located close to schools, shopping centers, and public transport, this home is perfect for families or professionals. Donâ€™t miss the chance to make this stunning rental property your home. Schedule a visit today!', 40000.00, 'family', 'Dhaka', 5, '2024-12-16 07:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `PasswordReset`
--

CREATE TABLE `PasswordReset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `full_name`, `username`, `password`, `phone`, `nid`, `date_of_birth`, `photo`, `date_joined`) VALUES
(9, 'Md Aminul Islam Labib', 'labib1', '$2y$10$m5rWZyhm.xZcXcyb9h9a5Ohb4HwcOu.6BgcB08uy4YhhP61sU/I9e', '01844291101', '1234567890', '2002-03-12', 'images/users/1734334748_pexels-joaojesusdesign-1080213 (1).jpg', '2024-12-16 07:39:08'),
(10, 'Muin Khan Mubin', 'mubin1', '$2y$10$U8KM/mGAFI8NKhjJjosKqushzeW3jsekoHEcotIiJPdhA/6c1gqwG', '01712505323', '4651561561', '2001-12-12', 'images/users/1734334837_profilepicmubin.jpg', '2024-12-16 07:40:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ContactMessages`
--
ALTER TABLE `ContactMessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ListingPhotos`
--
ALTER TABLE `ListingPhotos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `ListingPhotos_ibfk_1` (`listing_id`);

--
-- Indexes for table `Listings`
--
ALTER TABLE `Listings`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `PasswordReset`
--
ALTER TABLE `PasswordReset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ContactMessages`
--
ALTER TABLE `ContactMessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ListingPhotos`
--
ALTER TABLE `ListingPhotos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Listings`
--
ALTER TABLE `Listings`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `PasswordReset`
--
ALTER TABLE `PasswordReset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ListingPhotos`
--
ALTER TABLE `ListingPhotos`
  ADD CONSTRAINT `ListingPhotos_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `Listings` (`listing_id`) ON DELETE CASCADE;

--
-- Constraints for table `Listings`
--
ALTER TABLE `Listings`
  ADD CONSTRAINT `Listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `PasswordReset`
--
ALTER TABLE `PasswordReset`
  ADD CONSTRAINT `PasswordReset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
