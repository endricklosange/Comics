-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 déc. 2022 à 23:32
-- Version du serveur : 8.0.30-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Comics`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `serie_id` int DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `num` varchar(5) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `illustrator` varchar(100) NOT NULL,
  `editor` varchar(100) DEFAULT NULL,
  `releaseyear` smallint DEFAULT NULL,
  `strips` smallint DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rep` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `created`, `updated`, `serie_id`, `title`, `num`, `writer`, `illustrator`, `editor`, `releaseyear`, `strips`, `cover`, `rep`) VALUES
(21, '2022-12-13 23:19:18', '2022-12-13 23:24:27', 14, 'Naruto Uzumaki', '1', 'Kishimoto, Masashi', 'Kishimoto, Masashi', 'Kana', 2003, 192, 'https://www.bedetheque.com/media/Couvertures/naruto01.JPG', 0),
(23, '2022-12-13 23:26:13', '2022-12-13 23:26:13', 14, 'Un client embarrassant', '2', 'Kishimoto, Masashi', 'Kishimoto, Masashi', 'Kana', 2003, 208, 'https://www.bedetheque.com/media/Couvertures/Couv_24064.jpg', 0),
(24, '2022-12-13 23:28:56', '2022-12-13 23:28:56', 16, 'The Death and the Strawberry', '1', 'Kubo, Tite', 'Kubo, Tite', 'Glénat', 2003, 187, 'https://www.bedetheque.com/media/Couvertures/Couv_29939.jpg', 0),
(25, '2022-12-13 23:30:40', '2022-12-13 23:30:40', 16, 'Goodbye Parakeet, Goodnite my Sista', '2', 'Kubo, Tite', 'Kubo, Tite', 'Glénat', 2003, 185, 'https://www.bedetheque.com/media/Couvertures/Couv_31669.jpg', 0),
(26, '2022-12-13 23:32:19', '2022-12-13 23:32:19', 17, 'À l\'aube d\'une grande aventure', '1', 'Oda, Eiichirô', 'Oda, Eiichirô', 'Glénat', 2011, 204, 'https://www.bedetheque.com/media/Couvertures/Couv_141352.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(50) NOT NULL,
  `origin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `created`, `updated`, `title`, `origin`) VALUES
(14, '2022-12-13 23:15:07', '2022-12-13 23:15:07', 'Naruto', 'mangas'),
(16, '2022-12-13 23:15:38', '2022-12-13 23:17:26', 'Bleach', 'mangas'),
(17, '2022-12-13 23:17:18', '2022-12-13 23:17:18', 'One piece', 'mangas');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
