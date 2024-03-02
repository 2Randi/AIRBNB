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
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `mail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`mail`, `prenom`, `nom`, `telephone`) VALUES
('adriann@gmail.com', 'Adriann', 'Rav', '0700000008'),
('ando@gmail.com', 'Ando', 'Kely', '0700000018'),
('andry@gmail.com', 'Andry', 'Ran', '0700000001'),
('bako@gmail.com', 'Bako', 'Roa', '0700000019'),
('bouta@gmail.com', 'Bouta', 'Be', '0700010001'),
('fano@gmail.com', 'Fano', 'Tsoa', '0700000011'),
('fiaro@gmail.com', 'Fiaro', 'Nirina', '0700000017'),
('fitahiana@gmail.com', 'Fitahiana', 'Tiana', '0700000015'),
('laza@gmail.com', 'Laza', 'Dina', '0700000016'),
('logan@gmail.com', 'Logan', 'Rak', '0700000009'),
('malala@gmail.com', 'Malala', 'Ran', '0700000004'),
('mihary@gmail.com', 'Mihary', 'Ram', '0700000003'),
('mika@gmail.com', 'Mika', 'Rab', '0700000002'),
('mirana@gmail.com', 'Mirana', 'Nome', '0700000010'),
('misaina@gmail.com', 'Misaina', 'And', '0700000012'),
('niavo@gmail.com', 'Niavo', 'Raj', '0700000013'),
('rija@gmail.com', 'Rija', 'Be', '0700000020'),
('sitraka@gmail.com', 'Sitraka', 'Heri', '0700000005'),
('tanjona@gmail.com', 'Tanjona', 'Niri', '0700000006'),
('toky@gmail.com', 'Toky', 'Niaina', '0700000014'),
('tsiory@gmail.com', 'Tsiory', 'Randria', '0700000000'),
('tsirylaza@gmail.com', 'Tsirilaza', 'Nomena', '0700000024');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`mail`) USING BTREE,
  ADD UNIQUE KEY `mail` (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
