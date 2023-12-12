<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "7038770392";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$full_name = $_POST['full_name'];
$join_date = $_POST['join_date'];
$end_date = $_POST['end_date'];
$amount_paid = $_POST['amount_paid'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];

// ...




// Determine status based on join and end dates
$status = ($join_date <= $end_date) ? 'Active' : 'Inactive';

// Insert data into the database
$sql = "INSERT INTO addusers (full_name, join_date, end_date, amount_paid, status, address, phone_number)
        VALUES ('$full_name', '$join_date', '$end_date', $amount_paid, '$status', '$address', '$phone_number')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User added successfully.'); window.location.href = 'add_user.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
