<?php
require('../dbconnect.php');
?>
<?php


// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
// $mobileNumber = $_POST['mobileNumber'];
$password = $_POST['password'];
$address = $_POST['address']; // Added this line
// Prepare an insert statement
// $sql = "INSERT INTO user (First_name, Last_name, Address, Mobile_number, Username, Email, Password) VALUES (fname, lname, address, mobileNumber, username, email, password)";

        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['fname'];
        $last_name = $_REQUEST['lname'];
        $address = $_REQUEST['address'];
        $mobileNumber = $_REQUEST['mobileNumber'];
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password =  $_REQUEST['password'];
// $sqlquery = "INSERT INTO user (first_name, last_name, address, Mobile_number, username, email, password) VALUES 
// 	('$first_name', '$last_name', '$address', '$mobileNumber', '$username', '$email', '$password')";

$sqlquery ="INSERT INTO customer (customer_id, first_name, last_name, address, phone_number, username, email, password) VALUES 
('$first_name', '$last_name', '$address', '$mobileNumber', '$username', '$email', '$password')";


$sql = "INSERT INTO user (First_name, Last_name, Address, Username, Email, Password) VALUES (?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$stmt->bind_param("ssssss", $fname, $lname, $address, $username, $email, $hashedPassword);


if ($stmt->execute()) {
        echo "Record inserted successfully";
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
$stmt->close();
$conn->close();
}
?>