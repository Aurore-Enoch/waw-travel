-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 déc. 2023 à 18:14
-- Version du serveur : 5.7.40
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `waw_travel`
--

-- --------------------------------------------------------

--
-- Structure de la table `car_type`
--

DROP TABLE IF EXISTS `car_type`;
CREATE TABLE IF NOT EXISTS `car_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `car_type`
--

INSERT INTO `car_type` (`id`, `name`) VALUES
(1, 'Moto'),
(2, 'Voiture');

-- --------------------------------------------------------

--
-- Structure de la table `checkpoint`
--

DROP TABLE IF EXISTS `checkpoint`;
CREATE TABLE IF NOT EXISTS `checkpoint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `coordinates` varchar(255) NOT NULL,
  `arrival_date` datetime NOT NULL,
  `departure_date` datetime NOT NULL,
  `road_trip_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `road_trip_has_checkpoints` (`road_trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `road_trip`
--

DROP TABLE IF EXISTS `road_trip`;
CREATE TABLE IF NOT EXISTS `road_trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `car_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `car_type_has_road_trips` (`car_type_id`),
  KEY `user_has_road_trips` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`) VALUES
(41, 'titistadjer@hotmail.com', '$2y$10$XpqFLW7VnL1Ccn0p3ydEoOkJTPlISPtEuSxzDvA0wTNK1hOG8a3Ge', '2023-12-12 21:14:05'),
(50, '', '$2y$10$qffuWeN68NjhABANUR5c5u0r1hYB6k5GKvJppgd.0WnLfMzGoJrkm', '2023-12-12 21:48:06');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD CONSTRAINT `road_trip_has_checkpoints` FOREIGN KEY (`road_trip_id`) REFERENCES `road_trip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `road_trip`
--
ALTER TABLE `road_trip`
  ADD CONSTRAINT `car_type_has_road_trips` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_road_trips` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
