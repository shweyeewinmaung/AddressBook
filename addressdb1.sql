-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 05:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addressdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addressbook`
--

CREATE TABLE `tbl_addressbook` (
  `AddressBook_ID` varchar(50) CHARACTER SET utf8 NOT NULL,
  `AddressBook_Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `AddressBook_Phone` int(50) NOT NULL,
  `AddressBook_Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `AddressBook_Address` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addressbook`
--

INSERT INTO `tbl_addressbook` (`AddressBook_ID`, `AddressBook_Name`, `AddressBook_Phone`, `AddressBook_Email`, `AddressBook_Address`) VALUES
('A-000001', 'aa', 444, 'aa@gmail.com', 'fdafser'),
('A-000002', 'bb222', 34234, 'bb@gmail.com', 'fdaefw'),
('A-000003', 'cc', 555, 'bb33@gmail.com', 'daefw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_ID` int(50) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `User_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_ID`, `User_Name`, `User_Password`) VALUES
(1, 'aa', 'aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
