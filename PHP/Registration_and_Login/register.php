<?php
$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database="Sports-Inventory-Management";
$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$first_name= stripslashes($_REQUEST['fname']);
$first_name = mysqli_real_escape_string($connect,$first_name);

$last_name = stripslashes($_REQUEST['lname']);
$last_name = mysqli_real_escape_string($connect,$last_name);

$address = $_REQUEST['address'];
$address = stripslashes($address);
$address = mysqli_real_escape_string($connect,$address);

$mobileNumber = stripslashes($_REQUEST['mobileNumber']);
$mobileNumber = mysqli_real_escape_string($connect,$mobileNumber);

$username = stripslashes($_REQUEST['username']);
$username = mysqli_real_escape_string($connect,$username);

$email = stripslashes($_REQUEST['email']);
$email = mysqli_real_escape_string($connect,$email);

$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($connect,$password);

$trn_date = date("Y-m-d H:i:s");

// Check if the username already exists
$check_username_query = "SELECT * FROM customer WHERE customer_id = '$username'";
$check_username_result = mysqli_query($connect, $check_username_query);
if (mysqli_num_rows($check_username_result) > 0) {
    echo "not_available";
} else {
    // Insert new record if the username is available
    $sqlquery = "INSERT INTO customer (customer_id, first_name, last_name, address, phone_number, email, password,registration_time) VALUES 
    ('$username','$first_name', '$last_name', '$address', '$mobileNumber', '$email', '".md5($password)."','$trn_date')";

    if (mysqli_query($connect, $sqlquery)) {
        echo "success";
    } else {
        echo "Error: " . $sqlquery . "<br>" . mysqli_error($connect);
    }
}

?>
