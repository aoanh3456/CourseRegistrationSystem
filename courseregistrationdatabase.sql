-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 03:26 AM
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
-- Database: `courseregistrationdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `classificationtable`
--

CREATE TABLE `classificationtable` (
  `idClassification` int(11) NOT NULL,
  `ClassificationName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classificationtable`
--

INSERT INTO `classificationtable` (`idClassification`, `ClassificationName`) VALUES
(1, 'Freshman'),
(2, 'Sophomore'),
(3, 'Junior'),
(4, 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `idCourses` int(11) NOT NULL,
  `CoursesName` varchar(45) NOT NULL,
  `Credit` varchar(45) NOT NULL,
  `Teacher` varchar(45) NOT NULL,
  `Availability` tinyint(4) DEFAULT NULL,
  `EnrolledNumber` int(11) NOT NULL DEFAULT '0',
  `Prerequisite` tinyint(4) DEFAULT NULL,
  `CourseCode1` varchar(45) DEFAULT NULL,
  `CourseCode2` varchar(45) DEFAULT NULL,
  `MajorCourse` int(11) NOT NULL,
  `isOpening` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`idCourses`, `CoursesName`, `Credit`, `Teacher`, `Availability`, `EnrolledNumber`, `Prerequisite`, `CourseCode1`, `CourseCode2`, `MajorCourse`, `isOpening`) VALUES
(1, 'Pre-Calculus Algebra', '3', '', 0, 0, 0, 'MTH 1112', 'ALGE 1112', 0, 1),
(2, 'Pre-Calculus Trigonometry', '3', '', 0, 0, 1, 'MTH 1114', 'TRIG 1114', 0, 1),
(3, 'Composition & Modern English I', '3', '', 0, 0, 0, 'ENG 1101', 'ENCM 1201', 0, 1),
(4, 'Composition & Modern English II', '3', '', 0, 0, 1, 'ENG 1102', 'ENCM 1302', 0, 1),
(5, 'Visual Art', '2', '', 0, 0, 0, 'ART 1133', 'ARVI 1130', 0, 1),
(6, 'Fundamentals of Speech', '3', '', 0, 0, 0, 'COM 2241', 'SPEE 2341', 0, 1),
(7, 'World Literature before 1660', '3', '', 0, 0, 1, 'ENG 2205', 'ENAL 2411', 0, 1),
(8, 'World Literature after 1660', '3', '', 0, 0, 1, 'ENG 2206', 'ENAL 2512', 0, 1),
(9, 'Music Appreciation', '2', '', 0, 0, 0, 'MUS 1131', 'MUAP 1231', 0, 1),
(10, 'Principles of Biology', '3', '', 0, 0, 0, 'BIO 1100', 'BIPR 1110', 0, 1),
(11, 'Principles of Biology Lab', '1', '', 0, 0, 0, 'BIO L100', 'BILA 1110', 0, 1),
(12, 'Calculus I', '4', '', 0, 0, 1, 'MTH 1125', 'MATH 1121', 0, 1),
(13, 'General Physic I', '3', '', 0, 0, 1, 'PHY 2252', 'PHYS 2252', 0, 1),
(14, 'General Physic I Lab', '1', '', 0, 0, 1, 'PHY L252', 'PHYL 2252', 0, 1),
(15, 'Principles of Macroeconomics', '3', '', 0, 0, 0, 'ECO 2251', 'ECMA 2351', 0, 1),
(16, 'Principles of Microeconomics/', '3', '', 0, 0, 0, 'ECO 2252/', 'ECMI 2252', 0, 1),
(17, 'U.S. to 1877', '3', '', 0, 0, 0, 'HIS 1111', 'HISO 1401', 0, 1),
(18, 'U.S. since 1877', '3', '', 0, 0, 0, 'HIS 1112', 'HISO 1502', 0, 1),
(19, 'Computer Science I', '3', '', 0, 0, 1, 'CS 2250', 'ITCS 2250', 0, 1),
(20, 'Computer Concepts & Applications', '3', '', 0, 0, 0, 'IS 2241', 'ITCC 2141', 0, 1),
(21, 'Calculus II', '4', '', 0, 0, 1, 'MTH 1126', 'MATH 1222', 0, 1),
(22, 'General Physic II', '3', '', 0, 0, 1, 'PHY 2253', 'PHYS 2253', 0, 1),
(23, 'General Physic II Lab', '1', '', 0, 0, 1, 'PHY L253', 'PHYL 2253', 0, 1),
(24, 'Introduction to American University', '1', '', 0, 0, 0, 'TROY 1101', 'ITAU 01', 0, 1),
(25, 'Computer Science II', '3', '', 0, 0, 1, 'CS 2255', 'ITCS 2355', 2, 1),
(26, 'Foundations of Computer Science', '3', '', 0, 0, 1, 'CS 3310', 'ITCS 3410', 2, 1),
(27, 'Data Structures', '3', '', 0, 0, 1, 'CS 3323', 'ITDS 3423', 2, 1),
(28, 'Analysis of Algorithms', '3', '', 0, 0, 1, 'CS 3329', 'ITAA 3529', 2, 1),
(29, 'Software Engineering I', '3', '', 0, 0, 1, 'CS 3332', 'ITSE 3632', 2, 1),
(30, 'Concepts of Object Oriented Programming I', '3', '', 0, 0, 1, 'CS 3360', 'ITOO 3760', 2, 1),
(31, 'Introduction to Computer Organization & Archi', '3', '', 0, 0, 1, 'CS 3365', 'ITOA 3865', 2, 1),
(32, 'Nature of Programming Languages', '3', '', 0, 0, 1, 'CS 3370', 'ITPL 3870', 2, 1),
(33, 'Formal Languages & the Theory of Computation', '3', '', 0, 0, 1, 'CS 3372', 'ITFL 3372', 2, 1),
(34, 'Introduction to Database Management Systems', '3', '', 0, 0, 1, 'CS 4420', 'ITDS 4520', 2, 1),
(35, 'Data Communications & Networking', '3', '', 0, 0, 1, 'CS 4445', 'ITDC 4545', 2, 1),
(36, 'Operating Systems', '3', '', 0, 0, 1, 'CS 4448', 'ITOS 4648', 2, 1),
(37, 'Discrete Mathematics', '3', '', 0, 0, 1, 'MTH 2215', 'MATH 2211', 2, 1),
(38, 'Applied Statistics', '3', '', 0, 0, 1, 'MTH 2210', 'MATH 2610', 2, 1),
(39, 'Web-based Software Development', '3', '', 0, 0, 1, 'CS 4443', 'ITWD 4643', 2, 1),
(40, 'Fundamentals of Artificial Intelligence', '3', '', 0, 0, 1, 'CS 3331', 'ITFI 3631', 2, 1),
(41, 'Applied Networking', '3', '', 0, 0, 1, 'CS 4449', 'ITAN 4849', 2, 1),
(42, 'Software Engineering II', '3', '', 0, 0, 1, 'CS 4461', 'ITSE 3761', 2, 1),
(43, 'Computer Security', '3', '', 0, 0, 1, 'CS 4451', 'CSCS 4751', 2, 1),
(44, 'Systems Analysis and Design', '3', '', 0, 0, 1, 'CS 4447', 'ITAD 4747', 2, 1),
(45, 'Advanced Programming I (android programming)', '3', '', 0, 0, 1, 'CS 2265', 'ITAP 2465', 2, 1),
(46, 'Advanced Programming II (.NET programming)', '3', '', 0, 0, 1, 'CS 3347', 'ITAP 3747', 2, 1),
(47, 'Business Systems Programming', '3', '', 0, 0, 1, 'CS 3320', '', 2, 1),
(48, 'Operations Research', '3', '', 0, 0, 1, 'CS 3325', '', 2, 1),
(49, 'Concepts of Object Oriented Programming II', '3', '', 0, 0, 1, 'CS 3361', '', 2, 1),
(50, 'Special Topics in Object-Oriented Technology', '3', '', 0, 0, 1, 'CS 4462', '', 2, 1),
(51, 'Special Topics in Computer Science', '3', '', 0, 0, 1, 'CS 4495', '', 2, 1),
(54, 'Introduction to Leadership', '3', '', 0, 0, 0, 'LDS 1101', 'LDR 1100', 0, 1),
(57, 'University Orientation', '1', '', 0, 0, 0, 'ITAU 01', 'TROY 1101', 0, 1),
(59, 'World History to 1500', '3', '', 0, 0, 0, 'HISO 1122', 'HIS 1122', 0, 1),
(61, 'American Literature I', '3', '', 0, 0, 0, '', 'ENG 2211', 0, 1),
(62, 'American Literature II', '3', '', 0, 0, 0, '', 'ENG 2212', 0, 1),
(64, 'Computer Concepts and Applications', '3', '', 0, 0, 0, 'ITCC 2141', 'IS 2241', 0, 1),
(66, 'Principles of Microeconomics', '3', '', 0, 0, 0, 'ECMI 2251', 'ECO 2252', 0, 1),
(69, 'Principles of Accounting I', '3', '', 0, 0, 0, 'ACCT 2391', 'ACT 2291', 1, 1),
(70, 'Principles of Accounting II', '3', '', 0, 0, 0, 'ACCT 2492', 'ACT 2292', 1, 1),
(71, 'Legal Environment of Business', '3', '', 0, 0, 0, 'LWEN 2621', 'LAW 2221', 1, 1),
(72, 'Business Statistic I', '3', '', 0, 0, 0, 'QMAT 2441', 'QM 2241', 1, 1),
(73, 'Principles of Management', '3', '', 0, 0, 0, 'MGPO 3370', 'MGT 3300', 1, 1),
(74, 'Principles of Marketing', '3', '', 0, 0, 0, 'MKPO 3461', 'MKT 3300', 1, 1),
(75, 'Business Communications', '3', '', 0, 0, 0, '', 'BUS 3382', 1, 1),
(76, 'Fundamentals of Financial Mathematics', '3', '', 0, 0, 0, '', 'FIN 3331', 1, 1),
(77, 'Global Electronic Business', '3', '', 0, 0, 0, '', 'IS  3310', 1, 1),
(78, 'Operation Management', '3', '', 0, 0, 0, '', 'QM 3345', 1, 1),
(79, 'Business & Society', '3', '', 0, 0, 0, '', 'BUS 4474', 1, 1),
(80, 'Strategic Management (last semester)', '3', '', 0, 0, 0, '', 'MGT 4476', 1, 1),
(81, 'Cost Accounting', '3', '', 0, 0, 0, 'ACCT 3595', 'ACT 3395', 1, 1),
(82, 'Global Human Resource Management', '3', '', 0, 0, 0, '', 'HRM 3375', 1, 1),
(83, 'International Trade', '3', '', 0, 0, 0, '', 'ECO 4451', 1, 1),
(84, 'Global Marketing', '3', '', 0, 0, 0, '', 'MKT 4468', 1, 1),
(85, 'Leadership/Change', '3', '', 0, 0, 0, '', 'MGT 4471', 1, 1),
(86, 'Management in Global Environment (Capstone)', '3', '', 0, 0, 0, '', 'MGT 4478', 1, 1),
(87, 'Developing & Leading effective teams', '3', '', 0, 0, 0, '', 'MGT 4440', 1, 1),
(88, 'Organizational Behaviour', '3', '', 0, 0, 0, '', 'MGT 4472', 1, 1),
(89, 'Management Seminar', '3', '', 0, 0, 0, '', 'MGT 4479', 1, 1),
(90, 'Introduction to Project Management', '3', '', 0, 0, 0, 'MGT 4860', 'MGT 4460', 1, 1),
(91, 'Small Business Management', '3', '', 0, 0, 0, 'MGT 4875', 'MGT 4475', 1, 1),
(92, 'Principles of supervision', '3', '', 0, 0, 0, 'MGT 3380', '', 1, 1),
(93, 'Innovative Practices and Thoughts', '1', '', 0, 0, 0, 'BUS 3310', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `majortable`
--

CREATE TABLE `majortable` (
  `idMajor` int(11) NOT NULL,
  `MajorName` varchar(45) NOT NULL,
  `MajorCode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majortable`
--

INSERT INTO `majortable` (`idMajor`, `MajorName`, `MajorCode`) VALUES
(1, 'Business Administration', 'BA'),
(2, 'Computer Science', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `prerequisitetable`
--

CREATE TABLE `prerequisitetable` (
  `idCourses` int(11) NOT NULL,
  `idCoursesPrerequisite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prerequisitetable`
--

INSERT INTO `prerequisitetable` (`idCourses`, `idCoursesPrerequisite`) VALUES
(2, 1),
(4, 3),
(7, 4),
(8, 4),
(12, 2),
(13, 2),
(14, 2),
(19, 1),
(21, 12),
(22, 13),
(22, 14),
(23, 13),
(23, 14),
(25, 19),
(26, 1),
(27, 12),
(27, 25),
(27, 37),
(28, 27),
(29, 27),
(30, 25),
(31, 26),
(32, 27),
(33, 27),
(34, 27),
(35, 27),
(36, 27),
(37, 1),
(38, 1),
(39, 27),
(40, 27),
(41, 35),
(42, 29),
(43, 27),
(44, 27),
(45, 25),
(46, 25),
(47, 25),
(48, 12),
(49, 30),
(50, 49);

-- --------------------------------------------------------

--
-- Table structure for table `registeredcoures`
--

CREATE TABLE `registeredcoures` (
  `idStudent` int(11) NOT NULL,
  `idCourses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registrationrequest`
--

CREATE TABLE `registrationrequest` (
  `idStudent` int(11) NOT NULL,
  `idCourses` int(11) NOT NULL,
  `RequestDate` datetime DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `idStaff` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`idStaff`, `FirstName`, `LastName`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin', 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idStudent` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Classification` int(11) NOT NULL,
  `Gender` tinyint(4) DEFAULT NULL,
  `Major` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `intake` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idStudent`, `FirstName`, `LastName`, `Email`, `Classification`, `Gender`, `Major`, `Username`, `Password`, `intake`) VALUES
(1, 'ABCD', 'ABCD', 'ABCD@gmail.com', 4, 1, 2, 'ABCD', '123456', 15),
(2, 'Nhien', 'Tran', 'nhienhcm@yahoo.com.vn', 2, 1, 2, 'nhienhcm', '123456789', 19),
(3, 'NEW', 'NEW', 'NEW@gmail.com', 4, 1, 2, 'NEW', 'test', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classificationtable`
--
ALTER TABLE `classificationtable`
  ADD PRIMARY KEY (`idClassification`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`idCourses`);

--
-- Indexes for table `majortable`
--
ALTER TABLE `majortable`
  ADD PRIMARY KEY (`idMajor`);

--
-- Indexes for table `prerequisitetable`
--
ALTER TABLE `prerequisitetable`
  ADD PRIMARY KEY (`idCourses`,`idCoursesPrerequisite`),
  ADD KEY `fk_Courses_has_Courses_Courses2_idx` (`idCoursesPrerequisite`),
  ADD KEY `fk_Courses_has_Courses_Courses1_idx` (`idCourses`);

--
-- Indexes for table `registeredcoures`
--
ALTER TABLE `registeredcoures`
  ADD PRIMARY KEY (`idStudent`,`idCourses`),
  ADD KEY `fk_Student_has_Courses_Courses1_idx` (`idCourses`),
  ADD KEY `fk_Student_has_Courses_Student_idx` (`idStudent`);

--
-- Indexes for table `registrationrequest`
--
ALTER TABLE `registrationrequest`
  ADD PRIMARY KEY (`idStudent`,`idCourses`),
  ADD KEY `fk_Student_has_Courses_Courses2_idx` (`idCourses`),
  ADD KEY `fk_Student_has_Courses_Student1_idx` (`idStudent`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`idStaff`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idStudent`),
  ADD KEY `Classification_Student_idx` (`Classification`),
  ADD KEY `Major_Student_idx` (`Major`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classificationtable`
--
ALTER TABLE `classificationtable`
  MODIFY `idClassification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `idCourses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `majortable`
--
ALTER TABLE `majortable`
  MODIFY `idMajor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `idStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `idStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prerequisitetable`
--
ALTER TABLE `prerequisitetable`
  ADD CONSTRAINT `fk_Courses_has_Courses_Courses1` FOREIGN KEY (`idCourses`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Courses_has_Courses_Courses2` FOREIGN KEY (`idCoursesPrerequisite`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registeredcoures`
--
ALTER TABLE `registeredcoures`
  ADD CONSTRAINT `fk_Student_has_Courses_Courses1` FOREIGN KEY (`idCourses`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_has_Courses_Student` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registrationrequest`
--
ALTER TABLE `registrationrequest`
  ADD CONSTRAINT `fk_Student_has_Courses_Courses2` FOREIGN KEY (`idCourses`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_has_Courses_Student1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Classification_Student` FOREIGN KEY (`Classification`) REFERENCES `classificationtable` (`idClassification`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Major_Student` FOREIGN KEY (`Major`) REFERENCES `majortable` (`idMajor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
