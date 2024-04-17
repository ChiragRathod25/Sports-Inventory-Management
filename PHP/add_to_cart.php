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

if(isset($_POST['add_to_cart'])) {
    // echo "Add to cart button clicked"; 
    $product_id = $_POST['product_id'];
    $quantity = $_POST['product-cart-quantity'];
    $customer_id = $_SESSION['username'];
    
    // echo $product_id;
    // echo $quantity;
    // echo $customer_id;

    // Check if cart already exists for the user
    $sqlquery = "SELECT cart_id FROM `cart` WHERE customer_id = '$customer_id'";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        // Cart exists, get the cart_id
        $row = mysqli_fetch_assoc($result);
        $cart_id = $row['cart_id'];
    } else {
        // Cart does not exist, create a new cart
        $sqlquery = "INSERT INTO `cart` (customer_id) VALUES ('$customer_id')";
        if (mysqli_query($connect, $sqlquery)) {
            $cart_id = mysqli_insert_id($connect);
        } else {
            die("Error: " . mysqli_error($connect));
        }
    }

    // Add item to cart
    // Check if the product already exists in the cart
    $sqlquery = "SELECT * FROM `cart_items` WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
    $result = mysqli_query($connect, $sqlquery);
    if (mysqli_num_rows($result) > 0) {
        // Product already exists, update the quantity
        $row = mysqli_fetch_assoc($result);
        $existing_quantity = $row['quantity'];
        $new_quantity = $existing_quantity + $quantity;
        $sqlquery = "UPDATE `cart_items` SET quantity = '$new_quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
    } else {
        // Product does not exist, insert a new record
        $sqlquery = "INSERT INTO `cart_items` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')";
    }
   
    //$sqlquery = "INSERT INTO `cart_items` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')";
   
    if (mysqli_query($connect, $sqlquery)) {
        echo "<script>alert(`Item added to cart successfully !!`);
        window.location.href = document.referrer;
        </script>";
    } else {
        die("Error: " . mysqli_error($connect));
    }
}
?>