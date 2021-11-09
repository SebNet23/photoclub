-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 nov. 2021 à 23:43
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `club_foto`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_arti` int(11) NOT NULL,
  `titre_arti` varchar(50) NOT NULL,
  `date_arti` date NOT NULL,
  `texte_arti` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_arti`, `titre_arti`, `date_arti`, `texte_arti`, `id_user`, `id_type`) VALUES
(1, 'Ferme de Limoges', '2021-03-10', 'Sortie à la ferme avec le club de photo ', 9, 3),
(2, 'Prairie', '2021-03-17', 'Sortie dans la prairie', 8, 2),
(4, 'Champ de culture', '2020-09-15', 'Les champs de culture autour de Limoges', 8, 1),
(3, 'Guéret', '2021-03-17', 'Sortie à la Guéret', 8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `titre_photo` varchar(50) NOT NULL,
  `texte_photo` varchar(50) NOT NULL,
  `id_arti` int(11) NOT NULL,
  `nom_photo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `titre_photo`, `texte_photo`, `id_arti`, `nom_photo`) VALUES
(1, 'Cheval', 'Un joli cheval qui fait la sieste ', 1, 'img/Galerie-BDD/cheval.jpg'),
(2, 'Vache', 'Une belle vache', 1, 'img/Galerie-BDD/vache.png'),
(3, 'Coquelicot', 'Il est beau le coquelicot', 2, 'img/Galerie-BDD/coquelicot.webp'),
(4, 'Blé', 'Du bon blé', 4, 'img/Galerie-BDD/blé.jpg'),
(5, 'Courtille', 'L\'étang de Courtille de Guéret', 3, 'img/Galerie-BDD/lac.jpeg'),
(10, 'Champ', 'Un beau champ plein de verdure', 4, 'img/Galerie-BDD/-150794_ci.jpg'),
(16, 'Test', 'Test', 2, 'img/Galerie-BDD/-Helianthus_annuus_0001.JPG'),
(17, 'Test', 'Test', 2, 'img/Galerie-BDD/-Helianthus_annuus_0001.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `nom_type`) VALUES
(1, 'Nature'),
(2, 'Fleurs'),
(3, 'Animaux'),
(4, 'Lacs');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `pdp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `pdp`) VALUES
(9, 'grosbg', 'bg@gmail.com', '$2y$10$rF7FMGBafsHnDNpFPBh58OYxOWFuc.9MHwZIZRS1vWq9rabc5MM/O', 'img/PDP/27.04.21-grosbg-coquelicot.webp'),
(8, 'user1', 'user1@gmail.com', '$2y$10$nLV0hvFjDqqnSO5x5Q36a.G6cW4dAOqcMYUBJLDVQJAIoUWshF6nO', 'img/PDP/28.04.21-user1-Helianthus_annuus_0001.JPG'),
(11, 'test1', 'test1', '$2y$10$EqLNcGK8VuR5LtwBRQ/y.O1h4MmvFLhNS0fTx9mQW.y4OCMwxbkNu', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_arti`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_arti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
