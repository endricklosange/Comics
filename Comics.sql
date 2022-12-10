-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 10 déc. 2022 à 18:58
-- Version du serveur : 8.0.30-0ubuntu0.22.04.1
-- Version de PHP : 8.1.11

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
  `cover` varchar(30) DEFAULT NULL,
  `rep` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `created`, `updated`, `serie_id`, `title`, `num`, `writer`, `illustrator`, `editor`, `releaseyear`, `strips`, `cover`, `rep`) VALUES
(1, '2022-11-09 14:56:26', '2022-11-09 14:56:26', 4, 'Volume 1', '1', 'Watanabe, Tsunehiko', 'Hinotsuki, Neko\r\n Ayakura, Jyuu', 'Delcourt', 2019, 190, NULL, 1),
(2, '2022-11-09 14:56:26', '2022-11-09 14:56:26', 4, 'Volume 2', '2', 'Watanabe, Tsunehiko', 'Hinotsuki, Neko', 'Delcourt', 2019, 182, NULL, 0),
(3, '2022-11-09 14:57:23', '2022-11-09 14:57:23', 4, 'Volume 3', '3', 'Watanabe, Tsunehiko', 'Hinotsuki, Neko', 'Delcourt', 2019, 172, NULL, 0),
(4, '2022-11-09 15:01:26', '2022-11-09 15:01:26', 2, 'Volume 1', '1', 'Migliardo, Emiliano', 'Migliardo, Emiliano', 'Éditions Caramel', 2015, 32, NULL, 0),
(5, '2022-11-09 15:01:26', '2022-11-09 15:01:26', 2, 'Volume 2', '2', 'Migliardo, Emiliano', 'Migliardo, Emiliano', 'Éditions Caramel', 2015, 32, NULL, 0),
(6, '2022-11-09 15:01:26', '2022-11-09 15:01:26', 2, 'Cache-cache au bout du monde\r\n', '3', 'Stettler, Jérôme', 'Stettler, Jérôme', 'La Joie de Lire', 2005, 30, NULL, 1),
(8, '2022-11-09 15:05:21', '2022-11-09 15:05:21', 3, 'Issue 1 ', '1', 'Austen, Chuck', 'Finch, David', 'Marvel Comics', 2018, NULL, NULL, 1),
(9, '2022-11-09 15:05:21', '2022-11-09 15:05:21', 3, 'Issue 2', '2', 'Austen, Chuck', 'Finch, David', 'Marvel Comics', 2018, NULL, NULL, 0),
(10, '2022-11-09 15:05:21', '2022-11-09 15:05:21', 3, 'Issue 3 ', '3', 'Austen, Chuck', 'Finch, David', 'Marvel Comics', 2018, NULL, NULL, 0),
(11, '2022-11-09 15:07:40', '2022-11-09 15:07:40', 5, 'Vol 1', '', 'Hojo, Tsukasa', 'Hojo, Tsukasa', 'Tonkam', 2002, 193, NULL, 1),
(12, '2022-11-09 15:07:40', '2022-11-09 15:07:40', 5, 'Vol 2 ', '2', 'Hojo, Tsukasa', 'Hojo, Tsukasa', 'Tonkam', 2002, 214, NULL, 0);

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
(2, '2022-11-09 14:25:50', '2022-11-09 14:25:50', 'Cache-cache', 'BD'),
(3, '2022-11-09 14:25:50', '2022-11-09 14:25:50', 'Call of Duty: The Brotherhood', 'comics'),
(4, '2022-11-09 14:28:31', '2022-11-09 14:36:49', 'A Fantasy lazy life', 'Manga'),
(5, '2022-11-09 14:36:28', '2022-11-09 16:14:43', 'Rash!!', 'Manga'),
(8, '2022-11-09 16:13:52', '2022-11-09 16:13:52', 'dzefz', 'manga');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
