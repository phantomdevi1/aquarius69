-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 23 2024 г., 17:21
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aquarius`
--

-- --------------------------------------------------------

--
-- Структура таблицы `briefing`
--

CREATE TABLE `briefing` (
  `img_id` int NOT NULL,
  `img_way` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `briefing`
--

INSERT INTO `briefing` (`img_id`, `img_way`) VALUES
(1, 'img/briefing/image22.svg'),
(2, 'img/briefing/image23.svg'),
(3, 'img/briefing/image24.svg'),
(4, 'img/briefing/image25.svg'),
(5, 'img/briefing/image26.svg'),
(6, 'img/briefing/image27.svg'),
(7, 'img/briefing/image28.svg'),
(8, 'img/briefing/image29.svg'),
(9, 'img/briefing/image30.svg'),
(10, 'img/briefing/image31.svg'),
(11, 'img/briefing/image32.svg'),
(12, 'img/briefing/image33.svg'),
(13, 'img/briefing/image34.svg'),
(14, 'img/briefing/image35.svg'),
(15, 'img/briefing/image36.svg'),
(16, 'img/briefing/image37.svg'),
(17, 'img/briefing/image38.svg'),
(18, 'img/briefing/image39.svg'),
(19, 'img/briefing/image40.svg'),
(20, 'img/briefing/image41.svg'),
(21, 'img/briefing/image42.svg'),
(22, 'img/briefing/image43.svg'),
(23, 'img/briefing/image44.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `news_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`news_id`, `title`, `content`, `date`) VALUES
(1, 'Aquarius представила новую линейку ноутбуков с инновационным дизайном', 'Компания Aquarius представила новую линейку ноутбуков, включающую в себя стильные и производительные модели с уникальным дизайном.', '2024-04-22'),
(2, 'Новый процессор Aquarius для ноутбуков обещает рекордную производительность', 'Aquarius анонсировала выпуск нового процессора для своих ноутбуков, который обещает значительно увеличить производительность и эффективность работы устройств.', '2024-04-22'),
(3, 'Aquarius представила свою первую линейку смартфонов с 5G поддержкой', 'Компания Aquarius анонсировала выпуск своей первой линейки смартфонов с поддержкой сетей 5G, что позволит пользователям наслаждаться быстрой и стабильной связью.', '2024-04-22'),
(4, 'Aquarius анонсировала запуск новой серии графических карт для игровых ноутбуков', 'Компания Aquarius представила новую серию графических карт, специально разработанных для игровых ноутбуков, которые обеспечат высокую производительность и качественную графику.', '2024-04-22'),
(5, 'Aquarius представила концепт складного смартфона будущего', 'На выставке CES 2024 Aquarius продемонстрировала концепт складного смартфона, который в будущем может стать революцией в мире мобильных устройств.', '2024-04-22'),
(6, 'Aquarius анонсировала запуск серии ультрабуков с длительным временем автономной работы', 'Компания Aquarius представила новую серию ультрабуков, которые обещают длительное время автономной работы благодаря энергоэффективным компонентам и оптимизации энергопотребления.', '2024-04-22'),
(7, 'Aquarius представила новый гибридный ноутбук с сенсорным экраном и пером', 'На выставке MWC 2024 Aquarius представила новый гибридный ноутбук, который сочетает в себе функциональность ноутбука, сенсорный экран и перо для удобства работы и творчества.', '2024-04-22'),
(8, 'Aquarius анонсировала разработку своего собственного операционного системы для ноутбуков', 'Компания Aquarius сообщила о начале разработки собственной операционной системы для своих ноутбуков, что позволит им быть более оптимизированными и адаптированными к потребностям пользователей.', '2024-04-22'),
(9, 'Aquarius представила новый ультрабук с технологией беспроводной зарядки', 'Компания Aquarius выпустила новый ультрабук, который оснащен технологией беспроводной зарядки, что позволит пользователям заряжать устройство без лишних проводов и перепадов напряжения.', '2024-04-22'),
(10, 'Aquarius анонсировала сотрудничество с ведущими разработчиками игр для оптимизации своих ноутбуков', 'Компания Aquarius объявила о партнерстве с ведущими разработчиками игр с целью оптимизации своих ноутбуков под требования современных игр и обеспечения наилучшего игрового опыта.', '2024-04-22'),
(11, 'тестирование', 'тест\r\n', '2024-04-23'),
(13, 'тестирование', 'тест2', '2024-04-23');

-- --------------------------------------------------------

--
-- Структура таблицы `PersonalData`
--

CREATE TABLE `PersonalData` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `passport_number` varchar(20) NOT NULL,
  `passport_series` varchar(10) NOT NULL,
  `issue_date` date NOT NULL,
  `issued_by` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `PersonalData`
--

INSERT INTO `PersonalData` (`user_id`, `first_name`, `last_name`, `patronymic`, `passport_number`, `passport_series`, `issue_date`, `issued_by`, `birth_date`, `birth_place`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', '1234567890', '1234', '2000-01-01', 'Отделением УФМС России', '1980-01-01', 'Москва'),
(2, 'Елена', 'Петрова', 'Сергеевна', '0987654321', '4321', '2002-02-02', 'Отделением УФМС России', '1990-02-02', 'Санкт-Петербург'),
(4, 'Иван', 'Макеев', 'Иванович', '123456', '7890', '2023-01-01', 'МВД России', '1990-05-15', 'Москва'),
(5, 'Петр', 'Петров', 'Петрович', '654321', '0987', '2023-01-02', 'МВД России', '1995-07-20', 'Санкт-Петербург'),
(6, 'Анна', 'Сидорова', 'Ивановна', '987654', '5432', '2023-01-03', 'МВД России', '1988-12-10', 'Новосибирск');

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE `Products` (
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`product_id`, `name`, `image_url`) VALUES
(1, 'Персональные компьютеры', 'img/products/product1.svg'),
(2, 'Мониторы', 'img/products/product2.svg'),
(3, 'Моноблоки', 'img/products/product3.svg'),
(4, 'Ноутбуки', 'img/products/product4.svg'),
(5, 'Планшеты', 'img/products/product5.svg'),
(6, 'КПК', 'img/products/product6.svg'),
(7, 'Системы хранения данных', 'img/products/product7.svg'),
(8, 'Серверы', 'img/products/product8.svg'),
(9, 'Коммутаторы', 'img/products/product9.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `TestQuestions`
--

CREATE TABLE `TestQuestions` (
  `question_id` int NOT NULL,
  `test_id` int NOT NULL,
  `question_text` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `TestQuestions`
--

INSERT INTO `TestQuestions` (`question_id`, `test_id`, `question_text`, `correct_answer`) VALUES
(1, 1, 'Какие меры безопасности следует принимать при сборке компьютера или сервера?', '1'),
(2, 1, 'Какие виды антистатической защиты используются при работе с комплектующими?', '2'),
(3, 1, 'Каковы основные правила безопасного подключения и настройки электропитания компьютера или сервера?', '3'),
(4, 1, 'Что делать в случае обнаружения повреждений или дефектов компонентов в процессе сборки?', '1'),
(5, 1, 'Какие процедуры тестирования применяются для проверки работоспособности собранного компьютера или сервера перед включением?', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `TestResults`
--

CREATE TABLE `TestResults` (
  `result_id` int NOT NULL,
  `user_id` int NOT NULL,
  `test_id` int NOT NULL,
  `score` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `TestResults`
--

INSERT INTO `TestResults` (`result_id`, `user_id`, `test_id`, `score`, `date`) VALUES
(1, 2, 1, 40, '2024-04-23'),
(2, 2, 1, 40, '2024-04-23'),
(3, 2, 1, 20, '2024-04-23'),
(4, 2, 1, 40, '2024-04-23'),
(5, 2, 1, 40, '2024-04-23'),
(6, 2, 1, 0, '2024-04-23'),
(7, 4, 1, 0, '2024-04-23'),
(8, 5, 1, 100, '2024-04-23');

-- --------------------------------------------------------

--
-- Структура таблицы `Tests`
--

CREATE TABLE `Tests` (
  `test_id` int NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Tests`
--

INSERT INTO `Tests` (`test_id`, `content`) VALUES
(1, 'Техника безопасности на предприятии сборки компьютеров, серверов и т.д.');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password`, `is_admin`) VALUES
(1, '1', '1', 1),
(2, 'user', 'user', 0),
(4, 'user1', 'password1', 0),
(5, 'user2', 'password2', 0),
(6, 'user3', 'password3', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `briefing`
--
ALTER TABLE `briefing`
  ADD PRIMARY KEY (`img_id`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `PersonalData`
--
ALTER TABLE `PersonalData`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `TestQuestions`
--
ALTER TABLE `TestQuestions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Индексы таблицы `TestResults`
--
ALTER TABLE `TestResults`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Индексы таблицы `Tests`
--
ALTER TABLE `Tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `briefing`
--
ALTER TABLE `briefing`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `TestQuestions`
--
ALTER TABLE `TestQuestions`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `TestResults`
--
ALTER TABLE `TestResults`
  MODIFY `result_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Tests`
--
ALTER TABLE `Tests`
  MODIFY `test_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `PersonalData`
--
ALTER TABLE `PersonalData`
  ADD CONSTRAINT `personaldata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `TestQuestions`
--
ALTER TABLE `TestQuestions`
  ADD CONSTRAINT `testquestions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `Tests` (`test_id`);

--
-- Ограничения внешнего ключа таблицы `TestResults`
--
ALTER TABLE `TestResults`
  ADD CONSTRAINT `testresults_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `testresults_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `Tests` (`test_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
