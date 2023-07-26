-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2023 at 06:34 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dabbapac_educationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintesttbls`
--

CREATE TABLE `admintesttbls` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `skillid` bigint UNSIGNED NOT NULL,
  `grade` bigint UNSIGNED NOT NULL,
  `topicid` bigint UNSIGNED NOT NULL,
  `time_dur` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mcq` int NOT NULL,
  `total_marks` int NOT NULL,
  `pass_marks` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admintesttbls`
--

INSERT INTO `admintesttbls` (`id`, `userid`, `skillid`, `grade`, `topicid`, `time_dur`, `total_mcq`, `total_marks`, `pass_marks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '0:05', 2, 2, 2, 1, '2023-06-06 05:08:17', '2023-06-06 05:08:17'),
(2, 2, 1, 1, 2, '0:05', 2, 2, 2, 0, '2023-06-06 05:15:11', '2023-06-06 05:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `allcategorytbls`
--

CREATE TABLE `allcategorytbls` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allcategorytbls`
--

INSERT INTO `allcategorytbls` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Business', '2023-05-15 11:08:57', '2023-05-15 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `announcementtbls`
--

CREATE TABLE `announcementtbls` (
  `id` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `headline` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_date` date NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcementtbls`
--

INSERT INTO `announcementtbls` (`id`, `type`, `headline`, `a_date`, `short_Des`, `long_des`, `image`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'announcement', '2023-10-10', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'null', 'https://www.youtube.com/embed/XTMTBqCZijY', '2023-04-17 07:30:10', '2023-04-17 07:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `answertbls`
--

CREATE TABLE `answertbls` (
  `id` bigint UNSIGNED NOT NULL,
  `quesid` bigint UNSIGNED NOT NULL,
  `optionA` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionB` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionC` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionD` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_opt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answertbls`
--

INSERT INTO `answertbls` (`id`, `quesid`, `optionA`, `optionB`, `optionC`, `optionD`, `correct_opt`, `created_at`, `updated_at`) VALUES
(6, 5, 'a1', 'b1', 'c1', 'd1', 'c1', '2023-05-24 09:48:30', '2023-05-24 09:48:30'),
(5, 6, 'aa', 'bb', 'cc', 'dd', 'bb', '2023-05-24 09:47:51', '2023-05-24 09:47:51'),
(7, 1, 'aa', 'bb', 'cc', 'dd', 'aa', '2023-06-06 05:09:02', '2023-06-06 05:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `articletbls`
--

CREATE TABLE `articletbls` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `headline` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `art_date` date NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attempt_daily_quiz_questions`
--

CREATE TABLE `attempt_daily_quiz_questions` (
  `id` int NOT NULL,
  `daily_quiz_question_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `question_answer` varchar(10) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attempt_daily_quiz_questions`
--

INSERT INTO `attempt_daily_quiz_questions` (`id`, `daily_quiz_question_id`, `user_id`, `question_answer`, `created_at`, `updated_at`) VALUES
(30, 19, 4, 'jhat pat', '2023-05-07 10:09:20.000000', '2023-05-07 10:09:20.000000'),
(31, 19, 4, 'jhat pat', '2023-05-07 10:09:32.000000', '2023-05-07 10:09:32.000000'),
(32, 22, 4, 'karachi', '2023-05-07 10:18:12.000000', '2023-05-07 10:18:12.000000'),
(33, 22, 4, 'karachi', '2023-05-07 10:52:43.000000', '2023-05-07 10:52:43.000000'),
(34, 22, 4, 'karachi', '2023-05-07 10:53:24.000000', '2023-05-07 10:53:24.000000'),
(35, 22, 4, 'karachi', '2023-05-07 10:54:31.000000', '2023-05-07 10:54:31.000000'),
(36, 22, 4, 'karachi', '2023-05-07 10:54:55.000000', '2023-05-07 10:54:55.000000'),
(37, 22, 4, 'karachi', '2023-05-07 11:06:06.000000', '2023-05-07 11:06:06.000000'),
(38, 22, 4, 'karachi', '2023-05-07 12:47:41.000000', '2023-05-07 12:47:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `categorytbls`
--

CREATE TABLE `categorytbls` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorytbls`
--

INSERT INTO `categorytbls` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'English', '2023-05-06 05:51:34', '2023-05-06 05:51:34'),
(2, 'Urdu', '2023-05-06 05:51:44', '2023-05-06 05:51:44'),
(3, 'question 3', '2023-05-06 01:44:55', '2023-05-06 01:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `certificatetbls`
--

CREATE TABLE `certificatetbls` (
  `id` bigint UNSIGNED NOT NULL,
  `certificate_id` bigint NOT NULL,
  `firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuedate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `partdate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificatetbls`
--

INSERT INTO `certificatetbls` (`id`, `certificate_id`, `firstname`, `lastname`, `genre`, `remark`, `issuedate`, `partdate`, `created_at`, `updated_at`) VALUES
(2, 23758, 'MAAAAAA', 'AAAABB', 'Story competition', 'Excellent', '2023-04-17', '2023-04-30', '2023-04-27 06:38:00', '2023-04-27 06:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `cltesttbls`
--

CREATE TABLE `cltesttbls` (
  `id` bigint UNSIGNED NOT NULL,
  `skillid` bigint UNSIGNED NOT NULL,
  `grade` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `selectedoption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectedquestion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalmarks` int NOT NULL,
  `studentmarks` int NOT NULL,
  `totalquestion` int NOT NULL,
  `correctanswer` int NOT NULL,
  `passmarks` int NOT NULL,
  `attemptquestion` int NOT NULL,
  `remarks` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cltesttbls`
--

INSERT INTO `cltesttbls` (`id`, `skillid`, `grade`, `userid`, `selectedoption`, `selectedquestion`, `totalmarks`, `studentmarks`, `totalquestion`, `correctanswer`, `passmarks`, `attemptquestion`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'ii', '3', 4, 2, 2, 1, 2, 1, 'PASS', '2023-05-06 06:03:04', '2023-05-06 06:03:04'),
(2, 1, 1, 2, 'null', 'null', 2, 0, 2, 0, 2, 0, 'FAIL', '2023-07-06 09:09:15', '2023-07-06 09:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `collaborations`
--

CREATE TABLE `collaborations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collaborations`
--

INSERT INTO `collaborations` (`id`, `title`, `long_Des`, `image`, `video_url`, `created_at`, `updated_at`) VALUES
(2, 'title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida felis sed leo posuere, eget feugiat lacus tempus. Curabitur vel cursus nunc, id ultrices eros. In molestie varius rutrum. Aliquam neque est, facilisis vel tincidunt at, eleifend eleifend sapien. Vestibulum congue pulvinar sem pharetra mattis. Fusce tempus sapien id sodales facilisis. Phasellus vulputate arcu id semper tempus. Suspendisse nunc mi, suscipit ac pharetra vitae, dapibus ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam scelerisque nibh id placerat. Nunc venenatis tempus sem, ac elementum leo rhoncus rhoncus. Suspendisse nisl lorem, volutpat non augue eu, ullamcorper convallis lacus. Proin euismod eros at tellus tempor scelerisque. Ut non eros venenatis, semper enim quis, dignissim massa. Proin dui nunc, vulputate et dui eu, sodales bibendum nibh. Maecenas tempus mi vitae bibendum cursus. Morbi iaculis, ligula nec facilisis cursus, mauris massa varius nunc, ac luctus lectus sapien imperdiet est. Curabitur malesuada eleifend lorem, euismod maximus nulla dignissim eget. Mauris fermentum mollis eleifend. Sed eleifend vestibulum eros a bibendum. Suspendisse dignissim mattis dictum. In tempor condimentum lectus, tristique laoreet tortor aliquet at. Mauris tempus mi nisl, maximus convallis eros malesuada non. Nulla a ullamcorper sapien. Morbi interdum convallis ipsum et tristique. Cras posuere, ex non viverra congue, magna enim malesuada odio, ac gravida turpis nibh ac augue. Donec bibendum, libero quis lobortis fringilla, nisi leo vestibulum quam, in dictum dolor mauris eu leo. Cras aliquet nunc vitae tortor mollis pellentesque.</p>', '1378095254.b-3.jpg', 'https://growdigitalcare.com/', '2023-05-02 04:48:45', '2023-05-02 11:38:15'),
(3, 'Title-1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida felis sed leo posuere, eget feugiat lacus tempus. Curabitur vel cursus nunc, id ultrices eros. In molestie varius rutrum. Aliquam neque est, facilisis vel tincidunt at, eleifend eleifend sapien. Vestibulum congue pulvinar sem pharetra mattis. Fusce tempus sapien id sodales facilisis. Phasellus vulputate arcu id semper tempus. Suspendisse nunc mi, suscipit ac pharetra vitae, dapibus ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam scelerisque nibh id placerat. Nunc venenatis tempus sem, ac elementum leo rhoncus rhoncus. Suspendisse nisl lorem, volutpat non augue eu, ullamcorper convallis lacus. Proin euismod eros at tellus tempor scelerisque. Ut non eros venenatis, semper enim quis, dignissim massa. Proin dui nunc, vulputate et dui eu, sodales bibendum nibh. Maecenas tempus mi vitae bibendum cursus. Morbi iaculis, ligula nec facilisis cursus, mauris massa varius nunc, ac luctus lectus sapien imperdiet est. Curabitur malesuada eleifend lorem, euismod maximus nulla dignissim eget. Mauris fermentum mollis eleifend. Sed eleifend vestibulum eros a bibendum. Suspendisse dignissim mattis dictum. In tempor condimentum lectus, tristique laoreet tortor aliquet at. Mauris tempus mi nisl, maximus convallis eros malesuada non. Nulla a ullamcorper sapien. Morbi interdum convallis ipsum et tristique. Cras posuere, ex non viverra congue, magna enim malesuada odio, ac gravida turpis nibh ac augue. Donec bibendum, libero quis lobortis fringilla, nisi leo vestibulum quam, in dictum dolor mauris eu leo. Cras aliquet&nbsp;</p>', '1493615519.tree-736885__480.jpg', 'https://www.youtube.com/watch?v=Ru0_KCLxdT8', '2023-05-02 08:20:23', '2023-05-02 08:20:23'),
(4, 'Title-122', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida felis sed leo posuere, eget feugiat lacus tempus. Curabitur vel cursus nunc, id ultrices eros. In molestie varius rutrum. Aliquam neque est, facilisis vel tincidunt at, eleifend eleifend sapien. Vestibulum congue pulvinar sem pharetra mattis. Fusce tempus sapien id sodales facilisis. Phasellus vulputate arcu id semper tempus. Suspendisse nunc mi, suscipit ac pharetra vitae, dapibus ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam scelerisque nibh id placerat. Nunc venenatis tempus sem, ac elementum leo rhoncus rhoncus. Suspendisse nisl lorem, volutpat non augue eu, ullamcorper convallis lacus. Proin euismod eros at tellus tempor scelerisque. Ut non eros venenatis, semper enim quis, dignissim massa. Proin dui nunc, vulputate et dui eu, sodales bibendum nibh. Maecenas tempus mi vitae bibendum cursus. Morbi iaculis, ligula nec facilisis cursus, mauris massa varius nunc, ac luctus lectus sapien imperdiet est. Curabitur malesuada eleifend lorem, euismod maximus nulla dignissim eget. Mauris fermentum mollis eleifend. Sed eleifend vestibulum eros a bibendum. Suspendisse dignissim mattis dictum. In tempor condimentum lectus, tristique laoreet tortor aliquet at. Mauris tempus mi nisl, maximus convallis eros malesuada non. Nulla a ullamcorper sapien. Morbi interdum convallis ipsum et tristique. Cras posuere, ex non viverra congue, magna enim malesuada odio, ac gravida turpis nibh ac augue. Donec bibendum, libero quis lobortis fringilla, nisi leo vestibulum quam, in dictum dolor mauris eu leo. Cras aliquet&nbsp;</p>', '281367655.photo-1503023345310-bd7c1de61c7d.jpg', 'https://www.youtube.com/watch?v=Ru0_KCLxdT8', '2023-05-02 08:20:54', '2023-05-02 08:20:54'),
(5, 'Title1111', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida felis sed leo posuere, eget feugiat lacus tempus. Curabitur vel cursus nunc, id ultrices eros. In molestie varius rutrum. Aliquam neque est, facilisis vel tincidunt at, eleifend eleifend sapien. Vestibulum congue pulvinar sem pharetra mattis. Fusce tempus sapien id sodales facilisis. Phasellus vulputate arcu id semper tempus. Suspendisse nunc mi, suscipit ac pharetra vitae, dapibus ac massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam scelerisque nibh id placerat. Nunc venenatis tempus sem, ac elementum leo rhoncus rhoncus. Suspendisse nisl lorem, volutpat non augue eu, ullamcorper convallis lacus. Proin euismod eros at tellus tempor scelerisque. Ut non eros venenatis, semper enim quis, dignissim massa. Proin dui nunc, vulputate et dui eu, sodales bibendum nibh. Maecenas tempus mi vitae bibendum cursus. Morbi iaculis, ligula nec facilisis cursus, mauris massa varius nunc, ac luctus lectus sapien imperdiet est. Curabitur malesuada eleifend lorem, euismod maximus nulla dignissim eget. Mauris fermentum mollis eleifend. Sed eleifend vestibulum eros a bibendum. Suspendisse dignissim mattis dictum. In tempor condimentum lectus, tristique laoreet tortor aliquet at. Mauris tempus mi nisl, maximus convallis eros malesuada non. Nulla a ullamcorper sapien. Morbi interdum convallis ipsum et tristique. Cras posuere, ex non viverra congue, magna enim malesuada odio, ac gravida turpis nibh ac augue. Donec bibendum, libero quis lobortis fringilla, nisi leo vestibulum quam, in dictum dolor mauris eu leo. Cras aliquet&nbsp;</p>', '1208677092.user.png', 'https://www.youtube.com/watch?v=Ru0_KCLxdT8', '2023-05-02 08:21:35', '2023-05-02 08:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `contactustbls`
--

CREATE TABLE `contactustbls` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactustbls`
--

INSERT INTO `contactustbls` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Mike Owen', 'mikeexcaps@gmail.com', 85224852532, 'Hi there, \r\n \r\nI have recently conducted an analysis of digitalkidszone.com for onsite errors and discovered that your website presents several issues that require attention. \r\n \r\nRegardless of the product or service you are offering or selling, possessing a site that is inadequately optimized and rife with errors and bugs will not aid in boosting your rankings. \r\n \r\nLet us fix your WordPress website problems today and improve your search engine rankings. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/product/wordpress-seo-audit-and-fix-service/ \r\n \r\n \r\nRegards \r\nMike Owen', '2023-07-06 18:08:37', '2023-07-06 18:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `cstorytbls`
--

CREATE TABLE `cstorytbls` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `Title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typefic` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cstorytbls`
--

INSERT INTO `cstorytbls` (`id`, `userid`, `type`, `Title`, `typefic`, `short_Des`, `long_Des`, `image`, `status`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'story', 'Fiction', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'null', 1, 'https://www.youtube.com/embed/XTMTBqCZijY', '2023-04-17 07:26:53', '2023-04-17 07:39:45'),
(2, 1, 1, 'story2', 'Non-Fiction', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '1419179901.image12.png', 1, 'null', '2023-04-17 07:27:22', '2023-04-17 07:39:50'),
(3, 2, 1, 'story', 'Fiction', '<p>sdsd</p>', '<p>sdsd</p>', 'null', 0, 'https://www.youtube.com/embed/fn8rcrVBtxE', '2023-05-06 06:04:25', '2023-05-06 06:04:25');

-- --------------------------------------------------------



INSERT INTO `daily_quiz_options` (`id`, `daily_quiz_question_id`, `daily_quiz_option`, `correct_option`, `created_at`, `updated_at`) VALUES
(29, 19, '[\"quetta\",\"jhat pat\",\"sibi\",\"khuzdar\"]', 'jhat pat', '2023-05-06 12:14:28.000000', '2023-05-06 23:24:06.000000'),
(30, 20, '[\"lahore\",\"karachi\",\"quetta\",\"islamabad\"]', 'islamabad', '2023-05-06 23:23:01.000000', '2023-05-06 23:23:01.000000'),
(31, 21, '[\"pakistan\",\"india\",\"australlia\",\"bangladesh\"]', 'pakistan', '2023-05-07 01:00:08.000000', '2023-05-07 01:34:48.000000'),
(32, 22, '[\"karachi\",\"hyderabad\",\"jamshoro\",\"dadu\"]', 'karachi', '2023-05-07 01:31:05.000000', '2023-05-07 01:34:20.000000'),
(33, 23, '[\"2\",\"4\",\"6\",\"8\"]', '4', '2023-05-07 01:35:29.000000', '2023-05-07 01:35:29.000000'),
(34, 24, '[\"4\",\"11\",\"12\",\"6\"]', '11', '2023-05-07 12:41:58.000000', '2023-05-07 12:41:58.000000'),
(35, 25, '[\"Outer core\",\"Inner core\",\"Mantle\",\"Lithosphere\"]', 'Lithosphere', '2023-07-06 15:40:09.000000', '2023-07-06 15:40:09.000000'),
(36, 26, '[\"Few kilometers\",\"Few meters\",\"Few centimeters\",\"Few millimeters\"]', 'Few kilometers', '2023-07-06 15:42:33.000000', '2023-07-06 15:42:33.000000'),
(37, 27, '[\"Continental crust\",\"Oceanic crust\",\"Mantle\",\"Outer core\"]', 'Continental crust', '2023-07-06 15:44:59.000000', '2023-07-06 15:44:59.000000'),
(38, 28, '[\"Continental crust\",\"Oceanic crust\",\"Mantle\",\"Outer core\"]', 'Continental crust', '2023-07-06 15:45:04.000000', '2023-07-06 15:45:04.000000');

-- --------------------------------------------------------

--
-- Table structure for table `daily_quiz_questions`
--

CREATE TABLE `daily_quiz_questions` (
  `id` int NOT NULL,
  `question_title` varchar(255) DEFAULT NULL,
  `question_marks` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `daily_quiz_questions`
--

INSERT INTO `daily_quiz_questions` (`id`, `question_title`, `question_marks`, `status`, `created_at`, `updated_at`) VALUES
(19, 'capital of balochistan is', '2', 'new-quiz', '2023-05-06 12:14:28.000000', '2023-05-07 08:00:19.000000'),
(20, 'capital city of pakistan is ?', '2', 'activated', '2023-05-06 23:23:01.000000', '2023-07-09 16:58:01.000000'),
(21, 'no 1 odi cricket team is', '2', 'new-quiz\n', '2023-05-07 01:00:08.000000', '2023-05-07 06:01:38.000000'),
(22, 'capital of sindh is', '2', 'activated', '2023-05-07 01:31:05.000000', '2023-05-07 10:17:52.000000'),
(23, '2+2', '2', '1', '2023-05-07 01:35:29.000000', '2023-05-07 05:59:01.000000'),
(24, '5+6', '2', 'new-quiz', '2023-05-07 12:41:58.000000', '2023-05-07 12:41:58.000000'),
(25, 'Which layer of the Earth is the Earth\'s crust?', '2', 'new-quiz', '2023-07-06 15:40:09.000000', '2023-07-06 15:40:09.000000'),
(26, 'How thick is the Earth\'s crust?', '2', 'activated', '2023-07-06 15:42:33.000000', '2023-07-07 16:58:01.000000'),
(27, 'Which type of crust is found beneath the continents?', '2', 'activated', '2023-07-06 15:44:59.000000', '2023-07-06 16:58:01.000000'),
(28, 'Which type of crust is found beneath the continents?', '2', 'activated', '2023-07-06 15:45:04.000000', '2023-07-08 16:58:02.000000');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gradetbls`
--

CREATE TABLE `gradetbls` (
  `id` bigint UNSIGNED NOT NULL,
  `grade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gradetbls`
--

INSERT INTO `gradetbls` (`id`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'A', '2023-05-06 05:51:59', '2023-05-06 05:51:59'),
(2, 'B', '2023-05-06 05:52:07', '2023-05-06 05:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `learningtiptbls`
--

CREATE TABLE `learningtiptbls` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `Title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learningtiptbls`
--

INSERT INTO `learningtiptbls` (`id`, `userid`, `type`, `Title`, `short_Des`, `long_Des`, `image`, `status`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'learning tip 1', '<p>short description</p>', '<p>null</p>', '521169409.image12.png', 1, 'null', '2023-04-13 08:58:38', '2023-04-13 09:04:59'),
(2, 2, 1, 'tips12', '<p>aaaa</p>', '<p>null</p>', 'null', 1, 'https://www.youtube.com/embed/XTMTBqCZijY', '2023-04-13 09:04:34', '2023-04-17 07:27:48'),
(3, 2, 1, 'Tip no 1', '<p>fyuhbkj&nbsp;</p>', '<p>dtcvhbj&nbsp; jbjkb&nbsp;</p>', '1523235592.service.PNG', 0, 'null', '2023-05-16 12:55:34', '2023-05-16 12:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `mediacentertbls`
--

CREATE TABLE `mediacentertbls` (
  `id` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `headline` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_date` date NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_video` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mediacentertbls`
--

INSERT INTO `mediacentertbls` (`id`, `type`, `headline`, `media_date`, `short_Des`, `long_des`, `image_video`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'media1', '2022-10-10', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '1159608799.image12.png', 'null', '2023-04-17 07:26:10', '2023-04-17 07:26:10'),
(2, 1, 'media12', '9999-09-09', '<p>jsdsjdsh</p>', '<p>jshdjshd</p>', '1813368958.image12.png', 'null', '2023-05-06 06:06:09', '2023-05-06 06:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_04_08_010138_create_articletbls_table', 1),
(5, '2023_04_08_010159_create_mediacentertbls_table', 1),
(6, '2023_04_08_010239_create_allcategorytbls_table', 1),
(7, '2023_04_08_010300_create_cstorytbls_table', 1),
(8, '2023_04_11_160822_create_contactustbls_table', 1),
(9, '2023_04_11_222600_create_announcementtbls_table', 1),
(10, '2023_04_13_025929_create_learningtiptbls_table', 1),
(11, '2023_04_13_030530_create_teamtbls_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questiontbls`
--

CREATE TABLE `questiontbls` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `testid` bigint UNSIGNED NOT NULL,
  `question` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questiontbls`
--

INSERT INTO `questiontbls` (`id`, `userid`, `testid`, `question`, `marks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Asp is a?', 2, '2023-06-06 05:09:02', '2023-06-06 05:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `round1storytbls`
--

CREATE TABLE `round1storytbls` (
  `id` bigint UNSIGNED NOT NULL,
  `round1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `Title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typefic` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `round1storytbls`
--

INSERT INTO `round1storytbls` (`id`, `round1`, `userid`, `type`, `Title`, `typefic`, `short_Des`, `long_Des`, `image`, `status`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'First Round', 2, 1, 'story1', 'Fiction', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>\r\n<p>&nbsp;</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', '312894180.image12.png', 1, 'null', '2023-04-22 05:38:55', '2023-04-22 06:35:07'),
(2, 'First Round', 3, 1, 'story1', 'Fiction', '<p>cfvghjmhn vc</p>', '<p>&nbsp;xvdfrhtujyhmnv&nbsp;</p>', 'null', 1, 'https://www.youtube.com/embed/wLOuFZwlNO4', '2023-04-26 06:32:20', '2023-04-26 06:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `round2storytbls`
--

CREATE TABLE `round2storytbls` (
  `id` bigint UNSIGNED NOT NULL,
  `round2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `Title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typefic` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `round2storytbls`
--

INSERT INTO `round2storytbls` (`id`, `round2`, `userid`, `type`, `Title`, `typefic`, `short_Des`, `long_Des`, `image`, `status`, `video_url`, `created_at`, `updated_at`) VALUES
(2, 'Second Round', 2, 1, 'story2', 'Non-Fiction', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copyIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copyIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copyIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copyIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy</p>', 'null', 1, 'https://www.youtube.com/embed/XTMTBqCZijY', '2023-04-22 06:36:54', '2023-04-22 06:58:09'),
(3, 'Second Round', 3, 1, 'story2', 'Fiction', '<p>fgrthyjuki</p>', '<p>sdefrgthyjk,.</p>', 'null', 1, 'https://www.youtube.com/embed/wLOuFZwlNO4', '2023-04-26 06:33:31', '2023-04-26 06:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `round3storytbls`
--

CREATE TABLE `round3storytbls` (
  `id` bigint UNSIGNED NOT NULL,
  `round3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `type` bigint UNSIGNED NOT NULL,
  `Title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typefic` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `video_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `round3storytbls`
--

INSERT INTO `round3storytbls` (`id`, `round3`, `userid`, `type`, `Title`, `typefic`, `short_Des`, `long_Des`, `image`, `status`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'Third Round', 2, 1, 'story3', 'Fiction', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>\r\n<p>&nbsp;</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>', 'null', 1, 'https://www.youtube.com/embed/XTMTBqCZijY', '2023-04-22 07:14:08', '2023-04-22 07:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `storyleveltbls`
--

CREATE TABLE `storyleveltbls` (
  `id` bigint UNSIGNED NOT NULL,
  `round` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storyleveltbls`
--

INSERT INTO `storyleveltbls` (`id`, `round`, `title`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 'First Round', 'story1', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', '2023-05-02', '2023-04-22 04:26:23', '2023-04-22 04:26:23'),
(2, 'Second Round', 'story2', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', '2023-05-04', '2023-04-22 04:26:47', '2023-04-22 04:26:47'),
(3, 'Third Round', 'story3', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>', '2023-05-06', '2023-04-22 04:27:07', '2023-04-22 04:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `teamtbls`
--

CREATE TABLE `teamtbls` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teamtbls`
--

INSERT INTO `teamtbls` (`id`, `title`, `short_Des`, `long_des`, `image`, `created_at`, `updated_at`) VALUES
(1, 'team12', '<p>&nbsp;Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', '<p>&nbsp;Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>\r\n<p>&nbsp;Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book&nbsp;Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', '1096585458.image12.png', '2023-04-13 09:02:11', '2023-04-17 07:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `topictbls`
--

CREATE TABLE `topictbls` (
  `id` bigint UNSIGNED NOT NULL,
  `skillid` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topictbls`
--

INSERT INTO `topictbls` (`id`, `skillid`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Verb', '2023-05-24 08:42:37', '2023-05-24 08:44:40'),
(2, 1, 'Noun', '2023-05-24 08:45:02', '2023-05-24 08:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `age` int NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.PNG',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `age`, `image`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, 10, 'logo.jpg', '12345678', 1, NULL, '2023-04-10 04:25:35', '2023-04-27 12:49:57'),
(2, 'user', 'user', 'user@gmail.com', NULL, 12, 'user1.PNG', '12345678', 2, NULL, '2023-04-10 04:25:50', '2023-04-10 04:25:50'),
(3, 'saba', 'ali', 'midhatanwar09@gmail.com', NULL, 20, 'user.PNG', '123456', 2, NULL, '2023-04-17 06:36:00', '2023-04-17 06:46:27'),
(4, 'nasr', 'ullah', 'nasrullahkhan1011@gmail.com', NULL, 29, '', '12345678', 2, NULL, '2023-05-06 23:27:17', '2023-05-06 23:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `winnertbls`
--

CREATE TABLE `winnertbls` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` bigint UNSIGNED NOT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_Des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `winnertbls`
--

INSERT INTO `winnertbls` (`id`, `userid`, `link`, `short_Des`, `part`, `position`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'https://digitalkidszone.com/kidstorydetail/story2/2', '<p>zscd frg thyju kil zs cdfrgt hyjuki lzsc dfrgt hyjukil zscdfr gthy jukil zscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukilzscdfrgthyjukil zscdfrgthyjukil zscdfrgthyjukilz scdfrgthyjukilz scdfrgthyjukil&nbsp;</p>', 'software', '1st', '1302857768.Capture2.PNG', '2023-05-18 04:33:28', '2023-05-18 05:54:30'),
(2, 4, 'https://digitalkidszone.com/kidstorydetail/story2/2', '<p>zxsfegrthyjukilo;l.,kmhngbfvdcsxasw er4t5y6u7iukhgfedws asdefrtgyujki,mjnhgf dsadefrgthyjukmhgfd sazsdfrgthyjuk,mjhgfd sasdfvghnm</p>', 'software', '1st', '354473927.service.PNG', '2023-05-18 05:58:42', '2023-05-18 05:58:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintesttbls`
--
ALTER TABLE `admintesttbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admintesttbls_userid_foreign` (`userid`),
  ADD KEY `admintesttbls_skillid_foreign` (`skillid`),
  ADD KEY `admintesttbls_grade_foreign` (`grade`),
  ADD KEY `admintesttbls_topicid_foreign` (`topicid`);

--
-- Indexes for table `allcategorytbls`
--
ALTER TABLE `allcategorytbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcementtbls`
--
ALTER TABLE `announcementtbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcementtbls_type_foreign` (`type`);

--
-- Indexes for table `answertbls`
--
ALTER TABLE `answertbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answertbls_quesid_foreign` (`quesid`);

--
-- Indexes for table `articletbls`
--
ALTER TABLE `articletbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articletbls_userid_foreign` (`userid`),
  ADD KEY `articletbls_type_foreign` (`type`);



--
-- Indexes for table `categorytbls`
--
ALTER TABLE `categorytbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificatetbls`
--
ALTER TABLE `certificatetbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cltesttbls`
--
ALTER TABLE `cltesttbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cltesttbls_skillid_foreign` (`skillid`),
  ADD KEY `cltesttbls_grade_foreign` (`grade`),
  ADD KEY `cltesttbls_userid_foreign` (`userid`);

--
-- Indexes for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactustbls`
--
ALTER TABLE `contactustbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cstorytbls`
--
ALTER TABLE `cstorytbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cstorytbls_userid_foreign` (`userid`),
  ADD KEY `cstorytbls_type_foreign` (`type`);

--
-- Indexes for table `daily_quiz_options`
--
ALTER TABLE `daily_quiz_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_quiz_questions`
--
ALTER TABLE `daily_quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gradetbls`
--
ALTER TABLE `gradetbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learningtiptbls`
--
ALTER TABLE `learningtiptbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learningtiptbls_userid_foreign` (`userid`),
  ADD KEY `learningtiptbls_type_foreign` (`type`);

--
-- Indexes for table `mediacentertbls`
--
ALTER TABLE `mediacentertbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mediacentertbls_type_foreign` (`type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questiontbls`
--
ALTER TABLE `questiontbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questiontbls_userid_foreign` (`userid`),
  ADD KEY `questiontbls_testid_foreign` (`testid`);

--
-- Indexes for table `round1storytbls`
--
ALTER TABLE `round1storytbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `round1storytbls_userid_foreign` (`userid`),
  ADD KEY `round1storytbls_type_foreign` (`type`);

--
-- Indexes for table `round2storytbls`
--
ALTER TABLE `round2storytbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `round2storytbls_userid_foreign` (`userid`),
  ADD KEY `round2storytbls_type_foreign` (`type`);

--
-- Indexes for table `round3storytbls`
--
ALTER TABLE `round3storytbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `round3storytbls_userid_foreign` (`userid`),
  ADD KEY `round3storytbls_type_foreign` (`type`);

--
-- Indexes for table `storyleveltbls`
--
ALTER TABLE `storyleveltbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teamtbls`
--
ALTER TABLE `teamtbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topictbls`
--
ALTER TABLE `topictbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topictbls_skillid_foreign` (`skillid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `winnertbls`
--
ALTER TABLE `winnertbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winnertbls_userid_foreign` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintesttbls`
--
ALTER TABLE `admintesttbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allcategorytbls`
--
ALTER TABLE `allcategorytbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcementtbls`
--
ALTER TABLE `announcementtbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answertbls`
--
ALTER TABLE `answertbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `articletbls`
--
ALTER TABLE `articletbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attempt_daily_quiz_questions`
--
ALTER TABLE `attempt_daily_quiz_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categorytbls`
--
ALTER TABLE `categorytbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificatetbls`
--
ALTER TABLE `certificatetbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cltesttbls`
--
ALTER TABLE `cltesttbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collaborations`
--
ALTER TABLE `collaborations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactustbls`
--
ALTER TABLE `contactustbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cstorytbls`
--
ALTER TABLE `cstorytbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daily_quiz_options`
--
ALTER TABLE `daily_quiz_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `daily_quiz_questions`
--
ALTER TABLE `daily_quiz_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gradetbls`
--
ALTER TABLE `gradetbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learningtiptbls`
--
ALTER TABLE `learningtiptbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mediacentertbls`
--
ALTER TABLE `mediacentertbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questiontbls`
--
ALTER TABLE `questiontbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `round1storytbls`
--
ALTER TABLE `round1storytbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `round2storytbls`
--
ALTER TABLE `round2storytbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `round3storytbls`
--
ALTER TABLE `round3storytbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storyleveltbls`
--
ALTER TABLE `storyleveltbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teamtbls`
--
ALTER TABLE `teamtbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topictbls`
--
ALTER TABLE `topictbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `winnertbls`
--
ALTER TABLE `winnertbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
