<!DOCTYPE html>
<html>

<head>
    <title>Gym Dashboard - User List</title>
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

        /* Sidebar Styles */
        .sidebar {
            width: 300px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.active {
            width: 0;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #222;
        }

        .sidebar-header img {
            max-width: 80px;
        }

        .close-button {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-button:focus {
            outline: none;
        }

        .close-button:hover {
            color: #e74c3c;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        /* Table Styles */
        .table-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container input {
            margin-bottom: 10px;
        }

        /* Search button styling */
        #searchButton {
            background-color: #3498db;
            border: none;
            color: #fff;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #searchButton:hover {
            background-color: #2980b9;
        }

        /* Table styling */
        .table th,
        .table td {
            vertical-align: middle;
        }

        /* Status column styling */
        .status-inactive {
            color: red;
        }

        /* Edit and Delete icons */
        .action-icons {
            display: flex;
            gap: 5px;
        }

        /* Style for edit icon */
        .action-icons a.edit {
            color: green;
        }

        /* Style for delete icon */
        .action-icons a.delete {
            color: red;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    </nav>
    <div id="content" class="content">
        <h2>User List</h2>
        <div class="table-container">
            <input type="text" class="form-control" id="searchInput" placeholder="Search">
            <button class="btn btn-primary mt-2" id="searchButton">Search</button>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Join Date</th>
                        <th>End Date</th>
                        <th>Amount Paid</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection code here
                    include 'db_connection.php'; // Change this to your database connection code
                    
                    
                    $query = "SELECT * FROM addusers WHERE status = 'inactive'";
                    $result = mysqli_query($connection, $query);

                    $counter = 1; // Initialize the counter
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>"; // Display the sequential counter
                        echo "<td>{$row['full_name']}</td>";
                        echo "<td>{$row['join_date']}</td>";
                        echo "<td>{$row['end_date']}</td>";
                        echo "<td>{$row['amount_paid']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['phone_number']}</td>";
                        if ($row['status'] === 'inactive') {
                            echo "<td class='status-inactive'>{$row['status']}</td>";
                        } else {
                            echo "<td>{$row['status']}</td>";
                        }


                        echo "<td class='action-icons'>
                        <a href='delete.php?id={$row['id']}'><i class='far fa-trash-alt' style='font-size:22px;color:red; padding-right:10px;'></i></a>
                        <a href='edit.php?id={$row['id']}'><i class='far fa-edit' style='font-size:20px;color:green'></i></a>
                                
                              </td>";
                        echo "</tr>";

                        $counter++; // Increment the counter
                    }


                    mysqli_close($connection);
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchInput = this.value.toLowerCase();
            const rows = document.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) { // Skip the header row
                const cells = rows[i].getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length - 2; j++) { // Exclude status and actions columns
                    const cellText = cells[j].innerHTML.toLowerCase();
                    if (cellText.includes(searchInput)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });

        function confirmDelete(userId) {
            const confirmResult = confirm("Are you sure you want to delete this user?");
            if (confirmResult) {
                window.location.href = `delete.php?id=${userId}`;
            }
        }
    </script>
</body>

</html>