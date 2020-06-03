-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 07:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oriol_infotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_of_joining` varchar(255) NOT NULL,
  `last_project_id` varchar(255) NOT NULL,
  `last_project_name` varchar(255) NOT NULL,
  `last_work_time` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `role`, `employee_id`, `first_name`, `last_name`, `position`, `income`, `password`, `contact_number`, `contact_email`, `description`, `location`, `date_of_joining`, `last_project_id`, `last_project_name`, `last_work_time`, `status`, `created_time`, `created_by`) VALUES
(1, 'Admin', 'EMP001', 'Smit', 'Shah', 'Founder', '40000', 'e807f1fcf82d132f9bb018ca6738a19f', '1234567890', 'admin@gmail.com', 'Founder& CEO', 'Ahmedabad', '2020-05-31 18:36:20.912456', '---', '---', '---', 0, '2020-06-02 12:35:04.314333', 'EMP001');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` int(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_amount` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_of_created` varchar(255) NOT NULL,
  `last_employee_id` varchar(255) NOT NULL,
  `last_employee_name` varchar(255) NOT NULL,
  `last_work_time` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histroy`
--

CREATE TABLE `transaction_histroy` (
  `id` int(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_amount` varchar(255) NOT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `credit_debit_status` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_histroy`
--

INSERT INTO `transaction_histroy` (`id`, `transaction_id`, `transaction_amount`, `transaction_date`, `transaction_description`, `user_id`, `credit_debit_status`, `status`, `created_time`) VALUES
(1, 'TRP001', '40000', '', 'Admin Salary', 'EMP001', 2, 0, '2020-06-02 12:35:04.314333');

-- --------------------------------------------------------

--
-- Table structure for table `update_work`
--

CREATE TABLE `update_work` (
  `id` int(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_histroy`
--
ALTER TABLE `transaction_histroy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_work`
--
ALTER TABLE `update_work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction_histroy`
--
ALTER TABLE `transaction_histroy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `update_work`
--
ALTER TABLE `update_work`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
