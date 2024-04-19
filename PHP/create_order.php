
<link rel="stylesheet" href="../CSS/viewCart.css" />
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
            $variant_id = $row['variant_id']; // Fetch the variant_id

            // Add each item to the order
            $sqlquery = "INSERT INTO `order_items` (order_id, product_id, quantity, variant_id) VALUES ('$order_id', '$product_id', '$quantity', '$variant_id')"; // Include the variant_id
            mysqli_query($connect, $sqlquery);
        }

        // Remove items from cart
        $sqlquery = "DELETE FROM `cart_items` WHERE cart_id = '$cart_id'";
        mysqli_query($connect, $sqlquery);

        echo "<script>alert('Order created successfully');</script>";
        echo "<div class='button-container'>";
        echo "<a class='button' href='/Sports-Inventory-management'>Home Page</a>";
        echo "</div>";

    } else {
        die("Error: " . mysqli_error($connect));
    }
}

?>