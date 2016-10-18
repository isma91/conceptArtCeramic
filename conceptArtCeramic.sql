-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 18 Octobre 2016 à 15:25
-- Version du serveur :  5.7.15-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `conceptArtCeramic`
--
CREATE DATABASE IF NOT EXISTS `conceptArtCeramic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `conceptArtCeramic`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `frName` text NOT NULL,
  `enName` text NOT NULL,
  `slug` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `frName`, `enName`, `slug`) VALUES
(1, 'Sol & Mur', 'Ground & Wall', 'groundWall'),
(2, 'DÃ©coration', 'Decoration', 'decoration'),
(3, 'Architecture', 'Architecture', 'architecture');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `frName` varchar(255) NOT NULL,
  `enName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `color`
--

INSERT INTO `color` (`id`, `frName`, `enName`) VALUES
(1, 'Noir', 'Black'),
(2, 'Rouge', 'Red'),
(3, 'Vert', 'Green');

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `message` text NOT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `frName` varchar(255) NOT NULL,
  `enName` varchar(255) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `material`
--

INSERT INTO `material` (`id`, `frName`, `enName`, `slug`) VALUES
(1, 'Marbre', 'Marble', 'marble'),
(2, 'Granite', 'Granit', 'granit'),
(3, 'CÃ©ramique', 'Ceramic', 'ceramic'),
(4, 'Pierre Naturelle', 'Natural Stone', 'stone');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `frName` text NOT NULL,
  `enName` text NOT NULL,
  `idCategory` varchar(255) NOT NULL,
  `idMaterial` varchar(255) NOT NULL,
  `idColor` varchar(255) NOT NULL,
  `idSize` varchar(255) NOT NULL,
  `idUsage` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `frDescription` text NOT NULL,
  `enDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `field` text NOT NULL,
  `frContent` text NOT NULL,
  `enContent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`id`, `field`, `frContent`, `enContent`) VALUES
(1, 'title', 'Concept Art Ceramic', 'Concept Art Ceramic'),
(4, 'description', 'Un site sur les traveaux', 'A Site');

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, '20x30'),
(2, '20x20'),
(3, '25x25'),
(4, '30x30'),
(7, '40x40'),
(8, '50x50');

-- --------------------------------------------------------

--
-- Structure de la table `usage`
--

CREATE TABLE `usage` (
  `id` int(11) NOT NULL,
  `frName` text NOT NULL,
  `enName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usage`
--

INSERT INTO `usage` (`id`, `frName`, `enName`) VALUES
(1, 'Salle de Bain', 'Bathroom'),
(2, 'Jardin', 'Garden'),
(3, 'Salon', 'Living Room');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `username`, `email`, `password`, `token`) VALUES
(1, 'Sahbaz', 'Cemil', 'cemil', 'conceptceram@yahoo.com', '$2y$10$BMX5qCy9pKTpEag17a4vEeINbVQL3iGaYNYJlE.OqIIH0qFCUDBGW', 'a295fbe11a3785e913b473e11d8c317b2c907f83');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usage`
--
ALTER TABLE `usage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `usage`
--
ALTER TABLE `usage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
