-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 03:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL,
  `admin_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`, `admin_type`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-05-13 11:18:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `pkgOffer_value` text DEFAULT NULL,
  `pax` int(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `payment` varchar(30) DEFAULT NULL,
  `payment_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `pkgOffer_value`, `pax`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`, `payment`, `payment_status`) VALUES
(27, 14, 'ejmanugas@dev.com', '2020-12-18', '1200', 4800, '2020-12-19 07:59:32', 2, 'a', '2020-12-19 18:09:15', 'gcash', 'check'),
(28, 14, 'ejmanugas@dev.com', '2020-12-17', '1200', 3200, '2020-12-19 08:40:04', 2, 'u', '2020-12-19 16:01:04', 'paymaya', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Issue` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissues`
--

INSERT INTO `tblissues` (`id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(9, NULL, NULL, NULL, '2020-12-04 01:02:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblowners`
--

CREATE TABLE `tblowners` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) NOT NULL,
  `tel_number` int(13) NOT NULL,
  `pre_address` text NOT NULL,
  `email_address` text NOT NULL,
  `passwords` varchar(200) NOT NULL,
  `profiles` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblowners`
--

INSERT INTO `tblowners` (`id`, `first_name`, `last_name`, `mid_name`, `tel_number`, `pre_address`, `email_address`, `passwords`, `profiles`) VALUES
(7, 'ej', 'ej', 'ej', 1464654, 'babag 2 lapu lapu city cebu', 'manugasewinjames@dev.com', 'f925916e2754e5e03f75dd58a5733251', '61263753_2240241956304248_838051413413068800_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(1, 'terms', '										<p align=\"justify\"><span style=\"color: rgb(153, 0, 0); font-size: small; font-weight: 700;\">This is a Test</span></p>\r\n										'),
(2, 'privacy', '<div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">This is a test</span></div>'),
(3, 'aboutus', '<ul><li><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">This is not an emergency broadcast</span></li><li><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">bla blabala</span></li></ul>'),
(11, 'contact', '										<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tblqrmessage`
--

CREATE TABLE `tblqrmessage` (
  `id` int(11) NOT NULL,
  `bookings_id` int(200) DEFAULT NULL,
  `owner_email` varchar(200) DEFAULT NULL,
  `users_email` varchar(200) DEFAULT NULL,
  `qr` varchar(200) DEFAULT NULL,
  `sending_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblqrmessage`
--

INSERT INTO `tblqrmessage` (`id`, `bookings_id`, `owner_email`, `users_email`, `qr`, `sending_date`) VALUES
(1, NULL, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', 'DONG.png', '2020-12-19 00:47:16'),
(2, NULL, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '56219956_2147429515346310_5177691712230785024_o.jpg', '2020-12-19 00:50:01'),
(3, 23, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', 'DONG.png', '2020-12-19 03:26:00'),
(4, 27, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '56219956_2147429515346310_5177691712230785024_o.jpg', '2020-12-19 08:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `owner_identity` varchar(200) DEFAULT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_num` int(13) DEFAULT NULL,
  `boat_name` varchar(150) DEFAULT NULL,
  `boat_operator` varchar(100) DEFAULT NULL,
  `boat_capacity` int(100) DEFAULT NULL,
  `pricePerpack` int(200) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `offer_price` int(255) NOT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `owner_identity`, `PackageName`, `address`, `contact_num`, `boat_name`, `boat_operator`, `boat_capacity`, `pricePerpack`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `offer_price`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(14, 'manugasewinjames@dev.com', 'Olango Princess Hopping2', 'babag 2 lapu lapu city cebu', 65464646, 'princess star2', 'erwin2', 14, 800, 'Olango-lapu2', 2000, 'With foods', 1200, 'This is a test for the identity', '1102017.png', '2020-12-17 08:18:25', '2020-12-17 09:04:42'),
(15, 'manugasewin@dev.com', 'Olango Princess Hopping', 'babag 2 lapu lapu city cebu', 65464646, 'princess star2', 'erwin', 11, 100, 'Olango-lapu2', 20000, 'porkchup, lechon', 1000, 'fadsfadf', '4x3.jpg', '2020-12-18 17:42:43', '2020-12-18 18:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Mname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Gnder` varchar(2) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `Fname`, `Mname`, `Lname`, `MobileNumber`, `EmailId`, `Gnder`, `Password`, `RegDate`, `UpdationDate`) VALUES
(13, 'erwin', 'Bongansiso', 'Manugas', '4684654654', 'ejmanugas@dev.com', 'M', '2faeca726344e2abbe4824c36d94513b', '2020-12-04 01:02:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblowners`
--
ALTER TABLE `tblowners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblqrmessage`
--
ALTER TABLE `tblqrmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblowners`
--
ALTER TABLE `tblowners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblqrmessage`
--
ALTER TABLE `tblqrmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
