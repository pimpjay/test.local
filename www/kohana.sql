-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 06 2016 г., 13:42
-- Версия сервера: 5.6.30-0ubuntu0.15.10.1
-- Версия PHP: 5.6.11-1ubuntu3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kohana`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL COMMENT 'Идентификатор комментария',
  `post_id` int(10) NOT NULL COMMENT 'Идентификатор статьи',
  `user` varchar(50) NOT NULL COMMENT 'Имя пользователя',
  `message` text NOT NULL COMMENT 'Текст комментария'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user`, `message`) VALUES
(6, 31, 'Мехоил', 'ewrw'),
(8, 31, 'dfgd', 'dfgdfg'),
(10, 32, 'fghfgh', 'fgh'),
(13, 33, 'dfg', 'dfgd'),
(14, 33, 'ыва', 'ываыва'),
(15, 33, 'ываы', 'ываываываыва');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL COMMENT 'Идентификатор статьи',
  `title` varchar(250) NOT NULL COMMENT 'Название статьи',
  `author` varchar(100) NOT NULL COMMENT 'Автор статьи',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата публикации',
  `content_full` text NOT NULL COMMENT 'Полный текст статьи',
  `views` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `date`, `content_full`, `views`) VALUES
(31, 'Lorem ipsum', 'Homer Simpson', '2015-04-29 15:29:02', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.."\r\n', 16),
(32, 'Текст-рыба', 'Аутор', '2016-04-30 13:38:45', 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.', 18),
(33, 'Что ж ты фраер!', 'Мишаня Круг', '2016-05-05 08:44:35', 'Что ж ты фраер!Что ж ты фраер!Что ж ты фраер!Что ж ты фраер!Что ж ты фраер!', 178);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `is_system`, `created`, `updated`) VALUES
(1, 'login', 'Авторизация на сайте', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', 'Администратор', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'acl_test', 'test', 0, '2012-10-01 18:26:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1- Активна учетная запись',
  `active_code` varchar(255) NOT NULL COMMENT 'Код активации',
  `new_pass_code` varchar(255) NOT NULL COMMENT 'Код смены пароля',
  `view_message` datetime NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `active`, `active_code`, `new_pass_code`, `view_message`, `created`, `updated`) VALUES
(1, 'pimpjay@mail.ru', 'admin', 'aac0ee809171c8a6d373b29e6d1ceb15aa4bfe0f59f00c6e44a296b1f70c97ca', 359, 1462418540, 1, '', '', '0000-00-00 00:00:00', '2012-05-18 17:44:45', '2016-05-05 05:09:36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_name` (`name`),
  ADD KEY `is_system` (`is_system`);

--
-- Индексы таблицы `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_username` (`username`),
  ADD UNIQUE KEY `uniq_email` (`email`),
  ADD KEY `active` (`active`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор комментария',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор статьи',AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
