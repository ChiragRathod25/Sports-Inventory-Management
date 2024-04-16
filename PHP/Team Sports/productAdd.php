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

            <label for="sport">Select Sport : </label>
            <select name="sport" id="sport"   onchange="updateCategories(this.value)" > 
                <?php
            $sql = "SELECT * FROM sport ORDER BY sport_id";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"" . $row["sport_id"] . "\"" . (isset($_POST['sport']) && $_POST['sport'] == $row["sport_id"] ? " selected" : "") . ">" . $row["name"] . "</option>";
            }
            ?>
        </select>
        
        <a target="_blank" onclick='window.open("./sportAdd.php")'><button>Add Sports</button></a>
            <label for="category">Select Category : </label>
            <select name="category" id="category">
                <?php
            if (isset($_GET['sport_id'])) {
                $sportId = $_GET['sport_id'];
                $sql = "SELECT * FROM category WHERE sport_id = '$sportId' ORDER BY category_id";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=\"" . $row["category_id"] . "\">" . $row["name"] . "</option>";
                    }
                } else {
                    echo "<option>No Category found</option>";
                }
            }
            ?>
        </select>
        <a target="_blank" onclick='window.open("./categoryAdd.php")'><button>Add Category</button></a> 
        
        <label for="brand">Select Brand : </label>
        <select name="brand" id="brand">
            <?php
            $sql = "SELECT * FROM brand ORDER BY brand_id";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"" . $row["brand_id"] . "\">" . $row["name"] . "</option>";
            }
            ?>
        </select>
        <a target="_blank" onclick='window.open("./brandAdd.php")'><button>Add Brand</button></a> 
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name">
            
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01">
           
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
       
        <label for="image">Images of Product : </label>
        <input type="file" id="image" name="image[]" accept="image/*" multiple>
        
        <div id="specificationsContainer" class="flex-column"></div>
        <button type="button" id="addSpecification">Add Specification</button>
            
        <button type="submit" id="submit">Submit</button>

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