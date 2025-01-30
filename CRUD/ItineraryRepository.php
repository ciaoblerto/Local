<?php
include_once 'database.php';

class ItineraryRepository {
    private $connection;

    function __construct($connection) {
        $this->connection = $connection;
    }

    function insertItinerary($itineraries) {
        $sql = "INSERT INTO itineraries (Id, Fotoja, Titulli, Description) VALUES (:id, :fotoja, :titulli, :description)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            ':id' => $itineraries->getId(),
            ':fotoja' => $itineraries->getFotoja(),
            ':titulli' => $itineraries->getTitulli(),
            ':description' => $itineraries->getDescription()
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
