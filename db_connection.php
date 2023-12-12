<?php
// Database connection configuration
$host = "localhost"; // Change this to your database host
$user = "root"; // Change this to your database username
$password = "7038770392"; // Change this to your database password
$database = "gym"; // Change this to your database name

// Create a connection
$connection = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
