<?php
include 'db_connection.php'; // Include the database connection file

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    $query = "SELECT * FROM addusers WHERE id = $userId";
    $result = mysqli_query($connection, $query);
    $userData = mysqli_fetch_assoc($result);
    
    if (!$userData) {
        echo "User not found.";
        exit;
    }
} else {
    echo "User ID not provided.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newFullName = $_POST['full_name'];
    $newJoinDate = $_POST['join_date'];
    $newEndDate = $_POST['end_date'];
    $newAmountPaid = $_POST['amount_paid'];
    $newAddress = $_POST['address'];
    $newPhoneNumber = $_POST['phone_number'];
    $newStatus = $_POST['status'];
    
    // Update the user's data in the database
    $updateQuery = "UPDATE addusers SET
                    full_name = '$newFullName',
                    join_date = '$newJoinDate',
                    end_date = '$newEndDate',
                    amount_paid = '$newAmountPaid',
                    address = '$newAddress',
                    phone_number = '$newPhoneNumber',
                    status = '$newStatus'
                    WHERE id = $userId";
    
    if (mysqli_query($connection, $updateQuery)) {
        header("Location: user_list.php"); // Redirect back to the user list page after successful update
    } else {
        echo "Error updating user: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User - Gym Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your custom CSS and other necessary files here -->



    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .content {
            padding: 20px;
            margin-left: 300px;
        }
        
        /* Adjust styling for the form */
        .form-group label {
            font-weight: bold;
            color: #3498db;
        }
        
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
        }
        
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        /* Additional CSS styling */
        .form-row {
            margin-bottom: 20px;
        }
        
        .form-row .col {
            padding: 0 15px;
        }
        
        /* Styling for background color, shadow, and input field colors */
        .form-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- ... Your existing code ... -->

<div id="content" class="content">
    <h2>Edit/Update User</h2>
    <form method="post" onsubmit="return confirm('Are you sure you want to update this user?');">
        <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $userData['full_name']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="join_date">Join Date:</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="<?php echo $userData['join_date']; ?>">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $userData['end_date']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="amount_paid">Amount Paid:</label>
                <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="<?php echo $userData['amount_paid']; ?>">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $userData['phone_number']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $userData['address']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="active" <?php if ($userData['status'] === 'active') echo 'selected'; ?>>Active</option>
                <option value="inactive" <?php if ($userData['status'] === 'inactive') echo 'selected'; ?>>Inactive</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- ... Your existing code ... -->


    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active");

            const content = document.getElementById("content");
            const toggleButton = document.getElementById("toggle-button");

            if (sidebar.classList.contains("active")) {
                content.style.marginLeft = "0";
                toggleButton.style.marginLeft = "none";
                
            } else {
                content.style.marginLeft = "300px"; // Adjust this value to match the sidebar width
                toggleButton.style.marginLeft = "block"; // Adjust this value to match the sidebar width
                
            }

            const updateForm = document.querySelector('form');
        updateForm.addEventListener('submit', function (event) {
            const confirmation = confirm('Are you sure you want to update this user?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
        }
    </script>

    
</body>
</html>
