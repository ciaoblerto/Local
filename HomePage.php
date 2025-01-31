<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local</title>
    <link rel="stylesheet" href="./css/HomePage.css">
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
</head>

<body>
    <?php include ('./components/NavBar.php')?>
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
            require('CRUD/database.php');
            require('CRUD/backend_itineraries.php');

            error_reporting(E_ALL);
            ini_set("display_errors",1);

            $database = new Database();
            $cards = new Itineraries($database);            

            $itineraries = $cards->getAll();
            if (!empty($itineraries) && is_array($itineraries)) {
                $counter = 0;
                foreach ($itineraries as $row) {
                    if ($counter >= 4) break; 
            
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
            
                    $counter++;
                }
            }else {
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
        
    <?php include ('components/Footer.html')?>
    <script src="js/Skript.js"></script>
</body>
</html>