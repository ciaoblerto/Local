<?php
include_once 'ItineraryRepository.php';
include_once 'database.php';

$itineraryRepository = new ItineraryRepository($conn);
$itineraries = $itineraryRepository->getAllItineraries();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itinerary Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
    
</head>
<body>
    <header class="header">
        <div class="logoContainer">
            <img src="../assets/logo.png" alt="localLogo">
        </div>
        <div class="registerButtons">
            <button class="logIn"><a href="../LogIn.html">Log In</a></button>
        </div>
    </header>
    <h1>Itinerary Dashboard</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php 
        foreach ($itineraries as $itinerary): ?>
        <tr>
            <td><?= $itinerary['Id'] ?></td>
            <td>Foto!</td>
            <td><?= $itinerary['Titulli'] ?></td>
            <td><?= $itinerary['Description'] ?></td>
            <td>
                <a href="edit.php?id=<?= $itinerary['Id'] ?>">Edit</a>
            </td>
            <td>
                <a href="deleteItinerary.php?id=<?= $itinerary['Id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
