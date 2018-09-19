-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Septembre 2018 à 03:36
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ddz`
--

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `ressources` varchar(45) DEFAULT NULL,
  `createur` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `ressources`, `createur`, `utilisateur_id`) VALUES
(21, 'azerty', NULL, 'Mcleod', 3),
(22, 'Vue du ciel', NULL, 'Mcleod', 3),
(23, 'taiwan gratte ciel', NULL, 'Mcleod', 3),
(24, 'html effect', NULL, 'Mcleod', 3),
(25, 'azer', NULL, 'Mcleod', 3),
(26, 'aze', NULL, 'Mcleod', 3),
(27, 'eaze', NULL, 'Mcleod', 3),
(28, 'sdf', NULL, 'Mcleod', 3),
(29, 'totoro', NULL, 'Mcleod', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE `ressources` (
  `idressources` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `taille` varchar(45) DEFAULT NULL,
  `format` varchar(45) DEFAULT NULL,
  `ext` varchar(45) DEFAULT NULL,
  `projet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ressources_has_projet`
--

CREATE TABLE `ressources_has_projet` (
  `ressources_idressources` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `addr_mail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `addr_mail`, `password`, `tel`) VALUES
(1, 'miaou', 'momo', 'soso@gmail.com', '123', NULL),
(3, 'Mcleod', 'conor', 'conor@mac.com', '123', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`idressources`);

--
-- Index pour la table `ressources_has_projet`
--
ALTER TABLE `ressources_has_projet`
  ADD PRIMARY KEY (`ressources_idressources`,`projet_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
