<?php
require_once("database.php");

$database = new Database();
$conn = $database->getConnection();

if(isset($_GET["user_id"]) && isset($_GET["role"])) {
    $user_id = $_GET["user_id"];
    $new_role= $_GET["role"];

    $query = "UPDATE users SET role = :role WHERE user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("user_id", $user_id);
    $stmt->bindParam(':role', $new_role);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error updating role.";
    }
}
?>