<?php
require('../dbconnect.php');
?>
<?php


// Fetch data from the database
$sql="SELECT * FROM sport ORDER BY sport_id";
$sports=mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product ADD PHP</title>
    
    <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
    
    <link rel="stylesheet" href="../../CSS/Team Sports/productAdd.css" />
</head>
<body>
    <my-header>
    </my-header>
    <section>
     <form method="POST" id="productAddForm" onsubmit="return validateForm(this)" action="./validateProductAddForm.php">
        
    </form>
    </section>
    <my-footer>
    </my-footer>
    
</body>

<script src="../../JS/headerFooter.js"></script>
  <script src="../../JS/default.js"></script>
  
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

  <script src="../../JS/Team Sports/productAdd.js"></script>

</html>