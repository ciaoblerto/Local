
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itineraries</title>
    <link rel="stylesheet" href="Itineraries.css">
    <link rel="stylesheet" href="Footer.css">
    <link rel="icon" href="favicon.ico" type="image/ico">
</head>
<body>    
    <?php include('components/NavBar.html'); ?>

    <section class="itineraries-header">
        <div class="header-text">
            <h2>Start planning your trip with us</h2>
            <p>We have some user-planned trips that are popular now, right below. <br>In addition, we also have some staff-picked plans we adore. Check them out!</p>
        </div>
        <div class="header-images">
            <img src="./assets/plane.png" alt="plane-image" class="plane-image">
        </div>
    </section>

    <section class="pop-now">
        <span><b>People's itineraries</b></span>
        <p>This is what people are planning!</p>
        <section class="popular-now">
            <?php

            require_once("database.php");
            require_once("backend_itineraries.php");

            error_reporting(E_ALL);
            ini_set("display_errors",1);

            $database = new Database();
            $cards = new Itineraries($database);            

            $itineraries = $cards->getAll();

            $counter = 0;
            if (!empty($itineraries) && is_array($itineraries)) {
                foreach ($itineraries as $row) {
                    $class = $counter >= 4 ? 'box hidden' : 'box';
                    echo "<div class='{$class}'>";

                    if (!empty($row['Fotoja'])) {
                        echo "<img src='data:image/jpeg;base64," . base64_encode($row['Fotoja']) . "' alt='Image'>";
                    } else {
                        echo "<img src='./assets/placeholder.jpg' alt='Placeholder image'>";
                    }
                    
                    echo "<h2>" . htmlspecialchars($row['Titulli']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['Description']) . "</p>";
                    
                    echo "<a href='Template.php'><button class='view-plan-btn'>View Plan</button></a>";
                    
                    echo "</div>";
                    
                    $counter++;
                }
            } else {
                echo "<p>No itineraries found.</p>";
            }
            ?>
        </section>
        <button class="view-more-btn" onclick="showMore()">View more 
            <img src="assets/plane-up-solid.svg" alt="plane photo" class="plane-down">
        </button>
    </section>
    <section class="pop-now2">
        <span><b>Our itineraries</b></span>
            <p>Handpicked getaways from our planning experts</p>
            <section class="popular-now">
                <div class="box">
                    <img src="./assets/berlin.jpg" alt="berlin photo">
                    <h2>A week in Berlin</h2>
                    <p>The Grey City</p>
                    <button class="view-plan-btn">View Plan</button>
                </div>
                <div class="box">
                    <img src="./assets/tokyo.png" alt="Tokyo photo">
                    <h2>2 weeks in Tokyo</h2>
                    <p>The Eastern Capital</p>
                    <button class="view-plan-btn">View Plan</button>
                </div>
                <div class="box">
                    <img src="./assets/lisbon.png" alt="Lisbon photo">
                    <h2>A weekend in Lisbon</h2>
                    <p>The City of Seven Hills</p>
                    <button class="view-plan-btn">View Plan</button>
                </div>
                <div class="box">
                    <img src="./assets/bangkok.jpg" alt="Bangkok photo">
                    <h2>4 days in Bangkok</h2>
                    <p>The Big Mango</p>
                    <button class="view-plan-btn">View Plan</button>
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
        function showMore() {
            const hiddenBoxes = document.querySelectorAll('.popular-now .hidden');
    
            hiddenBoxes.forEach(box => box.classList.remove('hidden'));
    
            document.querySelector('.view-more-btn').style.display = 'none';
        }
    </script>

  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>
</body>
</html>
