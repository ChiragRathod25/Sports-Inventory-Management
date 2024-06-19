<?php
require('../dbconnect.php');
?>
<?php

require ('checkuser.php');

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
    <link rel="stylesheet" href="../../CSS/owner/owner.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="grid-container">
        <!--Header Start-->
        <header class="flex-row">
            <div class="header-left">
                <input type="search" placeholder="search..." class="search" />
                <span class="material-symbols-outlined ">
                    search
                </span>
            </div>
            <div class="header-right">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
                <span class="material-symbols-outlined">
                    notifications
                </span>
                <span class="pro-pic">
                    <img src="../../CSS/owner/pro_pic.jpeg" alt="">
                </span>
            </div>
        </header>
        <!--Header End-->
        <!--Sidebar Start-->
        <aside id="sidebar">
            <owner-sidebar></owner-sidebar>
        </aside>    
        <!--Sidebar End-->
        <!--Main-Container Strat-->
        <main class="main-container">
            <section>
                <form method="POST" id="productAddForm" onsubmit="return validateForm(this)"
                    action="./validateProductAddForm.php" enctype="multipart/form-data">

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
                    <div id="variantsContainer" class="flex-column"></div>
                    <button type="button" id="addVariant">Add Variant</button>

                    <div id="specificationsContainer" class="flex-column"></div>
                    <button type="button" id="addSpecification">Add Specification</button>

                    <button type="submit" id="submit">Submit</button>
                </form>
            </section>
        </main>
        <!--Main-Container End-->
    </div>
</body>

<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>
<script src="../../JS/Team Sports/productAdd.js"></script>

</html>