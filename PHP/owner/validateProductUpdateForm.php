<?php
include '../database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantities = $_POST['quantity'];
    $variant_ids = $_POST['variant_id'];
    $size_ids = $_POST['size_id'];
    $color_ids = $_POST['color_id'];

    // Update product information
    $update_product_sql = "UPDATE product SET name = '$name', price = '$price', description = '$description' WHERE product_id = $product_id";
    mysqli_query($conn, $update_product_sql);

    // Update or insert variants
    foreach ($quantities as $index => $quantity) {
        $variant_id = $variant_ids[$index];
        $size_id = $size_ids[$index];
        $color_id = $color_ids[$index];

        if ($variant_id != '') {
            // Variant exists, update quantity
            $update_variant_sql = "UPDATE product_variants SET quantity = quantity + $quantity WHERE variant_id = $variant_id";
            mysqli_query($conn, $update_variant_sql);
        } else {
            // Variant doesn't exist, insert new variant
            $insert_variant_sql = "INSERT INTO product_variants (product_id, size_id, color_id, quantity) VALUES ($product_id, $size_id, $color_id, $quantity)";
            mysqli_query($conn, $insert_variant_sql);
        }
    }

    // Redirect or display success message
    header("Location: update_success.php");
    exit();
} else {
    // Handle invalid request
    echo "Invalid request.";
}
?>
