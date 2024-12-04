-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 03 déc. 2024 à 08:51
-- Version du serveur : 10.11.8-MariaDB-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `thedistrict`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `image`, `active`) VALUES
(4, 'Pizza', 'pizza_cat.jpg', 'Yes'),
(5, 'Burger', 'burger_cat.jpg', 'Yes'),
(9, 'Wraps', 'wrap_cat.jpg', 'Yes'),
(10, 'Pasta', 'pasta_cat.jpg', 'Yes'),
(11, 'Sandwich', 'sandwich_cat.jpg', 'Yes'),
(12, 'Asian Food', 'asian_food_cat.jpg', 'No'),
(13, 'Salade', 'salade_cat.jpg', 'Yes'),
(14, 'Veggie', 'veggie_cat.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat` varchar(50) NOT NULL,
  `nom_client` varchar(150) NOT NULL,
  `telephone_client` varchar(20) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `adresse_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`) VALUES
(7, 10, 2, 16.00, '2021-07-20 06:40:21', 'En cours de livraison', 'Claudia Hedley', '7451114400', 'hedley@gmail.com', '1119 Kinney Street'),
(8, 14, 1, 14.00, '2021-07-20 06:40:57', 'En préparation', 'Vernon Vargas', '7414744440', 'venno@gmail.com', '1234 Hazelwood Avenue'),
(9, 9, 4, 20.00, '2021-07-20 07:06:06', 'Annulée', 'Carlos Grayson', '7401456980', 'carlos@gmail.com', '2969 Hartland Avenue');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) VALUES
(4, 'District Burger', 'Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .', 8.00, 'hamburger.jpg', 5, 'Yes'),
(5, 'Pizza Bianca', 'Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.', 15.40, 'pizza-salmon.png', 4, 'Yes'),
(9, 'Buffalo Chicken Wrap', 'Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.', 5.00, 'buffalo-chicken.webp', 9, 'Yes'),
(10, 'Cheeseburger', 'Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.', 8.00, 'cheesburger.jpg', 5, 'Yes'),
(12, 'Spaghetti aux légumes', 'Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide', 10.00, 'spaghetti-legumes.jpg', 10, 'Yes'),
(13, 'Salade César', 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.', 7.00, 'cesar_salad.jpg', 13, 'Yes'),
(14, 'Pizza Margherita', 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...', 15.40, 'pizza-margherita.jpg', 4, 'Yes'),
(15, 'Courgettes farcies au quinoa', 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!', 8.00, 'courgettes_farcies.jpg', 14, 'Yes'),
(16, 'Lasagnes', 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.\n\n', 12.00, 'lasagnes_viande.jpg\n', 10, 'Yes'),
(17, 'Tagliatelles au saumon', 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!  \n\n', 12.00, 'tagliatelles_saumon.webp\n', 10, 'Yes'),
(18, 'Sandwich Fondant', 'Délicieux sandwich avec son délicieux cheddar fondu et son pain gratiné! Idéal pour les gourmands!', 5.00, 'Food-Name-3631.jpg', 11, 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom_prenom`, `email`, `password`) VALUES
(1, 'test', 'test@test.fr', 'bibi523'),
(2, 'Mila Twix', 'laetitia.dupont.80440@gmail.com', 'test'),
(3, 'Ryan', 'ryanair@grimberlito.fr', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'Tina Goblet', 'tinadominatrix@afpa.fr', 'fadf17141f3f9c3389d10d09db99f757');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plat` (`id_plat`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
