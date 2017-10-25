-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 03:49 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ciproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addstdnt`
--

CREATE TABLE `tbl_addstdnt` (
  `sId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `roll` int(11) NOT NULL,
  `reg` int(11) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addstdnt`
--

INSERT INTO `tbl_addstdnt` (`sId`, `name`, `dept`, `roll`, `reg`, `phone`) VALUES
(1, 'Rajib Chandra Das', '4', 2, 2, 123456789),
(2, 'Taufiq Hassan', '2', 10, 10, 123456789),
(3, 'Ayan Chakrabarty', '1', 5, 5, 123456789),
(6, 'Omar Sakib', '4', 6, 6, 123456789),
(7, 'Shamir Imtiaz', '2', 8, 8, 123456789),
(8, 'Najmus Sakib', '1', 12, 12, 123456789),
(9, 'Mehadi Hasan', '9', 19, 19, 1234567889);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `aId` int(11) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`aId`, `author`) VALUES
(1, 'Rajib Chandra Das'),
(2, 'Omar Sakib'),
(4, 'Ayan Chakrabarty'),
(5, 'Taufiq');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `bookId` int(11) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`bookId`, `bookname`, `dept`, `author`, `stock`) VALUES
(1, 'Book one', '4', '5', 10),
(2, 'Book Two', '2', '4', 12),
(3, 'Book Three', '1', '2', 13),
(4, 'Book Four', '2', '1', 15),
(6, 'Book Five', '1', '5', 8),
(7, 'Book Six', '4', '4', 20),
(8, 'Book Seven', '9', '2', 15),
(9, 'Book Eight', '10', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `dId` int(11) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`dId`, `dept`) VALUES
(1, 'CSTE'),
(2, 'ICE'),
(9, 'ECONOMICS'),
(4, 'PHARMACY'),
(10, 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue`
--

CREATE TABLE `tbl_issue` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `bookname` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_issue`
--

INSERT INTO `tbl_issue` (`id`, `name`, `reg`, `dept`, `bookname`, `date`, `return`) VALUES
(1, 'Najmus Sakib', 12, 1, 3, '2017-08-08 21:08:02', '09-09-2017'),
(2, 'Shamir Imtiaz', 8, 2, 4, '2017-08-08 21:08:27', '09-09-2017'),
(3, 'Omar Sakib', 6, 4, 7, '2017-08-08 21:08:47', '09-09-2017'),
(4, 'Ayan Chakrabarty', 5, 1, 3, '2017-08-08 21:09:20', '09-09-2017'),
(5, 'Taufiq Hassan', 10, 2, 2, '2017-08-08 21:09:42', '09-09-2017'),
(6, 'Rajib Chandra Das', 2, 4, 1, '2017-08-08 21:10:15', '09-09-2017'),
(8, 'Taufiq Hassan', 10, 1, 3, '2017-08-09 20:58:52', '10/09/2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'shamir', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addstdnt`
--
ALTER TABLE `tbl_addstdnt`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`dId`);

--
-- Indexes for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addstdnt`
--
ALTER TABLE `tbl_addstdnt`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `dId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
