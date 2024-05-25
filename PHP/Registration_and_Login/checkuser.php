<?php
session_start();
if(!isset($_SESSION["username"])){
    echo "<script>alert(`You are not logged in. Please login to continue`);
    window.location.href = '/HTML/Registration%20and%20Login/cust_login.html';
    </script>";
    exit();
}
?>