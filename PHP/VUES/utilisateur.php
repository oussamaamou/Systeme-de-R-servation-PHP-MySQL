<?php 

   class Utilisateur {

        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }


        public function loginUtilisateur($username, $password) {
            $sql = "SELECT * FROM users WHERE Username = :username"; 
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        
            if($stmt->execute()){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($result) {
                    $tkusername = $result['Username'];
                    $tkpassword = $result['Mot_de_passe']; 
                    $role = $result['Role'];
                    $ID = $result['ID'];
        
                    if($username === $tkusername && password_verify($password, $tkpassword)){
                        $_SESSION['ID'] = $ID;
        
                        if($role === 'Client'){
                            header("Location: ../VUES/afficher_activite.php");
                            exit();
                        }
                        if($role === 'Admin'){
                            header("Location: ../VUES/gestion.php");
                            exit();
                        }
                    } else {
                        echo "Mot de passe incorrect.";
                    }
                } else {
                    echo "Username non trouvé.";
                }
            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
        
            $stmt->close();
        }
        
        

    

   } 

?>