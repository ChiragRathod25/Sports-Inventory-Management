<?php
session_start();
// echo "hi";
if(isset($_SESSION["username"])){
    echo $_SESSION["username"];
}
else{
    echo "";
}
?> 