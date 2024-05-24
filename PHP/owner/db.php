<?php
$server="localhost";
$username="jxeymueq_Sports-Inventory-Management";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
$conn=$connect;
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
?>