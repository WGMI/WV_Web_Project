-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 11:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldview`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `beneficiary_id` int(11) NOT NULL,
  `region` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `people` varchar(55) NOT NULL,
  `period` date NOT NULL,
  `food_security_and_livelihood` int(11) NOT NULL,
  `food_assistance` int(11) NOT NULL,
  `WASH` int(11) NOT NULL,
  `education_and_protection` int(11) NOT NULL,
  `education` int(11) NOT NULL,
  `health_and_nutrition` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `protection` int(11) NOT NULL,
  `nutrition` int(11) NOT NULL,
  `malaria_prevention` int(11) NOT NULL,
  `non_food_items` int(11) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`beneficiary_id`, `region`, `country`, `people`, `period`, `food_security_and_livelihood`, `food_assistance`, `WASH`, `education_and_protection`, `education`, `health_and_nutrition`, `health`, `protection`, `nutrition`, `malaria_prevention`, `non_food_items`, `updated_time`, `user_id`) VALUES
(9, 'Eastern Africa', 'Kenya', 'Children', '1970-01-01', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-07-19 11:43:53', 0),
(10, 'Eastern Africa', 'Kenya', 'Adults and Children', '2018-10-01', 1, 111, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-07-19 12:05:26', 0),
(11, 'Eastern Africa', 'Kenya', 'Adults and Children', '2017-06-01', 150000, 15222, 4855, 78965, 1456, 12358, 8852, 753515, 964524, 7575, 741, '2018-07-30 11:24:31', 0),
(12, 'Eastern Africa', 'Rwanda', 'Children', '2011-08-01', 1, 111, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-07-30 11:33:51', 0),
(13, 'Eastern Africa', 'Kenya', 'Children', '2018-09-01', 1, 111, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-07-30 11:41:19', 0),
(14, 'Eastern Africa', 'Kenya', 'Children', '2018-09-01', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 999999999, '2018-08-09 05:36:08', 0),
(15, 'Eastern Africa', 'Uganda', 'Children', '2018-09-01', 1, 1, 1, 1, 11, 1, 51, 20, 33, 17, 17, '2018-08-09 09:50:23', 12);

-- --------------------------------------------------------

--
-- Table structure for table `country_advisory_levels`
--

CREATE TABLE `country_advisory_levels` (
  `country_advisory_levels_id` int(11) NOT NULL,
  `country` varchar(32) NOT NULL,
  `period` datetime NOT NULL,
  `advisory_level` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_advisory_levels`
--

INSERT INTO `country_advisory_levels` (`country_advisory_levels_id`, `country`, `period`, `advisory_level`) VALUES
(4, 'Kenya', '2018-09-01 00:00:00', 38.4),
(5, 'Kenya', '2018-08-01 00:00:00', 10.2),
(6, 'Kenya', '2018-12-01 00:00:00', 8.6),
(7, 'Burundi', '2018-09-01 00:00:00', 1),
(8, 'Kenya', '2018-06-01 00:00:00', 7.6),
(9, 'Kenya', '2017-02-01 00:00:00', 7.6);

-- --------------------------------------------------------

--
-- Table structure for table `earlywarning`
--

CREATE TABLE `earlywarning` (
  `earlywarningId` int(11) NOT NULL,
  `region` text NOT NULL,
  `country` text NOT NULL,
  `period` datetime NOT NULL,
  `last_updated` varchar(55) NOT NULL,
  `source` varchar(200) NOT NULL,
  `confidencelevel` varchar(200) NOT NULL,
  `narrative` text NOT NULL,
  `catid` int(11) NOT NULL,
  `indicatorid` int(11) NOT NULL,
  `possibleanswer_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earlywarning`
--

INSERT INTO `earlywarning` (`earlywarningId`, `region`, `country`, `period`, `last_updated`, `source`, `confidencelevel`, `narrative`, `catid`, `indicatorid`, `possibleanswer_id`, `date_added`, `user_id`) VALUES
(50, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'High', '<p>q</p>', 2, 1, 1, '2018-08-06 08:13:46', 0),
(51, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 1, 3, 11, '2018-08-06 09:01:20', 0),
(52, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'High', '<p>q</p>', 3, 8, 31, '2018-08-06 09:02:05', 0),
(53, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Last year', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 4, 10, 37, '2018-08-06 09:02:38', 0),
(54, 'Eastern Africa', 'Kenya', '2018-08-01 00:00:00', 'Last 6 months', 'http://www.youtube.com', 'Consistent with general information', '<p>I am awesome</p>', 3, 6, 22, '2018-08-06 12:29:52', 0),
(55, 'Eastern Africa', 'Kenya', '2018-08-01 00:00:00', 'Last 6 months', 'https://worldagroforestrycentre.org', 'High', '<p>q</p>', 1, 9, 36, '2018-08-06 12:38:42', 0),
(56, 'Eastern Africa', 'Uganda', '2018-08-01 00:00:00', 'Last 6 months', 'https://dev.mysql.com/doc/refman/5.7/en/', 'High', '<p>MTD stands for &ldquo;Month to Date&rdquo;. It&rsquo;s the period starting from the beginning of the current month up until now&hellip; but not&nbsp;<em>including</em>&nbsp;today&rsquo;s date, because it might not be complete yet. You use MTD to give you information on a particular activity, results in a campaign, or so on, for this particular time period.</p>\r\n<p>So if the date today is 20th July, MTD would cover activities/data during the time period from 1st July &ndash; 19th July, inclusive.</p>', 2, 5, 20, '2018-08-08 10:15:55', 0),
(57, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Last 6 months', 'https://worldagroforestrycentre.org', 'Low', '<p>Q</p>', 1, 3, 9, '2018-08-08 12:15:11', 0),
(58, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'High', '<p>q</p>', 5, 14, 56, '2018-08-09 05:37:08', 0),
(59, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Last 6 months', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 1, 3, 9, '2018-08-09 05:58:46', 0),
(60, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Last 6 months', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 3, 8, 32, '2018-08-09 06:00:05', 0),
(61, 'Eastern Africa', 'Uganda', '2018-09-01 00:00:00', 'Last 6 months', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 1, 3, 10, '2018-08-09 06:06:57', 0),
(62, 'Eastern Africa', 'Rwanda', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 5, 15, 59, '2018-08-09 06:22:18', 0),
(63, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 3, 6, 24, '2018-08-09 06:44:58', 0),
(64, 'Eastern Africa', 'Kenya', '2018-12-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 9, 27, 70, '2018-08-09 06:45:40', 0),
(65, 'Eastern Africa', 'Kenya', '2018-12-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 4, 12, 45, '2018-08-09 06:47:20', 0),
(66, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 3, 6, 22, '2018-08-09 09:46:20', 12),
(67, 'Eastern Africa', 'Burundi', '2018-09-01 00:00:00', 'Current', 'http://youtube.com/worldvision/addearlywarning.php', 'Low', '<p>Blah</p>', 3, 6, 21, '2018-08-09 13:22:31', 12),
(68, 'Eastern Africa', 'Kenya', '2018-06-01 00:00:00', 'Current', 'https://worldagroforestrycentre.org', 'Low', '<p>q</p>', 4, 11, 44, '2018-08-10 06:33:42', 12),
(69, 'Eastern Africa', 'Kenya', '2017-02-01 00:00:00', 'Last 6 months', 'http://youtube.com/worldvision/addearlywarning.php', 'Low', '<p>earfgdt344</p>', 2, 1, 4, '2018-08-10 12:14:01', 12);

-- --------------------------------------------------------

--
-- Table structure for table `earlywarningcategory`
--

CREATE TABLE `earlywarningcategory` (
  `catid` int(11) NOT NULL,
  `catname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earlywarningcategory`
--

INSERT INTO `earlywarningcategory` (`catid`, `catname`) VALUES
(1, 'Health'),
(2, 'Nutrition'),
(3, 'Education'),
(4, 'Economic'),
(5, 'Food security'),
(6, 'Displacement'),
(7, 'Political'),
(8, 'Conflict'),
(9, 'Environment'),
(10, 'Destabilizing events');

-- --------------------------------------------------------

--
-- Table structure for table `earlywarningindicator`
--

CREATE TABLE `earlywarningindicator` (
  `indicatorid` int(11) NOT NULL,
  `indicator_name` text NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earlywarningindicator`
--

INSERT INTO `earlywarningindicator` (`indicatorid`, `indicator_name`, `catid`) VALUES
(1, 'SAM Rates\r\n', 2),
(2, 'GAM Rates\r\n', 2),
(3, 'Under 5 mortality / 10,000\r\n', 1),
(4, 'Perception: Number of cases or incidence rates for selected diseases relevant to the local context\r\n', 1),
(5, 'Level of stunting', 2),
(6, 'Net intake rate to primary education', 3),
(7, 'Out of School Rate for Children of Primary School Age', 3),
(8, 'Perception--Education Institutions affected by national level issues which could lead to a drop in enrollment ', 3),
(9, 'The number of basic health units', 1),
(10, 'National inflation rate', 4),
(11, 'National unemployment rates', 4),
(12, '% of population with access to improved water sources', 4),
(13, 'Average daily casual labour wage\r\n', 4),
(14, 'Markets with price of main staple food increased by at least 20%', 5),
(15, 'IPC Phase', 5),
(16, 'Perception: markets by level of decreases in availability of main staple food', 5),
(17, '# in country (Refugees)\r\n', 6),
(18, '# out of country (Refugees)', 6),
(19, '# in country (IDPs)', 6),
(20, 'Number of civilians injured due to violence related to conflict\r\n', 7),
(21, 'Number of reports of people arbitrarily detained', 7),
(22, 'State of Emergency Declaration', 7),
(23, 'Number of reported cases of trafficking for exploitation (labour or sex)\r\n \r\n', 8),
(24, 'Ongoing Conflict', 8),
(25, 'Monthly rainfall compared to average\r\n\r\n', 9),
(26, 'Monthly temperature averages comparison', 9),
(27, 'Observable seasonal change/anamoly ', 9),
(28, 'Potential to affect many children and their families\r\n\r\n', 10),
(29, 'Potential to affect a some children and their families', 10),
(30, 'Potential to affect few children and their families\r\n', 10);

-- --------------------------------------------------------

--
-- Table structure for table `fragility_index`
--

CREATE TABLE `fragility_index` (
  `fragility_index_id` int(11) NOT NULL,
  `region` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `fragility_index_rank` double DEFAULT NULL,
  `security_contact` varchar(55) NOT NULL,
  `fragility_index` double NOT NULL,
  `global_peace_index` double NOT NULL,
  `failed_states_index` double NOT NULL,
  `hea_declaration` varchar(55) NOT NULL,
  `hazards` varchar(55) NOT NULL,
  `population` double NOT NULL,
  `displaced_people` int(11) NOT NULL,
  `field_spend` double NOT NULL,
  `wv_fragility_index_rank_global` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fragility_index`
--

INSERT INTO `fragility_index` (`fragility_index_id`, `region`, `country`, `fragility_index_rank`, `security_contact`, `fragility_index`, `global_peace_index`, `failed_states_index`, `hea_declaration`, `hazards`, `population`, `displaced_people`, `field_spend`, `wv_fragility_index_rank_global`, `user_id`) VALUES
(1, 'q', 'q', 2, 'q', 1, 1, 1, '1', '1', 1, 1, 1, 1, 0),
(2, 'Eastern Africa', 'Kenya', NULL, 'Imo', 1, 2, 3, 'Fine', 'A few', 12, 2323223, 32, 3, 0),
(3, 'Eastern Africa', 'Kenya', NULL, 'Me', 1, 1, 1, '1', '1', 1, 1, 1, 1, 0),
(4, 'Eastern Africa', 'Kenya', NULL, 'Me', 1, 2, 3, '4', '5', 6, 7, 8, 9, 0),
(5, 'Eastern Africa', 'Kenya', NULL, 'Me', 1, 1, 1, '1', '1', 1, 1, 1, 1, 0),
(6, 'Eastern Africa', 'Kenya', NULL, 'Him', 1, 1, 1, '1', '1', 1, 1, 1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

CREATE TABLE `funding` (
  `funding_id` int(11) NOT NULL,
  `region` text NOT NULL,
  `country` text NOT NULL,
  `period` datetime NOT NULL,
  `category` varchar(200) NOT NULL,
  `funding_required` int(11) NOT NULL,
  `funding_received` int(11) NOT NULL,
  `funding_gap` int(11) NOT NULL DEFAULT '0',
  `funding_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funding`
--

INSERT INTO `funding` (`funding_id`, `region`, `country`, `period`, `category`, `funding_required`, `funding_received`, `funding_gap`, `funding_date`, `user_id`) VALUES
(18, 'Eastern Africa', 'Kenya', '2018-12-01 00:00:00', 'Health', 22, 21234, 2, '2018-07-20 11:53:13', 0),
(19, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Education', 1, 1, 0, '2018-07-30 11:28:03', 0),
(20, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Shelter and non-food items', 12, 10, -2, '2018-07-30 11:30:56', 0),
(21, 'Eastern Africa', 'Kenya', '2018-10-01 00:00:00', 'Food security and livelihoods', 1, 1, 0, '2018-08-09 06:47:56', 0),
(22, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Food security and livelihoods', 9, 8, 1, '2018-08-09 09:40:12', 12);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `region` text NOT NULL,
  `country` text NOT NULL,
  `period` datetime NOT NULL,
  `category_of_people` varchar(200) NOT NULL,
  `people_in_need` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `region`, `country`, `period`, `category_of_people`, `people_in_need`, `date`, `user_id`) VALUES
(1, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Number of refugees hosted', 2, '2018-08-06 06:45:59', 0),
(2, 'Eastern Africa', 'Kenya', '2018-10-01 00:00:00', 'Number of people in need of safe drinking water', 3, '2018-08-06 06:47:19', 0),
(3, 'Eastern Africa', 'Uganda', '2018-09-01 00:00:00', 'Number of children under 5 severely malnourished', 7, '2018-08-08 09:59:19', 0),
(4, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Number of refugees hosted', 45678, '2018-08-09 06:48:13', 0),
(5, 'Eastern Africa', 'Kenya', '2018-09-01 00:00:00', 'Number of people in need of safe drinking water', 12, '2018-08-09 09:38:33', 12);

-- --------------------------------------------------------

--
-- Table structure for table `possibleanswer`
--

CREATE TABLE `possibleanswer` (
  `possibleanswer_id` int(11) NOT NULL,
  `possibleanswer_name` varchar(200) NOT NULL,
  `indicatorid` int(11) NOT NULL,
  `equivalence_score` float NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `possibleanswer`
--

INSERT INTO `possibleanswer` (`possibleanswer_id`, `possibleanswer_name`, `indicatorid`, `equivalence_score`, `weight`) VALUES
(1, 'None', 1, 1, 1),
(2, 'Limited', 1, 2, 1),
(3, 'Growing', 1, 3, 2),
(4, 'Spike', 1, 4, 2),
(5, '<5%\r\n', 2, 1, 1),
(6, '5-9%\r\n', 2, 2, 1),
(7, '10-14%\r\n', 2, 3, 2),
(8, '>15%\r\n', 2, 4, 2),
(9, '<5%\r\n', 3, 1, 1),
(10, '5-9%\r\n', 3, 2, 1),
(11, '10-20%\r\n', 3, 3, 2),
(12, '>20%\r\n', 3, 4, 2),
(13, '<1%\r\n', 4, 1, 1),
(14, '1-5%\r\n', 4, 2, 1),
(15, '6-20%\r\n', 4, 3, 2),
(16, '>20%\r\n', 4, 4, 2),
(17, '<69%\r\n', 5, 1, 1),
(18, '70-80%\r\n', 5, 2, 1),
(19, '80-94%\r\n', 5, 3, 2),
(20, '>95%\r\n', 5, 4, 2),
(21, 'None\r\n', 6, 1, 1),
(22, '<10%\r\n', 6, 2, 1),
(23, '11-20%\r\n', 6, 3, 2),
(24, '>20%\r\n', 6, 4, 2),
(25, '<2.0\r\n', 7, 1, 1),
(26, '2.0-5.0\r\n', 7, 2, 1),
(27, '5.0-10.0\r\n', 7, 3, 2),
(28, '>10.0\r\n', 7, 4, 2),
(29, 'None\r\n', 8, 1, 1),
(30, 'Under control\r\n', 8, 2, 1),
(31, 'Pending Crisis\r\n', 8, 3, 2),
(32, 'Crisis\r\n', 8, 4, 2),
(33, 'Increasing\r\n', 9, 1, 1),
(34, 'Adequate\r\n', 9, 2, 1),
(35, 'Reducing\r\n', 9, 3, 2),
(36, 'Not adequate\r\n', 9, 4, 2),
(37, '<2%\r\n', 10, 1, 1),
(38, '2-10%\r\n', 10, 2, 1),
(39, '11-30%\r\n', 10, 3, 2),
(40, '>30%\r\n', 10, 4, 2),
(41, '<10%\r\n', 11, 1, 1),
(42, '11-15%\r\n', 11, 2, 1),
(43, '16-25%\r\n', 11, 3, 2),
(44, '>25%\r\n', 11, 4, 2),
(45, '<1 USD\r\n', 12, 1, 1),
(46, '1.01-3.00 USD\r\n', 12, 2, 1),
(47, '3.01-5.00 USD\r\n', 12, 3, 2),
(48, '>5.00 USD\r\n', 12, 4, 2),
(49, 'None\r\n', 13, 1, 1),
(50, '<10%\r\n', 13, 2, 1),
(51, '11-20%\r\n', 13, 3, 2),
(52, '>20%\r\n', 13, 4, 2),
(53, 'Available\r\n', 14, 1, 1),
(54, 'Lessening\r\n', 14, 2, 1),
(55, 'Sparsely Available \r\n', 14, 3, 2),
(56, 'Not Available\r\n', 14, 4, 2),
(57, '1\r\n', 15, 1, 1),
(58, '2', 15, 2, 1),
(59, '3\r\n', 15, 3, 2),
(60, '>4\r\n', 15, 4, 2),
(61, '<10,000\r\n', 16, 1, 1),
(62, '10,001-20,000\r\n', 16, 2, 1),
(63, 'None\r\n', 26, 1, 1),
(64, 'Yes\r\n', 26, 2, 1),
(65, 'Multiple\r\n', 26, 3, 2),
(66, 'Long term\r\n', 26, 4, 2),
(67, '<50\r\n', 27, 1, 1),
(68, '51-200\r\n', 27, 2, 1),
(69, '201-500\r\n', 27, 3, 2),
(70, '>500\r\n', 27, 4, 2),
(71, 'None\r\n', 28, 1, 1),
(72, 'Low\r\n', 28, 2, 1),
(73, 'Medium\r\n', 28, 3, 2),
(74, 'High\r\n', 28, 4, 2),
(75, 'None\r\n', 29, 1, 1),
(76, 'Low\r\n', 29, 2, 1),
(77, 'Medium\r\n', 29, 3, 2),
(78, 'High\r\n', 29, 4, 2),
(79, 'None\r\n', 30, 1, 1),
(80, 'Low\r\n', 30, 2, 1),
(81, 'Medium\r\n', 30, 3, 2),
(82, 'High\r\n', 30, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `type` int(11) NOT NULL,
  `office` varchar(35) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `type`, `office`, `active`) VALUES
(11, 'Steve', 'Orre', 'steve@wv.com', 'orre', '96e79218965eb72c92a549dd5a330112', 0, 'Uganda', 1),
(12, 'Muganda', 'Imo', 'imo@wv.com', 'imo', '96e79218965eb72c92a549dd5a330112', 1, 'Kenya', 1),
(13, 'John', 'Doe', 'doe@gmail.com', 'doe', '96e79218965eb72c92a549dd5a330112', 0, 'Kenya', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `country_advisory_levels`
--
ALTER TABLE `country_advisory_levels`
  ADD PRIMARY KEY (`country_advisory_levels_id`);

--
-- Indexes for table `earlywarning`
--
ALTER TABLE `earlywarning`
  ADD PRIMARY KEY (`earlywarningId`),
  ADD KEY `catid` (`catid`),
  ADD KEY `indicatorid` (`indicatorid`),
  ADD KEY `possibleanswer_id` (`possibleanswer_id`);

--
-- Indexes for table `earlywarningcategory`
--
ALTER TABLE `earlywarningcategory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `earlywarningindicator`
--
ALTER TABLE `earlywarningindicator`
  ADD PRIMARY KEY (`indicatorid`),
  ADD KEY `catid` (`catid`);

--
-- Indexes for table `fragility_index`
--
ALTER TABLE `fragility_index`
  ADD PRIMARY KEY (`fragility_index_id`);

--
-- Indexes for table `funding`
--
ALTER TABLE `funding`
  ADD PRIMARY KEY (`funding_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- Indexes for table `possibleanswer`
--
ALTER TABLE `possibleanswer`
  ADD PRIMARY KEY (`possibleanswer_id`),
  ADD KEY `catid` (`indicatorid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `country_advisory_levels`
--
ALTER TABLE `country_advisory_levels`
  MODIFY `country_advisory_levels_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `earlywarning`
--
ALTER TABLE `earlywarning`
  MODIFY `earlywarningId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `earlywarningcategory`
--
ALTER TABLE `earlywarningcategory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `earlywarningindicator`
--
ALTER TABLE `earlywarningindicator`
  MODIFY `indicatorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `fragility_index`
--
ALTER TABLE `fragility_index`
  MODIFY `fragility_index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funding`
--
ALTER TABLE `funding`
  MODIFY `funding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `possibleanswer`
--
ALTER TABLE `possibleanswer`
  MODIFY `possibleanswer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
