-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 01:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockholders`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `logs` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resolutions`
--

CREATE TABLE `tbl_resolutions` (
  `id` int(11) NOT NULL,
  `res_name` char(50) NOT NULL,
  `description` text NOT NULL,
  `vote_yes` int(10) NOT NULL,
  `vote_no` int(10) NOT NULL,
  `vote_abstain` int(10) NOT NULL,
  `record_status` char(20) NOT NULL,
  `is_temp` char(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resolutions`
--

INSERT INTO `tbl_resolutions` (`id`, `res_name`, `description`, `vote_yes`, `vote_no`, `vote_abstain`, `record_status`, `is_temp`) VALUES
(2, '3', '3', 0, 0, 0, 'Deleted', 'YES'),
(3, '3', '3', 0, 0, 0, 'Deleted', 'YES'),
(5, 'asdasd', 'asdasdasdasdasd', 0, 0, 0, 'Deleted', 'YES'),
(6, 'asd2', 'asdasdasd1', 0, 0, 0, 'Deleted', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_res_votes`
--

CREATE TABLE `tbl_res_votes` (
  `id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `vote_yes` int(11) NOT NULL,
  `vote_no` int(11) NOT NULL,
  `vote_abstain` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `is_temp` char(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocks`
--

CREATE TABLE `tbl_stocks` (
  `id` int(11) NOT NULL,
  `lname` char(30) NOT NULL,
  `fname` char(30) NOT NULL,
  `stock` int(10) NOT NULL,
  `share` double NOT NULL,
  `att_status` char(10) NOT NULL,
  `arrival` datetime NOT NULL,
  `proxy` char(100) NOT NULL,
  `is_candidate` char(3) NOT NULL DEFAULT 'NO',
  `record_status` char(20) NOT NULL,
  `added_votes` double NOT NULL,
  `casted_votes` double NOT NULL,
  `res_added_votes` int(11) NOT NULL,
  `res_casted_votes` int(11) NOT NULL,
  `proxy_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocks_bkup`
--

CREATE TABLE `tbl_stocks_bkup` (
  `id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `lname` char(30) NOT NULL,
  `fname` char(30) NOT NULL,
  `stock` int(10) NOT NULL,
  `share` double NOT NULL,
  `att_status` char(10) NOT NULL,
  `arrival` datetime NOT NULL,
  `proxy` char(100) NOT NULL,
  `is_candidate` char(3) NOT NULL DEFAULT 'NO',
  `record_status` char(20) NOT NULL,
  `added_votes` double NOT NULL,
  `casted_votes` double NOT NULL,
  `res_added_votes` int(11) NOT NULL,
  `res_casted_votes` int(11) NOT NULL,
  `proxy_name` char(50) NOT NULL,
  `bkup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `full_name` char(50) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(50) NOT NULL,
  `userlevel` char(20) NOT NULL,
  `record_status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `full_name`, `username`, `password`, `userlevel`, `record_status`) VALUES
(1, 'Ronald Ramon', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', ''),
(2, 'Gavino Matterig', 'user', 'user', 'Verificator', 'Deleted'),
(3, 'dummy', 'verify', '81dc9bdb52d04dc20036dbd8313ed055', 'Verificator', ''),
(4, 'dummy 2', 'canvas', '81dc9bdb52d04dc20036dbd8313ed055', 'Canvasser', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes`
--

CREATE TABLE `tbl_votes` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_temp` char(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes_bkup`
--

CREATE TABLE `tbl_votes_bkup` (
  `id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_temp` char(3) NOT NULL DEFAULT 'YES',
  `bkup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resolutions`
--
ALTER TABLE `tbl_resolutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_res_votes`
--
ALTER TABLE `tbl_res_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stocks_bkup`
--
ALTER TABLE `tbl_stocks_bkup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_votes_bkup`
--
ALTER TABLE `tbl_votes_bkup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_res_votes`
--
ALTER TABLE `tbl_res_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stocks_bkup`
--
ALTER TABLE `tbl_stocks_bkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_votes_bkup`
--
ALTER TABLE `tbl_votes_bkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
