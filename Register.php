<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Register</h1>
        </div>
        <div class="form-body">
            <div class="avatar">
                <img src="./assets/passport-avatar.jpg" alt="">
            </div>
            <form id="register-form" action="CRUD/register_process.php" method="post">
    <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your first name" required>
    </div>
    <div class="form-group">
        <label for="surname">Last Name</label>
        <input type="text" id="surname" name="surname" placeholder="Enter your last name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <div class="form-group">
        <label>Gender</label>
        <div class="radio-group">
            <input type="radio" name="gender" value="male" id="male" required>
            <label for="male">Male</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" value="other" id="other">
            <label for="other">Other</label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn-submit">Register</button>
    </div>
</form>

            
        <div class="footer">
            <p>LOCAL<<<<<<<\WEBSITE<<<<<<<<<<<<<\PROJECT<<<<<<<<<<<<<<<<<<<<<\WEB<<<<<<\DESIGN<<<<<<<<\AND<<<<<<<<<<<<\ENGINEERING</p>
        </div>
    </div>
    <script src="js/Skript.js">
    </script>
</body>
</html>




