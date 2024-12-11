SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `gymdata`
--

-- --------------------------------------------------------

--
-- Structure de la table `activitesdata`
--

CREATE TABLE `activitesdata` (
  `ID` int NOT NULL,
  `Nom_activite` varchar(50) NOT NULL,
  `Description_activite` text NOT NULL,
  `Capacite_activite` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `Disponibilite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clientsdata`
--

CREATE TABLE `clientsdata` (
  `ID` int NOT NULL,
  `Nom_client` varchar(50) NOT NULL,
  `Prenom_client` varchar(50) NOT NULL,
  `Email_client` varchar(25) NOT NULL,
  `Telephone_client` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservationsdata`
--

CREATE TABLE `reservationsdata` (
  `ID` int NOT NULL,
  `ID_client` int DEFAULT NULL,
  `ID_activite` int DEFAULT NULL,
  `Date_reservation` datetime NOT NULL,
  `Statut` enum('Confirmée','Annulée') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activitesdata`
--
ALTER TABLE `activitesdata`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `clientsdata`
--
ALTER TABLE `clientsdata`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email_client` (`Email_client`);

--
-- Index pour la table `reservationsdata`
--
ALTER TABLE `reservationsdata`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_client` (`ID_client`),
  ADD KEY `fk_activite` (`ID_activite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activitesdata`
--
ALTER TABLE `activitesdata`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clientsdata`
--
ALTER TABLE `clientsdata`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservationsdata`
--
ALTER TABLE `reservationsdata`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservationsdata`
--
ALTER TABLE `reservationsdata`
  ADD CONSTRAINT `fk_activite` FOREIGN KEY (`ID_activite`) REFERENCES `activitesdata` (`ID`),
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`ID_client`) REFERENCES `clientsdata` (`ID`);
COMMIT;
