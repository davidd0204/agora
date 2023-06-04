-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306


-- Généré le : sam. 03 juin 2023 à 10:10

-- Généré le : ven. 02 juin 2023 à 10:12


-- Généré le : sam. 03 juin 2023 à 10:10

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
-- Base de données : `votre compte`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte client`
--

DROP TABLE IF EXISTS `compte client`;
CREATE TABLE IF NOT EXISTS `compte client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password1` varchar(255) NOT NULL,
  `Password2` varchar(255) NOT NULL,
  `Type` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte client`
--

INSERT INTO `compte client` (`id`, `Nom`, `Prénom`, `Adresse`, `Email`, `Password1`, `Password2`, `Type`) VALUES
(1, 'Web', 'Dynamique', '10 rue de la paix', '20alasoutenancesvp@gmail.com', 'blabla', 'blabla', 0);


  `Type` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Structure de la table `identification`
--

DROP TABLE IF EXISTS `identification`;
CREATE TABLE IF NOT EXISTS `identification` (
  `Login` varchar(255) NOT NULL,
  `Mot de passe` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Adresse ligne 1` varchar(255) NOT NULL,
  `Adresse ligne 2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Code postale` int NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numéro de téléphone du client` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;


DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS 'panier' (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  nombre_articles INT NOT NULL,
  id_articles VARCHAR(255) NOT NULL
);ENGINE=MyISAM DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
