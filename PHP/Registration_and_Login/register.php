<?php

    $server="localhost";
    $username="root";
    $password="";
    $database = "sport-inventory-management-shop";

    $connect=mysqli_connect($server,$username,$password,$database);
    if($connect){
        echo "Yess..";
    }
    else{
        die("Connection failed: " . mysqli_connect_error());
    }
?>