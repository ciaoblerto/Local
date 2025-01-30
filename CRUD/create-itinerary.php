<?php
include_once 'database.php';
include_once 'Itinerary.php';
include_once 'ItineraryRepository.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $connection = $database->getConnection();
    $repository = new ItineraryRepository($connection);

    $titulli = $_POST['titulli'];
    $description = $_POST['description'];
    $fotoja = "";

    // Handle image upload
    if (isset($_FILES['fotoja']) && $_FILES['fotoja']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../assets/";
        $targetFile = $targetDirectory . basename($_FILES["fotoja"]["name"]);
        move_uploaded_file($_FILES["fotoja"]["tmp_name"], $targetFile);
        $fotoja = $targetFile;
    }

    $itinerary = new Itinerary($fotoja, $titulli, $description);
    $repository->insertItinerary($itinerary);

    header("Location: Dashboard.php");
    exit();
}
?>
