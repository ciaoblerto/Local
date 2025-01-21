<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="AboutUs.css">
    <link rel="stylesheet" href="Footer.css">
</head>
<body>
<?php include ('components/NavBar.html')?>
    <section class="about-header">
        <section class="about-text">
            <h1>About Us</h1>
            
            <p>With a ⭐ 5.0 rating, we’re proud to provide excellent service and unforgettable travel experiences.</p>
        </section>
        <section class="ratings">
            
        </section>
        <section>
            <img src="assets/Animation - 1733300781183.gif" alt="">
           </section>
    </section>
   
    <section class="ourValues">
        <div class="valuesContainer">
            <div class="images">
                <img src="assets/airport.jpg" alt="" class="airport-image">
            </div>
            <div class="text">
                <h2>Our Values</h2>
                <p>At Local, we believe in creating unforgettable journeys. Our values are rooted in simplicity, trust, and personalized experiences. We are committed to helping you explore the world effortlessly, with itineraries tailored to your dreams and a focus on sustainable travel. Together, let’s turn your travel ideas into lasting memories.
                    We strive to build a deeper connection with every destination, empowering travelers to uncover hidden gems and authentic experiences. 
                </p>
            </div>
        </div>
    </section>
    

    <section class="team-section">
        <h2>Our Team</h2>
        <p>These two are the amazing students that have made this website possible for YOU! <br><b>Hover over the images to find out more!</b></p>
        <div class="team-container">
            <div class="team-member">
                <div class="image-container">
                    <img src="assets/Blertoni.JPG" alt="Blerti">
                    <div class="overlay"></div>
                    <div class="social-icons">
                        <a href="https://github.com/ciaoblerto" target="_blank">
                            <img src="assets/github-icon.png" alt="GitHub">
                        </a>
                        <a href="https://www.linkedin.com/in/blerton-lokaj-4398512a8/" target="_blank">
                            <img src="assets/linkedin-icon.png" alt="LinkedIn">
                        </a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Blerton Lokaj</h3>
                    <span class="line"></span>
                    <p>UBT Bachelor of Computer Science</p>
                    <p>Grupi 1b</p>
                </div>
            </div>
            
            <div class="team-member">
                <div class="image-container">
                    <img src="assets/hana.jpg" alt="Hana">
                    <div class="overlay"></div>
                    <div class="social-icons">
                        <a href="https://github.com/hanakrasniqi05" target="_blank">
                            <img src="assets/github-icon.png" alt="GitHub">
                        </a>
                        <a href="https://www.linkedin.com/in/hana-krasniqi-45206b29a/" target="_blank">
                            <img src="assets/linkedin-icon.png" alt="LinkedIn">
                        </a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Hana Krasniqi</h3>
                    <span class="line"></span>
                    <p>UBT Bachelor of Computer Science</p>
                    <p>Grupi 1a</p>
                </div>
            </div>
        </div>
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
  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>
    <script src="Skript.js"></script> 
</body>
</html>