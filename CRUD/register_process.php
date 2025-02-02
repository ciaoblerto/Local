<?php
session_start();
require_once 'database.php';
require_once '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $surname = isset($_POST['surname']) ? trim($_POST['surname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($gender)) {
        echo "All fields are required!";
        exit;
    }

    // Determine role based on email domain
    if (strpos($email, '@gmail.com') !== false) {
        $role = 'admin';
    } elseif (strpos($email, '@ubt-uni.net') !== false) {
        $role = 'user';
    } else {
        $_SESSION['error'] = "Invalid email domain.";
        header("Location: ../Register.php");
        exit();
    }

    if ($user->register($name, $surname, $email, $password, $gender, $role)) {
        
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        
        if ($role === 'admin') {
            header("Location: Dashboard.php");
        } else {
            header("Location: ../HomePage.php");
        }
        exit();
    } else {
        echo "Error registering user!";
    }
}
?>
