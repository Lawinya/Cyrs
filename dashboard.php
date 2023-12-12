<?php include 'db_connection.php';

// Calculate sum of inactive users
$querySumInactiveUsers = "SELECT SUM(CASE WHEN status = 'inactive' THEN 1 ELSE 0 END) AS sum_inactive_users FROM addusers";
$resultSumInactiveUsers = mysqli_query($connection, $querySumInactiveUsers);
$sumInactiveUsersData = mysqli_fetch_assoc($resultSumInactiveUsers);
$sumInactiveUsers = $sumInactiveUsersData['sum_inactive_users'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gym Dashboard - Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

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

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 300px;
            /* Add space for the sidebar */
            transition: margin-left 0.3s;
            margin-top: 100px;
            width: 100%;
            /* Adjust width based on sidebar state */
        }




        .sidebar.active+.content {
            margin-left: 0;
            width: 100%;
        }

        .sidebar.active~.content {
            width: 70%;
        }







        .toggle-button {
            background-color: #3498db;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, margin-left 0.3s;
            position: absolute;
            top: 20px;
            left: 15px;
        }

        .toggle-button:hover {
            background-color: #2980b9;
        }

        .active-link {
            background-color: #444;
        }

        .fas {
            font-size: 20px;
            padding-right: 10px;
        }

        /* Additional custom styles for cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #B0C4DE;
            margin-right: 15px;
            margin-bottom: 15px;
        }

       
        .card:last-child {
            margin-right: 0;
        }

        .card-title {
            color: #333;
            text-align: center;
        }

        .card-text {

            text-align: center;
            font-weight: bolder;
            padding: 20px;
            font-size: 20px;
        }

        .red-text {
            color: red;
            font-weight: bolder;
            font-size: 20px;

        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
                /* Make cards full width on smaller screens */
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <button id="toggle-button" type="button" class="toggle-button" onclick="toggleSidebar()">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <img src="your-logo.png" alt="Gym Logo">
                <button class="close-button" onclick="toggleSidebar()">&times;</button>
            </div>
            <ul class="list-unstyled components">
                <li style=" font-size:14px">
                    <a href="dashboard.php" class="active-link"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li style=" font-size:14px">
                    <a href="add_user.php"><i class="fas fa-user-plus"></i> Add Users</a>
                </li>

                <div class="dropdown">
                    <button style=" color:white; padding:15px; margin-left:3px; border:2px ; font-size:14px"
                        class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><i
                            class="fas fa-users"></i>USERS
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="padding:15px;">
                        <li style="  border:2px solid black ; font-size:14px"><a href="user_list.php"> User List</a>
                        </li>
                        <li style="  border:2px solid black ; font-size:14px; margin-top:5px"> <a
                                href="Inctive_user_list.php"> Inactive User List</a></li>
                        <li style="  border:2px solid black ; font-size:14px; margin-top:5px"><a
                                href="Active_user_list.php"> Active User List</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button style=" color:white; padding:15px; margin-left:3px; border:2px ; font-size:14px"
                        class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><i
                            class="fas fa-users"></i>DOWNLOADS
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="padding:14px;">
                        <li style="  border:2px solid black ; font-size:14px"> <a href="download_all_users.php"><i
                                    class="fas fa-file-download"></i> Download Users list</a></li>
                        <li style="  border:2px solid black ; font-size:14px"> <a href="download_active_users.php"><i
                                    class="fas fa-file-download"></i> Download Active Users</a></li>
                        <li style="  border:2px solid black ; font-size:14px; margin-top:5px"> <a
                                href="download_inactive_users.php"><i class="fas fa-file-download"></i> Download
                                Inactive Users (<span class="red-text">
                                    <?php echo $sumInactiveUsers; ?>
                                </span>)</a></li>

                    </ul>
                </div>

                <li style=" font-size:14px" class="nav-item">
                    <a class="nav-link" href="#" onclick="showLogoutConfirmation()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <div id="content" class="content">
            <h2>Welcome, User!</h2>
            <!-- Your dashboard content here -->
            <div class="row">
    <div  style="width:200px" class="col-sm-12 col-md-6 col-lg-4">
        <div class="card card-custom" style="height: 150px;">
            <div class="card-body">
                <h1 class="card-title">Number of Users</h1>
                <p class="card-text">
                    <?php
                    $queryTotalUsers = "SELECT COUNT(*) AS total_users FROM addusers";
                    $resultTotalUsers = mysqli_query($connection, $queryTotalUsers);
                    $totalUsersData = mysqli_fetch_assoc($resultTotalUsers);
                    $totalUsers = $totalUsersData['total_users'];
                    echo $totalUsers;
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div  style="width:200px" class="col-sm-12 col-md-6 col-lg-4">
        <div class="card card-custom" style="height: 150px; ">
            <div class="card-body">
                <h1 class="card-title">Active Users</h1>
                
                <p class="card-text">
                    
                    <?php
                    $queryActiveUsers = "SELECT COUNT(*) AS active_users FROM addusers WHERE status = 'active'";
                    $resultActiveUsers = mysqli_query($connection, $queryActiveUsers);
                    $activeUsersData = mysqli_fetch_assoc($resultActiveUsers);
                    $activeUsers = $activeUsersData['active_users'];
                    echo $activeUsers;
                    ?>
                </p>
    
            </div>
        </div>
    </div>
    <div  style="width:200px" class="col-sm-12 col-md-12 col-lg-4">
        <div class="card card-custom" style="height: 150px; ">
            <div class="card-body">
                <h1 class="card-title">Inactive Users</h1>
                <p class="card-text">
                    <?php
                    $queryInactiveUsers = "SELECT COUNT(*) AS inactive_users FROM addusers WHERE status = 'inactive'";
                    $resultInactiveUsers = mysqli_query($connection, $queryInactiveUsers);
                    $inactiveUsersData = mysqli_fetch_assoc($resultInactiveUsers);
                    $inactiveUsers = $inactiveUsersData['inactive_users'];
                    echo $inactiveUsers;
                    ?>
                </p>
            </div>
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
                content.style.marginLeft = "100px";
                toggleButton.style.marginLeft = "none";
                content.style.width = "70vw";
               

            } else {
                content.style.marginLeft = "300px"; // Adjust this value to match the sidebar width
                toggleButton.style.marginLeft = "block"; // Adjust this value to match the sidebar width
            }
        }

        function showLogoutConfirmation() {
            const confirmed = confirm("Are you sure you want to log out?");
            if (confirmed) {
                window.location.href = "logout.php";
            }
        }
    </script>
</body>

</html>