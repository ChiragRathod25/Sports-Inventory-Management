<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bill</title>
    <link rel="stylesheet" href="../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../CSS/Home Page/header-footer.css" />
    <link rel="stylesheet" href="../CSS/viewCart.css" />
    <style>

        
    </style>
</head>
<body>
   <my-header></my-header> 
   <section>
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
        echo "<tr><th>Product ID</th><th>Quantity</th><th>Price</th></tr>";
        $total_price=0;

        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];

            // Get the product name from the product table
            $sqlquery = "SELECT * FROM `product` WHERE product_id = '$product_id'";
            $product_result = mysqli_query($connect, $sqlquery);
            if (mysqli_num_rows($product_result) > 0) {
                $total=true;
                
                $product_row = mysqli_fetch_assoc($product_result);
                $name = $product_row['name'];
                $price = $product_row['price'];
                $total_price+=( $price*$row['quantity']);
                echo "<tr><td>" . $name . "</td><td>" . $row['quantity'] . "</td><td>".$price."</td></tr>";
            } 
            else {
                echo "Product not found";
            }
            
        }

        if($total){
            echo "<tr><td>Total Price </td><td></td><td>".$total_price."</td></tr>";
        }
        echo "</table>";
        
        echo "<form  action='create_order.php' method='post' onsubmit='return confirm(`Confirm Order ?`);'>";
        echo "<button type='button' ><a href='/PHP/view_product.php'>Cart</a></button>";
        echo "<input type='hidden' name='cart_id' value='" . $cart_id . "'>";
        echo "<button type='submit' name='order_now'>Order Now</button>";
        echo "</form>";
        
    } else {
        echo "No items in cart";
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