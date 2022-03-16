-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 11:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ucategory` varchar(50) NOT NULL,
  `au_member` varchar(50) NOT NULL,
  `subscribe` varchar(50) NOT NULL,
  `datesub_start` varchar(50) NOT NULL,
  `datesub_end` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `fname`, `lname`, `email`, `pass`, `status`, `ucategory`, `au_member`, `subscribe`, `datesub_start`, `datesub_end`) VALUES
('20220310095326', 'Jaren Loyd', 'Heruela', 'jaren@gmail.com', 'admin', 'Active', 'Administrator', 'Yes', '', '', ''),
('20220310114407', 'Jorn', 'Moro', 'jorn@gmail.com', 'bjorn', 'Active', 'User', 'No', '', '', ''),
('20220310114425', 'Jamie', 'Heruela', 'jamie@gmail.com', 'jamie', 'Inactive', 'User', 'Yes', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `action` varchar(200) NOT NULL,
  `management` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`date`, `time`, `action`, `management`, `account`) VALUES
('2022/03/05', '9:03:04', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/05', '9:03:18', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/05', '9:03:44', 'Uploaded New Book Computer Science Modular Classes with ', 'CMS by', 'Admin'),
('2022/03/05', '10:03:25', 'Uploaded New Book Computer Science Modular Classes with ', 'CMS by', 'Admin'),
('2022/03/05', '10:03:17', 'Uploaded New Book Computer Science with ', 'CMS by', 'Admin'),
('2022/03/07', '14:03:28', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/08', '3:03:53', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/08', '3:03:06', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/08', '3:03:20', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/08', '6:03:41', 'Uploaded New Book oiuyt with ', 'CMS by', 'Admin'),
('2022/03/09', '15:03:41', 'Uploaded New Book poiuytre with ', 'CMS by', 'Admin'),
('2022/03/10', '13:03:17', 'Uploaded New Book poihgf with ', 'CMS by', 'Admin'),
('2022/03/11', '4:03:34', 'Uploaded New Book lkjbvcxz with ', 'CMS by', 'Admin'),
('2022/03/11', '4:03:14', 'Uploaded New Book poiuytr with ', 'CMS by', 'Admin'),
('2022/03/11', '9:03:58', 'Uploaded New Book wertyui with ', 'CMS by', 'Admin'),
('2022/03/11', '9:03:48', 'Uploaded New Book wertyui with ', 'CMS by', 'Admin'),
('2022/03/11', '10:03:39', 'Uploaded New Book qwertyuio with ', 'CMS by', 'Admin'),
('2022/03/11', '10:03:28', 'Uploaded New Book dfghjkl with ', 'CMS by', 'Admin'),
('2022/03/11', '11:03:02', 'Uploaded New Book pohgfd with ', 'CMS by', 'Admin'),
('2022/03/11', '11:03:05', 'Uploaded New Book pojhgfds with ', 'CMS by', 'Admin'),
('2022/03/11', '11:03:48', 'Uploaded New Book ergonomics with ', 'CMS by', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblresearch`
--

CREATE TABLE `tblresearch` (
  `id` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `abstract` longtext NOT NULL,
  `comment` longtext NOT NULL,
  `authors` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_publish` varchar(100) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `pdf_file` longtext NOT NULL,
  `views` varchar(100) NOT NULL,
  `cites` varchar(100) NOT NULL,
  `downloads` varchar(100) NOT NULL,
  `tagging` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresearch`
--

INSERT INTO `tblresearch` (`id`, `title`, `abstract`, `comment`, `authors`, `email`, `date_publish`, `field_of_study`, `department`, `pdf_file`, `views`, `cites`, `downloads`, `tagging`) VALUES
('20220311102839', 'qwertyuio', 'poiuytrewqdfghjkmnbvcx ertyuigh dfghj', 'poiuytre', 'jaren', 'anton-gramm-324@gmail.com', '2022-01-12', 'Computer Technology', '', '../papers/uploads/pmrf_012020.pdf ', '', '', '', 'Computer Science'),
('20220311103528', 'dfghjkl', 'ertyhjkl', 'kjhgfds', 'jh', 'nbvcxz', '2022-03-02', 'Computer Technology', '', '../papers/uploads/doc.pdf ', '', '', '', 'Computer Science'),
('20220311110502', 'pohgfd', 'nbvcxz', 'kjhgfd', 'hgfd', 'lbvd', '2022-03-09', 'Computer Technology', '', '../papers/uploads/4_ACE Review Center Exam Reviewer (Around 900 Items With Answers).pdf ', '', '', '', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `order_id` varchar(20) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `response_code` varchar(50) NOT NULL,
  `response_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`order_id`, `amount`, `response_code`, `response_desc`) VALUES
('12', '12222', '200', 'success'),
('2', '300', '200', 'Success'),
('7', '34', '200', 'success'),
('71', '787878', '200', 'success'),
('777', '3456789', '200', 'success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresearch`
--
ALTER TABLE `tblresearch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
