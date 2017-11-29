-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Mai 2017 à 00:20
-- Version du serveur :  5.6.21
-- Version de PHP :  5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `safarcom`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
`id_admin` int(11) NOT NULL,
  `Nom_admin` varchar(20) NOT NULL,
  `Prenom_admin` varchar(20) NOT NULL,
  `Email_admin` varchar(20) NOT NULL,
  `Password_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE IF NOT EXISTS `chauffeur` (
`id_chauffeur` int(3) NOT NULL,
  `Nom_chauffeur` varchar(30) NOT NULL,
  `Prenom_chauffeur` varchar(30) NOT NULL,
  `Tel_chauffeur` int(10) NOT NULL,
  `Num_licence` int(20) NOT NULL,
  `Email_chauffeur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id_client` int(11) NOT NULL,
  `Nom_client` varchar(20) NOT NULL,
  `Prenom_client` varchar(20) NOT NULL,
  `Email_client` varchar(40) NOT NULL,
  `Tel_client` int(30) NOT NULL,
  `Categ` varchar(20) NOT NULL,
  `Adresse_client` varchar(50) NOT NULL,
  `Date_naissance_client` date NOT NULL,
  `Password_client` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `Nom_client`, `Prenom_client`, `Email_client`, `Tel_client`, `Categ`, `Adresse_client`, `Date_naissance_client`, `Password_client`) VALUES
(1, 'belhaouta', 'anass', 'belhaouta.anass@gmail.com', 769738873, 'Particulier', 'cite scientifique residence galois batim E num 404', '1995-06-12', '123456'),
(6, 'toto', 'winners', 'toto@gmail.com', 661816956, 'particulier', 'residence galois', '1995-06-12', '123456'),
(8, 'abdelghani', 'louchini', 'louchiniabdelghani@hotmail.fr', 661816956, 'particulier', 'residence galois', '1992-08-07', '123456'),
(9, 'eddami', 'fouad', 'eddami.fouad@gmail.com', 661816956, 'particulier', 'residence galois', '1992-08-07', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`id_course` int(3) NOT NULL,
  `id_vehicule` int(3) NOT NULL,
  `Depart_course` varchar(100) NOT NULL,
  `Arrive_course` varchar(100) NOT NULL,
  `Date_course` date NOT NULL,
  `Status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`id_reservation` int(3) NOT NULL,
  `id_client` int(3) NOT NULL,
  `id_course` int(3) NOT NULL,
  `Date_reservation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
`id_vehicule` int(3) NOT NULL,
  `id_chauffeur` int(3) NOT NULL,
  `Marque_vehicule` varchar(100) NOT NULL,
  `Type_vehicule` varchar(100) NOT NULL,
  `Num_matricule` int(30) NOT NULL,
  `Nbmax_place` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`id_course`), ADD KEY `id_vehicule` (`id_vehicule`);

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
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
MODIFY `id_chauffeur` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
MODIFY `id_course` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
MODIFY `id_reservation` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
MODIFY `id_vehicule` int(3) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

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
