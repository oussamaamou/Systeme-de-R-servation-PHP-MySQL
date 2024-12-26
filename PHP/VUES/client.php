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

        $stmt->bind_param(':ID_client', $ID_client, PDO::PARAM_INT);
        $stmt->bind_param(':ID_activite', $ID_activite, PDO::PARAM_INT);
        $stmt->bind_param(':Date_reservation', $Date_reservation, PDO::PARAM_STR);
        $stmt->bind_param(':Status', $Status, PDO::PARAM_STR);


        return $stmt->execute();
    }


    
}


?>