-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 sep. 2023 à 11:19
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
  `image_filename` varchar(500) DEFAULT NULL,
  `annee` int(4) NOT NULL,
  `kilometre` int(6) NOT NULL,
  `equipements` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `marque`, `modele`, `prix`, `image_filename`, `annee`, `kilometre`, `equipements`) VALUES
(118, 'Peugeot', 'Partner 1.6 HDI 110ch', 7500, NULL, 2007, 166000, 'Full options'),
(119, 'Nissan', 'Juke connecta', 16990, NULL, 2021, 55800, 'Audio - Télécommunications :\r\n- Bluetooth+USB+AUX+12V\r\n- Points d\'accès Wi-Fi\r\n- Reconnaissance vocale\r\nConduite :\r\n- Aide au démarrage en côte\r\n- Palettes au volant\r\n- Système STOP/START\r\nExtérieur :\r\n- Caméra de recul avec radars de stationnement AR\r\n- Feux AV LED\r\n- Feux de route adaptatifs\r\n- Jantes alliage 17\"\r\n- Radars de stationnement AR\r\n- Rétroviseurs extérieurs dégivrants et rabattables automatiquement\r\n- Spoiler AR\r\n- Vitres AR teintées'),
(120, 'Renault', 'Captur Intens TCe 130 EDC FAP', 22490, NULL, 2020, 14000, 'CONDUITE\r\nallumage automatique des essuie-glaces\r\nindicateur changement de vitesse\r\nrépétiteurs latéraux de changement de direction\r\npalettes au volant (avec boîte de vitesses automatique uniquement)\r\nassistant maintien de voie\r\nmode eco\r\naide au démarrage en côte\r\néclairage avant et arrière Full LED pure vision\r\naide au parking avant et arrière\r\nlunette arrière chauffante\r\nlève-vitres électriques et impulsionnels\r\ntableau de bord avec écran numérique et personnalisable 7\"\r\nrenault multi-sense\r\ncommutation automatique des feux de route/croisement\r\nrétroviseurs extérieurs dégivrants, réglables et rabattables\r\nélectriquement\r\ncaméra de recul\r\nrégulateur / limiteur de vitesse\r\ncarte Renault mains-libres\r\npack city\r\n\r\nSECURITE\r\nairbags latéraux avant, système d\'Anti Blocage des roues (ABS), freinage actif d\'urgence avec détection piétons et cyclistes (AEBS City + Inter Urbain+ Piéton)\r\naide au Freinage d\'urgence\r\nairbags frontaux\r\nairbag passager déconnectable\r\nalerte oubli des ceintures de sécurité aux 5 places\r\nalerte de survitesse avec reconnaissance des panneaux de signalisation\r\nceintures de sécurité avant réglables en hauteur\r\nceinture milieu arrière 3 points\r\nalerte distance de sécurité - information dans tableau de bord\r\nfrein de parking électrique avec fonction auto-hold\r\nfeux de stop à LED\r\nsystème isofix (i-Size) aux places latérales arrière et passager avant\r\nappel d\'urgence renault\r\nsystème de détection de la pression des pneumatiques\r\nroue de secours galette'),
(121, 'RENAULT ', 'TWINGO 3', 9900, NULL, 2021, 55000, 'Volant tournant, climatisation, vitres électriques, ABS'),
(122, 'MAZDA ', '3E GENERATION WAGON', 10990, NULL, 2021, 78000, 'Climatisation bi-zone, radar de recul, vitres électriques, ABS'),
(123, 'AUDI', 'TT3', 24990, NULL, 2022, 37560, 'Ordinateur de bord, régulateur de vitesse, climatisation bi-zone, radar de recul.'),
(124, 'VOLKSWAGEN ', 'PASSAT 8 SW', 26780, NULL, 2019, 24380, 'Ordinateur de bord, régulateur de vitesse, climatisation bi-zone, radar de recul, ABS, autoradio.'),
(125, 'BMW', 'Serie 1', 7500, NULL, 2010, 196230, 'Régulateur de vitesse, Airbag, climatisation bi-zone, radar de recul, ABS, autoradio.'),
(126, 'Peugeot', '207 HDi', 4300, NULL, 1998, 155200, 'Airbag, vitres électriques avant/arrière, climatisation, ABS, nombreux rangements.'),
(127, 'Peugeot', '3008 GT Hybride', 15000, NULL, 2020, 97000, '5 portes, Airbag, vitres électriques avant/arrière, climatisation, ABS, nombreux rangements, sièges 2/3 1/3.'),
(128, 'Renault', 'Clio 4', 8990, NULL, 2017, 96700, 'Regulateur de vitesse, ABS, ESP, Airbag'),
(129, 'CITROEN ', 'C-AIRCROSS CONCEPT', 12990, NULL, 2013, 196700, 'Regulateur de vitesse, ABS, ESP, Airbag, banquette 2/3 1/3, vitres teintées à l\'arriere.'),
(193, 'Nissan', 'Gt-r', 16320, NULL, 2016, 151200, 'ABS, Airbag, ESP, régulateur de vitesse, 5 portes'),
(194, 'Ford', 'Ranger', 30990, NULL, 2021, 23510, 'Full options');

-- --------------------------------------------------------

--
-- Structure de la table `car_images`
--

CREATE TABLE `car_images` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `image_filename` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `car_images`
--

INSERT INTO `car_images` (`id`, `car_id`, `image_filename`) VALUES
(202, 118, '64ff4853af7ba-partner1-jpg'),
(203, 118, '64ff4853aff25-partner2-jpg'),
(204, 118, '64ff4853b04af-partner3-jpg'),
(205, 118, '64ff4853b09cc-partner4-jpg'),
(206, 118, '64ff4853b0eef-partner5-jpg'),
(207, 119, '64ff4a3a4ff55-juke1-jpg'),
(208, 119, '64ff4a3a52595-juke2-jpg'),
(209, 119, '64ff4a3a52e63-juke3-jpg'),
(210, 119, '64ff4a3a53496-juke4-jpg'),
(211, 119, '64ff4a3a540cd-juke5-jpg'),
(212, 120, '64ff4b1b56fb1-captur1-jpg'),
(213, 120, '64ff4b1b57525-captur2-jpg'),
(214, 120, '64ff4b1b57a1f-captur3-jpg'),
(216, 121, '6500840c03e13-twingo1-jpg'),
(217, 121, '6500840c04163-twingo2-jpg'),
(218, 121, '6500840c043ae-twingo3-jpg'),
(219, 121, '6500840c0458b-twingo4-jpg'),
(220, 122, '650084a8bd560-mazda1-jpg'),
(221, 122, '650084a8bd8a9-mazda2-jpg'),
(222, 122, '650084a8bdaf4-mazda3-jpg'),
(223, 122, '650084a8bdcd5-mazda4-jpg'),
(224, 123, '650085656b618-auditt1-jpg'),
(225, 123, '650085656b900-auditt2-jpg'),
(226, 123, '650085656bb1c-auditt3-jpg'),
(227, 123, '650085656bdc3-auditt4-jpg'),
(228, 124, '650085fd6e4c9-passat1-jpg'),
(229, 124, '650085fd6e73e-passat2-jpg'),
(230, 124, '650085fd6e92e-passat3-jpg'),
(231, 124, '650085fd6eafc-passat4-jpg'),
(232, 125, '650086bdb8d5d-bmw1-jpg'),
(233, 125, '650086bdb903a-bmw2-jpg'),
(234, 125, '650086bdb9266-bmw3-jpg'),
(235, 125, '650086bdb944c-bmw4-jpg'),
(236, 126, '650087d31165c-peugeot207-1-jpg'),
(237, 126, '650087d3119bb-peugeot207-2-jpg'),
(238, 126, '650087d311bfd-peugeot207-3-jpg'),
(239, 127, '6500888edc42e-30081-jpg'),
(240, 127, '6500888edc74e-30082-jpg'),
(241, 127, '6500888edc976-30083-jpg'),
(242, 127, '6500888edcbc6-30084-jpg'),
(243, 128, '6500894ed5a3f-clio1-jpg'),
(244, 128, '6500894ed5c96-clio2-jpg'),
(245, 128, '6500894ed5fbf-clio3-jpg'),
(246, 128, '6500894ed624d-clio4-jpg'),
(247, 129, '650089faaa263-aircross1-jpg'),
(248, 129, '650089faaa523-aircross2-jpg'),
(249, 129, '650089faaa7a1-aircross3-jpg'),
(250, 129, '650089faaa99a-aircross4-jpg'),
(279, 193, '65084bdc08983-nissan1-jpg'),
(280, 193, '65084bdc08be2-nissan2-jpg'),
(281, 193, '65084bdc0be84-nissan3-jpg'),
(282, 193, '65084bdc0c1e3-nissan4-jpg'),
(283, 194, '65084dbd099f1-ford1-jpg'),
(284, 194, '65084dbd09c4b-ford2-jpg'),
(285, 194, '65084dbd09e21-ford3-jpg'),
(286, 194, '65084dbd0a0c1-ford4-jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`) VALUES
(1, 'alban', 'Décole', 'alban@mail.com', '06.25.25.23.32', 'bonjour,\r\n\r\nj\'ai un probleme de durite'),
(3, 'Pascal', 'Miflon', 'scalpa@gt.fr', '06.32.36.63.52', 'Bonjour, \r\nserait-il possible d\'avoir un devis pour une distribution sur une Dolorean?\r\nMerci'),
(4, 'Gael', 'Jacquemin', 'jacm@example.com', '06 54 45 65 56', 'Bonjour,\r\nJe voudrais connaitre le tarif pour changer 4 pneus de dimensions 205*55*16.\r\nMerci d\'avance pour votre retour.'),
(5, 'Sandrine', 'Ronguin', 'ronguin@example.com', '02 54 65 98 84', 'Bonjour,\r\n\r\nPourriez-vous me proposer un RDV pour changer des plaquettes de freins ainsi que le tarif s&#039;il vous plait.\r\nMerci d&#039;avance pour votre retour.\r\nCordialement.'),
(6, 'Thr', 'Mlkml', 'rgjekg@gt.fr', '05 65 56 54 65', 'gtkhthklrtkjrhn');

-- --------------------------------------------------------

--
-- Structure de la table `formauto`
--

CREATE TABLE `formauto` (
  `id` int(11) NOT NULL,
  `cars_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formauto`
--

INSERT INTO `formauto` (`id`, `cars_id`, `first_name`, `last_name`, `email`, `phone`, `message`) VALUES
(7, 119, 'Leon', 'Ligand', 'ligand@example.com', '05.57.65.36.25', 'Bonjour,\r\nJe suis très intéressé par votre véhicule, serait-il possible de venir l\'essayer dans la semaine?\r\nCordialement'),
(69, 127, 'mimi', 'rover', 'mimi@mail.com', '0957603720', 'egrthrjh hrhj rg hrh'),
(70, 125, 'roland', 'rover', 'lolo@mail.com', '0612345678', 'reogehehn,eh t ebnrngre'),
(75, 128, 'michel', 'savate', 'savate@gh.fr', '0957603720', 'rzgrg thh\'th \'th\'tgh \'th\' th'),
(76, 128, 'michel', 'savate', 'savate@gh.fr', '0957603720', 'rzgrg thh\'th \'th\'tgh \'th\' th'),
(77, 128, 'michel', 'savate', 'savate@gh.fr', '0957603720', 'rzgrg thh\'th \'th\'tgh \'th\' th'),
(78, 125, 'Kevin', 'Costner', 'K.costner@acteur.fr', '07.32.52.63.98', 'Bonjour, \r\nCe véhicule est-il toujours disponible?\r\nCordialement.'),
(79, 193, 'Kevin', 'Maschin', 'keke@turbo.fr', '06 06 25 23 32', 'Bonjour, \r\nVotre voiture est-elle équipée pour aller sur circuit?\r\nMerci.'),
(80, 193, 'Mimi', 'Rover', 'roland@mail.com', '21 56 54 54 54', 'egkjdhrjtkhkjrhy');

-- --------------------------------------------------------

--
-- Structure de la table `open_hours`
--

CREATE TABLE `open_hours` (
  `id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `morning_hours` varchar(50) NOT NULL,
  `afternoon_hours` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `open_hours`
--

INSERT INTO `open_hours` (`id`, `day`, `morning_hours`, `afternoon_hours`) VALUES
(1, 'Lundi', '8h45 - 12h00', '14h00 - 18h00'),
(2, 'Mardi', '8h45 - 12h00', '14h00 - 18h00'),
(3, 'Mercredi', '8h45 - 12h00', '14h00 - 18h00'),
(4, 'Jeudi', '8h45 - 12h00', '14h00 - 18h00'),
(5, 'Vendredi', '8h45 - 12h00', '14h00 - 18h00'),
(6, 'Samedi', '8h45 - 12h00', 'Fermé'),
(7, 'Dimanche', 'Fermé', 'Fermé');

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
(25, 'Entretien et révision', 'Vidange avec remplacement des filtres \r\nRemplacement des bougies \r\nContrôle des niveaux de liquide \r\nVérification des pneus \r\nRéglage des freins', '64f5a5104d319-entretien-jpg'),
(26, 'Réparation', 'Mécanique Electrique - Electronique Système de sécurité Pneumatique', '64f5a572092fb-reparation-jpg'),
(27, 'Carrosserie et peinture', 'Le remplacement. \r\nLe débosselage ou redressage. \r\nLe banc de redressage. \r\nLe banc de mesure ou marbre.\r\n Le masticage. \r\nLe marouflage. \r\nLa peinture.', '64f5a5add13e5-carroserie-jpg');

-- --------------------------------------------------------

--
-- Structure de la table `temoignages`
--

CREATE TABLE `temoignages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `note` int(11) NOT NULL,
  `approved` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `temoignages`
--

INSERT INTO `temoignages` (`id`, `name`, `comment`, `note`, `approved`) VALUES
(4, 'André', 'Nous avons été très bien accueillis, le tarif a été sans surprise. Je recommande', 5, 1),
(11, 'valerie', 'J\'adore ce garagiste', 5, 1),
(20, 'Laurent', 'Garagiste très expérimenté et sans surprise au moment du règlement, je recommande', 5, 1),
(21, 'Pierre', 'Délai un peu long mais dû à un problème de livraison, sinon globalement satisfait', 3, 1),
(23, 'michel', '\"Merci de votre intervention de qualité, je vous recommanderai\", voici le retour d\'un client satisfait.', 4, 1),
(25, 'Henry', 'Tres bon garagiste, je recommande vivement', 1, 0),
(26, 'Lecomte', 'Je suis agréablement surpris par ce garage qui, de plus, donne de bons conseils pour entretenir son véhicule.', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `temoignages_employe`
--

CREATE TABLE `temoignages_employe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `temoignages_employe`
--

INSERT INTO `temoignages_employe` (`id`, `name`, `comment`) VALUES
(1, 'Michel', '&quot;Vous êtes drolement efficace et pas cher ici&quot; M. Hervé concernant l&#039;entretien de sa 4L'),
(2, 'Lotin', '&quot;Vous êtes efficace et pas cher ici!!&quot; Retour de M. Hervé concernant l&#039;entretien de sa 4L.'),
(22, 'Giftui', 'gyukyuk');

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
(5, 'sapin@example.com', '$2y$10$6Dr9kVoXPb1xvtbad03g5OPa160dQdlzmaWC2gfIZrmsmI1NiKLya', 'gerald', 'sapin', 'Visiteur'),
(14, 'plantin@example.com', '$2y$10$Avsxvj7GhvzbiR2UeeetGeYN.5fd83MDu6fmgFfNTT2cKKfw/6E/m', 'Yvonne ', 'Plantin', 'Visiteur'),
(22, 'a.figan@parrot.fr', '$2y$10$ast0N/s0mcdgj/gqBHZdg.n/MFDT7WwGjPN8eq6Emdcysi5aO0kua', 'Alain', 'Figan', 'Employe'),
(24, 'v.parrot@parrot.fr', '$2y$10$jAOehy/9VaVNmuCbskbTduV4qk6TpPEDnIeU04zIHzlODSiLFhQ4u', 'Vincent', 'Parrot', 'Admin'),
(25, 'h.michel@parrot.fr', '$2y$10$Xfmn0uEazuV5kooavbUJfOsoppBzD/7S9MWmv2PdpYcf8UAKUF7UG', 'Henri', 'Michel', 'Employe'),
(26, 'h.michel@parrot.fr', '$2y$10$w6jWLbGafPR60oJluz1S/O31FufPOdp8/sl8Be631oafOM/hxkOvq', 'Henri', 'Michel', 'Employe'),
(27, 'm.larose@parrot.fr', '$2y$10$2RoaIxWpx2ERtvSSofgNPu0uBaZlQu2SHiUAPZByvBO2ggcFwJBGy', 'Miguel', 'Larose', 'Employe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formauto`
--
ALTER TABLE `formauto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_id` (`cars_id`);

--
-- Index pour la table `open_hours`
--
ALTER TABLE `open_hours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignages`
--
ALTER TABLE `temoignages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignages_employe`
--
ALTER TABLE `temoignages_employe`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT pour la table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `formauto`
--
ALTER TABLE `formauto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `open_hours`
--
ALTER TABLE `open_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `temoignages`
--
ALTER TABLE `temoignages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `temoignages_employe`
--
ALTER TABLE `temoignages_employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formauto`
--
ALTER TABLE `formauto`
  ADD CONSTRAINT `formauto_ibfk_1` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
