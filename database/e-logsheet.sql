-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2023 at 09:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-logsheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `control_number`
--

CREATE TABLE `control_number` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `scheduledate` varchar(200) NOT NULL,
  `appointment` varchar(200) NOT NULL,
  `purpose_of_visit` varchar(200) NOT NULL,
  `agency_school_office` varchar(200) NOT NULL,
  `position_designation` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `reference_no` varchar(200) NOT NULL,
  `time_in` varchar(200) NOT NULL,
  `time_out` varchar(200) NOT NULL,
  `seriesnumber` varchar(200) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_logsheetaccounts`
--

CREATE TABLE `e_logsheetaccounts` (
  `accountType` varchar(200) NOT NULL,
  `accountName` varchar(200) NOT NULL,
  `userPosition` varchar(200) NOT NULL,
  `userOffice` varchar(200) NOT NULL,
  `depedEmail` varchar(200) NOT NULL,
  `accountPass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_logsheetaccounts`
--

INSERT INTO `e_logsheetaccounts` (`accountType`, `accountName`, `userPosition`, `userOffice`, `depedEmail`, `accountPass`) VALUES
('Admin', 'Arthur Francisco', 'ICT Head', 'Information Communication Technology', 'arthur.francisco@deped.gov.ph', 'deped123'),
('Admin', 'Dennis Garcia', 'SGOD Head', 'School Governance Operations Division', 'dennis.garcia@deped.gov.ph', 'deped1234'),
('Security', 'Security Guard', 'Security Head', 'Security', 'Securityguard@deped.gov.ph', 'Security123'),
('Admin', 'Jeanny G. Roldan', 'Cashier Personel', 'Cashier Section', ' jeanny.roldan001@deped.gov.ph', 'deped123'),
('Admin', 'Jomel Policarpio', 'Administrative Assistant II', 'Accounting Section', 'jomel.policarpio@deped.gov.ph\r\n', 'deped123'),
('Admin', 'Gina E. Cape', 'Administrative Assistant III', 'Accounting Section', 'gina.cape@deped.gov.ph', 'deped123'),
('Admin', 'Jonie-May S. Francisco', 'Administrative Aide VI', 'Cash Section', 'joniemay.francisco@deped.gov.ph', 'deped123'),
('Admin', 'Ma. Beverlie J. Nolasco', 'Accounting Section', 'Accounting Section', 'mabeverlie.jabat@deped.gov.ph', 'deped123'),
('Admin', 'Catherine A. Flores', 'Cashier', 'Cashier Section', 'catherine.flores010@deped.gov.ph', 'deped123'),
('Admin', 'Sherylyn M. Robes', 'Payroll', 'Payroll Section', 'sherylyn.robes@deped.gov.ph', 'deped123'),
('Admin', 'Esperanza D. Cruz', 'Payroll', 'Payroll Section', 'esperanza.cruz@deped.gov.ph', 'deped123'),
('Admin', 'Rodelio D. Jimenez', 'SDS', ' Schools Division Superintendent', 'rodelio.jimenez001@deped.gov.ph', 'deped123'),
('Admin', 'Ann Melfei P. Casas', 'Accounting', 'Accounting Section', 'annmelfei.casas@deped.gov.ph', 'deped123'),
('Admin', 'Donn Uriel Buenaventura', 'Sgod', 'School Governance Operations Division', 'donnuriel.buenaventura@deped.gov.ph', 'deped123'),
('Admin', 'Teresita S. Padilla', 'PSDS', 'Curriculum Implementation Division', 'teresita.padilla001@deped.gov.ph', 'deped123'),
('Admin', 'Conrado O. Abraham', 'Sgod', 'School Governance Operations Division', 'conrado.abraham@deped.gov.ph', 'deped`123'),
('Admin', 'Noel B. Burce', 'Sgod', 'School Governance Operations Division', 'noel.burce@deped.gov.ph', 'deped123'),
('Admin', 'Faith Arky C. De Ausen', 'Sgod', 'School Governance Operations Division', 'faitharky.deausen@deped.gov.ph', 'deped123'),
('Admin', 'Alma Lynn M. Santos', 'Sgod', 'School Governance Operations Division', 'almalynn.santos@deped.gov.ph', 'deped123'),
('Admin', 'Thelma C. Bajar', 'Accounting', 'Accounting Section', 'thelma.bajar@deped.gov.ph', 'deped123'),
('Admin', 'Darlan R. Grageda', 'Cid', 'Curriculum Implementation Division', 'darlan.grageda001@deped.gov.ph', 'deped123'),
('Admin', 'Benedict John C. Aure', 'Atty', 'Legal Services', 'benedictjohn.aure@deped.gov.ph', 'deped123'),
('Admin', 'Manuel N. Payumo Jr.', 'Sgod', 'School Governance Operations Division', 'manuel.payumojr@deped.gov.ph', 'deped123'),
('Admin', 'Laarnie I. Catahan', 'Accounting', 'Accounting Section', 'laarnie.catahan@deped.gov.ph', 'deped123'),
('Admin', 'Maria Mercedez M. Bijasa', 'Accounting', 'Accounting Section', 'mariamercedez.bijasa@deped.gov.ph', 'deped123'),
('Admin', 'Maria Socorro M. De Guzman', 'Sgod', 'School Governance Operations Division', 'masocorro.deguzman@deped.gov.ph', 'deped123'),
('Admin', 'Adelynne Joie B. San Diego', 'Sgod', 'School Governance Operations Division', 'adeynnejie.sandiego@deped.gov.ph', 'deped123'),
('Admin', 'Nenette M. Gomez', 'Accounting', 'Accounting Section', 'nenette.gomez@deped.gov.ph', 'deped123'),
('Admin', 'Mary Ann L. Soriano', 'Sgod', 'School Governance Operations Division', 'maryann.soriano004@deped.gov.ph', 'deped123'),
('Admin', 'Melsan R. Daza', 'Sgod', 'School Governance Operations Division', 'melsan.daza@deped.gov.ph', 'deped123'),
('Admin', 'Manuel P. Delacruz', 'Sgod', 'School Governance Operations Division', 'manuel.delacruz008@deped.gov.ph', 'deped123'),
('Admin', 'Baby Ruth D. Pablo', 'Accounting', 'Accounting Section', 'babyruth.pablo@deped.gov.ph', 'deped123'),
('Admin', 'Jennifer F. Fuentes', 'Sgod', 'School Governance Operations Division', 'jennifer.fuentes004@deped.gov.ph', 'deped123'),
('Admin', 'Lalaine S. Bartolome', 'Budget', 'Budget Section', 'lalaine.mendoza003@deped.gov.ph', 'deped123'),
('Admin', 'Orlando D. Gonzales', 'Budget', 'Budget Section', 'orlando.gonzales@deped.gov.ph', 'deped123'),
('Admin', 'Rechie O. Labandria', 'Accounting', 'Accounting Section', 'rechie.labandria@deped.gov.ph', 'deped123'),
('Admin', 'Merlita D. Ynciong', 'Sgod', 'School Governance Operations Division', 'merlita.ynciong@deped.gov.ph', 'deped123'),
('Admin', 'Adelynne Joie B. Sandiego', 'Sgod', 'School Governance Operations Division', 'adylnnejoie.sandiego@deped.gov.ph', 'deped123'),
('Admin', 'Randhell C. Ruzgal', 'Sgod', 'School Governance Operations Division', 'randhell.ruzgal@deped.gov.ph', 'deped123'),
('Admin', 'Angelo Capa', 'OJT', 'Information Communication Technology', 'rurilhayne@gmail.com', 'deped123');

-- --------------------------------------------------------

--
-- Table structure for table `e_logshistory`
--

CREATE TABLE `e_logshistory` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `sex` varchar(200) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `scheduledate` varchar(200) DEFAULT NULL,
  `position_designation` varchar(50) NOT NULL,
  `agency_school_office` varchar(50) NOT NULL,
  `appointment` varchar(200) DEFAULT NULL,
  `purpose_of_visit` varchar(200) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `reference_no` varchar(200) NOT NULL,
  `time_in` varchar(200) NOT NULL,
  `time_out` varchar(200) DEFAULT NULL,
  `assisted_by` varchar(50) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_logshistory`
--

INSERT INTO `e_logshistory` (`id`, `fullname`, `sex`, `priority`, `phonenumber`, `scheduledate`, `position_designation`, `agency_school_office`, `appointment`, `purpose_of_visit`, `department`, `reference_no`, `time_in`, `time_out`, `assisted_by`, `timeStamp`) VALUES
(0, 'Ivan', 'Male', '', '19210221912', '11/06/2023', '', '', 'Walk-in', 'TRY 1', 'Information Communication Technology', '31KQYAG1', '09:55 AM', '09:55 AM', '', '2023-11-06 01:55:03'),
(0, 'IVan', '', '', '09182038910', '11/08/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'ZPTXVHZS', '10:34 AM', '10:34 AM', '', '2023-11-08 02:34:22'),
(0, 'RUTH JANE STA MARIA', '', '', '09262626161', '11/09/2023', '', '', 'Walk-in', 'asd ', 'Information Communication Technology', 'UM657IXV', '10:09 AM', '10:09 AM', '', '2023-11-09 02:09:14'),
(0, 'CAPA', '', '', '09129381028', '11/09/2023', '', '', 'Walk-in', 'asd ', 'Information Communication Technology', 'JCL22218', '10:10 AM', '10:10 AM', '', '2023-11-09 02:10:09'),
(0, 'Imee Policarpio', '', '', '09129121281', '11/09/2023', '', '', 'Walk-in', 'asd ', 'Information Communication Technology', 'M0QCTSXG', '11:16 AM', '11:18 AM', '', '2023-11-09 03:18:22'),
(0, 'Policarpio', 'Male', '', '09102983012', '11/13/2023', '', '', 'Walk-in', 'asd', 'Curriculum Implementation Division', 'BPCI3XHO', '01:08 PM', '01:08 PM', '', '2023-11-13 05:08:50'),
(0, 'Ivan', 'Male', '', '09123908120', '11/13/2023', '', '', 'Walk-in', 'asd', 'Curriculum Implementation Division', 'MCS2S6EV', '01:08 PM', '01:43 PM', 'Teresita S. Padilla', '2023-11-13 05:43:20'),
(0, 'Ivan Policarpio', '', '', '09123912983', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'V86O98OD', '10:27 AM', '10:30 AM', 'Arthur Francisco', '2023-11-14 02:30:25'),
(0, 'asd', 'Male', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'C4M8D3KV', '10:29 AM', '10:30 AM', 'Arthur Francisco', '2023-11-14 02:30:27'),
(0, 'A', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'P72ZQSDW', '10:30 AM', '10:30 AM', 'Arthur Francisco', '2023-11-14 02:30:29'),
(0, 'B', 'Male', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'ad', 'Information Communication Technology', '6K0X1HE8', '10:33 AM', '10:36 AM', 'Arthur Francisco', '2023-11-14 02:36:31'),
(0, 'C', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'VCWOMXLM', '10:48 AM', '11:07 AM', 'Arthur Francisco', '2023-11-14 03:07:34'),
(0, 'D', '', '', '12123123123', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'KHJ8EBVQ', '10:51 AM', '11:07 AM', 'Arthur Francisco', '2023-11-14 03:07:37'),
(0, 'Jane', 'Female', '', '09129381208', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '9TQXQ7XT', '11:08 AM', '11:16 AM', 'Arthur Francisco', '2023-11-14 03:16:50'),
(0, 'ivan', 'Male', '', '09123091293', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'MSE9AOQ4', '11:16 AM', '11:16 AM', 'Arthur Francisco', '2023-11-14 03:16:53'),
(0, 'I', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'NIFH1G9L', '11:05 AM', '11:16 AM', 'Arthur Francisco', '2023-11-14 03:16:55'),
(0, 'H', '', '', '12312312321', '11/14/2023', '', '', 'Walk-in', 'sda', 'Information Communication Technology', 'OZXVXOVU', '11:06 AM', '11:16 AM', 'Arthur Francisco', '2023-11-14 03:16:57'),
(0, 'G', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '6XB0WGN6', '11:07 AM', '11:16 AM', 'Arthur Francisco', '2023-11-14 03:16:59'),
(0, 'F', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'R95SSBAM', '11:07 AM', '11:17 AM', 'Arthur Francisco', '2023-11-14 03:17:00'),
(0, 'E', '', '', '12931293123', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '206FCR9A', '10:51 AM', '11:17 AM', 'Arthur Francisco', '2023-11-14 03:17:03'),
(0, 'Ivan', 'Male', '', '01928301283', '11/14/2023', '', '', 'Walk-in', 'sad', 'Information Communication Technology', 'V28W3F27', '11:20 AM', '11:22 AM', 'Arthur Francisco', '2023-11-14 03:22:11'),
(0, 'Female', 'Female', '', '12039012312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'A9YAW7YI', '11:20 AM', '11:22 AM', 'Arthur Francisco', '2023-11-14 03:22:13'),
(0, 'asd', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'OGIJ0JRT', '11:22 AM', '11:22 AM', 'Arthur Francisco', '2023-11-14 03:22:15'),
(0, 'IVAN', '', '', '09120312037', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '3UXSONM5', '11:21 AM', '11:22 AM', 'Arthur Francisco', '2023-11-14 03:22:17'),
(0, 'Ivan', 'Male', '', '09129831298', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'WPPSGMHR', '11:26 AM', '12:51 PM', 'Arthur Francisco', '2023-11-14 04:51:58'),
(0, 'TRY', '', '', '09120938102', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'HOIX96W5', '12:51 PM', '12:52 PM', 'Arthur Francisco', '2023-11-14 04:52:00'),
(0, 'JK', '', '', '09129387123', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'KX7CW383', '11:44 AM', '12:52 PM', 'Arthur Francisco', '2023-11-14 04:52:02'),
(0, 'Jayson Fuller', '', '', '09123097127', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'R8WL7LJA', '11:28 AM', '12:52 PM', 'Arthur Francisco', '2023-11-14 04:52:04'),
(0, 'Angelo', '', '', '09128938192', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'R192T9S2', '12:50 PM', '12:52 PM', 'Arthur Francisco', '2023-11-14 04:52:06'),
(0, 'Reymi', 'Male', '', '09123087123', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'U221Y28V', '11:36 AM', '12:52 PM', 'Arthur Francisco', '2023-11-14 04:52:08'),
(0, 'Ivan', '', '', '09123812983', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '9UJTRXID', '12:52 PM', '12:54 PM', 'Arthur Francisco', '2023-11-14 04:54:51'),
(0, 'Policarpi', 'Male', '', '10289309182', '11/14/2023', '', '', 'Walk-in', 'ads', 'Information Communication Technology', 'UHQ535VL', '12:54 PM', '12:54 PM', 'Arthur Francisco', '2023-11-14 04:54:53'),
(0, 'Ivan', '', '', '09129381029', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'N18T4118', '01:02 PM', '01:11 PM', 'Arthur Francisco', '2023-11-14 05:11:22'),
(0, 'Policarpio', '', '', '09123812381', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '2BBBH229', '01:11 PM', '01:11 PM', 'Arthur Francisco', '2023-11-14 05:11:41'),
(0, 'Capa', 'Male', '', '09120931029', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'HIBIKSZQ', '01:11 PM', '01:11 PM', 'Arthur Francisco', '2023-11-14 05:11:44'),
(0, 'ivan', '', '', '09129312903', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'GXN2G6HP', '01:11 PM', '01:11 PM', 'Arthur Francisco', '2023-11-14 05:11:48'),
(0, 'asd', '', '', '12312312321', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'AG8JE434', '01:13 PM', '01:13 PM', 'Arthur Francisco', '2023-11-14 05:13:20'),
(0, 'Ivan', '', '', '09120391209', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'IO881V54', '01:14 PM', '01:31 PM', 'Arthur Francisco', '2023-11-14 05:31:54'),
(0, 'asd', '', '', '12312312312', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'E76J170F', '01:19 PM', '01:31 PM', 'Arthur Francisco', '2023-11-14 05:31:56'),
(0, 'Try', '', '', '90192301283', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '2C2UOPNK', '01:31 PM', '01:31 PM', 'Arthur Francisco', '2023-11-14 05:31:58'),
(0, 'reymi', '', '', '91283018230', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '5HNFF1MU', '01:32 PM', '01:32 PM', 'Arthur Francisco', '2023-11-14 05:32:58'),
(0, 'policarpio', '', '', '01929308102', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'BNSCF33N', '01:33 PM', '01:33 PM', 'Arthur Francisco', '2023-11-14 05:33:01'),
(0, 'policarpio', '', '', '01920381238', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '4DV7AJP2', '01:33 PM', '01:33 PM', 'Arthur Francisco', '2023-11-14 05:33:54'),
(0, 'reymi', '', '', '01920938102', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'UC9MTF7N', '01:33 PM', '01:33 PM', 'Arthur Francisco', '2023-11-14 05:33:56'),
(0, 'ivan', '', '', '09123981209', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '60HMT3WL', '01:35 PM', '01:45 PM', 'Arthur Francisco', '2023-11-14 05:45:30'),
(0, 'capa', '', '', '01290380128', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '7XCU1UYD', '01:34 PM', '01:46 PM', 'Arthur Francisco', '2023-11-14 05:46:42'),
(0, 'capa', '', '', '91209389012', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'R2Z1CVRV', '01:44 PM', '01:46 PM', 'Arthur Francisco', '2023-11-14 05:46:44'),
(0, 'New', '', '', '09123012830', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '3HZCXFDF', '01:45 PM', '01:46 PM', 'Arthur Francisco', '2023-11-14 05:46:45'),
(0, 'eyy', '', '', '09120931208', '11/14/2023', '', '', 'Walk-in', 'ad', 'Information Communication Technology', 'O3E3L27G', '01:46 PM', '01:46 PM', 'Arthur Francisco', '2023-11-14 05:46:47'),
(0, 'ivan', '', '', '09120983012', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'VNZMWXD5', '01:47 PM', '01:48 PM', 'Arthur Francisco', '2023-11-14 05:48:00'),
(0, 'peace', '', '', '01923091823', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '9OKH44BH', '01:47 PM', '01:48 PM', 'Arthur Francisco', '2023-11-14 05:48:02'),
(0, 'Policarpio', 'Male', '', '01923918230', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'RGY46XKL', '02:21 PM', '02:21 PM', 'Arthur Francisco', '2023-11-14 06:21:17'),
(0, 'CITY COLLEGE', '', '', '09120938192', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'XANJJB1F', '02:23 PM', '02:23 PM', 'Arthur Francisco', '2023-11-14 06:23:12'),
(0, 'Policarpio', '', '', '01923908123', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '30LH0RMJ', '02:07 PM', '03:30 PM', 'Arthur Francisco', '2023-11-14 07:30:25'),
(0, 'JARUTH', '', '', '09123012390', '11/14/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'WVMOEYM9', '03:56 PM', '03:56 PM', 'Arthur Francisco', '2023-11-14 07:56:41'),
(0, 'Beauty', '', '', '12312312123', '11/14/2023', '', '', 'Walk-in', 'asd', 'Curriculum Implementation Division', 'OFXZ4RZB', '03:57 PM', '03:57 PM', 'Teresita S. Padilla', '2023-11-14 07:57:21'),
(0, 'Ivan Policarpio', 'Male', '', '09123128931', '11/16/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', '9I5V89E2', '08:31 AM', '08:31 AM', 'Arthur Francisco', '2023-11-16 00:31:20'),
(0, 'Reymi Angelo Dela Cruz', 'Male', '', '12312387192', '11/16/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'PIVJJ6YL', '09:05 AM', '09:05 AM', 'Arthur Francisco', '2023-11-16 01:05:35'),
(0, 'Angelo Capa', 'Male', '', '09123098120', '11/16/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'QNYR84MQ', '10:00 AM', '10:00 AM', 'Arthur Francisco', '2023-11-16 02:00:24'),
(0, 'jay', 'Male', '', '10823971298', '11/16/2023', '', '', 'Online', 'asd', 'Information Communication Technology', 'ZG11082R', '10:35 AM', '10:35 AM', 'Arthur Francisco', '2023-11-17 02:35:50'),
(0, 'ivan', 'Male', '', '09123012390', '11/17/2023', '', '', 'Walk-in', 'asd', 'Information Communication Technology', 'CO17S8T7', '12:36 PM', '12:36 PM', 'Arthur Francisco', '2023-11-17 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `e_monitoringlogsheet`
--

CREATE TABLE `e_monitoringlogsheet` (
  `id` int(11) NOT NULL DEFAULT 0,
  `fullname` varchar(200) DEFAULT NULL,
  `sex` varchar(200) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `scheduledate` varchar(200) DEFAULT NULL,
  `appointment` varchar(200) DEFAULT NULL,
  `purpose_of_visit` varchar(200) DEFAULT NULL,
  `position_designation` varchar(200) NOT NULL,
  `agency_school_office` varchar(200) NOT NULL,
  `department` varchar(200) DEFAULT NULL,
  `reference_no` varchar(20) DEFAULT NULL,
  `time_in` varchar(200) DEFAULT NULL,
  `time_out` varchar(200) NOT NULL,
  `action` varchar(20) DEFAULT NULL,
  `cancel` varchar(20) DEFAULT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_monitoringlogsheet`
--

INSERT INTO `e_monitoringlogsheet` (`id`, `fullname`, `sex`, `priority`, `phonenumber`, `scheduledate`, `appointment`, `purpose_of_visit`, `position_designation`, `agency_school_office`, `department`, `reference_no`, `time_in`, `time_out`, `action`, `cancel`, `timeStamp`) VALUES
(0, 'asd', 'Male', '', '12312312312', '11/17/2023', 'Walk-in', 'asdasd', 'asd', 'asd', 'Information Communication Technology', '1CWP3P73', NULL, '', NULL, NULL, '2023-11-17 02:19:42'),
(0, 'ivan', 'Male', '', '09120938190', '11/16/223', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'K2ASGANK', NULL, '', NULL, NULL, '2023-11-17 02:36:09'),
(0, 'TRY', 'Male', '', '19283912830', '11/16/223', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'JNXB531A', NULL, '', NULL, NULL, '2023-11-17 05:10:52'),
(0, 'asd', 'Male', '', '12312321321', '11/21/2023', 'Walk-in', 'asd', 'as', 'asd', 'Information Communication Technology', '2P1410YA', NULL, '', NULL, NULL, '2023-11-21 08:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `unsuccessful_appointment`
--

CREATE TABLE `unsuccessful_appointment` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `sex` varchar(200) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `scheduledate` varchar(200) DEFAULT NULL,
  `appointment` varchar(200) DEFAULT NULL,
  `purpose_of_visit` varchar(200) DEFAULT NULL,
  `position_designation` varchar(200) NOT NULL,
  `agency_school_office` varchar(200) NOT NULL,
  `department` varchar(200) DEFAULT NULL,
  `reference_no` varchar(200) NOT NULL,
  `time_in` varchar(200) NOT NULL,
  `time_out` varchar(200) DEFAULT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unsuccessful_appointment`
--

INSERT INTO `unsuccessful_appointment` (`id`, `fullname`, `sex`, `priority`, `phonenumber`, `scheduledate`, `appointment`, `purpose_of_visit`, `position_designation`, `agency_school_office`, `department`, `reference_no`, `time_in`, `time_out`, `timeStamp`) VALUES
(0, 'Ivan', 'Male', '', '09123012930', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'DFP0D5YM', '01:46 PM', NULL, '2023-11-17 05:46:53'),
(0, 'Policarpio', 'Male', '', '91829182398', '11/16/2023', 'Online', ' asd', 'asd', 'asd', 'Information Communication Technology', 'FMBKAN0Z', '', NULL, '2023-11-17 05:46:53'),
(0, 'Reymi', 'Male', '', '01293012930', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'CJP693RF', '01:48 PM', NULL, '2023-11-17 05:48:38'),
(0, 'Capa', 'Male', '', '01293012930', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'GX0HA865', '', NULL, '2023-11-17 05:48:38'),
(0, 'Ruth', 'Female', 'Senior Citizen', '91283912839', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'FYD1SH9L', '', NULL, '2023-11-17 05:49:57'),
(0, 'Jane', 'Male', '', '01923091203', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', '7LPODALX', '01:49 PM', NULL, '2023-11-17 05:49:57'),
(0, 'Imee', 'Female', '', '01293012930', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'S5H31U9R', '', NULL, '2023-11-17 05:55:08'),
(0, 'Irish', 'Female', '', '01923091239', '11/16/2023', 'Online', 'asd ', 'asd', 'asd', 'Information Communication Technology', 'GD8BNC5A', '01:55 PM', NULL, '2023-11-17 05:55:08'),
(0, 'asd', 'Female', '', '12039102391', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'QX49DU2N', '', NULL, '2023-11-17 05:55:41'),
(0, 'James', 'Male', '', '01293091239', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'E1KRSW71', '', NULL, '2023-11-17 05:59:22'),
(0, 'Jessica', 'Male', '', '01293012930', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'O2MD2OWG', '01:59 PM', NULL, '2023-11-17 05:59:22'),
(0, 'Ivan', 'Male', '', '01293091231', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', '9E17OR9N', '02:01 PM', NULL, '2023-11-17 06:01:13'),
(0, 'Policarpio', 'Male', '', '01293091203', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'U8UMZ86W', '02:01 PM', NULL, '2023-11-17 06:01:13'),
(0, 'Imee', 'Male', '', '01920930129', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'XNSIVXKB', '02:01 PM', NULL, '2023-11-17 06:01:13'),
(0, 'Reymi', 'Male', '', '01920391203', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', '2MI9U4J0', '', NULL, '2023-11-17 06:01:13'),
(0, 'asd', 'Male', '', '09120391293', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', 'KOXF8LFX', '', NULL, '2023-11-17 06:01:13'),
(0, 'Capa', 'Male', '', '01923091239', '11/16/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', '8GOY4R6E', '', NULL, '2023-11-17 06:01:14'),
(0, 'Ivan', 'Male', '', '01920310293', '11/20/2023', 'Online', 'asd', 'sa', 'asd', 'Information Communication Technology', 'TWNC02RT', '04:21 PM', NULL, '2023-11-21 08:21:04'),
(0, 'POLI', 'Male', '', '01923091203', '11/20/2023', 'Online', 'asd', 'asd', 'asd', 'Information Communication Technology', '0Z58K0O1', '', NULL, '2023-11-21 08:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `location`) VALUES
(56, 'October 2022 Accomplishments.mp4', 'videos/October 2022 Accomplishments.mp4'),
(57, 'bday.mp4', 'videos/bday.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `videos_displayer`
--

CREATE TABLE `videos_displayer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos_displayer`
--

INSERT INTO `videos_displayer` (`id`, `name`, `location`) VALUES
(1, 'October 2022 Accomplishments.mp4', 'videos/October 2022 Accomplishments.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_data`
--

CREATE TABLE `visitor_data` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_data`
--

INSERT INTO `visitor_data` (`id`, `visitor_name`, `department`, `time_stamp`) VALUES
(1, 'asd', 'Information Communication Technology', '2023-11-21 08:20:34'),
(2, 'asd', 'Information Communication Technology', '2023-11-21 08:20:40'),
(3, 'Ivan', 'Information Communication Technology', '2023-11-21 08:21:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `control_number`
--
ALTER TABLE `control_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos_displayer`
--
ALTER TABLE `videos_displayer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_data`
--
ALTER TABLE `visitor_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `control_number`
--
ALTER TABLE `control_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `videos_displayer`
--
ALTER TABLE `videos_displayer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_data`
--
ALTER TABLE `visitor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
