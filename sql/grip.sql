-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 08:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grip`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Sno` int(3) NOT NULL,
  `Sender` varchar(60) NOT NULL,
  `Reciever` varchar(60) NOT NULL,
  `Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Sno`, `Sender`, `Reciever`, `Amount`) VALUES
(1, 'Rakesh T.', 'Bishal P.', 10000),
(2, 'Bishal P.', 'Rohit S.', 10000),
(3, 'Pratham J.', 'Shrayansh B.', 15000),
(4, 'Pratham J.', 'Vikash P.', 2000),
(5, 'Ajay B.', 'Abhirup M.', 25000),
(6, 'Tuhin M.', 'Rakesh T.', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(3) UNSIGNED NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Email`, `Balance`) VALUES
(1, 'Bishal P.', 'bishalpandit100@gmail.com', 60000),
(2, 'Ankita M.', 'ankita@gmail.com', 60000),
(3, 'Rohit S.', 'rohits@gmail.com', 40000),
(4, 'Rakesh T.', 'rakesh89@gmail.com', 70000),
(5, 'Shrayansh B.', 'shrayanshb@gmail.com', 65000),
(7, 'Gaurav B.', 'gauravb@gmail.com', 85000),
(8, 'Pratham J.', 'prathamj@gmail.com', 73000),
(9, 'Abhirup M.', 'abhirupm@gmail.com', 70000),
(10, 'Vikash P.', 'vikashp@gmail.com', 57000),
(11, 'Ajay B.', 'ajayb@gmail.com', 75000),
(12, 'Tuhin M.', 'tuhinm@gmail.com', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
