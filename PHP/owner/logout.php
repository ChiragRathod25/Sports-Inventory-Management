<?php
session_start();

if(isset($_SESSION['owneruser']))
{
    unset($_SESSION['owneruser']);
    echo "<script>alert(`Logged Out Successfully !!`);
    window.location.href='login.php';</script>";
    exit();
}
    else {
        echo "<script>alert(` Login First !!`);
        window.location.href='login.php';</script>";
    }
?>