-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2012 at 02:09 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`) VALUES
(1, 'Absolute Legends'),
(2, 'AllNoobsMustDie'),
(3, 'April in Russia'),
(4, 'Copenhagen Wolves'),
(5, 'Counter Logic Gaming'),
(6, 'Darer'),
(7, 'Evil Geniuses'),
(8, 'evodota2'),
(9, 'FnaticRaidCall'),
(10, 'Fos Style'),
(11, 'Gamer University'),
(12, 'i''m creating hope'),
(13, 'iNfernity'),
(15, 'MAKEHASTESLOWLY'),
(16, 'Mortal Teamwork'),
(17, 'Moscow Five'),
(18, 'mousesports'),
(19, 'Natus Vincere'),
(20, 'NEXT eSports'),
(21, 'Nirvana.ua'),
(22, 'Omega Sector Professional League'),
(23, 'PowerRangers'),
(24, 'SGC'),
(25, 'Team Infused'),
(26, 'Team MegashocK'),
(27, 'TeamEmpire'),
(28, 'Virtus.Pro'),
(29, 'youboat.dota'),
(30, 'zNation');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_id` smallint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_team_id_fk` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `team_name`, `team_id`) VALUES
(1, 'Sedoy', 'zNation', 30),
(2, 'Nexus', 'zNation', 30),
(3, 'STALIANER', 'zNation', 30),
(4, 'feelthetrance-', 'zNation', 30),
(5, 'Wekgod19', 'zNation', 30),
(6, 'ksi.od.ua', 'zNation', 30),
(7, 'Bulls.Eye', 'zNation', 30),
(8, 'Mantis', 'NEXT eSports', 20),
(9, 'LuCkzor', 'NEXT eSports', 20),
(10, 'StOrm', 'NEXT eSports', 20),
(11, 'eQual', 'NEXT eSports', 20),
(12, 'cilium', 'NEXT eSports', 20),
(13, 'son1', 'NEXT eSports', 20),
(14, 'rmN-', 'NEXT eSports', 20),
(15, 'BALAZS', 'NEXT eSports', 20),
(16, 'f4n1us', 'PowerRangers', 23),
(17, 'asdl', 'PowerRangers', 23),
(18, 'zhjgfjyhv', 'PowerRangers', 23),
(19, 'arlionw', 'PowerRangers', 23),
(20, 'Raintt', 'PowerRangers', 23),
(21, 'Caramon', 'Counter Logic Gaming', 5),
(22, 'Loda', 'Counter Logic Gaming', 5),
(23, 'Pinoy', 'Counter Logic Gaming', 5),
(24, 'Mirakel', 'Counter Logic Gaming', 5),
(25, 'Pajkatt', 'Counter Logic Gaming', 5),
(26, 'Akke', 'Counter Logic Gaming', 5),
(27, 'euthanasia', 'i''m creating hope', 12),
(28, 'KingR', 'i''m creating hope', 12),
(29, 'foxer-', 'i''m creating hope', 12),
(30, 'DioN', 'i''m creating hope', 12),
(31, 'gram4eg.619', 'i''m creating hope', 12),
(32, 'MeTTpuM', 'i''m creating hope', 12),
(33, 'Sumaru', 'Omega Sector Professional League', 22),
(34, 'RuSYA_TOPOR', 'Omega Sector Professional League', 22),
(35, 'watafaka', 'Omega Sector Professional League', 22),
(36, 'Gosu.Amaz1ng', 'Omega Sector Professional League', 22),
(37, 'Gosu.grace', 'Omega Sector Professional League', 22),
(38, 'drUnk-.beaveR', 'Omega Sector Professional League', 22),
(39, 'Atze', 'Team MegashocK', 26),
(40, 'EvilIsNear', 'Team MegashocK', 26),
(41, 'celdo', 'Team MegashocK', 26),
(42, 'Tayschrenn', 'Team MegashocK', 26),
(43, 'VilleVallo', 'Team MegashocK', 26),
(44, 'bAt-IvO', 'Team MegashocK', 26),
(45, 'Darer', 'Darer', 6),
(46, 'D.Artstyle', 'Darer', 6),
(47, 'Darer.G', 'Darer', 6),
(48, 'Darer.Lacoste', 'Darer', 6),
(49, 'ComeWithMe', 'Darer', 6),
(50, 'freezer', 'Darer', 6),
(51, 'MystresS', 'Copenhagen Wolves', 4),
(52, 'QxGLink', 'Copenhagen Wolves', 4),
(53, 'MaNia-', 'Copenhagen Wolves', 4),
(54, 'miGGel', 'Copenhagen Wolves', 4),
(55, 'QxG.Ryze', 'Copenhagen Wolves', 4),
(56, 'Q.AngeL', 'Copenhagen Wolves', 4),
(57, 'Gumm', 'April in Russia', 3),
(58, 'EnigmaM', 'April in Russia', 3),
(59, 'DRRRRR', 'April in Russia', 3),
(60, 'W1nD', 'April in Russia', 3),
(61, 'Droed', 'April in Russia', 3),
(62, 'DoZeN', 'April in Russia', 3),
(63, 'Rexi', 'mousesports', 18),
(64, 'DeMeNt', 'mousesports', 18),
(65, 'SingSing', 'mousesports', 18),
(66, 'SexyBamboe', 'mousesports', 18),
(67, 'Trixi', 'mousesports', 18),
(68, 'PaisY', 'mousesports', 18),
(69, 'twiSta', 'mousesports', 18),
(70, 'Fire123', 'mousesports', 18),
(71, 'bonzajajaj', 'youboat.dota', 29),
(72, 'Wall-eater', 'youboat.dota', 29),
(73, 'Niqua', 'youboat.dota', 29),
(74, 'Sierrar', 'youboat.dota', 29),
(75, 'kebabdanne', 'youboat.dota', 29),
(76, 'QuiX-', 'youboat.dota', 29),
(77, 'syndereN', 'Mortal Teamwork', 16),
(78, 'ShiBa', 'Mortal Teamwork', 16),
(79, 'Sockshka', 'Mortal Teamwork', 16),
(80, 'Funzii', 'Mortal Teamwork', 16),
(81, '7ckngMad', 'Mortal Teamwork', 16),
(82, 'ALWAYSWANNAFLY', 'TeamEmpire', 27),
(83, 'blowyourbrain', 'TeamEmpire', 27),
(84, 'MyLoveIsMila', 'TeamEmpire', 27),
(85, 'Scandal', 'TeamEmpire', 27),
(86, 'Zaebatsu', 'TeamEmpire', 27),
(87, 'AnahR0niX', 'TeamEmpire', 27),
(88, 'j4m35', 'TeamEmpire', 27),
(89, 'Thon_Mayo', 'SGC', 24),
(90, 'profheadshot', 'SGC', 24),
(91, 'Subrandom', 'SGC', 24),
(92, 'craNich88', 'SGC', 24),
(93, 'Iacek', 'SGC', 24),
(94, 'vrtx-', 'Gamer University', 11),
(95, 'Cr1t-', 'Gamer University', 11),
(96, 'Hyac', 'Gamer University', 11),
(97, 'VuuV', 'Gamer University', 11),
(98, 'AceGOTswag', 'Gamer University', 11),
(99, 'Kragx', 'Gamer University', 11),
(100, 'tasty', 'Gamer University', 11),
(101, 'MiniMiniMini', 'Team Infused', 25),
(102, 'entergodmode', 'Team Infused', 25),
(103, 'Reesion', 'Team Infused', 25),
(104, 'Wagamama', 'Team Infused', 25),
(105, 'Fishboneliquid', 'Team Infused', 25),
(106, 'r3dmagik', 'Team Infused', 25),
(107, 'fnaticStreeT', 'FnaticRaidCall', 9),
(108, 'n0tail', 'FnaticRaidCall', 9),
(109, 'smurfeater1', 'FnaticRaidCall', 9),
(110, 'FnaticRC.Fly', 'FnaticRaidCall', 9),
(111, 'Fnatic.NoVa', 'FnaticRaidCall', 9),
(112, 'ARS-ART', 'Natus Vincere', 19),
(113, 'LighTofHeaveN', 'Natus Vincere', 19),
(114, 'XBOCT', 'Natus Vincere', 19),
(115, 'Puppey', 'Natus Vincere', 19),
(116, 'Dendi', 'Natus Vincere', 19),
(117, 'pIzgogame', 'Moscow Five', 17),
(118, 'BloodAngel', 'Moscow Five', 17),
(119, 'ekvilibriummm', 'Moscow Five', 17),
(120, 'SileEEnt', 'Moscow Five', 17),
(121, 'Admiration', 'Moscow Five', 17),
(122, 'MiSeRyTheSLAYER', 'Evil Geniuses', 7),
(123, 'Maelk', 'Evil Geniuses', 7),
(124, 'Lacoste_', 'Evil Geniuses', 7),
(125, 'DeMoNHuNteR-', 'Evil Geniuses', 7),
(126, 'GoDz', 'Absolute Legends', 1),
(127, 'Bleek', 'Absolute Legends', 1),
(128, 'Godot', 'Absolute Legends', 1),
(129, 'blackshatan', 'Absolute Legends', 1),
(130, 'Snoopy', 'Absolute Legends', 1),
(131, 'xMusiCa', 'Absolute Legends', 1),
(132, 'Volchina', 'Nirvana.ua', 21),
(133, 'RocknRolla', 'Nirvana.ua', 21),
(134, 'Elwind', 'Nirvana.ua', 21),
(135, 'HybridZX', 'Nirvana.ua', 21),
(136, 'pwNakauZa', 'Nirvana.ua', 21),
(137, 'EffectivePlay', 'AllNoobsMustDie', 2),
(138, 'manod', 'AllNoobsMustDie', 2),
(139, 'ssJssjssj', 'AllNoobsMustDie', 2),
(140, 'Rikku', 'AllNoobsMustDie', 2),
(141, 't0ssy', 'MAKEHASTESLOWLY', 15),
(142, 'sane4ka', 'MAKEHASTESLOWLY', 15),
(143, 'Ih8You', 'MAKEHASTESLOWLY', 15),
(144, 'plstq', 'MAKEHASTESLOWLY', 15),
(145, 'raveshka', 'MAKEHASTESLOWLY', 15),
(146, 'Legend', 'MAKEHASTESLOWLY', 15),
(147, 'BlueberryNinja', 'evodota2', 8),
(148, 'GoAudio', 'evodota2', 8),
(149, 'BLABLAFU', 'evodota2', 8),
(150, 'Werne', 'evodota2', 8),
(151, 'Da_SwOOp', 'iNfernity', 13),
(152, 'reebo', 'iNfernity', 13),
(153, 'KillMeiFyOuCaN', 'iNfernity', 13),
(154, 'Vilik', 'iNfernity', 13),
(155, 'gollik', 'iNfernity', 13),
(156, 'idefix_', 'iNfernity', 13),
(157, 'Chliev', 'iNfernity', 13),
(158, 'VzL13', 'Fos Style', 10),
(159, 'oNkilS', 'Fos Style', 10),
(160, 'PrepareForBattle', 'Fos Style', 10),
(161, 'Frozenx', 'Fos Style', 10),
(162, 'st1gma', 'Fos Style', 10),
(163, 'MeganFox', 'Fos Style', 10),
(164, 'vNaniQue', 'Fos Style', 10),
(166, 'VirtusAzen', 'Virtus.Pro', 28),
(167, 'Kuroky-', 'Virtus.Pro', 28),
(168, 'VirtusNS', 'Virtus.Pro', 28),
(169, 'VirtusDread', 'Virtus.Pro', 28),
(170, 'VirtusSanta', 'Virtus.Pro', 28),
(171, 'iam7357', 'Virtus.Pro', 28);

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
