-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 07:38 PM
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
-- Database: `gc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(10) NOT NULL,
  `adminName` char(30) NOT NULL,
  `adminEmail` varchar(25) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `adminPhone` int(12) NOT NULL,
  `adminAddress` text DEFAULT NULL,
  `adminGender` char(10) NOT NULL,
  `accessLvl` varchar(10) NOT NULL,
  `status` char(15) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminPassword`, `adminPhone`, `adminAddress`, `adminGender`, `accessLvl`, `status`, `image`) VALUES
(1, 'admin', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500', 136254897, 'admin', 'Male', 'admin', 'Active now', 'uploads/doctor_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentId` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `patientName` char(30) NOT NULL,
  `patientNRIC` varchar(200) NOT NULL,
  `patientGender` char(10) NOT NULL,
  `patientEmail` varchar(25) NOT NULL,
  `patientPhone` int(12) NOT NULL,
  `date` date NOT NULL,
  `slot` varchar(10) NOT NULL,
  `phyId` int(10) NOT NULL,
  `msg` text DEFAULT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentId`, `id`, `patientName`, `patientNRIC`, `patientGender`, `patientEmail`, `patientPhone`, `date`, `slot`, `phyId`, `msg`, `status`) VALUES
(7, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-11-13', 'Slot 4', 1, 'testing 123\r\n', 'approve'),
(8, 10, 'weiying', '2147483647', 'Female', 'weiying123@gmail.com', 163254987, '2023-10-10', 'Slot 3', 2, 'appointment', 'approve'),
(9, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-10-10', 'Slot 1', 2, 'test book 2 slot a day', 'approve'),
(10, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-10-10', 'slot', 2, 'book 2pm on 10/10', 'approve'),
(11, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-10-10', 'slot 5', 2, 'test book 2pm again on 10/10 phyId is 2', 'approve'),
(12, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-10-05', 'slot 4', 2, 'fk u louis ', 'approve'),
(13, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-05-15', 'slot 1', 2, 'testing123', 'done'),
(14, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-05-24', 'slot 1', 1, 'book2\r\n', 'pending'),
(15, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-05-23', 'slot 1', 1, 'sdadasd', 'pending'),
(16, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-06-05', 'slot 1', 1, 'dczxc', 'pending'),
(17, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-06-05', 'slot 2', 1, 'book dental\r\n', 'pending'),
(18, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-06-05', 'slot 5', 3, 'zczczxc', 'pending'),
(19, 5, 'gan kah xiang', '2147483647', 'Male', 'kahxiang@gmail.com', 123456789, '2023-07-12', 'slot 1', 1, 'cascd', 'pending'),
(20, 26, 'kahxiang', '0', 'Male', 'kahxiang2705@gmail.com', 123456789, '2023-10-17', 'slot 1', 2, 'comment\r\n', 'done'),
(21, 26, 'kahxiang', '0', 'Male', 'kahxiang2705@gmail.com', 123456789, '2023-10-17', 'slot 3', 2, 'adasd', 'done'),
(22, 26, 'kahxiang', '0', 'Male', 'kahxiang2705@gmail.com', 123456789, '2023-10-17', 'slot 2', 2, 'adsad', 'approve'),
(23, 26, 'kahxiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 123456789, '2023-10-18', 'slot 2', 1, 'dvxdcv', 'pending'),
(24, 5, 'gan kah xiang', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123456789, '2023-10-27', 'slot 2', 2, 'sdfasdf', 'done'),
(25, 5, 'gan kah xiang', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123456789, '2023-10-20', 'slot 2', 2, 'book 9 am ', 'done'),
(26, 5, 'gan kah xiang', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123456789, '2023-11-02', 'slot 2', 3, 'test\r\n', 'pending'),
(27, 28, 'student', 'gy9lumNhCouzSDBb', 'Male', 'gkahxiang0208@gmail.com', 123456789, '2023-11-01', 'slot 2', 2, 'test1\r\n', 'done'),
(28, 28, 'student', 'gy9lumNhCouzSDBb', 'Male', 'gkahxiang0208@gmail.com', 123456789, '2023-11-10', 'slot 2', 7, 'asdsad', 'pending'),
(29, 26, 'kahxiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 123456789, '2023-11-03', 'slot 2', 3, 'testting select 9 am \r\n', 'pending'),
(30, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-10-30', 'slot 2', 2, 'test 1\r\n', 'done'),
(31, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-10-31', 'slot 2', 2, 'test2\r\n', 'done'),
(32, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-10-31', 'slot 2', 1, 'test3\r\n', 'pending'),
(33, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-10-31', 'slot 3', 2, 'test5', 'approve'),
(34, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-11-10', 'slot 2', 2, '', 'done'),
(35, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-11-10', 'slot 4', 2, '', 'done'),
(36, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-11-22', 'slot 3', 2, '', 'reject'),
(37, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-11-04', 'slot 2', 2, 'sdnfs', 'done'),
(38, 5, 'gan', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'kahxiang@gmail.com', 123465987, '2023-11-09', 'slot 2', 3, '9', 'pending'),
(39, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-21', 'slot 2', 2, '', 'done'),
(40, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-20', 'slot 2', 2, '', 'reject'),
(41, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-20', 'slot 5', 2, '', 'done'),
(42, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-14', 'slot 2', 2, '', 'approve'),
(43, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-14', 'slot 1', 2, '', 'pending'),
(44, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-14', 'slot 3', 2, '', 'reject'),
(45, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-14', 'slot 4', 2, '', 'pending'),
(46, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-14', 'slot 5', 2, '', 'pending'),
(47, 26, 'zack gan kah xiang', 'gy9ksGNqD4mzSDBb', 'Male', 'kahxiang2705@gmail.com', 136254897, '2023-11-14', 'Slot 7', 2, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicineId` int(10) NOT NULL,
  `phyId` int(10) DEFAULT NULL,
  `medicineName` varchar(50) NOT NULL,
  `efficacy` text NOT NULL,
  `impNotes` text NOT NULL,
  `amount` int(10) NOT NULL,
  `category` char(20) NOT NULL,
  `agreement` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicineId`, `phyId`, `medicineName`, `efficacy`, `impNotes`, `amount`, `category`, `agreement`) VALUES
(1, 2, 'asd', 'asdad', 'asd', 130, 'Open this to select', 'reject'),
(2, 2, 'xyzal (Levocetirizine)', 'Xyzal is an antihistamine that reduces the effects of natural chemical histamine in the body. Histamine can produce symptoms such as a runny nose or hives.\r\n\r\nXyzal is used to treat symptoms of year-round (perennial) allergies in children who are at least 6 months old.\r\n\r\nXyzal is also used to treat itching and swelling caused by chronic urticaria (hives) in adults and children who are at least 6 months old.', 'Levocetirizine is an antihistamine that reduces the effects of natural chemical histamine in the body. Histamine can produce symptoms such as a runny nose or hives.\r\n\r\n', 2837, 'type 3', 'approve'),
(3, 2, 'Gaviscon', 'used to treat heartburn (acid reflux) and indigestion.', 'been advised to eat a low calcium or low salt (low sodium) diet', 4870, 'type 1', 'approve'),
(4, 2, 'Allergan Refresh Tears Ey', 'REFRESH TEARS® instantly lubricates and moisturizes the eyes, resulting in temporary relief for mild symptoms of eye dryness. ', 'For the temporary relief of burning, irritation, and discomfort due to dryness of the eye or exposure to wind or sun. May be used as a protectant against further irritation.', 97, 'type 5', 'reject'),
(5, 2, 'test', 'dsad', 'asdasd', 100, 'type 2', 'reject'),
(6, 2, 'Cyclobenzaprine Tablets', 'CYCLOBENZAPRINE (sye kloe BEN za preen) treats muscle spasms. It works by relaxing your muscles, which reduces muscle stiffness. It belongs to a group of medications called muscle relaxants.', 'ake this medication by mouth with a glass of water. ', 1000, 'type 3', 'approve'),
(7, 2, 'Denzo Tablet', ' Air Cavities Around Nose Blood Clots Bone Fractures', 'Denzo Tablet is a Tablet manufactured by ALGEN HEALTH. It is commonly used for the diagnosis or treatment of air cavities around nose, blood clots, bone fractures . It has some side effects such as Burning sensation,Abnormal liver function tests,Burning,Blurred vision. The salts Diclofenac, Serratiopeptidase are involved in the preparation of Denzo Tablet.', 500, 'type 1', 'reject'),
(8, 2, 'Denzo Tablet', 'Air Cavities Around Nose Blood Clots, Bone Fractures\r\nDenzo Tablet is a Tablet manufactured by ALGEN HEALTH. It is commonly used for the diagnosis or treatment of air cavities around nose, blood clots, bone fractures . It has some side effects such as Burning sensation,Abnormal liver function tests,Burning,Blurred vision. The salts Diclofenac, Serratiopeptidase are involved in the preparation of Denzo Tablet.', 'side effect Burning Sensation, Abnormal Liver Function Tests, Burning, Blurred Vision', 3300, 'type 4', 'approve'),
(9, 2, 'Dysolvon 8mg', 'The Dysolvon tablet helps to relieve cough by breaking down mucus, and thus reduce chest exhaustion.', 'This medicine is for oral use only. Swallow this medication as a whole with water. Do not chew, crush or break it. It is better to take this medication at a fixed time each day if it is indicated for everyday use.', 3641, 'type 3', 'approve'),
(10, 2, 'aaa', 'aaa', 'aaa', 100, 'type 2', 'reject'),
(11, 2, 'Carvedilol', 'example', 'exampe', 300, 'type 4', 'reject'),
(12, 2, 'panadol active fast', 'panadol efficacy', 'panadaol is important', 6000, 'type 2', 'approve'),
(13, 2, 'refluxg+', 'It is used to relieve stomach discomfort related symptoms.', 'If pregnant or breastfeeding, ask a health professional before use. Keep out of reach of children. ', 1970, 'type 5', 'approve'),
(14, 2, 'TYLENOL Sinus', 'Headache', 'Liver warning: This product contains acetaminophen. The maximum daily dose of this product is 10 caplets (3,250 mg acetaminophen) in 24 hours. Severe liver damage may occur if you take more than 4,000 mg of acetaminophen in 24 hours', 1000, 'type 3', 'approve'),
(15, 2, 'test medicine', 'test', 'test', 1000, 'type 4', 'reject'),
(16, 2, 'testing medicine', 'testing', 'tesing', 100, 'type 3', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `medtransaction`
--

CREATE TABLE `medtransaction` (
  `transId` int(10) NOT NULL,
  `medicineId` int(10) NOT NULL,
  `phyId` int(10) NOT NULL,
  `category` char(20) NOT NULL,
  `date` date NOT NULL,
  `amountSold` int(5) NOT NULL,
  `oriAmount` int(5) NOT NULL,
  `newAmount` int(5) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medtransaction`
--

INSERT INTO `medtransaction` (`transId`, `medicineId`, `phyId`, `category`, `date`, `amountSold`, `oriAmount`, `newAmount`, `status`) VALUES
(2, 1, 2, 'type 1', '2023-10-04', 1, 79, 78, ''),
(3, 2, 2, 'type 3', '2023-10-04', 1, 490, 489, ''),
(4, 2, 2, 'type 3', '2023-10-05', 3, 489, 486, ''),
(5, 1, 2, 'type 1', '2023-10-05', 5, 78, 73, ''),
(6, 1, 2, 'type 1', '2023-10-05', 3, 73, 70, ''),
(7, 3, 2, 'type 1', '2023-09-14', 10, 358, 348, ''),
(8, 3, 2, 'type 1', '2023-10-07', 10, 348, 338, ''),
(9, 4, 2, 'type 5', '2023-10-07', 3, 100, 97, ''),
(10, 1, 2, 'type 1', '2023-10-07', 30, 600, 570, ''),
(11, 1, 2, 'type 1', '2023-10-12', 450, 570, 120, ''),
(12, 1, 2, 'type 1', '2023-10-16', 20, 180, 160, ''),
(13, 1, 2, 'type 1', '2023-10-17', 20, 160, 140, ''),
(14, 1, 2, 'type 1', '2023-10-21', 1, 340, 339, ''),
(15, 1, 2, 'type 1', '2023-10-26', 30, 399, 369, ''),
(16, 1, 2, 'type 1', '2023-10-28', 20, 369, 349, ''),
(17, 1, 2, 'type 1', '2023-10-28', 20, 349, 329, ''),
(18, 1, 2, 'type 1', '2023-10-28', 20, 329, 309, ''),
(19, 1, 2, 'type 1', '2023-10-28', 20, 309, 289, ''),
(20, 3, 2, 'type 1', '2023-10-28', 38, 338, 300, ''),
(21, 8, 2, 'type 4', '2023-10-28', 20, 4000, 3980, ''),
(22, 8, 2, 'type 4', '2023-10-28', 60, 3980, 3920, ''),
(23, 8, 2, 'type 4', '2023-10-28', 30, 3920, 3890, ''),
(24, 3, 2, 'type 1', '2023-10-28', 80, 820, 740, ''),
(25, 9, 2, 'type 3', '2023-10-28', 120, 400, 280, ''),
(26, 1, 2, 'type 4', '2023-10-31', 9, 1289, 1280, ''),
(27, 6, 2, 'type 2', '2023-11-01', 50, 100, 50, ''),
(28, 9, 2, 'type 3', '2023-11-01', 80, 280, 200, 'delete'),
(29, 1, 2, 'type 4', '2023-11-01', 20, 1280, 1260, ''),
(30, 9, 2, 'type 3', '2023-11-01', 10, 200, 190, 'sold'),
(31, 2, 2, 'type 3', '2023-11-01', 6, 986, 980, 'delete'),
(32, 6, 2, 'type 2', '2023-11-01', 10, 100, 90, 'delete'),
(33, 3, 2, 'type 1', '2023-11-01', 40, 740, 700, 'sold'),
(34, 9, 2, 'type 3', '2023-11-02', 30, 190, 160, 'delete'),
(35, 8, 2, 'type 4', '2023-11-02', 20, 3890, 3870, 'delete'),
(36, 3, 2, 'type 1', '2023-11-02', 100, 700, 600, 'sold'),
(37, 3, 2, 'type 1', '2023-11-02', 10, 600, 590, 'delete'),
(38, 1, 2, 'type 4', '2023-11-03', 20, 1280, 1260, 'delete'),
(39, 8, 2, 'type 4', '2023-11-03', 500, 3890, 3390, 'sold'),
(40, 2, 2, 'type 3', '2023-11-03', 63, 2980, 2917, 'sold'),
(41, 2, 2, 'type 3', '2023-11-03', 80, 2917, 2837, 'sold'),
(42, 3, 2, 'type 1', '2023-11-03', 100, 3800, 3700, 'sold'),
(43, 8, 2, 'type 4', '2023-11-03', 30, 3390, 3360, 'sold'),
(44, 8, 2, 'type 4', '2023-11-03', 60, 3360, 3300, 'sold'),
(45, 1, 2, 'type 4', '2023-11-03', 100, 1260, 1160, 'sold'),
(46, 1, 2, 'type 4', '2023-11-03', 100, 1160, 1060, 'sold'),
(47, 1, 2, 'type 4', '2023-11-03', 1000, 1060, 60, 'sold'),
(48, 6, 2, 'type 2', '2023-11-04', 100, 1100, 1000, 'sold'),
(49, 2, 2, 'type 3', '2023-11-07', 20, 2837, 2817, 'delete'),
(50, 2, 2, 'type 3', '2023-11-07', 17, 2817, 2800, 'delete'),
(51, 9, 6, 'type 3', '2023-11-07', 3, 3450, 3447, 'delete'),
(52, 9, 6, 'type 3', '2023-11-07', 3, 3447, 3444, 'sold'),
(53, 9, 6, 'type 3', '2023-11-07', 3, 3444, 3441, 'sold'),
(54, 9, 6, 'type 3', '2023-11-07', 3, 3441, 3438, 'sold'),
(55, 9, 2, 'type 3', '2023-11-08', 20, 3441, 3421, 'delete'),
(56, 13, 2, 'type 5', '2023-11-08', 30, 2000, 1970, 'sold'),
(57, 3, 2, 'type 1', '2023-11-08', 50, 4920, 4870, 'sold');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(10) NOT NULL,
  `medicineId` int(10) NOT NULL,
  `phyId` int(10) NOT NULL,
  `medicineName` varchar(25) NOT NULL,
  `orderDate` date NOT NULL,
  `receiveDate` date DEFAULT NULL,
  `orderAmount` int(5) NOT NULL,
  `status` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `medicineId`, `phyId`, `medicineName`, `orderDate`, `receiveDate`, `orderAmount`, `status`) VALUES
(1, 1, 2, 'panadol Actifast', '2023-10-05', '2023-10-10', 20, 'receive'),
(2, 1, 2, 'panadol Actifast', '2023-10-05', '2023-10-07', 200, 'receive'),
(3, 1, 2, 'panadol Actifast', '2023-10-05', '2023-10-08', 200, 'receive'),
(4, 1, 2, 'panadol Actifast', '2023-10-05', '2023-10-08', 300, 'receive'),
(5, 1, 2, 'panadol Actifast', '2023-10-05', '2023-10-08', 400, 'receive'),
(6, 2, 2, 'xyzal (Levocetirizine)', '2023-10-05', '2023-10-09', 500, 'receive'),
(7, 4, 2, 'Allergan Refresh Tears Ey', '2023-10-07', '2023-10-14', 200, 'receive'),
(8, 4, 2, 'Allergan Refresh Tears Ey', '2023-10-07', '2023-10-14', 200, 'receive'),
(9, 4, 2, 'Allergan Refresh Tears Ey', '2023-10-07', '2023-10-14', 10, 'receive'),
(10, 4, 2, 'Allergan Refresh Tears Ey', '2023-10-07', '2023-10-13', 20, 'receive'),
(11, 4, 2, 'Allergan Refresh Tears Ey', '2023-10-07', '2023-10-15', 60, 'receive'),
(12, 3, 2, 'Gaviscon', '2023-10-07', '2023-10-17', 30, 'receive'),
(13, 3, 2, 'Gaviscon', '2023-10-07', '2023-10-18', 30, 'receive'),
(14, 3, 2, 'Gaviscon', '2023-10-07', '2023-10-17', 50, 'receive'),
(15, 2, 2, 'xyzal (Levocetirizine)', '2023-10-07', '2023-10-10', 30, 'receive'),
(16, 2, 2, 'xyzal (Levocetirizine)', '2023-10-07', '2023-10-09', 100, 'receive'),
(17, 2, 2, 'xyzal (Levocetirizine)', '2023-10-07', '2023-10-10', 45, 'receive'),
(18, 1, 2, 'panadol Actifast', '2023-10-07', '2023-10-14', 60, 'receive'),
(19, 1, 2, 'panadol Actifast', '2023-10-16', '2023-10-21', 60, 'receive'),
(20, 1, 2, 'panadol Actifast', '2023-10-17', '2023-10-17', 200, 'receive'),
(21, 1, 2, 'panadol Actifast', '2023-10-26', '2023-10-28', 1000, 'receive'),
(22, 3, 2, 'Gaviscon', '2023-10-28', '2023-10-28', 500, 'receive'),
(23, 3, 2, 'Gaviscon', '2023-10-28', '2023-10-28', 20, 'receive'),
(24, 3, 2, 'Gaviscon', '2023-10-28', NULL, 200, 'cancel'),
(25, 2, 2, 'xyzal (Levocetirizine)', '2023-10-28', '2023-11-03', 2000, 'receive'),
(26, 3, 2, 'Gaviscon', '2023-10-28', '2023-11-03', 3000, 'receive'),
(27, 6, 2, 'panadol', '2023-10-28', '2023-11-03', 1000, 'receive'),
(28, 9, 2, 'Dysolvon 8mg', '2023-10-28', '2023-11-03', 2000, 'receive'),
(29, 3, 2, 'Gaviscon', '2023-11-03', '2023-11-03', 200, 'receive'),
(30, 9, 2, 'Dysolvon 8mg', '2023-11-03', '2023-11-03', 1260, 'receive'),
(31, 1, 2, 'aaa', '2023-11-03', '2023-11-04', 50, 'receive'),
(32, 3, 2, 'Gaviscon', '2023-11-03', '2023-11-04', 600, 'receive'),
(33, 3, 2, 'Gaviscon', '2023-11-04', '2023-11-07', 600, 'receive'),
(34, 3, 2, 'Gaviscon', '2023-11-04', NULL, 200, 'cancel'),
(35, 3, 2, 'Gaviscon', '2023-11-07', '2023-11-07', 20, 'receive'),
(37, 14, 2, 'TYLENOL Sinus', '2023-11-07', '2023-11-07', 500, 'receive'),
(38, 9, 6, 'Dysolvon 8mg', '2023-11-07', '2023-11-08', 200, 'receive'),
(39, 14, 6, 'TYLENOL Sinus', '2023-11-07', NULL, 2050, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `phyId` int(10) NOT NULL,
  `name` char(30) NOT NULL,
  `nric` varchar(200) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` text DEFAULT NULL,
  `gender` char(10) NOT NULL,
  `accessLvl` varchar(10) NOT NULL,
  `status` char(15) NOT NULL,
  `adminId` int(10) DEFAULT NULL,
  `agreement` char(8) NOT NULL,
  `specialist` char(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `reset_token` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`phyId`, `name`, `nric`, `email`, `password`, `phone`, `address`, `gender`, `accessLvl`, `status`, `adminId`, `agreement`, `specialist`, `image`, `info`, `reset_token`) VALUES
(1, 'test', '2147483647', 'test123@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 123456789, NULL, 'Male', 'doctor', 'Active now', NULL, 'approve', 'Dental', 'uploads/Resume photo.png', 'dad\r\n', NULL),
(2, 'gan kah liang', '2147483647', 'kahliang123@gmail.com', '0fc181f75862c5420a2e86078662aa71', 123456789, 'room5', 'Male', 'doctor', 'Offline now', NULL, 'approve', 'General practitioner', 'uploads/doctor_3.jpg', 'good doctor', NULL),
(3, 'doctot lim', '2147483647', 'doctorlim123@gmail.com', 'bf91eef53c5b6915de950be4af1d03f0', 132654789, NULL, 'Male', 'doctor', 'Active now', NULL, 'approve', 'Pediatrician', 'uploads/doctor_1.jpg', 'test file upload\r\n3', NULL),
(5, 'wong', '2147483647', 'ahwong123@gmail.com', '3754c0a83d16f18b7b09013e29dbd2b7', 198732465, NULL, 'Male', 'doctor', 'Active now', NULL, 'reject', NULL, NULL, NULL, NULL),
(6, 'ah mei', '2147483647', 'ahmei123@gmail.com', '62006805f5a9d1d1b52286841f063cf1', 123654789, 'nurse room 1', 'Female', 'nurse', 'Offline now', NULL, 'approve', 'General practitioner', 'uploads/petfeeder4.jpg', 'i m a good nurse\r\n', NULL),
(7, 'tommy', '2147483647', 'tommy123@gmail.com', 'aeef78208162e12ed9c7f3fb4e6253e5', 123456789, 'address room6', 'Male', 'doctor', 'Offline now', NULL, 'approve', 'Dental', 'uploads/Screenshot 2023-08-26 133209.png', 'i m a dental', NULL),
(8, 'zack gan', '011225889999', 'zackgan1105@gmail.com', '69250f0238f5f25cf66cdce8e86d64ea', 124598763, NULL, 'Male', 'doctor', 'Offline now', NULL, 'approve', NULL, NULL, NULL, 'ee29d902232f4da57e4168e1bd5622a9token change'),
(9, 'tzan pyng', '900203050607', 'tzanpyng123@gmail.com', 'be76141a9e5af5f14aa46c9a1f12ae2e', 123456789, NULL, 'Female', 'nurse', 'Offline now', NULL, 'approve', NULL, NULL, NULL, NULL),
(10, 'thiam', '601213050999', 'thiam123@gmail.com', 'dac407a22a08d46b8f289a49bfeba601', 163254789, NULL, 'Male', 'doctor', 'Active now', 1, 'approve', NULL, NULL, NULL, NULL),
(11, 'kahxiang', '011224888888', 'kahxiang@gmail.com', 'd8401295dbc3c2d0c3d7e9bdc3ee4a99', 123456789, NULL, 'Male', 'doctor', 'Offline now', 1, 'approve', NULL, NULL, NULL, NULL),
(12, 'weiying', '020101888888', 'weiying02@gmail.com', '805ed75ffd1973478bd6a4eb4787ee9c', 123456789, NULL, 'Female', 'nurse', 'Offline now', 1, 'approve', NULL, NULL, NULL, NULL),
(13, 'meleficine', '011225889999', 'meleficine123@gmail.com', 'a631a26e3f5b8794810a9dff351761ea', 136254897, NULL, 'Female', 'nurse', 'Active now', 1, 'approve', NULL, NULL, NULL, NULL),
(14, 'Meckey Mouse', '040506030209', 'meckeyMouse123@gmail.com', '83f1729cf2a030dad9add25c5923943e', 152479863, NULL, 'Male', 'doctor', 'Active now', 1, 'reject', NULL, NULL, NULL, NULL),
(15, 'ee pyng', '010203050606', 'eepyng123@gmail.com', 'fef4e0305181fcf13c01a85a76951aef', 123456789, NULL, 'Female', 'doctor', 'Active now', 1, 'reject', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `removeitem`
--

CREATE TABLE `removeitem` (
  `deleteId` int(10) NOT NULL,
  `transId` int(10) NOT NULL,
  `medicineId` int(10) NOT NULL,
  `date` date NOT NULL,
  `deleteAmount` int(5) NOT NULL,
  `newAmount` int(5) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `removeitem`
--

INSERT INTO `removeitem` (`deleteId`, `transId`, `medicineId`, `date`, `deleteAmount`, `newAmount`, `reason`) VALUES
(6, 34, 9, '2023-11-02', 30, 190, ''),
(7, 35, 8, '2023-11-02', 20, 3890, ''),
(8, 37, 3, '2023-11-02', 10, 600, 'test'),
(9, 38, 1, '2023-11-03', 20, 80, 'dad'),
(10, 50, 2, '2023-11-07', 17, 2817, 'testing'),
(11, 49, 2, '2023-11-07', 20, 2837, 'testing'),
(12, 51, 9, '2023-11-07', 3, 3441, 'test'),
(13, 55, 9, '2023-11-08', 20, 3641, 'input wrong number of sold ');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportId` int(10) NOT NULL,
  `medicineId` int(10) NOT NULL,
  `medicineName` varchar(25) NOT NULL,
  `dateGenerate` date NOT NULL,
  `maxAmount` int(5) NOT NULL,
  `avgAmount` int(5) NOT NULL,
  `maxReachTime` int(3) NOT NULL,
  `avgReachTime` int(3) NOT NULL,
  `safetyStock` int(5) NOT NULL,
  `reorderPoint` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportId`, `medicineId`, `medicineName`, `dateGenerate`, `maxAmount`, `avgAmount`, `maxReachTime`, `avgReachTime`, `safetyStock`, `reorderPoint`) VALUES
(1, 4, 'Allergan Refresh Tears Ey', '2023-10-09', 3, 3, 8, 7, 0, 0),
(2, 4, 'Allergan Refresh Tears Ey', '2023-10-09', 3, 3, 8, 7, 0, 0),
(3, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 0, 0),
(4, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 0, 0),
(5, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 0, 0),
(6, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 0, 0),
(7, 1, 'panadol Actifast', '2023-10-11', 39, 10, 5, 3, 164, 213),
(8, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 3, 27),
(9, 1, 'panadol Actifast', '0000-00-00', 39, 10, 5, 3, 164, 213),
(10, 2, 'xyzal (Levocetirizine)', '0000-00-00', 4, 2, 4, 3, 10, 18),
(11, 3, 'Gaviscon', '0000-00-00', 10, 10, 11, 10, 7, 117),
(12, 4, 'Allergan Refresh Tears Ey', '0000-00-00', 3, 3, 8, 7, 3, 27),
(13, 1, 'panadol Actifast', '2023-10-11', 39, 10, 5, 3, 164, 213),
(14, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 10, 18),
(15, 3, 'Gaviscon', '2023-10-11', 10, 10, 11, 10, 7, 117),
(16, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 3, 27),
(17, 1, 'panadol Actifast', '2023-10-11', 39, 10, 5, 3, 164, 213),
(18, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 10, 18),
(19, 3, 'Gaviscon', '2023-10-11', 10, 10, 11, 10, 7, 117),
(20, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 3, 27),
(21, 1, 'panadol Actifast', '2023-10-11', 39, 10, 5, 3, 164, 213),
(22, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 10, 18),
(23, 3, 'Gaviscon', '2023-10-11', 10, 10, 11, 10, 7, 117),
(24, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 3, 27),
(25, 1, 'panadol Actifast', '2023-10-11', 39, 10, 5, 3, 164, 213),
(26, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 10, 18),
(27, 3, 'Gaviscon', '2023-10-11', 10, 10, 11, 10, 7, 117),
(28, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 3, 27),
(29, 1, 'panadol Actifast', '2023-10-11', 39, 10, 5, 3, 164, 213),
(30, 2, 'xyzal (Levocetirizine)', '2023-10-11', 4, 2, 4, 3, 10, 18),
(31, 3, 'Gaviscon', '2023-10-11', 10, 10, 11, 10, 7, 117),
(32, 4, 'Allergan Refresh Tears Ey', '2023-10-11', 3, 3, 8, 7, 3, 27),
(33, 1, 'panadol Actifast', '2023-10-16', 489, 98, 7, 4, 3048, 3733),
(34, 2, 'xyzal (Levocetirizine)', '2023-10-16', 4, 2, 4, 3, 10, 18),
(35, 3, 'Gaviscon', '2023-10-16', 10, 10, 11, 10, 7, 117),
(36, 4, 'Allergan Refresh Tears Ey', '2023-10-16', 3, 3, 8, 7, 3, 27),
(37, 1, 'Panadol ActiFas', '2023-10-28', 640, 49, 7, 3, 4333, 4676),
(38, 2, 'xyzal (Levocetirizine)', '2023-10-28', 4, 2, 4, 3, 10, 18),
(39, 3, 'Gaviscon', '2023-10-28', 48, 24, 11, 6, 384, 648),
(40, 4, 'Allergan Refresh Tears Ey', '2023-10-28', 3, 3, 8, 7, 3, 27),
(41, 1, 'Panadol ActiFas', '2023-10-28', 640, 49, 7, 3, 4333, 4676),
(42, 2, 'xyzal (Levocetirizine)', '2023-10-28', 4, 2, 4, 3, 10, 18),
(43, 3, 'Gaviscon', '2023-10-28', 48, 24, 11, 6, 384, 648),
(44, 4, 'Allergan Refresh Tears Ey', '2023-10-28', 3, 3, 8, 7, 3, 27),
(45, 1, 'Panadol ActiFas', '2023-10-28', 640, 49, 7, 3, 4333, 4676),
(46, 2, 'xyzal (Levocetirizine)', '2023-10-28', 4, 2, 4, 3, 10, 18),
(47, 3, 'Gaviscon', '2023-10-28', 128, 43, 11, 6, 1150, 1623),
(48, 4, 'Allergan Refresh Tears Ey', '2023-10-28', 3, 3, 8, 7, 3, 27),
(49, 8, 'Denzo Tablet', '2023-10-28', 110, 37, 0, 0, 0, 0),
(50, 9, 'Dysolvon 8mg', '2023-10-28', 120, 120, 0, 0, 0, 0),
(51, 1, 'aaa', '2023-10-31', 649, 46, 7, 3, 4405, 4727),
(52, 2, 'xyzal (Levocetirizine)', '2023-10-31', 4, 2, 4, 3, 10, 18),
(53, 3, 'Gaviscon', '2023-10-31', 128, 43, 11, 6, 1150, 1623),
(54, 4, 'Allergan Refresh Tears Ey', '2023-10-31', 3, 3, 8, 7, 3, 27),
(55, 8, 'Denzo Tablet', '2023-10-31', 110, 37, 0, 0, 0, 0),
(56, 9, 'Dysolvon 8mg', '2023-10-31', 120, 120, 0, 0, 0, 0),
(57, 1, 'aaa', '2023-11-03', 20, 20, 7, 3, 80, 220),
(58, 2, 'xyzal (Levocetirizine)', '2023-11-03', 6, 6, 6, 4, 12, 48),
(59, 3, 'Gaviscon', '2023-11-03', 150, 50, 11, 5, 1400, 1950),
(60, 6, 'panadol', '2023-11-03', 60, 30, 8, 7, 270, 510),
(61, 8, 'Denzo Tablet', '2023-11-03', 20, 20, 6, 6, 0, 120),
(62, 9, 'Dysolvon 8mg', '2023-11-03', 120, 40, 6, 3, 600, 840),
(63, 1, 'panadol actifast', '2023-11-06', 1240, 248, 7, 3, 7936, 9672),
(64, 2, 'xyzal (Levocetirizine)', '2023-11-06', 149, 50, 6, 4, 694, 994),
(65, 3, 'Gaviscon', '2023-11-06', 250, 63, 11, 5, 2435, 3128),
(66, 6, 'panadol', '2023-11-06', 160, 53, 8, 7, 909, 1333),
(67, 8, 'Denzo Tablet', '2023-11-06', 610, 153, 6, 6, 2742, 3660),
(68, 9, 'Dysolvon 8mg', '2023-11-06', 120, 40, 6, 3, 600, 840),
(69, 1, 'asd', '2023-11-07', 1240, 248, 7, 3, 7936, 9672),
(70, 2, 'xyzal (Levocetirizine)', '2023-11-07', 186, 37, 6, 4, 968, 1190),
(71, 3, 'Gaviscon', '2023-11-07', 250, 63, 11, 5, 2435, 3128),
(72, 6, 'Cyclobenzaprine Tablets', '2023-11-07', 160, 53, 8, 7, 909, 1333),
(73, 8, 'Denzo Tablet', '2023-11-07', 610, 153, 6, 6, 2742, 3660),
(74, 9, 'Dysolvon 8mg', '2023-11-07', 120, 40, 6, 3, 600, 840),
(75, 1, 'asd', '2023-11-08', 1240, 248, 7, 3, 7936, 9672),
(76, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 6, 4, 968, 1190),
(77, 3, 'Gaviscon', '2023-11-08', 300, 60, 11, 4, 3060, 3720),
(78, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 8, 7, 909, 1333),
(79, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 6, 6, 2742, 3660),
(80, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 6, 2, 874, 988),
(81, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0),
(82, 1, 'asd', '2023-11-08', 1240, 248, 1, 1, 992, 1240),
(83, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 3, 1, 521, 632),
(84, 3, 'Gaviscon', '2023-11-08', 300, 60, 1, 1, 270, 330),
(85, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 0, 0, 0, 0),
(86, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 0, 0, 0, 0),
(87, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 0, 0, 0, 0),
(88, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0),
(89, 1, 'asd', '2023-11-08', 1240, 248, 1, 1, 992, 1240),
(90, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 3, 1, 521, 632),
(91, 3, 'Gaviscon', '2023-11-08', 300, 60, 1, 1, 270, 330),
(92, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 0, 0, 0, 0),
(93, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 0, 0, 0, 0),
(94, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 0, 0, 0, 0),
(95, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0),
(96, 1, 'asd', '2023-11-08', 1240, 248, 7, 3, 7936, 9672),
(97, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 6, 4, 968, 1190),
(98, 3, 'Gaviscon', '2023-11-08', 300, 60, 11, 4, 3060, 3720),
(99, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 8, 7, 909, 1333),
(100, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 6, 6, 2742, 3660),
(101, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 6, 2, 874, 988),
(102, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0),
(103, 1, 'asd', '2023-11-08', 1240, 248, 1, 1, 992, 1240),
(104, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 3, 1, 521, 632),
(105, 3, 'Gaviscon', '2023-11-08', 300, 60, 1, 1, 270, 330),
(106, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 0, 0, 0, 0),
(107, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 0, 0, 0, 0),
(108, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 0, 0, 0, 0),
(109, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0),
(110, 1, 'asd', '2023-11-08', 1240, 248, 7, 3, 7936, 9672),
(111, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 6, 4, 968, 1190),
(112, 3, 'Gaviscon', '2023-11-08', 300, 60, 11, 4, 3060, 3720),
(113, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 8, 7, 909, 1333),
(114, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 6, 6, 2742, 3660),
(115, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 6, 2, 874, 988),
(116, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0),
(117, 1, 'asd', '2023-11-08', 1240, 248, 7, 3, 7936, 9672),
(118, 2, 'xyzal (Levocetirizine)', '2023-11-08', 186, 37, 6, 4, 968, 1190),
(119, 3, 'Gaviscon', '2023-11-08', 300, 60, 11, 4, 3060, 3720),
(120, 6, 'Cyclobenzaprine Tablets', '2023-11-08', 160, 53, 8, 7, 909, 1333),
(121, 8, 'Denzo Tablet', '2023-11-08', 610, 153, 6, 6, 2742, 3660),
(122, 9, 'Dysolvon 8mg', '2023-11-08', 152, 19, 6, 2, 874, 988),
(123, 13, 'refluxg+', '2023-11-08', 30, 30, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `timeslotID` int(10) NOT NULL,
  `adminId` int(10) NOT NULL,
  `slot` varchar(20) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeslotID`, `adminId`, `slot`, `time`) VALUES
(3, 1, 'slot 2', '09:00:00'),
(8, 1, 'slot 1', '08:00:00'),
(9, 1, 'slot 3', '10:00:00'),
(15, 1, 'slot 4', '11:00:00'),
(16, 1, 'slot 5', '14:00:00'),
(18, 1, 'Slot 7', '12:00:00'),
(23, 1, 'Slot 10', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` char(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` text DEFAULT NULL,
  `nric` varchar(200) NOT NULL,
  `gender` char(10) NOT NULL,
  `accessLVL` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `agreement` char(8) NOT NULL,
  `reset_token` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `nric`, `gender`, `accessLVL`, `status`, `agreement`, `reset_token`) VALUES
(5, 'gan', 'kahxiang@gmail.com', 'd8401295dbc3c2d0c3d7e9bdc3ee4a99', 123465987, 'asdsad', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'Patient', 'Offline now', 'approve', '85b52cd13f335f2abe448402ad0a5700'),
(8, 'jerelin', 'jerelin123@gmail.com', '90e3ef80f7b4ed3227edee772fbd3c6f', 132654987, 'jerelin, 1 lalala ', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Female', 'Patient', 'Offline now', 'approve', NULL),
(10, 'weiying', 'weiying123@gmail.com', '360f06034b057228a69a894e60427891', 163254987, 'address wei', '2147483647\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Female', 'Patient', 'Active now', 'approve', NULL),
(13, 'zack', 'kahxiang2703@gmail.com', 'fdb59dace8fd5cbc1f08f2b794ff1b61', 132645798, 'block a taman merah penang', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(14, 'eepyng', 'eepyng123@gmai.com', '9ea04c5bcece6a4bc84666aa40b33ed7', 124579863, 'bayan lepas penang', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Female', 'Patient', 'Offline now', 'approve', NULL),
(15, 'tzan pyng', 'tp123@gmail.com', '0663f1a7469a4404c7d9657cccb492a9', 198723546, 'bayan baru penang', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Female', 'Patient', 'Offline now', 'approve', NULL),
(16, 'superman', 'superman123@gmail.com', 'ecb1d4ce2c43c60fbdf74a70648cf020', 124536789, 'super town penang', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(17, 'test', 'testing123@gmail.com', '7f2ababa423061c509f4923dd04b6cf1', 123456789, 'testing block a penang', '', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(18, 'testing', 'testing2222@gmail.com', 'bbdb167b3bf0e00345eda5526ddc0eba', 122223333, 'testing block b penang', 'IiIceD+1DOF0q7YpTGhM3WGEOhaU9/gF', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(19, 'encrypt', 'encrypt123@gmail.com', '3e9bb3accbcd51d61c76c4966d421e0a', 123456789, 'encrypt address', '5cHpqQVA5MYEYwzRwTH6k1BqVnN2OW5s', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(20, 'test3333', 'test3333@gmail.com', '4bfe1b8f3dd03882fc394b93df365a7d', 123456789, 'test3333', 'bOvbhOOCKW+aynU+UGXwsHc1WmdEbVo0ZlFObHQ5ZnNrN2pzR0E9PQ==', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(21, 'test566', 'test566@gmail.com', 'de63fb7ae7d1575947a130265112f3a9', 123654789, 'address', 'krANYd6ayJIdXGpaCKWx7A==', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(22, 'test999', 'test999@gmail.com', '93327f2856df1105a1318895ac44e684', 179832654, 'address', '', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(23, 'test777', 'test777@gmail.com', '83560a75c016ee68f0dd71bf1bb35b84', 123654889, 'addresws', '', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(24, 'test888', 'test888@gmail.com', 'e2e31a427d2e8c4851b53f7eeb9fff95', 123654789, 'address', '', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(25, 'test6666', 'test6666@gmail.com', '4ebf3ac052c754abe7ae8ef057e924bf', 123456789, 'address', 'gy5luWNgDY2/RDxX', 'Male', 'Patient', 'Active now', 'approve', NULL),
(26, 'zack gan kah xiang', 'kahxiang2705@gmail.com', '3c99dbcf4747eec81df891403d4104bd', 136254897, 'SQS', 'gy9ksGNqD4mzSDBb', 'Male', 'Patient', 'Active now', 'approve', '0c75a660ea30fa4bb5148caa5e51cbb3token change'),
(27, 'student', 'p20012398@student.newinti', '1c5591b632e345421c8965994072955e', 123456789, 'student address', 'gy9lumNhCouzSDBb', 'Male', 'Patient', 'Active now', 'approve', NULL),
(28, 'student', 'gkahxiang0208@gmail.com', '0a5db527c0ceb9eeeb1a6d151f7cf25e', 123456789, 'address', 'gy9lumNhCouzSDBb', 'Male', 'Patient', 'Offline now', 'approve', 'e5570a224f194d9f1ecede8875a6a626token change'),
(29, 'email', 'email@gmail.com', '0c83f57c786a0b4a39efab23731c7ebc', 123456789, 'address', 'gy9gvGRnB4aySQ==', 'Male', 'Patient', 'Offline now', 'approve', NULL),
(30, 'Rui Qing', 'p21013085@student.newinti', '25f9e794323b453885f5181f1b624d0b', 125206614, 'blablabla', 'iyZssGlqB4ay', 'Female', 'Patient', 'Active now', 'approve', NULL),
(31, 'kah heng', 'kahheng123@gmail.com', '30e6e4f0e45e683317fe932933212c0c', 123456789, 'kahheng house address', 'gy9kuWFjD4y7QzpW', 'Male', 'Patient', 'Offline now', 'approve', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD KEY `userid` (`id`),
  ADD KEY `consultation_phyId_fk` (`phyId`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineId`),
  ADD KEY `phyId` (`phyId`);

--
-- Indexes for table `medtransaction`
--
ALTER TABLE `medtransaction`
  ADD PRIMARY KEY (`transId`),
  ADD KEY `medicineId_fk` (`medicineId`),
  ADD KEY `phyId_fk` (`phyId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `medId` (`medicineId`),
  ADD KEY `physicianId` (`phyId`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`phyId`);

--
-- Indexes for table `removeitem`
--
ALTER TABLE `removeitem`
  ADD PRIMARY KEY (`deleteId`),
  ADD KEY `transId` (`transId`),
  ADD KEY `consultation_medicineId_fk` (`medicineId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportId`),
  ADD KEY `medicineId` (`medicineId`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`timeslotID`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medtransaction`
--
ALTER TABLE `medtransaction`
  MODIFY `transId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `physician`
--
ALTER TABLE `physician`
  MODIFY `phyId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `removeitem`
--
ALTER TABLE `removeitem`
  MODIFY `deleteId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `timeslotID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `consultation_phyId_fk` FOREIGN KEY (`phyId`) REFERENCES `physician` (`phyId`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `phyId` FOREIGN KEY (`phyId`) REFERENCES `physician` (`phyId`);

--
-- Constraints for table `medtransaction`
--
ALTER TABLE `medtransaction`
  ADD CONSTRAINT `medicineId_fk` FOREIGN KEY (`medicineId`) REFERENCES `medicine` (`medicineId`),
  ADD CONSTRAINT `phyId_fk` FOREIGN KEY (`phyId`) REFERENCES `physician` (`phyId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `medId` FOREIGN KEY (`medicineId`) REFERENCES `medicine` (`medicineId`),
  ADD CONSTRAINT `physicianId` FOREIGN KEY (`phyId`) REFERENCES `physician` (`phyId`);

--
-- Constraints for table `removeitem`
--
ALTER TABLE `removeitem`
  ADD CONSTRAINT `consultation_medicineId_fk` FOREIGN KEY (`medicineId`) REFERENCES `medicine` (`medicineId`),
  ADD CONSTRAINT `transId` FOREIGN KEY (`transId`) REFERENCES `medtransaction` (`transId`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `medicineId` FOREIGN KEY (`medicineId`) REFERENCES `medicine` (`medicineId`);

--
-- Constraints for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD CONSTRAINT `adminId` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
