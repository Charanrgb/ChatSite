-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 04:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `ID` int(5) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`ID`, `Name`, `password`) VALUES
(15, 'Rithvik', '$2y$10$Vrw.ekQ.ZKoNUM.z5tbccehVPFr8KOSHL4Y5gI5pld7oF.frqmMrK'),
(16, 'Manyu', '$2y$10$vpArlsAYAX/IPctQ7o2Yk..VtDgHx85aw4momrrKUJ6OhLBJxFsvW'),
(17, 'naruto', '$2y$10$cW7Vrzlb5qi4oaNqCCzNNubhWTIPnSZH9umWy/NoqX6PwuAjKfPGO'),
(19, 'sakura', '$2y$10$257VUo3zRXY8o/k8n4lB5uEM26pMbLMYOODM4IEI0k1xjmyBskU0G'),
(20, 'saske', '$2y$10$5Ql2LM.pdqgrmopXHDtls.syQgrCoFxcQPEy8RuuD32k9sy09n47K'),
(21, 'sai charan', '$2y$10$pFCwqQO.jH.790IlG7WWj.XKyJUMcd6d/LnXOZ4fzZ5aLuiOHbP/G');

-- --------------------------------------------------------

--
-- Table structure for table `usermsg`
--

CREATE TABLE `usermsg` (
  `SenderID` int(11) NOT NULL,
  `RecvID` int(11) NOT NULL,
  `Messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermsg`
--

INSERT INTO `usermsg` (`SenderID`, `RecvID`, `Messages`) VALUES
(17, 19, 'I wanna a doggy fuck You'),
(17, 19, 'ritnvjnmnmvdskmdkfsmkfksdmkfkdskfmsl\r\n'),
(17, 19, ' Enter yourkdmfkm,sm,fdmddnnfd\r\nsnfmdfmms\r\nFD message'),
(17, 19, 'dmncmskdmckmdls\r\nmd,ms\r\nfd,m,sd\r\nm,dmcs\r\ncmkdmfk'),
(15, 17, 'Hi bro !!'),
(15, 19, 'Hey Gal!!'),
(20, 15, 'hey bro! '),
(20, 20, 'hey bro!'),
(20, 15, ' Enter your message here '),
(21, 15, 'e lanje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usermsg`
--
ALTER TABLE `usermsg`
  ADD KEY `RecvID` (`RecvID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usermsg`
--
ALTER TABLE `usermsg`
  ADD CONSTRAINT `usermsg_ibfk_1` FOREIGN KEY (`RecvID`) REFERENCES `userdetails` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;