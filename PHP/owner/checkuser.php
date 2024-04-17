<?php
session_start();
if(!isset($_SESSION["owneruser"])){
    echo "<script>alert(`You are not logged in. Please login to access this page.`);</script>";
    header("Location: login.php");
exit(); }
?>