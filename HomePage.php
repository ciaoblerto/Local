<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local</title>
    <link rel="stylesheet" href="HomePage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="Footer.css">
</head>

<body>
    <?php include ('components/NavBar.html')?>
    <section class ="hero-section">
        <div class="background-image"></div>
        <div class="search-container">
        <h1>Travel, like a local</h1>
        <h2>&nbspUse our website to create your perfect <br> &nbspitinerary</h2>
        <form action="ErrorPage.html">
            <div class="search">
               <span class="search-icon material-symbols-outlined">search</span>
               <input class="search-input" type="search" placeholder="Enter your destination">
            </div>
            </form>
        </div>
    </section>

    <section class="pop-now">
        <span><b>Whats Popular Now!</b></span>
        <section class="popular-now">
            <div class="box">
                <img src="./assets/Florence.jpg" alt="Florence photo">
                <h2>3 Days in Florence</h2>
                <p>City of the Renaissance!</p>
                <button class="view-plan-btn">View Plan</button>
            </div>
            <div class="box">
                <img src="./assets/NewYork.jpg" alt="New York photo">
                <h2>Weekend in New York</h2>
                <p>Visit the City that never sleeps!</p>
                <button class="view-plan-btn">View Plan</button>
            </div>
            <div class="box">
                <img src="./assets/London.jpg" alt="London photo">
                <h2>6 Days in London</h2>
                <p>Relax in the largest metropolis in the United Kingdom!</p>
                <button class="view-plan-btn">View Plan</button>
            </div>
            <div class="box">
                <img src="./assets/Paris.jpg" alt="Paris photo">
                <h2>Day trip in Paris</h2>
                <p>Spend 24h in the city of light!</p>
                <button class="view-plan-btn">View Plan</button>
            </div>
        </section>
         <a href="Itineraries.html" class="view-more-btn">View more
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