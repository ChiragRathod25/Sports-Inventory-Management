
<?php
$server="localhost";
$username="root";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM customer";
// $result = mysqli_query($connect, $sql);

$sql="SELECT * FROM sport ORDER BY sport_id";
$sports=mysqli_query($connect,$sql);


// Function to escape special characters in HTML
// function escape($string) {
    // return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category ADD PHP</title>
    
    <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #brandForm {
            width: 40%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        #brandForm label {
            display: block;
            margin-bottom: 5px 0;
        }

        #brandForm input[type="text"],
        #brandForm select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #brandForm button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            margin-bottom: 5px ;
        }

        #brandForm button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <my-header>
    </my-header>
    <section>
    
    <!-- New Brand Add -->
     <form method="POST" id="brandForm">
        <label for="brandName">Category Name:</label>
        <input type="text" name="brandName" id="brandName" required>
        <select name="sport" id="sport">
            <?php
            

if(mysqli_num_rows($sports)>0){
    while($row=mysqli_fetch_assoc($sports)){
        echo "<option>" . $row["name"]. "</option>";
    }
}
else{
    echo "No sports found";
}


?>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?php
$server="localhost";
$username="root";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

    $connect=mysqli_connect($server,$username,$password,$database);
    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brandName = strtoupper($_POST["brandName"]); 
        $selectedSport=$_POST['sport'];
        
        $sql="SELECT sport_id FROM sport as sport_id WHERE name = '$selectedSport'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $sport_id = $row['sport_id'];

        $sql = "SELECT MAX(category_id) as categoryID FROM category";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $categoryID = $row['categoryID'];
        $categoryID++;
        // Insert data into the database
        $sql = "INSERT INTO category (name,sport_id,category_id ) VALUES ('$brandName','$sport_id','$categoryID')";
        if (mysqli_query($connect, $sql)) {
            echo "Category successfully added for sports ID : " . $sport_id;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
?>

    </section>
    <my-footer>
    </my-footer>
</body>

<script src="../../JS/headerFooter.js"></script>
  <script src="../../JS/default.js"></script>
</html>