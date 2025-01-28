<?php
$itineraryId = $_GET['id'];

include_once 'ItineraryRepository.php';
include_once 'database.php';

if (isset($_POST['confirmDelete'])) {
    $itineraryRepository = new ItineraryRepository($conn);
    $itineraryRepository->deleteItinerary($itineraryId);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Itinerary</title>
    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this itinerary?");
        }
    </script>
</head>
<body>
    <h3>Delete Itinerary</h3>
    <p>Are you sure you want to delete this itinerary?</p>
    <form action="" method="post" onsubmit="return confirmDeletion()">
        <input type="submit" name="confirmDelete" value="Yes, Delete">
        <a href="dashboard.php">Cancel</a>
    </form>
</body>
</html>
