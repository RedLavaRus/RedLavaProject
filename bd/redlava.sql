-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 29 2020 г., 18:33
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
-- База данных: `redlava`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `name` varchar(255) DEFAULT NULL COMMENT ' Имя ',
  `url` varchar(255) DEFAULT NULL COMMENT ' Адрес ',
  `ru_name` varchar(255) DEFAULT NULL COMMENT ' Русское название ',
  `father` varchar(255) DEFAULT NULL COMMENT ' Родитель '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `name`, `url`, `ru_name`, `father`) VALUES
(1, 'crm', 'crm', 'CRM', '0'),
(2, 'product', 'product', 'ТОВАРЫ \\ УСЛУГИ', '0'),
(3, 'website', 'website', 'ВЕБ САЙТ', '0'),
(4, 'media', 'media', 'МЕДИА', '0'),
(5, 'modules', 'modules', 'МОДУЛИ', '0'),
(6, 'other', 'other', 'РАЗНОЕ', '0'),
(7, 'interten', 'telecom/interten', 'ИНТЕРНЕТ', 'product'),
(8, 'paket', 'telecom/paket', 'ПАКЕТ', 'product'),
(9, 'tv', 'telecom/tv', 'ТЕЛЕВИДЕНИЕ', 'product');

-- --------------------------------------------------------

--
-- Структура таблицы `ajax`
--

CREATE TABLE `ajax` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `fun` varchar(255) DEFAULT NULL COMMENT ' Урл страницы ',
  `class` varchar(255) DEFAULT NULL COMMENT ' Класс страницы ',
  `function` varchar(255) DEFAULT NULL COMMENT ' Функия вызова ',
  `permission` text DEFAULT NULL COMMENT ' право доступа '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ajax`
--

INSERT INTO `ajax` (`id`, `fun`, `class`, `function`, `permission`) VALUES
(1, 'showtp', 'Modules\\Telecom\\Config\\Handler', 'ajaxShowTP', 'admin'),
(2, 'showtvpack', 'Modules\\Telecom\\Config\\Handler', 'ajaxShowTV', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `api`
--

CREATE TABLE `api` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `fun` varchar(255) DEFAULT NULL COMMENT ' Урл страницы ',
  `class` varchar(255) DEFAULT NULL COMMENT ' Класс страницы ',
  `function` varchar(255) DEFAULT NULL COMMENT ' Функия вызова ',
  `permission` text DEFAULT NULL COMMENT ' право доступа '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `api`
--

INSERT INTO `api` (`id`, `fun`, `class`, `function`, `permission`) VALUES
(1, 'showtp', 'Modules\\Telecom\\Config\\Handler', 'ajaxShowTP', 'admin'),
(2, 'auth', 'Modules\\AuthAPI\\Config\\Handler', 'auth', NULL),
(3, 'reg', 'Modules\\AuthAPI\\Config\\Handler', 'register', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `blocks_banners`
--

CREATE TABLE `blocks_banners` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `banner_adres` varchar(255) DEFAULT NULL COMMENT ' адрес баннера ',
  `wxh` varchar(255) DEFAULT NULL COMMENT ' рахмер 300_100 '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blocks_banners`
--

INSERT INTO `blocks_banners` (`id`, `banner_adres`, `wxh`) VALUES
(1, '/res/img/pc.png', '1200_300');

-- --------------------------------------------------------

--
-- Структура таблицы `blocks_callme`
--

CREATE TABLE `blocks_callme` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `phome` varchar(255) DEFAULT NULL COMMENT ' телефон ',
  `text` varchar(255) DEFAULT NULL COMMENT ' строка '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blocks_callme`
--

INSERT INTO `blocks_callme` (`id`, `phome`, `text`) VALUES
(1, '<b>+7 (960) 49-44-999</b> г.Краснодар', 'Контактный телефон, отдела подключений:&nbsp;&nbsp;&nbsp;');

-- --------------------------------------------------------

--
-- Структура таблицы `blocks_footer`
--

CREATE TABLE `blocks_footer` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `father` varchar(255) DEFAULT NULL COMMENT ' Hjlbntkm ',
  `name` varchar(255) DEFAULT NULL COMMENT ' Название ',
  `url` varchar(255) DEFAULT NULL COMMENT ' Адрес ссылки '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `blocks_header`
--

CREATE TABLE `blocks_header` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `name` varchar(255) DEFAULT NULL COMMENT ' Название ',
  `url` varchar(255) DEFAULT NULL COMMENT ' Адрес ссылки '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `group_permission`
--

CREATE TABLE `group_permission` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `name` varchar(255) DEFAULT NULL COMMENT ' Название группы ',
  `permission` text DEFAULT NULL COMMENT ' печерень привелегий, через запятую '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group_permission`
--

INSERT INTO `group_permission` (`id`, `name`, `permission`) VALUES
(1, 'admin', 'admin'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `group_users`
--

CREATE TABLE `group_users` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `user_id` varchar(255) DEFAULT NULL COMMENT ' ид пользователя ',
  `group_name` text DEFAULT NULL COMMENT ' название групп, через запятую '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group_users`
--

INSERT INTO `group_users` (`id`, `user_id`, `group_name`) VALUES
(1, '4', 'admin,test');

-- --------------------------------------------------------

--
-- Структура таблицы `news_micro`
--

CREATE TABLE `news_micro` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `text` text DEFAULT NULL COMMENT ' Текст новости '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_micro`
--

INSERT INTO `news_micro` (`id`, `text`) VALUES
(1, 'ТрансТелеКом вступил в Ассоциацию1 «Цифровой транспорт и логистика»'),
(2, 'Абоненты ТТК теперь могут подключить сервис Kaspersky Who Calls'),
(3, 'ТТК подключает к быстрому и недорогому интернету – По чесноку!'),
(4, 'Специалисты компании ТрансТелеКом сохранили связь для Мурманской области после обрушения опоры моста'),
(5, 'Проекты ТрансТелеКома вышли в финал международной премии CX World Award'),
(6, 'Платежи через ТТК Pay выросли на 10 процентов2'),
(7, 'ТрансТелеКом вступил в Ассоциацию «Цифровой транспорт и логистика»'),
(8, 'Абоненты ТТК теперь могут подключить сервис Kaspersky Who Calls'),
(9, 'ТТК подключает к быстрому и недорогому интернету – По чесноку!'),
(10, 'Специалисты компании ТрансТелеКом сохранили связь для Мурманской области после обрушения опоры моста'),
(11, 'Проекты ТрансТелеКома вышли в финал международной премии CX World Award'),
(12, 'Платежи через ТТК Pay выросли на 10 процентов');

-- --------------------------------------------------------

--
-- Структура таблицы `router`
--

CREATE TABLE `router` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `url` varchar(255) DEFAULT NULL COMMENT ' Урл страницы ',
  `class` varchar(255) DEFAULT NULL COMMENT ' Класс страницы ',
  `func` varchar(255) DEFAULT NULL COMMENT ' Функия вызова ',
  `Описание` text DEFAULT NULL COMMENT ' Описание '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `router`
--

INSERT INTO `router` (`id`, `url`, `class`, `func`, `Описание`) VALUES
(1, '/', 'Modules\\Index\\Config\\Handler', 'index', 'Главная страница'),
(2, 'test', 'Test', 'start', 'Тестовая страница'),
(3, 'user/reg', 'Modules\\Auth\\Config\\Handler', 'register', 'регистрация'),
(4, 'user/auth', 'Modules\\Auth\\Config\\Handler', 'auth', 'авторизация'),
(5, 'user/exit', 'Modules\\Auth\\Config\\Handler', 'exit', 'выход'),
(6, 'telecom', 'Modules\\telecom\\config\\Handler', 'index', 'telecom'),
(7, 'Internet', 'Modules\\telecom\\config\\Handler', 'internet', 'Internet'),
(8, 'Internet-i-tv', 'Modules\\telecom\\config\\Handler', 'InternetITv', 'InternetITv'),
(9, 'mobilnaya-svyaz', 'Modules\\telecom\\config\\Handler', 'mobilnayaSvyaz', 'mobilnaya-svyaz'),
(10, 'connect', 'Modules\\telecom\\config\\Handler', 'connect', 'connect'),
(11, 'connect/zayavka', 'Modules\\telecom\\config\\Handler', 'zayavka', 'zayavka'),
(12, 'system/auth', 'Core\\User\\Auth', 'index', 'auth'),
(13, 'system/reg', 'Core\\User\\Register', 'index', 'reg'),
(14, 'admin/telecom/interten', 'Modules\\Telecom\\Config\\Handler', 'adminInternet', 'adminInternet'),
(15, 'tv', 'Modules\\telecom\\config\\Handler', 'tv', 'tv'),
(16, 't1', 'Modules\\Auth\\Config\\Handler', 'auth', 't1');

-- --------------------------------------------------------

--
-- Структура таблицы `telecom_index`
--

CREATE TABLE `telecom_index` (
  `id` int(3) NOT NULL,
  `tp_id` varchar(9) NOT NULL,
  `turn` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `telecom_index`
--

INSERT INTO `telecom_index` (`id`, `tp_id`, `turn`) VALUES
(1, '5', '1'),
(2, '6', '2'),
(3, '2', '3'),
(4, '3', '4');

-- --------------------------------------------------------

--
-- Структура таблицы `telecom_tarifs`
--

CREATE TABLE `telecom_tarifs` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `type` varchar(255) DEFAULT NULL COMMENT ' тип:Мобильная свзяь, шпд, тв, оборудование ',
  `name` varchar(255) DEFAULT NULL COMMENT ' Название ',
  `opisanie` text DEFAULT NULL COMMENT ' Параметр ',
  `prises` varchar(255) DEFAULT NULL COMMENT ' Цена ',
  `dop_cods` varchar(255) DEFAULT NULL COMMENT ' Дополниетльные сведения '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `telecom_tarifs`
--

INSERT INTO `telecom_tarifs` (`id`, `type`, `name`, `opisanie`, `prises`, `dop_cods`) VALUES
(1, 'shpd', 'По чесноку', '<b>100</b> Мбит/сек<br>', '375', '0'),
(2, 'shpd', 'По чесноку + WiFi', '<b>100</b> Мбит/сек<br> + WiFI', '450', NULL),
(3, 'shpd', 'В игре', '<b>100</b> Мбит/сек<br><b>5 часов игрового времени</b>', '225', NULL),
(4, 'mobile', ' Поехали 2', '<small>\r\n                <b>2</b><small><small> Гб интернета<br></small></small>\r\n                <b>безлимит</b><small><small> внутри сети<br></small></small>\r\n                <b>300</b><small><small> минут на все номера России<br></small></small>\r\n                <b>200</b><small><small> SMS<br></small></small>\r\n                <b>безлимит</b><small><small> на социальные сети<br></small></small>\r\n            </small>', '375', NULL),
(5, 'puck', 'По чесноку Базовый', '<b>100</b> Мбит/сек<br>\r\n<b>122</b> ТВ-канала', '480', NULL),
(6, 'puck', 'По чесноку Расширенный', '<b>100</b> Мбит/сек<br>\r\n<b>154</b> ТВ-канала', '579', NULL),
(7, 'mobile', ' Поехали 4', ' <small>\r\n                <b>4</b><small><small> Гб интернета<br></small></small>\r\n                <b>безлимит</b><small><small> внутри сети<br></small></small>\r\n                <b>1000</b><small><small> минут на все номера России<br></small></small>\r\n                <b>300</b><small><small> SMS<br></small></small>\r\n                <b>безлимит</b><small><small> на социальные сети<br></small></small>\r\n            </small>', '500', NULL),
(8, 'mobile', ' Поехали 8', '<small>\r\n                <b>8</b><small><small> Гб интернета<br></small></small>\r\n                <b>безлимит</b><small><small> внутри сети<br></small></small>\r\n                <b>1300</b><small><small> минут на все номера России<br></small></small>\r\n                <b>400</b><small><small> SMS<br></small></small>\r\n                <b>безлимит</b><small><small> на социальные сети<br></small></small>\r\n            </small>', '600', NULL),
(9, 'mobile', ' Поехали 10', '<small>\r\n                <b>10</b><small><small> Гб интернета<br></small></small>\r\n                <b>безлимит</b><small><small> внутри сети<br></small></small>\r\n                <b>1500</b><small><small> минут на все номера России<br></small></small>\r\n                <b>500</b><small><small> SMS<br></small></small>\r\n                <b>безлимит</b><small><small> на социальные сети<br></small></small>\r\n            </small>', '650', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `telecom_tv`
--

CREATE TABLE `telecom_tv` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `name_packet` int(1) DEFAULT NULL COMMENT ' пакет каналов ',
  `name` text DEFAULT NULL COMMENT ' название канала ',
  `img` text DEFAULT NULL COMMENT ' адрес изображения '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `telecom_tv`
--

INSERT INTO `telecom_tv` (`id`, `name_packet`, `name`, `img`) VALUES
(1, 1, 'Первый HD', '_0158_perviyhd.png'),
(2, 1, 'Россия HD', '_0157_rossiahd.png'),
(3, 2, 'Первый HD', '_0158_perviyhd.png'),
(4, 3, 'Первый HD', '_0158_perviyhd.png'),
(5, 2, 'Россия HD', '_0157_rossiahd.png'),
(6, 3, 'Россия HD', '_0157_rossiahd.png'),
(7, 1, 'Матч!ТВ', '_0156_matchtv.png'),
(8, 2, 'Матч!ТВ', '_0156_matchtv.png'),
(9, 3, 'Матч!ТВ', '_0156_matchtv.png'),
(10, 1, 'НТВ', '_0155_ntv.png'),
(11, 2, 'НТВ', '_0155_ntv.png'),
(12, 3, 'НТВ', '_0155_ntv.png'),
(13, 1, '5 канал', '_0154_5kanal.png'),
(14, 2, '5 канал', '_0154_5kanal.png'),
(15, 3, '5 канал', '_0154_5kanal.png'),
(16, 1, 'Россия К', '_0153_rossiak.png'),
(17, 2, 'Россия К', '_0153_rossiak.png'),
(18, 3, 'Россия К', '_0153_rossiak.png'),
(19, 1, 'Россия 24', '_0147_rossia24.png'),
(20, 2, 'Россия 24', '_0147_rossia24.png'),
(21, 3, 'Россия 24', '_0147_rossia24.png'),
(22, 1, 'Карусель', '_0148_karysel.png'),
(23, 2, 'Карусель', '_0148_karysel.png'),
(24, 3, 'Карусель', '_0148_karysel.png'),
(25, 1, 'ОТР', '_0149_otr.png'),
(26, 2, 'ОТР', '_0149_otr.png'),
(27, 3, 'ОТР', '_0149_otr.png'),
(28, 1, 'ТВ Центр', '_0150_tvc.png'),
(29, 2, 'ТВ Центр', '_0150_tvc.png'),
(30, 3, 'ТВ Центр', '_0150_tvc.png'),
(31, 1, 'РЕН', '_0152_ren.png'),
(32, 2, 'РЕН', '_0152_ren.png'),
(33, 3, 'РЕН', '_0152_ren.png'),
(34, 1, 'СПАС', '_0151_spas.png'),
(35, 2, 'СПАС', '_0151_spas.png'),
(36, 3, 'СПАС', '_0151_spas.png'),
(37, 1, 'СТС', '_0146_ctc.png'),
(38, 2, 'СТС', '_0146_ctc.png'),
(39, 3, 'СТС', '_0146_ctc.png'),
(40, 1, 'Домашний', '_0145_domahiy.png'),
(41, 2, 'Домашний', '_0145_domahiy.png'),
(42, 3, 'Домашний', '_0145_domahiy.png'),
(43, 1, 'ТВ 3', '_0144_tv3.png'),
(44, 2, 'ТВ 3', '_0144_tv3.png'),
(45, 3, 'ТВ 3', '_0144_tv3.png'),
(46, 1, 'ПЯТНИЦА!', '_0143_patnica.png'),
(47, 2, 'ПЯТНИЦА!', '_0143_patnica.png'),
(48, 3, 'ПЯТНИЦА!', '_0143_patnica.png'),
(49, 1, 'Звезда', '_0142_zvezda.png'),
(50, 2, 'Звезда', '_0142_zvezda.png'),
(51, 3, 'Звезда', '_0142_zvezda.png'),
(52, 1, 'Мир', '_0141_mir.png'),
(53, 2, 'Мир', '_0141_mir.png'),
(54, 3, 'Мир', '_0141_mir.png'),
(55, 1, 'ТНТ', '_0135_tnt.png'),
(56, 2, 'ТНТ', '_0135_tnt.png'),
(57, 3, 'ТНТ', '_0135_tnt.png'),
(58, 1, 'Муз ТВ', '_0136_myztv.png'),
(59, 2, 'Муз ТВ', '_0136_myztv.png'),
(60, 3, 'Муз ТВ', '_0136_myztv.png'),
(61, 1, 'Региональный канал', '_0137_regionalniykanal.png'),
(62, 2, 'Региональный канал', '_0137_regionalniykanal.png'),
(63, 3, 'Региональный канал', '_0137_regionalniykanal.png'),
(64, 1, 'Витрина ТВ', '_0138_vitrinatv.png'),
(65, 2, 'Витрина ТВ', '_0138_vitrinatv.png'),
(66, 3, 'Витрина ТВ', '_0138_vitrinatv.png'),
(67, 1, 'Ю', '_0139_y.png'),
(68, 2, 'Ю', '_0139_y.png'),
(69, 3, 'Ю', '_0139_y.png'),
(70, 1, 'Disney', '_0140_disnep.png'),
(71, 2, 'Disney', '_0140_disnep.png'),
(72, 3, 'Disney', '_0140_disnep.png'),
(73, 1, 'Че', '_0133_che.png'),
(74, 1, '2x2', '_0134_2x2.png'),
(75, 2, 'Че', '_0133_che.png'),
(76, 3, 'Че', '_0133_che.png'),
(77, 2, '2x2', '_0134_2x2.png'),
(78, 3, '2x2', '_0134_2x2.png'),
(79, 1, 'LEOMAX+', '_0132_leomaxplus.png'),
(80, 2, 'LEOMAX+', '_0132_leomaxplus.png'),
(81, 3, 'LEOMAX+', '_0132_leomaxplus.png'),
(82, 1, 'Ювелирочка', '_0131_uvelirochka.png'),
(83, 2, 'Ювелирочка', '_0131_uvelirochka.png'),
(84, 3, 'Ювелирочка', '_0131_uvelirochka.png'),
(85, 1, 'Shop&Show', '_0130_show.png'),
(86, 2, 'Shop&Show', '_0130_show.png'),
(87, 3, 'Shop&Show', '_0130_show.png'),
(88, 3, 'Ретро', '_0129_retro.png'),
(89, 3, 'Усадьба', '_0123_ycadba.png'),
(90, 1, 'LEOMAX 24', '_0124_leomax24.png'),
(91, 2, 'LEOMAX 24', '_0124_leomax24.png'),
(92, 3, 'LEOMAX 24', '_0124_leomax24.png'),
(93, 1, 'ТНТ 4', '_0125_tnt4.png'),
(94, 2, 'ТНТ 4', '_0125_tnt4.png'),
(95, 3, 'ТНТ 4', '_0125_tnt4.png'),
(96, 1, 'Мир Premium', '_0126_mirpremium.png'),
(97, 2, 'Мир Premium', '_0126_mirpremium.png'),
(98, 3, 'Мир Premium', '_0126_mirpremium.png'),
(99, 2, 'Время', '_0127_vtema.png'),
(100, 3, 'Время', '_0127_vtema.png'),
(101, 2, 'СТС Love', '_0128_ctclove.png'),
(102, 1, 'СТС Love', '_0128_ctclove.png'),
(103, 3, 'СТС Love', '_0128_ctclove.png'),
(104, 3, 'Animal Planet HD', '_0122_animalplanethd.png'),
(105, 3, 'Discovery HD', '_0121_discoveryhd.png'),
(106, 1, 'ТНТ Music', '_0120_tntmysic.png'),
(107, 2, 'ТНТ Music', '_0120_tntmysic.png'),
(108, 3, 'ТНТ Music', '_0120_tntmysic.png'),
(109, 2, 'Рыжий', '_0119_rigiy.png'),
(110, 3, 'Рыжий', '_0119_rigiy.png'),
(111, 1, '360', '_0118_360.png'),
(112, 2, '360', '_0118_360.png'),
(113, 3, '360', '_0118_360.png'),
(114, 1, 'Супер!', '_0117_super.png'),
(115, 2, 'Супер!', '_0117_super.png'),
(116, 3, 'Супер!', '_0117_super.png'),
(117, 1, 'Про Бизнес', '_0111_probiznes.png'),
(118, 2, 'Про Бизнес', '_0111_probiznes.png'),
(119, 3, 'Про Бизнес', '_0111_probiznes.png'),
(120, 1, 'РБК', '_0112_rbk.png'),
(121, 2, 'РБК', '_0112_rbk.png'),
(122, 3, 'РБК', '_0112_rbk.png'),
(123, 1, 'Bridge TV', '_0113_bridgetv.png'),
(124, 2, 'Bridge TV', '_0113_bridgetv.png'),
(125, 3, 'Bridge TV', '_0113_bridgetv.png'),
(126, 3, 'Sony Sci-Fi', '_0114_sony.png'),
(127, 1, 'ТНВ', '_0115_tnv.png'),
(128, 2, 'ТНВ', '_0115_tnv.png'),
(129, 3, 'ТНВ', '_0115_tnv.png'),
(130, 2, 'Драйв', '_0116_draiv.png'),
(131, 3, 'Драйв', '_0116_draiv.png'),
(132, 2, 'Охота и рыбалка', '_0110_oxotairibalka.png'),
(133, 3, 'Охота и рыбалка', '_0110_oxotairibalka.png'),
(134, 1, 'Мир 24', '_0109_mir24.png'),
(135, 2, 'Мир 24', '_0109_mir24.png'),
(136, 3, 'Мир 24', '_0109_mir24.png'),
(137, 2, 'Кухня ТВ', '_0108_kyxna.png'),
(138, 3, 'Кухня ТВ', '_0108_kyxna.png'),
(139, 2, 'Моя Планета', '_0107_moyaplaneta.png'),
(140, 3, 'Моя Планета', '_0107_moyaplaneta.png'),
(141, 3, 'BRIDGE TV DELUXE', '_0106_bridgetvdeluxe.png'),
(142, 3, 'BRIDGE TV CLASSIC', '_0105_bridgetvclassic.png'),
(143, 3, 'BRIDGE TV HITS', '_0096_bridgetvrusskiyxit.png'),
(144, 2, 'BRIDGE TV HITS', '_0096_bridgetvrusskiyxit.png'),
(145, 1, 'BRIDGE TV HITS', '_0096_bridgetvrusskiyxit.png'),
(146, 1, 'DW', '_0102_dw.png'),
(147, 2, 'DW', '_0102_dw.png'),
(148, 3, 'DW', '_0102_dw.png'),
(149, 1, 'Калейдоскоп', '_0103_kaleydoskop.png'),
(150, 2, 'Калейдоскоп', '_0103_kaleydoskop.png'),
(151, 3, 'Калейдоскоп', '_0103_kaleydoskop.png'),
(152, 1, 'ТНВ-Планета', '_0005_tnvplaneta.png'),
(153, 2, 'ТНВ-Планета', '_0005_tnvplaneta.png'),
(154, 3, 'ТНВ-Планета', '_0005_tnvplaneta.png'),
(155, 3, 'TiJi', '_0104_tiji.png'),
(156, 2, 'TiJi', '_0104_tiji.png'),
(157, 1, 'Вместе РФ', '_0099_vmesterf.png'),
(158, 2, 'Вместе РФ', '_0099_vmesterf.png'),
(159, 3, 'Вместе РФ', '_0099_vmesterf.png'),
(160, 2, 'SET', '_0098_set.png'),
(161, 3, 'SET', '_0098_set.png'),
(162, 3, 'Sony Turbo', '_0097_sonyturbo.png'),
(163, 1, 'Bridge TV Русский Хит', '_0096_bridgetvrusskiyxit.png'),
(164, 2, 'Bridge TV Русский Хит', '_0096_bridgetvrusskiyxit.png'),
(165, 3, 'Bridge TV Русский Хит', '_0096_bridgetvrusskiyxit.png'),
(166, 3, 'Музыка Первого', '_0095_musicpervogo.png'),
(167, 2, 'Музыка Первого', '_0095_musicpervogo.png'),
(168, 1, 'БелРос', '_0094_belros.png'),
(169, 2, 'БелРос', '_0094_belros.png'),
(170, 3, 'БелРос', '_0094_belros.png'),
(171, 1, 'Радость моя', '_0088_radostmoya.png'),
(172, 2, 'Радость моя', '_0088_radostmoya.png'),
(173, 3, 'Радость моя', '_0088_radostmoya.png'),
(174, 2, 'Zee', '_0089_zee.png'),
(175, 3, 'Zee', '_0089_zee.png'),
(176, 1, 'РЖД ТВ', '_0090_rgdtv.png'),
(177, 2, 'РЖД ТВ', '_0090_rgdtv.png'),
(178, 3, 'РЖД ТВ', '_0090_rgdtv.png'),
(179, 1, 'World Fashion Channel', '_0091_worldfashion.png'),
(180, 2, 'World Fashion Channel', '_0091_worldfashion.png'),
(181, 3, 'World Fashion Channel', '_0091_worldfashion.png'),
(182, 2, 'Телекафе', '_0092_telekafe.png'),
(183, 3, 'Телекафе', '_0092_telekafe.png'),
(184, 1, 'Нано ТВ', '_0093_nanotv.png'),
(185, 2, 'Нано ТВ', '_0093_nanotv.png'),
(186, 3, 'Нано ТВ', '_0093_nanotv.png'),
(187, 3, 'RT HD', '_0087_rthd.png'),
(188, 3, 'Eurosport HD', '_0086_eurosport.png'),
(189, 3, 'А1', '_0085_a1.png'),
(190, 2, 'А1', '_0085_a1.png'),
(191, 2, 'Матч! Арена', '_0084_matcharena.png'),
(192, 3, 'Матч! Арена', '_0084_matcharena.png'),
(193, 1, 'Большая Азия', '_0083_bigazia.png'),
(194, 2, 'Большая Азия', '_0083_bigazia.png'),
(195, 3, 'Большая Азия', '_0083_bigazia.png'),
(196, 2, 'Ключ HD', '_0082_klychd.png'),
(197, 3, 'Ключ HD', '_0082_klychd.png'),
(198, 3, 'HGTV HD', '_0076_hgtvhd.png'),
(199, 2, 'HGTV HD', '_0076_hgtvhd.png'),
(200, 1, '8 канал', '_0078_8kanal.png'),
(201, 2, '8 канал', '_0078_8kanal.png'),
(202, 3, '8 канал', '_0078_8kanal.png'),
(203, 3, 'Дом Кино', '_0079_domkino.png'),
(204, 1, 'Дом Кино', '_0079_domkino.png'),
(205, 1, 'RU.TV', '_0080_rutv.png'),
(206, 2, 'RU.TV', '_0080_rutv.png'),
(207, 3, 'RU.TV', '_0080_rutv.png'),
(208, 3, 'Ocean TV', '_0081_oceantv.png'),
(209, 3, 'Точка ТВ', '_0075_tochkatv.png'),
(210, 2, 'Точка ТВ', '_0075_tochkatv.png'),
(211, 1, 'Точка ТВ', '_0075_tochkatv.png'),
(212, 2, 'КХЛ', '_0074_klx.png'),
(213, 3, 'КХЛ', '_0074_klx.png'),
(214, 3, 'Живи!', '_0073_givi.png'),
(215, 2, 'Живи!', '_0073_givi.png'),
(216, 2, 'Киносерия', '_0072_kinoseria.png'),
(217, 3, 'Киносерия', '_0072_kinoseria.png'),
(218, 3, 'Киномикс', '_0071_kinomiks.png'),
(219, 2, 'Киномикс', '_0071_kinomiks.png'),
(220, 1, 'Известия HD', '_0070_izvestiya.png'),
(221, 2, 'Известия HD', '_0070_izvestiya.png'),
(222, 3, 'Известия HD', '_0070_izvestiya.png'),
(223, 3, 'TLC HD', '_0064_ltchd.png'),
(224, 3, 'ЛДПР ТВ', '_0065_ldprtv.png'),
(225, 2, 'ЛДПР ТВ', '_0065_ldprtv.png'),
(226, 1, 'ЛДПР ТВ', '_0065_ldprtv.png'),
(227, 3, 'Шансон', '_0066_shanson.png'),
(228, 3, 'Союз', '_0067_soyz.png'),
(229, 2, 'Союз', '_0067_soyz.png'),
(230, 1, 'Союз', '_0067_soyz.png'),
(231, 1, 'France 24', '_0068_france24.png'),
(232, 2, 'France 24', '_0068_france24.png'),
(233, 3, 'France 24', '_0068_france24.png'),
(234, 3, 'Filmbox', '_0069_filmbox.png'),
(235, 2, 'Filmbox', '_0069_filmbox.png'),
(236, 1, 'RT Док', '_0063_rtdok.png'),
(237, 2, 'RT Док', '_0063_rtdok.png'),
(238, 3, 'RT Док', '_0063_rtdok.png'),
(239, 3, 'Мультиландия', '_0062_myltilandiya.png'),
(240, 2, 'Мультиландия', '_0062_myltilandiya.png'),
(241, 2, 'Первый образовательный', '_0061_perviyobrazovatelny.png'),
(242, 3, 'Первый образовательный', '_0061_perviyobrazovatelny.png'),
(243, 3, 'Кто есть кто', '_0060_ktoestkto.png'),
(244, 2, 'Кто есть кто', '_0060_ktoestkto.png'),
(245, 2, 'Music Box', '_0059_musikbox.png'),
(246, 3, 'Music Box', '_0059_musikbox.png'),
(247, 3, 'Russian Music Box', '_0058_russianmusicbox.png'),
(248, 2, 'Russian Music Box', '_0058_russianmusicbox.png'),
(249, 3, 'Загородный', '_0052_zagoronhiy.png'),
(250, 3, 'E TV', '_0053_etv.png'),
(251, 3, 'Русская ночь', '_0054_russkayanotch.png'),
(252, 3, 'Рыболов', '_0055_ribolov.png'),
(253, 3, 'КВН ТВ', '_0056_kvntv.png'),
(254, 3, '365 дней', '_0057_365day.png'),
(255, 3, 'Матч!Страна', '_0051_matchstrana.png'),
(256, 3, 'Матч! Игра', '_0050_matchigra.png'),
(257, 3, 'RTG', '_0049_rtg.png'),
(258, 3, 'Мужской', '_0048_men.png'),
(259, 3, 'Тномер', '_0047_tnomer.png'),
(260, 3, 'Успех', '_0046_ucpex.png'),
(261, 3, 'Эврика HD', '_0040_evrikahd.png'),
(262, 3, 'Кино ТВ HD', '_0041_kinotvhd.png'),
(263, 3, 'O2TV', '_0042_o2tv.png'),
(264, 3, 'Hualiang TV', '_0043_hualiangtv.png'),
(265, 3, 'Cartoon Network', '_0044_cartoonnetvork.png'),
(266, 2, 'Cartoon Network', '_0044_cartoonnetvork.png'),
(267, 2, 'CNN', '_0045_cnn.png'),
(268, 3, 'CNN', '_0045_cnn.png'),
(269, 3, 'Живая планета', '_0039_givayaplaneta.png'),
(270, 3, 'Еда', '_0038_eda.png'),
(271, 2, 'Еда', '_0038_eda.png'),
(272, 2, '1 HD', '_0037_1hd.png'),
(273, 2, 'Первый вегетарианский', '_0036_perviyvegetarian.png'),
(274, 3, '1 HD', '_0037_1hd.png'),
(275, 3, 'Первый вегетарианский', '_0036_perviyvegetarian.png'),
(276, 3, 'Пес и Ко', '_0035_pesiko.png'),
(277, 2, 'Пес и Ко', '_0035_pesiko.png'),
(278, 2, 'Поехали!', '_0034_poexali.png'),
(279, 3, 'Поехали!', '_0034_poexali.png'),
(280, 3, 'Русский Детектив', '_0028_russkiydedektiv.png'),
(281, 2, 'Русский Детектив', '_0028_russkiydedektiv.png'),
(282, 2, 'Мама', '_0029_mama.png'),
(283, 3, 'Мама', '_0029_mama.png'),
(284, 3, 'Ani', '_0030_ani.png'),
(285, 3, 'Мультимузыка', '_0031_myltimyzika.png'),
(286, 3, 'НСТВ', '_0032_nctv.png'),
(287, 2, 'НСТВ', '_0032_nctv.png'),
(288, 3, 'История', '_0033_history.png'),
(289, 3, 'Техно 24', '_0027_texno24.png'),
(290, 3, 'Мульт HD', '_0026_mylthd.png'),
(291, 2, 'Мульт HD', '_0026_mylthd.png'),
(292, 2, 'Русский Роман HD', '_0025_russkiyromanhd.png'),
(293, 3, 'Русский Роман HD', '_0025_russkiyromanhd.png'),
(294, 3, 'Русский Экстрим HD', '_0024_russkiyekstrimhd.png'),
(295, 2, 'Русский Экстрим HD', '_0024_russkiyekstrimhd.png'),
(296, 2, 'Мульт', '_0023_mylt.png'),
(297, 3, 'Мульт', '_0023_mylt.png'),
(298, 3, 'Русский Бестселлер', '_0022_russkiybesteller.png'),
(299, 2, 'Русский Бестселлер', '_0022_russkiybesteller.png'),
(300, 2, 'Наука', '_0016_nauka.png'),
(301, 3, 'Наука', '_0016_nauka.png'),
(302, 3, 'Motorsport', '_0017_motorsport.png'),
(303, 2, 'Motorsport', '_0017_motorsport.png'),
(304, 2, 'Матч HD', '_0018_matchhd.png'),
(305, 3, 'Матч HD', '_0018_matchhd.png'),
(306, 3, 'СТС kids', '_0019_ctckids.png'),
(307, 2, 'СТС kids', '_0019_ctckids.png'),
(308, 2, 'Europa Plus TV', '_0020_europaplustv.png'),
(309, 3, 'Europa Plus TV', '_0020_europaplustv.png'),
(310, 3, 'Театр', '_0021_teatr.png'),
(311, 2, 'Театр', '_0021_teatr.png'),
(312, 1, 'Театр', '_0021_teatr.png'),
(313, 3, 'Luxury', '_0015_luxury.png'),
(314, 3, 'FAN', '_0014_fan.png'),
(315, 3, 'Комедия', '_0012_sochi24.png'),
(316, 2, 'Комедия', '_0013_komedia.png'),
(317, 1, 'Сочи24', '_0012_sochi24.png'),
(318, 2, 'Сочи24', '_0012_sochi24.png'),
(319, 3, 'Сочи24', '_0012_sochi24.png'),
(320, 3, 'Победа HD', '_0011_pobedahd.png'),
(321, 2, 'Победа HD', '_0011_pobedahd.png'),
(322, 1, 'СТС HD', '_0010_ctchd.png'),
(323, 2, 'СТС HD', '_0010_ctchd.png'),
(324, 3, 'СТС HD', '_0010_ctchd.png'),
(325, 3, 'Домашний HD', '_0006_domashniyhd.png'),
(326, 2, 'Домашний HD', '_0006_domashniyhd.png'),
(327, 1, 'Домашний HD', '_0006_domashniyhd.png'),
(328, 3, 'Cinéma', '_0007_cinema.png'),
(329, 3, 'Красная линия', '_0008_krasnayaliniya.png'),
(330, 2, 'Красная линия', '_0008_krasnayaliniya.png'),
(331, 1, 'Красная линия', '_0008_krasnayaliniya.png'),
(332, 2, 'Арсенал', '_0009_arsenal.png'),
(333, 3, 'Арсенал', '_0009_arsenal.png'),
(334, 2, 'Animal Planet', '_0000_animalplanet.png'),
(335, 2, 'Discovery', '_0001_discovery.png'),
(336, 2, 'Евроспорт', '_0002_eurosport.png'),
(337, 2, 'TLC', '_0003_tlc.png'),
(338, 2, 'Кино ТВ', '_0004_kinotv.png'),
(339, 3, 'Shopping Live', '_0101_shoppinglive.png'),
(340, 3, 'A2', '_0077_a2.png'),
(341, 2, 'Shopping Live', '_0101_shoppinglive.png'),
(342, 2, 'Дом Кино', '_0079_domkino.png'),
(343, 2, 'O2TV', '_0042_o2tv.png');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `login` varchar(255) DEFAULT NULL COMMENT ' Логин ',
  `pass` varchar(255) DEFAULT NULL COMMENT ' Пароль ',
  `email` varchar(255) DEFAULT NULL COMMENT ' Емаил ',
  `ip_reg` varchar(255) DEFAULT NULL COMMENT ' ип регистрации ',
  `ip_lust_auth` varchar(255) DEFAULT NULL COMMENT ' ип последнего входа ',
  `date_reg` varchar(255) DEFAULT NULL COMMENT ' Дата регистрации ',
  `date_lust_auth` varchar(255) DEFAULT NULL COMMENT ' Дата последнего входа '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `email`, `ip_reg`, `ip_lust_auth`, `date_reg`, `date_lust_auth`) VALUES
(1, 'JaligWei', 'JaligWei', 'JaligWei@ya.ru', '127.0.0.1', 'null', '1596999660', 'null'),
(2, 'admin', 'admin111', 'admin@admin.ru', '127.0.0.1', 'null', '1597000681', 'null'),
(3, 'vvvvvvv', '1234567', 'gakman.a.g@gmail.com', '127.0.0.1', 'null', '1597000974', 'null'),
(4, 'admiral2', '723cb7f3e4ea004b661b4ca5859f51bd8fcd3b14184eb1474e1ec35202e7231c', 'admiral2@ya.ru', '127.0.0.1', 'null', '1597004897', 'null'),
(5, 'test123', '1cd9c6da25c2e0e21e387b07aabc7e1e58dac52ca030b3416923a32053d078e4', 'test@test.ru', '127.0.0.1', NULL, '1606231682', NULL),
(6, 'test123', '1cd9c6da25c2e0e21e387b07aabc7e1e58dac52ca030b3416923a32053d078e4', 'test@test.ru', '127.0.0.1', NULL, '1606231688', NULL),
(7, 'test123', '1cd9c6da25c2e0e21e387b07aabc7e1e58dac52ca030b3416923a32053d078e4', 'test@test.ru', '127.0.0.1', NULL, '1606231688', NULL),
(8, 'test123', '1cd9c6da25c2e0e21e387b07aabc7e1e58dac52ca030b3416923a32053d078e4', 'test@test.ru', '127.0.0.1', NULL, '1606231689', NULL),
(9, 'test123', '1cd9c6da25c2e0e21e387b07aabc7e1e58dac52ca030b3416923a32053d078e4', 'test@test.ru', '127.0.0.1', NULL, '1606231743', NULL),
(10, 'test123', '1cd9c6da25c2e0e21e387b07aabc7e1e58dac52ca030b3416923a32053d078e4', 'test@test.ru', '127.0.0.1', NULL, '1606231754', NULL),
(11, 'test1231', '1cbf22b4fac00b6c9d936a87647ad52079f61a864e0af9090c82ff319ef108cf', 'test@test.ru', '127.0.0.1', NULL, '1606231795', NULL),
(12, 'test12311', '9bf59f61d943fec9d04a61066557dacfb77b628e04f65c05ad23639ba9c591f0', 'test@test.ru', '127.0.0.1', NULL, '1606231837', NULL),
(13, 'test123112', '981345120b25e84cb0f022da0a4e10b0e6c06f32d39c1abcef3f318657aea9b3', 'test@test.ru', '127.0.0.1', NULL, '1606231891', NULL),
(14, 'test1231123', '3169611df82d5ac7c7c24a83140f8202cb2e232b8538560e19d4417f6da7c687', 'test@test.ru', '127.0.0.1', NULL, '1606231900', NULL),
(15, 'admin1234', '2356deef225a1c68e1e7ff001d630056c754073d3e09b97ec8efc175c5c63ec4', 'admin1234@ya.ru', '127.0.0.1', NULL, '1606658858', NULL),
(16, '123213213123', '6826dca2cb7eaaf39bc4016acfaf88767f3d3c2620c050525b3c0c2d8ab16062', '123213213123', '127.0.0.1', NULL, '1606658957', NULL),
(17, 'test12311232', '91c9215600c1b8b6ba3ed4bf1a348c53ee35296293f0af235a2e62fb14132606', 'test12311232@ya.ru', '127.0.0.1', NULL, '1606659888', NULL),
(18, 'urlrewrwe', '648a5959a7e49cc07281f37c013b341f89689cd51edb62bb65cb0d20b6976ca2', 'urlrewrwe@ya.ru', '127.0.0.1', NULL, '1606659987', NULL),
(19, 'urlrewrwe1', '3e7d9db72a27728f7d5a58fe12ed49d2d89364430d885a313b5e1fca03a52f2a', 'admin@ya.ru', '127.0.0.1', NULL, '1606661224', NULL),
(20, 'urlrewrwe2', '38f1a45940c5618f9664ed212eadb44b3259f2fa8ad5a1a6d15767dedbe0adc2', 'admin@ya.ru', '127.0.0.1', NULL, '1606661273', NULL),
(21, '1111111122', '64f6ec1d99d462036e28651b75eff405c0f54b73a642d3083109d54a06d8403b', '1111111122@ya.ru', '127.0.0.1', NULL, '1606663273', NULL),
(22, 'adminr232', '3cb7d8abbe927d16ecc0409f8ab8e5fd96a3d884bb2f2c73fb376fcd00605bfc', 'adminr232@ya.ru', '127.0.0.1', NULL, '1606663756', NULL),
(23, 'test1231123233', '957d0f1ce0263d1a2f204fb30f8c0e6adb5f41b1324f83351a6dd9ddf076879e', 'test1231123233@ya.ru', '127.0.0.1', NULL, '1606663827', NULL),
(24, '3213123213', '84ae23be9faf2ce6919f620ee0b46b2c04370e4008059b79a789f4fe38a60c63', '3213123213@ya.ru', '127.0.0.1', NULL, '1606663945', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `zayavka`
--

CREATE TABLE `zayavka` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `tp` text DEFAULT NULL COMMENT ' Тарифный план ',
  `adress` text DEFAULT NULL COMMENT ' Адрес ',
  `fio` text DEFAULT NULL COMMENT ' Ф.И.О ',
  `phone` varchar(255) DEFAULT NULL COMMENT ' Телефон ',
  `namberz` varchar(255) DEFAULT NULL COMMENT ' Номер заявки  ',
  `stat` varchar(255) DEFAULT NULL COMMENT ' Статус '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zayavka`
--

INSERT INTO `zayavka` (`id`, `tp`, `adress`, `fio`, `phone`, `namberz`, `stat`) VALUES
(1, '<div class', 'Улица: 1 \n        Дом: 1 \n        Квартира: 2', 'Фамилия: 4 \n        Имя: 3', '5', NULL, 'new'),
(2, '<div class', 'Улица: 1 Дом: 1 Квартира: 2', 'Фамилия: 4 Имя: 3', '5', NULL, 'new'),
(3, '<div class', 'Улица: ds Дом: sd Квартира: sds', 'Фамилия: ds Имя: dds', 'ds', NULL, 'new'),
(4, '<div class', 'Улица: Улица Дом: дом Квартира: квартира', 'Фамилия: фамилия Имя: имя', '+70123456789', NULL, 'new'),
(5, '<div class', 'Улица: Улица Дом: дом Квартира: квартира', 'Фамилия: фамилия Имя: имя', '+70123456789', NULL, 'new'),
(6, '<div class', 'Улица: uyhuu Дом: ybvbhj Квартира: fffff', 'Фамилия: фамилияrree Имя: имяghjjy', '+70123456789e', NULL, 'new'),
(7, '<div class', 'Улица: uyhuu Дом: ybvbhj Квартира: fffff', 'Фамилия: фамилияrree Имя: имяghjjy', '+70123456789e', NULL, 'new'),
(8, '<div class', 'Улица: uyhuu Дом: ybvbhj Квартира: fffff', 'Фамилия: фамилияrree Имя: имяghjjy', '+70123456789e', NULL, 'new'),
(9, '<div class', 'Улица: 1 Дом: 1 Квартира: 1', 'Фамилия: 1 Имя: 1', '1', NULL, 'new');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ajax`
--
ALTER TABLE `ajax`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blocks_banners`
--
ALTER TABLE `blocks_banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blocks_callme`
--
ALTER TABLE `blocks_callme`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blocks_footer`
--
ALTER TABLE `blocks_footer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blocks_header`
--
ALTER TABLE `blocks_header`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_micro`
--
ALTER TABLE `news_micro`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telecom_index`
--
ALTER TABLE `telecom_index`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telecom_tarifs`
--
ALTER TABLE `telecom_tarifs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telecom_tv`
--
ALTER TABLE `telecom_tv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `ajax`
--
ALTER TABLE `ajax`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `api`
--
ALTER TABLE `api`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `blocks_banners`
--
ALTER TABLE `blocks_banners`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `blocks_callme`
--
ALTER TABLE `blocks_callme`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `blocks_footer`
--
ALTER TABLE `blocks_footer`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ';

--
-- AUTO_INCREMENT для таблицы `blocks_header`
--
ALTER TABLE `blocks_header`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ';

--
-- AUTO_INCREMENT для таблицы `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news_micro`
--
ALTER TABLE `news_micro`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `router`
--
ALTER TABLE `router`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `telecom_index`
--
ALTER TABLE `telecom_index`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `telecom_tarifs`
--
ALTER TABLE `telecom_tarifs`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `telecom_tv`
--
ALTER TABLE `telecom_tv`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `zayavka`
--
ALTER TABLE `zayavka`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
