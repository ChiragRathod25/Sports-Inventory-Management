<?php
$servername = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$dbname = "Sports-Inventory-Management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>