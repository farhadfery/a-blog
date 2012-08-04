-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2012 at 12:25 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `description`, `image`) VALUES
(6, '<p>sdfsdfsdf</p>', 'IMG_0232.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `summary` text CHARACTER SET utf8 NOT NULL,
  `fulltext` text CHARACTER SET utf8 NOT NULL,
  `section` bigint(20) unsigned NOT NULL,
  `archive` tinyint(4) NOT NULL,
  `delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=61 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `summary`, `fulltext`, `section`, `archive`, `delete`) VALUES
(59, 'تست عنوان1', '<p>12</p>', '<p>تست</p>', 13, 0, 0),
(60, 'تست عنوان', '', '<p>asd</p>', 14, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bann`
--

CREATE TABLE IF NOT EXISTS `bann` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `mass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `title`, `email`, `pass`) VALUES
(1, 'گالری عکس', 'afshin@a-vitrin.ir', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `friend-link`
--

CREATE TABLE IF NOT EXISTS `friend-link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `friend-link`
--

INSERT INTO `friend-link` (`id`, `name`, `link`) VALUES
(1, 'یاهو', 'http://www.yahoo.com'),
(2, 'گوگل', 'http://www.google.com'),
(31, 'آ-ویترین', 'http://www.a-vitrin.ir'),
(32, 'بینگ', 'http://www.bing.com');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image_description` text COLLATE utf8_persian_ci NOT NULL,
  `image_add` text COLLATE utf8_persian_ci NOT NULL,
  `image_section` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `Image_section_id` bigint(20) unsigned NOT NULL,
  `PhotoGrapher` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_name`, `image_description`, `image_add`, `image_section`, `Image_section_id`, `PhotoGrapher`) VALUES
(31, 'دریاچه', 'دریا', 'http://localhost/blog/images/Slider/111s.jpg', 'دریا', 15, 'afshin'),
(32, 'دریاچه', 'بلا', 'http://localhost/blog/images/Slider/111s.jpg', 'طبیعت', 16, 'afshin'),
(33, 'سلام', 'dfghdfg', 'http://localhost/blog/images/upload/1.jpg', '5', 25, 'afshin'),
(34, 'dfgdfg', 'dfgdfg', 'http://localhost/blog/images/Slider/23.jpg', 'دریا', 15, 'afshin'),
(35, 'asdasd', 'asdasd', 'http://mostafakaveh.persiangig.com/Photolive/%D9%85%D8%B9%D9%85%D8%A7%D8%B1%DB%8C/Mostafa_Kaveh_07120000_1.jpg', 'دریا', 15, 'afshin'),
(36, 'حرم مطهر حضرت معصومه (س', 'sdfsdf', 'http://mostafakaveh.persiangig.com/Photolive/%D9%85%D8%B9%D9%85%D8%A7%D8%B1%DB%8C/Mostafa_Kaveh_23071311.JPG', 'دریا', 15, 'afshin');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `UserPass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL,
  `permission` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `UserName`, `UserPass`, `email`, `avatar`, `permission`) VALUES
(12, 'afshin', 'NGNiYTczMGVhMTVmMmM5ZTE1NTUyOGQwNzEwZDc4MzI=', 'afshin@a-vitrin.ir', 'IMG_0232.JPG', 0),
(13, 'mostafa', 'NWNkYzc3MDdlMjI5NTM4MTYxMGRlMDkwYWM1NGExN2E=', 'aa@bb.com', 'afshin1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(4) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `status`) VALUES
(1, 'روزگار غریبیست نازنین', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `news` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news`) VALUES
(1, 'اخبار');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`status`, `message`) VALUES
('on', 'سایت موقتا تعطیل است.');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Sections` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `Sections`) VALUES
(13, 'تبلت'),
(14, 'کامپیوتر'),
(15, 'اخبار');

-- --------------------------------------------------------

--
-- Table structure for table `section-gallery`
--

CREATE TABLE IF NOT EXISTS `section-gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `album_cover` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `section-gallery`
--

INSERT INTO `section-gallery` (`id`, `name`, `album_cover`) VALUES
(15, 'دریا', 'http://localhost/blog/images/Slider/111s.jpg'),
(16, 'طبیعت', 'http://localhost/blog/images/Slider/111s.jpg'),
(17, 'ماشین', 'http://localhost/blog/images/Slider/111s.jpg'),
(18, 'دختر', 'http://localhost/blog/images/Slider/111s.jpg'),
(19, 'پسر', 'http://localhost/blog/images/Slider/111s.jpg'),
(20, '1', 'http://localhost/blog/images/Slider/111s.jpg'),
(21, '2', 'http://localhost/blog/images/Slider/111s.jpg'),
(22, '3', 'http://localhost/blog/images/Slider/111s.jpg'),
(31, 'dfgdfg', 'http://localhost/blog/images/Slider/images.jpg'),
(32, 'dfgdfg', 'http://localhost/blog/images/Slider/23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE IF NOT EXISTS `useronline` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE IF NOT EXISTS `user_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `GalleryId` bigint(20) unsigned NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_comment`
--

INSERT INTO `user_comment` (`id`, `GalleryId`, `subject`, `name`, `email`, `comment`, `answer`, `status`) VALUES
(9, 19, 'سلام!!', 'افشین', 'afshin@a-vitrin.ir', 'تست نظر', '', 1),
(10, 20, 'sssss', 'افشین', 'afshin@a-vitrin.ir', 'تست', '', 1),
(11, 20, 'sssss', 'لللل', 'یبلیبلیبل', 'یبلیبلیبل', '', 1),
(12, 20, 'sssss', 'ع', 'ععع', 'عععع', '', 1),
(13, 20, 'sssss', 'بل', 'یبلیبل', 'یبلیبلیبل', '', 1),
(14, 21, 'عکسی شبیه دریا', 'بلا', 'بلا', 'بلابلا', '', 1),
(15, 32, 'دریاچه', 'sdf', 'sdfsdf', 'sdfsdf', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
