<?php
include_once 'database.php';

class ItineraryRepository {
    private $connection;

    function __construct($connection) {
        $this->connection = $connection;
    }

    function insertItinerary($itineraries) {
        $conn = $this->connection;

        $id = $itineraries->getId();
        $fotoja = $itineraries->getFotoja();
        $titulli = $itineraries->getTitulli();
        $description = $itineraries->getDescription();

        $sql = "INSERT INTO itineraries (Id, Fotoja, Titulli, Description) VALUES (?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param($id, $fotoja, $titulli, $description);
        $statement->execute();

        echo "<script>alert('Itinerary added successfully!');</script>";
    }

    function getAllItineraries() {
        $conn = $this->connection;

        $sql = "SELECT * FROM itineraries";
        $result = $conn->query($sql);

        $itineraries = [];
        while ($row = $result->fetch_assoc()) {
            $itineraries[] = $row;
        }

        return $itineraries;
    }

    function getItineraryById($id) {
        $conn = $this->connection;

        $sql = "SELECT * FROM itineraries WHERE Id = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $itineraries = $result->fetch_assoc();

        return $itineraries;
    }

    function updateItinerary($id, $fotoja, $titulli, $description) {
        $conn = $this->connection;
    
        $sql = "UPDATE itineraries SET Fotoja = ?, Titulli = ?, Description = ? WHERE Id = ?";
        $statement = $conn->prepare($sql);
    
        if (!$statement) {
            die("Error preparing statement: " . $conn->error);
        }
    
        $statement->bind_param("sssi", $fotoja, $titulli, $description, $id);
    
        if (!$statement->execute()) {
            die("Error executing query: " . $statement->error);
        }
    
        echo "<script>alert('Itinerary updated successfully!');</script>";
    }
    

    function deleteItinerary($id) {
        $conn = $this->connection;

        $sql = "DELETE FROM itineraries WHERE Id = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();

        echo "<script>alert('Itinerary deleted successfully!');</script>";
    }
}
?>
