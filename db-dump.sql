-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2013 г., 19:27
-- Версия сервера: 5.1.67-community-log
-- Версия PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `proxy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Структура таблицы `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `question_id` int(5) NOT NULL,
  `our` tinyint(1) NOT NULL,
  `user_read` tinyint(1) NOT NULL DEFAULT '0',
  `admin_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `message`, `date`, `question_id`, `our`, `user_read`, `admin_read`) VALUES
(16, 'Это сообщение пользователя. Здесь он жалуется на какую-то хрень, надеется что ему скоро ответят.', '2013-01-16 02:43:20', 29, 0, 0, 0),
(17, 'Время идёт, а ему так и не ответили... Пользователь начинает злиться, топать ногами и биться головой об клавиатуру.', '2013-01-16 02:44:02', 29, 0, 0, 0),
(18, 'Это сообщение находится в теме "Тестирование". Написал его обычный пользователь.', '2013-01-16 04:40:25', 30, 0, 0, 1),
(19, 'аыафыаыафафаыы', '2013-01-16 05:39:19', 30, 1, 0, 1),
(20, 'ыаыаыае3е32пвпвп', '2013-01-16 05:39:37', 30, 0, 0, 1),
(21, '123', '2013-01-16 18:06:56', 30, 0, 0, 1),
(22, 'Ппц как долго', '2013-01-16 18:07:06', 30, 0, 0, 1),
(23, '111', '2013-01-16 18:10:57', 30, 0, 0, 1),
(24, 'Мы решим вашу проблему', '2013-01-16 18:13:00', 30, 0, 0, 1),
(25, 'Мы решим вашу проблему', '2013-01-16 18:13:21', 30, 0, 0, 1),
(26, 'Мы решим вашу проблему', '2013-01-16 18:14:16', 30, 1, 0, 1),
(27, 'Как так?', '2013-01-16 18:15:06', 31, 0, 1, 1),
(28, 'Спиздили', '2013-01-16 18:19:56', 31, 1, 1, 1),
(29, 'ОТписываюсь дизлайк!', '2013-01-16 18:24:44', 31, 0, 1, 1),
(30, 'fqwf', '2013-01-16 19:41:52', 32, 0, 1, 0),
(31, 'пупцупцупцпупц', '2013-01-16 20:44:14', 32, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tariff_id` int(6) NOT NULL,
  `user_id` int(5) NOT NULL,
  `begin_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `tariff_id`, `user_id`, `begin_date`, `end_date`) VALUES
(1, 0, 3, '2013-01-20 21:29:17', '2013-01-21 21:29:17');

-- --------------------------------------------------------

--
-- Структура таблицы `proxy`
--

CREATE TABLE IF NOT EXISTS `proxy` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `order_id` int(6) NOT NULL DEFAULT '0',
  `speed` double NOT NULL DEFAULT '0',
  `country` varchar(255) NOT NULL DEFAULT 'N/A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `proxy`
--

INSERT INTO `proxy` (`id`, `address`, `order_id`, `speed`, `country`) VALUES
(1, 'dsgsdgsdgsdgsdg', 0, 24, 'brebeb'),
(2, 'gdgdg', 0, 2445, 'аупуп'),
(3, 'egegeg', 0, 55, 'vcvdv'),
(4, 'dfsfsfs', 0, 53535, 'gdsgdsgsdg'),
(5, 'dgsdgsdgdg', 0, 35353, 'fdsfsdf'),
(6, 'sfds3ss', 0, 332, 'sdfsdf'),
(7, 'dfsfdsf', 0, 333, 'dsq'),
(8, 'qwqyyy', 0, 352, 'qrqrss'),
(9, 'eghhh', 0, 22, 'qewesx'),
(10, 'jhjghngn', 0, 245, 'dsgsdg');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL COMMENT 'Время создания обращения',
  `user_id` int(5) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `date`, `user_id`, `topic`, `closed`) VALUES
(29, '2013-01-16 02:43:20', 36, 'Проверка', 1),
(30, '2013-01-16 04:40:25', 36, 'Тестирование', 1),
(31, '2013-01-16 18:15:06', 3, 'Ебать деньги пропали!', 1),
(32, '2013-01-16 19:41:52', 3, 'qwfqw', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tariff`
--

CREATE TABLE IF NOT EXISTS `tariff` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `count` int(6) NOT NULL,
  `price` double NOT NULL,
  `period` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `tariff`
--

INSERT INTO `tariff` (`id`, `count`, `price`, `period`) VALUES
(1, 10, 3, 1),
(2, 25, 6, 1),
(3, 50, 15, 1),
(4, 100, 25, 1),
(5, 250, 50, 1),
(6, 10, 25, 7),
(7, 25, 50, 7),
(8, 50, 75, 7),
(9, 100, 100, 7),
(10, 250, 200, 7),
(11, 500, 350, 7),
(12, 10, 75, 30),
(13, 25, 150, 30),
(14, 50, 250, 30),
(15, 100, 500, 30),
(16, 250, 750, 30),
(17, 500, 1200, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, '\0\0', 'administrator', 'ba4b484191e5a9ce7f646be7579e53e5b10b1d96', '9462e8eee0', 'fr05t1k4@gmail.com', '85244b0a3a28d2b1f44b87cb6b41337ced8f5f9c', NULL, NULL, NULL, 1268889823, 1358358204, 0),
(3, '\0\0', '', '064c2ffba30032164be1f0dd6ca1559f2ac33148', NULL, 'fr05t1k@inbox.ru', NULL, NULL, NULL, '0d59a873de1d00ae1503a25e01b86c00cfcf59a9', 1357392145, 1358702301, 1),
(4, '\0\0', '', 'c3d28ace568a2b928559f3ef171420ebb164b0cd', NULL, 'fr05t1k5@gmail.com', NULL, NULL, NULL, NULL, 1357405701, 1357405764, 1),
(5, '\0\0', '', '33ea5b9d72f34b1320ed0ec03b33f5c8bef106c3', NULL, 'fr05t1k@inbox.rtu', NULL, NULL, NULL, NULL, 1357478376, 1357478376, 1),
(28, '0', '', 'ef8209ac1795375b1f7bddd4874ae7f5cbcb0a69', NULL, 'fr05t1k@ya.ru', 'c607671ad5f28d7792eb9c1604471c220440328e', NULL, NULL, NULL, 1358272517, 1358272517, 0),
(30, '0', '', 'ad580783bf7b7d0a336c02051f1a6b0c6adbb1a6', NULL, 'fr05t1k13@my.com', '20b315e86044710ca34cc41a3295647d0bad60c6', NULL, NULL, NULL, 1358272727, 1358272727, 0),
(31, '0', '', 'ede95e48705fa081eac1c58ac9c1cc820e625be0', NULL, 'qwfqw@mail.com', 'f36776e681d1bb81329f809bb167eb77897d48a7', NULL, NULL, NULL, 1358272814, 1358272814, 0),
(32, '0', '', '819149dbb39a920dd210f7d4ee0e2bd110d715e7', NULL, 'fr05t1k41@gmail.com', '5d782ab1cf4116f022cc3a2bc4331fbd1328d720', NULL, NULL, NULL, 1358273345, 1358273345, 0),
(33, '0', '', '71f40a48a81e40caa05e70e5746f78c41e7573dc', NULL, 'fr05t1k412@gmail.com', 'df4eb127782c42eeb5779bd2ca5eadd66d949c0a', NULL, NULL, NULL, 1358273409, 1358273409, 0),
(34, '0', '', '4e12d7a4e91a04dd77ccb666c140e6cf31e4f1a4', NULL, 'fr05t1k4124@gmail.com', NULL, NULL, NULL, NULL, 1358273445, 1358273445, 1),
(35, '\0\0', '', '8ed067ff6ec4f2f211998a099ec364c0ae819f02', NULL, 'alex_uralsk142@mail.ru', '98b747aaf5e7ab46da4fbc4f47539260988eaa5b', NULL, NULL, NULL, 1358273600, 1358273600, 0),
(36, '\0\0', '', 'efc8b92169bc2762a0db165d3fba2aac9c44606d', NULL, 'alex_uralsk14@mail.ru', NULL, NULL, NULL, '82d31f72d17a17140d4e44e0cef2c6442df950f1', 1358286111, 1358693821, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 27, 1),
(7, 28, 2),
(8, 29, 2),
(9, 30, 2),
(10, 31, 2),
(11, 32, 2),
(12, 33, 2),
(13, 34, 2),
(14, 35, 2),
(15, 36, 1);
CREATE TABLE `operations` (
    `id` int(11) NOT NULL auto_increment,
    `sum` decimal default NULL,
    `user_id` int(11) default NULL,
    `status` int(11) default 0,
    `type` varchar(64) default NULL,
    `comment` varchar(255) default NULL,
    `description` varchar(255) default NULL,
    `date` datetime default NULL,
    PRIMARY KEY  (`id`)
  ) DEFAULT CHARSET=utf8;

  CREATE TABLE `balances` (
    `id` int(11) NOT NULL,
    `sum` decimal default NULL,
    `date` datetime default NULL,
    PRIMARY KEY  (`id`)
  ) DEFAULT CHARSET=utf8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
