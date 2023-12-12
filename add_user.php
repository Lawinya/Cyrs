<!DOCTYPE html>
<html>
<head>
    <title>Gym Dashboard - Add User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        </nav>
        <div id="content" class="content">
            <h2  >Add New User</h2>
            <div class="form-container">
                <form action="process_add_user.php" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label for="full_name">Full Name:</label>
                            <input type="text" class="form-control" name="full_name" required>
                        </div>
                        <div class="col">
                            <label for="join_date">Date of Joining:</label>
                            <input type="date" class="form-control" name="join_date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <div class="col">
                            <label for="amount_paid">Amount Paid:</label>
                            <input type="number" class="form-control" name="amount_paid" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="phone_number">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone_number" required>
                        </div>
                        <div class="col">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
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
        }
    </script>
</body>
</html>
