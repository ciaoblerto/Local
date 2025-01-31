<?php
include_once("database.php");
class UserRepository{
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllUsers(){
        $query = "SELECT user_id, name, email, role FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }    
}
?>