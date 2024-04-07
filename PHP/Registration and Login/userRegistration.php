<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sports-inventory-management";

// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}


        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $gender =  $_REQUEST['gender'];
        $address = $_REQUEST['address'];
 $email = $_REQUEST['email'];

$sqlquery = "INSERT INTO user VALUES 
	('John', 'Doe', 'john@example.com')"

if ($conn->query($sql) === TRUE) {
	echo "record inserted successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
