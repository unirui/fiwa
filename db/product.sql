-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2020 г., 08:45
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `product`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`author_id`, `lastname`, `firstname`, `year`, `country_id`) VALUES
(1, 'Петров', 'Денис', 2020, 1),
(2, 'Короленко', 'Анастасия', 2020, 2),
(3, 'Брайсон', 'Билл', 2019, 3),
(4, 'Лесовик', 'Ольга', 2018, 1),
(5, 'Громова', 'Вера', 2019, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`country_id`, `name`) VALUES
(1, 'Казахстан'),
(2, 'Россия'),
(3, 'США'),
(4, 'Узбекистан'),
(5, 'Кыргызстан'),
(6, 'Грузия'),
(7, 'Армения'),
(8, 'Финляндия'),
(9, 'Германия'),
(10, 'Франция'),
(11, 'Египет'),
(12, 'Аргентина'),
(13, 'Австралия');

-- --------------------------------------------------------

--
-- Структура таблицы `gruppa`
--

CREATE TABLE `gruppa` (
  `gruppa_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gruppa`
--

INSERT INTO `gruppa` (`gruppa_id`, `name`) VALUES
(1, 'Закуски'),
(2, 'Салаты'),
(3, 'Супы'),
(4, 'Десерты'),
(5, 'Вторые блюда'),
(6, 'Выпечка'),
(7, 'Новая категория');

-- --------------------------------------------------------

--
-- Структура таблицы `ingridient`
--

CREATE TABLE `ingridient` (
  `ingridient_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calory` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingridient`
--

INSERT INTO `ingridient` (`ingridient_id`, `name`, `calory`, `invoice_id`) VALUES
(1, 'МАСЛО \"ЖАРКOFF\"', 9, 1),
(2, 'Масло \"ОЛИВА\"', 9, 2),
(4, 'Мука пшеничная', 5, 3),
(5, 'Молоко', 4, 2),
(6, 'Яйцо куриное', 5, 4),
(7, 'Чеснок', 1, 5),
(8, 'Свекла', 2, 5),
(9, 'Картофель', 4, 3),
(10, 'Лук', 2, 5),
(11, 'Капуста', 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `ingrid_of_recipe`
--

CREATE TABLE `ingrid_of_recipe` (
  `recipe_id` int(11) NOT NULL,
  `ingridient_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingrid_of_recipe`
--

INSERT INTO `ingrid_of_recipe` (`recipe_id`, `ingridient_id`, `method_id`, `quantity`) VALUES
(1, 1, 2, 10),
(1, 4, 4, 400),
(1, 5, 2, 1000),
(1, 6, 2, 300),
(2, 8, 11, 50),
(2, 7, 11, 10),
(2, 9, 7, 300),
(2, 11, 7, 500),
(2, 10, 7, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `provider_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `data`, `provider_id`, `price`, `quantity`) VALUES
(1, '2020-06-01', 1, 25000, 10),
(2, '2020-06-01', 1, 1000, 1),
(3, '2020-06-06', 3, 1000, 2),
(4, '2020-06-06', 4, 4000, 4),
(5, '2020-06-03', 5, 50280, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `method`
--

CREATE TABLE `method` (
  `method` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `method`
--

INSERT INTO `method` (`method`, `name`) VALUES
(1, 'размягчение'),
(2, 'нагревание'),
(3, 'вымачивание'),
(4, 'просеивание'),
(5, 'отбивание'),
(6, 'панировка'),
(7, 'потрошение'),
(8, 'смешивание'),
(9, 'замораживание'),
(10, 'охлаждение'),
(11, 'жарение'),
(12, 'тушение');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gruppa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `name`, `gruppa_id`) VALUES
(1, 'Блины', 6),
(2, 'Борщ', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `provider`
--

CREATE TABLE `provider` (
  `provider_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `provider`
--

INSERT INTO `provider` (`provider_id`, `name`, `adress`, `tel`) VALUES
(1, 'Советский маслозавод', 'Россия,ул.К.Либкнехта 36', '87772231213'),
(2, 'ЮГ-ПРОДУКТ, ООО', 'Россия,ул.3-я Прядильная, д.18, кв.10', '87702231010'),
(3, 'ООО \"ПЕКАРНЯ\"', 'ул. Александра Кравцова 6, Нур-Султан 020000', '87750300247'),
(4, 'Новый поставщик', 'Неизвестный адрес', '87750300000'),
(5, 'УЗАГРОЭКСПОРТ, АО', 'Узбекистан, ул. Беруний, д. 41', '87777777777');

-- --------------------------------------------------------

--
-- Структура таблицы `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `kkal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `name`, `description`, `author_id`, `product_id`, `kkal`) VALUES
(1, 'Тонкие блины на молоке', 'Взбейте яйца с сахаром.\r\nПостепенно введите муку и соль, чередуя с молоком и аккуратно размешайте до однородной массы.\r\nОставьте на 20 минут.\r\nДобавьте в тесто растительное масло и жарьте блины на сильно разогретой сковороде.', 1, 1, 0),
(2, 'Борщ со свеклой и фасолью', 'Перво наперво в приготовлении постного борща необходимо заняться фасолью. Ее заранее нужно замочить в воде (желательно на ночь). В целом же, хватит и трех–четырех часов. Если времени замачивать фасоль нету, то можно заменить ее фасолью консервированной.\r\nИтак, отправляем уже размоченные бобовые в кастрюле на плиту и доводим их до кипения. Затем огонь убавляем.\r\n Очищаем картофель от кожуры и обязательно его моем. После этого нарезаем, но не слишком крупно. Затем отправляем картофель в кастрюлю с фасолевым бульоном.\r\nТеперь займемся свеклой. Ее также необходимо очистить от кожуры и хорошенько промыть в воде. После этого нарежем свеклу соломкой и обжарим ее в небольшом количестве масла растительного (это необходимо для того, чтобы в процессе дальнейшего приготовления свекла не выварилась и не потеряла свой цвет).\r\nПосле нескольких минут обжаривания отправляем нашу свеколку в кастрюлю с фасолью.\r\n На этом этапе займемся подготовкой лука. Прежде чем отправить в кастрюлю, его необходимо мелко нашинковать и обжарить на сковороде (до того момента пока он не станет полупрозрачным).\r\nКак только лучок приобретет некоторую прозрачность, отправим к нему морковку, предварительно нарезанную соломкой.\r\nВ то время, как у нас сковороде готовится зажарка, мы займемся томатами. Их нужно нарезать небольшими кусочками (предварительно можно снять кожуру, но это не обязательно).\r\n Как только мы закончим с томатами, можно будет снимать зажарку с плиты, а затем мы добавим ее в наш постный борщ.\r\nТеперь обжарим нарезанные томаты, добавив к ним мелко нарезанный чесночок.\r\n Тем временем, пока томаты доходят на сковороде, мы нашинкуем капусту, а затем отправим ее в борщ.\r\n На этот раз настала очередь перца. Его следует нарезать соломкой среднего размера, а затем отправить в кастрюлю.\r\n Пока мы занимались капустой и перцем, томаты хорошо размягчились на сковороде и впитали в себя запах чеснока. Теперь мы добавим к ним немного кетчупа или томатной пасты (тут кто как любит), острого сухого перчика и протушим все это еще пару минут.\r\nТеперь смесь томатов можно смело отправлять в наш борщ.\r\n На этом этапе борщ следует перемешать и подсолить его (в данном случае была использована черная соль, но, в целом, это не принципиально).\r\nПрисыпаем борщик зеленью, а также добавим в него перец горошек и лавровый лист.\r\nДобавим в наше блюдо пару кусочков рафинада. После этого проварим его еще пару минуток, а затем огонь можно выключать. Хотя бы на час оставим постный борщ настояться.', 3, 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `role_id` tinyint(4) NOT NULL,
  `sys_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_id`, `sys_name`, `name`) VALUES
(1, 'admin', 'администратор'),
(2, 'user', 'пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `name`, `login`, `pass`, `role_id`) VALUES
(1, 'Иванов Иван Иванович', 'admin', '$2y$10$mFlJsQgNvDQ27XfADrMh8O9OQA47f2gLmqYdwGeg8SpsvdoRUX95S', 1),
(2, 'Петров Петр Петрович', 'petrov', '$2y$10$ZkSAdhoKyrVHUplFaxzGteVBTR1.U7lvR88WJjUazW1EhMTQdOxu2', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Индексы таблицы `gruppa`
--
ALTER TABLE `gruppa`
  ADD PRIMARY KEY (`gruppa_id`);

--
-- Индексы таблицы `ingridient`
--
ALTER TABLE `ingridient`
  ADD PRIMARY KEY (`ingridient_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Индексы таблицы `ingrid_of_recipe`
--
ALTER TABLE `ingrid_of_recipe`
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `ingridient_id` (`ingridient_id`),
  ADD KEY `method_id` (`method_id`);

--
-- Индексы таблицы `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Индексы таблицы `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`method`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `gruppa_id` (`gruppa_id`);

--
-- Индексы таблицы `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`provider_id`);

--
-- Индексы таблицы `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `gruppa`
--
ALTER TABLE `gruppa`
  MODIFY `gruppa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ingridient`
--
ALTER TABLE `ingridient`
  MODIFY `ingridient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `method`
--
ALTER TABLE `method`
  MODIFY `method` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `provider`
--
ALTER TABLE `provider`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Ограничения внешнего ключа таблицы `ingridient`
--
ALTER TABLE `ingridient`
  ADD CONSTRAINT `ingridient_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Ограничения внешнего ключа таблицы `ingrid_of_recipe`
--
ALTER TABLE `ingrid_of_recipe`
  ADD CONSTRAINT `ingrid_of_recipe_ibfk_1` FOREIGN KEY (`method_id`) REFERENCES `method` (`method`),
  ADD CONSTRAINT `ingrid_of_recipe_ibfk_2` FOREIGN KEY (`ingridient_id`) REFERENCES `ingridient` (`ingridient_id`),
  ADD CONSTRAINT `ingrid_of_recipe_ibfk_3` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`);

--
-- Ограничения внешнего ключа таблицы `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`provider_id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`gruppa_id`) REFERENCES `gruppa` (`gruppa_id`);

--
-- Ограничения внешнего ключа таблицы `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
