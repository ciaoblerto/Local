<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ErrorPage.php");
    exit();
}
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
