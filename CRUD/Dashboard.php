<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
</head>
<body>
    <header class="header">
        <div class="logoContainer">
            <img src="../assets/logo.png" alt="localLogo">
        </div>
        <nav class="navLinks">
            <a href="LogOut.php">Log out</a>
        </nav>
    </header>
    
    <h1>Welcome Name <br> This is your Admin Dashboard</h1>
    <h3>Profile Dashboard</h3>
    <hr>

    <h3>Itineraries Dashboard</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fotoja</th>
                <th>Titulli</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("database.php");
            require_once("../classes/ItineraryRepository.php");
            require_once("UserRepository.php");

            $database = new Database();
            $repository = new ItineraryRepository($database->getConnection());
            $userrepository = new UserRepository($database->getConnection());

            $itineraries = $repository->getAllItineraries();
            $users = $userrepository->getAllUsers();

            if (count($itineraries) > 0) {
                foreach ($itineraries as $itinerary) {
                    echo "<tr>";
                    echo "<td>" . $itinerary['Id'] . "</td>";
                    if (!empty($itinerary['Fotoja'])) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($itinerary['Fotoja']) . "' alt='Image'></td>";
                    } else {
                        echo "<td>No Image</td>";
                    }
                    echo "<td>" . htmlspecialchars($itinerary['Titulli']) . "</td>";
                    echo "<td>" . htmlspecialchars($itinerary['Description']) . "</td>";
                    echo "<td>
                        <a href='edit-itinerary.php?id=" . htmlspecialchars($itinerary['Id']) . "'>Update</a> |
                        <a href='deleteItinerary.php?id=" . htmlspecialchars($itinerary['Id']) . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No itineraries found.</td></tr>";
            }
            ?>
              </tbody>
        </table>
        <hr>

    
        <h3>Users Dashboard</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            </tbody>
            </tbody>

            <?php
            if (is_array($users) || $users instanceof Countable) {
                if (count($users) > 0) {
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['user_id'] . "</td>";
                        echo "<td>" . htmlspecialchars($user['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($user['role']) . "</td>";
                        echo "<td>
                    <a href='edit-user.php?id=" . htmlspecialchars($user['user_id']) . "'>Edit</a> |
                    <a href='delete-user.php?id=" . htmlspecialchars($user['user_id']) . "' onclick='return confirm(\"Are you sure?\");'>Delete</a> |
                    <a href='change-role.php?id=" . htmlspecialchars($user['user_id']) . "&role=admin'>Make Admin</a> |
                    <a href='change-role.php?id=" . htmlspecialchars($user['user_id']) . "&role=user'>Make User</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found.</td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Error: Users data is not available.</td></tr>";
    }
?>

    </table>
    <hr>
    <div classname="cr-it">
        <h3>Create Itinerary</h3>
        <form action="create-itinerary.php" method="POST" enctype="multipart/form-data">
            <label for="titulli">Title:</label>
            <input type="text" name="titulli" required>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>

            <label for="fotoja">Upload Image:</label>
            <input type="file" name="fotoja" accept="image/*" required>

            <button type="submit">Create Itinerary</button>
        </form>        
    </div>

</body>
</html>
