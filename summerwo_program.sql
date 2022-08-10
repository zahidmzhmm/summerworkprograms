-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2016 at 07:27 AM
-- Server version: 5.5.51-38.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `summerwo_program`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fromemail` varchar(256) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `toemail` varchar(265) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `sitename` varchar(265) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `title`, `username`, `password`, `fromemail`, `toemail`, `date`, `sitename`) VALUES
(1, 'summerprogram', 'summerwork', '@1275@WORK@PASS#', 'donotreply@summerworkprograms.com', 'info@summerworkprograms.com', '2012-12-23', 'http://www.summerworkprograms.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE IF NOT EXISTS `tbl_countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `countries_iso_code_2` char(2) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `countries_iso_code_3` char(3) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `address_format_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`countries_id`),
  KEY `idx_countries_name_zen` (`countries_name`),
  KEY `idx_address_format_id_zen` (`address_format_id`),
  KEY `idx_iso_2_zen` (`countries_iso_code_2`),
  KEY `idx_iso_3_zen` (`countries_iso_code_3`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=241 ;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `address_format_id`) VALUES
(240, 'Aaland Islands', 'AX', 'ALA', 1),
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 5),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 2),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 5),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 4),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 3),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 6),
(223, 'United States', 'US', 'USA', 2),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_countries` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `firstname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `midname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `dob_month` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `dob_day` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `dob_year` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `age` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `birth_country` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `siblings` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `contact_add` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone_no` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email_one` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `passport` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name_inst` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `add_inst` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `course_std` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `level_std` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `valid_hold` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `holiday_start` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `holiday_end` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `trvl_exp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `trvl_where` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `grd_date` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nm_cont_us` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `add_cont_us` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nam_sp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `add_sp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone_sp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email_sp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `prof_sp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `why_part` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hear_us` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `referenceid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `appointment` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `actcode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `acstatus` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `profile_complete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1598 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`users_id`, `res_countries`, `firstname`, `lastname`, `midname`, `email`, `password`, `dob_month`, `dob_day`, `dob_year`, `age`, `gender`, `birth_country`, `siblings`, `contact_add`, `mobile_no`, `phone_no`, `email_one`, `passport`, `name_inst`, `add_inst`, `course_std`, `level_std`, `valid_hold`, `holiday_start`, `holiday_end`, `trvl_exp`, `trvl_where`, `grd_date`, `nm_cont_us`, `add_cont_us`, `nam_sp`, `add_sp`, `phone_sp`, `email_sp`, `prof_sp`, `why_part`, `hear_us`, `referenceid`, `date_joined`, `status`, `appointment`, `actcode`, `acstatus`, `profile_complete`) VALUES
(1597, 'Nigeria', 'Besor', 'Associates', '', 'besotdpf@besorassociates.com', 'e0ff92ee6ed5484b0ac0d6354ed0a83c', '2', '1', '1991', '20', 'male', 'Australia', '0', 'Ikeja', '889898', '4545151', '', '', 'Babcock University', 'Lagos', 'Medicine', '100', '', '08-01-2016', '08-18-2016', '', '', '08-04-2016', '', '', 'Besor', 'Lagos', '5454545', '', '', 'Test', 'Test', 'F17A2CEF', '2016-08-21 00:00:00', 'PENDING', '', '3fa2f5691c3f7c05a3abe778e2a93ea8', 'ACTIVE', 1),
(1550, 'Nigeria', 'Daniel ', 'Samson', 'Etereigho', 'samsondaniel77@yahoo.com', '96c9d49e63525b41a3d400ddbb1acec4', '1', '8', '1997', '19', 'male', 'Nigeria', '2', 'Plot 576, 14th street DDPA Estate Ugborikoko Effurun Delta State', '08101265953', '08101265953', '', '', 'Covenant University', 'Km 10 Idiroko Road Sango otta Ogundipe State Nigeria', 'Civil Engineering ', '300', '', '05-01-2016', '08-01-2016', '', '', '06-22-2018', '', '', 'Engr Samson Ivovi', 'Plot 576 14th Street DDPA Estate Ugborikoko Effurun, Delta State', '08037262708', 'delteceng@yahoo.com', 'Civil Engineer', 'Its a good means of exposure and to increase my network ', 'Through a friend ', '38FED5DB', '2016-03-29 00:00:00', 'PENDING', '', '99abd82c8f8ada4a0cfcef1b7c01a679', 'ACTIVE', 1),
(1554, 'Nigeria', 'Oluchi ', 'Ejehu', 'Sophia', 'Sophia.ejehu@stu.cu.edu.ng', '2f28ae92168cb7b48cd39bb12b3a0eca', '3', '27', '1995', '21', 'female', 'Nigeria', '3', 'Close 50 House 12, satellite Town, Lagos ', '+2348060691984', '+2348036548734', '', 'None', 'Covenant University', 'Km10 Idiroko, OTA OGUN state', 'Petroleum engineering', '300', '', '05-06-2016', '08-13-2016', '', 'None', '06-22-2018', 'None', 'None', 'Engr. Chukwunaru Ejehu', 'Close 50 house 12, satellite town Lagos ', '+2348034087351', 'Patjehu@gmail.com', 'Student', 'To broaden my knowledge base and to be exposed to a more practical approach to my field of study', 'From a friend', 'A624DA81', '2016-04-03 00:00:00', 'PENDING', '', '48ba771ba359c2883f5afd2c2d95fe12', 'ACTIVE', 1),
(1589, 'Nigeria', 'Mariam', 'abdullahi-idris', '', 'abidemiabdullahiidris@yahoo.com', '0e5aaf827ecc090c18aa50b84bbb6d4c', '8', '2', '1995', '', '', '', '', '', '', '', '', '', 'Babcock University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'temitope19', '2016-08-10 00:00:00', 'PENDING', '', 'ffe6e47b95d1627b6a67ada81b7be097', 'INACTIVE', 0),
(1590, 'Nigeria', 'Uduakobong', 'Udoekong', '', 'uduakobongudoekong@yahoo.com', '353dccf38425dc1d90a9b93cd0b8b376', '5', '22', '1997', '', '', '', '', '', '', '', '', '', 'Covenant University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Super2', '2016-08-12 00:00:00', 'PENDING', '', 'e033e345119dcf78505fafe8767a71b9', 'INACTIVE', 0),
(1591, 'Nigeria', 'OKECHUKWU', 'AKUBUEZE', '', 'michlench@gmail.com', '2ccb3a0b3373249a50039734ed9e99e3', '3', '8', '1991', '', '', '', '', '', '', '', '', '', 'Ambrose Alli University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jesusa', '2016-08-12 00:00:00', 'PENDING', '', 'd0ae2244d6f52b33861118468a8edc4f', 'ACTIVE', 0),
(1588, 'Nigeria', 'Ellis Tolulope', 'Oyedele', '', 'toluwalopeoyedele@hotmail.com', 'e4a3ab5f632a0ec23d995e7833c8ff51', '2', '10', '1995', '', '', '', '', '', '', '', '', '', 'Covenant University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dkalid95', '2016-08-07 00:00:00', 'PENDING', '', 'b7c00704e37a640b0775ba9091c2a6fb', 'INACTIVE', 0),
(1587, 'Nigeria', 'Olanrewaju ', 'Adewumi', 'Anu', 'Gbajumo2035@yahoo.com', 'a7d999fcf158a1e86289c9f31f5c662f', '12', '21', '1994', '21', 'male', 'Nigeria', '2', 'ASCON topo-badagry Lagos state', '08100901290', '08033585635', '', '', 'Covenant University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'gbajumo2035', '2016-08-05 00:00:00', 'PENDING', '', '05870d21e7e292fd9e841eec749623d4', 'ACTIVE', 0),
(1586, 'Nigeria', 'Rishiku Godiya ', 'Gideon ', '', 'Rishiks4lyf@yahoo.com', 'd3d65bd0c9a0ab4a576dc3030183b7e0', '2', '10', '1996', '', '', '', '', '', '', '', '', '', 'Babcock University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'February10', '2016-08-02 00:00:00', 'PENDING', '', 'ba9879a26c8b1a72342a03864d2793a7', 'INACTIVE', 0),
(1592, 'Nigeria', 'OLATOMIWA ', 'AROGUNDADE ', 'ABDULKABIR ', 'casperarogunz@gmail.com', 'f479354e3c119c5d12d3185f300617e9', '4', '4', '1998', '18', 'male', 'Nigeria', '5', 'no 7 gbenga fasheun close agege lagos Nigeria ', '+2349051065970', '+2349051065970', '', '', 'Babcock University', 'ileshun remo town ogun state Nigeria ', 'social work ', '200 level ', '', '04-27-2017', '08-28-2017', '', 'London, florida paris', '08-28-2020', '', '', 'ABIMBOLA AROGUNDADE ', '7 gbenga fasheun close agege lagos Nigeria ', '+2347084527212', 'aabimbola@unicef.org', 'United nations ', 'Ill', '', 'subomi123', '2016-08-15 00:00:00', 'PENDING', '', 'a943843f2dc31ceeb83bf72eb3404633', 'ACTIVE', 0),
(1578, 'Nigeria', 'JENNIFER', 'ENWEZOR', '', 'jennifer.chiazor@yahoo.com', '829eacd0a8a5944db1151c08c507afb8', '7', '11', '1996', '', '', '', '', '', '', '', '', '', 'Bowen University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Chumchum123', '2016-07-20 00:00:00', 'PENDING', '', '2152f2002de2b9ece9f3c2bddd59200b', 'INACTIVE', 0),
(1579, 'Nigeria', 'Osamuyimen', 'Adonri', 'Shalom', 'muyiadonri@gmail.com', '4cef0e4a954d1c289e604dda7abc0f37', '3', '29', '1991', '18', 'male', 'Nigeria', '3', 'Road 13 House 28, Efab city Estate, lokogoma, Abuja.', '08020640339', '08033068055', '', '', 'Covenant University', 'Km 10, Idiroko Road, Canaan Land, Ota, Ogun State, Nigeria. ', 'Mechanical Engineering', '300', '', '05-20-2017', '08-13-2017', '', '', '05-14-2016', '', '', 'Mr. Osaretin Adonri', 'Road 13 House 28, Efab city Estate, lokogoma, Abuja.', '08033068055', 'adonri@unfpa.org', 'International Civil Servant', 'I want to participate in this program to have a working experience in other cultures and enhance my entrepreneurial capabilities as an engineer while in school.', '', 'Osasuyimen98', '2016-07-21 00:00:00', 'PENDING', '', 'bfc6c53e566a71eb83e4ce37dd5d58a9', 'ACTIVE', 0),
(1594, 'Nigeria', 'Temitope', 'Akinyemi', '', 'temitopeakinyemi42@yahoo.com', '12dce8d2a184760875a7676d72712c45', '3', '14', '1994', '', '', '', '', '', '', '', '', '', 'Covenant University', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'tope1995', '2016-08-16 00:00:00', 'PENDING', '', '5dc5fce2e7ba4e9e7a34a56077433ee3', 'INACTIVE', 0),
(1593, 'Nigeria', 'Omowasola', 'SUNMONU ', 'nicholas', 'sunmonutoyosi@gmail.com', '2e83890ba1ef9b949690c717e1c094f3', '1', '20', '1999', '17', 'male', 'Nigeria', '1', '5 Williams okoroStreet, Aboru, iyana-ipaja', '08077044634', '08037089507', '', '', 'lagos state university ', 'lasu Road,  ojo.  lagos state', 'transportation ', '100', '', '06-20-2016', '10-20-2016', '', '', '2019', '', '', 'funmilayo akinola', '7,Williams okoro close, peace estate, lagos', '08037089507', 'sunmonutoyosi@gmail.com ', 'business analyst', 'I would like to participate in the summer work due to the following reasons :\r\n-To gain experience \r\n-To enable me embrace other cultures and understand the benefits of cultural diversity ', 'Sister', '5F5D6928', '2016-08-15 00:00:00', 'PENDING', '', 'cd13a0852aadf7a8422180513b924505', 'ACTIVE', 1),
(1564, 'Nigeria', 'saeed', 'roz', 'Christopher ', 'c4life7@gmail.com', '005d2fb9ee12cd0d3e3086ed2c1019ae', '12', '21', '1997', '18', 'male', 'Nigeria', '1', 'covenant university joseph hall b109', '08129644368', '08129644368', '', '', 'Covenant University', 'km10, idiroko, canaanland, ota', 'psychology', '200', '', '04-30-2016', '08-30-2016', '', '', '06-24-2018', '', '', 'Mrs F.O Ezinwa', 'No 23 atani road, iyowa odekpe, anambara state ', '+2348020746186', '', '', 'To gain essential work experience.', 'the site link was sent to me by a friend ', '055FE70C', '2016-04-19 00:00:00', 'PENDING', '', '5157d6d3826182d7ccf4bd0f17bbbde8', 'ACTIVE', 1),
(1565, 'Nigeria', 'Chidinma lovelyn', 'Aja-nwachuku ', '', 'aforlyn@gmail.com', '0985877655c029c3508626b9912cb8a6', '12', '19', '1996', '19', 'female', 'Nigeria', '5', 'No 7ajanwachuku street ezza road Ebonyi state Nigeria ', '+23480908617', '+2348058471909', '', 'A00303042', 'Babcock University', 'Ilishan Ogun state ', 'Economic ', '200', '', '', '', '', 'America,france', '06-02-2019', 'Aunty mabel', 'New Jersey ', '', 'Nnenna igwe Ajanwachuku ', '+2348060908617', '', '', 'Because I want to get a working experience ', 'Someone told me', 'chidinma1', '2016-06-01 00:00:00', 'PENDING', '', '37fee85e450165b1e12c81dbc5b493ac', 'ACTIVE', 0),
(1575, 'Nigeria', 'adenuga', 'olakunle', 'saheed', 'adso23@yahoo.com', 'e6e39453abffe0c4de733c2341715b07', '8', '23', '1992', '24', 'male', 'Nigeria', '1', 'no 62 idoluwo street lagos island', '07039411297', '07039411297', '', 'A03353717', 'Babcock University', 'ilishan remo Ogun state', 'marketing', '400', '', '05-09-2017', '09-04-2017', '', 'Dubai', '05-08-2017', '', '', 'morayo ahmed adunni', 'no 62 idoluwo street lagos island', '08033258291', '', 'business woman', 'Iwant to have the experience of working overseas so as for me to derive more knowledge.', 'A friend', '93A5A4FE', '2016-07-17 00:00:00', 'PENDING', '', '21b5608d93cd2fbb46c48fb2e3b4f453', 'ACTIVE', 1),
(1574, 'Nigeria', 'Goziem', 'Ajulibe', 'Benjamin', 'danielajulibe@yahoo.com', '83c34d37cd021f46938044394988904b', '7', '10', '1998', '18', 'female', 'Nigeria', '3', '38b shell pipeline Road, Rumuodara, PortHarcourt.', '08134519282', '08161913403', '', '', 'Babcock University', 'Ogun State', 'Medical Laboratory Science ', '300', '', '04-28-2017', '09-01-2017', '', '', '06-10-2019', '', '', 'Ajulibe Benjamin', '38b Shell pipeline road, Rumuodara, PortHarcourt ', '08034327815', '', 'Engineer', 'Traveling is learning and I am a lover of learning', 'Referral ', 'DA6DA74B', '2016-07-10 00:00:00', 'PENDING', '', '6653945f57fd61b0e0a94746e1622fa2', 'ACTIVE', 1),
(1596, 'Nigeria', 'IDONGESIT', 'UDO', 'USEN', 'udo_idongesit45@icloud.com', '421278d1e059ad8327e850bc74963f43', '4', '20', '1995', '21', 'male', 'Nigeria', 'TWO (2)', '14, BUYIDE AVENUE, OLOKODE, KOLLINGTON, ALAGBADO, LAGOS', '+2347034233546', '+2347034233546', '', '', 'Covenant University', 'CANAANLAAND, KM 10, IDIROKO ROAD, OTA, OGUN STATE', 'COMPUTER ENGINEERING', '500', '', '05-06-2017', '08-12-2017', '', '', '06-23-2017', 'NIL', 'NIL', 'MRS. JENNY UDO', '14, BUYIDE AVENUE, OLOKODE, KOLLINGTON, ALAGBADO, LAGOS', '+2348023216957', '', 'NURSE', 'My major reason for wanting to participate in Apart from the ', 'SEARCH ENGINE.', 'MOBster911', '2016-08-21 00:00:00', 'PENDING', '', '1c304b2466b66aa33ddff0cb5009d2e7', 'ACTIVE', 0),
(1571, 'Nigeria', 'OLUWATAMILORE', 'POPO-OLANIYAN', 'MARY', 'oluwatamilore.popoolaniyan@stu.cu.edu.ng', 'b93bafd9710bb23adb3ba84c8558a0d3', '8', '22', '1996', '19', 'female', 'Nigeria', '2', '2, FATAI LAWAL STREET, OFF AGO PALACE WAY. OKE OGBERE. OKOTA LAGOS. NIGERIA', '2347051904777', '2348033075419', '', 'AO7411256', 'Covenant University', 'COVENANT UNIVERSIT. OTA OGUN STATE. NIGERIA', 'political science', '300', '', '07-01-2017', '10-10-2017', '', 'UNITED STATES OF AMERICA AND UNITED ARAB EMIRATES.', '06-23-2017', 'WURAOLA OLOPO', '5735, NORTH MAPLEWOOD CHICAGO. IL 60659', 'POPO-OLANIYAN FUNMILOLA', '2, FATAI LAWAL STREET, OFF AGO PALACE WAY. LAGOS NIGERIA', '2348033075419', 'lolafun65@yahoo.com', 'ADMINISTRATOR', 'I will love to participate in the program because I love to partake in humanitarian activities. I also like to travel and explore. I believe that this opportunity will be a great one for me because I will learn alot. I also like to meet new people and mak', 'My roommate in the university is currently on the program And she has been telling me a lot of good things about it.', '1B3E4BD1', '2016-06-26 00:00:00', 'PENDING', '', 'e7433fa53b5fdc7d6b37a704a95f2a33', 'ACTIVE', 1),
(1572, 'Nigeria', 'Rukayat ', 'Hameed', 'Oyinlola', 'nisolahameed@gmail.com', '8b571b91b4a5d7a1264b3c82398cc8ad', '6', '3', '1998', '18', 'female', 'Nigeria', '4', '16A,holy peace crescent ijaye-ojokoro Lagos.', '08026934798', '09052907759', '', 'A07074152', 'Babcock University', ' Ilishan Remo Ogun State Nigeria', 'Public Health', '2nd Year', '', '06-01-2017', '08-31-2017', '', 'London', '06-24-2019', '', '', 'Mr. Alade Adamson', '16A,holy peace crescent ijaye-ojokoro Lagos.', '08023186991', 'sholaadamson@yahoo.com', 'Building engineer', 'For exposure, to interact with other people and gain valuable experience.', 'Online', 'A33BCE8D', '2016-06-27 00:00:00', 'PENDING', '', '2208a110817403c42b908bb68953c19f', 'ACTIVE', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
