<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../ErrorPage.php");
    exit();
}

require_once("../CRUD/database.php");
require_once("../classes/User.php");
require_once("UserRepository.php");

$database = new Database();
$connection = $database->getConnection();
$userRepository = new UserRepository($connection);

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = $userRepository->getUserById($userId);

    if (!$user) {
        echo "User not found!";
        exit();
    }
}

if (isset($_POST['editBtn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepository->updateUser($id, $name, $surname, $email, $password);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: #F5FDFF;
            color: #023047;
            text-align: center;
            padding: 20px;
        }
        h3{
            font-size:30px;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            width: 60%;
            padding: 18px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h3>Edit User</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user['user_id'] ?>"> <br> <br>

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required> <br> <br>

        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="<?= htmlspecialchars($user['surname']) ?>" required> <br> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required> <br> <br>

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" required> <br> <br>

        
        <input type="submit" name="editBtn" value="Save Changes"> <br> <br>
    </form>
</body>
</html>
