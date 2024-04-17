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
    
    $customer_id = $_SESSION['username'];
    echo "Username : " .$customer_id;
    echo "<br>";    
    // Get all items in the cart
    $sqlquery = "SELECT * FROM `cart_items` WHERE cart_id = '$cart_id'";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' >";
        echo "<tr><th>Product ID</th><th>Quantity</th><th></th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];

            // Get the product name from the product table
            $sqlquery = "SELECT name FROM `product` WHERE product_id = '$product_id'";
            $product_result = mysqli_query($connect, $sqlquery);
            if (mysqli_num_rows($product_result) > 0) {
                $product_row = mysqli_fetch_assoc($product_result);
                $name = $product_row['name'];
                echo "<tr><td>" . $name . "</td><td>" . $row['quantity'] . "</td>";
                echo "<td><form action='remove_from_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $product_id . "'>";
                echo "<input type='hidden' name='cart_id' value='" . $cart_id . "'>";
                echo "<button type='submit' name='remove'>Remove</button>";
                echo "</form></td></tr>";
            } else {
                echo "Product not found";
            }
        }
        
        echo "</table>";
        echo "Click here to <a href='viewBill.php'>Review Bill</a><br>";
        echo "Click here for  <a href='/Sports-Inventory-management'>Home</a>";
    } else {
        echo "No items in cart<br>";
        echo "Click here for <a href='/Sports-Inventory-management'>Home Page</a>";
    }
} else {
    echo "No cart found for user";
}
?>