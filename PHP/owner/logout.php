<?php
session_start();

if(isset($_SESSION['owneruser']))
{
    unset($_SESSION['owneruser']);
    header("Location: login.php");
    exit();
}
    else {
        echo "<script>alert(`Logged Out Successfully !!`);
        window.location.href='login.pp';</script>";
    }
?>