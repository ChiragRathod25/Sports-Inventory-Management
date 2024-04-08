<?php
$hostname = 'localhost'; // your hostname
$username = 'root'; // your username
$password = ''; // your password
$dbname = 'sports-inventory-management'; // your database name

// Create connection
$con = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
