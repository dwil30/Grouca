-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2016 at 07:26 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grouca`
--

-- --------------------------------------------------------

--
-- Table structure for table `ibaccounts`
--

CREATE TABLE `ibaccounts` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ibusername` varchar(255) NOT NULL,
  `ibpassword` varchar(255) NOT NULL,
  `ibcondatetime` datetime NOT NULL,
  `ibverified` smallint(6) NOT NULL DEFAULT '0',
  `ibverdatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibaccounts`
--

INSERT INTO `ibaccounts` (`id`, `email`, `ibusername`, `ibpassword`, `ibcondatetime`, `ibverified`, `ibverdatetime`) VALUES
(21, 'info@alminesoft.com', 'WNyI97g=', 'Wd2A9aLR6mQ=', '2016-05-11 02:08:50', 11, '2016-05-11 00:10:43'),
(22, 'damon.d.wilson@gmail.com', 'Sd2e7g==', 'Sd2e7uaQvA==', '2016-05-12 15:38:28', -4, '2016-05-12 13:41:54'),
(24, 'serborfil@gmail.com', 'TtqL8+WTuyA=', 'DIqY6bPHviQ=', '2016-05-30 23:07:58', 11, '2016-05-30 21:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `iborders`
--

CREATE TABLE `iborders` (
  `id` int(20) NOT NULL,
  `posid` int(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `symbol` varchar(64) NOT NULL,
  `strike` double NOT NULL DEFAULT '20',
  `secright` varchar(8) NOT NULL DEFAULT 'P',
  `multiplier` varchar(64) NOT NULL DEFAULT '100',
  `currency` varchar(8) NOT NULL DEFAULT 'USD',
  `receivetime` datetime DEFAULT NULL,
  `sendtime` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `Price` varchar(255) NOT NULL,
  `Buy` varchar(255) NOT NULL,
  `PriceBuy` varchar(255) NOT NULL,
  `Sell` varchar(255) NOT NULL,
  `PriceSell` varchar(255) NOT NULL,
  `Buy2` varchar(255) NOT NULL,
  `PriceBuy2` varchar(255) NOT NULL,
  `Sell2` varchar(255) NOT NULL,
  `PriceSell2` varchar(255) NOT NULL,
  `Buy3` varchar(255) NOT NULL,
  `PriceBuy3` varchar(255) NOT NULL,
  `Sell3` varchar(255) NOT NULL,
  `PriceSell3` varchar(255) NOT NULL,
  `Buy4` varchar(255) NOT NULL,
  `PriceBuy4` varchar(255) NOT NULL,
  `Sell4` varchar(255) NOT NULL,
  `PriceSell4` varchar(255) NOT NULL,
  `Trade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iborders`
--

INSERT INTO `iborders` (`id`, `posid`, `email`, `username`, `password`, `symbol`, `strike`, `secright`, `multiplier`, `currency`, `receivetime`, `sendtime`, `status`, `Price`, `Buy`, `PriceBuy`, `Sell`, `PriceSell`, `Buy2`, `PriceBuy2`, `Sell2`, `PriceSell2`, `Buy3`, `PriceBuy3`, `Sell3`, `PriceSell3`, `Buy4`, `PriceBuy4`, `Sell4`, `PriceSell4`, `Trade`) VALUES
(86, 0, 'info@alminesoft.com', 'edemo', 'hidden', 'ibverification', 20, 'P', '100', 'USD', '2016-05-11 02:08:51', '2016-05-11', 11, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1'),
(87, 1088, 'info@alminesoft.com', 'edemo', 'hidden', 'BABA', 20, 'P', '100', 'USD', '2016-05-11 02:12:23', '2016-05-11', 11, '64.84', '113 x BABA Oct 62.5 calls', '5.37', '-125 x BABA Sep 67.5 calls', '0.48', '', '', '-113 x BABA Oct 72.5 calls', '0.65', '', '', '', '', '', '', '', '', 'Combo'),
(88, 1114, 'info@alminesoft.com', 'edemo', 'hidden', 'EPAM', 20, 'P', '100', 'USD', '2016-05-11 21:05:08', '2016-05-11', 11, '200.25', '6 x EPAM Jan16 75 puts', '3.80', '-3 x EPAM Jan16 75 calls', '7.69', '', '', '-3 x EPAM Apr16 95 calls', '2.70', '', '', '', '', '', '', '', '', 'Combo'),
(89, 0, 'damon.d.wilson@gmail.com', 'test', 'hidden', 'ibverification', 20, 'P', '100', 'USD', '2016-05-12 15:38:29', '2016-05-12', -8, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1'),
(90, 0, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'ibverification', 20, 'P', '100', 'USD', '2016-05-30 22:45:08', '2016-05-30', 11, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1'),
(91, 1040, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'CNC', 20, 'P', '100', 'USD', '2016-05-30 22:49:22', '2016-05-30', 11, '59.75', '13 x CNC Sep 62.5 calls', '0.98', '-13 x CNC Sep 60 calls', '2.06', '3 x CNC Sep 67.5 calls', '0.20', '-13 x CNC Dec 62.5 calls', '4.15', '13 x CNC Sep 72.5 calls', '0.05', '', '', '', '', '', '', 'Combo'),
(92, 629, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'AAPL', 20, 'P', '100', 'USD', '2016-05-30 22:55:39', '2016-05-30', 11, '128.75', '1 x AAPL JunW2 130 put', '2.14', '-2 x AAPL Jun 140 calls', '0.04', '1 x AAPL Jun 130 call', '1.46', '-4 x AAPL JulW2 125 puts', '1.69', '1 x AAPL Jun 135 call', '0.25', '', '', '13 x AAPL JulW2 115 puts', '0.29', '', '', 'Combo'),
(93, 878, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'AAPL', 20, 'P', '100', 'USD', '2016-05-30 23:00:30', '2016-05-30', 11, '126.73', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Long'),
(94, 880, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'AMBA', 20, 'P', '100', 'USD', '2016-05-30 23:04:03', '2016-05-30', -8, '125.95', '3 x AMBA Aug 120 calls', '10.65', '-1 x AMBA Aug 115 call', '14.20', '4 x AMBA Aug 165 calls', '0.53', '-4 x AMBA Aug 150 calls', '1.48', '1 x AMBA Aug 115 put', '3.30', '', '', '', '', '', '', 'Call Combo'),
(95, 778, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'ADSK', 20, 'P', '100', 'USD', '2016-05-30 23:04:18', '2016-05-30', -8, '52.20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Call'),
(96, 0, 'serborfil@gmail.com', 'sbfi2146', 'hidden', 'ibverification', 20, 'P', '100', 'USD', '2016-05-30 23:07:58', '2016-05-30', 11, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `ID` int(200) NOT NULL,
  `TradeID` int(200) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Stock` varchar(6) NOT NULL,
  `Price` varchar(15) NOT NULL,
  `Sell` varchar(256) NOT NULL,
  `PriceSell` varchar(100) NOT NULL,
  `Sell2` varchar(256) DEFAULT NULL,
  `PriceSell2` varchar(10) DEFAULT NULL,
  `Sell3` varchar(256) NOT NULL,
  `PriceSell3` varchar(256) NOT NULL,
  `Sell4` varchar(256) NOT NULL,
  `PriceSell4` varchar(256) NOT NULL,
  `Buy` varchar(256) NOT NULL,
  `PriceBuy` varchar(10) NOT NULL,
  `Buy2` varchar(256) DEFAULT NULL,
  `PriceBuy2` varchar(10) DEFAULT NULL,
  `Buy3` varchar(256) NOT NULL,
  `PriceBuy3` varchar(256) NOT NULL,
  `Buy4` varchar(256) NOT NULL,
  `PriceBuy4` varchar(256) NOT NULL,
  `Gain` varchar(256) NOT NULL,
  `Loss` varchar(256) NOT NULL,
  `Margin` varchar(256) NOT NULL,
  `Notes` varchar(256) DEFAULT NULL,
  `Date` date NOT NULL,
  `Action` varchar(100) NOT NULL,
  `Trade` varchar(100) NOT NULL,
  `SetPrice` varchar(25) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ChangeAmount` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`ID`, `TradeID`, `Status`, `Title`, `Stock`, `Price`, `Sell`, `PriceSell`, `Sell2`, `PriceSell2`, `Sell3`, `PriceSell3`, `Sell4`, `PriceSell4`, `Buy`, `PriceBuy`, `Buy2`, `PriceBuy2`, `Buy3`, `PriceBuy3`, `Buy4`, `PriceBuy4`, `Gain`, `Loss`, `Margin`, `Notes`, `Date`, `Action`, `Trade`, `SetPrice`, `Timestamp`, `ChangeAmount`) VALUES
(1088, 689, 'Closed', '', 'BABA', '64.84', '-125 x BABA Sep 67.5 calls', '0.48', '-113 x BABA Oct 72.5 calls', '0.65', '', '', '', '', '113 x BABA Oct 62.5 calls', '5.37', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-17', 'Adjust', 'Combo', '', '2015-09-18 18:52:20', ''),
(629, 524, 'Closed', '', 'AAPL', '128.75', '-2 x AAPL Jun 140 calls', '0.04', '-4 x AAPL JulW2 125 puts', '1.69', '', '', '', '', '1 x AAPL JunW2 130 put', '2.14', '1 x AAPL Jun 130 call', '1.46', '1 x AAPL Jun 135 call', '0.25', '13 x AAPL JulW2 115 puts', '0.29', '1279', '0', '', 'Adjust', '2015-06-05', 'Adjust', 'Combo', '', '2015-06-05 18:08:28', ''),
(592, 524, 'At Risk', '', 'AAPL', '130.70', '', '', '', '', '', '', '', '', '1 x AAPL JunW2 125 put', '0.27', '', '', '', '', '', '', '1317', '863', '', 'Adjust And Book Gain', '2015-06-01', 'Adjust', 'Put', '', '2015-06-01 18:47:53', ''),
(882, 882, 'New', 'AXS Option Trade', 'AXS', '55.89', '', '', '', '', '', '', '', '', '2 x AXS Sep 60 calls', '0.95', '', '', '', '', '', '', '75', '192', '', '', '2015-07-24', 'Long', 'Call', '', '2015-07-24 18:39:06', ''),
(625, 524, 'At Risk', '', 'AAPL', '129.11', '-1 x AAPL Jun 130 call', '1.81', '-4 x AAPL JulW2 135 calls', '1.11', '', '', '', '', '2 x AAPL JunW2 135 calls', '0.12', '1 x AAPL Jun 135 call', '0.36', '4 x AAPL Aug 150 calls', '0.55', '', '', '1279', '0', '', 'Adjust', '2015-06-04', 'Adjust', 'Call Combo', '', '2015-06-04 18:05:24', ''),
(778, 500, 'Pending', '', 'ADSK', '52.20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '850', '', '', '2015-06-26', 'None', 'Call', '', '2015-06-26 20:19:14', ''),
(779, 689, 'Open', '', 'BABA', '52.20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '293', '', '', '2015-06-26', 'None', 'Call Spread', '', '2015-06-26 20:19:31', ''),
(627, 524, 'Open', '', 'AAPL', '129.36', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1279', '', '', '', '2015-06-04', 'None', 'Call Combo', '', '2015-06-04 21:03:32', ''),
(595, 500, 'At Risk', '', 'ADSK', '54.47', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '90', '', '', '2015-06-01', 'None', 'Call Spread', '', '2015-06-01 18:50:43', ''),
(596, 524, 'Open', '', 'AAPL', '130.54', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1317', '863', '', 'n', '2015-06-01', 'Adjust', 'Put', '', '2015-06-01 22:22:29', ''),
(591, 500, 'Open', '', 'ADSK', '54.24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '150', '', '', '2015-06-01', 'None', 'Call Spread', '', '2015-06-01 14:56:43', ''),
(501, 500, 'In Trouble', '', 'ADSK', '55.14', '-1 x ADSK Jan16 70 call', '1.53', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '150', '', 'Adjust', '2015-05-19', 'Long', 'Call', '', '2015-05-26 20:08:30', ''),
(502, 500, 'At Risk', '', 'ADSK', '55.14', '', '', '', '', '', '', '', '', '1 x ADSK Jan16 70 call', '1.29', '', '', '', '', '', '', '50', '150', '', 'Adjust', '2015-05-20', 'Adjust', 'Call', '', '2015-05-26 20:09:15', ''),
(503, 500, 'At Risk', '', 'ADSK', '55.13', '', '', '', '', '', '', '', '', '1 x ADSK Jun 52.5 put', '0.18', '', '', '', '', '', '', '50', '150', '', 'Adjust', '2015-05-21', 'Adjust', 'Put', '', '2015-05-26 20:09:53', ''),
(504, 500, 'At Risk', '', 'ADSK', '55.13', '-1 x ADSK Oct 67.5 call', '0.74', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '150', '', 'Adjust', '2015-05-22', 'Adjust', 'Call', '', '2015-05-26 20:11:35', ''),
(505, 500, 'At Risk', '', 'ADSK', '55.12', '-1 x ADSK Jun 55 put', '1.28', '', '', '', '', '', '', '1 x ADSK Jun 52.5 put', '0.47', '', '', '', '', '', '', '50', '150', '', 'Adjust', '2015-05-26', 'Adjust', 'Put Spread', '', '2015-05-26 20:12:56', ''),
(500, 500, 'New', 'ADSK Option Trade ', 'ADSK', '55.08', '', '', '', '', '', '', '', '', '1 x ADSK Oct 65 call', '2.08', '', '', '', '', '', '', '50', '150', '', '', '2015-05-13', 'Long', 'Call', '', '2015-05-26 20:07:45', ''),
(594, 500, 'At Risk', '', 'ADSK', '54.46', '-1 x ADSK Jun 55 call', '0.95', '-1 x ADSK Jun 52.5 put', '0.48', '', '', '', '', '1 x ADSK Jun 57.5 call', '0.31', '', '', '', '', '', '', '50', '90', '', 'Adjust And Book Gain', '2015-06-01', 'Adjust', 'Combo', '', '2015-06-01 18:47:53', ''),
(590, 500, 'At Risk', '', 'ADSK', '54.24', '-1 x ADSK Oct 62.5 call', '0.98', '', '', '', '', '', '', '1 x ADSK Oct 67.5 call', '0.45', '', '', '', '', '', '', '50', '150', '', 'Adjust And Book Gain', '2015-05-29', 'Adjust', 'Call Spread', '', '2015-05-29 18:44:30', ''),
(777, 524, 'Open', '', 'AAPL', '165.49', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1200', '0', '', '', '2015-06-26', 'None', 'Combo', '', '2015-06-26 20:18:53', ''),
(880, 693, 'Pending', '', 'AMBA', '125.95', '-1 x AMBA Aug 115 call', '14.20', '-4 x AMBA Aug 150 calls', '1.48', '', '', '', '', '3 x AMBA Aug 120 calls', '10.65', '4 x AMBA Aug 165 calls', '0.53', '1 x AMBA Aug 115 put', '3.30', '', '', '100', '1250', '', 'Adjust', '2015-07-24', 'Adjust', 'Call Combo', '', '2015-07-24 16:04:42', ''),
(878, 872, 'Closed', 'APPL Option Trade', 'AAPL', '126.73', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', '', '2015-07-23', 'None', 'Long', '', '2015-07-23 15:16:14', ''),
(522, 500, 'Open', '', 'ADSK', '55.50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '150', '', '', '2015-05-27', 'None', 'Put Spread', '', '2015-05-27 20:50:39', ''),
(525, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL Mar 135 calls', '0.26', '-2 x AAPL Mar 125 calls', '1.57', '-4 x AAPL Mar 125 calls', '1.58', '', '', '4 x AAPL Mar 120 calls', '3.29', '4 x AAPL Mar 140 calls', '0.12', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-03', 'Adjust', 'Call Combo', '', '2015-05-27 21:52:45', ''),
(524, 524, 'New', 'AAPL Option Trade ', 'AAPL', '132.04', '', '', '', '', '', '', '', '', '2 x AAPL Mar 125 calls', '2.05', '', '', '', '', '', '', '500', '1500', '', '', '2015-01-29', 'Long', 'Call', '', '2015-05-27 21:49:51', ''),
(526, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL Mar 120 calls', '8.75', '-4 x AAPL Mar 135 calls', '0.95', '', '', '', '', '4 x AAPL Mar 125 calls', '5.05', '4 x AAPL Mar 130 calls', '2.41', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-18', 'Adjust', 'Call Spread', '', '2015-05-27 21:54:14', ''),
(527, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL Mar 130 calls', '2.88', '-4 x AAPL Mar 140 calls', '0.48', '', '', '', '', '8 x AAPL May 135 calls', '4.30', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-27', 'Adjust', 'Call Combo', '', '2015-05-27 21:55:11', ''),
(528, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL Mar 125 calls', '3.65', '', '', '', '', '', '', '4 x AAPL AprW2 125 calls', '5.00', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-05', 'Adjust', 'Call Spread', '', '2015-05-27 21:56:06', ''),
(529, 524, 'In Trouble', '', 'AAPL', '132.04', '-8 x AAPL AprW1 135 calls', '0.49', '', '', '', '', '', '', '8 x AAPL Mar 135 calls', '0.11', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-10', 'Adjust', 'Call Spread', '', '2015-05-27 21:56:58', ''),
(530, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL Mar 120 puts', '0.88', '-1 x AAPL MarW4 130 call', '0.61', '', '', '', '', '1 x AAPL Mar 115 put', '0.23', '1 x AAPL Mar 125 put', '3.05', '1 x AAPL MarW4 140 call', '0.06', '', '', '500', '1500', '', 'Adjust', '2015-03-11', 'Adjust', 'Combo', '', '2015-05-27 21:58:15', ''),
(531, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL Mar 125 put', '2.12', '-2 x AAPL MarW4 130 calls', '0.66', '-1 x AAPL AprW2 130 call', '1.36', '', '', '1 x AAPL Mar 125 call', '1.53', '1 x AAPL Mar 115 put', '0.13', '2 x AAPL MarW4 140 calls', '0.06', '', '', '500', '1500', '', 'Adjust', '2015-03-12', 'Adjust', 'Combo', '', '2015-05-27 22:00:02', ''),
(532, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL Mar 115 puts', '0.01', '-3 x AAPL AprW1 130 calls', '1.42', '', '', '', '', '3 x AAPL Mar 125 calls', '2.62', '2 x AAPL Mar 120 puts', '0.05', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-17', 'Adjust', 'Combo', '', '2015-05-27 22:01:11', ''),
(533, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL MarW4 125 puts', '1.11', '', '', '', '', '', '', '2 x AAPL MarW4 120 puts', '0.25', '2 x AAPL MarW4 130 puts', '3.75', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-18', 'Adjust', 'Combo', '', '2015-05-27 22:02:15', ''),
(534, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL MarW4 120 puts', '0.06', '-2 x AAPL MarW4 130 puts', '2.65', '-8 x AAPL AprW4 135 calls', '1.63', '-8 x AAPL AprW4 140 calls', '0.73', '3 x AAPL MarW4 130 calls', '0.33', '4 x AAPL MarW4 125 puts', '0.34', '8 x AAPL AprW1 135 calls', '0.12', '8 x AAPL AprW4 150 calls', '0.16', '500', '1500', '', 'Adjust', '2015-03-23', 'Adjust', 'Combo', '', '2015-05-27 22:03:23', ''),
(535, 524, 'At Risk', '', 'AAPL', '132.04', '-3 x AAPL AprW2 130 calls', '1.01', '', '', '', '', '', '', '3 x AAPL AprW1 130 calls', '0.54', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-24', 'Adjust', 'Call Spread', '', '2015-05-27 22:04:15', ''),
(536, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL AprW1 125 call', '1.40', '', '', '', '', '', '', '1 x AAPL AprW1 135 call', '0.04', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-25', 'Adjust', 'Call Spread', '', '2015-05-27 22:04:51', ''),
(537, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL AprW1 120 puts', '0.60', '', '', '', '', '', '', '2 x AAPL AprW1 115 puts', '0.17', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-26', 'Adjust', 'Put Spread', '', '2015-05-27 22:05:37', ''),
(538, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL AprW2 130 calls', '0.38', '-8 x AAPL AprW4 150 calls', '0.11', '-2 x AAPL AprW2 130 calls', '0.39', '-4 x AAPL AprW2 130 calls', '0.38', '8 x AAPL AprW2 140 calls', '0.04', '8 x AAPL AprW4 140 calls', '0.42', '2 x AAPL AprW4 135 calls', '0.87', '', '', '500', '1500', '', 'Adjust', '2015-03-27', 'Adjust', 'Combo', '', '2015-05-27 22:08:06', ''),
(539, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL AprW1 115 puts', '0.02', '-2 x AAPL AprW2 125 puts', '1.62', '', '', '', '', '2 x AAPL AprW1 120 puts', '0.07', '2 x AAPL AprW2 115 puts', '0.13', '', '', '', '', '500', '1500', '', 'Adjust', '2015-03-30', 'Adjust', 'Combo', '', '2015-05-27 22:08:52', ''),
(540, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL AprW2 115 puts', '0.17', '-5 x AAPL AprW2 130 calls', '0.20', '', '', '', '', '2 x AAPL Apr 125 puts', '3.25', '6 x AAPL AprW4 135 calls', '0.32', '1 x AAPL AprW1 125 call', '0.29', '', '', '500', '1500', '', 'Adjust', '2015-04-01', 'Adjust', 'Combo', '', '2015-05-27 22:09:40', ''),
(541, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL AprW2 120 call', '4.82', '-2 x AAPL AprW2 125 puts', '1.83', '-1 x AAPL Apr 130 call', '0.50', '-2 x AAPL Apr 125 puts', '2.57', '2 x AAPL AprW2 130 calls', '0.15', '2 x AAPL AprW2 115 puts', '0.10', '2 x AAPL AprW2 130 puts', '5.70', '1 x AAPL AprW2 120 call', '4.82', '500', '1500', '', 'Adjust', '2015-04-02', 'Adjust', 'Combo', '', '2015-05-27 22:10:54', ''),
(542, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL AprW2 125 calls', '1.19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-08', 'Adjust', 'Call', '', '2015-05-27 22:12:37', ''),
(543, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL AprW2 125 calls', '0.66', '-2 x AAPL AprW2 130 puts', '4.45', '-8 x AAPL MayW1 135 calls', '1.18', '', '', '4 x AAPL AprW2 130 calls', '0.02', '1 x AAPL Apr 130 call', '0.30', '13 x AAPL AprW2 130 calls', '0.02', '2 x AAPL AprW2 120 puts', '0.02', '500', '1500', '', 'Adjust', '2015-04-09', 'Adjust', 'Combo', '', '2015-05-27 22:13:28', ''),
(544, 524, 'At Risk', '', 'AAPL', '132.04', '', '', '', '', '', '', '', '', '4 x AAPL AprW2 125 puts', '0.16', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-09', 'Adjust', 'Put', '', '2015-05-27 22:15:24', ''),
(545, 524, 'At Risk', '', 'AAPL', '132.04', '-8 x AAPL MayW1 130 calls', '2.97', '', '', '', '', '', '', '1 x AAPL Apr 130 call', '0.41', '8 x AAPL May 130 calls', '3.54', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-10', 'Adjust', 'Call Combo', '', '2015-05-27 22:16:32', ''),
(546, 524, 'At Risk', '', 'AAPL', '132.04', '-8 x AAPL MayW1 130 calls', '2.64', '', '', '', '', '', '', '8 x AAPL May 130 calls', '3.18', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-14', 'Adjust', 'Call Spread', '', '2015-05-27 22:17:13', ''),
(547, 524, 'At Risk', '', 'AAPL', '132.04', '-8 x AAPL MayW1 125 calls', '3.97', '', '', '', '', '', '', '8 x AAPL MayW5 125 calls', '5.00', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-17', 'Adjust', 'Call Spread', '', '2015-05-27 22:17:54', ''),
(548, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL AprW4 130 call', '0.23', '', '', '', '', '', '', '1 x AAPL AprW4 125 call', '2.82', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-20', 'Adjust', 'Call Spread', '', '2015-05-27 22:18:27', ''),
(549, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL AprW4 125 call', '1.95', '-8 x AAPL MayW1 135 calls', '0.81', '', '', '', '', '1 x AAPL AprW4 130 call', '0.08', '8 x AAPL May 135 calls', '1.26', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-22', 'Adjust', 'Combo', '', '2015-05-27 22:19:08', ''),
(550, 524, 'In Trouble', '', 'AAPL', '132.04', '', '', '', '', '', '', '', '', '1 x AAPL MayW1 125 call', '6.75', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-23', 'Adjust', 'Call', '', '2015-05-27 22:19:52', ''),
(551, 524, 'At Risk', '', 'AAPL', '132.04', '-8 x AAPL MayW5 125 calls', '8.63', '-16 x AAPL May 130 calls', '4.900', '-16 x AAPL May 135 calls', '2.92', '', '', '7 x AAPL MayW1 125 calls', '7.65', '16 x AAPL MayW1 130 calls', '4.350', '16 x AAPL MayW1 135 calls', '2.160', '', '', '500', '1500', '', 'Adjust', '2015-04-27', 'Adjust', 'Combo', '', '2015-05-27 22:20:41', ''),
(552, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL JunW1 140 calls', '1.00', '', '', '', '', '', '', '4 x AAPL Aug 135 calls', '6.10', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-04-28', 'Adjust', 'Call Spread', '', '2015-05-27 22:21:25', ''),
(553, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL JunW1 120 puts', '1.77', '-4 x AAPL Jun 140 calls', '0.83', '-4 x AAPL Aug 155 calls', '0.79', '', '', '4 x AAPL JunW1 140 calls', '0.49', '1 x AAPL JunW1 110 put', '0.42', '1 x AAPL JunW1 130 put', '6.45', '4 x AAPL Aug 170 calls', '0.27', '500', '1500', '', 'Adjust', '2015-04-30', 'Adjust', 'Combo', '', '2015-05-27 22:22:13', ''),
(554, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL JunW1 130 put', '5.15', '', '', '', '', '', '', '1 x AAPL JunW1 110 put', '0.36', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-01', 'Adjust', 'Call Spread', '', '2015-05-27 22:22:52', ''),
(555, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL JunW1 135 calls', '0.67', '', '', '', '', '', '', '2 x AAPL JunW1 145 calls', '0.10', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-05', 'Adjust', 'Call Spread', '', '2015-05-27 22:23:33', ''),
(556, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL JunW1 135 calls', '0.56', '', '', '', '', '', '', '4 x AAPL Aug 155 calls', '0.53', '1 x AAPL MayW2 120 put', '0.29', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-06', 'Adjust', 'Call Spread', '', '2015-05-27 22:24:18', ''),
(557, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL Aug 145 calls', '1.24', '', '', '', '', '', '', '4 x AAPL Jun 140 calls', '0.33', '4 x AAPL Aug 170 calls', '0.09', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-12', 'Adjust', 'Combo', '', '2015-05-27 22:25:03', ''),
(558, 524, 'At Risk', '', 'AAPL', '132.04', '-3 x AAPL JunW2 120 puts', '0.65', '', '', '', '', '', '', '1 x AAPL MayW4 120 put', '0.11', '3 x AAPL JunW2 105 puts', '0.11', '6 x AAPL JunW1 140 calls', '0.13', '', '', '500', '1500', '', 'Adjust', '2015-05-14', 'Adjust', 'Combo', '', '2015-05-27 22:25:43', ''),
(559, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL JunW1 125 put', '0.63', '', '', '', '', '', '', '1 x AAPL JunW1 135 call', '0.58', '1 x AAPL JunW1 120 put', '0.20', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-18', 'Adjust', 'Combo', '', '2015-05-27 22:26:15', ''),
(560, 524, 'In Trouble', '', 'AAPL', '132.04', '', '', '', '', '', '', '', '', '1 x AAPL JunW1 120 put', '0.16', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-19', 'Adjust', 'Put', '', '2015-05-27 22:27:08', ''),
(561, 524, 'In Trouble', '', 'AAPL', '132.04', '-1 x AAPL JunW2 125 put', '0.68', '', '', '', '', '', '', '1 x AAPL JunW1 135 call', '0.37', '1 x AAPL JunW2 120 put', '0.25', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-20', 'Adjust', 'Combo', '', '2015-05-27 22:28:00', ''),
(562, 524, 'At Risk', '', 'AAPL', '132.04', '-1 x AAPL JunW2 125 put', '0.51', '', '', '', '', '', '', '2 x AAPL JunW1 135 calls', '0.52', '1 x AAPL JunW2 120 put', '0.16', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-21', 'Adjust', 'Combo', '', '2015-05-27 22:28:59', ''),
(563, 524, 'At Risk', '', 'AAPL', '132.04', '-4 x AAPL Aug 150 calls', '1.01', '', '', '', '', '', '', '1 x AAPL JunW1 125 put', '0.15', '1 x AAPL JunW2 120 put', '0.10', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-22', 'Adjust', 'Combo', '', '2015-05-27 22:29:46', ''),
(564, 524, 'In Trouble', '', 'AAPL', '132.04', '-2 x AAPL JunW2 135 calls', '0.58', '', '', '', '', '', '', '1 x AAPL MayW5 125 put', '0.14', '2 x AAPL JunW2 145 calls', '0.04', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-26', 'Adjust', 'Combo', '', '2015-05-27 22:30:26', ''),
(565, 524, 'At Risk', '', 'AAPL', '132.04', '-2 x AAPL JunW1 110 puts', '0.02', '-6 x AAPL JunW1 140 calls', '0.02', '-4 x AAPL Aug 170 calls', '0.08', '', '', '2 x AAPL JunW1 135 calls', '0.39', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-27', 'Adjust', 'Combo', '', '2015-05-27 22:31:07', ''),
(566, 524, 'Open', '', 'AAPL', '132.04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '1500', '', '', '2015-05-27', 'None', 'Combo', '', '2015-05-27 22:36:46', ''),
(567, 524, 'Open', '', 'AAPL', '131.41', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '1500', '', '', '2015-05-28', 'None', 'Combo', '', '2015-05-28 15:07:48', ''),
(568, 524, 'At Risk', '', 'AAPL', '131.66', '-2 x AAPL JunW2 145 calls', '0.01', '', '', '', '', '', '', '2 x AAPL JunW2 140 calls', '0.10', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-28', 'Adjust', 'Call Spread', '', '2015-05-28 18:33:50', ''),
(569, 524, 'At Risk', '', 'AAPL', '131.76', '-1 x AAPL JunW2 130 put', '1.23', '', '', '', '', '', '', '1 x AAPL JunW2 125 put', '0.32', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-05-28', 'Adjust', 'Put Spread', '', '2015-05-28 19:01:06', ''),
(1086, 500, 'In Trouble', '', 'ADSK', '46.62', '', '', '', '', '', '', '', '', '44 x ADSK Oct 47.5 puts', '2.22', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-17', 'Adjust', 'Put', '', '2015-09-18 18:49:44', ''),
(772, 524, 'In Trouble', '', 'AAPL', '126.57', '-1 x AAPL Aug 140 call', '0.65', '', '', '', '', '', '', '1 x AAPL Jul 120 put', '0.38', '', '', '', '', '', '', '1200', '0', '', 'Adjust', '2015-06-26', 'Adjust', 'Combo', '', '2015-06-26 18:13:02', ''),
(769, 689, 'In Trouble', '', 'BABA', '83.61', '-2 x BABA Jul 85 calls', '1.17', '', '', '', '', '', '', '2 x BABA JulW2 87.5 calls', '0.31', '', '', '', '', '', '', '50', '293', '', 'Adjust', '2015-06-26', 'Adjust', 'Call Spread', '', '2015-06-26 16:03:07', ''),
(598, 500, 'Open', '', 'ADSK', '54.47', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '90', '', '', '2015-06-01', 'None', 'Call Spread', '', '2015-06-01 22:24:18', ''),
(604, 500, 'Open', '', 'ADSK', '54.94', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '81', '', '', '2015-06-03', 'None', 'Combo', '', '2015-06-03 20:18:41', ''),
(605, 524, 'Open', '', 'AAPL', '130.12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1279', '0', '', '', '2015-06-03', 'None', 'Call Spread', '', '2015-06-03 20:19:28', ''),
(602, 524, 'At Risk', '', 'AAPL', '130.00', '-2 x AAPL Jun 135 calls', '0.45', '', '', '', '', '', '', '2 x AAPL Jun 140 calls', '0.08', '', '', '', '', '', '', '1279', '0', '', 'Adjust', '2015-06-02', 'Adjust', 'Call Spread', '', '2015-06-03 20:07:51', ''),
(603, 500, 'At Risk', '', 'ADSK', '54.98', '-1 x ADSK Oct 65 call', '0.73', '-3 x ADSK Jun 55 puts', '1.02', '', '', '', '', '1 x ADSK Oct 62.5 call', '1.15', '7 x ADSK Jun 52.5 puts', '0.29', '', '', '', '', '50', '81', '', 'Adjust', '2015-06-03', 'Adjust', 'Combo', '', '2015-06-03 20:07:51', ''),
(1114, 983, 'Closed', '', 'EPAM', '200.25', '-3 x EPAM Jan16 75 calls', '7.69', '-3 x EPAM Apr16 95 calls', '2.70', '', '', '', '', '6 x EPAM Jan16 75 puts', '3.80', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-10-13', 'Long/Short ', 'Combo', '', '2015-10-13 20:08:23', ''),
(607, 607, 'New', 'XLV Option Trade ', 'XLV', '74.89', '-2 x XLV Mar 69 calls', '1.83', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1500', '', '', '2015-01-06', 'Short', 'Call', '', '2015-06-03 20:30:53', ''),
(608, 607, 'At Risk', '', 'XLV', '74.89', '-2 x XLV FebW1 71 calls', '0.73', '', '', '', '', '', '', '2 x XLV Mar 69 calls', '2.80', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-01-14', 'Adjust', 'Call Spread', '', '2015-06-03 20:33:34', ''),
(609, 607, 'At Risk', '', 'XLV', '74.89', '', '', '', '', '', '', '', '', '2 x XLV FebW1 71 calls', '0.62', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-01-27', 'Adjust', 'Call', '', '2015-06-03 20:35:25', ''),
(610, 607, 'At Risk', '', 'XLV', '74.89', '', '', '', '', '', '', '', '', '2 x XLV FebW1 71 calls', '0.62', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-01-27', 'Adjust', 'Call', '', '2015-06-03 20:35:59', ''),
(611, 607, 'At Risk', '', 'XLV', '74.89', '-2 x XLV Mar 72 calls', '0.98', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-01-28', 'Adjust', 'Call', '', '2015-06-03 20:37:21', ''),
(612, 607, 'In Trouble', '', 'XLV', '74.89', '', '', '', '', '', '', '', '', '2 x XLV Mar 72 calls', '0.33', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-02-09', 'Adjust', 'Call', '', '2015-06-03 20:37:57', ''),
(613, 607, 'In Trouble', '', 'XLV', '74.89', '-2 x XLV Mar 61 calls', '9.13', '', '', '', '', '', '', '2 x XLV MarW4 70 calls', '1.56', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-02-11', 'Adjust', 'Call Spread', '', '2015-06-03 20:38:54', ''),
(614, 607, 'At Risk', '', 'XLV', '74.89', '-4 x XLV MarW4 73 calls', '0.41', '', '', '', '', '', '', '2 x XLV MarW4 74 calls', '0.22', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-02-18', 'Adjust', 'Call Combo', '', '2015-06-03 20:39:53', ''),
(615, 607, 'At Risk', '', 'XLV', '74.89', '-2 x XLV MarW4 70 calls', '2.79', '-2 x XLV MarW4 74 calls', '0.31', '', '', '', '', '4 x XLV MarW4 73 calls', '0.71', '', '', '', '', '', '', '100', '1500', '', 'Adjust', '2015-02-26', 'Adjust', 'Call Combo', '', '2015-06-03 20:40:40', ''),
(616, 607, 'Closed', '', 'XLV', '', '', '', '', '', '', '', '', '', '', '1235.16', '', '', '', '', '', '', '100', '1500', '', '', '2015-06-26', 'Closed', 'Long', '1403.14', '2015-06-03 20:44:01', '14%'),
(617, 617, 'New', 'BBH Option Trade ', 'BBH', 'Not Found', '-1 x BBH Feb 127 call', '1.15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '3000', '', '', '2015-01-15', 'Short', 'Call', '', '2015-06-03 20:47:29', ''),
(618, 617, 'In Trouble', '', 'BBH', 'Not Found', '-2 x BBH Feb 122 calls', '3.05', '', '', '', '', '', '', '2 x BBH Jun 122 calls', '9.30', '', '', '', '', '', '', '500', '3000', '', 'Adjust', '2015-02-02', 'Adjust', 'Call Spread', '', '2015-06-03 20:49:41', ''),
(619, 617, 'In Trouble', '', 'BBH', 'Not Found', '', '', '', '', '', '', '', '', '2 x BBH Feb 122 calls', '1.20', '1 x BBH Feb 127 call', '0.55', '', '', '', '', '500', '3000', '', 'Adjust', '2015-02-03', 'Adjust', 'Call Combo', '', '2015-06-03 20:50:50', ''),
(620, 617, 'At Risk', '', 'BBH', 'Not Found', '-1 x BBH Mar 96 call', '22.30', '-2 x BBH Feb 125 calls', '0.55', '', '', '', '', '', '', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-04', 'Adjust', 'Call Combo', '', '2015-06-03 20:51:32', ''),
(621, 617, 'At Risk', '', 'BBH', 'Not Found', '-1 x BBH Mar 127 call', '2.55', '', '', '', '', '', '', '2 x BBH Feb 125 calls', '1.05', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-19', 'Adjust', 'Call Combo', '', '2015-06-03 20:53:04', ''),
(622, 617, 'In Trouble', '', 'BBH', 'Not Found', '-1 x BBH Jun 122 call', '11.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-23', 'Adjust', 'Call', '', '2015-06-03 20:53:46', ''),
(623, 617, 'At Risk', '', 'BBH', 'Not Found', '-1 x BBH Jun 122 call', '11.80', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '1500', '', 'Adjust', '2015-02-25', 'Adjust', 'Call', '', '2015-06-03 20:54:46', ''),
(624, 617, 'Closed', '', 'BBH', '', '', '', '', '', '', '', '', '', '', '3005', '', '', '', '', '', '', '500', '1500', '', '', '2015-06-26', 'Closed', 'Long', '3532', '2015-06-03 20:56:25', '18%'),
(1087, 872, 'In Trouble', '', 'AAPL', '113.83', '-10 x AAPL OctW2 110 calls', '6.86', '-10 x AAPL OctW2 115 calls', '3.42', '', '', '', '', '20 x AAPL Sep 115 calls', '1.32', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-09-17', 'Adjust', 'Combo', '', '2015-09-18 18:52:20', ''),
(632, 524, 'Open', '', 'AAPL', '167.45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1279', '0', '', '', '2015-06-05', 'None', 'Combo', '', '2015-06-05 21:44:56', ''),
(770, 500, 'In Trouble', '', 'ADSK', '52.15', '-3 x ADSK Aug 55 calls', '1.17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '850', '', 'Adjust', '2015-06-26', 'Adjust', 'Call', '', '2015-06-26 17:11:33', ''),
(633, 524, 'At Risk', '', 'AAPL', '127.99', '-4 x AAPL Aug 140 calls', '1.58', '', '', '', '', '', '', '4 x AAPL Aug 145 calls', '0.87', '', '', '', '', '', '', '1279', '0', '', 'Adjust', '2015-06-08', 'Adjust', 'Call', '', '2015-06-08 18:36:26', ''),
(652, 524, 'Open', '', 'AAPL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '0', '', '', '2015-06-08', 'None', 'Call', '', '2015-06-08 23:33:16', ''),
(860, 689, 'Open', '', 'BABA', '83.37', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '1050', '', '', '2015-07-17', 'None', 'Long', '', '2015-07-17 20:38:52', ''),
(654, 524, 'Open', '', 'AAPL', '127.80', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '', '', '', '2015-06-08', 'None', 'Call', '', '2015-06-08 23:46:13', ''),
(862, 689, 'In Trouble', '', 'BABA', '82.52', '-15 x BABA JulW5 85 calls', '0.40', '', '', '', '', '', '', '15 x BABA JulW4 85 calls', '0.17', '', '', '', '', '', '', '50', '1050', '', 'Adjust', '2015-07-20', 'Adjust', 'Call Spread', '', '2015-07-20 19:45:07', ''),
(861, 693, 'In Trouble', '', 'AMBA', '118.40', '-1 x AMBA Aug 115 put', '5.50', '', '', '', '', '', '', '1 x AMBA Aug 105 put', '2.30', '', '', '', '', '', '', '100', '1000', '', 'Adjust', '2015-07-20', 'Adjust', 'Put Spread', '', '2015-07-20 15:57:57', ''),
(858, 500, 'Open', '', 'ADSK', '52.19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '250', '1250', '', '', '2015-07-17', 'None', 'Neutral', '', '2015-07-17 20:37:43', ''),
(660, 500, 'At Risk', '', 'ADSK', '54.38', '-2 x ADSK Jun 55 calls', '0.50', '', '', '', '', '', '', '4 x ADSK Jun 52.5 puts', '0.21', '2 x ADSK Jul 55 calls', '1.35', '', '', '', '', '50', '125', '', 'Adjust', '2015-06-11', 'Adjust', 'Call Combo', '', '2015-06-11 17:15:59', ''),
(691, 689, 'At Risk', '', 'BABA', '86.13', '-7 x BABA Jul 82.5 puts', '1.08', '-3 x BABA Jul 85 puts', '1.91', '-2 x BABA Jul 95 calls', '0.45', '', '', '7 x BABA Jul 80 puts', '0.59', '3 x BABA Jul 87.5 puts', '3.20', '2 x BABA Jul 100 calls', '0.19', '', '', '50', '150', '', 'Adjust', '2015-06-15', 'Adjust', 'Combo', '', '2015-06-16 17:00:24', ''),
(690, 689, 'Open', 'BABA Option Trade ', 'BABA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '150', '', '', '2015-06-16', 'None', 'Put Combo', '', '2015-06-16 16:58:22', ''),
(665, 500, 'Open', '', 'ADSK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '125', '', '', '2015-06-11', 'None', 'Call Combo', '', '2015-06-11 20:43:30', ''),
(666, 524, 'At Risk', '', 'AAPL', '127.82', '-4 x AAPL Aug 145 calls', '0.61', '', '', '', '', '', '', '4 x AAPL Aug 170 calls', '0.04', '', '', '', '', '', '', '1175', '0', '', 'Adjust', '2015-06-12', 'Adjust', 'Call Spread', '', '2015-06-12 15:35:11', ''),
(689, 689, 'New', 'BABA Option Trade ', 'BABA', '86.07', '-3 x BABA Jul 87.5 puts', '2.60', '', '', '', '', '', '', '7 x BABA Jul 82.5 puts', '0.88', '', '', '', '', '', '', '50', '150', '', '', '2015-06-11', '', 'Put Combo', '', '2015-06-16 16:57:29', ''),
(671, 524, 'Open', '', 'AAPL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '', '', '', '2015-06-12', 'None', 'Call Spread', '', '2015-06-12 18:45:39', ''),
(857, 500, 'In Trouble', '', 'ADSK', '', '-5 x ADSK Oct 57.5 calls', '1.15', '-5 x ADSK Oct 55 puts', '4.75', '', '', '', '', '5 x ADSK Jul 55 puts', '3.20', '5 x ADSK Aug 52.5 calls', '1.42', '5 x ADSK Jan16 60 calls', '1.48', '', '', '250', '1250', '', 'Adjust', '2015-07-17', 'Adjust', 'Neutral', '', '2015-07-17 17:41:33', ''),
(674, 524, 'At Risk', '', 'AAPL', '127.41', '-1 x AAPL JulW2 130 call', '1.55', '-2 x AAPL JulW2 115 puts', '0.19', '', '', '', '', '1 x AAPL JulW2 135 call', '0.42', '2 x AAPL JulW2 120 puts', '0.58', '', '', '', '', '1175', '0', '', 'Adjust', '2015-06-12', 'Adjust', 'Combo', '', '2015-06-12 18:54:02', ''),
(675, 500, 'In Trouble', '', 'ADSK', '53.99', '-2 x ADSK Jul 55 calls', '1.10', '', '', '', '', '', '', '2 x ADSK Jun 57.5 calls', '0.12', '', '', '', '', '', '', '50', '125', '', 'Adjust', '2015-06-12', 'Adjust', 'Combo', '', '2015-06-12 18:54:02', ''),
(688, 500, 'Open', '', 'ADSK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '125', '', '', '2015-06-15', 'None', 'Put Combo', '', '2015-06-15 21:20:17', ''),
(687, 500, 'In Trouble', '', 'ADSK', '53.57', '-16 x ADSK Jun 52.5 puts', '0.23', '', '', '', '', '', '', '12 x ADSK Jun 50 puts', '0.06', '4 x ADSK Jun 55 puts', '1.74', '', '', '', '', '50', '125', '', 'Adjust', '2015-06-15', 'Adjust', 'Put Combo', '', '2015-06-15 18:01:53', ''),
(685, 524, 'Open', '', 'AAPL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '0', '', '', '2015-06-12', 'None', 'Combo', '', '2015-06-12 22:11:06', ''),
(686, 500, 'Open', '', 'ADSK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '125', '', '', '2015-06-12', 'None', 'Combo', '', '2015-06-12 22:11:27', ''),
(692, 689, 'Open', '', 'BABA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '150', '', '', '2015-06-16', 'None', 'Combo', '', '2015-06-16 17:01:29', ''),
(693, 693, 'New', 'AMBA Option Trade ', 'AMBA', '117.90', '-1 x AMBA Jun 120 call', '1.50', '', '', '', '', '', '', '1 x AMBA Aug 115 call', '11.60', '', '', '', '', '', '', '200', '1000', '', '', '2015-06-16', 'Long', 'Call Spread', '', '2015-06-16 18:50:31', ''),
(694, 693, 'Open', 'AMBA Option Trade ', 'AMBA', '119.72', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '1000', '', '', '2015-06-17', 'None', 'Call Spread', '', '2015-06-17 15:14:17', ''),
(695, 693, 'At Risk', '', 'AMBA', '122.25', '-2 x AMBA JunW4 125 calls', '2.80', '', '', '', '', '', '', '1 x AMBA Jun 120 call', '3.50', '1 x AMBA Aug 120 call', '11.40', '', '', '', '', '200', '1000', '', 'Adjust', '2015-06-17', 'Adjust', 'Call Combo', '', '2015-06-17 18:16:55', ''),
(696, 696, 'New', 'FB Option Trade', 'FB', '82.01', '-4 x FB Jul 82.5 calls', '1.62', '', '', '', '', '', '', '4 x FB Jul 80 calls', '3.15', '', '', '', '', '', '', '175', '618', '', '', '2015-06-17', 'Long', 'Call Spread', '', '2015-06-17 19:06:06', ''),
(697, 696, 'Open', 'FB Option Trade', 'FB', '82.96', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '175', '618', '', '', '2015-06-18', 'None', 'Call Spread', '', '2015-06-18 14:28:29', ''),
(698, 693, 'Open', '', 'AMBA', '123.84', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '1000', '', '', '2015-06-18', 'None', 'Call Combo', '', '2015-06-18 14:28:55', ''),
(699, 500, 'In Trouble', '', 'ADSK', '54.24', '-2 x ADSK Jul 52.5 puts', '0.72', '', '', '', '', '', '', '3 x ADSK Jun 55 calls', '0.10', '4 x ADSK Jun 52.5 puts', '0.04', '2 x ADSK Jul 50 puts', '0.31', '', '', '50', '125', '', 'Adjust', '2015-06-18', 'Adjust', 'Combo', '', '2015-06-18 15:51:02', ''),
(700, 693, 'At Risk', '', 'AMBA', '127.13', '-2 x AMBA JulW1 135 calls', '1.70', '-2 x AMBA Aug 130 calls', '9.10', '', '', '', '', '2 x AMBA JunW4 125 calls', '5.30', '2 x AMBA JulW1 145 calls', '0.95', '', '', '', '', '200', '500', '', 'Adjust', '2015-06-18', 'Adjust', 'Combo', '', '2015-06-18 16:01:12', ''),
(701, 696, 'In Trouble', '', 'FB', '82.94', '-4 x FB Jul 87.5 calls', '0.36', '', '', '', '', '', '', '4 x FB Jul 90 calls', '0.13', '', '', '', '', '', '', '145', '585', '', 'Adjust', '2015-06-18', 'Adjust', 'Call Spread', '', '2015-06-18 16:27:29', ''),
(1040, 915, 'Closed', '', 'CNC', '59.75', '-13 x CNC Sep 60 calls', '2.06', '-13 x CNC Dec 62.5 calls', '4.15', '', '', '', '', '13 x CNC Sep 62.5 calls', '0.98', '3 x CNC Sep 67.5 calls', '0.20', '13 x CNC Sep 72.5 calls', '0.05', '', '', '200', '662', '', 'Adjust', '2015-09-04', 'Adjust', 'Combo', '', '2015-09-04 19:28:51', ''),
(703, 703, 'New', 'ROSC Option Trade', 'ROST', '50.02', '-1 x ROST Aug 52.5 call', '0.95', '', '', '', '', '', '', '1 x ROST Aug 42.5 call', '8.10', '', '', '', '', '', '', '200', '700', '', '', '2015-06-18', '', 'Call Combo', '', '2015-06-18 18:38:03', ''),
(704, 500, 'Open', '', 'ADSK', '54.14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '125', '', '', '2015-06-18', 'None', 'Combo', '', '2015-06-18 20:04:11', ''),
(705, 693, 'Open', '', 'AMBA', '126.53', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '500', '', '', '2015-06-18', 'None', 'Combo', '', '2015-06-18 20:04:43', ''),
(707, 696, 'Open', '', 'FB', '82.83', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '145', '585', '', '', '2015-06-18', 'None', 'Call Spread', '', '2015-06-18 20:06:06', ''),
(708, 703, 'Open', 'ROSC Option Trade', 'ROST', '50.15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '700', '', '', '2015-06-18', 'None', 'Call Combo', '', '2015-06-18 20:06:39', ''),
(709, 693, 'At Risk', '', 'AMBA', '120.40', '-2 x AMBA JulW1 145 calls', '0.30', '-2 x AMBA Aug 135 calls', '4.40', '-2 x AMBA Aug 145 calls', '2.20', '', '', '2 x AMBA JulW1 135 calls', '1.60', '2 x AMBA Aug 130 calls', '7.00', '2 x AMBA Aug 165 calls', '1.75', '', '', '200', '500', '', 'Adjust', '2015-06-19', 'Adjust', 'Combo', '', '2015-06-19 15:55:18', ''),
(710, 524, 'At Risk', '', 'AAPL', '126.93', '-2 x AAPL Aug 145 calls', '0.35', '', '', '', '', '', '', '1 x AAPL JulW2 130 call', '0.85', '4 x AAPL JulW2 135 calls', '0.14', '4 x AAPL JulW2 125 puts', '1.27', '4 x AAPL Aug 140 calls', '0.80', '1175', '200', '', 'Adjust', '2015-06-19', 'Adjust', 'Combo', '', '2015-06-19 18:18:15', ''),
(711, 524, 'At Risk', '', 'AAPL', '126.91', '-1 x AAPL JulW2 135 call', '0.12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '0', '', 'Adjust', '2015-06-19', 'Adjust', 'Call', '', '2015-06-19 18:27:35', ''),
(712, 500, 'In Trouble', '', 'ADSK', '53.55', '-5 x ADSK Jul 57.5 calls', '0.19', '', '', '', '', '', '', '5 x ADSK Jul 65 calls', '0.05', '', '', '', '', '', '', '50', '200', '', 'Adjust', '2015-06-19', 'Adjust', 'Call Spread', '', '2015-06-19 18:37:39', ''),
(713, 689, 'In Trouble', '', 'BABA', '85.45', '-2 x BABA Jul 92.5 calls', '0.34', '-7 x BABA Jul 80 puts', '0.43', '-5 x BABA Jul 82.5 puts', '0.93', '', '', '1 x BABA JunW4 82.5 put', '0.18', '1 x BABA JulW1 82.5 put', '0.42', '2 x BABA Jul 95 calls', '0.19', '7 x BABA Jul 77.5 puts', '0.21', '50', '175', '', 'Adjust', '2015-06-19', 'Adjust', 'Combo', '', '2015-06-19 18:50:26', ''),
(714, 500, 'In Trouble', '', 'ADSK', '53.55', '-10 x ADSK Jul 47.5 puts', '0.12', '', '', '', '', '', '', '5 x ADSK Jul 50 puts', '0.31', '', '', '', '', '', '', '50', '200', '', 'Adjust', '2015-06-19', 'Adjust', 'Put Combo', '', '2015-06-19 19:21:38', ''),
(1039, 689, 'In Trouble', '', 'BABA', '64.15', '-126 x BABA SepW2 65 calls', '1.59', '', '', '', '', '', '', '126 x BABA SepW2 67.5 calls', '0.53', '126 x BABA SepW2 75 calls', '0.09', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-04', 'Adjust', 'Combo', '', '2015-09-04 19:28:51', ''),
(717, 500, 'Open', '', 'ADSK', '53.57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '200', '', '', '2015-06-19', 'None', 'Put Combo', '', '2015-06-19 20:53:39', ''),
(718, 689, 'Open', '', 'BABA', '85.62', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '175', '', '', '2015-06-19', 'None', 'Combo', '', '2015-06-19 20:54:00', ''),
(719, 524, 'Open', '', 'AAPL', '126.60', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '0', '', '', '2015-06-19', 'None', 'Call', '', '2015-06-19 20:54:22', ''),
(720, 693, 'Open', '', 'AMBA', '119.35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '500', '', '', '2015-06-19', 'None', 'Combo', '', '2015-06-19 20:54:48', ''),
(721, 524, 'At Risk', '', 'AAPL', '128.00', '-11 x AAPL JulW2 115 puts', '0.09', '-8 x AAPL Aug 140 calls', '0.77', '-4 x AAPL Aug 120 puts', '1.79', '', '', '4 x AAPL Aug 145 calls', '0.34', '4 x AAPL Aug 165 calls', '0.03', '4 x AAPL Aug 110 puts', '0.46', '', '', '1175', '0', '', 'Adjust', '2015-06-22', 'Adjust', 'Combo', '', '2015-06-22 15:58:30', ''),
(722, 500, 'In Trouble', '', 'ADSK', '54.51', '', '', '', '', '', '', '', '', '5 x ADSK Aug 57.5 calls', '1.29', '', '', '', '', '', '', '500', '325', '', 'Adjust', '2015-06-22', 'Adjust', 'Call', '', '2015-06-22 17:28:04', ''),
(723, 696, 'At Risk', '', 'FB', '84.49', '-4 x FB Jul 80 calls', '4.80', '-4 x FB Jul 85 calls', '1.36', '', '', '', '', '8 x FB Jul 82.5 calls', '2.86', '', '', '', '', '', '', '100', '75', '', 'Adjust', '2015-06-22', 'Adjust', 'Call Combo', '', '2015-06-22 18:06:48', ''),
(724, 693, 'In Trouble', '', 'AMBA', '95.97', '-1 x AMBA JulW2 115 call', '1.05', '-1 x AMBA JulW2 130 call', '0.30', '-2 x AMBA Aug 165 calls', '0.05', '', '', '2 x AMBA Aug 135 calls', '1.40', '2 x AMBA Aug 145 calls', '1.00', '', '', '', '', '350', '1000', '', 'Adjust', '2015-06-22', 'Adjust', 'Call Combo', '', '2015-06-22 19:04:31', ''),
(725, 693, 'Open', '', 'AMBA', '94.36', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '350', '1000', '', '', '2015-06-22', 'None', 'Call Combo', '', '2015-06-22 22:00:11', ''),
(726, 696, 'Open', '', 'FB', '84.74', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '75', '', '', '2015-06-22', 'None', 'Call Combo', '', '2015-06-22 22:00:40', ''),
(727, 500, 'Open', '', 'ADSK', '54.55', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '500', '325', '', '', '2015-06-22', 'None', 'Call', '', '2015-06-22 22:01:03', ''),
(728, 524, 'Open', '', 'AAPL', '127.61', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1175', '0', '', '', '2015-06-22', 'None', 'Combo', '', '2015-06-22 22:01:32', ''),
(729, 696, 'In Trouble', '', 'FB', '87.24', '-6 x FB JulW2 85 puts', '0.67', '-4 x FB Jul 82.5 calls', '5.25', '', '', '', '', '1 x FB JunW4 85 put', '0.17', '1 x FB JulW1 85 put', '0.43', '6 x FB JulW2 77.5 puts', '0.06', '4 x FB Jul 85 calls', '3.35', '50', '50', '', 'Adjust', '2015-06-23', 'Adjust', 'Combo', '', '2015-06-23 16:08:53', ''),
(730, 689, 'In Trouble', '', 'BABA', '85.19', '-2 x BABA Jul 90 calls', '0.41', '', '', '', '', '', '', '2 x BABA Jul 92.5 calls', '0.20', '', '', '', '', '', '', '50', '100', '', 'Adjust', '2015-06-23', 'Adjust', 'Call Spread', '', '2015-06-23 16:24:26', ''),
(731, 693, 'In Trouble', '', 'AMBA', '101.77', '-1 x AMBA JulW2 100 put', '5.20', '', '', '', '', '', '', '1 x AMBA Aug 100 put', '9.50', '', '', '', '', '', '', '200', '856', '', 'Adjust', '2015-06-23', 'Adjust', 'Put Spread', '', '2015-06-23 17:11:23', ''),
(1038, 872, 'In Trouble', '', 'AAPL', '109.09', '-4 x AAPL SepW2 110 calls', '2.12', '', '', '', '', '', '', '4 x AAPL SepW2 120 calls', '0.06', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-09-04', 'Adjust', 'Call Spread', '', '2015-09-04 19:28:51', ''),
(1036, 983, 'At Risk', '', 'EPAM', '69.53', '-3 x EPAM Jan16 80 calls', '2.45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-09-03', 'Adjust', 'Combo', '', '2015-09-03 19:38:03', ''),
(1037, 500, 'In Trouble', '', 'ADSK', '45.41', '', '', '', '', '', '', '', '', '20 x ADSK Sep 50 calls', '0.19', '10 x ADSK Sep 52.5 calls', '0.07', '25 x ADSK Sep 45 puts', '0.95', '25 x ADSK Jan16 45 puts', '3.45', '250', '1000', '', 'Adjust', '2015-09-04', 'Adjust', 'Combo', '', '2015-09-04 19:23:41', ''),
(736, 500, 'In Trouble', '', 'ADSK', '54.08', '-2 x ADSK Jul 50 puts', '0.19', '-5 x ADSK Jul 55 puts', '1.65', '', '', '', '', '2 x ADSK Jul 52.5 puts', '0.64', '5 x ADSK Aug 55 puts', '2.88', '', '', '', '', '100', '500', '', 'Adjust', '2015-06-23', 'Adjust', 'Combo', '', '2015-06-23 18:47:07', ''),
(1035, 872, 'In Trouble', '', 'AAPL', '110.57', '-2 x AAPL Oct 130 calls', '0.38', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-09-03', 'Adjust', 'Combo', '', '2015-09-03 19:38:03', ''),
(738, 500, 'Open', '', 'ADSK', '54.05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '500', '', '', '2015-06-23', 'None', 'Combo', '', '2015-06-23 20:04:05', ''),
(739, 693, 'Open', '', 'AMBA', '102.28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '856', '', '', '2015-06-23', 'None', 'Put Spread', '', '2015-06-23 20:04:24', ''),
(740, 689, 'Open', '', 'BABA', '85.08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '100', '', '', '2015-06-23', 'None', 'Call Spread', '', '2015-06-23 20:04:49', ''),
(741, 696, 'Open', '', 'FB', '87.71', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '50', '', '', '2015-06-23', 'None', 'Combo', '', '2015-06-23 20:05:38', ''),
(743, 703, 'In Trouble', '', 'ROST', '49.92', '-1 x ROST Aug 50 call', '1.75', '', '', '', '', '', '', '1 x ROST Aug 52.5 call', '0.90', '', '', '', '', '', '', '100', '600', '', 'Adjust', '2015-06-25', 'Adjust', 'Call Spread', '', '2015-06-25 18:37:37', ''),
(1032, 689, 'In Trouble', '', 'BABA', '66.20', '', '', '', '', '', '', '', '', '63 x BABA SepW2 65 calls', '2.44', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-03', 'Adjust', 'Combo', '', '2015-09-03 19:38:03', ''),
(745, 500, 'In Trouble', '', 'ADSK', '53.39', '-5 x ADSK Jul 57.5 calls', '0.18', '-5 x ADSK Jul 52.5 puts', '0.83', '', '', '', '', '5 x ADSK Jul 65 calls', '0.07', '5 x ADSK Aug 52.5 puts', '1.95', '', '', '', '', '100', '500', '', 'Adjust', '2015-06-25', 'Adjust', 'Call Combo', '', '2015-06-25 18:52:29', ''),
(746, 693, 'In Trouble', '', 'AMBA', '103.33', '-1 x AMBA JulW2 115 call', '0.95', '', '', '', '', '', '', '1 x AMBA JulW1 130 call', '0.10', '', '', '', '', '', '', '100', '950', '', 'Adjust', '2015-06-25', 'Adjust', 'Call Spread', '', '2015-06-25 19:26:21', ''),
(747, 693, 'Open', '', 'AMBA', '104.72', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '950', '', '', '2015-06-25', 'None', 'Call Spread', '', '2015-06-25 20:34:39', ''),
(748, 500, 'Open', '', 'ADSK', '53.30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '500', '', '', '2015-06-25', 'None', 'Call Combo', '', '2015-06-25 20:35:06', ''),
(749, 703, 'Open', '', 'ROST', '125.66', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '600', '', '', '2015-07-14', 'None', 'Long', '', '2015-06-25 20:35:22', ''),
(1033, 915, 'In Trouble', '', 'CNC', '59.94', '-13 x CNC Sep 62.5 calls', '0.98', '-3 x CNC Sep 60 puts', '1.68', '', '', '', '', '13 x CNC Sep 60 calls', '2.14', '3 x CNC Sep 62.5 puts', '3.13', '', '', '', '', '200', '662', '', 'Adjust', '2015-09-03', 'Adjust', 'Combo', '', '2015-09-03 19:38:03', ''),
(781, 696, 'In Trouble', '', 'FB', '86.51', '-2 x FB Jul 90 calls', '0.69', '', '', '', '', '', '', '2 x FB JulW2 92.5 calls', '0.13', '', '', '', '', '', '', '50', '160', '', 'Adjust', '2015-06-29', 'Adjust', 'Combo', '', '2015-06-29 17:25:16', ''),
(782, 500, 'In Trouble', '', 'ADSK', '50.72', '-5 x ADSK Aug 55 puts', '5.10', '', '', '', '', '', '', '5 x ADSK Aug 57.5 puts', '7.30', '', '', '', '', '', '', '', '', '', '', '2015-06-29', '', '', '', '2015-06-29 18:08:25', ''),
(783, 500, 'Open', '', 'ADSK', '50.68', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '75', '875', '', '', '2015-06-29', 'None', 'Long', '', '2015-06-29 18:11:02', ''),
(784, 696, 'Open', '', 'FB', '86.06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '160', '', '', '2015-06-29', 'None', 'Combo', '', '2015-06-29 19:26:14', ''),
(786, 696, 'At Risk', '', 'FB', '86.06', '-2 x FB Jul 90 calls', '0.56', '', '', '', '', '', '', '2 x FB JulW2 95 calls', '0.03', '', '', '', '', '', '', '100', '300', '', 'Adjust', '2015-06-30', 'Adjust', 'Call Spread', '', '2015-06-30 14:55:59', ''),
(787, 500, 'In Trouble', '', 'ADSK', '50.01', '-5 x ADSK Aug 52.5 calls', '1.35', '-5 x ADSK Aug 52.5 puts', '3.80', '', '', '', '', '10 x ADSK Jul 57.5 calls', '0.14', '3 x ADSK Aug 55 calls', '0.77', '5 x ADSK Oct 52.5 puts', '4.65', '', '', '250', '1250', '', 'Adjust', '2015-06-30', 'Adjust', 'Combo', '', '2015-06-30 15:41:21', ''),
(789, 689, 'In Trouble', '', 'BABA', '82.26', '-1 x BABA JulW1 82.5 put', '0.67', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '275', '', 'Adjust', '2015-06-30', 'Adjust', 'Put', '', '2015-06-30 18:45:15', ''),
(790, 689, 'Open', '', 'BABA', '82.27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '275', '', '', '2015-06-30', 'None', 'Put', '', '2015-06-30 20:09:35', ''),
(872, 872, 'New', 'APPL Option Trade', 'AAPL', '125.05', '', '', '', '', '', '', '', '', '2 x AAPL Oct 130 calls', '3.05', '', '', '', '', '', '', '400', '611', '', '', '2015-07-22', 'Long', 'Call', '', '2015-07-22 19:26:28', ''),
(792, 500, 'Open', '', 'ADSK', '50.08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '250', '1250', '', '', '2015-06-30', 'None', 'Combo', '', '2015-06-30 20:10:23', ''),
(793, 696, 'Open', '', 'FB', '85.76', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '300', '', '', '2015-06-30', 'None', 'Call Spread', '', '2015-06-30 20:10:47', ''),
(794, 689, 'In Trouble', '', 'BABA', '82.06', '-2 x BABA Jul 77.5 puts', '0.31', '-4 x BABA JulW4 85 calls', '0.83', '', '', '', '', '2 x BABA Jul 85 calls', '0.57', '2 x BABA Jul 90 calls', '0.09', '', '', '', '', '50', '275', '', 'Adjust', '2015-07-01', 'Adjust', 'Combo', '', '2015-07-01 18:38:16', ''),
(795, 693, 'In Trouble', '', 'AMBA', '101.63', '-4 x AMBA Aug 125 calls', '1.65', '-1 x AMBA Aug 95 put', '5.10', '', '', '', '', '2 x AMBA JulW2 115 calls', '0.40', '1 x AMBA JulW2 130 call', '0.15', '1 x AMBA JulW2 100 put', '2.70', '2 x AMBA Aug 155 calls', '0.50', '100', '950', '', 'Adjust', '2015-07-01', 'Adjust', 'Combo', '', '2015-07-01 18:38:16', ''),
(796, 689, 'Open', '', 'BABA', '82.44', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '275', '', '', '2015-07-01', 'None', 'Combo', '', '2015-07-01 22:06:05', ''),
(797, 693, 'Open', '', 'AMBA', '101.88', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '950', '', '', '2015-07-01', 'None', 'Combo', '', '2015-07-01 22:06:30', ''),
(798, 693, 'In Trouble', '', 'AMBA', '100.24', '-1 x AMBA JulW5 95 put', '3.90', '-2 x AMBA Aug 130 calls', '0.85', '-2 x AMBA Aug 140 calls', '0.40', '', '', '', '', '', '', '', '', '', '', '100', '1000', '', 'Adjust', '2015-07-02', 'Adjust', 'Combo', '', '2015-07-02 15:42:40', ''),
(799, 693, 'Open', '', 'AMBA', '100.49', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1000', '', '', '2015-07-02', 'None', 'Combo', '', '2015-07-02 19:28:30', ''),
(800, 693, 'At Risk', '', 'AMBA', '101.03', '-2 x AMBA JulW4 105 calls', '2.90', '-2 x AMBA JulW4 100 puts', '4.20', '', '', '', '', '2 x AMBA JulW4 80 puts', '0.50', '2 x AMBA Aug 125 calls', '1.50', '', '', '', '', '100', '1000', '', 'Adjust', '2015-07-06', 'Adjust', 'Combo', '', '2015-07-06 18:35:22', ''),
(801, 689, 'At Risk', '', 'BABA', '80.25', '-3 x BABA JulW4 80 calls', '1.86', '-1 x BABA JulW4 82.5 call', '0.81', '', '', '', '', '4 x BABA JulW4 85 calls', '0.31', '', '', '', '', '', '', '50', '275', '', 'Adjust', '2015-07-06', 'Adjust', 'Combo', '', '2015-07-06 18:35:22', ''),
(802, 696, 'At Risk', '', 'FB', '86.91', '', '', '', '', '', '', '', '', '1 x FB JulW2 87.5 call', '0.75', '1 x FB Jul 85 call', '2.81', '', '', '', '', '100', '0', '', 'Adjust', '2015-07-06', 'Adjust', 'Call Spread', '', '2015-07-06 18:35:22', ''),
(803, 689, 'Open', '', 'BABA', '80.20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '275', '', '', '2015-07-06', 'None', 'Combo', '', '2015-07-06 20:26:32', ''),
(804, 693, 'Open', '', 'AMBA', '101.87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1000', '', 'Adjust', '2015-07-06', 'None', 'Combo', '', '2015-07-06 20:27:11', '');
INSERT INTO `positions` (`ID`, `TradeID`, `Status`, `Title`, `Stock`, `Price`, `Sell`, `PriceSell`, `Sell2`, `PriceSell2`, `Sell3`, `PriceSell3`, `Sell4`, `PriceSell4`, `Buy`, `PriceBuy`, `Buy2`, `PriceBuy2`, `Buy3`, `PriceBuy3`, `Buy4`, `PriceBuy4`, `Gain`, `Loss`, `Margin`, `Notes`, `Date`, `Action`, `Trade`, `SetPrice`, `Timestamp`, `ChangeAmount`) VALUES
(805, 696, 'Open', '', 'FB', '87.56', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '0', '', '', '2015-07-06', 'None', 'Call Spread', '', '2015-07-06 20:27:39', ''),
(806, 524, 'In Trouble', '', 'AAPL', '123.87', '-4 x AAPL Aug 130 calls', '1.98', '', '', '', '', '', '', '9 x AAPL Aug 140 calls', '0.41', '', '', '', '', '', '', '1000', '0', '', 'Adjust', '2015-07-07', 'Adjust', 'Call Spread', '', '2015-07-07 15:35:32', ''),
(807, 689, 'In Trouble', '', 'BABA', '78.49', '-5 x BABA Jul 80 calls', '1.02', '-5 x BABA Jul 77.5 puts', '1.34', '', '', '', '', '5 x BABA Jul 87.5 calls', '0.09', '3 x BABA JulW4 80 calls', '1.44', '1 x BABA JulW4 82.5 call', '0.65', '5 x BABA JulW5 75 puts', '1.19', '50', '450', '', 'Adjust', '2015-07-07', 'Adjust', 'Combo', '', '2015-07-07 16:08:40', ''),
(808, 696, 'In Trouble', '', 'FB', '86.02', '-6 x FB JulW4 82.5 puts', '0.76', '', '', '', '', '', '', '6 x FB JulW2 85 puts', '0.54', '', '', '', '', '', '', '50', '400', '', 'Adjust', '2015-07-07', 'Adjust', 'Combo', '', '2015-07-07 16:08:40', ''),
(809, 524, 'At Risk', '', 'AAPL', '125.59', '-2 x AAPL JulW2 120 puts', '0.05', '-1 x AAPL Jul 120 put', '0.21', '', '', '', '', '', '', '', '', '', '', '', '', '1000', '0', '', 'Adjust', '2015-07-07', 'Adjust', 'Put Combo', '', '2015-07-07 19:04:42', ''),
(810, 500, 'In Trouble', '', 'ADSK', '53.45', '-5 x ADSK Aug 55 puts', '3.15', '', '', '', '', '', '', '2 x ADSK Jul 52.5 puts', '0.66', '', '', '', '', '', '', '150', '1250', '', 'Adjust', '2015-07-07', 'Adjust', 'Put Combo', '', '2015-07-07 19:21:37', ''),
(811, 500, 'Open', '', 'ADSK', '53.10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-07', 'None', 'Long', '', '2015-07-07 20:17:42', ''),
(812, 524, 'Open', '', 'AAPL', '125.31', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1000', '0', '', '', '2015-07-07', 'None', 'Long', '', '2015-07-07 20:18:08', ''),
(813, 689, 'Open', '', 'BABA', '79.58', '', '', '', '', '', '', '', '', '', '', '', '1.44', '', '', '', '', '50', '650', '', '', '2015-07-07', 'None', 'Neutral', '', '2015-07-07 20:18:57', ''),
(814, 696, 'Open', '', 'FB', '87.12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '0', '', '', '2015-07-07', 'None', 'Neutral', '', '2015-07-07 20:19:35', ''),
(815, 524, 'At Risk', '', 'AAPL', '', '-4 x AAPL JulW4 125 calls', '2.72', '-4 x AAPL JulW4 125 puts', '4.05', '-4 x AAPL Aug 110 puts', '0.84', '', '', '4 x AAPL Aug 130 calls', '1.91', '4 x AAPL Aug 115 puts', '1.68', '4 x AAPL Aug 120 puts', '3.20', '', '', '1000', '', '', 'Adjust ', '2015-07-08', 'Long', 'Combo', '', '2015-07-08 15:50:53', ''),
(816, 689, 'In Trouble', '', 'BABA', '77.87', '-5 x BABA Jul 77.5 calls', '1.71', '', '', '', '', '', '', '5 x BABA Jul 80 calls', '0.67', '', '', '', '', '', '', '50', '750', '', 'Adjust', '2015-07-08', 'Adjust', 'Call Spread', '', '2015-07-08 16:25:50', ''),
(817, 689, 'Open', '', 'BABA', '78.56', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '750', '', '', '2015-07-08', 'None', 'Neutral', '', '2015-07-08 18:01:01', ''),
(818, 524, 'Open', '', 'AAPL', '123.66', '-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '750', '0', '', '', '2015-07-08', 'None', 'Neutral', '', '2015-07-08 18:01:44', ''),
(821, 689, 'Open', '', 'BABA', '80.31', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '950', '', '', '2015-07-10', 'None', 'Long', '', '2015-07-10 16:19:04', ''),
(820, 689, 'In Trouble', '', 'BABA', '80.92', '-5 x BABA Jul 80 calls', '1.91', '', '', '', '', '', '', '5 x BABA Jul 72.5 calls', '8.75', '', '', '', '', '', '', '50', '950', '', 'Adjust', '2015-07-09', 'Adjust', 'Combo', '', '2015-07-09 15:06:32', ''),
(822, 696, 'In Trouble', '', 'FB', '87.84', '-1 x FB JulW2 87.5 call', '0.36', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '0', '', 'Adjust', '2015-07-10', 'Short', 'Call', '', '2015-07-10 16:42:12', ''),
(823, 696, 'Open', '', 'FB', '87.82', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '300', '', '', '', '2015-07-10', 'None', 'Long', '', '2015-07-10 16:43:05', ''),
(824, 696, 'At Risk', '', 'FB', '87.82', '-1 x FB Jul 85 call', '3.25', '', '', '', '', '', '', '4 x FB Jul 87.5 calls', '1.44', '6 x FB JulW4 82.5 puts', '0.25', '', '', '', '', '300', '', '', 'Adjust', '2015-07-10', 'Adjust', 'Close', '', '2015-07-10 17:25:14', ''),
(825, 696, 'Closed', '', 'FB', '87.94', '', '', '', '', '', '', '', '', '', '786', '', '', '', '', '', '', '300', '', '', '', '2015-07-10', 'Closed', 'Long', '1067', '2015-07-10 17:28:02', '36%'),
(826, 826, 'New', 'NFLX Option Trade ', 'NFLX', '702.18', '-2 x NFLX Jul 675 calls', '21.28', '', '', '', '', '', '', '2 x NFLX JulW4 670 calls', '25.80', '', '', '', '', '', '', '200', '500', '', '', '2015-07-07', 'Long', 'Call Spread', '', '2015-07-14 16:46:56', ''),
(827, 826, 'At Risk', '', 'NFLX', '702.25', '-2 x NFLX Jul 675 calls', '22.80', '', '', '', '', '', '', '2 x NFLX Aug 670 calls', '35.25', '', '', '', '', '', '', '200', '500', '', 'Adjust', '2015-07-08', 'Adjust', 'Call Spread', '', '2015-07-14 16:48:23', ''),
(828, 826, 'At Risk', '', 'NFLX', '702.06', '-2 x NFLX Aug 670 calls', '57.45', '-2 x NFLX JulW4 670 calls', '51.90', '', '', '', '', '2 x NFLX Jul 675 calls', '44.29', '2 x NFLX Jul 675 calls', '46.50', '', '', '', '', '200', '500', '', 'Adjust And Book Gain', '2015-07-14', 'Adjust', 'Call Combo', '', '2015-07-14 16:49:53', ''),
(829, 826, 'Closed', '', 'NFLX', '', '', '3705.68', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '500', '', '', '2015-07-14', 'Closed', 'Long', '3400.32', '2015-07-14 16:51:37', '9%'),
(830, 524, 'At Risk', '', 'AAPL', '126.25', '', '', '', '', '', '', '', '', '4 x AAPL JulW4 125 calls', '3.45', '4 x AAPL JulW4 125 puts', '2.15', '', '', '', '', '1000', '0', '', 'Adjust And Book Gain', '2015-07-14', 'Adjust', 'Combo', '', '2015-07-14 17:40:36', ''),
(831, 524, 'At Risk', '', 'AAPL', '126.26', '-8 x AAPL Aug 140 calls', '0.36', '-8 x AAPL Aug 110 puts', '0.41', '', '', '', '', '4 x AAPL Aug 100 puts', '0.13', '', '', '', '', '', '', '1000', '0', '', 'Adjust', '2015-07-14', 'Adjust', 'Combo', '', '2015-07-14 18:26:10', ''),
(832, 693, 'At Risk', '', 'AMBA', '105.93', '-6 x AMBA Aug 125 calls', '1.40', '-1 x AMBA Aug 105 put', '6.50', '', '', '', '', '2 x AMBA JulW4 105 calls', '4.20', '2 x AMBA JulW4 100 puts', '1.65', '1 x AMBA JulW5 95 put', '1.30', '2 x AMBA Aug 130 calls', '1.00', '100', '1000', '', 'Adjust And Book Gain', '2015-07-14', 'Adjust', 'Combo', '', '2015-07-14 19:04:08', ''),
(833, 693, 'Open', '', 'AMBA', '107.09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1000', '', '', '2015-07-14', 'None', 'Neutral', '', '2015-07-14 20:10:55', ''),
(834, 524, 'Open', '', 'AAPL', '125.66', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1000', '0', '', '', '2015-07-14', 'None', 'Neutral', '', '2015-07-14 20:11:31', ''),
(1031, 689, 'In Trouble', '', 'BABA', '66.15', '-50 x BABA Oct 65 puts', '2.92', '-126 x BABA SepW2 67.5 calls', '1.00', '', '', '', '', '13 x BABA SepW1 67.5 calls', '0.24', '10 x BABA SepW1 70 calls', '0.03', '40 x BABA SepW1 72.5 calls', '0.06', '50 x BABA SepW1 65 puts', '0.23', '100', '1250', '', 'Adjust', '2015-09-03', 'Adjust', 'Combo', '', '2015-09-03 19:35:40', ''),
(1084, 1067, 'Closed', '', 'PZZA', '', '', '', '', '', '', '', '', '', '', '4717', '', '', '', '', '', '', '', '', '', '', '2015-09-16', 'Closed', 'Long', '5823', '2015-09-16 20:25:20', '24%'),
(836, 500, 'In Trouble', '', 'ADSK', '52.69', '', '', '', '', '', '', '', '', '3 x ADSK Jul 52.5 puts', '0.24', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-07-16', 'Adjust', 'Put', '', '2015-07-16 19:07:50', ''),
(837, 500, 'Open', '', 'ADSK', '52.60', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1050', '', '', '2015-07-16', 'None', 'Neutral', '', '2015-07-16 20:01:07', ''),
(839, 689, 'In Trouble', '', 'BABA', '83.50', '-5 x BABA Jul 72.5 calls', '11.05', '', '', '', '', '', '', '5 x BABA Jul 77.5 calls', '6.15', '5 x BABA Jul 80 calls', '3.60', '5 x BABA Jul 82.5 puts', '0.04', '', '', '50', '1050', '', 'Adjust', '2015-07-17', 'Adjust', 'Combo', '', '2015-07-17 15:50:34', ''),
(840, 689, 'In Trouble', '', 'BABA', '', '-15 x BABA JulW4 85 calls', '0.42', '', '', '', '', '', '', '15 x BABA AugW1 85 calls', '1.08', '', '', '', '', '', '', '50', '1050', '', 'Adjust', '2015-07-17', 'Adjust', 'Long', '', '2015-07-17 15:54:54', ''),
(869, 524, 'Closed', '', 'AAPL', '123.94', '', '', '', '', '', '', '', '', '', '1735', '', '', '', '', '', '', '1000', '', '', '', '2015-07-22', 'Closed', 'Long', '858', '2015-07-22 16:16:00', '102%'),
(867, 693, 'Open', '', 'AMBA', '118.18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1000', '', '', '2015-07-21', 'None', 'Long', '', '2015-07-21 20:26:21', ''),
(868, 524, 'At Risk', '', 'AAPL', '124.00', '-4 x AAPL Aug 135 calls', '0.29', '-4 x AAPL Aug 100 puts', '0.06', '-4 x AAPL Aug 115 puts', '0.52', '', '', '8 x AAPL Aug 140 calls', '0.14', '8 x AAPL Aug 110 puts', '0.22', '', '', '', '', '1000', '0', '', 'Adjust', '2015-07-22', 'Adjust', 'Combo', '', '2015-07-22 16:04:39', ''),
(843, 703, 'At Risk', '', 'ROST', '52.09', '-1 x ROST Aug 42.5 call', '9.60', '', '', '', '', '', '', '1 x ROST Aug 50 call', '3.00', '', '', '', '', '', '', '75', '0', '', 'Adjust And Book Gain', '2015-07-17', 'Adjust', 'Call Spread', '', '2015-07-17 16:50:45', ''),
(844, 703, 'Closed', '', 'ROST', '52.08', '', '591.63', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-07-17', 'Closed', 'Long', '509.37', '2015-07-17 16:58:01', '16%'),
(866, 689, 'Open', '', 'BABA', '82.53', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '1050', '', '', '2015-07-21', 'None', 'Neutral', '', '2015-07-21 20:25:57', ''),
(883, 882, 'Open', 'AXS Option Trade', 'AXS', '55.89', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '75', '192', '', '', '2015-07-24', 'None', 'Long', '', '2015-07-24 20:24:56', ''),
(884, 693, 'Open', '', 'AMBA', '124.23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-24', 'None', 'Neutral', '', '2015-07-24 20:25:48', ''),
(886, 693, 'In Trouble', '', 'AMBA', '', '-2 x AMBA JulW5 120 calls', '4.10', '', '', '', '', '', '', '4 x AMBA AugW4 125 calls', '6.45', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-07-27', 'Adjust', 'Call Combo', '', '2015-07-27 18:54:40', ''),
(887, 689, 'In Trouble', '', 'BABA', '', '-3 x BABA JulW5 82.5 calls', '0.68', '', '', '', '', '', '', '3 x BABA Oct 82.5 calls', '4.30', '', '', '', '', '', '', '50', '1050', '', 'Adjust', '2015-07-27', 'Adjust', 'Call Combo', '', '2015-07-27 18:54:40', ''),
(1030, 500, 'In Trouble', '', 'ADSK', '45.99', '-10 x ADSK Sep 50 calls', '0.22', '', '', '', '', '', '', '10 x ADSK Sep 55 calls', '0.10', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-03', 'Adjust', 'Call Spread', '', '2015-09-03 19:34:15', ''),
(890, 689, 'Open', '', 'BABA', '81.40', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '1050', '', '', '2015-07-27', 'None', 'Neutral', '', '2015-07-27 20:02:32', ''),
(891, 693, 'Open', '', 'AMBA', '119.45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-27', 'None', 'Neutral', '', '2015-07-27 20:03:05', ''),
(892, 693, 'In Trouble', '', 'AMBA', '', '-2 x AMBA JulW5 130 calls', '0.55', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-28', 'Adjust', 'Combo', '', '2015-07-28 19:07:36', ''),
(893, 689, 'In Trouble', '', 'BABA', '', '-1 x BABA JulW5 80 call', '1.09', '-4 x BABA JulW5 82.5 calls', '0.23', '-15 x BABA AugW2 90 calls', '0.69', '', '', '15 x BABA JulW5 85 calls', '0.06', '5 x BABA Oct 82.5 calls', '3.80', '', '', '', '', '50', '1050', '', '', '2015-07-28', 'Adjust', 'Combo', '', '2015-07-28 19:07:36', ''),
(1029, 915, 'In Trouble', '', 'CNC', '59.52', '-10 x CNC Sep 60 calls', '1.85', '', '', '', '', '', '', '10 x CNC Dec 60 calls', '5.30', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-09-02', 'Adjust', 'Call Spread', '', '2015-09-02 19:15:39', ''),
(899, 693, 'In Trouble', '', 'AMBA', '', '-4 x AMBA JulW5 125 calls', '0.65', '', '', '', '', '', '', '4 x AMBA AugW4 125 calls', '5.05', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-29', 'Adjust', 'Neutral', '', '2015-07-29 18:52:54', ''),
(900, 689, 'In Trouble', '', 'BABA', '', '-10 x BABA AugW1 80 calls', '1.48', '', '', '', '', '', '', '10 x BABA Oct 80 calls', '4.90', '', '', '', '', '', '', '100', '1050', '', '', '2015-07-29', 'Adjust', 'Neutral', '', '2015-07-29 18:52:54', ''),
(897, 693, 'Open', '', 'AMBA', '119.26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-28', 'None', 'Neutral', '', '2015-07-28 22:19:26', ''),
(898, 689, 'Open', '', 'BABA', '80.65', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '1050', '', '', '2015-07-28', 'None', 'Neutral', '', '2015-07-28 22:20:08', ''),
(901, 693, 'Open', '', 'AMBA', '117.72', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-29', 'None', 'Neutral', '', '2015-07-29 20:43:03', ''),
(902, 689, 'Open', '', 'BABA', '80.23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1050', '', '', '2015-07-29', 'None', 'Neutral', '', '2015-07-29 20:43:35', ''),
(903, 872, 'At Risk', '', 'AAPL', '122.11', '-2 x AAPL Oct 135 calls', '1.04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-07-30', 'Short', 'Call', '', '2015-07-30 17:43:34', ''),
(904, 904, 'New', 'ROLL option trade', 'ROLL', '66.86', '', '', '', '', '', '', '', '', '1 x ROLL Oct 70 call', '1.90', '', '', '', '', '', '', '100', '190.79', '', '', '2015-07-30', 'Long', 'Call', '', '2015-07-30 17:43:34', ''),
(905, 693, 'In Trouble', '', 'AMBA', '116.21', '-2 x AMBA JulW5 115 calls', '2.44', '-4 x AMBA JulW5 120 calls', '0.47', '-4 x AMBA AugW1 150 calls', '0.40', '', '', '4 x AMBA JulW5 125 calls', '0.10', '2 x AMBA JulW5 130 calls', '0.05', '4 x AMBA Aug 150 calls', '0.46', '', '', '100', '1250', '', 'Adjust', '2015-07-30', 'Neutral', 'Combo', '', '2015-07-30 18:05:17', ''),
(906, 904, 'Open', 'ROLL option trade', 'ROLL', '66.69', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '190', '', '', '2015-07-30', 'None', 'Long', '', '2015-07-30 20:55:51', ''),
(907, 693, 'Open', '', 'AMBA', '115.80', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-07-30', 'None', 'Neutral', '', '2015-07-30 20:56:26', ''),
(908, 872, 'Open', '', 'AAPL', '122.37', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', '', '2015-07-30', 'None', 'Long', '', '2015-07-30 20:57:06', ''),
(909, 693, 'In Trouble', '', 'AMBA', '115.55', '-8 x AMBA AugW2 125 calls', '2.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-07-31', 'Short', 'Call', '', '2015-07-31 19:20:43', ''),
(910, 689, 'In Trouble', '', 'BABA', '78.54', '-15 x BABA AugW2 85 calls', '1.01', '', '', '', '', '', '', '15 x BABA AugW2 90 calls', '0.35', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-07-31', 'Long', 'Call Spread', '', '2015-07-31 19:20:43', ''),
(911, 689, 'In Trouble', '', 'BABA', '', '-5 x BABA AugW1 77.5 calls', '0.83', '', '', '', '', '', '', '5 x BABA Oct 77.5 calls', '4.25', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-03', 'Adjust', 'Call Spread', '', '2015-08-03 17:22:16', ''),
(912, 693, 'Open', '', 'AMBA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-08-03', 'Short', 'Call', '', '2015-08-03 17:23:27', ''),
(1028, 689, 'In Trouble', '', 'BABA', '65.48', '-50 x BABA SepW1 65 puts', '1.01', '', '', '', '', '', '', '50 x BABA Oct 65 puts', '3.99', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-02', 'Adjust', 'Call Spread', '', '2015-09-02 19:15:39', ''),
(914, 693, 'In Trouble', '', 'AMBA', '113.17', '-5 x AMBA AugW1 115 calls', '1.92', '', '', '', '', '', '', '5 x AMBA Aug 115 calls', '4.50', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-03', 'Adjust', 'Call Spread', '', '2015-08-03 18:23:34', ''),
(915, 915, 'New', 'CNC Option Trade', 'CNC', '', '', '', '', '', '', '', '', '', '3 x CNC Sep 72.5 calls', '2.20', '', '', '', '', '', '', '200', '662', '', '', '2015-08-03', 'Long', 'Call ', '', '2015-08-03 19:21:29', ''),
(916, 915, 'Open', 'CNC Option Trade', 'CNC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '662', '', '', '2015-08-03', 'None', 'Long', '', '2015-08-03 20:10:29', ''),
(917, 693, 'Open', '', 'AMBA', '113.10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-08-03', 'None', 'Neutral', '', '2015-08-03 20:11:05', ''),
(1027, 500, 'In Trouble', '', 'ADSK', '45.41', '-25 x ADSK Sep 45 puts', '1.48', '', '', '', '', '', '', '25 x ADSK Jan16 45 puts', '3.90', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-02', 'Adjust', 'Call Spread', '', '2015-09-02 19:14:45', ''),
(919, 689, 'Open', '', 'BABA', '113.10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1050', '', '', '2015-08-03', 'None', 'Long', '', '2015-08-03 20:11:55', ''),
(920, 882, 'At Risk', '', 'AXS', '58.70', '-1 x AXS Aug 60 call', '1.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '75', '192', '', 'Adjust', '2015-08-04', 'Adjust', 'Call', '', '2015-08-04 18:59:31', ''),
(1026, 915, 'In Trouble', '', 'CNC', '', '-3 x CNC Sep 60 calls', '1.95', '', '', '', '', '', '', '3 x CNC Dec 60 calls', '5.49', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-09-01', 'Adjust', 'Call Spread', '', '2015-09-01 19:00:55', ''),
(922, 882, 'Open', '', 'AXS', '57.85', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '75', '192', '', '', '2015-08-05', 'None', 'Neutral', '', '2015-08-05 15:20:28', ''),
(924, 872, 'At Risk', '', 'AAPL', '115.86', '', '', '', '', '', '', '', '', '2 x AAPL Oct 135 calls', '0.58', '', '', '', '', '', '', '400', '611', '', '', '2015-08-05', 'Adjust', 'Call', '', '2015-08-05 17:28:06', ''),
(925, 693, 'In Trouble', '', 'AMBA', '115.08', '-10 x AMBA AugW1 115 calls', '1.80', '', '', '', '', '', '', '10 x AMBA AugW4 115 calls', '6.00', '', '', '', '', '', '', '100', '1250', '', '', '2015-08-05', 'Adjust', 'Call Spread', '', '2015-08-05 17:28:06', ''),
(926, 689, 'In Trouble', '', 'BABA', '79.89', '-10 x BABA Oct 80 calls', '4.45', '', '', '', '', '', '', '2 x BABA AugW1 77.5 calls', '2.48', '10 x BABA AugW1 80 calls', '0.62', '', '', '', '', '100', '1050', '', '', '2015-08-05', 'Adjust', 'Call Combo', '', '2015-08-05 17:28:06', ''),
(1025, 689, 'In Trouble', '', 'BABA', '65.25', '-13 x BABA SepW1 67.5 calls', '0.58', '', '', '', '', '', '', '13 x BABA SepW1 70 calls', '0.12', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-01', 'Adjust', 'Call Spread', '', '2015-09-01 19:00:55', ''),
(928, 904, 'At Risk', '', 'ROLL', '65.41', '-1 x ROLL Oct 75 call', '2.58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '190', '', '', '2015-08-05', 'Adjust', 'Call', '', '2015-08-05 17:28:06', ''),
(930, 915, 'At Risk', '', 'CNC', '70.49', '-1 x CNC Aug 72.5 call', '1.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-06', 'Adjust', 'Call', '', '2015-08-06 19:35:33', ''),
(931, 904, 'At Risk', '', 'ROLL', '68.32', '-1 x ROLL Sep 75 call', '2.55', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '190', '', 'Adjust', '2015-08-06', 'Adjust', 'Call', '', '2015-08-06 19:35:33', ''),
(1024, 500, 'In Trouble', '', 'ADSK', '45.93', '-10 x ADSK Sep 50 calls', '0.37', '', '', '', '', '', '', '10 x ADSK Jan16 50 calls', '2.44', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-01', 'Adjust', 'Call Spread', '', '2015-09-01 18:59:47', ''),
(1083, 1067, 'In Trouble', '', 'PZZA', '69.48', '-4 x PZZA Oct 67.5 calls', '3.35', '-6 x PZZA Oct 75 calls', '0.33', '-10 x PZZA Jan16 67.5 puts', '3.80', '', '', '10 x PZZA Sep 67.5 calls', '2.03', '10 x PZZA Sep 67.5 puts', '0.32', '10 x PZZA Jan16 65 puts', '2.93', '', '', '', '', '', '', '2015-09-16', '', '', '', '2015-09-16 20:24:17', ''),
(1082, 1067, 'In Trouble', '', 'PZZA', '69.48', '-6 x PZZA Sep 67.5 calls', '2.50', '', '', '', '', '', '', '6 x PZZA Sep 70 calls', '1.23', '', '', '', '', '', '', '', '', '', '', '2015-09-04', '', '', '', '2015-09-16 20:23:50', ''),
(1081, 1067, 'In Trouble', '', 'PZZA', '69.48', '-6 x PZZA Sep 70 calls', '1.45', '', '', '', '', '', '', '6 x PZZA Oct 75 calls', '0.55', '', '', '', '', '', '', '', '', '', '', '2015-08-31', '', '', '', '2015-09-16 20:23:31', ''),
(937, 915, 'Open', '', 'CNC', '71.51', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '662', '', '', '2015-08-07', 'None', 'Long', '', '2015-08-07 20:14:48', ''),
(938, 904, 'Open', '', 'ROLL', '69.30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '190', '', '', '2015-08-07', 'None', 'Long', '', '2015-08-07 20:15:22', ''),
(939, 872, 'Open', '', 'AAPL', '115.52', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', '', '2015-08-07', 'None', 'Long', '', '2015-08-07 20:15:42', ''),
(940, 693, 'Open', '', 'AMBA', '114.98', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', '', '2015-08-07', 'None', 'Neutral', '', '2015-08-07 20:16:06', ''),
(941, 689, 'In Trouble', '', 'BABA', '78.82', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1050', '', '', '2015-08-07', 'None', 'Neutral', '', '2015-08-07 20:16:58', ''),
(944, 693, 'At Risk', '', 'AMBA', '118.01', '-5 x AMBA Aug 115 calls', '5.87', '-4 x AMBA Aug 125 calls', '1.88', '-10 x AMBA AugW4 115 calls', '7.24', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-10', 'Adjust', 'Combo', '', '2015-08-10 19:29:28', ''),
(943, 689, 'Open', '', 'BABA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1050', '', '', '2015-08-07', 'None', 'Neutral', '', '2015-08-07 20:17:38', ''),
(945, 689, 'In Trouble', '', 'BABA', '80.67', '-5 x BABA AugW2 82.5 calls', '1.78', '', '', '', '', '', '', '5 x BABA AugW2 85 calls', '0.95', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-10', 'Long', 'Call Spread', '', '2015-08-10 19:29:28', ''),
(948, 872, 'In Trouble', '', 'AAPL', '113.46', '-1 x AAPL Aug 120 call', '0.56', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-08-11', 'Adjust', 'Call', '', '2015-08-11 18:43:08', ''),
(949, 693, 'In Trouble', '', 'AMBA', '112.07', '-8 x AMBA AugW2 120 calls', '0.45', '', '', '', '', '', '', '8 x AMBA AugW2 125 calls', '0.15', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-11', 'Adjust', 'Call Spread', '', '2015-08-11 18:43:08', ''),
(950, 689, 'In Trouble', '', 'BABA', '76.33', '-1 x BABA AugW2 77.5 call', '2.42', '-4 x BABA AugW2 80 calls', '1.46', '', '', '', '', '5 x BABA AugW2 85 calls', '0.41', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-11', 'Adjust', 'Call Combo', '', '2015-08-11 18:43:08', ''),
(951, 915, 'At Risk', '', 'CNC', '70.80', '-1 x CNC Aug 72.5 call', '0.83', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-11', 'Adjust', 'Call', '', '2015-08-11 18:43:08', ''),
(952, 693, 'In Trouble', '', 'AMBA', '110.05', '-8 x AMBA AugW2 110 calls', '1.23', '-8 x AMBA Aug 115 calls', '1.48', '-4 x AMBA Aug 165 calls', '0.20', '-1 x AMBA Aug 100 put', '1.74', '8 x AMBA AugW2 120 calls', '0.10', '4 x AMBA Aug 105 calls', '5.00', '8 x AMBA Aug 125 calls', '0.37', '', '', '100', '1250', '', 'Adjust', '2015-08-12', 'Adjust', 'Combo', '', '2015-08-12 20:42:31', ''),
(1047, 500, 'In Trouble', '', 'ADSK', '46.58', '-30 x ADSK Sep 47.5 calls', '0.73', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-09', 'Adjust', 'Call', '', '2015-09-09 19:28:55', ''),
(1022, 689, 'In Trouble', '', 'BABA', '66.83', '-23 x BABA SepW1 70 calls', '0.68', '', '', '', '', '', '', '23 x BABA SepW1 72.5 calls', '0.16', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-31', 'Adjust', 'Call Spread', '', '2015-08-31 19:04:29', ''),
(954, 904, 'At Risk', '', 'ROLL', '66.94', '-1 x ROLL Oct 75 call', '0.45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '190', '', 'Adjust', '2015-08-12', 'Adjust', 'Call', '', '2015-08-12 20:42:31', ''),
(955, 882, 'At Risk', '', 'AXS', '57.17', '-1 x AXS Aug 60 call', '0.30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '75', '192', '', 'Adjust', '2015-08-12', 'Adjust', 'Call', '', '2015-08-12 20:42:31', ''),
(956, 689, 'In Trouble', '', 'BABA', '73.40', '-15 x BABA AugW2 75 calls', '0.26', '', '', '', '', '', '', '1 x BABA AugW2 77.5 call', '0.07', '4 x BABA AugW2 80 calls', '0.02', '5 x BABA AugW2 82.5 calls', '0.02', '5 x BABA AugW2 85 calls', '0.01', '100', '1050', '', 'Adjust', '2015-08-12', 'Adjust', 'Call Combo', '', '2015-08-12 20:42:31', ''),
(1080, 1067, 'In Trouble', '', 'PZZA', '69.48', '-4 x PZZA Sep 67.5 calls', '2.58', '-10 x PZZA Jan16 65 puts', '3.75', '', '', '', '', '4 x PZZA Sep 72.5 calls', '0.63', '', '', '', '', '', '', '', '', '', '', '2015-08-28', '', '', '', '2015-09-16 20:23:05', ''),
(958, 915, 'At Risk', '', 'CNC', '69.19', '-1 x CNC Aug 70 call', '0.90', '', '', '', '', '', '', '1 x CNC Aug 72.5 call', '0.40', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-12', 'Adjust', 'Call Spread', '', '2015-08-12 20:42:31', ''),
(959, 693, 'In Trouble', '', 'AMBA', '109.04', '-8 x AMBA AugW2 110 calls', '1.88', '-4 x AMBA Aug 120 calls', '0.90', '', '', '', '', '8 x AMBA AugW2 105 calls', '5.74', '8 x AMBA Aug 115 calls', '1.95', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-13', 'Adjust', 'Combo', '', '2015-08-13 20:09:59', ''),
(960, 689, 'In Trouble', '', 'BABA', '75.11', '-15 x BABA Aug 77.5 calls', '0.72', '', '', '', '', '', '', '15 x BABA AugW2 75 calls', '1.41', '7 x BABA Aug 72.5 calls', '4.02', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-13', 'Adjust', 'Combo', '', '2015-08-13 20:09:59', ''),
(1079, 1067, 'In Trouble', '', 'PZZA', '69.48', '-2 x PZZA Oct 80 calls', '0.28', '-4 x PZZA Sep 72.5 calls', '0.63', '', '', '', '', '4 x PZZA Oct 67.5 calls', '3.60', '', '', '', '', '', '', '', '', '', '', '2015-08-27', '', '', '', '2015-09-16 20:22:41', ''),
(962, 915, 'At Risk', '', 'CNC', '70.09', '-2 x CNC Aug 72.5 calls', '0.60', '', '', '', '', '', '', '1 x CNC Aug 70 call', '1.70', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-13', 'Adjust', 'Combo', '', '2015-08-13 20:09:59', ''),
(963, 500, 'In Trouble', '', 'ADSK', '54.61', '-20 x ADSK Aug 55 calls', '0.87', '-5 x ADSK Aug 57.5 calls', '0.28', '-5 x ADSK Aug 57.5 puts', '3.29', '-5 x ADSK Oct 52.5 puts', '2.08', '10 x ADSK Aug 50 calls', '4.95', '5 x ADSK Aug 55 puts', '1.01', '5 x ADSK Oct 57.5 calls', '2.11', '5 x ADSK Oct 55 puts', '3.20', '250', '1250', '', 'Adjust', '2015-08-13', 'Adjust', 'Combo', '', '2015-08-13 20:27:59', ''),
(964, 872, 'In Trouble', '', 'AAPL', '115.92', '', '', '', '', '', '', '', '', '1 x AAPL Aug 120 call', '0.18', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-08-14', 'Adjust', 'Call', '', '2015-08-14 19:17:34', ''),
(965, 693, 'In Trouble', '', 'AMBA', '108.67', '-4 x AMBA AugW2 110 calls', '0.10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-14', 'Adjust', 'Call', '', '2015-08-14 19:17:34', ''),
(1020, 693, 'Closed', '', 'AMBA', '96.20', '', '290985', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '1050', '', '', '2015-08-28', 'Closed', 'Long', '282357', '2015-08-28 20:02:07', '3%'),
(967, 689, 'In Trouble', '', 'BABA', '74.80', '-2 x BABA Aug 75 calls', '1.03', '', '', '', '', '', '', '2 x BABA Aug 77.5 calls', '0.28', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-14', 'Adjust', 'Call Spread', '', '2015-08-14 19:17:34', ''),
(968, 693, 'In Trouble', '', 'AMBA', '108.40', '-12 x AMBA Aug 115 calls', '0.65', '-5 x AMBA Aug 110 calls', '1.63', '', '', '', '', '5 x AMBA Aug 115 calls', '0.47', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-17', 'Adjust', 'Combo', '', '2015-08-17 20:06:06', ''),
(970, 689, 'In Trouble', '', 'BABA', '75.19', '-5 x BABA Aug 75 calls', '0.88', '', '', '', '', '', '', '5 x BABA Aug 77.5 calls', '0.16', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-17', 'Adjust', 'Call Spread', '', '2015-08-17 20:06:06', ''),
(971, 915, 'At Risk', '', 'CNC', '71.90', '', '', '', '', '', '', '', '', '1 x CNC Aug 72.5 call', '0.62', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-17', 'Adjust', 'Call', '', '2015-08-17 20:06:06', ''),
(1078, 1067, 'In Trouble', '', 'PZZA', '69.48', '-2 x PZZA Sep 70 calls', '1.15', '-10 x PZZA Sep 67.5 puts', '3.05', '', '', '', '', '4 x PZZA Sep 72.5 calls', '0.70', '10 x PZZA Jan16 67.5 puts', '5.60', '', '', '', '', '', '', '', '', '2015-08-26', '', '', '', '2015-09-16 20:22:22', ''),
(973, 693, 'In Trouble', '', 'AMBA', '105.32', '-7 x AMBA Aug 110 calls', '1.00', '', '', '', '', '', '', '7 x AMBA Aug 115 calls', '0.20', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-18', 'Adjust', 'Call Spread', '', '2015-08-18 20:20:18', ''),
(1077, 1067, 'In Trouble', '', 'PZZA', '69.48', '-100 x PZZA Common', '67.41', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-08-24', '', '', '', '2015-09-16 20:22:01', ''),
(976, 872, 'In Trouble', '', 'AAPL', '116.50', '-1 x AAPL AugW4 120 call', '0.51', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-08-18', 'Adjust', 'Call', '', '2015-08-18 20:20:18', ''),
(977, 693, 'In Trouble', '', 'AMBA', '105.32', '-8 x AMBA Aug 110 calls', '0.80', '', '', '', '', '', '', '8 x AMBA AugW4 125 calls', '0.20', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-18', 'Adjust', 'Call Spread', '', '2015-08-18 20:21:38', ''),
(978, 500, 'In Trouble', '', 'ADSK', '54.43', '-10 x ADSK Aug 50 calls', '3.95', '-20 x ADSK Sep 55 calls', '2.04', '', '', '', '', '20 x ADSK Aug 55 calls', '0.19', '10 x ADSK Sep 52.5 calls', '3.25', '', '', '', '', '250', '1250', '', 'Adjust', '2015-08-19', 'Adjust', 'Combo', '', '2015-08-19 18:48:05', ''),
(979, 693, 'In Trouble', '', 'AMBA', '105.09', '-8 x AMBA Aug 105 calls', '0.90', '-4 x AMBA AugW4 105 calls', '2.35', '-18 x AMBA AugW4 110 calls', '1.05', '', '', '24 x AMBA Aug 110 calls', '0.15', '8 x AMBA AugW4 100 calls', '4.87', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-19', 'Adjust', 'Combo', '', '2015-08-19 18:53:02', ''),
(980, 689, 'In Trouble', '', 'BABA', '73.19', '-7 x BABA Aug 72.5 calls', '1.02', '-30 x BABA AugW4 75 calls', '0.52', '', '', '', '', '7 x BABA Aug 75 calls', '0.13', '8 x BABA Aug 77.5 calls', '0.02', '15 x BABA AugW4 70 calls', '3.42', '', '', '100', '1050', '', 'Adjust', '2015-08-19', 'Adjust', 'Combo', '', '2015-08-19 18:53:02', ''),
(1019, 983, 'At Risk', '', 'EPAM', '71.56', '-1 x EPAM Jan16 70 put', '5.40', '', '', '', '', '', '', '1 x EPAM Jan16 55 put', '1.82', '1 x EPAM Jan16 70 call', '7.70', '', '', '', '', '200', '600', '', 'Adjust', '2015-08-28', 'Adjust', 'Combo', '', '2015-08-28 19:39:01', ''),
(982, 872, 'In Trouble', '', 'AAPL', '115.50', '', '', '', '', '', '', '', '', '1 x AAPL AugW4 120 call', '0.30', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-08-19', 'Adjust', 'Call', '', '2015-08-19 18:53:02', ''),
(983, 983, 'New', 'EPAM Option Trade', 'EPAM', '69.35', '', '', '', '', '', '', '', '', '2 x EPAM Jan16 75 calls', '3.00', '', '', '', '', '', '', '200', '600', '', '', '2015-08-19', 'Long', 'Call', '', '2015-08-19 19:16:01', ''),
(984, 983, 'Open', 'EPAM Option Trade', 'EPAM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '600', '', '', '2015-08-20', 'None', 'Long', '', '2015-08-20 15:49:04', ''),
(985, 689, 'In Trouble', '', 'BABA', '70.13', '-10 x BABA AugW4 72.5 calls', '0.87', '', '', '', '', '', '', '10 x BABA AugW4 75 calls', '0.25', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-20', 'Adjust', 'Call Spread', '', '2015-08-20 18:58:48', ''),
(1076, 1067, 'In Trouble', '', 'PZZA', '69.48', '-4 x PZZA Sep 72.5 calls', '0.80', '', '', '', '', '', '', '4 x PZZA Sep 75 calls', '0.35', '', '', '', '', '', '', '', '', '', '', '2015-08-21', '', '', '', '2015-09-16 20:21:46', ''),
(987, 915, 'In Trouble', '', 'CNC', '', '', '', '', '', '', '', '', '', '2 x CNC Aug 72.5 calls', '0.07', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-20', 'Adjust', 'Call', '', '2015-08-20 18:58:48', ''),
(988, 693, 'In Trouble', '', 'AMBA', '89.00', '-8 x AMBA AugW4 100 calls', '1.00', '-26 x AMBA AugW4 105 calls', '0.42', '-15 x AMBA AugW4 90 puts', '4.42', '', '', '18 x AMBA AugW4 110 calls', '0.20', '14 x AMBA AugW4 125 calls', '0.25', '15 x AMBA AugW4 85 puts', '2.27', '', '', '100', '1250', '', 'Adjust', '2015-08-21', 'Adjust', 'Combo', '', '2015-08-21 19:17:47', ''),
(989, 689, 'In Trouble', '', 'BABA', '68.47', '-15 x BABA AugW4 70 calls', '1.19', '-15 x BABA AugW4 72.5 calls', '0.42', '-25 x BABA AugW4 65 puts', '0.44', '', '', '20 x BABA AugW4 75 calls', '0.12', '25 x BABA AugW4 60 puts', '0.13', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-21', 'Adjust', 'Combo', '', '2015-08-21 19:17:47', ''),
(1075, 1067, 'In Trouble', '', 'PZZA', '69.48', '-1 x PZZA Aug 67.5 call', '3.35', '', '', '', '', '', '', '100 x PZZA Common', '70.67', '', '', '', '', '', '', '', '', '', '', '2015-08-20', '', '', '', '2015-09-16 20:21:24', ''),
(1074, 1067, 'In Trouble', '', 'PZZA', '69.48', '-1 x PZZA Sep 75 call', '1.00', '', '', '', '', '', '', '1 x PZZA Aug 70 call', '2.82', '', '', '', '', '', '', '', '', '', '', '2015-08-18', '', '', '', '2015-09-16 20:21:07', ''),
(992, 983, 'In Trouble', '', 'EPAM', '67.19', '-2 x EPAM Sep 75 calls', '0.50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-08-24', 'Adjust', 'Call', '', '2015-08-24 19:55:44', ''),
(1073, 1067, 'In Trouble', '', 'PZZA', '69.48', '-1 x PZZA Aug 67.5 call', '5.75', '-1 x PZZA Aug 75 call', '0.25', '', '', '', '', '2 x PZZA Sep 70 calls', '4.20', '', '', '', '', '', '', '', '', '', '', '2015-08-17', '', '', '', '2015-09-16 20:20:39', ''),
(994, 500, 'In Trouble', '', 'ADSK', '49.57', '-10 x ADSK Sep 52.5 calls', '1.46', '', '', '', '', '', '', '20 x ADSK Sep 55 calls', '0.82', '10 x ADSK Jan16 52.5 calls', '3.43', '', '', '', '', '250', '1250', '', 'Adjust', '2015-08-25', 'Adjust', 'Combo', '', '2015-08-25 18:34:15', ''),
(995, 689, 'In Trouble', '', 'BABA', '68.99', '-5 x BABA Oct 77.5 calls', '0.94', '-8 x BABA Oct 82.5 calls', '0.30', '-100 x BABA AugW4 72.5 calls', '0.34', '', '', '13 x BABA Oct 72.5 calls', '2.48', '50 x BABA Oct 72.5 calls', '2.46', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-25', 'Adjust', 'Combo', '', '2015-08-25 18:40:42', ''),
(1017, 915, 'In Trouble', '', 'CNC', '62.31', '-3 x CNC Sep 67.5 calls', '0.70', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-28', 'Adjust', 'Combo', '', '2015-08-28 18:50:17', ''),
(997, 500, 'In Trouble', '', 'ADSK', '49.10', '-10 x ADSK Sep 55 calls', '0.55', '-10 x ADSK Sep 60 calls', '0.18', '', '', '', '', '', '', '', '', '', '', '', '', '250', '1250', '', 'Adjust', '2015-08-26', 'Adjust', 'Call', '', '2015-08-26 19:29:29', ''),
(1072, 1067, 'In Trouble', '', 'PZZA', '69.48', '-3 x PZZA Sep 75 calls', '1.03', '', '', '', '', '', '', '3 x PZZA Aug 72.5 calls', '0.95', '', '', '', '', '', '', '', '', '', '', '2015-08-13', '', '', '', '2015-09-16 20:20:18', ''),
(999, 693, 'In Trouble', '', 'AMBA', '89.14', '-60 x AMBA AugW4 90 calls', '0.85', '', '', '', '', '', '', '30 x AMBA AugW4 105 calls', '0.15', '30 x AMBA AugW4 125 calls', '0.25', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-26', 'Adjust', 'Combo', '', '2015-08-26 19:33:09', ''),
(1000, 689, 'In Trouble', '', 'BABA', '68.07', '-63 x BABA AugW4 70 calls', '0.31', '-50 x BABA AugW4 70 calls', '0.33', '', '', '', '', '125 x BABA AugW4 72.5 calls', '0.07', '50 x BABA AugW4 75 calls', '0.04', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-26', 'Adjust', 'Combo', '', '2015-08-26 19:33:09', ''),
(1016, 689, 'In Trouble', '', 'BABA', '69.57', '-12600 x BABA Common', '70.00', '', '', '', '', '', '', '10000 x BABA Common', '75.00', '2600 x BABA Common', '70.02', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-28', 'Adjust', 'Combo', '', '2015-08-28 18:50:17', ''),
(1002, 915, 'In Trouble', '', 'CNC', '62.50', '-3 x CNC Sep 57.5 puts', '1.58', '', '', '', '', '', '', '3 x CNC Sep 52.5 puts', '0.63', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-26', 'Adjust', 'Combo', '', '2015-08-26 19:33:09', ''),
(1003, 693, 'In Trouble', '', 'AMBA', '89.68', '-60 x AMBA AugW4 92.5 calls', '0.92', '', '', '', '', '', '', '60 x AMBA AugW4 90 calls', '1.85', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-26', 'Adjust', 'Combo', '', '2015-08-26 19:45:18', ''),
(1005, 693, 'In Trouble', '', 'AMBA', '89.49', '-60 x AMBA AugW4 95 calls', '0.98', '-45 x AMBA AugW4 95 puts', '2.55', '', '', '', '', '60 x AMBA AugW4 92.5 calls', '2.19', '45 x AMBA AugW4 85 puts', '0.13', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-27', 'Adjust', 'Combo', '', '2015-08-27 19:20:41', ''),
(1006, 689, 'In Trouble', '', 'BABA', '70.23', '-13 x BABA AugW4 70 calls', '1.83', '-113 x BABA AugW4 72.5 calls', '0.37', '-100 x BABA AugW4 75 puts', '4.08', '', '', '75 x BABA AugW4 60 puts', '0.03', '25 x BABA AugW4 65 puts', '0.02', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-27', 'Adjust', 'Combo', '', '2015-08-27 19:20:41', ''),
(1007, 915, 'In Trouble', '', 'CNC', '62.56', '-3 x CNC Sep 62.5 puts', '2.17', '', '', '', '', '', '', '3 x CNC Sep 57.5 puts', '1.07', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-08-27', 'Adjust', 'Combo', '', '2015-08-27 19:20:41', ''),
(1014, 500, 'In Trouble', '', 'ADSK', '46.32', '-10 x ADSK Sep 52.5 calls', '0.23', '', '', '', '', '', '', '10 x ADSK Sep 60 calls', '0.02', '', '', '', '', '', '', '250', '1250', '', 'Adjust', '2015-08-28', 'Adjust', 'Call Spread', '', '2015-08-28 18:47:21', ''),
(1015, 693, 'In Trouble', '', 'AMBA', '96.00', '', '', '', '', '', '', '', '', '4500 x AMBA Common', '95.00', '', '', '', '', '', '', '100', '1050', '', 'Adjust', '2015-08-28', 'Adjust', 'Combo', '', '2015-08-28 18:50:17', ''),
(1009, 904, 'In Trouble', '', 'ROLL', '61.37', '', '', '', '', '', '', '', '', '1 x ROLL Oct 75 call', '0.60', '', '', '', '', '', '', '100', '190', '', 'Adjust', '2015-08-27', 'Adjust', 'Combo', '', '2015-08-27 19:20:41', ''),
(1071, 1067, 'In Trouble', '', 'PZZA', '69.48', '-1 x PZZA Aug 70 call', '1.30', '', '', '', '', '', '', '1 x PZZA Aug 72.5 call', '0.45', '', '', '', '', '', '', '', '', '', '', '2015-08-12', '', '', '', '2015-09-16 20:19:50', ''),
(1070, 1067, 'In Trouble', '', 'PZZA', '69.48', '-4 x PZZA Aug 72.5 calls', '0.99', '', '', '', '', '', '', '2 x PZZA Aug 67.5 calls', '4.50', '', '', '', '', '', '', '', '', '', '', '2015-08-07', '', '', '', '2015-09-16 20:19:27', ''),
(1013, 693, 'In Trouble', '', 'AMBA', '90.68', '-60 x AMBA AugW4 92.5 calls', '0.75', '', '', '', '', '', '', '60 x AMBA AugW4 95 calls', '0.27', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-08-27', 'Adjust', 'Call Spread', '', '2015-08-27 19:46:56', ''),
(1045, 689, 'In Trouble', '', 'BABA', '61.79', '-50 x BABA SepW2 65 calls', '0.99', '', '', '', '', '', '', '50 x BABA Oct 72.5 calls', '0.78', '', '', '', '', '', '', '100', '1250', '', '', '2015-09-08', 'Adjust', 'Call Spread', '', '2015-09-08 19:11:24', ''),
(1046, 904, 'In Trouble', '', 'ROLL', '59.62', '-1 x ROLL Sep 60 call', '1.33', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '190', '', '', '2015-09-08', 'Adjust', 'Call Spread', '', '2015-09-08 19:11:24', ''),
(1048, 882, 'In Trouble', '', 'AXS', '54.07', '-5 x AXS Oct 65 calls', '1.25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '75', '192', '', 'Adjust', '2015-09-09', 'Adjust', 'Call', '', '2015-09-09 19:34:34', ''),
(1049, 872, 'In Trouble', '', 'AAPL', '111.01', '-10 x AAPL SepW2 115 calls', '0.77', '', '', '', '', '', '', '10 x AAPL OctW2 115 calls', '3.60', '', '', '', '', '', '', '400', '611', '', 'Adjust', '2015-09-09', 'Adjust', 'Call Spread', '', '2015-09-09 19:34:34', ''),
(1050, 915, 'In Trouble', '', 'CNC', '61.80', '-25 x CNC Sep 62.5 calls', '1.28', '', '', '', '', '', '', '25 x CNC Oct 62.5 calls', '2.75', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-09-09', 'Adjust', 'Call Spread', '', '2015-09-09 19:34:34', ''),
(1052, 882, 'In Trouble', '', 'AXS', '54.08', '-2 x AXS Sep 60 calls', '0.50', '', '', '', '', '', '', '5 x AXS Oct 65 calls', '0.50', '', '', '', '', '', '', '75', '192', '', 'Adjust', '2015-09-10', 'Adjust', 'Combo', '', '2015-09-10 20:25:04', ''),
(1053, 904, 'In Trouble', '', 'ROLL', '60.17', '-1 x ROLL Sep 65 call', '5.00', '', '', '', '', '', '', '1 x ROLL Oct 60 call', '2.80', '', '', '', '', '', '', '50', '190', '', 'Adjust', '2015-09-10', 'Adjust', 'Call Spread', '', '2015-09-10 20:25:04', ''),
(1055, 882, 'Closed', '', 'AXS', '', '', '', '', '', '', '', '', '', '', '155.53', '', '', '', '', '', '', '75', '192', '', '', '2015-09-10', 'Closed', 'Long', '557.89', '2015-09-10 20:59:36', '259%'),
(1056, 500, 'In Trouble', '', 'ADSK', '46.30', '-30 x ADSK Sep 45 calls', '1.71', '', '', '', '', '', '', '30 x ADSK Sep 52.5 calls', '0.04', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-11', 'Adjust', 'Call Spread', '', '2015-09-11 21:27:34', ''),
(1057, 872, 'In Trouble', '', 'AAPL', '114.21', '-4 x AAPL SepW2 120 calls', '0.01', '-20 x AAPL Sep 115 calls', '0.99', '', '', '', '', '4 x AAPL SepW2 110 calls', '2.94', '10 x AAPL SepW2 115 calls', '0.01', '10 x AAPL OctW2 110 calls', '5.88', '', '', '400', '611', '', 'Adjust', '2015-09-11', 'Adjust', 'Combo', '', '2015-09-11 21:29:50', ''),
(1058, 689, 'In Trouble', '', 'BABA', '64.68', '-113 x BABA Sep 67.5 calls', '0.36', '', '', '', '', '', '', '113 x BABA SepW2 65 calls', '0.05', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-11', 'Adjust', 'Call Spread', '', '2015-09-11 21:29:50', ''),
(1059, 915, 'In Trouble', '', 'CNC', '63.43', '-13 x CNC Sep 62.5 calls', '1.60', '', '', '', '', '', '', '13 x CNC Sep 60 calls', '3.50', '', '', '', '', '', '', '200', '662', '', 'Adjust', '2015-09-11', 'Adjust', 'Call Spread', '', '2015-09-11 21:29:50', ''),
(1118, 983, 'At Risk', '', 'EPAM', '', '-3 x EPAM Jan16 75 calls', '7.15', '', '', '', '', '', '', '6 x EPAM Jan16 85 calls', '2.75', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-10-19', 'Long/Short ', 'Combo', '', '2015-10-19 20:07:13', ''),
(1061, 983, 'At Risk', '', 'EPAM', '74.35', '-2 x EPAM Oct 80 calls', '0.83', '', '', '', '', '', '', '2 x EPAM Sep 75 calls', '0.96', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-09-11', 'Adjust', 'Call Spread', '', '2015-09-11 21:29:50', ''),
(1062, 689, 'In Trouble', '', 'BABA', '62.59', '-113 x BABA Sep 65 calls', '0.44', '', '', '', '', '', '', '113 x BABA Sep 67.5 calls', '0.11', '', '', '', '', '', '', '100', '1250', '', 'Adjust', '2015-09-14', 'Adjust', 'Call Spread', '', '2015-09-14 20:32:56', ''),
(1063, 500, 'In Trouble', '', 'ADSK', '46.90', '-30 x ADSK Sep 52.5 calls', '0.03', '-100 x ADSK Oct 47.5 puts', '2.21', '', '', '', '', '30 x ADSK Sep 45 calls', '1.97', '30 x ADSK Sep 47.5 calls', '0.31', '50 x ADSK Jan16 45 puts', '2.65', '', '', '250', '1000', '', 'Adjust', '2015-09-16', 'Adjust', 'Combo', '', '2015-09-16 20:08:26', ''),
(1067, 1067, 'New', '', 'PZZA', '69.48', '', '', '', '', '', '', '', '', '2 x PZZA Oct 80 calls', '2.25', '', '', '', '', '', '', '250', '1000', '', '', '2015-07-22', '', 'Call', '', '2015-09-16 20:16:37', ''),
(1068, 1067, 'In Trouble', '', 'PZZA', '69.48', '-2 x PZZA Oct 82.5 calls', '1.20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-07-24', '', '', '', '2015-09-16 20:16:59', ''),
(1069, 1067, 'In Trouble', '', 'PZZA', '69.48', '', '', '', '', '', '', '', '', '2 x PZZA Oct 82.5 calls', '0.43', '', '', '', '', '', '', '', '', '', '', '2015-08-05', '', '', '', '2015-09-16 20:19:11', ''),
(1065, 983, 'In Trouble', '', 'EPAM', '74.57', '-1 x EPAM Jan16 70 call', '8.35', '-1 x EPAM Jan16 55 put', '1.07', '', '', '', '', '1 x EPAM Jan16 70 put', '4.35', '1 x EPAM Jan16 75 call', '5.70', '', '', '', '', '200', '600', '', 'Adjust', '2015-09-16', 'Adjust', 'Combo', '', '2015-09-16 20:10:17', ''),
(1089, 915, 'In Trouble', '', 'CNC', '62.58', '-38 x CNC Sep 65 calls', '0.44', '-35 x CNC Sep 60 puts', '0.15', '-25 x CNC Oct 62.5 calls', '3.33', '-13 x CNC Dec 60 calls', '7.00', '38 x CNC Sep 62.5 calls', '1.54', '35 x CNC Sep 52.5 puts', '0.20', '13 x CNC Dec 62.5 calls', '5.50', '', '', '200', '662', '', 'Adjust', '2015-09-17', 'Adjust', 'Combo', '', '2015-09-18 18:52:20', ''),
(1091, 500, 'In Trouble', '', 'ADSK', '46.55', '-100 x ADSK Oct 47.5 calls', '1.45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-18', 'Adjust', 'Call', '', '2015-09-18 18:54:46', ''),
(1092, 983, 'At Risk', '', 'EPAM', '74.63', '', '', '', '', '', '', '', '', '2 x EPAM Oct 80 calls', '1.02', '3 x EPAM Jan16 80 calls', '4.05', '', '', '', '', '200', '600', '', 'Adjust', '2015-09-18', 'Adjust', 'Combo', '', '2015-09-18 18:55:37', ''),
(1093, 872, 'Closed', '', 'AAPL', '113.97', '', '', '', '', '', '', '', '', '', '6254.56', '', '', '', '', '', '', '', '', '', '', '2015-09-18', 'Closed', 'Long', '6319.44', '2015-09-18 19:00:04', '1%'),
(1094, 689, 'In Trouble', '', 'BABA', '64.65', '-113 x BABA Oct 62.5 calls', '4.20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1250', '200', '', 'Adjust', '2015-09-18', 'Adjust', 'Combo', '', '2015-09-18 19:43:09', ''),
(1095, 500, 'In Trouble', '', 'ADSK', '47.41', '-100 x ADSK Nov 52.5 calls', '0.86', '-100 x ADSK Nov 45 puts', '1.60', '-10 x ADSK Jan16 50 calls', '2.31', '-10 x ADSK Jan16 52.5 calls', '1.52', '100 x ADSK Oct 47.5 calls', '1.56', '56 x ADSK Oct 47.5 puts', '1.63', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-21', 'Adjust', 'Combo', '', '2015-09-21 20:19:24', ''),
(1096, 500, 'In Trouble', '', 'ADSK', '47.41', '-10 x ADSK Jan16 60 calls', '0.38', '-100 x ADSK Jan16 45 puts', '2.34', '', '', '', '', '', '', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-21', 'Adjust', 'Combo', '', '2015-09-21 20:20:09', ''),
(1097, 904, 'In Trouble', '', 'ROLL', '59.28', '-1 x ROLL Oct 70 call', '0.95', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '50', '190', '', 'Adjust', '2015-09-18', 'Adjust', 'Call', '', '2015-09-21 20:23:32', ''),
(1098, 904, 'Closed', '', 'ROLL', '59.28', '', '', '', '', '', '', '', '', '', '204.05', '', '', '', '', '', '', '50', '190', '', '', '2015-09-21', 'Closed', 'Short ', '33.42', '2015-09-21 20:32:10', '618%'),
(1099, 915, 'Closed', '', 'CNC', '62.79', '', '5797.12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '662', '', '', '2015-09-21', 'Closed', 'Long', '5901.18', '2015-09-21 20:34:28', '-2%'),
(1100, 689, 'Closed', '', 'BABA', '84.50', '', '887.13619', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1250', '200', '', '', '2015-12-08', 'Closed', 'Long', '886611.41', '2015-09-21 20:36:27', '-1%'),
(1101, 500, 'In Trouble', '', 'ADSK', '46.14', '-100 x ADSK Nov 52.5 calls', '1.00', '', '', '', '', '', '', '100 x ADSK Nov 45 puts', '1.78', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-25', 'Adjust', 'Combo', '', '2015-09-28 20:21:26', ''),
(1110, 983, 'In Trouble', '', 'EPAM', '78.45', '-3 x EPAM Oct 65 puts', '0.30', '-6 x EPAM Jan16 85 calls', '3.04', '', '', '', '', '3 x EPAM Oct 75 puts', '0.65', '3 x EPAM Jan16 70 calls', '10.86', '3 x EPAM Apr16 95 calls', '2.63', '', '', '200', '600', '', 'Adjust', '2015-10-05', 'Adjust', 'Combo', '', '2015-10-05 20:28:10', ''),
(1108, 500, 'Closed', '', 'ADSK', '63.96', '', '39869', '', '', '', '', '', '', '', '37869', '', '', '', '', '', '', '250', '1000', '', '', '2015-12-08', 'Closed', 'Short ', '', '2015-09-30 20:17:42', '5%'),
(1107, 500, 'At Risk', '', 'ADSK', '44.14', '', '', '', '', '', '', '', '', '200 x ADSK Nov 52.5 calls', '0.38', '', '', '', '', '', '', '250', '1000', '', 'Adjust', '2015-09-30', 'Adjust', 'Call', '', '2015-09-30 20:12:13', ''),
(1106, 983, 'In Trouble', '', 'EPAM', '69.79', '-3 x EPAM Jan16 70 calls', '6.05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-09-29', 'Adjust', 'Call', '', '2015-09-29 20:42:51', ''),
(1117, 983, 'In Trouble', '', 'EPAM', '77.94', '', '', '', '', '', '', '', '', '3 x EPAM Jan16 75 calls', '6.55', '', '', '', '', '', '', '200', '600', '', 'Adjust', '2015-10-15', 'Long', 'Call', '', '2015-10-15 19:06:09', ''),
(1119, 983, 'Closed', '', 'EPAM', '82.50', '', '', '', '', '', '', '', '', '', '1267.60', '', '', '', '', '', '', '200', '600', '', '', '2015-12-08', 'Closed', 'Long', '1963.71', '2015-10-19 20:27:19', '55%');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `ID` int(11) NOT NULL,
  `MonthReg` int(11) NOT NULL,
  `YearlyReg` int(11) NOT NULL,
  `MonthlyDis` int(11) NOT NULL,
  `YearlyDis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`ID`, `MonthReg`, `YearlyReg`, `MonthlyDis`, `YearlyDis`) VALUES
(1, 109, 797, 121, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `JoinDate` date NOT NULL,
  `AccountType` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Subscribed` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Carrier` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_password_hash`, `user_email`, `JoinDate`, `AccountType`, `Subscribed`, `Phone`, `Carrier`) VALUES
(1, '81dc9bdb52d04dc20036dbd8313ed055', 'damon.d.wilson@gmail.com', '2015-05-26', 'Paid', '1', '4155359696', 'mobile.att.net'),
(21, '088518720e3db02171c4acb564d3e7d4', 'goldjman@cox.net', '2015-05-14', 'Paid', '1', '7023536260', 'mobile.att.net'),
(26, '47cd21c85786ff7b1e5abe91dcdf08c5', 'diamonds2@cox.net', '2015-06-24', 'Expired', '0', '7024801341', 'mobile.att.net'),
(27, '81dc9bdb52d04dc20036dbd8313ed055', 'wilson_damon@yahoo.com', '2015-05-27', 'Expired', '1', '', 'mobile.att.net'),
(29, '78f33b8ee77ec395c272aaca9e923381', 'serborfil@gmail.com', '2015-07-23', 'Paid', '1', '7023408428', 'mobile.att.net'),
(30, '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', '2015-09-18', 'Paid', '1', '5104152222', ''),
(31, '098f6bcd4621d373cade4e832627b4f6', 'da@da.com', '2015-09-18', 'Trial', '1', '5102201844', ''),
(33, '098f6bcd4621d373cade4e832627b4f6', 'info@alminesoft.com', '2016-05-10', 'Trial', '1', '111111111', ''),
(34, '81dc9bdb52d04dc20036dbd8313ed055', 'damon@laxgoalierat.com', '2016-05-12', 'Trial', '1', '4155004395', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ibaccounts`
--
ALTER TABLE `ibaccounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `iborders`
--
ALTER TABLE `iborders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ibaccounts`
--
ALTER TABLE `ibaccounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `iborders`
--
ALTER TABLE `iborders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1127;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
