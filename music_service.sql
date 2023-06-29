-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 29 2023 г., 11:17
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `music_service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adding_in_album`
--

CREATE TABLE `adding_in_album` (
  `ID_adding_in_album` int NOT NULL,
  `ID_albums` int DEFAULT NULL,
  `ID_track` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `adding_in_album`
--

INSERT INTO `adding_in_album` (`ID_adding_in_album`, `ID_albums`, `ID_track`) VALUES
(1, 2, 2),
(2, 1, 1),
(3, 3, 19),
(5, 3, 1),
(12, 4, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `adding_in_favorite`
--

CREATE TABLE `adding_in_favorite` (
  `ID_adding_in_favorite` int NOT NULL,
  `ID_favorite` int DEFAULT NULL,
  `ID_track` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `adding_in_favorite`
--

INSERT INTO `adding_in_favorite` (`ID_adding_in_favorite`, `ID_favorite`, `ID_track`) VALUES
(9, 1, 1),
(12, 1, 1),
(14, 1, 1),
(15, 1, 1),
(18, 1, 21),
(19, 1, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `adding_to_a_playlist`
--

CREATE TABLE `adding_to_a_playlist` (
  `ID_adding_to_a_playlist` int NOT NULL,
  `ID_playlists` int DEFAULT NULL,
  `ID_track` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `adding_to_a_playlist`
--

INSERT INTO `adding_to_a_playlist` (`ID_adding_to_a_playlist`, `ID_playlists`, `ID_track`) VALUES
(1, 3, 1),
(3, 1, 19),
(4, 6, 1),
(8, 1, 1),
(9, 4, 19),
(10, 1, 1),
(11, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `ID_albums` int NOT NULL,
  `album_name` varchar(160) DEFAULT NULL,
  `ID_musician` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`ID_albums`, `album_name`, `ID_musician`) VALUES
(1, 'ping page 404', 1),
(2, 'OTSasaka', 1),
(3, 'фывфвы', 1),
(4, 'Зомби Таун 6', 4),
(6, 'всем привет с вами крипер 2004', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite`
--

CREATE TABLE `favorite` (
  `ID_favorite` int NOT NULL,
  `favorite_photo` varchar(160) DEFAULT NULL,
  `ID_users` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `favorite`
--

INSERT INTO `favorite` (`ID_favorite`, `favorite_photo`, `ID_users`) VALUES
(1, 'aadsadsad.jpg', 1),
(2, 'dfggdsdfgf.jpg', 2),
(5, 'fghj', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `ID_genre` int NOT NULL,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`ID_genre`, `genre`) VALUES
(1, 'Поп'),
(2, 'Рок'),
(3, 'Реп'),
(4, 'Фонк'),
(5, 'Техно'),
(6, 'Танцевальная'),
(7, 'Шансон'),
(8, 'Гиперпоп'),
(9, 'Классика'),
(14, 'Пирпиндикуляр');

-- --------------------------------------------------------

--
-- Структура таблицы `musicians`
--

CREATE TABLE `musicians` (
  `ID_musicians` int NOT NULL,
  `musicians_nickname` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `musicians`
--

INSERT INTO `musicians` (`ID_musicians`, `musicians_nickname`) VALUES
(1, 'pinkpagejpeg666'),
(2, 'SasakaBone'),
(3, 'nonno'),
(4, 'Lida'),
(5, 'Арбалеты'),
(7, 'Егор Летов'),
(8, 'Женя Пригожин');

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE `playlists` (
  `ID_playlists` int NOT NULL,
  `playlist_name` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `playlist_photo` varchar(160) DEFAULT NULL,
  `ID_users` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `playlists`
--

INSERT INTO `playlists` (`ID_playlists`, `playlist_name`, `playlist_photo`, `ID_users`) VALUES
(1, 'Под пиво', 'aaaaaaaaaaddddd.jpg', 1),
(2, 'Для сео', 'qqw123.jpg', 12),
(3, 'Для вёрстки', 'we24567.jpg', 2),
(4, 'Ультра имп', 'ndsfsd.jpg', 1),
(6, 'Буча', '123444.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `ID_role` int NOT NULL,
  `name_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`ID_role`, `name_role`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `track`
--

CREATE TABLE `track` (
  `ID_track` int NOT NULL,
  `track_name` varchar(160) DEFAULT NULL,
  `ID_musician` int DEFAULT NULL,
  `Number_of_auditions` float DEFAULT NULL,
  `year_of_release` date DEFAULT NULL,
  `ID_genre` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `track`
--

INSERT INTO `track` (`ID_track`, `track_name`, `ID_musician`, `Number_of_auditions`, `year_of_release`, `ID_genre`) VALUES
(1, 'Я любил её', 1, 234, '2022-06-03', 14),
(2, 'Мпт ловерс', 2, 1, '2023-06-15', 1),
(3, 'Ты и я', 7, 4321, '2002-02-02', 1),
(19, 'Мпт ловерс кавер шпак', 1, 879, '2023-12-12', 7),
(21, 'Людочка 2гис', 1, 111, '1111-11-11', 1),
(22, 'Лёгкий клатч', 2, 232323, '2002-02-02', 1),
(24, 'Боеприпасы есть', 8, 223, '2002-02-02', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_users` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `profile_photo` varchar(100) NOT NULL,
  `ID_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_users`, `login`, `email`, `password`, `profile_photo`, `ID_role`) VALUES
(1, 'admin', 'isip_a.yu.maslikov@mpt.ru', '12345678', 'vg.jpg', 1),
(2, 'Сашка', 'sasha_maslikov@inbox.ru', 'ssrcasdwafs', '', 2),
(8, 'Alexandr', 'Alexandr@gmail.com', '$2y$10$c1INx75NMlrinKFjzINe0eA/KISLO9bqXHlTHZXePJ5ler1uyV6k6', '', 2),
(9, 'test', 'test@test', '$2y$10$ZZB7BCKiW46VZB8l6KzXPe5mLChnwrQz5dlcfTAyeMFRfNdFPOe5m', '', 1),
(12, 'bebararaыы', 'bebarara@bebarara', '$2y$10$FxDbVI4PV1w1UPymzayq1eQ2TMkomBsj9/HrgSN8ecs./UE/dV472', '', 2),
(24, 'maxmax', 'maxmax@maxmax', '$2y$10$K5XU6gB7J4GE0pvHCC3Ja.0WXTiDXEGnPPOKnuWKZtsrVQOJEgPoW', '', 2),
(26, 'maxmax2', 'maxmax2@maxmax2', '$2y$10$V9GH0x23HnT.iJ7pBeJ6bOivwaXMdGwtLeh1/V0uO9at2LSBSAs1K', '', 2),
(27, 'mamapapa', 'mamapapa@mamapapa', '$2y$10$.Cdl7aFDQw4HeWQp.hiwL..66ps1AHyN1tUfsW0bu489d.ZPsW9Hm', '', 2),
(29, 'bebra', 'bebra@bebra', '$2y$10$Z8xtmRVeKrMQcRs.11BcbuAAFBQgmfL7cpvDrFCDmxT2CQj0lG/Mm', '', 2),
(30, 'adasdasdasd', 'adasdasdasd@adasdasdasd', '$2y$10$Cq3AAh5idh9RALows4/K3.35G73Z1qNsvEwwCfkqgZ3NwHewiB/yG', '', 2),
(31, 'asdfgffffff', 'asdfgffffff@asdfgffffff', '$2y$10$47tQlQoHWvEZme8.ZOD3oug3YWXDas2CPw1V3B1Y2KxRVjJvvIUkO', '', 2),
(32, 'Aleksandr', 'Aleksandr@Aleksandr', '$2y$10$JvMUo.9WiHr.CF3g0zVfFeRrxVqYLJsr34wt8/dZkrXC2tOFJeKTa', '', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adding_in_album`
--
ALTER TABLE `adding_in_album`
  ADD PRIMARY KEY (`ID_adding_in_album`),
  ADD KEY `ID_track` (`ID_track`),
  ADD KEY `ID_albums` (`ID_albums`);

--
-- Индексы таблицы `adding_in_favorite`
--
ALTER TABLE `adding_in_favorite`
  ADD PRIMARY KEY (`ID_adding_in_favorite`),
  ADD KEY `ID_favorite` (`ID_favorite`),
  ADD KEY `ID_track` (`ID_track`);

--
-- Индексы таблицы `adding_to_a_playlist`
--
ALTER TABLE `adding_to_a_playlist`
  ADD PRIMARY KEY (`ID_adding_to_a_playlist`),
  ADD KEY `ID_playlists` (`ID_playlists`),
  ADD KEY `ID_track` (`ID_track`);

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`ID_albums`),
  ADD KEY `ID_musician` (`ID_musician`);

--
-- Индексы таблицы `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`ID_favorite`),
  ADD KEY `ID_users` (`ID_users`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_genre`);

--
-- Индексы таблицы `musicians`
--
ALTER TABLE `musicians`
  ADD PRIMARY KEY (`ID_musicians`);

--
-- Индексы таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`ID_playlists`),
  ADD KEY `ID_users` (`ID_users`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_role`);

--
-- Индексы таблицы `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`ID_track`),
  ADD KEY `ID_musician` (`ID_musician`),
  ADD KEY `ID_genre` (`ID_genre`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_users`),
  ADD KEY `ID_role` (`ID_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adding_in_album`
--
ALTER TABLE `adding_in_album`
  MODIFY `ID_adding_in_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `adding_in_favorite`
--
ALTER TABLE `adding_in_favorite`
  MODIFY `ID_adding_in_favorite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `adding_to_a_playlist`
--
ALTER TABLE `adding_to_a_playlist`
  MODIFY `ID_adding_to_a_playlist` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `ID_albums` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `favorite`
--
ALTER TABLE `favorite`
  MODIFY `ID_favorite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `musicians`
--
ALTER TABLE `musicians`
  MODIFY `ID_musicians` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `playlists`
--
ALTER TABLE `playlists`
  MODIFY `ID_playlists` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `ID_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `track`
--
ALTER TABLE `track`
  MODIFY `ID_track` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `adding_in_album`
--
ALTER TABLE `adding_in_album`
  ADD CONSTRAINT `adding_in_album_ibfk_1` FOREIGN KEY (`ID_track`) REFERENCES `track` (`ID_track`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `adding_in_album_ibfk_2` FOREIGN KEY (`ID_albums`) REFERENCES `albums` (`ID_albums`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `adding_in_favorite`
--
ALTER TABLE `adding_in_favorite`
  ADD CONSTRAINT `adding_in_favorite_ibfk_1` FOREIGN KEY (`ID_favorite`) REFERENCES `favorite` (`ID_favorite`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `adding_in_favorite_ibfk_2` FOREIGN KEY (`ID_track`) REFERENCES `track` (`ID_track`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `adding_to_a_playlist`
--
ALTER TABLE `adding_to_a_playlist`
  ADD CONSTRAINT `adding_to_a_playlist_ibfk_1` FOREIGN KEY (`ID_playlists`) REFERENCES `playlists` (`ID_playlists`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `adding_to_a_playlist_ibfk_2` FOREIGN KEY (`ID_track`) REFERENCES `track` (`ID_track`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`ID_musician`) REFERENCES `musicians` (`ID_musicians`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`ID_users`) REFERENCES `users` (`ID_users`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`ID_users`) REFERENCES `users` (`ID_users`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`ID_musician`) REFERENCES `musicians` (`ID_musicians`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `track_ibfk_2` FOREIGN KEY (`ID_genre`) REFERENCES `genre` (`ID_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_role`) REFERENCES `role` (`ID_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
