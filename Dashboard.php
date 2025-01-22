<?php
include("database.php");

$sql = "SELECT * FROM itineraries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<h1>Welcom Name <br> This is your Admin Dasboard </h1><!--Te name e qesim emrin ose emailin kur bohet databaza-->
    <h1>Profile Dashboard</h1>
    <!--Tabela e userave-->
    <h1 style="text-align: center;">Itineraries Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fotoja</th>
                <th>Titulli</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Id'] . "</td>";
                    if (!empty($row['Fotoja'])) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Fotoja']) . "' alt='Image'></td>";
                    } else {
                        echo "<td>No Image</td>";
                    }
                    echo "<td>" . htmlspecialchars($row['Titulli']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='4'>No itineraries found.</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
