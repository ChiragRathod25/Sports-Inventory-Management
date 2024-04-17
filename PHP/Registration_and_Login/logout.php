<?php
session_start();

if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
    header("Location: /Sports-Inventory-Management/");
    exit();
}else {
    echo "<script>alert(`Logged Out Successfully !!`);
    window.location.href='../../';</script>";
}
?>