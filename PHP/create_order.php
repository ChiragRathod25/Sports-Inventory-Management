<?php
session_start();

$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['order_now'])) {
    $cart_id = $_POST['cart_id'];
    $customer_id = $_SESSION['username'];

    // Create a new order
    $sqlquery = "INSERT INTO `orders` (customer_id) VALUES ('$customer_id')";
    if (mysqli_query($connect, $sqlquery)) {
        $order_id = mysqli_insert_id($connect);

        // Get all items in the cart
        $sqlquery = "SELECT * FROM `cart_items` WHERE cart_id = '$cart_id'";
        $result = mysqli_query($connect, $sqlquery);
        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];

            // Add each item to the order
            $sqlquery = "INSERT INTO `order_items` (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
            mysqli_query($connect, $sqlquery);
        }

        // Remove items from cart
        $sqlquery = "DELETE FROM `cart_items` WHERE cart_id = '$cart_id'";
        mysqli_query($connect, $sqlquery);

        echo "Order created successfully<br>";
        echo "Click here for <a href='/Sports-Inventory-management'>Home Page</a>";

    } else {
        die("Error: " . mysqli_error($connect));
    }
}
?>