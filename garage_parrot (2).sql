-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 août 2023 à 17:30
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage_parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `prix` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `annee` int(4) NOT NULL,
  `kilometre` int(6) NOT NULL,
  `equipements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`) VALUES
(1, 'Entretien et révision', 'Vidange avec remplacement des filtres\r\nRemplacement des bougies\r\nContrôle des niveaux de liquide\r\nVérification des pneus\r\nRéglage des freins', '64df8d26900ea-entretien-jpg'),
(2, 'Réparation', 'Mécanique\r\nElectrique - Electronique\r\nCarosserie\r\nPeinture\r\nSystème de sécurité\r\nPneumatique\r\n', '64df8d4f2c5dd-reparation-jpg'),
(3, 'Carrosserie et peinture', 'Le remplacement. \r\nLe débosselage ou redressage. \r\nLe banc de redressage.\r\nLe banc de mesure ou marbre. \r\nLe masticage. \r\nLe marouflage. \r\nLa peinture.', '64df8d975a619-carroserie-jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(60) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `roles` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `roles`) VALUES
(3, 'michel@vin.com', '$2y$10$9mQNB/jlcn2CFcTS/HgVbuKKuBcAAc.fUSROFjnuE1tVXOEKw9DLy', 'michel', 'vin', 'Employe'),
(4, 'vincent.parrot@example.com', '$2y$10$M/HIzYCoztNM6DZBrHhgDuEaIsgQt9F22hj7DfLSpUK9GqafwCw06', 'Vincent', 'Parrot', 'Admin'),
(5, 'sapin@example.com', '$2y$10$6Dr9kVoXPb1xvtbad03g5OPa160dQdlzmaWC2gfIZrmsmI1NiKLya', 'gerald', 'sapin', 'Visiteur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
