<?php
$server="localhost";
$username="root";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

?>