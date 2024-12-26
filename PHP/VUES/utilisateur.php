<?php 

   class Utilisateur {

        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        // function loginAccount($email, $password){
        //     global $conn;
        //     $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE Email = ?");
        //     $stmt->bind_param("s", $email);
            
        //     if($stmt->execute()){
        //         $result = $stmt->get_result();
                
        //         if($result->num_rows == 1){
        //             $user = $result->fetch_assoc();
        //             $tkemail = $user['Email'];
        //             $tkpassword = $user['Mot_de_passe'];
        //             $role = $user['Role'];
        //             $Nom = $user['Nom'];
        //             $ID = $user['ID'];
        
        //             if($email === $tkemail && password_verify($password, $tkpassword)){
        //                 $_SESSION['ID'] = $ID;
        //                 $_SESSION['Nom'] = $Nom;
        
        //                 if($role === 'Client'){
        //                     header("Location: ../php/client_dashboard.php");
        //                     exit();
        //                 }
        //                 if($role === 'Avocat'){
        //                     header("Location: ../php/avocat_dashboard.php");
        //                     exit();
        //                 }
        //             } else {
        //                 echo "Mot de passe incorrect.";
        //             }
        //         } else {
        //             echo "Email non trouvé.";
        //         }
        //     } else {
        //         echo "Erreur lors de l'exécution de la requête.";
        //     }
        
        //     $stmt->close();
        // }

        public function loginUtilisateur($username, $password){

            $sql = ("SELECT * FROM users WHERE Email_client = ?");
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);




        }

    

   } 

?>