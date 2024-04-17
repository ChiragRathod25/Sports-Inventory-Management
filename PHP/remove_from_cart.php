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

if(isset($_POST['remove'])) {
    $product_id = $_POST['product_id'];
    $cart_id = $_POST['cart_id'];

    // Remove the item from the cart
    $sqlquery = "DELETE FROM `cart_items` WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
    if (mysqli_query($connect, $sqlquery)) {
        echo "<script>alert('Item removed from cart');
        window.location.href=document.referrer;
        </script>";

    } else {
        die("Error: " . mysqli_error($connect));
    }
}
?>