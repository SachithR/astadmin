-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `admin_db`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `all_log`;
CREATE TABLE `all_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `ip` varchar(80) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `all_log` (`id`, `user_id`, `username`, `ip`, `data`, `cdate`) VALUES
(1,	3,	NULL,	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:25:04'),
(2,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:25:35'),
(3,	3,	'admin',	'192.168.1.101',	'Changed music of Queue.conf; Details--> ASasAS;4',	'2023-06-04 15:26:01'),
(4,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:26:03'),
(5,	3,	'admin',	'192.168.1.101',	'Add Context to Queue.conf; Details--> [guure22222]\nwrapuptime=5\nannounce-frequency=0\nannounce-position=yes\nmusicclass=ASasAS\nretry = 0\nqueue-youarenext = \"queue-youarenext\" ; (\"You are now first in line.\") \nqueue-thereare = \"queue-thereare\" ; (\"There are\") \nqueue-callswaiting = \"queue-callswaiting\" ; (\"calls waiting.\") \nqueue-holdtime = \"queue-holdtime\" ; (\"The current est. holdtime is\") \nqueue-minutes = \"queue-minutes\" ; (\"minutes.\") \nqueue-minute = \"queue-minute\" ; (\"minute.\") \nqueue-thankyou = \"queue-thankyou\" ; (\"Thank you for your patience.\") \nmember => Sip/822039@from_gateway_sip\njoinempty=paused,inuse,invalid,unavailable,unknown\nleavewhenempty=inuse,ringing,invalid,unavailable,unknown',	'2023-06-04 15:26:39'),
(6,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:26:41'),
(7,	3,	'admin',	'192.168.1.101',	'Delete Context from Queue.conf; Details--> [guure22222]',	'2023-06-04 15:27:10'),
(8,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:27:12'),
(9,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:32:01'),
(10,	3,	'admin',	'192.168.1.101',	'Delete Context from Extensions.conf; Details--> [guure2222];\nexten => 172,1,Answer\nexten => 172,n,Queue(general,twh)\nexten => 172,n,Queue(QueueTemplate,twh)\nexten => 172,n,Hangup\n\n',	'2023-06-04 15:32:09'),
(11,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:32:11'),
(12,	3,	'admin',	'192.168.1.101',	'Add Context to Extensions.conf; Details--> use Carbon\\Carbon;',	'2023-06-04 15:32:22'),
(13,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:32:23'),
(14,	3,	'admin',	'192.168.1.101',	'Delete Context from Extensions.conf; Details--> [general2];\nexten => 1722,1,Answer\nexten => 1722,n,Queue(general,twh)\nexten => 1722,n,Hangup\n\n\n\n\n\n\n\nuse Carbon\\Carbon;\n\n',	'2023-06-04 15:32:37'),
(15,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:32:38'),
(16,	3,	'admin',	'192.168.1.101',	'Changed Queue from Extensions.conf; Details--> QueueTemplate;10;guure',	'2023-06-04 15:32:51'),
(17,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:32:53'),
(18,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:35:53'),
(19,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:36:17'),
(20,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:37:14'),
(21,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:37:21'),
(22,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:37:25'),
(23,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:37:46'),
(24,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:37:56'),
(25,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:38:07'),
(26,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:38:12'),
(27,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:38:18'),
(28,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:38:36'),
(29,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:38:39'),
(30,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:41:58'),
(31,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:42:10'),
(32,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:42:20'),
(33,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:42:24'),
(34,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:51:01'),
(35,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:51:03'),
(36,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:51:12'),
(37,	3,	'admin',	'192.168.1.101',	'Apply Config',	'2023-06-04 15:51:14'),
(38,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:51:14'),
(39,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:52:52'),
(40,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:52:53'),
(41,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:52:54'),
(42,	3,	'admin',	'192.168.1.101',	'Add Context to Extensions.conf; Details--> [general]\nstatic = yes\nwriteprotect = no\nautofallthrouth= yes\nclearglobalvars=no\npriortyjumping=no',	'2023-06-04 15:53:06'),
(43,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:53:07'),
(44,	3,	'admin',	'192.168.1.101',	'Apply Config',	'2023-06-04 15:53:11'),
(45,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:53:11'),
(46,	3,	'admin',	'192.168.1.101',	'Delete Context from Extensions.conf; Details--> [general];\nstatic = yes\nwriteprotect = no\nautofallthrouth= yes\nclearglobalvars=no\npriortyjumping=no\n\n',	'2023-06-04 15:53:24'),
(47,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:53:26'),
(48,	3,	'admin',	'192.168.1.101',	'Apply Config',	'2023-06-04 15:53:33'),
(49,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 15:53:33'),
(50,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:53:38'),
(51,	3,	'admin',	'192.168.1.101',	'Changed music of Queue.conf; Details--> sasdasdfasf;4',	'2023-06-04 15:53:47'),
(52,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:53:49'),
(53,	3,	'admin',	'192.168.1.101',	'Apply Config',	'2023-06-04 15:53:55'),
(54,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 15:53:55'),
(55,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:00:20'),
(56,	3,	'admin',	'192.168.1.101',	'Changed music of Queue.conf; Details--> asdasd;4',	'2023-06-04 16:00:24'),
(57,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:00:25'),
(58,	3,	'admin',	'192.168.1.101',	'Apply Config; Details-->Dialplan reloaded.\n',	'2023-06-04 16:00:27'),
(59,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:00:27'),
(60,	3,	'admin',	'192.168.1.101',	'Changed music of Queue.conf; Details--> asdasdasd;4',	'2023-06-04 16:00:36'),
(61,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:00:37'),
(62,	3,	'admin',	'192.168.1.101',	'Apply Config; Details-->Dialplan reloaded.\n',	'2023-06-04 16:00:39'),
(63,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:00:39'),
(64,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:00:42'),
(65,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 16:00:48'),
(66,	3,	'admin',	'192.168.1.101',	'Changed Queue from Extensions.conf; Details--> general;10;QueueTemplate',	'2023-06-04 16:00:54'),
(67,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 16:00:55'),
(68,	3,	'admin',	'192.168.1.101',	'Apply Config; Details-->Dialplan reloaded.\n',	'2023-06-04 16:01:01'),
(69,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 16:01:01'),
(70,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 16:03:43'),
(71,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 16:03:47'),
(72,	3,	'admin',	'192.168.1.101',	'View Queue.conf',	'2023-06-04 16:03:51'),
(73,	3,	'admin',	'192.168.1.101',	'View Extensions.conf',	'2023-06-04 16:07:23');

DROP TABLE IF EXISTS `func_data`;
CREATE TABLE `func_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `data` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `func_data` (`id`, `type`, `data`) VALUES
(1,	'x',	'10'),
(2,	'y',	'5'),
(3,	'progress',	'100'),
(6,	'warn',	'0'),
(7,	'amount',	'1524'),
(8,	'total',	'1522'),
(9,	'SIP_CHANNEL_COUNT',	'25'),
(10,	'apply_needed',	'0');

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(45) NOT NULL,
  `form_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `section` (`id`, `section`, `form_name`) VALUES
(1,	'Manage User',	'users'),
(2,	'User Type',	'usertype'),
(3,	'Uer Privilage',	'privilagetype'),
(4,	'Live Report',	'livereport'),
(5,	'Queue Report',	'queuereport'),
(6,	'Queue Profile Report',	'queueprofile'),
(7,	'Queue Detail Report',	'queuedetail'),
(8,	'Abondon Call Report',	'abondoncall'),
(9,	'Break Report',	'breakreport'),
(10,	'Login Logout Report',	'loginlogout'),
(11,	'Activity Report',	'activity'),
(12,	'Call Traffic Report',	'calltraffic'),
(13,	'Call Hangup Report',	'callhangup'),
(14,	'Detail Call Log',	'detailcalllog'),
(15,	'Setting',	'setting'),
(16,	'Upload CSV',	'uploadcsv'),
(17,	'Campaign',	'campaign'),
(18,	'Data Download',	'datadownload'),
(19,	'Schema',	'schema'),
(20,	'Call Recording',	'CallRecording');

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE `user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `sip_id` int(6) DEFAULT NULL,
  `sip_pw` varchar(45) DEFAULT NULL,
  `sip_server` varchar(15) DEFAULT NULL,
  `sip_id_2` int(6) DEFAULT NULL,
  `sip_pw_2` varchar(45) DEFAULT NULL,
  `sip_server_2` varchar(15) DEFAULT NULL,
  `call_direction` enum('IN','OUT','INOUT') DEFAULT NULL,
  `acw_allowed` tinyint(1) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `login_status` tinyint(1) DEFAULT 1,
  `sms` tinyint(1) NOT NULL DEFAULT 0,
  `auto_answer` tinyint(1) NOT NULL DEFAULT 0,
  `recordble` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_master` (`id`, `username`, `password`, `fname`, `lname`, `user_type_id`, `sip_id`, `sip_pw`, `sip_server`, `sip_id_2`, `sip_pw_2`, `sip_server_2`, `call_direction`, `acw_allowed`, `created_date`, `active`, `login_status`, `sms`, `auto_answer`, `recordble`) VALUES
(3,	'admin',	'123',	'admin',	'lm',	4,	101,	'',	'192.168.1.12',	101,	'101',	'192.168.1.1',	'INOUT',	0,	'2017-02-24 03:33:06',	1,	0,	1,	1,	1);

DROP TABLE IF EXISTS `user_privilege`;
CREATE TABLE `user_privilege` (
  `user_type_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `view` tinyint(1) DEFAULT NULL,
  `add` tinyint(1) DEFAULT NULL,
  `edit` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`,`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_privilege` (`user_type_id`, `section_id`, `view`, `add`, `edit`, `delete`) VALUES
(1,	1,	1,	1,	1,	1),
(1,	2,	1,	1,	1,	1),
(1,	9,	0,	0,	0,	0),
(2,	1,	1,	0,	0,	0),
(2,	2,	0,	0,	0,	0),
(2,	4,	1,	1,	1,	1),
(3,	1,	1,	1,	1,	1),
(4,	1,	1,	1,	1,	1),
(4,	2,	1,	1,	1,	1),
(4,	3,	1,	1,	1,	1),
(4,	4,	1,	1,	1,	1),
(4,	5,	1,	1,	1,	1),
(4,	6,	1,	1,	1,	1),
(4,	7,	1,	1,	1,	1),
(4,	8,	1,	1,	1,	1),
(4,	9,	1,	1,	1,	1),
(4,	10,	1,	1,	1,	1),
(4,	11,	1,	1,	1,	1),
(4,	12,	1,	1,	1,	1),
(4,	13,	1,	1,	1,	1),
(4,	14,	1,	1,	1,	1),
(4,	15,	1,	1,	1,	1),
(4,	16,	1,	1,	1,	1),
(4,	17,	1,	1,	1,	1),
(4,	18,	1,	1,	1,	1),
(4,	19,	1,	1,	1,	1),
(4,	20,	1,	1,	1,	1),
(5,	1,	0,	0,	0,	0),
(6,	1,	1,	0,	0,	0),
(6,	4,	1,	1,	1,	1),
(7,	20,	1,	1,	1,	1);

-- 2023-06-04 10:38:47
