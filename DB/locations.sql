-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql.etu.umontpellier.fr
-- Généré le : ven. 12 jan. 2024 à 09:09
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
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `idLocation` int(5) NOT NULL,
  `idBien` int(5) NOT NULL,
  `mailLoueur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `avis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noteEtoile` int(3) NOT NULL,
  `nom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`idLocation`, `idBien`, `mailLoueur`, `dateDebut`, `dateFin`, `avis`, `noteEtoile`, `nom`, `prenom`) VALUES
(52, 1, 'zidora@gmail.com', '2023-12-01', '2023-12-02', 'test', 0, 'Randria', 'Tsiory'),
(53, 1, 'zidora@gmail.com', '2023-12-03', '2023-12-04', 'propre', 0, 'Randria', 'Tsiory'),
(54, 9, 'tamby@gmail.com', '2023-12-01', '2023-12-03', 'essaie', 0, 'Nomena', 'Tsirilaza'),
(55, 1, 'zidora@gmail.com', '2023-12-10', '2023-12-11', 'moins cher', 0, 'Nomena', 'Tsirilaza'),
(64, 7, 'maholy@gmail.com', '2024-01-12', '2024-01-13', 'andrana etoile faharoa', 4, 'Randria', 'Tsiory'),
(65, 3, 'ezekiela@gmail.com', '2024-01-11', '2024-01-12', 'cinq etoile!!!!', 5, 'Randria', 'Tsiory'),
(66, 2, 'mparany@gmail.com', '2024-01-12', '2024-01-14', 'pas bien du tout', 1, 'Ran', 'Andry');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`idLocation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `idLocation` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
