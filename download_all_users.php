<?php
include 'db_connection.php';

$queryAllUsers = "SELECT * FROM addusers";
$resultAllUsers = mysqli_query($connection, $queryAllUsers);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="all_users.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Full Name',  'Start Date', 'End Date', 'Fee', 'Status', 'City', 'Phone Number'));

while ($row = mysqli_fetch_assoc($resultAllUsers)) {
    fputcsv($output, $row);
}

fclose($output);
?>
