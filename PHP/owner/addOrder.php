<?php
$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM sport ORDER BY sport_id";
$sports = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../../CSS/owner/owner.css">
    <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
    <style>
        #purchaseOrderForm {
            width: 40%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        #purchaseOrderForm label {
            display: block;
            margin-bottom: 5px 0;
        }

        #purchaseOrderForm input[type="text"],
        #purchaseOrderForm select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #purchaseOrderForm button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            margin-bottom: 5px;
        }
        #contractStartDate,#contractEndDate{
            font-size: 20px;
            border-radius: 3px;
            color: black;
        }
        #purchaseOrderForm button:hover {
            background-color: #0056b3;
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Add Purchase Order</title>
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
            <section>

                <!-- New Purchase Order Add -->
                <form method="POST" id="purchaseOrderForm" onsubmit="return validateForm()">
                    <label for="gstin">GSTIN:</label>
                    <input type="text" name="gstin" id="gstin" required>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                    <label for="suppliedItemId">Supplied Item Id:</label>
                    <input type="text" name="suppliedItemId" id="suppliedItemId" required>
                    <label for="suppliedQuantity">Supplied Quantity:</label>
                    <input type="text" name="suppliedQuantity" id="suppliedQuantity" required>
                    <label for="unitCost">Unit Cost:</label>
                    <input type="text" name="unitCost" id="unitCost" required>
                    <label for="contractStartDate">Contract Start Date:</label>
                    <input type="date" placeholder="YYYY-MM-DD" name="contractStartDate" id="contractStartDate"
                        required>
                    <label for="contractEndDate">Contract End Date:</label>
                    <input type="date" placeholder="YYYY-MM-DD" name="contractEndDate" id="contractEndDate" required>
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" required>
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" required>
                    <label for="emailId">Email Id:</label>
                    <input type="text" name="emailId" id="emailId" required>
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                    </select>
                    <button type="submit">Submit</button>
                </form>
                <?php
                $server = "localhost";
                $username = "root";
                $password = "Sports@Inv2937";
                $database = "Sports-Inventory-Management";

                $connect = mysqli_connect($server, $username, $password, $database);
                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $gstin = $_POST["gstin"];
                    $name = $_POST["name"];
                    $suppliedItemId = $_POST["suppliedItemId"];
                    $suppliedQuantity = $_POST["suppliedQuantity"];
                    $unitCost = $_POST["unitCost"];
                    $contractStartDate = $_POST["contractStartDate"];
                    $contractEndDate = $_POST["contractEndDate"];
                    $address = $_POST["address"];
                    $phoneNumber = $_POST["phoneNumber"];
                    $emailId = $_POST["emailId"];
                    $status = $_POST["status"];

                    $sql = "INSERT INTO purchase_order (GSTIN, Name, Supplied_Item_Id, Supplied_Quantity, Unit_Cost, Contract_Start_Date, Contract_End_Date, Address, Phone_Number, Email_Id, Status) 
                    VALUES ('$gstin', '$name', '$suppliedItemId', '$suppliedQuantity', '$unitCost', '$contractStartDate', '$contractEndDate', '$address', '$phoneNumber', '$emailId', '$status')";

                    if (mysqli_query($connect, $sql)) {
                        echo "<script>alert('Added Successfully!');</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                    }
                }
                ?>


            </section>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->
    <!--Script-->
    <!--ApexCharts-->
</body>
<script src="../../JS/Owner/orderValidation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.46.0/apexcharts.min.js"></script>
<script src="../../JS/Owner/dash_board.js"></script>
<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>

</html>