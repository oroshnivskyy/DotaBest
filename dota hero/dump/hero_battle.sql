-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 22 2012 г., 18:40
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `hero_battle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `user_ip` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `hero`
--

CREATE TABLE IF NOT EXISTS `hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Дамп данных таблицы `hero`
--

INSERT INTO `hero` (`id`, `name`, `image`, `title`, `description`) VALUES
(1, 'Alchemist', 'http://www.dota2wiki.com/images/5/5b/Alchemist.png', 'Тайтл', 'Дескріпшин'),
(2, 'Earthshaker', 'http://www.dota2wiki.com/images/b/bd/Earthshaker.png', 'тайтл пудж', 'Дескрипшин пудж'),
(3, 'Axe', 'http://www.dota2wiki.com/images/f/fb/Axe.png', 'Тайтл Юрнеро', 'Дескрипшин Юрнеро'),
(4, 'Sven', 'http://www.dota2wiki.com/images/d/dd/Sven.png', 'Тайтл Лешиий', 'Дескрипшин Леший'),
(5, 'Pudge', 'http://www.dota2wiki.com/images/9/9f/Pudge.png', '', ''),
(6, 'Tiny', 'http://www.dota2wiki.com/images/7/75/Tiny.png', '', ''),
(7, 'Sand King', 'http://www.dota2wiki.com/images/2/2c/Sand_King.png', '', ''),
(8, 'Slardar', 'http://www.dota2wiki.com/images/7/7b/Slardar.png', '', ''),
(9, 'Kunkka', 'http://www.dota2wiki.com/images/8/89/Kunkka.png', '', ''),
(10, 'Tidehunter', 'http://www.dota2wiki.com/images/6/6c/Tidehunter.png', '', ''),
(11, 'Beastmaster', 'http://www.dota2wiki.com/images/d/d6/Beastmaster.png', '', ''),
(12, 'Dragon Knight', 'http://www.dota2wiki.com/images/4/4e/Dragon_Knight.png', '', ''),
(13, 'Skeleton King', 'http://www.dota2wiki.com/images/f/fc/Skeleton_King.png', '', ''),
(14, 'Lifestealer', 'http://www.dota2wiki.com/images/6/65/Lifestealer.png', '', ''),
(15, 'Clockwerk', 'http://www.dota2wiki.com/images/b/b3/Clockwerk.png', '', ''),
(16, 'Omniknight', 'http://www.dota2wiki.com/images/a/ab/Omniknight.png', '', ''),
(17, 'Night Stalker', 'http://www.dota2wiki.com/images/b/bb/Night_Stalker.png', '', ''),
(18, 'Huskar', 'http://www.dota2wiki.com/images/2/2b/Huskar.png', '', ''),
(19, 'Doom Bringer', 'http://www.dota2wiki.com/images/a/a9/Doom_Bringer.png', '', ''),
(20, 'Spirit Breaker', 'http://www.dota2wiki.com/images/8/82/Spirit_Breaker.png', '', ''),
(21, 'Brewmaster', 'http://www.dota2wiki.com/images/4/43/Brewmaster.png', '', ''),
(22, 'Lycanthrope', 'http://www.dota2wiki.com/images/c/c1/Lycanthrope.png', '', ''),
(23, 'Chaos Knight', 'http://www.dota2wiki.com/images/c/cf/Chaos_Knight.png', '', ''),
(24, 'Treant Protector', 'http://www.dota2wiki.com/images/1/18/Treant_Protector.png', '', ''),
(25, 'Undying', 'http://www.dota2wiki.com/images/0/0d/Undying.png', '', ''),
(26, 'Wisp', 'http://www.dota2wiki.com/images/e/e7/Wisp.png', '', ''),
(27, 'Anti-Mage', 'http://www.dota2wiki.com/images/e/ef/Anti-Mage.png', '', ''),
(28, 'Bloodseeker', 'http://www.dota2wiki.com/images/1/1e/Bloodseeker.png', '', ''),
(29, 'Drow Ranger', 'http://www.dota2wiki.com/images/3/36/Drow_Ranger.png', '', ''),
(30, 'Shadow Fiend', 'http://www.dota2wiki.com/images/7/71/Shadow_Fiend.png', '', ''),
(31, 'Razor', 'http://www.dota2wiki.com/images/a/a0/Razor.png', '', ''),
(32, 'Juggernaut', 'http://www.dota2wiki.com/images/0/07/Juggernaut.png', '', ''),
(33, 'Venomancer', 'http://www.dota2wiki.com/images/f/f0/Venomancer.png', '', ''),
(34, 'Mirana', 'http://www.dota2wiki.com/images/f/f9/Mirana.png', '', ''),
(35, 'Morphling', 'http://www.dota2wiki.com/images/7/7f/Morphling.png', '', ''),
(36, 'Faceless Void', 'http://www.dota2wiki.com/images/0/03/Faceless_Void.png', '', ''),
(37, 'Phantom Lancer', 'http://www.dota2wiki.com/images/5/51/Phantom_Lancer.png', '', ''),
(38, 'Phantom Assassin', 'http://www.dota2wiki.com/images/f/f0/Phantom_Assassin.png', '', ''),
(39, 'Vengeful Spirit', 'http://www.dota2wiki.com/images/7/78/Vengeful_Spirit.png', '', ''),
(40, 'Viper', 'http://www.dota2wiki.com/images/9/99/Viper.png', '', ''),
(41, 'Riki', 'http://www.dota2wiki.com/images/3/39/Riki.png', '', ''),
(42, 'Clinkz', 'http://www.dota2wiki.com/images/9/9c/Clinkz.png', '', ''),
(43, 'Broodmother', 'http://www.dota2wiki.com/images/1/19/Broodmother.png', '', ''),
(44, 'Sniper', 'http://www.dota2wiki.com/images/8/8f/Sniper.png', '', ''),
(45, 'Templar Assassin', 'http://www.dota2wiki.com/images/2/27/Templar_Assassin.png', '', ''),
(46, 'Weaver', 'http://www.dota2wiki.com/images/c/c3/Weaver.png', '', ''),
(47, 'Spectre', 'http://www.dota2wiki.com/images/9/90/Spectre.png', '', ''),
(48, 'Luna', 'http://www.dota2wiki.com/images/1/13/Luna.png', '', ''),
(49, 'Bounty Hunter', 'http://www.dota2wiki.com/images/1/1d/Bounty_Hunter.png', '', ''),
(50, 'Ursa', 'http://www.dota2wiki.com/images/a/a6/Ursa.png', '', ''),
(51, 'Gyrocopter', 'http://www.dota2wiki.com/images/5/5d/Gyrocopter.png', '', ''),
(52, 'Lone_Druid', 'http://www.dota2wiki.com/images/3/3d/Lone_Druid.png', '', ''),
(53, 'Naga Siren', 'http://www.dota2wiki.com/images/d/d5/Naga_Siren.png', '', ''),
(54, 'Crystal Maiden', 'http://www.dota2wiki.com/images/1/10/Crystal_Maiden.png', '', ''),
(55, 'Bane', 'http://www.dota2wiki.com/images/9/9a/Bane.png', '', ''),
(56, 'Lich', 'http://www.dota2wiki.com/images/8/86/Lich.png', '', ''),
(57, 'Puck', 'http://www.dota2wiki.com/images/b/b6/Puck.png', '', ''),
(58, 'Lion', 'http://www.dota2wiki.com/images/4/47/Lion.png', '', ''),
(59, 'Storm Spirit', 'http://www.dota2wiki.com/images/2/25/Storm_Spirit.png', '', ''),
(60, 'Witch Doctor', 'http://www.dota2wiki.com/images/a/ac/Witch_Doctor.png', '', ''),
(61, 'Windrunner', 'http://www.dota2wiki.com/images/e/e2/Windrunner.png', '', ''),
(62, 'Zeus', 'http://www.dota2wiki.com/images/3/3c/Zeus.png', '', ''),
(63, 'Enigma', 'http://www.dota2wiki.com/images/8/8b/Enigma.png', '', ''),
(64, 'Necrolyte', 'http://www.dota2wiki.com/images/7/7d/Necrolyte.png', '', ''),
(65, 'Lina', 'http://www.dota2wiki.com/images/e/ec/Lina.png', '', ''),
(66, 'Warlock', 'http://www.dota2wiki.com/images/5/51/Warlock.png', '', ''),
(67, 'Shadow Shaman', 'http://www.dota2wiki.com/images/1/11/Shadow_Shaman.png', '', ''),
(68, 'Queen of Pain', 'http://www.dota2wiki.com/images/b/b5/Queen_of_Pain.png', '', ''),
(69, 'Tinker', 'http://www.dota2wiki.com/images/e/ec/Tinker.png', '', ''),
(70, 'Death Prophet', 'http://www.dota2wiki.com/images/5/52/Death_Prophet.png', '', ''),
(71, 'Nature Prophet', 'http://www.dota2wiki.com/images/a/aa/Nature%27s_Prophet.png', '', ''),
(72, 'Pugna', 'http://www.dota2wiki.com/images/1/1a/Pugna.png', '', ''),
(73, 'Enchantress', 'http://www.dota2wiki.com/images/9/99/Enchantress.png', '', ''),
(74, 'Jakiro', 'http://www.dota2wiki.com/images/1/1d/Jakiro.png', '', ''),
(75, 'Dazzle', 'http://www.dota2wiki.com/images/7/74/Dazzle.png', '', ''),
(76, 'Leshrac', 'http://www.dota2wiki.com/images/e/e9/Leshrac.png', '', ''),
(77, 'Chen', 'http://www.dota2wiki.com/images/8/80/Chen.png', '', ''),
(78, 'Silencer', 'http://www.dota2wiki.com/images/4/43/Silencer.png', '', ''),
(79, 'Dark Seer', 'http://www.dota2wiki.com/images/f/f7/Dark_Seer.png', '', ''),
(80, 'Ogre Magi', 'http://www.dota2wiki.com/images/a/ae/Ogre_Magi.png', '', ''),
(81, 'Batrider', 'http://www.dota2wiki.com/images/5/5e/Batrider.png', '', ''),
(82, 'Ancient Apparition', 'http://www.dota2wiki.com/images/b/b1/Ancient_Apparition.png', '', ''),
(83, 'Rubick', 'http://www.dota2wiki.com/images/3/37/Rubick.png', '', ''),
(84, 'Disruptor', 'http://www.dota2wiki.com/images/c/ce/Disruptor.png', '', ''),
(85, 'Invoker', 'http://www.dota2wiki.com/images/3/39/Invoker.png', '', ''),
(86, 'Outworld Destroyer', 'http://www.dota2wiki.com/images/8/86/Outworld_Destroyer.png', '', ''),
(87, 'Shadow Demon', 'http://www.dota2wiki.com/images/9/9d/Shadow_Demon.png', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `hero_battles`
--

CREATE TABLE IF NOT EXISTS `hero_battles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hero_id_a` int(11) NOT NULL,
  `hero_id_b` int(11) NOT NULL,
  `score_a` int(11) NOT NULL,
  `score_b` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_updated_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `vote_user`
--

CREATE TABLE IF NOT EXISTS `vote_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hero_battles_id` int(11) NOT NULL,
  `choose` tinyint(2) NOT NULL,
  `user_ip` bigint(20) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
