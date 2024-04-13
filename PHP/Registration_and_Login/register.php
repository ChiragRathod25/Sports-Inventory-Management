<?php

    $server="localhost";
    $username="root";
    $password="";
    $database = "sport-inventory-management-shop";

    $connect=mysqli_connect($server,$username,$password,$database);
    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }

        $first_name =  $_REQUEST['fname'];
        $last_name = $_REQUEST['lname'];
        $address = $_REQUEST['address'];
        $mobileNumber = $_REQUEST['mobileNumber'];
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password =  $_REQUEST['password'];

        $sqlquery ="INSERT INTO customer (customer_id, first_name, last_name, address, phone_number, email, password) VALUES 
        ('$username','$first_name', '$last_name', '$address', '$mobileNumber', '$email', '$password')";

    if ($connect->query($sqlquery) === TRUE) {
	    echo "record inserted successfully";
    } else {
	    echo "Error: " . $sqlquery . "<br>" . $conn->error;
    }
?>