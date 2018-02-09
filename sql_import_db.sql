-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2018 г., 08:57
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `verna`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agency`
--

CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `agency_network_id` int(11) NOT NULL,
  `agency_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `agency`
--

INSERT INTO `agency` (`id`, `agency_id`, `agency_network_id`, `agency_name`) VALUES
(1, 1, 1, 'Верна\r'),
(2, 2, 1, 'Росгосстрах\r'),
(3, 3, 2, 'ВСК\r'),
(4, 4, 2, 'Ингосстрах'),
(5, 1, 1, 'Верна\r'),
(6, 2, 1, 'Росгосстрах\r'),
(7, 3, 2, 'ВСК\r'),
(8, 4, 2, 'Ингосстрах'),
(9, 1, 1, 'Верна\r'),
(10, 2, 1, 'Росгосстрах\r'),
(11, 3, 2, 'ВСК\r'),
(12, 4, 2, 'Ингосстрах');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
