-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2017 at 04:42 AM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 5.6.30-10+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sba`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT '0',
  `redeem` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'money redeem = 1, money not redeem = 0',
  `redeem_at` datetime DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL COMMENT 'description about money (for logs use)',
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'active = 1, deactive = 0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `user_id`, `amount`, `redeem`, `redeem_at`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 30, 0, NULL, 'first time login', 1, '2017-08-09 10:55:44', '2017-08-09 10:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc@xyz.com', '9856345345', 'test_desc', '2017-08-04 13:36:55', '2017-08-04 13:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upn` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `actual_value` int(20) DEFAULT NULL,
  `description` text,
  `conquas_score` varchar(50) DEFAULT NULL,
  `structural_score` varchar(50) DEFAULT NULL,
  `architectural_score` varchar(50) DEFAULT NULL,
  `me_score` varchar(50) DEFAULT NULL,
  `extwork_score` varchar(50) DEFAULT NULL,
  `acdsp_date_approved` datetime DEFAULT NULL,
  `top_number` int(20) DEFAULT NULL,
  `top_date_issued` int(20) DEFAULT NULL,
  `floor_area` varchar(20) DEFAULT NULL,
  `top_cost` varchar(20) DEFAULT NULL,
  `residential_units` varchar(20) DEFAULT NULL,
  `csc_no` int(20) DEFAULT NULL,
  `csc_date_issued` datetime DEFAULT NULL,
  `csc_cost` varchar(20) DEFAULT NULL,
  `bp_date_approved` datetime DEFAULT NULL,
  `accredited_checker` varchar(255) DEFAULT NULL,
  `asp_date_approved` int(20) DEFAULT NULL,
  `architect_in_charge` varchar(255) DEFAULT NULL,
  `professional_engineer` varchar(255) DEFAULT NULL,
  `project_stage` varchar(100) DEFAULT NULL,
  `project_completion_percent` varchar(10) DEFAULT NULL,
  `qualified_person` varchar(255) DEFAULT NULL,
  `permit_commence_works` int(10) DEFAULT NULL,
  `provisional_permission_date` int(10) DEFAULT NULL,
  `written_permission_date` int(10) DEFAULT NULL,
  `estimated_value` varchar(100) DEFAULT NULL,
  `building_components` text,
  `subcontracting_components` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'active=1, deactive=0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'saved=0, deleted=1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `upn`, `name`, `number`, `type`, `lot`, `address`, `start_date`, `end_date`, `actual_value`, `description`, `conquas_score`, `structural_score`, `architectural_score`, `me_score`, `extwork_score`, `acdsp_date_approved`, `top_number`, `top_date_issued`, `floor_area`, `top_cost`, `residential_units`, `csc_no`, `csc_date_issued`, `csc_cost`, `bp_date_approved`, `accredited_checker`, `asp_date_approved`, `architect_in_charge`, `professional_engineer`, `project_stage`, `project_completion_percent`, `qualified_person`, `permit_commence_works`, `provisional_permission_date`, `written_permission_date`, `estimated_value`, `building_components`, `subcontracting_components`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'UPNs', 'pName', '1112', 'Type', 'Lot', 'Address', '2017-08-09 12:04:53', '2017-08-09 12:04:53', 1, 'Description', 'Conquas', 'Structural', 'Architectural', 'm&e', 'Extwork', '2017-08-09 12:04:53', 1, 1, 'Floor Area', 'Floor Area', 'Residential Units', 1, '2017-08-09 12:04:53', 'csc Cost', '2017-08-09 12:04:53', 'Accredited Checker', 1, 'Architect Incharge', 'Professional Engineer', 'Project Stage', 'Project %', 'Qualified Person', 1, 1, 1, 'Estimated Value', 'Building Components :', 'Subcontracting Components :', 1, 0, '2017-08-09 12:05:32', '2017-08-10 10:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT 'name of setting',
  `type` varchar(30) NOT NULL COMMENT 'type of setting',
  `value` varchar(50) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `value`, `description`) VALUES
(1, 'first time login', 'login_reward', '30', 'first time login reward set by admin'),
(2, 'email', 'email_from', 'aman.setia@trigma.us', 'Email id from where the emails are send to the users');

-- --------------------------------------------------------

--
-- Table structure for table `suggested_projects`
--

CREATE TABLE IF NOT EXISTS `suggested_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(510) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suggested_projects`
--

INSERT INTO `suggested_projects` (`id`, `user_id`, `name`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 10, 'test_name', 'test_address', 'test_description', '2017-08-05 09:32:26', '2017-08-05 09:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'active = 1, deactive = 0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= no 1 = yes',
  `ip_address` varchar(50) DEFAULT NULL,
  `referral_code` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'admin= 1 , user=0',
  `token_key` varchar(30) DEFAULT NULL COMMENT 'token key for authantication',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `name`, `is_active`, `is_deleted`, `ip_address`, `referral_code`, `is_admin`, `token_key`, `created_at`, `updated_at`, `last_login`, `remember_token`) VALUES
(1, 'Admin', 'test@test.com', '9876543210', '$2y$10$F9w4y3/r15J0yanvuCvvZ.0t/0WirnBSYOTBE9XJaiXJ2RAGMXZ8i', NULL, 1, 0, NULL, 'QxBRj5nO', 1, 'qyqvTyrHjErWNhC1', '2017-08-10 04:50:25', '2017-08-10 04:50:25', NULL, 'EM2IJjc68C9Hdf1v9fLoDJBQWW2T9gh92I7UqfN4OzEuntiT3sVHlWQNltR3'),
(2, 'pankaj', 'pankaj.kumar@trigma.in', '9814254367', '$2y$10$I.BJOoh29JzTtv5WlVBNa.v.oIPy7WWWNWy2zjfzu5ngwvuxBk99G', NULL, 1, 0, NULL, 'yFEFELyC', 0, 'DlU3VPlVPTiyrfG4', '2017-08-09 10:55:44', '2017-08-10 14:06:55', '2017-08-10 02:06:55', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
