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
            <div class="sidebar-title">
                <div class="sidebar-logo">
                    <span class="logo">
                        <img src="../../CSS/logos/logo4.jpeg" alt="">
                    </span>Hit Inventory
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        bar_chart_4_bars
                    </span><a href="/HTML/Owner/owner_page.html">Dashboard</a>
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        category
                    </span><a href="/HTML/Owner/category.html">Category</a>
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        account_box
                    </span><a href="/HTML/Owner/Customer.html">Customers</a>
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        add_shopping_cart
                    </span><a href="/HTML/Owner/purchase_order.html">Purchase Orders</a>
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        add_shopping_cart
                    </span><a href="/HTML/Owner/Customer's_order.html">Customer's Orders</a>
                </li>
                <!-- <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        settings
                    </span>Setting
                </li> -->
            </ul>
        </aside>
        <!--Sidebar End-->

        <!--Main-Container Start-->
        <main class="main-container">
            <!-- MAIN CONTAINER -->
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "Sports@Inv2937";
            $dbname = "Sports-Inventory-Management";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch sports and their categories
            $sql = "SELECT s.name AS sport_name, c.name AS category_name
                    FROM sport s
                    INNER JOIN category c ON s.sport_id = c.sport_id
                    ORDER BY s.name, c.name";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $current_sport = "";
                echo "<div class='container'>";
                while($row = $result->fetch_assoc()) {
                    $sport_name = ucfirst(strtolower($row["sport_name"])); // Capitalize first letter of each word
                    $category_name = ucfirst(strtolower($row["category_name"])); // Capitalize first letter of each word
                    
                    // If it's a new sport, display its name
                    if ($sport_name != $current_sport) {
                        if ($current_sport != "") {
                            echo "</ul>"; // Close the previous sport's category list
                        }
                        echo "<ul><h1>$sport_name</h1>"; // Start a new sport's category list
                        $current_sport = $sport_name;
                    }
                    
                    // Display category under the current sport
                    echo "<li><a href='/HTML/product/$sport_name/$category_name.html'>$category_name</a></li>";
                }
                echo "</ul>"; // Close the last sport's category list
                echo "</div>"; // Close the container
            } else {
                echo "0 results";
            }
            
            $conn->close();
            ?>
            <div class="btn">
            <a  onclick='window.open("../Team Sports/sportAdd.php")'><button  class="add-btn" >Add Sports</button></a>
            <a  onclick='window.open("../Team Sports/categoryAdd.php")'><button  class="add-btn" >Add Category</button></a> 
            </div>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->

    <script src="../../JS/headerFooter.js"></script>
    <script src="../../JS/default.js"></script>
</body>

</html>
