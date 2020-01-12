-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mer 23 Octobre 2019 à 17:48
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `application_etudiants_uni`
--

-- --------------------------------------------------------

--
-- Structure de la table `application_outcomes`
--

CREATE TABLE `application_outcomes` (
  `id` int(11) NOT NULL,
  `outcome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `application_outcomes`
--

INSERT INTO `application_outcomes` (`id`, `outcome`) VALUES
(1, 'Rejected'),
(2, 'Accepted'),
(4, '');

-- --------------------------------------------------------

--
-- Structure de la table `application_status`
--

CREATE TABLE `application_status` (
  `id` int(11) NOT NULL,
  `status` enum('Pending','Opened','Closed') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `application_status`
--

INSERT INTO `application_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Opened'),
(3, 'Closed');

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` mediumtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `programs`
--

INSERT INTO `programs` (`id`, `name`, `Description`) VALUES
(1, 'Computer Science', 'kaki'),
(2, 'Arts', 'idsa');

-- --------------------------------------------------------

--
-- Structure de la table `program_applications`
--

CREATE TABLE `program_applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_outcome_id` int(11) DEFAULT NULL,
  `application_status_id` int(11) DEFAULT NULL,
  `program_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `program_applications`
--

INSERT INTO `program_applications` (`id`, `user_id`, `application_outcome_id`, `application_status_id`, `program_id`, `university_id`, `created`) VALUES
(2, 1, 2, 1, 1, 1, '2016-10-26 20:25:00'),
(7, 2, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `web_site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `universities`
--

INSERT INTO `universities` (`id`, `name`, `adress`, `web_site`) VALUES
(1, 'UQAM', '21324 rjuw', 'http://localhost/application_uni/universities/add');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('F','M','X') NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `phone_num` tinyint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `date_of_birth`, `created`, `phone_num`, `password`, `email`) VALUES
(1, 'Jane', 'F', '2014-06-18 12:16:00', '2020-05-21 15:20:00', 127, '$2y$10$aDWyxcXyMemqCALVmC5SSu9dMvcTB/RSGbtmIKa/6rxo.yCCU5enO', ''),
(2, 'Admin', 'F', '2014-02-18 12:44:00', NULL, 0, '$2y$10$f67tDRgTsPh1foBufLye7.4oBci6D4LmYsOhHg88DKqSQSAIC1uHe', 'admin@admin.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `application_outcomes`
--
ALTER TABLE `application_outcomes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `program_applications`
--
ALTER TABLE `program_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_key` (`program_id`),
  ADD KEY `user_key` (`user_id`),
  ADD KEY `application_status_key` (`application_status_id`),
  ADD KEY `university_key` (`university_id`),
  ADD KEY `application_outcome_key` (`application_outcome_id`);

--
-- Index pour la table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `application_outcomes`
--
ALTER TABLE `application_outcomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `program_applications`
--
ALTER TABLE `program_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `program_applications`
--
ALTER TABLE `program_applications`
  ADD CONSTRAINT `program_applications_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `program_applications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `program_applications_ibfk_3` FOREIGN KEY (`application_status_id`) REFERENCES `application_status` (`id`),
  ADD CONSTRAINT `program_applications_ibfk_4` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `program_applications_ibfk_5` FOREIGN KEY (`application_outcome_id`) REFERENCES `application_outcomes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
