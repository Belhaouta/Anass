-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Juin 2017 à 12:34
-- Version du serveur :  5.6.21
-- Version de PHP :  5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
`id_admin` int(11) NOT NULL,
  `Nom_admin` varchar(20) NOT NULL,
  `Prenom_admin` varchar(20) NOT NULL,
  `Email_admin` varchar(40) NOT NULL,
  `Password_admin` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `Nom_admin`, `Prenom_admin`, `Email_admin`, `Password_admin`) VALUES
(1, 'belhaouta', 'anass', 'belhaouta.anass@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE IF NOT EXISTS `chauffeur` (
`id_chauffeur` int(3) NOT NULL,
  `Nom_chauffeur` varchar(30) NOT NULL,
  `Prenom_chauffeur` varchar(30) NOT NULL,
  `Tel_chauffeur` int(10) NOT NULL,
  `Num_licence` varchar(20) NOT NULL,
  `Email_chauffeur` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chauffeur`
--

INSERT INTO `chauffeur` (`id_chauffeur`, `Nom_chauffeur`, `Prenom_chauffeur`, `Tel_chauffeur`, `Num_licence`, `Email_chauffeur`) VALUES
(1, 'Toto', 'Anass', 661816956, '123456xyz', 'toto@gmail.com'),
(2, 'ahmed', 'coco', 695429786, '123456aazer', 'ahmed@gmail.com'),
(3, 'abdelghani', 'nono', 695429786, '114755egdh', 'louchiniabdelghani@h');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id_client` int(11) NOT NULL,
  `Nom_client` varchar(20) NOT NULL,
  `Prenom_client` varchar(20) NOT NULL,
  `Email_client` varchar(40) NOT NULL,
  `Tel_client` int(12) NOT NULL,
  `Categ` varchar(20) NOT NULL,
  `Adresse_client` varchar(50) NOT NULL,
  `Password_client` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `Nom_client`, `Prenom_client`, `Email_client`, `Tel_client`, `Categ`, `Adresse_client`, `Password_client`) VALUES
(1, 'belhaouta', 'anass', 'belhaouta.anass@gmail.com', 661816956, 'entreprise', 'cite scientifique residence galois batim E num 404', '123456'),
(6, 'toto', 'winners', 'toto@gmail.com', 661816956, 'particulier', 'residence galois', '123456'),
(8, 'abdelghani', 'louchini', 'louchiniabdelghani@hotmail.fr', 661816956, 'particulier', 'residence galois', '123456'),
(9, 'eddami', 'fouad', 'eddami.fouad@gmail.com', 661816956, 'particulier', 'residence galois', '123456'),
(10, 'coco', 'Adil', 'Adil@gmail.om', 661816956, 'particulier', 'residence galois', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`id_course` int(3) NOT NULL,
  `id_vehicule` int(3) DEFAULT NULL,
  `Depart_course` varchar(100) NOT NULL,
  `Arrive_course` varchar(100) NOT NULL,
  `Date_course` date NOT NULL,
  `id_heure` int(2) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `course`
--

INSERT INTO `course` (`id_course`, `id_vehicule`, `Depart_course`, `Arrive_course`, `Date_course`, `id_heure`, `Status`) VALUES
(2, 2, 'lille', 'Paris', '2017-06-06', 5, 'pro'),
(3, 3, 'Lille', 'Roubaix', '2017-06-06', 5, 'simple'),
(48, 4, 'Rue de Dunkerque, Paris, France', 'Rue de Rivoli, Paris, France', '2017-06-04', 1, 'simple');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE IF NOT EXISTS `horaire` (
  `CodeHoraire` int(2) NOT NULL,
  `tranche2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `horaire`
--

INSERT INTO `horaire` (`CodeHoraire`, `tranche2`) VALUES
(0, ''),
(1, '8'),
(2, '9'),
(3, '10'),
(4, '11'),
(5, '12'),
(6, '13'),
(7, '14'),
(8, '15'),
(9, '16'),
(10, '17'),
(11, '18'),
(12, '19'),
(13, '20'),
(14, '21'),
(15, '22');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`id_reservation` int(3) NOT NULL,
  `id_client` int(3) NOT NULL,
  `id_course` int(3) NOT NULL,
  `Date_reservation` date NOT NULL,
  `Nb_place` int(3) NOT NULL,
  `Prix` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
`id_vehicule` int(3) NOT NULL,
  `id_chauffeur` int(3) DEFAULT NULL,
  `Marque_vehicule` varchar(100) NOT NULL,
  `Type_vehicule` varchar(100) NOT NULL,
  `Num_matricule` varchar(30) NOT NULL,
  `Nbmax_place` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `id_chauffeur`, `Marque_vehicule`, `Type_vehicule`, `Num_matricule`, `Nbmax_place`) VALUES
(1, 1, 'Renault', 'vtc', '12345678', 1),
(2, 1, 'Ford', 'voiture', '147258369', 4),
(3, 1, 'Fiat', 'minibus', '159357258', 8),
(4, 1, 'Isuzi', 'Autocar', '951753789', 30),
(6, NULL, 'renault', 'voiture', '123456sssaz', 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
 ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
 ADD PRIMARY KEY (`id_chauffeur`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`id_course`), ADD KEY `id_vehicule` (`id_vehicule`), ADD KEY `id_heure` (`id_heure`), ADD KEY `id_heure_2` (`id_heure`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
 ADD PRIMARY KEY (`CodeHoraire`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`id_reservation`), ADD KEY `id_course` (`id_course`), ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
 ADD PRIMARY KEY (`id_vehicule`), ADD KEY `id_chauffeur` (`id_chauffeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
MODIFY `id_chauffeur` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
MODIFY `id_course` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
MODIFY `id_reservation` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
MODIFY `id_vehicule` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`),
ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`id_heure`) REFERENCES `horaire` (`CodeHoraire`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeur` (`id_chauffeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
