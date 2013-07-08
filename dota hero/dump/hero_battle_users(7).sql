-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2012 at 11:15 PM
-- Server version: 5.5.25a
-- PHP Version: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hero_battle`
--

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `team_points_fk` (`score`),
  KEY `team_score` (`score`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `score`) VALUES
(1, 'Absolute Legends', 0),
(2, 'AllNoobsMustDie', 0),
(3, 'April in Russia', 0),
(4, 'Copenhagen Wolves', 0),
(5, 'Counter Logic Gaming', 0),
(6, 'Darer', 0),
(7, 'Evil Geniuses', 0),
(8, 'evodota2', 0),
(9, 'FnaticRaidCall', 0),
(10, 'Fos Style', 0),
(11, 'Gamer University', 0),
(12, 'i''m creating hope', 0),
(13, 'iNfernity', 0),
(15, 'MAKEHASTESLOWLY', 0),
(16, 'Mortal Teamwork', 0),
(17, 'Moscow Five', 0),
(18, 'mousesports', 0),
(19, 'Natus Vincere', 50),
(20, 'NEXT eSports', 0),
(21, 'Nirvana.ua', 0),
(22, 'Omega Sector Professional League', 0),
(23, 'PowerRangers', 0),
(24, 'SGC', 0),
(25, 'Team Infused', 0),
(26, 'Team MegashocK', 0),
(27, 'TeamEmpire', 0),
(28, 'Virtus.Pro', 0),
(29, 'youboat.dota', 0),
(30, 'zNation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_id` smallint(2) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_team_id_fk` (`team_id`),
  KEY `points_fk` (`score`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `team_name`, `team_id`, `score`) VALUES
(1, 'Sedoy', 'zNation', 30, 0),
(2, 'Nexus', 'zNation', 30, 0),
(3, 'STALIANER', 'zNation', 30, 0),
(4, 'feelthetrance-', 'zNation', 30, 0),
(5, 'Wekgod19', 'zNation', 30, 0),
(6, 'ksi.od.ua', 'zNation', 30, 0),
(7, 'Bulls.Eye', 'zNation', 30, 0),
(8, 'Mantis', 'NEXT eSports', 20, 0),
(9, 'LuCkzor', 'NEXT eSports', 20, 0),
(10, 'StOrm', 'NEXT eSports', 20, 0),
(11, 'eQual', 'NEXT eSports', 20, 0),
(12, 'cilium', 'NEXT eSports', 20, 0),
(13, 'son1', 'NEXT eSports', 20, 0),
(14, 'rmN-', 'NEXT eSports', 20, 0),
(15, 'BALAZS', 'NEXT eSports', 20, 0),
(16, 'f4n1us', 'PowerRangers', 23, 0),
(17, 'asdl', 'PowerRangers', 23, 0),
(18, 'zhjgfjyhv', 'PowerRangers', 23, 0),
(19, 'arlionw', 'PowerRangers', 23, 0),
(20, 'Raintt', 'PowerRangers', 23, 0),
(21, 'Caramon', 'Counter Logic Gaming', 5, 0),
(22, 'Loda', 'Counter Logic Gaming', 5, 0),
(23, 'Pinoy', 'Counter Logic Gaming', 5, 0),
(24, 'Mirakel', 'Counter Logic Gaming', 5, 0),
(25, 'Pajkatt', 'Counter Logic Gaming', 5, 0),
(26, 'Akke', 'Counter Logic Gaming', 5, 0),
(27, 'euthanasia', 'i''m creating hope', 12, 0),
(28, 'KingR', 'i''m creating hope', 12, 0),
(29, 'foxer-', 'i''m creating hope', 12, 0),
(30, 'DioN', 'i''m creating hope', 12, 0),
(31, 'gram4eg.619', 'i''m creating hope', 12, 0),
(32, 'MeTTpuM', 'i''m creating hope', 12, 0),
(33, 'Sumaru', 'Omega Sector Professional League', 22, 0),
(34, 'RuSYA_TOPOR', 'Omega Sector Professional League', 22, 0),
(35, 'watafaka', 'Omega Sector Professional League', 22, 0),
(36, 'Gosu.Amaz1ng', 'Omega Sector Professional League', 22, 0),
(37, 'Gosu.grace', 'Omega Sector Professional League', 22, 0),
(38, 'drUnk-.beaveR', 'Omega Sector Professional League', 22, 0),
(39, 'Atze', 'Team MegashocK', 26, 0),
(40, 'EvilIsNear', 'Team MegashocK', 26, 0),
(41, 'celdo', 'Team MegashocK', 26, 0),
(42, 'Tayschrenn', 'Team MegashocK', 26, 0),
(43, 'VilleVallo', 'Team MegashocK', 26, 0),
(44, 'bAt-IvO', 'Team MegashocK', 26, 0),
(45, 'Darer', 'Darer', 6, 0),
(46, 'D.Artstyle', 'Darer', 6, 0),
(47, 'Darer.G', 'Darer', 6, 0),
(48, 'Darer.Lacoste', 'Darer', 6, 0),
(49, 'ComeWithMe', 'Darer', 6, 0),
(50, 'freezer', 'Darer', 6, 0),
(51, 'MystresS', 'Copenhagen Wolves', 4, 0),
(52, 'QxGLink', 'Copenhagen Wolves', 4, 0),
(53, 'MaNia-', 'Copenhagen Wolves', 4, 0),
(54, 'miGGel', 'Copenhagen Wolves', 4, 0),
(55, 'QxG.Ryze', 'Copenhagen Wolves', 4, 0),
(56, 'Q.AngeL', 'Copenhagen Wolves', 4, 0),
(57, 'Gumm', 'April in Russia', 3, 0),
(58, 'EnigmaM', 'April in Russia', 3, 0),
(59, 'DRRRRR', 'April in Russia', 3, 0),
(60, 'W1nD', 'April in Russia', 3, 0),
(61, 'Droed', 'April in Russia', 3, 0),
(62, 'DoZeN', 'April in Russia', 3, 0),
(63, 'Rexi', 'mousesports', 18, 0),
(64, 'DeMeNt', 'mousesports', 18, 0),
(65, 'SingSing', 'mousesports', 18, 0),
(66, 'SexyBamboe', 'mousesports', 18, 0),
(67, 'Trixi', 'mousesports', 18, 0),
(68, 'PaisY', 'mousesports', 18, 0),
(69, 'twiSta', 'mousesports', 18, 0),
(70, 'Fire123', 'mousesports', 18, 0),
(71, 'bonzajajaj', 'youboat.dota', 29, 0),
(72, 'Wall-eater', 'youboat.dota', 29, 0),
(73, 'Niqua', 'youboat.dota', 29, 0),
(74, 'Sierrar', 'youboat.dota', 29, 0),
(75, 'kebabdanne', 'youboat.dota', 29, 0),
(76, 'QuiX-', 'youboat.dota', 29, 0),
(77, 'syndereN', 'Mortal Teamwork', 16, 0),
(78, 'ShiBa', 'Mortal Teamwork', 16, 0),
(79, 'Sockshka', 'Mortal Teamwork', 16, 0),
(80, 'Funzii', 'Mortal Teamwork', 16, 0),
(81, '7ckngMad', 'Mortal Teamwork', 16, 0),
(82, 'ALWAYSWANNAFLY', 'TeamEmpire', 27, 0),
(83, 'blowyourbrain', 'TeamEmpire', 27, 0),
(84, 'MyLoveIsMila', 'TeamEmpire', 27, 0),
(85, 'Scandal', 'TeamEmpire', 27, 0),
(86, 'Zaebatsu', 'TeamEmpire', 27, 0),
(87, 'AnahR0niX', 'TeamEmpire', 27, 0),
(88, 'j4m35', 'TeamEmpire', 27, 0),
(89, 'Thon_Mayo', 'SGC', 24, 0),
(90, 'profheadshot', 'SGC', 24, 0),
(91, 'Subrandom', 'SGC', 24, 0),
(92, 'craNich88', 'SGC', 24, 0),
(93, 'Iacek', 'SGC', 24, 0),
(94, 'vrtx-', 'Gamer University', 11, 0),
(95, 'Cr1t-', 'Gamer University', 11, 0),
(96, 'Hyac', 'Gamer University', 11, 0),
(97, 'VuuV', 'Gamer University', 11, 0),
(98, 'AceGOTswag', 'Gamer University', 11, 0),
(99, 'Kragx', 'Gamer University', 11, 0),
(100, 'tasty', 'Gamer University', 11, 0),
(101, 'MiniMiniMini', 'Team Infused', 25, 0),
(102, 'entergodmode', 'Team Infused', 25, 0),
(103, 'Reesion', 'Team Infused', 25, 0),
(104, 'Wagamama', 'Team Infused', 25, 0),
(105, 'Fishboneliquid', 'Team Infused', 25, 0),
(106, 'r3dmagik', 'Team Infused', 25, 0),
(107, 'fnaticStreeT', 'FnaticRaidCall', 9, 0),
(108, 'n0tail', 'FnaticRaidCall', 9, 0),
(109, 'smurfeater1', 'FnaticRaidCall', 9, 0),
(110, 'FnaticRC.Fly', 'FnaticRaidCall', 9, 0),
(111, 'Fnatic.NoVa', 'FnaticRaidCall', 9, 0),
(112, 'ARS-ART', 'Natus Vincere', 19, 1),
(113, 'LighTofHeaveN', 'Natus Vincere', 19, 4),
(114, 'XBOCT', 'Natus Vincere', 19, 9),
(115, 'Puppey', 'Natus Vincere', 19, 21),
(116, 'Dendi', 'Natus Vincere', 19, 15),
(117, 'pIzgogame', 'Moscow Five', 17, 0),
(118, 'BloodAngel', 'Moscow Five', 17, 0),
(119, 'ekvilibriummm', 'Moscow Five', 17, 0),
(120, 'SileEEnt', 'Moscow Five', 17, 0),
(121, 'Admiration', 'Moscow Five', 17, 0),
(122, 'MiSeRyTheSLAYER', 'Evil Geniuses', 7, 0),
(123, 'Maelk', 'Evil Geniuses', 7, 0),
(124, 'Lacoste_', 'Evil Geniuses', 7, 0),
(125, 'DeMoNHuNteR-', 'Evil Geniuses', 7, 0),
(126, 'GoDz', 'Absolute Legends', 1, 0),
(127, 'Bleek', 'Absolute Legends', 1, 0),
(128, 'Godot', 'Absolute Legends', 1, 0),
(129, 'blackshatan', 'Absolute Legends', 1, 0),
(130, 'Snoopy', 'Absolute Legends', 1, 0),
(131, 'xMusiCa', 'Absolute Legends', 1, 0),
(132, 'Volchina', 'Nirvana.ua', 21, 0),
(133, 'RocknRolla', 'Nirvana.ua', 21, 0),
(134, 'Elwind', 'Nirvana.ua', 21, 0),
(135, 'HybridZX', 'Nirvana.ua', 21, 0),
(136, 'pwNakauZa', 'Nirvana.ua', 21, 0),
(137, 'EffectivePlay', 'AllNoobsMustDie', 2, 0),
(138, 'manod', 'AllNoobsMustDie', 2, 0),
(139, 'ssJssjssj', 'AllNoobsMustDie', 2, 0),
(140, 'Rikku', 'AllNoobsMustDie', 2, 0),
(141, 't0ssy', 'MAKEHASTESLOWLY', 15, 0),
(142, 'sane4ka', 'MAKEHASTESLOWLY', 15, 0),
(143, 'Ih8You', 'MAKEHASTESLOWLY', 15, 0),
(144, 'plstq', 'MAKEHASTESLOWLY', 15, 0),
(145, 'raveshka', 'MAKEHASTESLOWLY', 15, 0),
(146, 'Legend', 'MAKEHASTESLOWLY', 15, 0),
(147, 'BlueberryNinja', 'evodota2', 8, 0),
(148, 'GoAudio', 'evodota2', 8, 0),
(149, 'BLABLAFU', 'evodota2', 8, 0),
(150, 'Werne', 'evodota2', 8, 0),
(151, 'Da_SwOOp', 'iNfernity', 13, 0),
(152, 'reebo', 'iNfernity', 13, 0),
(153, 'KillMeiFyOuCaN', 'iNfernity', 13, 0),
(154, 'Vilik', 'iNfernity', 13, 0),
(155, 'gollik', 'iNfernity', 13, 0),
(156, 'idefix_', 'iNfernity', 13, 0),
(157, 'Chliev', 'iNfernity', 13, 0),
(158, 'VzL13', 'Fos Style', 10, 0),
(159, 'oNkilS', 'Fos Style', 10, 0),
(160, 'PrepareForBattle', 'Fos Style', 10, 0),
(161, 'Frozenx', 'Fos Style', 10, 0),
(162, 'st1gma', 'Fos Style', 10, 0),
(163, 'MeganFox', 'Fos Style', 10, 0),
(164, 'vNaniQue', 'Fos Style', 10, 0),
(166, 'VirtusAzen', 'Virtus.Pro', 28, 0),
(167, 'Kuroky-', 'Virtus.Pro', 28, 0),
(168, 'VirtusNS', 'Virtus.Pro', 28, 0),
(169, 'VirtusDread', 'Virtus.Pro', 28, 0),
(170, 'VirtusSanta', 'Virtus.Pro', 28, 0),
(171, 'iam7357', 'Virtus.Pro', 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote_doter`
--

CREATE TABLE IF NOT EXISTS `vote_doter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_ip` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `doter_user_id_fk` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `vote_doter`
--

INSERT INTO `vote_doter` (`id`, `user_id`, `user_ip`, `created_at`) VALUES
(14, 115, 2130706433, '2012-07-25 20:14:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
