<?php 
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: Register.php");
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404!</title>
    <link rel="stylesheet" href="./css/ErrorPage.css">
    <link rel="icon" href="favicon.ico" type="image/ico">
</head>
<body>
    <?php include ('components/NavBar.php')?>
    <div class="errorContainer">
        <img src="./assets/404.png" alt="404image">
        <div class="explanation">
            <h1>We`re sorry, the Page you are looking for <br> does not exist or is in progress</h1>
            <p>We still have other functioning pages you should check out! We worked really hard on them, explore our website and have fun!</p>
        </div>
        <a href="HomePage.php" class="redirect-button">Home Page</a>
    </div>
</body>
<script src="js/Skript.js"></script>
</html>