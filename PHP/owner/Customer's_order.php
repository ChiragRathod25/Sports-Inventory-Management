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
    <title>Customer's Orders</title>
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
                        <th>Id</th>
                        <th>Name</th>
                        <th>Order Id</th>
                        <th>Order Amount</th>
                        <th>Order Date</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Id</th>
                        <th>Remove</th>
                    </tr>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username = "root";
                        $password = "Sports@Inv2937";
                        $database = "Sports-Inventory-Management";
                        $connect = mysqli_connect($server, $username, $password, $database);
                        if (!$connect) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetching pending orders
                        $sql = "SELECT c.customer_id, CONCAT(c.first_name, ' ', c.last_name) AS name, o.order_id, SUM(p.price * oi.quantity) AS order_amount, o.order_date, c.address, c.phone_number, c.email
                                FROM customer c
                                JOIN orders o ON c.customer_id = o.customer_id
                                JOIN order_items oi ON o.order_id = oi.order_id
                                JOIN product p ON oi.product_id = p.product_id
                                WHERE o.status = 'Pending'
                                GROUP BY o.order_id";
                        $result = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['order_id'] . "</td>";
                                echo "<td>" . $row['order_amount'] . "</td>";
                                echo "<td>" . $row['order_date'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['phone_number'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td class='remove'><span class='material-symbols-outlined text-blue'>delete</span></td>";
                                echo "</tr>";
                                $count++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Completed Orders Table -->
                <!-- Your code for completed orders table here -->
            </div>
        </main>
        <!--Main-Container End-->
    </div>
    <!--Grid-Container End-->
</body>

<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>
</html>
