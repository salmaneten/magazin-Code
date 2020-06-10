-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 avr. 2020 à 01:18
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magazin_code`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'hommes'),
(2, 'femmes'),
(3, 'enfants'),
(4, 'accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(100) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `category`) VALUES
(1, 'polaire', 'Polaire De Randonnée Montagne Homme MH100 Turquoise', 159, 'H-1.jpg', 1),
(2, 'sport chaussures', 'CHAUSSURE JOGGING RUN SUPPORT BREATHE HOMME VERT', 385, 'H-2.jpg', 1),
(3, 'sweat-capuche', 'Sweat 900 Capuche Gym Stretching Homme Gris Clair', 284, 'H-3.jpg', 1),
(4, 'short', 'Short Randonnée Nature NH500 Gris Homme\r\n', 125, 'H-4.jpg', 1),
(5, 'T-shirt', 'T-Shirt 520 Slim Col V Gym & Pilates Homme Bleu ', 40, 'H-5.jpg', 1),
(6, 'sport chaussures', 'Chaussures De Randonnée Nature - NH500 - Femme', 356, 'F-1.jpg', 2),
(7, 'polaire', 'Polaire De Randonnée Montagne Femme MH100 Bleu Gris', 199, 'F-2.jpg', 2),
(8, 'short', 'Short De Football Femme F500 Rouge', 117, 'F-3.jpg', 2),
(9, 'sweat-capuche', 'Sweat De Randonnée Nature - NH100 Hybride - Femme', 399, 'F-4.jpg', 2),
(10, 'T-shirt', 'T-Shirt Sport 100% Coton Pilates Gym Douce Femme Rose', 99, 'F-5.jpg', 2),
(11, 'Maillot Basket', 'MAILLOT DE BASKETBALL POUR GARCON/FILLE DEBUTANT(E) BLEU T100', 110, 'E-1.jpg', 3),
(12, 'capuche', 'Sweat Capuche Chaud, Synthétique Respirant S500 Garçon GYM ENFANT', 245, 'E-2.jpg', 3),
(13, 'chaussures', 'CHAUSSURES DE BASKETBALL POUR GARCON/FILLE CONFIRME(E) NAVY SS500H', 289, 'E-3.jpg', 3),
(14, 'survetement', 'Survetement Chaud 100 Garçon GYM ENFANT', 189, 'E-4.jpg', 3),
(15, 'T-shirt', 'T-Shirt Sport 100% Coton Pilates Gym Douce garçon', 75, 'E-5.jpg', 3),
(16, 'camera', 'Caméra Sportive G-EYE 900 4K Et FULL HD Avec Écran Tactile', 500, 'A-1.jpg', 4),
(17, 'ecouteurs', 'Ecouteurs Sport Intra-Auriculaires ONEAR HOOK 2 Gris & Bleu', 69, 'A-2.jpg', 4),
(18, 'Montre', 'Montre Chronomètre De Course À Pied W500 M Noire Écran Reverse', 170, 'A-3.jpg', 4),
(19, 'sac a dos', 'Sac À Dos De Randonnée Nature - NH100 10 Litres', 79, 'A-4.jpg', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
