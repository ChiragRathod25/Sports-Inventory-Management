<!DOCTYPE html>
<html>
<meta charset="utf-8">
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

if (isset($_REQUEST['username'])){
    if($_REQUEST['ownerkey'] == "owner@sports_123"){
            
    }
    else{
        echo "<script>alert(`Invalid Owner Key !! \n You can't register`);</script>";
        echo "<script>window.location.href='registration.php';</script>";
    }
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
        echo "failed";
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="text" name="ownerkey" placeholder="ownerkey" required />
<input type="submit" name="submit" value="Register" />
</form>
<p>Already Registered User ? <a href='login.php'>Login Here</a></p>
<p>Visit Website <a href='../../'>HT Sports</a></p>
</div>
<?php } ?>
</body>
</html>
