-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 04 juin 2023 à 12:23
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
-- Structure de la table `articles_hdg`
--

DROP TABLE IF EXISTS `articles_hdg`;
CREATE TABLE IF NOT EXISTS `articles_hdg` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom_article` varchar(255) NOT NULL,
  `Photo_article` varchar(255) NOT NULL,
  `Description_article` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Prix_article` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
   PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles_hdg`
--

INSERT INTO `articles_hdg` (`ID`, `Nom_article`, `Photo_article`, `Description_article`, `Video`, `Prix_article`, `categorie`) VALUES
(1, 'Iphone 14 Pro noir	', 'iphone.jpeg', 'Type de produit: Smartphone\nNuméro de modèle du fabricant:	A2890\nFormat:	Tactile\nProtection:	Anti-poussière, anti-éclaboussement, étanche', 'iphone_14.mp4', '1 049,99$', 'Smartphone'),
(2, 'Samsung Galaxy S23 Ultra', 'samsung-galaxy-s23-ultra-s918b-12go-1to-dual-sim-noir.jpg', 'Couleur:   Noir\nVerrouillage opérateur:  Débloqué tout opérateur\nTaille écran (pouces):   6,8\nCapacité de stockage:    256 Go', 'galaxys23.mp4', '1299.00$', 'Smartphone'),
(3, 'Google Pixel 6 Pro', 'google-pixel-6-pro.jpg', 'Couleur: Noir\nTaille écran (pouces): 6,7\nCapacité de stockage: 128 Go\nMémoire: 8 Go', 'pixel6pro.mp4', '1 099,00$', 'Smartphone'),
(4, 'Sony PlayStation 5', 'sony-playstation-5.jpg', 'Couleur: Blanc\nCapacité de stockage: 825 Go\nRésolution: 4K', 'ps5.mp4', '599,00$', 'Console de jeu'),
(5, 'Samsung Galaxy Book3 Ultra', 'Samsung_Galaxy_Book3_Ultra_16__1_.jpg', 'Couleur:   Gris\nTaille écran (pouces):    13,3\nCapacité de stockage:    512 Go\nMémoire:   8 Go', 'Galaxybook3.mp4', '1 399,00$', 'Ordinateur portable'),
(6, 'Macbook Pro', 'apple-macbook-pro-16-2021-1200.jpg', '', 'MacBook.mp4', '1 599.00$', 'Ordinateur portable'),
(7, 'Canon EOS R6', 'canon-eos-r6.jpg', 'Type: Appareil photo sans miroir\nRésolution: 20,1 mégapixels\nTaille de l\'écran: 3 pouces\nEnregistrement vidéo: 4K', 'eosr6.mp4', '2 499,00$', 'Appareil photo'),
(8, 'Bose QuietComfort 45', 'bose-quietcomfort-45.jpg', 'Type: Casque sans fil\nRéduction de bruit: Oui\nAutonomie de la batterie: Jusqu\'à 24 heures', 'quietcomfort45.mp4', '349,00$', 'Casque audio'),
(9, 'LG OLED C1', 'lg-oled-c1.jpg', 'Taille de l\'écran: 55 pouces\nRésolution: 4K\nTechnologie d\'affichage: OLED\nSmart TV: Oui', 'oledc1.mp4', '1 799,00$', 'Téléviseur'),
(10, 'Nintendo Switch OLED', 'nintendo-switch-oled.jpg', 'Couleur: Noir\nCapacité de stockage: 64 Go\nType: Console de jeu portable', 'switcholed.mp4', '349,00$', 'Console de jeu'),
(11, 'Fitbit Charge 5', 'fitbit-charge-5.jpg', 'Type: Bracelet d\'activité\nFonctionnalités: Suivi de la fréquence cardiaque, suivi du sommeil, suivi des activités physiques', 'fitbitcharge5.mp4', '179,00$', 'Objet connecté'),
(12, 'Dyson V11 Absolute', 'dyson-v11-absolute.jpg', 'Type: Aspirateur sans fil\nAutonomie de la batterie: Jusqu\'à 60 minutes\nType de filtre: HEPA', 'dysonv11.mp4', '599,00$', 'Électroménager'),
(13, 'GoPro Hero 10 Black', 'gopro-hero-10-black.jpg', 'Résolution de la caméra: 23,6 mégapixels\nÉtanchéité: Jusqu\'à 10 mètres\nStabilisation vidéo: HyperSmooth 4.0', 'goprohero10.mp4', '399,00$', 'Caméra d\'action'),
(14, 'Apple AirPods Pro', 'apple-airpods-pro.jpg', 'Type: Écouteurs sans fil\nRéduction de bruit: Oui\nAutonomie de la batterie: Jusqu\'à 4,5 heures (écoute) / 3,5 heures (appels)', 'airpodspro.mp4', '279,00$', 'Écouteurs'),
(15, 'Samsung Galaxy Watch 4', 'samsung-galaxy-watch-4.jpg', 'Taille de l\'écran: 40 mm\nSystème d\'exploitation: Wear OS\nFonctionnalités: Suivi de la condition physique, suivi du sommeil, notifications', 'galaxywatch4.mp4', '249,00$', 'Montre connectée');

-- --------------------------------------------------------

--
-- Structure de la table `articles_rare`
--

DROP TABLE IF EXISTS `articles_rare`;
CREATE TABLE IF NOT EXISTS `articles_rare` (
   `ID` int NOT NULL AUTO_INCREMENT,
  `Nom_article` varchar(255) NOT NULL,
  `Photo_article` varchar(255) NOT NULL,
  `Description_article` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Prix_article` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
   PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles_rare`
--

INSERT INTO `articles_rare` (`ID`, `Nom_article`, `Photo_article`, `Description_article`, `Video`, `Prix_article`, `categorie`) VALUES
(1, 'PlayStation 5 édition limitée', 'ps5_edition_limitee.jpg', 'Couleur: Noir\nCapacité de stockage: 825 Go\nRésolution: 4K\nÉdition limitée avec design exclusif', 'ps5_edition_limitee.mp4', '699,00$', 'Console de jeu'),
(2, 'Carte graphique NVIDIA GeForce RTX 3090', 'rtx3090.jpg', 'Architecture: Ampère\nMémoire: 24 Go GDDR6X\nInterfaces: HDMI, DisplayPort\nVersion haut de gamme de la série RTX 30', 'rtx3090.mp4', '1 999,00$', 'Composant informatique'),
(3, 'Apple iMac Pro', 'imac_pro.jpg', 'Processeur: Intel Xeon W\nMémoire: 32 Go\nStockage: 1 To SSD\nÉcran: 27 pouces Retina 5K\nPerformance et puissance exceptionnelles', 'imac_pro.mp4', '4 999,00$', 'Ordinateur de bureau'),
(4, 'Samsung Neo QLED 8K TV', 'samsung-neo-qled-tv.jpg', 'Taille de l\'écran: 75 pouces\nRésolution: 8K\nTechnologie d\'affichage: Neo QLED\nExpérience visuelle immersive', 'samsung_neo_qled.mp4', '9 999,00$', 'Téléviseur'),
(5, 'DJI Inspire 2 Drone', 'dji-inspire-2.jpg', 'Résolution de la caméra: 6K\nCapteur: Micro 4/3\nVitesse maximale: 58 mph\nAutonomie de vol: 27 minutes\nDrone professionnel pour la capture vidéo', 'dji_inspire2.mp4', '6 999,00$', 'Drone'),
(6, 'Sony A9 II', 'sony-a9-ii.jpg', 'Type: Appareil photo sans miroir plein format\nRésolution: 24,2 mégapixels\nVitesse de prise de vue: 20 images par seconde\nPerformances professionnelles pour la photographie sportive et d\'action', 'sony_a9ii.mp4', '5 999,00$', 'Appareil photo'),
(7, 'HTC Vive Pro 2', 'htc-vive-pro-2.jpg', 'Type: Casque de réalité virtuelle\nRésolution: 2448 x 2448 pixels par œil\nFréquence de rafraîchissement: 120 Hz\nExpérience VR haut de gamme', 'htc_vivepro2.mp4', '1 799,00$', 'Accessoire informatique'),
(8, 'LG OLED TV Rollable', 'lg-oled-tv-rollable.jpg', 'Taille de l\'écran: 65 pouces\nRésolution: 4K\nTechnologie d\'affichage: OLED\nUn téléviseur révolutionnaire avec un écran enroulable', 'lg_tv_rollable.mp4', '14 999,00$', 'Téléviseur'),
(9, 'Sony PlayStation VR', 'playstation-vr.jpg', 'Type: Casque de réalité virtuelle pour PlayStation 4\nRésolution: 1920 x 1080 pixels\nExpérience de jeu immersive en réalité virtuelle', 'playstation_vr.mp4', '299,00$', 'Accessoire de jeu');

-- --------------------------------------------------------

--
-- Structure de la table `articles_reg`
--

DROP TABLE IF EXISTS `articles_reg`;
CREATE TABLE IF NOT EXISTS `articles_reg` (
   `ID` int NOT NULL AUTO_INCREMENT,
  `Nom_article` varchar(255) NOT NULL,
  `Photo_article` varchar(255) NOT NULL,
  `Description_article` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Prix_article` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
   PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles_reg`
--

INSERT INTO `articles_reg` (`ID`, `Nom_article`, `Photo_article`, `Description_article`, `Video`, `Prix_article`, `categorie`) VALUES
(1, 'Playstation 4 Pro', 'LD0003833580_2.jpg', 'Capacité de stockage: 1000 Go\nModèle: PlayStation 4 Pro\nCouleur: Noir\nType de console: Console de salon', 'ps4pro.mp4', '251.48$', 'Console'),
(2, 'Xbox One S', 'visuel-12.jpg', 'Capacité de stockage: 500 Go\nModèle: Xbox One S\nCouleur: Blanc\nType de console: Console de salon', 'visuelxbox.mp4', '130.97$', 'Console'),
(3, 'Nintendo Switch Lite', 'nintendo-switch-lite.jpg', 'Type: Console de jeu portable\nÉcran: 5,5 pouces\nAutonomie de la batterie: Jusqu\'à 7 heures\nCompatibilité: Jeux Nintendo Switch', 'switch_lite.mp4', '229,00$', 'Console de jeu'),
(4, 'Apple AirPods Pro', 'apple-airpods-pro.jpg', 'Type: Écouteurs sans fil\nRéduction de bruit active: Oui\nAutonomie de la batterie: Jusqu\'à 4,5 heures\nAssistant vocal intégré: Siri', 'airpods_pro.mp4', '279,00$', 'Accessoire audio'),
(5, 'Samsung Galaxy Watch 4', 'samsung-galaxy-watch-4.jpg', 'Type: Montre connectée\nTaille de l\'écran: 1,4 pouces\nCapteurs: Fréquence cardiaque, SpO2, ECG\nAutonomie de la batterie: Jusqu\'à 40 heures', 'galaxy_watch4.mp4', '349,00$', 'Accessoire wearable'),
(6, 'Logitech G502 HERO', 'logitech-g502-hero.jpg', 'Type: Souris gaming\nSensibilité: 16 000 DPI\nNombre de boutons programmables: 11\nÉclairage RVB personnalisable', 'logitech_g502_hero.mp4', '79,99$', 'Accessoire informatique'),
(7, 'Dyson V15 Detect', '443099-01.png', 'Brosse: Digital Motorbar™\nAutonomie: 60 min\nTemps de charge: 4,5 hrs\nPuissance d’aspiration: 240 AW', 'dyson.mp4', '699,00$', 'Maison'),
(8, 'Razer Black Widow V3', '81fWpdycqcL._AC_SX425_.jpg', 'Couleur: Noir\nDescription du clavier: Gaming, AZERTY', 'razer.mp4', '109.99$', 'Clavier'),
(9, 'Sony PlayStation VR', 'sony-playstation-vr.jpg', 'Type: Casque de réalité virtuelle\nCompatibilité: PlayStation 4, PlayStation 5\nContrôleurs: PlayStation Move\nInclus: Caméra PlayStation', 'playstation_vr.mp4', '299,00$', 'Accessoire de jeu'),
(10, 'LG 27GL850-B', 'lg-27gl850-b.jpg', 'Taille de l\'écran: 27 pouces\nRésolution: QHD\nFréquence de rafraîchissement: 144 Hz\nTemps de réponse: 1 ms', 'lg_27gl850_b.mp4', '499,00$', 'Écran d\'ordinateur'),
(11, 'Canon EOS M50', 'canon-eos-m50.jpg', 'Type: Appareil photo hybride\nCapteur: APS-C 24,1 MP\nStabilisation d\'image: Incluse\nEnregistrement vidéo: 4K UHD', 'canon_eos_m50.mp4', '649,00$', 'Appareil photo'),
(12, 'Samsung T7 Portable SSD', 'samsung-t7-portable-ssd.jpg', 'Capacité de stockage: 1 To\nInterface: USB 3.2 Gen 2\nVitesse de lecture/écriture: Jusqu\'à 1050/1000 Mo/s\nSécurité: Chiffrement matériel AES 256 bits', 'samsung_t7_portable_ssd.mp4', '189,00$', 'Stockage externe'),
(13, 'Bose SoundLink Revolve+', 'bose-soundlink-revolve-plus.jpg', 'Type: Enceinte Bluetooth portable\nAutonomie de la batterie: Jusqu\'à 16 heures\nÉtanchéité: Oui\nAssistant vocal intégré: Siri, Google Assistant', 'bose_soundlink_revolve_plus.mp4', '249,00$', 'Accessoire audio'),
(14, 'Google Nest Hub', 'google-nest-hub.jpg', 'Type: Assistant vocal avec écran\nTaille de l\'écran: 7 pouces\nContrôle vocal: Google Assistant\nFonctionnalités: Affichage d\'informations, Contrôle domestique intelligent', 'google_nest_hub.mp4', '89,00$', 'Accessoire smart home'),
(15, 'Sony WH-1000XM4', 'sony-wh-1000xm4.jpg', 'Type: Casque sans fil\nRéduction de bruit active: Oui\nAutonomie de la batterie: Jusqu\'à 30 heures\nAssistant vocal intégré: Google Assistant, Alexa', 'sony_wh1000xm4.mp4', '349,00€', 'Accessoire audio');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
