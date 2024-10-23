-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 04:45 PM
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
-- Database: `taxaqyge_rodcem`
--

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `message` text DEFAULT NULL,
  `designation` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_zone` int(11) DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `name`, `slug`, `status`, `message`, `designation`, `image`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `service_zone`, `about`) VALUES
(13, 'MD Saiful Islam Sujon', 'md-saiful-islam-sujon', '1', '', 1, 'expert-50642087e98fbd8.png', 'sujonsaiful03@gmail.com', '01732393826', NULL, '$2y$10$XxmNpl.i1GEo5dte0uIlqeD6u9c3v89/KZHrVrAhTY1IpEITDgE3a', NULL, '2023-03-24 14:36:05', '2023-03-26 17:59:05', 1, NULL),
(15, 'Engr, Osman Goni', 'engr-osman-goni', '1', '', 1, 'expert-50642087c974d92.png', 'stsengineersbd@gmaill.com', '8801787664844', NULL, '$2y$10$XhKErgF1pHXngGwIwcPWcuoHtg0sK5nTIWIeo6.72Yv5rYQt9L/UG', NULL, '2023-03-24 16:56:09', '2023-03-26 17:58:33', 8, NULL),
(17, 'Md Hasan Al Mamun', 'md-hasan-al-mamun', '1', '', 1, 'expert-50642087a4e15a8.png', 'hassanalmamun713@gmail.com', '01701402424', NULL, '$2y$10$T5lwq3BkkiKnsZ6nw8kUvuw2k77pXwijGwoG.I54sJXjyShX3BHxa', NULL, '2023-03-24 18:41:29', '2023-03-26 17:57:56', 12, NULL),
(19, 'Md Yeasha Khan', 'md-yeasha-khan', '1', '', 1, 'expert-5064208762a5c66.jpeg', 'yeashakhan786@gmail.com', '01704216282', NULL, '$2y$10$7gPBkodUjbrNm7cOC6iE6uLkGSrSAU5xTz6nDT1xzPyofEMFa1x92', NULL, '2023-03-24 23:45:06', '2023-03-26 17:56:50', 47, NULL),
(20, 'Engr. Kamruzzaman', 'engr-kamruzzaman', '1', '', 2, 'expert-506420873537263.png', 'kamruzzamanexpart@rodcem.com', '01756644960', NULL, '$2y$10$ywmDO96ZWtMclOpf1LxPpevaYLAqIk7X2Nfydtq.B.aUk7gRZVbki', NULL, '2023-03-25 16:45:06', '2023-03-26 17:56:05', 47, NULL),
(21, 'Md. Mahmudul Hasan', 'md-mahmudul-hasan', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'sazibhasankpi@gmail.com', '01946121212', NULL, '$2y$10$Hnpe0CpdJn/Kv6bjI4ikP.SMSqwado2.h.jQypXjJ5YSpLPZnSdrW', NULL, '2023-03-25 17:58:14', '2023-04-05 19:25:24', 20, NULL),
(23, 'Muha. Kamruzzaman kakon', 'muha-kamruzzaman-kakon', '1', '', 1, 'expert-50642087072fcf0.jpg', 'kakonnaju@gmail.com', '01743281892', NULL, '$2y$10$.zKkt9jwP/ELNS7vy.yk2Ol6.U3Cbbr6gpe/G.7zM2lUBpOir3B.S', NULL, '2023-03-25 19:22:05', '2023-03-26 17:55:19', 47, NULL),
(24, 'Md.Faysal', 'mdfaysal', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'faysal.njj@gmail.com', '01685034902', NULL, '$2y$10$34ZF/akLh8HJFG.qt6neCuC/AHmTh322hQPDCy5VUQyMFQd9DiPbm', NULL, '2023-03-25 20:23:28', '2023-04-05 19:25:08', 1, NULL),
(25, 'Meharaj Hossain', 'meharaj-hossain', '10', 'Your Account Is Deactivate. To Active your profile please update your profile picture, location & portfolio. \r\nfor emergency you can contact +8801319594929', 1, NULL, 'meharajhossain2020@gmail.com', '01881341366', NULL, '$2y$10$gOWSWU4ao9ZwQijTUk0vfuu.WyvaF44gbLzm7oV2Ovls3rtAI2Ghm', NULL, '2023-03-25 20:34:26', '2023-03-28 02:12:36', 1, NULL),
(26, 'Jamal Uddin', 'jamal-uddin', '10', 'Beacuse of your porfile picture is not upload.', 1, NULL, 'jamal8c0@gmail.com', '01314892022', NULL, '$2y$10$ETveP17ZVeWeqaU9IT.sieHcHrcnK7H5oT.fHBhrgDIb2lzbLkNB.', NULL, '2023-03-25 20:35:05', '2023-04-05 19:20:30', 1, NULL),
(27, 'Oriul jaman', 'oriul-jaman', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'oriuljaman19@gmail.com', '01643756619', NULL, '$2y$10$SbkjiA3aW9eMEL.GY6Yw4eZaSd/7yz.4jd1TDc6j4wlTS/hE.R2FS', NULL, '2023-03-25 20:36:10', '2023-04-05 19:24:57', 52, NULL),
(28, 'Engr Kongchai Marma Ovi', 'engr-kongchai-marma-ovi', '10', 'Because you haven\'t uploaded your profile picture.', 1, 'expert-506424fb0e85923.jpg', 'engrkongchaiovi@gmail.com', '01889201544', NULL, '$2y$10$nb5esLlWsgfvsExQ0jli0.RT3fqteg28F43OgT8wRdFNoiA6iFxti', NULL, '2023-03-25 21:02:26', '2023-04-05 19:24:43', 8, 'Engineering Fast Building Design & Construction Ltd.'),
(29, 'Md.Shimran Hossain', 'mdshimran-hossain', '10', 'Because you haven\'t uploaded your profile picture.', 1, 'expert-50641eda0a26c83.pdf', 'md.yazulppi5176@gmail.com', '01312879083', NULL, '$2y$10$MHcmowDkJpCNBKNBzeE3keulm56kXESIxH0FMYvg16JAtvjdi.Gve', NULL, '2023-03-25 21:20:27', '2023-04-05 19:24:37', 15, NULL),
(30, 'Eng Al Farhad', 'al-farhad', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'alfarhad@gmail.com', '01879285047', NULL, '$2y$10$ic9nU4ERu1LAwj1elb549elqiDXap/q7zQOrYtHJUk8EFbJwTLB8a', NULL, '2023-03-26 17:48:19', '2023-04-05 19:24:19', NULL, NULL),
(31, 'Eng Tanvir', 'tanvir', '10', 'Because you haven\'t uploaded your profile picture.', 2, NULL, 'tanvir@gmail.com', '01879285454', NULL, '$2y$10$aQNuP9inTfv2ygEwbG/DTO4ym5mQM0Kj3u3uKSKIsk1weBu839u/i', NULL, '2023-03-26 17:48:19', '2023-04-05 19:24:25', NULL, NULL),
(32, 'Eng Jony', 'jony', '10', 'Because you haven\'t uploaded your profile picture.', 3, NULL, 'jony@gmail.com', '01874555054', NULL, '$2y$10$gIOE9p1lWHI.sKK7caqabeI/lGXvx15RSJP.MeXdwNMZpbhQHlJuO', NULL, '2023-03-26 17:48:19', '2023-04-05 19:24:31', NULL, NULL),
(33, 'khan mohammad ashif', 'khan-mohammad-ashif106420cd3c8fcb4', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'asifkhan0176390@gmail.com', '01486237818', NULL, '$2y$10$tXGUPsmEk0di1rU/yH484.PnHkqkgqIX7SS8C989zK/ATxwnpsJL2', NULL, '2023-03-27 08:54:52', '2023-04-05 19:24:13', 1, NULL),
(34, 'Engr. Abul Kalam Azad', 'engr-abul-kalam-azad1064210f3b3a46a', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'azada8646@gmail.com', '01815756963', NULL, '$2y$10$7r.BWPLT4U20AKC08MIh1uVy50Gac59SP.v7vSa7jKeTkQA.aGXHe', NULL, '2023-03-27 13:36:27', '2023-04-05 19:24:08', 1, NULL),
(35, 'Md Al Amin', 'md-al-amin106421118689ad6', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'mdalamin581@gmail.com', '01819427581', NULL, '$2y$10$CB8zXbF5HY9Zpy0mTrqOtuXnA4mMOTNYcxooPd7IpLrARs8n.rFeq', NULL, '2023-03-27 13:46:14', '2023-04-05 19:24:02', 1, NULL),
(36, 'Nasima Bagume', 'nasima-bagume10642280c374b59', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'masud.ebox@gmail.com', '01774968575', NULL, '$2y$10$Nymx2FK6x6lfUNdN1ZcIDeSPuhqKA46yZT7LgDR2NOF4PXAHEGaHe', NULL, '2023-03-28 15:53:07', '2023-04-05 19:23:55', 63, NULL),
(37, 'Imran shohag', 'imran-shohag1064228bbb77f14', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'shohag.talukdar@yahoo.com', '01771551413', NULL, '$2y$10$/9os2.KYOT2esZQYfmVJn.W0/A2GKvJbWEJQD9M6ZYHlSWW7ZlsJK', NULL, '2023-03-28 16:39:55', '2023-04-05 19:23:46', 45, NULL),
(38, 'Khondokar Johir Uddin Babor', 'khondokar-johir-uddin-babor106422b72a923d1', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'khondokarbabor333@gmail.com', '01638628642', NULL, '$2y$10$JItqxwyuBBKBp.8QzTR.A.SEvQgTPHAIc8WMmgsO/T8DoatK3vjJK', NULL, '2023-03-28 19:45:14', '2023-04-05 19:23:39', 33, NULL),
(39, 'Md. Abdul Latif', 'md-abdul-latif106425188aa47d3', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'abdullatif151994@gmail.com', '01765135472', NULL, '$2y$10$9W1PK4XNObhpFKO9V.5.Qe5avGDU6nBxM4Bl/FT6BejqksQ1.FwZ2', NULL, '2023-03-30 15:05:14', '2023-04-05 19:23:33', 1, NULL),
(40, 'md Dider', 'md-dider106426377b014d6', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, 'gmdider50@gmail', '01969688257', NULL, '$2y$10$g0lC1BpXFOgtz40FqBhfKu7em9VFp7uUcIaQ4ASI82Ba/TqBHp6e2', NULL, '2023-03-31 11:29:31', '2023-04-05 19:23:25', 8, NULL),
(41, 'Mashum Hashan', 'mashum-hashan106426952b5772f', '10', 'Because you haven\'t uploaded your profile picture.', 0, NULL, '13206025@iubat.edu', '01718892783', NULL, '$2y$10$UegtZH5Oy3nReA0g7eQjEOEkHSvVrwBLuSI4tmfsMjokipOyJ3UN6', NULL, '2023-03-31 18:09:15', '2023-04-05 19:23:20', 57, NULL),
(42, 'Md. Hiron Sarker', 'md-hiron-sarker1064290e7fc3393', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'hironsarker36@gmail.com', '01617424812', NULL, '$2y$10$ERYaot6.m9uOxYby5MvW5uRmA2gFex14i6xzyzMNLm5N6MjdQc3YO', NULL, '2023-04-02 15:11:27', '2023-04-05 19:23:14', 47, NULL),
(43, 'Masudur Rahman Rony', 'masudur-rahman-rony1064294c665744d', '10', 'Because you haven\'t uploaded your profile picture.', 1, NULL, 'garibullah2000@gmail.com', '01710636314', NULL, '$2y$10$UHdK6ktQPqkU99C4pJA3Euq9v9c2YYMa9lVsS/3NAPCNFH6SLtC5W', NULL, '2023-04-02 19:35:34', '2023-04-05 19:23:09', 38, NULL),
(44, 'Rafiqul Rajib', 'rafiqul-rajib10642a5491e1392', '0', NULL, 1, NULL, 'sumiconstruction435@gmail.com', '01728001760', NULL, '$2y$10$WUQZROG4mqajweb442BT5eW3mInMg1wN4Syjr/NcGJUE4eeofXN7a', NULL, '2023-04-03 14:22:41', '2023-04-03 14:22:41', 16, NULL),
(45, 'Md Robiul Awal', 'md-robiul-awal10642b06443541c', '0', NULL, 1, NULL, 'rawallll86@gmail.com', '01704947801', NULL, '$2y$10$TcT7OYEiDv.HNiEoJeu6mO7OcmeKViC64yqem2NOiH9F1.mVu30ke', NULL, '2023-04-04 03:00:52', '2023-04-04 03:00:52', 1, NULL),
(46, 'Jisan', 'jisan10642b8cee1578c', '0', NULL, 3, NULL, 'jisan_iub@yahoo.com', '01817714942', NULL, '$2y$10$I22RB991Kr9nsj1rEtxtNOuUYdxeQ0spzciuQvqvzqgS1tpDJ1Rxu', NULL, '2023-04-04 12:35:26', '2023-04-04 12:35:26', 8, NULL),
(47, 'Engr.Mahabub Rahman Titas', 'engrmahabub-rahman-titas10642ba63549e8f', '0', NULL, 1, NULL, 'mahabub7915@gmail.com', '01712874768', NULL, '$2y$10$loR2ft8Bf3vOshXD6yfAUeyoXyYJ2R.ao/ohIUCRkPN7u5LguZRLO', NULL, '2023-04-04 14:23:17', '2023-04-04 14:23:17', 26, NULL),
(48, 'Demo Expert', 'demo-expert', '0', NULL, 1, NULL, 'DemoExpert@gmail.com', '01879456985', NULL, '$2y$10$zV0cVwxElXu1t7.n2Q5KGuhrVz55lauV0QsJDk8ii5Ol1LQVoMUQS', NULL, '2023-04-05 20:05:52', '2023-04-05 20:05:52', 1, NULL),
(49, 'Al Hadish', 'al-hadish10642e1a896d879', '0', NULL, 1, NULL, 'humayraconstruction@gmail.com', '01715464442', NULL, '$2y$10$c9fQG73B4blROWCiMleNJOn7V0i1om.VwRk3k1E7o0csWM8Z2ZOxC', NULL, '2023-04-06 11:04:09', '2023-04-06 11:04:09', 1, NULL),
(50, 'ENGR. SAMSUL AZAM (BSc)', 'engr-samsul-azam-bsc106430506d121c9', '0', NULL, 1, NULL, 'Samsul.azam28@gmail.com', '01999998904', NULL, '$2y$10$6dDgT/q9GY1IqF4m/riE4evpieq5hfPLoGRB6P5P25CYF0S4tP1We', NULL, '2023-04-08 03:18:37', '2023-04-08 03:18:37', 1, NULL),
(51, 'Md SOHEL RANA', 'md-sohel-rana10643121d3885e8', '1', '', 1, 'expert-50643123f4e4c48.png', 'sohel.rana54444444@gmail.com', '01712862006', NULL, '$2y$10$1ES2Na.sZrkZsX3nqv4nNuQtBDjuIJ.Jb1xPdisZ/Abj4zPer4E9e', NULL, '2023-04-08 18:12:03', '2023-04-08 18:30:20', 23, NULL),
(52, 'M A Rob Ridoy', 'm-a-rob-ridoy106432ca349bf08', '0', NULL, 1, NULL, 'hridoyctg961@gmai.com', '01880946990', NULL, '$2y$10$Mj2fRcJD5jg1BwlmkDyfiuiGCmt9o7Tsk7eQ.8X1LDLcU7V38iJde', NULL, '2023-04-10 00:22:44', '2023-04-10 00:22:44', 33, NULL),
(53, 'Zohirul islam', 'zohirul-islam1064337ebe91d24', '0', NULL, 1, NULL, 'zislam1992@gmail.com', '01914964873', NULL, '$2y$10$qhUKmUnBTwa0Esp94p9JFuKvWweBOsMENnUa8gFO.XZTBORjbYNYS', NULL, '2023-04-10 13:13:02', '2023-04-10 13:13:02', 47, NULL),
(54, 'চিত্র ও ভাস্কর্য শিল্পী শাওন সগীর সাগর', 'citr-oo-vaskrz-silpee-saoon-sgeer-sagr106434db9f28a32', '0', NULL, 2, NULL, 'sawonsagar07@gmail.com', '01712212174', NULL, '$2y$10$54Fho/6s/2WFItevPNoHiObtW4bPpufJ/j0F2HKGpuqOvMRz89T5C', NULL, '2023-04-11 14:01:35', '2023-04-11 14:01:35', 46, NULL),
(55, 'MD.HARUN OR RASHID', 'mdharun-or-rashid106434e2cb56f12', '0', NULL, 1, NULL, 'kalupukur.k.somityltd@gmail.com', '01726842804', NULL, '$2y$10$h8wStl/3k8G5iszMKp0D3.5bKNweM2OB7.LkNlTrtLNJ6q/l/vxSK', NULL, '2023-04-11 14:32:11', '2023-04-11 14:32:11', 35, NULL),
(56, 'Abu sayed sumon', 'abu-sayed-sumon10643650ee7ff6b', '0', NULL, 1, NULL, 'engr.sumon12345@gmail.com', '01882936947', NULL, '$2y$10$9uTuC.TjYUJtBatDGZxcxeALhT770l7p.7TgX5B0l.1hAP7GVR7Vy', NULL, '2023-04-12 16:34:22', '2023-04-12 16:34:22', 8, NULL),
(57, 'Md wahidul Islam', 'md-wahidul-islam106436aa6e9a849', '0', NULL, 1, NULL, 'wahidnew220@gmail.com', '01852720220', NULL, '$2y$10$8.nb4r8xkolxFmV7QXCWROBRFzHA/ff6T3r15ndjAcRzjJOT6izI6', NULL, '2023-04-12 22:56:14', '2023-04-12 22:56:14', 47, NULL),
(59, 'MD Hafizul Islam', 'md-hafizul-islam10643f4ef30a8f9', '0', NULL, 3, NULL, 'amardinajpur358@gmail.com', '01774772009', NULL, '$2y$10$kG6DD2IazIRuYwhgfjRBUesH8rRIe.e1AbGefINV0RJYcPyHhJUfq', NULL, '2023-04-19 12:16:19', '2023-04-19 12:16:19', 59, NULL),
(60, 'Md Mohidul Islam', 'md-mohidul-islam1064587f060d297', '0', NULL, 1, NULL, 'engrmaidulcivil@gmail.com', '01939092886', NULL, '$2y$10$bp3yM3HjwV9a0Xg50QytOeW66PUzuzhGij9H/ivsx3yEh0cSIjyVG', NULL, '2023-05-08 14:48:06', '2023-05-08 14:48:06', 47, NULL),
(61, 'Riazull Kobir Nirob', 'riazull-kobir-nirob10652422f10baba', '0', NULL, 1, 'expert-50652423ceae101.jpeg', 'rknirob07@gmail.com', '01911924422', NULL, '$2y$10$CqYodKdDvaxZNDzxpOLaAeW8EinYrTvjpKOIp5wnoY8Aa8nd/Cex6', NULL, '2023-10-10 01:57:37', '2023-10-10 02:01:18', 63, 'Hi! I am Riazull Kobir Nirob! Right Now I am student of deploma in engineering in Civil Technology.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `experts_email_unique` (`email`),
  ADD UNIQUE KEY `experts_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
