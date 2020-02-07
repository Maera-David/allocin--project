-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 05 fév. 2020 à 08:43
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `prenom`, `photo`, `biographie`, `date_de_naissance`) VALUES
(1, 'Yamada', 'Naoko', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '0000-11-28'),
(2, 'Marshall', 'Garry', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1934-11-13'),
(3, 'Zwick', 'Edward', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1952-10-08'),
(4, 'Taylor-Johnson', 'Sam', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1967-03-04'),
(5, 'Wright', 'Joe', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1972-08-25'),
(6, 'Wan', 'James', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1977-02-26'),
(7, 'Knightley', 'Keira', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1985-03-26'),
(8, 'Macfadyen', 'Matthew', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1974-10-17'),
(9, 'Pike', 'Rosamund', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1979-01-27'),
(10, 'Malone', 'Jena', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1984-11-21'),
(11, 'Farmiga', 'Vera', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1973-08-06'),
(12, 'Wilson', 'Patrick', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1973-07-03'),
(13, 'Taylor', 'Lili', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1967-02-20'),
(14, 'Livingston', 'Ron', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1967-06-05'),
(15, 'Hayami', 'Saori', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1991-05-29'),
(16, 'Irino', 'Miyu', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1988-02-19'),
(17, 'Roberts', 'Julia', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1967-10-28'),
(18, 'Gere', 'Richard', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1949-08-31'),
(19, 'San Giacomo', 'Laura', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1962-11-14'),
(20, 'Elizondo', 'Hector', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1936-12-22'),
(21, 'Cruise', 'Tom', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1962-07-03'),
(22, 'Wakanabe', 'Ken', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1959-10-21'),
(23, 'Kato', 'Koyuki', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1976-12-18'),
(24, 'Johnson', 'Dakota', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1989-10-04'),
(25, 'Dornan', 'Jamie', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1982-05-01'),
(26, 'Ora', 'Rita', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1990-11-26'),
(27, 'Grimes', 'Luke', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquam rutrum elementum. Donec nec fermentum velit. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ', '1984-01-21');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `année de sortie`, `affiche`, `genre_id1`, `artiste_genre_id`) VALUES
(1, 'Koe no KAtachi', '2016-08-22', NULL, 2, 1),
(2, 'Pretty Woman', '1990-11-28', NULL, 1, 2),
(3, 'Le Dernier Samouraï', '2004-01-14', NULL, 2, 3),
(4, 'Cinquante nuances de Grey', '2015-02-11', NULL, 2, 4),
(5, 'Orgueil et Préjugés', '2005-10-07', NULL, 2, 5),
(6, 'Conjuring : Les dossiers Warren', '2013-08-21', NULL, 15, 6);

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

--
-- Déchargement des données de la table `film_has_artiste`
--

INSERT INTO `film_has_artiste` (`film_id`, `artiste_id`, `role`) VALUES
(1, 15, 'Shouko Nishimiya'),
(1, 16, 'Shoya Ishida'),
(2, 17, 'Vivian Ward'),
(2, 18, 'Edward Lewis'),
(2, 19, 'Kit De Luca'),
(2, 20, 'Barney Thompson'),
(3, 21, 'Le cpitaine Nathan Algren'),
(3, 22, 'Katsumoto'),
(3, 23, 'Taka'),
(4, 24, 'Anastasia Steele'),
(4, 25, 'Christian Grey'),
(4, 26, 'Mia Grey'),
(4, 27, 'Elliot Grey'),
(5, 7, 'Elizabeth Bennet'),
(5, 8, 'M. Darcy'),
(5, 9, 'Jane Bennet'),
(5, 10, 'Lydia Bennet'),
(6, 11, 'Lorraine Warren'),
(6, 12, 'Ed Warren'),
(6, 13, 'Carolyn Perron'),
(6, 14, 'Roger Perron');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`, `genre`) VALUES
(1, 'Comédie', 'Comédie'),
(2, 'Drame', 'Drame'),
(3, 'Romance amoureuse', 'Romance amoureuse'),
(4, 'Action', 'Action'),
(5, 'Historique', 'Historique'),
(6, 'Péplum', 'Péplum'),
(7, 'Cape et épée', 'Cape et épée'),
(8, 'Western', 'Aventure'),
(9, 'Aventure', 'Aventure'),
(10, 'Thriller', 'Thriler'),
(11, 'Policier', 'Policier'),
(12, 'Fantastique', 'Fantastique'),
(13, 'Opéra', 'Opéra'),
(14, 'Science-fiction', 'Science-fiction'),
(15, 'Horreur', 'Horreur'),
(16, 'Catastrophe', 'Catastrophe'),
(17, 'Portrait', 'Portrait'),
(18, 'Anticipation', 'Anticipation'),
(19, 'Fantasy', 'Fantasy'),
(20, 'Animation', 'Animation');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_genre1` FOREIGN KEY (`genre_id1`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `film_has_artiste`
--
ALTER TABLE `film_has_artiste`
  ADD CONSTRAINT `fk_film_has_artiste_artiste1` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `fk_film_has_artiste_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
