<?php
require ('db.php');
require ('checkuser.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports and its categories</title>
    <link rel="stylesheet" href="../../CSS/owner/owner.css">
    <link rel="stylesheet" href="../../CSS/owner/sports.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>

<body>
    <!--Grid-Container Start-->
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

        <!--Main-Container Start-->
        <main class="main-container">
            <!-- MAIN CONTAINER -->
            <?php
            // Fetch sports and their categories
            $sql = "SELECT s.sport_id, s.name AS sport_name, c.category_id, c.name AS category_name
        FROM sport s
        INNER JOIN category c ON s.sport_id = c.sport_id
        ORDER BY s.name, c.name";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $current_sport = "";
                echo "<div class='container'>";
                while ($row = $result->fetch_assoc()) {
                    $sport_name = ucfirst(strtolower($row["sport_name"])); // Capitalize first letter of each word
                    $category_name = ucfirst(strtolower($row["category_name"])); // Capitalize first letter of each word
                    $sport_id = $row["sport_id"];
                    $category_id = $row["category_id"];

                    // If it's a new sport, display its name
                    if ($sport_name != $current_sport) {
                        if ($current_sport != "") {
                            echo "</ul>"; // Close the previous sport's category list
                        }
                        echo "<ul><h1>$sport_name</h1>"; // Start a new sport's category list
                        $current_sport = $sport_name;
                    }

                    // Display category under the current sport with a link to view products related to that category
                    echo "<li><a href='/PHP/owner/myProducts.php?category_id=$category_id'>$category_name</a></li>";
                }
                echo "</ul>"; // Close the last sport's category list
                echo "</div>"; // Close the container
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
            <div class="btn">
                <a onclick='window.open("./sportAdd.php")'><button class="add-btn">Add Sports</button></a>
                <a onclick='window.open("./categoryAdd.php")'><button class="add-btn">Add Category</button></a>
                <a onclick='window.open("./productAdd.php")'><button class="add-btn">Add Product</button></a>
            </div>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->

    <script src="../../JS/headerFooter.js"></script>
    <script src="../../JS/default.js"></script>
</body>

</html>