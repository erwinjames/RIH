-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 04:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `booking_id` int(200) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `ratingsFrom` varchar(200) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `booking_id`, `rating`, `ratingsFrom`, `comment`, `date`) VALUES
(2, 33, 4, 'ejmanugas@dev.com', 'another sample', '2020-12-27 20:18:35'),
(3, 33, 5, 'ejmanugas@dev.com', 'another', '2020-12-27 20:27:56');

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
(61, 14, 'manugasewinjames@gmail.com', '14-01-2021', '1200', 5600, '2021-01-02 16:02:37', 1, NULL, '2021-01-04 15:08:37', 'gcash', 'check'),
(70, 15, 'manugasewinjames@gmail.com', '19-01-2021', '1200', 6500, '2021-01-02 17:01:36', 0, NULL, '2021-01-04 15:06:55', 'gcash', NULL),
(71, 14, 'manugasewinjames@gmail.com', '16-01-2021', '1200', 5600, '2021-01-03 03:07:08', 0, NULL, '2021-01-04 15:06:58', 'gcash', NULL);

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
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `payId` int(11) NOT NULL,
  `bookingId` int(200) DEFAULT NULL,
  `receivedBy` varchar(200) DEFAULT NULL,
  `DownPay_amount` int(200) DEFAULT NULL,
  `statusRecived` int(200) DEFAULT NULL,
  `Full_Amount` int(200) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`payId`, `bookingId`, `receivedBy`, `DownPay_amount`, `statusRecived`, `Full_Amount`, `date`) VALUES
(11, 61, 'manugasewinjames@gmail.com', 3400, 3400, 6800, '2021-01-04');

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
(3, 23, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', 'DONG.png', '2020-12-19 03:26:00'),
(4, 27, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '56219956_2147429515346310_5177691712230785024_o.jpg', '2020-12-19 08:00:18'),
(5, 31, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '0000000001=.jpg', '2020-12-27 18:11:43'),
(6, 31, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '01.jpg', '2020-12-27 19:02:31'),
(7, 33, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '0001.png', '2020-12-27 19:05:36'),
(8, 31, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', 'background3.jpg', '2020-12-27 19:06:01'),
(9, 34, 'manugasewinjames@dev.com', 'ejmanugas@dev.com', '000001.jpg', '2020-12-27 21:57:17'),
(11, 71, 'manugasewinjames@dev.com', 'manugasewinjames@gmail.com', 'WIN_20210103_11_39_06_Pro.jpg', '2021-01-04 12:56:22'),
(12, 61, 'manugasewinjames@dev.com', 'manugasewinjames@gmail.com', 'WIN_20210103_11_39_06_Pro.jpg', '2021-01-04 13:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `owner_identity` varchar(200) DEFAULT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_num` varchar(200) DEFAULT NULL,
  `boat_name` varchar(150) DEFAULT NULL,
  `boat_operator` varchar(100) DEFAULT NULL,
  `boat_capacity` int(100) DEFAULT NULL,
  `pricePerpack` int(200) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `offer_price` int(255) NOT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `owner_identity`, `PackageName`, `address`, `contact_num`, `boat_name`, `boat_operator`, `boat_capacity`, `pricePerpack`, `PackageLocation`, `PackageFetures`, `offer_price`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`, `status`) VALUES
(14, 'manugasewinjames@dev.com', 'Olango Princess Hopping2', 'babag 2 lapu lapu city cebu', '09062419916', 'princess star2', 'erwin2', 14, 800, 'Olango', 'With foods', 1200, 'This is a test for the identity', '1102017.png', '2020-12-17 08:18:25', '2020-12-30 02:12:36', 1),
(15, 'manugasewin@dev.com', 'Olango Princess Hopping', 'babag 2 lapu lapu city cebu', '09062419916', 'princess star2', 'erwin', 11, 100, 'Olango-lapu2', 'porkchup, lechon', 1000, 'fadsfadf', '4x3.jpg', '2020-12-18 17:42:43', '2020-12-30 02:13:02', 1),
(16, 'admin', 'sample', 'babag', '14654654', 'star', 'me', 15, 450, 'olango', 'baboy', 5000, 'something details', '00000000001.png', '2020-12-27 17:19:35', '2020-12-27 17:48:51', 1),
(17, 'admin', 'sample', 'babag', '14654654', 'star', 'me', 15, 550, 'olango', 'baboy manok', 5000, 'fadfadfsa', '01.jpg', '2020-12-27 19:04:10', '2020-12-27 19:04:19', 1),
(18, 'manugasewinjames@dev.com', 'this is a sample', 'babag', '14654654', 'star', 'me', 15, 550, 'olango', 'baboy', 5000, 'sample', '000000000000001.jpg', '2020-12-27 21:51:25', '2020-12-27 21:55:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Mname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `MobileNumber` char(15) DEFAULT NULL,
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
(13, 'erwin', 'Bongansiso', 'Manugas', '09062419916', 'manugasewinjames@gmail.com', 'M', '2faeca726344e2abbe4824c36d94513b', '2020-12-04 01:02:10', '2020-12-30 02:55:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

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
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`payId`);

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
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `payId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblqrmessage`
--
ALTER TABLE `tblqrmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
