<?php
$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";
$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
require('checkuser.php');

$sql = "SELECT * FROM sport ORDER BY sport_id";
$sports = mysqli_query($connect, $sql);
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
     <form method="POST" id="productAddForm" onsubmit="return validateForm(this)" action="./validateProductAddForm.php" enctype="multipart/form-data">

            <label for="sport">Select Sport:</label>
            <select name="sport" id="sport" onchange="updateCategories(this.value)"> 
                <?php
                while ($row = mysqli_fetch_assoc($sports)) {
                    echo "<option value=\"" . $row["sport_id"] . "\"" . (isset($_POST['sport']) && $_POST['sport'] == $row["sport_id"] ? " selected" : "") . ">" . $row["name"] . "</option>";
                }
                ?>
            </select>
        
        <a target="_blank" onclick='window.open("./sportAdd.php")'><button>Add Sports</button></a>
        
        <label for="category">Select Category:</label>
        <select name="category" id="category"></select>
        <a target="_blank" onclick='window.open("./categoryAdd.php")'><button>Add Category</button></a> 
        
        <label for="brand">Select Brand:</label>
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
       
        <label for="image">Images of Product:</label>
        <input type="file" id="image" name="image[]" accept="image/*" multiple>
        
        <!-- Add fields for selecting sizes, colors, and quantities -->
        <div id="variantsContainer" class="flex-column">
       
        <div id="variantsContainer" class="flex-column">
        <div class="flex-row" style="gap:5px;">
        <div><label for="size0">Size:</label><input type="text" id="size0" name="variants[0][size]" required></div>
        <div><label for="color0">Color:</label><input type="text" id="color0" name="variants[0][color]" required></div>
        <div><label for="quantity0">Quantity:</label><input type="number" id="quantity0" name="variants[0][quantity]" required>
        </div>
        </div>
        </div>

        </div>
        <button type="button" id="addVariant">Add Variant</button>
        
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
<script src="../../JS/Team Sports/productAdd.js"></script>
</html>