<?php

abstract class AbstractManager {
    protected $db;
    protected $conn;

    public function __construct(Database $db) {
        $this->db = $db;
        $this->conn = $db->getConnection();
    }

    protected function executeQuery($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            throw new Exception("Erreur d'exécution : " . $e->getMessage());
        }
    }
}
class UserManager extends AbstractManager {
    public function getAllUsers() {
        return $this->executeQuery("SELECT * FROM users")->fetchAll();
    }

    public function getUserById($id) {
        return $this->executeQuery(
            "SELECT * FROM users WHERE ID = ?", 
            [$id]
        )->fetch();
    }

    public function addUser($nom, $prenom, $email, $telephone, $password, $username, $role = 'Client') {
        return $this->executeQuery(
            "INSERT INTO users (Nom_client, Prenom_client, Email_client, Telephone_client, Mot_de_passe, Username, Role) 
             VALUES (?, ?, ?, ?, ?, ?, ?)",
            [$nom, $prenom, $email, $telephone, $password, $username, $role]
        );
    }

    public function updateUser($id, $nom, $prenom, $email, $telephone) {
        return $this->executeQuery(
            "UPDATE users SET Nom_client = ?, Prenom_client = ?, Email_client = ?, Telephone_client = ? WHERE ID = ?",
            [$nom, $prenom, $email, $telephone, $id]
        );
    }

    public function deleteUser($id) {
        return $this->executeQuery(
            "DELETE FROM users WHERE ID = ?", 
            [$id]
        );
    }

    public function login($username, $password) {
        $user = $this->executeQuery(
            "SELECT * FROM users WHERE Username = ? AND Mot_de_passe = ?",
            [$username, $password]
        )->fetch();
        
        return $user;
    }
}

class ActivityManager extends AbstractManager {
    public function getAllActivities() {
        return $this->executeQuery(
            "SELECT * FROM activitesdata"
        )->fetchAll();
    }

    public function getActivityById($id) {
        return $this->executeQuery(
            "SELECT * FROM activitesdata WHERE ID = ?", 
            [$id]
        )->fetch();
    }

    public function addActivity($nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite) {
        return $this->executeQuery(
            "INSERT INTO activitesdata (Nom_activite, Description_activite, Capacite_activite, date_debut, date_fin, Disponibilite) 
             VALUES (?, ?, ?, ?, ?, ?)",
            [$nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite]
        );
    }

    public function updateActivity($id, $nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite) {
        return $this->executeQuery(
            "UPDATE activitesdata SET Nom_activite = ?, Description_activite = ?, Capacite_activite = ?, 
             date_debut = ?, date_fin = ?, Disponibilite = ? WHERE ID = ?",
            [$nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite, $id]
        );
    }

    public function deleteActivity($id) {
        return $this->executeQuery(
            "DELETE FROM activitesdata WHERE ID = ?", 
            [$id]
        );
    }
}

class ReservationManager extends AbstractManager {
    public function getAllReservations() {
        return $this->executeQuery(
            "SELECT r.*, u.Nom_client, u.Prenom_client, a.Nom_activite 
             FROM reservationsdata r 
             JOIN users u ON r.ID_client = u.ID 
             JOIN activitesdata a ON r.ID_activite = a.ID"
        )->fetchAll();
    }

    public function addReservation($idClient, $idActivite, $dateReservation) {
        return $this->executeQuery(
            "INSERT INTO reservationsdata (ID_client, ID_activite, Date_reservation) VALUES (?, ?, ?)",
            [$idClient, $idActivite, $dateReservation]
        );
    }

    public function updateReservationStatus($id, $status) {
        return $this->executeQuery(
            "UPDATE reservationsdata SET status = ? WHERE ID = ?",
            [$status, $id]
        );
    }

    public function deleteReservation($id) {
        return $this->executeQuery(
            "DELETE FROM reservationsdata WHERE ID = ?", 
            [$id]
        );
    }
}


?>