use gsb;
DELETE FROM `FraisForfait`;
DELETE FROM `Etat`;
DELETE FROM `Visiteur`;
DELETE FROM `FicheFrais`;
DELETE FROM `LigneFraisForfait`;
DELETE FROM `LigneFraisHorsForfait`;
DELETE FROM `Comptable`;
-- --------------------------------------------------------
--
-- Contenu de la table `FraisForfait`
--

INSERT INTO `FraisForfait` (`idFraisForfait`, `libelle`, `montant`) VALUES
(0, 'Forfait Etape', 110.00),
(1, 'Frais Kilométrique', 0.62),
(2, 'Nuitée Hôtel', 80.00),
(3, 'Repas Restaurant', 25.00);
-- --------------------------------------------------------
--
-- Contenu de la table `Etat`
--

INSERT INTO `Etat` (`idEtat`, `libelle`) VALUES
(0, 'Remboursée'),
(1, 'Saisie clôturée'),
(2, 'Fiche créée, saisie en cours'),
(3, 'Validée et mise en paiement');
-- --------------------------------------------------------

--
-- Contenu de la table `Visiteur`
--

INSERT INTO `Visiteur` (`idVisiteur`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES
(0, 'Villechalane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21'),
(1, 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23'),
(2, 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12'),
(3, 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01'),
(4, 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09'),
(5, 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11'),
(6, 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21'),
(7, 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05'),
(8, 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12'),
(9, 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23'),
(10, 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12'),
(11, 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11'),
(12, 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18'),
(13, 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11'),
(14, 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17'),
(15, 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12'),
(16, 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05'),
(17, 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01'),
(18, 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10'),
(19, 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01'),
(20, 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01'),
(21, 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10'),
(22, 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01'),
(23, 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '1985-11-01');
-- --------------------------------------------------------

--
-- Contenu de la table `Comptable`
--

INSERT INTO `Comptable` (`idComptable`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES
(0,'COMPTABLE1','Comptable1','comp1','1234','','','','1995-09-01'),
(1,'COMPTABLE2','Comptable2','comp2','1234','','','','1994-10-08'),
(2,'COMPTABLE3','Comptable3','comp3','1234','','','','1995-05-02'),
(3,'COMPTABLE4','Comptable4','comp4','1234','','','','1997-12-28');
-- --------------------------------------------------------

--
-- Contenu de la table `FicheFrais`
--

INSERT INTO `FicheFrais` (`idFicheFrais`,`idVisiteur`,`mois`,`nbJustificatifs`,`montantValide`,`idEtat`,`idComptable`) VALUES
(0,1,'2022-10',0,0,2,1),
(1,5,'2022-10',0,0,2,1),
(2,3,'2022-10',0,0,2,1),
(3,1,'2022-09',0,0,2,1);
-- --------------------------------------------------------

--
-- Contenu de la table `LigneFraisForfait`
--

INSERT INTO `LigneFraisForfait` (`idLigneFraisForfait`,`idFicheFrais`,`idFraisForfait`,`quantite`) VALUES
(0,1,0,3),
(1,1,1,18),
(2,1,2,18),
(3,2,3,2),
(4,2,1,2),
(5,2,0,2);

INSERT INTO `LigneFraisHorsForfait` (`idLigneFraisHorsForfait`,`idFicheFrais`,`libelle`,`montant`) VALUES
(0,1,'TEST1',25),
(1,1,'TEST2',36),
(2,1,'TEST3',15),
(3,2,'TEST4',2),
(4,2,'TEST5',2),
(5,2,'TEST6',2);