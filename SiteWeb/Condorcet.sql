-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 21 mai 2018 à 22:29
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Condorcet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Alternatives`
--

CREATE TABLE `Alternatives` (
  `id` int(11) NOT NULL,
  `idVote` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Alternatives`
--

INSERT INTO `Alternatives` (`id`, `idVote`, `nom`) VALUES
(1, 3, 'Julien'),
(1, 4, 'Test1'),
(1, 5, 'Chocolas'),
(1, 7, 'Choix1'),
(2, 3, 'Estelle'),
(2, 4, 'Test2'),
(2, 5, 'Banane'),
(2, 7, 'Choix2'),
(3, 4, 'Test3'),
(3, 5, 'CordonBleu'),
(4, 4, 'Test4'),
(4, 5, 'Cuilliere');

-- --------------------------------------------------------

--
-- Structure de la table `ChoixPrives`
--

CREATE TABLE `ChoixPrives` (
  `idInscrit` int(11) NOT NULL,
  `idVote` int(11) NOT NULL,
  `idAlternative` int(11) NOT NULL,
  `rang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ChoixPrives`
--

INSERT INTO `ChoixPrives` (`idInscrit`, `idVote`, `idAlternative`, `rang`) VALUES
(8, 4, 3, 3),
(8, 4, 4, 1),
(9, 4, 3, 2),
(9, 4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ChoixPublics`
--

CREATE TABLE `ChoixPublics` (
  `idVotant` int(11) NOT NULL,
  `idVote` int(11) NOT NULL,
  `idAlternative` int(11) NOT NULL,
  `rang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ChoixPublics`
--

INSERT INTO `ChoixPublics` (`idVotant`, `idVote`, `idAlternative`, `rang`) VALUES
(1, 7, 1, 2),
(1, 7, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Inscrits`
--

CREATE TABLE `Inscrits` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `motDePasse` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Inscrits`
--

INSERT INTO `Inscrits` (`id`, `pseudo`, `email`, `motDePasse`) VALUES
(8, 'Julien', 'jdenize@free.fr', 'f30ecbf5b1cb85c631fdec0b39678550973cfcbc'),
(9, 'Estelle', 'estelle@free.fr', 'f30ecbf5b1cb85c631fdec0b39678550973cfcbc');

-- --------------------------------------------------------

--
-- Structure de la table `Resultats`
--

CREATE TABLE `Resultats` (
  `idVote` int(11) NOT NULL,
  `idAlternative` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Resultats`
--

INSERT INTO `Resultats` (`idVote`, `idAlternative`) VALUES
(3, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `VotantsPrives`
--

CREATE TABLE `VotantsPrives` (
  `idVote` int(11) NOT NULL,
  `idInscrit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Votes`
--

CREATE TABLE `Votes` (
  `id` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nbAlternatives` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `statut` varchar(10) NOT NULL,
  `idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Votes`
--

INSERT INTO `Votes` (`id`, `titre`, `description`, `type`, `nbAlternatives`, `dateDebut`, `dateFin`, `statut`, `idAdmin`) VALUES
(3, 'Test', 'Vote test', 'public', 2, '2222-02-22', '4444-04-04', 'ferme', 8),
(4, 'Test2', 'Test numéro 2', 'public', 4, '1111-02-02', '2222-02-22', 'ouvert', 8),
(5, 'Test3', 'TESTTTT', 'public', 4, '1111-11-11', '1111-11-11', 'ferme', 9),
(7, 'Test5', 'Nouveau test', 'prive', 2, '1111-11-11', '2222-02-22', 'ouvert', 9);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Alternatives`
--
ALTER TABLE `Alternatives`
  ADD PRIMARY KEY (`id`,`idVote`) USING BTREE,
  ADD KEY `Rvote5` (`idVote`);

--
-- Index pour la table `ChoixPrives`
--
ALTER TABLE `ChoixPrives`
  ADD PRIMARY KEY (`idInscrit`,`idVote`,`idAlternative`),
  ADD KEY `Ralternative` (`idAlternative`),
  ADD KEY `Rvote2` (`idVote`);

--
-- Index pour la table `ChoixPublics`
--
ALTER TABLE `ChoixPublics`
  ADD PRIMARY KEY (`idVotant`,`idVote`,`idAlternative`),
  ADD KEY `Ralternative2` (`idAlternative`),
  ADD KEY `Rvote3` (`idVote`);

--
-- Index pour la table `Inscrits`
--
ALTER TABLE `Inscrits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Resultats`
--
ALTER TABLE `Resultats`
  ADD PRIMARY KEY (`idVote`),
  ADD KEY `Ralternative4` (`idAlternative`);

--
-- Index pour la table `VotantsPrives`
--
ALTER TABLE `VotantsPrives`
  ADD PRIMARY KEY (`idVote`,`idInscrit`),
  ADD KEY `Rinscrit4` (`idInscrit`);

--
-- Index pour la table `Votes`
--
ALTER TABLE `Votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Rinscrit3` (`idAdmin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Inscrits`
--
ALTER TABLE `Inscrits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Votes`
--
ALTER TABLE `Votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Alternatives`
--
ALTER TABLE `Alternatives`
  ADD CONSTRAINT `Rvote5` FOREIGN KEY (`idVote`) REFERENCES `Votes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ChoixPrives`
--
ALTER TABLE `ChoixPrives`
  ADD CONSTRAINT `Ralternative` FOREIGN KEY (`idAlternative`) REFERENCES `Alternatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Rinscrit` FOREIGN KEY (`idInscrit`) REFERENCES `Inscrits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Rvote2` FOREIGN KEY (`idVote`) REFERENCES `Votes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ChoixPublics`
--
ALTER TABLE `ChoixPublics`
  ADD CONSTRAINT `Ralternative2` FOREIGN KEY (`idAlternative`) REFERENCES `Alternatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Rvote3` FOREIGN KEY (`idVote`) REFERENCES `Votes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Resultats`
--
ALTER TABLE `Resultats`
  ADD CONSTRAINT `Ralternative4` FOREIGN KEY (`idAlternative`) REFERENCES `Alternatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Rvote` FOREIGN KEY (`idVote`) REFERENCES `Votes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `VotantsPrives`
--
ALTER TABLE `VotantsPrives`
  ADD CONSTRAINT `Rinscrit4` FOREIGN KEY (`idInscrit`) REFERENCES `Inscrits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Rvote4` FOREIGN KEY (`idVote`) REFERENCES `Votes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Votes`
--
ALTER TABLE `Votes`
  ADD CONSTRAINT `Rinscrit3` FOREIGN KEY (`idAdmin`) REFERENCES `Inscrits` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;