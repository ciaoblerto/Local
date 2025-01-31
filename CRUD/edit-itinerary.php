<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ErrorPage.php");
    exit();
}
include_once 'database.php';
include_once '../classes/ItineraryRepository.php';

$database = new Database();
$conn = $database->getConnection();

$itineraryId = $_GET['id'];

$itineraryRepository = new ItineraryRepository($conn);
$itinerary = $itineraryRepository->getItineraryById($itineraryId);

if (isset($_POST['editBtn'])) {
    $titulli = $_POST['titulli'];
    $description = $_POST['description'];

    $fotoja = !empty($_POST['fotoja']) ? $_POST['fotoja'] : $itinerary['Fotoja'];

    $itineraryRepository->updateItinerary($itineraryId, $fotoja, $titulli, $description);

    header("Location: Dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Itinerary</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: #F5FDFF;
            color: #023047;
            text-align: center;
            padding: 20px;
        }
        h3{
            font-size:30px;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            width: 60%;
            padding: 18px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h3>Edit Itinerary</h3>
    <form action="" method="post">
        <label for="fotoja">Photo:</label>
        <input type="file" name="fotoja" id="fotoja" value="<?= htmlspecialchars($itinerary['Fotoja']) ?>"> <br><br>

        <label for="titulli">Title:</label>
        <input type="text" name="titulli" id="titulli" value="<?= htmlspecialchars($itinerary['Titulli']) ?>"> <br><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?= htmlspecialchars($itinerary['Description']) ?></textarea> <br><br>

        <input type="submit" name="editBtn" value="Save Changes">
    </form>
</body>
</html>
