
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
$sql = "SELECT * FROM sport";
// $result = mysqli_query($connect, $sql);

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
    <title>Sport ADD PHP</title>
    
    <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
</head>
<body>
    <my-header>
    </my-header>
    <section>
    
    <!-- New Brand Add -->
     <form method="POST" id="brandForm">
        <label for="sport">Sport Name:</label>
        <input type="text" name="sportName" id="sportName" required>
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
        $sportName = strtoupper($_POST["sportName"]); 
       
        $sql = "SELECT MAX(sport_id) as sport_id FROM sport";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $sport_id = $row['sport_id'];
        $sport_id++;
        // Insert data into the database
        $sql = "INSERT INTO sport (name,sport_id) VALUES ('$sportName','$sport_id')";
        if (mysqli_query($connect, $sql)) {
            echo "Sport added successfully with sport ID: " . $sport_id;
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