<?php
$server="localhost";
$username="jxeymueq_Sports-Inventory-Management";
$password="a6]1yM5:t3wQXF";
$database = "jxeymueq_Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
