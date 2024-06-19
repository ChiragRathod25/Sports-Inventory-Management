<?php
require('database_connection.php');  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER['REQUEST_METHOD']==="POST") {
    $fname=test_input($_REQUEST['fname']);
    $email=test_input($_REQUEST['email']);
    $msg=test_input($_REQUEST['msg']);
    
    $sql="INSERT INTO messages (name,email,message) VALUES ('$fname','$email','$msg')";
    $result=mysqli_query($connect,$sql);
    if($result) 
        echo '<script>alert(`Thank you for submitting your response`) </script>';
        echo "<script>window.location.href=document.referrer; </script>";
        
}
?>