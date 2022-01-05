-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 jan. 2022 à 13:27
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(52, 'Formation php', 'RÃ©servation de la Salle Cosy pour une formation intensive en php pour 1o Ã©tudiants.', '2021-12-27 08:00:00', '2021-12-27 09:00:00', 6),
(3, 'Cours de langue Ã©trangÃ¨re', 'Mon Ã©vÃ¨nement.', '2021-12-15 18:00:00', '2021-12-15 19:00:00', 5),
(4, 'Projet dÃ©butant', 'Mon projet pour dÃ©butant.', '2021-12-16 10:00:00', '2021-12-16 11:00:00', 1),
(6, 'Reservation de mama 2', 'Reservation de mama 2', '2021-01-18 08:00:00', '2021-01-18 09:00:00', 5),
(62, 'COURS MATH', 'COURRS MATH', '2022-01-10 08:00:00', '2022-01-10 09:00:00', 1),
(61, 'COURS MATH', 'COURRS MATH', '2022-01-07 08:00:00', '2022-01-07 09:00:00', 1),
(60, 'COURS MATH', 'COURRS MATH', '2022-01-07 13:00:00', '2022-01-07 13:00:00', 1),
(14, 'RÃ©serv de la grande salle', 'RÃ©servation de la grande salle pour une rÃ©union professionnel.', '2022-01-03 09:00:00', '2022-01-03 11:00:00', 2),
(58, 'DEBUTANT', 'DEBUTANT', '2022-01-03 16:00:00', '2022-01-03 18:00:00', 1),
(54, 'Formation php', 'RÃ©servation de la Salle Cosy pour une formation intensive en php pour 1o Ã©tudiants.', '2021-12-28 16:00:00', '2021-12-28 18:00:00', 6),
(59, 'COURS ANGLAIS', 'COURRS ANGLAIS', '2022-01-05 13:00:00', '2022-01-05 13:00:00', 1),
(57, 'test', 'test', '2022-01-06 14:00:00', '2022-01-05 15:00:00', 1),
(56, 'test', 'test', '2022-01-05 13:00:00', '2022-01-05 15:00:00', 1),
(55, 'Formation php', 'RÃ©servation de la Salle Cosy pour une formation intensive en php pour 1o Ã©tudiants.', '2021-12-31 16:00:00', '2021-12-31 18:00:00', 6),
(53, 'Formation php', 'RÃ©servation de la Salle Cosy pour une formation intensive en php pour 1o Ã©tudiants.', '2021-12-31 08:00:00', '2021-12-31 09:00:00', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$ekJlVuT9r7mV16fJm5y8WObVO32Fs.3IkNoda0lS3v.DHgTJt5mkK'),
(2, 'coco', '$2y$10$IcVeoYxCQPhf9VVHbgOyO.nVZ4yk4xRE0T9AW1dDOhDaFTocRhrya'),
(3, 'bibi', '$2y$10$nVcoDIFx0uziaBbi2n.o0.Ztifqe7CkRkIJYFD/S0YN0zTu1dguwO'),
(4, 'bobo', '$2y$10$ZrvQudBk0vRHs9UTEt2X1uDW/trqesxabhQ8ICsI8wimnMvNe4BUO'),
(5, 'mama', '$2y$10$OPQa4Nd9znX.XhJHUvFjq.RV1IN8d9e3QSiTvARMLSEfURuFLG5km'),
(6, 'mimi', '$2y$10$tfBF1m0lvE.rFb56kWN0buXmCOzR.DR2r4Q/lQdEFVpbr.Y2S5fLC'),
(7, 'marya', '$2y$10$d0Z/fxVdE.aZPP/zGSfU2uzXVPvd497jA.SSkqQG8IhckhbfHogmS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
