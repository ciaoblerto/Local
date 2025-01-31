<?php
class User {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $surname, $email, $password,$gender) {
        $query = "INSERT INTO {$this->table_name} (name, surname, email, password,gender) VALUES (:name, :surname, :email, :password,:gender)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Hashing the password
        $stmt->bindParam(':gender', $gender);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function login($email, $password) {
        $query = "SELECT user_id, name, surname, email, password, gender FROM {$this->table_name} WHERE email = :email";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() == 0) {
            return false;
        }
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!password_verify($password, $row['password'])) {
            return false;
        }
    
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
    
        return true;
    }    
}
?>