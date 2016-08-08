-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2016 at 02:42 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `se_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AMID` varchar(50) NOT NULL,
  `AMName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`AMID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AMID`, `AMName`, `Username`, `Password`) VALUES
('am001', 'Satish C.J.', 'scj', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `assumptions`
--

CREATE TABLE IF NOT EXISTS `assumptions` (
  `Project_id` varchar(5) NOT NULL,
  `Assumptions_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Minutes` int(5) NOT NULL,
  PRIMARY KEY (`Assumptions_id`),
  KEY `Project_id` (`Project_id`),
  KEY `Employee_id` (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assumptions`
--


-- --------------------------------------------------------

--
-- Table structure for table `baseline`
--

CREATE TABLE IF NOT EXISTS `baseline` (
  `Emp_id` varchar(50) NOT NULL,
  `Project_id` varchar(5) NOT NULL,
  `R_id` varchar(5) NOT NULL,
  `Description` text NOT NULL,
  `Pm_id` varchar(50) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(10) NOT NULL DEFAULT 'incomplete',
  `TypeID` varchar(10) NOT NULL,
  PRIMARY KEY (`Project_id`,`R_id`),
  KEY `Emp_id` (`Emp_id`),
  KEY `Project_id` (`Project_id`),
  KEY `R_id` (`R_id`),
  KEY `Timestamp` (`Timestamp`),
  KEY `Pm_id` (`Pm_id`),
  KEY `Type` (`TypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baseline`
--


-- --------------------------------------------------------

--
-- Table structure for table `constraints`
--

CREATE TABLE IF NOT EXISTS `constraints` (
  `Project_id` varchar(5) NOT NULL,
  `Constraint_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` varchar(50) NOT NULL,
  `Type` text NOT NULL,
  `Description` text NOT NULL,
  `Status` text NOT NULL,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Minutes` int(5) NOT NULL,
  PRIMARY KEY (`Constraint_id`),
  KEY `Project_id` (`Project_id`),
  KEY `Employee_id` (`Employee_id`),
  KEY `Constraint_id` (`Constraint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `constraints`
--


-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE IF NOT EXISTS `defect` (
  `Test_Id` int(5) NOT NULL,
  `Defect_Id` int(5) NOT NULL,
  `Programmer_Id` varchar(50) NOT NULL,
  `Open_Date` date NOT NULL,
  `Modified_Date` date DEFAULT NULL,
  `Status` enum('open','in-progress','closed') NOT NULL,
  `Defect_Description` varchar(200) NOT NULL,
  `Defect_Solution` varchar(200) DEFAULT NULL,
  `Upload_File` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Test_Id`,`Defect_Id`),
  KEY `Test_Id` (`Test_Id`),
  KEY `Programmer_Id` (`Programmer_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defect`
--


-- --------------------------------------------------------

--
-- Table structure for table `diagram`
--

CREATE TABLE IF NOT EXISTS `diagram` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hours` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `empid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'completed',
  PRIMARY KEY (`fileid`),
  KEY `pid` (`pid`),
  KEY `empid` (`empid`),
  KEY `empid_2` (`empid`),
  KEY `pid_2` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `diagram`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Emp_id` varchar(50) NOT NULL,
  `Emp_Name` varchar(20) NOT NULL,
  `Emp_Email` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Emp_Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`Emp_id`),
  UNIQUE KEY `Emp_Email` (`Emp_Email`),
  UNIQUE KEY `User_Name` (`User_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Emp_Name`, `Emp_Email`, `User_Name`, `Password`, `Emp_Designation`) VALUES
('13BCB0001', 'SANTHRA MARGARAT ALE', 'sm@vit.co.in', '13BCB0001', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
('13BCB0017', 'AMULYA BATHINI', 'ab@vit.co.in', '13BCB0017', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0042', 'RAI APARAJITA ANIL K', 'ra@vit.co.in', '13BCE0042', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0060', 'TANYA GUPTA', 'tg@vit.co.in', '13BCE0060', '5f4dcc3b5aa765d61d8327deb882cf99', 'Developer'),
('13BCE0070', 'ANUSHKA SAWHNEY', 'as@vit.co.in', '13BCE0070', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0075', 'ANGAD NANDWANI', 'an@vit.co.in', '13BCE0075', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0079', 'RASHMI RANGANATHAN', 'rr@vit.co.in', '13BCE0079', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0093', 'HARSH SAXENA', 'hs@vit.co.in', '13BCE0093', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0120', 'SAPAN JAIN', 'sj@vit.co.in', '13BCE0120', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0122', 'ARITRA GHOSH', 'ag@vit.co.in', '13BCE0122', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0140', 'UMANG THUSOO', 'ut@vit.co.in', '13BCE0140', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0141', 'VARUN MANOCHA', 'vm@vit.co.in', '13BCE0141', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0166', 'VIVEK GOYAL', 'vg@vit.co.in', '13BCE0166', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0169', 'KUMAR ASHWIN HUBERT', 'ka@vit.co.in', '13BCE0169', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0217', 'SANDESH', 's@vit.co.in', '13BCE0217', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0231', 'KRISHNA GANERIWAL', 'kg@vit.co.in', '13BCE0231', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0232', 'SARTHAK RAISURANA', 'sr@vit.co.in', '13BCE0232', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0272', 'SUMIT MISHRA', 'sumti@vit.co.in', '13BCE0272', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0274', 'PRADHEESH S', 'ps@vit.co.in', '13BCE0274', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0279', 'PRABHJIT SINGH THIND', 'pt@vit.co.in', '13BCE0279', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0291', 'TANYA SANGAL', 'ts@vit.co.in', '13BCE0291', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0293', 'THIRUMURUGAN S S', 'tss@vit.co.in', '13BCE0293', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0303', 'UDITA UPADHYAY', 'uu@vit.co.in', '13BCE0303', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0325', 'ABHISHEK SAMPATH', 'abs@vit.co.in', '13BCE0325', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0348', 'HARSH MALIK', 'hm@vit.co.in', '13BCE0348', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0359', 'SANYUKTA RAJKHOWA', 'sar@vit.co.in', '13BCE0359', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0360', 'KARAN PITTIE', 'kp@vit.co.in', '13BCE0360', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0378', 'ANKUSH SAINI', 'ans@vit.co.in', '13BCE0378', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0398', 'VINAYAK GUPTA', 'vig@vit.co.in', '13BCE0398', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0422', 'ABHINAV CHANANA', 'ac@vit.co.in', '13BCE0422', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0425', 'ANUPAM SINHA', 'ansi@vit.co.in', '13BCE0425', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0426', 'PATIL SWAROOP KUSHWA', 'psk@vit.co.in', '13BCE0426', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0433', 'SATYAM AWASTHI', 'saa@vit.co.in', '13BCE0433', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0455', 'KARAN PATHAK', 'kap@vit.co.in', '13BCE0455', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0456', 'ANKIT PANCHARIYA', 'ap@vit.co.in', '13BCE0456', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0473', 'ANAN SHEKHER SRIVAST', 'ass@vit.co.in', '13BCE0473', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0482', 'BARHANPURKAR PARTH P', 'bpp@vit.co.in', '13BCE0482', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0538', 'AAKASH DIPAK BUDDH', 'adb@vit.co.in', '13BCE0538', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0558', 'ANYA PRUTHI', 'anya@vit.co.in', '13BCE0558', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0560', 'PRIYANK CHAUHAN', 'pc@vit.co.in', '13BCE0560', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0567', 'AASHUTOSH TRIVEDI', 'at@vit.co.in', '13BCE0567', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0589', 'APOORV SHARMA', 'apo@vit.co.in', '13BCE0589', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0596', 'AKHIL JOSEPH', 'aj@vit.co.in', '13BCE0596', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0604', 'JAHNAVI JAISWAL', 'jj@vit.co.in', '13BCE0604', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0609', 'NISHANT PACHOURI', 'np@vit.co.in', '13BCE0609', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0644', 'A POOJA REDDY', 'apr@vit.co.in', '13BCE0644', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0651', 'PRAKHAR JAIN', 'pj@vit.co.in', '13BCE0651', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0673', 'SAKSHAM GOYAL', 'sg@vit.co.in', '13BCE0673', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0679', 'AARUSHI ARYA', 'aa@vit.co.in', '13BCE0679', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0702', 'SUKRITI', 'sukriti@vit.co.in', '13BCE0702', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0704', 'ADITYA KUMAR MATHUR', 'akm@vit.co.in', '13BCE0704', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0742', 'SHAMA', 'shama@vit.co.in', '13BCE0742', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0749', 'SHANTAN SHAILESH SAW', 'sss@vit.co.in', '13BCE0749', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0767', 'AMBIKAN S', 'ambikan@vit.co.in', '13BCE0767', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0792', 'RAJEEV SINGH THAKUR', 'rst@vit.co.in', '13BCE0792', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0819', 'SHANNON SAVIO DSOUZA', 'ssd@vit.co.in', '13BCE0819', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0822', 'GAGAN DEEP SINGH', 'gds@vit.co.in', '13BCE0822', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0828', 'CHETAN KUMAR', 'ck@vit.co.in', '13BCE0828', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0837', 'ARJUN C R', 'acr@vit.co.in', '13BCE0837', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0840', 'NAYANIKA SINGH', 'ns@vit.co.in', '13BCE0840', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0855', 'MOHIT AWASTHI', 'ma@vit.co.in', '13BCE0855', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0856', 'NITISH GUPTA', 'ng@vit.co.in', '13BCE0856', '5f4dcc3b5aa765d61d8327deb882cf99', 'Developer'),
('13BCE0857', 'INDRANIL OJHA', 'io@vit.co.in', '13BCE0857', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer'),
('13BCE0863', 'MITESH KOTHARI', 'mk@vit.co.in', '13BCE0863', '5f4dcc3b5aa765d61d8327deb882cf99', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `fileid` int(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `reqid` varchar(10) NOT NULL,
  `hours` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL,
  `empid` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `file`
--


-- --------------------------------------------------------

--
-- Table structure for table `functional`
--

CREATE TABLE IF NOT EXISTS `functional` (
  `Project_id` varchar(5) NOT NULL,
  `FR_id` varchar(5) NOT NULL,
  `Emp_id` varchar(50) NOT NULL,
  `Type` text NOT NULL,
  `Description` text NOT NULL,
  `Status` enum('pending','complete','approved','disapproved') NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Project_id`,`FR_id`),
  KEY `Project_id` (`Project_id`),
  KEY `Emp_id` (`Emp_id`),
  KEY `FR_id` (`FR_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functional`
--


-- --------------------------------------------------------

--
-- Table structure for table `interface`
--

CREATE TABLE IF NOT EXISTS `interface` (
  `Project_id` varchar(5) NOT NULL,
  `Interface_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` varchar(50) NOT NULL,
  `Type` text NOT NULL,
  `Description` text NOT NULL,
  `Status` text NOT NULL,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Minutes` int(5) NOT NULL,
  PRIMARY KEY (`Interface_id`),
  KEY `Project_id` (`Project_id`),
  KEY `Employee_id` (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `interface`
--


-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

CREATE TABLE IF NOT EXISTS `mapping` (
  `callername` varchar(20) NOT NULL,
  `comment1` varchar(40) NOT NULL,
  `calledname` varchar(20) NOT NULL,
  `comment2` varchar(40) NOT NULL,
  `pmpassed` varchar(30) NOT NULL,
  `fileid` varchar(20) NOT NULL,
  KEY `fileid` (`fileid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapping`
--


-- --------------------------------------------------------

--
-- Table structure for table `non_functional`
--

CREATE TABLE IF NOT EXISTS `non_functional` (
  `Project_id` varchar(5) NOT NULL,
  `NFR_id` varchar(5) NOT NULL,
  `Emp_id` varchar(50) NOT NULL,
  `Type` text NOT NULL,
  `Description` text NOT NULL,
  `Status` enum('pending','complete','approved','disapproved') NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subtype` text NOT NULL,
  PRIMARY KEY (`Project_id`,`NFR_id`),
  KEY `Project_id` (`Project_id`),
  KEY `NFR_id` (`NFR_id`),
  KEY `Emp_id` (`Emp_id`),
  KEY `NFR_id_2` (`NFR_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_functional`
--


-- --------------------------------------------------------

--
-- Table structure for table `pm_emp`
--

CREATE TABLE IF NOT EXISTS `pm_emp` (
  `Emp_id` varchar(50) NOT NULL,
  `Pm_id` varchar(50) NOT NULL,
  PRIMARY KEY (`Emp_id`,`Pm_id`),
  UNIQUE KEY `Emp_id_2` (`Emp_id`),
  KEY `Emp_id` (`Emp_id`),
  KEY `Pm_id` (`Pm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_emp`
--

INSERT INTO `pm_emp` (`Emp_id`, `Pm_id`) VALUES
('13BCB0001', '13BCE0122'),
('13BCE0060', '13BCE0122'),
('13BCE0217', '13BCE0122'),
('13BCE0455', '13BCE0122'),
('13BCE0560', '13BCE0122'),
('13BCE0704', '13BCE0122'),
('13BCE0828', '13BCE0122'),
('13BCE0840', '13BCE0122'),
('13BCE0856', '13BCE0122');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Sys_Id` varchar(5) NOT NULL,
  `Proj_Id` varchar(5) NOT NULL,
  `Proj_Name` varchar(50) NOT NULL,
  `Proj_Desc` text NOT NULL,
  `StartDate` date NOT NULL,
  `EnDate` date NOT NULL,
  `NoOfHrs` int(11) NOT NULL,
  `NoOfMembers` int(11) NOT NULL,
  `Status` enum('pending','complete') NOT NULL,
  PRIMARY KEY (`Proj_Id`),
  KEY `Sys_Id` (`Sys_Id`),
  KEY `Sys_Id_2` (`Sys_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Sys_Id`, `Proj_Id`, `Proj_Name`, `Proj_Desc`, `StartDate`, `EnDate`, `NoOfHrs`, `NoOfMembers`, `Status`) VALUES
('S1', 'S11', 'Project Management System', 'A tool to manage projects with team and task assignment for members', '2016-01-20', '2016-05-31', 178, 10, 'pending'),
('S1', 'S12', 'Requirements Management System', ' A tool to manage functional, non-functional and other requirements', '2016-01-20', '2016-05-31', 178, 10, 'pending'),
('S1', 'S13', 'Design Management Tool', 'A tool to make the components of a design specification report', '2016-05-20', '2016-05-31', 178, 10, 'pending'),
('S1', 'S14', 'Traceability Management Tool', 'A design to manage all versions of the project', '2016-01-20', '2016-05-31', 178, 10, 'pending'),
('S1', 'S15', 'Testing Management Tool', 'A tool to test all functionalities of a project.', '2016-01-20', '2016-05-31', 178, 10, 'pending'),
('S1', 'S16', 'Change Management Tool', 'A tool to manage changes in a project', '2016-01-20', '2016-05-31', 178, 10, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE IF NOT EXISTS `project_details` (
  `Project_id` varchar(10) NOT NULL,
  `Ref` text NOT NULL,
  `revision_history` text NOT NULL,
  `scope` text NOT NULL,
  PRIMARY KEY (`Project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_pm`
--

CREATE TABLE IF NOT EXISTS `project_pm` (
  `Proj_Id` varchar(5) NOT NULL,
  `Emp_Id` varchar(50) NOT NULL,
  PRIMARY KEY (`Emp_Id`,`Proj_Id`),
  KEY `Proj_Id` (`Proj_Id`),
  KEY `Emp_Id` (`Emp_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_pm`
--

INSERT INTO `project_pm` (`Proj_Id`, `Emp_Id`) VALUES
('S11', '13BCE0122'),
('S12', '13BCE0558'),
('S13', '13BCE0075'),
('S14', '13BCE0169'),
('S15', '13BCE0079'),
('S16', '13BCE0679');

-- --------------------------------------------------------

--
-- Table structure for table `project_task_cost`
--

CREATE TABLE IF NOT EXISTS `project_task_cost` (
  `PTC_TaskId` varchar(45) NOT NULL,
  `PTC_ActualStartDate` date NOT NULL,
  `PTC_ActualEndDate` date NOT NULL,
  `PTC_ActualTaskCost` varchar(45) DEFAULT NULL,
  `PTC_NoOfmembers` varchar(70) DEFAULT NULL,
  `PTC_NoOfHours` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`PTC_TaskId`),
  KEY `PTC_TaskId` (`PTC_TaskId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_task_cost`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_testcase`
--

CREATE TABLE IF NOT EXISTS `project_testcase` (
  `Test_Id` int(5) NOT NULL,
  `Project_Id` varchar(5) NOT NULL,
  `Requirement_Id` varchar(5) NOT NULL,
  `Testcase_Id` int(5) NOT NULL,
  PRIMARY KEY (`Test_Id`),
  KEY `Project_Id` (`Project_Id`),
  KEY `Requirement_Id` (`Requirement_Id`),
  KEY `Testcase_Id` (`Testcase_Id`),
  KEY `Project_Id_2` (`Project_Id`),
  KEY `Requirement_Id_2` (`Requirement_Id`),
  KEY `Testcase_Id_2` (`Testcase_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_testcase`
--


-- --------------------------------------------------------

--
-- Table structure for table `proj_task`
--

CREATE TABLE IF NOT EXISTS `proj_task` (
  `ProId` varchar(50) NOT NULL,
  `TaskId` varchar(50) NOT NULL,
  `TaskName` varchar(50) NOT NULL,
  `TaskDesc` varchar(100) NOT NULL,
  `TaskStartDate` date NOT NULL,
  `TaskEndDate` date NOT NULL,
  `Hours` int(11) NOT NULL,
  `Members` int(11) NOT NULL,
  `Status` int(11) DEFAULT '0',
  PRIMARY KEY (`TaskId`),
  KEY `ProId` (`ProId`),
  KEY `ProId_2` (`ProId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj_task`
--

INSERT INTO `proj_task` (`ProId`, `TaskId`, `TaskName`, `TaskDesc`, `TaskStartDate`, `TaskEndDate`, `Hours`, `Members`, `Status`) VALUES
('S11', 'S111', 'Plan', 'Project Plan and abstract', '2016-01-25', '2016-01-28', 14, 3, 100),
('S11', 'S112', 'Requirements', 'SRS Docs', '2016-01-29', '2016-02-12', 30, 6, 100),
('S11', 'S113', 'Prototype', 'Sample front end ', '2016-02-08', '2016-02-15', 12, 4, NULL),
('S11', 'S114', 'Design', 'SDS Docs', '2016-02-12', '2016-03-04', 38, 10, 100),
('S11', 'S115', 'Coding', 'Front end and back end develpoment', '2016-03-07', '2016-04-01', 52, 10, NULL),
('S11', 'S116', 'Testing', 'A final run for the project', '2016-04-04', '2016-04-22', 34, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `prototype`
--

CREATE TABLE IF NOT EXISTS `prototype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PROJECT_ID` varchar(5) NOT NULL,
  `FILE_NAME` varchar(100) NOT NULL,
  `FILE_SIZE` int(11) NOT NULL,
  `FILE_TYPE` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PROJECT_ID` (`PROJECT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prototype`
--


-- --------------------------------------------------------

--
-- Table structure for table `requirement_emp`
--

CREATE TABLE IF NOT EXISTS `requirement_emp` (
  `Project_Id` varchar(5) NOT NULL,
  `Requirement_Id` varchar(5) NOT NULL,
  `Tester_Id` varchar(50) NOT NULL,
  PRIMARY KEY (`Project_Id`,`Requirement_Id`,`Tester_Id`),
  KEY `Requirement_Id` (`Requirement_Id`),
  KEY `Tester_Id` (`Tester_Id`),
  KEY `Project_Id` (`Project_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirement_emp`
--


-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `Project_id` varchar(5) NOT NULL,
  `R_id` varchar(5) NOT NULL,
  `Pm_id` varchar(50) NOT NULL,
  `Status` enum('approved','disapproved') NOT NULL,
  `Comments` text NOT NULL,
  PRIMARY KEY (`Project_id`,`R_id`),
  KEY `R_id` (`R_id`),
  KEY `Pm_id` (`Pm_id`),
  KEY `Project_id` (`Project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--


-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `SM_SystemID` varchar(5) NOT NULL,
  `SM_SysName` varchar(50) NOT NULL,
  `SM_SysDesc` varchar(50) NOT NULL,
  PRIMARY KEY (`SM_SystemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`SM_SystemID`, `SM_SysName`, `SM_SysDesc`) VALUES
('S1', 'CSE 325 - Software Engineering', 'A team project of 6 teams under Satish C.J.');

-- --------------------------------------------------------

--
-- Table structure for table `task_employee`
--

CREATE TABLE IF NOT EXISTS `task_employee` (
  `Task_ID` varchar(50) NOT NULL,
  `Emp_Id` varchar(50) NOT NULL,
  PRIMARY KEY (`Task_ID`,`Emp_Id`),
  KEY `Task_ID` (`Task_ID`),
  KEY `Emp_Id` (`Emp_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_employee`
--

INSERT INTO `task_employee` (`Task_ID`, `Emp_Id`) VALUES
('S111', '13BCE0060'),
('S111', '13BCE0122'),
('S111', '13BCE0856'),
('S112', '13BCB0001'),
('S112', '13BCE0122'),
('S112', '13BCE0217'),
('S112', '13BCE0560'),
('S112', '13BCE0704'),
('S112', '13BCE0856'),
('S113', '13BCE0060'),
('S113', '13BCE0455'),
('S113', '13BCE0828'),
('S113', '13BCE0840'),
('S114', '13BCB0001'),
('S114', '13BCE0060'),
('S114', '13BCE0122'),
('S114', '13BCE0217'),
('S114', '13BCE0455'),
('S114', '13BCE0560'),
('S114', '13BCE0704'),
('S114', '13BCE0828'),
('S114', '13BCE0840'),
('S114', '13BCE0856'),
('S116', '13BCE0060'),
('S116', '13BCE0122'),
('S116', '13BCE0828'),
('S116', '13BCE0856');

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE IF NOT EXISTS `testcase` (
  `Test_Id` int(5) NOT NULL,
  `Testcase_Description` varchar(200) NOT NULL,
  `Input` varchar(200) NOT NULL,
  `Expected_Output` varchar(200) NOT NULL,
  `Actual_Output` varchar(200) DEFAULT NULL,
  `Tester_Id` varchar(50) NOT NULL,
  `status` enum('open','success','failure','approved') NOT NULL,
  PRIMARY KEY (`Test_Id`),
  KEY `Test_Id` (`Test_Id`),
  KEY `Tester_Id` (`Tester_Id`),
  KEY `Tester_Id_2` (`Tester_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--


-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `typeid` varchar(10) NOT NULL,
  `typename` varchar(10) NOT NULL,
  PRIMARY KEY (`typeid`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--


-- --------------------------------------------------------

--
-- Table structure for table `usecase_actors`
--

CREATE TABLE IF NOT EXISTS `usecase_actors` (
  `UR_id` varchar(5) NOT NULL,
  `Actors` text NOT NULL,
  PRIMARY KEY (`UR_id`),
  KEY `UR_id` (`UR_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usecase_actors`
--


-- --------------------------------------------------------

--
-- Table structure for table `use_case`
--

CREATE TABLE IF NOT EXISTS `use_case` (
  `Project_id` varchar(5) NOT NULL,
  `UR_id` varchar(5) NOT NULL,
  `Emp_id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Preconditions` text NOT NULL,
  `Success_condition` text NOT NULL,
  `Fail_condition` text NOT NULL,
  `Usecase_diag` blob NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Description` text NOT NULL,
  `status` enum('pending','complete','approved','disapproved') NOT NULL,
  PRIMARY KEY (`Project_id`,`UR_id`),
  KEY `Project_id` (`Project_id`),
  KEY `UR_id` (`UR_id`),
  KEY `Emp_id` (`Emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `use_case`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `assumptions`
--
ALTER TABLE `assumptions`
  ADD CONSTRAINT `assumptions_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `assumptions_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `baseline`
--
ALTER TABLE `baseline`
  ADD CONSTRAINT `baseline_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `employee` (`Emp_id`),
  ADD CONSTRAINT `baseline_ibfk_2` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `baseline_ibfk_3` FOREIGN KEY (`R_id`) REFERENCES `status` (`R_id`),
  ADD CONSTRAINT `baseline_ibfk_4` FOREIGN KEY (`Pm_id`) REFERENCES `employee` (`Emp_id`),
  ADD CONSTRAINT `baseline_ibfk_5` FOREIGN KEY (`TypeID`) REFERENCES `type` (`typeid`);

--
-- Constraints for table `constraints`
--
ALTER TABLE `constraints`
  ADD CONSTRAINT `constraints_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `constraints_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `defect`
--
ALTER TABLE `defect`
  ADD CONSTRAINT `defect_ibfk_1` FOREIGN KEY (`Test_Id`) REFERENCES `project_testcase` (`Test_Id`),
  ADD CONSTRAINT `defect_ibfk_2` FOREIGN KEY (`Programmer_Id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `interface`
--
ALTER TABLE `interface`
  ADD CONSTRAINT `interface_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `interface_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `pm_emp`
--
ALTER TABLE `pm_emp`
  ADD CONSTRAINT `pm_emp_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `employee` (`Emp_id`),
  ADD CONSTRAINT `pm_emp_ibfk_2` FOREIGN KEY (`Pm_id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`Sys_Id`) REFERENCES `system` (`SM_SystemID`);

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `project_details_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Proj_Id`);

--
-- Constraints for table `project_pm`
--
ALTER TABLE `project_pm`
  ADD CONSTRAINT `project_pm_ibfk_1` FOREIGN KEY (`Proj_Id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `project_pm_ibfk_2` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `project_task_cost`
--
ALTER TABLE `project_task_cost`
  ADD CONSTRAINT `project_task_cost_ibfk_1` FOREIGN KEY (`PTC_TaskId`) REFERENCES `proj_task` (`TaskId`);

--
-- Constraints for table `project_testcase`
--
ALTER TABLE `project_testcase`
  ADD CONSTRAINT `project_testcase_ibfk_1` FOREIGN KEY (`Project_Id`) REFERENCES `requirement_emp` (`Project_Id`),
  ADD CONSTRAINT `project_testcase_ibfk_2` FOREIGN KEY (`Requirement_Id`) REFERENCES `requirement_emp` (`Requirement_Id`);

--
-- Constraints for table `proj_task`
--
ALTER TABLE `proj_task`
  ADD CONSTRAINT `proj_task_ibfk_1` FOREIGN KEY (`ProId`) REFERENCES `project` (`Proj_Id`);

--
-- Constraints for table `prototype`
--
ALTER TABLE `prototype`
  ADD CONSTRAINT `prototype_ibfk_1` FOREIGN KEY (`PROJECT_ID`) REFERENCES `project` (`Proj_Id`);

--
-- Constraints for table `requirement_emp`
--
ALTER TABLE `requirement_emp`
  ADD CONSTRAINT `requirement_emp_ibfk_1` FOREIGN KEY (`Project_Id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `requirement_emp_ibfk_2` FOREIGN KEY (`Requirement_Id`) REFERENCES `baseline` (`R_id`),
  ADD CONSTRAINT `requirement_emp_ibfk_3` FOREIGN KEY (`Tester_Id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Proj_Id`),
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`Pm_id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `task_employee`
--
ALTER TABLE `task_employee`
  ADD CONSTRAINT `task_employee_ibfk_1` FOREIGN KEY (`Task_ID`) REFERENCES `proj_task` (`TaskId`),
  ADD CONSTRAINT `task_employee_ibfk_2` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `testcase`
--
ALTER TABLE `testcase`
  ADD CONSTRAINT `testcase_ibfk_1` FOREIGN KEY (`Test_Id`) REFERENCES `project_testcase` (`Test_Id`),
  ADD CONSTRAINT `testcase_ibfk_2` FOREIGN KEY (`Tester_Id`) REFERENCES `requirement_emp` (`Tester_Id`);
