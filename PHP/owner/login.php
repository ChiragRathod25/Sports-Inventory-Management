<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    
    .form {
        width: 300px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px #000;
    }
    
    .form h1 {
        text-align: center;
        color: #333;
    }
    
    .form input[type="text"], .form input[type="email"], .form input[type="password"] {
        width: 90%;
        padding: 10px;
        margin: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        /* position: absolute; */
    }
    
    .form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #5cb85c;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .form input[type="submit"]:hover {
        background-color: #4cae4c;
    }   

</style>
</head>
<body>
<?php
require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['owneruser'] = $username;
	    header("Location: sports.php");
         }else{
	    echo "<script>alert(`Incorrect Username/Password`);
        window.location.href = 'login.php';</script>";
	}
}else{
?>
<!-- <h1>hi</h1> -->
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered User?<a href='registration.php'>Register Here</a></p>
<p>Visit Website <a href='../../'>HT Sports</a></p>
</div>
<?php } ?>
</body>
</html>