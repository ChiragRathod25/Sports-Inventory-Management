<?php
$servername = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$dbname = "Sports-Inventory-Management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

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