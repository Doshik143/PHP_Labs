-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 17 2025 р., 21:20
-- Версія сервера: 9.1.0
-- Версія PHP: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `lab5`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tov`
--

DROP TABLE IF EXISTS `tov`;
CREATE TABLE IF NOT EXISTS `tov` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int NOT NULL,
  `kol` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `tov`
--

INSERT INTO `tov` (`id`, `name`, `cost`, `kol`, `date`) VALUES
(1, 'Хліб столовий', 24, 100, '2023-10-01'),
(2, 'Хліб житній', 20, 50, '2023-10-02'),
(3, 'Молоко', 30, 80, '2023-10-03'),
(4, 'Сир', 120, 30, '2023-10-04'),
(5, 'Масло', 50, 60, '2023-10-05'),
(6, 'Яйця', 40, 200, '2023-10-06'),
(7, 'Цукор', 25, 150, '2023-10-07'),
(8, 'Кава', 200, 40, '2023-10-08'),
(9, 'Чай', 150, 60, '2023-10-09'),
(10, 'Печиво', 35, 120, '2023-10-10'),
(11, 'Новий товар', 100, 50, '2023-10-11'),
(13, 'Хачапурі', 30, 143, '2025-03-17');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `birthdate`, `address`, `gender`, `created_at`) VALUES
(2, 'Test', '$2y$12$K6BYg3hNn/t52cvjrpCVA.ccCrDOF4D0.wHDaYDQlaQXkk/S.Y13e', 'test@gmail.com', 'Test', '+380111111111', '2013-12-13', 'Test; str.Test, 13', 0, '2025-03-16 21:36:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
