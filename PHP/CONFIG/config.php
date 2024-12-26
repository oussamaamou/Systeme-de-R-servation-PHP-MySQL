<?php
class DataBase {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "gym";
    private $conn;


    public function __construct() {
        try {
            $this->conn = new PDO ("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}
?>
