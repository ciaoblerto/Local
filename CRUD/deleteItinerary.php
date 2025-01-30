<?php

$itineraryId = $_GET['id']; 

include_once 'database.php';
include_once '../classes/ItineraryRepository.php';

$database = new Database();
$conn = $database->getConnection();
$itineraryRepository = new ItineraryRepository($conn);

$itineraryRepository->deleteItinerary($itineraryId);

header("Location: Dashboard.php");
exit();
?>
