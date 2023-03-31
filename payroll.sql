-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 12:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mi` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `bname` varchar(50) DEFAULT NULL,
  `no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `fname`, `mi`, `lname`, `rate`, `bname`, `no`) VALUES
(1, 'IMELDA', 'A', 'ADONA', 942.31, 'Imelda', 10004),
(2, 'EVANGELINE', 'P', 'APELLANES', 692.31, 'Evangeline', 10016),
(3, 'ALBISA', 'A', 'FELIAS', 903.85, 'Albisa', 10006),
(4, 'NOEME', 'G', 'CHUA', 961.54, 'Noeme', 10005),
(5, 'MARINA', 'E', 'MORALES', 692.31, 'Marina', 10015),
(6, 'MARY JEAN', 'P', 'PAJARON', 730.77, 'Jean', 10009),
(7, 'JUDITH', 'A', 'PARADIANG', 692.31, 'Judith', 10013),
(8, 'JAYSON', 'C', 'CEBRERO', 411.54, 'Jayson', 10017),
(9, 'PRINCESS ALYSSA MARIE', 'P', 'ANG', 623.08, 'Alyssa', 10011),
(10, 'DANDEE', 'N', 'CUBILLAS', 623.08, 'Dandee', 10012),
(11, 'APRIL JOY', 'P', 'BALISBIS', 623.08, 'April', 10010),
(12, 'GEMMA', 'A', 'PATEREZ', 415.38, 'Gemma', 10014),
(13, 'KRIZZIA MAY', 'E', 'YBAÑEZ', 1923.08, NULL, 10003),
(14, 'BIANCA MAE', 'P', 'LICAYAN', 445.38, 'Bianca', 10008),
(15, 'KATRINA', 'V', 'GARDOCE', 600, 'Katrina', 10007);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `log_number` int(11) NOT NULL,
  `pay_date` varchar(100) DEFAULT NULL,
  `payroll_content` text DEFAULT NULL,
  `pay_coverage` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`log_number`, `pay_date`, `payroll_content`, `pay_coverage`, `date_added`) VALUES
(1, 'August 31, 2019', '\n          <center>\n            <p style=\"font-size: 14px;\"><b>RP MAQUILING AND CO. CPAs</b><span></span><br>Corner Sulpicio and Liwayway Sts., Luz Village, Brgy. Bayanihan, Butuan City</p><br>\n            <p style=\"font-size: 14px;\"><b>PAYROLL</b><span></span><br>Pay Date: August 31, 2019<br>Pay Coverage: August 15, 2019 - August 30, 2019</p>\n          </center>\n          <br>\n            <table id=\"tbl_payroll\" style=\"border-collapse:collapse; font-size: 12px;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n              <thead>\n                <tr>\n                  <td><center><b>Employee<br>Name</b></center></td>\n                  <td><center><b>Rate</b></center></td>\n                  <td><center><b>Days</b></center></td>\n                  <td><center><b>Basic<br>Pay</b></center></td>\n                  <td><center><b>Undertime</b></center></td>\n                  <td><center><b>Amount</b></center></td>\n                  <td><center><b>Gross<br>Pay</b></center></td>\n                  <td><center><b>SSS</b></center></td>\n                  <td><center><b>Philhealth</b></center></td>\n                  <td><center><b>Pag-IBIG</b></center></td>\n                  <td><center><b>Tax</b></center></td>\n                  <td><center><b>Net Pay</b></center></td>\n                  <td><center><b>HDMF<br>Loan</b></center></td>\n                  <td><center><b>SSS<br>Loan</b></center></td>\n                  <td><center><b>MF-<br>Cont</b></center></td>\n                  <td><center><b>MF-<br>Loan</b></center></td>\n                  <td><center><b>CA</b></center></td>\n                  <td><center><b>Total<br>Deduction</b></center></td>\n                  <td><center><b>Net<br>Due</b></center></td>\n                  <td><center><b>Signature</b></center></td>\n                </tr>\n              </thead>\n              <tbody><tr><td>ADONA, IMELDA A.</td><td><center>942.31</center></td><td><center>9</center></td><td><center>8,480.79</center></td><td><center>9.15</center></td><td><center>1,077.77</center></td><td><center>7,403.02</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>7,403.02</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>7,403.02</center></td><td><center></center></td></tr><tr><td>ANG, PRINCESS ALYSSA MARIE P.</td><td><center>623.08</center></td><td><center>10</center></td><td><center>6,230.80</center></td><td><center>0.70</center></td><td><center>54.52</center></td><td><center>6,176.28</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>6,176.28</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>6,176.28</center></td><td><center></center></td></tr><tr><td>APELLANES, EVANGELINE P.</td><td><center>692.31</center></td><td><center>12</center></td><td><center>8,307.72</center></td><td><center>0.00</center></td><td><center>0.00</center></td><td><center>8,307.72</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>8,307.72</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>8,307.72</center></td><td><center></center></td></tr><tr><td>BALISBIS, APRIL JOY P.</td><td><center>623.08</center></td><td><center>12</center></td><td><center>7,476.96</center></td><td><center>10.82</center></td><td><center>842.72</center></td><td><center>6,634.24</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>6,634.24</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>6,634.24</center></td><td><center></center></td></tr><tr><td>CEBRERO, JAYSON C.</td><td><center>411.54</center></td><td><center>12</center></td><td><center>4,938.48</center></td><td><center>1.50</center></td><td><center>77.16</center></td><td><center>4,861.32</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>4,861.32</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>4,861.32</center></td><td><center></center></td></tr><tr><td>CHUA, NOEME G.</td><td><center>961.54</center></td><td><center>12</center></td><td><center>11,538.48</center></td><td><center>8.47</center></td><td><center>1,018.03</center></td><td><center>10,520.45</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>10,520.45</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>10,520.45</center></td><td><center></center></td></tr><tr><td>CUBILLAS, DANDEE N.</td><td><center>623.08</center></td><td><center>10</center></td><td><center>6,230.80</center></td><td><center>9.57</center></td><td><center>745.36</center></td><td><center>5,485.44</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,485.44</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,485.44</center></td><td><center></center></td></tr><tr><td>FELIAS, ALBISA A.</td><td><center>903.85</center></td><td><center>12</center></td><td><center>10,846.20</center></td><td><center>0.40</center></td><td><center>45.19</center></td><td><center>10,801.01</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>10,801.01</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>10,801.01</center></td><td><center></center></td></tr><tr><td>GARDOCE, KATRINA V.</td><td><center>600</center></td><td><center>12</center></td><td><center>7,200.00</center></td><td><center>9.50</center></td><td><center>712.50</center></td><td><center>6,487.50</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>6,487.50</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>6,487.50</center></td><td><center></center></td></tr><tr><td>LICAYAN, BIANCA MAE P.</td><td><center>445.38</center></td><td><center>12</center></td><td><center>5,344.56</center></td><td><center>1.68</center></td><td><center>93.53</center></td><td><center>5,251.03</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,251.03</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,251.03</center></td><td><center></center></td></tr><tr><td>MORALES, MARINA E.</td><td><center>692.31</center></td><td><center>9</center></td><td><center>6,230.79</center></td><td><center>10.22</center></td><td><center>884.43</center></td><td><center>5,346.36</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,346.36</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,346.36</center></td><td><center></center></td></tr><tr><td>PAJARON, MARY JEAN P.</td><td><center>730.77</center></td><td><center>12</center></td><td><center>8,769.24</center></td><td><center>7.83</center></td><td><center>715.24</center></td><td><center>8,054.00</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>8,054.00</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>8,054.00</center></td><td><center></center></td></tr><tr><td>PARADIANG, JUDITH A.</td><td><center>692.31</center></td><td><center>11</center></td><td><center>7,615.41</center></td><td><center>3.23</center></td><td><center>279.52</center></td><td><center>7,335.89</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>7,335.89</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>7,335.89</center></td><td><center></center></td></tr><tr><td>PATEREZ, GEMMA A.</td><td><center>415.38</center></td><td><center>13</center></td><td><center>5,399.94</center></td><td><center>0.00</center></td><td><center>0.00</center></td><td><center>5,399.94</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,399.94</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,399.94</center></td><td><center></center></td></tr><tr><td><center id=\"val\">-</center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td></tr></tbody>\n              <tfoot><tr><td><center><b>TOTAL</b></center></td><td></td><td></td><td><center><b>104,610.17</b></center></td><td></td><td><center><b>6,545.97</b></center></td><td><center><b>98,064.20</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>98,064.20</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>98,064.20</b></center></td><td></td></tr></tfoot>\n            </table>\n            <br>\n            ', 'August 15, 2019 - August 30, 2019', '2019-10-18 10:17:28'),
(2, 'September 30, 2019', '\n          <center>\n            <p style=\"font-size: 14px;\"><b>RP MAQUILING AND CO. CPAs</b><span></span><br>Corner Sulpicio and Liwayway Sts., Luz Village, Brgy. Bayanihan, Butuan City</p><br>\n            <p style=\"font-size: 14px;\"><b>PAYROLL</b><span></span><br>Pay Date: September 30, 2019<br>Pay Coverage: September 13, 2019 - September 28, 2019</p>\n          </center>\n          <br>\n            <table id=\"tbl_payroll\" style=\"border-collapse:collapse; font-size: 12px;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n              <thead>\n                <tr>\n                  <td><center><b>Employee<br>Name</b></center></td>\n                  <td><center><b>Rate</b></center></td>\n                  <td><center><b>Days</b></center></td>\n                  <td><center><b>Basic<br>Pay</b></center></td>\n                  <td><center><b>Undertime</b></center></td>\n                  <td><center><b>Amount</b></center></td>\n                  <td><center><b>Gross<br>Pay</b></center></td>\n                  <td><center><b>SSS</b></center></td>\n                  <td><center><b>Philhealth</b></center></td>\n                  <td><center><b>Pag-IBIG</b></center></td>\n                  <td><center><b>Tax</b></center></td>\n                  <td><center><b>Net Pay</b></center></td>\n                  <td><center><b>HDMF<br>Loan</b></center></td>\n                  <td><center><b>SSS<br>Loan</b></center></td>\n                  <td><center><b>MF-<br>Cont</b></center></td>\n                  <td><center><b>MF-<br>Loan</b></center></td>\n                  <td><center><b>CA</b></center></td>\n                  <td><center><b>Total<br>Deduction</b></center></td>\n                  <td><center><b>Net<br>Due</b></center></td>\n                  <td><center><b>Signature</b></center></td>\n                </tr>\n              </thead>\n              <tbody><tr><td>ADONA, IMELDA A.</td><td><center>942.31</center></td><td><center>14</center></td><td><center>13,192.34</center></td><td><center>11.22</center></td><td><center>1,321.59</center></td><td><center>11,870.75</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>11,870.75</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>11,870.75</center></td><td><center></center></td></tr><tr><td>ANG, PRINCESS ALYSSA MARIE P.</td><td><center>623.08</center></td><td><center>13</center></td><td><center>8,100.04</center></td><td><center>21.58</center></td><td><center>1,680.76</center></td><td><center>6,419.28</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>6,419.28</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>6,419.28</center></td><td><center></center></td></tr><tr><td>APELLANES, EVANGELINE P.</td><td><center>692.31</center></td><td><center>13</center></td><td><center>9,000.03</center></td><td><center>8.50</center></td><td><center>735.58</center></td><td><center>8,264.45</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>8,264.45</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>8,264.45</center></td><td><center></center></td></tr><tr><td>BALISBIS, APRIL JOY P.</td><td><center>623.08</center></td><td><center>13</center></td><td><center>8,100.04</center></td><td><center>14.20</center></td><td><center>1,105.97</center></td><td><center>6,994.07</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>6,994.07</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>6,994.07</center></td><td><center></center></td></tr><tr><td>CEBRERO, JAYSON C.</td><td><center>411.54</center></td><td><center>13</center></td><td><center>5,350.02</center></td><td><center>5.83</center></td><td><center>299.91</center></td><td><center>5,050.11</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,050.11</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,050.11</center></td><td><center></center></td></tr><tr><td>CHUA, NOEME G.</td><td><center>961.54</center></td><td><center>12</center></td><td><center>11,538.48</center></td><td><center>0.45</center></td><td><center>54.09</center></td><td><center>11,484.39</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>11,484.39</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>11,484.39</center></td><td><center></center></td></tr><tr><td>CUBILLAS, DANDEE N.</td><td><center>623.08</center></td><td><center>12</center></td><td><center>7,476.96</center></td><td><center>1.38</center></td><td><center>107.48</center></td><td><center>7,369.48</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>7,369.48</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>7,369.48</center></td><td><center></center></td></tr><tr><td>FELIAS, ALBISA A.</td><td><center>903.85</center></td><td><center>13</center></td><td><center>11,750.05</center></td><td><center>5.42</center></td><td><center>612.36</center></td><td><center>11,137.69</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>11,137.69</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>11,137.69</center></td><td><center></center></td></tr><tr><td>LICAYAN, BIANCA MAE P.</td><td><center>445.38</center></td><td><center>14</center></td><td><center>6,235.32</center></td><td><center>11.20</center></td><td><center>623.53</center></td><td><center>5,611.79</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,611.79</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,611.79</center></td><td><center></center></td></tr><tr><td>MORALES, MARINA E.</td><td><center>692.31</center></td><td><center>11</center></td><td><center>7,615.41</center></td><td><center>7.27</center></td><td><center>629.14</center></td><td><center>6,986.27</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>6,986.27</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>6,986.27</center></td><td><center></center></td></tr><tr><td>PAJARON, MARY JEAN P.</td><td><center>730.77</center></td><td><center>13</center></td><td><center>9,500.01</center></td><td><center>10.65</center></td><td><center>972.84</center></td><td><center>8,527.17</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>8,527.17</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>8,527.17</center></td><td><center></center></td></tr><tr><td>PARADIANG, JUDITH A.</td><td><center>692.31</center></td><td><center>13</center></td><td><center>9,000.03</center></td><td><center>7.12</center></td><td><center>1,395.00</center></td><td><center>7,605.03</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>7,605.03</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>7,605.03</center></td><td><center></center></td></tr><tr><td>PATEREZ, GEMMA A.</td><td><center>415.38</center></td><td><center>13</center></td><td><center>5,399.94</center></td><td><center>0.68</center></td><td><center>35.31</center></td><td><center>5,364.63</center></td><td><center>100.00</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>5,264.63</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>-</center></td><td><center>0.00</center></td><td><center>5,264.63</center></td><td><center></center></td></tr><tr><td><center id=\"val\">-</center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td><td><center id=\"val\"> </center></td></tr></tbody>\n              <tfoot><tr><td><center><b>TOTAL</b></center></td><td></td><td></td><td><center><b>112,258.67</b></center></td><td></td><td><center><b>9,573.56</b></center></td><td><center><b>102,685.11</b></center></td><td><center><b>100.00</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>102,585.11</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>-</b></center></td><td><center><b>102,585.11</b></center></td><td></td></tr></tfoot>\n            </table>\n            <br>\n            ', 'September 13, 2019 - September 28, 2019', '2019-10-18 15:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_credits`
--

CREATE TABLE `tbl_leave_credits` (
  `no` int(10) DEFAULT NULL,
  `sick_leave` double DEFAULT NULL,
  `vacation_leave` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leave_credits`
--

INSERT INTO `tbl_leave_credits` (`no`, `sick_leave`, `vacation_leave`) VALUES
(10004, 5, 5),
(10016, 5, 5),
(10006, 5, 5),
(10005, 5, 5),
(10015, 5, 5),
(10009, 5, 5),
(10013, 5, 5),
(10017, 5, 5),
(10011, 5, 5),
(10012, 5, 5),
(10010, 5, 5),
(10014, 5, 5),
(10003, 5, 5),
(10008, 5, 5),
(10007, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ldate` varchar(50) DEFAULT NULL,
  `ltime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admingwapo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`log_number`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `log_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
