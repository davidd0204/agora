-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 juin 2023 à 12:16
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parcourir`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles_reg`
--

DROP TABLE IF EXISTS `articles_reg`;
CREATE TABLE IF NOT EXISTS `articles_reg` (
  `ID` int NOT NULL,
  `Nom_article` varchar(255) NOT NULL,
  `Photo_article` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description_article` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prix_article` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles_reg`
--

INSERT INTO `articles_reg` (`ID`, `Nom_article`, `Photo_article`, `Description_article`, `Video`, `Prix_article`, `categorie`) VALUES
(1, 'Iphone 14 Pro noir	', 'iphone.jpeg', '', 'iphone_14.mp4', '1 049,99$', 'Smartphone'),
(2, 'Samsung Galaxy S23 Ultra', 'samsung-galaxy-s23-ultra-s918b-12go-1to-dual-sim-noir.jpg', '', 'galaxys23.mp4', '1299.00$', 'Smartphone'),
(3, 'Playstation 4 Pro', 'LD0003833580_2.jpg', '', 'ps4pro.mp4', '251.48$', 'Console'),
(4, 'Xbox One S', 'visuel-12.jpg', '', 'visuelxbox.mp4', '130.97$', 'Console'),
(5, 'Samsung Galaxy Book3 Ultra', 'Samsung_Galaxy_Book3_Ultra_16__1_.jpg', '', 'Galaxybook3.mp4', '1 399,00$', 'Ordinateur portable'),
(6, 'Macbook Pro', 'apple-macbook-pro-16-2021-1200.jpg', '', 'MacBook.mp4', '1 599.00$', 'Ordinateur portable'),
(7, 'Dyson V15 Detect', '443099-01.png', '', 'dyson.mp4', '699,00$', 'Maison'),
(8, 'Razer Black Widow V3', '81fWpdycqcL._AC_SX425_.jpg', '', 'razer.mp4', '109.99$', 'Clavier');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
