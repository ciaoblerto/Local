<?php
include_once 'database.php';
include_once '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $surname = isset($_POST['surname']) ? $_POST['surname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($gender)) {
        echo "All fields are required!";
        exit;
    }

    if ($user->register($name, $surname, $email, $password, $gender)) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error registering user!";
    }
}
?>

