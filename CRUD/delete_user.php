<?php
require_once("database.php");

$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "DELETE FROM users WHERE user_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $user_id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error deleting user.";
    }
}
?>
