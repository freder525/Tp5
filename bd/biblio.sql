-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 06 Novembre 2015 à 04:27
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `biblio`
--

USE `bibliotheque`;

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `id_ami` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `contenu`, `id_ami`) VALUES
(6, 'Vivamus volutpat, orci a cursus commodo, nibh justo maximus risus, non maximus nulla quam sit amet velit. Vivamus libero quam, euismod a vehicula a, congue vitae risus. In porta arcu nunc, dictum dapibus ex molestie a. Vivamus quis quam in dui semper rutrum. Fusce vel viverra sapien. Morbi mollis tellus at fermentum lobortis. Nam sed viverra quam. Morbi at aliquet erat. Integer nec ullamcorper massa. ', 'blandry'),
(7, 'Proin nibh velit, egestas eget congue ut, convallis non mi. Vivamus tristique, ligula porta rhoncus ultrices, eros metus sodales sem, sit amet volutpat enim diam et lorem. Nulla id lorem eu lectus elementum egestas. Nulla in est tincidunt, posuere purus nec, commodo leo. Suspendisse vestibulum cursus nulla vitae posuere. Quisque luctus augue eget diam gravida ultrices. Nunc non iaculis elit, a consectetur neque. Curabitur a erat sed nisi rhoncus consequat nec nec felis. Vivamus in gravida sapien. In elementum porta est. ', 'gmichel'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor.', 'drichard'),
(10, 'Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.', 'schicotte');

-- --------------------------------------------------------

--
-- Structure de la table `lecteur`
--

CREATE TABLE  `lecteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `cp` varchar(7) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `courriel` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lecteur`
--

INSERT INTO `lecteur` (`id`, `nom`, `adresse`, `ville`, `cp`, `telephone`, `courriel`, `pseudo`, `motdepasse`, `commentaire`, `type`) VALUES
(1, 'Gervais Alain', '123 rue des sapins', 'QuÃ©bec', 'G2B 3S5', '418 234-5678', 'agervais@abc.com', 'agervais', '12345', 'Rien de particulier.', 'u'),
(2, 'Landry Bernard', '23 rue des Ã©pinettes', 'QuÃ©bec', 'G3R 2S5', '418 456-263', 'blandry@cms.ca', 'blandry', '12345', 'Rien de particulier.', 'u'),
(3, 'Dumont Mario', '275 rue des ivettes', 'QuÃ©bec', 'G5R 2R5', '418 345-0987', 'dmario@libero.ca', 'dmario', '12345', 'Rien de particulier.', 'u'),
(4, 'Richard Daniel', '123 rue des Ã‰pinettes', 'QuÃ©bec', 'G1V 2S9', '418 678-0978', 'drichard@abcde.ca', 'drichard', '12345', 'Rien de particulier.', 'u'),
(5, 'Gagnon michel', '25 rue des Ã©rables', 'QuÃ©bec', 'G2B 4S6', '418 345-8904', 'gmichel@rts.com', 'gmichel', '12345', 'Rien de particulier.', 'u'),
(6, 'Menard Sandrine', '234 rue des hirondelles', 'Québec', 'G3D 2F5', '418 123-0987', 'msandrine@csf.com', 'msandrine', '12345', 'Rien de particulier.', 'u'),
(7, 'Nick', '12324', '12312', 'G1Mjkjk', '4128----', 'nick@toto.com', 'nick', '12345', 'Rien de particulier.', 'u'),
(8, 'Brown Sami', '125 rue de la Loire', 'QuÃ©bec', 'G1S 2B5', '418 234-5678', 'sbrown@sifo.com', 'sbrown', '12345', 'Rien de particulier.', 'a'),
(9, 'Chicotte Samuel', '234 rue des peupliers', 'QuÃ©bec', 'G3S 2G5', '418 456-0987', 'schicotte@abcdef.com', 'schicotte', '12345', 'Rien de particulier.', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(128) NOT NULL,
  `annee` smallint(5) unsigned NOT NULL DEFAULT '0',
  `genre` varchar(32) NOT NULL,
  `etat` varchar(20) NOT NULL DEFAULT 'Disponible',
  `id_emprunt` int,
  `id_reserve` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `auteur`, `annee`, `genre`, `etat`, `id_emprunt`, `id_reserve`) VALUES
(' 006.76 P5759h', 'PHP et MySQL : maîtrisez le développement d''un site Web dynamique et interactif', 'Heurtel, Olivier', 2014, 'Sciences, informatique', 'Emprunté', '1', '2'),
('005.133 P5759L', 'PHP 5 : industrialisation : outils & bonnes pratiques', 'Lï¿½pine, Jean-Franï¿½ois', 2012, 'Sciences, informatique', 'Emprunté', '9', '3'),
('006.76 P5758h', 'PHP 5.5 : développez un site Web dynamique et interactif', 'Heurtel, Olivier', 2013, 'Sciences, informatique', 'Disponible', '', ''),
('123.456 h57', 'Les 7 mercenaires', 'Gervais Alain', 1988, 'Roman', 'Emprunté', '5', ''),
('234.345 T35', 'Les bronzÃ©s', 'Tremblay Gerald', 2002, 'Roman', 'Disponible', '', ''),
('641.5952 T6562s', 'Sushis : makis, yakitoris, onigiris-- ', 'Tombini, Marie-Laure', 2013, 'Cuisine', 'Emprunté', '6', '8'),
('641.82 T788s', 'Sushi végétarien ', 'Treloar, Brigid', 2014, 'Cuisine', 'Emprunté', '4', '5'),
('841.8 B338f', 'Les fleurs du mal', 'Baudelaire, Charles', 2006, 'Poésie', 'Emprunté', '6', '7'),
('848.914 B7165p', 'Poésie et photographie', 'Bonnefoy, Yves', 2014, 'Poésie', 'Disponible', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
