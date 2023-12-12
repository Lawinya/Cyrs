<?php
include 'db_connection.php'; // Include your database connection code

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete user based on the provided ID
    $query = "DELETE FROM addusers WHERE id = $userId";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>
            alert('User deleted successfully.');
            window.location.href = 'user_list.php';
        </script>";
    } else {
        echo "Error deleting user: " . mysqli_error($connection);
    }
} else {
    echo "User ID not provided.";
}

mysqli_close($connection);
?>
