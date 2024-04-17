<?php
session_start();
$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = stripslashes($_REQUEST['username']);
$username = mysqli_real_escape_string($connect,$username);

//$password= $_REQUEST['password'];
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($connect,$password);

//$query = "SELECT * FROM `users` WHERE username='$username'
//and password='".md5($password)."'";

$sqlquery = "SELECT * FROM `customer` WHERE customer_id = '$username' AND password='".md5($password)."'";

$result = mysqli_query($connect, $sqlquery) or die(mysqli_error());
if (mysqli_num_rows($result) == 1) {
    echo "<script>alert(`successfully Login !!`);</script>";
    $_SESSION['username'] = $username;
    header("Location: ../../");
    exit();
} else {
    echo mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    echo '<pre>'; print_r($row); echo '</pre>';
   
    echo $username;
    echo $password;
    header("Location: cust_login.php?error=Invalid username and password");
    exit();
}

mysqli_close($connect);
?>
