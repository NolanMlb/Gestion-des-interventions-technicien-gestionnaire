-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 07 mai 2022 à 10:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ap2eme`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `idAgence` int(10) NOT NULL AUTO_INCREMENT,
  `nomAgence` varchar(20) DEFAULT NULL,
  `adresseAgence` varchar(100) DEFAULT NULL,
  `telAgence` char(10) DEFAULT NULL,
  PRIMARY KEY (`idAgence`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idAgence`, `nomAgence`, `adresseAgence`, `telAgence`) VALUES
(1, 'Tourcoing', '45 rue du dronckard\r\n59200 Tourcoing', '0301020304'),
(2, 'Roncq', '566 rue de Tourcoing\r\n59175 Roncq', '0396857445');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(10) NOT NULL AUTO_INCREMENT,
  `numClient` int(10) DEFAULT NULL,
  `nomClient` text NOT NULL,
  `prenomClient` text NOT NULL,
  `raisonSocialeClient` varchar(50) DEFAULT NULL,
  `sirenClient` char(9) DEFAULT NULL,
  `codeApeClient` char(5) DEFAULT NULL,
  `telClient` char(10) DEFAULT NULL,
  `adresseClient` varchar(100) DEFAULT NULL,
  `mailClient` varchar(100) DEFAULT NULL,
  `dureeDeplacementClient` time DEFAULT NULL,
  `distanceKmClient` int(10) DEFAULT NULL,
  `contratmaintenance` int(10) DEFAULT NULL,
  `idAgence` int(10) DEFAULT NULL,
  PRIMARY KEY (`idClient`),
  KEY `FK_client_contratmaintenance_idcontrat_contratmaintenance` (`contratmaintenance`),
  KEY `FK_client_idAgence_agence` (`idAgence`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `numClient`, `nomClient`, `prenomClient`, `raisonSocialeClient`, `sirenClient`, `codeApeClient`, `telClient`, `adresseClient`, `mailClient`, `dureeDeplacementClient`, `distanceKmClient`, `contratmaintenance`, `idAgence`) VALUES
(1, 1, 'Marande\r\n', 'Albert', 'AlbertMarande', 'MA', '5252', '0601020304', '219 rue du l\'ombrer\r\n59200 Tourcoing', 'Alerbermarand@gastonberger.fr', '00:14:00', 10, 1, 1),
(2, 2, 'Trolain', 'Elio', 'ElioTrolain', 'LE', '4564', '0352659684', '12 rue du falanpin\r\n59175 Roncq.', 'Eliotrolain@gastonberger.fr', '00:20:00', 25, 2, 2),
(3, 3, 'Blandin', 'Benoit', 'BlandinBenoit', 'BB', '2563', '0678876545', '10 rue de la tarte', 'Benoit.blandin@gmail.com', '00:08:00', 10, 1, 1),
(4, 4, 'Roba', 'Luca', 'LucaRoba', 'RL', '6969', '0654243421', '201 rue de gaston', 'luca.roba@gmail.com', '00:20:00', 19, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `idContrat` int(10) NOT NULL AUTO_INCREMENT,
  `numContrat` int(10) DEFAULT NULL,
  `dateSignatureContrat` date DEFAULT NULL,
  `dateEcheanceContrat` date DEFAULT NULL,
  `numClient` int(10) DEFAULT NULL,
  `refContrat` varchar(10) DEFAULT NULL,
  `idContrat_typeContrat` int(10) DEFAULT NULL,
  `client_idclient` int(10) DEFAULT NULL,
  PRIMARY KEY (`idContrat`),
  KEY `FK_contratMaintenance_idContrat_typeContrat` (`idContrat_typeContrat`),
  KEY `FK_contratMaintenance_client_idclient_client` (`client_idclient`),
  KEY `numClient` (`numClient`),
  KEY `refContrat` (`refContrat`)
) ENGINE=InnoDB AUTO_INCREMENT=87656987 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contratmaintenance`
--

INSERT INTO `contratmaintenance` (`idContrat`, `numContrat`, `dateSignatureContrat`, `dateEcheanceContrat`, `numClient`, `refContrat`, `idContrat_typeContrat`, `client_idclient`) VALUES
(1, 1, '2022-06-05', '2023-05-07', 1, 'TR3654', 1, 1),
(2, 2, '2021-11-01', '2023-05-07', 2, 'RQ3989', 2, 2),
(1233421, 3, '2022-04-04', '2023-05-07', 3, 'BB3', 1, 3),
(87656986, 4, '2022-05-10', '2023-05-07', 4, 'RL4', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `idMateriel` int(10) NOT NULL AUTO_INCREMENT,
  `idIntervention` int(10) NOT NULL,
  `idControler` int(10) DEFAULT NULL,
  `numSerie` varchar(15) DEFAULT NULL,
  `tempsPasse` time DEFAULT NULL,
  `commentaire` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idMateriel`,`idIntervention`),
  KEY `FK_controler_idIntervention_intervention` (`idIntervention`),
  KEY `idMateriel` (`idMateriel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` int(10) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) DEFAULT NULL,
  `nomEmploye` varchar(20) DEFAULT NULL,
  `prenomEmploye` varchar(20) DEFAULT NULL,
  `adresseEmploye` varchar(100) DEFAULT NULL,
  `dateEmbaucheEmploye` date DEFAULT NULL,
  `idtechnicien` int(10) DEFAULT NULL,
  PRIMARY KEY (`idEmploye`),
  KEY `FK_employe_technicien_idtechnicien_technicien` (`idtechnicien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `matricule`, `nomEmploye`, `prenomEmploye`, `adresseEmploye`, `dateEmbaucheEmploye`, `idtechnicien`) VALUES
(1, 'RT', 'Ribeiro', 'Thomas', '219 rue Georges Pompidou\r\n59200 Tourcoing', '2021-12-12', 1),
(2, 'MN', 'Malherbe', 'Nolan', '35 rue saranguins\r\n59200 Tourcoing', '2021-07-04', 2),
(3, 'MR', 'Mefroot', 'Rayane', '289 rue de la grillote.', '2021-08-01', NULL),
(4, 'DN', 'DeBruycker', 'Nicolas', '212 rue de la pantiere', '2021-04-04', NULL),
(5, 'DN', 'DeBruycker', 'Nicolas', '212 rue de la pantiere', '2021-04-04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `idIntervention` int(10) NOT NULL AUTO_INCREMENT,
  `dateVisite` text NOT NULL,
  `heureVisite` text,
  `idClient` int(10) DEFAULT NULL,
  `idTechnicien` int(10) DEFAULT NULL,
  `etatIntervention` text NOT NULL,
  `valideIntervention` text NOT NULL,
  PRIMARY KEY (`idIntervention`),
  KEY `FK_intervention_idClient_client` (`idClient`),
  KEY `FK_intervention_idTechnicien_technicien` (`idTechnicien`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`idIntervention`, `dateVisite`, `heureVisite`, `idClient`, `idTechnicien`, `etatIntervention`, `valideIntervention`) VALUES
(25, '2022-01-14', '10:00', 1, 1, 'je pense que je sais pas', ''),
(26, '2022-01-12', '12:00', 1, 1, 'Rectification de l\'état', ''),
(27, '2022-01-15', '11:00', 1, 1, 'Rectification de la box', ''),
(28, '2022-02-12', '09:00', 1, 1, 'Rectification de l\'état', ''),
(29, '2022-09-12', '17:00', 2, 2, 'Planification du rdv et rectification d\'une erreur', ''),
(30, '2022-08-21', '07:00', 2, 2, 'Planification du rdv et rectification d\'une erreur', ''),
(31, '2022-01-31', '10:10', 2, 2, 'Planification du rdv et rectification d\'une erreur', ''),
(32, '2022-11-25', '19:00', 1, 3, 'Il faut 2 visites encore pour régler le soucis.', ''),
(33, '2022-11-30', '11:00', 2, 3, 'Il faut 1 visite encore pour régler le soucis.', ''),
(34, '2022-03-22', '12:00', 1, 1, 'JSP', ''),
(35, '2022-01-15', '10:33', 1, 1, 'Rectification du contrat', ''),
(36, '2022-01-15', '10:33', 1, 1, 'Rectification du contrat', ''),
(37, '2022-01-15', '12:00', 1, 1, 'La plomberie ', ''),
(38, '2002-03-12', '12:00', 1, 1, 'A faire', ''),
(39, '2022-03-12', '14:00', 1, 1, 'A faire', ''),
(40, '2022-03-17', '12:00', 1, 1, 'A faire', ''),
(41, '2022-03-17', '12:00', 1, 1, 'A faire', ''),
(42, '2022-03-17', '19:00', 2, 2, 'A faire', ''),
(43, '2022-05-23', '15:00', 2, 2, 'Gestion du parc informatique', ''),
(44, '2022-05-05', '14:18', 4, 2, 'Branchement ethernet', ''),
(45, '2022-05-11', '12:00', 4, 2, 'Branchement', '');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `idMateriel` int(10) NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(15) DEFAULT NULL,
  `dateVente` date DEFAULT NULL,
  `dateInstall` date DEFAULT NULL,
  `prixVente` float DEFAULT NULL,
  `emplacement` varchar(15) DEFAULT NULL,
  `ref` varchar(10) DEFAULT NULL,
  `numClient` int(10) DEFAULT NULL,
  `contratmaintenance` int(10) DEFAULT NULL,
  `idMateriel_typeMateriel` int(10) DEFAULT NULL,
  `idClient` int(10) DEFAULT NULL,
  PRIMARY KEY (`idMateriel`),
  KEY `FK_materiel_contratmaintenance_idcontrat_contratmaintenance` (`contratmaintenance`),
  KEY `FK_materiel_idMateriel_typeMateriel` (`idMateriel_typeMateriel`),
  KEY `FK_materiel_idClient_client` (`idClient`),
  KEY `numClient` (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`idMateriel`, `numSerie`, `dateVente`, `dateInstall`, `prixVente`, `emplacement`, `ref`, `numClient`, `contratmaintenance`, `idMateriel_typeMateriel`, `idClient`) VALUES
(1, '123456789', '2021-12-05', '2021-12-09', 12, 'E4', 'E235641', 1, 1, 1, 1),
(2, '98720912', '2022-05-18', '2022-06-12', 220, 'Gauche', 'BB3', 3, 2, 1, 3),
(3, '98720912', '2022-05-24', '2022-06-12', 60, 'Gauche', 'ET3', 2, 1, 1, 2),
(4, '98EY98273', '2022-05-27', '2022-08-15', 12, 'Droite', 'RB4', 4, 2, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `idTechnicien` int(10) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) DEFAULT NULL,
  `telTechnicien` char(10) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `dateObtention` date DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `idemploye` int(10) DEFAULT NULL,
  `idAgence` int(10) DEFAULT NULL,
  PRIMARY KEY (`idTechnicien`),
  KEY `FK_technicien_employe_idemploye_employe` (`idemploye`),
  KEY `FK_technicien_idAgence_agence` (`idAgence`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`idTechnicien`, `matricule`, `telTechnicien`, `qualification`, `dateObtention`, `nom`, `prenom`, `adresse`, `dateEmbauche`, `idemploye`, `idAgence`) VALUES
(1, 'RT', '0601020304', 'Expert en construction', '2021-07-04', 'Ribeiro', 'Thomas', '219 rue des saranguines\r\n59200 Tourcoing', '2021-10-03', 1, 1),
(2, 'MN', '0601020304', 'Expert en montage mécanique', '2021-08-01', 'Malherbe', 'Nolan', '35 rue des saranguins\r\n59200 Tourcoing', '2021-09-25', 2, 2),
(3, 'MR', '0670605040', 'Expert dans la plomberie.', '2021-07-04', 'Mefroot', 'Rayane', '250 rue de lagrillote', '2021-10-01', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
CREATE TABLE IF NOT EXISTS `typecontrat` (
  `idContrat` int(10) NOT NULL AUTO_INCREMENT,
  `delaiIntervention` date DEFAULT NULL,
  `tauxApplicable` float DEFAULT NULL,
  PRIMARY KEY (`idContrat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typecontrat`
--

INSERT INTO `typecontrat` (`idContrat`, `delaiIntervention`, `tauxApplicable`) VALUES
(1, '2021-12-11', 0.2),
(2, '2021-11-07', 0.2);

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `idMateriel` int(10) NOT NULL AUTO_INCREMENT,
  `libelleMateriel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idMateriel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typemateriel`
--

INSERT INTO `typemateriel` (`idMateriel`, `libelleMateriel`) VALUES
(1, 'BAPON'),
(2, 'Cristiano');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nomUtilisateur` varchar(50) NOT NULL,
  `mdpUtilisateur` varchar(50) DEFAULT NULL,
  `roleUtilisateur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nomUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nomUtilisateur`, `mdpUtilisateur`, `roleUtilisateur`) VALUES
('DeBruycker', 'DeBruycker', 'Gestionnaire'),
('Malherbe', 'Malherbe', 'Technicien'),
('Ribeiro', 'Ribeiro', 'Technicien');

-- --------------------------------------------------------

--
-- Structure de la table `validerintervention`
--

DROP TABLE IF EXISTS `validerintervention`;
CREATE TABLE IF NOT EXISTS `validerintervention` (
  `idIntervention` int(11) NOT NULL,
  `etatIntervention` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `tempsPasse` varchar(50) NOT NULL,
  KEY `idIntervention` (`idIntervention`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `validerintervention`
--

INSERT INTO `validerintervention` (`idIntervention`, `etatIntervention`, `commentaire`, `tempsPasse`) VALUES
(35, 'SZZASSA', 'SAZSAZ', 'SAZSZ'),
(35, 'SZZASSA', 'SAZSAZ', 'SAZSZ'),
(35, 'OINJ', 'OKJ', 'OHJ'),
(35, 'OINJ', 'OKJ', 'OHJ'),
(37, 'FINIE', 'exÃ©cuter', '1:30:00'),
(31, 'EN COURS', 'passage du pomblier', '01:20:00'),
(35, 'EN COURS', 'Gestion de la plomberie', '1:00:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_client_contratmaintenance_idcontrat_contratmaintenance` FOREIGN KEY (`contratmaintenance`) REFERENCES `contratmaintenance` (`idContrat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_client_idAgence_agence` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `FK_contratMaintenance_client_idclient_client` FOREIGN KEY (`client_idclient`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_contratMaintenance_idContrat_typeContrat` FOREIGN KEY (`idContrat_typeContrat`) REFERENCES `typecontrat` (`idContrat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controler`
--
ALTER TABLE `controler`
  ADD CONSTRAINT `FK_controler_idIntervention_intervention` FOREIGN KEY (`idIntervention`) REFERENCES `intervention` (`idIntervention`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_controler_idMateriel_materiel` FOREIGN KEY (`idMateriel`) REFERENCES `materiel` (`idMateriel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_employe_technicien_idtechnicien_technicien` FOREIGN KEY (`idtechnicien`) REFERENCES `technicien` (`idTechnicien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_intervention_idClient_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_intervention_idTechnicien_technicien` FOREIGN KEY (`idTechnicien`) REFERENCES `technicien` (`idTechnicien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_materiel_contratmaintenance_idcontrat_contratmaintenance` FOREIGN KEY (`contratmaintenance`) REFERENCES `contratmaintenance` (`idContrat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_materiel_idClient_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_materiel_idMateriel_typeMateriel` FOREIGN KEY (`idMateriel_typeMateriel`) REFERENCES `typemateriel` (`idMateriel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `FK_technicien_employe_idemploye_employe` FOREIGN KEY (`idemploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_technicien_idAgence_agence` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
