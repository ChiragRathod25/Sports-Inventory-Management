<?php
session_start();

$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "sport-inventory-management-shop";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sqlquery = "SELECT * FROM customer WHERE customer_id = '$username' AND password = '$password'";
$result = mysqli_query($connect, $sqlquery);

if (mysqli_num_rows($result) == 1) {
    // Username and password match, redirect to the account page
    header("Location: account_page.php");
    exit();
} else {
    // Username and password do not match, redirect back to the login page with an error message
    header("Location: cust_login.html?error=1");
    exit();
}

mysqli_close($connect);
?>
