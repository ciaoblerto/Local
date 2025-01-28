<?php
include("CRUD/database.php"); 

$sql = "SELECT * FROM itineraries LIMIT 4";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
    <link rel="stylesheet" href="Footer.css">
</head>

<body>
    <?php include ('components/NavBar.html')?>
    <section class ="hero-section">
        <div class="background-image"></div>
        <div class="search-container">
        <h1>Travel, like a local</h1>
        <h2>&nbspUse our website to create your perfect <br> &nbspitinerary</h2>
        <form action="ErrorPage.php">
            <div class="search">
               <span class="search-icon material-symbols-outlined">search</span>
               <input class="search-input" type="search" placeholder="Enter your destination">
            </div>
            </form>
        </div>
    </section>

    <section class="pop-now">
        <span>
            <b>Whats Popular Now!</b>
        </span>
        <section class="popular-now">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    if (!empty($row['Fotoja'])) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Fotoja']) . '" alt="' . htmlspecialchars($row['Titulli']) . ' photo">';
                    } else {
                        echo '<h2>No photo available</h2>';
                    }
                    echo '<h2>' . htmlspecialchars($row['Titulli']) . '</h2>';
                    echo '<p>' . htmlspecialchars($row['Description']) . '</p>';
                    echo '<a href="Template.php">';
                    echo '<button class="view-plan-btn">View Plan</button>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No itineraries available right now!</p>';
            }
            ?>
        </section>
         <a href="Itineraries.php" class="view-more-btn">View more
            <img src="assets/plane-departure-solid.svg" alt="plane-dep" class="plane-dep">
         </a>
    </section>
    
    <section id="testimonials-container">
        <h1 id="testimonials-title">What Users Say About Us</h1>
        <div class="testimonials-slider">
            <div class="testimonial" id="slideshow">
                <div class="placeholder" id="placeholder"></div>
                <p class="textboxes-text" id="textboxes-text"></p>
                <p class="smallinfo-text" id="smallinfo-text"></p>
            </div>
        </div>
        <button id="next-btn">Next testimonial</button>
    </section>
    <footer>
        <div class="socials">
          <img class="social-icon" src="./assets/instakuku.png" alt="Instalogo">
          <img class="social-icon" src="./assets/FB2-logo.png" alt="Xlogo">
          <img class="social-icon" src="./assets/Youtube-logo.png" alt="Youtubelogo">
          <img class="social-icon" src="./assets/Linkedin-logo-black.png" alt="Linkedinlogo">
        </div>
        <div class="footerContainer">
          <ul>
              <li><a href="HomePage.html"><b>Home</b></a></li>
              <li><a href="Itineraries.html"><b>Itineraries</b></a></li>
              <li><a href="AboutUs.html"><b>About us</b></a></li>
              <li><a href=""><b>Our team</b></a></li>
          </ul>
        </div>
        <p id="copyright">&copy; <span id="currentYear"></span> Local. All rights reserved.</p>
    </footer>
    <script src="Skript.js"></script>
</body>
</html>