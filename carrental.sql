-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 01:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2018-05-16 21:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbldriver`
--

CREATE TABLE `tbldriver` (
  `id` int(11) NOT NULL,
  `DriverName` varchar(100) NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `VehicleNoReg` varchar(14) NOT NULL,
  `LicNo` varchar(15) NOT NULL,
  `LicExpireDate` date NOT NULL,
  `NID` bigint(12) NOT NULL,
  `PresentAdd` text NOT NULL,
  `PermanentAdd` text NOT NULL,
  `JoinDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldriver`
--

INSERT INTO `tbldriver` (`id`, `DriverName`, `MobileNo`, `VehicleNoReg`, `LicNo`, `LicExpireDate`, `NID`, `PresentAdd`, `PermanentAdd`, `JoinDate`) VALUES
(4, 'Ram Dubey', 8274738324, '12', 'MH1120394343765', '2035-07-18', 348874758691, 'Hinjawadi, Pimpri-Chinchwad', 'Hinjawadi, Pimpri-Chinchwad', '2020-06-23'),
(5, 'Ramu Chauhan', 9284735678, '18', 'MH1120196789764', '2035-03-28', 874324732492, 'Wai, Satara', 'Wai, Satara', '2019-06-28'),
(6, 'Raju ', 9689384883, '15', 'MH1120193287434', '2021-02-17', 324327432472, 'Mulshi,Pune', 'Mulshi, Pune', '2020-01-10'),
(7, 'Raju More', 9689384883, '15', 'MH1120194873874', '2021-02-17', 324327432472, 'Mulshi,Pune', 'Mulshi, Pune', '2020-01-10'),
(8, 'Baburao', 8324324326, '21', 'MH1120193746764', '2020-07-08', 787457234237, 'Panchgani, Satara', 'Panchgani, Satara', '2020-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `id` int(5) NOT NULL,
  `Vehicle_No` varchar(14) NOT NULL,
  `Expense_Type` varchar(20) NOT NULL,
  `Location` varchar(40) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`id`, `Vehicle_No`, `Expense_Type`, `Location`, `Amount`, `Date`) VALUES
(1, 'MH11AJ4179', 'Financing', 'Satara', 80, '2018-05-17'),
(2, 'MH11AB1204', 'Parking', 'Satara', 80, '2020-07-14'),
(3, 'MH11AB4567', 'Parking', 'Satara', 80, '2020-10-20'),
(4, 'MH11HD5216', 'Fine', 'Satara', 880, '2020-09-01'),
(6, 'MH11AB8724', 'Toll', 'Panchgani', 150, '2018-05-07'),
(7, 'MH11BA6568', 'Toll', 'Panchgani', 150, '2018-05-07'),
(8, 'MH11HD5566', 'Fine', 'Satara', 200, '2018-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `tblfuel`
--

CREATE TABLE `tblfuel` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `vehicle_no` varchar(14) NOT NULL,
  `rate` int(40) NOT NULL,
  `fuel_type` text NOT NULL,
  `total_amount_of_fuel` int(11) NOT NULL,
  `average_of_vehicle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfuel`
--

INSERT INTO `tblfuel` (`id`, `date`, `vehicle_no`, `rate`, `fuel_type`, `total_amount_of_fuel`, `average_of_vehicle`) VALUES
(2, '2020-06-09', '16', 80, 'Petrol', 30, 30),
(3, '2020-05-05', '12', 78, 'Diesel', 20, 20),
(4, '2020-07-21', '14', 70, 'CNG', 25, 50),
(5, '2020-08-06', '15', 80, 'Petrol', 40, 20),
(6, '2020-08-01', '15', 44, 'CNG', 10, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(11, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltour`
--

CREATE TABLE `tbltour` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `CusName` varchar(50) NOT NULL,
  `CusMobNo` bigint(10) NOT NULL,
  `CusEmail` varchar(60) NOT NULL,
  `CusGender` varchar(6) NOT NULL,
  `CusAdd` text NOT NULL,
  `SouPlace` varchar(100) NOT NULL,
  `desPlace` varchar(100) NOT NULL,
  `Distance` int(5) NOT NULL,
  `Amoperkm` int(3) NOT NULL,
  `StayChar` int(8) NOT NULL,
  `NoOfDay` int(2) NOT NULL,
  `NoOfNight` int(2) NOT NULL,
  `DriverName` varchar(50) NOT NULL,
  `TotalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltour`
--

INSERT INTO `tbltour` (`id`, `Date`, `CusName`, `CusMobNo`, `CusEmail`, `CusGender`, `CusAdd`, `SouPlace`, `desPlace`, `Distance`, `Amoperkm`, `StayChar`, `NoOfDay`, `NoOfNight`, `DriverName`, `TotalAmount`) VALUES
(1, '2020-07-07', 'Abhishek Jadhav', 8329705617, 'abhijadhav8308@gmail.com', 'male', 'Sai Sarada PG Amenity, Sakhare Vasti Rd, Hinjawadi Village, Hinjawadi, Pimpri-Chinchwad', 'Satara', 'Mahabaleshwar', 60, 15, 300, 2, 1, '8', 1200),
(2, '2020-06-15', 'Abhishek Surse', 8777823738, 'abhisurse@gmail.com', 'male', 'Hinjewadi Phase 1,Pune', 'Pune', 'Satara', 120, 8, 0, 1, 0, '7', 960);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Anuj Kumar', 'demo@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2147483647', NULL, NULL, NULL, NULL, '2017-06-17 19:59:27', '2017-06-26 21:02:58'),
(2, 'AK', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '8285703354', NULL, NULL, NULL, NULL, '2017-06-17 20:00:49', '2017-06-26 21:03:09'),
(3, 'Anuj Kumar', 'webhostingamigo@gmail.com', 'f09df7868d52e12bba658982dbd79821', '09999857868', '03/02/1990', 'New Delhi', 'New Delhi', 'New Delhi', '2017-06-17 20:01:43', '2017-06-17 21:07:41'),
(4, 'Anuj Kumar', 'test@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '9999857868', '', 'New Delhi', 'Delhi', 'Delhi', '2017-06-17 20:03:36', '2017-06-26 19:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehicleName` varchar(150) DEFAULT NULL,
  `VehicleType` varchar(11) DEFAULT NULL,
  `VehicleNo` varchar(14) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `RegDate` date NOT NULL,
  `SeatingCap` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehicleName`, `VehicleType`, `VehicleNo`, `FuelType`, `RegDate`, `SeatingCap`) VALUES
(12, 'Tata Harrier', 'SUV', 'MH11AJ8308', 'Diesel', '2020-06-22', 7),
(13, 'Tata Nexon', 'Hatchback', 'MH11AB1204', 'Petrol', '2020-04-10', 5),
(14, 'Tata HBX', 'Hatchback', 'MH11AB4567', 'Petrol', '2020-09-23', 5),
(15, 'Hyundai i20', 'Hatchback', 'MH11BA9752', 'Diesel', '2020-11-26', 5),
(16, 'Kia Seltos', 'Sedan', 'MH11HD5216', 'Diesel', '2021-01-01', 5),
(17, 'Maruti Swift', 'Hatchback', 'MH11AB8724', 'Diesel', '2020-08-04', 5),
(18, 'Toyota Fortuner', 'SUV', 'MH11BA6568', 'Diesel', '2020-08-12', 7),
(19, 'Mahindra Scorpio', 'Crossover', 'MH11AJ8976', 'Diesel', '2020-07-20', 7),
(20, 'Mahindra Bolero', 'Crossover', 'MH11BA6324', 'Diesel', '2021-02-01', 7),
(21, 'Maruti Ertiga', 'Crossover', 'MH11HD5566', 'CNG', '2020-11-17', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldriver`
--
ALTER TABLE `tbldriver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfuel`
--
ALTER TABLE `tblfuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltour`
--
ALTER TABLE `tbltour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldriver`
--
ALTER TABLE `tbldriver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblfuel`
--
ALTER TABLE `tblfuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltour`
--
ALTER TABLE `tbltour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
