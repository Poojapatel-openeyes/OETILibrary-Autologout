-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 05:51 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lfb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblactivitylog`
--

CREATE TABLE `tblactivitylog` (
  `ActivityLogId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Module` varchar(50) NOT NULL,
  `Activity` varchar(50) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblactivitylog`
--

INSERT INTO `tblactivitylog` (`ActivityLogId`, `UserId`, `Module`, `Activity`, `CreatedOn`) VALUES
(1, 0, 'Client-Invitation', 'Invitation', '2018-08-30 05:48:37'),
(2, 6, 'Client-Invitation', 'Invitation', '2018-08-30 10:13:26'),
(3, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 10:45:13'),
(4, 1, 'Category', 'Update', '2018-08-30 10:47:14'),
(5, 1, 'User-Invitation', 'Revoke', '2018-08-30 10:54:11'),
(6, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:01:51'),
(7, 1, 'User-Invitation', 'Revoke', '2018-08-30 11:02:07'),
(8, 1, 'Client-Invitation', 'Revoke', '2018-08-30 11:03:44'),
(9, 1, 'Client-Invitation', 'Revoke', '2018-08-30 11:13:00'),
(10, 1, 'User-Invitation', 'Revoke', '2018-08-30 11:13:13'),
(11, 1, 'Client-Invitation', 'ReInvitation', '2018-08-30 11:32:33'),
(12, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:35:10'),
(13, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:35:15'),
(14, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:36:27'),
(15, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:36:34'),
(16, 1, 'Client-Invitation', 'ReInvitation', '2018-08-30 11:48:37'),
(17, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:49:17'),
(18, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:49:23'),
(19, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:50:26'),
(20, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 11:50:32'),
(21, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 12:07:02'),
(22, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 12:07:07'),
(23, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 13:35:43'),
(24, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 13:36:12'),
(25, 1, 'User-Invitation', 'ReInvitation', '2018-08-30 13:36:17'),
(26, 0, 'Client-Invitation', 'Invitation', '2018-08-30 14:12:45'),
(27, 0, 'Client-Invitation', 'Invitation', '2018-08-30 14:20:31'),
(28, 0, 'Client-Invitation', 'Invitation', '2018-08-30 14:24:31'),
(29, 71, 'Client-Registration', 'Add', '2018-08-30 14:28:30'),
(30, 71, 'Licence Pack', 'Add', '2018-08-31 10:30:31'),
(31, 71, 'Purchase-LicensePack', 'PurchaseLicense', '2018-08-31 10:30:40'),
(32, 71, 'Purchase-LicensePack', 'PurchaseLicense', '2018-08-31 10:32:26'),
(33, 71, 'Purchase-LicensePack', 'PurchaseLicense', '2018-08-31 10:35:10'),
(34, 53, 'Licence Pack', 'Add', '2018-08-31 10:37:52'),
(35, 53, 'Purchase-LicensePack', 'PurchaseLicense', '2018-08-31 10:38:01'),
(36, 53, 'User-Invitation', 'Invitation', '2018-08-31 10:38:50'),
(37, 53, 'User-Invitation', 'Invitation', '2018-08-31 10:50:06'),
(38, 53, 'User-Invitation', 'Invitation', '2018-08-31 10:53:38'),
(39, 53, 'Category', 'Add', '2018-08-31 11:01:38'),
(40, 53, 'Category', 'Update', '2018-08-31 11:01:43'),
(41, 53, 'Category', 'Update', '2018-08-31 11:01:43'),
(42, 53, 'Category', 'Update', '2018-08-31 11:02:51'),
(43, 53, 'Category', 'Update', '2018-08-31 11:02:51'),
(44, 53, 'Category', 'Update', '2018-08-31 11:10:52'),
(45, 53, 'Category', 'Update', '2018-08-31 11:10:55'),
(46, 53, 'Category', 'Update', '2018-08-31 11:10:59'),
(47, 53, 'Category', 'Update', '2018-08-31 11:11:02'),
(48, 71, 'Category', 'Update', '2018-08-31 11:51:23'),
(49, 71, 'Category', 'Update', '2018-08-31 11:51:27'),
(50, 71, 'Category', 'Update', '2018-08-31 11:51:31'),
(51, 71, 'Category', 'Update', '2018-08-31 11:51:33'),
(52, 71, 'Category', 'Update', '2018-08-31 11:51:37'),
(53, 71, 'Category', 'Update', '2018-08-31 11:52:13'),
(54, 71, 'Category', 'Update', '2018-08-31 11:52:15'),
(55, 71, 'Category', 'Update', '2018-08-31 11:52:18'),
(56, 71, 'Category', 'Update', '2018-08-31 11:52:20'),
(57, 71, 'Category', 'Update', '2018-08-31 11:52:29'),
(58, 71, 'Category', 'Update', '2018-08-31 11:52:36'),
(59, 71, 'Category', 'Update', '2018-08-31 11:52:37'),
(60, 71, 'Category', 'Update', '2018-08-31 11:52:48'),
(61, 71, 'Category', 'Update', '2018-08-31 11:52:49'),
(62, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:51:27'),
(63, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:51:31'),
(64, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:52:54'),
(65, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:52:57'),
(66, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:55:17'),
(67, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:55:22'),
(68, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:56:06'),
(69, 53, 'User-Invitation', 'ReInvitation', '2018-08-31 13:56:10'),
(70, 53, 'Inquiry', 'Add', '2018-08-31 14:13:42'),
(71, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:06:23'),
(72, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:27:17'),
(73, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:39:57'),
(74, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:41:47'),
(75, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:43:42'),
(76, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:46:38'),
(77, 82, 'Client-Registration', 'Add', '2018-09-04 06:47:17'),
(78, 1, 'User-Invitation', 'Invitation', '2018-09-04 06:50:22'),
(79, 83, 'Client-Registration', 'Add', '2018-09-04 06:51:00'),
(80, 1, 'Client-Invitation', 'Invitation', '2018-09-04 06:55:16'),
(81, 1, 'Client-Invitation', 'Invitation', '2018-09-04 07:11:55'),
(82, 85, 'Client-Registration', 'Add', '2018-09-04 07:13:38'),
(83, 1, 'Client-Invitation', 'Invitation', '2018-09-04 07:14:44'),
(84, 86, 'Client-Registration', 'Add', '2018-09-04 07:19:25'),
(85, 1, 'Client-Invitation', 'Invitation', '2018-09-04 07:26:17'),
(86, 87, 'Client-Registration', 'Add', '2018-09-04 07:27:46'),
(87, 53, 'Purchase-LicensePack', 'PurchaseLicense', '2018-09-04 07:36:46'),
(88, 53, 'Purchase-LicensePack', 'PurchaseLicense', '2018-09-04 07:36:56'),
(89, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:01:08'),
(90, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:08:31'),
(91, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:10:10'),
(92, 1, 'User-Invitation', 'Invitation', '2018-09-04 10:12:54'),
(93, 6, 'User-Invitation', 'Invitation', '2018-09-04 10:14:10'),
(94, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:15:43'),
(95, 93, 'Client-Registration', 'Add', '2018-09-04 10:18:17'),
(96, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:34:03'),
(97, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:35:44'),
(98, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:40:30'),
(99, 1, 'User-Invitation', 'Invitation', '2018-09-04 10:41:15'),
(100, 53, 'User-Invitation', 'Invitation', '2018-09-04 10:48:23'),
(101, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:48:42'),
(102, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:48:46'),
(103, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:50:46'),
(104, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:50:51'),
(105, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:51:48'),
(106, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:51:53'),
(107, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:53:39'),
(108, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 10:53:45'),
(109, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 10:54:30'),
(110, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 10:54:35'),
(111, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 10:55:54'),
(112, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 10:55:59'),
(113, 53, 'Licence Pack', 'Update', '2018-09-04 11:01:51'),
(114, 53, 'Purchase-LicensePack', 'PurchaseLicense', '2018-09-04 11:02:00'),
(115, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:06:26'),
(116, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:06:31'),
(117, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 11:07:33'),
(118, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 11:07:37'),
(119, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:09:33'),
(120, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:09:38'),
(121, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 11:10:06'),
(122, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 11:10:11'),
(123, 53, 'User-Invitation', 'Revoke', '2018-09-04 11:10:45'),
(124, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:11:43'),
(125, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:11:48'),
(126, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:12:07'),
(127, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:12:12'),
(128, 53, 'User-Invitation', 'Revoke', '2018-09-04 11:12:38'),
(129, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:12:54'),
(130, 53, 'User-Invitation', 'ReInvitation', '2018-09-04 11:13:00'),
(131, 1, 'User-Invitation', 'ReInvitation', '2018-09-04 11:54:49'),
(132, 1, 'Client-Invitation', 'Invitation', '2018-09-04 12:31:49'),
(133, 99, 'Client-Registration', 'Add', '2018-09-04 12:35:36'),
(134, 1, 'Client-Invitation', 'Invitation', '2018-09-04 13:14:20'),
(135, 100, 'Client-Registration', 'Add', '2018-09-04 13:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategorywisescore`
--

CREATE TABLE `tblcategorywisescore` (
  `CategoryScoreId` int(11) NOT NULL,
  `UserFeedbackId` int(11) NOT NULL,
  `FeedbackCategoryId` int(11) NOT NULL,
  `Score` decimal(4,1) NOT NULL,
  `NoOfFeedback` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblclientinvoice`
--

CREATE TABLE `tblclientinvoice` (
  `InvoiceId` int(11) NOT NULL,
  `ClientLicenseId` int(11) NOT NULL,
  `PaymentType` int(11) NOT NULL,
  `TotalPrice` decimal(12,3) NOT NULL,
  `DiscountPrice` decimal(12,3) NOT NULL,
  `PaidPrice` decimal(12,3) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblclientlicense`
--

CREATE TABLE `tblclientlicense` (
  `ClientLicenseId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `LicensePackId` int(11) NOT NULL,
  `TotalLicense` int(11) NOT NULL,
  `RemainingLicense` int(11) NOT NULL,
  `ExpiredDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ProvideByAdmin` int(1) NOT NULL DEFAULT '0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblclientlicense`
--

INSERT INTO `tblclientlicense` (`ClientLicenseId`, `UserId`, `LicensePackId`, `TotalLicense`, `RemainingLicense`, `ExpiredDate`, `ProvideByAdmin`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(4, 71, 1, 22, 22, '2019-04-09 18:30:00', 0, b'1', 71, '2018-08-31 10:35:10', 71, '2018-08-31 10:35:10'),
(5, 53, 2, 22, 13, '2018-08-31 13:56:06', 0, b'1', 53, '2018-08-31 10:38:01', 53, '2018-08-31 10:38:01'),
(6, 53, 1, 22, 22, '2019-04-13 18:30:00', 0, b'1', 53, '2018-09-04 07:36:46', 53, '2018-09-04 07:36:46'),
(7, 53, 2, 22, 15, '2018-09-04 11:12:38', 0, b'1', 53, '2018-09-04 07:36:56', 53, '2018-09-04 07:36:56'),
(8, 53, 1, 22, 21, '2018-09-04 11:54:49', 0, b'1', 53, '2018-09-04 11:02:00', 53, '2018-09-04 11:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `CompanyId` int(11) NOT NULL,
  `ParentId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CompanyName` varchar(250) NOT NULL,
  `CompanyLogo` varchar(300) DEFAULT NULL,
  `Favicon` varchar(300) DEFAULT NULL,
  `CompanyEmail` varchar(100) NOT NULL,
  `Website` varchar(250) NOT NULL,
  `WorkspaceURL` varchar(100) NOT NULL,
  `PhoneNo` varchar(14) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `ThemeCode` varchar(50) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`CompanyId`, `ParentId`, `UserId`, `CompanyName`, `CompanyLogo`, `Favicon`, `CompanyEmail`, `Website`, `WorkspaceURL`, `PhoneNo`, `Address`, `ThemeCode`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(4, 0, 67, 'miv solutions', NULL, NULL, 'sdf@sfsd.gfhfg', 'https://sdfsd.sdfs', 'miv12', '', '', NULL, b'1', 0, '2018-08-30 05:48:31', 0, '2018-08-30 05:48:31'),
(5, 0, 53, 'miv solutions', NULL, NULL, 'sdf@sfsd.gfhfg', 'https://sdfsd.sdfs', 'miv', '1234567', 'rtyryrty errte', '#ad3535', b'1', 0, '2018-08-30 05:48:31', 53, '2018-08-30 14:07:23'),
(9, 0, 71, 'my company', 'Learn FeedBack.png', 'checkbox.png', 'vidhi.bathani@theopeneyes.in', 'https://sadas.asdsa', 'mycompany', '23123123', 'werwer', '#cc5959', b'1', 71, '2018-08-30 14:24:28', 71, '2018-08-31 11:56:05'),
(15, 0, 100, 'OpenEyes Technologies', 'favicon.ico', 'home_strips.png', 'open@gmail.com', 'open@.com', 'open', '234567', 'dcdv', '#d43434', b'1', 100, '2018-09-04 13:14:14', 100, '2018-09-04 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblemaillog`
--

CREATE TABLE `tblemaillog` (
  `EmailLogId` int(11) NOT NULL,
  `TokenId` int(11) NOT NULL,
  `From` varchar(100) NOT NULL,
  `Cc` text NOT NULL,
  `Bcc` text NOT NULL,
  `To` varchar(100) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `MessageBody` text NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemaillog`
--

INSERT INTO `tblemaillog` (`EmailLogId`, `TokenId`, `From`, `Cc`, `Bcc`, `To`, `Subject`, `MessageBody`, `CreatedOn`) VALUES
(1, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Password has been Changed', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Password Changed!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">Your new password has been set.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to access your account:</p>\n			<a href="http://localhost:4200/login" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Login to Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If the changes described above are accurate, no further action is needed. If anything doesn&#39;t look right, follow the link below to make changes: <a href="{reset_url}">Restore password</a></p>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/login</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-29 13:22:04'),
(2, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', '{Client Company Name} - Thank you for give Feedback', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Thank You!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">Thank you for providing your feedback. We appreciate the time you have taken and will actively use it to improve our services to you.</p>\n			&nbsp;\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them.</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-29 13:27:01'),
(3, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkJDUTBISCI.xMmRitPTHZdHjKEJuc55P16D9rqvmHm9D4kRDr1saVA" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/miv/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkJDUTBISCI.xMmRitPTHZdHjKEJuc55P16D9rqvmHm9D4kRDr1saVA</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 05:48:37'),
(4, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'gfh@fdg.dfg', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/openeyeserter/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik5YT1hPNSI.4zJTxpr0-bGsezu4dQ4cFzh2JgtfGakR2cDcYxHbqao" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/openeyeserter/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik5YT1hPNSI.4zJTxpr0-bGsezu4dQ4cFzh2JgtfGakR2cDcYxHbqao</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 10:13:26'),
(5, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv12/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlE3UUM1WiI.9gDXoK67GP8SJfkf1ldxXRhsIBm4xbJbE9BOnHvFEmY" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/miv12/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlE3UUM1WiI.9gDXoK67GP8SJfkf1ldxXRhsIBm4xbJbE9BOnHvFEmY</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 11:32:33'),
(6, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', '- Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for </p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjFYUzBJTiI.kq-2thyPKbeaB_OPj7Jdvgf99O83RuffzOfj3a4qqoQ" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjFYUzBJTiI.kq-2thyPKbeaB_OPj7Jdvgf99O83RuffzOfj3a4qqoQ</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 11:35:15'),
(7, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', '- Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for </p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IktFWTdKSSI.RFrPEifvtzKsaXP_3ljN1LQkS_dUOlSlJ8El5iU-zWU" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IktFWTdKSSI.RFrPEifvtzKsaXP_3ljN1LQkS_dUOlSlJ8El5iU-zWU</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 11:36:34'),
(8, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv12/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IklXN0lTRiI.UAUSp-5yjgBNGZApJ6eR9lr39iV68D6p_hAl1iAoHB8" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/miv12/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IklXN0lTRiI.UAUSp-5yjgBNGZApJ6eR9lr39iV68D6p_hAl1iAoHB8</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 11:48:37'),
(9, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', '- Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for </p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjZDMklIVyI.V6iy_g95Ac-Spjij0JikJF08N8j-xspZsuclPAe62QU" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjZDMklIVyI.V6iy_g95Ac-Spjij0JikJF08N8j-xspZsuclPAe62QU</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 11:49:23'),
(10, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', '- Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for </p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlVGNzZBTSI.B87xxf4gWhPZYaO_TFQt7Q780m0Rhm9i6yyk78t7MXQ" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlVGNzZBTSI.B87xxf4gWhPZYaO_TFQt7Q780m0Rhm9i6yyk78t7MXQ</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 11:50:32'),
(11, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik1QUEcwUCI.K0PM3GJNAx56_8HeCEWM2XwtrVjAnUpGSpvNF5MP6t0" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik1QUEcwUCI.K0PM3GJNAx56_8HeCEWM2XwtrVjAnUpGSpvNF5MP6t0</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 12:07:07'),
(12, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ikc3NDVRTCI.WcjR0585kaheSr-fkzy-FekSeytE8k7Nq5GtwUWF4ls" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ikc3NDVRTCI.WcjR0585kaheSr-fkzy-FekSeytE8k7Nq5GtwUWF4ls</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 13:36:17'),
(13, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/mycompany/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkZORVhYTCI.LvVzD_eWopqtn6JYMMmgAEQFjudtobR-f8T-Qpdif9I" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/mycompany/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkZORVhYTCI.LvVzD_eWopqtn6JYMMmgAEQFjudtobR-f8T-Qpdif9I" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 14:12:45'),
(14, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/mycompany/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlRTSlg3NyI.Jy3NJGfwtK6N1yYXJlGI0HQjmKh9iLLmSN400MNt6-o" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/mycompany/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlRTSlg3NyI.Jy3NJGfwtK6N1yYXJlGI0HQjmKh9iLLmSN400MNt6-o" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 14:20:31'),
(15, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/mycompany/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjM4RkFHSSI.VPZPCUAaXl0BD6-Mr_rSR3Gl1BPVECqkkfFpGxxlQsg" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/mycompany/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjM4RkFHSSI.VPZPCUAaXl0BD6-Mr_rSR3Gl1BPVECqkkfFpGxxlQsg" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 14:24:31'),
(16, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'vidhi.bathani@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>Vidhi Berzellin<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-30 14:28:29'),
(17, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlpONlI3NiI.kT3nNkOM5xUFzAd9NBhozvwG5b1ZrNWpTHQfJh8wrKk" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlpONlI3NiI.kT3nNkOM5xUFzAd9NBhozvwG5b1ZrNWpTHQfJh8wrKk" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 10:38:50'),
(18, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik42ME1KMiI.nIVx4gfad9hMesQ6hg4eExVbtawUEc_GjzKBkyFY__I" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik42ME1KMiI.nIVx4gfad9hMesQ6hg4eExVbtawUEc_GjzKBkyFY__I" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 10:50:06'),
(19, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVCN1ZMRSI.uhJkicMJX_vZ3R_l-3cTHCjg63AlDSg37wW7araKFWA" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVCN1ZMRSI.uhJkicMJX_vZ3R_l-3cTHCjg63AlDSg37wW7araKFWA" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 10:53:37'),
(20, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirv.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlhHUTBBUyI.-UpHgSfNsEERdUgCHg5vsRNy6WPr7fqQFdHF3y-HIPA" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlhHUTBBUyI.-UpHgSfNsEERdUgCHg5vsRNy6WPr7fqQFdHF3y-HIPA" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 13:51:31'),
(21, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirv.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkdXSks5VCI.VcTGUxsz1KCHMcqOHxxKAxpli_xF3ffPhSE6ozuZYdw" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkdXSks5VCI.VcTGUxsz1KCHMcqOHxxKAxpli_xF3ffPhSE6ozuZYdw" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 13:52:57');
INSERT INTO `tblemaillog` (`EmailLogId`, `TokenId`, `From`, `Cc`, `Bcc`, `To`, `Subject`, `MessageBody`, `CreatedOn`) VALUES
(22, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirv.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjhRNThLNCI.O_hYaUeDRn8oHuRKFk7q5LwvLFdAMXKTFl9MkeVjX74" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjhRNThLNCI.O_hYaUeDRn8oHuRKFk7q5LwvLFdAMXKTFl9MkeVjX74" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 13:55:21'),
(23, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirv.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ilc0VE5LOSI.siDh8qkz3e7xihCVl1xH8qFxZYvea0P0uyBSUMfSIR4" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ilc0VE5LOSI.siDh8qkz3e7xihCVl1xH8qFxZYvea0P0uyBSUMfSIR4" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-08-31 13:56:10'),
(24, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', '- Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for </p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkdNVVdDSiI.AfJnfuCNBWf7iCYBz50H6ZiDd8EytuRfBEjIrujgL1M" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkdNVVdDSiI.AfJnfuCNBWf7iCYBz50H6ZiDd8EytuRfBEjIrujgL1M" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:06:21'),
(25, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', '- Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for </p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Iks2WVY4QSI.GL1Cxf6Kgai5q7LUKMIPlm_Qq6xlBNFLuOqCYtjwV50" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Iks2WVY4QSI.GL1Cxf6Kgai5q7LUKMIPlm_Qq6xlBNFLuOqCYtjwV50" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:27:17'),
(26, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjZCQlE4QSI.HXMRF3FKVZ5xNd9MY2iVwSUeT8d-WWtUzK_T9W8Fc8Y" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200//user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjZCQlE4QSI.HXMRF3FKVZ5xNd9MY2iVwSUeT8d-WWtUzK_T9W8Fc8Y" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:39:57'),
(27, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjhIWDRGRSI.NHMdg214rtMlF7_OFH68ew90exu61cNpZLdYgXCZK3s" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjhIWDRGRSI.NHMdg214rtMlF7_OFH68ew90exu61cNpZLdYgXCZK3s" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:41:47'),
(28, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkE5NFNONSI.Z2jeDocI8Ai4iCPLYEiq2Km1FElqpr96RYJGS6U92KM" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkE5NFNONSI.Z2jeDocI8Ai4iCPLYEiq2Km1FElqpr96RYJGS6U92KM" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:43:41'),
(29, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkdXWVUwRyI.MQNxF0Tkc7bbTIArhPVMySYto8JrWHTwosio1QsO1qw" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkdXWVUwRyI.MQNxF0Tkc7bbTIArhPVMySYto8JrWHTwosio1QsO1qw" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:46:37'),
(30, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', '- Thank you for registration', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Thank You &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:47:17'),
(31, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjYzOUMyNCI.gC_sadiifGcU987Nk9kLK2MxZQ_MfdiOxSPah20XP_c" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjYzOUMyNCI.gC_sadiifGcU987Nk9kLK2MxZQ_MfdiOxSPah20XP_c" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:50:21'),
(32, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Thank You &ndash; </strong>Nirav Developer<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:51:00'),
(33, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlNUUlE3NCI.cSWE98vJ3CBw7rC4rrwH1Cqt7IsN56ZKSoj9_YpXafE" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlNUUlE3NCI.cSWE98vJ3CBw7rC4rrwH1Cqt7IsN56ZKSoj9_YpXafE" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 06:55:16'),
(34, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjREWllWOSI.S-UNp0aPCpClN24t2ZorSjP1YurNeqeFkiMLh9CenLQ" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjREWllWOSI.S-UNp0aPCpClN24t2ZorSjP1YurNeqeFkiMLh9CenLQ" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 07:11:53'),
(35, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 07:13:37'),
(36, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IllOVjhNMCI.ufIollphrEn_ghU8Xi_MczVWpGXquP0EgjeiAxXngl8" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IllOVjhNMCI.ufIollphrEn_ghU8Xi_MczVWpGXquP0EgjeiAxXngl8" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 07:14:44'),
(37, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 07:19:25'),
(38, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/oOpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjIwMzVLQiI.hq0gwM9HiomfYQWn2jJPhqPzYBwNKe676FznyZ3otA8" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/oOpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjIwMzVLQiI.hq0gwM9HiomfYQWn2jJPhqPzYBwNKe676FznyZ3otA8" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 07:26:17'),
(39, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 07:27:45'),
(40, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'dvdv@dvgvb.fbvgn', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ikw0NVo2RSI.CP4Ol-SgO5c_k1zvSt4TJdKokRfLHPrZXu1djD9l3Ns" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ikw0NVo2RSI.CP4Ol-SgO5c_k1zvSt4TJdKokRfLHPrZXu1djD9l3Ns" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:01:07'),
(41, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlFYVURTRyI.va7eOLV0FKoclBmihqhnX9Fg-_-VW02dvAiBgs4mEQ8" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlFYVURTRyI.va7eOLV0FKoclBmihqhnX9Fg-_-VW02dvAiBgs4mEQ8" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:08:31'),
(42, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'fvfv@fbgvb.fbvb', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlU3R04yUSI.gHUKArrgPHcmwluXFCqzBSbp9MdE3vuJHWDoD7IvY10" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlU3R04yUSI.gHUKArrgPHcmwluXFCqzBSbp9MdE3vuJHWDoD7IvY10" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:10:10');
INSERT INTO `tblemaillog` (`EmailLogId`, `TokenId`, `From`, `Cc`, `Bcc`, `To`, `Subject`, `MessageBody`, `CreatedOn`) VALUES
(43, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'dvdv@rhgh.gnhn', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkVQOURCQiI.2nY3bviiDLBjdxEl8VF48FJZABPjL5TGoqHl8rhTbyo" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkVQOURCQiI.2nY3bviiDLBjdxEl8VF48FJZABPjL5TGoqHl8rhTbyo" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:12:54'),
(44, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'scd@fnhbm.gnb', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlBHSFozVyI.ixsgFgb8URXPN3ie2bhSttDW6WAhORcwpipkcxMGr6A" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlBHSFozVyI.ixsgFgb8URXPN3ie2bhSttDW6WAhORcwpipkcxMGr6A" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:14:10'),
(45, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhYMzVOTSI.3dXdOYYpTNWjTYte7G0BBvSwaik7JwoN_cJYFoEZ96Y" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhYMzVOTSI.3dXdOYYpTNWjTYte7G0BBvSwaik7JwoN_cJYFoEZ96Y" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:15:43'),
(46, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Thank you for registration', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Thank You &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:18:17'),
(47, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE3TUgyMCI.CbFpBHlfrQ1uwqtMv9NNVo3WAYOqp3miw-XxRVYVit4" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE3TUgyMCI.CbFpBHlfrQ1uwqtMv9NNVo3WAYOqp3miw-XxRVYVit4" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:34:03'),
(48, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', '', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlE2QjFYTyI.ERgG8UYTsUKTVBuieB07ubXVozU93HcsDfLQPgek3lc" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlE2QjFYTyI.ERgG8UYTsUKTVBuieB07ubXVozU93HcsDfLQPgek3lc" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:35:42'),
(49, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkZZSEdOWCI.XiUsYt6rtkwhnj-LvBlcxyDRei9KhQvbySds9_5xjWc" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkZZSEdOWCI.XiUsYt6rtkwhnj-LvBlcxyDRei9KhQvbySds9_5xjWc" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:40:30'),
(50, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE4NkpUSyI.ddA3D3VcFn7_QQJgFWZX8c5jOm_EEst8RFQBOcXPKaw" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjE4NkpUSyI.ddA3D3VcFn7_QQJgFWZX8c5jOm_EEst8RFQBOcXPKaw" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:41:15'),
(51, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkIxSVJYMyI.3djRMt8a3rpHdCapG94mA5jzDOL-kWBf3Sc8ufJ17vQ" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkIxSVJYMyI.3djRMt8a3rpHdCapG94mA5jzDOL-kWBf3Sc8ufJ17vQ" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:48:23'),
(52, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlNTRFZNUiI.LGopYPLecQf0rtKMB2X67VFr7AhY2HuuAiPTNHK-ZsU" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlNTRFZNUiI.LGopYPLecQf0rtKMB2X67VFr7AhY2HuuAiPTNHK-ZsU" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:48:46'),
(53, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik1aQlNZNCI.vOqFPEou00LXA0NFWQ1AUNxfkYslgBVgY6DPf0lWZwA" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik1aQlNZNCI.vOqFPEou00LXA0NFWQ1AUNxfkYslgBVgY6DPf0lWZwA" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:50:51'),
(54, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkRJRzlaWCI.c7n8G27OzudtuKvwB_zmWmp6B_LJmhFD-QZiY1w7v-Y" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkRJRzlaWCI.c7n8G27OzudtuKvwB_zmWmp6B_LJmhFD-QZiY1w7v-Y" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:51:53'),
(55, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik1DMU1WOSI.Eme1PkqUQqRX1WmnxkK6Uln-AoCD0smUMM0yXNMJtX0" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ik1DMU1WOSI.Eme1PkqUQqRX1WmnxkK6Uln-AoCD0smUMM0yXNMJtX0" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:53:44'),
(56, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhPMlNSWSI.IO8h4qR9XRPoZxz4lgiqZuKmNjPazqOHHwbsjW3JCuU" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhPMlNSWSI.IO8h4qR9XRPoZxz4lgiqZuKmNjPazqOHHwbsjW3JCuU" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:54:35'),
(57, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlVRQ1UzRyI.puU3sa1FypuIPGSl0bube6GfOx-TI7dwjRIKt5gkYGs" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlVRQ1UzRyI.puU3sa1FypuIPGSl0bube6GfOx-TI7dwjRIKt5gkYGs" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 10:55:59'),
(58, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IktZT0NIViI.r9CILwbY-09QaK-nN-aMtuuXXx5eLNHXfT9Kn7nas7M" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IktZT0NIViI.r9CILwbY-09QaK-nN-aMtuuXXx5eLNHXfT9Kn7nas7M" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:06:31'),
(59, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjZHQkRIUCI.ADHxx6GD9-J2MtgoUgNBNp_wV3gU_du47H38zxK28_Q" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjZHQkRIUCI.ADHxx6GD9-J2MtgoUgNBNp_wV3gU_du47H38zxK28_Q" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:07:37'),
(60, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkxJRzQ4MCI.QhbPuLnfNqZY-EE1yEXDa-ijuXnUwiIOuvy3fIQ2FhY" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkxJRzQ4MCI.QhbPuLnfNqZY-EE1yEXDa-ijuXnUwiIOuvy3fIQ2FhY" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:09:37'),
(61, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for Learn Feedback</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkNURDkxRCI.z6gY-0ftr2aKOAknOXs6ROn4WTkDWaIRVUpN0RgPs_A" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkNURDkxRCI.z6gY-0ftr2aKOAknOXs6ROn4WTkDWaIRVUpN0RgPs_A" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:10:11'),
(62, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlE2RUNOQiI.PHsZ0o9k4JDeJzOpElIHO3Yy2-wyRTT7sNeGdunBk2k" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IlE2RUNOQiI.PHsZ0o9k4JDeJzOpElIHO3Yy2-wyRTT7sNeGdunBk2k" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:11:48'),
(63, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IldYUE9UUiI.ChBBZNaG60NU2-kc1rqDYRZds-cPM9SeFRKKBxcLkfM" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IldYUE9UUiI.ChBBZNaG60NU2-kc1rqDYRZds-cPM9SeFRKKBxcLkfM" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:12:11');
INSERT INTO `tblemaillog` (`EmailLogId`, `TokenId`, `From`, `Cc`, `Bcc`, `To`, `Subject`, `MessageBody`, `CreatedOn`) VALUES
(64, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'miv solutions - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for miv solutions</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkFISFY1SiI.H59B-VteYdw_juAJ8---Z8C3ji-wDcd-rzjF51Q5tgs" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/miv/user-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkFISFY1SiI.H59B-VteYdw_juAJ8---Z8C3ji-wDcd-rzjF51Q5tgs" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 11:12:59'),
(65, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhMWlQ1VSI.OxUPUj5fufMOkCebfzPV9L3pPd-5raiMTfAyGvsbZig" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/OpenEyes/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhMWlQ1VSI.OxUPUj5fufMOkCebfzPV9L3pPd-5raiMTfAyGvsbZig" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 12:31:49'),
(66, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 12:35:36'),
(67, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/open/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVINEszRyI.zcGauotKtgYpvwkoanOtuyHsfp8SYOk7lxTSlbB9qG8" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/open/client-registration/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVINEszRyI.zcGauotKtgYpvwkoanOtuyHsfp8SYOk7lxTSlbB9qG8" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 13:14:20'),
(68, 0, 'no-replylfb@uatbyopeneyes.com', '', '', 'nirav.patel@theopeneyes.in', 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>Nirav Patel<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="http://localhost:4200/login/" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="http://localhost:4200/login/" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2018-09-04 13:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblemailtemplate`
--

CREATE TABLE `tblemailtemplate` (
  `EmailId` int(11) NOT NULL,
  `TokenId` int(11) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `EmailBody` text NOT NULL,
  `To` varchar(100) NOT NULL,
  `Cc` varchar(100) NOT NULL,
  `Bcc` varchar(100) NOT NULL,
  `BccEmail` varchar(1000) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemailtemplate`
--

INSERT INTO `tblemailtemplate` (`EmailId`, `TokenId`, `Subject`, `EmailBody`, `To`, `Cc`, `Bcc`, `BccEmail`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(3, 2, 'Learn Feedback - Password has been Changed', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Password Changed!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">Your new password has been set.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to access your account:</p>\n			<a href="{login_url}" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Login to Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If the changes described above are accurate, no further action is needed. If anything doesn&#39;t look right, follow the link below to make changes: <a href="{reset_url}">Restore password</a></p>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{login_url}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 1, '2018-07-27 06:06:26', 1, '2018-08-30 13:30:41'),
(5, 4, 'Learn Feedback - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="Learn Feedback" src="/assets/images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To join the Learn Feedback.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="{action_url}" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{action_url}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 1, '2018-08-03 09:45:44', 1, '2018-08-30 13:32:09'),
(6, 6, 'Learn Feedback - Thank you for registration', '<p>&nbsp;</p>\n\n<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong><span style="font-size:18.0pt"><span style="line-height:107%"><span style="font-family:&quot;Meiryo UI&quot;,&quot;sans-serif&quot;">Thank You </span></span></span> &ndash; </strong>{ First Name } { Last Name }<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="{login_link}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{login_link}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 1, '2018-08-03 13:16:33', 1, '2018-08-30 13:32:55'),
(7, 7, '{company_name} - Thank you for registration', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Thank You &ndash; </strong>{ First Name } { Last Name }<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">We&rsquo;re so happy you&rsquo;ve joined us.</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="{login_link}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Get Started</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{login_link}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 1, '2018-08-03 13:21:48', 1, '2018-08-30 13:33:35'),
(8, 5, '{company_name} - Invitation', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>You&rsquo;re Invited</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">To give feedback for {company_name}</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="{action_url}" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Set up Account</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them. Alternatively, feel free to contact our customer success team anytime.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{action_url}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 1, '2018-08-03 13:56:56', 1, '2018-08-30 13:34:23'),
(9, 6, '{company_name} - Completed the registration', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Registration &ndash; </strong>{ First Name } { Last Name }<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">The below Client completed their registration:</p>\n\n			<table style="margin:20px 0; width:100%">\n				<tbody>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Name</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ First Name } { Last Name }</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Email Address</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ Email }</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Company</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{company_name}</td>\n					</tr>\n				</tbody>\n			</table>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="{login_url}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">View Profile</a>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{login_url}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '2', '', '', '', b'1', 1, '2018-08-08 09:24:21', 1, '2018-09-04 08:18:05'),
(10, 7, '{full_name} - Completed the registration', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Registration &ndash; </strong>{ First Name } { Last Name }<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">The below User completed their registration:</p>\n\n			<table style="margin:20px 0; width:100%">\n				<tbody>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Name</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ First Name }&nbsp;{ Last Name }</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Email Address</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ Email }</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Phone</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ Phone Number }</td>\n					</tr>\n				</tbody>\n			</table>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to set up your account and get started:</p>\n			<a href="{login_url}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">View Profile</a>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{login_url}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '3', '', '', '', b'1', 1, '2018-08-08 09:37:48', 1, '2018-09-04 08:17:25'),
(11, 3, 'Learn Feedback - Password Reset Request', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center"><img alt="" src="images/forgot.png" style="margin-bottom:15px; width:100px" />\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>FORGOT</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">YOUR PASSWORD?</p>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Not to worry, we got you! Let&rsquo;s get you a new password.</p>\n			<a href="{ link }" style="background: #B11016; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">Reset Password</a>\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you did not request a password reset, please ignore this email.</p>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{ link }" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 53, '2018-08-29 08:09:21', 1, '2018-08-30 13:36:59'),
(12, 10, '{company_name}  - Thank you for give Feedback', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Thank You!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">Thank you for providing your feedback. We appreciate the time you have taken and will actively use it to improve our services to you.</p>\n			&nbsp;\n\n			<p style="color:#777; font-size: 14px; line-height:20px; padding: 0; margin: 0 0 25px;">If you have any questions, you can reply to this email and it will go right to them.</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '4', '', '', '', b'1', 53, '2018-08-29 08:59:37', 1, '2018-08-30 13:41:52'),
(13, 10, 'Feedback Completed', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Feedback Complete &ndash; </strong>{ First Name }&nbsp;{ Last Name }&nbsp;<strong>!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">The below User completed feedback:</p>\n\n			<table style="margin:20px 0; width:100%">\n				<tbody>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Name</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ First Name }&nbsp;{ Last Name }</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Email Address</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ Email }</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Phone</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{ Phone Number }</td>\n					</tr>\n				</tbody>\n			</table>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to view their more information:</p>\n			<a href="{login_url}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">View more</a>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="{login_url}" style="cursor:pointer;">click here</a></p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '3', '', '', '', b'1', 53, '2018-08-29 09:00:12', 1, '2018-08-30 13:38:03'),
(14, 8, '{Client Name} - Inquire Generate', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Inquire &ndash; {Client Name}!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">The below Client generate Inquire:</p>\n\n			<table style="margin:20px 0; width:100%">\n				<tbody>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Name</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{Client Name}</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Email Address</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{Client Email}</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Phone</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{Client Phone}</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Description</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{Description}</td>\n					</tr>\n				</tbody>\n			</table>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to view their more information:</p>\n			<a href="{login_url}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">View more</a>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. {login_url}</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '1', '', '', '', b'1', 53, '2018-08-29 09:01:10', 1, '2018-08-29 12:28:01'),
(15, 9, '{User Name} - Inquire Generate', '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">\n	<tbody>\n		<tr>\n			<td style="background-color:#f3f3f3; background:#f3f3f3; border-bottom:1px solid #333333; padding:10px 10px 5px 10px"><img alt="" src="images/template_logo.png" /></td>\n		</tr>\n		<tr>\n			<td style="padding:20px 10px 10px 10px; text-align:center">\n			<p style="color:#000; font-size: 25px; line-height: 25px; font-weight: bold;padding: 0; margin: 0 0 10px;"><strong>Inquire &ndash; {User Name}!</strong></p>\n\n			<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">The below User generate Inquire:</p>\n\n			<table style="margin:20px 0; width:100%">\n				<tbody>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Name</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{User Name}</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Email Address</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{User Email}</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Phone</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{User Phone}</td>\n					</tr>\n					<tr>\n						<td style="padding:5px; text-align:right; width:35%">Description</td>\n						<td style="padding:5px; text-align:center; width:4%">:</td>\n						<td style="padding:5px; text-align:left; width:48%">{Description}</td>\n					</tr>\n				</tbody>\n			</table>\n\n			<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin: 0 0;">Use the button below to view their more information:</p>\n			<a href="{login_url}" style="background: #222; border-radius:4px; color: #fff; font-size: 14px; border: 0; padding: 10px; line-height: 13px; opacity: 1; text-decoration: none; clear: both; display: inline-block; margin:25px 0;">View more</a>\n\n			<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. {login_url}</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="background-color:#222222; background:#222222; border-top:1px solid #cccccc; color:#ffffff; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2018 Assessment, Education, and Research Experts</td>\n		</tr>\n	</tbody>\n</table>', '3', '', '', '', b'1', 53, '2018-08-29 09:02:01', 1, '2018-08-29 12:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblerrorlog`
--

CREATE TABLE `tblerrorlog` (
  `id` int(11) NOT NULL,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) NOT NULL,
  `errstr` text NOT NULL,
  `errfile` varchar(255) NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblinquiry`
--

CREATE TABLE `tblinquiry` (
  `InquiryId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `Message` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinquiry`
--

INSERT INTO `tblinquiry` (`InquiryId`, `Name`, `Email`, `PhoneNumber`, `Message`, `CreatedBy`, `CreatedOn`) VALUES
(1, 'OpenEyes Technologies', 'uttampatel222@gmail.com', '1234567890', 'swfcdcfdcf', 53, '2018-08-31 14:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblloginlog`
--

CREATE TABLE `tblloginlog` (
  `LoginLogId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `LoginType` int(1) NOT NULL,
  `UserAgent` varchar(200) NOT NULL,
  `IPAddress` varchar(50) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblloginlog`
--

INSERT INTO `tblloginlog` (`LoginLogId`, `UserId`, `LoginType`, `UserAgent`, `IPAddress`, `CreatedOn`) VALUES
(1, 1, 1, '', '', '2018-08-28 14:16:00'),
(2, 58, 0, '', '', '2018-08-29 13:00:53'),
(3, 58, 1, '', '', '2018-08-29 13:01:08'),
(4, 58, 0, '', '', '2018-08-29 13:02:26'),
(5, 58, 1, '', '', '2018-08-29 13:10:35'),
(6, 58, 0, '', '', '2018-08-29 13:16:44'),
(7, 58, 1, '', '', '2018-08-29 13:18:03'),
(8, 58, 0, '', '', '2018-08-29 13:24:12'),
(9, 58, 1, '', '', '2018-08-29 13:24:22'),
(10, 58, 0, '', '', '2018-08-29 13:24:54'),
(11, 58, 1, '', '', '2018-08-29 13:25:27'),
(12, 1, 0, '', '', '2018-08-29 13:58:20'),
(13, 53, 1, '', '', '2018-08-29 13:58:41'),
(14, 53, 0, '', '', '2018-08-29 14:01:22'),
(15, 58, 1, '', '', '2018-08-29 14:01:33'),
(16, 58, 0, '', '', '2018-08-29 14:02:00'),
(17, 58, 1, '', '', '2018-08-29 14:02:27'),
(18, 58, 0, '', '', '2018-08-29 14:15:46'),
(19, 58, 1, '', '', '2018-08-29 14:15:58'),
(20, 58, 0, '', '', '2018-08-29 14:23:39'),
(21, 58, 1, '', '', '2018-08-29 14:23:49'),
(22, 58, 0, '', '', '2018-08-29 14:25:18'),
(23, 58, 1, '', '', '2018-08-29 14:25:51'),
(24, 58, 0, '', '', '2018-08-29 14:37:15'),
(25, 58, 1, '', '', '2018-08-29 14:37:30'),
(26, 58, 0, '', '', '2018-08-29 14:46:27'),
(27, 58, 1, '', '', '2018-08-29 14:46:38'),
(28, 58, 0, '', '', '2018-08-29 14:50:41'),
(29, 53, 1, '', '', '2018-08-30 05:57:37'),
(30, 53, 0, '', '', '2018-08-30 06:30:18'),
(31, 1, 1, '', '', '2018-08-30 06:30:53'),
(32, 53, 1, '', '', '2018-08-30 06:37:50'),
(33, 1, 0, '', '', '2018-08-30 07:46:14'),
(34, 6, 1, '', '', '2018-08-30 07:46:29'),
(35, 53, 0, '', '', '2018-08-30 08:46:30'),
(36, 58, 1, '', '', '2018-08-30 08:49:06'),
(37, 6, 0, '', '', '2018-08-30 10:23:35'),
(38, 1, 1, '', '', '2018-08-30 10:24:01'),
(39, 1, 0, '', '', '2018-08-30 14:06:53'),
(40, 53, 1, '', '', '2018-08-30 14:07:05'),
(41, 53, 0, '', '', '2018-08-30 14:08:12'),
(42, 71, 0, '', '', '2018-08-30 14:36:11'),
(43, 58, 1, '', '', '2018-08-30 14:36:44'),
(44, 71, 1, '', '', '2018-08-31 05:45:21'),
(45, 71, 0, '', '', '2018-08-31 05:45:42'),
(46, 58, 1, '', '', '2018-08-31 05:46:20'),
(47, 1, 0, '', '', '2018-08-31 10:17:39'),
(48, 58, 1, '', '', '2018-08-31 10:18:28'),
(49, 58, 0, '', '', '2018-08-31 10:20:22'),
(50, 58, 1, '', '', '2018-08-31 10:20:52'),
(51, 58, 0, '', '', '2018-08-31 10:21:08'),
(52, 58, 1, '', '', '2018-08-31 10:21:30'),
(53, 63, 1, '', '', '2018-08-31 10:28:49'),
(54, 63, 0, '', '', '2018-08-31 10:29:15'),
(55, 71, 1, '', '', '2018-08-31 10:29:36'),
(56, 71, 0, '', '', '2018-08-31 10:37:27'),
(57, 53, 1, '', '', '2018-08-31 10:37:35'),
(58, 53, 0, '', '', '2018-08-31 10:38:28'),
(59, 53, 1, '', '', '2018-08-31 10:38:35'),
(60, 53, 0, '', '', '2018-08-31 10:39:24'),
(61, 6, 0, '', '', '2018-08-31 10:49:40'),
(62, 53, 1, '', '', '2018-08-31 10:49:50'),
(63, 53, 0, '', '', '2018-08-31 11:16:30'),
(64, 1, 1, '', '', '2018-08-31 11:17:37'),
(65, 1, 0, '', '', '2018-08-31 11:26:46'),
(66, 6, 1, '', '', '2018-08-31 11:28:06'),
(67, 1, 1, '', '', '2018-08-31 11:32:37'),
(68, 1, 0, '', '', '2018-08-31 11:32:47'),
(69, 71, 1, '', '', '2018-08-31 11:33:21'),
(70, 71, 0, '', '', '2018-08-31 11:54:15'),
(71, 71, 1, '', '', '2018-08-31 11:54:33'),
(72, 71, 0, '', '', '2018-08-31 13:48:24'),
(73, 63, 1, '', '', '2018-08-31 13:48:31'),
(74, 63, 0, '', '', '2018-08-31 13:49:08'),
(75, 53, 1, '', '', '2018-08-31 13:49:14'),
(76, 53, 0, '', '', '2018-09-04 06:04:15'),
(77, 1, 1, '', '', '2018-09-04 06:05:30'),
(78, 1, 0, '', '', '2018-09-04 06:14:22'),
(79, 6, 1, '', '', '2018-09-04 06:14:42'),
(80, 6, 0, '', '', '2018-09-04 06:16:58'),
(81, 1, 1, '', '', '2018-09-04 06:17:04'),
(82, 1, 0, '', '', '2018-09-04 06:18:44'),
(83, 6, 1, '', '', '2018-09-04 06:18:59'),
(84, 18, 1, '', '', '2018-09-04 06:19:11'),
(85, 6, 0, '', '', '2018-09-04 06:26:40'),
(86, 1, 1, '', '', '2018-09-04 06:26:46'),
(87, 1, 0, '', '', '2018-09-04 06:44:12'),
(88, 18, 0, '', '', '2018-09-04 06:46:16'),
(89, 1, 1, '', '', '2018-09-04 06:46:22'),
(90, 83, 0, '', '', '2018-09-04 06:56:46'),
(91, 1, 0, '', '', '2018-09-04 07:05:17'),
(92, 1, 1, '', '', '2018-09-04 07:11:06'),
(93, 85, 0, '', '', '2018-09-04 07:15:19'),
(94, 86, 0, '', '', '2018-09-04 07:26:50'),
(95, 1, 0, '', '', '2018-09-04 07:35:47'),
(96, 53, 1, '', '', '2018-09-04 07:36:32'),
(97, 53, 0, '', '', '2018-09-04 07:41:38'),
(98, 1, 1, '', '', '2018-09-04 07:42:28'),
(99, 87, 0, '', '', '2018-09-04 09:34:23'),
(100, 53, 1, '', '', '2018-09-04 09:34:33'),
(101, 1, 0, '', '', '2018-09-04 10:12:33'),
(102, 1, 1, '', '', '2018-09-04 10:12:39'),
(103, 1, 0, '', '', '2018-09-04 10:13:49'),
(104, 6, 1, '', '', '2018-09-04 10:13:56'),
(105, 53, 0, '', '', '2018-09-04 10:14:38'),
(106, 6, 0, '', '', '2018-09-04 10:14:42'),
(107, 53, 1, '', '', '2018-09-04 10:15:09'),
(108, 53, 0, '', '', '2018-09-04 10:17:17'),
(109, 1, 1, '', '', '2018-09-04 10:33:21'),
(110, 1, 0, '', '', '2018-09-04 10:33:33'),
(111, 93, 0, '', '', '2018-09-04 10:33:43'),
(112, 53, 1, '', '', '2018-09-04 10:33:51'),
(113, 1, 1, '', '', '2018-09-04 10:40:45'),
(114, 53, 0, '', '', '2018-09-04 12:32:12'),
(115, 99, 0, '', '', '2018-09-04 13:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstconfiguration`
--

CREATE TABLE `tblmstconfiguration` (
  `ConfigurationId` int(11) NOT NULL,
  `Key` varchar(100) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `DisplayText` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `DisplayOrder` int(4) NOT NULL DEFAULT '0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstconfiguration`
--

INSERT INTO `tblmstconfiguration` (`ConfigurationId`, `Key`, `Value`, `DisplayText`, `Description`, `DisplayOrder`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'ContactFrom', 'it@gmail.comqw', '', '', 1, b'1', 1, '2018-07-23 13:38:17', 1, '2018-08-14 13:31:09'),
(2, 'InvitationMsgSuccess', 'Success', '', '', 0, b'1', 1, '2018-07-23 13:40:17', 1, '2018-08-14 13:46:16'),
(3, 'InvitationMsgRevoke', 'Revoke', '', '', 0, b'1', 1, '2018-07-23 13:40:17', 1, '2018-08-14 13:46:16'),
(4, 'InvitationMsgPending', 'Pending', '', '', 0, b'1', 1, '2018-07-23 13:40:17', 1, '2018-08-14 13:46:16'),
(5, 'EmailFrom', 'no-replylfb@uatbyopeneyes.com', '', '', 0, b'1', 1, '2018-07-23 13:40:17', 1, '2018-08-14 13:18:47'),
(6, 'EmailPassword', 'Q_Sow1ZtGZh7', '', '', 0, b'1', 1, '2018-07-23 13:40:17', 1, '2018-08-14 13:18:47'),
(7, 'IsOpenRegister', '1', '', '', 0, b'1', 1, '2018-07-23 13:51:05', 1, '2018-08-14 13:18:34'),
(8, 'DiscountType', 'Percentage', 'Percentage', '% percentage', 2, b'1', 1, '2018-07-25 09:17:17', 1, '2018-07-25 09:19:38'),
(9, 'DiscountType', 'License', 'License', 'LP free desc', 1, b'1', 1, '2018-07-25 09:20:06', 1, '2018-07-25 09:20:06'),
(10, 'DiscountType', 'Price', 'Price', 'fs fdsf', 3, b'1', 1, '2018-07-25 09:20:24', 1, '2018-07-25 09:33:45'),
(13, 'LicenceType', 'Addon', '', 'qeqwe qweqw e', 1, b'1', 1, '2018-07-25 11:56:50', 1, '2018-07-25 12:01:23'),
(14, 'LicenceType', 'sdfsdf', '', 'qeqweqw eqweqwe qwe', 3, b'1', 1, '2018-07-25 11:57:06', 1, '2018-07-25 12:01:32'),
(16, 'LicenceType', 'regular', '', 'sf werw', 5, b'1', 1, '2018-07-25 12:01:57', 71, '2018-08-31 11:52:37'),
(17, 'contactus_address', 'Damascus, MD 20872,  Located only 35 miles away from Washington, DC\nfsdfsdf', '', 'Damascus, MD 20872,  Located only 35 miles away from Washington, DC ', 0, b'1', 1, '2018-07-25 12:01:57', 1, '2018-08-14 13:22:59'),
(18, 'contactus_phoneno', '443-716-8077', '', '', 0, b'1', 1, '2018-07-25 12:01:57', 1, '2018-08-14 13:22:59'),
(19, 'contactus_email', 'info@learnfeedback.comdfgd', '', '', 0, b'1', 1, '2018-07-25 12:01:57', 1, '2018-08-14 13:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstcountry`
--

CREATE TABLE `tblmstcountry` (
  `CountryId` int(11) NOT NULL,
  `CountryName` varchar(100) NOT NULL,
  `CountryAbbreviation` varchar(3) NOT NULL,
  `PhonePrefix` varchar(11) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstcountry`
--

INSERT INTO `tblmstcountry` (`CountryId`, `CountryName`, `CountryAbbreviation`, `PhonePrefix`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'India', 'IN', '+91', b'1', 1, '2018-07-16 10:32:28', 1, '2018-07-16 10:32:28'),
(2, 'USA', 'U', '+1', b'1', 1, '2018-07-16 10:32:43', 1, '2018-07-16 10:32:43'),
(3, 'Canada', 'CA', '+4', b'0', 1, '2018-07-18 06:16:48', 1, '2018-07-18 06:40:43'),
(5, 'Rassia', 'rs', '4234', b'1', 1, '2018-07-18 07:10:54', 71, '2018-08-31 11:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstdiscount`
--

CREATE TABLE `tblmstdiscount` (
  `DiscountId` int(11) NOT NULL,
  `DiscountType` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Value` decimal(12,3) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblmstfeedbackanswer`
--

CREATE TABLE `tblmstfeedbackanswer` (
  `FeedbackAnswerId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Value` int(3) NOT NULL,
  `ReverseValue` int(3) NOT NULL,
  `IsActive` int(1) NOT NULL DEFAULT '1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstfeedbackanswer`
--

INSERT INTO `tblmstfeedbackanswer` (`FeedbackAnswerId`, `Name`, `Value`, `ReverseValue`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Always', 4, 0, 1, 1, '2018-07-23 14:07:02', 1, '2018-08-27 23:33:03'),
(2, 'Frequently', 3, 1, 1, 1, '2018-07-23 14:07:20', 1, '2018-07-23 14:07:20'),
(3, 'Occasionally', 2, 2, 1, 1, '2018-07-23 14:08:28', 1, '2018-07-23 14:10:27'),
(5, 'Rarely', 1, 3, 1, 1, '2018-07-23 14:08:28', 1, '2018-07-23 14:10:27'),
(6, 'Never', 0, 4, 1, 1, '2018-07-23 14:08:28', 1, '2018-07-23 14:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstfeedbackcategory`
--

CREATE TABLE `tblmstfeedbackcategory` (
  `FeedbackCategoryId` int(11) NOT NULL,
  `ParentId` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Description` text NOT NULL,
  `IsReverseAnswer` bit(1) NOT NULL DEFAULT b'0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstfeedbackcategory`
--

INSERT INTO `tblmstfeedbackcategory` (`FeedbackCategoryId`, `ParentId`, `Name`, `Description`, `IsReverseAnswer`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(13, 0, 'Receiving', '', b'0', b'1', 1, '2018-08-24 12:14:50', 1, '2018-08-30 10:47:14'),
(14, 0, 'Delivering', '', b'0', b'1', 1, '2018-08-24 15:16:20', 1, '2018-08-25 00:46:20'),
(15, 14, 'Opportunistic Coaching', 'The individual delivers feedback that includes facts, clear expectations, and a balance of positive and critical feedback. They also provide suggestions for improvement, and allow for a two-way dialogue between giver and receiver.', b'1', b'1', 1, '2018-08-24 15:17:41', 1, '2018-08-27 18:40:24'),
(16, 14, 'Empathetic', 'The individual delivers feedback that takes the receiver\'s situation, experiences, and perspective into consideration. This is expressed in the timing of the feedback, consideration of their workloads, adapting deliverer\'s communication style to theirs, and mitigating the impact of the feedback.', b'1', b'1', 1, '2018-08-24 15:20:24', 1, '2018-08-25 00:50:24'),
(17, 14, 'Progressive', 'The individual finds ways to improve and monitor the feedback they deliver.', b'1', b'1', 1, '2018-08-24 16:54:31', 1, '2018-08-25 02:24:31'),
(18, 14, 'Active Communication', 'The individual delivers feedback that demonstrates attentiveness, active listening, clear communication, and self-assessment in terms of body language and tone.', b'1', b'1', 1, '2018-08-24 16:54:48', 1, '2018-08-25 02:24:48'),
(19, 13, 'Self Regulation', 'The individual receiving feedback uses it effectively to improve performance and manage/adjust their work-related goals. In addition, the individual learns to become aware of their behaviors and manage their emotional reactions when receiving the feedback.', b'1', b'1', 1, '2018-08-24 16:55:29', 1, '2018-08-25 02:25:29'),
(20, 13, 'Reactive', 'The individual has difficulty receiving feedback. They are often surprised, overwhelmed, irritated, and/or resistant to accepting feedback and they actively choose to ignore the feedback and/or not incorporate it readily.', b'1', b'1', 1, '2018-08-24 16:56:02', 1, '2018-08-25 02:30:59'),
(21, 13, 'Contingent', 'The individual receiving feedback will only use the feedback based on contingencies such as who delivers the feedback, what type of feedback it may be, and how quickly it is delivered (e.g., credible source, trusting person, positive vs. constructive, promptly).', b'1', b'1', 1, '2018-08-24 16:56:30', 1, '2018-08-25 02:26:30'),
(22, 13, 'Solicitation', 'The individual receiving feedback seeks out ways to supplement it by other means, such as asking questions to the individual delivering the feedback or others to gain further clarity.', b'1', b'1', 1, '2018-08-24 16:56:52', 1, '2018-08-25 02:26:52'),
(23, 13, 'Evidential', 'The individual receiving the feedback is comfortable contesting the feedback received with facts and/or examples.', b'1', b'0', 1, '2018-08-24 16:57:13', 71, '2018-08-31 11:51:37'),
(24, 0, 'New category', '', b'0', b'1', 64, '2018-08-28 17:52:26', 64, '2018-08-29 03:22:26'),
(25, 0, 'fb', '', b'0', b'1', 53, '2018-08-31 11:01:38', 71, '2018-08-31 11:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstfeedbackquestion`
--

CREATE TABLE `tblmstfeedbackquestion` (
  `FeedbackQuestionId` int(11) NOT NULL,
  `Name` text NOT NULL,
  `FeedbackCategoryId` int(11) NOT NULL,
  `CustomAnswer` bit(1) NOT NULL DEFAULT b'0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstfeedbackquestion`
--

INSERT INTO `tblmstfeedbackquestion` (`FeedbackQuestionId`, `Name`, `FeedbackCategoryId`, `CustomAnswer`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(12, 'I balance critical feedback with positive feedback.', 15, b'0', b'1', 1, '2018-08-24 17:43:02', 1, '2018-08-25 03:13:02'),
(13, 'I monitor the individual\'s reactions', 15, b'0', b'1', 1, '2018-08-24 17:44:26', 1, '2018-08-25 03:24:18'),
(14, 'I frame the feedback in terms of the performance expectations I\'ve set for the individual', 15, b'0', b'1', 1, '2018-08-24 18:19:15', 1, '2018-08-25 03:49:15'),
(15, 'I use factual examples of the individual\'s performance to reinforce the feedback', 15, b'0', b'1', 1, '2018-08-24 18:19:35', 1, '2018-08-25 03:49:35'),
(16, 'I remind the individual of their strengths to reinforce positive feedback', 15, b'0', b'1', 1, '2018-08-24 18:19:51', 1, '2018-08-25 03:49:51'),
(20, 'I provide an opportunity for the individual to ask questions about the feedback', 15, b'0', b'1', 1, '2018-08-24 18:20:53', 1, '2018-08-25 03:50:53'),
(21, 'I consider the individual\'s needs before I schedule a time to deliver the feedback', 16, b'0', b'1', 1, '2018-08-24 18:21:51', 1, '2018-08-25 03:51:51'),
(28, 'I provide sources of external support (e g , training, coaching, peer assistance, mentoring) to assist in the individual\'s improvement', 17, b'0', b'1', 1, '2018-08-24 18:23:40', 1, '2018-08-25 03:53:40'),
(29, 'I encourage the individual to solicit opinions and help from others who can help her/him improve', 17, b'0', b'1', 1, '2018-08-24 18:23:51', 1, '2018-08-25 03:53:51'),
(35, 'I listen attentively to the individual\'s responses', 18, b'0', b'1', 1, '2018-08-24 18:25:12', 1, '2018-08-25 03:55:12'),
(43, 'I am able to listen to constructive feedback', 19, b'0', b'1', 1, '2018-08-27 09:07:40', 1, '2018-08-27 18:37:40'),
(44, 'I actively listen', 19, b'0', b'1', 1, '2018-08-27 09:08:02', 1, '2018-08-27 18:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstlicensepack`
--

CREATE TABLE `tblmstlicensepack` (
  `LicensePackId` int(11) NOT NULL,
  `LicensePackType` int(11) NOT NULL,
  `DiscountId` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Description` text NOT NULL,
  `NoOfLicense` int(11) NOT NULL,
  `Price` decimal(12,2) NOT NULL,
  `Validity` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstlicensepack`
--

INSERT INTO `tblmstlicensepack` (`LicensePackId`, `LicensePackType`, `DiscountId`, `Name`, `Description`, `NoOfLicense`, `Price`, `Validity`, `StartDate`, `EndDate`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 14, 0, 'ss', 'fvfbf', 22, '234.00', 222, NULL, NULL, b'1', 71, '2018-08-31 10:30:31', 71, '2018-08-31 10:30:31'),
(2, 14, 0, 'ssgsdfs', 'ccc', 22, '234.00', 22, NULL, NULL, b'1', 53, '2018-08-31 10:37:52', 53, '2018-08-31 10:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstplaceholder`
--

CREATE TABLE `tblmstplaceholder` (
  `PlaceholderId` int(11) NOT NULL,
  `PlaceholderName` varchar(100) NOT NULL,
  `ColumnId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstplaceholder`
--

INSERT INTO `tblmstplaceholder` (`PlaceholderId`, `PlaceholderName`, `ColumnId`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'First Name', 1, b'1', 1, '2018-07-19 07:20:34', 1, '2018-07-19 07:20:59'),
(3, 'Last Name', 2, b'1', 1, '2018-07-27 05:58:25', 1, '2018-07-27 05:58:25'),
(4, 'Email', 3, b'1', 1, '2018-07-27 05:58:46', 1, '2018-07-27 05:58:46'),
(6, 'Phone Number', 10, b'1', 1, '2018-07-27 05:58:46', 1, '2018-07-27 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstscreen`
--

CREATE TABLE `tblmstscreen` (
  `ScreenId` int(11) NOT NULL,
  `ParentId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `Icon` varchar(100) NOT NULL,
  `SerialNo` int(2) NOT NULL,
  `SelectedClass` varchar(100) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstscreen`
--

INSERT INTO `tblmstscreen` (`ScreenId`, `ParentId`, `Name`, `DisplayName`, `Url`, `Icon`, `SerialNo`, `SelectedClass`, `IsActive`) VALUES
(1, 28, 'Category', 'Feedback Categories', '/category/list', 'fa fa-comment', 1, 'category', b'1'),
(2, 28, 'Sub-Category', 'Feedback Sub-Categories', '/sub-category/list', 'fa fa-comments', 2, 'subcategory', b'1'),
(3, 28, 'Answer', 'Feedback Answers', '/answer/list', 'fa fa-commenting-o', 4, 'answer', b'1'),
(4, 18, 'Country', 'Countries', '/country/list', 'fa fa-globe', 2, 'country', b'1'),
(5, 18, 'State', 'States', '/state/list', 'fa fa-globe', 3, 'state', b'1'),
(6, 17, 'Placeholder Screen', 'Placeholders', '/placeholder/list', 'fa fa-window-maximize fa-fw', 1, 'placeholder', b'1'),
(7, 17, 'Email Template', 'Email Templates', '/emailtemplate/list', 'fa fa-envelope', 2, 'emailtemplate', b'1'),
(8, 0, 'Roles Permission', 'Roles Permission', '/rolepermission', 'fa fa-user-circle', 6, 'rolepermission', b'1'),
(9, 18, 'Configuration', 'Configurations', '/settings', 'fa fa-cogs fa-fw', 1, 'configuration', b'1'),
(10, 28, 'Question', 'Feedback Questions', '/question/list', 'fa fa-commenting', 3, 'question', b'1'),
(11, 18, 'Discount-type', 'Discount Types', '/discount-type/list', 'fa fa-ticket', 4, 'discounttype', b'1'),
(12, 33, 'Discount', 'Discounts', '/discount/list', 'fa fa-ticket', 5, 'discount', b'1'),
(13, 18, 'Licence-type', 'License Pack Types', '/license-type/list', 'fa fa-id-card', 5, 'lpacktype', b'1'),
(14, 33, 'Licence-pack', 'License Packs', '/license-pack/list', 'fa fa-id-card', 5, 'licensepack', b'1'),
(17, 17, 'Email', 'Email', '', 'fa fa-envelope', 8, 'email', b'0'),
(18, 18, 'Settings', 'General Settings', '', 'fa fa-cogs fa-fw', 7, 'settings', b'0'),
(19, 19, 'manage users', 'Manage Users', '', 'fa fa-users', 4, 'manageusers', b'0'),
(20, 29, 'client-invitelist', 'View all clients', '/client-invitelist', 'fa fa-list-alt', 2, 'clientinvitelist', b'0'),
(21, 21, 'Log', 'Logs', '', 'fa fa-key fa-fw', 9, 'log', b'0'),
(22, 21, 'Login/Logout Log', 'Login/Logout Logs', '/login-log', 'fa fa-key fa-fw', 1, 'loginlog', b'1'),
(23, 21, 'Activity Log', 'Activity Logs', '/activity-log', 'fa fa-key fa-fw', 2, 'activitylog', b'1'),
(24, 21, 'Email Log', 'Email Logs', '/email-log', 'fa fa-envelope', 3, 'emaillog', b'1'),
(25, 31, 'Contact us Inquiries', 'Contact us Inquiries', '/inquiry/list', 'fa fa-comments', 1, 'inquiry', b'1'),
(26, 33, 'purchase-licensepack', 'Purchase License Pack', '/purchase-licensepack', 'fa fa-money', 11, 'purchaselicensepack', b'1'),
(27, 33, 'my-licensepack', 'My License pack', '/my-licensepack', 'fa fa-id-card', 12, 'mylicensepack', b'1'),
(28, 28, 'Manage content', 'Manage content', '', 'fa fa-th-list', 1, 'managecontent', b'0'),
(29, 29, 'Manage clients', 'Manage clients', '', 'fa fa-th-list', 3, 'manageclients', b'0'),
(30, 29, 'Invite client', 'Invite client', '/client-invite', 'fa fa-list-alt', 1, 'inviteclients', b'0'),
(31, 31, 'Reports', 'Reports', '', 'fa fa-bar-chart', 5, 'reports', b'0'),
(33, 33, 'Manage license', 'Manage licenses', '', 'fa fa-th-list', 2, 'managelicense', b'0'),
(34, 31, 'purchase-report', 'Client Purchase Report', '/purchase-report', 'fa fa-bar-chart', 2, 'purchasereport', b'0'),
(35, 33, 'provide-license', 'Provide License Pack', '/provide-license', 'fa fa-id-card', 13, 'providelicense', b'0'),
(36, 31, 'user-feedback-score', 'User Feedback Report', '/user-feedback-score', 'fa fa-bar-chart', 4, 'userfeedbackscore', b'0'),
(37, 19, 'user-invite', 'Invite User', '/user-invite', 'fa fa-list-alt', 1, 'userinvite', b'0'),
(38, 19, 'user-invitelist', 'View all Users', '/user-invitelist', 'fa fa-list-alt', 2, 'userinvitelist', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tblmststate`
--

CREATE TABLE `tblmststate` (
  `StateId` int(11) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `StateName` varchar(100) NOT NULL,
  `StateAbbreviation` varchar(3) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmststate`
--

INSERT INTO `tblmststate` (`StateId`, `CountryId`, `StateName`, `StateAbbreviation`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 1, 'Gujarat', 'Guj', b'1', 1, '2018-07-16 10:33:44', 1, '2018-07-16 10:33:44'),
(2, 1, 'Rajsthan', 'Rj', b'1', 1, '2018-07-16 10:33:44', 1, '2018-07-16 10:33:44'),
(3, 2, 'USA1', 'U1', b'1', 1, '2018-07-16 10:34:15', 1, '2018-07-16 10:34:15'),
(4, 2, 'USA2', 'U2', b'1', 1, '2018-07-16 10:34:15', 71, '2018-08-31 11:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblmsttable`
--

CREATE TABLE `tblmsttable` (
  `TableId` int(11) NOT NULL,
  `TableName` varchar(100) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmsttable`
--

INSERT INTO `tblmsttable` (`TableId`, `TableName`, `DisplayName`, `IsActive`) VALUES
(1, 'tbluser', 'User', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblmsttablecolumn`
--

CREATE TABLE `tblmsttablecolumn` (
  `ColumnId` int(11) NOT NULL,
  `ColumnName` varchar(100) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  `TableId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmsttablecolumn`
--

INSERT INTO `tblmsttablecolumn` (`ColumnId`, `ColumnName`, `DisplayName`, `TableId`, `IsActive`) VALUES
(1, 'FirstName', 'First Name', 1, b'1'),
(2, 'LastName', 'Last Name', 1, b'1'),
(3, 'EmailAddress', 'Email Address', 1, b'1'),
(4, 'Address1', 'Address1', 1, b'1'),
(5, 'Address2', 'Address2', 1, b'1'),
(6, 'CountryName', 'Country', 1, b'1'),
(7, 'StateName', 'State', 1, b'1'),
(8, 'City', 'City', 1, b'1'),
(9, 'ZipCode', 'Zip Code', 1, b'1'),
(10, 'PhoneNumber', 'Phone Number', 1, b'1'),
(11, 'RoleName', 'Role', 1, b'1'),
(12, 'CompanyName', 'Company Name', 1, b'1'),
(13, 'CompanyLogo', 'Company Logo', 1, b'1'),
(14, 'CompanyEmail', 'Company Email', 1, b'1'),
(15, 'Website', 'Company Website', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblmsttoken`
--

CREATE TABLE `tblmsttoken` (
  `TokenId` int(11) NOT NULL,
  `TokenName` text NOT NULL,
  `Description` varchar(300) NOT NULL,
  `DisplayText` varchar(100) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmsttoken`
--

INSERT INTO `tblmsttoken` (`TokenId`, `TokenName`, `Description`, `DisplayText`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(2, 'Change Password', '', 'Change Password', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(3, 'Reset Password', '', 'Reset Password', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(4, 'Client Invitation', '', 'Client Invitation', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(5, 'User Invitation', '', 'User Invitation', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(6, 'Client Registration', '', 'Client Registration', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(7, 'User Registration', '', 'User Registration', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(8, 'Contact Us Client', '', 'Contact Us Client', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(9, 'Contact Us User', '', 'Contact Us User', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00'),
(10, 'User Feedback Complete', '', 'User Feedback Complete', b'1', 0, '2018-08-28 13:00:00', 0, '2018-08-28 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblmstuserrole`
--

CREATE TABLE `tblmstuserrole` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmstuserrole`
--

INSERT INTO `tblmstuserrole` (`RoleId`, `RoleName`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'SuperAdmin', b'1', 1, '2018-07-16 09:01:36', 1, '2018-07-16 09:01:36'),
(2, 'Admin', b'1', 1, '2018-07-16 09:01:36', 1, '2018-07-16 09:01:36'),
(3, 'Client', b'1', 1, '2018-07-16 09:02:01', 1, '2018-07-16 09:02:01'),
(4, 'General User', b'1', 1, '2018-07-16 09:02:01', 1, '2018-07-16 09:02:01'),
(5, 'IT', b'1', 1, '2018-07-16 09:02:11', 1, '2018-07-16 09:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestionanswersoptions`
--

CREATE TABLE `tblquestionanswersoptions` (
  `AnswersOptionId` int(11) NOT NULL,
  `FeedbackQuestionId` int(11) NOT NULL,
  `FeedbackAnswerId` int(11) NOT NULL,
  `DisplayOrder` int(4) NOT NULL DEFAULT '0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblrolespermission`
--

CREATE TABLE `tblrolespermission` (
  `PermissionId` int(11) NOT NULL,
  `ScreenId` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `View` int(1) NOT NULL DEFAULT '1',
  `AddEdit` int(1) NOT NULL DEFAULT '1',
  `Delete` int(1) NOT NULL DEFAULT '1',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrolespermission`
--

INSERT INTO `tblrolespermission` (`PermissionId`, `ScreenId`, `RoleId`, `View`, `AddEdit`, `Delete`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 1, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(2, 2, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(3, 3, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(4, 4, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(5, 5, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(6, 6, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(7, 7, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(9, 9, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(10, 10, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(11, 11, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(12, 12, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(13, 13, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(14, 14, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(15, 17, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(16, 18, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(17, 19, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(18, 20, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(19, 21, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(20, 22, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(21, 23, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(22, 24, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(23, 25, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(26, 28, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(27, 29, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(28, 30, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(29, 31, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(30, 33, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(32, 1, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(33, 2, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(34, 3, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(35, 4, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(36, 5, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(37, 6, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(38, 7, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(39, 8, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(40, 9, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(41, 10, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(42, 11, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(43, 12, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(44, 13, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(45, 14, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(46, 17, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(47, 18, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(48, 19, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(49, 20, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(50, 21, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(51, 22, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(52, 23, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(53, 24, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(54, 25, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(55, 26, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(56, 27, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(57, 28, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(58, 29, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(59, 30, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(60, 31, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(61, 33, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(63, 1, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(64, 2, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(65, 3, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(66, 4, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(67, 5, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(68, 6, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(69, 7, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(71, 9, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(72, 10, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(73, 11, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(74, 12, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(75, 13, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(76, 14, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(77, 17, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(78, 18, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(79, 19, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(80, 20, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(81, 21, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(82, 22, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(83, 23, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(84, 24, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(85, 25, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(88, 28, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(89, 29, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(90, 30, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(91, 31, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(92, 33, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(94, 1, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(95, 2, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(96, 3, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(97, 4, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(98, 5, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(99, 6, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(100, 7, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(102, 9, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(103, 10, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(104, 11, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(105, 12, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(106, 13, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(107, 14, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(108, 17, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(109, 18, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(110, 19, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(112, 21, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(113, 22, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(114, 23, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(115, 24, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(116, 25, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(119, 28, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(120, 29, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(122, 31, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(123, 33, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(124, 34, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(125, 34, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(126, 34, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(127, 35, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(128, 35, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(129, 35, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(130, 36, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(131, 36, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(132, 36, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(133, 36, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:45', 1, '2018-08-28 12:38:45'),
(134, 37, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(135, 37, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(136, 37, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(137, 37, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(138, 38, 5, 1, 1, 1, b'1', 1, '2018-08-28 12:38:17', 1, '2018-08-28 12:38:17'),
(139, 38, 1, 1, 1, 1, b'1', 1, '2018-08-28 12:38:33', 1, '2018-08-28 12:38:33'),
(140, 38, 2, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39'),
(141, 38, 3, 1, 1, 1, b'1', 1, '2018-08-28 12:38:39', 1, '2018-08-28 12:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblsmslog`
--

CREATE TABLE `tblsmslog` (
  `SMSLogId` int(11) NOT NULL,
  `TokenId` int(11) NOT NULL,
  `From` varchar(100) NOT NULL,
  `To` varchar(100) NOT NULL,
  `MessageBody` text NOT NULL,
  `CreatedOn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblsmstemplate`
--

CREATE TABLE `tblsmstemplate` (
  `SMSId` int(11) NOT NULL,
  `TokenId` int(11) NOT NULL,
  `SMSBody` text NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserId` int(11) NOT NULL,
  `ParentId` int(11) NOT NULL DEFAULT '0',
  `RoleId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `EmailAddress` varchar(250) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Address1` varchar(250) NOT NULL,
  `Address2` varchar(250) NOT NULL,
  `StateId` int(11) DEFAULT NULL,
  `City` varchar(100) NOT NULL,
  `ZipCode` varchar(6) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `StatusId` int(11) NOT NULL,
  `InvitationCode` varchar(10) NOT NULL,
  `ResetPasswordCode` varchar(10) NOT NULL,
  `ClientLicenseId` int(11) NOT NULL DEFAULT '0',
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserId`, `ParentId`, `RoleId`, `FirstName`, `LastName`, `EmailAddress`, `Password`, `Address1`, `Address2`, `StateId`, `City`, `ZipCode`, `PhoneNumber`, `StatusId`, `InvitationCode`, `ResetPasswordCode`, `ClientLicenseId`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 0, 5, 'IT', 'Admin', 'it@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Alkapuri', 'road', 2, 'Vadodara', '12340', '23123123', 0, '', '550958', 0, b'1', 1, '2018-08-24 09:44:15', 1, '2018-08-24 09:44:15'),
(6, 0, 1, 'Super', 'Admin', 'mitesh.patel@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'Alkapuri', 'road', 2, 'Vadodara', '12340', '23123123', 0, '', '', 0, b'1', 1, '2018-08-31 11:28:52', 1, '2018-08-31 11:28:52'),
(18, 0, 2, 'Admin', 'Berzellin', 'uttam.bhut@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'fsd fsdfs', 'ewqeqw', 1, 'sd esfsf', '12312', '4234234', 0, '', '', 0, b'1', 16, '2018-07-26 09:41:00', 16, '2018-07-26 09:48:06'),
(20, 0, 3, '', '', 'jaxi.chawda@theopeneyes.in', '', '', '', 2, '', '', '', 1, '3SW6Z7', '', 0, b'1', 1, '2018-07-27 06:15:58', 1, '2018-08-30 11:04:16'),
(53, 0, 3, 'jaxi', 'chawda', 'nirv.patel@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'anand', '', 1, 'baroda', '12345', '1234567890', 0, 'W4TNK9', '', 0, b'1', 53, '2018-08-08 12:48:02', 53, '2018-08-31 13:56:06'),
(58, 53, 4, 'Vidhi', 'Bathani', 'vidhi123.bathani@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'sdf fsdfd', '', 1, 'Vadodara', '12340', '23123123', 0, '', '332608', 0, b'1', 1, '2018-08-24 09:42:58', 53, '2018-08-24 09:42:58'),
(59, 20, 4, 'Vidhi12', 'Bathani', 'vidhi12.bathani@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'sdf fsdfd', '', 1, 'Vadodara', '12340', '23123123', 0, '', '', 0, b'1', 1, '2018-08-15 10:28:33', 53, '2018-08-17 11:06:37'),
(60, 0, 3, '', '', 'jaxi.chawda@theopeneyes.in', '', '', '', 2, '', '', '', 1, '0GX4NE', '', 0, b'1', 1, '2018-07-27 06:15:58', 1, '2018-08-09 07:12:08'),
(61, 53, 4, '', '', 'user@gmail.com', '', '', '', 2, '', '', '', 2, '', '', 0, b'1', 1, '2018-07-27 06:15:58', 1, '2018-08-30 11:13:13'),
(62, 53, 4, '', '', 'vidhi1234.bathani@theopeneyes.in', '', '', '', 2, '', '', '', 1, 'G745QL', '', 0, b'1', 1, '2018-07-26 06:15:58', 1, '2018-08-30 13:36:11'),
(63, 53, 4, 'Vidhi3', 'Bathani3', 'vidhi3.bathani@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'sdf fsdfd', '', 1, 'Vadodara', '12340', '23123123', 0, '', '332608', 0, b'1', 1, '2018-08-24 09:42:58', 53, '2018-08-24 09:42:58'),
(67, 0, 3, 'Vidhi', 'Berzellin', 'vidhi23.bathani@theopeneyes.in', '', '', '', NULL, '', '', '1234567890', 1, 'IW7ISF', '', 0, b'1', 0, '2018-08-30 05:48:31', 1, '2018-08-30 11:48:31'),
(71, 0, 3, 'Vidhi', 'Berzellin', 'vidhi.bathani@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'fsd fsdfs', 'ewqeqw', 1, 'sd esfsf', '12312', '23123123', 0, '', '', 0, b'1', 71, '2018-08-30 14:24:28', 71, '2018-08-30 14:28:24'),
(100, 0, 3, 'Nirav', 'Patel', 'nirav.patel@theopeneyes.in', '25d55ad283aa400af464c76d713c07ad', 'Akota', 'Vadodara', 2, 'Bethesda', '38800', '123467', 0, '', '', 0, b'1', 100, '2018-09-04 13:14:13', 100, '2018-09-04 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserfeedback`
--

CREATE TABLE `tbluserfeedback` (
  `UserFeedbackId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `StartDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EndDateTime` timestamp NULL DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluserfeedback`
--

INSERT INTO `tbluserfeedback` (`UserFeedbackId`, `UserId`, `StartDateTime`, `EndDateTime`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(11, 59, '2018-08-30 14:37:01', '2018-08-30 14:37:01', b'1', 58, '2018-08-29 14:46:45', 58, '2018-08-30 14:37:01'),
(12, 58, '2018-08-31 10:22:26', NULL, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:22:26'),
(13, 63, '2018-08-31 10:28:54', NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserfeedbackanswer`
--

CREATE TABLE `tbluserfeedbackanswer` (
  `AnswerId` int(11) NOT NULL,
  `UserFeedbackId` int(11) NOT NULL,
  `FeedbackQuestionId` int(11) NOT NULL,
  `FeedbackAnswerId` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluserfeedbackanswer`
--

INSERT INTO `tbluserfeedbackanswer` (`AnswerId`, `UserFeedbackId`, `FeedbackQuestionId`, `FeedbackAnswerId`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(166, 11, 35, 6, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 08:50:02'),
(167, 11, 20, 5, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:16:24'),
(168, 11, 14, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:16:25'),
(169, 11, 13, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:16:30'),
(170, 11, 12, 5, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:19:27'),
(171, 11, 15, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:11'),
(172, 11, 28, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:14'),
(173, 11, 44, 5, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:14'),
(174, 11, 43, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:15'),
(175, 11, 29, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:18'),
(176, 11, 21, 3, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:19'),
(177, 11, 16, 2, b'1', 58, '2018-08-29 14:46:46', 58, '2018-08-30 09:59:21'),
(178, 12, 44, 6, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:15'),
(179, 12, 43, 5, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:17'),
(180, 12, 28, 5, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:18'),
(181, 12, 20, 3, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:21'),
(182, 12, 13, 5, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:22'),
(183, 12, 16, 3, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:22'),
(184, 12, 15, 3, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:25'),
(185, 12, 35, 5, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:26'),
(186, 12, 12, 5, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:25:27'),
(187, 12, 21, NULL, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:22:26'),
(188, 12, 29, NULL, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:22:26'),
(189, 12, 14, NULL, b'1', 58, '2018-08-31 10:22:26', 58, '2018-08-31 10:22:26'),
(193, 13, 15, 2, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:58'),
(194, 13, 35, 2, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:59'),
(195, 13, 13, 2, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:59'),
(196, 13, 20, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(197, 13, 43, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(198, 13, 16, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(199, 13, 44, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(200, 13, 12, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(201, 13, 29, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(202, 13, 28, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(203, 13, 14, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54'),
(204, 13, 21, NULL, b'1', 63, '2018-08-31 10:28:54', 63, '2018-08-31 10:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  ADD PRIMARY KEY (`ActivityLogId`);

--
-- Indexes for table `tblcategorywisescore`
--
ALTER TABLE `tblcategorywisescore`
  ADD PRIMARY KEY (`CategoryScoreId`),
  ADD KEY `UserFeedbackId` (`UserFeedbackId`),
  ADD KEY `tblcategorywisescore_ibfk_2` (`FeedbackCategoryId`);

--
-- Indexes for table `tblclientinvoice`
--
ALTER TABLE `tblclientinvoice`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `tblclientinvoice_ibfk_1` (`ClientLicenseId`);

--
-- Indexes for table `tblclientlicense`
--
ALTER TABLE `tblclientlicense`
  ADD PRIMARY KEY (`ClientLicenseId`),
  ADD KEY `tblclientlicense_ibfk_1` (`LicensePackId`),
  ADD KEY `tblclientlicense_ibfk_2` (`UserId`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`CompanyId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `ParentId` (`ParentId`);

--
-- Indexes for table `tblemaillog`
--
ALTER TABLE `tblemaillog`
  ADD PRIMARY KEY (`EmailLogId`);

--
-- Indexes for table `tblemailtemplate`
--
ALTER TABLE `tblemailtemplate`
  ADD PRIMARY KEY (`EmailId`),
  ADD KEY `TokenId` (`TokenId`);

--
-- Indexes for table `tblerrorlog`
--
ALTER TABLE `tblerrorlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinquiry`
--
ALTER TABLE `tblinquiry`
  ADD PRIMARY KEY (`InquiryId`);

--
-- Indexes for table `tblloginlog`
--
ALTER TABLE `tblloginlog`
  ADD PRIMARY KEY (`LoginLogId`);

--
-- Indexes for table `tblmstconfiguration`
--
ALTER TABLE `tblmstconfiguration`
  ADD PRIMARY KEY (`ConfigurationId`);

--
-- Indexes for table `tblmstcountry`
--
ALTER TABLE `tblmstcountry`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `tblmstdiscount`
--
ALTER TABLE `tblmstdiscount`
  ADD PRIMARY KEY (`DiscountId`),
  ADD KEY `DiscountType` (`DiscountType`);

--
-- Indexes for table `tblmstfeedbackanswer`
--
ALTER TABLE `tblmstfeedbackanswer`
  ADD PRIMARY KEY (`FeedbackAnswerId`);

--
-- Indexes for table `tblmstfeedbackcategory`
--
ALTER TABLE `tblmstfeedbackcategory`
  ADD PRIMARY KEY (`FeedbackCategoryId`);

--
-- Indexes for table `tblmstfeedbackquestion`
--
ALTER TABLE `tblmstfeedbackquestion`
  ADD PRIMARY KEY (`FeedbackQuestionId`),
  ADD KEY `FeedbackCategoryId` (`FeedbackCategoryId`);

--
-- Indexes for table `tblmstlicensepack`
--
ALTER TABLE `tblmstlicensepack`
  ADD PRIMARY KEY (`LicensePackId`),
  ADD KEY `LicensePackType` (`LicensePackType`);

--
-- Indexes for table `tblmstplaceholder`
--
ALTER TABLE `tblmstplaceholder`
  ADD PRIMARY KEY (`PlaceholderId`),
  ADD KEY `tblmstplaceholder_ibfk_1` (`ColumnId`);

--
-- Indexes for table `tblmstscreen`
--
ALTER TABLE `tblmstscreen`
  ADD PRIMARY KEY (`ScreenId`);

--
-- Indexes for table `tblmststate`
--
ALTER TABLE `tblmststate`
  ADD PRIMARY KEY (`StateId`),
  ADD KEY `Countryd` (`CountryId`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- Indexes for table `tblmsttable`
--
ALTER TABLE `tblmsttable`
  ADD PRIMARY KEY (`TableId`);

--
-- Indexes for table `tblmsttablecolumn`
--
ALTER TABLE `tblmsttablecolumn`
  ADD PRIMARY KEY (`ColumnId`),
  ADD KEY `TableId` (`TableId`);

--
-- Indexes for table `tblmsttoken`
--
ALTER TABLE `tblmsttoken`
  ADD PRIMARY KEY (`TokenId`);

--
-- Indexes for table `tblmstuserrole`
--
ALTER TABLE `tblmstuserrole`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `tblquestionanswersoptions`
--
ALTER TABLE `tblquestionanswersoptions`
  ADD PRIMARY KEY (`AnswersOptionId`),
  ADD KEY `tblquestionanswersoptions_ibfk_1` (`FeedbackQuestionId`),
  ADD KEY `FeedbackAnswerId` (`FeedbackAnswerId`);

--
-- Indexes for table `tblrolespermission`
--
ALTER TABLE `tblrolespermission`
  ADD PRIMARY KEY (`PermissionId`),
  ADD KEY `RoleId` (`RoleId`),
  ADD KEY `ScreenId` (`ScreenId`);

--
-- Indexes for table `tblsmslog`
--
ALTER TABLE `tblsmslog`
  ADD PRIMARY KEY (`SMSLogId`),
  ADD KEY `TokenId` (`TokenId`);

--
-- Indexes for table `tblsmstemplate`
--
ALTER TABLE `tblsmstemplate`
  ADD PRIMARY KEY (`SMSId`),
  ADD KEY `TokenId` (`TokenId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- Indexes for table `tbluserfeedback`
--
ALTER TABLE `tbluserfeedback`
  ADD PRIMARY KEY (`UserFeedbackId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbluserfeedbackanswer`
--
ALTER TABLE `tbluserfeedbackanswer`
  ADD PRIMARY KEY (`AnswerId`),
  ADD KEY `FeedbackAnswerId` (`FeedbackAnswerId`),
  ADD KEY `FeedbackQuestionId` (`FeedbackQuestionId`),
  ADD KEY `UserFeedbackId` (`UserFeedbackId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  MODIFY `ActivityLogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `tblcategorywisescore`
--
ALTER TABLE `tblcategorywisescore`
  MODIFY `CategoryScoreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblclientinvoice`
--
ALTER TABLE `tblclientinvoice`
  MODIFY `InvoiceId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblclientlicense`
--
ALTER TABLE `tblclientlicense`
  MODIFY `ClientLicenseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `CompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblemaillog`
--
ALTER TABLE `tblemaillog`
  MODIFY `EmailLogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tblemailtemplate`
--
ALTER TABLE `tblemailtemplate`
  MODIFY `EmailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblerrorlog`
--
ALTER TABLE `tblerrorlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblinquiry`
--
ALTER TABLE `tblinquiry`
  MODIFY `InquiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblloginlog`
--
ALTER TABLE `tblloginlog`
  MODIFY `LoginLogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `tblmstconfiguration`
--
ALTER TABLE `tblmstconfiguration`
  MODIFY `ConfigurationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblmstcountry`
--
ALTER TABLE `tblmstcountry`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblmstdiscount`
--
ALTER TABLE `tblmstdiscount`
  MODIFY `DiscountId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmstfeedbackanswer`
--
ALTER TABLE `tblmstfeedbackanswer`
  MODIFY `FeedbackAnswerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblmstfeedbackcategory`
--
ALTER TABLE `tblmstfeedbackcategory`
  MODIFY `FeedbackCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tblmstfeedbackquestion`
--
ALTER TABLE `tblmstfeedbackquestion`
  MODIFY `FeedbackQuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tblmstlicensepack`
--
ALTER TABLE `tblmstlicensepack`
  MODIFY `LicensePackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblmstplaceholder`
--
ALTER TABLE `tblmstplaceholder`
  MODIFY `PlaceholderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblmstscreen`
--
ALTER TABLE `tblmstscreen`
  MODIFY `ScreenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tblmststate`
--
ALTER TABLE `tblmststate`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblmsttable`
--
ALTER TABLE `tblmsttable`
  MODIFY `TableId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblmsttablecolumn`
--
ALTER TABLE `tblmsttablecolumn`
  MODIFY `ColumnId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblmsttoken`
--
ALTER TABLE `tblmsttoken`
  MODIFY `TokenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblmstuserrole`
--
ALTER TABLE `tblmstuserrole`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblquestionanswersoptions`
--
ALTER TABLE `tblquestionanswersoptions`
  MODIFY `AnswersOptionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblrolespermission`
--
ALTER TABLE `tblrolespermission`
  MODIFY `PermissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `tblsmslog`
--
ALTER TABLE `tblsmslog`
  MODIFY `SMSLogId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblsmstemplate`
--
ALTER TABLE `tblsmstemplate`
  MODIFY `SMSId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tbluserfeedback`
--
ALTER TABLE `tbluserfeedback`
  MODIFY `UserFeedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbluserfeedbackanswer`
--
ALTER TABLE `tbluserfeedbackanswer`
  MODIFY `AnswerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcategorywisescore`
--
ALTER TABLE `tblcategorywisescore`
  ADD CONSTRAINT `tblcategorywisescore_ibfk_1` FOREIGN KEY (`UserFeedbackId`) REFERENCES `tbluserfeedback` (`UserFeedbackId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcategorywisescore_ibfk_2` FOREIGN KEY (`FeedbackCategoryId`) REFERENCES `tblmstfeedbackcategory` (`FeedbackCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblclientinvoice`
--
ALTER TABLE `tblclientinvoice`
  ADD CONSTRAINT `tblclientinvoice_ibfk_1` FOREIGN KEY (`ClientLicenseId`) REFERENCES `tblclientlicense` (`ClientLicenseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblclientlicense`
--
ALTER TABLE `tblclientlicense`
  ADD CONSTRAINT `tblclientlicense_ibfk_1` FOREIGN KEY (`LicensePackId`) REFERENCES `tblmstlicensepack` (`LicensePackId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblclientlicense_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `tbluser` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD CONSTRAINT `tblcompany_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbluser` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmstdiscount`
--
ALTER TABLE `tblmstdiscount`
  ADD CONSTRAINT `tblmstdiscount_ibfk_1` FOREIGN KEY (`DiscountType`) REFERENCES `tblmstconfiguration` (`ConfigurationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmstfeedbackquestion`
--
ALTER TABLE `tblmstfeedbackquestion`
  ADD CONSTRAINT `tblmstfeedbackquestion_ibfk_1` FOREIGN KEY (`FeedbackCategoryId`) REFERENCES `tblmstfeedbackcategory` (`FeedbackCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmstlicensepack`
--
ALTER TABLE `tblmstlicensepack`
  ADD CONSTRAINT `tblmstlicensepack_ibfk_1` FOREIGN KEY (`LicensePackType`) REFERENCES `tblmstconfiguration` (`ConfigurationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmstplaceholder`
--
ALTER TABLE `tblmstplaceholder`
  ADD CONSTRAINT `tblmstplaceholder_ibfk_1` FOREIGN KEY (`ColumnId`) REFERENCES `tblmsttablecolumn` (`ColumnId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmststate`
--
ALTER TABLE `tblmststate`
  ADD CONSTRAINT `tblmststate_ibfk_1` FOREIGN KEY (`CountryId`) REFERENCES `tblmstcountry` (`CountryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmsttablecolumn`
--
ALTER TABLE `tblmsttablecolumn`
  ADD CONSTRAINT `tblmsttablecolumn_ibfk_1` FOREIGN KEY (`TableId`) REFERENCES `tblmsttable` (`TableId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblquestionanswersoptions`
--
ALTER TABLE `tblquestionanswersoptions`
  ADD CONSTRAINT `tblquestionanswersoptions_ibfk_1` FOREIGN KEY (`FeedbackQuestionId`) REFERENCES `tblmstfeedbackquestion` (`FeedbackQuestionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblquestionanswersoptions_ibfk_2` FOREIGN KEY (`FeedbackAnswerId`) REFERENCES `tblmstfeedbackanswer` (`FeedbackAnswerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblrolespermission`
--
ALTER TABLE `tblrolespermission`
  ADD CONSTRAINT `tblrolespermission_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `tblmstuserrole` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblrolespermission_ibfk_2` FOREIGN KEY (`ScreenId`) REFERENCES `tblmstscreen` (`ScreenId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsmslog`
--
ALTER TABLE `tblsmslog`
  ADD CONSTRAINT `tblsmslog_ibfk_1` FOREIGN KEY (`TokenId`) REFERENCES `tblmsttoken` (`TokenId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsmstemplate`
--
ALTER TABLE `tblsmstemplate`
  ADD CONSTRAINT `tblsmstemplate_ibfk_1` FOREIGN KEY (`TokenId`) REFERENCES `tblmsttoken` (`TokenId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `tblmstuserrole` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluserfeedback`
--
ALTER TABLE `tbluserfeedback`
  ADD CONSTRAINT `tbluserfeedback_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbluser` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluserfeedbackanswer`
--
ALTER TABLE `tbluserfeedbackanswer`
  ADD CONSTRAINT `tbluserfeedbackanswer_ibfk_2` FOREIGN KEY (`FeedbackQuestionId`) REFERENCES `tblmstfeedbackquestion` (`FeedbackQuestionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbluserfeedbackanswer_ibfk_3` FOREIGN KEY (`UserFeedbackId`) REFERENCES `tbluserfeedback` (`UserFeedbackId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
