<?php
session_start();

$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sqlquery = "SELECT * FROM customer WHERE customer_id = '$username' AND password = '$password'";
$result = mysqli_query($connect, $sqlquery);

if (mysqli_num_rows($result) == 1) {
    header("Location: ../../HTML/after_login.html");
    exit();
} else {
    header("Location: cust_login.php?error=Invalid username and password");
    exit();
}

mysqli_close($connect);
?>
