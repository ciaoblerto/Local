<?php
include_once 'database.php';
include_once 'ItineraryRepository.php';

$database = new Database();
$conn = $database->getConnection();

$itineraryId = $_GET['id'];

$itineraryRepository = new ItineraryRepository($conn);
$itinerary = $itineraryRepository->getItineraryById($itineraryId);

if (isset($_POST['editBtn'])) {
    $fotoja = $_POST['fotoja'];
    $titulli = $_POST['titulli'];
    $description = $_POST['description'];

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
</head>
<body>
    <h3>Edit Itinerary</h3>
    <form action="" method="post">
        <label for="fotoja">Photo:</label>
        <input type="text" name="fotoja" id="fotoja" value="<?= htmlspecialchars($itinerary['Fotoja']) ?>"> <br><br>

        <label for="titulli">Title:</label>
        <input type="text" name="titulli" id="titulli" value="<?= htmlspecialchars($itinerary['Titulli']) ?>"> <br><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?= htmlspecialchars($itinerary['Description']) ?></textarea> <br><br>

        <input type="submit" name="editBtn" value="Save Changes">
    </form>
</body>
</html>
