<?php
// $servername = "4.156.24.161";
// $username = "root";
// $password = "Sports@Inv2937";
// $dbname = "Sports-Inventory-Management";
// $port=3306;

$servername = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$dbname = "Sports-Inventory-Management";
$port=3306;

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// $conn = new PDO("sqlsrv:server = tcp:sports-inventory-management.database.windows.net,1433; Database = Sports-Inventory-Management", "SportsHT29", "Sports@Inv2937");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
