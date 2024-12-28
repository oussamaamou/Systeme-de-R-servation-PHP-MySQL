<?php 
include 'utilisateur.php';

class Client {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }



    public function addClient($nom, $prenom, $email, $telephone, $mot_de_passe, $username, $role){

        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $sql = ("INSERT INTO users (Nom_client, Prenom_client, Email_client, Telephone_client, Mot_de_passe, Username, Role) VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe, :username, :role)");
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);


        return $stmt->execute();
    }
    


    public function addReservation($ID_client, $ID_activite, $Date_reservation, $Status ){

        $sql = ("INSERT INTO reservationsdata (ID_client, ID_activite, Date_reservation, Status) VALUES (:ID_client, :ID_activite, :Date_reservation, :Status)");
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':ID_client', $ID_client, PDO::PARAM_INT);
        $stmt->bindParam(':ID_activite', $ID_activite, PDO::PARAM_INT);
        $stmt->bindParam(':Date_reservation', $Date_reservation, PDO::PARAM_STR);
        $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);


        return $stmt->execute();
    }


    public function annulerreservation($ID){

        $sql = ("DELETE FROM reservationsdata WHERE ID = :ID");
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);

        return $stmt->execute();
    }

    function getAllReservations() {

        $clientID = $_SESSION['ID'];

        $sql = ("SELECT r.ID, u.Nom_client AS client_name, a.Nom_activite AS activity_name, r.Date_reservation, r.status
                FROM reservationsdata r
                JOIN users u ON r.ID_client = u.ID
                JOIN activitesdata a ON r.ID_activite = a.ID
                WHERE r.ID_client = :clientID"); 

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':clientID', $clientID, PDO::PARAM_INT); 
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    function getAllClientReservations(){
        
        $sql = ("SELECT r.ID, u.Nom_client AS client_name, a.Nom_activite AS activity_name, r.Date_reservation, r.status
                FROM reservationsdata r
                JOIN users u ON r.ID_client = u.ID
                JOIN activitesdata a ON r.ID_activite = a.ID");
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function loginClient($username, $password){

        $utilisateur = new Utilisateur($this->conn);
        $utilisateur->loginUtilisateur($username, $password);
    }
    
}


?>