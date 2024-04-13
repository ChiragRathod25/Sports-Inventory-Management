<?php
$servername = "4.156.24.161";
$username = "root";
$password = "Sports@Inv2937";
$dbname = "Sports-Inventory-Management";

// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}


        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['fname'];
        $last_name = $_REQUEST['lname'];
        $address = $_REQUEST['address'];
        $mobileNumber = $_REQUEST['mobileNumber'];
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password =  $_REQUEST['password'];
$sqlquery = "INSERT INTO user (first_name, last_name, address, Mobile_number, username, email, password) VALUES 
	('$first_name', '$last_name', '$address', '$mobileNumber', '$username', '$email', '$password')";

if ($conn->query($sqlquery) === TRUE) {
	echo "record inserted successfully";
} else {
	echo "Error: " . $sqlquery . "<br>" . $conn->error;
}
