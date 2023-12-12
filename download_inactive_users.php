<?php
include 'db_connection.php';

$queryActiveUsers = "SELECT * FROM addusers WHERE status = 'inactive'";
$resultActiveUsers = mysqli_query($connection, $queryActiveUsers);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="inactive_users.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Full Name',  'Start Date', 'End Date', 'Fee', 'Status', 'City', 'Phone Number'));

while ($row = mysqli_fetch_assoc($resultActiveUsers)) {
    fputcsv($output, $row);
}

fclose($output);
?>
