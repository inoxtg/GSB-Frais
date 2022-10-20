SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
drop database if exists gsb;
create database gsb;

use gsb;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gsbFrais`
--

-- --------------------------------------------------------

--
-- Structure de la table `FraisForfait`
--

CREATE TABLE IF NOT EXISTS `FraisForfait` (
  `idFraisForfait` int NOT NULL auto_increment,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,                                    
  PRIMARY KEY (`idFraisForfait`)
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE IF NOT EXISTS `Etat` (
  `idEtat` int NOT NULL auto_increment,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `Visiteur`
--

CREATE TABLE IF NOT EXISTS `Visiteur` (
  `idVisiteur` int NOT NULL auto_increment,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30)  DEFAULT NULL, 
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`idVisiteur`)
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `Comptable`
--

CREATE TABLE IF NOT EXISTS `Comptable` (
  `idComptable` int NOT NULL auto_increment,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30)  DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`idComptable`)
) ENGINE=InnoDB;


-- --------------------------------------------------------
--
-- Structure de la table `FicheFrais`
--

CREATE TABLE IF NOT EXISTS `FicheFrais` (
  `idFicheFrais` int not null auto_increment,
  `idVisiteur` int NOT NULL,
  `mois` varchar(7) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` int not null default 0,
  `idComptable` int not null default 0,
  PRIMARY KEY (`idFicheFrais`),
  FOREIGN KEY (`idEtat`) REFERENCES Etat(`idEtat`),
  FOREIGN KEY (`idVisiteur`) REFERENCES Visiteur(`idVisiteur`),
  FOREIGN KEY (`idComptable`) REFERENCES Comptable(`idComptable`)
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table `LigneFraisForfait`
--

CREATE TABLE IF NOT EXISTS `LigneFraisForfait` (
  `idLigneFraisForfait` int not null auto_increment,
  `idFicheFrais` int not null,
  `idFraisForfait` int NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLigneFraisForfait`),
  FOREIGN KEY (`idFicheFrais`) REFERENCES FicheFrais(`idFicheFrais`),
  FOREIGN KEY (`idFraisForfait`) REFERENCES FraisForfait(`idFraisForfait`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `LigneFraisHorsForfait`
--

CREATE TABLE IF NOT EXISTS `LigneFraisHorsForfait` (
  `idLigneFraisHorsForfait` int NOT NULL auto_increment,
  `idFicheFrais` int not null,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idLigneFraisHorsForfait`),
  FOREIGN KEY (`idFicheFrais`) REFERENCES FicheFrais(`idFicheFrais`)
) ENGINE=InnoDB;

-- --------------------------------------------------------
