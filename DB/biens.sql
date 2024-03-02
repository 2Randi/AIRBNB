-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql.etu.umontpellier.fr
-- Généré le : ven. 12 jan. 2024 à 09:08
-- Version du serveur : 10.1.47-MariaDB
-- Version de PHP : 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e20230012311`
--

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `idBien` int(5) NOT NULL,
  `mailProprio` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(5) NOT NULL,
  `nbCouchages` int(3) NOT NULL,
  `nbChambres` int(3) NOT NULL,
  `distance` int(7) NOT NULL,
  `prix` int(6) NOT NULL,
  `latitude` decimal(12,10) NOT NULL,
  `longitude` decimal(12,10) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`idBien`, `mailProprio`, `commune`, `rue`, `cp`, `nbCouchages`, `nbChambres`, `distance`, `prix`, `latitude`, `longitude`, `photo`) VALUES
(1, 'zidora@gmail.com', 'Avignon', 'Rue des Teinturiers', 84100, 1, 2, 4000, 35, 43.9450470400, 4.8132342900, ''),
(2, 'mparany@gmail.com', 'Avignon', 'Rue Joseph Vernet', 84200, 3, 1, 4000, 110, 43.9476737748, 4.8033506231, ''),
(3, 'ezekiela@gmail.com', 'Bagnot', '37 Rue Thurot', 21700, 2, 5, 300, 55, 47.1350680389, 4.9481293676, ''),
(4, 'daniela@gmail.com', 'Haudricourt', 'rue de l\'Eglise', 76390, 4, 2, 200, 130, 49.7683117032, 1.6409017101, ''),
(5, 'hosea@gmail.com', 'Sainneville', 'Route du Moignan', 76430, 1, 5, 200, 40, 49.5650961839, 0.2873414543, ''),
(6, 'miaro@gmail.com', 'Paris', 'Rue de la Paix', 75001, 3, 1, 3600, 130, 48.8689596371, 2.3305579725, ''),
(7, 'maholy@gmail.com', 'Marseille', 'Avenue du Prado', 13006, 2, 2, 6700, 80, 43.2812994312, 5.3871508765, ''),
(8, 'nahary@gmail.com', 'Lyon', 'Rue de la République', 69001, 1, 1, 2300, 35, 45.7633202145, 4.8357759920, ''),
(9, 'tamby@gmail.com', 'Bordeaux', 'Cours de l\'Intendance', 33000, 3, 1, 2100, 90, 44.8420712321, -0.5773401748, ''),
(10, 'miorati@gmail.com', 'Bordeaux', 'Quai Richelieu', 33200, 3, 3, 5400, 120, 44.8379919436, -0.5675977184, ''),
(11, 'tendry@gmail.com', 'Bordeaux', 'Rue Saint-Rémi', 33100, 4, 2, 100, 140, 44.8414412116, -0.5723907614, ''),
(12, 'navalona@gmail.com', 'Lille', 'Rue Faidherbe', 59000, 2, 2, 630, 63, 50.6370350463, 3.0672628091, ''),
(13, 'nanja@gmail.com', 'Strasbourg', 'Quai des Bateliers', 67000, 2, 1, 800, 80, 48.5807800514, 7.7537773677, ''),
(14, 'mahery@gmail.com', 'Strasbourg', 'Rue de la Krutenau', 67000, 3, 2, 1200, 120, 48.5806315300, 7.7574682677, ''),
(15, 'orimbato@gmail.com', 'Paris', 'Boulevard Saint-Germain', 75006, 2, 2, 800, 80, 48.8532993340, 2.3343906339, ''),
(16, 'miarana@gmail.com', 'Montpellier', 'Place de la Comédie', 34000, 1, 1, 400, 40, 43.6089572900, 3.8796424753, ''),
(17, 'fanendry@gmail.com', 'Toulouse', 'Place du Capitole', 31000, 2, 2, 800, 80, 43.6044214310, 1.4439515598, ''),
(18, 'doria@gmail.com', 'Strasbourg', 'Rue des Hallebardes', 67200, 1, 4, 400, 30, 48.5823236370, 7.7498172677, ''),
(19, 'tsanta@gmail.com', 'Toulouse', 'Rue du Taur', 31100, 2, 2, 400, 80, 43.6065214730, 1.4424592779, ''),
(20, 'onja@gmail.com', 'Toulouse', 'Allée Jules Guesde', 31200, 1, 1, 500, 43, 43.5939558250, 1.4478824115, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`idBien`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `idBien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
