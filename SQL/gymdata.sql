-- Table users
CREATE TABLE users (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom_client VARCHAR(50) NOT NULL,
    Prenom_client VARCHAR(50) NOT NULL,
    Email_client VARCHAR(50) NOT NULL,
    Telephone_client VARCHAR(15) NOT NULL,
    Mot_de_passe VARCHAR(15) NOT NULL,
    Username VARCHAR(15) NOT NULL,
    Role ENUM ('Client','Admin') DEFAULT 'Client'
);

-- Table activités
CREATE TABLE activitesdata (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom_activite VARCHAR(50) NOT NULL,
    Description_activite TEXT,
    Capacite_activite INT(11) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    Disponibilite TINYINT(1) DEFAULT 1
);

-- Table réservations
CREATE TABLE reservationsdata (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_client INT NOT NULL,
    ID_activite INT NOT NULL,
    Date_reservation DATETIME NOT NULL,
    status ENUM('Confirmée', 'Annulée') DEFAULT 'Confirmée',
    FOREIGN KEY (ID_client) REFERENCES users(ID)
    			ON DELETE CASCADE
    			ON UPDATE CASCADE,
    FOREIGN KEY (ID_activite) REFERENCES activitesdata(ID)
			    ON DELETE CASCADE
    			ON UPDATE CASCADE
);

-- Insertion d'un utilisateur
INSERT INTO users (Nom_client, Prenom_client, Email_client, Telephone_client, Mot_de_passe, Username, Role)
VALUES ('Doe', 'John', 'john.doe@example.com', '0612345678', 'password123', 'johndoe', 'Client');

-- Insertion d'une activité
INSERT INTO activitesdata (Nom_activite, Description_activite, Capacite_activite, date_debut, date_fin, Disponibilite)
VALUES ('Randonnée en montagne', 'Une randonnée relaxante en pleine nature.', 20, '2024-12-30', '2024-12-31', 1);


-- Mise à jour du numéro de téléphone de l'utilisateur ayant l'ID 1
UPDATE users
SET Telephone_client = '0698765432'
WHERE ID = 1;

-- Mise à jour de la capacité d'une activité ayant l'ID 1
UPDATE activitesdata
SET Capacite_activite = 25
WHERE ID = 1;


-- Suppression d'un utilisateur ayant l'ID 1
DELETE FROM users
WHERE ID = 1;

-- Suppression d'une activité ayant l'ID 1
DELETE FROM activitesdata
WHERE ID = 1;


-- Combien de réservations ont été confirmées dans le système ?
SELECT COUNT(*) AS total_reservations_confirmees
FROM reservationsdata
WHERE status = 'Confirmée';


-- Quelle est la capacité moyenne des activités proposées ?
SELECT AVG(Capacite_activite) AS capacite_moyenne
FROM activitesdata;


-- Combien de membres distincts ont effectué au moins une réservation ?
SELECT COUNT(DISTINCT ID_client) AS membres_ayant_reserve
FROM reservationsdata;


-- Quelles sont les trois activités les plus réservées ?
SELECT 
    a.Nom_activite,
    COUNT(r.ID) AS nombre_reservations
FROM activitesdata a
JOIN reservationsdata r ON a.ID = r.ID_activite
GROUP BY r.ID_activite
ORDER BY nombre_reservations DESC
LIMIT 3;


-- Quel est le pourcentage des réservations annulées par rapport au total des réservations ?
SELECT 
    (COUNT(CASE WHEN status = 'Annulée' THEN 1 END) * 100.0 / COUNT(*)) AS pourcentage_reservations_annulees
FROM reservationsdata;