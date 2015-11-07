-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2015 at 12:49 PM
-- Server version: 5.6.14
-- PHP Version: 5.4.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CodeIgniter-3.0rc3`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('01ef2565cd7933b8e121c887936a5e4fa4f9ed55', '::1', 1428681731, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638313531373b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('30a63583d7522fbad8ebea27db6a4ac344eff55d', '::1', 1428681416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638313139383b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('366261d100c544fedacac0a4cbf051d0184e5e13', '::1', 1431598057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539383030303b),
('39888e2b74f53f9c65946480e783095137f18ab1', '::1', 1428685972, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638353836303b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('4a488de800a88fc5a5b7a6a114f0cfe8dfbc7624', '::1', 1428684367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638343135373b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('4ee0beb4c9fe3756171897b35a32c2511586bd19', '::1', 1428683598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638333332323b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('54a24415a3d8b3064d25adb26bede797cbbb873e', '::1', 1428685432, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638353136323b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('67b3584865bccd1f3df89b00e8c68e45a5c38058', '::1', 1431584778, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538343737383b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('828d761f06514389f9be37a438a58d38c6e8179b', '::1', 1431584024, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538333933333b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('8bf0619703e2a286a0fd3331e26372ba06b765be', '::1', 1428680266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383637393937383b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('8fbd7948801b6469a80ae3f1ccab027342fa6120', '::1', 1431582907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538323733373b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('9037c16d4b3ebda79dfd46e2f646ca62a8032959', '::1', 1428681188, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638313037313b),
('9c6599d41895d50e207d21bfb9ed5f166e5bae88', '::1', 1428682008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638313832373b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('9d3e3bf1d57a98982fdf49d382bb076fa02e9c81', '::1', 1428682461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638323136333b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('9f004c533caf2725dbf55da85b645c6f6f42567c', '::1', 1428685737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638353533393b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('a9bd38833053791623aa50ed9426f67c2ec7f6e0', '127.0.0.1', 1428682658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638323635383b),
('b037716b459eb43cdcea048cf3a3209999a9453d', '::1', 1428988463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383938383436333b),
('b42d2ec718753c7857a2e7258b43d5dbcadd24ef', '::1', 1428900899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383930303839383b),
('b873b9167154efe4c562e84532fc4ae5eb4c5bc5', '::1', 1428684775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638343439323b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('c58811ad4f2ca741a038d90b3545748d954dc464', '::1', 1429079089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432393037393038393b),
('ce0a8f38d42e53a3d3404267b5ad31e701ed3d29', '::1', 1431587152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538363931303b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('d2d9da6e0d1255e685d07d916eeee98238db8582', '::1', 1429513311, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432393531333330323b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('d675ec44d9834577623781308829eb9d85a82a96', '::1', 1428680596, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638303439303b),
('db10cd7ae757a60e506a6147ff307c64c3b00392', '::1', 1428683294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638333035333b),
('db6b14c7c21b63cedeba830dbe84e1a69e127ad5', '::1', 1429021889, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432393032313838383b),
('dc5cec7cc7db68886d7264b9e7fa479557ed2873', '::1', 1431585113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538353131333b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('dc7771804b350544acb0df997130578d9bf74f68', '::1', 1428683032, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638323930303b),
('de0752a91b4ef135014b4a87d9e03284ae769b5c', '::1', 1428680471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638303238363b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('e116beb0bd03cbb9699985ed293715401ee33b5c', '::1', 1428684027, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638333833373b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('e8ad1dd35b0bfd5e60957391cea088fe302651a9', '::1', 1431583052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538333034353b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('f7d81d1deb615d7878c2ef12f52b353566878a33', '::1', 1429257214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432393235373139343b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('f834376abccdb11686334def4c36ebd3a79c304e', '::1', 1428683045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313432383638323834353b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b),
('fc7097ffb2f6358478db782881455823f3986296', '::1', 1431583855, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538333630333b69647c733a313a2231223b726f6c657c733a313a2231223b656d61696c5f6164647265737c733a31373a226d65406e696b6573687961646176636f6d223b66697273745f6e616d657c733a363a224e696b657368223b6c6173745f6e616d657c733a353a225961646176223b757365725f6e616d657c733a363a226e696b657368223b69735f6c6f676765645f696e7c623a313b636f6d6d6f6e5f63616d706169676e7c4e3b63616d706169676e7c4e3b);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_addres` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2' COMMENT '1=superadmin, 2=dealer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `email_addres`, `user_name`, `pass_word`, `role`) VALUES
(1, 'Nikesh', 'Yadav', 'me@nikeshyadavcom', 'nikesh', 'fcea920f7412b5da7be0cf42b8c93759', 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(250) NOT NULL,
  `alg_ref` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `dts` varchar(100) NOT NULL,
  `next_action` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=no action, 1=create alert',
  `next_alert` varchar(100) NOT NULL,
  `alert_date` date NOT NULL DEFAULT '0000-00-00',
  `manager` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=active,1=deleted',
  `dateofdeleteion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `subject`, `alg_ref`, `date_creation`, `dts`, `next_action`, `next_alert`, `alert_date`, `manager`, `status`, `dateofdeleteion`) VALUES
(1, 'test', 'asdfasdfa', '2015-05-14', 'maintenance', 1, 'n', '2015-05-15', 'nikes', 0, '2015-05-31'),
(2, 'tset2', 'aasdfadsf asdf', '2015-05-15', 'maintenance', 0, '', '0000-00-00', 'ashwani', 0, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
