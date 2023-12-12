<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Establish database connection
    $conn = new mysqli("localhost", "root", "7038770392", "gym");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into "users" table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

   // ... Your existing code ...

if ($conn->query($sql) === TRUE) {
    echo "Registered successfully!";
    header("Location: index.php"); // Redirect to sign-in page after successful registration
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

    $conn->close();
}
?>
