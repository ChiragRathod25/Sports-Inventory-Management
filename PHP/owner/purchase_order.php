<?php
require('db.php');
require('checkuser.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../CSS/owner/owner.css">
    <link rel="stylesheet" href="../../CSS/owner/purchase_order.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Purchase Order</title>
</head>
<?php
require('checkuser.php');
?>
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
            <owner-sidebar></owner-sidebar>
        </aside>
        <!--Sidebar End-->

        <!--Main-Container Strat-->
        <main class="main-container">
            <!-- MAIN CONTAINER -->
            <div class="container">
                <h1 class="table-title">Pending Orders</h1>
                <table class="tbl">
                    <tr class="header">
                        <th>No</th>
                        <th>GSTIN</th>
                        <th>Name</th>
                        <th>Supplied Item Id</th>
                        <th>Supplied Quantity</th>
                        <th>Unit Cost</th>
                        <th>Contract Start Date</th>
                        <th>Contract End Date</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Id</th>
                        <th>Remove</th>
                    </tr>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "Sports@Inv2937";
                        $dbname = "Sports-Inventory-Management";
                        
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM purchase_order WHERE status = 'Pending'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row['GSTIN'] . "</td>";
                                echo "<td>" . $row['Name'] . "</td>";
                                echo "<td>" . $row['Supplied_Item_Id'] . "</td>";
                                echo "<td>" . $row['Supplied_Quantity'] . "</td>";
                                echo "<td>" . $row['Unit_Cost'] . "</td>";
                                echo "<td>" . $row['Contract_Start_Date'] . "</td>";
                                echo "<td>" . $row['Contract_End_Date'] . "</td>";
                                echo "<td>" . $row['Address'] . "</td>";
                                echo "<td>" . $row['Phone_Number'] . "</td>";
                                echo "<td>" . $row['Email_Id'] . "</td>";
                                echo "<td class='remove'><span class='material-symbols-outlined text-blue'>delete</span></td>";
                                echo "</tr>";
                                $count++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <h1 class="table-title">Completed Orders</h1>
                <table class="tbl">
                    <tr class="header">
                        <th>No</th>
                        <th>GSTIN</th>
                        <th>Name</th>
                        <th>Supplied Item Id</th>
                        <th>Supplied Quantity</th>
                        <th>Unit Cost</th>
                        <th>Contract Start Date</th>
                        <th>Contract End Date</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Id</th>
                        <th>Remove</th>
                    </tr>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "Sports@Inv2937";
                        $dbname = "Sports-Inventory-Management";
                        
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM purchase_order WHERE status = 'Completed'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row['GSTIN'] . "</td>";
                                echo "<td>" . $row['Name'] . "</td>";
                                echo "<td>" . $row['Supplied_Item_Id'] . "</td>";
                                echo "<td>" . $row['Supplied_Quantity'] . "</td>";
                                echo "<td>" . $row['Unit_Cost'] . "</td>";
                                echo "<td>" . $row['Contract_Start_Date'] . "</td>";
                                echo "<td>" . $row['Contract_End_Date'] . "</td>";
                                echo "<td>" . $row['Address'] . "</td>";
                                echo "<td>" . $row['Phone_Number'] . "</td>";
                                echo "<td>" . $row['Email_Id'] . "</td>";
                                echo "<td class='remove'><span class='material-symbols-outlined text-blue'>delete</span></td>";
                                echo "</tr>";
                                $count++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="add">
                    <a href="/PHP/owner/addOrder.php"><button class="add-btn">Add Order</button></a>
                </div>
            </div>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->
</body>

<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>

</html>
