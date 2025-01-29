<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
</head>
<body>
    <header class="header">
            <div class="logoContainer">
                <img src="./assets/logo.png" alt="localLogo">
            </div>
            <nav class="navLinks">
                <a href="LogIn.html">Log out</a><!--Per log out-->
            </nav>
    </header>
        <h1>Welcome Name <br> This is your Admin Dasboard </h1><!--Te name e qesim emrin ose emailin kur bohet databaza-->
        <h3>Profile Dashboard</h3>
        <hr>
        <!--Tabela e userave-->
         <h3>Itineraries Dashboard</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fotoja</th>
                <th>Titulli</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        
            require_once("database.php");
            require_once("backend_itineraries.php");

            error_reporting(E_ALL);
            ini_set("display_errors",1);

            $database = new Database();
            $cards = new Itineraries($database);            

            $itineraries = $cards->getAll();

            if (count($itineraries) > 0) {
                foreach ($itineraries as $itinerarie) {
                    echo "<tr>";
                    echo "<td>" . $itinerarie['Id'] . "</td>";
                    if (!empty($itinerarie['Fotoja'])) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($itinerarie['Fotoja']) . "' alt='Image'></td>";
                    } else {
                        echo "<td>No Image</td>";
                    }
                    echo "<td>" . htmlspecialchars($itinerarie['Titulli']) . "</td>";
                    echo "<td>" . htmlspecialchars($itinerarie['Description']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='4'>No itineraries found.</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
