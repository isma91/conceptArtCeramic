-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 29 Avril 2017 à 20:47
-- Version du serveur :  5.5.54-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `conceptArtCeramic`
--
CREATE DATABASE `conceptArtCeramic`;

USE `conceptArtCeramic`;
-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `frName` text NOT NULL,
  `enName` text NOT NULL,
  `slug` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `color` (
`id` int(11) NOT NULL,
  `frName` varchar(255) NOT NULL,
  `enName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `form` (
`id` int(11) NOT NULL,
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

CREATE TABLE IF NOT EXISTS `material` (
`id` int(11) NOT NULL,
  `frName` varchar(255) NOT NULL,
  `enName` varchar(255) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `material`
--

INSERT INTO `material` (`id`, `frName`, `enName`, `slug`) VALUES
(1, 'Marbre', 'Marble', 'marble'),
(2, 'Granite', 'Granit', 'granit'),
(3, 'CÃ©ramique', 'Ceramic', 'ceramic'),
(4, 'Travertin', 'Natural Stone', 'stone'),
(5, 'Onyx', 'Onyx', 'onyx');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `frName` text NOT NULL,
  `enName` text NOT NULL,
  `idCategory` varchar(255) NOT NULL,
  `idMaterial` varchar(255) NOT NULL,
  `idSize` text NOT NULL,
  `idUsage` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `frName`, `enName`, `idCategory`, `idMaterial`, `idSize`, `idUsage`, `img`) VALUES
(1, 'Toros Noir', 'Toros Black', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(2, 'Adranos Noir', 'Adranos Black', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(3, 'Karacabey Noir', 'Karacabey Black', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(4, 'Iris Noir', 'Iris Black', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(5, 'Emperator Noir', 'Emperator Black', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(6, 'Losso Levanto', 'Losso Levanto', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(7, 'Tiger Skin', 'Tiger Skin', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(8, 'Gris Savane', 'Grey Savannah', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(9, 'Emperator Gris', 'Emperator Grey', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(10, 'Gris d''Afyon', 'Grey of Afyon', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(11, 'Gris Toundra', 'Grey Tundra', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(12, 'Gris Italie', 'Grey Italy', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(13, 'Emperator Light', 'Emperator Light', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(14, 'Tobacco Or', 'Tobacco Gold', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(15, 'Vanille GlacÃ©', 'Vanillia Ice', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(16, 'Botticino', 'Botticino', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(17, 'Cappucino Blanc', 'Cappucino White', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(18, 'Vanille De Bursa', 'Vanillia of Bursa', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(19, 'Beige Pomme', 'Beige Apple', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(20, 'Vanille Mocha', 'Vanillia Mocha', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(21, 'Beige Agora', 'Beige Agora', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(22, 'Blanc de Marmara', 'White of Marmara', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(23, 'Blanc de Kemalpasa', 'White of Kemalpasa', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(24, 'Dolomite', 'Dolomite', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(25, 'Blanc d''Afyon', 'White of Afyon', '1', '1', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg|1.png|2.png|3.png'),
(26, 'Granite d''Aksaray', 'Granit of Alsaray', '1', '2', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(27, 'CrÃ¨me ImpÃ©riale', 'Imperal Cream', '1', '2', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(28, 'Gris de Bergama', 'Grey of Bergama', '1', '2', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(29, 'Vert Kiwi', 'Green Kiwi', '1', '2', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(30, 'Vison de Giresun', 'Mink of Giresun', '1', '2', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(31, 'Vert', 'Green', '1', '5', '4|8|9|10', '1|3|5|6|7', '0.png|1.png|2.png|3.png'),
(32, 'Bois', 'Wood', '1', '5', '4|8|9|10', '1|3|5|6|7', '0.png|1.png|2.png|3.png'),
(33, 'CrÃ¨me', 'Cream', '1', '5', '4|8|9|10', '1|3|5|6|7', '0.png|1.png|2.png|3.png'),
(34, 'Caramel', 'Caramel', '1', '5', '4|8|9|10', '1|3|5|6|7', '0.png|1.png|2.png|3.png'),
(35, 'Rose', 'Pink', '1', '5', '4|8|9|10', '1|3|5|6|7', '0.png|1.png|2.png|3.png'),
(36, 'Rouge', 'Red', '1', '5', '4|8|9|10', '1|3|5|6|7', '0.png|1.png|2.png|3.png'),
(37, 'Terracotta Light', 'Terracotta Light', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(38, 'Terracotta', 'Terracotta', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(39, 'Pine Illuminated', 'Pine Illuminated', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(40, 'Pine', 'Pine', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(41, 'Light Illuminated', 'Light Illuminated', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(42, 'Light', 'Light', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(43, 'Jade Illuminated', 'Jade Illuminated', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(44, 'Jade', 'Jade', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(45, 'Miel Illuminated', 'Honey Illuminated', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(46, 'Miel', 'Honey', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(47, 'Cristal Illuminated', 'Cristal Illuminated', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(48, 'Cristal', 'Cristal', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(49, 'Orange', 'Orange', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(50, 'Cola', 'Cola', '1', '5', '4|8|9|10', '1|2|3|4|5|6|7', '0.jpg'),
(51, 'Chocolat', 'Chocolate', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(52, 'Walnut Light', 'Walnut Light', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(53, 'Noche', 'Noche', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(54, 'Marina', 'Marina', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(55, 'Rouge', 'Red', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(56, 'Or', 'Gold', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(57, 'Argent', 'Silver', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(58, 'Flamingo', 'Flamingo', '1', '4', '4|8|9|10', '1|2|3|4|5|6|7', '0.png|1.png|2.png|3.png'),
(59, 'Tableau 203', 'Board 203', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(60, 'Tableau 204', 'Board 204', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(61, 'Tableau 205', 'Board 205', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(62, 'Tableau 206', 'Board 206', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(63, 'Tableau 207', 'Board 207', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(64, 'Tableau 208', 'Board 208', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(65, 'Tableau 209', 'Board 209', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(66, 'Tableau 210', 'Board 210', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(67, 'Tableau 211', 'Board 211', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(68, 'Tableau 212', 'Board 212', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(69, 'Tableau 214', 'Board 214', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(70, 'Tableau 215', 'Board 215', '2', '3', '1|4', '1|5|6|7', '0.jpg'),
(71, 'Tableau 402', 'Board 402', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(72, 'Tableau 403', 'Board 403', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(73, 'Tableau 405', 'Board 405', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(74, 'Tableau 406', 'Board 406', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(75, 'Tableau 407', 'Board 407', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(76, 'Tableau 408', 'Board 408', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(77, 'Tableau 409', 'Board 409', '2', '3', '4|11', '1|5|6|7', '0.jpg'),
(78, 'Assiette Relief Bleu', 'Platefull Relief Blue', '2', '3', '4', '5|6|7', '0.png'),
(79, 'Assiette Relief Marron', 'Platefull Relief Brown', '2', '3', '4', '5|6|7', '0.png'),
(80, 'Assiette Relief Violet', 'Platefull Relief Purple', '2', '3', '4', '5|6|7', '0.png'),
(81, 'Assiette Relief Rouge', 'Platefull Relief Red', '2', '3', '4', '5|6|7', '0.png'),
(82, 'Assiette Relief Vert', 'Platefull Relief Green', '2', '3', '4', '5|6|7', '0.png'),
(83, 'Assiette Bleu Zibeline', 'Platefull Blue Sable', '2', '3', '4', '5|6|7', '0.png'),
(84, 'Assiette Rouge Zibeline', 'Platefull Red Sable', '2', '3', '4', '5|6|7', '0.png'),
(85, 'Assiette Blanc Zibeline', 'Platefull White Sable', '2', '3', '4', '5|6|7', '0.png'),
(86, 'Tuile Or', 'Golden Tile', '2', '3', '4', '1|5|6|7', '0.jpg'),
(87, 'Tuile Turquoise', 'Turquoise Tile', '2', '3', '4', '1|5|6|7', '0.jpg'),
(88, 'Tuile Rouge', 'Red Tile', '2', '3', '4', '1|5|6|7', '0.jpg'),
(89, 'Tuile Bleu', 'Bleu Tile', '2', '3', '4', '1|5|6|7', '0.jpg'),
(90, 'Horloge Blanc Kutahya', 'White of Kutahya Clock', '2', '3', '4', '1|5|6|7', '0.png'),
(91, 'Horloge Bleu Turquoise', 'Turquoise Clock', '2', '3', '4', '1|5|6|7', '0.png'),
(92, 'Horloge Bleu Clair', 'Light Blue Clock', '2', '3', '4', '1|5|6|7', '0.png'),
(93, 'Kit Tasse Bleu', 'Blue Cup Kit', '2', '3', '4', '5|6|7', '0.png'),
(94, 'Kit Tasse Blanc', 'White Cup Kit', '2', '3', '4', '5|6|7', '0.png'),
(95, 'Foret Vert', 'Grenn Forest', '1', '1', '4|9|10|11', '1|2|3|4|5|6|7', '0.jpg'),
(96, 'Vase Blanc', 'White Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(97, 'Vase Marmara', 'Vase of Marmara', '2', '3', '4', '1|5|6|7', '0.jpg'),
(98, 'Vase Blanc Light', 'White Light Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(99, 'Vase Turquoise', 'Turquoise Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(100, 'Vase Rouge', 'Red Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(101, 'Vase Noir', 'Black Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(102, 'Vase Iznik', 'Iznik Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(103, 'Vase Turquoise Rouge', 'Turquoise Red Vase', '2', '3', '4', '1|5|6|7', '0.jpg'),
(104, 'Assiette Blanc Bleu', 'Platefull White Blue', '2', '3', '4', '1|5|6|7', '0.jpg'),
(105, 'Assiette Blanc Turquoise', 'Platefull White Turquoise', '2', '3', '4', '1|5|6|7', '0.jpg'),
(106, 'Assiette Rouge Iznik', 'Platefull Red Iznik', '2', '3', '4', '1|5|6|7', '0.jpg'),
(107, 'Assiette Tuquoise', 'Platefull Turquoise', '2', '3', '4', '1|5|6|7', '0.jpg'),
(108, 'Assiette Rouge Blanc', 'Platefull Red White', '2', '3', '4', '1|5|6|7', '0.jpg'),
(109, 'Assiette Noir Blanc', 'Platefull Black White', '2', '3', '4', '1|5|6|7', '0.jpg'),
(110, 'Assiette Rouge', 'Platefull Red', '2', '3', '4', '1|5|6|7', '0.jpg'),
(111, 'Assiette Bleu Sobre', 'Platefull Clean Blue', '2', '3', '4', '1|5|6|7', '0.jpg'),
(112, 'Blanc Beige', 'White Beig', '1', '4', '4|6|7|8', '1|2|3|4|5|6|7', '0.jpg'),
(113, 'Blanc CaillÃ©', 'White Curd', '1', '4', '4|6|7|8', '1|2|3|4|5|6|7', '0.jpg'),
(114, 'Caramel', 'Caramel', '1', '4', '4|6|7|8', '1|2|3|4|5|6|7', '0.jpg'),
(115, 'Bordure DÃ©corative 1', 'Decorative Border 1', '3', '4', '4', '2|7|8', '0.jpg'),
(116, 'Bordure DÃ©corative 2', 'Decorative Border 2', '3', '4', '4', '2|7|8', '0.jpg'),
(117, 'Bordure DÃ©corative 3', 'Decorative Border 3', '3', '4', '4', '2|7|8', '0.jpg'),
(118, 'Bordure DÃ©corative 4', 'Decorative Border 4', '3', '4', '4', '2|7|8', '0.jpg'),
(119, 'Bordure DÃ©corative 5', 'Decorative Border 5', '3', '4', '4', '2|7|8', '0.jpg'),
(120, 'Bordure DÃ©corative 6', 'Decorative Border 6', '3', '4', '4', '2|7|8', '0.jpg'),
(121, 'Bordure DÃ©corative 7', 'Decorative Border 7', '3', '4', '4', '2|7|8', '0.jpg'),
(122, 'Bordure DÃ©corative 8', 'Decorative Border 8', '2', '1', '4', '1|2|3|4|5|6|7|8', '0.jpg'),
(123, 'Carreaux 1', 'Tile 1', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(124, 'Carreaux 2', 'Tile 2', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(125, 'Carreaux 3', 'Tile 3', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(126, 'Carreaux 4', 'Tile 4', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(127, 'Carreaux 5', 'Tile 5', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(128, 'Carreaux 6', 'Tile 6', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(129, 'Carreaux 7', 'Tile 7', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(130, 'Carreaux 8', 'Tile 8', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(131, 'Carreaux 9', 'Tile 9', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(132, 'Carreaux 10', 'Tile 10', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(133, 'Carreaux 11', 'Tile 11', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(134, 'Carreaux 12', 'Tile 12', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(135, 'Carreaux 13', 'Tile 13', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(136, 'Carreaux 14', 'Tile 14', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(137, 'Carreaux 15', 'Tile 15', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(138, 'Carreaux 16', 'Tile 16', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(139, 'Carreaux 17', 'Tile 17', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(140, 'Carreaux 18', 'Tile 18', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(141, 'Carreaux 19', 'Tile 19', '1', '3', '1|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(142, 'Carreaux 20', 'Tile 20', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(143, 'Carreaux 21', 'Tile 21', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(144, 'Carreaux 22', 'Tile 22', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(145, 'Carreaux 23', 'Tile 23', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(146, 'Carreaux 24', 'Tile 24', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(147, 'Carreaux 25', 'Tile 25', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(148, 'Carreaux 26', 'Tile 26', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(149, 'Carreaux 27', 'Tile 27', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(150, 'Carreaux 28', 'Tile 28', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(151, 'Carreaux 29', 'Tile 29', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(152, 'Carreaux 30', 'Tile 30', '1', '3', '4|6|7|8', '1|2|3|4|5|6|7|8', '0.jpg'),
(153, 'Carreaux 30', 'Tile 30', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(154, 'Carreaux 31', 'Tile 31', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(155, 'Carreaux 32', 'Tile 32', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(156, 'Carreaux 33', 'Tile 33', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(157, 'Carreaux 34', 'Tile 34', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(158, 'Carreaux 35', 'Tile 35', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(159, 'Carreaux 36', 'Tile 36', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(160, 'Carreaux 37', 'Tile 37', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(161, 'Carreaux 38', 'Tile 38', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(162, 'Carreaux 39', 'Tile 39', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(163, 'Carreaux 40', 'Tile 40', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(164, 'Carreaux 41', 'Tile 41', '1', '3', '1|2|3|4|5|9|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(165, 'Carreaux 42', 'Tile 42', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(166, 'Carreaux 43', 'Tile 43', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(167, 'Carreaux 44', 'Tile 44', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(168, 'Carreaux 44', 'Tile 44', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(169, 'Carreaux 45', 'Tile 45', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(170, 'Carreaux 46', 'Tile 46', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(171, 'Carreaux 47', 'Tile 47', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(172, 'Carreaux 48', 'Tile 48', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(173, 'Carreaux 49', 'Tile 49', '1', '3', '4', '1|2|3|4|5|6|7|8', '0.png'),
(174, 'Bordure DÃ©corative 9', 'Decorative Border 9', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(175, 'Bordure DÃ©corative 10', 'Decorative Border 10', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(176, 'Bordure DÃ©corative 11', 'Decorative Border 11', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(177, 'Bordure DÃ©corative 12', 'Decorative Border 12', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(178, 'Bordure DÃ©corative 13', 'Decorative Border 13', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(179, 'Bordure DÃ©corative 14', 'Decorative Border 14', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.jpg'),
(180, 'Bordure DÃ©corative 15', 'Decorative Border 15', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(181, 'Bordure DÃ©corative 16', 'Decorative Border 16', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(182, 'Bordure DÃ©corative 17', 'Decorative Border 17', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(183, 'Bordure DÃ©corative 18', 'Decorative Border 18', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(184, 'Bordure DÃ©corative 19', 'Decorative Border 19', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(185, 'Bordure DÃ©corative 20', 'Decorative Border 20', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(186, 'Bordure DÃ©corative 21', 'Decorative Border 21', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(187, 'Bordure DÃ©corative 22', 'Decorative Border 22', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(188, 'Bordure DÃ©corative 23', 'Decorative Border 23', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png'),
(189, 'Bordure DÃ©corative 24', 'Decorative Border 24', '1', '3', '1|2|3|4|5|10|11', '1|2|3|4|5|6|7|8', '0.png');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
`id` int(11) NOT NULL,
  `field` text NOT NULL,
  `frContent` text NOT NULL,
  `enContent` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`id`, `field`, `frContent`, `enContent`) VALUES
(1, 'title', 'Concept Art Ceramic', 'Concept Art Ceramic'),
(4, 'description', 'PrÃ©sentation des produits traditionnels et naturels de type Ã§ini. Venez dÃ©couvrir le travail artisanal des diffÃ©rents produits comme le CÃ©ramique d''Iznik, marbre, granite et travertin.', 'Presentation of traditional and natural products from Cini kind. Discover the craftsmanship of various products such as Iznik ceramics, marble, granite and travertine.');

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
`id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, '20x20'),
(2, '25x25'),
(3, '30x30'),
(4, 'PersonnalisÃ©e'),
(5, '10x10'),
(6, '10x20'),
(7, '20x40'),
(8, '30x60'),
(9, '45x45'),
(10, '60x60'),
(11, '40x40');

-- --------------------------------------------------------

--
-- Structure de la table `usage`
--

CREATE TABLE IF NOT EXISTS `usage` (
`id` int(11) NOT NULL,
  `frName` text NOT NULL,
  `enName` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usage`
--

INSERT INTO `usage` (`id`, `frName`, `enName`) VALUES
(1, 'Salle de Bain', 'Bathroom'),
(2, 'Jardin', 'Garden'),
(3, 'Spa', 'Spa'),
(4, 'Terrasse', 'Terrace'),
(5, 'Salon', 'Living Room'),
(6, 'Cuisine', 'Kitchen'),
(7, 'FaÃ§ade', 'Facade'),
(8, 'Piscine', 'Swimming Pool');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `token` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `username`, `email`, `password`, `token`) VALUES
(1, 'Sahbaz', 'Cemil', 'cemil', 'conceptceram@yahoo.com', '$2y$10$BMX5qCy9pKTpEag17a4vEeINbVQL3iGaYNYJlE.OqIIH0qFCUDBGW', 'a28ff869e79642f323647c0d3015ab4864678856');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `material`
--
ALTER TABLE `material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `usage`
--
ALTER TABLE `usage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
