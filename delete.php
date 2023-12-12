<?php
include 'db_connection.php'; // Include your database connection code

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user data based on the provided ID
    $query = "SELECT * FROM addusers WHERE id = $userId";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Display a confirmation prompt
        echo "<script>
            const confirmResult = confirm('Are you sure you want to delete the user: {$user['full_name']}?');
            if (confirmResult) {
                // If user confirms, perform the deletion
                window.location.href = 'delete_confirm.php?id={$user['id']}';
            } else {
                // If user cancels, go back to the user list page
                window.location.href = 'user_list.php';
            }
        </script>";
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

mysqli_close($connection);
?>
