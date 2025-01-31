<?php
session_start();
session_destroy(); // Destroy all sessions
header("Location: ../Register.php"); // Redirect to Register page after logout
exit();
?>
