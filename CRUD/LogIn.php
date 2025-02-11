<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itineraries</title>
    <link rel="stylesheet" href="../css/LogIn.css">
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
session_start();
require 'database.php';
require '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $userData = $user->getUserByEmail($email);
    
    if ($userData && password_verify($password, $userData['password'])) {
        $_SESSION['email'] = $email;

        if (strpos($email, '@gmail.com') !== false) {
            $_SESSION['role'] = 'admin';
            header("Location: ../CRUD/Dashboard.php");
        } elseif (strpos($email, '@ubt-uni.net') !== false) {
            $_SESSION['role'] = 'user';
            header("Location: ../HomePage.php");
        } else {
            $_SESSION['error'] = "Invalid email domain.";
            header("Location: ../LogIn.php");
        }
        exit;
    } else {
        echo "<script>alert('Invalid login credentials!');</script>";
    }
}
?>
    <div class="boarding-pass">
        <div class="header">
            <div class="icon">✈️</div>
            <div class="title">Log In</div>
            <div class="sub-title">Boarding pass</div>
        </div>
        <div class="wrapper">
            <form action="LogIn.php" method="POST">
                <div class="input-box">
                    <label>Email</label>
                    <br>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="remember-me-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="button">Login</button>
                <div class="register">
                    <p>Don't have an account? <a href="../Register.php">Register</a></p>
                </div>
            </form>
            <div class="djatht">
                <div class="details">
                    <p><strong>From:</strong> Home</p>
                    <br>
                    <p><strong>To:</strong> The future</p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/LogIn.js"></script>
</body>
</html>
