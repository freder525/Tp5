-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 20 Décembre 2015 à 15:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `id_ami` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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

CREATE TABLE IF NOT EXISTS `lecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `cp` varchar(7) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `courriel` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `lecteur`
--

INSERT INTO `lecteur` (`id`, `nom`, `adresse`, `ville`, `cp`, `telephone`, `courriel`, `pseudo`, `motdepasse`, `type`) VALUES
(1, 'Gervais Alain', '123 rue des sapins', 'Québec', 'G2B 3S5', '418 234-5678', 'agervais@abc.com', 'agervais', '12345', 'u'),
(2, 'Landry Bernard', '23 rue des épinettes', 'Québec', 'G3R 2S5', '418 456-263', 'blandry@cms.ca', 'blandry', '12345', 'u'),
(3, 'Dumont Mari', '275 rue des ivettes', 'Québec', 'G5R 2R5', '418 345-0987', 'asd@asd.ca', 'dmario', '12345', 'u'),
(4, 'Richard Daniel', '123 rue des épinettes', 'Québec', 'G1V 2S9', '418 678-0978', 'drichard@abcde.ca', 'drichard', '12345', 'u'),
(5, 'Gagnon michel', '25 rue des érables', 'Québec', 'G2B 4S6', '418 345-8904', 'gmichel@rts.com', 'gmichel', '12345', 'u'),
(6, 'Menard Sandrine', '234 rue des hirondelles', 'Québec', 'G3D 2F5', '418 123-0987', 'msandrine@csf.com', 'msandrine', '12345', 'u'),
(7, 'Nick', '12324', '12312', 'G1Mjkjk', '4128----', 'nick@toto.com', 'nick', '12345', 'u'),
(8, 'Brown Sami', '125 rue de la Loire', 'Québec', 'G1S 2B5', '418 234-5678', 'sbrown@sifo.com', 'sbrown', '12345', 'a'),
(9, 'Chicotte Samuel', '234 rue des peupliers', 'Québec', 'G3S 2G5', '418 456-0987', 'schicotte@abcdef.com', 'schicotte', '12345', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `type_document` varchar(32) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(128) NOT NULL,
  `annee` smallint(5) unsigned NOT NULL DEFAULT '0',
  `genre` varchar(32) NOT NULL,
  `id_emprunt` int(11) DEFAULT NULL,
  `id_reserve` int(11) DEFAULT NULL,
  `nbr_renouvelements` tinyint(4) NOT NULL,
  `date_emprunt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `type_document`, `titre`, `auteur`, `annee`, `genre`, `id_emprunt`, `id_reserve`, `nbr_renouvelements`, `date_emprunt`) VALUES
(' 006.76 P5759h', 'livre', 'PHP et MySQL : maîtrisez le développement d''un site Web dynamique et interactif', 'Heurtel, Olivier', 2014, 'Sciences, informatique', 0, 0, 0, '2015-11-19'),
('005.133 P5759L', 'livre', 'PHP 5 : industrialisation : outils & bonnes pratiques', 'L''épine, Jean-François', 2012, 'Sciences, informatique', 9, 3, 0, '2015-12-01'),
('006.76 P5758h', 'livre', 'PHP 5.5 : développez un site Web dynamique et interactif', 'Heurtel, Olivier', 2013, 'Sciences, informatique', 0, 0, 0, '2015-10-21'),
('123.456 h57', 'multimedia_dvd', 'Les 7 mercenaires', 'Gervais Alain', 1988, 'Roman', 5, 3, 0, '2015-12-08'),
('234.345 T35', 'multimedia_dvd', 'Les bronzés', 'Tremblay Gerald', 2002, 'Roman', 0, 0, 0, '2015-11-02'),
('641.5952 T6562s', 'multimedia_dvd', 'Sushis : makis, yakitoris, onigiris-- ', 'Tombini, Marie-Laure', 2013, 'Cuisine', 6, 8, 0, '2015-12-01'),
('641.82 T788s', 'multimedia_cd', 'Sushi végétarien ', 'Treloar, Brigid', 2014, 'Cuisine', 4, 0, 0, '2015-12-08'),
('841.8 B338f', 'multimedia_livre_audio', 'Les fleurs du mal', 'Baudelaire, Charles', 2006, 'Poésie', 6, 7, 0, '2015-12-09'),
('848.914 B7165p', 'livre', 'Poésie et photographie', 'Bonnefoy, Yves', 2014, 'Poésie', 3, 0, 3, '2015-12-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
