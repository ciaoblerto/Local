<?php
include_once 'database.php';
include_once 'Itinerary.php';

class ItineraryRepository {
    private $connection;

    function __construct($connection) {
        $this->connection = $connection;
    }

    function insertItinerary(Itinerary $itinerary) {
        $sql = "INSERT INTO itineraries (Fotoja, Titulli, Description, user_id) VALUES (:fotoja, :titulli, :description, :user_id)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            ':fotoja' => $itinerary->getFotoja(),
            ':titulli' => $itinerary->getTitulli(),
            ':description' => $itinerary->getDescription(),
            ':user_id' => $itinerary->getUser_Id()
        ]);

        echo "<script>alert('Itinerary added successfully!');</script>";
    }

    function getAllItineraries() {
        $sql = "SELECT * FROM itineraries";
        $statement = $this->connection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getItineraryById($id) {
        $sql = "SELECT * FROM itineraries WHERE Id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function updateItinerary($id, $fotoja, $titulli, $description) {
        $sql = "UPDATE itineraries SET Fotoja = :fotoja, Titulli = :titulli, Description = :description WHERE Id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            ':fotoja' => $fotoja,
            ':titulli' => $titulli,
            ':description' => $description,
            ':id' => $id
        ]);

        echo "<script>alert('Itinerary updated successfully!');</script>";
    }

    function deleteItinerary($id) {
        $sql = "DELETE FROM itineraries WHERE Id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute([':id' => $id]);

        echo "<script>alert('Itinerary deleted successfully!');</script>";
    }
}
?>
