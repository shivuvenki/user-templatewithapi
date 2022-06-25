-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 07:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usertemplate`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_template_tb`
--

CREATE TABLE `email_template_tb` (
  `id` int(11) NOT NULL,
  `em_template_id` varchar(100) DEFAULT NULL,
  `em_template` longtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template_tb`
--

INSERT INTO `email_template_tb` (`id`, `em_template_id`, `em_template`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Template2', 'test', '1', '2022-06-24 16:26:55', '2022-06-24 16:26:58'),
(3, 'Template3', 'test', '1', '2022-06-24 16:26:55', '2022-06-24 16:26:58'),
(4, 'Template4', '<h1>Hello</h1>\n<b>this is my new template</b>', '1', '2022-06-24 16:57:38', '2022-06-24 16:57:38'),
(5, 'Template5', '<h1>test</h1>', '1', '2022-06-24 17:08:01', '2022-06-24 17:08:01'),
(6, 'Template6', '<h1>hello</h1>', '1', '2022-06-24 17:15:20', '2022-06-24 17:15:21'),
(7, 'Template7', '<h1>hello</h1>', '1', '2022-06-24 17:15:39', '2022-06-24 17:15:39'),
(9, 'Template9', 'hello', '1', '2022-06-24 17:19:19', '2022-06-24 17:19:19'),
(11, 'Template11', '<!DOCTYPE html>\n<html>\n<body>\n<style>\n.myClass {\n  color: white;\n  background-color: DodgerBlue;\n  padding: 20px;\n  text-align: center;\n  margin: 10px;\n}\n</style>\n\n<h1>The template Element</h1>\n\n<p>This example fills the web page with one new div element for each item in an array.</p>\n<p>The HTML code of each div element is inside the template element.</p>\n\n<p>Click the button below to display the hidden content from the template element.</p>\n\n<button onclick=\"showContent()\">Show hidden content</button>\n\n<template>\n  <div class=\"myClass\">I like: </div>\n</template>', '1', '2022-06-24 17:23:00', '2022-06-24 17:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `u_password` text NOT NULL,
  `u_confirmpassword` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id`, `name`, `user_id`, `mobile`, `email`, `u_password`, `u_confirmpassword`, `status`, `created_at`, `updated_at`) VALUES
(63, 'Shivani Agnihotri', 'shivani', '9315947552', 'shivaniagnihotri22@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1', '2024-06-24 18:04:38', '2022-06-24 19:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_template_tb`
--
ALTER TABLE `email_template_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_template_tb`
--
ALTER TABLE `email_template_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
