-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 fév. 2020 à 13:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `allocin--project`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `biographie` varchar(255) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) DEFAULT NULL,
  `année de sortie` date DEFAULT NULL,
  `affiche` varchar(255) DEFAULT NULL,
  `genre_id1` int(11) NOT NULL,
  `artiste_genre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`artiste_genre_id`),
  KEY `fk_film_genre1_idx` (`genre_id1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `film_has_artiste`
--

DROP TABLE IF EXISTS `film_has_artiste`;
CREATE TABLE IF NOT EXISTS `film_has_artiste` (
  `film_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`film_id`,`artiste_id`),
  KEY `fk_film_has_artiste_artiste1_idx` (`artiste_id`),
  KEY `fk_film_has_artiste_film1_idx` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_genre1` FOREIGN KEY (`genre_id1`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `film_has_artiste`
--
ALTER TABLE `film_has_artiste`
  ADD CONSTRAINT `fk_film_has_artiste_artiste1` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_has_artiste_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
