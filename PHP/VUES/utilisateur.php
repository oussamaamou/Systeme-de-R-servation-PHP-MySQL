<?php 

   class Utilisateur {

        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }


        public function loginUtilisateur($username, $password){

            $sql = ("SELECT * FROM users WHERE Email_client = ?");
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            if($stmt->execute()){

                $result = $stmt->get_result();

                if($result->num_rows == 1){
                    $utilisateur = $result->fetch_assoc();
                    $tkemail = $utilisateur['Email_client'];
                    $tkpassword = $utilisateur['Mot_de_passe'];
                    $role = $utilisateur['Role'];
                    $ID = $utilisateur['ID'];

                    if($username === $tkemail && password_verify($password, $tkpassword)){
                        $_SESSION['ID'] = $ID;
        
                        if($role === 'Client'){
                            header("Location: /PHP/VUES/afficher_activite.php");
                            exit();
                        }
                        if($role === 'Admin'){
                            header("Location: /PHP/VUES/gestion.php");
                            exit();
                        }
                    }
                    else {
                        echo "Mot de passe incorrect.";
                    }

                }
                else {
                    echo "Email non trouvé.";
                }
                
            } 
            else {
                echo "Erreur lors de l'exécution de la requête.";
            }

            $stmt->close();

        }

    

   } 

?>