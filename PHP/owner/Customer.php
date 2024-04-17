<?php

include '../database_connection.php';
$sql = "SELECT * FROM customer";

$result = $conn->query($sql);

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
            <div class="container">
                <h1 class="table-title">Customers</h1>
                <table class="tbl">
                    <tr class="header">
                        <th>No</th>
                        <th>User Name</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Id</th>
                    </tr>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row["customer_id"] . "</td>";
                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
                                echo "<td>" . $row["phone_number"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "</tr>";
                                $count++;
                            }
                        } else {
                            echo "<tr><td colspan='7'>0 results</td></tr>";
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

<?php
// Close the connection
$conn->close();
?>
