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
)

--
-- Déchargement des données de la table `activitesdata`
--

INSERT INTO `activitesdata` (`ID`, `Nom_activite`, `Description_activite`, `Capacite_activite`, `date_debut`, `date_fin`, `Disponibilite`) VALUES
(1, 'Yoga Class', 'Une séance guidée combinant des postures, de la respiration et de la pleine conscience pour améliorer la flexibilité, la force et la relaxation.', 12, '2024-12-16', '2024-12-17', 1),
(2, 'Strength Training', 'Utilise des poids libres ou des machines pour développer la masse musculaire et la force, en ciblant différents groupes musculaires.', 22, '2024-12-15', '2024-12-18', 1),
(4, 'Treadmill Running', 'Un exercice cardiovasculaire qui améliore l\endurance et brûle des calories, avec une vitesse et une inclinaison ajustables pour varier l\intensité.', 20, '2024-12-24', '2024-12-25', 0),
(5, 'Rowing Machine', 'Un entraînement complet du corps qui améliore l\endurance, développe les muscles et brûle des calories, en ciblant les bras, les jambes et le tronc avec une résistance ajustable.', 28, '2024-12-19', '2024-12-21', 1);

-- --------------------------------------------------------

--
-- Modification des données de la table `activitesdata`
--

UPDATE activitesdata
SET Capacite_activite = 20
WHERE ID = 4;


--
-- Suppression des données de la table `activitesdata`
--

DELETE FROM activitesdata
WHERE ID = 3;

-- -------------------------------------------------------

--
-- Structure de la table `clientsdata`
--

CREATE TABLE `clientsdata` (
  `ID` int NOT NULL,
  `Nom_client` varchar(50) NOT NULL,
  `Prenom_client` varchar(50) NOT NULL,
  `Email_client` varchar(25) NOT NULL,
  `Telephone_client` varchar(10) NOT NULL
)

--
-- Déchargement des données de la table `clientsdata`
--

INSERT INTO `clientsdata` (`ID`, `Nom_client`, `Prenom_client`, `Email_client`, `Telephone_client`) VALUES
(1, 'Rachad', 'Ahmed', 'rachad@gmail.com', '0658749562'),
(2, 'Ali', 'Mohamed', 'mohamed@gmail.com', '0615239486'),
(4, 'Houssam', 'Morad', 'houssam@gmail.com', '0620369874');

-- --------------------------------------------------------

--
-- Modification des données de la table `clientsdata`
--

UPDATE clientsdata
SET Email_client = "mohamed@gmail.com"
WHERE ID = 2;


--
-- Suppression des données de la table `clientsdata`
--

DELETE FROM clientsdata
WHERE ID = 5;


-- ---------------------------------------------------------

--
-- Structure de la table `reservationsdata`
--

CREATE TABLE `reservationsdata` (
  `ID` int NOT NULL,
  `ID_client` int DEFAULT NULL,
  `ID_activite` int DEFAULT NULL,
  `Date_reservation` datetime NOT NULL,
  `Statut` enum('Confirmée','Annulée') NOT NULL
) 

--
-- Déchargement des données de la table `reservationsdata`
--

INSERT INTO `reservationsdata` (`ID`, `ID_client`, `ID_activite`, `Date_reservation`, `Statut`) VALUES
(1, 1, 4, '2024-12-13 10:00:00', 'Confirmée'),
(2, 4, 2, '2024-12-15 11:30:00', 'Annulée'),
(3, 2, 5, '2024-12-14 15:30:00', 'Confirmée');

-- ---------------------------------------------------------

--
-- Modification des données de la table `reservationsdata`
--

UPDATE reservationsdata
SET ID_activite = 5
WHERE ID = 3;


--
-- Suppression des données de la table `reservationsdata`
--

DELETE FROM reservationsdata
WHERE ID = 4;



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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clientsdata`
--
ALTER TABLE `clientsdata`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservationsdata`
--
ALTER TABLE `reservationsdata`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

