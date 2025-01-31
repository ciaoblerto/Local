<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="components/header.css">
</head>
<body>
    <header class="header">
        <div class="logoContainer">
            <img src="./assets/logo.png" alt="localLogo">
        </div>

        <nav class="navLinks">
            <a href="HomePage.php">Home</a>
            <a href="Itineraries.php">Itineraries</a>
            <a href="AboutUs.php">About Us</a>
        </nav>

        <div class="registerButtons">
            <?php if (isset($_SESSION['email'])): ?>
                <button class="logOut"><a href="./CRUD/LogOut.php">Log Out</a></button>
            <?php else: ?>
                <button class="signIn"><a href="Register.php">Sign Up</a></button>
                <button class="logIn"><a href="./CRUD/LogIn.php">Log In</a></button>
            <?php endif; ?>
        </div>

        <button class="hamburgerMenu" aria-label="Toggle menu">
            ☰
        </button>
    </header>
</body>
</html>
