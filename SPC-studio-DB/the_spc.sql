-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 07:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_spc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cp`
--

CREATE TABLE `admin_cp` (
  `admin_id` int(5) NOT NULL,
  `admin_user` varchar(150) NOT NULL,
  `admin_pswd` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_cp`
--

INSERT INTO `admin_cp` (`admin_id`, `admin_user`, `admin_pswd`) VALUES
(1, 'admin@spc', 'admin@spc.123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `main_id` int(10) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Phone` bigint(12) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Date_From` varchar(20) NOT NULL,
  `Date_To` varchar(20) NOT NULL,
  `Vanue` varchar(256) NOT NULL,
  `Message` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `port_id` int(5) NOT NULL,
  `main_cat` int(5) NOT NULL,
  `photos` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`port_id`, `main_cat`, `photos`, `desc`) VALUES
(1, 1, 'baby.JPG', 'Baby 1'),
(2, 1, 'baby2.jpg', 'baby 2');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `ban_id` int(5) NOT NULL,
  `ban_image` text NOT NULL,
  `ban_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`ban_id`, `ban_image`, `ban_status`) VALUES
(1, '2T9A3324.JPG', 'active'),
(2, '2T9A3289.JPG', 'active'),
(3, '2T9A3320.JPG', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `Join_id` int(255) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Phone` bigint(11) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Category` varchar(256) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spc`
--

CREATE TABLE `spc` (
  `spc_id` int(5) NOT NULL,
  `spc_cat` varchar(100) NOT NULL,
  `spc_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spc`
--

INSERT INTO `spc` (`spc_id`, `spc_cat`, `spc_desc`) VALUES
(1, 'Why SPC', 'SPC Studio is one stop solution for everything and anything related to photography. Creating, shooting, filming, servicing and executing all under one roof. Within the last 4 years of photography some fascinating stories of people in love we have successfully claimed our spot as one of the best photographers. Candid Photography is our heart, Cinematography is our soul â€“ ultimately you get eternal memories as final product. We convincingly make your wedding a dream wedding journey. You definitely get piece of art as final product. We at SPC Studio believe in Team Work and give equal importance at every aspects of the event.  Dynamic team is our strength. Above all â€“ we are professionals and not commercial.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `t_id` int(255) NOT NULL,
  `Name` varchar(234) NOT NULL,
  `Description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`t_id`, `Name`, `Description`, `image`) VALUES
(1, '- Nitin Bajoria - Surat', 'Team SPC Was fantastic and very innovative to work with during our gouse warming function.\r\nWe would highly recommend SPC for any kind of shoot.\r\nThey made ourvwhole photoshoot a strees free process.\r\nThere photos speak for themselves they are phenomenal photographers who captured each and every moment very beautifully of our house warming function.', 'Nitin.jpg'),
(2, '- Urmi Raval - Surat', 'I dont know how to thank SPC Studio for making our prewedding shoot memories forever for us. Aneeket Soni  took such an amazing clicks and not only of our faces but also of our emotions and love.. They gave us our life time memories to save and cherish.\r\nThank u so much for lovely memories. We surely recomend you to our friends n family.', 'Urmi.jpg'),
(3, '- Zankar Kharadi - ahmedabad', 'It was my stunning experience to work with aneeket soni. He is wonderful photographer who play less with unrealistic edited effects and focuses much more on keeping photographs real and natural.\n\nIt was wonderful shoot and i must recommend to all the persons who love to see themselves fabulous, attractive with all different aura\'s of themselves, must occupy dates with one and only one aneeket soni.', 'Zankar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wed_category`
--

CREATE TABLE `wed_category` (
  `id` int(255) NOT NULL,
  `cat_name` varchar(150) NOT NULL,
  `cat_img` text NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wed_category`
--

INSERT INTO `wed_category` (`id`, `cat_name`, `cat_img`, `cat_desc`, `cat_status`) VALUES
(1, 'Baby Shoot', 'baby shoot.JPG', 'This is a baby shoot Category.\r\n', 'active'),
(2, 'wedding', 'wedding.jpg', 'This is a Wedding category.', 'active'),
(3, 'pre-wedding', 'pre_wedding.jpg', 'This is a Pre-Wedding Category.', 'active'),
(4, 'events & exhibitions', 'events & exhibitions.jpg', 'This is a Events & Exhibitions Category', 'active'),
(5, 'portfolio', 'portfolio.jpg', 'This is a Portfolio category.', 'active'),
(6, 'Fashion show', 'Fashion_show.jpg', 'This is a Fashion Show Category.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `wed_subcategory`
--

CREATE TABLE `wed_subcategory` (
  `img_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `sub_cat` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wed_teams`
--

CREATE TABLE `wed_teams` (
  `team_id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wed_teams`
--

INSERT INTO `wed_teams` (`team_id`, `name`, `img`, `designation`, `status`) VALUES
(1, 'Aneeket Soni', '4.jpg', 'Founder and Candid Photographer', 'active'),
(2, 'Varun Dua', '3.jpg', ' Marketing', 'active'),
(3, 'Jalaj Dixit', '5.jpg', 'Photographer', 'active'),
(4, 'Jeel Contractor', '1.jpg', ' Management', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cp`
--
ALTER TABLE `admin_cp`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`Join_id`);

--
-- Indexes for table `spc`
--
ALTER TABLE `spc`
  ADD PRIMARY KEY (`spc_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `wed_category`
--
ALTER TABLE `wed_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wed_subcategory`
--
ALTER TABLE `wed_subcategory`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `wed_teams`
--
ALTER TABLE `wed_teams`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cp`
--
ALTER TABLE `admin_cp`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `main_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `port_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `ban_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `Join_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spc`
--
ALTER TABLE `spc`
  MODIFY `spc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wed_category`
--
ALTER TABLE `wed_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wed_subcategory`
--
ALTER TABLE `wed_subcategory`
  MODIFY `img_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wed_teams`
--
ALTER TABLE `wed_teams`
  MODIFY `team_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
