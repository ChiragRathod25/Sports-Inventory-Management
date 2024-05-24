<?php
require('dbconnect.php');
?>
<?php
session_start();

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