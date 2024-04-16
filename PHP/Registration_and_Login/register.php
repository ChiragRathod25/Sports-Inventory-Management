<?php
$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database="Sports-Inventory-Management";
$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$first_name = $_REQUEST['fname'];
$last_name = $_REQUEST['lname'];
$address = $_REQUEST['address'];
$mobileNumber = $_REQUEST['mobileNumber'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// Check if the username already exists
$check_username_query = "SELECT * FROM customer WHERE customer_id = '$username'";
$check_username_result = mysqli_query($connect, $check_username_query);
if (mysqli_num_rows($check_username_result) > 0) {
    echo "not_available";
} else {
    // Insert new record if the username is available
    $sqlquery = "INSERT INTO customer (customer_id, first_name, last_name, address, phone_number, email, password) VALUES 
    ('$username','$first_name', '$last_name', '$address', '$mobileNumber', '$email', '$password')";

    if (mysqli_query($connect, $sqlquery)) {
        echo "success";
    } else {
        echo "Error: " . $sqlquery . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
