<?php
$server="localhost";
$username="root";
$password="";
$database = "sport-inventory-management-shop";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM customer";
$result = mysqli_query($connect, $sql);

// Function to escape special characters in HTML
function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../CSS/owner/owner.css">
    <link rel="stylesheet" href="../../CSS/owner/Customer.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Customer</title>
</head>

<body>
    <!--Grid-Container Strat-->
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

        <!--Main-Container Strat-->
        <main class="main-container">
            <!-- MAIN CONTAINER -->
            <div class="container">
                <h1 class="table-title">Customers</h1>
                <table class="tbl">
                    <tr class="header">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Remove</th>
                    </tr>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . escape($row["customer_id"]) . "</td>";
                                echo "<td>" . escape($row["first_name"]) . "</td>";
                                echo "<td>" . escape($row["last_name"]) . "</td>";
                                echo "<td>" . escape($row["address"]) . "</td>";
                                echo "<td>" . escape($row["phone_number"]) . "</td>";
                                echo "<td>" . escape($row["email"]) . "</td>";
                                echo "<td>" . escape($row["password"]) . "</td>";
                                echo "<td class='remove'><span class='material-symbols-outlined text-blue'>delete</span></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No customers found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->
</body>


<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>

</html>
