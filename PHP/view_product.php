<?php
require('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../CSS/Home Page/header-footer.css" />
    <link rel="stylesheet" href="../CSS/viewCart.css" />

</head>
<body>
   <my-header></my-header> 
   <section>
       <?php

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
    echo "<h2>My Cart</h2>";
    // echo "Username : " .$customer_id;
    // echo "<br>"; 
       
    // Get all items in the cart
    $sqlquery = "SELECT cart_items.*, product_sizes.size, product_colors.color 
                 FROM `cart_items` 
                 INNER JOIN product_variants ON cart_items.variant_id = product_variants.variant_id 
                 INNER JOIN product_sizes ON product_variants.size_id = product_sizes.size_id 
                 INNER JOIN product_colors ON product_variants.color_id = product_colors.color_id 
                 WHERE cart_id = '$cart_id'";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' >";
        echo "<tr><th>Product ID</th><th>Size</th><th>Color</th><th>Quantity</th><th></th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $size = $row['size'];
            $color = $row['color'];

            // Get the product name from the product table
            $sqlquery = "SELECT name FROM `product` WHERE product_id = '$product_id'";
            $product_result = mysqli_query($connect, $sqlquery);
            if (mysqli_num_rows($product_result) > 0) {
                $product_row = mysqli_fetch_assoc($product_result);
                $name = $product_row['name'];
                echo "<tr><td>" . $name . "</td><td>" . $size . "</td><td>" . $color . "</td><td>" . $row['quantity'] . "</td>";
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
        
        echo "<div class='button-container'>";
        echo "<a class='button' href='/'>Home</a>";
        echo "<a class='button' href='/PHP/viewBill.php'>Review Bill</a>";
        echo "</div>";
     
    } else {
        echo "No items in cart<br>";
        echo "<a class='button' href='/'>Home Page</a>";
    }
    
} else {
    echo "No cart found for user";
}
?>
</section>
<my-footer></my-footer>
</body>
  <script src="../JS/headerFooter.js"></script>
  <script src="../JS/default.js"></script>
  </html>