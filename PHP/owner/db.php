<?php
<<<<<<< HEAD
$server="localhost";
$username="jxeymueq_Sports-Inventory-Management";
$password="a6]1yM5:t3wQXF";
$database = "jxeymueq_Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
$conn=$connect;
$con=$connect;
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
=======
require('../database_connection.php');
$conn=$connect;
$con=$connect;
>>>>>>> 8445a1f (delete-add-validation fix)
?>