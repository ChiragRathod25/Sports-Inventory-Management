<?php
$server="localhost";
$username="root";
$password="";
$database = "Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
<<<<<<< HEAD
=======
$conn=$connect;
$con=$connect;
>>>>>>> 8445a1f (delete-add-validation fix)
?>