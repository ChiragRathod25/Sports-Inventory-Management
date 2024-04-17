<?php

$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
require('Registration_and_Login/checkuser.php');
// echo "here";
$customer_id = $_SESSION['username'];

// Get the cart_id for the current user
$sqlquery = "SELECT cart_id FROM `cart` WHERE customer_id = '$customer_id'";
$result = mysqli_query($connect, $sqlquery);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $cart_id = $row['cart_id'];

    // Get all items in the cart
    $sqlquery = "SELECT * FROM `cart_items` WHERE cart_id = '$cart_id'";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Product ID</th><th>Quantity</th><th>Last Modified</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['product_id'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['last_modified'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No items in cart";
    }
} else {
    echo "No cart found for user";
}
?>