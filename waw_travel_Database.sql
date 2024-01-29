-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 28 jan. 2024 à 16:42
-- Version du serveur : 5.7.36
-- Version de PHP : 8.2.9

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
  `order_number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `road_trip_has_checkpoint` (`road_trip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `checkpoint`
--

INSERT INTO `checkpoint` (`id`, `title`, `coordinates`, `arrival_date`, `departure_date`, `road_trip_id`, `order_number`) VALUES
(19, 'Checkpoint n°1', '37.7749° N, 122.4194° W', '2024-01-30 15:53:00', '2024-01-28 15:53:00', 26, 1),
(20, 'Checkpoint 2', '37.7749° N, 122.4194° W', '2024-02-01 15:53:00', '2024-01-29 15:53:00', 26, 2),
(21, 'Checkpoint n°3', ' 37.7749° N, 122.4194° W', '2024-02-10 16:18:00', '2024-01-30 16:18:00', 26, 3),
(44, 'Tokyo', '37.7749° N, 122.4194° W', '2024-01-31 17:29:00', '2024-01-26 17:29:00', 29, 1),
(45, 'Seoul', '37.7749° N, 122.4194° W', '2024-02-07 17:30:00', '2024-01-26 17:30:00', 29, 2),
(46, 'Hong-Kong', ' 37.7749° N, 122.4194° W', '2024-02-10 17:30:00', '2024-02-11 17:30:00', 29, 3),
(47, 'Singapour', ' 37.7749° N, 122.4194° W', '2024-03-27 17:30:00', '2024-02-29 17:30:00', 29, 4),
(48, 'Busan', ' 37.7749° N, 122.4194° W', '2024-01-31 17:32:00', '2024-02-08 17:32:00', 29, 5),
(49, 'Paris', ' 37.7749° N, 122.4194° W', '2024-01-31 17:36:00', '2024-02-01 17:36:00', 26, 4);

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
  KEY `car_type_has_road_trip` (`car_type_id`),
  KEY `user_has_road_trip` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `road_trip`
--

INSERT INTO `road_trip` (`id`, `title`, `car_type_id`, `user_id`) VALUES
(26, 'Le roadtrip d\'Europe', 1, 42),
(29, 'Le roadtrip d\'Asie', 2, 42);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'oror@gmail.com', 'password', '2023-12-04 11:29:20'),
(2, 'hanna@montana.com', '$2y$10$8bbBBwnCXMu7JObbXX.v/eydGrwlpxIcwuWXxiFLGJEZznnoZGfJ.', '2023-12-12 20:53:40'),
(3, 'hannah@montana3.com', '$2y$10$bo2wbQi9fiWPdCjPGmh1R.bDoCq472fCTPNv.ECcQi./FZnIWHBPq', '2024-01-16 10:41:54'),
(4, 'test@gmail.com', '$2y$10$/801xUKfC6FCyO7JpKDzM.nBJ5rtFTSgBAZr9yEiSbpP/ymQqy7UC', '2024-01-16 12:21:45'),
(5, 'test2@gmail.com', '$2y$10$mjCHWHguTs2bPMXBPfALbe/TCt0VnqaDgzYcOshu2NI8QuY7aKei2', '2024-01-16 12:24:19'),
(6, 'test3@gmail.com', '$2y$10$ieH9ZTkNom/BfnBeJ/fnMu6wgQwzXoCVy8d9uz1AFRVfnY4w3GvAG', '2024-01-16 12:26:51'),
(7, 'hannah4@montana.com', '$2y$10$kG3iSvQjqPJsWzaC3QYfY.gA0w8Ps3ltoypnjrxS2Mb5OrfRKThua', '2024-01-16 12:30:31'),
(10, 'hannah6@montana.com', '$2y$10$EjoXENhT9FQFp2GAiNUZweEUjyMiQ5ktNrmeJwC0xvwWJu.uHs3Lu', '2024-01-16 12:31:24'),
(11, 'hanna7h@montana.com', '$2y$10$Hc1wEvzNSnNh.Phy8nj/ruggUNBgXFj4VtPAaoe8isZCqeSPXA7Q6', '2024-01-16 12:33:42'),
(12, '<script>alert(\'XSS Test\');</script>', '$2y$10$D3xyF2HNYdjb0Z4mXGxjle6HmaDuhOaS0fmTYpytsZMXtdVN9ZD5i', '2024-01-16 14:35:36'),
(13, '&lt;script&gt;alert(&#039;XSS Test&#039;);&lt;/script&gt;', '$2y$10$BDfhpJEPh4VdMaGAuehPbudWWpKSKYeBtBf71uO81XQooXiejlmby', '2024-01-16 14:36:27'),
(38, 'hannah5@montana.com', '$2y$10$3R6hywfjYWlFmQbPpC5IoOLociUvzC7REbvUZsK.UxsUpYeTNSB3q', '2024-01-20 17:50:42'),
(41, 'hannah10@montana.com', '$2y$10$4ZaG4UOLPRT4Sjrz3nTkfe6yaEa5bJPVfo9UFp/Y9ND6c0bmeFF1a', '2024-01-25 18:42:07'),
(42, 'hannah1@montana.com', '$2y$10$Yp7f8s.6vQ4ArjxXPepMkedlqYRyyGucmrJSOutOx3WNKjQXP/EPG', '2024-01-25 19:16:19'),
(43, 'aurore@aurore.fr', '$2y$10$2VY6lzMdPWqTdBSfJQJNseSKZBHPOU/t0inhSyaw0n8CdRHDzwuOW', '2024-01-28 16:53:09');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD CONSTRAINT `road_trip_has_checkpoint` FOREIGN KEY (`road_trip_id`) REFERENCES `road_trip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `road_trip`
--
ALTER TABLE `road_trip`
  ADD CONSTRAINT `car_type_has_road_trip` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_road_trip` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
