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
    $size = $_POST['size'];
    $color = $_POST['color'];
    $customer_id = $_SESSION['username'];
    
    // echo $product_id;
    // echo $quantity;
    // echo $customer_id;
    $variant_query = "SELECT variant_id FROM product_variants 
    INNER JOIN product_sizes ON product_variants.size_id = product_sizes.size_id 
    INNER JOIN product_colors ON product_variants.color_id = product_colors.color_id 
    WHERE product_sizes.size = '$size' AND product_colors.color = '$color' AND product_variants.product_id = '$product_id'";

    
    // Fetch the cart_id for the current user
    $cart_query = "SELECT cart_id FROM cart WHERE customer_id = '$customer_id'";
    $cart_result = mysqli_query($connect, $cart_query);
    if (mysqli_num_rows($cart_result) > 0) {
        $cart = mysqli_fetch_assoc($cart_result);
        $cart_id = $cart['cart_id'];
    } else {
        // No cart found for the current user, create a new one
        $create_cart_query = "INSERT INTO `cart` (customer_id) VALUES ('$customer_id')";
        if (mysqli_query($connect, $create_cart_query)) {
            $cart_id = mysqli_insert_id($connect);
        } else {
            die("Error creating cart: " . mysqli_error($connect));
        }
    }
    

    $variant_result = mysqli_query($connect, $variant_query);
    if (mysqli_num_rows($variant_result) > 0) {
        $variant = mysqli_fetch_assoc($variant_result);
        $variant_id = $variant['variant_id'];

        // Add item to cart
        $sqlquery = "SELECT * FROM `cart_items` WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND variant_id = '$variant_id'";
        $result = mysqli_query($connect, $sqlquery);

        if (mysqli_num_rows($result) > 0) {
            // Product variant already exists, update the quantity
            $row = mysqli_fetch_assoc($result);
            $existing_quantity = $row['quantity'];
            $new_quantity = $existing_quantity + $quantity;
            $sqlquery = "UPDATE `cart_items` SET quantity = '$new_quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND variant_id = '$variant_id'";
        } else {
            // Product variant does not exist, insert a new record
            $sqlquery = "INSERT INTO `cart_items` (cart_id, product_id, quantity, variant_id) VALUES ('$cart_id', '$product_id', '$quantity', '$variant_id')";
        }
        // mysqli_query($connect, $sqlquery);
    } else {
        // No variant found for the selected size and color
        echo "<script>alert('No variant is available for the selected size and color.');
        window.location.href = document.referrer;
        </script>";    
    }

    // // Check if cart already exists for the user
    // $sqlquery = "SELECT cart_id FROM `cart` WHERE customer_id = '$customer_id'";
    // $result = mysqli_query($connect, $sqlquery);
    // if (mysqli_num_rows($result) > 0) {
    //     // Cart exists, get the cart_id
    //     $row = mysqli_fetch_assoc($result);
    //     $cart_id = $row['cart_id'];
    // } else {
    //     // Cart does not exist, create a new cart
    //     $sqlquery = "INSERT INTO `cart` (customer_id) VALUES ('$customer_id')";
    //     if (mysqli_query($connect, $sqlquery)) {
    //         $cart_id = mysqli_insert_id($connect);
    //     } else {
    //         die("Error: " . mysqli_error($connect));
    //     }
    // }

    // // Add item to cart
    // // Check if the product already exists in the cart
    // $sqlquery = "SELECT * FROM `cart_items` WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
    // $result = mysqli_query($connect, $sqlquery);
    // if (mysqli_num_rows($result) > 0) {
    //     // Product already exists, update the quantity
    //     $row = mysqli_fetch_assoc($result);
    //     $existing_quantity = $row['quantity'];
    //     $new_quantity = $existing_quantity + $quantity;
    //     $sqlquery = "UPDATE `cart_items` SET quantity = '$new_quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
    // } else {
    //     // Product does not exist, insert a new record
    //     $sqlquery = "INSERT INTO `cart_items` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')";
    // }
   
    // //$sqlquery = "INSERT INTO `cart_items` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')";
   
    if (mysqli_query($connect, $sqlquery)) {
        echo "<script>alert(`Item added to cart successfully !!`);
        window.location.href = document.referrer;
        </script>";
    } else {
        die("Error: " . mysqli_error($connect));
    }
}
?>