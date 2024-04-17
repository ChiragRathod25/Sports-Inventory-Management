<?php
session_start();

if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
    echo "<script>alert(`Logged Out Successfully !!`);
    window.location.href=document.referrer;
    </script>";
    exit();
}else {
    echo "<script>alert(`Logged Out Successfully !!`);
    window.location.href=document.referrer;
    </script>";
}
?>