-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 07 2022 г., 11:42
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id_book`, `title`, `author`, `year`) VALUES
(1, 'Чорна рада', 'Пантелеймон Куліш', '1857 рік'),
(4, 'Фактор Черчилля', 'Борис Джонсон', '2022 рік'),
(5, 'Дюна', 'Френк Герберт', '2021 рік'),
(6, 'Імперія Ангелів', 'Бернар Вербер', '2020 рік'),
(7, 'Загадка 622 номера', 'Жоель Діккер', '2021 рік'),
(8, 'Ідеальна незнайомка', 'Меган Міранда', '2021 рік');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id_genre`, `genre`) VALUES
(3, 'Детектив'),
(5, 'Фантастика'),
(7, 'Історичний');

-- --------------------------------------------------------

--
-- Структура таблицы `issues`
--

CREATE TABLE `issues` (
  `id_issue` int(11) NOT NULL,
  `name_issue` varchar(255) NOT NULL,
  `genre_issue` varchar(255) NOT NULL,
  `book_issue` varchar(255) NOT NULL,
  `date_out` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `date_in` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `issues`
--

INSERT INTO `issues` (`id_issue`, `name_issue`, `genre_issue`, `book_issue`, `date_out`, `status`, `date_in`) VALUES
(30, 'Сергій Мельничук', 'Історичний', 'Чорна рада', '2022-11-07 10:38:59', 1, '2022-11-07 10:39:34'),
(31, 'Олег Лунін', 'Фантастика', 'Імперія Ангелів', '2022-11-07 10:39:15', 1, '2022-11-07 10:39:24'),
(33, 'Іван Петренко', 'Фантастика', 'Дюна', '2022-11-07 10:41:09', 0, NULL),
(34, 'Юрій Шевчук', 'Детектив', 'Загадка 622 номера', '2022-11-07 10:41:22', 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `email`, `phone`) VALUES
(20, 'Іван Петренко', 'ivan@gmail.com', '0993727722'),
(22, 'Юрій Шевчук', 'yuri@gmail.com', '0993822009'),
(25, 'Олег Лунін', 'oleg@gmail.com', '0673992115'),
(26, 'Сергій Мельничук', 'serhiy@gmail.com', '0634455000');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id_issue`);

--
-- Индексы таблицы `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `issues`
--
ALTER TABLE `issues`
  MODIFY `id_issue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
