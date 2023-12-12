<?php
include 'db_connection.php'; // Include your database connection code
session_start();

// Destroy the session to log out the user
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logging Out...</title>
    <!-- Add any necessary CSS or meta tags here -->
</head>
<body>
    <p>Logging out...</p>
    <!-- Add any necessary content or loading animation here -->
    <script>
        // Redirect the user to the login page or any other desired page
        window.location.href = "index.php";
    </script>
</body>
</html>
